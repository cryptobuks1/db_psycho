<?php

namespace App\Http\Controllers\Api\TabAccess;

use App\Http\Classes\CheckController;

use App\Http\Traits\HasCard;
use App\Http\Traits\HasList;
use App\Models\AccessRight;
use App\Models\AccessRightByRole;
use App\Models\Consumer;
use App\Models\Contractor;
use App\Models\Language;
use App\Models\Partner;
use App\Models\PartnerPoint;
use App\Models\PartnerPointsTabContractor;
use App\Models\PartnerRegion;
use App\Models\TranslationCaption;
use App\Report;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\AccessRole;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;

/**
 * Description of AccessRolesController
 *
 * @author Юрий Юренко
 * 27.09.2018
 */
class AccessRolesController extends Controller
{

    use HasList, HasCard;

    public $access_roles;
    public $currentValue;
    public $formTitle;
    public $newObject;
    public $formShowParam;
    public $isset_dependent;
    public $mainModel;
//    public $PartnerPoints;
//    public $partnerPoint;
//    public $contractors;
//    public $contReqId;
//    public $Partner;
//    public $PartnerRegion;


    public function __construct()
    {
//        $this->model = PartnerPoint::class;
    }

    public function listQuery()
    {
        $request = request();
//        $this->formTitle = $this->getTranslatedListCaption('PartnerRegions');

        $this->access_roles = DB::table('_AccessRoles')
            ->orderBy('access_role_name', 'asc')
            ->select('_AccessRoles.id', '_AccessRoles.access_role_name', '_AccessRoles.access_role_code',
                '_AccessRoles.actual_l')
            ->get()->toArray();

        $this->access_roles = json_decode(json_encode($this->access_roles), true);
        $this->type = "label";
//        $this->currentValue = $this->access_roles[0]['partner_regions_name'] ?? null;

        return $this;
    }

