<?php

namespace App\Http\Controllers\Api;

use App\Http\Classes\CheckController;
use App\Http\Traits\HasCard;
use App\Http\Traits\HasList;
use App\Models\Partner;
use App\Models\PartnerRegion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class PartnerRegionsController extends Controller
{
    use HasList, HasCard;

    /**
     * @var string
     */
    public $type;

    /**
     * @var int
     */
    public $partner_points_count;

    /**
     * @var bool
     */
    public $isset_dependent;

    public function setListCaptions()
    {
        $this->list_captions = [
            'ok',
            'apply',
            'back', 'Main',
            'Code', 'Name', 'Partner',
            'Consumer', 'Database', 'Actual', 'Region', 'DeleteMark', 'PartnerRegions',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy',
        ];

        $this->translateListCaptions();

        return $this;
    }

    protected function listQuery()
    {
        $request = request();

        if(isset($request['dependent']))
        {
            $dependent = $request["dependent"];

            $this->list_model = PartnerRegion::query()
                ->leftJoin('Partners', 'PartnerRegions.partner_id', '=', 'Partners.id')
                ->select('PartnerRegions.id', 'PartnerRegions.partner_regions_name',
                    'PartnerRegions.actual_l', 'Partners.partner_name', 'PartnerRegions.partner_id')
                ->where('PartnerRegions.partner_id', $dependent["id"]);

            $this->listAdditionalQuery($this->list_model);

            $this->list_model = $this->list_model->get();

            $this->type = "label";
        }
        else
        {
            $this->list_model = PartnerRegion::with([
                'partner:id,partner_name']);

            $this->listAdditionalQuery($this->list_model);

            $this->list_model = $this->list_model->get()->toArray();

            foreach($this->list_model as &$region)
            {
                $region["partner_name"] = $region["partner"]["partner_name"];
            }

            $this->type = "select";
        }

        return $this;
    }

    public function setListFormTitle()
    {
        $this->list_form_title = "PartnerRegions";

        return $this;
    }

    public function setListFormSearchField()
    {
        $this->list_form_search_field = "partner_name";

        return $this;
    }

    public function setListDependent()
    {
        $this->list_dependent = true;

        return $this;
    }

    public function setListDependentBlock()
    {
        $this->list_dependent_block = [
            "dependent_data_model" => $this->list_controller_alias,
            "dependent_fields"     => [
                "title"         => $this->getTranslatedListCaption("Partner"),
                "model"         => "partner_id",
                "type"          => $this->type,
                "current_value" => $this->list_model[0]["partner_name"] ?? "",
                "options"       => [],
                "options_data"  => [
                    "options_data_model"     => $this->list_controller_alias,
                    "options_field_id"       => "id",
                    "options_field_id_value" => "",
                    "options_field_title"    => "partner_name",
                    "search"                 => ''
                ],
            ],
            "width"                => "100%",
        ];

        if($this->type === "select")
            $this->list_dependent_block["allow_creation_if_empty"] = true;

        return $this;
    }

    public function setListBlockFields()
    {
        $this->list_block_fields = [

            [
                // "block_title" => 'blockDbAreas',
                "block_zone_quantity" => 1,
                "block_model"         => $this->list_controller_alias,
                "block_type"          => "block_list_base",
                "block_fields"        => [

                    [
                        'key'     => 'actions', 'type' => 'checkbox', 'sortable' => false,
                        'class'   => 'list_checkbox',
                        'thStyle' => 'width: 6%', "zone" => "1", "order" => "1"
                    ],
                    [
                        'key'   => 'deleted_l', 'type' => 'checkbox', 'sortable' => false,
                        'label' => $this->getTranslatedListCaption("DeleteMark"),
                        'class' => '', 'thStyle' => 'width: 8%', "zone" => "1", "order" => "6"
                    ],
                    [
                        'key'   => 'actual_l', 'type' => 'checkbox', 'sortable' => false,
                        'label' => $this->getTranslatedListCaption("Actual"),
                        'class' => '', 'thStyle' => 'width: 8%', "zone" => "1", "order" => "6"
                    ],
                    [
                        'key'     => 'partner_name', 'sortable' => true, 'class' => 'partner_name',
                        'label'   => $this->getTranslatedListCaption("Partner"),
                        'thStyle' => 'width: 38%', "zone" => "1", "order" => "3"
                    ],
                    [
                        'key'     => 'partner_regions_name', 'sortable' => true, 'class' => 'partner_regions_name',
                        'label'   => $this->getTranslatedListCaption("Region"),
                        'thStyle' => 'width: 40%', "zone" => "1", "order" => "4"
                    ],

                ]
            ]
        ];

        return $this;
    }

    public function setListHeaderBreakLine(): self
    {
        $this->list_header_break_line = true;

        return $this;
    }

    public function list_old(Request $request)
    {
        $captionName = [
            'ok',
            'apply',
            'back', 'Main',
            'Code', 'Name', 'Partner',
            'Consumer', 'Database', 'Actual', 'Region', 'DeleteMark', 'PartnerRegions',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy',
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $model = 'App\Models\Controller';
        $mainModel = $model::where('controller_code', class_basename(Route::current()->controller))
            ->value('controller_alias');


        if(isset($request['dependent']['id']))
        {
            $PartnerRegions = DB::table('PartnerRegions')
                ->leftJoin('Partners', 'PartnerRegions.partner_id', '=', 'Partners.id')
                //            ->leftJoin('PartnerPoints', 'PartnerRegions.id', '=', 'PartnerPoints.partner_regions_id')
                ->select('PartnerRegions.id', 'PartnerRegions.partner_regions_name',
                    'PartnerRegions.actual_l', 'Partners.partner_name', 'PartnerRegions.partner_id')
                ->where('PartnerRegions.partner_id', $request->id)
                ->get()->toarray();

            $PartnerRegions = json_decode(json_encode($PartnerRegions), true);

            $PartnerRegionsNew = DB::table($request['dependent']['controller_alias'])
                ->where('id', $request['dependent']['id'])->get()->toArray();
            $PartnerRegionsNew = json_decode(json_encode($PartnerRegionsNew), true);
            $type = (string)"label";
        }
        else
        {
            $PartnerRegions = PartnerRegion::with([
                'partner' => function($query)
                {
                    $query->select('id', 'partner_name');
                }
            ])->get()->toArray();
            $partnerRegionsAll = json_decode(json_encode($PartnerRegions), true);

            //            $partnerName = $partnerRegionsAll[0]['partner']['partner_name'] ?? null;

            $PartnerRegions = [];
            foreach($partnerRegionsAll as $region)
            {
                array_push($region, $region['partner_name'] = $region['partner']['partner_name']);
                $PartnerRegions[] = $region;
            }
        }

        if(!isset($request['dependent']))
        {
            $type = (string)"select";
        }

        $list = [

            "main_data_models" => [
                $mainModel => $PartnerRegions,
            ],
            "sets"             => $this->getButtonsList(['list_bottom', 'list_top', 'list_top_dropdown_actions', 'list_top_left_command_bar', 'list_top_right_command_bar']),
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['PartnerRegions']['translation_captions']['caption_translation'],
                "form_code"                     => $mainModel,
                "form_is_dependent"             => true,
                "form_type"                     => "list",
                "list_header_break_line"        => true,
                "form_base_data_model"          => $mainModel,
                "form_main_data_model_id_field" => "id",
                "form_type_list"                => [
                    "form_card_url"     => "Partner",
                    "form_search_field" => "partner_name",
                ],
            ],

            "dependent" => [
                "dependent_data_model" => $mainModel,
                "dependent_fields"     => [
                    "title"         => $getArrayCaptions['Partner']['translation_captions']['caption_translation'],
                    "model"         => "partner_id",
                    //                    "type" => "label",
                    //                    "type" => "select",
                    "type"          => $type,
                    "current_value" => $PartnerRegions[0]['partner_name'] ?? $PartnerRegionsNew[0]['partner_name'] ?? '',
                    "options"       => [],
                    "options_data"  => [
                        "options_data_model"     => $request['dependent']['controller_alias'],
                        "options_field_id"       => "id",
                        "options_field_id_value" => "",
                        "options_field_title"    => "partner_name",
                        "search"                 => ''
                    ],
                ],
                "width"                => "100%",
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
            "tabs"  => [

                [
                    "tab_title"       => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                    "blocks_quantity" => 1,
                    "blocks"          => [

                        [
                            // "block_title" => 'blockDbAreas',
                            "block_zone_quantity" => 1,
                            "block_model"         => $mainModel,
                            "block_type"          => "block_list_base",
                            "block_fields"        => [

                                [
                                    'key'      => 'actions', 'type' => 'checkbox',
                                    'sortable' => false,
                                    'class'    => 'list_checkbox',
                                    'thStyle'  => 'width: 6%',
                                    "zone"     => "1",
                                    "order"    => "1"
                                ],

                                [
                                    'key'      => 'deleted_l', 'type' => 'checkbox',
                                    'sortable' => false,
                                    'label'    => $getArrayCaptions['DeleteMark']['translation_captions']['caption_translation'],
                                    'class'    => '',
                                    'thStyle'  => 'width: 8%',
                                    "zone"     => "1",
                                    "order"    => "6"
                                ],

                                [
                                    'key'      => 'actual_l', 'type' => 'checkbox',
                                    'sortable' => false,
                                    'label'    => $getArrayCaptions['Actual']['translation_captions']['caption_translation'],
                                    'class'    => '',
                                    'thStyle'  => 'width: 8%',
                                    "zone"     => "1",
                                    "order"    => "6"
                                ],

                                [
                                    'key'      => 'partner_name',
                                    'sortable' => true,
                                    'class'    => 'partner_name',
                                    'label'    => $getArrayCaptions['Partner']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 38%',
                                    "zone"     => "1",
                                    "order"    => "3"
                                ],
                                [
                                    'key'      => 'partner_regions_name',
                                    'sortable' => true,
                                    'class'    => 'partner_regions_name',
                                    'label'    => $getArrayCaptions['Region']['translation_captions']['caption_translation'],
                                    //                                    'label' => 'partner_regions_name',
                                    'thStyle'  => 'width: 40%',
                                    "zone"     => "1",
                                    "order"    => "4"
                                ],

                            ]
                        ]
                    ]
                ],
            ]
        ];
        return response()->json($list);
    }

    public function setCardCaptions(): self
    {
        $this->card_captions = [
            'ok',
            'apply',
            'back', 'Main', 'CreatedAt',
            'CreatedBy', 'UpdatedAt', 'UpdatedBy',
            'SystemDetails', 'Name', 'Partner', 'PartnerPoint', 'PartnerRegion',
            'Uid1cCode', 'Actual', 'ConsumerNameDefault', 'new', 'Partner'
        ];

        $this->translateCardCaptions();

        return $this;
    }

    protected function cardQuery()
    {
        $request = request();

        $region_id = $request->id;

        $this->setIsNewObject($region_id === "new");

        if($this->isNewObject())
        {
            $nameControllerMethod = [
                'controller' => class_basename(Route::current()->controller),
                'method'     => 'insert'
            ];

            $objAccess = (new CheckController($nameControllerMethod));
            $access = $objAccess->checkControllerAccessRight();

            if($access === false)
            {
                return abort('403');
            }

            $this->card_model = PartnerRegion::getNewObject();


            $this->cardAdditionalQuery($this->card_model);
        }
        else
        {
            $this->card_model = PartnerRegion::query()
                ->withCount("partnerPoints")
                ->with(["partner:id,partner_name"])
                ->where("id", $region_id);

            $this->listAdditionalQuery($this->card_model);

            $this->card_model = $this->card_model->first()->toArray();

            $this->partner_points_count = $this->card_model["partner_points_count"];
        }

        return $this;
    }

    public function prepareCardModelData()
    {
        $model = $this->card_model;

        $request = request();
        if(isset($request["dependent"]))
        {
            $dependent_model = \App\Models\Controller::query()
                ->where("controller_alias", $request["dependent"]["controller_alias"])
                ->with("models:table_n,table_code")
                ->first();

            $this->isset_dependent = $dependent_model->models->table_code === "Partner";

            if($this->isset_dependent && $this->isNewObject())
            {
                $partner = Partner::query()->find($request["dependent"]["id"], ["id", "partner_name"]);
                $model["partner_id"] = $partner->id;
                $model["partner"]["partner_name"] = $partner->partner_name;
            }
        }

        $this->card_model = [
            [
                "id"                   => $model["id"],
                "partner_name"         => $model["partner"]["partner_name"] ?? "",
                "partner_id"           => $model["partner_id"],
                "partner_regions_name" => $model["partner_regions_name"],
                "db_area_id"           => $model["db_area_id"],
                'created_at'           => $model['created_at'],
                'created_by'           => $model['created_by'],
                'updated_at'           => $model['updated_at'],
                'updated_by'           => $model['updated_by'],
            ]
        ];

        return $this;
    }

    public function setCardDependent(): self
    {
        if($this->isset_dependent)
        {
            $this->card_dependent = true;
        }
        else
        {
            $this->card_dependent = !$this->isNewObject();
        }

        return $this;
    }

    public function setCardDependentBlock(): self
    {
        if($this->isCardDependent())
        {
            $this->card_dependent_block = [
                "dependent_data_model" => $this->card_controller_alias,
                "dependent_fields"     => [
                    "title"        => $this->getTranslatedCardCaption("Partner"),
                    "model"        => "partner_id",
                    "type"         => "label",
                    "options"      => [],
                    "options_data" => [
                        "options_field_id"       => "id",
                        "options_field_id_value" => "",
                        "options_field_title"    => "partner_name",
                        "search"                 => ''
                    ],
                ],
                "width"                => "100%",
            ];
        }

        return $this;
    }

    public function setCardAddDataModels(): self
    {
        if(!$this->isset_dependent && $this->isNewObject())
        {
            $partners = Partner::query()
                ->where("use_regions", true)
                ->select("id", "partner_name")
                ->get();

            $this->card_add_data_models = [
                "Partners" => $partners
            ];
        }
        else
        {
            $this->card_add_data_models = [];
        }

        return $this;
    }

    public function setCardBlockFields(): self
    {
        $this->card_block_fields = [
            [

                "tab_title"       => $this->getTranslatedCardCaption("Main"),
                "blocks_quantity" => 1,
                "blocks"          => [
                    [
                        "block_zone_quantity" => 2,
                        "block_model"         => $this->card_controller_alias,
                        "block_type"          => "block_card",
                        "block_fields"        => [
                            [
                                'title'      => $this->getTranslatedCardCaption("Name"),
                                'model_name' => $this->card_controller_alias,
                                'model'      => 'partner_regions_name',
                                'width'      => '50%',
                                'type'       => 'text',
                                'zone'       => '1',
                                'order'      => '1'
                            ],

                        ]
                    ]
                ]
            ],
        ];
        if(!$this->isset_dependent && $this->isNewObject())
        {
            array_push($this->card_block_fields[0]["blocks"][0]["block_fields"], [
                    'title'        => $this->getTranslatedCardCaption("Partner"),
                    'model_name'   => $this->card_controller_alias, 'model' => 'partner_id',
                    'type'         => 'vue-select',
                    'width'        => '100%',
                    'options'      => [],
                    "options_data" => [
                        "options_data_model"  => "Partners",
                        "options_field_id"    => "id",
                        "options_field_title" => "partner_name",
                        "search"              => ""
                    ],
                    "zone"         => "1",
                    "order"        => "1",
                    "border_right" => false
                ]
            );
        }

        return $this;
    }

    public function setCardLinks(): self
    {
        if(!$this->isNewObject())
        {
            $partner_point_link_title = $this->getTranslatedCardCaption("PartnerPoint");
            if($this->partner_points_count > 0)
            {
                $partner_point_link_title .= " ( $this->partner_points_count )";
            }

            $this->card_links = [
                [
                    "link_title" => $partner_point_link_title,
                    "link_img"   => "",
                    "link_type"  => "internal_push",
                    "link_url"   => "/partnerPoints"
                ]
            ];

        }
        else
        {
            $this->card_links = [];
        }

        return $this;
    }

    public function setCardFormTitle(): self
    {
        $this->card_form_title = "PartnerRegion";

        return $this;
    }

    public function setCardMainDataModelName(): self
    {
        $this->card_main_data_model_name = ($this->isNewObject()) ? $this->getTranslatedCardCaption("new") : $this->card_model[0]["partner_regions_name"];

        return $this;
    }

    public function card_old(Request $request)
    {
        $captionName = [
            'ok',
            'apply',
            'back', 'Main', 'CreatedAt',
            'CreatedBy', 'UpdatedAt', 'UpdatedBy',
            'SystemDetails', 'Name', 'Partner', 'PartnerPoint', 'PartnerRegion',
            'Uid1cCode', 'Actual', 'ConsumerNameDefault', 'new'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        if(strpos($request->id, 'new') !== false)
        {
            $PartnerRegions = [PartnerRegion::getNewObject()];
        }
        else
        {
            $PartnerRegions = DB::table('PartnerRegions')
                ->leftJoin('Partners', 'PartnerRegions.partner_id', '=', 'Partners.id')
                ->leftJoin('PartnerPoints', 'PartnerRegions.id', '=', 'PartnerPoints.partner_regions_id')
                ->select('PartnerRegions.id', 'PartnerRegions.partner_regions_name',
                    'PartnerRegions.actual_l', 'Partners.partner_name', 'PartnerRegions.partner_id',
                    'PartnerPoints.partner_regions_id', 'PartnerPoints.partner_point_name')
                ->where('PartnerRegions.id', $request->id)
                ->where('PartnerPoints.partner_regions_id', '!=', null)
                ->get()->toarray();

            $PartnerRegions = json_decode(json_encode($PartnerRegions), true);
        }

        $contReqId = $request->id;

        if(isset($request['dependent']))
        {
            $PartnerRegionsNew = DB::table($request['dependent']['controller_alias'])
                ->where('id', $request['dependent']['id'])->get()->toArray();
        }
        elseif(!isset($request['dependent']))
        {
            $PartnerRegionsNew = PartnerRegion::where('id', $contReqId)->get()->toArray();
        }
        $PartnerRegionsNew = json_decode(json_encode($PartnerRegionsNew), true);

        if($contReqId == "new")
        {

            $nameControllerMethod = [
                'controller' => class_basename(Route::current()->controller),
                'method'     => 'insert'
            ];

            $objAccess = (new CheckController($nameControllerMethod));
            $access = $objAccess->checkControllerAccessRight();

            if($access === false)
            {
                return abort('403');
            }

            $contRequest = PartnerRegion::getNewObject();
            $partnerPointsCount = null;
        }
        else
        {
            $contRequest = PartnerRegion::with([
                'partner'      => function($query)
                {
                    $query->select('id', 'partner_name');
                },
                'partnerPoint' => function($query)
                {
                    $query->select('id', 'partner_point_name', 'partner_id');
                },
            ])
                ->where('id', $contReqId)->first()->toArray();
            $partnerPointsCount = count($PartnerRegions);
        }

        $Partner = Partner::get()->all();

        $model = 'App\Models\Controller';
        $mainModel = $model::where('controller_code', class_basename(Route::current()->controller))
            ->value('controller_alias');

        $nameControllerMethod = [
            'controller'  => class_basename(Route::current()->controller),
            'accessRight' => 'record'
        ];
        $formShowParam = (new CheckController($nameControllerMethod))->getShowFormParameters();

        $tabs = [
            [

                "tab_title"       => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                "blocks_quantity" => 1,
                "blocks"          => [
                    [
                        "block_zone_quantity" => 2,
                        "block_model"         => $mainModel,
                        "block_type"          => "block_card",
                        "block_fields"        => [
                            //                            [
                            ////                                'title' => $getArrayCaptions['accContractorShortName']['translation_captions']['caption_translation'],
                            //                                'title' => 'partner_name',
                            //                                 'model_name' => $mainModel,
                            //                                'model' => 'partner_id',
                            //                                'width' => '50%',
                            //                                'type' => 'vue-select',
                            //                                'zone' => '1',
                            //                                'order' => '2',
                            //                                'options' => [],
                            //                                "options_data" => [
                            //                                    "options_data_model" => "Partner",
                            //                                    "options_field_id" => "id",
                            //                                    "options_field_title" => "partner_name",
                            //                                    "options_field_id_value" => "",
                            //                                    "search" => ""
                            //                                ],
                            //                            ],

                            [
                                'title'      => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                'model_name' => $mainModel,
                                'model'      => 'partner_regions_name',
                                'width'      => '50%',
                                'type'       => 'text',
                                'zone'       => '1',
                                'order'      => '1'
                            ],

                        ]
                    ]
                ]
            ],
        ];
        if($formShowParam['show_system_tab'])
        {
            $tabSystem = [
                "tab_title"       => $getArrayCaptions['SystemDetails']['translation_captions']['caption_translation'],
                "tab_name"        => $getArrayCaptions['SystemDetails']['translation_captions']['caption_translation'],
                "tab_description" => '',
                "blocks_quantity" => 1,
                "blocks"          => [
                    [
                        "block_title"         => "Block1",
                        "block_zone_quantity" => 2,
                        "block_model"         => $mainModel,
                        "block_type"          => "block_card",
                        "block_fields"        => [
                            ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "1"],
                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "2"],
                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "1"],
                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "2"],
                            [
                                'title'      => $getArrayCaptions['Actual']['translation_captions']['caption_translation'],
                                'model_name' => $mainModel,
                                'model'      => 'actual_l',
                                'width'      => '50%',
                                'type'       => 'checkbox',
                                'zone'       => '1',
                                'order'      => '5'
                            ],
                        ]
                    ]
                ]
            ];
            array_push($tabs, $tabSystem);
        }

        $res = [[ //Итоговый массив рекизитов $partnerPointsCount
                  'id'                   => $contRequest['id'],
                  'partner_id'           => $contRequest['partner_id'] ?? $PartnerRegionsNew[0]['id'],
                  'db_area_id'           => $contRequest['db_area_id'] ?? null,
                  'partner_name'         => $contRequest['partner']['partner_name'] ?? $PartnerRegionsNew[0]['partner_name'],
                  'partner_regions_name' => $contRequest['partner_regions_name'],
                  'uid_1c_code'          => $contRequest['uid_1c_code'],
                  'deleted_l'            => $contRequest['deleted_l'],
                  'actual_l'             => $contRequest['actual_l'],
                  'created_at'           => $contRequest['created_at'],
                  'created_by'           => $contRequest['created_by'],
                  'updated_at'           => $contRequest['updated_at'],
                  'updated_by'           => $contRequest['updated_by'],
                ]];

        $partner_point_link_title = $getArrayCaptions['PartnerPoint']['translation_captions']['caption_translation'];
        if($partnerPointsCount > 0)
        {
            $partner_point_link_title .= " ( $partnerPointsCount )";
        }
        $card = [
            "sets" => $this->getButtonsList(['card_actions']),

            "main_data_models" => [
                $mainModel => $res,
            ],
            "add_data_models"  => [
                //                "Partner" => $Partner,
            ],

            "form_parameters" => [
                "form_title"                    => $getArrayCaptions['PartnerRegion']['translation_captions']['caption_translation'],
                "form_code"                     => $mainModel,
                "form_is_dependent"             => true,
                "form_type"                     => "card",
                "disable_inputs"                => $formShowParam['read_only'],
                "form_base_data_model"          => $mainModel,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name"     => $res[0]['partner_regions_name'] ?? $getArrayCaptions['new']['translation_captions']['caption_translation'],
                "form_type_list"                => [
                    "form_list_url" => "partnerRegions",
                ],
            ],

            "dependent" => [
                "dependent_data_model" => $mainModel,
                "dependent_fields"     => [
                    "title"         => $getArrayCaptions['Partner']['translation_captions']['caption_translation'],
                    "model"         => "partner_id",
                    "type"          => "label",
                    "current_value" => "testsad" ?? $PartnerRegions[0]['partner_name'] ?? $PartnerRegionsNew[0]['partner_name'] ?? $PartnerRegionsNewDependentNew[0]['partner_name'] ?? null,
                    "options"       => [],
                    "options_data"  => [
                        "options_data_model"     => "testqwe" ?? $request['dependent']['controller_alias'],
                        "options_field_id"       => "id",
                        "options_field_id_value" => "",
                        "options_field_title"    => "partner_name",
                        "search"                 => ''
                    ],
                ],
                "width"                => "100%",
            ],

            "links" => [
                [
                    "link_title" => $partner_point_link_title,
                    "link_img"   => "",
                    "link_type"  => "internal_push",
                    "link_url"   => "/partnerPoints"
                ]
            ],

            "tabs" => $tabs
        ];

        return response()->json($card);

    }
}
