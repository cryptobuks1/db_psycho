<?php

namespace App\Http\Controllers\Api\AttachedFiles;

use App\Models\BL\BlRequiredDocument;
use App\Models\DbAreaFile;
use App\Models\RequiredDocumentKind;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\DB;

class DbAreaFilesController extends Controller
{
    //+++28.03.2019 Miniyar

    /*public function deleteMark(Request $request)
    {
        //todo После согласования структуры запроса перенести изменения
//        $fileId = $request->request->all();
//        $file = DbAreaFile::where('id', $fileId['id'])->first();
//        $file->deleted_l = !$file->deleted_l;
//        $file->save();
//        return 1;
    }*/

    public function insert()
    {

    }

    public function update()
    {

    }

    /*public function delete(){

    }*/

    public function list(Request $request)
    {
        //        ->with(["dbAreaFiles"])
        $documents = BlRequiredDocument::query()->with(["dbAreaFiles"])
            ->join("BlAttachedDocumentKinds as a", "a.id", "=", "BlRequiredDocuments.bl_att_doc_kind_id")
            ->select(["BlRequiredDocuments.*", "a.bl_att_doc_kind_name as att_doc_kind_name", DB::raw("true as required_document_l")])
            ->get()->toArray();


//        return $documents;

        $empty_file = [
            "bl_att_doc_kind_id" => "",
            "created_at"         => "",
            "created_by"         => "",
            "db_area_file_name"  => "",
            "db_area_id"         => "",
            "deleted_l"          => "",
            "id"                 => null,
            "row_id_doc"         => "",
            "row_id_owner"       => "",
            "stored_file_id"     => "",
            "table_n_doc"        => "",
            "table_n_owner"      => "",
            "uid_1c_code"        => "",
            "updated_at"         => "",
            "updated_by"         => ""
        ];

        foreach($documents as &$document)
        {
            $empty_file["bl_att_doc_kind_id"] = $document["bl_att_doc_kind_id"];
            array_unshift($document["db_area_files"], $empty_file);
        }

        $files = DbAreaFile::where("bl_att_doc_kind_id", null)->get()->toArray();

        array_push($documents, [
            "att_doc_kind_name" => "Другие файлы",
            "db_area_files"     => $files
        ]);

        //        $other_files = collect([
        //            "attached_document_kind" => [
        //                "att_doc_kind_name" => "Другие файлы",
        //            ],
        //            "db_area_files"          => $files
        //        ]);

        //        $documents = $documents->merge($other_files);

        $res = [];

        $list = [
            "main_data_models" => [
                "BlRequiredDocuments" => $documents,
            ],
            "form_parameters"  => [
                'disable_inputs'                => false,
                'form_base_data_model'          => "BlRequiredDocuments",
                'form_code'                     => "BlRequiredDocuments",
                'form_is_dependent'             => false,
                'form_main_data_model_id_field' => "id",
                'form_main_data_model_name'     => "",
                'form_title'                    => "Файлы",
                'form_type'                     => "card",
            ]
        ];

        return response()->json($list);
    }

    public function card()
    {

    }

    //---28.03.2019 Miniyar
}
