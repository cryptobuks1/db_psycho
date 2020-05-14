<?php

namespace App\Http\Controllers;

use App\Http\Classes\FileManager;
use App\Http\Classes\SignalManager;
use App\Http\Classes\StoredFileManager;
use App\Http\Controllers\Api\Admin\ConsumerAccessRowsNewController;
use App\Http\Controllers\Api\BL\BlLeasingCalculationsController;
use App\Http\Traits\DefaultSystemParams;
use App\Http\Interfaces\Validatable;
use App\Models\ActionLog;
use App\Http\Classes\ApplicationChangeRequest;
use App\Http\Classes\CheckController;
use App\Http\Classes\ConsumerParameters;
use App\Models\ActionType;
use App\Models\BL\BlLeasingContract;
use App\Models\BL\BlStatus;
use App\Models\Caption;
use App\Models\ConsumerAccessRole;
use App\Models\ConsumerAccessRowNew;
use App\Models\Contractor;
use App\Models\ContractorInfo;
use App\Models\ControllerLink;
use App\Models\DbArea;
use App\Models\ModelLink;
use App\Models\ModelTables;
use App\Models\SystemParameter;
use Carbon\Carbon;
use Dompdf\Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use IlluminateAgnostic\Arr\Support\Collection;
use App\Models\DbAreaFile;
use App\Models\FileType;
use App\Models\StoredFile;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, DefaultSystemParams;

    /**
     * Main model db_area_id
     * Not null if use_db_area_l == true
     * @var integer
     */
    private $db_area_id = null;

    /**
     * Main model use_db_area_l
     * @var boolean
     */
    private $use_db_area_l = false;

    /*
     * Used when trying to get write_n
     * @var int
     */
    private $parent_model_db_area_id = null;

    /**
     * @var bool
     */
    private $mainModelIsTabularPart = false;

    /**
     * This variable is set in method write()
     * Used when creating new log
     * @var int
     */
    private $controller_id = 0;

    /**
     * Gets defined in child controller
     * @var Validatable
     */
    protected $model;

    /**
     * @var bool
     */
    protected $main_model_existed;

    /**
     * @var int
     */
    protected $main_model_id;


    /**
     * @var array
     */
    protected $main_data_models;

    /**
     * @var string
     */
    protected $main_model_name;

    /**
     * @var \App\Models\Controller
     */
    protected $main_model;

    protected function getTranslateByKeysOld(array $getCaptionName = [])
    {
        //        $found_key = array_search($getCaptionName, array_column($captions, 'caption_name'));
        //get translationCaptions selectively Topalu Albert 1.11.18 09:48
        $captionsAll = Caption::with('translationCaptions')->whereIn('caption_name', $getCaptionName)->get()->toArray();
        $getArrayCaptions = [];
        foreach($captionsAll as $key => $value)
        {
            foreach($getCaptionName as $caption => $captionKey)
            {
                if(($value['caption_name'] == $captionKey))
                {
                    $getArrayCaptions[$captionKey] = $value; //change key array
                }
            }
        }
        return $getArrayCaptions;
        //        $captionsAll = Caption::with('translationCaptions')->whereIn('caption_name', $getCaptionName)->get()->toArray();
        //        if ($captionsAll == NULL) {
        //            $captionsAll = [];
        //
        //        }
        //        return $captionsAll;
    }

    public function getTranslateByKeys(array $getCaptionName = [])
    {

        $captionsAll = Caption::query()->with('translationCaptions')->whereIn('caption_name', $getCaptionName)->get();
        $getArrayCaptions = [];
        foreach($getCaptionName as $caption_name)
        {
            $translated_caption = $captionsAll->firstWhere("caption_name", $caption_name);

            if($translated_caption)
            {
                $getArrayCaptions[$caption_name] = $translated_caption->toArray();
            }
            else
            {
                $getArrayCaptions[$caption_name]['translation_captions']['caption_translation'] = "U_$caption_name";
            }
        }

        return $getArrayCaptions;
    }

    // +++

    /**
     * Validates request
     * @param $bCancel
     * @return JsonResponse|null
     */
    protected function fillCheckProcessing(&$bCancel)
    {
        if(is_null($this->model))
            return null;

        $validation_rules = $this->model::getValidationRules();
        if(empty($validation_rules))
            return null;

        $request = request();

        // Check for existing form_parameters and main_data_models keys in request
        if(!$request->has('form_parameters') || !$request->has('main_data_models'))
        {
            $bCancel = true;
            return response()->json([
                "error"   => true,
                "message" => "Request is invalid"
            ], 400);
        }

        $form_base_data_model = $request["form_parameters"]["form_base_data_model"];

        $validate = Validator::make($request["main_data_models"][$form_base_data_model][0], $validation_rules);

        $messages = $validate->messages();

        if(empty($messages->messages()))
            return null;

        if(!is_null($this->model))
        {
            $key = $messages->keys()[0];

            $caption_key = $this->model::getAttributeCaption($key);

            $caption = [$caption_key];

            $translation = $this->getTranslateByKeys($caption);

            // Set attribute name to translated caption
            if(!empty($translation))
                $validate->setAttributeNames([
                    $key => $translation[$caption_key]['translation_captions']['caption_translation']
                ]);

        }


        if($validate->fails())
        {
            $bCancel = true;

            return response()->json([
                "error"   => true,
                "message" => $validate->messages()->first()
            ], 400);
        }

        return null;
    }

    public function beforeWriteBe(&$bCancel)
    {

    }

    public function beforeWriteBeT(&$bCancel)
    {

    }

    public function universalWriteBeT(&$bCancel)
    {

    }

    public function onWriteBeT(&$bCancel)
    {

    }

    public function posting(&$bCancel)
    {

    }

    public function onWriteBeTL(&$bCancel)
    {

    }

    public function afterWriteBe(&$bCancel, $request)
    {

    }
    public function onWriteError($request)
    {

    }


    public function checkForRelatedFields($data_model, $controller_alias)
    {
        if(empty($data_model))
            return;

        //        $main_model = DB::table("__Controllers as FirstController")
        //            ->where("FirstController.controller_alias", $controller_alias)
        //            ->join("__ControllerLinks", "__ControllerLinks.controller_id", "=", "FirstController.id")
        //            ->where("__ControllerLinks.parent_link_l", 0)
        //            ->join("__Controllers as SecondController", "SecondController.id", "=",
        //                "__ControllerLinks.controller_id_link")
        //            ->join("__ModelTables", "__ModelTables.table_n", "=", "SecondController.controller_table_n")
        //            ->select("__ControllerLinks.controller_id", "__ControllerLinks.controller_id_link",
        //                "__ControllerLinks.table_field_name",
        //                "__ControllerLinks.table_field_name_composite",
        //                "SecondController.controller_alias", "SecondController.controller_table_n", "__ModelTables.table_name",
        //                "__ModelTables.use_db_area_l")
        //            ->get();

        $main_model = DB::table("__Controllers as FirstController")
            ->where("FirstController.controller_alias", $controller_alias)
            ->join("__ModelLinks", "__ModelLinks.table_n", "=", "FirstController.controller_table_n")
            ->where("__ModelLinks.parent_link_l", 0)
            ->join("__Controllers as SecondController", "SecondController.controller_table_n", "=", "__ModelLinks.table_n_link")
            ->join("__ModelTables", "__ModelTables.table_n", "=", "SecondController.controller_table_n")
            ->select("__ModelLinks.table_field_name", "__ModelLinks.table_field_name_composite", "SecondController.controller_alias", "SecondController.controller_table_n", "__ModelTables.table_name", "__ModelTables.use_db_area_l")
            ->get();
        $count = count($main_model);

        //        return [
        //            "old" => $main_model,
        //            "new" => $test
        //        ];

        $ids_to_check = [];

        for($i = 0; $i < $count; $i++)
        {
            $current_model = $main_model[$i];
            $related_field = $current_model->table_field_name;

            $use_db_area_l = $current_model->use_db_area_l;

            $table_field_name_composite = $current_model->table_field_name_composite;

            if($use_db_area_l && !$this->use_db_area_l)
                throw new \Exception("Main model use_db_area_l = false, reference model => " . json_encode($current_model, JSON_UNESCAPED_UNICODE) . " use_db_area_l = true", 316);


            $ids_to_check = [];

            //            for($j = 0; $j < count($data_model); $j++)
            foreach($data_model as $item)
            {
                if(in_array($related_field, array_keys($item)))
                {
                    // If null
                    if(!$item[$related_field])
                        continue;

                    if(isset($item[$table_field_name_composite]))
                    {
                        //                         If null
                        if(!$item[$table_field_name_composite])
                            continue;

                        if($item[$table_field_name_composite] == $current_model->controller_table_n)
                            array_push($ids_to_check, $item[$related_field]);
                    }
                    else
                        array_push($ids_to_check, $item[$related_field]);
                }

            }

            $this->checkForRelatedFieldValueExistence($related_field, $ids_to_check, $controller_alias, $current_model);
        }

    }

    /**
     * @param $related_field
     * @param $ids_to_check
     * @param $controller_alias
     * @param $current_model
     * @throws \Exception
     */
    public function checkForRelatedFieldValueExistence($related_field, $ids_to_check, $controller_alias, $current_model)
    {
        $count = count($ids_to_check);

        if($count == 0)
            return;

        $table_name = $current_model->table_name;

        $use_db_area_l = $current_model->use_db_area_l;

        $records = DB::table($table_name)->whereIn("id", $ids_to_check)->get();


        if($count === count($records))
        {
            // If main_model use_db_area_l == false
            if(!$this->use_db_area_l)
                return;
            else
            {
                // If current model use_db_area_l == false
                if(!$use_db_area_l)
                    return;

                // Get unique db_area_id from
                $db_area_ids = array_unique($records->pluck("db_area_id")->toArray());

                if(count($db_area_ids) > 1)
                {
                    throw new \Exception("db_area_id in reference model $table_name with ids " . json_encode($ids_to_check) . " differ from main_model db_area_id. Got " . json_encode($db_area_ids) . " Expected $this->db_area_id", 317);
                }
                if($this->db_area_id != $db_area_ids[0])
                    throw new \Exception("db_area_id in reference model $table_name with ids " . json_encode($ids_to_check) . " differ from main_model db_area_id. Got " . json_encode($db_area_ids) . " Expected $this->db_area_id", 317);


            }
        }
        else
        {
            $records_ids = [];
            foreach($records as $record)
            {
                array_push($records_ids, $record->id);
            }
            foreach($ids_to_check as $id)
            {
                if(!in_array($id, $records_ids))
                {
                    throw new \Exception("$related_field with value = $id was not found in $table_name", 307);
                }
            }
        }

    }

    /**
     * Function sends data to 1C
     * @param array $data
     * @return array
     */
    private final function sendTo1C(array $data)
    {
        $applicationChangeRequest = (new ApplicationChangeRequest($data));
        return $applicationChangeRequest->applicationChange();
    }

    /**
     * Function removes the columns the table doesn't have
     * @param $model
     * @param $columns
     */
    private final function clearModelColumns(&$model, array $columns)
    {
        $except_columns_array = ["updated_at", "created_at", "updated_by", "created_by", "to_be_deleted", "db_area_id"];
        array_map(function($model_item) use (&$model, $columns, $except_columns_array)
        {
            if(!in_array($model_item, $columns) && !in_array($model_item, $except_columns_array))
                unset($model[$model_item]);
        }, array_keys($model));
    }

    /**
     * @param array $data
     * @param bool $isSQLError
     * @return JsonResponse
     */
    protected final function generateReturnJSON(array $data, $isSQLError = true): JsonResponse
    {
        $consumer_is_system_n = Auth::user()->consumer_is_system_n;

        $error_codes = [301, 309];

        $error_codes_in_array = in_array($data["code"], $error_codes);

        if($isSQLError)
        {
            if(in_array($consumer_is_system_n, [1, 2]))
                $message = "Ошибка записи в базу данных " . $data["admin_message"];
            else
                $message = "Ошибка записи в базу данных";
        }
        else
        {
            if(in_array($consumer_is_system_n, [1, 2]))
                $message = $data["admin_message"];
            else
            {
                if($error_codes_in_array)
                    $message = "Ошибка доступа";
                else
                    $message = $data["message"];
            }
        }

        if($data["error"])
        {
            $status = $error_codes_in_array ? 403 : 400;
        }
        else
            $status = 200;

        $status = $data["status"] ?? $status;

        // Logging
        $this->logAction($data, $isSQLError);

        return response()->json([
            "error"    => $data["error"],
            "code"     => $isSQLError ? 300 : $data["code"],
            "message"  => $message,
            "requery"  => $data["requery"],
            "id"       => $data["id"],
            "template" => $data["template"] ?? null,
            "position" => $data["position"] ?? null
        ], $status);
    }

    /**
     * Create new log
     * @param array $data
     * @param bool $isSQLError
     */
    protected function logAction(array $data, bool $isSQLError)
    {
        $action_type_id = ActionType::where("action_type_code", "write")->select("id")->first();

        $create_array = [
            "controller_id"      => $this->controller_id,
            "consumer_id"        => $data["consumer_id"],
            "action_type_id"     => $action_type_id["id"],
            "row_id"             => $data["id"] ?? null,
            "action_log_error_l" => $data["error"],
            "action_log_message" => $data["admin_message"],
            "created_by"         => $data["consumer_code"],
            "updated_by"         => $data["consumer_code"],
            'remote_addr'        => request()->server('REMOTE_ADDR'),
            'http_referer'       => request()->server('HTTP_REFERER'),
            'redirect_url'       => request()->server('REDIRECT_URL'),
            'request_method'     => request()->server('REQUEST_METHOD'),
            'http_user_agent'    => request()->server('HTTP_USER_AGENT'),

        ];

        if($isSQLError || $data["error"])
            $create_array["action_log_error_code"] = $isSQLError ? 300 : $data["code"];

        ActionLog::create($create_array);
    }

    /**
     * @param $main_model
     * @return array
     * @throws \Exception
     */
    protected final function getWriteN($main_model): array
    {
        if($this->db_area_id != null || $this->parent_model_db_area_id != null)
        {
            $db_area_id = $this->db_area_id ?? $this->parent_model_db_area_id ?? null;

            if(is_null($db_area_id))
                return [0, null];

            $db_type_models = DB::table("_DbAreas as DbAreas")
                ->where("DbAreas.id", $db_area_id)
                ->join("_DBases as DBases", "DBases.id", "=", "DbAreas.db_id")
                ->join("_DbTypeModels as DbTypeModels", function($join) use ($main_model)
                {
                    $join->where("DbTypeModels.table_n", $main_model->controller_table_n);
                })
                ->select("DbTypeModels.*", "DBases.db_type_id as dbases_db_type_id", "DbAreas.id as db_area_id", "DbAreas.db_area_code", "DbAreas.db_area_token")
                ->groupBy("DbTypeModels.id", "DBases.id", "DbAreas.id")
                ->get();

            // If there's at least 1 record
            if(count($db_type_models) > 0)
            {
                $dbases_db_type_id = $db_type_models->pluck("dbases_db_type_id")->first();

                $db_type_ids = $db_type_models->pluck("db_type_id")->toArray();

                $index = null;

                // Set $x to the value from table where db_type_id == null
                if(in_array($dbases_db_type_id, $db_type_ids))
                    $index = array_search($dbases_db_type_id, $db_type_ids);

                // Set $x to the value from table where db_type_id != null
                elseif(in_array(null, $db_type_ids))
                    $index = array_search(null, $db_type_ids);
                else
                    throw new \Exception("Для db_area_id = $db_area_id не получил write_n в таблице _DbTypeModels", 323);


                return [
                    $db_type_models[$index]->write_n,
                    [
                        "db_area_id"    => $db_type_models[$index]->db_area_id,
                        "db_area_code"  => $db_type_models[$index]->db_area_code,
                        "db_area_token" => $db_type_models[$index]->db_area_token,
                    ]
                ];

            }
            // If no DbTypeController record was found, then return 0
            else
                return [0, null];
        }
        else
            return [0, null];
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public final function write(Request $request) //: JsonResponse
    {
        //        return SignalManager::getSignalData(26);
        $bCancel = false;
        $res = $this->fillCheckProcessing($bCancel);
        if($bCancel)
            return $res;
        try
        {

            $insert_array = [];

            $update_array = [];

            $delete_array = [];


            // Default message for showing it in error for user
            $message = "Ошибка записи";

            // If data is not up to date, then set this variable to true
            $requery = false;

            $this->main_data_models = $request->main_data_models;

            $main_model_name = $request["form_parameters"]["form_base_data_model"];

            //            $request->input("form_parameters") = "test";

            $main_model_primary_key = "id";

            $main_model_existed = false;

            // Main model record from database
            $main_model_record = null;

            $main_model_id = null;


            $user = Auth::user()->only("id", "consumer_code");

            //            $controller_code = class_basename(Route::current()->controller);
            $controller_code = class_basename(get_called_class());
            //            $controller_code = class_basename($request->route()->controller);


            $main_model = \App\Models\Controller::where("controller_code", $controller_code)
                ->select("id", "controller_code", "controller_table_n", "controller_alias")
                ->with("models:id,table_n,table_name,use_db_area_l,use_stored_file_l,table_code,table_folder")
                ->first();

            $this->main_model = $main_model;

            $this->controller_id = $main_model->id;

            // Check if main model exists in main_data_models
            if(!in_array($main_model_name, array_keys($this->main_data_models)))
                throw new \Exception("Main model was not found in main_data_models", 303);

            // Check if controller_code from table is equal to the one being used now
            if($main_model->controller_alias !== $main_model_name)
                throw new \Exception("Incorrect controller. Expected $main_model->controller_alias Got $main_model_name", 306);

            $this->main_data_models[$main_model_name] = $this->main_data_models[$main_model_name][0];
            $this->main_model_name = $main_model_name;


            if($this->main_data_models[$main_model_name][$main_model_primary_key])
            {

                $main_model_existed = true;
            }

            if($main_model_name === "BlAdministrator" && !$main_model_existed)
            {
                $this->main_data_models[$main_model_name]["password"] = Hash::make(str_random(20));
                $this->main_data_models[$main_model_name]["consumer_name"] = trim($this->main_data_models[$main_model_name]["last_name"] . " " . $this->main_data_models[$main_model_name]["first_name"] . " " . $this->main_data_models[$main_model_name]["middle_name"]);
            }

            $table_code = $main_model->models->table_code;
            $table_folder = $main_model->models->table_folder;

            $model_object = App::make("\App{$table_folder}\\{$table_code}");

            //            return $main_model;

            $this->use_db_area_l = $main_model->models->use_db_area_l;

            //            return $this->use_db_area_l ? 1 : 0;


            if($this->use_db_area_l && (!in_array("db_area_id", array_keys($this->main_data_models[$main_model_name])) || !$this->main_data_models[$main_model_name]["db_area_id"]))
                throw new \Exception("db_area_id was not found in model or is null. Model => " . json_encode($this->main_data_models[$main_model_name], JSON_UNESCAPED_UNICODE), 314);


            $table_name = $main_model->models->table_name;

            // Check if main model has parent models
            //            $parent_models = ControllerLink::query()->where([
            //                "controller_id" => $main_model->id,
            //                "parent_link_l" => 1
            //            ])
            //                ->whereIn("table_l", [0, 1])
            //                ->join("__Controllers as Controllers", "Controllers.id", "=", "__ControllerLinks.controller_id_link")
            //                ->join("__ModelTables", "__ModelTables.table_n", "=", "Controllers.controller_table_n")
            //                ->join("__Controllers as ParentControllers", "ParentControllers.id", "=",
            //                    "__ControllerLinks.controller_id_link")
            //                ->select("__ModelTables.table_name", "__ControllerLinks.table_field_name",
            //                    "__ControllerLinks.table_field_name_composite",
            //                    "__ModelTables.use_db_area_l", "__ControllerLinks.table_field_name",
            //                    "ParentControllers.controller_table_n")
            //                //                ->select("__ControllerLinks.*")
            //                //            ->select("__Controllers.*")
            //                ->get();

            $parent_models = ModelLink::query()
                ->where([
                    "__ModelLinks.table_n" => $main_model->controller_table_n,
                    "parent_link_l"        => 1
                ])
                ->whereIn("table_l", [0, 1])
                ->join("__ModelTables", "__ModelTables.table_n", "=", "__ModelLinks.table_n_link")
                ->select("__ModelTables.table_name", "__ModelLinks.table_field_name", "__ModelLinks.table_field_name_composite", "__ModelTables.use_db_area_l", "__ModelTables.table_n")
                //                ->select("__ControllerLinks.*")
                //            ->select("__Controllers.*")
                ->get();


            //                                return $parent_models;

            // Where array for main_model
            $where_array = [];

            $table_field_name_composites = $parent_models->pluck("table_field_name_composite")->toArray();

            $parent_models_index = 0;
            $parent_models_count = count($parent_models);

            if(in_array(null, $table_field_name_composites) && $parent_models_count > 1)
                throw new \Exception("Есть более одного типа подчиненности", 313);


            if($this->use_db_area_l)
            {
                $this->db_area_id = $this->main_data_models[$main_model_name]["db_area_id"];
                $where_array["db_area_id"] = $this->main_data_models[$main_model_name]["db_area_id"];
            }


            $parent_table_field_name_composite_found = true;

            if($parent_models_count > 0)
            {
                // Check for parent model related fields
                foreach($parent_models as $parent_model)
                {
                    $table_field_name_composite = $parent_model->table_field_name_composite;
                    if($table_field_name_composite)
                    {
                        if($this->main_data_models[$main_model_name][$table_field_name_composite] != $parent_model->table_n)
                        {
                            $parent_table_field_name_composite_found = false;
                            continue;
                        }

                        $parent_table_field_name_composite_found = true;
                        $where_array[$table_field_name_composite] = $this->main_data_models[$main_model_name][$table_field_name_composite];

                    }
                    $table_field_name = $parent_model->table_field_name;
                    $use_db_area_l = $parent_model->use_db_area_l;

                    if(!in_array($table_field_name, array_keys($this->main_data_models[$main_model_name])))
                        throw new \Exception("$table_field_name was not found in " . json_encode($this->main_data_models[$main_model_name], JSON_UNESCAPED_UNICODE), 308);

                    $temp_id = $this->main_data_models[$main_model_name][$table_field_name];

                    // Add table_field_name to check if model parent_field id was not changed
                    $where_array[$table_field_name] = $this->main_data_models[$main_model_name][$table_field_name];

                    $parent_model_record = DB::table($parent_model->table_name)->where("id", $temp_id)->first();


                    if(!$parent_model_record)
                        throw new \Exception("Record with $table_field_name = $temp_id was not found in $parent_model->table_name", 309);

                    if($use_db_area_l)
                    {
                        $this->parent_model_db_area_id = $parent_model_record->db_area_id;
                    }

                    if($parent_model->parent_link_l == 1 && $parent_model->table_l == false)
                    {
                        if(!$use_db_area_l && $this->use_db_area_l)
                            throw new \Exception("Parent model $parent_model->table_name use_db_area_l == false, main_model use_db_area_l == true", 322);

                        if($use_db_area_l)
                        {
                            // Check if parent_model db_area_id == main_model db_area_id
                            if($this->use_db_area_l && $this->db_area_id != $parent_model_record->db_area_id)
                                throw new \Exception("Parent model $parent_model->table_name db_area_id == $parent_model_record->db_area_id, main_model db_area_id == $this->db_area_id", 321);

                            $this->use_db_area_l = $use_db_area_l;
                            $this->db_area_id = $parent_model_record->db_area_id;
                        }

                    }
                    elseif($parent_model->parent_link_l == 1 && $parent_model->table_l == false)
                    {
                        if($this->use_db_area_l)
                            throw new \Exception("Главная модель является табличной частью и use_db_area_l == true", 324);

                        if($use_db_area_l)
                        {
                            $this->use_db_area_l = $use_db_area_l;
                            $this->db_area_id = $parent_model_record->db_area_id;
                        }
                        $this->mainModelIsTabularPart = true;

                    }
                    break;
                }
            }

            if(!$parent_table_field_name_composite_found)
                throw new \Exception("$table_field_name_composite is incorrect", 325);


            $result = $this->beforeWriteBe($bCancel);

            if($bCancel)
            {
                throw new \Exception($result["message"], 400);
            }


            $this->beforeWriteBeT($bCancel);

            $this->universalWriteBeT($bCancel);


            $this->checkForRelatedFields([$this->main_data_models[$main_model_name]], $main_model_name);


            $current_time = Carbon::now()->format("Y-m-d H:i:s");


            // Insert or Update main model

            $table_name = $main_model->models->table_name;

            $main_model_has_stored_file = $main_model->models->use_stored_file_l && isset($this->main_data_models[$main_model_name]["stored_file"]);

            if($main_model_has_stored_file)
            {
                $upload_array = $this->main_data_models[$main_model_name]["stored_file"];

                $upload_array["storedFile"]["table_n"] = $main_model->controller_table_n;

                $upload_array["storedFile"]["row_id"] = $this->main_data_models[$main_model_name][$main_model_primary_key];

                $upload_array["controller_alias"] = $main_model->controller_alias;

                $this->main_data_models[$main_model_name]["stored_file_id"] = $this->upload($upload_array);
                $stored_file_array = $this->main_data_models[$main_model_name]["stored_file"]["storedFile"];
            }


            $main_model_columns = DB::getSchemaBuilder()->getColumnListing($table_name);


            $this->clearModelColumns($this->main_data_models[$main_model_name], $main_model_columns);


            if($this->main_data_models[$main_model_name]["id"])
            {
                // Обновление данных
                $main_model_id = $this->main_data_models[$main_model_name]["id"];

                if(!in_array("updated_at", array_keys($this->main_data_models[$main_model_name])))
                    throw new \Exception("updated_at was not found in model fields. Model => " . json_encode($this->main_data_models[$main_model_name], JSON_UNESCAPED_UNICODE), 310);
                // If main model id is present (!= null)

                $where_array["id"] = $main_model_id;


                $main_model_record = $model_object->where($where_array)->first();


                // Если записи с заданым айди нет, то выдается ошибка
                if(!$main_model_record)
                    throw new \Exception("The model with given id was not found. Model => " . json_encode($this->main_data_models[$main_model_name], JSON_UNESCAPED_UNICODE), 301);

                //                if($main_model_record->updated_at != $this->main_data_models[$main_model_name]["updated_at"])
                //                {
                //                    $requery = true;
                //                    $message = "Данные устарели. Запись не произведена. Обновление данных";
                //                    throw new \Exception("Model data is not up to date. Model => " . json_encode($this->main_data_models[$main_model_name],
                //                            JSON_UNESCAPED_UNICODE), 312);
                //                }


                $this->main_data_models[$main_model_name]["updated_by"] = $user["consumer_code"];
                $this->main_data_models[$main_model_name]["updated_at"] = $current_time;
                //                return $this->main_data_models[$main_model_name];

                $update_array[$main_model_name] = [
                    "where"      => [
                        "id" => $main_model_id
                    ],
                    "table_name" => $table_name,
                    "fields"     => $this->main_data_models[$main_model_name]
                ];

                //                DB::table($table_name)->where("id", $main_model_id)
                //                    ->update($this->main_data_models[$main_model_name]);
            }
            else
            {
                // Вставка новых данных

                // Check if db_area_id exists

                if($this->use_db_area_l && !DbArea::where("id", $this->db_area_id)->exists())
                    throw new \Exception("db_area_id was not found in DbAreas table. Model => " . json_encode($this->main_data_models[$main_model_name], JSON_UNESCAPED_UNICODE), 315);


                $this->main_data_models[$main_model_name]["created_by"] = $user["consumer_code"];
                $this->main_data_models[$main_model_name]["updated_by"] = $user["consumer_code"];
                $this->main_data_models[$main_model_name]["created_at"] = $current_time;
                $this->main_data_models[$main_model_name]["updated_at"] = $current_time;

                $temp_id = $this->main_data_models[$main_model_name]["id"];

                // Unset "id" field from model to avoid postgresql error
                //                unset($this->main_data_models[$main_model_name]["id"]);

                //                return $this->main_data_models[$main_model_name];

                $insert_array[$main_model_name] = [
                    "table_name" => $table_name,
                    "fields"     => $this->main_data_models[$main_model_name]
                ];


                //                $main_model_id = DB::table($table_name)->insertGetId($this->main_data_models[$main_model_name]);
                //
                //                $this->main_data_models[$main_model_name]["id"] = $temp_id;
            }


            // Getting sub models with related field
            //            $controller_links = DB::table("__ControllerLinks")
            //                ->where([
            //                    "controller_id_link" => $main_model->id,
            //                    //                    "table_l" => 1,
            //                    "parent_link_l"      => 1
            //                ])
            //                ->join("__Controllers", "__Controllers.id", "=", "__ControllerLinks.controller_id")
            //                ->join("__ModelTables", "__ModelTables.table_n", "=", "__Controllers.controller_table_n")
            //                ->select(
            //                //                    "__ControllerLinks.controller_id", "__ControllerLinks.controller_id_link",
            //                    "__ControllerLinks.table_field_name", "__Controllers.controller_code",
            //                    "__Controllers.controller_alias",
            //                    "__ModelTables.table_name", "__ModelTables.use_db_area_l",
            //                    "__ModelTables.table_code", "__ModelTables.table_folder")
            //                ->get()->toArray();

            $model_links = DB::table("__ModelLinks")
                ->where([
                    "table_n_link" => $main_model->controller_table_n,
                    //                    "table_l" => 1,
                    "parent_link_l" => 1
                ])
                ->join("__ModelTables", "__ModelTables.table_n", "=", "__ModelLinks.table_n")
                ->join("__Controllers", "__Controllers.controller_table_n", "=", "__ModelTables.table_n")
                ->select(//                    "__ControllerLinks.controller_id", "__ControllerLinks.controller_id_link",
                    "__ModelLinks.table_field_name", "__Controllers.controller_code", "__Controllers.controller_alias", "__ModelTables.table_name", "__ModelTables.use_db_area_l", "__ModelTables.table_code", "__ModelTables.table_folder")
                ->get()
                ->toArray();

            //                        return $model_links;

            //                        return $model_links;

            if(count($model_links) > 0 && $this->mainModelIsTabularPart)
                throw new \Exception("Главная модель является табличной частью и у нее есть подчиненные модели", 325);

            // Table_name => local_key
            $sub_models = [];

            $count = count($model_links);

            for($i = 0; $i < $count; $i++)
            {
                $sub_models[$model_links[$i]->controller_alias] = [
                    "index"            => $i,
                    "table_name"       => $model_links[$i]->table_name,
                    "table_field_name" => $model_links[$i]->table_field_name,
                    "use_db_area_l"    => $model_links[$i]->use_db_area_l,
                    "table_code"       => $model_links[$i]->table_code,
                    "table_folder"     => $model_links[$i]->table_folder
                ];
            }

            // Массив табличной части для передачи в 1с

            $table_models = [];

            $can_send = true;

            foreach($this->main_data_models as $model_name => $model_elements)
            {
                if(in_array($model_name, array_keys($sub_models)))
                {
                    $table_models[$model_name] = Arr::where($model_elements, function($item)
                    {
                        return !isset($item["status"]) || (isset($item["status"]) && $item["status"] !== 3);
                    });;

                    $model_elements = Arr::where($model_elements, function($item)
                    {
                        return Arr::has($item, "status");
                    });


                    $this->checkForRelatedFields($model_elements, $model_name);

                    $table_name = $sub_models[$model_name]["table_name"];

                    $model_columns = DB::getSchemaBuilder()->getColumnListing($table_name);


                    $insert_array[$model_name][$table_name] = [];
                    $update_array[$model_name] = [];
                    $delete_array[$model_name] = [];


                    $current_sub_model = $sub_models[$model_name];

                    $local_key = $current_sub_model["table_field_name"];
                    $use_db_area_l = $current_sub_model["use_db_area_l"];

                    $temp_main_model_primary_key = $this->main_data_models[$main_model_name][$main_model_primary_key];

                    // If main_model use_db_area_l == false and current model use_db_area_l == true
                    if(!$this->use_db_area_l && $use_db_area_l)
                        throw new \Exception("$model_name use_db_area_l == true, $main_model_name use_db_area_l == false", 318);

                    $table_code = $current_sub_model["table_code"];
                    $table_folder = $current_sub_model["table_folder"];

                    $model_object = App::make("\App{$table_folder}\\{$table_code}");

                    foreach($model_elements as $model_element)
                    {
                        /**
                         * @var $status int
                         * 1 - отредактирован
                         * 2 - добавлен
                         * 3 - удалён
                         */
                        $status = $model_element["status"];

                        $this->clearModelColumns($model_element, $model_columns);

                        if(!array_key_exists($local_key, $model_element) || $model_element[$local_key] !== $temp_main_model_primary_key)
                        {
                            $temp_message = "Additional model local key is either not present or not equal to main_model_id, Expected value = $temp_main_model_primary_key. Got $local_key = ";
                            if(isset($model_element[$local_key]))
                                $temp_message .= $model_element[$local_key];
                            else
                                $temp_message .= "null";

                            throw new \Exception($temp_message, 304);
                        }
                        if($use_db_area_l)
                        {
                            if($model_element["db_area_id"] != $this->db_area_id)
                                throw new \Exception("$model_name db_area_id differ from main_model db_area_id. Got " . $model_element["db_area_id"] . " Expected $this->db_area_id", 319);
                        }

                        // Удален
                        if($status === 3)
                            //                        if(isset($model_element["to_be_deleted"]))
                        {
                            if(!isset($model_element["id"]) || !$model_element["id"])
                                throw new \Exception("No id is present in model with status === 3. Model => " . json_encode($model_element, JSON_UNESCAPED_UNICODE), 305);

                            $model_element_id = $model_element["id"];

                            $model_element_record = $model_object->where([
                                "id"       => $model_element_id,
                                $local_key => $model_element[$local_key]
                            ])->first();


                            if(!$model_element_record)
                                throw new \Exception("The model with given id was not found. Model => " . json_encode($model_element, JSON_UNESCAPED_UNICODE), 301);

                            if(!in_array("updated_at", array_keys($model_element)))
                                throw new \Exception("updated_at was not found in model fields. Model => " . json_encode($model_element, JSON_UNESCAPED_UNICODE), 310);

                            if($use_db_area_l)
                            {
                                if($model_element_record->db_area_id != $model_element["db_area_id"])
                                    throw new \Exception("$model_name db_area_id differ from table value. Got " . $model_element["db_area_id"] . " Expected $model_element_record->db_area_id", 320);
                            }

                            array_push($delete_array[$model_name], [
                                "table_name" => $table_name,
                                "where"      => [
                                    "id"       => $model_element["id"],
                                    $local_key => $model_element[$local_key]
                                ]
                            ]);

                            //                            DB::table($table_name)->where([
                            //                                "id" => $model_element["id"],
                            //                                $local_key => $model_element[$local_key]
                            //                            ])->delete();

                            continue;
                        }


                        if($model_element["id"])
                        {
                            if(!$main_model_existed)
                                throw new \Exception("Id can only be NULL", 302);

                            if($status !== 1)
                                throw new \Exception("У элемента с id !== null статус может равняться только 1 (отредактирован)");

                            // Обновление данных
                            $model_element_id = $model_element["id"];

                            $model_element_record = $model_object->where([
                                "id"       => $model_element_id,
                                $local_key => $model_element[$local_key]
                            ])->first();


                            if(!$model_element_record)
                                throw new \Exception("The model with given id was not found. Model => " . json_encode($model_element, JSON_UNESCAPED_UNICODE), 301);


                            if(!in_array("updated_at", array_keys($model_element)))
                                throw new \Exception("updated_at was not found in model fields. Model => " . json_encode($model_element, JSON_UNESCAPED_UNICODE), 310);

                            if($use_db_area_l)
                            {
                                if($model_element_record->db_area_id != $model_element["db_area_id"])
                                    throw new \Exception("$model_name db_area_id differ from table value. Got " . $model_element["db_area_id"] . " Expected $model_element_record->db_area_id", 320);
                            }

                            //                            if($model_element_record->updated_at != $model_element["updated_at"])
                            //                            {
                            //                                $requery = true;
                            //                                $message = "Данные устарели. Запись не произведена. Обновление данных";
                            //                                throw new \Exception("Model data is not up to date. Model => " . json_encode($model_element,
                            //                                        JSON_UNESCAPED_UNICODE), 312);
                            //                            }

                            $model_element["updated_by"] = $user["consumer_code"];
                            $model_element["updated_at"] = $current_time;

                            array_push($update_array[$model_name], [
                                "table_name" => $table_name,
                                "where"      => [
                                    "id"       => $model_element_id,
                                    $local_key => $model_element[$local_key]
                                ],
                                "fields"     => $model_element
                            ]);

                            //                            DB::table($table_name)->where([
                            //                                "id" => $model_element_id,
                            //                                $local_key => $model_element[$local_key]
                            //                            ])->update($model_element);
                        }
                        else
                        {
                            // Вставка новых данных

                            $can_send = false;

                            if($status !== 2)
                                throw new \Exception("У элемента с id === null статус может равняться только 2 (добавлен)");

                            $model_element["created_by"] = $user["consumer_code"];
                            $model_element["updated_by"] = $user["consumer_code"];
                            $model_element["created_at"] = $current_time;
                            $model_element["updated_at"] = $current_time;

                            $model_element[$local_key] = $main_model_id;

                            unset($model_element["id"]);

                            $to_insert = [
                                "fields" => $model_element
                            ];
                            if(!$main_model_existed)
                                $to_insert["local_key"] = $local_key;

                            array_push($insert_array[$model_name][$table_name], $to_insert);
                        }
                    }
                }
            }
            [$write_n, $db_block] = $this->getWriteN($main_model);

            $oneC = [
                "form_parameters"  => [
                    "form_base_data_model" => $main_model_name
                ],
                "main_data_models" => array_merge([
                    $main_model_name => [
                        $this->main_data_models[$main_model_name]
                    ]
                ], $table_models),
                "db_block"         => $db_block
            ];

            DB::beginTransaction();

            if($write_n === 1 || ($request->has("send_key") && $request->input("send_key") == true))
            {
                if(!$main_model_existed)
                    throw new \Exception("write_n == 1. Id null. Отправка невозможна");

                $this->sendTo1C($oneC);
                DB::commit();

                return $this->generateReturnJSON([
                    "error"         => false,
                    "code"          => 200,
                    "message"       => "Данные записаны",
                    "admin_message" => "Данные записаны",
                    "requery"       => true,
                    "id"            => $main_model_id,
                    "controller_id" => $main_model->id,
                    "consumer_id"   => $user["id"],
                    "consumer_code" => $user["consumer_code"]
                ], false);
            }
            elseif($write_n == 2)
            {
                if($main_model_existed && $can_send)
                {
                    $this->sendTo1C($oneC);
                }
            }


            //            DB::beginTransaction();

            // Inserting data
            foreach($insert_array as $model_name => $data)
            {
                if($model_name == $main_model_name)
                {
                    unset($data["fields"]["id"]);

                    if(isset($data["fields"]["password"]))
                    {
                        $data["fields"]["password"] = bcrypt($data["fields"]["password"]);
                    }

                    $main_model_id = DB::table($data["table_name"])->insertGetId($data["fields"]);

                    $this->main_data_models[$main_model_name]["id"] = $main_model_id;
                    $oneC["main_data_models"][$main_model_name][0]["id"] = $main_model_id;
                }
                else
                {
                    foreach($data as $table_name => $elements)
                    {
                        if($main_model_existed)
                        {
                            foreach($elements as $element)
                            {
                                $child_model_id = DB::table($table_name)->insertGetId($element["fields"]);

                                foreach($oneC["main_data_models"][$model_name] as &$data_model)
                                {
                                    if(is_null($data_model["id"]))
                                    {
                                        $data_model["id"] = $child_model_id;
                                        break;
                                    }
                                }
                            }
                        }
                        else
                        {
                            foreach($elements as $index => $element)
                            {
                                $elements[$index]["fields"][$element["local_key"]] = $main_model_id;
                                $elements[$index] = $elements[$index]["fields"];


                                $child_model_id = DB::table($table_name)->insertGetId($elements[$index]);

                                foreach($oneC["main_data_models"][$model_name] as &$data_model)
                                {
                                    if(is_null($data_model["id"]))
                                    {
                                        $data_model["id"] = $child_model_id;
                                        break;
                                    }
                                }

                            }
                        }
                    }
                }
            }

            // Updating data
            foreach($update_array as $model_name => $data)
            {
                if($model_name == $main_model_name)
                {

                    DB::table($data["table_name"])->where($data["where"])->update($data["fields"]);
                }
                else
                {
                    foreach($data as $element)
                    {
                        DB::table($element["table_name"])->where($element["where"])->update($element["fields"]);
                    }
                }
            }

            // Deleting data
            foreach($delete_array as $model_name => $elements)
            {
                foreach($elements as $element)
                {
                    DB::table($element["table_name"])->where($element["where"])->delete();
                }
            }


            if($write_n == 2 && (!$main_model_existed || !$can_send))
            {
                $this->sendTo1C($oneC);
            }


            $this->main_model_existed = $main_model_existed;
            $this->main_model_id = $main_model_id;

            $result = $this->onWriteBeT($bCancel);

            if($bCancel)
                throw new \Exception($result["message"], 400);


            $this->posting($bCancel);

            $this->onWriteBeTL($bCancel);

            DB::commit();

        } // SQL Errors
        catch(QueryException $exception)
        {
            DB::rollBack();

            $this->onWriteError($request);

            $user = Auth::user()->only("id", "consumer_code");

            return $this->generateReturnJSON([
                "error"         => true,
                "code"          => $exception->getCode(),
                "message"       => "Ошибка записи в базу данных",
                "admin_message" => $exception->getMessage(),
                "requery"       => false,
                "id"            => null,
                "controller_id" => $main_model->id,
                "consumer_id"   => $user["id"],
                "consumer_code" => $user["consumer_code"]
            ], true);
        } // Custom Errors
        catch(\Exception $exception)
        {
            DB::rollBack();

            $this->onWriteError($request);

            //            return $exception->getTrace();

            return $this->generateReturnJSON([
                "error"         => true,
                "code"          => $exception->getCode(),
                "message"       => $message,
                "admin_message" => $exception->getMessage(),
                "requery"       => $requery,
                "id"            => $main_model_id,
                "controller_id" => $main_model->id,
                "consumer_id"   => $user["id"],
                "consumer_code" => $user["consumer_code"]
            ], false);
        }

        // If main_model_name !== Consumers, then we return full model
        if($main_model_has_stored_file && $main_model_name !== "Consumers")
        {
            if(!$main_model_existed)
                StoredFileManager::updateRowId($this->main_data_models[$main_model_name]["stored_file_id"], $main_model_id);

            $this->main_data_models[$main_model_name] = array_merge($this->main_data_models[$main_model_name], $stored_file_array);
            $this->main_data_models[$main_model_name]["mime"] = null;

            $file_size = $this->main_data_models[$main_model_name]["size"];

            $this->main_data_models[$main_model_name]["size"] = FileManager::convertBytesToString($file_size);

            return $this->main_data_models[$main_model_name];
        }

        $result = $this->afterWriteBe($bCancel, $request);

        if($bCancel)
        {
            return $this->generateReturnJSON([
                "error"         => true,
                "code"          => 400,
                "message"       => $result["message"],
                "admin_message" => $result["admin_message"],
                "requery"       => $result["requery"] ?? false,
                "id"            => $main_model_id,
                "controller_id" => $main_model->id,
                "consumer_id"   => $user["id"],
                "consumer_code" => $user["consumer_code"],
                "status"        => $result["status"] ?? null,
                "template"      => $result["template"],
                "position"      => $result["position"],
            ], false);
        }

        return $this->generateReturnJSON([
            "error"         => false,
            "code"          => 200,
            "message"       => "Данные записаны",
            "admin_message" => "Данные записаны",
            "requery"       => true,
            "id"            => $main_model_id,
            "controller_id" => $main_model->id,
            "consumer_id"   => $user["id"],
            "consumer_code" => $user["consumer_code"]
        ], false);
    }

    // ---
    public final function deleteMark(Request $request)
    {
        return $this->updateTableFields($request, "deleted_l", 1, "deleteMark");
    }

    protected final function undeleteMark(Request $request)
    {
        return $this->updateTableFields($request, "deleted_l", 0, "unDeleteMark");
    }

    protected final function actualMark(Request $request)
    {
        return $this->updateTableFields($request, "actual_l", 1, "actual");
    }

    protected final function unactualMark(Request $request)
    {
        return $this->updateTableFields($request, "actual_l", 0, "unActual");
    }

    private function getModelByControllerAlias($controller_alias)
    {
        // Get controller_table_n from __Controllers

        $data = \App\Models\Controller::where("controller_alias", $controller_alias)->with([
            'models' => function($query)
            {
                $query->select('id', 'table_n', 'table_name', 'table_code', 'table_folder');
            }
        ])->get()->first();

        return ($data->models->table_folder && $data->models->table_code && $data->models->table_name) ? [
            $data->models->table_folder,
            $data->models->table_code,
            $data->models->table_name
        ] : null;
    }

    /**
     * @param Request $request
     * @param string $column
     * @param mixed $value
     * @param string $method
     * @return JsonResponse
     * @throws \Exception
     */
    private function updateTableFields($request, $column, $value, $method)
    {
        foreach($request->toArray() as $model_name => $items)
        {
            $controller_alias = $model_name;

            $ids_array = $items;

            $nameControllerMethod = [
                'controller'      => class_basename(Route::current()->controller),
                'method'          => $method,
                'controllerAlias' => $controller_alias
            ];

            $objAccess = (new CheckController($nameControllerMethod));

            $access = $objAccess->checkControllerAccessRight();

            if(!$access)
                return response()->json([
                    "message" => "Permission denied",
                    "error"   => true
                ], 400);


            [$table_folder, $table_code, $table_name] = $this->getModelByControllerAlias($controller_alias);

            $model = App::make("\App{$table_folder}\\{$table_code}");

            // Если название таблицы не найдено
            if(is_null($table_folder) || is_null($table_code) || is_null($table_name))
                return response()->json([
                    "message" => "Incorrect main_model",
                    "error"   => true
                ], 400);

            // Проверка есть ли поле deleted_l или actual_l в таблице
            if(!in_array($column, DB::getSchemaBuilder()->getColumnListing($table_name)))
            {
                return response()->json([
                    "message" => "Отсутствует колонка $column в $controller_alias",
                    "error"   => true
                ], 400);
            }
            DB::beginTransaction();

            try
            {
                $model->whereIn("id", $ids_array)->update([$column => $value]);

                DB::commit();
            }
            catch(\Exception $exception)
            {
                DB::rollback();

                return response()->json([
                    "message" => "Error while updating table",
                    "error"   => true
                ], 400);
            }
        }

        return response()->json([
            "message" => "Обновлено",
            "error"   => false
        ]);
    }

    private final function deleteOne($model_name, $items)
    {
        $ids = is_array($items) ? $items : [$items];

        $nameControllerMethod = [
            'controller'      => class_basename(Route::current()->controller),
            'method'          => "delete",
            'controllerAlias' => $model_name
        ];

        $controller = \App\Models\Controller::query()
            ->where("controller_alias", $model_name)
            ->with("models")
            ->get()
            ->first();

        $objAccess = (new CheckController($nameControllerMethod));


        $access = $objAccess->checkControllerAccessRight();

        if(!$access)
            return response()->json([
                "message" => "Нет доступа",
                "error"   => true
            ], 400);


        $model = App::make("\App{$controller->models->table_folder}\\{$controller->models->table_code}");

        $action_type_id = ActionType::where("action_type_code", "delete")->select("id")->first();

        $user = Auth::user();

        DB::beginTransaction();

        try
        {
            if($controller->models->use_stored_file_l)
            {
                $model_ids = $model->query()->whereIn("id", $ids)->pluck("stored_file_id")->toArray();
            }

            $model->whereIn("id", $ids)->delete();

            if($model_name == "DbAreaFiles")
            {
                StoredFileManager::deleteFiles($model_ids);
            }

            DB::commit();

            if(!$model instanceof ActionLog)
            {
                foreach($ids as $id)
                {

                    $create_array = [
                        "controller_id"         => $controller->id,
                        "consumer_id"           => $user->id,
                        "action_type_id"        => $action_type_id["id"],
                        "row_id"                => $id,
                        "action_log_error_l"    => false,
                        "action_log_message"    => $model_name . " с айди " . $id . " был успешно удален",
                        "created_by"            => $user->consumer_code,
                        "updated_by"            => $user->consumer_code,
                        "action_log_error_code" => null,
                        'remote_addr'           => request()->server('REMOTE_ADDR'),
                        'http_referer'          => request()->server('HTTP_REFERER'),
                        'redirect_url'          => request()->server('REDIRECT_URL'),
                        'request_method'        => request()->server('REQUEST_METHOD'),
                        'http_user_agent'       => request()->server('HTTP_USER_AGENT'),
                    ];

                    ActionLog::create($create_array);
                }
            }


        }
        catch(\Exception $exception)
        {

            DB::rollback();

            $create_array = [
                "controller_id"         => $controller->id,
                "consumer_id"           => $user->id,
                "action_type_id"        => $action_type_id["id"],
                "action_log_error_l"    => true,
                "action_log_message"    => "Ошибка при удалении $model_name с айди " . json_encode($ids),
                "created_by"            => $user->consumer_code,
                "updated_by"            => $user->consumer_code,
                "action_log_error_code" => null,
                'remote_addr'           => request()->server('REMOTE_ADDR'),
                'http_referer'          => request()->server('HTTP_REFERER'),
                'redirect_url'          => request()->server('REDIRECT_URL'),
                'request_method'        => request()->server('REQUEST_METHOD'),
                'http_user_agent'       => request()->server('HTTP_USER_AGENT'),
            ];

            ActionLog::create($create_array);

            return response()->json([
                "message" => "Ошибка при удалении",
                "error"   => true
            ], 400);
        }

        return response()->json([
            "message" => "Успешно удалено",
            "requery" => true,
            "error"   => false
        ]);
    }

    public final function delete(Request $request)
    {
        foreach($request->toArray() as $model_name => $items)
        {
            $result = $this->deleteOne($model_name, $items);

            if(isset($request["error"]) && $result["error"] === true)
                return $result;
        }

        return response()->json([
            "message" => "Успешно удалено",
            "requery" => true,
            "error"   => false
        ]);
    }


    public function getButtonsList($fe_set_codes = null)
    {
        $user = Auth::user();

        if ($user == null){
            return [];
        }

        $id = $user->id;
        $consumer_is_system_n = $user->consumer_is_system_n;


        $controller_name = class_basename(Route::current()->controller);

        // Getting buttons with __FeSetsItems.action_type == null

        $items = DB::table("__FeSets as FeSets")
            ->join("__FeSetsItems as FeSetsItems", function($join)
            {
                $join->on("FeSetsItems.fe_set_id", "=", "FeSets.id")->whereNull("FeSetsItems.action_type_id");
            })
            ->join("__Controllers as Controllers", function($join) use ($controller_name)
            {
                $join->where("Controllers.controller_code", "=", $controller_name);
            })
            ->leftJoin("__FeSetsItemsControllers as FeSetsItemsController", function($join)
            {
                $join->on("FeSetsItemsController.fe_set_item_id", "=", "FeSetsItems.id")
                    ->on("FeSetsItemsController.controller_id", "=", "Controllers.id")
                    ->where("FeSetsItems.use_fe_set_item_controller_l", true);
            })
            ->join("__FeItems as FeItems", "FeItems.id", "=", "FeSetsItems.fe_item_id")
            ->leftJoin("__FeCssClasses as FeCssClasses", "FeCssClasses.id", "=", "FeSetsItems.fe_css_class_id")
            ->leftJoin("Images", "Images.id", "=", "FeSetsItems.image_id")
            ->select("FeSets.fe_set_code", "FeSetsItems.id as fe_sets_items_id", "FeSetsItems.use_fe_set_item_controller_l", "FeSetsItems.execute_fe_action_l", "FeSetsItems.caption_code", "FeSetsItems.fe_set_item_code", "FeItems.fe_item_code", "FeSetsItemsController.id as fe_sets_items_controller_id", "FeCssClasses.fe_css_class_code", "Images.image_path", "FeSetsItems.line_n")
            ->groupBy("FeSets.fe_set_code", "FeSetsItems.id", "FeSetsItems.use_fe_set_item_controller_l", "FeSetsItems.execute_fe_action_l", "FeSetsItems.caption_code", "FeSetsItems.fe_set_item_code", "FeItems.fe_item_code", "FeSetsItemsController.id", "FeCssClasses.fe_css_class_code", "Images.image_path");


        // Getting buttons with __FeSetsItems.action_type_id != null

        $items_to_merge = DB::table("__FeSets as FeSets")
            ->join("__FeSetsItems as FeSetsItems", function($join)
            {
                $join->on("FeSetsItems.fe_set_id", "=", "FeSets.id")->whereNotNull("FeSetsItems.action_type_id");
            })
            ->leftJoin("__FeCssClasses as FeCssClasses", "FeCssClasses.id", "=", "FeSetsItems.fe_css_class_id")
            ->join("__Controllers as Controllers", function($join) use ($controller_name)
            {
                $join->where("Controllers.controller_code", "=", $controller_name);
            });

        if($consumer_is_system_n !== 1)
        {
            $items_to_merge = $items_to_merge->join("_ConsumerAccessRoles as ConsumerAccessRoles", function($join) use (
                $id
            )
            {
                $join->where("ConsumerAccessRoles.consumer_id", "=", $id);
            })->join("_AccessRightByRoles as AccessRightByRoles", function($join)
            {
                $join->on("AccessRightByRoles.access_role_id", "=", "ConsumerAccessRoles.access_role_id");
                $join->on("AccessRightByRoles.controller_id", "=", "Controllers.id");
            });
        }
        $items_to_merge = $items_to_merge->join("__ActionTypes as ActionTypes", function($join) use (
            $consumer_is_system_n
        )
        {
            $join->on("ActionTypes.id", "=", "FeSetsItems.action_type_id");

            if($consumer_is_system_n !== 1)
                $join->on("ActionTypes.access_right_id", "=", "AccessRightByRoles.access_right_id");
        })
            ->leftJoin("BeRoutes", function($join)
            {
                $join->on("BeRoutes.action_type_id", "=", "ActionTypes.id")
                    ->on("BeRoutes.controller_id", "=", "Controllers.id")
                    ->orOn("BeRoutes.action_type_id", "=", "ActionTypes.id")
                    ->on("BeRoutes.controller_id", "=", DB::raw("'110'"));
            })
            ->leftJoin("__FeSetsItemsControllers as FeSetsItemsController", function($join)
            {
                $join->on("FeSetsItemsController.fe_set_item_id", "=", "FeSetsItems.id")
                    ->on("FeSetsItemsController.controller_id", "=", "Controllers.id")
                    ->where("FeSetsItems.use_fe_set_item_controller_l", true);
            })
            ->join("__FeItems as FeItems", "FeItems.id", "=", "FeSetsItems.fe_item_id")
            ->leftJoin("Images", "Images.id", "=", "FeSetsItems.image_id")
            ->select("FeSets.fe_set_code", "FeSetsItems.id as fe_sets_items_id", "FeSetsItems.execute_fe_action_l", "BeRoutes.be_route_code", "FeSetsItems.caption_code", "FeSetsItems.fe_set_item_code", "FeItems.fe_item_code", "FeCssClasses.fe_css_class_code", "Images.image_path", "FeSetsItems.use_fe_set_item_controller_l", "FeSetsItemsController.id as fe_sets_items_controller_id", "FeSetsItems.line_n")
            ->groupBy("FeSets.fe_set_code", "FeSetsItems.id", "FeSetsItems.execute_fe_action_l", "BeRoutes.id", "FeSetsItems.caption_code", "FeSetsItems.fe_set_item_code", "FeItems.fe_item_code", "FeCssClasses.fe_css_class_code", "Images.image_path", "FeSetsItemsController.id")
            ->whereNotNull("ActionTypes.access_right_id");

        //        return $items_to_merge->select("BeRoutes.*")->groupBy("BeRoutes.id")
        //            ->get();


        if($fe_set_codes)
        {
            if(!is_array($fe_set_codes))
                $fe_set_codes = [$fe_set_codes];

            $items = $items->whereIn("FeSets.fe_set_code", $fe_set_codes);
            $items_to_merge = $items_to_merge->whereIn("FeSets.fe_set_code", $fe_set_codes);
        }

        $items = $items->get();

        $items_to_merge = $items_to_merge->get();


        $items = $items->merge($items_to_merge);

        $caption_codes = array_filter($items->pluck("caption_code")->toArray(), 'strlen');

        $items = $items->toArray();

        usort($items, function($item1, $item2)
        {
            return $item1->line_n <=> $item2->line_n;
        });


        $getCaptionArray = $this->getTranslateByKeys($caption_codes);


        $buttons = [];

        if(is_null($fe_set_codes))
            $this->mapButtons($items, $buttons, $getCaptionArray);
        else
        {
            foreach($fe_set_codes as $fe_set_code)
            {
                $found_items = Arr::where($items, function($item) use ($fe_set_code)
                {
                    return $item->fe_set_code == $fe_set_code;
                });

                $this->mapButtons($found_items, $buttons, $getCaptionArray);
            }
        }


        return $buttons;
    }

    private function mapButtons($items, &$buttons, $getCaptionArray)
    {
        array_map(function($item) use (&$buttons, $getCaptionArray)
        {
            if($item->use_fe_set_item_controller_l && is_null($item->fe_sets_items_controller_id))
                return;

            if(!isset($buttons[$item->fe_set_code]))
                $buttons[$item->fe_set_code] = [];


            $obj = new \stdClass();

            $obj->code = $item->fe_set_item_code;
            $obj->class = $item->fe_css_class_code;
            $obj->link = $item->be_route_code ?? null;
            $obj->img = $item->image_path;


            if($item->caption_code)
            {
                $obj->title = $getCaptionArray[$item->caption_code]['translation_captions']['caption_translation'] ?? null;
            }
            else
            {
                $obj->title = null;
            }

            $obj->type = $item->fe_item_code;
            $obj->execute_fe_action_l = $item->execute_fe_action_l;

            array_push($buttons[$item->fe_set_code], $obj);
        }, $items);
    }


    //+++Перенес 26.06.2019
    //+++03.05.2019 Miniyar
    //+DUFiles

    public final function download(Request $request)
    {
        //+++ ЗубановИА добавил проверку на доступность метода download
        $controller_alias = $request->main_model;

        $nameControllerMethod = [
            'controller'      => class_basename(Route::current()->controller),
            'method'          => "download",
            'controllerAlias' => $controller_alias
        ];

        $objAccess = (new CheckController($nameControllerMethod));

        $access = $objAccess->checkControllerAccessRight();

        if(!$access)
            return response()->json([
                "message" => "Нет доступа",
                "error"   => true
            ], 400);
        //--- ЗубановИА добавил проверку на доступность метода download

        $main_model = \App\Models\Controller::query()
            ->where("controller_alias", $request["main_model"])
            ->with("models")
            ->get()
            ->first();


        if(!$main_model->models->use_stored_file_l)
            return response()->json([
                "error"   => true,
                "message" => "This model does not have stored files"
            ], 400);

        $ids = $request["items"] ? $request["items"] : [$request["id"]];

        if(is_null($ids[0]))
            return response()->json([
                "error"   => true,
                "message" => "Выберите элементы для скачивания"
            ], 400);

        $models_record = DB::table($main_model->models->table_name)->whereIn("id", $ids)->get();

        if(!$models_record)
            return response()->json([
                "error"   => true,
                "message" => "No record was found"
            ], 400);

        $models_record_count = $models_record->count();

        $captionName = ["FileNotFound", "FileUploaded"];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        if($models_record_count == 1)
        {
            $file_data = StoredFileManager::downloadFile($models_record[0]->stored_file_id, $main_model->models->table_n);

            if(isset($file_data["error"]) && $file_data["error"] == true)
                return response()->json([
                    "error"   => "true",
                    "message" => $getArrayCaptions['FileNotFound']['translation_captions']['caption_translation']
                ], 400);

            $return_data = array_merge($file_data, [
                "message" => $getArrayCaptions['FileUploaded']['translation_captions']['caption_translation']
            ]);

            return response()->json($return_data, 200, [
                'Content-Type'        => 'application/octet-stream',
                'Content-Disposition' => 'attachment;filename=\"files.zip\"'
            ]);
        }
        else
        {
            $uniq_name = uniqid(time());
            $zip_file_name = "/temp/" . $uniq_name . ".zip";

            Storage::disk('public')->put($zip_file_name, base64_decode("UEsFBgAAAAAAAAAAAAAAAAAAAAAAAA=="));


            $zip = new \ZipArchive();
            $zip->open(storage_path() . "/app/public" . $zip_file_name);

            foreach($models_record as $model_record)
            {
                $file_data = StoredFileManager::downloadFile($model_record->stored_file_id, $main_model->models->table_n);

                if(isset($file_data["error"]) && $file_data["error"] == true)
                    return response()->json([
                        "error"   => true,
                        "message" => $getArrayCaptions['FileNotFound']['translation_captions']['caption_translation']
                    ], 400);

                $zip->addFromString($file_data["name"] . "." . $file_data["extension"], base64_decode($file_data["file"]));
            }
            // To actually save the archive you have to put some file/dir into it
            //            $zip->addFromString('tmp', '');
            $zip->close();


            $zip_file = Storage::disk('public')->get($zip_file_name);
            $zip_file_size = Storage::disk('public')->getSize($zip_file_name);

            $file_type = FileType::query()
                ->where("file_type_code", "zip")
                ->select("id", "file_type_mime")
                ->get()
                ->first();


            $return_data = [
                "name"      => "files",
                "extension" => "zip",
                "mime"      => "data:" . $file_type->file_type_mime . ";base64",
                //                "size"      => filesize(storage_path() . "/app/public" . $zip_file_name),
                "file"      => base64_encode($zip_file)
            ];

            $return_data = array_merge($return_data, [
                "message" => $getArrayCaptions['FileUploaded']['translation_captions']['caption_translation']
            ]);

            //            Storage::disk('public')->delete($zip_file_name);


            return response()->json($return_data, 200, [
                'Content-Type'        => 'application/octet-stream',
                'Content-Disposition' => 'attachment;filename=\"files.zip\"'
            ]);
        }

        //        $dbAreaFileId = $request['id'];
        //
        //        $storedFileId = DbAreaFile::where('id', $dbAreaFileId)->pluck('stored_file_id')->first();
        //        return response()->json(StoredFileManager::downloadFile($storedFileId));
    }


    public final function upload($request)
    {
        return StoredFileManager::uploadFile($request);
    }


    //-DUFiles
    //---03.05.2019 Miniyar
    //---Перенес 26.06.2019

    /**
     * @param $server_url
     * @param $db_code
     * @param $url
     * @param $data_array
     * @param string $token
     * @param int $port
     * @return mixed
     * @throws GuzzleException
     */
    public function sendRequestTo1C($server_url, $db_code, $url, $data_array, $token = "", $port = 80)
    {
        if(is_null($port))
            $port = 80;
        $serverUrl = $server_url . ":" . $port . '/' . $db_code;
        $host = request()->root();
        $host = preg_replace('#^https?://#', '', rtrim($host, '/'));
        $client = new Client();

        $res = $client->request('POST', $serverUrl . $url, [
            'json'    => $data_array,
            //'auth' => ['WebCabinetEN', 'WebCabinet'],
            'headers' => [
                'Referer' => "$host",
                'token'   => $token
            ]
        ]);

        $resArray = \GuzzleHttp\json_decode($res->getBody());

        return $resArray;
    }

    public function isAdmin()
    {
        $user = Auth::user();

        if(!$user)
            return false;

        return $user->consumer_is_system_n == 1;
    }

    //+++30.08.2019 Miniyar
    public function isManager()
    {
        $user = Auth::user();

        if(!$user)
            return false;

        $access_role = ConsumerAccessRole::query()->where([
            "consumer_id" => $user->id,
            "main_l"      => true
        ])->first();

        if(is_null($access_role))
            return false;

        return $access_role->access_role_id == self::getParameter("DefaultManagerAccessRole");
    }

    public function isUser()
    {
        $user = Auth::user();

        if(!$user)
            return false;

        return $user->IsAdmin == 2;
    }

    //---30.08.2019 Miniyar


    public function sendRequest(Request $request)
    {
        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->with("models")
            ->get()
            ->first();

        $write_request = $request->all();

        $bl_status = BlStatus::query()->where([
            "bl_status_name" => "Отправлен",
            "db_area_id"     => self::getDefaultDBAreaId()
        ])->select("id")->get()->first();

        $record = DB::table($controller->models->table_name)
            ->where("id", $write_request["main_data_models"][$controller->controller_alias][0]["id"])
            ->first();

        if($record->sent_l === true)
        {
            return response()->json([
                "error"   => true,
                "requery" => false,
                "code"    => 400,
                "message" => "Объект был ранее отправлен"
            ], 400);
        }

        $write_request["main_data_models"][$controller->controller_alias][0]["sent_l"] = true;
        $write_request["main_data_models"][$controller->controller_alias][0]["bl_status_id"] = $bl_status->id;

        $write_request = new Request($write_request);

        $write_result = $this->write($write_request);

        return $write_result;
    }

    // После записи данных с 1С
    public function afterRequestForDataChanges()
    {

    }
}
