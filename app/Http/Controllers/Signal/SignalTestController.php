<?php

namespace App\Http\Controllers\Signal;

use App\Http\Classes\StoredFileManager;
use App\Models\ActionLog;
use App\Models\ActionType;
use App\Models\BL\BlLeasingContractSpecification;
use App\Models\BL\BlLeasingSchedulePayments;
use App\Models\BL\BlLeasingSchedulePaymentsExchange;
use App\Models\BL\BlScheduleArticle;
use App\Models\BL\ContractorContract;
use App\Models\ChangeRequest;
use App\Models\Contractor;
use App\Models\ControllerLink;
use App\Models\DbArea;
use App\Models\DBase;
use App\Models\DbTypeController;
use App\Models\DbTypeModel;
use App\Models\Notification;
use App\Models\NotificationsExchange;
use Composer\Command\UpdateCommand;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Array_;
use function PHPSTORM_META\map;
use function Sodium\add;

class SignalTestController extends Controller
{
    public $db_area = null;
    public $current_time = null;
    public $timer;


    public function index(Request $request)
    {
        if($request->getMethod() == "GET")
            return $this->getStatus(1, "Connection successful");

        $request_array = $request->all();

        // If there's more than one request, wrap this into foreach
        $request_object = $request_array;

        $db_area = DbArea::query()->where([
            "db_area_code"  => $request_object["request"]["db_area_code"],
            "db_area_token" => $request->header("token")
        ])->with("dBase.serverDb", "consumer")->get()->first();

        $this->db_area = $db_area;

        if(!$db_area)
        {
            return $this->getStatus(0, "token or db_area_code is not valid");
        }

        $current_time = Carbon::now()->format("Y-m-d H:i:s");
        $this->current_time = $current_time;

        if($request_object["request"]["request_name"] == "RequestForDataChanges")
            return $this->requestForDataChanges($request_object);

        elseif($request_object["request"]["request_name"] == "ExchangeResult")
        {
            return $this->exchangeResult($request_object);
        }
        elseif($request_object["request"]["request_name"] == "ChangesSchedulePayment")
        {
            return $this->changesSchedulePayment($request_object);
        }
        elseif($request_object["request"]["request_name"] == "ChangesNotification")
        {
            return $this->changesNotification($request_object);
        }
        elseif($request_object["request"]["request_name"] == "CheckConnection")
        {
            return $this->getStatus(1, "Connection successful");
        }
    }

