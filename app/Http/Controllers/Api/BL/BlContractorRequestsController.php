<?php

namespace App\Http\Controllers\Api\BL;

use App\Http\Classes\FileManager;
use App\Http\Traits\HasCard;
use App\Http\Traits\HasList;
use App\Models\BL\BlContractorRequest;
use App\Http\Controllers\Api\Controller;
use App\Models\BL\BlContractorRequestType;
use App\Models\BL\BlStatus;
use App\Models\ContactPerson;
use App\Models\Contractor;
use App\Models\Country;
use App\Models\DbAreaFile;
use App\Models\ModelTables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Classes\CheckController;
use App\Http\Middleware\CheckAccess;
use Illuminate\Support\Carbon;

class BlContractorRequestsController extends Controller
{
    use HasList, HasCard;
    public $contRequests;
    public $singleContractor;
    public $contrs;
    public $contRequest;
    public $dbareaFilesModelTableN;
    public $contrsModelTableN;
    public $contReqId;
    public $dbareaFilesModelName;

    public function __construct()
    {
        $this->model = BlContractorRequest::class;
    }

    //+++Miniyar 24.05.2019
//    public function listQuery()
//    {
//        $this->contRequests = BlContractorRequest::with('company', 'contractor', 'blstatus', 'blcontRequestType');
//
//        $this->listAdditionalQuery($this->contRequests);
//
//        $this->contRequests = $this->contRequests->has("contractor")
//            ->get()->toArray();
//    }


    public function listQuery()
    {
        $this->list_model = BlContractorRequest::with('company', 'contractor', 'blstatus', 'blcontRequestType');

        $this->listAdditionalQuery($this->list_model);

        $this->list_model = $this->list_model->has("contractor")
            ->get()->toArray();

        return $this;
    }


    public function listOld(Request $request)
    {
//        $contRequests = BlContractorRequest::with('company', 'contractor', 'blstatus', 'blcontRequestType')
//            ->has("contractor")
//            ->get()->toArray();

        $this->listQuery();

        $contrs = Contractor::select(['id', 'contractor_short_name as Contractor'])->where('actual_l', true)
            ->where('deleted_l', false)->get()->toArray();

        $captionName = ['ContractorRequests', 'Name', 'Date', 'Status', 'QueryType', 'Contractor', 'Contractor',
            'LosingDocuments'];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $model = 'App\Models\Controller';
        $mainModel = $model::where('controller_code', class_basename(Route::current()->controller))
            ->value('controller_alias');

        $singleContractor = count($contrs) == 1 ? true : false;

        $res = [];

        foreach ($this->contRequests as $contRequest) {
            $temp = [
                'id' => $contRequest['id'],
                'Date' => Carbon::parse($contRequest['created_at'])->format('d-m-Y H:i:s'),
                'ContractorRequestType' => $contRequest['blcont_request_type']['bl_contractor_request_type_name'],
                'Name' => $contRequest['bl_contractor_request_title'],
                'Status' => $contRequest['blstatus']['bl_status_name'],
                'Contractor' => $contRequest['contractor']['contractor_short_name'],
                //                'Company' => $contRequest['company']['company_short_name'],
            ];

            array_push($res, $temp);
        }

        $list = [
            "main_data_models" => [
                $mainModel => $res,
            ],
            "form_parameters" => [
                "form_title" => $getArrayCaptions['ContractorRequests']['translation_captions']['caption_translation'],
                "form_code" => $mainModel,
                "form_is_dependent" => !$singleContractor, // {if true -> show field} {if false hidden field)
                "form_type" => "list",
                "form_base_data_model" => $mainModel,
                "form_main_data_model_id_field" => "id",
                "form_type_list" => [
                    "form_card_url" => $mainModel,
                    "form_search_field" => "id",
                ],
            ],
            "sets" => $this->getButtonsList(["list_top_left_command_bar", "list_top_dropdown_actions",
                "list_top_right_command_bar", "list_bottom", "list_top"]),
            "links" => [

                ["link_title" => $getArrayCaptions['LosingDocuments']['translation_captions']['caption_translation'],
                    "link_url" => "/faq?id=3",
                    "class" => "btn btn-link-inline",
                    "link_type" => "internal",

                    "img" => ""
                ],
            ],
            "tabs" => [
                [
                    "tab_title" => $getArrayCaptions['ContractorRequests']['translation_captions']['caption_translation'],
                    "blocks_quantity" => 1,
                    "blocks" => [
                        [
                            "block_title" => $getArrayCaptions['ContractorRequests']['translation_captions']['caption_translation'],
                            "block_zone_quantity" => 1,
                            "block_model" => $mainModel,
                            "block_type" => "block_list_base",
                            "block_actions" => [
                                "fillRequest" => true,
                            ],
                            "block_fields" => [
                                ['key' => "actions", 'class' => 'list_checkbox', 'thStyle' => 'width: 5%'],
                                ['key' => "Date", 'sortable' => true, 'class' => '', 'thStyle' => 'width: 20%', 'options_data' => ['search' => ''],
                                    "label" => $getArrayCaptions['Date']['translation_captions']['caption_translation'], "filter" => true],

                                ['key' => "ContractorRequestType", 'sortable' => true, 'class' => '', 'thStyle' => 'width: 20%', 'options_data' => ['search' => ''],
                                    "label" => $getArrayCaptions['QueryType']['translation_captions']['caption_translation'], "filter" => true],

                                ['key' => "Contractor", 'sortable' => true, 'class' => '', 'thStyle' => 'width: 15%',
                                    'label' => $getArrayCaptions['Contractor']['translation_captions']['caption_translation'], "filter" => true],

                                ['key' => "Name", 'sortable' => true, 'class' => '', 'thStyle' => 'width: 20%',
                                    "label" => $getArrayCaptions['Name']['translation_captions']['caption_translation'], "filter" => true],

                                ['key' => "Status", 'sortable' => true, 'class' => '', 'thStyle' => 'width: 15%',
                                    'label' => $getArrayCaptions['Status']['translation_captions']['caption_translation'], "filter" => true]

                                //                                ['key' => "Company", 'sortable' => true, 'class' => '', 'thStyle' => 'width:20%',
                                //                                    'label' => $getArrayCaptions['Company']['translation_captions']['caption_translation'], "filter" => true],
                            ]
                        ],
                    ]
                ]
            ]
        ];

        if (!$singleContractor) {
            $list["add_data_models"] = [
                "Contractors" => $contrs,
            ];
            $list["dependent"] = [
                "dependent_data_model" => $mainModel,
                "dependent_search" => false,
                "allow_creation_if_empty" => true,
                "dependent_fields" =>
                    [
                        "title" => $getArrayCaptions['Contractor']['translation_captions']['caption_translation'],
                        "model" => "id",
                        "type" => "select",
                        "current_value" => "",
                        "options" => [],
                        "options_data" => [
                            "options_data_model" => "Contractors",
                            "options_field_id" => "id",
                            "options_field_id_value" => "",
                            "options_field_title" => "Contractor",
                            "search" => ""
                        ]
                    ]
            ];
        }

        return response()->json($list);
    }


