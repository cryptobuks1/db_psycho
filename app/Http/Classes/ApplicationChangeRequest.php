<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 31.05.19
 * Time: 15:06
 */

namespace App\Http\Classes;


use App\Http\Controllers\Controller;
use App\Jobs\SendRequestSignal;
use App\Models\ChangeRequestModel;
use App\Models\ChangeRequestModelField;
use App\Models\ChangeRequestModelFieldValue;
use App\Models\Contractor;
use App\Models\DataTypes;
use App\Models\DbArea;
use App\Models\ChangeRequest;
use App\Models\ChangeRequestController;
use App\Models\ChangeRequestControllerField;
use App\Models\ChangeRequestControllerFieldValue;
use App\Models\ControllerLink;
use App\Models\Country;
use App\Models\DbAreaFile;
use App\Models\DbTypeController;
use App\Models\DbTypeModel;
use App\Models\ModelLink;
use App\Models\ModelTables;
use App\Models\Signal;
use App\QueueSignal;
use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;

class ApplicationChangeRequest extends Controller
{

    protected $application;
    private $parent_id = null;
    private $DataRequest = null;
    private $dbTypesModels = null;
    private $dbTypesTablePartsModels;
    private $global_variables_controller_table;
    private $global_variables_change_fields;
    private $table_part_shorted;
    private $change_fields_model_parts;
    private $data_fields;
    private $count_main_data_models;

//    private $db_types_controllers_array;

    public function __construct($application)
    {
        $this->application = $application;
    }

    protected function dbAreaEmpty()
    {
        if (empty($dbAreaId)) {
            return abort(400, 'Change Request do not executed. Database Area is not determined.');
        }
    }

    public function dbTypesControllers($base_modal)
    {
        $this->dbTypesModels = \App\Models\Controller::with('models', 'dbTypeModel.dbTypeModelOwner')
            ->where('controller_alias', $base_modal)
            ->get()->toArray();

        $this->dbTypesModelsTableParts();

        return $this->dbTypesModels;
    }

    public function dbTypesModelsTableParts($children_modal = null)
    {

        $this->application['main_data_models'];
        $this->application['form_parameters']['form_base_data_model'];
        //delete Model Parent
        $data_models = $this->application['main_data_models'];
        unset($data_models[$this->application['form_parameters']['form_base_data_model']]);
        //get all key table_parts
        $keys_table_parts = array_keys($data_models);

        $dbTypesModelsTableParts = DbTypeModel::where('object_owner_table_n', $this->dbTypesModels[0]['models']['table_n'])->get()->toArray();

        $db_types_models_table_part_shorted = [];
        foreach ($dbTypesModelsTableParts as $modelsTablePartKey => $modelsTablePartValue) {
            $db_types_models_table_part_shorted[$modelsTablePartValue['object_type_code']] = $modelsTablePartValue;
        }

        $this->table_part_shorted = array_diff_assoc($data_models, $db_types_models_table_part_shorted);

        $this->dbTypesTablePartsModels = [];
        foreach ($keys_table_parts as $table_part) {

            $table_part_model = \App\Models\Controller::with('models', 'dbTypeModel.dbTypeModelOwner')
                ->where('controller_alias', $table_part)
                ->get()->toArray();

            $this->dbTypesTablePartsModels[] = $table_part_model[0];
        }
        $this->dbTypesModels = array_merge($this->dbTypesModels, $this->dbTypesTablePartsModels);
    }

    public function globalVarDbArea($DbAreaRelations)
    {
        $globalVariablesModelTableDbArea = [
            "dbAreaId" => $DbAreaRelations[0]['id'],
            "dbAreaCode" => $DbAreaRelations[0]['db_area_code'],
            "dbAreaToken" => $DbAreaRelations[0]['db_area_token'],
            "dataBasesId" => $DbAreaRelations[0]['d_base']['id'],
            "dataBasesServerId" => $DbAreaRelations[0]['d_base']['server_id'],
            "dataBasesDbTypeId" => $DbAreaRelations[0]['d_base']['db_type_id'],
            "dataBasesDbCode" => $DbAreaRelations[0]['d_base']['db_code'],
            "serverId" => $DbAreaRelations[0]['d_base']['server_db']['id'],
            "serverIP" => $DbAreaRelations[0]['d_base']['server_db']['server_ip'],
            "serverServerUrl" => $DbAreaRelations[0]['d_base']['server_db']['server_url'],
        ];

        return $globalVariablesModelTableDbArea;
    }

