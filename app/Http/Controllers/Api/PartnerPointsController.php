<?php

namespace App\Http\Controllers\Api;

use App\Http\Classes\CheckController;
use App\Http\Traits\HasCard;
use App\Http\Traits\HasList;
use App\Models\BL\BlContractorRequest;
use App\Models\Contractor;
use App\Models\ControllerLink;
use App\Models\DbArea;
use App\Models\Partner;
use App\Models\PartnerPoint;
use App\Models\PartnerPointsTabContractor;
use App\Models\PartnerRegion;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class PartnerPointsController extends Controller
{
    use HasList, HasCard;
    public $type;
    public $PartnerPoints;
    public $currentValue;
    public $formTitle;
    public $newObject;
    public $formShowParam;
    public $partnerPoint;
    public $contractors;
    public $contReqId;
    public $isset_dependent;
    public $titleDepend;
    public $optionsFieldTitle;
    public $Partner;
    public $mainModel;
    public $PartnerPointsNew;
    public $depModel;
    public $PartnerPointsRegionsNew;
    public $PartnerRegion;

    public function __construct()
    {
//        $this->model = PartnerPoint::class;
    }

    public function listold(Request $request)
    {
        $captionName = [
            'ok',
            'apply',
            'back', 'Main',
            'Code', 'Name',
            'Consumer', 'Database', 'Actual', 'Region',
            'PartnerPoints', 'Partner', 'DeleteMark', 'PartnerRegions',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy',
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $model = 'App\Models\Controller';
        $mainModel = $model::where('controller_code', class_basename(Route::current()->controller))
            ->value('controller_alias');

        if (isset($request['dependent']['id'])) {
            $getIdControllerDep = \App\Models\Controller::with('modelLink.modelLinkParent')
                ->where('controller_alias', $request['dependent']['controller_alias'])
                ->first()->toArray();

            if ($getIdControllerDep['controller_alias'] == 'PartnerRegions') {

                $this->formTitle = $getArrayCaptions['PartnerRegions']['translation_captions']['caption_translation'];

                $idParent = PartnerRegion::select('partner_id')
                    ->where('id', $request['id'])
                    ->first()->toArray();

                $this->PartnerPoints = DB::table($getIdControllerDep['model_link'][0]['model_link_parent']['table_name'])
                    ->select('PartnerRegions.id', 'PartnerRegions.partner_regions_name', 'PartnerRegions.deleted_l',
                        'PartnerRegions.actual_l', 'Partners.id', 'Partners.partner_name', 'PartnerPoints.id', 'PartnerPoints.partner_point_name')
                    ->join('Partners', 'Partners.id', '=', 'PartnerRegions.partner_id')
                    ->join('PartnerPoints', 'PartnerPoints.partner_regions_id', '=', 'PartnerRegions.id')
                    ->where('PartnerRegions.partner_id', $idParent['partner_id'])
                    ->where('PartnerRegions.id', $request['id'])
                    ->get()->toArray();

                $this->PartnerPoints = json_decode(json_encode($this->PartnerPoints), true);
                $this->currentValue = $this->PartnerPoints[0]['partner_regions_name'];

            } elseif ($getIdControllerDep['controller_alias'] == 'Partners') {
                $this->PartnerPoints = DB::table('PartnerPoints')
                    ->select('PartnerPoints.id', 'PartnerPoints.id', 'Partners.partner_name', 'Partners.use_regions', 'PartnerRegions.partner_regions_name', 'PartnerPoints.partner_point_name',
                        'PartnerPoints.deleted_l', 'PartnerPoints.actual_l')
                    ->join('Partners', 'Partners.id', '=', 'PartnerPoints.partner_id')
                    ->leftjoin('PartnerRegions', 'PartnerRegions.id', '=', 'PartnerPoints.partner_regions_id')
                    ->where('PartnerPoints.partner_id', $request['id'])
                    ->get()->toArray();

                $this->PartnerPoints = json_decode(json_encode($this->PartnerPoints), true);
                $this->currentValue = $this->PartnerPoints[0]['partner_name'];
            }

            $isUseRegionsTrue = $this->PartnerPoints[0]['use_regions'] ?? null;
            if ($isUseRegionsTrue == true) {

                $partnerRegionsName = [
                    'key' => 'partner_regions_name',
                    'sortable' => true,
                    'class' => 'partner_regions_name',
                    'label' => $getArrayCaptions['Region']['translation_captions']['caption_translation'],
                    'thStyle' => 'width: 23%',
                    "zone" => "1",
                    "order" => "3"
                ];
                $showPartnerRegions = true;

            } else {
                $showPartnerRegions = false;

                $PartnerPointsNew = DB::table($request['dependent']['controller_alias'])->where('id', $request['dependent']['id'])->get()->toArray();
                $PartnerPointsNew = json_decode(json_encode($PartnerPointsNew), true);
            }
            $type = (string)"label";


        } else {

            $this->formTitle = $getArrayCaptions['Partner']['translation_captions']['caption_translation'];
            $showPartnerRegions = true;
            $this->PartnerPoints = DB::table('PartnerPoints')
                ->select('PartnerPoints.id', 'PartnerPoints.id', 'Partners.partner_name', 'Partners.use_regions', 'PartnerRegions.partner_regions_name', 'PartnerPoints.partner_point_name',
                    'PartnerPoints.deleted_l', 'PartnerPoints.actual_l')
                ->join('Partners', 'Partners.id', '=', 'PartnerPoints.partner_id')
                ->leftjoin('PartnerRegions', 'PartnerRegions.id', '=', 'PartnerPoints.partner_regions_id')
                ->get()->toArray();

        }
        if (!isset($request['dependent'])) {
            $type = (string)"select";
        }

        $list = [
            "main_data_models" => [
                $mainModel => $this->PartnerPoints,
            ],
            "sets" => $this->getButtonsList(['list_bottom', 'list_top', 'list_top_dropdown_actions', 'list_top_left_command_bar', 'list_top_right_command_bar']),
            "form_parameters" => [
                "form_title" => $this->formTitle,
                "form_code" => $mainModel,
                "form_is_dependent" => true,
                "form_type" => "list",
                "list_header_break_line" => true,
                "form_base_data_model" => $mainModel,
                "form_main_data_model_id_field" => "id",
                "form_type_list" => [
                    "form_card_url" => "PartnerPoints",
                    "form_search_field" => null,
                ],
            ],

            "dependent" => [
                "dependent_data_model" => $mainModel,
                "dependent_fields" => [
                    "title" => $this->formTitle,
                    "model" => "partner_id",
                    "type" => $type,
                    "current_value" => $this->currentValue,
                    "options" => [],
                    "options_data" => [
                        "options_data_model" => $request['dependent']['controller_alias'],
                        "options_field_id" => "id",
                        "options_field_id_value" => "",
                        "options_field_title" => "partner_name",
                        "search" => ''
                    ],
                ],
                "width" => "100%",
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
                                    'thStyle' => 'width: 8',
                                    "zone" => "1",
                                    "order" => "6"
                                ],

                                [
                                    'key' => 'actual_l', 'type' => 'checkbox',
                                    'sortable' => false,
                                    'label' => $getArrayCaptions['Actual']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 8%',
                                    "zone" => "1",
                                    "order" => "6"
                                ],

                            ]
                        ]
                    ]
                ],
            ]
        ];
        if (!$showPartnerRegions) {
            array_push($list['tabs'][0]['blocks'][0]['block_fields'],
                [
                    'key' => 'partner_name',
                    'sortable' => true,
                    'class' => 'partner_name',
                    'label' => $getArrayCaptions['Partner']['translation_captions']['caption_translation'],
                    'thStyle' => 'width: 38%',
                    "zone" => "1",
                    "order" => "3"
                ],
                [
                    'key' => 'partner_point_name',
                    'sortable' => true,
                    'class' => 'partner_point_name',
                    'label' => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                    'thStyle' => 'width: 40%',
                    "zone" => "1",
                    "order" => "3"
                ]);

        } else {
            array_push($list['tabs'][0]['blocks'][0]['block_fields'],
                [
                    'key' => 'partner_name',
                    'sortable' => true,
                    'class' => 'partner_name',
                    'label' => $getArrayCaptions['Partner']['translation_captions']['caption_translation'],
                    'thStyle' => 'width: 23%',
                    "zone" => "1",
                    "order" => "3"
                ],
                [
                    'key' => 'partner_regions_name',
                    'sortable' => true,
                    'class' => 'partner_regions_name',
                    'label' => $getArrayCaptions['Region']['translation_captions']['caption_translation'],
                    'thStyle' => 'width: 27%',
                    "zone" => "1",
                    "order" => "3"
                ],
                [
                    'key' => 'partner_point_name',
                    'sortable' => true,
                    'class' => 'partner_point_name',
                    'label' => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                    'thStyle' => 'width: 28%',
                    "zone" => "1",
                    "order" => "3"
                ]);
        }
        return response()->json($list);
    }

    public function listQuery()
    {
        $request = request();

//        $this->list_model = PartnerPoint::select('PartnerPoints.id', 'PartnerPoints.id', 'Partners.partner_name', 'Partners.use_regions', 'PartnerRegions.partner_regions_name', 'PartnerPoints.partner_point_name',
//            'PartnerPoints.deleted_l', 'PartnerPoints.actual_l')
//            ->join('Partners', 'Partners.id', '=', 'PartnerPoints.partner_id')
//            ->leftjoin('PartnerRegions', 'PartnerRegions.id', '=', 'PartnerPoints.partner_regions_id');
//
//        $this->listAdditionalQuery($this->list_model);
//
//        $this->list_model = $this->list_model->get()->toArray();

        if (isset($request['dependent']['id'])) {
            $getIdControllerDep = \App\Models\Controller::with('modelLink.modelLinkParent')
                ->where('controller_alias', $request['dependent']['controller_alias'])
                ->first()->toArray();

            if ($getIdControllerDep['controller_alias'] == 'PartnerRegions') {

                $this->formTitle = $this->getTranslatedListCaption('PartnerRegions');

                $idParent = PartnerRegion::select('partner_id')
                    ->where('id', $request['id'])
                    ->first()->toArray();

                $this->PartnerPoints = DB::table($getIdControllerDep['model_link'][0]['model_link_parent']['table_name'])
                    ->select('PartnerRegions.id', 'PartnerRegions.partner_regions_name', 'PartnerRegions.deleted_l',
                        'PartnerRegions.actual_l', 'Partners.id', 'Partners.partner_name', 'PartnerPoints.id', 'PartnerPoints.partner_point_name')
                    ->join('Partners', 'Partners.id', '=', 'PartnerRegions.partner_id')
                    ->join('PartnerPoints', 'PartnerPoints.partner_regions_id', '=', 'PartnerRegions.id')
                    ->where('PartnerRegions.partner_id', $idParent['partner_id'])
                    ->where('PartnerRegions.id', $request['id'])
                    ->get()->toArray();
                $this->type = "label";
                $this->PartnerPoints = json_decode(json_encode($this->PartnerPoints), true);
                $this->currentValue = $this->PartnerPoints[0]['partner_regions_name'] ?? null;

            } elseif ($getIdControllerDep['controller_alias'] == 'Partners') {
                $this->PartnerPoints = DB::table('PartnerPoints')
                    ->select('PartnerPoints.id', 'PartnerPoints.id', 'Partners.partner_name', 'Partners.use_regions', 'PartnerRegions.partner_regions_name', 'PartnerPoints.partner_point_name',
                        'PartnerPoints.deleted_l', 'PartnerPoints.actual_l')
                    ->join('Partners', 'Partners.id', '=', 'PartnerPoints.partner_id')
                    ->leftjoin('PartnerRegions', 'PartnerRegions.id', '=', 'PartnerPoints.partner_regions_id')
                    ->where('PartnerPoints.partner_id', $request['id'])
                    ->get()->toArray();
                $this->type = "select";
                $this->PartnerPoints = json_decode(json_encode($this->PartnerPoints), true);
                $this->currentValue = $this->PartnerPoints[0]['partner_name'];
            }

            $isUseRegionsTrue = $this->PartnerPoints[0]['use_regions'] ?? null;
            if ($isUseRegionsTrue == true) {

                $this->partnerRegionsName = [
                    'key' => 'partner_regions_name',
                    'sortable' => true,
                    'class' => 'partner_regions_name',
                    'label' => $this->getTranslatedListCaption('Region'),
                    'thStyle' => 'width: 23%',
                    "zone" => "1",
                    "order" => "3"
                ];
                $this->showPartnerRegions = true;

            } else {
                $this->showPartnerRegions = false;

                $this->PartnerPointsNew = DB::table($request['dependent']['controller_alias'])->where('id', $request['dependent']['id'])->get()->toArray();
                $this->PartnerPointsNew = json_decode(json_encode($this->PartnerPointsNew), true);
            }
//            $this->type = (string)"select";


        } else {

            $this->formTitle = $this->getTranslatedListCaption('Partner');
            $this->showPartnerRegions = true;
            $this->PartnerPoints = DB::table('PartnerPoints')
                ->select('PartnerPoints.id', 'PartnerPoints.id', 'Partners.partner_name', 'Partners.use_regions', 'PartnerRegions.partner_regions_name', 'PartnerPoints.partner_point_name',
                    'PartnerPoints.deleted_l', 'PartnerPoints.actual_l')
                ->join('Partners', 'Partners.id', '=', 'PartnerPoints.partner_id')
                ->leftjoin('PartnerRegions', 'PartnerRegions.id', '=', 'PartnerPoints.partner_regions_id')
                ->get()->toArray();
            $this->PartnerPoints = json_decode(json_encode($this->PartnerPoints), true);

            if (!isset($request['dependent'])) {
                $this->type = (string)"select";
            }

        }

//        if (!isset($request['dependent'])) {
////            $this->type = (string)"select";
//        }

        return $this;
    }

    public function prepareListModelData()
    {
//        $models = $this->list_model;
        $models = $this->PartnerPoints;

//        $models = json_decode(json_encode($models), true);

        $this->list_model = [];

        foreach ($models as $model) {
            array_push($this->list_model, [
                'id' => $model['id'],
                'deleted_l' => $model['deleted_l'] ?? null,
                'partner_id' => $model['partner_id'] ?? null,
                'partner_name' => $model['partner_name'] ?? null,
                'partner_regions_id' => $model['partner_regions_id'] ?? null,
                'partner_regions_name' => $model['partner_regions_name'] ?? null,
                'partner_point_name' => $model['partner_point_name'],
                'partner_point_address' => $model['partner_point_address'] ?? null,
                'uid_1c_code' => $model['uid_1c_code'] ?? null,
                'actual_l' => $model['actual_l'],
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
                    ]
                ]
            ]
        ];

        if (!$this->showPartnerRegions) {
            array_push($this->list_block_fields[0]['block_fields'],
                [
                    'key' => 'partner_name',
                    'sortable' => true,
                    'class' => 'partner_name',
                    'label' => $this->getTranslatedListCaption('Partner'),
                    'thStyle' => 'width: 38%',
                    "zone" => "1",
                    "order" => "3"
                ],
                [
                    'key' => 'partner_point_name',
                    'sortable' => true,
                    'class' => 'partner_point_name',
                    'label' => $this->getTranslatedListCaption('Name'),
                    'thStyle' => 'width: 40%',
                    "zone" => "1",
                    "order" => "3"
                ]);

        } else {
            array_push($this->list_block_fields[0]['block_fields'],
                [
                    'key' => 'partner_name',
                    'sortable' => true,
                    'class' => 'partner_name',
                    'label' => $this->getTranslatedListCaption('Partner'),
                    'thStyle' => 'width: 23%',
                    "zone" => "1",
                    "order" => "3"
                ],
                [
                    'key' => 'partner_regions_name',
                    'sortable' => true,
                    'class' => 'partner_regions_name',
                    'label' => $this->getTranslatedListCaption('Region'),
                    'thStyle' => 'width: 27%',
                    "zone" => "1",
                    "order" => "3"
                ],
                [
                    'key' => 'partner_point_name',
                    'sortable' => true,
                    'class' => 'partner_point_name',
                    'label' => $this->getTranslatedListCaption('Name'),
                    'thStyle' => 'width: 28%',
                    "zone" => "1",
                    "order" => "3"
                ]);
        }

        return $this;
    }

    public function setListCaptions()
    {
        $this->list_captions = [
            'ok',
            'apply',
            'back', 'Main',
            'Code', 'Name',
            'Consumer', 'Database', 'Actual', 'Region',
            'PartnerPoints', 'Partner', 'DeleteMark', 'PartnerRegions',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy'
        ];

        $this->translateListCaptions();
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
//        $this->list_dependent = false;

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
//                "type"          => 'select',
//                "current_value" => $this->list_model[0]["partner_name"] ?? "",
                "current_value" => $this->list_model[0]["partner_name"] ?? null,
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

    public function setListFormTitle()
    {
        $this->list_form_title = "Partners";

        return $this;
    }

    protected function listAdditionalQuery(Builder $builder)
    {

    }

    public function cardold(Request $request)
    {
        $captionName = [
            'ok',
            'apply',
            'back', 'Main', 'CreatedAt',
            'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'Name', 'PrimaryContractor', 'PartnerPoint',
            'SystemDetails', 'Uid1cCode', 'Actual', 'ConsumerNameDefault', 'Region', 'AddressPartner', 'Partner', 'new'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        if (strpos($request->id, 'new') !== false) {
            $PartnerPoints = [PartnerPoint::getNewObject()];
            $listTable = [];

        } else {

            $PartnerPoints = DB::table('PartnerPoints')
                ->leftJoin('Partners', 'PartnerPoints.partner_id', '=', 'Partners.id')
                ->select('PartnerPoints.id', 'Partners.partner_name', 'PartnerPoints.partner_id', 'PartnerPoints.actual_l',
                    'PartnerPoints.partner_point_address', 'PartnerPoints.partner_regions_id', 'PartnerPoints.db_area_id', 'Partners.partner_name', 'Partners.use_regions')
                ->where('PartnerPoints.id', $request->id)
                ->get()->toarray();

            $PartnerPoints = json_decode(json_encode($PartnerPoints), true);
            $listTable = PartnerPointsTabContractor::where('partner_point_id', $request->id)->get()->toArray();
        }

        $contReqId = $request->id;

        $newObject = PartnerPointsTabContractor::getNewObject();

        $partnerPoint = PartnerPoint::select('id', 'partner_point_name')->get()->toarray();
        $contractors = Contractor::select('id', 'contractor_short_name')->get()->toarray();

        if (!empty($request['dependent']['controller_alias']) or ($request['dependent']['controller_alias'] != null)) {
//        if ( !empty($request['dependent']) or ($request['dependent'] == null)  ) {

            $PartnerPointsNew = DB::table($request['dependent']['controller_alias'])
                ->where('id', $request['dependent']['id'])
                ->get()->toArray();

            $PartnerPointsNew = json_decode(json_encode($PartnerPointsNew), true);
        }
        if (($request['dependent']['controller_alias'] == 'Partners')) {

            $PartnerPointsNew = $PartnerPointsNew[0]['id'];
            $Partner = Partner::where('id', $request['dependent']['id'])->first()->toArray();

            $depModel = "partner_name";
            $depCurrentValue = $PartnerPoints[0]['partner_name'] ?? $PartnerPointsNew[0]['partner_name'] ?? $PartnerPointsDependentNew[0]['partner_name'] ?? null;
            $optionsFieldTitle = "partner_name";
            $titleDepend = $getArrayCaptions['Partner']['translation_captions']['caption_translation'];

        } elseif ($request['dependent']['controller_alias'] == 'PartnerRegions') {

            $PartnerPointsRegionsNew = $PartnerPointsNew[0]['partner_regions_name'] ?? null; //--------------!!!!!!!!!!!!!!!!
            $PartnerPointsNew = $PartnerPointsNew[0]['partner_id'];
            $Partner = Partner::where('id', $PartnerPointsNew)->first()->toArray();

            $depModel = "partner_regions_name";
            $depCurrentValue = $PartnerPoints[0]['partner_regions_name'] ?? $PartnerPointsNew[0]['partner_regions_name'] ?? null;
            $optionsFieldTitle = "partner_regions_name";

            $titleDepend = $getArrayCaptions['Region']['translation_captions']['caption_translation'];
            $PartnerPointsRegionsIdNew = $request['dependent']['id'];
        } elseif (!isset($request['dependent']) or ($request['dependent'] == null)) {
            $titleDepend = $getArrayCaptions['Partner']['translation_captions']['caption_translation'];
            $depModel = "partner_name";
            $Partner = Partner::where('id', $request->id)->select('id', 'partner_name')->get()->toArray();

            $depCurrentValue = $Partner[0]['partner_name'] ?? null;
        }


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

            $contRequest = PartnerPoint::getNewObject();

            if (!empty($PartnerPointsNew)) {
                $PartnerPointsDependentNew = Partner::where('id', $PartnerPointsNew)->select('id', 'partner_name')->get()->toArray();
            }

        } else {
            $contRequest = PartnerPoint::with([
                'partner' => function ($query) {
                    $query->select('id', 'partner_name');
                },
                'partnerRegions' => function ($query) {
                    $query->select('id', 'partner_regions_name');
                }
            ])
                ->where('id', $contReqId)->first()->toArray();
            if (!empty($PartnerPointsNew)) {

                $PartnerPointsDependentNew = Partner::where('id', $PartnerPointsNew)->select('id', 'partner_name')->get()->toArray();
            }
            $newObject['partner_point_id'] = $contRequest['id'] ?? null;
        }


        $newObject['partner_point_id'] = $contRequest['id'] ?? null;

        $PartnerRegion = PartnerRegion::where('partner_id', $request['dependent']['id'])->get()->all();

        $model = 'App\Models\Controller';
        $mainModel = $model::where('controller_code', class_basename(Route::current()->controller))
            ->value('controller_alias');

        if ((!empty($Partner['use_regions'])) and ($Partner['use_regions'] === true)) {

            $partnerRegionsId = [
                'title' => $getArrayCaptions['Region']['translation_captions']['caption_translation'],
                'model_name' => $mainModel,
                'model' => 'partner_regions_id',
                'width' => '100%',
                'type' => 'vue-select',
                'zone' => '1',
                'order' => '2',
                'options' => [],
                "options_data" => [
                    "options_data_model" => "PartnerRegion",
                    "options_field_id" => "id",
                    "options_field_title" => "partner_regions_name",
                    "options_field_id_value" => "",
                    "search" => ""
                ],
            ];
        }
        if ((!empty($Partner['use_regions'])) and ($Partner['use_regions'] === false)
            or (($request['dependent']['controller_alias'] === "PartnerRegions")) and (($request['id'] === "new") or (!empty($request['dependent']['id'])))) {
            $partnerRegionsId = [];
        }

        $nameControllerMethod = [
            'controller' => class_basename(Route::current()->controller),
            'accessRight' => 'record'
        ];
        $formShowParam = (new CheckController($nameControllerMethod))->getShowFormParameters();

        $table_fields = [];

        array_push($table_fields,
            [
                'key' => 'actions',
                'edit' => false,
                "filter" => false,
                "sortable" => false,
                'thStyle' => 'width: 10%',
            ],
            [
                'key' => 'line_n',
                'edit' => false,
                "filter" => true,
                "sortable" => true,
                'type' => 'label',
                'typeVal' => 'number',
                "label" => '№',
                'thStyle' => 'width: 6%',
                "validation" => ["required" => true]
            ],
            [
                'key' => 'contractor_id',
                'edit' => true,
                "filter" => true,
                "sortable" => true,
                'type' => 'select',
                "label" => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                'thStyle' => 'width: 64',
                'options' => [],
                "options_data" => [
                    "options_data_model" => "Contractors",
                    "options_field_id" => "id",
                    "options_field_title" => "contractor_short_name",
                    "search" => ""
                ],
                "validation" => ["required" => true]
            ],
            [
                'key' => 'main_l',
                'edit' => true,
                "filter" => false,
                "sortable" => false,
                'type' => 'checkbox',
                "label" => $getArrayCaptions['PrimaryContractor']['translation_captions']['caption_translation'],
                'thStyle' => 'width: 30%',
                "validation" => ["required" => true]
            ]
        );

        $tabs = [
            [

                "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                "blocks_quantity" => 1,
                "blocks" => [
                    [
                        "block_zone_quantity" => 1,
                        "block_model" => $mainModel,
                        "block_type" => "block_card",
                        "block_fields" => [

                            [
                                'title' => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                'model_name' => $mainModel,
                                'model' => 'partner_point_name',
                                'width' => '100%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '1'
                            ],
                            $partnerRegionsId ?? [],

                            [
                                'title' => $getArrayCaptions['AddressPartner']['translation_captions']['caption_translation'],
                                'model_name' => $mainModel,
                                'model' => 'partner_point_address',
                                'width' => '100%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '2'
                            ],

                        ]

                    ],
                    [//Пока вручную
                        "block_title" => 'Табличная часть',
                        "block_zone_quantity" => 1,
                        "block_model" => "PartnerPointsTabContractors",
                        "block_type" => "block_list_base",
                        "block_parameters" => [
                            "prevent_list_click" => true,
                            "edit_values" => true,
                            "edit_mode" => 'inline',
                            "empty_row" => $newObject,
                        ],
                        "show_name" => false,
                        "block_fields" => $table_fields
//                                [
//                                ['key' => 'row_n', 'edit' => true, "filter" => true, "sortable" => true, 'type' => 'label', 'class' => '',
//                                    "label" => $getArrayCaptions['Number']['translation_captions']['caption_translation'], 'thStyle' => 'width: 17%', "zone" => "1", "order" => "2"],
//                                ['key' => "row_date", "filter" => true, "sortable" => true, 'class' => '', 'type' => 'label', 'options_data' => ['search' => ''],
//                                    "label" => $getArrayCaptions['Date']['translation_captions']['caption_translation'], 'thStyle' => 'width: 16%', "zone" => "1", "order" => "3"],
//                                ['key' => "advance_payment", "filter" => true, "sortable" => true, 'type' => 'label', 'class' => '',
//                                    'label' => $getArrayCaptions['AdvancePayment']['translation_captions']['caption_translation'], 'thStyle' => 'width: 33%', "zone" => "1", "order" => "4"],
//                                ['key' => "lease_payment", "filter" => true, "sortable" => true, 'type' => 'label', 'class' => '',
//                                    'label' => $getArrayCaptions['LeasePayment']['translation_captions']['caption_translation'], 'thStyle' => 'width: 33%', "zone" => "1", "order" => "5"]
//                            ]
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
                            ['title' => $getArrayCaptions['Actual']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'actual_l', 'type' => 'checkbox', 'width' => '50%', 'zone' => '1', 'order' => '3'],
                        ]
                    ]
                ]
            ];
            array_push($tabs, $tabSystem);
        }

        $res = [[ //Итоговый массив рекизитов
            'id' => $contRequest['id'],
            'partner_id' => $contRequest['partner_id'] ?? $PartnerPointsNew ?? null,
            'db_area_id' => $contRequest['db_area_id'] ?? null,
            'partner_name' => $contRequest['partner']['partner_name'] ?? $PartnerPointsNew[0]['partner_name'] ?? $PartnerPointsDependentNew[0]['partner_name'] ?? null,
            'partner_regions_id' => $contRequest['partner_regions_id'] ?? $PartnerPointsRegionsIdNew ?? null,
            'partner_regions_name' => $contRequest['partner_regions']['partner_regions_name'] ?? $PartnerPointsRegionsNew ?? null,
            'partner_point_name' => $contRequest['partner_point_name'],
            'partner_point_address' => $contRequest['partner_point_address'],
            'uid_1c_code' => $contRequest['uid_1c_code'],
            'deleted_l' => $contRequest['deleted_l'],
            'actual_l' => $contRequest['actual_l'],
            'created_at' => $contRequest['created_at'],
            'created_by' => $contRequest['created_by'],
            'updated_at' => $contRequest['updated_at'],
            'updated_by' => $contRequest['updated_by'],
        ]];

        $card = [
            "sets" => $this->getButtonsList(['card_actions']),

            "main_data_models" => [
                $mainModel => $res,
                'PartnerPointsTabContractors' => $listTable,
            ],
            "add_data_models" => [
                "Partner" => $Partner ?? null,
                "PartnerRegion" => $PartnerRegion,
                "PartnerPoint" => $partnerPoint,
                "Contractors" => $contractors,
            ],

            "form_parameters" => [
                "form_title" => $getArrayCaptions['PartnerPoint']['translation_captions']['caption_translation'],
                "form_code" => $mainModel,
                "form_is_dependent" => true,
                "form_type" => "card",
                "disable_inputs" => $formShowParam['read_only'],
                "form_base_data_model" => $mainModel,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name" => $res[0]['partner_point_name'] ?? $getArrayCaptions['new']['translation_captions']['caption_translation'],
                "form_type_list" => [
                    "form_list_url" => " ",

                ],
            ],

            "dependent" => [
                "dependent_data_model" => $mainModel,
                "dependent_fields" => [
                    "title" => $titleDepend ?? null,
                    "model" => 'partner_name',
                    "type" => "label",
                    "current_value" => $depCurrentValue ?? null,
                    "options" => [],
                    "options_data" => [
                        "options_data_model" => $request['dependent']['controller_alias'] ?? 'Partners' ?? null,
//                        "options_data_model" => $request['dependent']['controller_alias'] ??  !isset( $request['dependent']['controller_alias']) ,
                        "options_field_id" => "id",
                        "options_field_id_value" => "",
                        "options_field_title" => $optionsFieldTitle ?? 'partner_name' ?? null,
                        "search" => ''
                    ],
                ],
                "width" => "100%",
            ],

            "tabs" => $tabs
        ];

        return response()->json($card);

    }

    public function setCardCaptions(): self
    {
        $this->card_captions = [
            'ok',
            'apply',
            'back', 'Main', 'CreatedAt',
            'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'Name', 'PrimaryContractor', 'PartnerPoint',
            'SystemDetails', 'Uid1cCode', 'Actual', 'ConsumerNameDefault', 'Region', 'AddressPartner', 'Partner', 'new'
        ];

        $this->translateCardCaptions();

        return $this;
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

            $this->card_model = PartnerPoint::getNewObject();
//            $this->contractor_info_count = NULL;
            $this->contReqId = NULL;

            $this->cardAdditionalQuery($this->card_model);
        } else {

            $this->card_model = PartnerPoint::leftJoin('Partners', 'PartnerPoints.partner_id', '=', 'Partners.id')
                ->select('PartnerPoints.id', 'PartnerPoints.partner_point_name', 'Partners.partner_name', 'PartnerPoints.partner_id', 'PartnerPoints.actual_l',
                    'PartnerPoints.partner_point_address', 'PartnerPoints.partner_regions_id', 'PartnerPoints.db_area_id', 'PartnerPoints.deleted_l', 'PartnerPoints.actual_l',
                    'PartnerPoints.created_at', 'PartnerPoints.created_by', 'PartnerPoints.updated_at', 'PartnerPoints.updated_by',
                    'Partners.partner_name', 'Partners.use_regions')
                ->where('PartnerPoints.id', $request->id)
                ->get();
            $this->card_model = json_decode(json_encode($this->card_model), true);

            if (!$this->card_model)
                return abort('403');
            $this->cardAdditionalQuery($this->card_model);

            $this->card_model = $this->card_model[0];

//            $this->partnerPointsCount = count($this->card_model['partner_point']);
//            $this->partnerPointsRegionsCount = count($this->card_model['partner_region']);
//            $this->countPartnerEmployee = count($this->card_model['partner_employee']);
        }

        $this->newObject = PartnerPointsTabContractor::getNewObject();
        $this->partnerPoint = PartnerPoint::select('id', 'partner_point_name')->get()->toarray();
        $this->contractors = Contractor::select('id', 'contractor_short_name')->get()->toarray();

        if (!empty($request['dependent']['controller_alias']) or ($request['dependent']['controller_alias'] != null)) {

            $this->PartnerPointsNew = DB::table($request['dependent']['controller_alias'])
                ->where('id', $request['dependent']['id'])
                ->get()->toArray();

            $this->PartnerPointsNew = json_decode(json_encode($this->PartnerPointsNew), true);
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

            if ($dependent_model->models->table_code === "Partner"){
                $this->PartnerPointsNew = $this->PartnerPointsNew[0]['id'];
                $this->Partner = Partner::where('id', $request['dependent']['id'])->first()->toArray();
                $this->isset_dependent = $dependent_model->models->table_code === "Partner";


            } elseif ($dependent_model->models->table_code === "PartnerRegion"){
                $this->isset_dependent = $dependent_model->models->table_code === "PartnerRegion";
                $this->PartnerPointsRegionsNew = $this->PartnerPointsNew[0]['partner_regions_name'] ?? null;
            }
        }

        $this->card_model = [
            [
                'id' => $model['id'],
                'partner_id' => $model['partner_id'][0]['id'] ?? $this->PartnerPointsNew[0]['id'] ?? $this->PartnerPointsNew ?? null,
                'db_area_id' => $model['db_area_id'] ?? null,
                'partner_name' => $this->Partner['partner_name'] ?? $this->PartnerPointsNew[0]['partner_name'] ?? null,
                'partner_regions_id' => $model['partner_regions_id'] ?? $this->PartnerPointsRegionsIdNew ?? null,
                'partner_regions_name' => $model['partner_regions']['partner_regions_name'] ?? $this->PartnerPointsRegionsNew ?? null,
                'partner_point_name' => $model['partner_point_name'],
                'partner_point_address' => $model['partner_point_address'],
//                'uid_1c_code' => $model['uid_1c_code'] ,
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

    public function setCardDependent(): self
    {
        if ($this->isset_dependent) {
            $this->card_dependent = true;
        } else {
            $this->card_dependent = !$this->isNewObject();
        }

        return $this;
    }

    public function setCardDependentBlock(): self
    {
        $request = request();
        if ($this->isCardDependent()) {
            if (($request['dependent']['controller_alias'] == 'Partners')) {
                $this->depModel = "partner_name";
                $this->optionsFieldTitle = "partner_name";
                $this->titleDepend = $this->getTranslatedCardCaption("Partner");

            } elseif ($request['dependent']['controller_alias'] == 'PartnerRegions') {

                $this->PartnerPointsRegionsNew = $this->PartnerPointsNew[0]['partner_regions_name'] ?? null;
                $this->depModel = "partner_regions_name";
                $this->optionsFieldTitle = "partner_regions_name";
                $this->titleDepend = $this->getTranslatedCardCaption("Region");
            }
            elseif (  !isset($request['dependent']) ){
                $this->depModel = "partner_point_name";
                $this->optionsFieldTitle = "partner_point_name";
                $this->titleDepend = $this->getTranslatedCardCaption("PartnerPoints");
            }

            $this->card_dependent_block = [
                "dependent_data_model" => $this->card_controller_alias,
                "dependent_fields" => [
                    "title" => $this->titleDepend,
//                    "model" => "partner_id",
                    "model" => $this->depModel,
                    "type" => "label",
                    "options" => [],
                    "options_data" => [
                        "options_field_id" => "id",
                        "options_field_id_value" => "",
                        "options_field_title" => $this->depModel,
                        "search" => ''
                    ],
                ],
                "width" => "100%",
            ];
        }

        return $this;
    }

    public function setCardAddDataModels(): self
    {
        $request = request();
        $this->partnerPoint = PartnerPoint::select('id', 'partner_point_name')->get()->toarray();
        $this->contractors = Contractor::select('id', 'contractor_short_name')->get()->toarray();
        $this->PartnerRegion = PartnerRegion::where('partner_id', $request['dependent']['id'])->get()->all();

        if (!$this->isset_dependent && $this->isNewObject()) {
            $this->Partners = Partner::where('id', $request['dependent']['id'])->first()->toArray();
             $this->card_add_data_models = [
                "Partners" => $this->Partner,
             ];
        } else {
            $this->card_add_data_models = [];
        }

        $this->card_add_data_models = [
            "Contractors" => $this->contractors,
            "PartnerPoint" => $this->partnerPoint,
            "PartnerRegion" => $this->PartnerRegion,
        ];

        return $this;
    }

    public function setCardBlockFields()
    {
        $request = request();

//        $singleContractor = count($contractors) == 1 ? true : false;
        if ((!empty($this->Partner['use_regions'])) and ($this->Partner['use_regions'] === true)) {

            $partnerRegionsId = [
                'title' => $this->getTranslatedCardCaption("Region"),
                'model_name' => $this->card_controller_alias,
                'model' => 'partner_regions_id',
                'width' => '100%',
                'type' => 'vue-select',
                'zone' => '1',
                'order' => '2',
                'options' => [],
                "options_data" => [
                    "options_data_model" => "PartnerRegion",
                    "options_field_id" => "id",
                    "options_field_title" => "partner_regions_name",
                    "options_field_id_value" => "",
                    "search" => ""
                ],
            ];
        }

        if ((!empty($this->Partner['use_regions'])) and ($this->Partner['use_regions'] === false)
            or (($request['dependent']['controller_alias'] === "PartnerRegions"))
            and (($request['id'] === "new")
                or (!empty($request['dependent']['id'])))) {
            $partnerRegionsId = [];
        }

        $this->card_block_fields = [
            [
                "tab_title" => $this->getTranslatedCardCaption("Main"),
                "blocks_quantity" => 1,
                "blocks" => [
                    [
//                        "block_title" => $this->getTranslatedCardCaption("PartnerPoint"),
                        "block_zone_quantity" => 1,
                        "block_model" => $this->card_controller_alias,
                        "block_type" => "block_card",

                        "block_fields" => [
                            [
                                'title' => $this->getTranslatedCardCaption("Name"),
                                'model_name' => $this->card_controller_alias,
                                'model' => 'partner_point_name',
                                'width' => '100%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '1'
                            ],
                            $partnerRegionsId ?? [],

                            [
                                'title' => $this->getTranslatedCardCaption("AddressPartner"),
                                'model_name' => $this->card_controller_alias,
                                'model' => 'partner_point_address',
                                'width' => '100%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '2'
                            ]
                        ]
                    ],

                    [//Пока вручную
                        "block_title" => 'Табличная часть',
                        "block_zone_quantity" => 1,
                        "block_model" => "PartnerPointsTabContractors",
//                        "block_model" => "Partners",
                        "block_type" => "block_list_base",
                        "block_parameters" => [
                            "prevent_list_click" => true,
                            "edit_values" => true,
                            "edit_mode" => 'inline',
                            "empty_row" => $this->newObject,
                            "hide_pagination" => true

                        ],
                        "show_name" => false,
//                        "block_fields" => $this->table_fields
                        "block_fields" => [
                            [
                                'key' => 'actions',
                                'edit' => false,
                                "filter" => false,
                                "sortable" => false,
                                'thStyle' => 'width: 10%',
                            ],
                            [
                                'key' => 'line_n',
                                'edit' => false,
                                "filter" => true,
                                "sortable" => true,
                                'type' => 'label',
                                'typeVal' => 'number',
                                "label" => '№',
                                'thStyle' => 'width: 6%',
                                "validation" => ["required" => true]
                            ],
                            [
                                'key' => 'contractor_id',
                                'edit' => true,
                                "filter" => true,
                                "sortable" => true,
                                'type' => 'select',
                                "label" => $this->getTranslatedCardCaption("Name"),
                                'thStyle' => 'width: 64',
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => "Contractors",
                                    "options_field_id" => "id",
                                    "options_field_title" => "contractor_short_name",
                                    "search" => ""
                                ],
                                "validation" => ["required" => true]
                            ]
                            ,
                            [
                                'key' => 'main_l',
                                'edit' => true,
                                "filter" => false,
                                "sortable" => false,
                                'type' => 'checkbox',
                                "label" => $this->getTranslatedCardCaption("PrimaryContractor"),
                                'thStyle' => 'width: 30%',
                                "validation" => ["required" => true]
                            ]
                        ]
                    ]
                ],
            ]
        ];

//        if (!$this->isset_dependent && $this->isNewObject()) {
//            array_push($this->card_block_fields[0]["blocks"][0]["block_fields"], [
//                    'title' => $this->getTranslatedCardCaption("Partner"),
//                    'model_name' => $this->card_controller_alias, 'model' => 'partner_id',
//                    'type' => 'vue-select',
//                    'width' => '100%',
//                    'options' => [],
//                    "options_data" => [
//                        "options_data_model" => "Partners",
//                        "options_field_id" => "id",
//                        "options_field_title" => "partner_name",
//                        "search" => ""
//                    ],
//                    "zone" => "1",
//                    "order" => "1",
//                    "border_right" => false
//                ]
//            );
//        }
        return $this;
    }

    public function setCardMainDataModels(): self
    {
        $request = request();
        $this->newObject['partner_point_id'] = (int)$request->id ?? null;
        if ($this->isNewObject()) {
            $this->newObject = PartnerPointsTabContractor::getNewObject();
            $this->card_main_data_models = [
                "PartnerPointsTabContractors" => []
            ];
//            $this->card_main_data_models = $this->getTranslatedCardCaption("new");
        } else {
            $this->card_main_data_models = [
                "PartnerPointsTabContractors" => PartnerPointsTabContractor::where('partner_point_id', $this->card_model[0]["id"])->get()
            ];
        }

        return $this;
    }

    public function setCardFormTitle(): self
    {
        $this->card_form_title = 'PartnerPoint';

        return $this;
    }

}