    public function requestForDataChanges($request_object)
    {
        $request_parameters = $request_object["request"]["request_parameters"];

        $number = $request_parameters["number"] ?? null;
        $status = $request_parameters["status"] ?? null;


        if($number && in_array($status, [0, 1]))
        {
            $change_request = ChangeRequest::query()->where("id", (int)$number)->get()->first();

            $change_request->status = (int)$status;
            $change_request->comment = $request_parameters["comment"];

            $change_request->save();

            return $this->getStatus(1, "Заявка принята");

        }

        //+++ ЗубановИА 29082019
        $spent_time_array = [];
        //--- ЗубановИА 29082019
        foreach($request_parameters["objects_to_change"] as $object_to_change)
        {
            try
            {

                $this->timer = microtime(true);

                if(!isset($object_to_change["object_type_code"]) || empty($object_to_change["object_type_code"]))
                    return $this->getStatus(0, "Empty object_type_code objects_to_change");

                $db_type_model = DbTypeModel::query()->where([
                    "db_type_id"       => $this->db_area->dBase->db_type_id,
                    "object_type_code" => $object_to_change["object_type_code"],
                    "object_kind_n"    => (int)$object_to_change["object_kind"]
                ])->orWhere(function($query) use ($object_to_change)
                {
                    $query->where([
                        "db_type_id"       => null,
                        "object_type_code" => $object_to_change["object_type_code"],
                        "object_kind_n"    => (int)$object_to_change["object_kind"]
                    ]);
                })->with([
                    "modelFields",
                    "controllerName.modelLink",
                    "controllerName.models",
//                    "mainController",
                    "dbTypeModelOwner" => function($query)
                    {
                        $query->where("_DbTypeModels.db_type_id", $this->db_area->dBase->db_type_id)
                            ->orWhere("_DbTypeModels.db_type_id", null)->orderBy("_DbTypeModels.db_type_id", "asc")
                            ->get()->first();
                    }
                ])->orderBy("db_type_id", "asc")->get()->first();

                if(!$db_type_model)
                {
                    return $this->getStatus(0, "no settings for this object" . json_encode($object_to_change));
                }

                //                                                return $db_type_controller;

                $model_fields = $db_type_model->modelFields;

                //                        return $controller_fields;

                if($object_to_change["object_key"] != $db_type_model->object_key_field)
                    return $this->getStatus(0, "Неверный object_key_field");

                $controller_fields_array = $model_fields->pluck("field_alias")->toArray();
                //            return $controller_fields_array;

                $object_where_array = [
                    $object_to_change["object_key"] => $object_to_change["object_key_value"]
                ];

                // Array to update current object
                $object_update_array = [];


                if($db_type_model->object_kind_n == 3)
                    return $this->getStatus(0, "object_kind_n === 3" . json_encode($object_to_change));
                elseif($db_type_model->object_kind_n == 2)
                {
                    $owner = $object_to_change["owner"];
                    if($db_type_model->dbTypeModelOwner->object_key_field !== $owner["owner_key"])
                        throw new \Exception("incorrect owner_key" . json_encode($object_to_change));

                    $owner_where_array = [
                        $owner["owner_key"] => $owner["owner_key_value"]
                    ];
                    $controller = \App\Models\Controller::query()
                        ->where("__Controllers.controller_table_n", $db_type_model->dbTypeModelOwner->table_n)->with([
                            "models",
                            "modelLinkParent" => function($query) use ($db_type_model)
                            {
                                $query->where([
                                    "table_n"       => $db_type_model->table_n,
                                    "parent_link_l" => 1
                                ]);
                            }
                        ])->get()->first();


                    if($controller->models->use_db_area_l)
                        $owner_where_array["db_area_id"] = $this->db_area->id;

                    $parent_record = DB::table($controller->models->table_name)->where($owner_where_array)->get()
                        ->first();

                    $parent_table_field_name = $controller->modelLinkParent->table_field_name;

                    if($parent_record)
                        $parent_record_id = $parent_record->id;
                    else
                    {
                        $owner_where_array["created_by"] = $this->db_area->consumer->consumer_code;
                        $owner_where_array["updated_by"] = $this->db_area->consumer->consumer_code;
                        $owner_where_array["created_at"] = $this->current_time;
                        $owner_where_array["updated_at"] = $this->current_time;
                        $parent_record_id = DB::table($controller->models->table_name)->insertGetId($owner_where_array);
                    }

                    $object_update_array[$parent_table_field_name] = $parent_record_id;

                }


                $object_controller_model = $db_type_model->controllerName[0]->models;

                if($object_controller_model->use_db_area_l)
                    $object_where_array["db_area_id"] = $this->db_area->id;

                // Object_to_change model
                if(isset($object_to_change["object_id"]))
                {
                    $temp_where_array = [
                        "id" => $object_to_change["object_id"]
                    ];
                    if($object_controller_model->use_db_area_l)
                        $temp_where_array["db_area_id"] = $this->db_area->id;

                    $object_model = DB::table($object_controller_model->table_name)->where($temp_where_array)->get()
                        ->first();
                    if(!$object_model)
                        return $this->getStatus(0, "Запись с айди " . $object_to_change["object_id"] . " не найдена");

                    $object_where_array[$object_to_change["object_key"]] = $object_to_change["object_key_value"];
                    $object_update_array[$object_to_change["object_key"]] = $object_to_change["object_key_value"];

                }
                else
                {
                    $object_model = DB::table($object_controller_model->table_name)->where($object_where_array)->get()
                        ->first();
                }

                if(!$object_model)
                {
                    $object_model_id = DB::table($object_controller_model->table_name)
                        ->insertGetId($object_where_array);
                    $object_model = DB::table($object_controller_model->table_name)->where("id", $object_model_id)
                        ->get()->first();
                    $object_update_array["created_by"] = $this->db_area->consumer->consumer_code;
                    $object_update_array["updated_by"] = $this->db_area->consumer->consumer_code;
                    $object_update_array["created_at"] = $this->current_time;
                    $object_update_array["updated_at"] = $this->current_time;
                }
                else
                {
                    $object_model_id = $object_model->id;
                    $object_update_array["updated_by"] = $this->db_area->consumer->consumer_code;
                    $object_update_array["updated_at"] = $this->current_time;
                }


                foreach($object_to_change["object_block_fields"] as $object_block_field)
                {
                    //                $field_index = array_search($object_block_field["field_alias"], $controller_fields_array);

                    $current_controller_field = $model_fields->where("field_alias", $object_block_field["field_alias"])
                        ->first();

                    if($current_controller_field)
                    {
                        //                    $current_controller_field = $controller_fields[$field_index];
                        if($current_controller_field->field_alias !== $object_block_field["field_alias"])
                            return $this->getStatus(0, "field_alias");

                        if($current_controller_field->data_type_id == 57)
                        {
                            $stored_file_id = $object_model->stored_file_id;

                            $stored_file_data = $object_block_field["field_values"]["value_current"];

                            $stored_file_data["table_n"] = $db_type_model->controllerName[0]->controller_table_n;
                            $stored_file_data["row_id"] = $object_model_id;

                            $controller_alias = $db_type_model->controllerName[0]->controller_alias;

                            $object_update_array[$current_controller_field->table_field_name] = StoredFileManager::uploadFile([
                                "id"               => $stored_file_id,
                                "storedFile"       => $stored_file_data,
                                "controller_alias" => $controller_alias
                            ]);


                            continue;
                        }

                        if($object_block_field["field_is_link"])
                        {
                            if(!$object_block_field["field_is_link"] == $current_controller_field->field_reference)
                                return $this->getStatus(0, "field_is_link is not equal to the controller_field.field_reference");

                            //                            $link_db_type_controller = DbTypeController::query()
                            //                                ->where([
                            //                                    "db_type_id"       => $this->db_area->dBase->db_type_id,
                            //                                    "object_type_code" => $object_block_field["field_values"]["value_current"]["value_table_code"],
                            //                                ])
                            //                                ->orWhere(function($query) use ($object_block_field)
                            //                                {
                            //                                    $query->where([
                            //                                        "db_type_id"       => null,
                            //                                        "object_type_code" => $object_block_field["field_values"]["value_current"]["value_table_code"],
                            //                                    ]);
                            //                                })
                            //                                ->with(["controllerName.controllerLinkParent" => function($query) use (
                            //                                    $db_type_controller, $current_controller_field
                            //                                )
                            //                                {
                            //                                    $query->where([
                            //                                        "controller_id"    => $db_type_controller->controller_id,
                            //                                        "table_field_name" => $current_controller_field->table_field_name,
                            //                                        "parent_link_l"    => 0
                            //                                    ]);
                            //                                }, "controllerName.models"])
                            //                                ->orderBy("_DbTypeControllers.db_type_id", "asc")
                            //                                ->get()->first();

                            $link_db_type_model = DbTypeModel::query()->where([
                                "db_type_id"       => $this->db_area->dBase->db_type_id,
                                "object_type_code" => $object_block_field["field_values"]["value_current"]["value_table_code"],
                            ])->orWhere(function($query) use ($object_block_field)
                            {
                                $query->where([
                                    "db_type_id"       => null,
                                    "object_type_code" => $object_block_field["field_values"]["value_current"]["value_table_code"],
                                ]);
                            })->with([
                                "controllerName.modelLinkParent" => function($query) use (
                                    $db_type_model, $current_controller_field
                                )
                                {
                                    $query->where([
                                        "table_n"          => $db_type_model->table_n,
                                        "table_field_name" => $current_controller_field->table_field_name,
                                        "parent_link_l"    => 0
                                    ]);
                                },
                                "controllerName.models"
                            ])->orderBy("_DbTypeModels.db_type_id", "asc")->get()->first();
                            //                        return $link_db_type_controller;

                            if($link_db_type_model)
                            {
                                $value_current = $object_block_field["field_values"]["value_current"];
                                $model = $link_db_type_model->controllerName[0]->models;
                                $table_name = $model->table_name;
                                $link = $link_db_type_model->controllerName[0]->modelLinkParent;
                                //                            return $link_db_type_controller;

                                if($link_db_type_model->object_key_field !== $value_current["value_table_key"])
                                    return $this->getStatus(0, "incorrect " . $value_current["value_table_key"]);

                                $link_where_array = [
                                    $value_current["value_table_key"] => $value_current["object_key_value"]
                                ];

                                if($model->use_db_area_l)
                                    $link_where_array["db_area_id"] = $this->db_area->id;

                                $link_record = DB::table($model->table_name)->where($link_where_array)->get()->first();

                                if($link_record)
                                    $link_id = $link_record->id;
                                else
                                {
                                    $link_where_array["created_by"] = $this->db_area->consumer->consumer_code;
                                    $link_where_array["updated_by"] = $this->db_area->consumer->consumer_code;
                                    $link_where_array["created_at"] = $this->current_time;
                                    $link_where_array["updated_at"] = $this->current_time;

                                    $link_record_by_id = DB::table($model->table_name)->where("id", $value_current["value_object_id"])->first();

                                    if($link_record_by_id)
                                    {
                                        $link_id = $value_current["value_object_id"];
                                    }
                                    else
                                    {
                                        $link_id = DB::table($model->table_name)->insertGetId($link_where_array);
                                    }

                                }

                                if($link->table_field_name_composite)
                                {
                                    $object_update_array[$link->table_field_name_composite] = $model->table_n;
                                }
                                $object_update_array[$current_controller_field->table_field_name] = $link_id;
                            }
                        }
                        else
                        {
                            $object_update_array[$current_controller_field->table_field_name] = $object_block_field["field_values"]["value_current"];
                        }
                    }

                }

                $object_colunms = DB::getSchemaBuilder()->getColumnListing($object_controller_model->table_name);

                if(in_array("actual_l", $object_colunms) && !isset($object_update_array['actual_l']))
                    $object_update_array["actual_l"] = true;


                DB::table($object_controller_model->table_name)->where("id", $object_model_id)
                    ->update($object_update_array);

                // TABLE PART
                if(!empty($object_to_change["object_tables_to_change"]))
                {
                    foreach($object_to_change["object_tables_to_change"] as $table_to_change)
                    {
                        $table_db_type_model = DbTypeModel::query()->where([
                            "db_type_id"           => $this->db_area->dBase->db_type_id,
                            "object_type_code"     => $table_to_change["table_type_code"],
                            "object_owner_table_n" => $db_type_model->table_n
                        ])->orWhere(function($query) use ($table_to_change, $db_type_model)
                        {
                            $query->where([
                                "db_type_id"           => null,
                                "object_type_code"     => $table_to_change["table_type_code"],
                                "object_owner_table_n" => $db_type_model->table_n
                            ]);
                        })->with([
                            "modelFields",
                            "controllerName.modelLink.controller.models",
                            "controllerName.models",
                            "controllerName.modelLink.controller.dbTypeModel" => function($query)
                            {
                                $query->where("_DbTypeModels.db_type_id", $this->db_area->dBase->db_type_id)
                                    ->orWhere("_DbTypeModels.db_type_id", null)
                                    ->orderBy("_DbTypeModels.db_type_id", "asc")->get()->first();
                            }
                        ])->orderBy("db_type_id", "asc")->get()->first();

                        //                                        return $table_db_type_controller;

                        $table_controller_model = $table_db_type_model->controllerName[0]->models;

                        $table_fields = $table_db_type_model->modelFields;

                        $table_fields_array = $table_fields->pluck("field_alias")->toArray();

                        $parent_model_link = $table_db_type_model->controllerName[0]->modelLink->where("parent_link_l", 1);

                        if(count($parent_model_link) > 1 && is_null($parent_model_link->first()->table_field_name_composite))
                            return $this->getStatus(0, "2 или более записи в ModelLinks у " . $table_db_type_model->object_type_code);

                        if(is_null($parent_model_link->first()->table_field_name_composite))
                        {
                            $parent_model_link = $parent_model_link->first();
                            $table_where_array = [
                                $parent_model_link->table_field_name => $object_model_id
                            ];
                        }
                        else
                        {
                            $parent_model_link = $parent_model_link->where("table_n_link", $db_type_model->table_n)
                                ->first();
                            $table_where_array = [
                                $parent_model_link->table_field_name           => $object_model_id,
                                $parent_model_link->table_field_name_composite => $object_controller_model->table_n
                            ];
                        }

                        if($table_db_type_model->object_key_field !== $table_to_change["row_key"])
                            return $this->getStatus(0, "incorrect " . $table_to_change["row_key"]);

                        if($table_controller_model->use_db_area_l)
                            $table_where_array["db_area_id"] = $this->db_area->id;

                        // Records from table to change
                        $records = DB::table($table_controller_model->table_name)->where($table_where_array)
                            ->select($table_controller_model->table_name . ".*", DB::raw("true as to_be_deleted"))
                            ->get();

                        $records_count = $records->count();
                        foreach($table_to_change["table_rows"] as $table_row)
                        {
                            if($records->count() > 0)
                            {
                                $record = $records->where($table_db_type_model->object_key_field, $table_row["row_key_value"])
                                    ->first();


                                $row_update_array = [
                                    $parent_model_link->table_field_name   => $object_model_id,
                                    $table_db_type_model->object_key_field => $table_row["row_key_value"]
                                ];

                                if($record)
                                {
                                    // Update current record
                                    $record->to_be_deleted = false;

                                    $row_update_array["updated_by"] = $this->db_area->consumer->consumer_code;
                                    $row_update_array["updated_at"] = $this->current_time;

                                    $this->getUpdateArray($row_update_array, $table_row, $table_db_type_model, $table_fields, $table_fields_array);

                                    DB::table($table_controller_model->table_name)->where([
                                        $parent_model_link->table_field_name   => $object_model_id,
                                        $table_db_type_model->object_key_field => $table_row["row_key_value"]
                                    ])->update($row_update_array);
                                }
                                else
                                {
                                    // Create new record

                                    $row_update_array["created_by"] = $this->db_area->consumer->consumer_code;
                                    $row_update_array["updated_by"] = $this->db_area->consumer->consumer_code;
                                    $row_update_array["created_at"] = $this->current_time;
                                    $row_update_array["updated_at"] = $this->current_time;

                                    if(!is_null($parent_model_link->table_field_name_composite))
                                        $row_update_array[$parent_model_link->table_field_name_composite] = $object_controller_model->table_n;

                                    if($table_controller_model->use_db_area_l)
                                        $row_update_array["db_area_id"] = $this->db_area->id;

                                    $this->getUpdateArray($row_update_array, $table_row, $table_db_type_model, $table_fields, $table_fields_array);

                                    DB::table($table_controller_model->table_name)->insert($row_update_array);
                                }


                            }
                            else
                            {
                                // If no records were found, then we just insert new ones
                                $row_update_array = [
                                    $parent_model_link->table_field_name   => $object_model_id,
                                    $table_db_type_model->object_key_field => $table_row["row_key_value"],
                                    "created_by"                           => $this->db_area->consumer->consumer_code,
                                    "updated_by"                           => $this->db_area->consumer->consumer_code,
                                    "created_at"                           => $this->current_time,
                                    "updated_at"                           => $this->current_time
                                ];

                                if(!is_null($parent_model_link->table_field_name_composite))
                                    $row_update_array[$parent_model_link->table_field_name_composite] = $object_controller_model->table_n;

                                if($table_controller_model->use_db_area_l)
                                    $row_update_array["db_area_id"] = $this->db_area->id;

                                $this->getUpdateArray($row_update_array, $table_row, $table_db_type_model, $table_fields, $table_fields_array);

                                DB::table($table_controller_model->table_name)->insert($row_update_array);
                            }


                        }
                        if($records_count > 0)
                        {

                            $records_to_delete = $records->where("to_be_deleted", true);

                            $ids = $records_to_delete->pluck("id")->toArray();

                            DB::table($table_controller_model->table_name)->whereIn("id", $ids)->delete();
                        }
                    }
                }

                if(!$number)
                {

                    $action_log_array = [
                        "controller_id"         => $db_type_model->controllerName[0]->id,
                        "row_id"                => $object_model_id,
                        "consumer_id"           => $this->db_area->consumer->id,
                        "action_log_error_l"    => false,
                        "action_log_error_code" => null,
                        "action_log_message"    => "",
                        "count"                 => 1,
                        "spent_time"            => round(microtime(true) - $this->timer, 3)
                    ];

                }

                //+++ ЗубановИА
                $spent_time = [
                    "signal_number"             => $object_to_change["signal_number"] ?? null,
                    "spent_time_site"           => isset($action_log_array) ? $action_log_array["spent_time"] : null,
                    "signal_status"             => 1, // если ошибка в обработке объекта то сюда пишем 0
                    "signal_status_description" => "updated", // если ошибка сюда описание ошибки
                ];
                //--- ЗубановИА


                // После записи объекта вызываем событие
//                $controller_code = $db_type_model->mainController->controller_code;

//                $controller = new $controller_code();
            }
            catch(\Exception $exception)
            {
                if(!$number)
                {

                    $action_log_array = [
                        "controller_id"         => $db_type_model->controllerName[0]->id,
                        "row_id"                => $object_model_id ?? null,
                        "consumer_id"           => $this->db_area->consumer->id,
                        "action_log_error_l"    => true,
                        "action_log_error_code" => $exception->getCode(),
                        "action_log_message"    => $exception->getMessage(),
                        "count"                 => 1,
                        "spent_time"            => round(microtime(true) - $this->timer, 3)
                    ];
                }

                $spent_time = [
                    "signal_number"             => $object_to_change["signal_number"] ?? null,
                    "spent_time_site"           => isset($action_log_array) ? $action_log_array["spent_time"] : null,
                    "signal_status"             => 0,
                    // если ошибка в обработке объекта то сюда пишем 0
                    "signal_status_description" => $exception->getMessage() . ". Line: " . $exception->getLine(),
                    // если ошибка сюда описание ошибки
                ];
            }

            if(!$number)
            {
                $action_type = ActionType::query()->where("action_type_code", "ExchangeIn")->select("id")->get()
                    ->first();

                $action_log_array["action_type_id"] = $action_type->id;


                $action_log = ActionLog::query()->create($action_log_array);

                $spent_time["log_id"] = $action_log->id ?? null;
            }

            array_push($spent_time_array, $spent_time);


        }


        return $this->getStatus(1, "updated", $spent_time_array ?? null);
    }


