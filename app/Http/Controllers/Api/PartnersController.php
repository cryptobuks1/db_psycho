<?php

namespace App\Http\Controllers\Api;

use App\Http\Classes\CheckController;
use App\Http\Controllers\Api\BL\BlContractorRequestsController;
use App\Http\Traits\HasCard;
use App\Http\Traits\HasList;
use App\Models\BL\BlContractorRequest;
use App\Models\BL\BlContractorRequestType;
use App\Models\Consumer;
use App\Models\Contractor;
use App\Models\DbArea;
use App\Models\DBase;
use App\Models\Partner;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class PartnersController extends Controller
{
    use HasList, HasCard;
    public $partnerPointsCount;
    public $partnerPointsRegionsCount;
    public $countPartnerEmployee;
    public $partnerRegionsName;
    public $showPartnerRegions;
    public $isset_dependent;
    public $partnerPointsRegions;

    public function __construct()
    {
        $this->model = Partner::class;
    }

    public function listold(Request $request)
    {
        $captionName = [
            'ok',
            'apply',
            'back', 'Main',
            'Partners', 'Contractors', 'Code', 'Name',
            'Consumer', 'Database', 'Actual', 'DeleteMark',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy',
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $model = 'App\Models\Controller';
        $mainModel = $model::where('controller_code', class_basename(Route::current()->controller))
            ->value('controller_alias');

        $Partners = DB::table('Partners')
            ->leftJoin('Contractors', 'Partners.contractor_id', '=', 'Contractors.id')
            ->select('Partners.id', 'Partners.partner_name', 'Partners.contractor_id', 'Partners.actual_l', 'Contractors.contractor_short_name')->get()->toarray();

        $Partners = json_decode(json_encode($Partners), true);

        $list = [

            "main_data_models" => [
                $mainModel => $Partners,
            ],
            "sets" => $this->getButtonsList(['list_bottom', 'list_top', 'list_top_dropdown_actions', 'list_top_left_command_bar', 'list_top_right_command_bar']),
            "form_parameters" => [
                "form_title" => $getArrayCaptions['Partners']['translation_captions']['caption_translation'],
                "form_code" => $mainModel,
                "form_is_dependent" => false,
                "form_type" => "list",
                "list_header_break_line" => true,
                "form_base_data_model" => $mainModel,
                "form_main_data_model_id_field" => "id",
                "form_type_list" => [

                    "form_card_url" => "Partner",
                    "form_search_field" => "partner_name",
                ],
            ],
            "links" => [
//                [
//                    "link_title" => $getArrayCaptions['DatabaseServers']['translation_captions']['caption_translation'],
//                    "link_url"   => "/serversDb",
//                    "class"      => "btn btn-link-inline",
//                    "link_type"  => "internal",
//                    "img"        => ""
//                ],
//                [
//                    "link_title" => $getArrayCaptions['DBList']['translation_captions']['caption_translation'],
//                    "link_url"   => "/dbs",
//                    "class"      => "btn btn-link-inline",
//                    "link_type"  => "internal",
//                    "img"        => ""
//                ],
            ],
            "tabs" => [

                [
                    "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                    "blocks_quantity" => 1,
                    "blocks" => [

                        [
                            // "block_title" => 'blockDbAreas',
                            "block_zone_quantity" => 1,
                            "block_model" => $mainModel,
                            "block_type" => "block_list_base",
                            "block_fields" => [

                                [
                                    'key' => 'actions', 'type' => 'checkbox',
                                    'sortable' => false,
                                    'class' => 'list_checkbox',
                                    'thStyle' => 'width: 6%',
                                    "zone" => "1",
                                    "order" => "1"
                                ],

                                [
                                    'key' => 'deleted_l', 'type' => 'checkbox',
                                    'sortable' => false,
                                    'label' => $getArrayCaptions['DeleteMark']['translation_captions']['caption_translation'],
                                    'class' => '',
                                    'thStyle' => 'width: 8%',
                                    "zone" => "1",
                                    "order" => "2"
                                ],

                                [
                                    'key' => 'actual_l', 'type' => 'checkbox',
                                    'sortable' => false,
                                    'label' => $getArrayCaptions['Actual']['translation_captions']['caption_translation'],
                                    'class' => '',
                                    'thStyle' => 'width: 8%',
                                    "zone" => "1",
                                    "order" => "3"
                                ],

                                [
                                    'key' => 'contractor_short_name',
                                    'sortable' => true,
                                    'class' => 'contractor_short_name',
                                    'label' => $getArrayCaptions['Contractors']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 38%',
                                    "zone" => "1",
                                    "order" => "4"
                                ],

                                [
                                    'key' => 'partner_name',
                                    'sortable' => true,
                                    'class' => 'partner_name',
                                    'label' => $getArrayCaptions['Partners']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 40%',
                                    "zone" => "1",
                                    "order" => "5"
                                ],
                            ]
                        ]
                    ]
                ],
            ]
        ];
        return response()->json($list);
    }

    public function listQuery()
    {
        $this->list_model = Partner::leftJoin('Contractors', 'Partners.contractor_id', '=', 'Contractors.id')
            ->select('Partners.id', 'Partners.partner_name', 'Partners.contractor_id', 'Partners.actual_l', 'Partners.deleted_l', 'Contractors.contractor_short_name');

        $this->listAdditionalQuery($this->list_model);

        $this->list_model = $this->list_model->get()->toArray();

        return $this;
    }

    public function prepareListModelData()
    {
        $models = $this->list_model;

        $this->list_model = [];

        foreach ($models as $model) {
            array_push($this->list_model, [
                'id' => $model['id'],
                'deleted_l' => $model['deleted_l'],
                'actual_l' => $model['actual_l'],
                'contractor_short_name' => $model['contractor_short_name'],
                'partner_name' => $model['partner_name'],
            ]);
        }
        return $this;
    }

    public function setListBlockFields()
    {
        $this->list_block_fields = [
            [
                "block_title" => $this->getTranslatedListCaption('Partner'),
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

                    ['key' => 'deleted_l', 'sortable' => false, 'type' => 'checkbox',
                        "label" => $this->getTranslatedListCaption('DeleteMark'), 'thStyle' => 'width: 8%',
                        'zone' => '1', 'order' => '2'
                    ],

                    ['key' => 'actual_l', 'sortable' => false, 'type' => 'checkbox',
                        "label" => $this->getTranslatedListCaption('Actual'), 'thStyle' => 'width: 8%', 'zone' => '1', 'order' => '3'
                    ],

                    ['key' => "contractor_short_name", 'sortable' => true,
                        "label" => $this->getTranslatedListCaption('Contractors'), 'thStyle' => 'width: 38%', 'zone' => '1', 'order' => '4'
                    ],

                    ['key' => "partner_name", 'sortable' => true,
                        "label" => $this->getTranslatedListCaption('Partners'), 'thStyle' => 'width: 40%', 'zone' => '1', 'order' => '5'
                    ],
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
            'Partners', 'Contractors', 'Code', 'Name',
            'Consumer', 'Database', 'Actual', 'DeleteMark',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy',
        ];

        $this->translateListCaptions();
        return $this;
    }

//    public function setListFormSearchField()
//    {
//        $this->list_form_search_field = "partner_name";
//        return $this;
//    }
//
//    public function setListFormTitle()
//    {
//        $this->list_form_title = "Partners";
//
//        return $this;
//    }

    protected function listAdditionalQuery(Builder $builder)
    {

    }

    public function cardold(Request $request)
    {
        $captionName = [
            'ok',
            'apply',
            'back', 'Main', 'CreatedAt',
            'CreatedBy', 'UpdatedAt', 'UpdatedBy',
            'SystemDetails', 'Name', 'Partner', 'PrimaryContractor', 'DeletedL', 'UseRegions', 'PartnerPoints', 'PartnerRegions',
            'Uid1cCode', 'Actual', 'ConsumerNameDefault', 'PartnerEmployees', 'new'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        /*if (strpos($request->id, 'new') !== false) {
            $Partners = [Partner::getNewObject()];
        } else {

            $Partners = DB::table('Partners')
                ->leftJoin('Contractors', 'Partners.contractor_id', '=', 'Contractors.id')
                ->select('Partners.partner_name', 'Partners.contractor_id', 'Partners.actual_l', 'Partners.use_regions', 'Contractors.contractor_short_name')
                ->where('Partners.id', $request->id)
                ->get()->toarray();

            $Partners = json_decode(json_encode($Partners), true);
        }*/


        $contReqId = $request->id;
        $countPartnerEmployee = 0;
        if ($contReqId == "new") {

            $nameControllerMethod = [
                'controller' => class_basename(Route::current()->controller),
                'method' => 'insert'
            ];

            $objAccess = (new CheckController($nameControllerMethod));
            $access = $objAccess->checkControllerAccessRight();

            if ($access === false) {
                return abort('403');
            }

            $contRequest = Partner::getNewObject();
            $partnerPointsRegions = null;

            $partnerPointsCount = 0;
            $partnerPointsRegionsCount = NULL;

        } else {
            $contRequest = Partner::with([
                'contractor' => function ($query) {
                    $query->select('id', 'contractor_short_name');
                },
                'dbArea' => function ($query) {
                    $query->select('id', 'db_area_name');
                },
                'partnerEmployee' => function ($query) {
                    $query->select('id', 'partner_employee_name', 'partner_id');
                },
                'partnerPoint' => function ($query) {
                    $query->select('id', 'partner_point_name', 'partner_id');
                },
                'partnerRegion' => function ($query) {
                    $query->select('id', 'partner_regions_name', 'partner_id');
                }
            ])
                ->where('id', $contReqId)->first()->toArray();


            $partnerPointsCount = count($contRequest['partner_point']);
            $partnerPointsRegionsCount = count($contRequest['partner_region']);
            $countPartnerEmployee = count($contRequest['partner_employee']);


            if ($contRequest['use_regions'] == true) {

                $partner_regions_link_title = $getArrayCaptions['PartnerRegions']['translation_captions']['caption_translation'];
                if ($partnerPointsRegionsCount > 0)
                    $partner_regions_link_title .= " ( $partnerPointsRegionsCount )";

                $this->partnerPointsRegions = [
                    "link_title" => $partner_regions_link_title,
                    "link_img" => "",
                    "link_type" => "internal_push",
                    "link_url" => "/partnerRegions"
                ];
            }
        }
        $Contractor = Contractor::get()->all();

        $model = 'App\Models\Controller';
        $mainModel = $model::where('controller_code', class_basename(Route::current()->controller))
            ->value('controller_alias');

        $nameControllerMethod = [
            'controller' => class_basename(Route::current()->controller),
            'accessRight' => 'record'
        ];
        $formShowParam = (new CheckController($nameControllerMethod))->getShowFormParameters();

        $tabs = [
            [

                "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                "blocks_quantity" => 1,
                "blocks" => [

                    [

                        "block_zone_quantity" => 2,
                        "block_model" => $mainModel,
                        "block_type" => "block_card",
                        "block_fields" => [
                            [
                                'title' => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                'model_name' => $mainModel,
                                'model' => 'partner_name',
                                'width' => '40%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '1'
                            ],
                            [
                                'title' => $getArrayCaptions['PrimaryContractor']['translation_captions']['caption_translation'],
                                'model_name' => $mainModel,
                                'model' => 'contractor_id',
                                'width' => '40%',
                                'type' => 'vue-select',
                                'zone' => '1',
                                'order' => '2',
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => "Contractor",
                                    "options_field_id" => "id",
                                    "options_field_title" => "contractor_short_name",
                                    "options_field_id_value" => "",
                                    "search" => ""
                                ],
                            ],

                            [
                                'title' => $getArrayCaptions['UseRegions']['translation_captions']['caption_translation'],
                                'model_name' => $mainModel,
                                'model' => 'use_regions',
                                'width' => '20%',
                                'type' => 'checkbox',
                                'zone' => '1',
                                'order' => '3'
                            ],

                        ]
                    ]
                ]
            ],
        ];
        if ($formShowParam['show_system_tab']) {
            $tabSystem = [
                "tab_title" => $getArrayCaptions['SystemDetails']['translation_captions']['caption_translation'],
                "tab_name" => $getArrayCaptions['SystemDetails']['translation_captions']['caption_translation'],
                "tab_description" => '',
                "blocks_quantity" => 1,
                "blocks" => [
                    [
                        "block_title" => "Block1",
                        "block_zone_quantity" => 2,
                        "block_model" => $mainModel,
                        "block_type" => "block_card",
                        "block_fields" => [
                            ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "1"],
                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "2"],
                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "1"],
                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "2"],
                            [
                                'title' => $getArrayCaptions['Actual']['translation_captions']['caption_translation'],
                                'model_name' => $mainModel,
                                'model' => 'actual_l',
                                'width' => '50%',
                                'type' => 'checkbox',
                                'zone' => '1',
                                'order' => '4'
                            ],
                        ]
                    ]
                ]
            ];
            array_push($tabs, $tabSystem);
        }

        $res = [[ //Итоговый массив рекизитов
            'id' => $contRequest['id'],
            'db_area_id' => $contRequest['db_area_id'],
            'use_regions' => $contRequest['use_regions'],
            'contractor_id' => $contRequest['contractor_id'] ?? null,
            'contractor_short_name' => $contRequest['contractor'][0]['contractor_short_name'] ?? null,
            'partner_name' => $contRequest['partner_name'],
            'uid_1c_code' => $contRequest['uid_1c_code'],
            'deleted_l' => $contRequest['deleted_l'],
            'actual_l' => $contRequest['actual_l'],
            'created_at' => $contRequest['created_at'],
            'created_by' => $contRequest['created_by'],
            'updated_at' => $contRequest['updated_at'],
            'updated_by' => $contRequest['updated_by'],
        ]];

        $partner_point_link_title = $getArrayCaptions['PartnerPoints']['translation_captions']['caption_translation'];


        if ($partnerPointsCount > 0) {
            $partner_point_link_title .= " ( $partnerPointsCount )";
        }
        if (!$request['dependent']) {
            $linksPartnerPoint = [
                "link_title" => $partner_point_link_title,
                "link_img" => "",
                "link_type" => "internal_push",
                "link_url" => "/partnerPoints"
            ];
        }

        $partner_employee_link_title = $getArrayCaptions['PartnerEmployees']['translation_captions']['caption_translation'];
        if ($countPartnerEmployee > 0)
            $partner_employee_link_title .= " ( $countPartnerEmployee )";

        $linksPointsRegions = [
            "link_title" => $partner_employee_link_title,
            "link_img" => "",
            "link_type" => "internal_push",
            "link_url" => "/partnerEmployees"
        ];

        if ($request->id === 'new') {
            $linksPartnerPoint = [];
            $linksPointsRegions = [];
        }

        $card = [
            "sets" => $this->getButtonsList(['card_actions']),
            "main_data_models" => [
                $mainModel => $res,
            ],
            "add_data_models" => [
                "Contractor" => $Contractor,
            ],
            "form_parameters" => [
                "form_title" => $getArrayCaptions['Partner']['translation_captions']['caption_translation'],
                "form_code" => $mainModel,
                "form_is_dependent" => false,
                "form_type" => "card",
                "disable_inputs" => $formShowParam['read_only'],
                "form_base_data_model" => $mainModel,
                "form_main_data_model_id_field" => "id",
                //                "form_main_data_model_name" => $DbAreas[0]['db_area_name'],
                "form_main_data_model_name" => $res[0]['partner_name'] ?? $getArrayCaptions['new']['translation_captions']['caption_translation'],
                "form_type_list" => [
                    "form_list_url" => "Partners",
                ],
            ],
            "links" => [
                $linksPartnerPoint ?? [],
                $linksPointsRegions ?? [],
                $partnerPointsRegions ?? [],
            ],
            "tabs" => $tabs
        ];

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

            $this->card_model = Partner::getNewObject();
