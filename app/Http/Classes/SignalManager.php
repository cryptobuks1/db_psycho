<?php


namespace App\Http\Classes;


use App\Models\ChangeRequestController;
use App\Models\ChangeRequestModel;
use App\Models\DbTypeController;
use App\Models\DbTypeModel;
use App\Models\Signal;
use App\QueueSignal;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Self_;

class SignalManager
{
    private static $db_area, $signal;

    public static function getSignalData($signal_id)
    {
        self::$signal = Signal::query()->with([
            "request.dbArea.dBase.serverDb",
            "request.dbArea.dBase.dbType",
            "request.changeRequestModel.dbTypeModel.controllerName.models",
            "request.changeRequestModel.changeRequestModelField.changeRequestModelFieldValue"
        ])->where('id', $signal_id)->get()->first();

        $signal = self::$signal;

        if(!$signal)
            throw new \Exception("Signal with id $signal_id was not found", 327);

        $signal = $signal->request;

        self::$db_area = $signal->dbArea;

        $db_area = self::$db_area;

        $change_request_model = $signal->changeRequestModel[0];

        $db_type_model = $change_request_model->dbTypeModel[0];


        $array_to_send = self::getData($change_request_model, "full");


        //        $child_change_models->map(function($item) use (&$array_to_send)
        //        {
        //            array_push($array_to_send["request"]["request_parameters"]["objects_to_change"],
        //                self::getData($item, "object"));
        //        });


        return [
            "data" => $array_to_send,

            "server_url"       => $db_area->dBase->serverDb->server_url,
            "server_ip"        => $db_area->dBase->serverDb->server_ip,
            "server_port"      => $db_area->dBase->serverDb->server_port,
            "server_http_code" => $db_area->dBase->serverDb->server_http_code,
            "db_code"          => $db_area->dBase->db_code,
            "db_area_token"    => $db_area->db_area_token,
            "db_area"          => $db_area,
            "controller_id"    => $db_type_model->controllerName[0]->id
        ];
    }