    public function globalVarContTable($nameControllerDbTypesControllers, $nameModelDbTypesModels, $dbTypesControllers, $controllerLink = null, $idParent = null, $parentObjectModel = null, $DbAreaRelations)
    {
//            $nameModelDbTypesModels;
        $globalVariablesControllerTable = [];
        foreach ($nameControllerDbTypesControllers as $name_controller_db_types_controller) {
            $name_controller_db_types_model =
                [
                    'objectTableNameController' => $name_controller_db_types_controller['object_type_code'],
                    'objectTableControllerId' => $name_controller_db_types_controller['controller_id'] ?? null,
                    'objectTableObjectKeyField' => $name_controller_db_types_controller['object_key_field'],
                    'objectTableControllerFields' => $name_controller_db_types_controller['controller_fields'] ?? null,

                    'objectTableNameModel' => $name_controller_db_types_controller['object_key_field'],
                    'objectTableNameTable' => $name_controller_db_types_controller['models']['table_name'] ?? null,
                    'objectTableControllerLinks' => $name_controller_db_types_controller['controller_name'][0]['controller_link'] ?? null,
                    'controllerLinkParent' => $controllerLink[0] ?? null,

                    'controllerIdParent' => $idParent ?? null,
                    'parentObject' => $parentObjectModel[0] ?? null,
                    'objectTableControllerParent' => $name_controller_db_types_controller['object_owner_id'] ?? null,

                    // !!!заменить из $globalVariablesControllerTableDbArea
                    'db_area_code' => $DbAreaRelations[0]['db_area_code'],
                    'db_type_id' => $DbAreaRelations[0]['d_base']['db_type_id'],
                    'db_id' => $DbAreaRelations[0]['db_id'],
                    'server_id' => $DbAreaRelations[0]['d_base']['server_id'],
                    'server' => $DbAreaRelations[0]['d_base']['server_db'],

                    'nameModelDbTypesModels' => $name_controller_db_types_controller, // nameModelDbTypesModels
                    'objectTableModelFields' => $name_controller_db_types_controller['model_fields'],
                    'objectDbTypesModelId' => $name_controller_db_types_controller['id'],
                    'objectTableModelLinks' => $name_controller_db_types_controller['model_links'],
                    'modelLinkParent' => $controllerLink[0] ?? null,
                    'modelIdParent' => $idParent ?? null,
                    'objectTableModelParent' => $name_controller_db_types_controller['object_owner_id'] ?? null
                ];
            $globalVariablesControllerTable[] = $name_controller_db_types_model;
        }
        return $globalVariablesControllerTable;
    }

    public function nameControlDbTypesControl($dbTypesControllers, $globalVariablesModelTableDbArea = null)
    {
        $nameModelDbTypesModels = \App\Models\DbTypeModel::with('models.modelLinks')
            ->where('object_type_code', $dbTypesControllers[0]['models']['table_code'])
            ->where('db_type_id', $globalVariablesModelTableDbArea['dataBasesDbTypeId'])
            ->get()->toArray();

        if (empty($nameModelDbTypesModels))
        {
            $nameModelDbTypesModels = \App\Models\DbTypeModel::with('modelFields')
                ->with('modelLinks')
                ->with('models')
                ->with('controllerName')
                ->where('object_type_code', trim($dbTypesControllers[0]['models']['table_code']))
                ->where('db_type_id', NULL)
                ->get()
                ->toArray();
        }

        if (empty($nameModelDbTypesModels)) {

            return abort(400, "'.$dbTypesControllers[0]['models']['table_code'].' no settings for this object");
        }
            /*-----------------------------------NEW 22.01.20---------------------------------------*/

        $db_types_controllers_parent = [];
        $db_types_controllers_children = [];

        foreach ($dbTypesControllers as $db_types_controller) {

            if ($db_types_controller['db_type_model'][0]['object_kind_n'] == 1) {
                $db_types_controllers = \App\Models\DbTypeModel::with('modelFields')
                    ->with('modelLinks')
                    ->with('models')
                    ->where('table_n', trim($db_types_controller['models']['table_n']))
                    ->where('db_type_id', NULL)
                    ->get()->toArray();

                $db_types_controllers_parent[] = $db_types_controllers[0];

            } elseif ($db_types_controller['db_type_model'][0]['object_kind_n'] == 3) {
                $db_types_controllers = \App\Models\DbTypeModel::with('modelFields')
                    ->with('modelLinks')
                    ->with('models')
                    ->with('controllerName')
                    ->where('table_n', trim($db_types_controller['models']['table_n']))
                    ->where('db_type_id', NULL)
                    ->get()->toArray();

                $db_types_controllers_children[] = $db_types_controllers[0];
            }
        }

            /*-----------------------------------END NEW 22.01.20-----------------------------------*/
        $nameModelDbTypesModels = array_merge($nameModelDbTypesModels, $db_types_controllers_children);

        return $nameModelDbTypesModels;
    }

