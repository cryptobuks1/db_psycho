<?php

namespace App\Http\Controllers\Api\Admin;

use App\Models\ActionLog;
use App\Models\ActionType;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Route;

class ActionExchangeLogController extends Controller
{
    public function list(Request $request)
    {
        $captionName = ['Date', 'Consumer', 'Controller', 'Actions',
                        "Consumer", "Actions", "Duration", "Amount",
                        "Object", "ExchangeLog", "LineNumber", "ActionTypes",
                        'Error', 'ErrorCode', 'Message', 'ActionLogs',
                        'LogsCount', 'DurationSite', 'Duration1C', 'DurationConnect'];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);
        $controller = \App\Models\Controller::query()
            ->where('controller_code', class_basename(Route::current()->controller))
            ->get()->first();

        $max_logs_count = 25000;


        $is_admin = $this->isAdmin();

        $action_logs_query_select = [
            "controller_id",
            "logs.created_at as date",
            "logs.id",
            "logs.row_id",
            "logs.created_at",
            "action_type_id",
            "__ActionTypes.action_type_code",
            "__Controllers.caption_code as controller_caption_code",
            "__ActionTypes.caption_code as action_type_caption_code",
            "_Languages.language_code",
            "Consumers.consumer_code",
            "ControllerTranslation.caption_translation as controller_translation",
            "ActionTypeTranslation.caption_translation as action_type_translation",
            "logs.count",
            "logs.spent_time",
        ];

