<?php

namespace App\Http\Controllers\Api\BL;

use App\Http\Traits\DbAreaFilesHelper;
use App\Models\BL\BlCustomerRequest;
use App\Models\BL\BlLeasingContract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlLeasingContractsDbAreaFilesController extends Controller
{
    use DbAreaFilesHelper;

    public function list(Request $request)
    {
        try
        {
            $this->setControllerCode("BlLeasingContractsController")
                ->setCheckForTableNOwner(false)
                ->checkForController()
                ->setModel(BlLeasingContract::class)
                ->setModelRecord("Incorrect leasing contract")
                ->setOwnerAndDocParams([
                    "table_n_doc" => $this->controller["controller_table_n"],
                    "row_id_doc"  => $this->id,
                ]);

            $files_where_array = [
                "DbAreaFiles.db_area_id"  => $this->db_area_id,
                "DbAreaFiles.table_n_doc" => $this->table_n_doc,
                "DbAreaFiles.row_id_doc"  => $this->row_id_doc
            ];

            $this->setFilesWhereArray($files_where_array)
                ->getDocuments("db_area_files")
                ->translateCaptions(["ScanDocuments", "Contracts"])
//                ->setDependentTitle($this->getCaptionTranslation("Contracts"))
                ->setDependentField("contractor_contract_name")
                ->hideDependent();

            return response()->json($this->getList("BlRequiredDocuments",
                $this->getCaptionTranslation("ScanDocuments") . " " . $this->model_record[$this->dependent_field]));

        }
        catch(\Exception $exception)
        {
            return response()->json([
                "error"   => true,
                "message" => $exception->getMessage()
            ], 400);
 //--- HEAD dev
        }
//=======

//        // head feature/demo
//
//        $this->setOwnerAndDocParams([
//            "table_n_doc"   => $this->controller["controller_table_n"],
//            "row_id_doc"    => $this->id,
//        ]);
//
//        $files_where_array = [
//            "DbAreaFiles.db_area_id"  => $this->db_area_id,
//            "DbAreaFiles.table_n_doc" => $this->table_n_doc,
//            "DbAreaFiles.row_id_doc"  => $this->row_id_doc
//        ];
//
//        $this->setFilesWhereArray($files_where_array);
//
//        $this->getDocuments("db_area_files");
//
//        $this->translateCaptions(["ScanDocuments", "Contracts"]);
//
//        $this->setDependentTitle($this->getCaptionTranslation("Contracts"));
//        $this->setDependentField("contractor_contract_name");
//
//         return response()->json($this->getList("BlRequiredDocuments", $this->getCaptionTranslation("ScanDocuments")));
//     //---- end feature/demo
    }
}
