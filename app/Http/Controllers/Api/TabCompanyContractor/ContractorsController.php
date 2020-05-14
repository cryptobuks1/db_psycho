<?php

namespace App\Http\Controllers\Api\TabCompanyContractor;

use App\Http\Classes\ApplicationChangeRequest;
use App\Http\Classes\CheckController;
use App\Http\Traits\HasCard;
use App\Http\Traits\HasList;
use App\Models\ContactPerson;
use App\Models\Contractor;
use App\Models\ContractorInfo;
use App\Models\Country;
use App\Models\DbArea;
use App\Models\InfoKind;
use App\Models\InfoType;
use App\Models\ModelTables;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Route;


class ContractorsController extends Controller
{
    use HasList, HasCard;

    public $contractor_info_count;

    /**
     * @var array
     */
    private $contractor_info;

    public function __construct()
    {
        $this->model = Contractor::class;
    }

    /**
     * @param array $where
     * @param array $with
     * @param array $select
     * @param string[] $where_not_null
     * @param bool $as_array
     * @param bool $first
     * @return Contractor|Contractor[]
     */
    public function getContractor(array $where = [], array $with = [], array $select = ["*"],
        array $where_not_null = [],
        bool $as_array = false, bool $first = false)
    {
        $contractor = Contractor::query()
            ->where($where)
            ->with($with)
            ->select($select);

        if(!empty($where_not_null))
        {
            foreach($where_not_null as $column)
            {
                $contractor->whereNotNull($column);
            }
        }

        if($first)
            $contractor = $contractor->first();
        else
            $contractor = $contractor->get();

        if($as_array)
        {
            /**
             * @var Contractor $contractor
             */
            return $contractor->toArray();
        }
        else
        {
            /**
             * @var Contractor $contractor
             */
            return $contractor;
        }

    }

    protected function listQuery()
    {
        $this->list_model = Contractor::query()
            ->whereNotNull("contractor_short_name")
            ->whereNotNull("contractor_full_name")
            ->select('id', 'contractor_short_name', 'created_at', 'country_id', 'actual_l', 'individual_l',
                'register_number', 'taxpayer_number')
            ->orderBy('contractor_short_name')
            ->with('country');

        $this->listAdditionalQuery($this->list_model);

        $this->list_model = $this->list_model->get()->toArray();

        return $this;
    }

    public function setListCaptions()
    {
        $this->list_captions = [
            'ok',
            'apply',
            'back', 'Main', 'Contractors', 'ContractorShortName', 'CountryName', 'CreatedAt', 'Database', 'Individual',
            'Actual', 'BankAccountTypes', 'CryptoWallets', 'contactInfo', 'Contractors', 'ContractorShortName', 'INN', 'KPP'
        ];

        $this->translateListCaptions();

        return $this;
    }

    public function setListFormTitle()
    {
        $this->list_form_title = "Contractors";

        return $this;
    }

    public function setListBlockFields()
    {
        $this->list_block_fields = [

            [
                "block_title"         => $this->getTranslatedListCaption("Contractors"),
                "block_zone_quantity" => 1,
                "block_model"         => $this->list_controller_alias,
                "block_type"          => "block_list_base",
                "block_fields"        => [

                    ['key'     => 'actions', 'sortable' => false,
                     'class'   => 'list_checkbox',
                     'thStyle' => 'width: 6%',
                     "zone"    => "1",
                     "order"   => "1"
                    ],

                    ['key'   => 'contractor_short_name', 'sortable' => true, 'class' => 'contractor_short_name',
                     "label" => $this->getTranslatedListCaption("ContractorShortName"), 'thStyle' => 'width: 31%', "zone" => "1", "order" => "2"],

                    ['key'   => 'register_number', 'sortable' => true, 'class' => 'created_at', "typeVal" => "number",
                     "label" => $this->getTranslatedListCaption("KPP"), 'thStyle' => 'width: 13%', "zone" => "1", "order" => "5"],

                    ['key'   => 'taxpayer_number', 'sortable' => true, 'class' => 'created_at', "typeVal" => "number",
                     "label" => $this->getTranslatedListCaption("INN"), 'thStyle' => 'width: 13%', "zone" => "1", "order" => "6"],

                    ['key'   => "['country'][0]['country_name']", 'sortable' => true, 'class' => "['country'][0]['country_name']",
                     "label" => $this->getTranslatedListCaption("CountryName"), 'thStyle' => 'width: 14%', "zone" => "1", "order" => "3"],

                    ['key'   => 'created_at', 'sortable' => true, 'class' => 'created_at', "typeVal" => "date", "format" => "DD-MM-YYYY",
                     "label" => $this->getTranslatedListCaption("CreatedAt"), 'thStyle' => 'width: 11%', "zone" => "1", "order" => "4"],

                    ['key'     => 'individual_l', 'sortable' => true,
                     'class'   => 'individual_l',
                     "label"   => $this->getTranslatedListCaption("Individual"),
                     'thStyle' => 'width: 6%',
                     "zone"    => "1", "order" => "7"
                    ],

                    ['key'     => 'actual_l', 'sortable' => true, 'class' => 'actual_l',
                     "label"   => $this->getTranslatedListCaption("Actual"),
                     'thStyle' => 'width: 6%', "zone" => "1", "order" => "8"],

                ]
            ]
        ];

        return $this;
    }

    //Albert Topalu 17.10.18


    public function list_old(Request $request)
    {

        $getClientIp = $request->getClientIp();

        $currrentLang = Lang::locale();
        //get array accessMethods from  Http/Middleware/CheckAccess.php

        $captionName = [
            'ok',
            'apply',
            'back', 'Main', 'Contractors', 'ContractorShortName', 'CountryName', 'CreatedAt', 'Database', 'Individual',
            'Actual', 'BankAccountTypes', 'CryptoWallets', 'contactInfo', 'Contractors', 'ContractorShortName', 'INN', 'KPP'
        ];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);
        $model = 'App\Models\Controller';

        $mainModel = $model::where('controller_code', class_basename(Route::current()->controller))
            ->value('controller_alias');

        $contractors = $this->getContractor([], ["country"],
            ['id', 'contractor_short_name', 'created_at', 'country_id', 'actual_l', 'individual_l',
             'register_number', 'taxpayer_number'], ["contractor_short_name", "contractor_full_name"], true, false);

        //        $contractors = Contractor::query()
        //            ->whereNotNull("contractor_short_name")
        //            ->whereNotNull("contractor_full_name")
        //            ->select('id', 'contractor_short_name', 'created_at', 'country_id', 'actual_l', 'individual_l',
        //                'register_number', 'taxpayer_number')
        //            ->with('country')->get()->toArray();