    //    public function requestForDataChanges_old($request_object)
    //    {
    //        $request_parameters = $request_object["request"]["request_parameters"];
    //
    //        $number = $request_parameters["number"] ?? null;
    //        $status = $request_parameters["status"] ?? null;
    //
    //
    //        if($number && in_array($status, [0, 1]))
    //        {
    //            $change_request = ChangeRequest::query()
    //                ->where("id", (int)$number)
    //                ->get()->first();
    //
    //            $change_request->status = (int)$status;
    //            $change_request->comment = $request_parameters["comment"];
    //
    //            $change_request->save();
    //
    //            return $this->getStatus(1, "Заявка принята");
    //
    //        }
    //
    //        //+++ ЗубановИА 29082019
    //        $spent_time_array = [];
    //        //--- ЗубановИА 29082019
    //        foreach($request_parameters["objects_to_change"] as $object_to_change)
    //        {
    //            try
    //            {
    //
    //                $this->timer = microtime(true);
    //
    //                if(!isset($object_to_change["object_type_code"]) || empty($object_to_change["object_type_code"]))
    //                    return $this->getStatus(0, "Empty object_type_code objects_to_change");
    //
    //                $db_type_controller = DbTypeController::query()
    //                    ->where([
    //                        "db_type_id"       => $this->db_area->dBase->db_type_id,
    //                        "object_type_code" => $object_to_change["object_type_code"],
    //                        "object_kind_n"    => (int)$object_to_change["object_kind"]
    //                    ])
    //                    ->orWhere(function($query) use ($object_to_change)
    //                    {
    //                        $query->where([
    //                            "db_type_id"       => null,
    //                            "object_type_code" => $object_to_change["object_type_code"],
    //                            "object_kind_n"    => (int)$object_to_change["object_kind"]
    //                        ]);
    //                    })
    //                    ->with([
    //                        "controllerFields", "controllerName.controllerLink", "controllerName.models",
    //                        "dbTypeControllerOwner" => function($query)
    //                        {
    //                            $query->where("_DbTypeControllers.db_type_id", $this->db_area->dBase->db_type_id)
    //                                ->orWhere("_DbTypeControllers.db_type_id", null)
    //                                ->orderBy("_DbTypeControllers.db_type_id", "asc")
    //                                ->get()->first();
    //                        }])
    //                    ->orderBy("db_type_id", "asc")
    //                    ->get()->first();
    //
    //
    //                if(!$db_type_controller)
    //                {
    //                    return $this->getStatus(0, "no settings for this object" . json_encode($object_to_change));
    //                }
    //
    //                //                                                return $db_type_controller;
    //
    //                $controller_fields = $db_type_controller->controllerFields;
    //
    //                //                        return $controller_fields;
    //
    //                if($object_to_change["object_key"] != $db_type_controller->object_key_field)
    //                    return $this->getStatus(0, "Неверный object_key_field");
    //
    //                $controller_fields_array = $controller_fields->pluck("field_alias")->toArray();
    //                //            return $controller_fields_array;
    //
    //                $object_where_array = [
    //                    $object_to_change["object_key"] => $object_to_change["object_key_value"]
    //                ];
    //
    //                // Array to update current object
    //                $object_update_array = [];
    //
    //
    //                if($db_type_controller->object_kind_n == 3)
    //                    return $this->getStatus(0, "object_kind_n === 3" . json_encode($object_to_change));
    //                elseif($db_type_controller->object_kind_n == 2)
    //                {
    //                    $owner = $object_to_change["owner"];
    //                    if($db_type_controller->dbTypeControllerOwner->object_key_field !== $owner["owner_key"])
    //                        throw new \Exception("incorrect owner_key" . json_encode($object_to_change));
    //
    //                    $owner_where_array = [
    //                        $owner["owner_key"] => $owner["owner_key_value"]
    //                    ];
    //                    $controller = \App\Models\Controller::query()
    //                        ->where("id", $db_type_controller->dbTypeControllerOwner->controller_id)
    //                        ->with(["models", "controllerLinkParent" => function($query) use ($db_type_controller)
    //                        {
    //                            $query->where([
    //                                "controller_id" => $db_type_controller->controller_id,
    //                                "parent_link_l" => 1
    //                            ]);
    //                        }])
    //                        ->get()->first();
    //
    //
    //                    if($controller->models->use_db_area_l)
    //                        $owner_where_array["db_area_id"] = $this->db_area->id;
    //
    //                    $parent_record = DB::table($controller->models->table_name)->where($owner_where_array)
    //                        ->get()->first();
    //
    //                    $parent_table_field_name = $controller->controllerLinkParent->table_field_name;
    //
    //                    if($parent_record)
    //                        $parent_record_id = $parent_record->id;
    //                    else
    //                    {
    //                        $owner_where_array["created_by"] = $this->db_area->consumer->consumer_code;
    //                        $owner_where_array["updated_by"] = $this->db_area->consumer->consumer_code;
    //                        $owner_where_array["created_at"] = $this->current_time;
    //                        $owner_where_array["updated_at"] = $this->current_time;
    //                        $parent_record_id = DB::table($controller->models->table_name)->insertGetId($owner_where_array);
    //                    }
    //
    //                    $object_update_array[$parent_table_field_name] = $parent_record_id;
    //
    //                }
    //
    //
    //                $object_controller_model = $db_type_controller->controllerName[0]->models;
    //
    //                if($object_controller_model->use_db_area_l)
    //                    $object_where_array["db_area_id"] = $this->db_area->id;
    //
    //                // Object_to_change model
    //                if(isset($object_to_change["object_id"]))
    //                {
    //                    $temp_where_array = [
    //                        "id" => $object_to_change["object_id"]
    //                    ];
    //                    if($object_controller_model->use_db_area_l)
    //                        $temp_where_array["db_area_id"] = $this->db_area->id;
    //
    //                    $object_model = DB::table($object_controller_model->table_name)
    //                        ->where($temp_where_array)->get()->first();
    //                    if(!$object_model)
    //                        return $this->getStatus(0, "Запись с айди " . $object_to_change["object_id"] . " не найдена");
    //
    //                    $object_where_array[$object_to_change["object_key"]] = $object_to_change["object_key_value"];
    //                    $object_update_array[$object_to_change["object_key"]] = $object_to_change["object_key_value"];
    //
    //                }
    //                else
    //                {
    //                    $object_model = DB::table($object_controller_model->table_name)
    //                        ->where($object_where_array)->get()->first();
    //                }
    //
    //                if(!$object_model)
    //                {
    //                    $object_model_id = DB::table($object_controller_model->table_name)
    //                        ->insertGetId($object_where_array);
    //                    $object_model = DB::table($object_controller_model->table_name)
    //                        ->where("id", $object_model_id)->get()->first();
    //                    $object_update_array["created_by"] = $this->db_area->consumer->consumer_code;
    //                    $object_update_array["updated_by"] = $this->db_area->consumer->consumer_code;
    //                    $object_update_array["created_at"] = $this->current_time;
    //                    $object_update_array["updated_at"] = $this->current_time;
    //                }
    //                else
    //                {
    //                    $object_model_id = $object_model->id;
    //                    $object_update_array["updated_by"] = $this->db_area->consumer->consumer_code;
    //                    $object_update_array["updated_at"] = $this->current_time;
    //                }
    //
    //
    //                foreach($object_to_change["object_block_fields"] as $object_block_field)
    //                {
    //                    //                $field_index = array_search($object_block_field["field_alias"], $controller_fields_array);
    //
    //                    $current_controller_field = $controller_fields->where("field_alias",
    //                        $object_block_field["field_alias"])
    //                        ->first();
    //
    //                    if($current_controller_field)
    //                    {
    //                        //                    $current_controller_field = $controller_fields[$field_index];
    //                        if($current_controller_field->field_alias !== $object_block_field["field_alias"])
    //                            return $this->getStatus(0, "field_alias");
    //
    //                        if($current_controller_field->data_type_id == 57)
    //                        {
    //                            $stored_file_id = $object_model->stored_file_id;
    //
    //                            $stored_file_data = $object_block_field["field_values"]["value_current"];
    //
    //                            $stored_file_data["table_n"] = $db_type_controller->controllerName[0]->controller_table_n;
    //                            $stored_file_data["row_id"] = $object_model_id;
    //
    //                            $controller_alias = $db_type_controller->controllerName[0]->controller_alias;
    //
    //                            $object_update_array[$current_controller_field->table_field_name] = StoredFileManager::uploadFile([
    //                                "id"               => $stored_file_id,
    //                                "storedFile"       => $stored_file_data,
    //                                "controller_alias" => $controller_alias
    //                            ]);
    //
    //
    //                            continue;
    //                        }
    //
    //                        if($object_block_field["field_is_link"])
    //                        {
    //                            if(!$object_block_field["field_is_link"] == $current_controller_field->field_reference)
    //                                return $this->getStatus(0,
    //                                    "field_is_link is not equal to the controller_field.field_reference");
    //
    //                            $link_db_type_controller = DbTypeController::query()
    //                                ->where([
    //                                    "db_type_id"       => $this->db_area->dBase->db_type_id,
    //                                    "object_type_code" => $object_block_field["field_values"]["value_current"]["value_table_code"],
    //                                ])
    //                                ->orWhere(function($query) use ($object_block_field)
    //                                {
    //                                    $query->where([
    //                                        "db_type_id"       => null,
    //                                        "object_type_code" => $object_block_field["field_values"]["value_current"]["value_table_code"],
    //                                    ]);
    //                                })
    //                                ->with(["controllerName.controllerLinkParent" => function($query) use (
    //                                    $db_type_controller, $current_controller_field
    //                                )
    //                                {
    //                                    $query->where([
    //                                        "controller_id"    => $db_type_controller->controller_id,
    //                                        "table_field_name" => $current_controller_field->table_field_name,
    //                                        "parent_link_l"    => 0
    //                                    ]);
    //                                }, "controllerName.models"])
    //                                ->orderBy("_DbTypeControllers.db_type_id", "asc")
    //                                ->get()->first();
    //                            //                        return $link_db_type_controller;
    //
    //                            if($link_db_type_controller)
    //                            {
    //                                $value_current = $object_block_field["field_values"]["value_current"];
    //                                $model = $link_db_type_controller->controllerName[0]->models;
    //                                $table_name = $model->table_name;
    //                                $link = $link_db_type_controller->controllerName[0]->controllerLinkParent;
    //                                //                            return $link_db_type_controller;
    //
    //                                if($link_db_type_controller->object_key_field !== $value_current["value_table_key"])
    //                                    return $this->getStatus(0, "incorrect " . $value_current["value_table_key"]);
    //
    //                                $link_where_array = [
    //                                    $value_current["value_table_key"] => $value_current["object_key_value"]
    //                                ];
    //
    //                                if($model->use_db_area_l)
    //                                    $link_where_array["db_area_id"] = $this->db_area->id;
    //
    //                                $link_record = DB::table($model->table_name)->where($link_where_array)->get()->first();
    //
    //                                if($link_record)
    //                                    $link_id = $link_record->id;
    //                                else
    //                                {
    //                                    $link_where_array["created_by"] = $this->db_area->consumer->consumer_code;
    //                                    $link_where_array["updated_by"] = $this->db_area->consumer->consumer_code;
    //                                    $link_where_array["created_at"] = $this->current_time;
    //                                    $link_where_array["updated_at"] = $this->current_time;
    //                                    $link_id = DB::table($model->table_name)->insertGetId($link_where_array);
    //                                }
    //
    //                                if($link->table_field_name_composite)
    //                                {
    //                                    $object_update_array[$link->table_field_name_composite] = $model->table_n;
    //                                }
    //                                $object_update_array[$current_controller_field->table_field_name] = $link_id;
    //                            }
    //                        }
    //                        else
    //                        {
    //                            $object_update_array[$current_controller_field->table_field_name] = $object_block_field["field_values"]["value_current"];
    //                        }
    //                    }
    //
    //                }
    //
    //                $object_colunms = DB::getSchemaBuilder()->getColumnListing($object_controller_model->table_name);
    //
    //                if(in_array("actual_l", $object_colunms) && !isset($object_update_array['actual_l']))
    //                    $object_update_array["actual_l"] = true;
    //
    //
    //                DB::table($object_controller_model->table_name)
    //                    ->where("id", $object_model_id)->update($object_update_array);
    //
    //                // TABLE PART
    //                if(!empty($object_to_change["object_tables_to_change"]))
    //                {
    //                    foreach($object_to_change["object_tables_to_change"] as $table_to_change)
    //                    {
    //
    //
    //                        $table_db_type_controller = DbTypeController::query()
    //                            ->where([
    //                                "db_type_id"       => $this->db_area->dBase->db_type_id,
    //                                "object_type_code" => $table_to_change["table_type_code"],
    //                                "object_owner_id"  => $db_type_controller->controller_id
    //                            ])
    //                            ->orWhere(function($query) use ($table_to_change, $db_type_controller)
    //                            {
    //                                $query->where([
    //                                    "db_type_id"       => null,
    //                                    "object_type_code" => $table_to_change["table_type_code"],
    //                                    "object_owner_id"  => $db_type_controller->controller_id
    //                                ]);
    //                            })
    //                            ->with([
    //                                "controllerFields", "controllerName.controllerLink.controller.models",
    //                                "controllerName.models",
    //                                "controllerName.controllerLink.controller.dbTypeController" => function($query)
    //                                {
    //                                    $query->where("_DbTypeControllers.db_type_id", $this->db_area->dBase->db_type_id)
    //                                        ->orWhere("_DbTypeControllers.db_type_id", null)
    //                                        ->orderBy("_DbTypeControllers.db_type_id", "asc")
    //                                        ->get()->first();
    //                                }])
    //                            ->orderBy("db_type_id", "asc")
    //                            ->get()->first();
    //
    //                        //                                        return $table_db_type_controller;
    //
    //                        $table_controller_model = $table_db_type_controller->controllerName[0]->models;
    //
    //                        $table_fields = $table_db_type_controller->controllerFields;
    //
    //                        $table_fields_array = $table_fields->pluck("field_alias")->toArray();
    //
    //                        $parent_controller_link = $table_db_type_controller->controllerName[0]
    //                            ->controllerLink->where("parent_link_l", 1);
    //
    //                        if(count($parent_controller_link) > 1 && is_null($parent_controller_link->first()->table_field_name_composite))
    //                            return $this->getStatus(0,
    //                                "2 или более записи в ControllerLinks у " . $table_db_type_controller->object_type_code);
    //
    //                        if(is_null($parent_controller_link->first()->table_field_name_composite))
    //                        {
    //                            $parent_controller_link = $parent_controller_link->first();
    //                            $table_where_array = [
    //                                $parent_controller_link->table_field_name => $object_model_id
    //                            ];
    //                        }
    //                        else
    //                        {
    //                            $parent_controller_link = $parent_controller_link->where("controller_id_link",
    //                                $db_type_controller->controller_id)->first();
    //                            $table_where_array = [
    //                                $parent_controller_link->table_field_name           => $object_model_id,
    //                                $parent_controller_link->table_field_name_composite => $object_controller_model->table_n
    //                            ];
    //                        }
    //
    //                        if($table_db_type_controller->object_key_field !== $table_to_change["row_key"])
    //                            return $this->getStatus(0, "incorrect " . $table_to_change["row_key"]);
    //
    //                        if($table_controller_model->use_db_area_l)
    //                            $table_where_array["db_area_id"] = $this->db_area->id;
    //
    //                        // Records from table to change
    //                        $records = DB::table($table_controller_model->table_name)
    //                            ->where($table_where_array)
    //                            ->select($table_controller_model->table_name . ".*", DB::raw("true as to_be_deleted"))
    //                            ->get();
    //
    //                        $records_count = $records->count();
    //                        foreach($table_to_change["table_rows"] as $table_row)
    //                        {
    //                            if($records->count() > 0)
    //                            {
    //                                $record = $records->where($table_db_type_controller->object_key_field,
    //                                    $table_row["row_key_value"])->first();
    //
    //
    //                                $row_update_array = [
    //                                    $parent_controller_link->table_field_name   => $object_model_id,
    //                                    $table_db_type_controller->object_key_field => $table_row["row_key_value"]
    //                                ];
    //
    //                                if($record)
    //                                {
    //                                    // Update current record
    //                                    $record->to_be_deleted = false;
    //
    //                                    $row_update_array["updated_by"] = $this->db_area->consumer->consumer_code;
    //                                    $row_update_array["updated_at"] = $this->current_time;
    //
    //                                    $this->getUpdateArray($row_update_array, $table_row, $table_db_type_controller,
    //                                        $table_fields, $table_fields_array);
    //
    //                                    DB::table($table_controller_model->table_name)
    //                                        ->where([
    //                                            $parent_controller_link->table_field_name   => $object_model_id,
    //                                            $table_db_type_controller->object_key_field => $table_row["row_key_value"]
    //                                        ])
    //                                        ->update($row_update_array);
    //                                }
    //                                else
    //                                {
    //                                    // Create new record
    //
    //                                    $row_update_array["created_by"] = $this->db_area->consumer->consumer_code;
    //                                    $row_update_array["updated_by"] = $this->db_area->consumer->consumer_code;
    //                                    $row_update_array["created_at"] = $this->current_time;
    //                                    $row_update_array["updated_at"] = $this->current_time;
    //
    //                                    if(!is_null($parent_controller_link->table_field_name_composite))
    //                                        $row_update_array[$parent_controller_link->table_field_name_composite] = $object_controller_model->table_n;
    //
    //                                    if($table_controller_model->use_db_area_l)
    //                                        $row_update_array["db_area_id"] = $this->db_area->id;
    //
    //                                    $this->getUpdateArray($row_update_array, $table_row, $table_db_type_controller,
    //                                        $table_fields, $table_fields_array);
    //
    //                                    DB::table($table_controller_model->table_name)
    //                                        ->insert($row_update_array);
    //                                }
    //
    //
    //                            }
    //                            else
    //                            {
    //                                // If no records were found, then we just insert new ones
    //                                $row_update_array = [
    //                                    $parent_controller_link->table_field_name   => $object_model_id,
    //                                    $table_db_type_controller->object_key_field => $table_row["row_key_value"],
    //                                    "created_by"                                => $this->db_area->consumer->consumer_code,
    //                                    "updated_by"                                => $this->db_area->consumer->consumer_code,
    //                                    "created_at"                                => $this->current_time,
    //                                    "updated_at"                                => $this->current_time
    //                                ];
    //
    //                                if(!is_null($parent_controller_link->table_field_name_composite))
    //                                    $row_update_array[$parent_controller_link->table_field_name_composite] = $object_controller_model->table_n;
    //
    //                                if($table_controller_model->use_db_area_l)
    //                                    $row_update_array["db_area_id"] = $this->db_area->id;
    //
    //                                $this->getUpdateArray($row_update_array, $table_row, $table_db_type_controller,
    //                                    $table_fields, $table_fields_array);
    //
    //                                DB::table($table_controller_model->table_name)
    //                                    ->insert($row_update_array);
    //                            }
    //
    //
    //                        }
    //                        if($records_count > 0)
    //                        {
    //
    //                            $records_to_delete = $records->where("to_be_deleted", true);
    //
    //                            $ids = $records_to_delete->pluck("id")->toArray();
    //
    //                            DB::table($table_controller_model->table_name)
    //                                ->whereIn("id", $ids)->delete();
    //                        }
    //                    }
    //                }
    //
    //                if(!$number)
    //                {
    //
    //                    $action_log_array = [
    //                        "controller_id"         => $db_type_controller->controller_id,
    //                        "row_id"                => $object_model_id,
    //                        "consumer_id"           => $this->db_area->consumer->id,
    //                        "action_log_error_l"    => false,
    //                        "action_log_error_code" => null,
    //                        "action_log_message"    => "",
    //                        "count"                 => 1,
    //                        "spent_time"            => round(microtime(true) - $this->timer, 3)
    //                    ];
    //
    //                }
    //
    //                //+++ ЗубановИА
    //                $spent_time = [
    //                    "signal_number"             => $object_to_change["signal_number"] ?? null,
    //                    "spent_time_site"           => isset($action_log_array) ? $action_log_array["spent_time"] : null,
    //                    "signal_status"             => 1, // если ошибка в обработке объекта то сюда пишем 0
    //                    "signal_status_description" => "updated", // если ошибка сюда описание ошибки
    //                ];
    //                //--- ЗубановИА
    //            }
    //            catch(\Exception $exception)
    //            {
    //                if(!$number)
    //                {
    //
    //                    $action_log_array = [
    //                        "controller_id"         => $db_type_controller->controller_id,
    //                        "row_id"                => $object_model_id ?? null,
    //                        "consumer_id"           => $this->db_area->consumer->id,
    //                        "action_log_error_l"    => true,
    //                        "action_log_error_code" => $exception->getCode(),
    //                        "action_log_message"    => $exception->getMessage(),
    //                        "count"                 => 1,
    //                        "spent_time"            => round(microtime(true) - $this->timer, 3)
    //                    ];
    //                }
    //
    //                $spent_time = [
    //                    "signal_number"             => $object_to_change["signal_number"] ?? null,
    //                    "spent_time_site"           => isset($action_log_array) ? $action_log_array["spent_time"] : null,
    //                    "signal_status"             => 0, // если ошибка в обработке объекта то сюда пишем 0
    //                    "signal_status_description" => $exception->getMessage() . ". Line: " . $exception->getLine(), // если ошибка сюда описание ошибки
    //                ];
    //            }
    //
    //            if(!$number)
    //            {
    //                $action_type = ActionType::query()
    //                    ->where("action_type_code", "ExchangeIn")
    //                    ->select("id")->get()->first();
    //
    //                $action_log_array["action_type_id"] = $action_type->id;
    //
    //
    //                $action_log = ActionLog::query()->create($action_log_array);
    //
    //                $spent_time["log_id"] = $action_log->id ?? null;
    //            }
    //
    //            array_push($spent_time_array, $spent_time);
    //
    //        }
    //
    //        return $this->getStatus(1, "updated", $spent_time_array ?? null);
    //    }