    public function changeFields($global_variables_controller_table)
    {
        $change_fields = [];
        foreach ($global_variables_controller_table as $global_variables_key => $globalVariablesControllerTable) {
            $changeFields = [];
            foreach ($globalVariablesControllerTable['objectTableModelFields'] as $fields) {
                $fields_test = [];
                foreach ($this->application['main_data_models'] as $main_data_models_key => $main_data_models) {

                    if ($globalVariablesControllerTable['nameModelDbTypesModels']['controller_name'][0]['controller_alias'] === $main_data_models_key
                        and ($globalVariablesControllerTable['objectTableObjectKeyField'] === "uid_1c_code")) {
                        $this->count_main_data_models = $main_data_models;
                        foreach ($main_data_models as $index => $model) {
                            if (!empty($model)) {
                                if(!isset($changeFields[$index]))
                                    $changeFields[$index] = [];

                                foreach ($model as $key => $value) {
                                    if ($fields['table_field_name'] == $key) {
                                        if(!isset($fields_test[$index]))
                                            $fields_test[$index] = [];

                                        array_push($fields_test[$index], ['filed_value' => $value, 'field' => $fields]);
                                        $changeFields[$index][] = $fields_test[$index][0];
                                    }
                                }
                            }
                        }

                    } elseif ($globalVariablesControllerTable['nameModelDbTypesModels']['controller_name'][0]['controller_alias'] === $main_data_models_key
                        and ($globalVariablesControllerTable['objectTableObjectKeyField'] === "line_n")) {

                        $this->count_main_data_models = $main_data_models;
                        foreach ($main_data_models as $index => $model) {
                            if (!empty($model)) {
                                if(!isset($changeFields[$index]))
                                    $changeFields[$index] = [];

                                foreach ($model as $key => $value) {
                                    if ($fields['table_field_name'] == $key) {
                                        if(!isset($fields_test[$index]))
                                            $fields_test[$index] = [];

                                        array_push($fields_test[$index], ['filed_value' => $value, 'field' => $fields]);
                                        $changeFields[$index][] = $fields_test[$index][0];
                                    }
                                }
                            }
                        }

                    } elseif ((count($main_data_models) > 1) and $globalVariablesControllerTable['objectTableObjectKeyField'] === "line_n") {

                        $this->count_main_data_models = $main_data_models;
                        $this->main_data_models($main_data_models, $globalVariablesControllerTable);
                        if (!empty($this->change_fields_model_parts)) {
                            array_push($changeFields, $this->change_fields_model_parts);
                            $changeFields = $changeFields[0];
                        }
                    }
                }
            }

            if (($globalVariablesControllerTable['objectTableObjectKeyField'] === "uid_1c_code")) {
                $change_fields[] = [$changeFields];
                array_push($global_variables_controller_table[$global_variables_key], [$changeFields]);

                $this->global_variables_change_fields = $global_variables_controller_table;
            } elseif ($globalVariablesControllerTable['objectTableObjectKeyField'] == "line_n") {
                $change_fields[] = $changeFields;
                if (count($this->count_main_data_models) == 1) {
                    array_push($global_variables_controller_table[$global_variables_key], [$changeFields]);//
                } elseif (count($this->count_main_data_models) > 1) {
                    array_push($global_variables_controller_table[$global_variables_key], [$changeFields]);
                }

                $this->global_variables_change_fields = $global_variables_controller_table;
            }
        }
        return $this->global_variables_change_fields;
    }