        if(config("database.default") == "pgsql")
        {
            $action_logs_select = [
                "sub_query.*",
                 DB::raw("TO_CHAR(sub_query.date, 'dd-mm-yyyy HH24:MI:SS') as date"),

                DB::raw("(CASE 
                    WHEN sub_query.controller_translation is null 
                    THEN sub_query.controller_caption_code 
                    ELSE sub_query.controller_translation END) as object"),
                DB::raw("(CASE 
                    WHEN sub_query.action_type_translation is null 
                    THEN sub_query.action_type_caption_code 
                    ELSE sub_query.action_type_translation END) as action_name"),
                DB::raw("(CASE
                     WHEN sub_query.spent_time < 60 THEN ((sub_query.spent_time-sub_query.spent_time%1)%60)::int + (sub_query.spent_time%1) || 'с'
                    WHEN sub_query.spent_time >= 60 and sub_query.spent_time <= 60 * 60  THEN  (sub_query.spent_time/60-sub_query.spent_time/60%1)::int || 'м ' || ((sub_query.spent_time-sub_query.spent_time%1)%60)::int + (sub_query.spent_time%1) || 'с'
                    WHEN sub_query.spent_time >= 60 * 60 THEN (sub_query.spent_time/3600-sub_query.spent_time/3600%1)::int || 'ч ' || (sub_query.spent_time%3600/60-sub_query.spent_time%3600/60%1)::int || 'м '
                    || ((sub_query.spent_time-sub_query.spent_time%1)%60)::int + sub_query.spent_time%1 || 'с'
 
                    END) as time"),
            ];

            if($is_admin)
            {
                array_push($action_logs_query_select,
                     DB::raw("logs.spent_time_site"), DB::raw("logs.spent_time_1c"),

                    DB::raw("logs.spent_time_connection"));

                array_push($action_logs_select,
                    DB::raw("(CASE
                     WHEN sub_query.spent_time_site < 60 THEN ((sub_query.spent_time_site-sub_query.spent_time_site%1)%60)::int + (sub_query.spent_time_site%1) || 'с'
                    WHEN sub_query.spent_time_site >= 60 and sub_query.spent_time_site <= 60 * 60  THEN  (sub_query.spent_time_site/60-sub_query.spent_time_site/60%1)::int || 'м ' || ((sub_query.spent_time_site-sub_query.spent_time_site%1)%60)::int + sub_query.spent_time_site%1 || 'с'
                    WHEN sub_query.spent_time_site >= 60 * 60 THEN (sub_query.spent_time_site/3600-sub_query.spent_time_site/3600%1)::int || 'ч ' || (sub_query.spent_time_site%3600/60-sub_query.spent_time_site%3600/60%1)::int || 'м '
                    || ((sub_query.spent_time_site-sub_query.spent_time_site%1)%60)::int + sub_query.spent_time_site%1 || 'с'
                    END) as time_site"),
                    DB::raw("(CASE
                    WHEN sub_query.spent_time_1c < 60 THEN ((sub_query.spent_time_1c-sub_query.spent_time_1c%1)%60)::int + (sub_query.spent_time_1c%1) || 'с'
                    WHEN sub_query.spent_time_1c >= 60 and sub_query.spent_time_1c <= 60 * 60  THEN  (sub_query.spent_time_1c/60-sub_query.spent_time_1c/60%1)::int || 'м ' || ((sub_query.spent_time_1c-sub_query.spent_time_1c%1)%60)::int + sub_query.spent_time_1c%1 || 'с'
                    WHEN sub_query.spent_time_1c >= 60 * 60 THEN (sub_query.spent_time_1c/3600-sub_query.spent_time_1c/3600%1)::int || 'ч ' || (sub_query.spent_time_1c%3600/60-sub_query.spent_time_1c%3600/60%1)::int || 'м '
                    || ((sub_query.spent_time_1c-sub_query.spent_time_1c%1)%60)::int + sub_query.spent_time_1c%1 || 'с'
                    END) as time_1c"),
                    DB::raw("(CASE
                    WHEN sub_query.spent_time_connection < 60 THEN ((sub_query.spent_time_connection-sub_query.spent_time_connection%1)%60)::int + (sub_query.spent_time_connection%1) || 'с'
                    WHEN sub_query.spent_time_connection >= 60 and sub_query.spent_time_connection <= 60 * 60  THEN  (sub_query.spent_time_connection/60-sub_query.spent_time_connection/60%1)::int || 'м ' || ((sub_query.spent_time_connection-sub_query.spent_time_connection%1)%60)::int + sub_query.spent_time_connection%1 || 'с'
                    WHEN sub_query.spent_time_connection >= 60 * 60 THEN (sub_query.spent_time_connection/3600-sub_query.spent_time_connection/3600%1)::int || 'ч ' || (sub_query.spent_time_connection%3600/60-sub_query.spent_time_connection%3600/60%1)::int || 'м '
                    || ((sub_query.spent_time_connection-sub_query.spent_time_connection%1)%60)::int + sub_query.spent_time_connection%1 || 'с'
 
                    END) as time_connection"));


            }


             // Ограничили двумя action_type, если необходимо будет больше, просто добавить type вмассив

            $action_types_codes = ["ExchangeIn", "ExchangeOut"];

            $current_lang = Lang::locale();

            $action_types = ActionType::query()
                ->from("__ActionTypes as action_types")
                ->whereIn("action_type_code", $action_types_codes)
                ->leftJoin("_Languages", function(JoinClause $join) use ($current_lang)
                {
                    $join->where("_Languages.language_code", "=", $current_lang);
                })
                ->leftJoin("__Captions", function(JoinClause $join)
                {
                    $join->on("__Captions.caption_name", "=", "action_types.caption_code");
                })
                ->leftJoin("_TranslationCaptions as translation", function(JoinClause $join)
                {
                    $join->on("translation.caption_id", "=", "__Captions.id")
                        ->on("translation.language_id", "=", "_Languages.id");
                })
                ->select([
                    "action_types.*",
                    DB::raw("(CASE 
                    WHEN translation.caption_translation is null 
                    THEN action_types.caption_code
                    ELSE translation.caption_translation END) as action_name"),
                ])
                ->get();


            $action_logs_query = ActionLog::query()
                ->from("__ActionLogs as logs")
                ->join("__Controllers", "__Controllers.id", "=", "logs.controller_id")
                ->join("__ActionTypes", function(JoinClause $join) use ($action_types_codes)
                {
                    $join->on("__ActionTypes.id", "=", "logs.action_type_id")
                        ->whereIn("action_type_code", $action_types_codes);
                })
                ->join("Consumers", "Consumers.id", "=", "logs.consumer_id")
                ->leftJoin("__Captions as ControllerCaption", function(JoinClause $join)
                {
                    $join->on("ControllerCaption.caption_name", "=", "__Controllers.caption_code");
                })
                ->leftJoin("__Captions as ActionTypeCaption", function(JoinClause $join)
                {
                    $join->on("ActionTypeCaption.caption_name", "=", "__ActionTypes.caption_code");
                })
                ->leftJoin("_Languages", function(JoinClause $join) use ($current_lang)
                {
                    $join->where("_Languages.language_code", "=", $current_lang);
                })
                ->leftJoin("_TranslationCaptions as ControllerTranslation", function(JoinClause $join)
                {
                    $join->on("ControllerTranslation.caption_id", "=", "ControllerCaption.id")
                        ->on("ControllerTranslation.language_id", "=", "_Languages.id");
                })
                ->leftJoin("_TranslationCaptions as ActionTypeTranslation", function(JoinClause $join)
                {
                    $join->on("ActionTypeTranslation.caption_id", "=", "ActionTypeCaption.id")
                        ->on("ActionTypeTranslation.language_id", "=", "_Languages.id");
                })
                ->select($action_logs_query_select)
                ->orderBy("date", "desc");

            $action_logs = DB::table(DB::raw("(" . $action_logs_query->toSql() . ") as sub_query"))
                ->select($action_logs_select)
                ->mergeBindings($action_logs_query->getQuery())
                 ->take($max_logs_count)

                ->get();
        }
        if(config("database.default") == "mysql")
        {
            $action_logs_select = [
                "sub_query.*",
                DB::raw("DATE_FORMAT(sub_query.date,'%d-%m-%Y') as date"),
                //                DB::raw("TO_CHAR(sub_query.created_at, 'dd-mm-yyyy HH:MM:DD') as date"),
                DB::raw("(CASE 
                    WHEN sub_query.controller_translation is null 
                    THEN sub_query.controller_caption_code 
                    ELSE sub_query.controller_translation END) as object"),
                DB::raw("(CASE 
                    WHEN sub_query.action_type_translation is null 
                    THEN sub_query.action_type_caption_code 
                    ELSE sub_query.action_type_translation END) as action_name"),
                DB::raw("(CASE
                     WHEN sub_query.spent_time < 60 THEN CONCAT(CAST((sub_query.spent_time-sub_query.spent_time%1)%60 as SIGNED) + sub_query.spent_time%1, 'с')
                    WHEN sub_query.spent_time >= 60 and sub_query.spent_time < 60 * 60  THEN  CONCAT(CONCAT(CAST((sub_query.spent_time/60-sub_query.spent_time/60%1) as SIGNED), 'м '), CONCAT(CAST((sub_query.spent_time-sub_query.spent_time%1)%60 as SIGNED) + sub_query.spent_time%1, 'с'))
                    WHEN sub_query.spent_time >= 60 * 60 THEN CONCAT(CONCAT(CAST((sub_query.spent_time/3600-sub_query.spent_time/3600%1) as SIGNED), 'ч '), CONCAT(CAST((sub_query.spent_time%3600/60-sub_query.spent_time%3600/60%1) as SIGNED), 'м '), CONCAT(CAST((sub_query.spent_time-sub_query.spent_time%1)%60 as SIGNED) + sub_query.spent_time%1, 'с'))
 
                    END) as time"),
            ];

            if($is_admin)
            {
                array_push($action_logs_query_select,
                     DB::raw("logs.spent_time_site"), DB::raw("logs.spent_time_1c"),

                    DB::raw("logs.spent_time_connection"));

                array_push($action_logs_select,
                    DB::raw("(CASE
                         WHEN sub_query.spent_time_site < 60 THEN CONCAT(CAST((sub_query.spent_time_site-sub_query.spent_time_site%1)%60 as SIGNED) + sub_query.spent_time_site%1, 'с')
                        WHEN sub_query.spent_time_site >= 60 and sub_query.spent_time_site < 60 * 60  THEN  CONCAT(CONCAT(CAST((sub_query.spent_time_site/60-sub_query.spent_time_site/60%1) as SIGNED), 'м '), CONCAT(CAST((sub_query.spent_time_site-sub_query.spent_time_site%1)%60 as SIGNED) + sub_query.spent_time_site%1, 'с'))
                        WHEN sub_query.spent_time_site >= 60 * 60 THEN CONCAT(CONCAT(CAST((sub_query.spent_time_site/3600-sub_query.spent_time_site/3600%1) as SIGNED), 'ч '), CONCAT(CAST((sub_query.spent_time_site%3600/60-sub_query.spent_time_site%3600/60%1) as SIGNED), 'м '), CONCAT(CAST((sub_query.spent_time_site-sub_query.spent_time_site%1)%60 as SIGNED) + sub_query.spent_time_site%1, 'с'))
                        END) as time_site"),
                    DB::raw("(CASE
                        WHEN sub_query.spent_time_1c < 60 THEN CONCAT(CAST((sub_query.spent_time_1c-sub_query.spent_time_1c%1)%60 as SIGNED) + sub_query.spent_time_1c%1, 'с')
                        WHEN sub_query.spent_time_1c >= 60 and sub_query.spent_time_1c < 60 * 60  THEN  CONCAT(CONCAT(CAST((sub_query.spent_time_1c/60-sub_query.spent_time_1c/60%1) as SIGNED), 'м '), CONCAT(CAST((sub_query.spent_time_1c-sub_query.spent_time_1c%1)%60 as SIGNED) + sub_query.spent_time_1c%1, 'с'))
                        WHEN sub_query.spent_time_1c >= 60 * 60 THEN CONCAT(CONCAT(CAST((sub_query.spent_time_1c/3600-sub_query.spent_time_1c/3600%1) as SIGNED), 'ч '), CONCAT(CAST((sub_query.spent_time_1c%3600/60-sub_query.spent_time_1c%3600/60%1) as SIGNED), 'м '), CONCAT(CAST((sub_query.spent_time_1c-sub_query.spent_time_1c%1)%60 as SIGNED) + sub_query.spent_time_1c%1, 'с'))
                        END) as time_1c"),
                    DB::raw("(CASE
                        WHEN sub_query.spent_time_connection < 60 THEN CONCAT(CAST((sub_query.spent_time_connection-sub_query.spent_time_connection%1)%60 as SIGNED) + sub_query.spent_time_connection%1, 'с')
                        WHEN sub_query.spent_time_connection >= 60 and sub_query.spent_time_connection < 60 * 60  THEN  CONCAT(CONCAT(CAST((sub_query.spent_time_connection/60-sub_query.spent_time_connection/60%1) as SIGNED), 'м '), CONCAT(CAST((sub_query.spent_time_connection-sub_query.spent_time_connection%1)%60 as SIGNED) + sub_query.spent_time_connection%1, 'с'))
                        WHEN sub_query.spent_time_connection >= 60 * 60 THEN CONCAT(CONCAT(CAST((sub_query.spent_time_connection/3600-sub_query.spent_time_connection/3600%1) as SIGNED), 'ч '), CONCAT(CAST((sub_query.spent_time_connection%3600/60-sub_query.spent_time_connection%3600/60%1) as SIGNED), 'м '), CONCAT(CAST((sub_query.spent_time_connection-sub_query.spent_time_connection%1)%60 as SIGNED) + sub_query.spent_time_connection%1, 'с'))
 
                        END) as time_connection"));


            }


             // Ограничили двумя action_type, если необходимо будет больше, просто добавить type вмассив

            $action_types_codes = ["ExchangeIn", "ExchangeOut"];

            $current_lang = Lang::locale();

            $action_types = ActionType::query()
                ->from("__ActionTypes as action_types")
                ->whereIn("action_type_code", $action_types_codes)
                ->leftJoin("_Languages", function(JoinClause $join) use ($current_lang)
                {
                    $join->where("_Languages.language_code", "=", $current_lang);
                })
                ->leftJoin("__Captions", function(JoinClause $join)
                {
                    $join->on("__Captions.caption_name", "=", "action_types.caption_code");
                })
                ->leftJoin("_TranslationCaptions as translation", function(JoinClause $join)
                {
                    $join->on("translation.caption_id", "=", "__Captions.id")
                        ->on("translation.language_id", "=", "_Languages.id");
                })
                ->select([
                    "action_types.*",
                    DB::raw("(CASE 
                    WHEN translation.caption_translation is null 
                    THEN action_types.caption_code
                    ELSE translation.caption_translation END) as action_name"),
                ])
                ->get();


            $action_logs_query = ActionLog::query()
                ->from("__ActionLogs as logs")
                ->join("__Controllers", "__Controllers.id", "=", "logs.controller_id")
                ->join("__ActionTypes", function(JoinClause $join) use ($action_types_codes)
                {
                    $join->on("__ActionTypes.id", "=", "logs.action_type_id")
                        ->whereIn("action_type_code", $action_types_codes);
                })
                ->join("Consumers", "Consumers.id", "=", "logs.consumer_id")
                ->leftJoin("__Captions as ControllerCaption", function(JoinClause $join)
                {
                    $join->on("ControllerCaption.caption_name", "=", "__Controllers.caption_code");
                })
                ->leftJoin("__Captions as ActionTypeCaption", function(JoinClause $join)
                {
                    $join->on("ActionTypeCaption.caption_name", "=", "__ActionTypes.caption_code");
                })
                ->leftJoin("_Languages", function(JoinClause $join) use ($current_lang)
                {
                    $join->where("_Languages.language_code", "=", $current_lang);
                })
                ->leftJoin("_TranslationCaptions as ControllerTranslation", function(JoinClause $join)
                {
                    $join->on("ControllerTranslation.caption_id", "=", "ControllerCaption.id")
                        ->on("ControllerTranslation.language_id", "=", "_Languages.id");
                })
                ->leftJoin("_TranslationCaptions as ActionTypeTranslation", function(JoinClause $join)
                {
                    $join->on("ActionTypeTranslation.caption_id", "=", "ActionTypeCaption.id")
                        ->on("ActionTypeTranslation.language_id", "=", "_Languages.id");
                })
                ->select($action_logs_query_select)
                ->orderBy("date", "desc");

            $action_logs = DB::table(DB::raw("(" . $action_logs_query->toSql() . ") as sub_query"))
                ->select($action_logs_select)
                ->mergeBindings($action_logs_query->getQuery())
                 ->take($max_logs_count)
                ->get();
        }

        $remark = $getArrayCaptions['LogsCount']['translation_captions']['caption_translation'];


        $remark = str_replace("{count}", $max_logs_count, $remark);

        $list = [
            "main_data_models" => [
                $controller->controller_alias => $action_logs
            ],
            "add_data_models"  => [
                "ActionTypes" => $action_types
            ],
            "dependent"        => [
                "dependent_data_model" => $controller->controller_alias,
                "dependent_fields"     => [
                    "title"        => $getArrayCaptions['ActionTypes']['translation_captions']['caption_translation'],
                    "model"        => "action_type_id",
                    "type"         => "select",
                    "options"      => [],
                    "options_data" => [
                        "options_data_model"     => "ActionTypes",
                        "options_field_id"       => "id",
                        "options_field_id_value" => "",
                        "options_field_title"    => "action_name",
                        "search"                 => ''
                    ],
                ],
                "width"                => "100%",
            ],
            "sets"             => $this->getButtonsList(['list_bottom', 'list_top', 'list_top_dropdown_actions', 'list_top_left_command_bar', 'list_top_right_command_bar']),
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['ExchangeLog']['translation_captions']['caption_translation'],
                //                    "form_title" => $getArrayCaptions['Contractors']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => true, // {if true -> show field} {if false hidden field)
                "form_type"                     => "list",
                "prevent_list_click"            => true,
                "form_remark"                   => $action_logs->count() === 25000 ? $remark : null,
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_type_list"                => [
                    "form_card_url"     => "/contractors_new/",
                    "form_search_field" => "contractor_short_name",
                ],
            ],


            "tabs" => [
                [
                    "tab_title"       => "ActionLogsTabTitle",
                    "blocks_quantity" => 1,
                    "blocks"          => [

                        [
                            "block_title"         => $getArrayCaptions['ExchangeLog']['translation_captions']['caption_translation'],
                            "block_zone_quantity" => 1,
                            "block_model"         => $controller->controller_alias,
                            "block_type"          => "block_list_base",
                            "block_fields"        => [
                                ['key'     => 'actions', 'sortable' => false,
                                 'class'   => 'list_checkbox',
                                 'thStyle' => 'width: 6%',
                                 "zone"    => "1",
                                 "order"   => "1"
                                ],

                                ['key'   => 'date', 'sortable' => true, 'class' => 'created_at',
                                 "label" => $getArrayCaptions['Date']['translation_captions']['caption_translation'], 'thStyle' => 'width: 13%', "zone" => "1", "order" => "6"],

                                ['key'   => 'action_name', 'sortable' => true, 'class' => 'created_at',
                                 "label" => $getArrayCaptions['Actions']['translation_captions']['caption_translation'], 'thStyle' => 'width: 13%', "zone" => "1", "order" => "5"],

                                ['key'   => 'object', 'sortable' => true, 'class' => 'contractor_short_name',
                                 "label" => $getArrayCaptions['Object']['translation_captions']['caption_translation'], 'thStyle' => 'width: 31%', "zone" => "1", "order" => "2"],

                                ['key'   => 'row_id', 'sortable' => true, 'class' => 'contractor_short_name',
                                 "label" => $getArrayCaptions['LineNumber']['translation_captions']['caption_translation'], 'thStyle' => 'width: 31%', "zone" => "1", "order" => "2"],

                                ['key'   => 'consumer_code', 'sortable' => true, 'class' => 'created_at',
                                 "label" => $getArrayCaptions['Consumer']['translation_captions']['caption_translation'], 'thStyle' => 'width: 13%', "zone" => "1", "order" => "5"],

                                ['key'   => 'count', 'sortable' => true, 'class' => 'created_at',
                                 "label" => $getArrayCaptions['Amount']['translation_captions']['caption_translation'], 'thStyle' => 'width: 13%', "zone" => "1", "order" => "5"],

                                ['key'   => 'time', 'sortable' => true, 'class' => 'created_at',
                                 "label" => $getArrayCaptions['Duration']['translation_captions']['caption_translation'], 'thStyle' => 'width: 13%', "zone" => "1", "order" => "5"],
                            ]
                        ]
                    ]
                ]
            ]
        ];

        if($is_admin)
        {
            array_push($list["tabs"][0]["blocks"][0]["block_fields"],
                ['key'   => 'time_site', 'sortable' => true, 'class' => 'created_at',
                 "label" => $getArrayCaptions['DurationSite']['translation_captions']['caption_translation'], 'thStyle' => 'width: 13%', "zone" => "1", "order" => "5"],
                ['key'   => 'time_1c', 'sortable' => true, 'class' => 'created_at',
                 "label" => $getArrayCaptions['Duration1C']['translation_captions']['caption_translation'], 'thStyle' => 'width: 13%', "zone" => "1", "order" => "5"],
                ['key'   => 'time_connection', 'sortable' => true, 'class' => 'created_at',
                 "label" => $getArrayCaptions['DurationConnect']['translation_captions']['caption_translation'], 'thStyle' => 'width: 13%', "zone" => "1", "order" => "5"]);
        }

        return response()->json($list);
    }

}