    public function prepareListModelData()
    {
        $models = $this->list_model;
        $this->list_model = [];
        foreach ($models as $model) {
            array_push($this->list_model, [
                'id' => $model['id'],
                'Date' => Carbon::parse($model['created_at'])->format('d-m-Y H:i:s'),
                'ContractorRequestType' => $model['blcont_request_type']['bl_contractor_request_type_name'],
                'Name' => $model['bl_contractor_request_title'],
                'Status' => $model['blstatus']['bl_status_name'],
                'Contractor' => $model['contractor']['contractor_short_name'],
            ]);
        }
        return $this;
    }

    public function setListBlockFields()
    {
        $this->list_block_fields = [
            [
                "block_title" => $this->getTranslatedListCaption('Contractor'),
                "block_zone_quantity" => 1,
                "block_model" => $this->list_controller_alias,
                "block_type" => "block_list_base",
                "block_fields" => [

                    ['key' => 'actions', 'sortable' => false,
                        'class' => 'list_checkbox',
                        'thStyle' => 'width: 6%',
                        "zone" => "1",
                        "order" => "1"
                    ],

                    ['key' => 'Date', 'sortable' => true, 'class' => 'created_at',
                        "label" => $this->getTranslatedListCaption('Date'), 'thStyle' => 'width: 10%', 'typeVal' => 'date', 'format' => 'MM-DD-YYYY',],

                    ['key' => 'ContractorRequestType', 'sortable' => true,
                        "label" => $this->getTranslatedListCaption('QueryType'), 'thStyle' => 'width: 21%'],

                    ['key' => "Contractor", 'sortable' => true,
                        "label" => $this->getTranslatedListCaption('Contractor'), 'thStyle' => 'width: 21%', 'typeVal' => 'number', 'format' => '0,0.00',],
                    ['key' => "Name", 'sortable' => true,
                        "label" => $this->getTranslatedListCaption('Name'), 'thStyle' => 'width: 21%'],
                    ['key' => "Status", 'sortable' => true,
                        "label" => $this->getTranslatedListCaption('Status'), 'thStyle' => 'width: 21%'],

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
            'back', 'Main', 'CreatedAt', 'Database', 'Individual', 'Actual',
            'ContractorRequests', 'Name', 'Date', 'Status', 'QueryType', 'Contractor',
            'LosingDocuments'
        ];

        $this->translateListCaptions();
        return $this;
    }

    public function setListFormSearchField()
    {
        $this->list_form_search_field = "Name";
        return $this;
    }

    public function setListDependent()
    {
        $this->contrs = Contractor::select(['id', 'contractor_short_name as Contractor'])->where('actual_l', true)
            ->where('deleted_l', false)->get()->toArray();
        $this->singleContractor = count($this->contrs) == 1 ? true : false;

        $this->list_dependent = !$this->singleContractor;
        return $this;
    }

    public function setListDependentBlock()
    {
        if (!$this->singleContractor) {

            $this->list_dependent_block = [
                "dependent_data_model" => $this->list_controller_alias,
                "dependent_search" => false,
                "allow_creation_if_empty" => true,
                "dependent_fields" =>
                    [
                        "title" => $this->getTranslatedListCaption('Contractor'),
                        "model" => "id",
                        "type" => "select",
                        "current_value" => "",
                        "options" => [],
                        "options_data" => [
                            "options_data_model" => "Contractors",
                            "options_field_id" => "id",
                            "options_field_id_value" => "",
                            "options_field_title" => "Contractor",
                            "search" => ""
                        ]
                    ]
            ];

        }
        return $this;
    }

    public function setListAddDataModels()
    {
        if (!$this->singleContractor) {

            $this->list_add_data_models = [
                "Contractors" => $this->contrs,
            ];;
        }
        return $this;
    }

    public function setListLinks()
    {
        $this->list_links = [

            ["link_title" => $this->getTranslatedListCaption('LosingDocuments'),
                "link_url" => "/faq?id=3",
                "class" => "btn btn-link-inline",
                "link_type" => "internal",

                "img" => ""
            ],
        ];
        return $this;
    }

    public function setListFormTitle()
    {
        $this->list_form_title = "ContractorRequests";

        return $this;
    }

    //+Работающая карточка
    public function cardDev(Request $request)
    {
        $contReqId = $request->id;
        $owner_id = $request->owner_id;

        if ($contReqId == "new") {
            $contRequest = BlContractorRequest::getNewObject();
        } else {
            $contRequest = BlContractorRequest::with('blstatus', 'blcontRequestType')
                ->where('id', $contReqId)->get()->first()->toArray();
        }

        $contReqTypes = BlContractorRequestType::select('id', 'bl_contractor_request_type_name')->get()->toArray();

        $captionName = ['ContractorRequest', 'Name', 'Date', 'Status', 'Company',
            'ContractorRequestType', 'back', 'Description', 'CreatedAt',
            'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'SystemDetails', 'Theme'];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $model = 'App\Models\Controller';
        $mainModel = $model::where('controller_code', class_basename(Route::current()->controller))
            ->value('controller_alias');

        //+Получение прав доступа

        $nameControllerMethod = [
            'controller' => class_basename(Route::current()->controller),
            'accessRight' => 'record'
        ];

        $formShowParam = (new CheckController($nameControllerMethod))->getShowFormParameters();

        //-Получение прав доступа

        $res = [[ //Итоговый массив рекизитов
            'id' => $contRequest['id'],
            'Date' => $contRequest['created_at'],
            'bl_contractor_request_type_name' => $contRequest['blcont_request_type']['bl_contractor_request_type_name'] ?? null,
            'bl_contractor_request_type_id' => $contRequest['bl_contractor_request_type_id'],
            'bl_contractor_request_title' => $contRequest['bl_contractor_request_title'],
            "db_area_id" => $contRequest['db_area_id'],
            "contractor_id" => $owner_id ?? $contRequest['contractor_id'],
            "company_id" => $contRequest['company_id'],
            "bl_status_id" => $contRequest['bl_status_id'],
            'Status' => $contRequest['blstatus']['bl_status_name'] ?? null,
            'bl_contractor_request_description' => $contRequest['bl_contractor_request_description'] ?? "",
            'created_at' => $contRequest['created_at'],
            'created_by' => $contRequest['created_by'],
            'updated_at' => $contRequest['updated_at'],
            'updated_by' => $contRequest['updated_by'],
        ]];

        $card = [
            "main_data_models" => [
                $mainModel => $res,
            ],
            "add_data_models" => [
                "BlContractorRequestTypes" => $contReqTypes,
            ],
            "sets" => $this->getButtonsList('card_actions'),
            "form_parameters" => [
                "form_title" => $getArrayCaptions['ContractorRequest']['translation_captions']['caption_translation'],
                "form_code" => $mainModel,
                "form_is_dependent" => false, // {if true -> show field} {if false hidden field)
                "form_type" => "card",
                "disable_inputs" => $formShowParam['read_only'],
                "form_base_data_model" => $mainModel,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name" => $res[0]['bl_contractor_request_title'],
                //                "form_type_list" => [
                //                    "form_card_url" => $mainModel,
                //                    "form_search_field" => "contractor_full_name",
                //                ],
            ],
            "tabs" => [
                [
                    "tab_title" => "Главная",
                    "tab_name" => "Главная",
                    "blocks_quantity" => 1,
                    "blocks" => [
                        [
                            "block_title" => $getArrayCaptions['ContractorRequest']['translation_captions']['caption_translation'],
                            "block_zone_quantity" => 1,
                            "block_model" => $mainModel,
                            "block_type" => "block_card",
                            "block_fields" => [
                                ['title' => $getArrayCaptions['Theme']['translation_captions']['caption_translation'], 'model' => 'bl_contractor_request_title', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "1", "border_right" => false],
                                ['title' => $getArrayCaptions['ContractorRequestType']['translation_captions']['caption_translation'],
                                    'model' => 'bl_contractor_request_type_id',
                                    'type' => 'lt-select',
                                    'width' => '25%',
                                    'options' => [],
                                    "options_data" => [
                                        "options_data_model" => "BlContractorRequestTypes",
                                        "options_field_id" => "id",
                                        "options_field_title" => "bl_contractor_request_type_name",
                                        "search" => ""
                                    ],
                                    "zone" => "1",
                                    "order" => "2",
                                    "border_right" => false],
                                ['title' => $getArrayCaptions['Status']['translation_captions']['caption_translation'], 'model' => 'Status', 'type' => 'label', 'width' => '25%', "zone" => "1", "order" => "3", "border_right" => false],
                                ['title' => $getArrayCaptions['Description']['translation_captions']['caption_translation'], 'model' => 'bl_contractor_request_description', 'type' => 'editor', 'width' => '100%', "zone" => "1", "order" => "4", "border_right" => false],
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
                        "block_model" => $mainModel,
                        "block_type" => "block_card",
                        "block_fields" => [
                            ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'],
                                'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1",
                                "order" => "1"
                            ],

                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'],
                                'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1",
                                "order" => "2"
                            ],

                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'],
                                'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2",
                                "order" => "1"
                            ],

                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'],
                                'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2",
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

    //change new  card 19.12.19 Albert

    public function card(Request $request)
    {
        //+Получение переводов

        $captionName = ['ContractorRequest', 'Name', 'Theme', 'Date', 'Status', 'Company', 'Contractor',
            'QueryType', 'back', 'Description', 'CreatedAt',
            'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'SystemDetails', 'Size',
            'Format', 'Actions', 'AttachDocument', 'Draft', 'Contractor'];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        //-Получение переводов

        //+Получение прав доступа

        $nameControllerMethod = [
            'controller' => class_basename(Route::current()->controller),
            'accessRight' => 'record'
        ];

        $formShowParam = (new CheckController($nameControllerMethod))->getShowFormParameters();

        //-Получение прав доступа

        //+Получение вспомогательных данных

        $contReqId = $request->id;

        $controller = 'App\Models\Controller';

        $mainModel = $controller::where('controller_code', class_basename(Route::current()->controller))
            ->select('controller_alias', 'controller_table_n')->first();

        $dbareaFilesModelName = $controller::where('controller_code', "DbAreaFilesController")
            ->pluck('controller_alias')->first();

        $contrsModelTableN = $controller::where('controller_code', 'ContractorsController')->pluck('controller_table_n')
            ->first();

        $contractors = Contractor::select(['id', 'contractor_short_name'])
            ->where('actual_l', true)->orderBy('id')->get()->toArray();

        $contReqTypes = BlContractorRequestType::select('id', 'bl_contractor_request_type_name')
            ->where('actual_l', true)->where('deleted_l', false)->get()->toArray();

        $mainModelName = $mainModel['controller_alias'];
        $dbareaFilesModelTableN = $mainModel['controller_table_n'];
        $singleContractor = count($contractors) == 1 ? true : false;
        $newRequest = $contReqId == "new" ? true : false;

        //-Получение вспомогательных данных

        $dbAreaFiles = [];

        //+Если создаем новый
        if ($newRequest == true) {
            $contReqId = null;
            $contRequest[] = BlContractorRequest::getNewObject();
            //$contRequest['contractor_id'] = $contractors[0]['id'];
            //$contRequest['contractor']['contractor_short_name'] = $singleContractor == true ? $contractors[0]['contractor_short_name'] : "";

            //            $statement = BlContractorRequest::select("SHOW TABLE STATUS LIKE 'BlContractorRequest'");
            //            $nextId = $statement[0]->Auto_increment;
            //            $contrId    = $contractors[0]['id'];
            //
            //            $contRequest[0]['contractor_id'] = $contrId;
            //
            //            $toWrite = [
            //                "main_data_models" => [
            //                    $mainModelName => $contRequest
            //                ],
            //                "form_parameters" => [
            //                    "form_title" => $getArrayCaptions['ContractorRequest']['translation_captions']['caption_translation'],
            //                    "form_code" => $mainModelName,
            //                    "form_is_dependent" => false, // {if true -> show field} {if false hidden field)
            //                    "form_type" => "card",
            //                    "disable_inputs" => $formShowParam['read_only'],
            //                    "form_base_data_model" => $mainModelName,
            //                    "form_main_data_model_id_field" => "id",
            //                    "form_main_data_model_name" => $contRequest[0]['bl_contractor_request_title'],
            //                ],
            //            ];
            //
            //            $req = new Request($toWrite);
            //
            //            //Записываем запрос контрагента и получаем результат записи
            //            $writeRes = $this->write($req);
            //
            //            //Передаем новый id вместо старого(NULL)
            //            $contReqId = $writeRes->original['id'];
        } //-Если создаем новый
        else {
            $contRequest = BlContractorRequest::with('blstatus', 'blcontRequestType', 'contractor')
                ->where('id', $contReqId)
                ->has("contractor")
                ->get()->toArray();

            if (!$contRequest)
                abort(403);

            $dbAreaFiles = DbAreaFile::with('storedFile', 'storedFile.typeFile')
                ->where('row_id_doc', $contReqId)
                ->where('table_n_doc', $dbareaFilesModelTableN)
                ->select("DbAreaFiles.*");

            $dbAreaFiles = $dbAreaFiles->get()->toArray();
        }

        if (isset($contRequest[0]))
            $contRequest = $contRequest[0];

        $contractor_short_name = ($singleContractor == true ? $contractors[0]['contractor_short_name'] :
            ($newRequest == true ? "" : $contRequest['contractor']['contractor_short_name']));
        $contractor_id = ($singleContractor == true ? $contractors[0]['id'] :
            ($newRequest == true ? "" : $contRequest['contractor']['id']));

        $res = [[ //Итоговый массив рекизитов
            'id' => $contReqId,
            'bl_contractor_request_type_name' => isset($contRequest['blcont_request_type']) && !$contRequest['blcont_request_type']['deleted_l'] ?? false && $contRequest['blcont_request_type']['actual_l'] ?
                    $contRequest['blcont_request_type']['bl_contractor_request_type_name'] : null,
            'bl_contractor_request_title' => $contRequest['bl_contractor_request_title'],
            'status' => $contRequest['blstatus']['bl_status_name'] ?? '',
            'bl_status_id' => $contRequest['bl_status_id'],
            'bl_contractor_request_description' => $contRequest['bl_contractor_request_description'] ?? '',
            'sent_l' => $contRequest['sent_l'],
            'created_at' => $contRequest['created_at'],
            'created_by' => $contRequest['created_by'],
            'updated_at' => $contRequest['updated_at'],
            'updated_by' => $contRequest['updated_by'],
            'contractor_short_name' => $contractor_short_name,
            "db_area_id" => $contRequest['db_area_id'],
            'bl_contractor_request_type_id' => $contRequest['bl_contractor_request_type_id'],
            "contractor_id" => $contractor_id,
            "company_id" => $contRequest['company_id'],
        ]];

        $form_main_data_model_name = $res[0]['bl_contractor_request_type_name'] .
            (empty($res[0]['bl_contractor_request_title']) ? '' : ' - ') . $res[0]['bl_contractor_request_title'];

        //+ Тестирование присоединенных файлов

        $AttFiles[] = [
            "files" => []
        ];

        foreach ($dbAreaFiles as $key => $dbAreaFile) {
            $AttFiles[0]['files'][] = [
                'id' => $dbAreaFile['id'],
                'db_area_file_name' => $dbAreaFile['db_area_file_name'],
                'stored_file_id' => $dbAreaFile['stored_file_id'],
                'size' => FileManager::convertBytesToString($dbAreaFile['stored_file']['stored_file_size']),
                'extension' => $dbAreaFile['stored_file']['type_file']['file_type_code'] ?? "",
                //                'bl_att_doc_kind_id' => $dbAreaFile['bl_att_doc_kind_id'],
                //                'table_n_owner' => $dbAreaFile['table_n_owner'],
                //                'row_id_owner' => $dbAreaFile['row_id_owner'],
                //                'table_n_doc' => $dbAreaFile['table_n_doc'],
                //                'row_id_doc' => $dbAreaFile['row_id_doc'],
                //                'db_area_id' => $dbAreaFile['db_area_id'],
                //                'uid_1c_code' => $dbAreaFile['uid_1c_code'],
                //                'deleted_l' => $dbAreaFile['deleted_l'],
                //                'created_by' => $dbAreaFile['created_by'],
                //                'updated_by' => $dbAreaFile['updated_by'],
                //                'created_at' => $dbAreaFile['created_at'],
                //                'updated_at' => $dbAreaFile['updated_at'],
                //                'mime' => "",
            ];
        }

        $emptyFile[] = [
            'id' => null,
            'db_area_file_name' => null,
            'stored_file_id' => null,
            'bl_att_doc_kind_id' => null,
            'table_n_owner' => $contrsModelTableN,
            'row_id_owner' => $res['contractor_id'] ?? null,
            'table_n_doc' => $dbareaFilesModelTableN,
            'row_id_doc' => $contReqId,
            'db_area_id' => self::getDefaultDBAreaId(),
            'uid_1c_code' => null,
            'deleted_l' => false,
            'created_by' => "",
            'updated_by' => "",
            'created_at' => "",
            'updated_at' => "",
            'stored_file_bd' => "",
            'stored_file_size' => "",
            'stored_file_ext' => "",
        ];

        //- Тестирование присоединенных файлов

        //+Заполняем карточку

        $card = [
            "main_data_models" => [
                $mainModelName => $res,
                //+ Тестирование присоединенных файлов
                $dbareaFilesModelName => $AttFiles,
                //- Тестирование присоединенных файлов
            ],
            "add_data_models" => [
                "BlContractorRequestTypes" => $contReqTypes,
                "Contractors" => $contractors,
            ],
            "sets" => $contRequest["sent_l"] ? null : $this->getButtonsList(['request_card_send_save']),
            "form_parameters" => [
                "form_title" => (!$contRequest['sent_l']) ? $getArrayCaptions['Draft']['translation_captions']['caption_translation'] : $res[0]['status'],//$getArrayCaptions['ContractorRequest']['translation_captions']['caption_translation'],
                "form_code" => $mainModelName,
                "form_is_dependent" => false, // {if true -> show field} {if false hidden field)
                "form_type" => "card",
                "disable_inputs" => $formShowParam['read_only'] || $contRequest['sent_l'],
                "form_base_data_model" => $mainModelName,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name" => $form_main_data_model_name,
                //                "form_type_list" => [
                //                    "form_card_url" => $mainModel,
                //                    "form_search_field" => "contractor_full_name",
                //                ],
            ],
            "tabs" => [
                [
                    "tab_title" => "Главная",
                    "blocks_quantity" => 1,
                    "blocks" => [
                        [
                            "block_title" => $getArrayCaptions['ContractorRequest']['translation_captions']['caption_translation'],
                            "block_zone_quantity" => 1,
                            "block_width" => "50%",
                            "block_model" => $mainModelName,
                            "block_type" => "block_card",
                            "block_fields" => [
                                ['title' => $getArrayCaptions['Theme']['translation_captions']['caption_translation'], 'model_name' => $mainModelName, 'model' => 'bl_contractor_request_title', 'type' => 'text', 'width' => '100%', "zone" => "1", "order" => "1", "border_right" => false],
                                $singleContractor == false ?
                                    ['title' => $getArrayCaptions['Contractor']['translation_captions']['caption_translation'],
                                        'model' => 'contractor_id',
                                        'model_name' => $mainModelName,
                                        'type' => 'vue-select',
                                        'width' => '100%',
                                        'options' => [],
                                        "options_data" => [
                                            "options_data_model" => "Contractors",
                                            "options_field_id" => "id",
                                            "options_field_title" => "contractor_short_name",
                                            "search" => ""
                                        ],
                                        "zone" => "1",
                                        "order" => "2",
                                        "border_right" => false,
                                        "validation" => ["required" => true]] :
                                    ['title' => $getArrayCaptions['Contractor']['translation_captions']['caption_translation'], 'model_name' => $mainModelName, 'model' => 'contractor_short_name', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "2", "border_right" => false, 'validation' => ['required' => true]],
                                ['title' => $getArrayCaptions['QueryType']['translation_captions']['caption_translation'],
                                    'model' => 'bl_contractor_request_type_id',
                                    'model_name' => $mainModelName,
                                    'type' => 'vue-select',
                                    'width' => '50%',
                                    'options' => [],
                                    "options_data" => [
                                        "options_data_model" => "BlContractorRequestTypes",
                                        "options_field_id" => "id",
                                        "options_field_title" => "bl_contractor_request_type_name",
                                        "search" => ""
                                    ],
                                    "zone" => "1",
                                    "order" => "3",
                                    "border_right" => false,
                                    "validation" => ["required" => true]],
                                ['title' => $getArrayCaptions['Status']['translation_captions']['caption_translation'], 'model' => 'status', 'model_name' => $mainModelName, 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "4", "border_right" => false],
                                ['title' => $getArrayCaptions['Description']['translation_captions']['caption_translation'], 'model_name' => $mainModelName, 'model' => 'bl_contractor_request_description', 'type' => 'textarea', 'width' => '100%', "zone" => "1", "order" => "5", "border_right" => false],
                            ]
                        ]
                    ]
                ],
            ]
        ];

        If ($contReqId != null) {
            array_push($card['tabs'][0]['blocks'], [
                "form_is_dependent" => false,
                "block_title" => "Присоединенные файлы",
                "block_zone_quantity" => 1,
                "block_width" => "50%",
                "block_model" => $dbareaFilesModelName,
                "block_type" => "block_card",
                "block_fields" => [
                    [
                        'title' => $getArrayCaptions['AttachDocument']['translation_captions']['caption_translation'],
                        'model' => 'files',
                        'item_actions' => $this->getButtonsList([($contRequest['sent_l']) ? 'att_file_download' : 'att_file_bar']),
                        'type' => 'file_loader',
                        'model_name' => $dbareaFilesModelName,
                        'fields' => [
                            ['label' => $getArrayCaptions['Name']['translation_captions']['caption_translation'], 'key' => 'db_area_file_name', 'class' => 'file-loader-name'],
                            ['label' => $getArrayCaptions['Format']['translation_captions']['caption_translation'], 'key' => 'extension'],
                            ['label' => $getArrayCaptions['Size']['translation_captions']['caption_translation'], 'key' => 'size'],
                            ['label' => $getArrayCaptions['Actions']['translation_captions']['caption_translation'], 'key' => 'list_actions'],
                        ],
                        'validation' => ['size' => 3072, 'ext' => array('jpg', 'jpeg', 'png', 'pdf')],
                        'width' => '100%',
                        "zone" => "1",
                        "order" => "4",

                        "border_right" => false,
                        'empty_model' => [$dbareaFilesModelName => $emptyFile],
                    ],
                ]
            ]);
            $card['tabs'][0]['blocks_quantity'] = 2;
        }

        //-Заполняем карточку

        //+Проверка на доступ к системным данным

        if ($formShowParam['show_system_tab']) {

            $systemTab = [

                "tab_title" => $getArrayCaptions['SystemDetails']['translation_captions']['caption_translation'],
                "blocks_quantity" => 1,
                "blocks" => [
                    [
                        //
                        //"block_title" => $getArrayCaptions['CreationDetails']['translation_captions']['caption_translation'],
                        "block_zone_quantity" => 2,
                        "block_model" => $mainModelName,
                        "block_type" => "block_card",
                        "block_fields" => [
                            ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'],
                                'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1",
                                "order" => "1"
                            ],

                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'],
                                'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1",
                                "order" => "2"
                            ],

                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'],
                                'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2",
                                "order" => "1"
                            ],

                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'],
                                'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2",
                                "order" => "2"
                            ],
                        ]
                    ]
                ]
            ];

            array_push($card['tabs'], $systemTab);
        }

        //-Проверка на доступ к системным данным

        return response()->json($card);
    }

    protected function cardQuery()
    {
        $request = request();

        $this->contReqId = $request->id;


        $this->setIsNewObject($this->contReqId === "new");

        if ($this->isNewObject()) {
            $nameControllerMethod = [
                'controller' => class_basename(\Route::current()->controller),
                'method' => 'insert'
            ];

            $objAccess = (new CheckController($nameControllerMethod));
            $access = $objAccess->checkControllerAccessRight();


            if ($access === false) {
                return abort('403');
            }

            $this->card_model = BlContractorRequest::getNewObject();
//            $this->contractor_info_count = NULL;
            $this->contReqId = NULL;

            $this->cardAdditionalQuery($this->card_model);
        } else {

            $this->card_model = BlContractorRequest::with('blstatus', 'blcontRequestType', 'contractor')
                ->where('id', $this->contReqId)
                ->has("contractor");

            if (!$this->card_model)
                return abort('403');
            $this->cardAdditionalQuery($this->card_model);

            $this->card_model = $this->card_model->first();

//            $this->contractor_info_count = $this->card_model->contractorinfo()->count();

            $this->card_model = $this->card_model->toArray();

        }

        $controller = 'App\Models\Controller';
        $mainModel = $controller::where('controller_code', class_basename(Route::current()->controller))
            ->select('controller_alias', 'controller_table_n')->first();

        $this->dbareaFilesModelName = $controller::where('controller_code', "DbAreaFilesController")
            ->pluck('controller_alias')->first();

        $this->dbareaFilesModelTableN = $mainModel['controller_table_n'];


        $this->contrsModelTableN = $controller::where('controller_code', 'ContractorsController')->pluck('controller_table_n')
            ->first();

        return $this;
    }

    public function setCardMainDataModels(): self
    {
        if(!$this->isNewObject())
        {
            $AttFiles[] = [
                "files" => []
            ];
            $dbAreaFiles = DbAreaFile::with('storedFile', 'storedFile.typeFile')
                ->where('row_id_doc', $this->contReqId)
                ->where('table_n_doc', $this->dbareaFilesModelTableN)
                ->select("DbAreaFiles.*")
                ->get()->toArray();

            foreach($dbAreaFiles as $key => $dbAreaFile)
            {
                $AttFiles[0]['files'][] = [
                    'id'                => $dbAreaFile['id'],
                    'db_area_file_name' => $dbAreaFile['db_area_file_name'],
                    'stored_file_id'    => $dbAreaFile['stored_file_id'],
                    'size'              => FileManager::convertBytesToString($dbAreaFile['stored_file']['stored_file_size']),
                    'extension'         => $dbAreaFile['stored_file']['type_file']['file_type_code'] ?? "",
                ];
            }



            $this->card_main_data_models = [
                $this->dbareaFilesModelName => $AttFiles
            ];

        }
        else
        {
            $this->card_main_data_models = [];
        }

        return $this;
    }

    public function prepareCardModelData()
    {
        $model = $this->card_model;

        $this->card_model = [
            [
                'id' => $model['id'],

                'bl_contractor_request_type_name' => isset($model['blcont_request_type'])
                    && !$model['blcont_request_type']['deleted_l'] ?? false && $model['blcont_request_type']['actual_l'] ?
                        $model['blcont_request_type']['bl_contractor_request_type_name'] : null,
                'bl_contractor_request_title' => $model['bl_contractor_request_title'],
                'status' => $model['blstatus']['bl_status_name'] ?? '',
                'bl_status_id' => $model['bl_status_id'],
                'bl_contractor_request_description' => $model['bl_contractor_request_description'] ?? '',
                'sent_l' => $model['sent_l'],
                'created_at' => $model['created_at'],
                'created_by' => $model['created_by'],
                'updated_at' => $model['updated_at'],
                'updated_by' => $model['updated_by'],
//                'contractor_short_name' => $model['contractor']['contractor_short_name'],
                'contractor_short_name' => ($this->isNewObject()) ? '' : $model['contractor']['contractor_short_name'],
                "db_area_id" => $model['db_area_id'],
                'bl_contractor_request_type_id' => $model['bl_contractor_request_type_id'],
                "contractor_id" => $model['contractor_id'],
                "company_id" => $model['company_id']
            ]
        ];

//        $this->card_main_data_model_name =  $model['bl_contractor_request_type_name'] .
//            (empty($model['bl_contractor_request_title']) ? '' : ' - ') . $model['bl_contractor_request_title'];


//        $this->card_main_data_model_name = $model['blcont_request_type']['bl_contractor_request_type_name'] . (empty($model['bl_contractor_request_title']) ? '' : ' - ') . $model['bl_contractor_request_title'];
//        $this->card_main_data_model_name = $model['blcont_request_type']['bl_contractor_request_type_name'] ?? '';
        return $this;
    }

    /**
     * @return $this
     */
    public function setCardSetsList(): self
    {
        $this->card_sets_list = ['request_card_send_save'];

        return $this;
    }

    public function setCardCaptions(): self
    {
        $this->card_captions = [
            'Main','ContractorRequest', 'Name', 'Theme', 'Date', 'Status', 'Company', 'Contractor', 'new',
            'QueryType', 'back', 'Description', 'CreatedAt',
            'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'SystemDetails', 'Size',
            'Format', 'Actions', 'AttachDocument', 'Draft', 'Contractor'
        ];

        $this->translateCardCaptions();

        return $this;
    }

    public function setCardAddDataModels(): self
    {
        $contractors = Contractor::select(['id', 'contractor_short_name'])
            ->where('actual_l', true)->orderBy('id')->get()->toArray();

        $contReqTypes = BlContractorRequestType::select('id', 'bl_contractor_request_type_name')
            ->where('actual_l', true)->where('deleted_l', false)->get()->toArray();

        $this->card_add_data_models = [
            "BlContractorRequestTypes" => $contReqTypes,
            "Contractors" => $contractors,
        ];

        return $this;
    }


    public function setCardBlockFields()
    {
        $contractors = Contractor::select(['id', 'contractor_short_name'])
            ->where('actual_l', true)->orderBy('id')->get()->toArray();

        $singleContractor = count($contractors) == 1 ? true : false;
        $this->card_block_fields = [
            [
                "tab_title" => $this->getTranslatedCardCaption("Main"),
                "tab_description" => '',
                "blocks_quantity" => 1,
                "blocks" => [
                    [
                        "block_title" => $this->getTranslatedCardCaption("ContractorRequest"),
                        "block_zone_quantity" => 1,
                        "block_width" => "50%",
                        "block_model" => $this->card_controller_alias,
                        "block_type" => "block_card",
                        "block_fields" => [
                            ['title' => $this->getTranslatedCardCaption("Theme"), 'model_name' => $this->card_controller_alias, 'model' => 'bl_contractor_request_title', 'type' => 'text', 'width' => '100%', "zone" => "1", "order" => "1", "border_right" => false],
                            $singleContractor == false ?
                                ['title' => $this->getTranslatedCardCaption("Contractor"),
                                    'model' => 'contractor_id',
                                    'model_name' => $this->card_controller_alias,
                                    'type' => 'vue-select',
                                    'width' => '100%',
                                    'options' => [],
                                    "options_data" => [
                                        "options_data_model" => "Contractors",
                                        "options_field_id" => "id",
                                        "options_field_title" => "contractor_short_name",
                                        "search" => ""
                                    ],
                                    "zone" => "1",
                                    "order" => "2",
                                    "border_right" => false,
                                    "validation" => ["required" => true]] :
                                ['title' => $this->getTranslatedCardCaption("Contractor"), 'model_name' => $this->card_controller_alias, 'model' => 'contractor_short_name', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "2", "border_right" => false, 'validation' => ['required' => true]],
                            ['title' => $this->getTranslatedCardCaption("QueryType"),
                                'model' => 'bl_contractor_request_type_id',
                                'model_name' => $this->card_controller_alias,
                                'type' => 'vue-select',
                                'width' => '50%',
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => "BlContractorRequestTypes",
                                    "options_field_id" => "id",
                                    "options_field_title" => "bl_contractor_request_type_name",
                                    "search" => ""
                                ],
                                "zone" => "1",
                                "order" => "3",
                                "border_right" => false,
                                "validation" => ["required" => true]],
                            ['title' => $this->getTranslatedCardCaption("Status"), 'model' => 'status', 'model_name' => $this->card_controller_alias, 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "4", "border_right" => false],
                            ['title' => $this->getTranslatedCardCaption("Description"), 'model_name' => $this->card_controller_alias, 'model' => 'bl_contractor_request_description', 'type' => 'textarea', 'width' => '100%', "zone" => "1", "order" => "5", "border_right" => false],
                        ]
                    ]
                ],
            ]
        ];


        If (!$this->isNewObject()) {
            $emptyFile[] = [
                'id'                 => null,
                'db_area_file_name'  => null,
                'stored_file_id'     => null,
                'bl_att_doc_kind_id' => null,
                'table_n_owner'      => $this->contrsModelTableN,
                'row_id_owner'       => $this->card_model['contractor_id'] ?? null,
                'table_n_doc'        => $this->dbareaFilesModelTableN,
                'row_id_doc'         => $this->contReqId,
                'db_area_id'         => self::getDefaultDBAreaId(),
                'uid_1c_code'        => null,
                'deleted_l'          => false,
                'created_by'         => "",
                'updated_by'         => "",
                'created_at'         => "",
                'updated_at'         => "",
                'stored_file_bd'     => "",
                'stored_file_size'   => "",
                'stored_file_ext'    => "",
            ];

            array_push($this->card_block_fields[0]['blocks'], [
                "form_is_dependent" => false,
                "block_title" => "Присоединенные файлы",
                "block_zone_quantity" => 1,
                "block_width" => "50%",
                "block_model" => $this->dbareaFilesModelName,
                "block_type" => "block_card",
                "block_fields" => [
                    [
                        'title' => $this->getTranslatedCardCaption("AttachDocument"),
                        'model' => 'files',
                        'item_actions' => $this->getButtonsList([($this->card_model[0]['sent_l']) ? 'att_file_download' : 'att_file_bar']),
                        'type' => 'file_loader',
                        'model_name' => $this->dbareaFilesModelName,
                        'fields' => [
                            ['label' => $this->getTranslatedCardCaption("Name"), 'key' => 'db_area_file_name', 'class' => 'file-loader-name'],
                            ['label' => $this->getTranslatedCardCaption("Format"), 'key' => 'extension'],
                            ['label' => $this->getTranslatedCardCaption("Size"), 'key' => 'size'],
                            ['label' => $this->getTranslatedCardCaption("Actions"), 'key' => 'list_actions'],
                        ],
                        'validation' => ['size' => 3072, 'ext' => array('jpg', 'jpeg', 'png', 'pdf')],
                        'width' => '100%',
                        "zone" => "1",
                        "order" => "4",
                        "border_right" => false,
                        'empty_model' => [$this->dbareaFilesModelName => $emptyFile],
                    ],
                ]
            ]);
            $card['tabs'][0]['blocks_quantity'] = 2;
        }

        return $this;
    }

    public function setCardFormTitle(): self
    {
        $this->card_form_title = (!$this->contRequest['sent_l']) ? 'Draft' : $this->model[0]['status'];

        return $this;
    }

    public function setCardMainDataModelName(): self
    {
//        $this->card_main_data_model_name =  ($this->isNewObject()) ? $this->getTranslatedCardCaption("new") : $this->card_model[0]['contractor']["contractor_short_name"];
        $this->card_main_data_model_name =  $this->card_model[0]['bl_contractor_request_type_name'] .
            (empty($this->card_model[0]['bl_contractor_request_title']) ? '' : ' - ') . $this->card_model[0]['bl_contractor_request_title'];


//        $this->card_main_data_model_name =    ($this->isNewObject()) ? $this->getTranslatedCardCaption("new") : $this->card_model[0]['contractor_short_name'];
        return $this;
    }

    public function setCardLinks(): self
    {
        if (!$this->isNewObject()) {
            $request = request();

            $contact_persons_count = ContactPerson::query()
                ->join("__Controllers as controllers", function (JoinClause $join) {
                    $join->on("ContactPersons.table_n_owner", "=", "controllers.controller_table_n")
                        ->where("controllers.controller_code", "=", "ContractorsController");
                })
                ->where("ContactPersons.row_id_owner", $request->id)
                ->count();

            $contact_persons_link_title = $this->getTranslatedCardCaption("ContactPersons");

            if ($contact_persons_count > 0)
                $contact_persons_link_title .= " ( $contact_persons_count )";

            $contact_info_link_title = $this->getTranslatedCardCaption("ContractorsContactInfo");

//            if ($this->contractor_info_count > 0)
//                $contact_info_link_title .= " ( $this->contractor_info_count )";
//
//            $this->card_links = [
//                [
//                    "link_title" => $contact_info_link_title,
//                    "link_img" => "",
//                    "link_type" => "internal_push",
//                    "link_url" => "/contactInfo"
//                ],
//                [
//                    "link_title" => $contact_persons_link_title,
//                    "link_img" => "",
//                    "link_type" => "internal_push",
//                    "link_url" => "/contactPerson"
//                ],
//            ];
        }

        return $this;
    }


    //---Miniyar 24.05.2019
    public function insert(Request $request)
    {
        return response()->json($request);
    }

    public function update()
    {

    }


    public function beforeWriteBeT(&$bCancel)
    {
        parent::beforeWriteBe($bCancel); // TODO: Change the autogenerated stub
    }

    protected function listAdditionalQuery(Builder $builder)
    {

    }
}