    private static function getData($change_request_model, $return_type)
    {
        $db_type_model = $change_request_model->dbTypeModel[0];
        $db_area = self::$db_area;

        $object_record = DB::table($db_type_model->controllerName[0]->models->table_name)
            ->where("id", $change_request_model->row_id)
            ->get()
            ->first();


        $isParent = in_array($db_type_model->object_kind_n, [2, 3]) ? true : false;

        if($isParent && $return_type == "full")
        {
            $owner_db_type_model = DbTypeModel::query()->where([
                "db_type_id" => $db_area->dBase->db_type_id,
                "table_n"    => $db_type_model->object_owner_table_n
            ])->orWhere(function($query) use ($db_type_model)
            {
                $query->where([
                    "db_type_id" => null,
                    "table_n"    => $db_type_model->object_owner_table_n
                ]);
            })
                //                ->with(["controllerLinksLink" => function($query)
                ->with([
                    "modelLinksLink" => function($query)
                    {
                        $query->where([
                            "parent_link_l" => 1
                        ]);
                    },
                    "modelLinksLink.controllerParent.models"
                ])->orderBy("db_type_id", "asc")->get()->first();

            $link = $owner_db_type_model->modelLinksLink->where("table_n", $db_type_model->table_n)->first();

            $owner_record = DB::table($link->controllerParent->models->table_name)
                ->where("id", $change_request_model->row_id_dep)
                ->get()
                ->first();

            $owner_block = [
                "owner_name"      => $owner_db_type_model->object_type_code,
                "owner_key"       => $owner_db_type_model->object_key_field,
                "owner_key_value" => $owner_record->{$owner_db_type_model->object_key_field}
            ];
        }

        $fields = [];

        foreach($change_request_model->changeRequestModelField as $field)
        {

            $field_value = $field->changeRequestModelFieldValue->where("field_value_type_code", "new")->first();

            $db_type_model_field = $field->dbTypeModelField;

            if($db_type_model_field->data_type_id == 57)
            {
                $object = [];

                $object["field_name"] = $field->dbTypeModelField->field_alias;
                $object["field_is_link"] = $field->dbTypeModelField->field_reference;

                $file_data = StoredFileManager::downloadFile($field_value["field_value"], $db_type_model->controllerName[0]->models->table_n);

                $object["field_value"] = $file_data;
                $object["field_comment"] = "";
                $object["field_status"] = 1;

                $fields[] = $object;
                continue;
            }
            if($field->field_reference)
            {
                $object = [];


                $object["field_name"] = $field->dbTypeModelField->field_alias;
                $object["field_is_link"] = true;

                $link_db_type_model_id = $field_value->db_type_model_id;

                $link_db_type_model = DbTypeModel::query()
                    ->where("id", $link_db_type_model_id)
                    ->with("controllerName.models")
                    ->get()
                    ->first();

                $link_model = $link_db_type_model->controllerName[0]->models;

                $link_record = DB::table($link_model->table_name)
                    ->where("id", $field_value["field_value"])
                    ->get()
                    ->first();

                $link_record_value = $link_record->{$link_db_type_model->object_key_field} ?? null;

                if(!is_null($field_value["field_value"]))
                    $object["field_value"] = [
                        "value_table_code" => $link_db_type_model->object_type_code,
                        "value_table_key"  => $link_db_type_model->object_key_field,
                        "value"            => $link_record_value,
                        "value_table_id"   => $link_record->id

                    ];
                else
                    $object["field_value"] = null;
                $object["field_comment"] = "";
                $object["field_status"] = 1;


                $fields[] = $object;
            }
            else
            {
                $object = [];

                $object["field_name"] = $field->dbTypeModelField->field_alias;
                $object["field_is_link"] = false;
                $object["field_value"] = $field_value->field_value;
                $object["field_comment"] = "";
                $object["field_status"] = 1;

                $fields[] = $object;
            }
        }

        if($return_type === "full")
        {
            $child_change_models = ChangeRequestModel::query()->where("parent_id", $change_request_model->id)->with([
                "dbTypeModel.controllerName.models",
                "changeRequestModelField.changeRequestModelFieldValue"
            ])->get()->groupBy("db_type_model_id");

            $object_tables_to_change = [];

            foreach($child_change_models as $db_type_model_id => $grouped_child_change_models)
            {
                if($db_type_model_id === 13)
                {
                    $objects_to_change = [];

                    $grouped_child_change_models->each(function($child_change_model) use (&$objects_to_change)
                    {
                        array_push($objects_to_change, self::getData($child_change_model, "file"));
                    });
                }
                else
                {
                    $current_table_model = $grouped_child_change_models[0]->dbTypeModel[0];

                    $object_tables_to_change[] = [
                        "table_type_code" => $current_table_model->object_type_code,
                        "row_key"         => $current_table_model->object_key_field,
                        "table_rows"      => $grouped_child_change_models->map(function($child_change_model)
                        {
                            return self::getData($child_change_model, "object");
                        })
                    ];
                }
            }
        }


        if($return_type == "full")
            return [
                "request" => [
                    "request_name"       => "RequestForDataChanges",
                    "request_number"     => self::$signal->id,
                    "db_area_code"       => $db_area->db_area_code,
                    "request_parameters" => [
                        "number"            => self::$signal->id,
                        "status"            => "3",
                        "comment"           => "",
                        "objects_to_change" => array_merge([
                            [
                                "object_type_code"        => $db_type_model->object_type_code,
                                "object_kind"             => $db_type_model->object_kind_n,
                                "object_key"              => $db_type_model->object_key_field,
                                "object_key_value"        => $object_record->{$db_type_model->object_key_field},
                                "object_id"               => $object_record->id,
                                "object_owner"            => $isParent ? $owner_block : null,
                                "object_block_fields"     => $fields,
                                "object_tables_to_change" => $object_tables_to_change ?? null
                            ]
                        ], $objects_to_change ?? []),
                    ]
                ]
            ];
        elseif($return_type == "object")
            return [
                "row_key_value"    => $object_record->{$db_type_model->object_key_field},
                "row_block_fields" => $fields,
            ];
        elseif($return_type == "file")
            return [
                "object_type_code"    => $db_type_model->object_type_code,
                "object_kind"         => $db_type_model->object_kind_n,
                "object_key"          => $db_type_model->object_key_field,
                "object_key_value"    => $object_record->{$db_type_model->object_key_field},
                "object_id"           => $object_record->id,
                "object_owner"        => $isParent ? $owner_block : null,
                "object_block_fields" => $fields,
            ];
        //            return [
        //                "object_type_code"    => $db_type_model->object_type_code,
        //                "object_kind"         => $db_type_model->object_kind_n,
        //                "object_key"          => $db_type_model->object_key_field,
        //                "object_key_value"    => $object_record->{$db_type_model->object_key_field},
        //                "object_id"           => $object_record->id,
        //                "object_owner"        => $isParent ? $owner_block : null,
        //                "object_block_fields" => $fields,
        //            ];
    }

