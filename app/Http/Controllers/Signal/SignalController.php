<?php

namespace App\Http\Controllers\Signal;


use App\Http\Classes\ConsumerParameters;
use App\Http\Classes\StoredFileManager;
use App\Models\AttachedDocument;
use App\Models\AttachedDocumentFile;
use App\Models\Company;
use App\Models\CompanyInfo;
use App\Models\Contractor;
use App\Models\ContractorInfo;
use App\Models\Country;
use App\Models\DbArea;
use App\Models\DbAreaFile;
use App\Models\DBase;
use App\Models\DbTypeControllerField;
use App\Models\InfoKind;
use App\Models\InfoType;
use App\Models\Log;
use App\QueueSignal;
use App\Report;
use App\Models\ZzCompany;
use App\Models\ZzCompanyInfo;
use App\Models\ZzContractor;
use App\Models\ZzContractorInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\ControllerLink;
use App\Models\DbTypeController;
use App\Models\ModelTables;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Models\ChangeRequest;
use App\Models\ChangeRequestController;
use App\Models\ChangeRequestControllerField;
use App\Models\ChangeRequestControllerFieldValue;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;


class SignalController extends Controller
{
    public function index(Request $request)
    {
        $resArray = \GuzzleHttp\json_decode($request->getContent(), true);

        $DbAreaRelations = DbArea::with('dBase.serverDb','consumer')
            ->where('db_area_code', $resArray['request']['db_area_code'])
            ->get()->toArray();


//        $getToken_1C = $request->header('token');

        if (isset($DbAreaRelations) and($DbAreaRelations[0]['db_area_token'] == $request->header('token'))  and (!empty($DbAreaRelations)) ) {
//        if (isset($DbAreaRelations) and($DbAreaRelations[0]['db_area_token'] == '4096b931-006e-45b7-9481-0ca16b0aac60')  and (!empty($DbAreaRelations)) ) {

            if (isset($resArray['request']['request_parameters']['number'] )   and !empty($resArray['request']['request_parameters']['number'])  ){
                $number = (int)$resArray['request']['request_parameters']['number'];
            }
            elseif (isset($resArray['request']['request_parameters']['number'] )   and empty($resArray['request']['request_parameters']['number']) ){
                $number =NULL;
            }

            $globalVariablesDB=[
                'db_area_code' => $DbAreaRelations[0]['db_area_code'],
                'db_type_id' => $DbAreaRelations[0]['d_base']['db_type_id'],
                'db_id' => $DbAreaRelations[0]['db_id'],
                'server_id' => $DbAreaRelations[0]['d_base']['server_id'],
                'number' => $number
             ];


            if (isset($resArray['request']['request_parameters']['objects_to_change'][0]['object_type_code']) ) {


                /* //if isset db_type_id in  _DbTypeControllers get array from db_type_id = id */
                $nameControllerDbTypesControllers = \App\Models\DbTypeController::with('controllerName.models')
                    ->with('controllerName.controllerLink')
                    ->with('controllerFields')
                    ->where('object_type_code', $resArray['request']['request_parameters']['objects_to_change'][0]['object_type_code'])
                    ->where('db_type_id', $globalVariablesDB['db_type_id'])
                    ->get()->toArray();

                if (empty($nameControllerDbTypesControllers)) {
                    $nameControllerDbTypesControllers = \App\Models\DbTypeController::with('controllerName.models')
                        ->with('controllerName.controllerLink')
                        ->with('controllerFields')
                        ->where('object_type_code', $resArray['request']['request_parameters']['objects_to_change'][0]['object_type_code'])
                        ->where('db_type_id', NULL)
                        ->get()->toArray();


                    if (empty($nameControllerDbTypesControllers)) {
                        //if !isset Null in DbTypeController return error "no settings for this object DbTypeController"
                        $status = [
                            'status' => [
                                'status_code' => "0",
                                'status_description' => [
                                    'object_type_code' => $resArray['request']['request_parameters']['objects_to_change'][0]['object_type_code'],
                                    'description' => 'no settings for this object'
                                ]
                            ]
                        ];

                        return $status;
                    }
                }

                //if object_tables_to_change $resArray['request']['request_parameters']['objects_to_change'][0]['object_tables_to_change'][0]['table_type_code']
                if (isset($resArray['request']['request_parameters']['objects_to_change'][0]['object_tables_to_change']) and !empty($resArray['request']['request_parameters']['objects_to_change'][0]['object_tables_to_change'])) {
                    $objectTableControllerDbTypesControllers = \App\Models\DbTypeController::with('controllerName.models')
                        ->with('controllerName.controllerLink')
                        ->with('controllerFields')
                        ->where('object_type_code', $resArray['request']['request_parameters']['objects_to_change'][0]['object_tables_to_change']['0']['table_type_code'])
                        ->where('db_type_id', $globalVariablesDB['db_type_id'])
                        ->get()->toArray();
//                }
                /*  //if empty $nameControllerDbTypesControllers
                //if !isset db_type_id in  _DbTypeControllers get array from db_type_id = NULL  */


//                if (isset($resArray['request']['request_parameters']['objects_to_change'][0]['object_tables_to_change']) and !empty($resArray['request']['request_parameters']['objects_to_change'][0]['object_tables_to_change'])) {

//                    if (empty($nameControllerDbTypesControllers)) {
//                        $nameControllerDbTypesControllers = \App\Models\DbTypeController::with('controllerName.models')
//                            ->with('controllerName.controllerLink')
//                            ->with('controllerFields')
//                            ->where('object_type_code', $resArray['request']['request_parameters']['objects_to_change'][0]['object_type_code'])
//                            ->where('db_type_id', NULL)
//                            ->get()->toArray();
//
//
//                        if (empty($nameControllerDbTypesControllers)) {
//                            //if !isset Null in DbTypeController return error "no settings for this object DbTypeController"
//                            $status = [
//                                'status' => [
//                                    'status_code' => "0",
//                                    'status_description' => [
//                                        'object_type_code' => $resArray['request']['request_parameters']['objects_to_change'][0]['object_tables_to_change']['0']['table_type_code'],
//                                        'description' => 'no settings for this object'
//                                    ]
//                                ]
//                            ];
//
//                            return $status;
//                        }
//                    }

                    if (empty($objectTableControllerDbTypesControllers)) {

                        $objectTableControllerDbTypesControllers = \App\Models\DbTypeController::with('controllerName.models')
                            ->with('controllerName.controllerLink')
                            ->with('controllerFields')
                            ->where('object_type_code', $resArray['request']['request_parameters']
                            ['objects_to_change'][0]['object_tables_to_change']['0']['table_type_code'])
                            ->where('db_type_id', NULL)
                            ->get()->toArray();


                        if (empty($objectTableControllerDbTypesControllers)) {
                            //if !isset Null in DbTypeController return error "no settings for this object DbTypeController"
                            $status = [
                                'status' => [
                                    'status_code' => "0",
                                    'status_description' =>[
                                        'object_type_code' => $resArray['request']['request_parameters']['objects_to_change'][0]['object_tables_to_change']['0']['table_type_code'],
                                        'description' => 'no settings for this object'
                                    ]
                                ]
                            ];

                            return $status;
                        }
                    }

                    $globalVariablesControllerTable = [
                        'objectTableNameController' => $objectTableControllerDbTypesControllers[0]['object_type_code'],
                        'objectTableControllerId' => $objectTableControllerDbTypesControllers[0]['controller_id'],
                        'objectTableObjectKeyField' => $objectTableControllerDbTypesControllers[0]['object_key_field'],
                        'objectTableControllerFields' => $objectTableControllerDbTypesControllers[0]['controller_fields'],
                        'objectTableNameModel' => $objectTableControllerDbTypesControllers[0]['object_key_field'],
                        'objectTableNameTable' => $objectTableControllerDbTypesControllers[0]['controller_name'][0]['models']['table_name'],
                        'objectTableControllerLink' => $objectTableControllerDbTypesControllers[0]['controller_name'][0]['controller_link'],

                    ];
                }

//                $test = $nameControllerDbTypesControllers;
//                  $test = $objectTableControllerDbTypesControllers;

                $globalVariablesController = [
                    'nameController' => $nameControllerDbTypesControllers[0]['controller_name'][0]['controller_code'],
                    'controller_id' => $nameControllerDbTypesControllers[0]['controller_id'],
                    'object_key_field' => $nameControllerDbTypesControllers[0]['object_key_field'],
                    'controllerFields' => $nameControllerDbTypesControllers[0]['controller_fields'],
                    'nameModel' => $nameControllerDbTypesControllers[0]['controller_name'][0]['models']['table_code'],
                    'nameTable' => $nameControllerDbTypesControllers[0]['controller_name'][0]['models']['table_name'],
                    'controller_link' => $nameControllerDbTypesControllers[0]['controller_name'][0]['controller_link'],
                    'db_area_l' => $nameControllerDbTypesControllers[0]['controller_name'][0]['models']['use_db_area_l'],

//                    'objectTableNameController' => $objectTableControllerDbTypesControllers[0]['object_type_code'],
//                    'objectTableControllerId' => $objectTableControllerDbTypesControllers[0]['controller_id'],
//                    'objectTableObjectKeyField' => $objectTableControllerDbTypesControllers[0]['object_key_field'],
//                    'objectTableControllerFields' => $objectTableControllerDbTypesControllers[0]['controller_fields'],
//                    'objectTableNameModel' => $objectTableControllerDbTypesControllers[0]['object_key_field'],
//                    'objectTableNameTable' => $objectTableControllerDbTypesControllers[0]['controller_name'][0]['models']['table_name'],
//                    'objectTableControllerLink' => $objectTableControllerDbTypesControllers[0]['controller_name'][0]['controller_link'],
                    'globalVariablesDB' => $globalVariablesDB
                ];

                $arrayFieldsDbTypeController=[];
                foreach ($globalVariablesController['controllerFields'] as $fieldsDbTypeController){
                    $arrayFieldsDbTypeController[]=$fieldsDbTypeController['field_alias'];
                }





//                $test123 = $globalVariablesController;
                /*____________stored file_________!!!!!!!!!!!!!!!!!!!????????????????????????*/

//
//
//                if (in_array(('stored_file_id'), $arrayFieldsDbTypeController)) {
//
//                 $fileValues =  $resArray['request']['request_parameters']['objects_to_change'][0]['object_block_fields'][0]['field_values'];
//
//                    $fileValuesRequest=(new StoredFileManager($request->getContent()));
//                    $resFileValuesRequest = $fileValuesRequest->uploadFile($fileValues);
////                    return $resFileValuesRequest;
//
//                    $dbAreaFiles = new DbAreaFile();
//                    $dbAreaFiles->db_area_file_name = $fileValues['db_area_file_name'];
//                    $dbAreaFiles->stored_file_id = $resFileValuesRequest;
////                    $dbAreaFiles->table_n_owner = $fileValues['table_n_owner'];
//                    $dbAreaFiles->row_id_owner =  $fileValues['row_id_owner'];
//                    $dbAreaFiles->table_n_doc = $fileValues['table_n_doc'];
//                    $dbAreaFiles->row_id_doc = $fileValues['row_id_doc'];
//                    $dbAreaFiles->db_area_id = $fileValues['db_area_id'];
//                    $dbAreaFiles->uid_1c_code = $fileValues['uid_1c_code'];
//                    $dbAreaFiles->deleted_l = boolval($fileValues['deleted_l']);
//                    $dbAreaFiles->created_by = 'test';
//                    $dbAreaFiles->updated_by = 'test123';
//                    $dbAreaFiles->save();
//
//                    $status = [
//                        'status' => [
//                            'status_code' => "1",
//                            'status_description' => 'created '.$globalVariablesController['nameModel'],
//                        ]
//                    ];
//
//                    return $status;
//                 }
//
//                array_values($arrayFieldsDbTypeController);

                /*____________END stored file_________!!!!!!!!!!!!!!!!!!!????????????????????????*/



                foreach ($resArray['request']['request_parameters']['objects_to_change'] as $objectsToChange) {
                    $objectsToChangeFieldsValue=[];
                    foreach ($objectsToChange['object_block_fields'] as $objectBlockFields) {
//                        if (!isset($objectBlockFields['field_is_link'])) {
                        if (isset($objectBlockFields['field_is_link']) and ($objectBlockFields['field_is_link']) == "0") {

                            foreach ($arrayFieldsDbTypeController as $arrayField){
                                if ($objectBlockFields['field_alias'] === $arrayField) {
                                    $objectsToChangeFieldsValue[$objectBlockFields['field_alias']] = $objectBlockFields['field_values']['value_current'];
                                    //+++ ЗубановИА 01072019 не вижу смысла дальше искать совпадения (лишние интерации в цикле)
                                    break;
                                    //--- ЗубановИА 01072019
                                }
                            }
                        }
                        elseif (isset($objectBlockFields['field_is_link']) and ($objectBlockFields['field_is_link']) == "1") {

                            $IdControllerLinks = ControllerLink::where('controller_id', '=', $globalVariablesController['controller_id'])
                                ->get()->toArray();


                            $ControllerLinks = \App\Models\DbTypeController::where('controller_id', $IdControllerLinks[0]['controller_id_link'])
                                ->where('db_type_id', $globalVariablesController['globalVariablesDB']['db_type_id'])
                                ->get()->toArray();
                            //+++ ЗубановИА 27062019 в случае отсутствия правила по db_type_id = заданомуИД,
                            // не осуществлялся поиск по правила с db_type_id = NULL. вылетало в ошибку поэтому добавляю
                            if (empty($ControllerLinks)) {
                                $ControllerLinks = \App\Models\DbTypeController::where('controller_id', $IdControllerLinks[0]['controller_id_link'])
                                    ->where('db_type_id', NULL)
                                    ->get()->toArray();
                            }
                            //--- ЗубановИА 27062019
                            $ControllerLinksModel= ModelTables::where('table_code', $ControllerLinks[0]['object_type_code'])->get()->toArray();

                            // get Country id
                            $objectsToChangeId =DB::table($ControllerLinksModel[0]['table_name'])
                                ->select('id')
                                ->where($ControllerLinks[0]['object_key_field'], $objectBlockFields['field_values']['value_current']['object_key_value'])
                                ->get()->toArray();


                            if (!empty($objectsToChangeId)){
                                $objectsId= $objectsToChangeId[0]->id; // (country_id)
                                foreach ($arrayFieldsDbTypeController as $arrayField) {
                                    if ($objectBlockFields['field_alias'] === $arrayField) {
                                        $objectsToChangeFieldsValue[$IdControllerLinks[0]['table_field_name']] = $objectsId;
                                        //+++ ЗубановИА 01072019 не вижу смысла дальше искать если найдено соответствие (лишние интерации в цикле)
                                        break;
                                        //--- ЗубановИА 01072019
                                    }
                                }
                            }
                            elseif( empty($objectsId) ){

                                $encodeLog = \GuzzleHttp\json_encode($objectBlockFields);
                                $encodeLogResArray = \GuzzleHttp\json_encode($resArray);

                                $log = new Log();
                                $log->short_description	 = $encodeLog;  //
                                $log->text =  $encodeLogResArray;
                                $log->created_by =  '1c';
                                $log->updated_by =  '1c';
                                $log->save();

                            }
                        }
                    }

//                    $db_area_l = (int)"1";
                    $db_area_l = (int)$globalVariablesController['db_area_l'];
                    ////Get id Contractor
                    // if $db_area_l = 1 isset db_area_id in Object(Contractor)

                    if ($db_area_l === 1){
                        $objectKeyFieldId = DB::table($globalVariablesController['nameTable'])
                            ->where($globalVariablesController['object_key_field'], $objectsToChange['object_key_value'])
                            ->where('db_area_id', $globalVariablesController['globalVariablesDB']['db_id'])
                            ->value('id');

                        //// add id contractor in $globalVariablesController
                        array_unshift($globalVariablesController,  $objectKeyFieldId );
                    }
                    elseif ($db_area_l === 0){ //// // if $db_area_l = 0 !isset db_area_id in Object(Country)
                        $objectKeyFieldId = DB::table($globalVariablesController['nameTable'])
                            ->where($globalVariablesController['object_key_field'], $objectsToChange['object_key_value'])
                            ->value('id');
                    }


                    /// // if $db_area_l = 1 isset db_area_id in Object(Contractor)

                    if ( isset($objectKeyFieldId) and  !empty($objectKeyFieldId)){

                        if ($db_area_l === 1){

                            $objectsToChangeFieldsValue['updated_by'] = $DbAreaRelations[0]['consumer']['consumer_code'];

                           $saveStatus = DB::table($globalVariablesController['nameTable'])
                                ->where('id', $objectKeyFieldId)
                                ->where('db_area_id', $globalVariablesController['globalVariablesDB']['db_id'])
                                ->update($objectsToChangeFieldsValue);

                           if ( isset($saveStatus) and ((int) $saveStatus === 1) ){
                               DB::table('ChangeRequests')
                                   ->where('id', $globalVariablesController['globalVariablesDB']['number'])
                                   ->update(['status' => 1]);
                           }
                        }
                        elseif ($db_area_l === 0){
                            $saveStatus = DB::table($globalVariablesController['nameTable'])
                                ->where('id', $objectKeyFieldId)
                                ->update($objectsToChangeFieldsValue);
                            if ( isset($saveStatus) and ((int) $saveStatus === 1) ){
                                DB::table('ChangeRequests')
                                    ->where('id', $globalVariablesController['globalVariablesDB']['number'])
                                    ->update(['status' => 1]);
                            }
                        }
                    }

                        //if (isset(object tables to change)


                        /*--------------------Table NEW Change------------------------------*/
                        /*--------------------Table NEW Change------------------------------*/




                    // // get all fields in DbTypeControllerFields

                    if (isset($resArray['request']['request_parameters']['objects_to_change'][0]['object_tables_to_change']) and !empty($resArray['request']['request_parameters']['objects_to_change'][0]['object_tables_to_change'])) {
                        $AllChangeFieldsValuesDbTypeController = [];
                        foreach ($globalVariablesControllerTable['objectTableControllerFields'] as $fieldsDbTypeController) {
                            $AllChangeFieldsValuesDbTypeController[] = $fieldsDbTypeController['field_alias'];
                        }
                    }


                    if (isset($objectsToChange['object_tables_to_change']) and !empty($objectsToChange['object_tables_to_change'])) {
                        $AllChangeFieldsValues=[];

                        foreach ($objectsToChange['object_tables_to_change'][0]['table_strings'] as $block_fields){
                            $objectTableToChangeFieldsValue=[];
                            foreach ($block_fields['string_block_fields'] as  $objectBlockFields){

                                //+++ ЗубановИА 01072019 Было if (isset($objectBlockFields['field_is_link']) and ($objectBlockFields['field_is_link']) === "0") {
                                // с тремя знаками === сравнение без приведения к булевому типу. А у нас получаеться сравнение false и "0"
                                // надо использовать == что и сделал
                                if (isset($objectBlockFields['field_is_link']) and ($objectBlockFields['field_is_link']) == "0") {
                                //--- ЗубановИА 01072019

                                    foreach ($AllChangeFieldsValuesDbTypeController as $arrayField) {
                                        if ($objectBlockFields['field_alias'] === $arrayField) {
                                            $objectTableToChangeFieldsValue[$objectBlockFields['field_alias']]=$objectBlockFields['field_values']['value_current'];
                                            //+++ ЗубановИА 01072019 Нашел соответствие вышел из цикла
                                            break;
                                            //---
                                        }
                                    }
                                }
                                //+++ ЗубановИА 01072019 Было elseif (isset($objectBlockFields['field_is_link']) and ($objectBlockFields['field_is_link']) === "1") {
                                // с тремя знаками === сравнение без приведения к булевому типу. А у нас получаеться сравнение false и "0"
                                // надо использовать == что и сделал
                                elseif (isset($objectBlockFields['field_is_link']) and ($objectBlockFields['field_is_link']) == "1") {
                                //--- ЗубановИА 01072019
                                    $IdDbTypeControllers= DbTypeController::with('controllerFields')
                                        ->where('controller_id', $globalVariablesControllerTable['objectTableControllerId'])->get()->toArray();

                                    foreach ($IdDbTypeControllers[0]['controller_fields'] as $fields){

                                        $table_field_name= $fields['table_field_name'];

                                        $ControllerLinksModel= DbTypeController::with('models')
                                        ->where('object_key_field', $fields['field_alias'])->get()->toArray();


                                        if ( ($objectBlockFields['field_alias']) === ($fields['field_alias']) ){

                                            $objectsToChangeId =DB::table($ControllerLinksModel[0]['models']['table_name'])
                                                ->select('id')
                                                ->where($fields['field_alias'], $objectBlockFields['field_values']['value_current'])
                                                ->value('id');

                                            if ( empty($objectsToChangeId) ){

                                                $encodeLog = \GuzzleHttp\json_encode($objectBlockFields);
                                                $encodeLogResArray = \GuzzleHttp\json_encode($resArray);

                                                $log = new Log();
                                                $log->short_description	 = $encodeLog;  //
                                                $log->text =  $encodeLogResArray;
                                                $log->created_by =  '1c';
                                                $log->updated_by =  '1c';
                                                $log->save();

                                            }

                                            $objectTableToChangeFieldsValue[$fields['table_field_name']]=$objectsToChangeId;
                                        }
                                    }
                                }
                            }
                            array_unshift($objectTableToChangeFieldsValue,  $block_fields['string_line_n'] );
                            array_push($AllChangeFieldsValues, $objectTableToChangeFieldsValue);
                        }

                        //All Change Fields Table !!!!!!
                        $AllChangeFieldsValues;

//                        $db_area_l = (int)"0";
                        $db_area_l = (int)$globalVariablesController['db_area_l'];

                        if ( isset($objectKeyFieldId) and  !empty($objectKeyFieldId)){

                            if ($db_area_l === 1){

                            }
                            elseif ($db_area_l === 0){ //// // if $db_area_l = 0 !isset db_area_id in Object(Country)

                                foreach ($AllChangeFieldsValues as $fieldsValues){

                                    $objectKeyFieldId = DB::table($globalVariablesControllerTable['objectTableNameController'])
                                        ->where($globalVariablesControllerTable['objectTableObjectKeyField'], $fieldsValues[0]) //line_n
                                        ->where('contractor_id', $globalVariablesController[0]) // // !!!!!!!!!
                                        ->value('id');

                                    $arrayFieldsValues = array_except($fieldsValues,
                                        [
                                            $globalVariablesControllerTable['objectTableObjectKeyField'],
                                            '0'
                                        ]
                                    );

                                    DB::table($globalVariablesControllerTable['objectTableNameController'])
                                        ->where('id', $objectKeyFieldId)
                                        ->update($arrayFieldsValues);
                                }
                            }

                        //END if (isset(object tables to change)

                        $status = [
                            'status' => [
                                'status_code' => "1",
                                'status_description' => 'updated '.$globalVariablesController['nameModel'],
                            ]
                        ];
                        return $status;
                    }
                        //create contractor if !isset uid_1c_code
                        elseif (empty($objectKeyFieldId )){

                        array_unshift($objectsToChangeFieldsValue ,  $globalVariablesController['globalVariablesDB']['db_id'], $objectsToChange['object_key_value'] );

                        foreach ($objectsToChangeFieldsValue as $key=>$value){

                            if ( isset($key) and ($key===0)  ){
                                $objectsToChangeFieldsValue['db_area_id']=$value;
                                //$key = array_search(0, $objectsToChangeFieldsValue);
                                unset($objectsToChangeFieldsValue[0]);
                            }
                            elseif ( isset($key) and ($key===1)  ){
                                $objectsToChangeFieldsValue['uid_1c_code']=$value;
                                unset($objectsToChangeFieldsValue[1]);
                            }
                        }

                        // Contractor individual_l  actual_l entrepreneur_certificate_date all not null

                        //Contractor::insert($objectsToChangeFieldsValue);
                        //+++ ЗубановИА 28062019 Добавляю заполнение системных полей
                        $objectsToChangeFieldsValue['created_by'] = $DbAreaRelations[0]['consumer']['consumer_code'];
                        $objectsToChangeFieldsValue['updated_by'] = $DbAreaRelations[0]['consumer']['consumer_code'];
                        //Т.к. запись осуществляеться напрямую в базу данных, а не через модель то и поля
                        // содержащие  время создания и изменения инициализируем сами
                        $current_time = Carbon::now()->format("Y-m-d H:i:s");
                        $objectsToChangeFieldsValue['created_at'] = $current_time;
                        $objectsToChangeFieldsValue['updated_at'] = $current_time;
                        //--- ЗубановИА 28062019 Добавляю заполнение системных полей
                        DB::table($globalVariablesController['nameTable'])->insert($objectsToChangeFieldsValue);

                        $status = [
                            'status' => [
                                'status_code' => "1",
                                //+++ ЗубановИА 28062019 Было
                                //'status_description' => 'created new contractor'
                                //изменил чтоб было понятно какой объект создан
                                'status_description' => 'created new '.$globalVariablesController['nameModel'],
                                //--- ЗубановИА 28062019
                            ]
                        ];
                        return $status;
                    }


                        /*--------------------END Table NEW Change------------------------------*/
                        /*--------------------END Table NEW Change------------------------------*/


                        /*-------------------- old Table NEW Change------------------------------*/
//                        if (isset($objectsToChange['object_tables_to_change']) and !empty($objectsToChange['object_tables_to_change'])) {
//
//                            $objectTablesArray = [];
//                            foreach ($objectsToChange['object_tables_to_change'] as $objectTablesToChange) {
//
//                                if (isset($objectTablesToChange['table_type_code']) and !empty($objectTablesToChange['table_type_code'])) {
//
//                                    $nameController = \App\Models\ModelTables::with('controller')
//                                        ->where('table_code', $objectTablesToChange['table_type_code'])
//                                        ->get()->toArray();
//
//                                    $dbTypesControllers = \App\Models\Controller::with('dbTypeController.controllerFields')
//                                        //            ->where('controller_code', class_basename(Route::current()->controller))
//                                        ->where('controller_code', $nameController[0]['controller']['controller_code'])
//                                        ->get()->toArray();
//
//                                    $fieldsDbTypesControllers = []; // GET FIELDS FROM table DbTypeController
//                                    foreach ($dbTypesControllers as $dbTypeControllers) {
//                                        foreach ($dbTypeControllers['db_type_controller'] as $controller) {
////                                            if (($controller['db_type_id'] == $dbAreaId)) {
//                                            if (($controller['db_type_id'] == $globalVariablesController['globalVariablesDB']['db_type_id'])) {
//                                                $DbTypeId = $controller['id'];
//                                                foreach ($controller['controller_fields'] as $fields) {
//                                                    $fieldsDbTypesControllers[$fields['id']] = $fields['field_alias'];
//                                                }
//                                            }
//                                        }
//                                    }
//                                }
//
//                                $tableStringsArray = ['table_type_code' => $objectTablesToChange['table_type_code']];
//                                foreach ($objectTablesToChange['table_strings'] as $tableStrings) {
//
//                                    $blockFields = ['string_line_n' => $tableStrings['string_line_n']];
//                                    foreach ($tableStrings['string_block_fields'] as $string) {
//                                        foreach ($fieldsDbTypesControllers as $key => $value) {
////                                                    if (isset($string['field_name']) and $string['field_name'] == $value) {
//                                            if (isset($string['field_alias']) and $string['field_alias'] == $value) {
//                                                $blockFields[] = $string;
//                                            }
//                                        }
//                                    }
//                                    $tableStringsArray[] = $blockFields; /*=====*/
//                                }
//                                $objectTablesArray[] = $tableStringsArray;
//                            }
//
//                            /*-----------------------Update Fields Object Tables To Change-------------------------*/
//                            $ModelName = ModelTables::select('table_name')
//                                ->where('id', '=', $dbTypesControllers[0]['controller_table_n'])
//                                ->value('table_name');
//
//
//                            if (isset($objectTablesArray) and (!empty($objectTablesArray))) {
//
//                                foreach ($objectTablesArray as $objectTables) {
//
//                                    foreach ($objectTables as $key => $value) {
//
//                                        $exceptTableTypeCode = array_except($objectTables,
//                                            [
//                                                'table_type_code',
//                                            ]
//                                        );
//
//                                        $tableToChangeModel = ModelTables::select('table_name')
//                                            ->where('table_code', '=', $objectTables['table_type_code'])
//                                            ->value('table_name');
//
//                                        foreach ($exceptTableTypeCode as $exceptTableTypeCodeKey => $exceptTableTypeCodeValue) {
//
//                                            $exceptStringLineN = array_except($exceptTableTypeCodeValue,
//                                                [
//                                                    'string_line_n',
//                                                ]
//                                            );
//
//                                            /*-------------------------!!!!!!!!!!-----------------------------*/
//
//                                            foreach ($exceptStringLineN as $exceptStringLineNArray) {
//
//                                                $IdDbTypeControllerFields = DB::table('_DbTypeControllerFields')
//                                                    ->select('field_reference')
////                                                ->where('field_alias', '=', $exceptStringLineNArray['field_name'])
//                                                    ->where('field_alias', '=', $exceptStringLineNArray['field_alias'])
//                                                    ->where('db_type_controller_id', '=', $dbTypesControllers[0]['db_type_controller'][0]['id'])
//                                                    ->value('field_reference');
//
//
//                                                if (isset($IdDbTypeControllerFields) and ($IdDbTypeControllerFields == '0')) {
//
//                                                    $update = DB::table((string)$tableToChangeModel)
//                                                        ->where('line_n', '=', $exceptTableTypeCodeValue['string_line_n'])
////                                                        ->where('line_n', '=', 112)
//                                                        ->where('contractor_id', $objectKeyFieldId)
//                                                        ->update([
////                                                        (string)$exceptStringLineNArray['field_name'] => $exceptStringLineNArray['field_values']['value_new']
//                                                            (string)$exceptStringLineNArray['field_alias'] => $exceptStringLineNArray['field_values']['value_new']
//                                                        ]);
//
//                                                } elseif (isset($IdDbTypeControllerFields) and ($IdDbTypeControllerFields == '1')) {
//
//                                                    $ModelIsLinkDbTypeController = DB::table('_DbTypeControllers')
////                                                    ->where('object_key_field', '=', $exceptStringLineNArray['field_name'])
//                                                        ->where('object_key_field', '=', $exceptStringLineNArray['field_alias'])
////                                                        ->where('db_type_id', '=', $dbAreaId)
//                                                        ->where('db_type_id', '=', $globalVariablesController['globalVariablesDB']['db_type_id'])
//                                                        ->get()->toArray();
//
//
//                                                    $ModelIsLink = ModelTables::select('table_name')
//                                                        ->where('table_code', '=', $ModelIsLinkDbTypeController[0]->object_type_code)
//                                                        ->value('table_name');
//
//
//                                                    $DbTypeControllerIdField = DB::table((string)$ModelIsLink)
//                                                        ->select('id')
////                                                    ->where((string)$exceptStringLineNArray['field_name'], '=', $exceptStringLineNArray['field_values']['value_new'])
//                                                        ->where((string)$exceptStringLineNArray['field_alias'], '=', $exceptStringLineNArray['field_values']['value_new'])
//                                                        ->value('id');
//
//
//                                                    $DbTypeControllerNameField = DB::table('_DbTypeControllerFields')
//                                                        ->select('table_field_name')
////                                                    ->where('field_alias', '=', $exceptStringLineNArray['field_name'])
//                                                        ->where('field_alias', '=', $exceptStringLineNArray['field_alias'])
//                                                        ->where('db_type_controller_id', '=', $dbTypesControllers[0]['db_type_controller'][0]['id'])
//                                                        ->value('table_field_name');
//
//
//                                                    $update = DB::table((string)$tableToChangeModel)->where('line_n', '=', $exceptTableTypeCodeValue['string_line_n'])
//                                                        ->update([
//                                                            (string)$DbTypeControllerNameField => $DbTypeControllerIdField
//                                                        ]);
//                                                }
//                                            }
//                                        }
//                                    }
//                                }
//                            }
//                        }
                        /*--------------------END old Table NEW Change----------------------------*/

                        //END if (isset(object tables to change)

                        $status = [
                            'status' => [
                                'status_code' => "1",
                                'status_description' => 'updated',
                            ]
                        ];
                        return $status;
                    }
                    //create contractor if !isset uid_1c_code
                    elseif (empty($objectKeyFieldId )){

                        array_unshift($objectsToChangeFieldsValue ,  $globalVariablesController['globalVariablesDB']['db_id'], $objectsToChange['object_key_value'] );

                        foreach ($objectsToChangeFieldsValue as $key=>$value){

                            if ( isset($key) and ($key===0)  ){
                                $objectsToChangeFieldsValue['db_area_id']=$value;
//                                $key = array_search(0, $objectsToChangeFieldsValue);
                                unset($objectsToChangeFieldsValue[0]);
                            }
                            elseif ( isset($key) and ($key===1)  ){
                                $objectsToChangeFieldsValue['uid_1c_code']=$value;
                                unset($objectsToChangeFieldsValue[1]);
                            }
                        }

                        // Contractor individual_l  actual_l entrepreneur_certificate_date all not null

//                        Contractor::insert($objectsToChangeFieldsValue);

//                        $DbAreaRelations[0]['consumer']['consumer_code'];


                        //+++ ЗубановИА 28062019 Добавляю заполнение системных полей
                        $objectsToChangeFieldsValue['created_by'] = $DbAreaRelations[0]['consumer']['consumer_code'];
                        $objectsToChangeFieldsValue['updated_by'] = $DbAreaRelations[0]['consumer']['consumer_code'];
                        //Т.к. запись осуществляеться напрямую в базу данных, а не через модель то и поля
                        // содержащие  время создания и изменения инициализируем сами
                        $current_time = Carbon::now()->format("Y-m-d H:i:s");
                        $objectsToChangeFieldsValue['created_at'] = $current_time;
                        $objectsToChangeFieldsValue['updated_at'] = $current_time;
                        //--- ЗубановИА 28062019 Добавляю заполнение системных полей

                        DB::table($globalVariablesController['nameTable'])->insert($objectsToChangeFieldsValue);

                        $status = [
                            'status' => [
                                'status_code' => "1",
                                'status_description' => 'created new '.$globalVariablesController['nameModel'],
                            ]
                        ];
                        return $status;
                    }
                }

                //table nEW

//                if (isset($resArray['request']['request_parameters']['objects_to_change'][0]['object_tables_to_change'][0]) and !empty($resArray['request']['request_parameters']['objects_to_change'][0]['object_tables_to_change'][0])  ){
//                    $objectTableToChangeFieldsValue=[];
//
//                    foreach ($objectsToChange['object_tables_to_change'][0] as $objectBlockFields){
//                        $test =$objectBlockFields;
//                        if (isset($objectBlockFields['field_is_link']) and ($objectBlockFields['field_is_link']) == "0") {
//                            $objectTableToChangeFieldsValue[$objectBlockFields['field_alias']]=$objectBlockFields['field_values']['value_current'];
//                        }
//                        elseif (isset($objectBlockFields['field_is_link']) and ($objectBlockFields['field_is_link']) == "1") {
//
//                            $IdControllerLinks = ControllerLink::where('controller_id', '=', $globalVariablesController['controller_id'])
//                                ->get()->toArray();
//
//
//                            $ControllerLinks = \App\Models\DbTypeController::where('controller_id', $IdControllerLinks[0]['controller_id_link'])
//                                ->where('db_type_id', $globalVariablesController['globalVariablesDB']['db_type_id'])
//                                ->get()->toArray();
//
//                            $ControllerLinksModel= ModelTables::where('table_code', $ControllerLinks[0]['object_type_code'])->get()->toArray();
//
//                            // get Country id
//                            $objectsToChangeId =DB::table($ControllerLinksModel[0]['table_name'])
//                                ->select('id')
//                                ->where($ControllerLinks[0]['object_key_field'], $objectBlockFields['field_values']['value_current']['object_key_value'])
//                                ->get()->toArray();
//
//                            $objectsId= $objectsToChangeId[0]->id; // (country_id)
//                            $objectTableToChangeFieldsValue[$IdControllerLinks[0]['table_field_name']]=$objectsId;
//                        }
//
//                    }
//
//                    $db_area_l = (int)"1";
//                    if ($db_area_l === 1){
//                        $objectKeyFieldId = DB::table($globalVariablesController['nameTable'])
//                            ->where($globalVariablesController['object_key_field'], $objectsToChange['object_key_value'])
//                            ->where('db_area_id', $globalVariablesController['globalVariablesDB']['db_id'])
//                            ->value('id');
//                    }
//                    elseif ($db_area_l === 0){ //// // if $db_area_l = 0 !isset db_area_id in Object(Country)
//                        $objectKeyFieldId = DB::table($globalVariablesController['nameTable'])
//                            ->where($globalVariablesController['object_key_field'], $objectsToChange['object_key_value'])
//                            ->value('id');
//                    }
//
//                    if ( isset($objectKeyFieldId) and  !empty($objectKeyFieldId)){
//
//                        if ($db_area_l === 1){
//                            DB::table($globalVariablesController['nameTable'])
//                                ->where('id', $objectKeyFieldId)
//                                ->where('db_area_id', $globalVariablesController['globalVariablesDB']['db_id'])
//                                ->update($objectsToChangeFieldsValue);
//                        }
//                        elseif ($db_area_l === 0){
//                            DB::table($globalVariablesController['nameTable'])
//                                ->where('id', $objectKeyFieldId)
//                                ->update($objectsToChangeFieldsValue);
//                        }
//
//                        //if (isset(object tables to change)
//
//                        if (isset($objectsToChange['object_tables_to_change']) and !empty($objectsToChange['object_tables_to_change'])) {
//
//                            $objectTablesArray = [];
//                            foreach ($objectsToChange['object_tables_to_change'] as $objectTablesToChange) {
//
//                                if (isset($objectTablesToChange['table_type_code']) and !empty($objectTablesToChange['table_type_code'])) {
//
//                                    $nameController = \App\Models\ModelTables::with('controller')
//                                        ->where('table_code', $objectTablesToChange['table_type_code'])
//                                        ->get()->toArray();
//
//                                    $dbTypesControllers = \App\Models\Controller::with('dbTypeController.controllerFields')
//                                        //            ->where('controller_code', class_basename(Route::current()->controller))
//                                        ->where('controller_code', $nameController[0]['controller']['controller_code'])
//                                        ->get()->toArray();
//
//                                    $fieldsDbTypesControllers = []; // GET FIELDS FROM table DbTypeController
//                                    foreach ($dbTypesControllers as $dbTypeControllers) {
//                                        foreach ($dbTypeControllers['db_type_controller'] as $controller) {
////                                            if (($controller['db_type_id'] == $dbAreaId)) {
//                                            if (($controller['db_type_id'] == $globalVariablesController['globalVariablesDB']['db_type_id'])) {
//                                                $DbTypeId = $controller['id'];
//                                                foreach ($controller['controller_fields'] as $fields) {
//                                                    $fieldsDbTypesControllers[$fields['id']] = $fields['field_alias'];
//                                                }
//                                            }
//                                        }
//                                    }
//                                }
//
//                                $tableStringsArray = ['table_type_code' => $objectTablesToChange['table_type_code']];
//                                foreach ($objectTablesToChange['table_strings'] as $tableStrings) {
//
//                                    $blockFields = ['string_line_n' => $tableStrings['string_line_n']];
//                                    foreach ($tableStrings['string_block_fields'] as $string) {
//                                        foreach ($fieldsDbTypesControllers as $key => $value) {
////                                                    if (isset($string['field_name']) and $string['field_name'] == $value) {
//                                            if (isset($string['field_alias']) and $string['field_alias'] == $value) {
//                                                $blockFields[] = $string;
//                                            }
//                                        }
//
//                                    }
//                                    $tableStringsArray[] = $blockFields; /*=====*/
//                                }
//                                $objectTablesArray[] = $tableStringsArray;
//                            }
//
//                            /*-----------------------Update Fields Object Tables To Change-------------------------*/
//                            $ModelName = ModelTables::select('table_name')
//                                ->where('id', '=', $dbTypesControllers[0]['controller_table_n'])
//                                ->value('table_name');
//
//
//                            if (isset($objectTablesArray) and (!empty($objectTablesArray))) {
//
//                                foreach ($objectTablesArray as $objectTables) {
//
//                                    foreach ($objectTables as $key => $value) {
//
//                                        $exceptTableTypeCode = array_except($objectTables,
//                                            [
//                                                'table_type_code',
//                                            ]
//                                        );
//
//                                        $tableToChangeModel = ModelTables::select('table_name')
//                                            ->where('table_code', '=', $objectTables['table_type_code'])
//                                            ->value('table_name');
//
//                                        foreach ($exceptTableTypeCode as $exceptTableTypeCodeKey => $exceptTableTypeCodeValue) {
//
//                                            $exceptStringLineN = array_except($exceptTableTypeCodeValue,
//                                                [
//                                                    'string_line_n',
//                                                ]
//                                            );
//
//                                            /*-------------------------!!!!!!!!!!-----------------------------*/
//
//                                            foreach ($exceptStringLineN as $exceptStringLineNArray) {
//
//                                                $IdDbTypeControllerFields = DB::table('_DbTypeControllerFields')
//                                                    ->select('field_reference')
////                                                ->where('field_alias', '=', $exceptStringLineNArray['field_name'])
//                                                    ->where('field_alias', '=', $exceptStringLineNArray['field_alias'])
//                                                    ->where('db_type_controller_id', '=', $dbTypesControllers[0]['db_type_controller'][0]['id'])
//                                                    ->value('field_reference');
//
//
//                                                if (isset($IdDbTypeControllerFields) and ($IdDbTypeControllerFields == '0')) {
//
//                                                    $update = DB::table((string)$tableToChangeModel)
//                                                        ->where('line_n', '=', $exceptTableTypeCodeValue['string_line_n'])
////                                                        ->where('line_n', '=', 112)
//                                                        ->where('contractor_id', $objectKeyFieldId)
//                                                        ->update([
////                                                        (string)$exceptStringLineNArray['field_name'] => $exceptStringLineNArray['field_values']['value_new']
//                                                            (string)$exceptStringLineNArray['field_alias'] => $exceptStringLineNArray['field_values']['value_new']
//                                                        ]);
//
//                                                } elseif (isset($IdDbTypeControllerFields) and ($IdDbTypeControllerFields == '1')) {
//
//                                                    $ModelIsLinkDbTypeController = DB::table('_DbTypeControllers')
////                                                    ->where('object_key_field', '=', $exceptStringLineNArray['field_name'])
//                                                        ->where('object_key_field', '=', $exceptStringLineNArray['field_alias'])
////                                                        ->where('db_type_id', '=', $dbAreaId)
//                                                        ->where('db_type_id', '=', $globalVariablesController['globalVariablesDB']['db_type_id'])
//                                                        ->get()->toArray();
//
//
//                                                    $ModelIsLink = ModelTables::select('table_name')
//                                                        ->where('table_code', '=', $ModelIsLinkDbTypeController[0]->object_type_code)
//                                                        ->value('table_name');
//
//
//                                                    $DbTypeControllerIdField = DB::table((string)$ModelIsLink)
//                                                        ->select('id')
////                                                    ->where((string)$exceptStringLineNArray['field_name'], '=', $exceptStringLineNArray['field_values']['value_new'])
//                                                        ->where((string)$exceptStringLineNArray['field_alias'], '=', $exceptStringLineNArray['field_values']['value_new'])
//                                                        ->value('id');
//
//
//                                                    $DbTypeControllerNameField = DB::table('_DbTypeControllerFields')
//                                                        ->select('table_field_name')
////                                                    ->where('field_alias', '=', $exceptStringLineNArray['field_name'])
//                                                        ->where('field_alias', '=', $exceptStringLineNArray['field_alias'])
//                                                        ->where('db_type_controller_id', '=', $dbTypesControllers[0]['db_type_controller'][0]['id'])
//                                                        ->value('table_field_name');
//
//
//                                                    $update = DB::table((string)$tableToChangeModel)->where('line_n', '=', $exceptTableTypeCodeValue['string_line_n'])
//                                                        ->update([
//                                                            (string)$DbTypeControllerNameField => $DbTypeControllerIdField
//                                                        ]);
//                                                }
//                                            }
//                                        }
//                                    }
//                                }
//                            }
//                        }
//
//                        //END if (isset(object tables to change)
//
//                        $status = [
//                            'status' => [
//                                'status_code' => "1",
//                                'status_description' => 'updated',
//                            ]
//                        ];
//                        return $status;
//                    }
//                    //create contractor if !isset uid_1c_code
//                    elseif (empty($objectKeyFieldId )){
//
//                        array_unshift($objectsToChangeFieldsValue ,  $globalVariablesController['globalVariablesDB']['db_id'], $objectsToChange['object_key_value'] );
//
//                        foreach ($objectsToChangeFieldsValue as $key=>$value){
//
//                            if ( isset($key) and ($key===0)  ){
//                                $objectsToChangeFieldsValue['db_area_id']=$value;
////                                $key = array_search(0, $objectsToChangeFieldsValue);
//                                unset($objectsToChangeFieldsValue[0]);
//                            }
//                            elseif ( isset($key) and ($key===1)  ){
//                                $objectsToChangeFieldsValue['uid_1c_code']=$value;
//                                unset($objectsToChangeFieldsValue[1]);
//                            }
//                        }
//
//                        // Contractor individual_l  actual_l entrepreneur_certificate_date all not null
//
////                        Contractor::insert($objectsToChangeFieldsValue);
//                        DB::table($globalVariablesController['nameTable'])->insert($objectsToChangeFieldsValue);
//
//                        $status = [
//                            'status' => [
//                                'status_code' => "1",
//                                'status_description' => 'created new contractor',
//                            ]
//                        ];
//                        return $status;
//                    }
//
//                    return $objectTableToChangeFieldsValue;
//                }

                //END table nEW
            }
            elseif (empty($resArray['request']['request_parameters']['objects_to_change'][0]['object_type_code']) ){

                return "empty object_type_code to resArray";
            }
//            return "ok";
            $status = [
                'status' => [
                    'status_code' => "1",
                    'status_description' => 'updated contractor',
                ]
            ];
            return $status;

        }
        else{

            $status = [
                'status' => [
                    'status_code' => "0",
                    'status_description' => 'token is not valid',
                ]
            ];
            return $status;
        }










        $getToken_1C = $request->header('token');

//        $dbAreas = DbArea::where('db_area_token', $getToken_1C) ////??????
        $dbAreas = DbArea::where('db_area_token', '4096b931-006e-45b7-9481-0ca16b0aac60')
//        $dbAreas = DbArea::where('db_area_token', 'iieFtWss5paGPM9HM4Y5dQX8hBAo9Ea2T60nQuKDgqClgPchZKMTV4gsowgQC7KrWnbzFPbXFk4rMZfMbzqTWKHZRVmyxp252RfA')
            ->where('db_area_code', $resArray['request']['db_area_code'])
            ->get()->first();


        if (is_null($dbAreas)) {
            $status = [
                'status' => [
                    'status_code' => "0",
                    'status_description' => 'token is not valid',
                ]
            ];

            return response()->json($status);
        }

        if (isset($dbAreas) and !empty($dbAreas)) {

            $resArray = \GuzzleHttp\json_decode($request->getContent(), true);

            if (isset($resArray) and !empty($resArray)) {
                if ($resArray['request']['request_name'] == 'ContractorsCreateUpdate') {

                    $dbAreas = Dbase::with('db_area')->get()->toArray();
//                    $dbAreas = $dbAreas[0];

                    $db_area_code = [];
//                    foreach ($dbAreas['db_area'] as $db) {
//
//                        if ($resArray['request']['db_area_code'] == $db['db_area_code']) {
//                            $db_area_code[] =  array($idDbArea = $db['id'], $idDbArea = $db['db_id']);
//                        }
//                    }

                    foreach ($dbAreas as $dbArea) {

                        foreach ($dbArea['db_area'] as $db) {

                            if ($resArray['request']['db_area_code'] == $db['db_area_code']) {
                                $db_area_code[] = array($idDbArea = $db['id'], $idDbArea = $db['db_id']);
                            }
                        }
                    }

                    $countryIdContractors = Country::where('country_code', $resArray['request']['request_parameters']['сontractors']['country_code'])->first();
                    $uid_1c_code_1C_Query = $resArray['request']['request_parameters']['сontractors']['uid_1c_code'];
                    $Contractoruid_1c_code = \Illuminate\Support\Facades\DB::table('Contractors')->select('uid_1c_code')->where('uid_1c_code', '=', $uid_1c_code_1C_Query)->value('uid_1c_code');

                    $ContractorId = \Illuminate\Support\Facades\DB::table('Contractors')->select('id')->where('uid_1c_code', '=', $uid_1c_code_1C_Query)->value('id');

                    $ContractorCurrent = Contractor::where('id', $ContractorId)->get()->first();


                    /*------if not  $db_area_code = name db------*/
                    if (count($db_area_code) == "0") {

                        $status = [
                            'status' => [
                                'status_code' => "0",
                                'status_description' => 'no such user',
                            ]
                        ];

                        return response()->json($status);
                    }
                    /*--END if not  $db_area_code = name db-------*/


                    /*----------------Create NEW  Contractor---------------- */

                    $ContractorUid1cDbarea = \Illuminate\Support\Facades\DB::table('Contractors')->select('id')->where('uid_1c_code', '=', $uid_1c_code_1C_Query)
                        ->where('db_area_id', $db_area_code[0][0])
                        ->value('id');


//                    if(isset($db_area_code[0]) and (!empty($Contractoruid_1c_code))){


                    if (isset($db_area_code[0]) and ($ContractorCurrent['db_area_id'] == $db_area_code[0][0]) and !empty($ContractorUid1cDbarea) or (!is_null($ContractorUid1cDbarea))) {


                        $ContractorGet = Contractor::where('uid_1c_code', '=', $Contractoruid_1c_code)
                            ->where('db_area_id', $db_area_code[0][0])
                            ->get()->first();


                        $ZzContractor = new ZzContractor();
                        $ZzContractor->country_id = $ContractorGet->country_id;
                        $ZzContractor->reason_date_change_id = 1;
                        $ZzContractor->contractor_id = $ContractorGet->id;
                        $ZzContractor->individual_l = $ContractorGet->individual_l;
                        //                    $ZzContractor -> entrepreneur_l  =
                        $ZzContractor->contractor_full_name = $ContractorGet->contractor_full_name;
                        $ZzContractor->contractor_short_name = $ContractorGet->contractor_short_name;
                        $ZzContractor->taxpayer_number = $ContractorGet->taxpayer_number;
                        $ZzContractor->registry_number = $ContractorGet->registry_number;
                        $ZzContractor->social_security_number = $ContractorGet->social_security_number;
                        $ZzContractor->entrepreneur_certificate = $ContractorGet->entrepreneur_certificate;
                        //                    $ZzContractor -> entrepreneur_certificate_date  =
                        //                    $ZzContractor -> first_name  =
                        //                    $ZzContractor -> last_name  =
                        //                    $ZzContractor -> middle_name  =
                        //                    $ZzContractor -> male_l  =
                        //                    $ZzContractor -> birth_date  =
                        //                    $ZzContractor -> record_date  =
//                        $ZzContractor -> suser_name  = $ContractorGet->suser_name; //Commit Albert Topalu 14.11.18
//                        $ZzContractor -> modify_date  = $ContractorGet->updated_at; //Commit Albert Topalu 14.11.18
                        $ZzContractor->created_by = (new ConsumerParameters())->consumerCode();
                        $ZzContractor->save();


                        Contractor::where('db_area_id', $db_area_code[0][0])
                            ->where('uid_1c_code', $resArray['request']['request_parameters']['сontractors']['uid_1c_code'])
                            ->update(
                                [
                                    'individual_l' => $resArray['request']['request_parameters']['сontractors']['individual_l'],
                                    'uid_1c_code' => $resArray['request']['request_parameters']['сontractors']['uid_1c_code'],
//                                    'country_id' => $resArray['request']['request_parameters']['сontractors']['country_code'], //update Albert Topalu 12.09.18 12:13
                                    'country_id' => $countryIdContractors['id'],
                                    'contractor_full_name' => $resArray['request']['request_parameters']['сontractors']['сontractor_full_name'],
                                    'contractor_short_name' => $resArray['request']['request_parameters']['сontractors']['сontractor_short_name'],
                                    'taxpayer_number' => $resArray['request']['request_parameters']['сontractors']['taxpayer_number'],
                                    'code_reason_number' => $resArray['request']['request_parameters']['сontractors']['code_reason_number'],
                                    'registry_number' => $resArray['request']['request_parameters']['сontractors']['registry_number'],
                                    'entrepreneur_certificate' => $resArray['request']['request_parameters']['сontractors']['entrepreneur_certificate'],
                                    'entrepreneur_certificate_date' => $resArray['request']['request_parameters']['сontractors']['entrepreneur_certificate_date'],
//                                    'suser_name' => $resArray['request']['request_parameters']['сontractors']['suser_name'], //Commit Albert Topalu 14.11.18
                                    'updated_by' => (new ConsumerParameters())->consumerCode()
                                ]
                            );


                        $ContractoruId = \Illuminate\Support\Facades\DB::table('Contractors')->select('id')
                            ->where('uid_1c_code', '=', $Contractoruid_1c_code)
                            ->where('db_area_id', $db_area_code[0][0])
                            ->value('id');

                        $ContractorUpdated = \Illuminate\Support\Facades\DB::table('Contractors')->select('updated_at')->where('uid_1c_code', '=', $Contractoruid_1c_code)->value('updated_at');

                        $ContractorInfo = ContractorInfo::where('contractor_id', $ContractoruId)->get()->toArray();

                        foreach ($ContractorInfo as $info) {
                            $ZzContractorInfo = new ZzContractorInfo();
                            $ZzContractorInfo->info_type_id = $info['info_type_id'];
                            $ZzContractorInfo->country_id = $info['country_id'];
                            $ZzContractorInfo->reason_date_change_id = 1;
                            $ZzContractorInfo->contractor_id = $info['contractor_id'];
                            $ZzContractorInfo->info_kind_id = $info['info_kind_id'];
                            $ZzContractorInfo->region_id = $info['region_id'];
                            $ZzContractorInfo->representation = $info['representation'];
                            $ZzContractorInfo->city_name = $info['city_name'];
                            $ZzContractorInfo->e_mail = $info['email'];
                            $ZzContractorInfo->url_name = $info['url_name'];
                            $ZzContractorInfo->phone_number = $info['phone_number'];
                            $ZzContractorInfo->phone_number_without_codes = $info['phone_number_without_codes'];
                            $ZzContractorInfo->record_date = $info['updated_at'];
//                            $ZzContractorInfo->suser_name = $info['suser_name'];
//                            $ZzContractorInfo->modify_date = $ContractorUpdated;
                            $ZzContractorInfo->created_by = (new ConsumerParameters())->consumerCode();
                            $ZzContractorInfo->save();

                            ContractorInfo::where('id', $info['id'])->delete();
                        }

                        if (isset($resArray['request']['request_parameters']['сontractors']['contact_information'])) {
                            foreach ($resArray['request']['request_parameters']['сontractors']['contact_information'] as $contact_information) {

                                $countryInfoId = Country::where('country_code', $contact_information['country_code'])->first();

                                $info_types = \Illuminate\Support\Facades\DB::table('_Info_types')->select('id')->where('info_type_name', '=', $contact_information['info_type'])->value('id');

                                if (!isset($info_types) and empty($info_types)) {
                                    $infoTypes = new InfoType();
                                    $infoTypes->info_type_code = $contact_information['info_type'];
                                    $infoTypes->info_type_name = $contact_information['info_type'];
                                    //$infoTypes -> modify_date = "";
                                    $infoTypes->save();
                                }
                                $info_kind_name = \Illuminate\Support\Facades\DB::table('_Info_kinds')->select('id')->where('info_kind_name', '=', $contact_information['info_kind'])->value('id');


                                if (!isset($info_kind_name) and (is_null($info_kind_name))) {

                                    $infoKinds = new InfoKind();

                                    if (!isset($info_types) and empty($info_types)) {
                                        $infoKinds->info_type_id = $infoTypes->id;
                                    }
                                    if (isset($info_types) and !empty($info_types)) {
                                        $infoKinds->info_type_id = $info_types;
                                    }

                                    $infoKinds->info_kind_code = $contact_information['info_kind'];
                                    $infoKinds->info_kind_name = $contact_information['info_kind'];
                                    // $infoKinds -> modify_date = '';
                                    $infoKinds->save();
                                }

                                $contractorInfo = new ContractorInfo();

                                if (isset($info_kind_name) and (!is_null($info_kind_name))) {

                                    $contractorInfo->info_kind_id = $info_kind_name;
                                }

                                if (!isset($info_kind_name) and (is_null($info_kind_name))) {

                                    $contractorInfo->info_kind_id = $infoKinds->id;
                                }
//                                $contractorInfo->info_kind_id = $infoKinds->id;

                                $contractorInfo->contractor_id = $ContractoruId;
//                                $contractorInfo->contractor_id = $ContractorId;

                                $contractorInfo->region_id = 3 /*$contact_information['region_code']*/
                                ;

                                if (!isset($info_types) and empty($info_types)) {
                                    $contractorInfo->info_type_id = $infoTypes->id;
                                }

                                if (isset($info_types) and !empty($info_types)) {
                                    $contractorInfo->info_type_id = $info_types;
                                }

//                                $contractorInfo->country_id = $countryInfoId->id; //update Albert Topalu 12.09.18 12:25
                                $contractorInfo->country_id = $countryIdContractors['id'];
                                $contractorInfo->representation = $contact_information['representetion'];
                                $contractorInfo->city_name = $contact_information['city_name'];
                                $contractorInfo->email = $contact_information['e_mail'];
                                $contractorInfo->url_name = $contact_information['url_name'];
                                $contractorInfo->phone_number = $contact_information['phone_number'];
                                $contractorInfo->phone_number_without_codes = $contact_information['phone_number_without_codes'];
                                $contractorInfo->actual_l = 1 /*$contact_information['actual_l']*/
                                ;
                                $contractorInfo->save();
                            }
                        }

                        $status = [
                            'status' => [
                                'status_code' => "1",
                                'status_description' => 'user updated',
                            ]
                        ];

                        return response()->json($status);
                    }

                    /*----------------Create NEW  Contractor---------------- */

//                    if(isset($db_area_code[0]) and  (is_null($Contractoruid_1c_code))){


                    if (isset($db_area_code[0]) and ($ContractorCurrent['db_area_id'] !== $db_area_code[0][0]) and empty($ContractorUid1cDbarea) or (is_null($ContractorUid1cDbarea))) {
                        $contractor = new Contractor();
                        $contractor->uid_1c_code = $resArray['request']['request_parameters']['сontractors']['uid_1c_code'];
                        $contractor->individual_l = $resArray['request']['request_parameters']['сontractors']['individual_l'];
//                        $contractor -> country_id = $countryId->id;
                        $contractor->country_id = $countryIdContractors['id'];
                        $contractor->db_area_id = $db_area_code[0][0];
                        $contractor->contractor_full_name = $resArray['request']['request_parameters']['сontractors']['сontractor_full_name'];

                        $contractor->contractor_short_name = $resArray['request']['request_parameters']['сontractors']['сontractor_short_name'];
                        $contractor->taxpayer_number = $resArray['request']['request_parameters']['сontractors']['taxpayer_number'];
                        $contractor->code_reason_number = $resArray['request']['request_parameters']['сontractors']['code_reason_number'];
                        $contractor->registry_number = $resArray['request']['request_parameters']['сontractors']['registry_number'];
                        $contractor->entrepreneur_certificate = $resArray['request']['request_parameters']['сontractors']['entrepreneur_certificate'];
                        $contractor->entrepreneur_certificate_date = $resArray['request']['request_parameters']['сontractors']['entrepreneur_certificate_date'];
//                        $contractor -> suser_name = $resArray['request']['request_parameters']['сontractors']['suser_name']; //commit Albert Topalu 14.11.18
                        $contractor->created_by = (new ConsumerParameters())->consumerCode();
                        $contractor->save();


                        if (isset($resArray['request']['request_parameters']['сontractors']['contact_information'])) {
                            foreach ($resArray['request']['request_parameters']['сontractors']['contact_information'] as $contact_information) {

                                $countryInfoId = Country::where('country_code', $contact_information['country_code'])->first();

                                $info_types = \Illuminate\Support\Facades\DB::table('_Info_types')->select('id')->where('info_type_name', '=', $contact_information['info_type'])->value('id');

                                if (!isset($info_types) and empty($info_types)) {
                                    $infoTypes = new InfoType();
                                    $infoTypes->info_type_code = $contact_information['info_type'];
                                    $infoTypes->info_type_name = $contact_information['info_type'];
                                    //$infoTypes -> modify_date = "";
                                    $infoTypes->save();
                                }

                                $info_kind_name = \Illuminate\Support\Facades\DB::table('_Info_kinds')->select('id')->where('info_kind_name', '=', $contact_information['info_kind'])->value('id');


                                if (!isset($info_kind_name) and (is_null($info_kind_name))) {

                                    $infoKinds = new InfoKind();

                                    if (!isset($info_types) and empty($info_types)) {
                                        $infoKinds->info_type_id = $infoTypes->id;
                                    }
                                    if (isset($info_types) and !empty($info_types)) {
                                        $infoKinds->info_type_id = $info_types;
                                    }

                                    $infoKinds->info_kind_code = $contact_information['info_kind'];
                                    $infoKinds->info_kind_name = $contact_information['info_kind'];
                                    // $infoKinds -> modify_date = '';
                                    $infoKinds->save();
                                }

                                $contractorInfo = new ContractorInfo();

                                if (isset($info_kind_name) and (!is_null($info_kind_name))) {

                                    $contractorInfo->info_kind_id = $info_kind_name;
                                }

                                if (!isset($info_kind_name) and (is_null($info_kind_name))) {

                                    $contractorInfo->info_kind_id = $infoKinds->id;
                                }

                                $contractorInfo->contractor_id = $contractor->id;
                                $contractorInfo->region_id = 3 /*$contact_information['region_code']*/
                                ;

                                if (!isset($info_types) and empty($info_types)) {
                                    $contractorInfo->info_type_id = $infoTypes->id;
                                }

                                if (isset($info_types) and !empty($info_types)) {
                                    $contractorInfo->info_type_id = $info_types;
                                }

//                                $contractorInfo->country_id = $countryInfoId->id; //update Albert Topalu 12.09.18 12:26
                                $contractorInfo->country_id = $countryIdContractors['id'];

                                $contractorInfo->representation = $contact_information['representetion'];
                                $contractorInfo->city_name = $contact_information['city_name'];
                                $contractorInfo->email = $contact_information['e_mail'];
                                $contractorInfo->url_name = $contact_information['url_name'];
                                $contractorInfo->phone_number = $contact_information['phone_number'];
                                $contractorInfo->phone_number_without_codes = $contact_information['phone_number_without_codes'];
                                $contractorInfo->actual_l = 1 /*$contact_information['actual_l']*/
                                ;
                                $contractorInfo->save();
                            }
                        }

                        $status = [
                            'status' => [
                                'status_code' => "1",
                                'status_description' => 'user created',
                            ]
                        ];

                        return response()->json($status);
                    }

                    /*----------------END Create NEW  Contractor---------------- */

                }

                if ($resArray['request']['request_name'] == 'CompaniesCreateUpdate') {

                    $dbAreas = Dbase::with('db_area')->get()->toArray();

                    $db_area_code = [];
                    foreach ($dbAreas as $dbArea) {

                        foreach ($dbArea['db_area'] as $db) {

                            if ($resArray['request']['db_area_code'] == $db['db_area_code']) {
                                $db_area_code[] = array($idDbArea = $db['id'], $idDbArea = $db['db_id']);
                            }
                        }
                    }

                    $countryIdCompany = Country::where('country_code', $resArray['request']['request_parameters']['company']['country_code'])->first();

                    $uid_1c_code_1C_Query = $resArray['request']['request_parameters']['company']['uid_1c_code'];
                    $CompanyUid_1c_code = \Illuminate\Support\Facades\DB::table('Companies')->select('uid_1c_code')->where('uid_1c_code', '=', $uid_1c_code_1C_Query)->value('uid_1c_code');

                    $CompanyId = \Illuminate\Support\Facades\DB::table('Companies')->select('id')->where('uid_1c_code', '=', $uid_1c_code_1C_Query)->value('id');


                    $companyCurrent = Company::where('id', $CompanyId)->get()->first();

                    /*------if not  $db_area_code = name db------*/
                    if (count($db_area_code) == "0") {
                        $status = [
                            'status' => [
                                'status_code' => "0",
                                'status_description' => 'no such user',
                            ]
                        ];

                        return response()->json($status);
                    }
                    /*--END if not  $db_area_code = name db-------*/


                    /*----------------Create NEW  Company---------------- */


//                    if(isset($db_area_code[0]) and  (is_null($CompanyUid_1c_code) or  $companyCurrent['db_area_id'] !=  $db_area_code[0][0])){


                    $CompanyUid1cDbarea = \Illuminate\Support\Facades\DB::table('Companies')
                        ->select('id')->where('uid_1c_code', '=', $uid_1c_code_1C_Query)
                        ->where('db_area_id', $db_area_code[0][0])
                        ->value('id');


                    if (isset($db_area_code[0]) and ($companyCurrent['db_area_id'] !== $db_area_code[0][0]) and empty($CompanyUid1cDbarea) or (is_null($CompanyUid1cDbarea))) {

                        $copmanyNew = new Company();
                        $copmanyNew->db_area_id = $db_area_code[0][0];
                        $copmanyNew->individual_l = $resArray['request']['request_parameters']['company']['individual_l'];
                        $copmanyNew->uid_1c_code = $resArray['request']['request_parameters']['company']['uid_1c_code'];

                        if ($resArray['request']['request_parameters']['company']['country_code'] == "") {
                            $copmanyNew->country_id = null;
                        }

                        if ($resArray['request']['request_parameters']['company']['country_code'] != "") {
//                            $copmanyNew ->country_id  = $resArray['request']['request_parameters']['company']['country_code']; update Albert Topalu 12.09.18 12:21
                            $copmanyNew->country_id = $countryIdCompany['id'];
                        }
                        $copmanyNew->company_full_name = $resArray['request']['request_parameters']['company']['company_full_name'];
                        $copmanyNew->company_short_name = $resArray['request']['request_parameters']['company']['company_short_name'];
                        $copmanyNew->taxpayer_number = $resArray['request']['request_parameters']['company']['taxpayer_number'];
                        $copmanyNew->code_reason_number = $resArray['request']['request_parameters']['company']['code_reason_number'];
                        $copmanyNew->registry_number = $resArray['request']['request_parameters']['company']['registry_number'];
                        $copmanyNew->entrepreneur_certificate = $resArray['request']['request_parameters']['company']['entrepreneur_certificate'];
                        $copmanyNew->entrepreneur_certificate_date = $resArray['request']['request_parameters']['company']['entrepreneur_certificate_date'];
//                        $copmanyNew ->suser_name  = $resArray['request']['request_parameters']['company']['suser_name']; //commit Albert Topalu 14.11.18
                        $copmanyNew->created_by = (new ConsumerParameters())->consumerCode();
                        $copmanyNew->save();


                        if (isset($resArray['request']['request_parameters']['company']['contact_information'])) {
                            foreach ($resArray['request']['request_parameters']['company']['contact_information'] as $contact_information) {

                                $countryInfoId = Country::where('country_code', $contact_information['country_code'])->first();

                                $info_types = \Illuminate\Support\Facades\DB::table('_Info_types')->select('id')->where('info_type_name', '=', $contact_information['info_type'])->value('id');

                                if (!isset($info_types) and empty($info_types)) {
                                    $infoTypes = new InfoType();
                                    $infoTypes->info_type_code = $contact_information['info_type'];
                                    $infoTypes->info_type_name = $contact_information['info_type'];
                                    //$infoTypes -> modify_date = "";
                                    $infoTypes->save();
                                }

                                $info_kind_name = \Illuminate\Support\Facades\DB::table('_Info_kinds')->select('id')->where('info_kind_name', '=', $contact_information['info_kind'])->value('id');


                                if (!isset($info_kind_name) and (is_null($info_kind_name))) {


                                    $infoKinds = new InfoKind();

                                    if (!isset($info_types) and empty($info_types)) {
                                        $infoKinds->info_type_id = $infoTypes->id;
                                    }
                                    if (isset($info_types) and !empty($info_types)) {
                                        $infoKinds->info_type_id = $info_types;
                                    }

                                    $infoKinds->info_kind_code = $contact_information['info_kind'];
                                    $infoKinds->info_kind_name = $contact_information['info_kind'];
                                    // $infoKinds -> modify_date = '';
                                    $infoKinds->save();
                                }

                                $CompanyInfo = new CompanyInfo();

                                if (isset($info_kind_name) and (!is_null($info_kind_name))) {

                                    $CompanyInfo->info_kind_id = $info_kind_name;
                                }

                                if (!isset($info_kind_name) and (is_null($info_kind_name))) {

                                    $CompanyInfo->info_kind_id = $infoKinds->id;
                                }


                                $CompanyInfo->company_id = $copmanyNew->id;

//                                $CompanyInfo->company_id = $CompanyId;

                                $CompanyInfo->region_id = 3 /*$contact_information['region_code']*/
                                ;

                                if (!isset($info_types) and empty($info_types)) {
                                    $CompanyInfo->info_type_id = $infoTypes->id;
                                }

                                if (isset($info_types) and !empty($info_types)) {
                                    $CompanyInfo->info_type_id = $info_types;
                                }

//                                $CompanyInfo->country_id = $countryInfoId->id; // //update Albert Topalu 12.09.18 12:30

                                $CompanyInfo->country_id = $countryIdCompany['id'];
                                $CompanyInfo->representation = $contact_information['representetion'];
                                $CompanyInfo->city_name = $contact_information['city_name'];
                                $CompanyInfo->e_mail = $contact_information['e_mail'];
                                $CompanyInfo->url_name = $contact_information['url_name'];
                                $CompanyInfo->phone_number = $contact_information['phone_number'];
                                $CompanyInfo->phone_number_without_codes = $contact_information['phone_number_without_codes'];
                                $CompanyInfo->save();
                            }
                        }

                        $status = [
                            'status' => [
                                'status_code' => "1",
                                'status_description' => 'company created',
                            ]
                        ];

                        return response()->json($status);
                    }

                    /*----------------END Create NEW  Company---------------- */


//                    if(isset($db_area_code[0]) and (!empty($CompanyUid_1c_code) and  $companyCurrent['db_area_id'] ==  $db_area_code[0][0] )){


                    if (isset($db_area_code[0]) and ($companyCurrent['db_area_id'] == $db_area_code[0][0]) and !empty($CompanyUid1cDbarea) or (!is_null($CompanyUid1cDbarea))) {

                        $CompanyGet = Company::where('uid_1c_code', '=', $CompanyUid_1c_code)
                            ->where('db_area_id', $db_area_code[0][0])
                            ->get()->first();


                        $ZzCompanies = new    ZzCompany();
                        $ZzCompanies->country_id = $CompanyGet->country_id;
                        $ZzCompanies->reason_date_change_id = 1;
                        $ZzCompanies->company_id = $CompanyGet->id;
                        $ZzCompanies->individual_l = $CompanyGet->individual_l;
                        //                    $ZzCompanies -> entrepreneur_l  =
                        $ZzCompanies->company_full_name = $CompanyGet->company_full_name;
                        $ZzCompanies->company_short_name = $CompanyGet->company_short_name;
                        $ZzCompanies->taxpayer_number = $CompanyGet->taxpayer_number;
                        $ZzCompanies->registry_number = $CompanyGet->registry_number;
                        $ZzCompanies->social_security_number = $CompanyGet->social_security_number;
                        $ZzCompanies->entrepreneur_certificate = $CompanyGet->entrepreneur_certificate;
                        //                    $ZzCompanies -> entrepreneur_certificate_date  =
                        //                    $ZzCompanies -> first_name  =
                        //                    $ZzCompanies -> last_name  =
                        //                    $ZzCompanies -> middle_name  =
                        //                    $ZzCompanies -> male_l  =
                        //                    $ZzCompanies -> birth_date  =
                        //                    $ZzCompanies -> record_date  =
//                        $ZzCompanies -> suser_name  = $CompanyGet->suser_name; //commit Albert Topalu 14.11.18
//                        $ZzCompanies -> modify_date  = $CompanyGet->updated_at; //commit Albert Topalu 14.11.18
                        $ZzCompanies->created_by = (new ConsumerParameters())->consumerCode();
                        $ZzCompanies->save();

                        if ($resArray['request']['request_parameters']['company']['country_code'] == "") {
                            $country_id = null;
                        }

                        if ($resArray['request']['request_parameters']['company']['country_code'] != "") {
                            $country_id = $countryIdCompany['id'];
                        }


                        Company::where('db_area_id', $db_area_code[0][0])
                            ->where('uid_1c_code', $resArray['request']['request_parameters']['company']['uid_1c_code'])
                            ->update(
                                [
                                    'individual_l' => $resArray['request']['request_parameters']['company']['individual_l'],
                                    'uid_1c_code' => $resArray['request']['request_parameters']['company']['uid_1c_code'],

                                    'country_id' => $country_id,

                                    'company_full_name' => $resArray['request']['request_parameters']['company']['company_full_name'],
                                    'company_short_name' => $resArray['request']['request_parameters']['company']['company_short_name'],
                                    'taxpayer_number' => $resArray['request']['request_parameters']['company']['taxpayer_number'],
                                    'code_reason_number' => $resArray['request']['request_parameters']['company']['code_reason_number'],
                                    'registry_number' => $resArray['request']['request_parameters']['company']['registry_number'],
                                    'entrepreneur_certificate' => $resArray['request']['request_parameters']['company']['entrepreneur_certificate'],
                                    'entrepreneur_certificate_date' => $resArray['request']['request_parameters']['company']['entrepreneur_certificate_date'],
//                                    'suser_name' => $resArray['request']['request_parameters']['company']['suser_name'],
                                    'updated_by' => (new ConsumerParameters())->consumerCode(),
                                ]
                            );

                        $CompanyId = \Illuminate\Support\Facades\DB::table('Companies')->select('id')
                            ->where('uid_1c_code', '=', $CompanyUid_1c_code)
                            ->where('db_area_id', $db_area_code[0][0])
                            ->value('id');

                        $CompanyUpdated = \Illuminate\Support\Facades\DB::table('Companies')->select('updated_at')->where('uid_1c_code', '=', $CompanyUid_1c_code)->value('updated_at');

                        $CompanyInfo = CompanyInfo::where('company_id', $CompanyId)->get()->toArray();

                        foreach ($CompanyInfo as $info) {
                            $ZzCompanyInfo = new ZzCompanyInfo();
                            $ZzCompanyInfo->info_type_id = $info['info_type_id'];
                            $ZzCompanyInfo->country_id = $info['country_id'];
                            $ZzCompanyInfo->reason_date_change_id = 1;
                            $ZzCompanyInfo->company_id = $info['company_id'];
                            $ZzCompanyInfo->info_kind_id = $info['info_kind_id'];
                            $ZzCompanyInfo->region_id = $info['region_id'];
                            $ZzCompanyInfo->representation = $info['representation'];
                            $ZzCompanyInfo->city_name = $info['city_name'];
                            $ZzCompanyInfo->e_mail = $info['e_mail'];
                            $ZzCompanyInfo->url_name = $info['url_name'];
                            $ZzCompanyInfo->phone_number = $info['phone_number'];
                            $ZzCompanyInfo->phone_number_without_codes = $info['phone_number_without_codes'];
                            $ZzCompanyInfo->record_date = $info['updated_at'];
//                            $ZzCompanyInfo->suser_name = $info['suser_name'];
//                            $ZzCompanyInfo->modify_date = $CompanyUpdated;
                            $ZzCompanyInfo->created_by = (new ConsumerParameters())->consumerCode();
                            $ZzCompanyInfo->save();

                            CompanyInfo::where('id', $info['id'])->delete();
                        }

                        if (isset($resArray['request']['request_parameters']['company']['contact_information'])) {
                            foreach ($resArray['request']['request_parameters']['company']['contact_information'] as $contact_information) {

                                $countryInfoId = Country::where('country_code', $contact_information['country_code'])->first();

                                $info_types = \Illuminate\Support\Facades\DB::table('_Info_types')->select('id')->where('info_type_name', '=', $contact_information['info_type'])->value('id');

                                if (!isset($info_types) and empty($info_types)) {
                                    $infoTypes = new InfoType();
                                    $infoTypes->info_type_code = $contact_information['info_type'];
                                    $infoTypes->info_type_name = $contact_information['info_type'];
                                    //$infoTypes -> modify_date = "";
                                    $infoTypes->save();
                                }

                                $info_kind_name = \Illuminate\Support\Facades\DB::table('_Info_kinds')->select('id')->where('info_kind_name', '=', $contact_information['info_kind'])->value('id');


                                if (!isset($info_kind_name) and (is_null($info_kind_name))) {


                                    $infoKinds = new InfoKind();

                                    if (!isset($info_types) and empty($info_types)) {
                                        $infoKinds->info_type_id = $infoTypes->id;
                                    }
                                    if (isset($info_types) and !empty($info_types)) {
                                        $infoKinds->info_type_id = $info_types;
                                    }

                                    $infoKinds->info_kind_code = $contact_information['info_kind'];
                                    $infoKinds->info_kind_name = $contact_information['info_kind'];
                                    // $infoKinds -> modify_date = '';
                                    $infoKinds->save();
                                }

                                $companyInfo = new CompanyInfo();

                                if (isset($info_kind_name) and (!is_null($info_kind_name))) {

                                    $companyInfo->info_kind_id = $info_kind_name;
                                }

                                if (!isset($info_kind_name) and (is_null($info_kind_name))) {

                                    $companyInfo->info_kind_id = $infoKinds->id;
                                }

                                $companyInfo->company_id = $CompanyId;

//                                $companyInfo->country_id = $countryInfoId->id;
                                $companyInfo->country_id = $countryIdCompany['id'];

                                if (!isset($info_types) and empty($info_types)) {
                                    $companyInfo->info_type_id = $infoTypes->id;
                                }

                                if (isset($info_types) and !empty($info_types)) {
                                    $companyInfo->info_type_id = $info_types;
                                }


                                $companyInfo->region_id = 3;
                                $companyInfo->representation = $contact_information['representetion'];
                                $companyInfo->city_name = $contact_information['city_name'];
                                $companyInfo->e_mail = $contact_information['e_mail'];
                                $companyInfo->url_name = $contact_information['url_name'];
                                $companyInfo->phone_number = $contact_information['phone_number'];
                                $companyInfo->phone_number_without_codes = $contact_information['phone_number_without_codes'];
                                $companyInfo->save();

                            }
                        }

                        $status = [
                            'status' => [
                                'status_code' => "1",
                                'status_description' => 'company updated',
                            ]
                        ];

                        return response()->json($status);
                    }


                }

                if ($resArray['request']['request_name'] == 'Get1CReportSignal') {

                    if ($resArray['request']['request_status']['status_code'] == "1") {

                        $file = $resArray['request']['request_result']['report']['report_file'];
                        $report = QueueSignal::where('id', $resArray['request']['request_number'])
                            ->where('model', 'report_id')->get()->first();

                        Report::where('id', $report['model_id'])->update(
                            [
                                'report_file' => $file,
                                'report_status' => 'сreated',
                            ]
                        );

                        $status = [
                            'status' => [
                                'status_code' => "1",
                                'status_description' => 'Auth',
                            ]
                        ];

                        return response()->json($status);
                    }

                    if ($resArray['request']['request_status']['status_code'] == "0") {
                        $status = [
                            'status' => [
                                'status_code' => "0",
                                'status_description' => 'Error',
                            ]
                        ];

                        return response()->json($status);

                    }
                }

                /*---------------------!!!!!!!!!! RequestForDataChanges FROM 1C!!!!!!!!!!!!!---------------------------*/

                if ($resArray['request']['request_name'] == 'RequestForDataChanges') {
//                    $resArray = json_decode($request->getContent(), true);


                    if (!isset($resArray['request']['request_parameters']['number'])) {


                        $ModelName = ModelTables::select('table_name')
                            ->where('table_code', '=', $resArray['request']['request_parameters']['objects_to_change']['0']['object_type_code'])
                            ->value('table_name');


                        $dbAreaId = DB::table((string)$ModelName)
                            ->select('db_area_id')
                            ->where($resArray['request']['request_parameters']['objects_to_change']['0']['object_key'], '=',
                                $resArray['request']['request_parameters']['objects_to_change']['0']['object_key_value'])
                            ->value('db_area_id');


                        /*------------------------??????????????????????????-----------------------------*/
                        //get name Controller from RequestForDataChanges in 1c


                        //                    $dbTypesControllers = \App\Models\Controller::with('dbTypeController.controllerFields')
                        //                        //            ->where('controller_code', class_basename(Route::current()->controller))
                        //                        ->where('controller_code', $resArray['request']['name_controller'])
                        //                        ->get()->toArray();
                        //
                        //                    /*------------------------??????????????????????????-----------------------------*/
                        //
                        //
                        //                    $fieldsDbTypesControllers = []; // GET FIELDS FROM table DbTypeController
                        //                    foreach ($dbTypesControllers as $dbTypeControllers) {
                        //                        foreach ($dbTypeControllers['db_type_controller'] as $controller) {
                        //                            if (($controller['db_type_id'] == $dbAreaId)) {
                        //                                $DbTypeId = $controller['id'];
                        //                                foreach ($controller['controller_fields'] as $fields) {
                        //                                    $fieldsDbTypesControllers[$fields['id']] = $fields['field_alias'];
                        //                                }
                        //                            }
                        //                        }
                        //                    }


                        foreach ($resArray['request']['request_parameters']['objects_to_change'] as $objectsToChange) {

                            if (isset($objectsToChange['object_type_code']) and !empty($objectsToChange['object_type_code'])) {

                                $nameController = \App\Models\ModelTables::with('controller')
                                    ->where('table_code', $objectsToChange['object_type_code'])
                                    ->get()->toArray();

                                $dbTypesControllers = \App\Models\Controller::with('dbTypeController.controllerFields')
                                    //            ->where('controller_code', class_basename(Route::current()->controller))
                                    ->where('controller_code', $nameController[0]['controller']['controller_code'])
                                    ->get()->toArray();

                                $fieldsDbTypesControllers = []; // GET FIELDS FROM table DbTypeController
                                foreach ($dbTypesControllers as $dbTypeControllers) {
                                    foreach ($dbTypeControllers['db_type_controller'] as $controller) {
                                        if (($controller['db_type_id'] == $dbAreaId)) {
                                            $DbTypeId = $controller['id'];
                                            foreach ($controller['controller_fields'] as $fields) {
                                                $fieldsDbTypesControllers[$fields['id']] = $fields['field_alias'];
                                            }
                                        }
                                    }
                                }
                            }

                            foreach ($objectsToChange['object_block_fields'] as $objectBlockFields) {

//                                dd($objectBlockFields);


                                $GetNameTableObjectsToChange = ModelTables::select('table_name')
                                    ->where('table_code', '=', $objectsToChange['object_type_code'])
                                    ->value('table_name');


                                if (!isset($objectBlockFields['field_is_link'])) {

//                                    $UpdateDetails = Contractor::where($objectsToChange['object_key'], '=', $objectsToChange['object_key_value'])->first();
//                                    //$UpdateDetails = DB::table((string)$uu)->where($objectsToChange['object_key'], '=', $objectsToChange['object_key_value'])->first();
//                                    $fieldName = (string)$objectBlockFields['field_name'];
//                                    $UpdateDetails->$fieldName = $objectBlockFields['field_values']['value_new'];
//                                    //$UpdateDetails = json_decode(json_encode($UpdateDetails),true);
//                                    $UpdateDetails->save();

//                                    dd($objectBlockFields['field_alias']);
                                    $objectBlockFields;

                                    DB::table($GetNameTableObjectsToChange)->where($objectsToChange['object_key'],
//                                        $objectsToChange['object_key_value'])->update([$objectBlockFields['field_name'] => $objectBlockFields['field_values']['value_new']]);
                                        $objectsToChange['object_key_value'])->update([$objectBlockFields['field_alias'] => $objectBlockFields['field_values']['value_new']]);


                                } elseif (isset($objectBlockFields['field_is_link']) and ($objectBlockFields['field_is_link']) == "1") {
//                                    $UpdateDetails = Contractor::where($objectsToChange['object_key'], '=', $objectsToChange['object_key_value'])->first();

                                    //$UpdateDetails = DB::table((string)$GetNameTableObjectsToChange)->where($objectsToChange['object_key'], '=', $objectsToChange['object_key_value'])->first();

//                                   $fieldNameIsLink = (string)$objectBlockFields['field_name'];
                                    $fieldNameIsLink = (string)$objectBlockFields['field_alias'];

                                    $ModelIsLink = ModelTables::select('table_name')
                                        ->where('table_code', '=', $objectBlockFields['field_values']['value_new']['value_table_code'])
                                        ->value('table_name');

                                    $IdModelIsLink = DB::table((string)$ModelIsLink)
                                        ->select('id')
                                        ->where($objectBlockFields['field_values']['value_new']['value_table_key'], '=', $objectBlockFields['field_values']['value_new']['value'])
                                        ->value('id');

//                                    $UpdateDetails->country_id = $IdModelIsLink;  ///////////////////////??????!!!!!!
//                                    $UpdateDetails->save();

                                    DB::table($GetNameTableObjectsToChange)->where($objectsToChange['object_key'],
                                        $objectsToChange['object_key_value'])->update([$fieldNameIsLink => $IdModelIsLink]);
                                }


                                if (isset($objectsToChange['object_tables_to_change']) and !empty($objectsToChange['object_tables_to_change'])) {

                                    $objectTablesArray = [];
                                    foreach ($objectsToChange['object_tables_to_change'] as $objectTablesToChange) {

                                        if (isset($objectTablesToChange['table_type_code']) and !empty($objectTablesToChange['table_type_code'])) {

                                            $nameController = \App\Models\ModelTables::with('controller')
                                                ->where('table_code', $objectTablesToChange['table_type_code'])
                                                ->get()->toArray();

                                            $dbTypesControllers = \App\Models\Controller::with('dbTypeController.controllerFields')
                                                //            ->where('controller_code', class_basename(Route::current()->controller))
                                                ->where('controller_code', $nameController[0]['controller']['controller_code'])
                                                ->get()->toArray();

                                            $fieldsDbTypesControllers = []; // GET FIELDS FROM table DbTypeController
                                            foreach ($dbTypesControllers as $dbTypeControllers) {
                                                foreach ($dbTypeControllers['db_type_controller'] as $controller) {
                                                    if (($controller['db_type_id'] == $dbAreaId)) {
                                                        $DbTypeId = $controller['id'];
                                                        foreach ($controller['controller_fields'] as $fields) {
                                                            $fieldsDbTypesControllers[$fields['id']] = $fields['field_alias'];
                                                        }
                                                    }
                                                }
                                            }
                                        }

                                        $tableStringsArray = ['table_type_code' => $objectTablesToChange['table_type_code']];
                                        foreach ($objectTablesToChange['table_strings'] as $tableStrings) {

                                            $blockFields = ['string_line_n' => $tableStrings['string_line_n']];
                                            foreach ($tableStrings['string_block_fields'] as $string) {
                                                foreach ($fieldsDbTypesControllers as $key => $value) {
//                                                    if (isset($string['field_name']) and $string['field_name'] == $value) {
                                                    if (isset($string['field_alias']) and $string['field_alias'] == $value) {
                                                        $blockFields[] = $string;
                                                    }
                                                }

                                            }
                                            $tableStringsArray[] = $blockFields; /*=====*/
                                        }
                                        $objectTablesArray[] = $tableStringsArray;
                                    }
                                }
                            }
                        }

                        /*-----------------------Update Fields Object Tables To Change-------------------------*/
                        $ModelName = ModelTables::select('table_name')
                            ->where('id', '=', $dbTypesControllers[0]['controller_table_n'])
                            ->value('table_name');


                        if (isset($objectTablesArray) and (!empty($objectTablesArray))) {

                            foreach ($objectTablesArray as $objectTables) {

                                foreach ($objectTables as $key => $value) {

                                    $exceptTableTypeCode = array_except($objectTables,
                                        [
                                            'table_type_code',
                                        ]
                                    );

                                    $tableToChangeModel = ModelTables::select('table_name')
                                        ->where('table_code', '=', $objectTables['table_type_code'])
                                        ->value('table_name');

                                    foreach ($exceptTableTypeCode as $exceptTableTypeCodeKey => $exceptTableTypeCodeValue) {

                                        $exceptStringLineN = array_except($exceptTableTypeCodeValue,
                                            [
                                                'string_line_n',
                                            ]
                                        );

                                        /*-------------------------!!!!!!!!!!-----------------------------*/

                                        foreach ($exceptStringLineN as $exceptStringLineNArray) {

                                            $IdDbTypeControllerFields = DB::table('_DbTypeControllerFields')
                                                ->select('field_reference')
//                                                ->where('field_alias', '=', $exceptStringLineNArray['field_name'])
                                                ->where('field_alias', '=', $exceptStringLineNArray['field_alias'])
                                                ->where('db_type_controller_id', '=', $dbTypesControllers[0]['db_type_controller'][0]['id'])
                                                ->value('field_reference');


                                            if (isset($IdDbTypeControllerFields) and ($IdDbTypeControllerFields == '0')) {

                                                $update = DB::table((string)$tableToChangeModel)->where('line_n', '=', $exceptTableTypeCodeValue['string_line_n'])
                                                    ->update([
//                                                        (string)$exceptStringLineNArray['field_name'] => $exceptStringLineNArray['field_values']['value_new']
                                                        (string)$exceptStringLineNArray['field_alias'] => $exceptStringLineNArray['field_values']['value_new']
                                                    ]);

                                            } elseif (isset($IdDbTypeControllerFields) and ($IdDbTypeControllerFields == '1')) {

                                                $ModelIsLinkDbTypeController = DB::table('_DbTypeControllers')
//                                                    ->where('object_key_field', '=', $exceptStringLineNArray['field_name'])
                                                    ->where('object_key_field', '=', $exceptStringLineNArray['field_alias'])
                                                    ->where('db_type_id', '=', $dbAreaId)
                                                    ->get()->toArray();


                                                $ModelIsLink = ModelTables::select('table_name')
                                                    ->where('table_code', '=', $ModelIsLinkDbTypeController[0]->object_type_code)
                                                    ->value('table_name');


                                                $DbTypeControllerIdField = DB::table((string)$ModelIsLink)
                                                    ->select('id')
//                                                    ->where((string)$exceptStringLineNArray['field_name'], '=', $exceptStringLineNArray['field_values']['value_new'])
                                                    ->where((string)$exceptStringLineNArray['field_alias'], '=', $exceptStringLineNArray['field_values']['value_new'])
                                                    ->value('id');


                                                $DbTypeControllerNameField = DB::table('_DbTypeControllerFields')
                                                    ->select('table_field_name')
//                                                    ->where('field_alias', '=', $exceptStringLineNArray['field_name'])
                                                    ->where('field_alias', '=', $exceptStringLineNArray['field_alias'])
                                                    ->where('db_type_controller_id', '=', $dbTypesControllers[0]['db_type_controller'][0]['id'])
                                                    ->value('table_field_name');


                                                $update = DB::table((string)$tableToChangeModel)->where('line_n', '=', $exceptTableTypeCodeValue['string_line_n'])
                                                    ->update([
                                                        (string)$DbTypeControllerNameField => $DbTypeControllerIdField
                                                    ]);
                                            }


                                        }
                                    }
                                }


                            }
                        }

                        /*-----------------------END Update Fields Object Tables To Change-------------------------*/


                        //        if ($update) {
                        //            return "update";
                        //        } else {
                        //            return "no update";
                        //        }

                        //                    return "update";

                        $status = [
                            'status' => [
                                'status_code' => "1",
                                'status_description' => 'updated',
                            ]
                        ];

                        return response()->json($status);

                    }

                    /*----!isset($resArray['request']['request_parameters']['number'])-----*/
                    /*---------------------------------------------------------------------*/
                    /*---------------------------------------------------------------------*/
                    /*---------------------------------------------------------------------*/


                    if (isset($resArray['request']['request_parameters']['number'])) {
                        if (isset($resArray['request']['request_parameters']['objects_to_change'][0]['object_kind'])){

                            //$resArray['request']['request_parameters']['objects_to_change']['0']['object_kind'];
//                            if (($resArray['request']['request_parameters']['objects_to_change'][0]['object_kind']) == '1'){   //??????????????????!!!!!!!!!!!!!!!!!!!!!
//                            if (($resArray['request']['request_parameters']['objects_to_change'][0]['object_kind']) == '2'){  //??????????????????!!!!!!!!!!!!!!!!!!!!!
                            if (($resArray['request']['request_parameters']['objects_to_change'][0]['object_kind']) ==
                                $resArray['request']['request_parameters']['objects_to_change']['0']['object_kind']){

                                $ModelName = ModelTables::select('table_name')
                                    ->where('table_code', '=', $resArray['request']['request_parameters']['objects_to_change']['0']['object_type_code'])
                                    ->value('table_name');

//                                $dbAreaId = DB::table((string)$ModelName)
//                                    ->select('db_area_id')
//                                    ->where($resArray['request']['request_parameters']['objects_to_change']['0']['object_key'], '=',
//                                        $resArray['request']['request_parameters']['objects_to_change']['0']['object_key_value'])
//                                    ->value('db_area_id');

                                $dbAreaId = DB::table('_DbAreas')
                                    ->select('id')
                                    ->where('db_area_code', '=', $resArray['request']['db_area_code'])
                                    ->value('id');

                                foreach ($resArray['request']['request_parameters']['objects_to_change'] as $objectsToChange) { //$objectsToChange['object_block_fields']

                                    if (isset($objectsToChange['object_type_code']) and !empty($objectsToChange['object_type_code'])) {

                                        $nameController = \App\Models\ModelTables::with('controller')
                                            ->where('table_code', $objectsToChange['object_type_code'])
                                            ->get()->toArray();



                                        $dbTypesControllers = \App\Models\Controller::with('dbTypeController.controllerFields')
                                            //->where('controller_code', class_basename(Route::current()->controller))
                                            ->where('controller_code', $nameController[0]['controller']['controller_code'])
                                            ->get()->toArray();

                                        $fieldsDbTypesControllers = []; // GET FIELDS FROM table DbTypeController
                                        foreach ($dbTypesControllers as $dbTypeControllers) {
                                            foreach ($dbTypeControllers['db_type_controller'] as $controller) {

                                                if (($controller['db_type_id'] == $dbAreaId)) {
                                                    $DbTypeId = $controller['id'];
                                                    foreach ($controller['controller_fields'] as $fields) {

                                                        if ($fields['field_reference'] == "0") {

//                                                            $fieldsDbTypesControllers[$fields['field_alias']] = $fields['id'];
                                                            $fieldsDbTypesControllers[$fields['field_alias']] = $fields['id'];

                                                        } elseif ($fields['field_reference'] == "1") {
                                                            $fieldsDbTypesControllers[$fields['field_alias']] = $fields['table_field_name'];
                                                        }
                                                    }
                                                }
                                            }
                                        }

                                        foreach ($objectsToChange['object_block_fields'] as $objectBlockFields) {
                                            $GetNameTableObjectsToChange = ModelTables::select('table_name')
                                                ->where('table_code', '=', $objectsToChange['object_type_code'])
                                                ->value('table_name'); //contractors name dataBases

//                                            if (array_key_exists($objectBlockFields['field_name'], $fieldsDbTypesControllers)) {
                                            if (array_key_exists($objectBlockFields['field_alias'], $fieldsDbTypesControllers)) {

                                                if (isset($objectBlockFields['field_is_link']) and ($objectBlockFields['field_is_link'] == "0")) {//                                                    $UpdateDetails = Contractor::where($objectsToChange['object_key'], '=', $objectsToChange['object_key_value'])->first();
//                                                    $UpdateDetails = AttachedDocument::where($objectsToChange['object_key'], '=', $objectsToChange['object_key_value'])->first();
//                                                    $UpdateDetails = AttachedDocumentFile::where($objectsToChange['object_key'], '=', $objectsToChange['object_key_value'])->first();
//                                                    $UpdateDetails = DB::table((string)$GetNameTableObjectsToChange)->where($objectsToChange['object_key'], '=', $objectsToChange['object_key_value'])->first();
//                                                    $fieldName = (string)$objectBlockFields['field_name'];
//                                                    $UpdateDetails->$fieldName = $objectBlockFields['field_value'];
//                                                    //$UpdateDetails = json_decode(json_encode($UpdateDetails),true);
//                                                    $UpdateDetails->save();


                                                    DB::table($GetNameTableObjectsToChange)->where($objectsToChange['object_key'],
//                                                        $objectsToChange['object_key_value'])->update([$objectBlockFields['field_name'] => $objectBlockFields['field_value']]);
                                                        $objectsToChange['object_key_value'])->update([$objectBlockFields['field_alias'] => $objectBlockFields['field_value']]);


                                                } elseif (isset($objectBlockFields['field_is_link']) and ($objectBlockFields['field_is_link']) == "1") {
//                                                    $UpdateDetails = Contractor::where($objectsToChange['object_key'], '=', $objectsToChange['object_key_value'])->first();
//                                                    $UpdateDetails = AttachedDocument::where($objectsToChange['object_key'], '=', $objectsToChange['object_key_value'])->first();
//                                                    $UpdateDetails = AttachedDocumentFile::where($objectsToChange['object_key'], '=', $objectsToChange['object_key_value'])->first();
//                                                    $UpdateDetails = DB::table((string)$GetNameTableObjectsToChange)->where($objectsToChange['object_key'], '=', $objectsToChange['object_key_value'])->first();
                                                    foreach ($fieldsDbTypesControllers as $key => $value) {
//                                                        if ($objectBlockFields['field_name'] == $key) {
                                                        if ($objectBlockFields['field_alias'] == $key) {
                                                            $fieldNameIsLink = $value;
                                                        }
                                                    }

                                                    $ModelIsLink = ModelTables::select('table_name')
//                                                        ->where('table_code', '=', $objectBlockFields['field_value']['value_table_code'])
                                                        ->where('table_code', '=', $objectBlockFields['field_values']['value_current']['value_table_code'])
                                                        ->value('table_name');

                                                    if (($resArray['request']['request_parameters']['objects_to_change'][0]['object_kind']) == '1'){

                                                        $IdModelIsLink = DB::table((string)$ModelIsLink)
                                                            ->select('id')
//                                                            ->where($objectBlockFields['field_name'], '=', $objectBlockFields['field_value']['object_key_value'])
                                                            ->where($objectBlockFields['field_alias'], '=', $objectBlockFields['field_values']['value_current']['object_key_value'])
                                                            ->value('id');
                                                    }
                                                    elseif (($resArray['request']['request_parameters']['objects_to_change'][0]['object_kind']) == '2'){

                                                        $IdModelIsLink = DB::table((string)$ModelIsLink)
                                                            ->select('id')
                                                            ->where($objectBlockFields['field_value']['value_table_key'], '=', $objectBlockFields['field_value']['object_key_value'])
                                                            ->value('id');

                                                        /*-------------if isset owner block  get id owner_name and update field att_doc_id from table AttachedDocumentFiles----------------------*/
                                                        if (isset($resArray['request']['request_parameters']['objects_to_change'][0]['owner'])){

                                                            //get id controller from table _DbTypeControllers
                                                            $ownerControllerIdModelIsLink = DB::table('_DbTypeControllers')
                                                                ->select('controller_id')
                                                                ->where('object_type_code', '=', $resArray['request']['request_parameters']['objects_to_change'][0]['object_type_code'])
                                                                ->where('db_type_id', '=', $dbAreaId)
                                                                ->value('controller_id');

                                                            //get table_n controller from table __ModelTables where table_code -> ['owner']['owner_name']
                                                            $ownerIdModelIsLink = DB::table('__ModelTables')
                                                                ->select('table_n')
                                                                ->where('table_code', '=', $resArray['request']['request_parameters']['objects_to_change'][0]['owner']['owner_name'])
                                                                ->value('table_n');

                                                            //get id owner controller
                                                            $ownerIdControllerIsLink = \App\Models\Controller::select('id')
                                                                ->where('controller_table_n', '=', $ownerIdModelIsLink)
                                                                ->value('id');


                                                            //get field owner controller from table __ControllerLinks
                                                            $ownerModelIsLinkTableFieldName = DB::table('__ControllerLinks')
                                                                ->select('table_field_name')
                                                                ->where('controller_id', '=', $ownerControllerIdModelIsLink)
                                                                ->where('controller_id_link', '=', $ownerIdControllerIsLink)
                                                                ->value('table_field_name');



                                                            $test1 = DB::table('__ControllerLinks')
                                                                ->select('controller_id_link')
                                                                ->where('controller_id', '=', $ownerControllerIdModelIsLink)
                                                                ->where('controller_id_link', '=', $ownerIdControllerIsLink)
                                                                ->value('controller_id_link');

                                                            $test2 = DB::table('_DbTypeControllers')
                                                                ->select('object_type_code')
                                                                ->where('db_type_id', '=', $dbAreaId)
                                                                ->where('controller_id', '=', $test1)
                                                                ->value('object_type_code');

                                                            $test4 = DB::table('__ModelTables')
                                                                ->select('table_name')
                                                                ->where('table_code', '=', $test2)
                                                                ->value('table_name');

                                                            $test3 = DB::table($test4)
                                                                ->select('id')
                                                                ->where($resArray['request']['request_parameters']['objects_to_change'][0]['owner']['owner_key'], '=',
                                                                    $resArray['request']['request_parameters']['objects_to_change'][0]['owner']['owner_key_value'])
                                                                ->value('id');

                                                            if(!empty($test3)){

                                                                DB::table($GetNameTableObjectsToChange)->where($objectsToChange['object_key'],
                                                                    $objectsToChange['object_key_value'])->update([$ownerModelIsLinkTableFieldName => $test3]);
//                                                                $UpdateDetails->$ownerModelIsLinkTableFieldName = $test3;
                                                            }
                                                            elseif(empty($test3)){
                                                                $table = DB::table($test4)->insertGetId(array(
                                                                    'uid_1c_code' => $resArray['request']['request_parameters']['objects_to_change'][0]['owner']['owner_key_value'],
                                                                ));

                                                                DB::table($GetNameTableObjectsToChange)->where($objectsToChange['object_key'],
                                                                    $objectsToChange['object_key_value'])->update([$ownerModelIsLinkTableFieldName => $table->id]);
//                                                                $UpdateDetails->$ownerModelIsLinkTableFieldName = $table->id;
                                                            }
                                                        }
                                                        /*-------------END if isset owner block  get id owner_name and update field att_doc_id from table AttachedDocumentFiles-------------------*/
                                                    }

                                                    DB::table($GetNameTableObjectsToChange)->where($objectsToChange['object_key'],
                                                        $objectsToChange['object_key_value'])->update([$fieldNameIsLink => $IdModelIsLink]);

                                                    //$UpdateDetails->country_id = $IdModelIsLink; //????????????????????????????????????? country_id
//                                                    $UpdateDetails->$fieldNameIsLink = $IdModelIsLink;
//                                                    $UpdateDetails->save();
                                                }
                                            }

                                            if (isset($objectsToChange['object_tables_to_change']) and !empty($objectsToChange['object_tables_to_change'])) {

                                                $objectTablesArray = [];
                                                foreach ($objectsToChange['object_tables_to_change'] as $objectTablesToChange) {

                                                    //$objectTablesToChange['table_type_code'];

                                                    if (isset($objectTablesToChange['table_type_code']) and !empty($objectTablesToChange['table_type_code'])) {

                                                        $nameController = \App\Models\ModelTables::with('controller')
                                                            ->where('table_code', $objectTablesToChange['table_type_code'])
                                                            ->get()->toArray();

                                                        $dbTypesControllers = \App\Models\Controller::with('dbTypeController.controllerFields')
                                                            //            ->where('controller_code', class_basename(Route::current()->controller))
                                                            ->where('controller_code', $nameController[0]['controller']['controller_code'])
                                                            ->get()->toArray();

                                                        $fieldsDbTypesControllersIsLink = []; // GET FIELDS FROM table DbTypeController
                                                        foreach ($dbTypesControllers as $dbTypeControllers) {
                                                            foreach ($dbTypeControllers['db_type_controller'] as $controller) {
                                                                if (($controller['db_type_id'] == $dbAreaId)) {
                                                                    $DbTypeId = $controller['id'];
                                                                    foreach ($controller['controller_fields'] as $fields) {
                                                                        $fieldsDbTypesControllersIsLink[$fields['id']] = $fields['field_alias'];
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }

                                                    $tableStringsArray = ['table_type_code' => $objectTablesToChange['table_type_code']];
                                                    foreach ($objectTablesToChange['table_strings'] as $tableStrings) {

                                                        $blockFields = ['string_line_n' => $tableStrings['string_line_n']];
                                                        foreach ($tableStrings['string_block_fields'] as $string) {
                                                            foreach ($fieldsDbTypesControllersIsLink as $key => $value) {
//                                                                if (isset($string['field_name']) and $string['field_name'] == $value) {
                                                                if (isset($string['field_alias']) and $string['field_alias'] == $value) {
                                                                    $blockFields[] = $string;
                                                                }
                                                            }
                                                        }
                                                        //$tableStringsArray[$objectTablesToChange['table_type_code']]=$blockFields; /*=====*/
                                                        $tableStringsArray[] = $blockFields; /*=====*/
                                                    }
                                                    $objectTablesArray[] = $tableStringsArray;
                                                }
                                            }
                                        }
                                    }

                                    /*-----------------------Update Fields Object Tables To Change-------------------------*/
                                    /*-----------------------Update Fields Object Tables To Change-------------------------*/
                                    /*-----------------------Update Fields Object Tables To Change-------------------------*/
//                                    $ModelName = ModelTables::select('table_name')
//                                        ->where('id', '=', $dbTypesControllers[0]['controller_table_n'])
//                                        ->value('table_name');
//
//                                    if (isset($objectTablesArray) and (!empty($objectTablesArray))) {
//
//                                        foreach ($objectTablesArray as $objectTables) {
//
//                                            foreach ($objectTables as $key => $value) {
//
//                                                $exceptTableTypeCode = array_except($objectTables,
//                                                    [
//                                                        'table_type_code',
//                                                    ]
//                                                );
//
//                                                $tableToChangeModel = ModelTables::select('table_name')
//                                                    ->where('table_code', '=', $objectTables['table_type_code'])
//                                                    ->value('table_name');
//
//                                                foreach ($exceptTableTypeCode as $exceptTableTypeCodeKey => $exceptTableTypeCodeValue) {
//
//                                                    $exceptStringLineN = array_except($exceptTableTypeCodeValue,
//                                                        [
//                                                            'string_line_n',
//                                                        ]
//                                                    );
//
//                                                    /*-------------------------!!!!!!!!!!-----------------------------*/
//
//                                                    foreach ($exceptStringLineN as $exceptStringLineNArray) {
//
//                                                        $IdDbTypeControllerFields = DB::table('_DbTypeControllerFields')
//                                                            ->select('field_reference')
////                                                            ->where('field_alias', '=', $exceptStringLineNArray['field_name'])
//                                                            ->where('field_alias', '=', $exceptStringLineNArray['field_alias'])
//                                                            ->where('db_type_controller_id', '=', $dbTypesControllers[0]['db_type_controller'][0]['id'])
//                                                            ->value('field_reference');
//
//
//                                                        if (isset($IdDbTypeControllerFields) and ($IdDbTypeControllerFields == '0')) {
//
//                                                            $update = DB::table((string)$tableToChangeModel)->where('line_n', '=', $exceptTableTypeCodeValue['string_line_n'])
//                                                                ->update([
////                                                                    (string)$exceptStringLineNArray['field_name'] => $exceptStringLineNArray['field_value']
//                                                                    (string)$exceptStringLineNArray['field_alias'] => $exceptStringLineNArray['field_values']['value_current']
//                                                                ]);
//
//                                                        } elseif (isset($IdDbTypeControllerFields) and ($IdDbTypeControllerFields == '1')) {
//
//                                                            $ModelIsLinkDbTypeController = DB::table('_DbTypeControllers')
////                                                                ->where('object_key_field', '=', $exceptStringLineNArray['field_name'])
//                                                                ->where('object_key_field', '=', $exceptStringLineNArray['field_alias'])
//                                                                ->where('db_type_id', '=', $dbAreaId)
//                                                                ->get()->toArray();
//
//
//                                                            $ModelIsLink = ModelTables::select('table_name')
//                                                                ->where('table_code', '=', $ModelIsLinkDbTypeController[0]->object_type_code)
//                                                                ->value('table_name');
//
//
//                                                            $DbTypeControllerIdField = DB::table((string)$ModelIsLink)
//                                                                ->select('id')
////                                                                ->where((string)$exceptStringLineNArray['field_name'], '=', $exceptStringLineNArray['field_value'])
//                                                                ->where((string)$exceptStringLineNArray['field_alias'], '=', $exceptStringLineNArray['field_values']['value_new'])
//                                                                ->value('id');
//
//
//                                                            $DbTypeControllerNameField = DB::table('_DbTypeControllerFields')
//                                                                ->select('table_field_name')
////                                                                ->where('field_alias', '=', $exceptStringLineNArray['field_name'])
//                                                                ->where('field_alias', '=', $exceptStringLineNArray['field_alias'])
//                                                                ->where('db_type_controller_id', '=', $dbTypesControllers[0]['db_type_controller'][0]['id'])
//                                                                ->value('table_field_name');
//
//
//                                                            $update = DB::table((string)$tableToChangeModel)->where('line_n', '=', $exceptTableTypeCodeValue['string_line_n'])
//                                                                ->update([
//                                                                    (string)$DbTypeControllerNameField => $DbTypeControllerIdField
//                                                                ]);
//                                                        }
//                                                    }
//                                                }
//                                            }
//                                        }
//                                    }
                                    /*-----------------------END Update Fields Object Tables To Change-------------------------*/
                                    /*-----------------------END Update Fields Object Tables To Change-------------------------*/
                                    /*-----------------------END Update Fields Object Tables To Change-------------------------*/
                                }
                            }

                            /*-------------------------------AttachedDocumentFiles-------------------------------------*/
//                            elseif (($resArray['request']['request_parameters']['objects_to_change'][0]['object_kind']) == '2'){
//                                $ModelName = ModelTables::select('table_name')
//                                    ->where('table_code', '=', $resArray['request']['request_parameters']['objects_to_change']['0']['object_type_code'])
//                                    ->value('table_name');
//
//
//                                $resArray['request']['db_area_code'];
//
//                                $dbAreaId = DB::table('_DbAreas')
//                                    ->select('id')
//                                    ->where('db_area_code', '=', $resArray['request']['db_area_code'])
//                                    ->value('id');
//
////                                $dbAreaId = DB::table((string)$ModelName)
////                                    ->select('db_area_id')
////                                    ->where($resArray['request']['request_parameters']['objects_to_change']['0']['object_key'], '=',
////                                        $resArray['request']['request_parameters']['objects_to_change']['0']['object_key_value'])
////                                ->value('db_area_id');
//
//                                $ModelNameId = DB::table((string)$ModelName)
//                                    ->select('id')
//                                    ->where($resArray['request']['request_parameters']['objects_to_change']['0']['object_key'], '=',
//                                        $resArray['request']['request_parameters']['objects_to_change']['0']['object_key_value'])
//                                    ->value('id');
//
//                                $ownerModelName= ModelTables::select('table_name')
//                                    ->where('table_code', '=', $resArray['request']['request_parameters']['objects_to_change']['0']['owner']['owner_name'])
//                                    ->value('table_name');
//
////                                $dbAreaIdOwnerModelName = DB::table((string)$ownerModelName)
////                                    ->select('db_area_id')
////                                    ->where($resArray['request']['request_parameters']['objects_to_change']['0']['owner']['owner_key'], '=',
////                                        $resArray['request']['request_parameters']['objects_to_change']['0']['owner']['owner_key_value'])
////                                    ->value('db_area_id');
//
//                                $ownerModelNameId = DB::table((string)$ownerModelName)
//                                    ->select('id')
//                                    ->where($resArray['request']['request_parameters']['objects_to_change']['0']['owner']['owner_key'], '=',
//                                        $resArray['request']['request_parameters']['objects_to_change']['0']['owner']['owner_key_value'])
//                                    ->value('id');
//
//
//                                foreach ($resArray['request']['request_parameters']['objects_to_change'] as $objectsToChange) {
//
//                                    if (isset($objectsToChange['object_type_code']) and !empty($objectsToChange['object_type_code'])) {
//
//                                        $nameController = \App\Models\ModelTables::with('controller')
//                                            ->where('table_code', $objectsToChange['object_type_code'])
//                                            ->get()->toArray();
//
//                                        $dbTypesControllers = \App\Models\Controller::with('dbTypeController.controllerFields')
//                                            //->where('controller_code', class_basename(Route::current()->controller))
//                                            ->where('controller_code', $nameController[0]['controller']['controller_code'])
//                                            ->get()->toArray();
//
//                                        $fieldsDbTypesControllers = []; // GET FIELDS FROM table DbTypeController
//                                        foreach ($dbTypesControllers as $dbTypeControllers) {
//                                            foreach ($dbTypeControllers['db_type_controller'] as $controller) {
//                                                if (($controller['db_type_id'] == $dbAreaId)) {
//                                                    $DbTypeId = $controller['id'];
//                                                    foreach ($controller['controller_fields'] as $fields) {
//
//                                                        if ($fields['field_reference'] == "0") {
//                                                            $fieldsDbTypesControllers[$fields['field_alias']] = $fields['id'];
//                                                        } elseif ($fields['field_reference'] == "1") {
//                                                            $fieldsDbTypesControllers[$fields['field_alias']] = $fields['table_field_name'];
//                                                        }
//                                                    }
//                                                }
//                                            }
//                                        }
//
//                                        foreach ($objectsToChange['object_block_fields'] as $objectBlockFields) {
//                                            $GetNameTableObjectsToChange = ModelTables::select('table_name')
//                                                ->where('table_code', '=', $objectsToChange['object_type_code'])
//                                                ->value('table_name'); //contractors name dataBases
//
//                                            if (array_key_exists($objectBlockFields['field_name'], $fieldsDbTypesControllers)) {
//
//                                                if (isset($objectBlockFields['field_is_link']) and ($objectBlockFields['field_is_link'] == "0")) {
//
//                                                    $UpdateDetails = Contractor::where($objectsToChange['object_key'], '=', $objectsToChange['object_key_value'])->first();
//                                                    //$UpdateDetails = DB::table((string)$uu)->where($objectsToChange['object_key'], '=', $objectsToChange['object_key_value'])->first();
//                                                    $fieldName = (string)$objectBlockFields['field_name'];
//                                                    $UpdateDetails->$fieldName = $objectBlockFields['field_value'];
//                                                    //$UpdateDetails = json_decode(json_encode($UpdateDetails),true);
//                                                    $UpdateDetails->save();
//
//
//                                                } elseif (isset($objectBlockFields['field_is_link']) and ($objectBlockFields['field_is_link']) == "1") {
//                                                    $UpdateDetails = AttachedDocumentFile::where($objectsToChange['object_key'], '=', $objectsToChange['object_key_value'])->first();
//                                                    //$UpdateDetails = DB::table((string)$GetNameTableObjectsToChange)->where($objectsToChange['object_key'], '=', $objectsToChange['object_key_value'])->first();
//                                                    foreach ($fieldsDbTypesControllers as $key => $value) {
//                                                        if ($objectBlockFields['field_name'] == $key) {
//                                                            $fieldNameIsLink = $value;
//                                                        }
//                                                    }
//                                                    //$fieldNameIsLink = (string)$objectBlockFields['field_name'];
//
//                                                    $ModelIsLink = ModelTables::select('table_name')
//                                                        ->where('table_code', '=', $objectBlockFields['field_value']['value_table_code'])
//                                                        ->value('table_name');
//
//                                                    $IdModelIsLink = DB::table((string)$ModelIsLink)
//                                                        ->select('id')
//                                                        ->where($objectBlockFields['field_value']['value_table_key'], '=', $objectBlockFields['field_value']['object_key_value'])
//                                                        ->value('id');
//                                                    //$UpdateDetails->country_id = $IdModelIsLink; //????????????????????????????????????? country_id
//                                                    $UpdateDetails->$fieldNameIsLink = $IdModelIsLink;
//                                                    $UpdateDetails->save();
//                                                }
//                                            }
//
//                                            if (isset($objectsToChange['object_tables_to_change']) and !empty($objectsToChange['object_tables_to_change'])) {
//
//                                                $objectTablesArray = [];
//                                                foreach ($objectsToChange['object_tables_to_change'] as $objectTablesToChange) {
//
//                                                    //$objectTablesToChange['table_type_code'];
//
//                                                    if (isset($objectTablesToChange['table_type_code']) and !empty($objectTablesToChange['table_type_code'])) {
//
//                                                        $nameController = \App\Models\ModelTables::with('controller')
//                                                            ->where('table_code', $objectTablesToChange['table_type_code'])
//                                                            ->get()->toArray();
//
//                                                        $dbTypesControllers = \App\Models\Controller::with('dbTypeController.controllerFields')
//                                                            //            ->where('controller_code', class_basename(Route::current()->controller))
//                                                            ->where('controller_code', $nameController[0]['controller']['controller_code'])
//                                                            ->get()->toArray();
//
//                                                        $fieldsDbTypesControllersIsLink = []; // GET FIELDS FROM table DbTypeController
//                                                        foreach ($dbTypesControllers as $dbTypeControllers) {
//                                                            foreach ($dbTypeControllers['db_type_controller'] as $controller) {
//                                                                if (($controller['db_type_id'] == $dbAreaId)) {
//                                                                    $DbTypeId = $controller['id'];
//                                                                    foreach ($controller['controller_fields'] as $fields) {
//                                                                        $fieldsDbTypesControllersIsLink[$fields['id']] = $fields['field_alias'];
//                                                                    }
//                                                                }
//                                                            }
//                                                        }
//                                                    }
//
//                                                    $tableStringsArray = ['table_type_code' => $objectTablesToChange['table_type_code']];
//                                                    foreach ($objectTablesToChange['table_strings'] as $tableStrings) {
//
//                                                        $blockFields = ['string_line_n' => $tableStrings['string_line_n']];
//                                                        foreach ($tableStrings['string_block_fields'] as $string) {
//                                                            foreach ($fieldsDbTypesControllersIsLink as $key => $value) {
//                                                                if (isset($string['field_name']) and $string['field_name'] == $value) {
//                                                                    $blockFields[] = $string;
//                                                                }
//                                                            }
//                                                        }
//                                                        //$tableStringsArray[$objectTablesToChange['table_type_code']]=$blockFields; /*=====*/
//                                                        $tableStringsArray[] = $blockFields; /*=====*/
//                                                    }
//                                                    $objectTablesArray[] = $tableStringsArray;
//                                                }
//                                            }
//                                        }
//                                    }
//
//                                    /*-----------------------Update Fields Object Tables To Change-------------------------*/
//                                    $ModelName = ModelTables::select('table_name')
//                                        ->where('id', '=', $dbTypesControllers[0]['controller_table_n'])
//                                        ->value('table_name');
//
//                                    if (isset($objectTablesArray) and (!empty($objectTablesArray))) {
//
//                                        foreach ($objectTablesArray as $objectTables) {
//
//                                            foreach ($objectTables as $key => $value) {
//
//                                                $exceptTableTypeCode = array_except($objectTables,
//                                                    [
//                                                        'table_type_code',
//                                                    ]
//                                                );
//
//                                                $tableToChangeModel = ModelTables::select('table_name')
//                                                    ->where('table_code', '=', $objectTables['table_type_code'])
//                                                    ->value('table_name');
//
//                                                foreach ($exceptTableTypeCode as $exceptTableTypeCodeKey => $exceptTableTypeCodeValue) {
//
//                                                    $exceptStringLineN = array_except($exceptTableTypeCodeValue,
//                                                        [
//                                                            'string_line_n',
//                                                        ]
//                                                    );
//
//                                                    /*-------------------------!!!!!!!!!!-----------------------------*/
//
//                                                    foreach ($exceptStringLineN as $exceptStringLineNArray) {
//
//                                                        $IdDbTypeControllerFields = DB::table('_DbTypeControllerFields')
//                                                            ->select('field_reference')
//                                                            ->where('field_alias', '=', $exceptStringLineNArray['field_name'])
//                                                            ->where('db_type_controller_id', '=', $dbTypesControllers[0]['db_type_controller'][0]['id'])
//                                                            ->value('field_reference');
//
//
//                                                        if (isset($IdDbTypeControllerFields) and ($IdDbTypeControllerFields == '0')) {
//
//                                                            $update = DB::table((string)$tableToChangeModel)->where('line_n', '=', $exceptTableTypeCodeValue['string_line_n'])
//                                                                ->update([
//                                                                    (string)$exceptStringLineNArray['field_name'] => $exceptStringLineNArray['field_value']
//                                                                ]);
//
//                                                        } elseif (isset($IdDbTypeControllerFields) and ($IdDbTypeControllerFields == '1')) {
//
//                                                            $ModelIsLinkDbTypeController = DB::table('_DbTypeControllers')
//                                                                ->where('object_key_field', '=', $exceptStringLineNArray['field_name'])
//                                                                ->where('db_type_id', '=', $dbAreaId)
//                                                                ->get()->toArray();
//
//
//                                                            $ModelIsLink = ModelTables::select('table_name')
//                                                                ->where('table_code', '=', $ModelIsLinkDbTypeController[0]->object_type_code)
//                                                                ->value('table_name');
//
//
//                                                            $DbTypeControllerIdField = DB::table((string)$ModelIsLink)
//                                                                ->select('id')
//                                                                ->where((string)$exceptStringLineNArray['field_name'], '=', $exceptStringLineNArray['field_value'])
//                                                                ->value('id');
//
//
//                                                            $DbTypeControllerNameField = DB::table('_DbTypeControllerFields')
//                                                                ->select('table_field_name')
//                                                                ->where('field_alias', '=', $exceptStringLineNArray['field_name'])
//                                                                ->where('db_type_controller_id', '=', $dbTypesControllers[0]['db_type_controller'][0]['id'])
//                                                                ->value('table_field_name');
//
//
//                                                            $update = DB::table((string)$tableToChangeModel)->where('line_n', '=', $exceptTableTypeCodeValue['string_line_n'])
//                                                                ->update([
//                                                                    (string)$DbTypeControllerNameField => $DbTypeControllerIdField
//                                                                ]);
//                                                        }
//                                                    }
//                                                }
//                                            }
//                                        }
//                                    }
//                                    /*-----------------------END Update Fields Object Tables To Change-------------------------*/
//                                }
//
//
//
//                                return 'ok';
//                            }
                            /*-------------------------------END AttachedDocumentFiles-------------------------------------*/

                        }

                        $status = [
                            'status' => [
                                'status_code' => "1",
                                'status_description' => 'updated 22',
                            ]
                        ];

                        return response()->json($status);


                        /*---------------------------------------------------------------------*/
                        /*---------------------------------------------------------------------*/
                        /*---------------------------------------------------------------------*/
                    }

                }

            }

        }


    }

}
