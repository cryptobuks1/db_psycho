<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 7/15/19
 * Time: 5:05 PM
 */

namespace App\Http\Traits;


use App\Models\BL\BlAttachedDocumentKind;
use App\Models\Controller;
use App\Models\DbAreaFile;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;

trait DbAreaFilesHelper
{
    /**
     * Current db_area_id
     * @var integer
     */
    private $db_area_id;

    /**
     * Controller_alias from request
     * @var string
     */
    private $controller_alias;

    /**
     * Current controller's controller_code
     * @var string
     */
    private $controller_code;

    /**
     * Current controller object
     * @var \App\Models\Controller
     */
    private $controller;

    /**
     * Id from request
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $table_n_owner;

    /**
     * @var integer
     */
    private $row_id_owner;

    /**
     * @var integer
     */
    private $table_n_doc;

    /**
     * @var integer
     */
    private $row_id_doc;

    /**
     * If true, then to fetching DbAreaFiles we add a new condition,
     * where DbAreaFiles.table_n_owner == $this->table_n_owner
     * @var bool
     */
    private $checkForTableNOwner;

    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    private $files_model;

    /**
     * @var array
     */
    private $model_record;

    /**
     * Used to restrict DbAreaFiles
     * @var array
     */
    private $files_where_array;

    /**
     * Documents array
     * @var array
     */
    private $documents;

    /**
     * @var bool
     */
    private $show_dependent = true;

    /**
     * Used in dependent block in list
     * @var string
     */
    private $dependent_title;

    /**
     * Used in dependent block in list
     * @var string
     */
    private $dependent_field;

    /**
     * Default file extensions
     * @var array
     */
    private $file_extensions;

    /**
     * Translations of captions
     * @var array
     */
    private $captions_translations;

    public function __construct()
    {
        $this->db_area_id = (int)self::getDefaultDBAreaId();

        $request = request();
        $this->controller_alias = $request["dependent"]["dependent_data_model"] ?? $request["dependent"]["controller_alias"];
        $this->id = (int)$request["dependent"]["id"];

        $this->setController($this->controller_alias);

        $this->file_extensions = ["jpg", "jpeg", "png"];
    }

    /**
     * Returns finished list for sending it back to FrontEnd
     * @param string $form_base_data_model
     * @param string $form_title
     * @return array
     */
    private function getList(string $form_base_data_model, string $form_title): array
    {
        $list = [
            "main_data_models" => [
                $form_base_data_model => $this->documents,
            ],
            "sets"             => $this->getButtonsList("att_file_bar"),
            "form_parameters"  => [
                'disable_inputs'                => false,
                'form_base_data_model'          => $form_base_data_model,
                'form_code'                     => $form_base_data_model,
                'form_is_dependent'             => $this->show_dependent,
                'form_main_data_model_id_field' => "id",
                'form_main_data_model_name'     => "",
                //todo поменять на caption
                'form_title'                    => $form_title,
                'form_type'                     => "card",
            ]
        ];

        if($this->show_dependent)
        {
            $list["dependent"] = [
                "title"        => $this->dependent_title,
                "type"         => "label",
                "options_data" => [
                    "options_field_value" => $this->model_record[$this->dependent_field]
                ]
            ];
        }

        return $list;
    }

    /**
     * Returns an empty object for DbAreaFiles
     * @return array
     */
    private function getEmptyFile(): array
    {
        return [
            "id"                 => null,
            "bl_att_doc_kind_id" => "",
            "created_at"         => "",
            "created_by"         => "",
            "db_area_file_name"  => "",
            "db_area_id"         => $this->db_area_id,
            "deleted_l"          => false,
            "row_id_doc"         => $this->row_id_doc,
            "row_id_owner"       => $this->row_id_owner,
            "stored_file_id"     => "",
            "table_n_doc"        => $this->table_n_doc,
            "table_n_owner"      => $this->table_n_owner,
            "uid_1c_code"        => "",
            "updated_at"         => "",
            "updated_by"         => ""
        ];
    }

