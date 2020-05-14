<?php

namespace App\Http\Controllers\Api\BL;

use App\Http\Classes\ConsumerParameters;
use App\Http\Traits\HasCard;
use App\Http\Traits\HasList;
use App\Models\BL\BlLeasingObjectGroup;
use App\Models\ChangeRequest;
use App\Models\ChangeRequestController;
use App\Models\ChangeRequestControllerField;
use App\Models\ChangeRequestControllerFieldValue;
use App\Models\ControllerLink;
use App\Models\DbArea;
use App\Models\DbTypeController;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class BlLeasingObjectGroupsController extends Controller
{
    use HasList, HasCard;

    public function insert(){

    }
    public function update(Request $request)
    {
        $model = $request->BlLeasingObjectGroup[0]; //get array from front

        $dbTypesControllers = \App\Models\Controller::with('dbTypeController.controllerFields')
            ->where('controller_code', class_basename(Route::current()->controller))
            ->get()->toArray();

        //get changes fields from front
            //        $getObject = Contractor::/*with('country')->*/where('id', $model['id'])->get()->toArray();
            //        $contractorDiffFields = array_diff($modelNew, $getObject[0]);
        //END get changes fields from front

        //$getObject from all relations

        //exclude key from array
        $modelNew = array_except($model,
            [
                'country_name',
                'db_area_code',
                'server_name',
                'db_name',
                'created_by',
                'updated_at',
            ]
        );

        //get changes fields from front
        $getObject = BlLeasingObjectGroup::/*with('country')->*/where('id', $model['id'])->get()->toArray();
        $contractorDiffFields = array_diff($modelNew, $getObject[0]);
        //END get changes fields from front

        //$getObject from all relations
//
//        $getObjectDbarea = Contractor::with('dbarea.dBase.dbType')
//            ->where('id', $model['id'])->get()   ->toArray();

//        dd($contractorDiffFields);

        if ($dbTypesControllers['0']['db_type_controller'][0]['object_owner_id'] != NULL){

            $getObjectDbarea = BlLeasingObjectGroup::with('dbarea.dBase.dbType')
                ->where('id', $dbTypesControllers['0']['db_type_controller'][0]['object_owner_id'])
                ->get()->toArray();
//            dd($getObjectDbarea);
        }
        elseif ($dbTypesControllers['0']['db_type_controller'][0]['object_owner_id'] == NULL){
            $getObjectDbarea = BlLeasingObjectGroup::with('dbarea.dBase.dbType')
                ->where('id', $model['id'])
                ->get()->toArray();

//            dd($getObjectDbarea);
        }

        $getObjectDbTypeId = $getObjectDbarea[0]['dbarea']['d_base']['db_type_id'];
//        dd($getObjectDbTypeId);

        $dbTypesControllers = \App\Models\Controller::with('dbTypeController.controllerFields')
            ->where('controller_code', class_basename(Route::current()->controller))->get()->toArray();

//        dd($dbTypesControllers);

        $changeFields = [];
        $DbTypeId = [];

        //and  ($dbTypeController['row_id'] == $dbTypesControllers[0]['id'])

        foreach ($dbTypesControllers as $dbTypeControllers) {
            foreach ($dbTypeControllers['db_type_controller'] as $controller) {
                if (($controller['db_type_id'] == $getObjectDbTypeId) ) {
                    $DbTypeId = $controller['id'];

                    foreach ($controller['controller_fields'] as $fields) {
                        foreach ($contractorDiffFields as $key => $value) {
                            if ($fields['table_field_name'] == $key) {
                                array_push($fields, $value); //add new value from front to array $fields
                                $changeFields[] = $fields;
                            }
                        }
                    }
                }
            }
        }

        //if contractorDiffFields not empty to create ChangeRequest



        if (!empty($contractorDiffFields)) {

            $DataRequest = new ChangeRequest();
            $DataRequest->db_area_id = $getObjectDbarea[0]['db_area_id'];
            $DataRequest->status = (int)3; //status default (in processing)
            $DataRequest->db_area_id = $getObjectDbarea[0]['db_area_id'];
//            $DataRequest->created_by = (new ConsumerParameters())->consumerCode();
            $DataRequest->created_by = '123';
            $DataRequest->save();

            $ChangeRequestController = new ChangeRequestController();
            $ChangeRequestController->change_request_id = (integer)$DataRequest->id;
            $ChangeRequestController->db_type_controller_id = (integer)$DbTypeId;
            $ChangeRequestController->row_id = (integer)$getObject[0]['id'];
            if (!empty($controller['object_owner_id'])) {
                $ChangeRequestController->row_id_dep = $getObjectDbarea[0]['id'];
            }
//            $ChangeRequestController->created_by = (new ConsumerParameters())->consumerCode();
            $ChangeRequestController->created_by = '333';
            $ChangeRequestController->save();

            //            exit();

            foreach ($changeFields as $field) {
                $changeRequestControl = new ChangeRequestControllerField();
                $changeRequestControl->change_request_controller_id = $ChangeRequestController->id;
                $changeRequestControl->db_type_controller_field_id = $field['id'];
                if (isset($getObject[0]['line_n'])) {
                    $changeRequestControl->line_n = $getObject[0]['line_n'];
                }
                $changeRequestControl->field_reference = $field['field_reference'];
                $changeRequestControl->status = (int)1;
//                $changeRequestControl->created_by = (new ConsumerParameters())->consumerCode();
                $changeRequestControl->created_by = '66';
                $changeRequestControl->save();

                $changeReqControlField = new ChangeRequestControllerFieldValue();
                $changeReqControlField->change_request_controller_field_id = $changeRequestControl['id'];
                $changeReqControlField->field_value_type_code = 'current';
                $changeReqControlField->field_value = $field[0]; //new value from front
//                $changeReqControlField->created_by = (new ConsumerParameters())->consumerCode();
                $changeReqControlField->created_by = '555';
                $changeReqControlField->save();

                $changeReqControlField = new ChangeRequestControllerFieldValue();
                $changeReqControlField->change_request_controller_field_id = $changeRequestControl['id'];
                $changeReqControlField->field_value_type_code = 'new';
                $changeReqControlField->field_value = $field[0]; //new value from front
//                $changeReqControlField->created_by = (new ConsumerParameters())->consumerCode();
                $changeReqControlField->created_by = '44';
                $changeReqControlField->save();

                $changeReqControlField = new ChangeRequestControllerFieldValue();
                $changeReqControlField->change_request_controller_field_id = $changeRequestControl['id'];
                $changeReqControlField->field_value_type_code = 'old';
                $changeReqControlField->field_value = $getObject[0][$field['table_field_name']]; //get old value from databases
//                $changeReqControlField->created_by = (new ConsumerParameters())->consumerCode();
                $changeReqControlField->created_by = '44';
                $changeReqControlField->save();
            }
        }

//        exit();

        $ChangeRequestGet = ChangeRequest::with('changeRequestController.changeRequestControllerField.changeRequestControllerFieldValue')
//            ->where('id', $DataRequest->id)
            ->where('id', 1)->get()->toArray();
        // Albert Topalu 08.01.19
        //Get Settings from  _DbTypeControllers where  ChangeRequests->db_type_controller_id == _DbTypeControllers->id ->relations(_DbTypeControllerFields)

        $dbTypeController = ChangeRequestController::with('dbTypeController.controllerFields')
            ->where('db_type_controller_id', $ChangeRequestGet[0]['change_request_controller'][0]['db_type_controller_id'])
            ->where('row_id', $getObject[0]['id'])
        ->get()->toArray();

//        dd($dbTypeController);

        $getNameTable = \App\Models\Controller::with('models')
            ->where('id', $dbTypeController[0]['db_type_controller'][0]['controller_id'])
        ->get()->toArray();

        $GetObjectChangeRequest = DB::table($getNameTable[0]['models']['table_name'])
            ->where('id', $dbTypeController[0]['row_id'])->get()->toArray(); //get name Table (example Country from _DbTypeControllers)
//            ->where('id', 4)->get()->toArray(); //get name Table (example Country from _DbTypeControllers)

        //add field_nam, field_name to Json ->1C from tales ChangeRequests.... //Contractor
        $object_block_fields=[];
        foreach ( $ChangeRequestGet[0]['change_request_controller'][0]['change_request_controller_field'] as $fields){
            $fieldsArray=[];
            foreach ($fields['change_request_controller_field_value'] as $key) {
                $fieldsArray[]=  $key['field_value'];
            }

            if ( ($fields['db_type_controller_field']['field_reference']) == "0" ){
                array_push($fieldsArray,
                    $fields['db_type_controller_field']['table_field_name'],
                    $fields['db_type_controller_field']['field_reference']
                );
                $object_block_fields[] =  $fieldsArray;

            } elseif( ($fields['db_type_controller_field']['field_reference']) == "1"){

                //Get Controller ID from Table  _DbTypeControllers
                $ControllerId = DbTypeController::select('controller_id')
                    ->where('id', '=',  $DbTypeId )->value('controller_id');

                $controllerIdLink = ControllerLink::select('controller_id_link')
                    ->where('controller_id', '=',  $ControllerId )
                    ->where('table_field_name', '=',  $fields['db_type_controller_field']['table_field_name'] )
                    ->value('controller_id_link');

                $objectKeyField = \App\Models\Controller::with('models')
                    ->with('dbTypeController')
//                    ->where('id', $fields['db_type_controller_field']['controller_id'])
                    ->where('id', $controllerIdLink)
                    ->get()->toArray();

                array_push($fieldsArray,
                    $objectKeyField[0]['db_type_controller'][0]['object_key_field'],
                    $fields['db_type_controller_field']['field_reference']
                );
                $object_block_fields[] =  $fieldsArray;
            }
        }

        //!!!!!!!!!!!!!!!!!!!!!!!!!
        $objectFields=[];
        foreach ($object_block_fields as $block_fields) {

//            dd($block_fields);

            if ( /*($fieldReference['db_type_controller_field']['field_reference'] == "0") and*/ ($block_fields[4] == "0") ){

                $objectFields[] = [
                    "field_name" => $block_fields[3],
//                    "field_is_link"=> $fieldReference['db_type_controller_field']['field_reference'], //"field_is_link"=> "True|False",
                    "field_values" =>
                        [
                            "value_current" => $block_fields[0],
                            "value_old" => $block_fields[2],
                            "value_new" => $block_fields[1]
                        ],
                    "field_status" => "1",
                    "field_comment" => ""
                ];
            }
        }

        foreach ($ChangeRequestGet[0]['change_request_controller'][0]['change_request_controller_field'] as $fieldReference) {
            if ( ($fieldReference['db_type_controller_field']['field_reference'] == "1")  and ($block_fields[4] == "1")  ) {
                $objectFieldsReferensId = [
                    "value_current" => $block_fields[0],
                    "value_new" => $block_fields[1],
                    "value_old" => $block_fields[2],
                ];
            }

            //-------------------country_code----------------
            if ( ($fieldReference['db_type_controller_field']['field_reference']) == 1 ) {


                $objectKeyFieldValueCurrent = DB::table($objectKeyField[0]['models']['table_name'])
                    ->where('id', $objectFieldsReferensId['value_current'])
                    ->get()->toArray();

                $keyField = $objectKeyField[0]['db_type_controller'][0]['object_key_field']; //get country_cod

                $objectKeyFieldValueNew = DB::table($objectKeyField[0]['models']['table_name'])
                    ->where('id', $objectFieldsReferensId['value_new'])
                    ->get()->toArray();

                $objectKeyFieldValueOld = DB::table($objectKeyField[0]['models']['table_name'])
                    ->where('id', $objectFieldsReferensId['value_old'])
                    ->get()->toArray();

                $objectFields[] = [
                    "field_name" => $block_fields[3],
                    "field_values" =>[
                        "value_current" =>
                            [
                                "value_table_code" => $objectKeyField[0]['db_type_controller'][0]['object_type_code'],
                                "value_table_key" =>  $objectKeyField[0]['db_type_controller'][0]['object_key_field'],
                                "value" => $objectKeyFieldValueCurrent[0]->$keyField
                            ],
                        "value_old" =>
                            [
                                "value_table_code" => $objectKeyField[0]['db_type_controller'][0]['object_type_code'],
                                "value_table_key" =>  $objectKeyField[0]['db_type_controller'][0]['object_key_field'],
                                "value" => $objectKeyFieldValueNew[0]->$keyField
                            ],
                        "value_new" =>
                            [
                                "value_table_code" => $objectKeyField[0]['db_type_controller'][0]['object_type_code'],
                                "value_table_key" => $objectKeyField[0]['db_type_controller'][0]['object_key_field'],
                                "value" => $objectKeyFieldValueOld[0]->$keyField
                            ]
                    ],
                    "field_status" => "1",
                    "field_comment" => ""
                ];
            }
            //-------------------END country_code----------------
        }
        //get controller in table _DbTypeControllers where object_owner_id = controller_id and db_type_id->ContractorInfo = db_type_id->Contractor

//        if (isset($dbTypesControllers[0]['db_type_controller'][0]['object_owner_id'])){
        if (isset($dbTypesControllers[0]['db_type_controller'])){

            foreach ($dbTypesControllers[0]['db_type_controller'] as $typeController){
                if ( ($typeController['object_owner_id'] == NULL) ){
                    if (isset($typeController) and ($typeController['db_type_id'] == $model['db_area_id'])
                        and ($typeController['controller_id'] == $getNameTable[0]['id']) //!!!!!!! controller_id
                        and ($typeController['object_owner_id']) == NULL
                    ) {
                        $objectOwner = $typeController;
                        $objectOwnerArray = [];
                    }
                }
                elseif ( ($typeController['object_owner_id'] != NULL) and ($typeController['object_kind_n'] == 3) ){

                    if (isset($typeController) and ($typeController['db_type_id'] == $ChangeRequestGet[0]['db_area_id'])
                        and ($typeController['controller_id'] == $getNameTable[0]['id'])
                        and ($typeController['object_owner_id']) != NULL ) {

                        $objectOwner = DB::table('_DbTypeControllers')
                            ->where('db_type_id', $dbTypeController[0]['db_type_controller'][0]['db_type_id'])
                            ->where('controller_id',  $typeController['object_owner_id']) //?????????????????????????????
                            ->get()->toArray();

                        $getNameTableObjectOwner = \App\Models\Controller::with('models')
                            ->where('id', $objectOwner[0]->controller_id)
                            ->get()->toArray();

                        //$getOwnerObject = DB::table('Contractors')

                        //get relation field from table  _DbTypeControllers->__ControllerLinks
                        // where __ControllerLinks.controller_id == __Controllers.id
                        //$getOwnerObject = DB::table('Contractors') (example contractor_id or company_id)

                        $getDependentController = \App\Models\Controller::with('controllerLink')
                            ->where('id', $dbTypeController[0]['db_type_controller'][0]['controller_id'])->get()->toArray();

                        $fieldObjectOwnerId = $getDependentController[0]['controller_link']['table_field_name'];
                        //END get relation field from table  _DbTypeControllers->__ControllerLinks

                        $getOwnerObject = DB::table($getNameTableObjectOwner[0]['models']['table_name'])
                            ->where('id', $GetObjectChangeRequest[0]->$fieldObjectOwnerId) //contractor_id, company_id
                            ->get()->toArray();

                        $objectOwnerRelations = DB::table('_DbTypeControllers')
                            ->where('db_type_id', $typeController['db_type_id'])
                            ->where('controller_id',  $typeController['object_owner_id'])
                            ->get()->toArray(); //->$objectOwnerRelations[0]->object_key_field

                        $objectOwnerKeyField= $objectOwnerRelations[0]->object_key_field; // get uid_1c_code from _DbTypeControllers ->ContractorInfo->object_owner_id

                        $objectOwner = $typeController;
                        $objectOwnerArray = [
                            "owner_name" => $objectOwnerRelations[0]->object_type_code, //"owner_name" => "Contractor",
                            "owner_key" => $objectOwnerRelations[0]->object_key_field, // "owner_key" => "uid_1c",
                            "owner_key_value" => $getOwnerObject[0]->$objectOwnerKeyField, //"owner_key_value" => "21235-56565"
                        ];  //
                    }

                    //Get name Table from _DbTypeControllers -> object_owner_id
                    //If object_owner_id from _DbTypeControllers null -> $objectOwner[0]->id) (example Contractor)
                    //If object_owner_id from _DbTypeControllers NotNull -> $objectOwner[0]->controller_id) (example ContractorInfo)
                    $getNameTableObjectOwner = \App\Models\Controller::with('models')
                        //get relation field from table  _DbTypeControllers->__ControllerLinks
                        // where __ControllerLinks.controller_id == __Controllers.id
                        ->with('controllerLink')
                        ->where('id', $objectOwner['controller_id'])
                        ->get()->toArray();
                    //$getOwnerObject = DB::table('Contractors') (example contractor_id or company_id)
                    //END get relation field from table  (example contractor_id, company_id)
                }
            }
        }

        //End get controller in table _DbTypeControllers

        if (isset($dbTypesControllers[0]['db_type_controller'][0]['object_owner_id'])
                and ($dbTypesControllers[0]['db_type_controller'][0]['object_kind_n'] == "3" ) ) {
            $getOwnerObject = DB::table($getNameTableObjectOwner[0]['models']['table_name'])
                ->where('id', $GetObjectChangeRequest[0]->contractor_id)   //!!!!!!!!!!!!!!!!!?????????
//                ->where('id', $GetObjectChangeRequest[0]->$fieldObjectOwnerId)   //!!!!!!!!!!!!!!!!!?????????
                ->get()->toArray();
//            $getOwnerObjectKeyField = $objectOwner->object_key_field; //get uid_1c_code from _DbTypeControllers
            $getOwnerObjectKeyField = $objectOwner['object_key_field']; //get uid_1c_code from _DbTypeControllers
        }
        elseif (!isset($dbTypesControllers[0]['db_type_controller'][0]['object_owner_id'])
                and ($dbTypesControllers[0]['db_type_controller'][0]['object_kind_n'] != "3" ) ){
            $getOwnerObject = $GetObjectChangeRequest;

//            $getOwnerObjectKeyField = $objectOwner->object_key_field; //get uid_1c_code from _DbTypeControllers
            $getOwnerObjectKeyField = $objectOwner['object_key_field']; //get uid_1c_code from _DbTypeControllers
        }

        //get uid_1c_code->value from table Contractor
        foreach ($getOwnerObject as $getOwnerObjectKey=>$getOwnerObjectValue ){
            $getOwnerObjectKeyValue= $getOwnerObjectValue->$getOwnerObjectKeyField;
        }
        //END get uid_1c_code->value from table

        $getObjectKeyField = $dbTypeController[0]['db_type_controller'][0]['object_key_field'];
        $ChangeRequestSend1C = [
            "request" => [
                "request_name" => "RequestForDataChanges",
                "request_number" => $ChangeRequestGet[0]['id'],
                "request_parameters" => [
                    "number" => $ChangeRequestGet[0]['id'],
                    "status" => "3",
                    "comment" => "",
                    "objects_to_change" =>  [
                        [
                            "object_type_code" => $dbTypeController[0]['db_type_controller'][0]['object_type_code'], //"object_type_code" => "Contractor",
                            "object_kind" => $dbTypeController[0]['db_type_controller'][0]['object_kind_n'], // "object_kind" => "1",
                            "object_key" => $dbTypeController[0]['db_type_controller'][0]['object_key_field'], //"object_key" => "uid_1c_code",

                            "object_key_value" =>$GetObjectChangeRequest[0]->$getObjectKeyField, //"object_key_value" => "914aa641-ab9c-11e8-843f-002590762efe",
                            "object_id" => $GetObjectChangeRequest[0]->id, //"object_id" => "1",


                            "object_owner" => $objectOwnerArray,
                            "object_block_fields" =>
                            //------object_ Contractor
                                $objectFields,

                            //------END object_ Contractor

                            //------object_tables_to_change
                            "object_tables_to_change" =>[

                            ]
                            // ------END object_tables_to_change
                        ]
                    ]
                ]
            ]
        ];


//        $ee = $ChangeRequestSend1C;
        /*----------new Client()--------------*/
//        $getObjectDbAreaId = $getObjectDbarea[0]['db_area_id'];

        $getObjectDbAreaId = $ChangeRequestGet[0]['db_area_id'];
        $serverDb = DbArea::with('dBase.serverDb')->where('id', $getObjectDbAreaId)->get()->toArray();
        $serverUrl = $serverDb[0]['d_base']['server_db']['server_url'] . '/' . $serverDb[0]['d_base']['db_name'];
        $host = request()->root();
        $host = preg_replace('#^https?://#', '', rtrim($host, '/'));
        $client = new Client();

        $res = $client->request('POST', $serverUrl . '/hs/api_for_wc/signal', [
            'json' => $ChangeRequestSend1C,
            'auth' => ['WebCabinetEN', 'WebCabinet'],
            'headers' => [
                'Referer' => "$host",
            ]
        ]);


        $resArray = \GuzzleHttp\json_decode($res->getBody());

//        /*----------END new Client()--------------*/

        $model = $request->Contractor[0];


//        return Contractor::where('id', $model['id'])->update(
//            ['country_id' => $model['country_id'],
        //                'db_area_id' => $model['db_area_id'],
        ////                    'uid_1c_code' => $model['uid_1c_code'],
        //                'individual_l' => $model['individual_l'],
        ////                    'identity_document' => $model['identity_document'],
        //                'contractor_full_name' => $model['contractor_full_name'],
        //                'contractor_short_name' => $model['contractor_short_name'],
        //                'taxpayer_number' => $model['taxpayer_number'],
        //                'code_reason_number' => $model['code_reason_number'],
        //                'social_security_number' => $model['social_security_number'],
        //                'register_number' => $model['register_number'],
        //                'entrepreneur_certificate' => $model['entrepreneur_certificate'],
        //                'entrepreneur_certificate_date' => $model['entrepreneur_certificate_date'],
        //                'actual_l' => $model['actual_l'],
        //                'updated_by' => (new ConsumerParameters())->consumerCode(),
        //            ]
        //        );
    }

}