    public function main_data_models($main_data_models, $globalVariablesControllerTable)
    {
        $this->change_fields_model_parts = [];
        foreach ($globalVariablesControllerTable['objectTableModelFields'] as $fields) {
            $change_field = [];
            $change_field_value = [];
            foreach ($main_data_models as $item => $model) {
                foreach ($model as $key => $value) {

                    if ($fields['table_field_name'] == $key) {
                        array_push($change_field_value, $value); //add new value from front to array $fields
                    }
                }
                $change_field = $fields;
            }
            array_push($change_field, $change_field_value);
            $this->change_fields_model_parts[] = $change_field;
        }

        $data = [];
        foreach ($this->change_fields_model_parts as $change_fields_model_part_key) {
            foreach ($change_fields_model_part_key[0] as $model_part_key => $model_part_value) {

                if (!isset($data[$model_part_key]))
                    $data[$model_part_key] = [];

                unset($change_fields_model_part_key[0]);
                array_push($data[$model_part_key], ['filed_value' => $model_part_value, 'field' => $change_fields_model_part_key]);
            }
        }

        $this->change_fields_model_parts = [];
        foreach ($data as $data_item) {

            array_push($this->change_fields_model_parts, $data_item);
        }

        return $this->change_fields_model_parts;
    }

    public function changeRequest($globalVariablesControllerTable, $global_variables_controller_table, $model,
                                  $dbAreaId, $getObject, $parentObjectModel, $isParent, $objectKindN)
    {
        /* END Change Request in object Table --- Model_Fields----*/
        $this->global_variables_change_fields;
        $this->table_part_shorted;

        /*-------save in table ChangeRequest---------*/
        if (is_null($this->parent_id)) {
            $DataRequest = new ChangeRequest();
            $DataRequest->db_area_id = $dbAreaId;
            $DataRequest->status = (int)3; //status default (in processing)
            $DataRequest->created_by = (new ConsumerParameters())->consumerCode();
            $DataRequest->save();

            $this->DataRequest = $DataRequest->id;
        }

        $this->global_variables_change_fields($isParent, $parentObjectModel, $globalVariablesControllerTable, $objectKindN, $getObject, $model);
    }

