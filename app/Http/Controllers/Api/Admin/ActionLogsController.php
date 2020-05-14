<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Classes\CheckController;
use App\Http\Traits\HasCard;
use App\Http\Traits\HasList;
use App\Models\ActionLog;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Route;

class ActionLogsController extends Controller
{
    use HasList, HasCard;

    public $models;

    public function listOld(Request $request)
    {
        $short_page = \GuzzleHttp\json_decode($request->getContent(), true);

//        $logs = ActionLog::with("controller", "consumer", "actionType")
//            ->orderBy("created_at", "desc")->get();
        $perPage = $short_page['perPage'] ?? 10;
        $page = $short_page['currentPage'] ?? 1;
        $sortBy =  $short_page['sortBy'] ?? '__ActionLogs.created_at';
        $searchFilter = $short_page['searchFilter'] ?? '';
//        $searchFilter123 = date("Y-m-d", strtotime("2020-03-25 12:51:07")) ;

//        if (!empty($short_page['sortBy'])) {
//            if ($short_page['sortBy'] === "consumer_code") {
//                $sortBy = "consumer_id";
//            } elseif ($short_page['sortBy'] === "action_type_code") {
//                $sortBy = "action_type_id";
//            } elseif ($short_page['sortBy'] === "controller_code") {
//                $sortBy = "controller_id";
//            } elseif ($short_page['sortBy'] === "consumer_name") {
//                $searchField = "consumer_id";
//            }
//        }

        $sortDesc = ((!isset($short_page['sortDesc']) ? 'desc' : ($short_page['sortDesc'] == true ? 'desc' : 'asc')));

//        $logsOld = ActionLog::with("controller", "consumer", "actionType")
//            ->orderBy($sortBy, $sortDesc)
//            ->whereRaw("CAST(consumer_id AS TEXT) ILIKE '%$searchFilter%'")
//            ->paginate($perPage, $columns = null, $pageName = 'page', $page);

        $logs = ActionLog::join('__Controllers as Controllers', 'Controllers.id', '=', '__ActionLogs.controller_id')
            ->join( 'Consumers as consumers','consumers.id', '=', '__ActionLogs.consumer_id')
            ->join('__ActionTypes as ActionTypes','ActionTypes.id', '=', '__ActionLogs.action_type_id')
            ->select('__ActionLogs.id', '__ActionLogs.created_at','__ActionLogs.updated_at','controller_name','consumer_name', 'action_type_name',
            'action_log_error_l', 'action_log_error_code', 'count','spent_time')
            ->orderBy($sortBy, $sortDesc)
             ->where('consumer_name', 'LIKE', "%{$searchFilter}%")
             ->orWhere('controller_name', 'LIKE', "%{$searchFilter}%")
             ->orWhere('action_type_name', 'LIKE', "%{$searchFilter}%")
            ->paginate($perPage, $columns = null, $pageName = 'page', $page);

        $paginator = $logs->toArray();

        $captionName = ['Date', 'Consumer', 'Controller', 'Actions', 'Error', 'ErrorCode', 'Message', 'ActionLogs'];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $main_model = \App\Models\Controller::where('controller_code', class_basename(Route::current()->controller))
            ->value('controller_alias');

        $res = [];

        foreach ($logs as $log) {
            $temp = [
                "id" => $log->id,
                "controller_name" => $log->controller_name ?? null,
                "consumer_name" => $log->consumer_name ?? null,
                "action_type_name" => $log->action_type_name ?? null,
                'action_log_error_l' => $log->action_log_error_l,
                'action_log_error_code' => $log->action_log_error_code,
                'created_by' => $log->created_by,
                'updated_by' => $log->updated_by,
                'count' => $log->count,
                'spent_time' => $log->spent_time,
                'created_at' => $log->created_at->toDateTimeString(),
                'updated_at' => $log->updated_at->toDateTimeString()
            ];

            array_push($res, $temp);
        }

        $list = [
            "main_data_models" => [
                $main_model => $res
            ],
            "form_parameters" => [
                "form_title" => $getArrayCaptions['ActionLogs']['translation_captions']['caption_translation'],
                "form_code" => "ActionLogs",
                "form_is_dependent" => false,
                "form_type" => "list",
                "form_base_data_model" => $main_model,
                "form_main_data_model_id_field" => "id",
                "form_type_list" => [
                    "form_search_field" => "consumer_name"
                ],

            ],
            "sets" => $this->getButtonsList(['list_bottom', 'list_top', 'list_top_dropdown_actions', 'list_top_left_command_bar', 'list_top_right_command_bar']),
            "tabs" => [
                [
                    "tab_title" => "ActionLogsTabTitle",
                    "blocks_quantity" => 1,
                    "blocks" => [
                        [
                            "block_title" => "ActionLogsBlockTitle",
                            "block_zone_quantity" => 1,
                            "block_model" => $main_model,
                            "block_type" => "block_list_base",
                            "block_parameters" => [
                                "enable_pagination_request" => true,
                                "total_items" => $paginator['total'],
                            ],
                            "block_fields" => [
                                ['key' => "actions", 'class' => 'list_checkbox', 'thStyle' => 'width: 5%'],
                                ['key' => "created_at", 'sortable' => true, 'class' => '', 'thStyle' => 'width: 15%',
                                    'label' => $getArrayCaptions['Date']['translation_captions']['caption_translation'], "filter" => true],
                                ['key' => "consumer_name", 'sortable' => true, 'class' => '', 'thStyle' => 'width: 15%',
                                    'label' => $getArrayCaptions['Consumer']['translation_captions']['caption_translation'], "filter" => true],
                                ['key' => "controller_name", 'sortable' => true, 'class' => '', 'thStyle' => 'width: 15%',
                                    'label' => $getArrayCaptions['Controller']['translation_captions']['caption_translation'], "filter" => true],
                                ['key' => "action_type_name", 'sortable' => true, 'class' => '', 'thStyle' => 'width: 10%',
                                    'label' => $getArrayCaptions['Actions']['translation_captions']['caption_translation'], "filter" => true],
                                ['key' => 'action_log_error_l', 'sortable' => true, 'class' => '',
                                    "label" => $getArrayCaptions['Error']['translation_captions']['caption_translation'], 'thStyle' => 'width: 10%'],
                                ['key' => 'action_log_error_code', 'sortable' => true, 'class' => '',
                                    "label" => $getArrayCaptions['ErrorCode']['translation_captions']['caption_translation'], 'thStyle' => 'width: 10%'],


                                ['key' => 'count', 'sortable' => true, 'class' => '',
                                    "label" => "count"/*$getArrayCaptions['ErrorCode']['translation_captions']['caption_translation']*/, 'thStyle' => 'width: 7.5%'],
                                ['key' => 'spent_time', 'sortable' => true, 'class' => '',
                                    "label" => "spent_time" /*$getArrayCaptions['ErrorCode']['translation_captions']['caption_translation']*/, 'thStyle' => 'width: 7.5%'],
                            ]
                        ]
                    ]
                ]
            ]
        ];

        return response()->json($list);
    }