    public function prepareListModelData()
    {
        $models = $this->access_roles;
        $this->list_model = [];

        foreach ($models as $model) {
            array_push($this->list_model, [
                'id' => $model['id'],
                'menu_item_id_left' => $model['menu_item_id_left'] ?? null,
                'menu_item_id_top' => $model['menu_item_id_top'] ?? null,
                'access_role_name' => $model['access_role_name'] ?? null,
                'access_role_code' => $model['access_role_code'] ?? null,
                'actual_l' => $model['actual_l'] ?? null,
                'help_id' => $model['help_id'] ?? null,
                'home_url' => $model['home_url'] ?? null,
                'home_fe_route_id' => $model['home_fe_route_id'] ?? null,
                'user_interface_id' => $model['user_interface_id'] ?? null,
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

                    ['key' => 'actual_l', 'sortable' => false, 'type' => 'checkbox',
                        "label" => $this->getTranslatedListCaption('Actual'), 'thStyle' => 'width: 8%', 'zone' => '1', 'order' => '3'
                    ],

                    [
                        'key' => 'access_role_name',
                        'sortable' => true,
                        'class' => 'access_role_name',
                        'label' => $this->getTranslatedListCaption('AccessRoleName'),
                        'thStyle' => 'width: 38%',
                        "zone" => "1",
                        "order" => "3"
                    ],
                    [
                        'key' => 'access_role_code',
                        'sortable' => true,
                        'class' => 'access_role_code',
                        'label' => $this->getTranslatedListCaption('AccessRoleCode'),
                        'thStyle' => 'width: 40%',
                        "zone" => "1",
                        "order" => "3"
                    ]
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
            'Code', 'Name',
            'Consumer', 'Database', 'Actual', 'Region',
            'PartnerPoints', 'Partner', 'DeleteMark', 'PartnerRegions',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy', 'AccessRoleName', 'AccessRoleCode'

        ];

        $this->translateListCaptions();
        return $this;
    }

    public function setListFormSearchField()
    {
        $this->list_form_search_field = "access_role_name";
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
            "dependent_fields" => [
                "title" => $this->getTranslatedListCaption("Partner"),
                "model" => "partner_id",
                "type" => $this->type,
                "current_value" => $this->list_model[0]["partner_name"] ?? null,
                "options" => [],
                "options_data" => [
                    "options_data_model" => $this->list_controller_alias,
                    "options_field_id" => "id",
                    "options_field_id_value" => "",
                    "options_field_title" => "partner_name",
                    "search" => ''
                ],
            ],
            "width" => "100%",
        ];

        if ($this->type === "select")
            $this->list_dependent_block["allow_creation_if_empty"] = true;

        return $this;
    }

    public function setListFormTitle()
    {
        $this->list_form_title = "Access Roles";

        return $this;
    }

    protected function listAdditionalQuery(Builder $builder)
    {

    }

    public function setCardCaptions(): self
    {
        $this->card_captions = [
            'ok',
            'apply',
            'back', 'Main', 'CreatedAt',
            'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'Name',
            'SystemDetails', 'Uid1cCode', 'Actual', 'ConsumerNameDefault', 'new', "Code", 'AccessRoles',
            'Read', 'Record', 'Insert', 'Update', 'Delete', 'DeleteMark', 'Download', 'Upload', 'ActualMark',
            'SendRequest', 'Actual', 'Filter',
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

//            $this->card_model = PartnerPoint::getNewObject();
//            $this->contractor_info_count = NULL;
            $this->contReqId = NULL;

            $this->cardAdditionalQuery($this->card_model);
        } else {

            $this->card_model = AccessRole::select('_AccessRoles.id', '_AccessRoles.access_role_name', '_AccessRoles.access_role_code')
                ->where('_AccessRoles.id', $request->id)
                ->get();
            $this->card_model = json_decode(json_encode($this->card_model), true);

            if (!$this->card_model)
                return abort('403');
            $this->cardAdditionalQuery($this->card_model);

            $this->card_model = $this->card_model[0];
        }
        return $this;
    }

    public function prepareCardModelData()
    {
        $model = $this->card_model;
        $this->card_model = [
            [
                'id' => $model['id'],
                'menu_item_id_left' => $model['menu_item_id_left'] ?? null,
                'menu_item_id_top' => $model['menu_item_id_top'] ?? null,
                'access_role_name' => $model['access_role_name'] ?? null,
                'access_role_code' => $model['access_role_code'] ?? null,
                'actual_l' => $model['actual_l'] ?? null,
                'help_id' => $model['help_id'] ?? null,
                'home_url' => $model['home_url'] ?? null,
                'home_fe_route_id' => $model['home_fe_route_id'] ?? null,
                'user_interface_id' => $model['user_interface_id'] ?? null,
                'created_at' => $model['created_at'] ?? null,
                'created_by' => $model['created_by'] ?? null,
                'updated_at' => $model['updated_at'] ?? null,
                'updated_by' => $model['updated_by'] ?? null,
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
        if ($this->isCardDependent()) {
            $this->card_dependent_block = [
                "dependent_data_model" => $this->card_controller_alias,
                "dependent_fields" => [
                    "title" => $this->getTranslatedCardCaption("AccessRoles"),
                    "model" => "access_role_name",
                    "type" => "label",
                    "options" => [],
                    "options_data" => [
                        "options_field_id" => "id",
                        "options_field_id_value" => "",
                        "options_field_title" => "access_role_name",
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
        if (!$this->isset_dependent && $this->isNewObject()) {
            $this->card_add_data_models = [
            ];
        } else {
            $this->card_add_data_models = [];
        }

        $this->card_add_data_models = [
//            "AllControllers" => $this->all_controllers,
        ];

        return $this;
    }

    public function setCardBlockFields()
    {
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
//                                'title' => 'access_role_name',
                                'model_name' => $this->card_controller_alias,
                                'model' => 'access_role_name',
                                'width' => '50%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '1'
                            ],

                            [
                                'title' => $this->getTranslatedCardCaption("Code"),
//                                'title' => 'access_role_code',
                                'model_name' => $this->card_controller_alias,
                                'model' => 'access_role_code',
                                'width' => '50%',
                                'type' => 'text',
                                'zone' => '1',
                                'order' => '1'
                            ]
                        ]
                    ],

                    [//Пока вручную
                        "block_title" => 'Табличная часть',
                        "block_zone_quantity" => 1,
                        "block_model" => "AccessRightByRole",
                        "block_type" => "block_list_base",
                        "list_width" => "100%",
                        "block_parameters" => [
                            "prevent_list_click" => true,
                            "edit_values" => true,
                            "edit_mode" => 'inline',
                            "empty_row" => $this->newObject,
                            "hide_pagination" => true,
                        ],
                        "show_name" => false,
                        "block_fields" => [
                            [
                                'key' => 'actions',
                                'edit' => false,
                                "filter" => false,
                                "sortable" => false,
                                'thStyle' => 'width: 10%',
                            ],
                            [
//                                'key' => 'id',
                                'edit' => false,
                                "filter" => true,
                                "sortable" => true,
                                'type' => 'label',
                                'typeVal' => 'number',
                                "label" => '№',
                                'thStyle' => 'width: 6%',
                            ],
                            [
//                                'key' => 'caption_code',
                                'key' => 'caption_translation',
                                'edit' => true,
                                "filter" => true,
                                "sortable" => true,
                                'type' => 'text',
                                "label" => $this->getTranslatedCardCaption("Name"),
                                'thStyle' => 'width: 10%',
                            ],

                            [
                                'key' => 'read',
                                'vertical_line' => true,
                                'edit' => true,
                                "filter" => false,
                                "sortable" => false,
                                'type' => 'checkbox',
                                "label" => $this->getTranslatedCardCaption("Read"),
                                'thStyle' => 'width: 5%',
                            ],
                            [
                                'key' => 'record',
                                'vertical_line' => true,
                                'edit' => true,
                                "filter" => false,
                                "sortable" => false,
                                'type' => 'checkbox',
                                "label" => $this->getTranslatedCardCaption("Record"),
                                'thStyle' => 'width: 5%',
                            ],
                            [
                                'key' => 'insert',
                                'vertical_line' => true,
                                'edit' => true,
                                "filter" => false,
                                "sortable" => false,
                                'type' => 'checkbox',
                                "label" => $this->getTranslatedCardCaption("Insert"),
                                'thStyle' => 'width: 5%',
                            ], [
                                'key' => 'update',
                                'vertical_line' => true,
                                'edit' => true,
                                "filter" => false,
                                "sortable" => false,
                                'type' => 'checkbox',
                                "label" => $this->getTranslatedCardCaption("Update"),
                                'thStyle' => 'width: 5%',
                            ], [
                                'key' => 'delete',
                                'vertical_line' => true,
                                'edit' => true,
                                "filter" => false,
                                "sortable" => false,
                                'type' => 'checkbox',
                                "label" => $this->getTranslatedCardCaption("Delete"),
                                'thStyle' => 'width: 5%',
                            ], [
                                'key' => 'deleteMark',
                                'vertical_line' => true,
                                'edit' => true,
                                "filter" => false,
                                "sortable" => false,
                                'type' => 'checkbox',
                                "label" => $this->getTranslatedCardCaption("DeleteMark"),
                                'thStyle' => 'width: 5%',
                            ], [
                                'key' => 'download',
                                'vertical_line' => true,
                                'edit' => true,
                                "filter" => false,
                                "sortable" => false,
                                'type' => 'checkbox',
                                "label" => $this->getTranslatedCardCaption("Download"),
                                'thStyle' => 'width: 5%',
                            ], [
                                'key' => 'upload',
                                'vertical_line' => true,
                                'edit' => true,
                                "filter" => false,
                                "sortable" => false,
                                'type' => 'checkbox',
                                "label" => $this->getTranslatedCardCaption("Upload"),
                                'thStyle' => 'width: 5%',
                            ], [
                                'key' => 'actualMark',
                                'vertical_line' => true,
                                'edit' => true,
                                "filter" => false,
                                "sortable" => false,
                                'type' => 'checkbox',
                                "label" => $this->getTranslatedCardCaption("Actual"),
                                'thStyle' => 'width: 5%',
                            ], [
                                'key' => 'sendRequest',
                                'vertical_line' => true,
                                'edit' => true,
                                "filter" => false,
                                "sortable" => false,
                                'type' => 'checkbox',
                                "label" => $this->getTranslatedCardCaption("SendRequest"),
                                'thStyle' => 'width: 5%',
                            ], [
                                'key' => 'filter',
                                'vertical_line' => true,
                                'edit' => true,
                                "filter" => false,
                                "sortable" => false,
                                'type' => 'checkbox',
                                "label" => $this->getTranslatedCardCaption("Filter"),
                                'thStyle' => 'width: 5%',
                            ]
                        ]
                    ]
                ],
            ]
        ];

        return $this;
    }

    public function setCardMainDataModels(): self
    {
        if ($this->isNewObject()) {
//            $this->newObject = PartnerPointsTabContractor::getNewObject();
            $this->card_main_data_models = [
                "AllControllers" => [],
            ];
//            $this->card_main_data_models = $this->getTranslatedCardCaption("new");
        } else {

            $controllers = \App\Models\Controller::select('__Controllers.id', '__Controllers.controller_code',
                '__Controllers.caption_code', '__Captions.id as captions_id', '__Captions.caption_name')
                ->join('__Captions', '__Captions.caption_name', '=', '__Controllers.caption_code')
                ->get()->toArray();

            $all_controllers = [];
            foreach ($controllers as $controllers_key => $controllers_value) {
                $all_controllers[$controllers_value['id']] = $controllers_value;
            }

            $lng = Language::select('id')->where('language_code', Lang::locale())->first()->toArray();

            $access_right_by_role = AccessRightByRole::join('_AccessRoles', '_AccessRoles.id', '=', '_AccessRightByRoles.access_role_id')
                ->join('__AccessRights', '__AccessRights.id', '=', '_AccessRightByRoles.access_right_id')
                ->join('__Controllers', '__Controllers.id', '=', '_AccessRightByRoles.controller_id')
                ->select('_AccessRightByRoles.controller_id',
                    '_AccessRoles.access_role_code', '__AccessRights.access_right_code', '_AccessRightByRoles.id as access_right_by_roles_id')
                ->where('_AccessRightByRoles.access_role_id', request()->id)
                ->groupBy('_AccessRightByRoles.controller_id',
                    '_AccessRoles.access_role_code', '__AccessRights.access_right_code', 'access_right_by_roles_id')
                ->get()->toArray();

            $all_controllers_right = [];
            foreach ($all_controllers as $controller_key => $controller_value) {
                foreach ($access_right_by_role as $access_right_by_role_key => $access_right_by_role_value) {
                    if ($controller_value['id'] == $access_right_by_role_value['controller_id']) {
                        $all_controllers_right[$controller_value['id']][$access_right_by_role_value['access_right_code']] = true;
                        $all_controllers_right[$controller_value['id']][$access_right_by_role_value['access_right_code'] . "_key"] = $access_right_by_role_value['access_right_by_roles_id'];
                    }
                }
            }

            $rights_status_false = [
                'read' => false,
                'record' => false,
                'insert' => false,
                'update' => false,
                'delete' => false,
                'deleteMark' => false,
                'download' => false,
                'upload' => false,
                'actualMark' => false,
                'sendRequest' => false,
                'filter' => false,
            ];

            $diff = array_diff_key($all_controllers, $all_controllers_right);
            $diff_controllers = [];
            foreach ($diff as $item) {
                $captions_id = $item['captions_id'];
                $getTrans = $this->getTranslationCaption($lng, $captions_id);
                $item['caption_translation'] = $getTrans['caption_translation'];
                $diff_controllers[] = array_merge($item, $rights_status_false);
            }

            $rights = [];
            foreach ($all_controllers as $item_key => $item_value) {
                foreach ($all_controllers_right as $right_key => $right_value) {
                    if ($item_value['id'] == $right_key) {
                        $captions_id = $item_value['captions_id'];
                        $getTrans = $this->getTranslationCaption($lng, $captions_id);
                        $item_value['caption_translation'] = $getTrans['caption_translation'];
                        $rights[] = array_merge($right_value, $item_value);
                    }
                }
            }

            $controller_rights = array_merge($rights, $diff_controllers);
            $keys = array_column($controller_rights, 'caption_translation');
            array_multisort($keys, SORT_ASC, $controller_rights);

            $this->card_main_data_models = [
                "AccessRightByRole" => $controller_rights,
            ];
        }

        return $this;
    }

    public function getTranslationCaption($lng, $captions_id)
    {

        $trans_caption = TranslationCaption::select('caption_translation')->where('caption_id', $captions_id)
            ->where('language_id', $lng['id'])
            ->first()->toArray();
        return $trans_caption;
    }

    public function setCardFormTitle(): self
    {
        $this->card_form_title = 'AccessRoles';

        return $this;
    }

    public function beforeWriteBe(&$bCancel)
    {
        try {
            DB::beginTransaction();
            // Проверка табличной части
            $access_right_objects = $this->main_data_models["AccessRightByRole"] ?? null;
            $access_roles = $this->main_data_models["AccessRoles"] ?? null;

            $access_right_edit_objects = [];
            foreach ($access_right_objects as $access_right_objects_key => $access_right_objects_value) {

//            if (((isset($access_right_objects_value['read']) and ( $access_right_objects_value['read'] != null) /*and ($access_right_objects_value['read'] === false) */) )
                if (((isset($access_right_objects_value['read']) and ($access_right_objects_value['read'] === false) /*and ($access_right_objects_value['read'] === false) */))
                    or
                    ((isset($access_right_objects_value['record'])) and ($access_right_objects_value['record'] === false))
                    or
                    (isset($access_right_objects_value['insert']) and ($access_right_objects_value['insert'] === false))
                    or
                    (isset($access_right_objects_value['update']) and ($access_right_objects_value['update'] === false))
                    or
                    (isset($access_right_objects_value['delete']) and ($access_right_objects_value['delete'] === false))
                    or
                    (isset($access_right_objects_value['deleteMark']) and ($access_right_objects_value['deleteMark'] === false))
                    or
                    (isset($access_right_objects_value['download']) and ($access_right_objects_value['download'] === false))
                    or
                    (isset($access_right_objects_value['upload']) and ($access_right_objects_value['upload'] === false))
                    or
                    (isset($access_right_objects_value['actualMark']) and ($access_right_objects_value['actualMark'] === false))
                    or
                    (isset($access_right_objects_value['sendRequest']) and ($access_right_objects_value['sendRequest'] === false))
                    or
                    (isset($access_right_objects_value['sendRequest']) and ($access_right_objects_value['filter'] === false))
                ) {

                    $access_right_edit_objects[] = $access_right_objects_key = $access_right_objects_value;
                }
            }

            $access_objects = [];
            foreach ($access_right_edit_objects as $objects) {
                $access_objects[] = array_except($objects,
                    ['id', 'caption_code', 'captions_id', 'caption_name', 'caption_translation']);
            }

            $delete_right = [];
            $create_right = [];
            foreach ($access_objects as $edit_objects_key => $edit_objects_value) {

                foreach ($edit_objects_value as $objects_value_key => $objects_value_value) {
                    if (is_int($objects_value_value)) {
                        $exp_objects_value_key = explode('_', $objects_value_key);

                        if (($edit_objects_value[$exp_objects_value_key[0]] === false)) {
                            $get_edit_objects = AccessRightByRole::select('id')->where('id', $objects_value_value)->first()->toArray();
                            $delete_right[$get_edit_objects['id']] = $get_edit_objects['id'];
                        }
                    } elseif (($objects_value_value === null)) {
//                if (($objects_value_value == null)) {
                        $create = $this->createRight($edit_objects_value);
                        $create_right[$edit_objects_key] = $create;
                    }
                }
            }

            if (!empty($delete_right)) {

                DB::table('_AccessRightByRoles')->whereIn('id', $delete_right)->delete();

            }
//        if (isset($create_right) and (!empty($create_right))) {
            if (isset($create_right)) {
                foreach ($create_right as $right) {

                    foreach ($right as $create_right_key => $create_right_value) {
                        if ((is_int($create_right_key))) {
                            $create_new_right = new AccessRightByRole();
                            $create_new_right->access_right_id = $create_right_key;
                            $create_new_right->controller_id = $right['controller_id'];
                            $create_new_right->access_role_id = $access_roles['id'];
                            $create_new_right->save();
                        }
                    }
                }
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            $bCancel = true;

            return [
                "message" => $exception->getMessage()
            ];
        }
    }

    public function createRight($edit_objects_value)
    {

        $create_right_controller = [];
        foreach ($edit_objects_value as $objects_value_key => $objects_value_value) {

            if ($objects_value_value === null) {

                $exp_objects_value_key = explode('_', $objects_value_key);
                $get_edit_objects = AccessRight::select('id')->where('access_right_code', $exp_objects_value_key[0])->first()->toArray();
                $get_id_controller = \App\Models\Controller::select('id')->where('controller_code', $edit_objects_value['controller_code'])->first()->toArray();
                $create_right_controller[$get_edit_objects['id']] = $get_edit_objects['id'];
                $create_right_controller['controller_id'] = $get_id_controller['id'];
            }
        }

        return $create_right_controller;
    }


}