    public function global_variables_change_fields($isParent = null, $parentObjectModel = null, $globalVariablesControllerTable = null, $objectKindN = null, $getObject = null, $model = null)
    {

        foreach ($this->global_variables_change_fields as $global_variables_change) {

            if (!empty($this->application['main_data_models'][$global_variables_change['nameModelDbTypesModels']['controller_name'][0]['controller_alias']])) {

                foreach ($global_variables_change[0] as $key_field => $field_value) {

                    foreach ($field_value as $row_index => $row) {

                        $ChangeRequestModel = new ChangeRequestModel();
                        $ChangeRequestModel->change_request_id = $this->DataRequest ?? null;

                        $ChangeRequestModel->db_type_model_id = (integer)$global_variables_change['objectDbTypesModelId'];

                        $ChangeRequestModel->row_id = (integer)$this->application['main_data_models'][$global_variables_change['nameModelDbTypesModels']['controller_name'][0]['controller_alias']][$row_index]['id'];

                        if ($isParent == true) {
                            $ChangeRequestModel->row_id_dep = $parentObjectModel[0]['id'];
                        }
                        $ChangeRequestModel->parent_id = $this->parent_id ?? null;
                        $ChangeRequestModel->created_by = (new ConsumerParameters())->consumerCode();
                        $ChangeRequestModel->updated_by = (new ConsumerParameters())->consumerCode();
                        $ChangeRequestModel->save();

                        /*-------END ChangeRequestModels--------*/

                        $this->parent_id = is_null($this->parent_id) ? $ChangeRequestModel->id : $this->parent_id;

                        //                $field_linksModel = collect($globalVariablesControllerTable["objectTableModelLinks"]);
                        $field_linksModel = collect($global_variables_change["objectTableModelLinks"]);

                        /*-----ChangeRequestModelFields-----------*/

                        foreach($row as $field)
                        {
                            $changeReqModelField = new ChangeRequestModelField();
                            $changeReqModelField->change_request_model_id = $ChangeRequestModel->id;
                            $changeReqModelField->db_type_model_field_id = $field['field']['id'] ?? null;

                            // If Table parts, save Line Number
                            //                        if ($objectKindN == (int)3) {
                            //                            $changeReqModelField->line_n = $getObject[0][$globalVariablesControllerTable['objectTableObjectKeyField']];
                            //                        }
                            if ($global_variables_change["nameModelDbTypesModels"]["object_kind_n"] == (int)3) {
//                                $changeReqModelField->line_n = $getObject[0][$globalVariablesControllerTable['objectTableObjectKeyField']];
                                $changeReqModelField->line_n = $this->application["main_data_models"][$global_variables_change["nameModelDbTypesModels"]["controller_name"][0]["controller_alias"]][$row_index][$global_variables_change["objectTableObjectKeyField"]];
                            }
                            $changeReqModelField->field_reference = $field['field']['field_reference'] ?? null;
                            $changeReqModelField->system_status_id = (int)1;
                            $changeReqModelField->created_by = (new ConsumerParameters())->consumerCode();
                            $changeReqModelField->updated_by = (new ConsumerParameters())->consumerCode();
                            $changeReqModelField->save();
                            /*-----END ChangeRequestModelFields------*/

                            $changeReqModelFieldId = $changeReqModelField['id'];
                            // Reset variables
                            $db_type_controller_id = null;
                            $db_type_controller_old_id = null;

                            /*!!!!!!!!!!!!!!!!!!! if ($field["field_reference"]) {!???????????????????*/

                            if (($field['field']["field_reference"] == true)) {
                                $links = $field_linksModel
                                    ->where("table_field_name", $field['field']["table_field_name"] ?? $field["table_field_name"])
                                    ->where("parent_link_l", 0);
                                if ($links->count() > 0) {
                                    $link = $links->first();
                                    if ($link["table_field_name_composite"]) {
                                        $front_id = $this->application["main_data_models"][$global_variables_change["nameModelDbTypesModels"]["controller_name"][0]["controller_alias"]][$row_index][$link["table_field_name_composite"]];
                                        $link_controller = \App\Models\Controller::query()
                                            ->where("controller_table_n", $front_id)
                                            ->with(["dbTypeModel" => function ($query) use ($globalVariablesControllerTable) {
                                                $query->where("db_type_id", $globalVariablesControllerTable["db_type_id"])
                                                    ->orWhereNull("db_type_id")
                                                    ->orderBy("db_type_id", "asc")
                                                    ->get()->first();
                                            }])
                                            ->get();

                                        $db_type_controller = $link_controller->where("controller_table_n", $front_id)->first();
                                        $db_type_controller_id = $db_type_controller->dbTypeController[0]->id;
                                    } else {
                                        if (count($links) > 1)
                                            throw new \Exception("more than 1 link");

                                        $db_type_controller = DbTypeModel::query()// $db_type_model
                                        ->where("table_n", $link["table_n_link"])
                                            ->get()->first();

                                        $db_type_controller_id = $db_type_controller->id;
                                    }
                                }
                            }

                            /*!!!!!!!!!!!!!!!!!!!   END  if ($field["field_reference"]) {!???????????????????*/

                            /*------------------------ChangeRequestModelFieldValues-----------------------------*/

                            $changeReqModelField = new ChangeRequestModelFieldValue();
                            $changeReqModelField->change_request_model_field_id = $changeReqModelFieldId;
                            //                    $changeReqModelField->db_type_model_id = $field['field']['db_type_model_id'];
                            $changeReqModelField->db_type_model_id = $db_type_controller_id ?? $field['field']['db_type_model_id'];
                            $changeReqModelField->field_value_type_code = 'new';
                            $changeReqModelField->field_value = $field['filed_value']; //new value from front
                            $changeReqModelField->created_by = (new ConsumerParameters())->consumerCode();
                            $changeReqModelField->updated_by = (new ConsumerParameters())->consumerCode();
                            $changeReqModelField->save();
                            /*------------------------END ChangeRequestModelFieldValues-------------------------*/
                        }
                    }
                }
            }
        }
    }