    public function changesSchedulePayment($request_object)
    {

        /**
         * Get all ContractorContract
         */
        $dbAreaId = DbArea::where('db_area_code', $request_object['request']['db_area_code'])->with('consumer')->first()
            ->toArray();
        $GetAllContractorContract = ContractorContract::where('db_area_id', $dbAreaId['id'])->pluck('uid_1c_code', 'id')
            ->toArray();

        /**
         * END Get all ContractorContract
         */


        /**
         * Get all BlScheduleArticle
         */

        $GetAllSchedArticles = BlScheduleArticle::where('db_area_id', $dbAreaId['id'])->pluck('uid_1c_code', 'id')
            ->toArray();

        /**
         * END Get all BlScheduleArticle
         */


        /**
         * Get all BlScheduleArticle
         */

        $GetAllContractSpecific = BlLeasingContractSpecification::where('db_area_id', $dbAreaId['id'])
            ->pluck('uid_1c_code', 'id')->toArray();

        /**
         * END Get all BlScheduleArticle
         */

        $requestParameters = $request_object['request']['request_parameters'];

        BlLeasingSchedulePaymentsExchange::truncate();
        BlLeasingSchedulePaymentsExchange::insert($requestParameters);

        $ContractorContractSchedPaymentExchange = BlLeasingSchedulePaymentsExchange::where('contractor_contract_code', '!=', null)
            ->groupBy('contractor_contract_code')->pluck('contractor_contract_code')->toArray();
        $ScheduleArticleSchedPaymExchange = BlLeasingSchedulePaymentsExchange::where('bl_schedule_article_code', '!=', null)
            ->groupBy('bl_schedule_article_code')->pluck('bl_schedule_article_code')->toArray();
        $ContractSpecificSchedPaymExchange = BlLeasingSchedulePaymentsExchange::where('bl_leasing_contract_specification_code', '!=', null)
            ->groupBy('bl_leasing_contract_specification_code')->pluck('bl_leasing_contract_specification_code')
            ->toArray();

        $diffContractorContract = array_diff($ContractorContractSchedPaymentExchange, $GetAllContractorContract);

        $diffScheduleArticle = array_diff($ScheduleArticleSchedPaymExchange, $GetAllSchedArticles);
        $diffContractSpecific = array_diff($ContractSpecificSchedPaymExchange, $GetAllContractSpecific);


        $diffContractorContractIsset = array_intersect($GetAllContractorContract, $ContractorContractSchedPaymentExchange);
        $diffScheduleArticleIsset = array_intersect($GetAllSchedArticles, $ScheduleArticleSchedPaymExchange);
        $diffContractSpecificIsset = array_intersect($GetAllContractSpecific, $ContractSpecificSchedPaymExchange);


        switch([
            $diffContractorContract,
            $diffScheduleArticle,
            $diffContractSpecific,
            $diffContractorContractIsset,
            $diffScheduleArticleIsset,
            $diffContractSpecificIsset
        ])
        {
            case !empty($diffContractorContract):

                $dataContractorContract = [];
                foreach($diffContractorContract as $contract)
                {
                    $dataContractorContract[] = [
                        'uid_1c_code' => $contract,
                        'db_area_id'  => $dbAreaId['id'],
                        'created_by'  => $dbAreaId['consumer']['consumer_code'],
                        'updated_by'  => $dbAreaId['consumer']['consumer_code'],
                        'created_at'  => (\Carbon\Carbon::now())->toDateTimeString(),
                        'updated_at'  => (\Carbon\Carbon::now())->toDateTimeString(),
                    ];
                }
                ContractorContract::insert($dataContractorContract);

                foreach($diffContractorContractIsset as $interKey => $interValue)
                {
                    BlLeasingSchedulePaymentsExchange::where('contractor_contract_code', $interValue)->update([
                        'contractor_contract_id' => $interKey,
                        'created_by'             => $dbAreaId['consumer']['consumer_code'],
                        'updated_by'             => $dbAreaId['consumer']['consumer_code'],
                        'created_at'             => (\Carbon\Carbon::now())->toDateTimeString(),
                        'updated_at'             => (\Carbon\Carbon::now())->toDateTimeString(),
                    ]);
                }

                $idNullContracts = BlLeasingSchedulePaymentsExchange::where('contractor_contract_id', NULL)
                    ->where('contractor_contract_code', '!=', NULL)->pluck('contractor_contract_code', 'id')->toArray();
                foreach($idNullContracts as $idNullKey => $idNullValue)
                {
                    $idContracts = ContractorContract::where('uid_1c_code', $idNullValue)->select('id')->first()
                        ->toArray();

                    BlLeasingSchedulePaymentsExchange::where('id', $idNullKey)->update([
                        'contractor_contract_id' => $idContracts['id'],
                        'created_by'             => $dbAreaId['consumer']['consumer_code'],
                        'updated_by'             => $dbAreaId['consumer']['consumer_code'],
                        'created_at'             => (\Carbon\Carbon::now())->toDateTimeString(),
                        'updated_at'             => (\Carbon\Carbon::now())->toDateTimeString(),
                    ]);
                }

            case !empty($diffContractorContractIsset):

                foreach($diffContractorContractIsset as $interKey => $interValue)
                {
                    BlLeasingSchedulePaymentsExchange::where('contractor_contract_code', $interValue)->update([
                        'contractor_contract_id' => $interKey,
                        'created_by'             => $dbAreaId['consumer']['consumer_code'],
                        'updated_by'             => $dbAreaId['consumer']['consumer_code'],
                        'created_at'             => (\Carbon\Carbon::now())->toDateTimeString(),
                        'updated_at'             => (\Carbon\Carbon::now())->toDateTimeString(),
                    ]);
                }

            case !empty($diffScheduleArticle):

                $dataScheduleArticle = [];
                foreach($diffScheduleArticle as $scheduleArticle)
                {
                    $dataScheduleArticle[] = [
                        'uid_1c_code' => $scheduleArticle,
                        'db_area_id'  => $dbAreaId['id'],
                        'created_by'  => $dbAreaId['consumer']['consumer_code'],
                        'updated_by'  => $dbAreaId['consumer']['consumer_code'],
                        'created_at'  => (\Carbon\Carbon::now())->toDateTimeString(),
                        'updated_at'  => (\Carbon\Carbon::now())->toDateTimeString(),
                    ];
                }
                BlScheduleArticle::insert($dataScheduleArticle);

                foreach($diffScheduleArticleIsset as $interSchArtKey => $interSchArtValue)
                {
                    BlLeasingSchedulePaymentsExchange::where('bl_schedule_article_code', $interSchArtValue)->update([
                        'bl_schedule_article_id' => $interSchArtKey,
                    ]);
                }

                $idNullScheduleArticle = BlLeasingSchedulePaymentsExchange::where('bl_schedule_article_id', NULL)
                    ->where('bl_schedule_article_code', '!=', NULL)->pluck('bl_schedule_article_code', 'id')->toArray();
                foreach($idNullScheduleArticle as $idNullSchArtKey => $idNullSchArtValue)
                {
                    $idScheduleArticle = BlScheduleArticle::where('uid_1c_code', $idNullSchArtValue)->select('id')
                        ->first()->toArray();

                    BlLeasingSchedulePaymentsExchange::where('id', $idNullSchArtKey)->update([
                        'bl_schedule_article_id' => $idScheduleArticle['id'],
                        'created_by'             => $dbAreaId['consumer']['consumer_code'],
                        'updated_by'             => $dbAreaId['consumer']['consumer_code'],
                        'created_at'             => (\Carbon\Carbon::now())->toDateTimeString(),
                        'updated_at'             => (\Carbon\Carbon::now())->toDateTimeString(),
                    ]);
                }

            case !empty($diffScheduleArticleIsset):

                foreach($diffScheduleArticleIsset as $interSchArtKey => $interSchArtValue)
                {
                    BlLeasingSchedulePaymentsExchange::where('bl_schedule_article_code', $interSchArtValue)->update([
                        'bl_schedule_article_id' => $interSchArtKey,
                    ]);
                }

            case !empty($diffContractSpecific):

                $dataContractSpecific = [];
                foreach($diffContractSpecific as $contractSpecific)
                {
                    $dataContractSpecific[] = [
                        'uid_1c_code' => $contractSpecific,
                        'db_area_id'  => $dbAreaId['id'],
                        'created_by'  => $dbAreaId['consumer']['consumer_code'],
                        'updated_by'  => $dbAreaId['consumer']['consumer_code'],
                        'created_at'  => (\Carbon\Carbon::now())->toDateTimeString(),
                        'updated_at'  => (\Carbon\Carbon::now())->toDateTimeString(),
                    ];
                }
                BlLeasingContractSpecification::insert($dataContractSpecific);

                foreach($diffScheduleArticleIsset as $interSchArtKey => $interSchArtValue)
                {
                    BlLeasingSchedulePaymentsExchange::where('bl_leasing_contract_specification_code', $interSchArtValue)
                        ->update([
                            'bl_leasing_contract_specification_id' => $interSchArtKey,
                        ]);
                }

                $idNullContractSpec = BlLeasingSchedulePaymentsExchange::where('bl_leasing_contract_specification_id', NULL)
                    ->where('bl_leasing_contract_specification_code', '!=', NULL)
                    ->pluck('bl_leasing_contract_specification_code', 'id')->toArray();
                foreach($idNullContractSpec as $idNullContractSpecKey => $idNullContractSpecValue)
                {
                    $idContractSpec = BlLeasingContractSpecification::where('uid_1c_code', $idNullContractSpecValue)
                        ->select('id')->first()->toArray();

                    BlLeasingSchedulePaymentsExchange::where('id', $idNullContractSpecKey)->update([
                        'bl_leasing_contract_specification_id' => $idContractSpec['id'],
                        'created_by'                           => $dbAreaId['consumer']['consumer_code'],
                        'updated_by'                           => $dbAreaId['consumer']['consumer_code'],
                        'created_at'                           => (\Carbon\Carbon::now())->toDateTimeString(),
                        'updated_at'                           => (\Carbon\Carbon::now())->toDateTimeString(),
                    ]);
                }

            case !empty($diffContractSpecificIsset):

                foreach($diffContractSpecificIsset as $interContractSpecKey => $interContractSpecValue)
                {
                    BlLeasingSchedulePaymentsExchange::where('bl_leasing_contract_specification_code', $interContractSpecValue)
                        ->update([
                            'bl_leasing_contract_specification_id' => $interContractSpecKey,
                        ]);
                }
        }

        BlLeasingSchedulePayments::truncate();

        $getNotificationsExchanges = BlLeasingSchedulePaymentsExchange::select('contractor_contract_id', 'bl_schedule_article_id', 'bl_leasing_contract_specification_id', 'bl_leasing_schedule_payment_date', 'bl_leasing_schedule_payment_plan', 'bl_leasing_schedule_payment_fact', 'created_by', 'updated_by', 'created_at', 'updated_at')
            ->get()->toArray();

        BlLeasingSchedulePayments::insert($getNotificationsExchanges);
        BlLeasingSchedulePaymentsExchange::truncate();

        return 1;
    }