    /**
     * Fetching documents with files
     * @param string $by
     * @return $this
     * @throws Exception
     */
    private function getDocuments($by)
    {
        if($by === "document_kinds")
            $documents = $this->getDocumentsByDocumentKinds();
        elseif($by === "db_area_files")
            $documents = $this->getDocumentsByDbAreaFiles();
        else
            throw new \Exception("Parameter by is wrong.");

        $not_required_files = $this->getNotRequiredFiles();

        if(count($not_required_files) > 0)
            array_push($documents, [
                "att_doc_kind_name" => "Другие файлы",
                "db_area_files"     => $not_required_files
            ]);

        $empty_file = $this->getEmptyFile();

        foreach($documents as &$document)
        {
            $empty_file["bl_att_doc_kind_id"] = $document["id"] ?? null;
            $document["required_document_l"] =
                (isset($document["bl_req_document"]) && !empty($document["bl_req_document"])) ? true : false;
            array_unshift($document["db_area_files"], $empty_file);

            // File extensions and size
            $document["ext"] = $this->getFileExtensions($document["file_type_set"] ?? null);

            if(!isset($document["size"]) || is_null($document["size"]))
                $document["size"] = $this->getDefaultFileSize();

            // Remove file_type_set key
            if(isset($document["file_type_set"]))
                unset($document["file_type_set"]);
        }

        usort($documents, function($left, $right)
        {
            return $right['required_document_l'] - $left['required_document_l'];
        });


        $this->documents = $documents;

        return $this;
    }

    /**
     * Returns documents list depending on DbAreaFiles
     * @return array
     */
    protected function getDocumentsByDbAreaFiles()
    {
        return BlAttachedDocumentKind::query()
            ->where("BlAttachedDocumentKinds.db_area_id", $this->db_area_id)
            ->with([
                "dbAreaFiles" => function($query)
                {
                    $query->where($this->files_where_array);
                },
                "fileTypeSet"                                   => function($query)
                {
                    $query->select("BlFileTypeSets.id");
                },
                "fileTypeSet.blFileTypeSetTabFileType"          => function($query)
                {
                    $query->select("blFileTypeSetTabFileTypes.id", "blFileTypeSetTabFileTypes.file_type_id",
                        "blFileTypeSetTabFileTypes.bl_file_type_set_id");
                },
                "fileTypeSet.blFileTypeSetTabFileType.typeFile" => function($query)
                {
                    $query->select("_FileTypes.id", "_FileTypes.file_type_code");
                }
            ])
            ->whereHas("dbAreaFiles", function($query)
            {
                $query->where($this->files_where_array);
            })
            ->select(
                "BlAttachedDocumentKinds.bl_att_doc_kind_name as att_doc_kind_name",
                "BlAttachedDocumentKinds.id", "BlAttachedDocumentKinds.bl_file_type_set_id",
                "BlAttachedDocumentKinds.bl_att_doc_file_size as size"
            )
            ->orderBy("id", "asc")
            ->get()->toArray();
    }

    /**
     * Returns documents list depending on document kinds
     * @return array
     */
    protected function getDocumentsByDocumentKinds()
    {
        return BlAttachedDocumentKind::query()
            ->where("BlAttachedDocumentKinds.db_area_id", $this->db_area_id)
            ->with([
                "dbAreaFiles" => function($query)
                {
                    $query->where($this->files_where_array);
                },
                "blReqDocument:id,bl_att_doc_kind_id",
                "fileTypeSet"                                   => function($query)
                {
                    $query->select("BlFileTypeSets.id");
                },
                "fileTypeSet.blFileTypeSetTabFileType"          => function($query)
                {
                    $query->select("blFileTypeSetTabFileTypes.id", "blFileTypeSetTabFileTypes.file_type_id",
                        "blFileTypeSetTabFileTypes.bl_file_type_set_id");
                },
                "fileTypeSet.blFileTypeSetTabFileType.typeFile" => function($query)
                {
                    $query->select("_FileTypes.id", "_FileTypes.file_type_code");
                }
            ])
            ->whereHas("blReqDocument", function($query)
            {
                $query->where([
                    "BlRequiredDocuments.table_n_doc" => $this->table_n_doc,
                    "BlRequiredDocuments.row_id_doc"  => $this->row_id_doc
                ]);
            })
            ->orWhereHas("dbAreaFiles", function($query)
            {
                $query->where($this->files_where_array);
            })
            ->select(
            //"BlRequiredDocuments.*",
                "BlAttachedDocumentKinds.bl_att_doc_kind_name as att_doc_kind_name",
                "BlAttachedDocumentKinds.id", "BlAttachedDocumentKinds.bl_file_type_set_id",
                "BlAttachedDocumentKinds.bl_att_doc_file_size as size"
            //                DB::raw("(CASE WHEN kinds.id = 77 THEN true ELSE false END) AS test_key")
            )
            ->orderBy("id", "asc")
            ->get()->toArray();
    }