    public function listQuery()
    {
        $request = request();

        $short_page = \GuzzleHttp\json_decode($request->getContent(), true);

        $perPage = $short_page['perPage'] ?? 10;
        $page = $short_page['currentPage'] ?? 1;
        $sortBy =  $short_page['sortBy'] ?? '__ActionLogs.created_at';
        $searchFilter = $short_page['searchFilter'] ?? '';

        $sortDesc = ((!isset($short_page['sortDesc']) ? 'desc' : ($short_page['sortDesc'] == true ? 'desc' : 'asc')));

        $logs = ActionLog::join('__Controllers as Controllers', 'Controllers.id', '=', '__ActionLogs.controller_id')
            ->join( 'Consumers as consumers','consumers.id', '=', '__ActionLogs.consumer_id')
            ->join('__ActionTypes as ActionTypes','ActionTypes.id', '=', '__ActionLogs.action_type_id')
            ->select('__ActionLogs.id','__ActionLogs.created_by', '__ActionLogs.updated_by', '__ActionLogs.created_at','__ActionLogs.updated_at','controller_name','consumer_name', 'action_type_name',
                'action_log_error_l', 'action_log_error_code', 'count','spent_time')
            ->orderBy($sortBy, $sortDesc)
            ->where('consumer_name', 'LIKE', "%{$searchFilter}%")
            ->orWhere('controller_name', 'LIKE', "%{$searchFilter}%")
            ->orWhere('action_type_name', 'LIKE', "%{$searchFilter}%")
            ->paginate($perPage, $columns = null, $pageName = 'page', $page);


        $this->list_model = $logs->toArray();

        return $this;
    }