//            $this->contractor_info_count = NULL;
            $this->contReqId = NULL;

            $this->cardAdditionalQuery($this->card_model);
        } else {

            $this->card_model = Partner::with([
                'contractor' => function ($query) {
                    $query->select('id', 'contractor_short_name');
                },
                'dbArea' => function ($query) {
                    $query->select('id', 'db_area_name');
                },
                'partnerEmployee' => function ($query) {
                    $query->select('id', 'partner_employee_name', 'partner_id');
                },
                'partnerPoint' => function ($query) {
                    $query->select('id', 'partner_point_name', 'partner_id');
                },
                'partnerRegion' => function ($query) {
                    $query->select('id', 'partner_regions_name', 'partner_id');
                }
            ])
                ->where('id', $request->id);

            if (!$this->card_model)
                return abort('403');
            $this->cardAdditionalQuery($this->card_model);

            $this->card_model = $this->card_model->first();
            $this->card_model = $this->card_model->toArray();

            $this->partnerPointsCount = count($this->card_model['partner_point']);
            $this->partnerPointsRegionsCount = count($this->card_model['partner_region']);
            $this->countPartnerEmployee = count($this->card_model['partner_employee']);
        }

        return $this;
    }

    public function prepareCardModelData()
    {
        $model = $this->card_model;

        $this->card_model = [
            [
                'id' => $model['id'],
                'db_area_id' => $model['db_area_id'],
                'use_regions' => $model['use_regions'],
                'contractor_id' => $model['contractor_id'] ?? null,
                'contractor_short_name' => $model['contractor'][0]['contractor_short_name'] ?? null,
                'partner_name' => $model['partner_name'],
                'uid_1c_code' => $model['uid_1c_code'],
                'deleted_l' => $model['deleted_l'],
                'actual_l' => $model['actual_l'],
                'created_at' => $model['created_at'],
                'created_by' => $model['created_by'],
                'updated_at' => $model['updated_at'],
                'updated_by' => $model['updated_by'],
            ]
        ];

        return $this;
    }

    public function setCardCaptions(): self
    {
        $this->card_captions = [
            'ok',
            'apply',
            'back', 'Main', 'CreatedAt',
            'CreatedBy', 'UpdatedAt', 'UpdatedBy',
            'SystemDetails', 'Name', 'Partner', 'PrimaryContractor', 'DeletedL', 'UseRegions', 'PartnerPoints', 'PartnerRegions',
            'Uid1cCode', 'Actual', 'ConsumerNameDefault', 'PartnerEmployees', 'new'
        ];

        $this->translateCardCaptions();

        return $this;
    }