    /**
     * Returns DbAreaFiles with bl_att_doc_kind_id = null
     */
    protected function getNotRequiredFiles()
    {
        return DbAreaFile::query()
            ->where($this->files_where_array)
            ->whereNull("bl_att_doc_kind_id")
            ->orderBy("bl_att_doc_kind_id")
            ->select(["DbAreaFiles.*"])
            ->get()->toArray();
    }


    /**
     * Returns file extensions
     * @param array|null $file_type_set
     * @return array|null
     */
    protected function getFileExtensions(?array $file_type_set): ?array
    {
        if(is_null($file_type_set))
            return $this->getDefaultExtensions();
        else
        {
            $extensions = [];
            foreach($file_type_set["bl_file_type_set_tab_file_type"] as $item)
            {
                array_push($extensions, $item["type_file"]["file_type_code"]);
            }

            return $extensions;
        }
    }

    /**
     * Returns default file extensions
     * @return array
     */
    protected function getDefaultExtensions(): array
    {
        return $this->file_extensions;
    }

    /**
     * Returns default file size
     * @return int
     */
    protected function getDefaultFileSize(): int
    {
        return 3072;
    }

    /**
     * Sets $files_where_array to $where
     * @param array $where
     * @return $this
     */
    private function setFilesWhereArray(array $where)
    {
        $this->files_where_array = $where;

        return $this;
    }

    /**
     * Sets model which then will be used to check for record existing
     * @param string $model
     * @return $this
     */
    private function setModel(string $model)
    {
        $this->files_model = $model;

        return $this;
    }

    /**
     * Sets $controller to the first item of array of Model objects
     * @param $error_message
     * @return $this
     * @throws Exception
     */
    private function setModelRecord($error_message)
    {
        $record = $this->files_model::query()
            ->where("id", $this->id)->get()->toArray();

        if(!$record)
            throw new Exception($error_message);

        $this->model_record = $record[0];

        return $this;
    }

    /**
     * Sets $controller to the first item of array of \App\Models\Controller objects
     * @param string $controller_alias
     */
    private function setController(string $controller_alias): void
    {
        $this->controller = Controller::query()->where("controller_alias", $controller_alias)
                                ->with("models")->get()->toArray()[0];
    }

    /**
     * Sets table_n_owner, row_id_owner, table_n_doc, $row_id_doc to the values from $params
     * @param array $params
     * @return $this
     */
    private function setOwnerAndDocParams(array $params)
    {
        $this->table_n_owner = $params["table_n_owner"] ?? null;
        $this->row_id_owner = $params["row_id_owner"] ?? null;
        $this->table_n_doc = $params["table_n_doc"] ?? null;
        $this->row_id_doc = $params["row_id_doc"] ?? null;

        return $this;
    }

    /**
     * Check if $controller's controller_code is equal to $controller_code
     * @return $this
     * @throws Exception
     */
    private function checkForController()
    {
        if($this->controller["controller_code"] !== $this->controller_code)
            throw new Exception("Incorrect controller");

        return $this;
    }

    /**
     * Sets $controller_code to $value
     * @param string $value
     * @return $this
     */
    private function setControllerCode(string $value)
    {
        $this->controller_code = $value;

        return $this;
    }

    /**
     * Sets $checkForTableNOwner to $value
     * @param bool $value
     * @return $this
     */
    private function setCheckForTableNOwner(bool $value)
    {
        $this->checkForTableNOwner = $value;

        return $this;
    }

    /**
     * Sets $dependent_title to $value
     * @param string $value
     * @return $this
     */
    private function setDependentTitle(string $value)
    {
        $this->dependent_title = $value;

        return $this;
    }

    /**
     * Sets $dependent_field to $value
     * @param string $value
     * @return $this
     */
    private function setDependentField(string $value)
    {
        $this->dependent_field = $value;

        return $this;
    }

    /**
     * Gets translations of $captions and sets it to $captions_translations
     * @param array $captions
     * @return $this
     */
    private function translateCaptions(array $captions)
    {
        $this->captions_translations = $this->getTranslateByKeys($captions);

        return $this;
    }

    /**
     * Returns the translation of the given caption
     * @param string $caption
     * @return string
     */
    private function getCaptionTranslation(string $caption): string
    {
        return $this->captions_translations[$caption]["translation_captions"]["caption_translation"] ?? "Caption translation was not found";
    }

    /**
     * @return $this
     */
    private function hideDependent()
    {
       $this->show_dependent = false;

       return $this;
    }
}