    public
    function applicationChange()
    {
        $dbAreaId = $this->application['db_block']['db_area_id'];

        if (empty($dbAreaId) or (!isset($dbAreaId))) {
            $this->dbAreaEmpty();
        }

        $model = $this->application['main_data_models'][$this->application['form_parameters']['form_base_data_model']][0];

        //get  $DbArea  dBase serverDb
        $DbAreaRelations = DbArea::with('dBase.serverDb', 'dBase.dbType')
            ->where('id', $dbAreaId)
            ->get()->toArray();

        //      1. Должна быть 1 и только одна запись с заданным "db_area_id".
        //      2. Должна быть 1 и только одна запись с "Databases"
        //      3. Должны быть заполнены необходимые поля в "Databases"
        //      4. Должна быть 1 и только одна запись с "Servers"
        //      5. Должны быть заполнены необходимые поля в "Servers"
        if (count($DbAreaRelations) > 1) {
            //save to table logs  ??????!!!!!!!!!!
            return abort(400, 'DbArea error settings');
        } elseif (array_key_exists('1', $DbAreaRelations[0]['d_base'])) {
            if (empty ($DbAreaRelations[0]['d_base']['server_id'])
                or ($DbAreaRelations[0]['d_base']['db_code'])
                or ($DbAreaRelations[0]['d_base']['db_type_id'])
            ) {

                return abort(400, 'DataBases no settings for this object');
            }
        } elseif (array_key_exists('1', $DbAreaRelations[0]['d_base']['server_db'])) {
            if (empty ($DbAreaRelations[0]['d_base']['server_id'])
                or ($DbAreaRelations[0]['d_base']['db_code'])
                or ($DbAreaRelations[0]['d_base']['db_type_id'])
            ) {

                return abort(400, 'ServerDB  no settings for this object');
            }
        }

        $globalVariablesModelTableDbArea = $this->globalVarDbArea($DbAreaRelations);

        $this->dbTypesModels = $this->dbTypesControllers($base_modal = $this->application['form_parameters']['form_base_data_model']);


        //if !isset $dbTypesControllers (object)
//        if (empty($dbTypesControllers)) {
        if (empty($this->dbTypesModels)) {
            //log
            return abort(400, 'Change Request do not executed. Data Base Type Controller is not determined.');
        }

        // Determinate record DbTypeController

        $nameControllerDbTypesModels = $this->nameControlDbTypesControl($this->dbTypesModels, $globalVariablesModelTableDbArea ?? null);

        //PARENT+CHILDREN  $nameControllerDbTypesModels

        $global_variables_controller_table = $this->globalVarContTable($nameControllerDbTypesModels, $nameModelDbTypesModels ?? null, $this->dbTypesModels, $modelLink ?? null, $idParent ?? null, $parentObjectModel ?? null, $DbAreaRelations);

        //get changes fields from front

        $this->application;
        $get_object = [];
        foreach ($global_variables_controller_table as $globalVariablesControllerTable) {
//            $getObject = DB::table($globalVariablesControllerTable['nameModelDbTypesModels']['models']['table_name'])->where('id', $model['id'])->get()->toArray();
            if (!empty($this->application['main_data_models'][$globalVariablesControllerTable['nameModelDbTypesModels']['controller_name'][0]['controller_alias']])) {

                if($globalVariablesControllerTable['nameModelDbTypesModels']["object_kind_n"] === 3)
                {
                    foreach($this->application['main_data_models'][$globalVariablesControllerTable['nameModelDbTypesModels']['controller_name'][0]['controller_alias']] as $data_model)
                    {
                        $getObject = DB::table($globalVariablesControllerTable['nameModelDbTypesModels']['models']['table_name'])
                            ->where('id', $data_model['id'])->get()->toArray();
                        if (!empty($getObject)) {
                            $get_object[] = json_decode(json_encode($getObject), true);
                        } elseif (empty($getObject)) {
                            $get_object[] = [$data_model];
                        }
                    }
                }
                else
                {
                    $getObject = DB::table($globalVariablesControllerTable['nameModelDbTypesModels']['models']['table_name'])
                        ->where('id', $this->application['main_data_models'][$globalVariablesControllerTable['nameModelDbTypesModels']['controller_name'][0]['controller_alias']][0]['id'])->get()->toArray();
                    if (!empty($getObject)) {
                        $get_object[] = json_decode(json_encode($getObject), true);
                    } elseif (empty($getObject)) {
                        $get_object[] = $this->application['main_data_models'][$globalVariablesControllerTable['nameModelDbTypesModels']['controller_name'][0]['controller_alias']];
                    }
                }
            }
        }

        //END get changes fields from front

        $change_fields = $this->changeFields($global_variables_controller_table);


        $changeRequest = $this->changeRequest($globalVariablesControllerTable, $global_variables_controller_table, $model, $dbAreaId, $getObject, $parentObjectModel ?? null, $isParent ?? null, $objectKindN ?? null);


        if (!empty($this->application['children'])) {

            $globalVariablesControllerTable = null;

            foreach ($this->application['children'] as $childrenRequest) {

                $dbTypesControllers = $this->dbTypesControllers($base_modal = $childrenRequest['form_parameters']['form_base_data_model']);

                if(!isset($this->application["main_data_models"][$base_modal]))
                    $this->application["main_data_models"][$base_modal] = [];

                if (empty($dbTypesControllers)) {
                    //log
                    return abort(400, 'Change Request do not executed. Data Base Type Controller is not determined.');
                }

                $nameControllerDbTypesModels = $this->nameControlDbTypesControl($dbTypesControllers, $globalVariablesModelTableDbArea ?? null);

                if(is_null($globalVariablesControllerTable))
                {
                    $globalVariablesControllerTable = $this->globalVarContTable($nameControllerDbTypesModels, null, $dbTypesControllers, $modelLink ?? null, $idParent ?? null, $parentObject ?? null, $DbAreaRelations);
                }


                $model = $childrenRequest["main_data_models"][$base_modal][0];
                $this->application["main_data_models"][$base_modal][] = $model;
            }
            $this->changeFields($globalVariablesControllerTable);

            $this->changeRequest($globalVariablesControllerTable[0], null,  $model, $dbAreaId, $getObject, $parentObject ?? null, false, null);
        }


        /**
         * save signal in table queue_signals
         */

        $queueSignal = new Signal();
        $queueSignal->change_request_id = $this->DataRequest ?? null;
        $queueSignal->db_area_id = $dbAreaId;
        $queueSignal->system_status_id = (int)1;
        $queueSignal->request_incoming_n = "request_incoming_n";
        $queueSignal->signal_type_code = "signal_type_code";
        $queueSignal->signal_error_l = (boolean)false;
        $queueSignal->signal_error_code = null;
        $queueSignal->signal_error_message = null;
        $queueSignal->created_by = (new ConsumerParameters())->consumerCode();
        $queueSignal->updated_by = (new ConsumerParameters())->consumerCode();
        $queueSignal->save();

        /*send Signal to Queueable*/
        $signal = null;
        SendRequestSignal::dispatch($signal);
        /*END send Signal to Queueable*/

        /**
         * END save signal in table queue_signals
         */
        return;
        // return SignalManager::getSignalData($queueSignal->id);
    }