    public function prepareListModelData()
    {
        $this->models = $this->list_model;

        $this->list_model = [];

        foreach ($this->models["data"] as $model) {
            array_push($this->list_model, [
                "id" => $model['id'],
                "controller_name" => $model['controller_name'] ?? null,
                "consumer_name" => $model['consumer_name'] ?? null,
                "action_type_name" => $model['action_type_name'] ?? null,
                'action_log_error_l' => $model['action_log_error_l'],
                'action_log_error_code' => $model['action_log_error_code'],
                'created_by' => $model['created_by'],
                'updated_by' => $model['updated_by'],
                'count' => $model['count'],
                'spent_time' => $model['spent_time'],
//                'created_at' => $model->created_at->toDateTimeString(),
//                'updated_at' => $model->updated_at->toDateTimeString()
                'created_at' => $model['created_at'],
                'updated_at' => $model['updated_at']
            ]);
        }
        return $this;
    }

    public function setListFormTitle()
    {
        $this->list_form_title = "ActionLogs";

        return $this;
    }

    public function setListBlockFields()
    {
        $this->list_block_fields = [
            [
                "block_title" => $this->getTranslatedListCaption('ActionLogsBlockTitle'),
//                "block_title" => "ActionLogsBlockTitle",
                "block_zone_quantity" => 1,
                "block_model" => $this->list_controller_alias,
                "block_type" => "block_list_base",
                "block_parameters" => [
                    "enable_pagination_request" => true,
                    "total_items" => $this->models['total'],
                ],
                "block_fields" => [

                    ['key' => 'actions', 'sortable' => false,
                        'class' => 'list_checkbox',
                        'thStyle' => 'width: 6%',
                        "zone" => "1",
                        "order" => "1"
                    ],

                    ['key' => "created_at", 'sortable' => true, 'class' => '', 'thStyle' => 'width: 15%',
                        'label' => $this->getTranslatedListCaption('Date'), "filter" => true],
                    ['key' => "consumer_name", 'sortable' => true, 'class' => '', 'thStyle' => 'width: 15%',
                        'label' => $this->getTranslatedListCaption('Consumer'), "filter" => true],
                    ['key' => "controller_name", 'sortable' => true, 'class' => '', 'thStyle' => 'width: 15%',
                        'label' => $this->getTranslatedListCaption('Controller'), "filter" => true],
                    ['key' => "action_type_name", 'sortable' => true, 'class' => '', 'thStyle' => 'width: 10%',
                        'label' => $this->getTranslatedListCaption('Actions'), "filter" => true],
                    ['key' => 'action_log_error_l', 'sortable' => true, 'class' => '',
                        "label" => $this->getTranslatedListCaption('Error'), 'thStyle' => 'width: 10%'],
                    ['key' => 'action_log_error_code', 'sortable' => true, 'class' => '',
                        "label" => $this->getTranslatedListCaption('ErrorCode'), 'thStyle' => 'width: 10%'],


                    ['key' => 'count', 'sortable' => true, 'class' => '',
                        "label" => "count"/*$getArrayCaptions['ErrorCode']['translation_captions']['caption_translation']*/, 'thStyle' => 'width: 7.5%'],
                    ['key' => 'spent_time', 'sortable' => true, 'class' => '',
                        "label" => "spent_time" /*$getArrayCaptions['ErrorCode']['translation_captions']['caption_translation']*/, 'thStyle' => 'width: 7.5%'],

                ]
            ]
        ];

        return $this;
    }