    public function changesNotification($request_object)
    {

        /**
         * Get all ContractorContract
         */
        $dbAreaId = DbArea::where('db_area_code', $request_object['request']['db_area_code'])->with('consumer')->first()
            ->toArray();
        $GetAllContractorContract = ContractorContract::where('db_area_id', $dbAreaId['id'])->pluck('uid_1c_code')
            ->toArray();

        /**
         * END Get all ContractorContract
         */

        /**
         * Get all Contractor
         */
        $GetAllContractor = Contractor::where('db_area_id', $dbAreaId['id'])->pluck('uid_1c_code')->toArray();

        /**
         * END Get all Contractor
         */

        $requestParameters = $request_object['request']['request_parameters'];

        NotificationsExchange::truncate();
        NotificationsExchange::insert($requestParameters);

        $ContractorContractNotificationsExchange = NotificationsExchange::where('contractor_contract_code', '!=', null)
            ->pluck('contractor_contract_code')->toArray();
        $ContractorsNotificationsExchange = NotificationsExchange::where('contractor_code', '!=', null)
            ->pluck('contractor_code')->toArray();


        $diffContractorContract = array_diff($ContractorContractNotificationsExchange, $GetAllContractorContract);
        $diffContractor = array_diff($ContractorsNotificationsExchange, $GetAllContractor);

        switch([$diffContractorContract, $diffContractor])
        {
            case !empty($diffContractorContract):
            {
                $dataContractorContract = [];
                foreach($diffContractorContract as $contract)
                {
                    $dataContractorContract[] = [
                        'uid_1c_code' => $contract,
                        'db_area_id'  => $dbAreaId['id'],
                        'created_by'  => $dbAreaId['consumer']['consumer_code'],
                        'updated_by'  => $dbAreaId['consumer']['consumer_code'],
                        'created_at'  => (\Carbon\Carbon::now())->toDateTimeString(),
                        'updated_at'  => (\Carbon\Carbon::now())->toDateTimeString(),
                    ];
                }
                ContractorContract::insert($dataContractorContract);
                $idUidContracts = ContractorContract::where('db_area_id', $dbAreaId['id'])->pluck('uid_1c_code', 'id')
                    ->toArray();

                $intersectIdUidContracts = array_intersect($idUidContracts, $diffContractorContract);

                foreach($intersectIdUidContracts as $interKey => $interValue)
                {
                    NotificationsExchange::where('contractor_contract_code', $interValue)->update([
                        'contractor_contract_id' => $interKey,
                    ]);
                }

                $idNullContracts = NotificationsExchange::where('contractor_contract_id', NULL)
                    ->where('contractor_contract_code', '!=', NULL)->pluck('contractor_contract_code', 'id')->toArray();
                foreach($idNullContracts as $idNullKey => $idNullValue)
                {
                    $idContracts = ContractorContract::where('uid_1c_code', $idNullValue)->select('id')->first()
                        ->toArray();

                    NotificationsExchange::where('id', $idNullKey)->update([
                        'contractor_contract_id' => $idContracts['id'],
                        'created_by'             => $dbAreaId['consumer']['consumer_code'],
                        'updated_by'             => $dbAreaId['consumer']['consumer_code'],
                        'created_at'             => (\Carbon\Carbon::now())->toDateTimeString(),
                        'updated_at'             => (\Carbon\Carbon::now())->toDateTimeString(),
                    ]);
                }
            }

            case !empty($diffContractor):

                $dataContractor = [];
                foreach($diffContractor as $contractor)
                {
                    $dataContractor[] = [
                        'uid_1c_code' => $contractor,
                        'db_area_id'  => $dbAreaId['id'],
                        'created_by'  => $dbAreaId['consumer']['consumer_code'],
                        'updated_by'  => $dbAreaId['consumer']['consumer_code'],
                        'created_at'  => (\Carbon\Carbon::now())->toDateTimeString(),
                        'updated_at'  => (\Carbon\Carbon::now())->toDateTimeString(),
                    ];
                }
                Contractor::insert($dataContractor);

                $idUidContractors = Contractor::where('db_area_id', $dbAreaId['id'])->pluck('uid_1c_code', 'id')
                    ->toArray();

                $intersectIdUidContractors = array_intersect($idUidContractors, $diffContractor);

                foreach($intersectIdUidContractors as $interContKey => $interContValue)
                {
                    NotificationsExchange::where('contractor_code', $interContValue)->update([
                        'contractor_id' => $interContKey,
                        'created_by'    => $dbAreaId['consumer']['consumer_code'],
                        'updated_by'    => $dbAreaId['consumer']['consumer_code'],
                        'created_at'    => (\Carbon\Carbon::now())->toDateTimeString(),
                        'updated_at'    => (\Carbon\Carbon::now())->toDateTimeString(),
                    ]);
                }

                $idNullContractors = NotificationsExchange::where('contractor_id', NULL)
                    ->where('contractor_code', '!=', NULL)->pluck('contractor_code', 'id')->toArray();
                foreach($idNullContractors as $idNullConKey => $idNullConValue)
                {
                    $idContractor = Contractor::where('uid_1c_code', $idNullConValue)->select('id')->first()->toArray();

                    NotificationsExchange::where('id', $idNullConKey)->update([
                        'contractor_id' => $idContractor['id'],
                        'created_by'    => $dbAreaId['consumer']['consumer_code'],
                        'updated_by'    => $dbAreaId['consumer']['consumer_code'],
                        'created_at'    => (\Carbon\Carbon::now())->toDateTimeString(),
                        'updated_at'    => (\Carbon\Carbon::now())->toDateTimeString(),
                    ]);
                }

        }


        //
        //        if(!empty($diffContractorContract))
        //        {
        //            $dataContractorContract = [];
        //            foreach($diffContractorContract as $contract)
        //            {
        //                $dataContractorContract[] = [
        //                    'uid_1c_code' => $contract,
        //                    'db_area_id'  => $dbAreaId['id'],
        //                    'created_by'  => $dbAreaId['consumer']['consumer_code'],
        //                    'updated_by'  => $dbAreaId['consumer']['consumer_code'],
        //                    'created_at'  => (\Carbon\Carbon::now())->toDateTimeString(),
        //                    'updated_at'  => (\Carbon\Carbon::now())->toDateTimeString(),
        //                ];
        //            }
        //            ContractorContract::insert($dataContractorContract);
        //            $idUidContracts = ContractorContract::where('db_area_id', $dbAreaId['id'])->pluck('uid_1c_code', 'id')
        //                ->toArray();
        //
        //            $intersectIdUidContracts = array_intersect($idUidContracts, $diffContractorContract);
        //
        //            foreach($intersectIdUidContracts as $interKey => $interValue)
        //            {
        //                NotificationsExchange::where('contractor_contract_code', $interValue)
        //                    ->update([
        //                        'contractor_contract_id' => $interKey,
        //                    ]);
        //            }
        //
        //            $idNullContracts = NotificationsExchange::where('contractor_contract_id', NULL)
        //                ->pluck('contractor_contract_code', 'id')->toArray();
        //            foreach($idNullContracts as $idNullKey => $idNullValue)
        //            {
        //                $idContracts = ContractorContract::where('uid_1c_code', $idNullValue)->select('id')->first()->toArray();
        //
        //                NotificationsExchange::where('id', $idNullKey)
        //                    ->update([
        //                        'contractor_contract_id' => $idContracts['id'],
        //                        'created_by'             => $dbAreaId['consumer']['consumer_code'],
        //                        'updated_by'             => $dbAreaId['consumer']['consumer_code'],
        //                        'created_at'             => (\Carbon\Carbon::now())->toDateTimeString(),
        //                        'updated_at'             => (\Carbon\Carbon::now())->toDateTimeString(),
        //                    ]);
        //            }
        //        }
        //
        //        if(!empty($diffContractor))
        //        {
        //            $dataContractor = [];
        //            foreach($diffContractor as $contractor)
        //            {
        //                $dataContractor[] = [
        //                    'uid_1c_code' => $contractor,
        //                    'db_area_id'  => $dbAreaId['id'],
        //                    'created_by'  => $dbAreaId['consumer']['consumer_code'],
        //                    'updated_by'  => $dbAreaId['consumer']['consumer_code'],
        //                    'created_at'  => (\Carbon\Carbon::now())->toDateTimeString(),
        //                    'updated_at'  => (\Carbon\Carbon::now())->toDateTimeString(),
        //                ];
        //            }
        //            Contractor::insert($dataContractor);
        //
        //            $idUidContractors = Contractor::where('db_area_id', $dbAreaId['id'])->pluck('uid_1c_code', 'id')->toArray();
        //
        //            $intersectIdUidContractors = array_intersect($idUidContractors, $diffContractor);
        //
        //            foreach($intersectIdUidContractors as $interContKey => $interContValue)
        //            {
        //                NotificationsExchange::where('contractor_code', $interContValue)
        //                    ->update([
        //                        'contractor_id' => $interContKey,
        //                        'created_by'    => $dbAreaId['consumer']['consumer_code'],
        //                        'updated_by'    => $dbAreaId['consumer']['consumer_code'],
        //                        'created_at'    => (\Carbon\Carbon::now())->toDateTimeString(),
        //                        'updated_at'    => (\Carbon\Carbon::now())->toDateTimeString(),
        //                    ]);
        //            }
        //
        //            $idNullContractors = NotificationsExchange::where('contractor_id', NULL)->pluck('contractor_code', 'id')
        //                ->toArray();
        //            foreach($idNullContractors as $idNullConKey => $idNullConValue)
        //            {
        //                $idContractor = Contractor::where('uid_1c_code', $idNullConValue)->select('id')->first()->toArray();
        //
        //                NotificationsExchange::where('id', $idNullConKey)
        //                    ->update([
        //                        'contractor_id' => $idContractor['id'],
        //                        'created_by'    => $dbAreaId['consumer']['consumer_code'],
        //                        'updated_by'    => $dbAreaId['consumer']['consumer_code'],
        //                        'created_at'    => (\Carbon\Carbon::now())->toDateTimeString(),
        //                        'updated_at'    => (\Carbon\Carbon::now())->toDateTimeString(),
        //                    ]);
        //            }
        //        }


        Notification::truncate();

        $getNotificationsExchanges = NotificationsExchange::select('contractor_contract_id', 'contractor_id', 'notification_date', 'notification_title', 'notification_text', 'created_by', 'updated_by', 'created_at', 'updated_at')
            ->get()->toArray();
        Notification::insert($getNotificationsExchanges);
        NotificationsExchange::truncate();
    }

