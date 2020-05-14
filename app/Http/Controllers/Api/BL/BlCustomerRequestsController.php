<?php

namespace App\Http\Controllers\Api\BL;

use App\Http\Classes\CheckController;
use App\Http\Controllers\Api\AttachedFiles\DbAreaFilesController;
use App\Http\Controllers\Api\Controller;
use App\Http\Traits\HasCard;
use App\Http\Traits\HasList;
use App\Models\BL\BlCustomerRequest;
use App\Models\BL\BlCustomerRequestTabComment;
use App\Models\BL\BlCustomerRequestTabLeasingObject;
use App\Models\BL\BlLeasingCalculation;
use App\Models\BL\BlLeasingObjectBrand;
use App\Models\BL\BlLeasingObjectGroup;
use App\Models\BL\BlLeasingObjectModel;
use App\Models\BL\BlLeasingObjectType;
use App\Models\BL\BlLegalForm;
use App\Models\BL\BlStatus;
use App\Models\Company;
use App\Models\Contractor;
use App\Models\DbAreaFile;
use App\Models\InfoKind;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class BlCustomerRequestsController extends Controller
{
    use HasList, HasCard;

    /**
     * @var integer
     */
    private $card_model_id;

    /**
     * @var bool
     */
    private $table_is_shown = false;

    /**
     * @var integer|null
     */
    private $lessee_contractor_id;

    /**
     * @var string
     */
    private $comments_controller_alias;

    public function listQuery()
    {
        if(config("database.default") == "pgsql")
        {
            $query = BlCustomerRequest::query()
                ->leftJoin("blCustomerRequestTabLeasingObjects as a", "a.bl_customer_request_id", "=", "blCustomerRequests.id")
                ->leftJoin("blLeasingObjectTypes as b", "b.id", "=", "a.bl_leasing_object_type_id")
                ->leftjoin("blLeasingObjectBrands as c", "c.id", "=", "a.bl_leasing_object_brand_id")
                ->leftjoin("blLeasingObjectModels as d", "d.id", "=", "a.bl_leasing_object_model_id")
                ->leftJoin("blStatuses", "blStatuses.id", "=", "blCustomerRequests.bl_status_id")
                ->select([
                    DB::raw("to_char(bl_customer_request_date :: DATE, 'dd-mm-yyyy') as bl_customer_request_date"),
                    "blCustomerRequests.bl_customer_request_number",
                    DB::raw("bl_leasing_object_sum"),
                    //                                        DB::raw("to_char(a.bl_leasing_object_sum, '999 999 999 999 999.99') as bl_leasing_object_sum"),
                    "blStatuses.bl_status_name",
                    "blCustomerRequests.id",
                    "blCustomerRequests.partner_point_id",
                    "blCustomerRequests.created_at",
                    "blCustomerRequests.lessee_name",
                    "blCustomerRequests.bl_customer_request_stage",
                    DB::raw("CONCAT(b.bl_leasing_object_type_name, ' ', c.bl_leasing_object_brand_name,' ', d.bl_leasing_object_model_name) as leased_asset")
                ])
                ->applyScopes();

            //            $query->getQuery()->mergeBindings($query->getBindings());

            $this->list_model = DB::table(DB::raw("(" . $query->withoutGlobalScopes()->toSql() . ") as sub_query"))
                //                ->withoutGlobalScopes()
                ->mergeBindings($query->getQuery())->groupBy([
                    "id",
                    "bl_customer_request_date",
                    "lessee_name",
                    "bl_customer_request_stage",
                    "bl_customer_request_number",
                    "created_at",
                    "bl_status_name"
                ])->select([
                    "bl_customer_request_date",
                    "bl_customer_request_number",
                    "bl_status_name",
                    "bl_customer_request_stage",
                    "lessee_name",
                    DB::raw("to_char(sum(bl_leasing_object_sum), '999 999 999 999 999.99') as bl_leasing_object_sum"),
                    "id",
                    DB::raw("string_agg(leased_asset, '; ') as leased_asset")
                ])->orderBy("created_at", 'desc');

            $this->listAdditionalQuery($this->list_model);

            $this->list_model = $this->list_model->get()->toArray();

        }

        if(config("database.default") == "mysql")
        {
            $query = BlCustomerRequest::query()
                ->leftJoin("blCustomerRequestTabLeasingObjects as a", "a.bl_customer_request_id", "=", "blCustomerRequests.id")
                ->leftJoin("blLeasingObjectTypes as b", "b.id", "=", "a.bl_leasing_object_type_id")
                ->leftjoin("blLeasingObjectBrands as c", "c.id", "=", "a.bl_leasing_object_brand_id")
                ->leftjoin("blLeasingObjectModels as d", "d.id", "=", "a.bl_leasing_object_model_id")
                ->leftJoin("blStatuses", "blStatuses.id", "=", "blCustomerRequests.bl_status_id")
                ->select([
                    DB::raw("DATE_FORMAT(bl_customer_request_date,'%d-%m-%Y') as bl_customer_request_date"),
                    "blCustomerRequests.bl_customer_request_number",
                    DB::raw("bl_leasing_object_sum"),
                    "blStatuses.bl_status_name",
                    "blCustomerRequests.lessee_name",
                    "blCustomerRequests.bl_customer_request_stage",
                    "blCustomerRequests.created_at",
                    "blCustomerRequests.id",
                    "blCustomerRequests.partner_point_id",
                    DB::raw("CONCAT(b.bl_leasing_object_type_name, ' ', c.bl_leasing_object_brand_name,' ', d.bl_leasing_object_model_name) as leased_asset")
                ])
                ->applyScopes();;

            $this->list_model = DB::table(DB::raw("(" . $query->withoutGlobalScopes()->toSql() . ") as sub_query"))
                ->mergeBindings($query->getQuery())
                ->groupBy([
                    "id",
                    "bl_customer_request_date",
                    "lessee_name",
                    "bl_customer_request_stage",
                    "bl_customer_request_number",
                    "created_at",
                    "bl_status_name"
                ])
                ->select([
                    "bl_customer_request_date",
                    "bl_customer_request_number",
                    "bl_customer_request_stage",
                    "bl_status_name",
                    "lessee_name",
                    DB::raw("REPLACE(FORMAT(sum(bl_leasing_object_sum), 2), ',', ' ') as bl_leasing_object_sum"),
                    "id",
                    DB::raw("GROUP_CONCAT(leased_asset SEPARATOR '; ') as leased_asset")
                ])
                ->orderBy("created_at", 'desc');

            $this->listAdditionalQuery($this->list_model);

            $this->list_model = $this->list_model->get()->toArray();

        }

        return $this;
    }

    public function prepareListModelData()
    {
        $model = array_map(function($item)
        {
            $item->bl_customer_request_stage = $this->stageToStageName($item->bl_customer_request_stage);
            return $item;
        }, $this->list_model);

        return $this;
    }

    public function insert()
    {

    }

    public function update()
    {

    }

    public function setListBlockFields()
    {
        $this->list_block_fields = [
            [
                "block_title"         => $this->getTranslatedListCaption('Clients'),
                "block_zone_quantity" => 1,
                "block_model"         => $this->list_controller_alias,
                "block_type"          => "block_list_base",
                "block_fields"        => [

                    [
                        'key'      => 'actions',
                        'sortable' => false,
                        'class'    => 'list_checkbox',
                        'thStyle'  => 'width: 6%',
                        "zone"     => "1",
                        "order"    => "1"
                    ],

                    [
                        'key'      => 'bl_customer_request_date',
                        'sortable' => true,
                        'class'    => 'created_at',
                        "label"    => $this->getTranslatedListCaption('Date'),
                        'thStyle'  => 'width: 10%',
                        'typeVal'  => 'date',
                        'format'   => 'MM-DD-YYYY',
                    ],
                    [
                        'key'      => 'bl_customer_request_number',
                        'sortable' => true,
                        "label"    => $this->getTranslatedListCaption('Number'),
                        'thStyle'  => 'width: 21%'
                    ],
                    [
                        'key'      => "bl_leasing_object_sum",
                        'sortable' => true,
                        "label"    => $this->getTranslatedListCaption('Sum'),
                        'thStyle'  => 'width: 21%',
                        'typeVal'  => 'number',
                        'format'   => '0,0.00',
                    ],
                    [
                        'key'      => "leased_asset",
                        'sortable' => true,
                        "label"    => $this->getTranslatedListCaption('LeasingSubject'),
                        'thStyle'  => 'width: 21%'
                    ],
                    [
                        'key'      => "lessee_name",
                        'sortable' => true,
                        "label"    => $this->getTranslatedListCaption('Contractor'),
                        'thStyle'  => 'width: 21%'
                    ],
                    [
                        'key'      => "bl_customer_request_stage",
                        'sortable' => true,
                        "label"    => $this->getTranslatedListCaption('Stage'),
                        'thStyle'  => 'width: 21%'
                    ],
                    //                    [
                    //                        'key'      => "bl_status_name",
                    //                        'sortable' => true,
                    //                        "label"    => 'Статус',
                    //                        'thStyle'  => 'width: 21%'
                    //                    ],

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
            'back',
            'Main',
            'Contractors',
            'ContractorShortName',
            'CountryName',
            'CreatedAt',
            'Database',
            'Individual',
            'Actual',
            'BankAccountTypes',
            'Contractor',
            'CryptoWallets',
            'contactInfo',
            'Clients',
            'ClientShortName',
            'CustomerRequests',
            'SendApplicationLeasing',
            'GeneralLeasingIssues',
            'Date',
            'Number',
            'Sum',
            'LeasingSubject',
            'Stage'
        ];

        $this->translateListCaptions();


        return $this;
    }

    //
    public function setListLinks()
    {
        $this->list_links = [
            [
                "link_title" => $this->getTranslatedListCaption('GeneralLeasingIssues'),
                "link_url"   => "/faq?id=9",
                "class"      => "btn btn-link-inline",
                "link_type"  => "internal",

                "img" => ""
            ],
            [
                "link_title" => $this->getTranslatedListCaption('SendApplicationLeasing'),
                "link_url"   => "/faq?id=8",
                "class"      => "btn btn-link-inline",
                "link_type"  => "internal",

                "img" => ""
            ],
        ];

        return $this;
    }

    public function setListFormTitle()
    {
        $this->list_form_title = "CustomerRequests";

        return $this;
    }

    public function setCardCaptions(): self
    {
        $this->card_captions = [
            'ok',
            'apply',
            'back',
            'Main',
            'CustomerRequest',
            'Contractor',
            'ClientRequest',
            'from',
            'SystemDetails',
            'CreatedAt',
            'CreatedBy',
            'UpdatedAt',
            'UpdatedBy',
            'Lessee',
            'Name',
            'Codes',
            'INN',
            'OGRN',
            'KPP',
            'Email',
            'LegalAddress',
            'Phone',
            'contactData',
            'LeasingSubjectType',
            'LeasingSubjectBrand',
            'LeasingSubjectModel',
            'Price',
            'Amount',
            'Sum',
            'Supplier',
            'SubmitRequestForReview',
            'Comments',
            'Comment',
            'Date',
            'Author',
            'Calculations',
        ];

        $this->translateCardCaptions();

        return $this;
    }

    protected function cardQuery()
    {
        $request = request();

        $bl_customer_request_id = $request->id;


        $this->setIsNewObject($bl_customer_request_id === "new");

        if($this->isNewObject())
        {
            $nameControllerMethod = [
                'controller' => class_basename(\Route::current()->controller),
                'method'     => 'insert'
            ];

            $objAccess = (new CheckController($nameControllerMethod));
            $access = $objAccess->checkControllerAccessRight();

            if($access === false)
            {
                return abort('403');
            }

            $this->card_model = [
                BlCustomerRequest::getNewObject()
            ];

            $this->cardAdditionalQuery($this->card_model);
        }
        else
        {
            $this->card_model = BlCustomerRequest::query()->with("blStatus")->where("id", $bl_customer_request_id);

            $this->cardAdditionalQuery($this->card_model);

            $this->card_model = $this->card_model->get()->toArray();

            if(!$this->card_model)
                return abort('403');

            $this->card_model[0]["bl_status_name"] = $this->card_model[0]["bl_status"]["bl_status_name"] ?? "";
        }

        $this->card_model_id = $this->card_model[0]["id"];

        $this->lessee_contractor_id = $this->card_model[0]["lessee_contractor_id"] ?? null;

        $this->setContractorInfo(false);

        // Получаем controller_alias комментариев
        $this->comments_controller_alias = \App\Models\Controller::query()
            ->where("controller_code", "BlCustomerRequestsTabCommentsController")
            ->value("controller_alias");

        return $this;
    }


    public function setCardAddDataModels(): self
    {
        $contractors = Contractor::all([
            "id",
            "contractor_short_name",
            "taxpayer_number",
            "code_reason_number",
            "register_number"
        ]);

        $this->card_add_data_models = [
            "Contractors" => $contractors,
        ];

        $object_types = BlLeasingObjectType::query()
            ->select(["id", "bl_leasing_object_type_name"])
            ->orderBy("bl_leasing_object_type_name", "asc")
            ->get()
            ->toarray();
        $object_brands = BlLeasingObjectBrand::query()->select([
            "id",
            "bl_leasing_object_brand_name",
            "bl_leasing_object_type_id"
        ])->orderBy("bl_leasing_object_brand_name", "asc")->get()->toarray();

        $object_models = BlLeasingObjectModel::query()->select([
            "id",
            "bl_leasing_object_model_name",
            "bl_leasing_object_brand_id"
        ])->orderBy("bl_leasing_object_model_name", "asc")->get()->toarray();

        $this->card_add_data_models["BlLeasingObjectTypes"] = $object_types;
        $this->card_add_data_models["BlLeasingObjectBrands"] = $object_brands;
        $this->card_add_data_models["BlLeasingObjectModels"] = $object_models;

        return $this;
    }

    public function setCardMainDataModels(): self
    {
        // Проверка на тот случай, если идет перезапрос полей карточки и поля табличной части были переданы с фронта
        if(!isset($this->card_main_data_models["BlCustomerRequestTabLeasingObjects"]))
            $this->card_main_data_models["BlCustomerRequestTabLeasingObjects"] = BlCustomerRequestTabLeasingObject::query()
                ->where("bl_customer_request_id", $this->card_model_id)
                ->get();

        // Проверка на тот случай, если идет перезапрос полей карточки и поля табличной части были переданы с фронта
        if(!isset($this->card_main_data_models[$this->comments_controller_alias]))
            $this->card_main_data_models[$this->comments_controller_alias] = BlCustomerRequestTabComment::query()
                ->where("bl_customer_request_id", $this->card_model_id)
                ->get();

        // Проверка на тот случай, если идет перезапрос полей карточки и поля табличной части были переданы с фронта
        if(is_null($this->card_main_data_models))
            $this->card_main_data_models = [];

        return $this;
    }

    public function setCardBlockFields(): self
    {
        $this->card_block_fields = [
            [
                "tab_title"       => $this->getTranslatedCardCaption("Main"),
                "tab_name"        => $this->getTranslatedCardCaption("Main"),
                "tab_description" => '',
                "blocks_quantity" => 1,
                "blocks"          => [
                    [
                        "block_title"         => $this->getTranslatedCardCaption("CustomerRequest"),
                        "block_zone_quantity" => 1,
                        "block_model"         => $this->card_controller_alias,
                        "block_type"          => "block_card",
                        "block_fields"        => [

                            //                            [
                            //                                'title'      => 'Номер',
                            //                                'model_name' => $this->card_controller_alias,
                            //                                'model'      => 'bl_customer_request_number',
                            //                                'width'      => '50%',
                            //                                'type'       => 'label',
                            //                                "zone"       => "1",
                            //                                "order"      => "1"
                            //                            ],

                            //                            [
                            //                                'title'      => 'Дата',
                            //                                'model_name' => $this->card_controller_alias,
                            //                                'model'      => 'bl_customer_request_date',
                            //                                'width'      => '50%',
                            //                                'type'       => 'label',
                            //                                "zone"       => "1",
                            //                                "order"      => "2"
                            //                            ],
                            //
                            //                            [
                            //                                'title'      => 'Статус',
                            //                                'model_name' => $this->card_controller_alias,
                            //                                'model'      => 'bl_status_name',
                            //                                'width'      => '50%',
                            //                                'type'       => 'label',
                            //                                "zone"       => "1",
                            //                                "order"      => "3",
                            //                            ],

                            //                            [
                            //                                'title'        => "Огранизация",
                            //                                'model_name'   => $this->card_controller_alias,
                            //                                'model'        => 'company_id',
                            //                                'type'         => 'vue-select',
                            //                                'width'        => '50%',
                            //                                'options'      => [],
                            //                                "options_data" => [
                            //                                    "options_data_model"  => "Companies",
                            //                                    "options_field_id"    => "id",
                            //                                    "options_field_title" => "company_short_name",
                            //                                    "search"              => ""
                            //                                ],
                            //                                "zone"         => "1",
                            //                                "order"        => "4",
                            //                                "border_right" => false
                            //                            ],

                            [
                                'title'      => $this->getTranslatedCardCaption("Lessee"),
                                'model_name' => $this->card_controller_alias,
                                'model'      => '',
                                'width'      => '100%',
                                'type'       => 'title',
                                "zone"       => "1",
                                "order"      => "5"
                            ],

                            [
                                'title'          => $this->getTranslatedCardCaption("Contractor"),
                                'model_name'     => $this->card_controller_alias,
                                'model'          => 'lessee_contractor_id',
                                'type'           => 'vue-select',
                                'perform_action' => true,
                                'action_link'    => '/admin/bl/customer/requests/fields',
                                'width'          => '50%',
                                'options'        => [],
                                "options_data"   => [
                                    "options_data_model"  => "Contractors",
                                    "options_field_id"    => "id",
                                    "options_field_title" => "contractor_short_name",
                                    "search"              => "",
                                    "fields_to_search"    => [
                                        "contractor_short_name",
                                        "taxpayer_number",
                                        "code_reason_number",
                                        "register_number"
                                    ]
                                ],
                                "zone"           => "1",
                                "order"          => "6",
                                "border_right"   => false
                            ],

                            [
                                'title'          => $this->getTranslatedCardCaption("Name"),
                                'model_name'     => $this->card_controller_alias,
                                'model'          => 'lessee_name',
                                'width'          => '50%',
                                'type'           => 'text',
                                "zone"           => "1",
                                "order"          => "7",
                                "show_condition" => function(&$current_field)
                                {
                                    if(is_null($this->lessee_contractor_id))
                                        $current_field["type"] = "text";
                                    else
                                        $current_field["type"] = "label";

                                    return true;
                                }
                            ],

                            [
                                'title'      => $this->getTranslatedCardCaption("Codes"),
                                'model_name' => $this->card_controller_alias,
                                'model'      => '',
                                'width'      => '50%',
                                'type'       => 'title',
                                "zone"       => "1",
                                "order"      => "8"
                            ],

                            [
                                'title'      => $this->getTranslatedCardCaption("contactData"),
                                'model_name' => $this->card_controller_alias,
                                'model'      => '',
                                'width'      => '50%',
                                'type'       => 'title',
                                "zone"       => "1",
                                "order"      => "12"
                            ],

                            [
                                'title'          => $this->getTranslatedCardCaption("INN"),
                                'model_name'     => $this->card_controller_alias,
                                'model'          => 'lessee_inn',
                                'width'          => '50%',
                                'type'           => 'text',
                                "zone"           => "1",
                                "order"          => "9",
                                "show_condition" => function(&$current_field)
                                {
                                    if(is_null($this->lessee_contractor_id))
                                        $current_field["type"] = "text";
                                    else
                                        $current_field["type"] = "label";

                                    return true;
                                }
                            ],

                            [
                                'title'      => $this->getTranslatedCardCaption("Email"),
                                'model_name' => $this->card_controller_alias,
                                'model'      => 'lessee_email',
                                'width'      => '50%',
                                'type'       => 'text',
                                "zone"       => "1",
                                "order"      => "13",
                            ],

                            [
                                'title'          => $this->getTranslatedCardCaption("KPP"),
                                'model_name'     => $this->card_controller_alias,
                                'model'          => 'lessee_kpp',
                                'width'          => '50%',
                                'type'           => 'text',
                                "zone"           => "1",
                                "order"          => "10",
                                "show_condition" => function(&$current_field)
                                {
                                    if(is_null($this->lessee_contractor_id))
                                        $current_field["type"] = "text";
                                    else
                                        $current_field["type"] = "label";

                                    return true;
                                }
                            ],

                            [
                                'title'      => $this->getTranslatedCardCaption("LegalAddress"),
                                'model_name' => $this->card_controller_alias,
                                'model'      => 'lessee_legal_address',
                                'width'      => '50%',
                                'type'       => 'text',
                                "zone"       => "1",
                                "order"      => "14",
                            ],

                            [
                                'title'          => $this->getTranslatedCardCaption("OGRN"),
                                'model_name'     => $this->card_controller_alias,
                                'model'          => 'lessee_ogrn',
                                'width'          => '50%',
                                'type'           => 'text',
                                "zone"           => "1",
                                "order"          => "11",
                                "show_condition" => function(&$current_field)
                                {
                                    if(is_null($this->lessee_contractor_id))
                                        $current_field["type"] = "text";
                                    else
                                        $current_field["type"] = "label";

                                    return true;
                                }
                            ],

                            [
                                'title'      => $this->getTranslatedCardCaption("Phone"),
                                'model_name' => $this->card_controller_alias,
                                'model'      => 'lessee_phone',
                                'width'      => '50%',
                                'type'       => 'text',
                                "zone"       => "1",
                                "order"      => "15",
                            ],
                        ]
                    ],
                    [
                        "block_title"         => 'Табличная часть',
                        "block_zone_quantity" => 1,
                        "block_model"         => "BlCustomerRequestTabLeasingObjects",
                        "block_type"          => "block_list_base",
                        'list_width'          => '100%',
                        "show_condition"      => function(&$current_block)
                        {
                            $empty_row = BlCustomerRequestTabLeasingObject::getNewObject();
                            $empty_row["bl_customer_request_id"] = $this->card_model_id;

                            $current_block["block_parameters"]["empty_row"] = $empty_row;

                            if(is_null($this->card_model[0]["bl_customer_request_stage"]) || $this->card_model[0]["bl_customer_request_stage"] === 1)
                            {
                                $current_block["block_parameters"]["edit_values"] = true;
                            }
                            else
                            {
                                $current_block["block_parameters"]["edit_values"] = false;
                            }

                            return true;
                        },
                        "block_parameters"    => [
                            "prevent_list_click" => true,
                            "edit_values"        => true,
                            "edit_mode"          => 'row',
                            "empty_row"          => null,
                            "hide_pagination"    => true,
                            "hide_search"        => true,

                        ],
                        "show_name"           => false,
                        "block_fields"        => [
                            [
                                'key'            => 'bl_leasing_object_type_id',
                                'edit'           => true,
                                "filter"         => true,
                                "sortable"       => true,
                                'type'           => 'select',
                                "label"          => $this->getTranslatedCardCaption("LeasingSubjectType"),
                                'thStyle'        => 'width: 10%',
                                'options'        => [],
                                "options_data"   => [
                                    "options_data_model"  => "BlLeasingObjectTypes",
                                    "options_field_id"    => "id",
                                    "options_field_title" => "bl_leasing_object_type_name",
                                    "search"              => ""
                                ],
                                'dependent_data' => [
                                    "supreme"           => true,
                                    "supreme_field_key" => 'bl_leasing_object_brand_id',
                                ],
                                "validation"     => ["required" => true]
                            ],
                            [
                                'key'            => 'bl_leasing_object_brand_id',
                                'edit'           => true,
                                "filter"         => true,
                                "sortable"       => true,
                                'type'           => 'select',
                                "label"          => $this->getTranslatedCardCaption("LeasingSubjectBrand"),
                                'thStyle'        => 'width: 10%',
                                'options'        => [],
                                "options_data"   => [
                                    "options_data_model"  => "BlLeasingObjectBrands",
                                    "options_field_id"    => "id",
                                    "options_field_title" => "bl_leasing_object_brand_name",
                                    "search"              => ""
                                ],
                                'dependent_data' => [
                                    'dependent'            => true,
                                    'dependent_data_model' => 'BlLeasingObjectTypes',
                                    'dependent_field_id'   => 'id',
                                    'dependent_field'      => 'bl_leasing_object_type_id',

                                    "supreme"           => true,
                                    "supreme_field_key" => 'bl_leasing_object_model_id',
                                ],
                                "validation"     => ["required" => true]
                            ],
                            [
                                'key'            => 'bl_leasing_object_model_id',
                                'edit'           => true,
                                "filter"         => true,
                                "sortable"       => true,
                                'type'           => 'select',
                                "label"          => $this->getTranslatedCardCaption("LeasingSubjectModel"),
                                'thStyle'        => 'width: 10%',
                                'options'        => [],
                                "options_data"   => [
                                    "options_data_model"  => "BlLeasingObjectModels",
                                    "options_field_id"    => "id",
                                    "options_field_title" => "bl_leasing_object_model_name",
                                    "search"              => ""
                                ],
                                'dependent_data' => [
                                    'dependent'            => true,
                                    'dependent_data_model' => 'BlLeasingObjectBrands',
                                    'dependent_field_id'   => 'id',
                                    'dependent_field'      => 'bl_leasing_object_brand_id',
                                ],
                                "validation"     => ["required" => true]
                            ],
                            [
                                'key'        => 'bl_leasing_object_quantity',
                                'edit'       => true,
                                "filter"     => true,
                                "sortable"   => true,
                                'type'       => 'label',
                                'typeVal'    => 'number',
                                "label"      => $this->getTranslatedCardCaption("Amount"),
                                'thStyle'    => 'width: 10%',
                                "validation" => ["required" => true]
                            ],
                            [
                                'key'        => 'bl_leasing_object_price',
                                'edit'       => true,
                                "filter"     => true,
                                "sortable"   => true,
                                'type'       => 'label',
                                'typeVal'    => 'number',
                                "label"      => $this->getTranslatedCardCaption("Price"),
                                'thStyle'    => 'width: 10%',
                                "validation" => ["required" => true]
                            ],
                            [
                                'key'        => 'bl_leasing_object_sum',
                                'edit'       => true,
                                "filter"     => true,
                                "sortable"   => true,
                                'type'       => 'label',
                                'disabled'   => true,
                                'typeVal'    => 'number',
                                'format'     => '0,000',
                                "label"      => $this->getTranslatedCardCaption("Sum"),
                                'thStyle'    => 'width: 10%',
                                "validation" => ["required" => true]
                            ],
                            [
                                'key'          => 'supplier_contractor_id',
                                'edit'         => true,
                                "filter"       => true,
                                "sortable"     => true,
                                'type'         => 'select',
                                "label"        => $this->getTranslatedCardCaption("Supplier"),
                                'thStyle'      => 'width: 10%',
                                'options'      => [],
                                "options_data" => [
                                    "options_data_model"  => "Contractors",
                                    "options_field_id"    => "id",
                                    "options_field_title" => "contractor_short_name",
                                    "search"              => ""
                                ],
                                "validation"   => ["required" => true]
                            ],
                        ]
                    ]
                ]
            ],
            [
                "tab_title"       => $this->getTranslatedCardCaption("Comments"),
                "tab_name"        => $this->getTranslatedCardCaption("Comments"),
                "tab_description" => '',
                "blocks_quantity" => 1,
                "blocks"          => [
                    [
                        "block_title"         => 'Табличная часть',
                        "block_zone_quantity" => 1,
                        "block_model"         => $this->comments_controller_alias,
                        "block_type"          => "block_list_base",
                        'list_width'          => '100%',
                        "show_condition"      => function(&$current_block)
                        {
                            $empty_row = BlCustomerRequestTabComment::getNewObject();
                            $empty_row["bl_customer_request_id"] = $this->card_model_id;

                            $current_block["block_parameters"]["empty_row"] = $empty_row;

                            if(is_null($this->card_model[0]["bl_customer_request_stage"]) || $this->card_model[0]["bl_customer_request_stage"] === 1)
                            {
                                $current_block["block_parameters"]["edit_values"] = true;
                            }
                            else
                            {
                                $current_block["block_parameters"]["edit_values"] = false;
                            }

                            return true;
                        },
                        "block_parameters"    => [
                            "prevent_list_click" => true,
                            "edit_values"        => true,
                            "edit_mode"          => 'inline',
                            "empty_row"          => null,
                            "hide_pagination"    => true,
                            "hide_search"        => true,
//                            "write_link"         => "bl/customer/requests/tab/comments/write",
                        ],
                        "show_name"           => false,
                        "block_fields"        => [
                            [
                                'key'        => 'line_n',
                                'edit'       => false,
                                "filter"     => true,
                                "sortable"   => true,
                                'type'       => 'label',
                                'typeVal'    => 'number',
                                "label"      => '№',
                                'thStyle'    => 'width: 5%',
                                "validation" => ["required" => true]
                            ],
                            [
                                'key'        => 'comments_date',
                                //                                'edit'       => true,
                                'edit'       => false,
                                "filter"     => true,
                                "sortable"   => true,
                                'type'       => 'text',
                                'disabled'   => true,
                                "label"      => $this->getTranslatedCardCaption("Date"),
                                'thStyle'    => 'width: 25%',
                                "validation" => ["required" => true]
                            ],
                            [
                                'key'        => 'comments_description',
                                'edit'       => true,
                                "filter"     => true,
                                "sortable"   => true,
                                'type'       => 'text',
                                "label"      => $this->getTranslatedCardCaption("Comment"),
                                'thStyle'    => 'width: 25%',
                                "validation" => ["required" => true]
                            ],
                            [
                                'key'        => 'comments_author',
                                'edit'       => true,
                                "filter"     => true,
                                "sortable"   => true,
                                'type'       => 'text',
                                'disabled'   => true,
                                "label"      => $this->getTranslatedCardCaption("Author"),
                                'thStyle'    => 'width: 25%',
                                "validation" => ["required" => true]
                            ],
                        ]
                    ],

                ]
            ],
        ];

        return $this;
    }

    public function setCardFormTitle(): self
    {
        $this->card_form_title = "Name";

        return $this;
    }

    protected function getCardSets()
    {
        $sets = $this->getButtonsList($this->getCardSetsList());

        if(is_null($this->card_model[0]["bl_customer_request_stage"]) || $this->card_model[0]["bl_customer_request_stage"] === 1)
        {
            if($sets["card_actions"][0]->code != "apply" && $sets["card_actions"][0]->code != "ok")
                return $sets;

            // Добавляем кнопку для отправки в 1С перед последней кнопкой
            $last_element_index = count($sets["card_actions"]) - 1;

            $sets["card_actions"][$last_element_index + 1] = $sets["card_actions"][$last_element_index];
            $sets["card_actions"][$last_element_index] = [
                "code"                => "apply",
                "class"               => "btn btn-green",
                "link"                => "/admin/bl/customer/requests/stage",
                "img"                 => null,
                "title"               => $this->getTranslatedCardCaption("SubmitRequestForReview"),
                "type"                => "button",
                "execute_fe_action_l" => true,
            ];
        }

        return $sets;
    }

    public function setCardMainDataModelName(): self
    {
        // Пока что здесь меняется card_show_form_parameters (потому что этот метод вызывается после того, как в переменную было установлено значение)
        if(is_null($this->card_model[0]["bl_customer_request_stage"]) || $this->card_model[0]["bl_customer_request_stage"] === 1)
        {
            $this->card_show_form_parameters["read_only"] = false;
        }
        else
        {
            $this->card_show_form_parameters["read_only"] = true;
        }

        $this->card_main_data_model_name = $this->getTranslatedCardCaption("ClientRequest") . " " . ($this->card_model[0]["bl_customer_request_number"] ?? null) . " " . $this->getTranslatedCardCaption("from") . " " . $this->card_model[0]["bl_customer_request_date"];

        return $this;
    }

    public function getCardFormTitle()
    {
        $status = BlStatus::query()->where([
            "id"         => $this->card_model[0]["bl_status_id"] ?? null,
            "db_area_id" => $this->card_model[0]["db_area_id"]
        ])->first(["bl_status_name"]);

        return $status->bl_status_name ?? "";
    }

    public function getHideQuotes(): bool
    {
        return is_null(($this->card_model[0]["bl_status_id"] ?? null));
    }

    public function getCardBlockFields(): array
    {
        return array_values(array_filter(array_map(function($tab)
        {
            $tab["blocks"] = array_values(array_filter(array_map(function($block)
            {
                $block["block_fields"] = array_values(array_filter(array_map(function($block_field)
                {
                    if(!isset($block_field["show_condition"]))
                        return $block_field;

                    return $block_field["show_condition"]($block_field) === true ? $block_field : null;
                }, $block["block_fields"])));

                if(!isset($block["show_condition"]))
                    return $block;

                return $block["show_condition"]($block) === true ? $block : null;
            }, $tab["blocks"])));

            if(!isset($tab["show_condition"]))
                return $tab;

            return $tab["show_condition"]($tab) === true ? $tab : null;
        }, $this->card_block_fields)));
    }

    public function setCardLinks(): self
    {
        if($this->isNewObject())
        {
            $this->card_links = [];
        }
        else
        {
            $this->card_links = [
                [
                    "link_title"    => $this->getTranslatedCardCaption("Calculations"),
                    "link_img"      => "",
                    "link_type"     => "internal_push",
                    "link_url"      => "/leasingCalculations",
                    "look_like_tab" => true
                ]
            ];
        }

        return $this;
    }

    public function list_old(Request $request)
    {
        $captionName = [
            'ok',
            'apply',
            'back',
            'Main',
            'Contractors',
            'ContractorShortName',
            'CountryName',
            'CreatedAt',
            'Database',
            'Individual',
            'Actual',
            'BankAccountTypes',
            'CryptoWallets',
            'contactInfo',
            'Clients',
            'ClientShortName',
            'CustomerRequests',
            'SendApplicationLeasing',
            'GeneralLeasingIssues'
        ];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);
        $model = 'App\Models\Controller';
        $mainModel = $model::where('controller_code', class_basename(Route::current()->controller))
            ->value('controller_alias');


        $this->listQuery();

        $list = [
            "main_data_models" => [
                $mainModel => $this->list_model
            ],
            "sets"             => $this->getButtonsList([
                'list_bottom',
                'list_top',
                'list_top_dropdown_actions',
                'list_top_left_command_bar',
                'list_top_right_command_bar'
            ]),
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['CustomerRequests']['translation_captions']['caption_translation'],
                "form_code"                     => $mainModel,
                "form_is_dependent"             => false,
                // {if true -> show field} {if false hidden field)
                "form_type"                     => "list",
                "form_base_data_model"          => $mainModel,
                "form_main_data_model_id_field" => "id",
                "form_type_list"                => [
                    "form_card_url"     => "/contractors_new/",
                    "form_search_field" => "leased_asset",
                ],
            ],
            "links"            => [

                [
                    "link_title" => $getArrayCaptions['GeneralLeasingIssues']['translation_captions']['caption_translation'],
                    "link_url"   => "/faq?id=9",
                    "class"      => "btn btn-link-inline",
                    "link_type"  => "internal",

                    "img" => ""
                ],
                [
                    "link_title" => $getArrayCaptions['SendApplicationLeasing']['translation_captions']['caption_translation'],
                    "link_url"   => "/faq?id=8",
                    "class"      => "btn btn-link-inline",
                    "link_type"  => "internal",

                    "img" => ""
                ],

            ],
            "tabs"             => [
                [
                    "tab_title"       => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                    "blocks_quantity" => 1,
                    "blocks"          => [

                        [
                            "block_title"         => $getArrayCaptions['Clients']['translation_captions']['caption_translation'],
                            "block_zone_quantity" => 1,
                            "block_model"         => $mainModel,
                            "block_type"          => "block_list_base",
                            "block_fields"        => [
                                //                                ['key' => 'index', 'sortable' => false,
                                //                                    'thStyle' => 'width: 6%',
                                //                                    'class' => 'actions',
                                //                                    'label' => '№'
                                //                                ],

                                [
                                    'key'      => 'actions',
                                    'sortable' => false,
                                    'class'    => 'list_checkbox',
                                    'thStyle'  => 'width: 6%',
                                    "zone"     => "1",
                                    "order"    => "1"
                                ],

                                [
                                    'key'      => 'bl_customer_request_date',
                                    'sortable' => true,
                                    'class'    => 'created_at',
                                    "label"    => 'Дата',
                                    'thStyle'  => 'width: 10%',
                                    'typeVal'  => 'date',
                                    'format'   => 'MM-DD-YYYY',
                                ],
                                [
                                    'key'      => 'bl_customer_request_number',
                                    'sortable' => true,
                                    "label"    => 'Номер',
                                    'thStyle'  => 'width: 21%'
                                ],
                                [
                                    'key'      => "bl_leasing_object_sum",
                                    'sortable' => true,
                                    "label"    => 'Сумма',
                                    'thStyle'  => 'width: 21%',
                                    'typeVal'  => 'number',
                                    'format'   => '0,0.00',
                                ],
                                [
                                    'key'      => "leased_asset",
                                    'sortable' => true,
                                    "label"    => 'Предмет лизинга',
                                    'thStyle'  => 'width: 21%'
                                ],
                                [
                                    'key'      => "bl_status_name",
                                    'sortable' => true,
                                    "label"    => 'Статус',
                                    'thStyle'  => 'width: 21%'
                                ],

                            ]
                        ]
                    ]
                ]
            ]
        ];

        return response()->json($list);

    }

    //    public function card()
    //    {
    //
    //    }

    public function requestCard(Request $request)
    {
        $controller = \App\Models\Controller::query()
            ->where('controller_code', class_basename(Route::current()->controller))
            ->select('controller_alias', 'controller_table_n')
            ->first();

        $contractor_request = BlCustomerRequest::query()->find($request["dependent"]["id"]);

        $card = [
            "main_data_models" => [
                $controller->controller_alias => [$contractor_request]
            ],
            "form_parameters"  => [
                "form_title"                    => 'Спасибо! Ваша заявка может быть отправлена на рассмотрение.',
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false,
                // {if true -> show field} {if false hidden field)
                "form_type"                     => "list",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_name"     => "",
                "form_main_data_model_id_field" => "id",
                "hide_sets"                     => true,
                "hide_quotes"                   => true
            ],
            "sets"             => $this->getButtonsList(['request_card_send_save']),
            "tabs"             => [
                [
                    "tab_title"       => null,
                    "tab_name"        => null,
                    "tab_description" => "",
                    "blocks_quantity" => 1,
                    "blocks"          => [
                        [
                            "block_title"         => "Block title",
                            "block_zone_quantity" => 2,
                            "block_model"         => $controller->controller_alias,
                            "block_type"          => "block_card",
                            "block_fields"        => [

                                //                                ['title' => 'Спасибо! Ваша заявка может быть отправлена на рассмотрение.', 'model' => '',
                                //                                 'type'  => 'title', 'width' => '100%', "zone" => "1", "order" => "1"],

                            ],
                        ]
                    ],
                ]
            ]
        ];


        return response()->json($card);
    }

    public function getFields(Request $request)
    {
        $this->card_controller_alias = \App\Models\Controller::query()
            ->where('controller_code', class_basename(\Route::current()->controller))
            ->value('controller_alias');

        // Получаем controller_alias комментариев
        $this->comments_controller_alias = \App\Models\Controller::query()
            ->where("controller_code", "BlCustomerRequestsTabCommentsController")
            ->value("controller_alias");


        $main_data_models = $request->get("main_data_models");

        $main_model = $main_data_models[$this->card_controller_alias];

        $this->card_model = $main_model;
        $this->card_add_data_models = [];

        // Сперва запись данных о контрагенте в главную модель, а затем записываем модели в main_data_models
        $this->lessee_contractor_id = $this->card_model[0]["lessee_contractor_id"];

        $this->setContractorInfo(true);

        // Обновление main_data_models
        $main_data_models[$this->card_controller_alias] = $this->card_model;

        $this->card_main_data_models = $main_data_models;

        $this->card_model_id = $main_model[0]["id"];

        $this->setIsNewObject($this->card_model_id === "new");

        $this->setCardCaptions()
            ->setCardMainDataModels()
            ->setCardAddDataModels()
            ->setCardBlockFields()
            ->setCardSystemTab();

        $data = [
            "tabs"             => $this->getCardBlockFields(),
            "main_data_models" => $this->card_main_data_models,
        ];

        $this->loadAddDataModels($data);


        return $data;
    }

    /**
     * @param boolean $re_request Первое открытие карточки или перезапрос полей
     */
    private function setContractorInfo($re_request)
    {
        if(is_null($this->lessee_contractor_id))
        {
            if($re_request)
            {
                $this->card_model[0]["lessee_name"] = null;
                $this->card_model[0]["lessee_inn"] = null;
                $this->card_model[0]["lessee_kpp"] = null;
                $this->card_model[0]["lessee_ogrn"] = null;
                $this->card_model[0]["lessee_email"] = null;
                $this->card_model[0]["lessee_legal_address"] = null;
                $this->card_model[0]["lessee_phone"] = null;
            }
        }
        else
        {
            $info_kinds = InfoKind::query()->whereIn("info_kind_code", [
                "ЮрАдресКонтрагента",
                "EmailКонтрагенты",
                "ТелефонКонтрагента"
            ])->select("id", "info_kind_code")->get();

            $address_kind = $info_kinds->where("info_kind_code", "ЮрАдресКонтрагента")->first();
            $email_kind = $info_kinds->where("info_kind_code", "EmailКонтрагенты")->first();
            $phone_kind = $info_kinds->where("info_kind_code", "ТелефонКонтрагента")->first();

            $contractor = Contractor::query()->with([
                "contractorinfo" => function($query) use ($address_kind, $email_kind, $phone_kind)
                {
                    $query->where(function($query) use ($address_kind, $email_kind, $phone_kind)
                    {
                        $query->where("info_kind_id", "=", $address_kind->id, "or")
                            ->where("info_kind_id", "=", $email_kind->id, "or")
                            ->where("info_kind_id", "=", $phone_kind->id, "or");

                    })
                        ->select(DB::raw("max(representation) as representation"), "info_kind_id", "contractor_id")
                        ->groupBy("info_kind_id", "contractor_id");
                }
            ])->where("id", $this->lessee_contractor_id)->first();


            $this->card_model[0]["lessee_name"] = $contractor->contractor_short_name;
            $this->card_model[0]["lessee_inn"] = $contractor->taxpayer_number;
            $this->card_model[0]["lessee_kpp"] = $contractor->code_reason_number;
            $this->card_model[0]["lessee_ogrn"] = $contractor->register_number;
            if($re_request)
            {
                $this->card_model[0]["lessee_email"] = $contractor->contractorinfo->where("info_kind_id", $email_kind->id)
                                                           ->first()->representation ?? null;
                $this->card_model[0]["lessee_legal_address"] = $contractor->contractorinfo->where("info_kind_id", $address_kind->id)
                                                                   ->first()->representation ?? null;
                $this->card_model[0]["lessee_phone"] = $contractor->contractorinfo->where("info_kind_id", $phone_kind->id)
                                                           ->first()->representation ?? null;
            }
        }
    }

    public function beforeWriteBe(&$bCancel)
    {
        // Проверка главной модели
        $main_model = $this->main_data_models[$this->main_model_name];

        // Если не выбран контрагент и пустые поля наименование, инн и кпп то выдаем ошибку
        if(is_null($main_model["lessee_contractor_id"]))
        {
            if(is_null($main_model["lessee_name"]) || is_null($main_model["lessee_inn"]) || is_null($main_model["lessee_kpp"]))
            {
                $bCancel = true;

                return [
                    "message" => 'Заполните поля "Наименование", "ИНН", "КПП"'
                ];
            }
        }

        // Если идет сохранение только главной модели
        if(!isset($this->main_data_models["BlCustomerRequestTabLeasingObjects"]))
            return;

        // Проверка табличной части
        $leasing_objects = $this->main_data_models["BlCustomerRequestTabLeasingObjects"] ?? null;
        //        $comments = $this->main_data_models[$this->comments_controller_alias] ?? null;

        // Получаем controller_alias комментариев
        $this->comments_controller_alias = \App\Models\Controller::query()
            ->where("controller_code", "BlCustomerRequestsTabCommentsController")
            ->value("controller_alias");

        $get_comments = $this->main_data_models[$this->comments_controller_alias] ?? [];

        $comments = [];
        foreach($get_comments as $k => &$v)
        {
            $dt = new \DateTime();
            $v['comments_date'] = $dt->format('Y-m-d H:i:s');
            $comments[] = $k = $v;
        }
        $this->main_data_models[$this->comments_controller_alias] = $comments;

        if((is_null($leasing_objects) || empty($leasing_objects)) && (is_null($comments) || empty($comments)))
            return;


        // + Miniyar 19.02.2020
        // Проверка на удаление групп для которых есть КП

        foreach($leasing_objects as $leasing_object)
        {
            if(!array_key_exists('status', $leasing_object) || $leasing_object['status'] != 3)
            {
                continue;
            }
            $leasingCalc = BlLeasingCalculation::where('bl_leasing_object_group_id', $leasing_object['bl_leasing_object_group_id'])
                ->get()
                ->toArray();
            if(!is_null($leasingCalc))
            {
                $bCancel = true;
                return [
                    "message" => "Нельзя удалить предмет лизинга, к которому привязан лизинговый расчет"
                ];
            }
        }

        // - Miniyar 19.02.2020

        try
        {
            DB::beginTransaction();

            $main_model_id = $this->main_data_models[$this->main_model_name]["id"];

            // Если сохранение нового обращения, то сперва сохраняем отдельно само обращение, а затем его вместе с табличной частью
            if(is_null($main_model_id))
            {
                $write_request = new Request([
                    "form_parameters"  => [
                        "form_base_data_model" => $this->main_model_name,
                    ],
                    "main_data_models" => [
                        $this->main_model_name => [$this->main_data_models[$this->main_model_name]]
                    ]
                ]);

                $write_result = $this->write($write_request)->getOriginalContent();

                if(isset($write_result["error"]) && $write_result["error"] === true)
                {
                    throw new \Exception("Ошибка сохранения обращения");
                }

                $this->main_data_models[$this->main_model_name]["id"] = $write_result["id"];
                $main_model_id = $write_result["id"];

                foreach($leasing_objects as &$leasing_object)
                {
                    $leasing_object["bl_customer_request_id"] = $main_model_id;
                }

                foreach($comments as &$comment)
                {
                    $comment["bl_customer_request_id"] = $main_model_id;
                }

                $this->main_data_models[$this->comments_controller_alias] = $comments;
            }

            $leasing_objects_with_groups = Arr::where($leasing_objects, function($leasing_object)
            {
                return !is_null($leasing_object["bl_leasing_object_group_id"]);
            });

            // Айди групп, которые уже подвязаны к элементам табличной части
            $leasing_object_groups_ids = Arr::pluck($leasing_objects_with_groups, "bl_leasing_object_group_id");

            // Получаем элементы с null группой
            $leasing_objects = Arr::where($leasing_objects, function($leasing_object)
            {
                return is_null($leasing_object["bl_leasing_object_group_id"]);
            });

            $leasing_object_groups = BlLeasingObjectGroup::query()
                ->where("bl_customer_request_id", $main_model_id)
                ->whereNotIn("id", $leasing_object_groups_ids)
                ->select(["id"])
                ->pluck("id");

            $bl_leasing_object_groups_controller = new BlLeasingObjectGroupsController();
            $bl_leasing_object_groups_controller_alias = \App\Models\Controller::query()
                ->where("controller_code", "BlLeasingObjectGroupsController")
                ->value("controller_alias");

            foreach($leasing_objects as &$leasing_object)
            {
                $leasing_object_group_id = $leasing_object_groups->first();

                if(is_null($leasing_object_group_id))
                {
                    // Создаем новую группу через write

                    $leasing_object_group_request = new Request([
                        "form_parameters"  => [
                            "form_base_data_model" => $bl_leasing_object_groups_controller_alias
                        ],
                        "main_data_models" => [
                            $bl_leasing_object_groups_controller_alias => [
                                [
                                    "id"                           => null,
                                    "bl_customer_request_id"       => $main_model_id,
                                    "db_area_id"                   => self::getDefaultDBAreaId(),
                                    "bl_leasing_object_group_name" => "Новая группа",
                                    "updated_at"                   => ""
                                ]
                            ]
                        ]
                    ]);

                    $write_result = $bl_leasing_object_groups_controller->write($leasing_object_group_request)
                        ->getOriginalContent();

                    if(isset($write_result["error"]) && $write_result["error"] === true)
                    {
                        throw new \Exception("Ошибка создания новой группы");
                    }

                    $leasing_object_group_id = $write_result["id"];
                }
                else
                    $leasing_object_groups->shift();

                $leasing_object["bl_leasing_object_group_id"] = $leasing_object_group_id;

            }

            $this->main_data_models["BlCustomerRequestTabLeasingObjects"] = array_merge($leasing_objects, $leasing_objects_with_groups);

            DB::commit();
        }
        catch(\Exception $exception)
        {
            DB::rollBack();
            $bCancel = true;

            return [
                "message" => $exception->getMessage()
            ];
        }
    }

    public function sendRequest(Request $request)
    {
        // Сокпировал метод из главного контроллера для изменения этапа обращения на 4
        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->with("models")
            ->get()
            ->first();

        $write_request = $request->all();

        $bl_status = BlStatus::query()->where([
            "bl_status_name" => "Отправлен",
            "db_area_id"     => self::getDefaultDBAreaId()
        ])->select("id")->get()->first();

        $record = DB::table($controller->models->table_name)
            ->where("id", $write_request["main_data_models"][$controller->controller_alias][0]["id"])
            ->first();

        if($record->sent_l === true)
        {
            return response()->json([
                "error"   => true,
                "requery" => false,
                "code"    => 400,
                "message" => "Объект был ранее отправлен"
            ], 400);
        }

        $write_request["main_data_models"][$controller->controller_alias][0]["sent_l"] = true;
        $write_request["main_data_models"][$controller->controller_alias][0]["bl_status_id"] = $bl_status->id;
        $write_request["main_data_models"][$controller->controller_alias][0]["bl_customer_request_stage"] = 4;
        $write_request["send_files"] = true;

        $write_request = new Request($write_request);

        $write_result = $this->write($write_request);

        return $write_result;
    }

    public function changesStage(Request $request)
    {
        // Подменяем bl_customer_request_stage и передаем на write
        $data = $request->toArray();

        $data["main_data_models"][$data["form_parameters"]["form_base_data_model"]][0]["bl_customer_request_stage"] = 2;

        return $this->write(new Request($data));
    }

    public function afterWriteBe(&$bCancel, $request)
    {
        if($request->has("send_files") && $request->input("send_files") == true)
        {
            if($this->main_model_existed)
            {
                $db_area_files = DbAreaFile::query()->where([
                    "table_n_doc" => $this->main_model->controller_table_n,
                    "row_id_doc"  => $this->main_model_id
                ])->get();

                $db_area_files_controller = \App\Models\Controller::query()
                    ->where("controller_code", "DbAreaFilesController")
                    ->get()
                    ->first();

                $files_controller = new DbAreaFilesController();

                $db_area_files->each(function($file) use ($db_area_files_controller, $files_controller)
                {
                    $write_request = new Request([
                        "form_parameters"  => [
                            "form_base_data_model" => $db_area_files_controller->controller_alias
                        ],
                        "main_data_models" => [
                            $db_area_files_controller->controller_alias => [$file->toArray()]
                        ],
                        "send_key"         => true
                    ]);

                    $files_controller->write($write_request)->getOriginalContent();
                });
            }
        }
    }

    /**
     * @param int $stage
     * @return string
     */
    public function stageToStageName($stage)
    {
        $stages = [
            1 => "Формирование",
            2 => "Рассмотрение",
            3 => "Сбор документов",
            4 => "Рассмотрение документов",
            5 => "Закрыта",
        ];

        return $stages[$stage] ?? "";
    }
}