        $list = [
            "main_data_models" => [
                $mainModel => $contractors
            ],

            "sets"            => $this->getButtonsList(['list_bottom', 'list_top', 'list_top_dropdown_actions', 'list_top_left_command_bar', 'list_top_right_command_bar']),
            "form_parameters" => [
                "form_title"                    => $getArrayCaptions['Contractors']['translation_captions']['caption_translation'],
                //                    "form_title" => $getArrayCaptions['Contractors']['translation_captions']['caption_translation'],
                "form_code"                     => $mainModel,
                "form_is_dependent"             => false, // {if true -> show field} {if false hidden field)
                "form_type"                     => "list",
                "form_base_data_model"          => $mainModel,
                "form_sort_by"                  => 'created_at',
                "form_sort_desc"                => true,
                "form_main_data_model_id_field" => "id",
                "form_type_list"                => [
                    "form_card_url"     => "/contractors_new/",
                    "form_search_field" => "contractor_short_name",
                ],
            ],

            "tabs" => [
                [
                    "tab_title"       => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                    "blocks_quantity" => 1,
                    "blocks"          => [

                        [
                            "block_title"         => $getArrayCaptions['Contractors']['translation_captions']['caption_translation'],
                            "block_zone_quantity" => 1,
                            "block_model"         => $mainModel,
                            "block_type"          => "block_list_base",
                            "block_fields"        => [
                                /*list fields zone 1*/
                                //                                ['key' => 'actions', 'sortable' => false, 'class' => 'list_checkbox', "zone" => "1"],
                                ['key'     => 'actions', 'sortable' => false,
                                 'class'   => 'list_checkbox',
                                 'thStyle' => 'width: 6%',
                                 "zone"    => "1",
                                 "order"   => "1"
                                ],

                                ['key'   => 'contractor_short_name', 'sortable' => true, 'class' => 'contractor_short_name',
                                 "label" => $getArrayCaptions['ContractorShortName']['translation_captions']['caption_translation'], 'thStyle' => 'width: 31%', "zone" => "1", "order" => "2"],

                                ['key'   => 'register_number', 'sortable' => true, 'class' => 'created_at', "typeVal" => "number",
                                 "label" => $getArrayCaptions['KPP']['translation_captions']['caption_translation'], 'thStyle' => 'width: 13%', "zone" => "1", "order" => "5"],

                                ['key'   => 'taxpayer_number', 'sortable' => true, 'class' => 'created_at', "typeVal" => "number",
                                 "label" => $getArrayCaptions['INN']['translation_captions']['caption_translation'], 'thStyle' => 'width: 13%', "zone" => "1", "order" => "6"],

                                ['key'   => "['country'][0]['country_name']", 'sortable' => true, 'class' => "['country'][0]['country_name']",
                                 "label" => $getArrayCaptions['CountryName']['translation_captions']['caption_translation'], 'thStyle' => 'width: 14%', "zone" => "1", "order" => "3"],

                                ['key'   => 'created_at', 'sortable' => true, 'class' => 'created_at', "typeVal" => "date", "format" => "DD-MM-YYYY",
                                 "label" => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'], 'thStyle' => 'width: 11%', "zone" => "1", "order" => "4"],


                                //                                    ['key' => "['dbarea']['d_base']['db_name']", 'sortable' => true, 'class' => "['dbarea']['d_base']['db_name']",
                                //                                        "label" => $getArrayCaptions['Database']['translation_captions']['caption_translation'], 'thStyle' => 'width: 17%', "zone" => "1", "order" => "3", "filter" => true],

                                ['key'     => 'individual_l', 'sortable' => true,
                                 'class'   => 'individual_l',
                                 "label"   => $getArrayCaptions['Individual']['translation_captions']['caption_translation'],
                                 'thStyle' => 'width: 6%',
                                 "zone"    => "1", "order" => "7"
                                ],

                                ['key'     => 'actual_l', 'sortable' => true, 'class' => 'actual_l',
                                 "label"   => $getArrayCaptions['Actual']['translation_captions']['caption_translation'],
                                 'thStyle' => 'width: 6%', "zone" => "1", "order" => "8"],

                            ]
                        ]
                    ]
                ]
            ]
        ];

        return response()->json($list);
    }

    protected function cardQuery()
    {
        $request = request();

        $contractor_id = $request->id;
        $this->setIsNewObject($contractor_id === "new");

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

            $this->card_model = Contractor::getNewObject();
            $this->contractor_info_count = NULL;

            $this->cardAdditionalQuery($this->card_model);

            $this->contractor_info = ContractorInfo::getNewObject();
        }
        else
        {
            $this->card_model = Contractor::with('country', 'dbarea', 'dbarea.dBase', 'dbarea.dBase.serverDb',
                'contractorinfo')
                ->where('id', $request->id);



            $this->cardAdditionalQuery($this->card_model);

            $this->card_model = $this->card_model->first();

            if(!$this->card_model)
                return abort('403');

            $this->contractor_info = $this->card_model->contractorinfo;

            $this->contractor_info_count = $this->card_model->contractorinfo()->count();

            $this->card_model = $this->card_model->toArray();
        }