    private function getUpdateArray(&$row_update_array, $table_row, $table_db_type_model, $table_fields, $table_fields_array)
    {
        foreach($table_row["row_block_fields"] as $row_block_field)
        {
            $current_model_field = $table_fields->where("field_alias", $row_block_field["field_alias"])->first();
            if($current_model_field)
            {
                if($current_model_field->field_alias !== $row_block_field["field_alias"])
                    return $this->getStatus(0, "field_alias");

                if($row_block_field["field_is_link"])
                {
                    $value_current = $row_block_field["field_values"]["value_current"];

                    $link_db_type_model = DbTypeModel::query()->where([
                        "db_type_id"       => $this->db_area->dBase->db_type_id,
                        "object_type_code" => $value_current["value_table_code"]
                    ])->orWhere(function($query) use ($value_current)
                    {
                        $query->where([
                            "db_type_id"       => null,
                            "object_type_code" => $value_current["value_table_code"]
                        ]);
                    })->get()->first();

                    $row_model_link = $table_db_type_model->controllerName[0]->modelLink->where("table_field_name", $current_model_field->table_field_name)
                        ->where("parent_link_l", 0)->where("table_n_link", $link_db_type_model->table_n)->first();


                    $model = $row_model_link->controller[0]->models;
                    $table_name = $model->table_name;
                    $link_db_type_model = $row_model_link->controller[0]->dbTypeModel[0];
                    //                                        return $link_db_type_controller;

                    if($link_db_type_model->object_key_field !== $value_current["value_table_key"])
                        return $this->getStatus(0, "incorrect " . $value_current["value_table_key"]);

                    $link_where_array = [
                        $value_current["value_table_key"] => $value_current["object_key_value"]
                    ];

                    if($model->use_db_area_l)
                        $link_where_array["db_area_id"] = $this->db_area->id;

                    $link_record = DB::table($model->table_name)->where($link_where_array)->get()->first();


                    if($link_record)
                        $link_id = $link_record->id;
                    else
                    {
                        $link_where_array["created_by"] = $this->db_area->consumer->consumer_code;
                        $link_where_array["updated_by"] = $this->db_area->consumer->consumer_code;
                        $link_where_array["created_at"] = $this->current_time;
                        $link_where_array["updated_at"] = $this->current_time;

                        $link_record_by_id = DB::table($model->table_name)->where("id", $value_current["value_object_id"])->first();

                        if($link_record_by_id)
                        {
                            $link_id = $value_current["value_object_id"];
                        }
                        else
                        {
                            $link_id = DB::table($model->table_name)->insertGetId($link_where_array);
                        }
                    }
                    if($row_model_link->table_field_name_composite)
                    {
                        $row_update_array[$row_model_link->table_field_name_composite] = $model->table_n;
                    }

                    $row_update_array[$current_model_field->table_field_name] = $link_id;

                }
                else
                {
                    $row_update_array[$current_model_field->table_field_name] = $row_block_field["field_values"]["value_current"];
                }
            }
        }
    }

    private function exchangeResult($request_object)
    {
        $request_parameters = $request_object["request"]["request_parameters"];

        if(isset($request_parameters["total_spent_time"]))
        {
            foreach($request_parameters["total_spent_time"] as $row_spent_time)
            {
                $action_log = ActionLog::query()->find($row_spent_time["log_id"]);

                $action_log->update([
                    "spent_time"            => $row_spent_time["spent_time"],
                    "spent_time_site"       => $row_spent_time["spent_time_site"],
                    "spent_time_1c"         => $row_spent_time["spent_time_1c"],
                    "spent_time_connection" => $row_spent_time["spent_time_connection"],
                ]);
            }
        }
        return $this->getStatus(1, "The log has been updated");
    }

    private function getStatus(int $status_code, string $status_description, $spent_time_array = null): array
    {
        $return_array = [
            'status' => [
                'status_code'        => $status_code,
                'status_description' => $status_description,
            ]
        ];
        if($spent_time_array)
            $return_array["status"]["spent_time_array"] = $spent_time_array;

        return $return_array;
    }
}