    public static function getSignalData_old($signal_id)
    {

        self::$signal = Signal::query()->with([
            "request.dbArea.dBase.serverDb",
            "request.dbArea.dBase.dbType",
            "request.changeRequestController.dbTypeController.controllerName.models",
            "request.changeRequestController.changeRequestControllerField.changeRequestControllerFieldValue"
        ])->where('id', $signal_id)->get()->first();

        $signal = self::$signal;

        if(!$signal)
            throw new \Exception("Signal with id $signal_id was not found", 327);

        $signal = $signal->request;

        self::$db_area = $signal->dbArea;

        $db_area = self::$db_area;

        $change_request_controller = $signal->changeRequestController[0];

        $db_type_controller = $change_request_controller->dbTypeController[0];


        $array_to_send = self::getData_old($change_request_controller, "full");

        $child_change_controllers = ChangeRequestController::query()
            ->where("parent_id", $change_request_controller->id)
            ->with([
                "dbTypeController.controllerName.models",
                "changeRequestControllerField.changeRequestControllerFieldValue"
            ])
            ->get();

        $child_change_controllers->map(function($item) use (&$array_to_send)
        {
            array_push($array_to_send["request"]["request_parameters"]["objects_to_change"], self::getData_old($item, "object"));
        });


        return [
            "data" => $array_to_send,

            "server_url"       => $db_area->dBase->serverDb->server_url,
            "server_ip"        => $db_area->dBase->serverDb->server_ip,
            "server_port"      => $db_area->dBase->serverDb->server_port,
            "server_http_code" => $db_area->dBase->serverDb->server_http_code,
            "db_code"          => $db_area->dBase->db_code,
            "db_area_token"    => $db_area->db_area_token,
            "db_area"          => $db_area,
            "controller_id"    => $db_type_controller->controller_id
        ];
    }