        return $this;
    }

    public function prepareCardModelData()
    {
        $model = $this->card_model;

        $this->card_model = [
            [
                'id'                            => $model['id'],
                'db_area_id'                    => $model['db_area_id'],
                'country_id'                    => $model['country'][0]['id'] ?? null,
                'country_name'                  => $model['country'][0]['country_name'] ?? null,
                'actual_l'                      => $model['actual_l'],
                'individual_l'                  => $model['individual_l'],
                'contractor_short_name'         => $model['contractor_short_name'],
                'contractor_full_name'          => $model['contractor_full_name'],
                'taxpayer_number'               => $model['taxpayer_number'],
                'code_reason_number'            => $model['code_reason_number'],
                'register_number'               => $model['register_number'],
                'social_security_number'        => $model['social_security_number'],
                'entrepreneur_certificate'      => $model['entrepreneur_certificate'],
                'entrepreneur_certificate_date' => $model['entrepreneur_certificate_date'],
                'created_at'                    => $model['created_at'],
                'created_by'                    => $model['created_by'],
                'updated_at'                    => $model['updated_at'],
                'updated_by'                    => $model['updated_by'],
            ]
        ];

        return $this;
    }

    public function setCardCaptions(): self
    {
        $this->card_captions = [
            'ok', 'apply', 'back', 'CountryRegCountry', 'ContactPersons',
            'AreaDB', 'Individual', 'DB', 'TaxpayerNumber', 'CryptoTokenIdNull',
            'CryptoPlatformAccounts', 'CryptoExchangeAccounts', 'CryptoWallets',
            'ServerDB', 'CodeReasonNumber', 'Actual', 'BankAccounts', 'CryptoAccounts', 'CryptoPlatform',
            'Main', 'SystemDetails', 'Contractor', 'ContractorFullName', 'ContractorShortName', 'RegistryNumber',
            'TaxpayerNumber', 'CodeReasonNumber', 'SocialSecurityNumber', 'CountryName', 'Database', 'EntrepreneurCertificate',
            'EntrepreneurCertificateDate', 'CreationDetails', 'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy', 'INN', 'OGRN', 'KPP', '', '', 'ContractorsContactInfo', 'Contractor', 'ContractorShortName',
            'new', 'InfoKind', 'InfoType',
            'ContractorFullName', 'IndividualEnt', 'Value',
            'Actions'
        ];

        $this->translateCardCaptions();

        return $this;
    }

    public function setListFormSearchField()
    {
        $this->list_form_search_field = "contractor_short_name";

        return $this;
    }

    public function setCardAddDataModels(): self
    {
        $countries = Country::all(['id', 'country_name']);
        $info_kinds = InfoKind::query()
            ->from("_InfoKinds as info_kinds_main")
            ->where("info_kinds_main.info_kind_code", "СправочникКонтрагенты")
            ->join("_InfoKinds as info_kinds", function(JoinClause $join)
            {
                $join->on("info_kinds.parent_id", "=", "info_kinds_main.id")
                    ->whereNotNull("info_kinds.info_type_id");
            })
            ->select("info_kinds.*")
            ->get();
        $info_types = InfoType::query()
            ->whereIn("id", $info_kinds->pluck("info_type_id"))
            ->get();

        $this->card_add_data_models = [
            "Countries" => $countries,
            "InfoKinds" => $info_kinds,
            "InfoTypes" => $info_types
        ];

        return $this;
    }

    public function setCardBlockFields(): self
    {
        $empty_row = ContractorInfo::getNewObject();
        $empty_row["contractor_id"] = $this->card_model[0]["id"];

        $contact_info_link_title = $this->getTranslatedCardCaption("ContractorsContactInfo");

        if($this->contractor_info_count > 0)
            $contact_info_link_title .= " ( $this->contractor_info_count )";

        $this->card_block_fields = [
            [
                "tab_title"       => $this->getTranslatedCardCaption("Main"),
                "tab_name"        => $this->getTranslatedCardCaption("Main"),
                "tab_description" => '',
                "blocks_quantity" => 1,
                "blocks"          => [
                    [
                        "block_title"         => $this->getTranslatedCardCaption("Contractor"),
                        "block_zone_quantity" => 2,
                        "block_model"         => $this->card_controller_alias,
                        "block_type"          => "block_card",
                        "block_fields"        => [

                            ['title' => $this->getTranslatedCardCaption("ContractorFullName"), 'model_name' => $this->card_controller_alias,
                             'model' => 'contractor_full_name', 'type' => 'text', 'width' => '100%', "grid_column" => "1/8", "zone" => "1", "order" => "1", "border_right" => false, "validation" => ["required" => true, "min" => 4]],
                            ['title' => $this->getTranslatedCardCaption("INN"), 'model_name' => $this->card_controller_alias,
                             'model' => 'taxpayer_number', 'type' => 'text', 'width' => '50%', "grid_column" => "8/12", "grid-row" => "2", "zone" => "2", "order" => "1", "border_right" => false],
                            ['title' => $this->getTranslatedCardCaption("ContractorShortName"), 'model_name' => $this->card_controller_alias,
                             'model' => 'contractor_short_name', 'type' => 'text', 'width' => '50%', "grid_column" => "1/4", "zone" => "1", "order" => "2", "border_right" => false],

                            [
                                'title'          => $this->getTranslatedCardCaption("KPP"), 'model_name' => $this->card_controller_alias, 'model' => 'register_number',
                                "show_condition" => function($current_field)
                                {
                                    return (bool)$this->card_model[0]["individual_l"] === true;
                                },
                                'type'           => 'text', 'width' => '50%', "grid_column" => "12/16", "grid_row" => "1", "zone" => "2", "order" => "3", "border_right" => false
                            ],
                            [
                                'title'           => $this->getTranslatedCardCaption("CountryRegCountry"),
                                'model'           => 'country_id',
                                'model_name'      => $this->card_controller_alias,
                                'type'            => 'vue-select',
                                'width'           => '50%',
                                "grid_column"     => "4/8",
                                "grid_row"        => '2',
                                "grid_row_tablet" => "1",
                                'options'         => [],
                                "options_data"    => [
                                    "options_data_model"  => "Countries",
                                    "options_field_id"    => "id",
                                    "options_field_title" => "country_name",
                                    "search"              => ""
                                ],
                                "zone"            => "1",
                                "order"           => "3",

                                "border_right" => false

                            ],
                            [
                                'title'          => $this->getTranslatedCardCaption("OGRN"), 'model_name' => $this->card_controller_alias,
                                "show_condition" => function($current_field)
                                {
                                    return (bool)$this->card_model[0]["individual_l"] === true;
                                },
                                'model'          => 'code_reason_number', 'type' => 'text', 'width' => '50%', "grid_column" => "8/12", "zone" => "2", "order" => "2", "border_right" => false]
                            ,
                            ['title' => $this->getTranslatedCardCaption("SocialSecurityNumber"), 'model_name' => $this->card_controller_alias,
                             'model' => 'social_security_number', 'type' => 'text', 'width' => '50%', "grid_column" => "12/16", "zone" => "2", "order" => "4", "border_right" => false],

                            //                            ['title'          => $this->getTranslatedCardCaption("Individual"), 'model_name' => $this->card_controller_alias, 'model' => 'individual_l',
                            //                             'perform_action' => true,
                            //                             'action_link'    => '/admin/contractor/fields',
                            //                             'type'           => 'checkbox', 'width' => '33%', "grid_column" => "8/9", "zone" => "2", "order" => "5", "border_right" => false],

                            ['title' => $this->getTranslatedCardCaption("EntrepreneurCertificate"), 'width' => '50%', 'model_name' => $this->card_controller_alias,
                             "show_condition" => function($current_field)
                             {
                                 return !(bool)$this->card_model[0]["individual_l"] === true;
                             },
                             'model' => 'entrepreneur_certificate', 'type' => 'text', "grid_column" => "9/12", "zone" => "2", "order" => "6", "border_right" => false],

                            ['title' => $this->getTranslatedCardCaption("EntrepreneurCertificateDate"), 'width' => '50%', 'model_name' => $this->card_controller_alias,
                             "show_condition" => function($current_field)
                             {
                                 return !(bool)$this->card_model[0]["individual_l"] === true;
                             },
                             'model' => 'entrepreneur_certificate_date', 'type' => 'date', "grid_column" => "12/16", "zone" => "2", "order" => "7", "border_right" => false],

                            [
                                'title'          => "",
                                'model_name'     => $this->card_controller_alias,
                                'model'          => 'individual_l',
                                'type'           => 'radiobuttons',
                                'width'          => '100%',
                                "zone"           => "2",
                                "order"          => "4",
                                "border_right"   => false,
                                'perform_action' => true,
                                'action_link'    => '/admin/contractor/fields',
                                //                                "additional" => [
                                //                                    "title" => "Прочее, указать",
                                //                                    "type" => "text",
                                //                                    "mask" => "XX/XX/X/XX",
                                //                                    "validation" => ["min" => 4]
                                //
                                //                                ],
                                "display"        => 'vertical', // horizontal,vertical
                                "options"        => [
                                    "view"      => "radio", // radio,checkbox
                                    "direction" => "horizontal", // horizontal,vertical
                                ],
                                "list"           => [
                                    ['name' => 'Физ. лицо', 'title' => 'Физ. лицо', 'value' => false],
                                    ['name' => 'Юр. лицо', 'title' => 'Юр. лицо', 'value' => true],
                                    //                                    ['name' => 'Обособленное подразделение', 'title' => 'Обособленное подразделение', 'value' => 3],
                                    //                                    ['name' => 'Гос. орган', 'title' => 'Гос. орган', 'value' => 4],
                                ]
                            ]
                        ]
                    ],

                ]
            ],
            [
                "tab_title"       => $contact_info_link_title,
                //"tab_name"        => $this->getTranslatedCardCaption("ContractorsContactInfo"),
                "tab_description" => '',
                "blocks_quantity" => 1,
                "blocks"          => [
                    [
                        "block_title"         => 'Контактная информация',
                        "block_zone_quantity" => 1,
                        "block_model"         => "ContractorsInfo",
                        "block_type"          => "block_list_base",
                        //                        'list_width'          => '100%',

                        "block_parameters" => [
                            "choose_first_option" => true,
                            "prevent_list_click" => true,
                            "edit_values"        => true,
                            "edit_mode"          => 'inline',
                            "empty_row"          => $empty_row,
                            "hide_pagination"    => true,
                            "hide_search"        => true
                        ],
                        "show_name"        => false,
                        "block_fields"     => [
                            [
                                'key' => 'line_n',
                                'edit' => false,
                                "filter" => true,
                                "sortable" => true,
                                'type' => 'label',
                                'typeVal' => 'number',
                                "label" => '№',
                                'thStyle' => 'width: 5%',
                                "validation" => ["required" => true]
                            ],
                            [
                                'key'            => 'info_kind_id',
                                'edit'           => true,
                                "filter"         => true,
                                "sortable"       => true,
                                'type'           => 'select',
                                "label"          => $this->getTranslatedCardCaption("InfoKind"),
                                'thStyle'        => 'width: 20%',
                                'options'        => [],
                                "options_data"   => [
                                    "options_data_model"  => "InfoKinds",
                                    "options_field_id"    => "id",
                                    "options_field_title" => "info_kind_name",
                                    "search"              => ""
                                ],
                                'dependent_data' => [
                                    "supreme"           => true,
                                    "supreme_field_key" => 'info_type_id',
                                ],
                                "validation"     => ["required" => true]
                            ],
                            [
                                'key'            => 'info_type_id',
                                'edit'           => true,
                                "filter"         => true,
                                "sortable"       => true,
                                'type'           => 'select',
                                "label"          => $this->getTranslatedCardCaption("InfoType"),
                                'thStyle'        => 'width: 10%',
                                'options'        => [],
                                "options_data"   => [
                                    "options_data_model"  => "InfoTypes",
                                    "options_field_id"    => "id",
                                    "options_field_title" => "info_type_name",
                                    "search"              => ""
                                ],
                                'dependent_data' => [
                                    'backward_dependency'  => true,
                                    'dependent'            => true,
                                    'dependent_data_model' => 'InfoKinds',
                                    'dependent_field_id'   => 'info_type_id',
                                    'dependent_backward_field' => 'info_kind_id',
                                    'dependent_field'      => 'id',
                                ],
                                "validation"     => ["required" => true]
                            ],
                            [
                                'key'        => 'representation',
                                'edit'       => true,
                                "filter"     => true,
                                "sortable"   => true,
                                'type'       => 'text',
                                'typeVal'    => 'text',
                                "label"      => $this->getTranslatedCardCaption("Value"),
                                'thStyle'    => 'width: 65%',
                                "validation" => ["required" => true]
                            ],
                            [
                                'key' => 'edit_table_actions',
                                'actions' => ['edit','delete'],
                                "label" => $this->getTranslatedCardCaption("Actions"),
                                'thStyle' => 'width: 10%',
                            ]
                        ]
                    ]

                ]
            ],
        ];

        return $this;
    }

    public function getCardBlockFields(): array
    {
        return array_values(array_filter(array_map(function($tab)
        {
            $tab["blocks"] = array_filter(array_map(function($block)
            {
                $block["block_fields"] = array_values(array_filter($block["block_fields"], function($block_field)
                {
                    if(!isset($block_field["show_condition"]))
                        return true;

                    return $block_field["show_condition"]($block_field) === true;
                }));

                if(!isset($block["show_condition"]))
                    return $block;

                return $block["show_condition"]($block) === true ? $block : null;
            }, $tab["blocks"]));

            if(!isset($tab["show_condition"]))
                return $tab;

            return $tab["show_condition"]($tab) === true ? $tab : null;
        }, $this->card_block_fields)));
    }

    public function setCardFormTitle(): self
    {
        $this->card_form_title = "Contractor";

        return $this;
    }

    public function setCardMainDataModels(): self
    {
        $this->card_main_data_models = [
            "ContractorsInfo" => $this->contractor_info
        ];

        return $this;
    }

    public function setCardMainDataModelName(): self
    {
        $this->card_main_data_model_name = ($this->isNewObject()) ? $this->getTranslatedCardCaption("new") : $this->card_model[0]["contractor_short_name"];

        return $this;
    }

    public function setCardLinks(): self
    {
        if(!$this->isNewObject())
        {
            $request = request();

            $contact_persons_count = ContactPerson::query()
                ->join("__Controllers as controllers", function(JoinClause $join)
                {
                    $join->on("ContactPersons.table_n_owner", "=", "controllers.controller_table_n")
                        ->where("controllers.controller_code", "=", "ContractorsController");
                })
                ->where("ContactPersons.row_id_owner", $request->id)
                ->count();

            $contact_persons_link_title = $this->getTranslatedCardCaption("ContactPersons");

            if($contact_persons_count > 0)
                $contact_persons_link_title .= " ( $contact_persons_count )";

            $contact_info_link_title = $this->getTranslatedCardCaption("ContractorsContactInfo");

            if($this->contractor_info_count > 0)
                $contact_info_link_title .= " ( $this->contractor_info_count )";

            $this->card_links = [
                //                [
                //                    "link_title" => $contact_info_link_title,
                //                    "link_img"   => "",
                //                    "link_type"  => "internal_push",
                //                    "link_url"   => "/contactInfo"
                //                ],
                [
                    "link_title" => $contact_persons_link_title,
                    "link_img"   => "",
                    "link_type"  => "internal_push",
                    "link_url"   => "/contactPerson"
                ],
            ];
        }

        return $this;
    }

    public function card_old(Request $request)
    {

        self::getDefaultDBAreaId();

        $captionName = [
            'ok', 'apply', 'back', 'CountryRegCountry', 'ContactPersons',
            'AreaDB', 'Individual', 'DB', 'TaxpayerNumber', 'CryptoTokenIdNull',
            'CryptoPlatformAccounts', 'CryptoExchangeAccounts', 'CryptoWallets',
            'ServerDB', 'CodeReasonNumber', 'Actual', 'BankAccounts', 'CryptoAccounts', 'CryptoPlatform',
            'Main', 'SystemDetails', 'Contractor', 'ContractorFullName', 'ContractorShortName', 'RegistryNumber',
            'TaxpayerNumber', 'CodeReasonNumber', 'SocialSecurityNumber', 'CountryName', 'Database', 'EntrepreneurCertificate',
            'EntrepreneurCertificateDate', 'CreationDetails', 'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy', 'INN', 'OGRN', 'KPP', '', '', 'ContractorsContactInfo', 'Contractor', 'ContractorShortName',

            'ContractorFullName', 'IndividualEnt'
        ];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $contReqId = $request->id;
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

            $contRequest = Contractor::getNewObject();
            $contractorInfoCount = NULL;
        }
        else
        {
            //            $contRequest = Contractor::with('country', 'dbarea', 'dbarea.dBase', 'dbarea.dBase.serverDb',
            //                'contractorinfo')
            //                ->where('id', $request->id)->first();

            $contRequest = $this->getContractor([
                "id" => $request->id
            ], ['country', 'dbarea', 'dbarea.dBase', 'dbarea.dBase.serverDb', 'contractorinfo'], ["*"], [], false,
                true);

            if(!$contRequest)
                return abort('403');

            $contractorInfoCount = count($contRequest['contractorinfo']);


            $contRequest = $contRequest->toArray();

        }
        $model = 'App\Models\Controller';

        $mainModel = $model::where('controller_code', class_basename(Route::current()->controller))
            ->value('controller_alias');

        $nameControllerMethod = [
            'controller'  => class_basename(Route::current()->controller),
            'accessRight' => 'record'
        ];
        $formShowParam = (new CheckController($nameControllerMethod))->getShowFormParameters();

        $countires = Country::select('id', 'country_name')->get()->toarray();
        $dbarea = DbArea::with('dBase', 'dBase.serverDb')->get();

        $tabs = [
            [
                "tab_title"       => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                "tab_name"        => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                "tab_description" => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras in venenatis sem. Nulla pulvinar,<br> diam quis feugiat fringilla, ligula metus consequat diam, id vulputate magna turpis sit amet feli',
                "blocks_quantity" => 1,
                "blocks"          => [
                    [
                        "block_title"         => $getArrayCaptions['Contractor']['translation_captions']['caption_translation'],
                        "block_zone_quantity" => 2,
                        "block_model"         => $mainModel,
                        "block_type"          => "block_card",
                        "block_fields"        => [

                            ['title' => $getArrayCaptions['ContractorFullName']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'contractor_full_name', 'type' => 'text', 'width' => '100%', "grid_column" => "1/8", "zone" => "1", "order" => "1", "border_right" => false, "validation" => ["required" => true, "min" => 4]],
                            ['title' => $getArrayCaptions['INN']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'taxpayer_number', 'type' => 'text', 'width' => '50%', "grid_column" => "8/12", "grid-row" => "2", "zone" => "2", "order" => "1", "border_right" => false],
                            ['title' => $getArrayCaptions['ContractorShortName']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'contractor_short_name', 'type' => 'text', 'width' => '50%', "grid_column" => "1/4", "zone" => "1", "order" => "2", "border_right" => false],

                            ['title' => $getArrayCaptions['KPP']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'register_number', 'type' => 'text', 'width' => '50%', "grid_column" => "12/16", "grid_row" => "1", "zone" => "2", "order" => "3", "border_right" => false],
                            [
                                'title'           => $getArrayCaptions['CountryRegCountry']['translation_captions']['caption_translation'],
                                'model'           => 'country_id',
                                'model_name'      => $mainModel,
                                'type'            => 'vue-select',
                                'width'           => '50%',
                                "grid_column"     => "4/8",
                                "grid_row"        => '2',
                                "grid_row_tablet" => "1",
                                'options'         => [],
                                "options_data"    => [
                                    "options_data_model"  => "Countries",
                                    "options_field_id"    => "id",
                                    "options_field_title" => "country_name",
                                    "search"              => ""
                                ],
                                "zone"            => "1",
                                "order"           => "3",

                                "border_right" => false

                            ],
                            ['title' => $getArrayCaptions['OGRN']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'code_reason_number', 'type' => 'text', 'width' => '50%', "grid_column" => "8/12", "zone" => "2", "order" => "2", "border_right" => false],
                            ['title' => $getArrayCaptions['SocialSecurityNumber']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'social_security_number', 'type' => 'text', 'width' => '50%', "grid_column" => "12/16", "zone" => "2", "order" => "4", "border_right" => false],

                            ['title' => $getArrayCaptions['Individual']['translation_captions']['caption_translation'], 'model_name' => $mainModel, 'model' => 'individual_l',
                             'type'  => 'checkbox', 'width' => '33%', "grid_column" => "8/9", "zone" => "2", "order" => "5", "border_right" => false],

                            ['title' => $getArrayCaptions['EntrepreneurCertificate']['translation_captions']['caption_translation'],
                             'width' => '33%', 'model_name' => $mainModel, 'model' => 'entrepreneur_certificate', 'type' => 'text', "grid_column" => "9/12", "zone" => "2", "order" => "6", "border_right" => false],

                            ['title' => $getArrayCaptions['EntrepreneurCertificateDate']['translation_captions']['caption_translation'],
                             'width' => '33%', 'model_name' => $mainModel, 'model' => 'entrepreneur_certificate_date', 'type' => 'date', "grid_column" => "12/16", "zone" => "2", "order" => "7", "border_right" => false],

                        ]
                    ],
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
                            ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'], 'model' => 'created_at', "model_name" => $mainModel, 'type' => 'label', 'width' => '100%', "grid_column" => "1/8", "zone" => "1", "order" => "1"],
                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'], 'model' => 'created_by', "model_name" => $mainModel, 'type' => 'label', 'width' => '100%', "grid_column" => "half/15", "zone" => "1", "order" => "2"],
                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'], 'model' => 'updated_at', "model_name" => $mainModel, 'type' => 'label', 'width' => '100%', "grid_column" => "1/8", "zone" => "2", "order" => "1"],
                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'], 'model' => 'updated_by', "model_name" => $mainModel, 'type' => 'label', 'width' => '100%', "grid_column" => "half/15", "zone" => "2", "order" => "2"],
                            ['title' => $getArrayCaptions['Actual']['translation_captions']['caption_translation'], 'model' => 'actual_l', 'model_name' => $mainModel, 'type' => 'checkbox', 'width' => '50%', "grid_column" => "1/4", "zone" => "2", "order" => "1", "border_right" => false],
                        ]
                    ]
                ]
            ];
            array_push($tabs, $tabSystem);
        }

        $res = [[ //Итоговый массив рекизитов

                  'id'                            => $contRequest['id'],
                  'db_area_id'                    => $contRequest['db_area_id'],
                  'country_id'                    => $contRequest['country'][0]['id'] ?? null,
                  'country_name'                  => $contRequest['country'][0]['country_name'] ?? null,
                  'actual_l'                      => $contRequest['actual_l'],
                  'individual_l'                  => $contRequest['individual_l'],
                  'contractor_short_name'         => $contRequest['contractor_short_name'],
                  'contractor_full_name'          => $contRequest['contractor_full_name'],
                  //            'uid_1c_code' => $contRequest['uid_1c_code'],
                  'taxpayer_number'               => $contRequest['taxpayer_number'],
                  'code_reason_number'            => $contRequest['code_reason_number'],
                  'register_number'               => $contRequest['register_number'],
                  'social_security_number'        => $contRequest['social_security_number'],
                  'entrepreneur_certificate'      => $contRequest['entrepreneur_certificate'],
                  'entrepreneur_certificate_date' => $contRequest['entrepreneur_certificate_date'],
                  'created_at'                    => $contRequest['created_at'],
                  'created_by'                    => $contRequest['created_by'],
                  'updated_at'                    => $contRequest['updated_at'],
                  'updated_by'                    => $contRequest['updated_by'],

                ]];

        $card = [
            "sets" => $this->getButtonsList(['card_actions']),

            "main_data_models" => [
                //                $mainModel => $ColumnContractor
                $mainModel => $res
            ],

            "add_data_models" => [
                //                "DBAreas" => $dbarea,
                "Countries" => $countires,
            ],

            "form_parameters" => [
                "form_title"                    => $getArrayCaptions['Contractor']['translation_captions']['caption_translation'],
                "form_code"                     => $mainModel,
                "disable_inputs"                => $formShowParam['read_only'],
                "form_is_dependent"             => false, // {if true -> show field} {if false hidden field)
                "form_type"                     => "card",
                "form_base_data_model"          => $mainModel,
                "use_grid_layout"               => false,
                "form_main_data_model_id_field" => "id",
                //                "form_main_data_model_name" => $ColumnContractor[0]['contractor_short_name'],
                "form_main_data_model_name"     => $res[0]['contractor_short_name'],
                "form_type_list"                => [
                    "form_card_url"     => "/contractors_new/",
                    "form_search_field" => "contractor_full_name",
                ],
            ],


            "tabs" => $tabs
        ];

        if($request->id !== "new")
        {
            $contact_persons_count = ContactPerson::query()
                ->join("__Controllers as controllers", function(JoinClause $join)
                {
                    $join->on("ContactPersons.table_n_owner", "=", "controllers.controller_table_n")
                        ->where("controllers.controller_code", "=", "ContractorsController");
                })
                ->where("ContactPersons.row_id_owner", $request->id)
                ->count();

            $contact_persons_link_title = $getArrayCaptions['ContactPersons']['translation_captions']['caption_translation'];

            if($contact_persons_count > 0)
                $contact_persons_link_title .= " ( $contact_persons_count )";

            $contact_info_link_title = $getArrayCaptions['ContractorsContactInfo']['translation_captions']['caption_translation'];

            if($contractorInfoCount > 0)
                $contact_info_link_title .= " ( $contractorInfoCount )";

            $card["links"] = [
                [
                    "link_title" => $contact_info_link_title,
                    "link_img"   => "",
                    "link_type"  => "internal_push",
                    "link_url"   => "/contactInfo"
                ],
                [
                    "link_title" => $contact_persons_link_title,
                    "link_img"   => "",
                    "link_type"  => "internal_push",
                    "link_url"   => "/contactPerson"
                ],
            ];
        }

        return response()->json($card);
    }

    public function update(Request $request)
    {
        $applicationChangeRequest = (new ApplicationChangeRequest($request->getContent()));
        $res = $applicationChangeRequest->applicationChange();
        return $res;
    }

    public function sendChangeRequest(Request $request)
    {

        $ChangeRequest = [
            "request" => [
                "request_name"       => "RequestForDataChanges",
                "request_number"     => "2",
                "request_parameters" => [
                    "number"            => "777",
                    "status"            => "3",
                    "comment"           => "",
                    "objects_to_change" => [
                        [
                            "object_type_code"        => "contractors",
                            "object_kind"             => "1",
                            "object_key"              => "uid_1c_code",
                            "object_key_value"        => "914aa641-ab9c-11e8-843f-002590762efe",
                            "object_id"               => "1",
                            "object_block_fields"     => [
                                [
                                    "field_name"    => "contractor_full_name",
                                    "field_values"  =>
                                        [
                                            "value_current" => "Зубанов Игорь Валерьевич",
                                            "value_old"     => "Зубанов Игорь Александрович",
                                            "value_new"     => "Зубанов Игорь Валерьевич"
                                        ],
                                    "field_status"  => "1",
                                    "field_comment" => ""
                                ],

                                [
                                    "field_name"    => "contractor_short_name",
                                    "field_values"  =>
                                        [
                                            "value_current" => "Зубанов ИВ",
                                            "value_old"     => "Зубанов ИА",
                                            "value_new"     => "Зубанов ИВ"
                                        ],
                                    "field_status"  => "1",
                                    "field_comment" => ""
                                ],

                                [
                                    "field_name"    => "country_code",
                                    "field_is_link" => "1",
                                    "field_values"  =>
                                        [
                                            "value_current" =>
                                                [
                                                    "value_table_code" => "country",
                                                    "value_table_key"  => "country_code",
                                                    "value"            => "208"
                                                ],
                                            "value_old"     =>
                                                [
                                                    "value_table_code" => "country",
                                                    "value_table_key"  => "country_code",
                                                    "value"            => "643"
                                                ],
                                            "value_new"     =>
                                                [
                                                    "value_table_code" => "country",
                                                    "value_table_key"  => "country_code",
                                                    "value"            => "208"
                                                ]
                                        ],
                                    "field_status"  => "1",
                                    "field_comment" => ""
                                ]
                            ],

                            //------object_tables_to_change
                            "object_tables_to_change" => [
                                [
                                    "table_type_code" => "contact_information",
                                    "table_strings"   => [
                                        [
                                            "string_line_n"       => "1",
                                            "string_block_fields" => [
                                                [
                                                    "field_name"    => "representetion",
                                                    "field_values"  =>
                                                        [
                                                            "value_current" => "Одесса, ул. Преображенская 30",
                                                            "value_old"     => "Одесса, ул. Клары Цеткиной 20",
                                                            "value_new"     => "Одесса, ул. Преображенская 30"
                                                        ],
                                                    "field_status"  => "1",
                                                    "field_comment" => ""
                                                ],
                                                [
                                                    "field_name"    => "info_type",
                                                    "field_values"  =>
                                                        [
                                                            "value_current" => "Адрес",
                                                            "value_old"     => "Адрес",
                                                            "value_new"     => "Адрес"
                                                        ],
                                                    "field_status"  => "1",
                                                    "field_comment" => ""
                                                ],
                                                [
                                                    "field_name"    => "info_kind",
                                                    "field_values"  =>
                                                        [
                                                            "value_current" => "Фактический адрес",
                                                            "value_old"     => "Юридический адрес",
                                                            "value_new"     => "Фактический адрес"
                                                        ],
                                                    "field_status"  => "1",
                                                    "field_comment" => ""
                                                ],
                                                [
                                                    "field_name"    => "country_code",
                                                    "field_values"  =>
                                                        [
                                                            "value_current" => "208",
                                                            "value_old"     => "643",
                                                            "value_new"     => "208"
                                                        ],
                                                    "field_status"  => "1",
                                                    "field_comment" => ""
                                                ]
                                            ]
                                        ],
                                        [
                                            "string_line_n"       => "2",
                                            "string_block_fields" => [
                                                [
                                                    "field_name"    => "representetion",
                                                    "field_values"  =>
                                                        [
                                                            "value_current" => "777-77-77",
                                                            "value_old"     => "777-66-55",
                                                            "value_new"     => "777-77-77"
                                                        ],
                                                    "field_status"  => "1",
                                                    "field_comment" => ""
                                                ],
                                                [
                                                    "field_name"    => "info_type",
                                                    "field_values"  =>
                                                        [
                                                            "value_current" => "Телефон",
                                                            "value_old"     => "Телефон",
                                                            "value_new"     => "Телефон"
                                                        ],
                                                    "field_status"  => "1",
                                                    "field_comment" => ""
                                                ],
                                                [
                                                    "field_name"    => "info_kind",
                                                    "field_values"  =>
                                                        [
                                                            "value_current" => "Телефон",
                                                            "value_old"     => "Телефон",
                                                            "value_new"     => "Телефон"
                                                        ],
                                                    "field_status"  => "1",
                                                    "field_comment" => ""
                                                ],
                                                [
                                                    "field_name"    => "phone_number",
                                                    "field_values"  =>
                                                        [
                                                            "value_current" => "7777777",
                                                            "value_old"     => "7776655",
                                                            "value_new"     => "7777777"
                                                        ],
                                                    "field_status"  => "1",
                                                    "field_comment" => ""
                                                ],
                                                [
                                                    "field_name"    => "phone_number_without_codes",
                                                    "field_values"  =>
                                                        [
                                                            "value_current" => "7777777",
                                                            "value_old"     => "55",
                                                            "value_new"     => "7777777"
                                                        ],
                                                    "field_status"  => "1",
                                                    "field_comment" => ""
                                                ]
                                            ]
                                        ],
                                        [
                                            "string_line_n"       => "3",
                                            "string_block_fields" => [
                                                [
                                                    "field_name"    => "АдресЭлектроннойПочты",
                                                    "field_values"  =>
                                                        [
                                                            "value_current" => "info_type",
                                                            "value_old"     => "АдресЭлектроннойПочты",
                                                            "value_new"     => "АдресЭлектроннойПочты"
                                                        ],
                                                    "field_status"  => "1",
                                                    "field_comment" => ""
                                                ],
                                                [
                                                    "field_name"    => "representetion",
                                                    "field_values"  =>
                                                        [
                                                            "value_current" => "admin911@ukr.ua",
                                                            "value_old"     => "admin1@gmail.com",
                                                            "value_new"     => "admin911@ukr.ua"
                                                        ],
                                                    "field_status"  => "1",
                                                    "field_comment" => ""
                                                ],
                                                [
                                                    "field_name"    => "info_kind",
                                                    "field_values"  =>
                                                        [
                                                            "value_current" => "Email",
                                                            "value_old"     => "Email",
                                                            "value_new"     => "Email"
                                                        ],
                                                    "field_status"  => "1",
                                                    "field_comment" => ""
                                                ],
                                                [
                                                    "field_name"    => "url_name",
                                                    "field_values"  =>
                                                        [
                                                            "value_current" => "ukr.ua",
                                                            "value_old"     => "gmail.com",
                                                            "value_new"     => "ukr.ua"
                                                        ],
                                                    "field_status"  => "1",
                                                    "field_comment" => ""
                                                ],
                                                [
                                                    "field_name"    => "e_mail",
                                                    "field_values"  =>
                                                        [
                                                            "value_current" => "admin911@ukr.ua",
                                                            "value_old"     => "admin1@gmail.com",
                                                            "value_new"     => "admin911@ukr.ua"
                                                        ],
                                                    "field_status"  => "1",
                                                    "field_comment" => ""
                                                ]
                                            ]
                                        ]
                                    ]
                                ],
                                [
                                    "table_type_code" => "title_history",
                                    "table_strings"   => [
                                        [
                                            "string_line_n"       => "1",
                                            "string_block_fields" => [
                                                [
                                                    "field_name"    => "full_name",
                                                    "field_values"  =>
                                                        [
                                                            "value_current" => "Зубанов И",
                                                            "value_old"     => "",
                                                            "value_new"     => "Зубанов И"
                                                        ],
                                                    "field_status"  => "1",
                                                    "field_comment" => ""
                                                ],
                                                [
                                                    "field_name"    => "data",
                                                    "field_values"  =>
                                                        [
                                                            "value_current" => "2018-01-01",
                                                            "value_old"     => "",
                                                            "value_new"     => "2018-01-01"
                                                        ],
                                                    "field_status"  => "1",
                                                    "field_comment" => ""
                                                ]
                                            ]
                                        ]
                                    ]
                                ]
                            ]
                            //------END object_tables_to_change
                        ]
                    ]
                ]
            ]
        ];

        return $ChangeRequest;
    }

    public function getAnswerFrom1C(Request $request)
    {
        $resArray = json_decode($request->getContent(), true);

        $dbTypesControllers = \App\Models\Controller::with('dbTypeController.controllerFields')
            ->where('controller_code', class_basename(Route::current()->controller))
            ->get()->toArray();


        foreach($resArray['request']['request_parameters']['objects_to_change'] as $objectsToChange)
        {
            foreach($objectsToChange['object_block_fields'] as $objectBlockFields)
            {

                if(!isset($objectBlockFields['field_is_link']))
                {
                    $UpdateDetails = Contractor::where($objectsToChange['object_key'], '=',
                        $objectsToChange['object_key_value'])
                        ->first();
                    $fieldName = (string)$objectBlockFields['field_name'];
                    $UpdateDetails->$fieldName = $objectBlockFields['field_values']['value_new'];
                    $UpdateDetails->save();
                }
                if(isset($objectBlockFields['field_is_link']) and ($objectBlockFields['field_is_link']) == "1")
                {
                    $UpdateDetails = Contractor::where($objectsToChange['object_key'], '=',
                        $objectsToChange['object_key_value'])->first();
                    $fieldNameIsLink = (string)$objectBlockFields['field_name'];

                    $ModelIsLink = ModelTables::select('table_name')
                        ->where('table_code', '=', $objectBlockFields['field_values']['value_new']['value_table_code'])
                        ->value('table_name');

                    $IdModelIsLink = DB::table((string)$ModelIsLink)
                        ->select('id')
                        ->where($objectBlockFields['field_values']['value_new']['value_table_key'], '=',
                            $objectBlockFields['field_values']['value_new']['value'])
                        ->value('id');

                    $UpdateDetails->country_id = $IdModelIsLink;
                    $UpdateDetails->save();
                }

                if(!empty($objectsToChange['object_tables_to_change']))
                {

                    foreach($objectsToChange['object_tables_to_change'] as $objectTablesToChange)
                    {
                        foreach($objectTablesToChange['table_strings'] as $tableStrings)
                        {
                            foreach($tableStrings['string_block_fields'] as $string)
                            {

                                $tableToChangeModel = ModelTables::select('table_name')
                                    ->where('table_code', '=', $objectTablesToChange['table_type_code'])
                                    ->value('table_name');

                                $update = DB::table((string)$tableToChangeModel)
                                    ->where('line_n', '=', $tableStrings['string_line_n'])
                                    ->update([
                                            (string)$string['field_name'] => $string['field_values']['value_new']
                                        ]
                                    );

                                if($update)
                                {
                                    return "update";
                                }
                                else
                                {
                                    return "no update";
                                }
                            }
                        }
                    }
                }
            }
        }
        return "update";
    }

    public function getFields(Request $request)
    {
        $this->card_controller_alias = \App\Models\Controller::query()
            ->where('controller_code', class_basename(\Route::current()->controller))
            ->value('controller_alias');

        $main_data_models = $request->get("main_data_models");

        $main_model = $main_data_models[$this->card_controller_alias];

        $this->card_main_data_models = $main_data_models;
        $this->card_model = $main_model;
        $this->card_add_data_models = [];

        $main_model_id = $this->card_model[0]["id"];

        if(!is_null($main_model_id))
        {
            $this->contractor_info_count = ContractorInfo::query()
                ->where("contractor_id", $this->card_model[0]["id"])
                ->count();
        }


        $this->setCardCaptions()
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

    public function beforeWriteBe(&$bCancel)
    {

        // Проверка на multiple_values_l в табличной части
        $contractors_info_alias = \App\Models\Controller::query()
            ->where("controller_code", "ContractorsInfoController")
            ->value("controller_alias");

        $contractors_info = collect($this->main_data_models[$contractors_info_alias]);

        // Убрать удаленные элементы (чтоб на них не срабатывало условие)
        $contractors_info = $contractors_info->filter(function($info)
        {
            if(!isset($info["status"]))
                return true;

            return $info["status"] !== 3;
        });

        if($contractors_info->count() > 0)
        {
            $info_kinds = InfoKind::query()
                ->whereIn("id", $contractors_info->pluck("info_kind_id")->toArray())
                ->where("multiple_values_l", false)
                ->get();

            foreach($info_kinds as $info_kind)
            {
                $id = $info_kind->id;

                // Количество контактной информации с текущим видом информации
                $contractors_info_count = $contractors_info->where("info_kind_id", $id)->count();

                if($contractors_info_count > 1)
                {
                    $bCancel = true;
                    return [
                        "error"   => true,
                        "message" => "Может быть только одна контактная информация с видом информации $info_kind->info_kind_name"
                    ];
                }
            }
        }
    }
}