    public
    function sendSignal($server_url, $db_code, $data_array)
    {
        $serverUrl = $server_url . '/' . $db_code;
        $host = request()->root();
        $host = preg_replace('#^https?://#', '', rtrim($host, '/'));
        $client = new Client();
        $res = $client->request('POST', $serverUrl . '/hs/api_for_wc/signal', [
            'json' => $data_array,
            //'auth' => ['WebCabinetEN', 'WebCabinet'],
            'headers' => [
                'Referer' => "$host",
            ]
        ]);

        $resArray = \GuzzleHttp\json_decode($res->getBody());
    }

    public
    function getSignalData($signal_id)
    {
        $getSignal = QueueSignal::query()
            ->with([
                "request.dbArea.dBase.serverDb",
                "request.dbArea.dBase.dbType",
                "request.changeRequestController.dbTypeController.controllerName.models",
                "request.changeRequestController.changeRequestControllerField.changeRequestControllerFieldValue"
            ])
            ->where('id', $signal_id)
            ->get()->first();

        $signal = $getSignal->request;

        $db_area = $signal->dbArea;

        $db_type_controller = $signal->changeRequestController[0]->dbTypeController[0];

        $object_record = DB::table($db_type_controller->controllerName[0]->models->table_name)
            ->where("id", $signal->changeRequestController[0]->row_id)
            ->get()->first();


        $isParent = in_array($db_type_controller->object_kind_n, [2, 3]) ? true : false;

        if ($isParent) {
            $owner_db_type_controller = DbTypeController::query()
                ->where([
                    "db_type_id" => $db_area->dBase->db_type_id,
                    "controller_id" => $db_type_controller->object_owner_id
                ])
                ->orWhere(function ($query) use ($db_type_controller) {
                    $query->where([
                        "db_type_id" => null,
                        "controller_id" => $db_type_controller->object_owner_id
                    ]);
                })
                ->with(["controllerLinksLink" => function ($query) {
                    $query->where([
                        "parent_link_l" => 1
                    ]);
                }, "controllerLinksLink.controllerParent.models"])
                ->orderBy("db_type_id", "asc")
                ->get()->first();

            $link = $owner_db_type_controller->controllerLinksLink
                ->where("controller_id", $db_type_controller->controller_id)->first();

            $owner_record = DB::table($link->controllerParent->models->table_name)
                ->where("id", $signal->changeRequestController[0]->row_id_dep)
                ->get()->first();

            $owner_block = [
                "owner_name" => $owner_db_type_controller->object_type_code,
                "owner_key" => $owner_db_type_controller->object_key_field,
                "owner_key_value" => $owner_record->{$owner_db_type_controller->object_key_field}
            ];
        }

        $fields = [];

        foreach ($signal->changeRequestController[0]->changeRequestControllerField as $field) {

            $field_value = $field->changeRequestControllerFieldValue
                ->where("field_value_type_code", "new")->first();

            $db_type_controller_field = $field->dbTypeControllerField;

            if ($db_type_controller_field->data_type_id == 57) {
                $object = [];

                $object["field_name"] = $field->dbTypeControllerField->field_alias;
                $object["field_is_link"] = $field->dbTypeControllerField->field_reference;

                $file_data = StoredFileManager::downloadFile($field_value["field_value"]);

                $object["field_value"] = $file_data;
                $object["field_comment"] = "";
                $object["field_status"] = 1;

                $fields[] = $object;
                continue;
            }
            // TODO спросить передавать field_alias или другое
            if ($field->field_reference) {
                $object = [];


                $object["field_name"] = $field->dbTypeControllerField->field_alias;
                $object["field_is_link"] = true;

                $link_db_type_controller_id = $field_value->db_type_controller_id;

                $link_db_type_controller = DbTypeController::query()
                    ->where("id", $link_db_type_controller_id)
                    ->with("controllerName.models")
                    ->get()->first();

                $link_model = $link_db_type_controller->controllerName[0]->models;

                $link_record = DB::table($link_model->table_name)
                    ->where("id", $field_value["field_value"])
                    ->get()->first();

                $link_record_value = $link_record->{$link_db_type_controller->object_key_field} ?? null;


                if ($link_record_value)
                    $object["field_value"] = [
                        "value_table_code" => $link_db_type_controller->object_type_code,
                        "value_table_key" => $link_db_type_controller->object_key_field,
                        "value" => $link_record_value

                    ];
                else
                    $object["field_value"] = null;
                $object["field_comment"] = "";
                $object["field_status"] = 1;


                $fields[] = $object;
            } else {
                $object = [];

                $object["field_name"] = $field->dbTypeControllerField->field_alias;
                $object["field_is_link"] = false;
                $object["field_value"] = $field_value->field_value;
                $object["field_comment"] = "";
                $object["field_status"] = 1;

                $fields[] = $object;
            }
        }

        $array_to_send = [
            "request" => [
                "request_name" => "RequestForDataChanges",
                "request_number" => $signal->id,
                "request_parameters" => [
                    "number" => $signal->id,
                    "status" => "3",
                    "comment" => "",
                    "objects_to_change" => [
                        [
                            "object_type_code" => $db_type_controller->object_type_code, //"object_type_code" => "Contractor",
                            "object_kind" => $db_type_controller->object_kind_n, // "object_kind" => "1",
                            "object_key" => $db_type_controller->object_key_field, //"object_key" => "uid_1c_code",
                            "object_key_value" => $object_record->{$db_type_controller->object_key_field}, //"object_key_value" => "914aa641-ab9c-11e8-843f-002590762efe",
                            "object_id" => $object_record->id, //"object_key_value" => "914aa641-ab9c-11e8-843f-002590762efe",

                            "object_owner" => $isParent ? $owner_block : null,
                            "object_block_fields" => $fields,
                        ]
                    ]
                ]
            ]
        ];

        $this->sendSignal($db_area->dBase->serverDb->server_url, $db_area->dBase->db_code, $array_to_send);

        return $array_to_send;
    }
}
