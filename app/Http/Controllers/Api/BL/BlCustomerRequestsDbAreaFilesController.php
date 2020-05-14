<?php

namespace App\Http\Controllers\Api\BL;

use App\Http\Traits\DbAreaFilesHelper;
use App\Models\BL\BlAttachedDocumentKind;
use App\Models\BL\BlCustomerRequest;
use App\Models\BL\BlRequiredDocument;
use App\Models\DbAreaFile;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class BlCustomerRequestsDbAreaFilesController extends Controller
{
    use DbAreaFilesHelper;

    public function list(Request $request)
    {
        try
        {
            $this->setControllerCode("BlCustomerRequestsController")
                ->setCheckForTableNOwner(false)
                ->checkForController()
                ->setModel(BlCustomerRequest::class)
                ->setModelRecord("Incorrect customer request")
                ->setOwnerAndDocParams([
                    // Contractor table_n_owner
                    "table_n_owner" => 13,
                    "row_id_owner"  => $this->model_record["lessee_contractor_id"],
                    "table_n_doc"   => $this->controller["controller_table_n"],
                    "row_id_doc"    => $this->id,
                ]);

            $files_where_array = [
                "DbAreaFiles.db_area_id"  => $this->db_area_id,
                "DbAreaFiles.table_n_doc" => $this->table_n_doc,
                "DbAreaFiles.row_id_doc"  => $this->row_id_doc
            ];

            if($this->checkForTableNOwner)
                $files_where_array["DbAreaFiles.table_n_owner"] = $this->table_n_owner;

            $this->setFilesWhereArray($files_where_array)
                ->getDocuments("document_kinds")
                ->translateCaptions(["AttachScannedCopies", "Request"])
                ->setDependentTitle($this->getCaptionTranslation("Request"))
                ->setDependentField("bl_customer_request_number");


            return response()->json($this->getList("BlRequiredDocuments",
                $this->getCaptionTranslation("AttachScannedCopies")));
        }
        catch(\Exception $exception)
        {
            return response()->json([
                "error"   => true,
                "message" => $exception->getMessage()
            ], 400);
        }

    }
}