//    public function setCardDependent(): self
//    {
//        if($this->isset_dependent)
//        {
//            $this->card_dependent = true;
//        }
//        else
//        {
//            $this->card_dependent = !$this->isNewObject();
//        }
//
//        return $this;
//    }
//
//    public function setCardDependentBlock(): self
//    {
//        if($this->isCardDependent())
//        {
//            $this->card_dependent_block = [
//                "dependent_data_model" => $this->card_controller_alias,
//                "dependent_fields"     => [
//                    "title"        => $this->getTranslatedCardCaption("Partner"),
//                    "model"        => "partner_id",
//                    "type"         => "label",
//                    "options"      => [],
//                    "options_data" => [
//                        "options_field_id"       => "id",
//                        "options_field_id_value" => "",
//                        "options_field_title"    => "partner_name",
//                        "search"                 => ''
//                    ],
//                ],
//                "width"                => "100%",
//            ];
//        }
//
//        return $this;
//    }

    public function setCardAddDataModels(): self
    {
        $Contractor = Contractor::get()->all();

        $this->card_add_data_models = [
            "Contractor" => $Contractor,
        ];

        return $this;
    }

    public function setCardBlockFields()
    {

//        $singleContractor = count($contractors) == 1 ? true : false;
        $this->card_block_fields = [
            [
                "tab_title" => $this->getTranslatedCardCaption("Main"),
                "blocks_quantity" => 1,
                "blocks" => [
                    [
                        "block_title" => $this->getTranslatedCardCaption("Partner"),
                        "block_zone_quantity" => 1,
                        "block_width" => "50%",
                        "block_model" => $this->card_controller_alias,
                        "block_type" => "block_card",

                        "block_fields" => [
                            [
                                'title' => $this->getTranslatedCardCaption("Name"),
                                'model_name' => $this->card_controller_alias,
                                'model' => 'partner_name',
                                'width' => '40%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '1'
                            ],
                            [
                                'title' => $this->getTranslatedCardCaption("PrimaryContractor"),
                                'model_name' => $this->card_controller_alias,
                                'model' => 'contractor_id',
                                'width' => '40%',
                                'type' => 'vue-select',
                                'zone' => '1',
                                'order' => '2',
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => "Contractor",
                                    "options_field_id" => "id",
                                    "options_field_title" => "contractor_short_name",
                                    "options_field_id_value" => "",
                                    "search" => ""
                                ],
                            ],

                            [
                                'title' => $this->getTranslatedCardCaption("UseRegions"),
                                'model_name' => $this->card_controller_alias,
                                'model' => 'use_regions',
                                'width' => '20%',
                                'type' => 'checkbox',
                                'zone' => '1',
                                'order' => '3'
                            ],

                        ]
                    ]
                ],
            ]
        ];

        return $this;
    }

    public function setCardFormTitle(): self
    {
        $this->card_form_title = 'Partner';

        return $this;
    }

    public function setCardMainDataModelName(): self
    {
        $this->card_main_data_model_name = ($this->isNewObject()) ? $this->getTranslatedCardCaption("new") : $this->card_model[0]["partner_name"];
        return $this;
    }

    public function setCardLinks(): self
    {
        if (!$this->isNewObject()) {

            $partner_point_link_title = $this->getTranslatedCardCaption("PartnerPoints");
            if ($this->partnerPointsCount > 0) {
                $partner_point_link_title .= " ( $this->partnerPointsCount )";
            }

            $partner_employee_link_title = $this->getTranslatedCardCaption("PartnerEmployees");
            if ($this->countPartnerEmployee > 0) {
                $partner_employee_link_title .= " ( $this->countPartnerEmployee )";
            }

            $this->card_links = [
                [
                    "link_title" => $partner_point_link_title,
                    "link_img" => "",
                    "link_type" => "internal_push",
                    "link_url" => "/partnerPoints"
                ],

                [
                    "link_title" => $partner_employee_link_title,
                    "link_img" => "",
                    "link_type" => "internal_push",
                    "link_url" => "/partnerEmployees"
                ],
             ];

            if ($this->card_model[0]['use_regions'] == true) {

                if ($this->partnerPointsRegionsCount > 0)

                $this->partnerPointsRegions = [
                    "link_title" => $this->getTranslatedCardCaption("PartnerRegions")." ( $this->partnerPointsRegionsCount )",
                    "link_img" => "",
                    "link_type" => "internal_push",
                    "link_url" => "/partnerRegions"
                ];

                array_push($this->card_links, $this->partnerPointsRegions);
            }
        }
        return $this;
    }
}