    private static function getData_old($change_request_controller, $return_type)
    {
        $db_type_controller = $change_request_controller->dbTypeController[0];
        $db_area = self::$db_area;

        $object_record = DB::table($db_type_controller->controllerName[0]->models->table_name)
            ->where("id", $change_request_controller->row_id)
            ->get()
            ->first();


        $isParent = in_array($db_type_controller->object_kind_n, [2, 3]) ? true : false;

        if($isParent)
        {
            $owner_db_type_controller = DbTypeController::query()->where([
                "db_type_id"    => $db_area->dBase->db_type_id,
                "controller_id" => $db_type_controller->object_owner_id
            ])->orWhere(function($query) use ($db_type_controller)
            {
                $query->where([
                    "db_type_id"    => null,
                    "controller_id" => $db_type_controller->object_owner_id
                ]);
            })->with([
                "controllerLinksLink" => function($query)
                {
                    $query->where([
                        "parent_link_l" => 1
                    ]);
                },
                "controllerLinksLink.controllerParent.models"
            ])->orderBy("db_type_id", "asc")->get()->first();

            $link = $owner_db_type_controller->controllerLinksLink->where("controller_id", $db_type_controller->controller_id)
                ->first();

            $owner_record = DB::table($link->controllerParent->models->table_name)
                ->where("id", $change_request_controller->row_id_dep)
                ->get()
                ->first();

            $owner_block = [
                "owner_name"      => $owner_db_type_controller->object_type_code,
                "owner_key"       => $owner_db_type_controller->object_key_field,
                "owner_key_value" => $owner_record->{$owner_db_type_controller->object_key_field}
            ];

        }

        $fields = [];

        foreach($change_request_controller->changeRequestControllerField as $field)
        {

            $field_value = $field->changeRequestControllerFieldValue->where("field_value_type_code", "new")->first();

            $db_type_controller_field = $field->dbTypeControllerField;

            if($db_type_controller_field->data_type_id == 57)
            {
                $object = [];

                $object["field_name"] = $field->dbTypeControllerField->field_alias;
                $object["field_is_link"] = $field->dbTypeControllerField->field_reference;

                $file_data = StoredFileManager::downloadFile($field_value["field_value"], $db_type_controller->controllerName[0]->models->table_n);

                $object["field_value"] = $file_data;
                $object["field_comment"] = "";
                $object["field_status"] = 1;

                $fields[] = $object;
                continue;
            }
            if($field->field_reference)
            {
                $object = [];


                $object["field_name"] = $field->dbTypeControllerField->field_alias;
                $object["field_is_link"] = true;

                $link_db_type_controller_id = $field_value->db_type_controller_id;

                $link_db_type_controller = DbTypeController::query()
                    ->where("id", $link_db_type_controller_id)
                    ->with("controllerName.models")
                    ->get()
                    ->first();

                $link_model = $link_db_type_controller->controllerName[0]->models;

                $link_record = DB::table($link_model->table_name)
                    ->where("id", $field_value["field_value"])
                    ->get()
                    ->first();

                $link_record_value = $link_record->{$link_db_type_controller->object_key_field} ?? null;


                if(!is_null($link_record_value))
                    $object["field_value"] = [
                        "value_table_code" => $link_db_type_controller->object_type_code,
                        "value_table_key"  => $link_db_type_controller->object_key_field,
                        "value"            => $link_record_value

                    ];
                else
                    $object["field_value"] = null;
                $object["field_comment"] = "";
                $object["field_status"] = 1;


                $fields[] = $object;
            }
            else
            {
                $object = [];

                $object["field_name"] = $field->dbTypeControllerField->field_alias;
                $object["field_is_link"] = false;
                $object["field_value"] = $field_value->field_value;
                $object["field_comment"] = "";
                $object["field_status"] = 1;

                $fields[] = $object;
            }
        }


        if($return_type == "full")
            return [
                "request" => [
                    "request_name"       => "RequestForDataChanges",
                    "request_number"     => self::$signal->id,
                    "db_area_code"       => $db_area->db_area_code,
                    "request_parameters" => [
                        "number"            => self::$signal->id,
                        "status"            => "3",
                        "comment"           => "",
                        "objects_to_change" => [
                            [
                                "object_type_code"    => $db_type_controller->object_type_code,
                                "object_kind"         => $db_type_controller->object_kind_n,
                                "object_key"          => $db_type_controller->object_key_field,
                                "object_key_value"    => $object_record->{$db_type_controller->object_key_field},
                                "object_id"           => $object_record->id,
                                "object_owner"        => $isParent ? $owner_block : null,
                                "object_block_fields" => $fields,

                            ]
                        ]
                    ]
                ]
            ];
        elseif($return_type == "object")
            return [
                "object_type_code"    => $db_type_controller->object_type_code,
                "object_kind"         => $db_type_controller->object_kind_n,
                "object_key"          => $db_type_controller->object_key_field,
                "object_key_value"    => $object_record->{$db_type_controller->object_key_field},
                "object_id"           => $object_record->id,
                "object_owner"        => $isParent ? $owner_block : null,
                "object_block_fields" => $fields,
            ];
    }
}