    public function setListCaptions()
    {
        $this->list_captions = [
            'ok',
            'apply',
            'back', 'Main',
            'Actual', 'DeleteMark',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy',
            'Date', 'Consumer', 'Controller', 'Actions', 'Error', 'ErrorCode', 'Message', 'ActionLogs', 'ActionLogsBlockTitle'
        ];

        $this->translateListCaptions();
        return $this;
    }

    protected function listAdditionalQuery(Builder $builder)
    {

    }

    public function card(Request $request)
    {
        $log = ActionLog::with("controller", "consumer", "actionType")
            ->where("id", $request->id)->first();

        $captionName = ['Date', 'Consumer', 'Controller', 'Actions', 'Error', 'ErrorCode', 'Message',
            'SystemDetails', 'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'ActionLog',
            'RecordNumber'];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $main_model = \App\Models\Controller::where('controller_code', class_basename(Route::current()->controller))
            ->value('controller_alias');

        $nameControllerMethod = [
            'controller' => class_basename(Route::current()->controller),
            'accessRight' => 'record'
        ];

        $formShowParam = (new CheckController($nameControllerMethod))->getShowFormParameters();

        $res = [[
            "id" => $log->id,
            "controller_code" => $log->controller->controller_code ?? null,
            "consumer_code" => $log->consumer->consumer_code ?? null,
            "action_type_code" => $log->actionType->action_type_code ?? null,
            'action_log_error_l' => $log->action_log_error_l,
            'row_id' => $log->row_id,
            'action_log_error_code' => $log->action_log_error_code,
            'action_log_message' => $log->action_log_message,
            'created_by' => $log->created_by,
            'updated_by' => $log->updated_by,
            'created_at' => $log->created_at->toDateTimeString(),
            'updated_at' => $log->updated_at->toDateTimeString()
        ]];

        $card = [
            "main_data_models" => [
                $main_model => $res
            ],
            "sets" => $this->getButtonsList(['card_actions']),
            "form_parameters" => [
                "form_title" => $getArrayCaptions['ActionLog']['translation_captions']['caption_translation'],
                "form_code" => $main_model,
                "form_is_dependent" => false, // {if true -> show field} {if false hidden field)
                "form_type" => "card",
                "disable_inputs" => $formShowParam['read_only'],
                "form_base_data_model" => $main_model,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name" => $res[0]['created_at'] . ' ' . $res[0]['controller_code'] . '(' . $res[0]['action_type_code'] . ')',
            ],
            "tabs" => [
                [
                    "tab_title" => "Главная",
                    "tab_name" => "Главная",
                    "blocks_quantity" => 1,
                    "blocks" => [
                        [
                            "block_title" => "TestBlockTitle",
                            "block_zone_quantity" => 1,
                            "block_model" => $main_model,
                            "block_type" => "block_card",
                            "block_fields" => [
                                ['title' => $getArrayCaptions['Date']['translation_captions']['caption_translation'],
                                    'model' => 'created_at', "model_name" => $main_model, 'type' => 'label', 'width' => '33%', "zone" => "1", "order" => "1", "border_right" => false],
                                ['title' => $getArrayCaptions['Consumer']['translation_captions']['caption_translation'],
                                    'model' => 'consumer_code', "model_name" => $main_model, 'type' => 'label', 'width' => '33%',
                                    "zone" => "1", "order" => "2", "border_right" => false],
                                ['title' => $getArrayCaptions['Controller']['translation_captions']['caption_translation'],
                                    'model' => 'controller_code', "model_name" => $main_model, 'type' => 'label', 'width' => '33%',
                                    "zone" => "1", "order" => "2", "border_right" => false],
                                ['title' => $getArrayCaptions['Actions']['translation_captions']['caption_translation'],
                                    'model' => 'action_type_code', "model_name" => $main_model, 'type' => 'label', 'width' => '33%',
                                    "zone" => "1", "order" => "2", "border_right" => false],
                                ['title' => $getArrayCaptions['ErrorCode']['translation_captions']['caption_translation'],
                                    'model' => 'action_log_error_code', "model_name" => $main_model, 'type' => 'label', 'width' => '33%',
                                    "zone" => "1", "order" => "2", "border_right" => false],
                                ['title' => $getArrayCaptions['Error']['translation_captions']['caption_translation'],
                                    'model' => 'action_log_error_l', "model_name" => $main_model, 'type' => 'checkbox', 'width' => '33%',
                                    "zone" => "1", "order" => "2", "border_right" => false, "disabled" => true],
                                ['title' => $getArrayCaptions['RecordNumber']['translation_captions']['caption_translation'],
                                    'model' => 'row_id', "model_name" => $main_model, 'type' => 'label', 'width' => '33%',
                                    "zone" => "1", "order" => "2", "border_right" => false, "disabled" => true],
                                ['title' => "count",
                                    'model' => 'count', "model_name" => $main_model, 'type' => 'label', 'width' => '33%',
                                    "zone" => "1", "order" => "2", "border_right" => false, "disabled" => true],
                                ['title' => "spent_time",
                                    'model' => 'spent_time', "model_name" => $main_model, 'type' => 'label', 'width' => '33%',
                                    "zone" => "1", "order" => "2", "border_right" => false, "disabled" => true],
                                ['title' => $getArrayCaptions['Message']['translation_captions']['caption_translation'],
                                    'model' => 'action_log_message', "model_name" => $main_model, 'type' => 'textarea', 'width' => '100%',
                                    "zone" => "1", "order" => "2", "border_right" => false],
                                //                                ['title' => $getArrayCaptions['Status']['translation_captions']['caption_translation'], 'model' => 'Status', ' "model_name" => $main_model,type' => 'label', 'width' => '25%', "zone" => "1", "order" => "3", "border_right" => false],
                                //                                ['title' => $getArrayCaptions['Description']['translation_captions']['caption_translation'], 'model' => 'bl_contractor_request_description', ' "model_name" => $main_model,type' => 'editor', 'width' => '100%', "zone" => "1", "order" => "4", "border_right" => false],
                            ]
                        ]
                    ]
                ]
            ]
        ];

        if ($formShowParam['show_system_tab']) {

            $systemTab = [

                "tab_title" => $getArrayCaptions['SystemDetails']['translation_captions']['caption_translation'],
                "blocks_quantity" => 1,
                "blocks" => [
                    [
                        //
                        //"block_title" => $getArrayCaptions['CreationDetails']['translation_captions']['caption_translation'],
                        "block_zone_quantity" => 2,
                        "block_model" => $main_model,
                        "block_type" => "block_card",
                        "block_fields" => [
                            ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'],
                                'model' => 'created_at', "model_name" => $main_model, 'type' => 'label', 'width' => '100%', "zone" => "1",
                                "order" => "1"
                            ],

                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'],
                                'model' => 'created_by', "model_name" => $main_model, 'type' => 'label', 'width' => '100%', "zone" => "1",
                                "order" => "2"
                            ],

                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'],
                                'model' => 'updated_at', "model_name" => $main_model, 'type' => 'label', 'width' => '100%', "zone" => "2",
                                "order" => "1"
                            ],

                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'],
                                'model' => 'updated_by', "model_name" => $main_model, 'type' => 'label', 'width' => '100%', "zone" => "2",
                                "order" => "2"
                            ],
                        ]
                    ]
                ]
            ];

            array_push($card['tabs'], $systemTab);
        }

        return response()->json($card);
    }

    public function deleteAll()
    {
        ActionLog::truncate();


        return response()->json([
            "message" => "Успешно удалено",
            "requery" => true,
            "error" => false
        ]);
    }
}
