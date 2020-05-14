<?php

namespace App\Http\Controllers\Api\TabCompanyContractor;

use App\Models\AttachedDocument;
use App\Models\AttachedDocumentFile;
use App\Models\AttachedDocumentKind;
use App\Models\AttachedDocumentType;
use App\Models\Contractor;
use App\Models\Country;
use App\Models\DbArea;
use App\Http\Classes\ConsumerParameters;
use App\Models\Language;
use App\Models\TestCron;
use App\Tasks\GetTranslatorsTask;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Route;

class ContractorsControllerSandBox extends Controller
{
    //Albert Topalu 17.10.18
    public function list(Request $request/*, GetTranslatorsTask $getTranslatorsTask*/)
    {
        $currrentLang = Lang::locale();

        //get array accessMethods from  Http/Middleware/CheckAccess.php
        $methods = $request->accessMethods;

        $captionName = [
            'ok',
            'apply',
            'back', 'Main', 'Contractors', 'Individual', 'EditingAttachedDocuments',
            'DocumentKind', 'DocumentType', 'RequiredDocument',
            'Actual', 'Name', 'Format', 'Size', 'Actions',
        ];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $document = AttachedDocument::with('attachDocumentFile', 'attachDocumentKind', 'attachDocumentType', 'attachDocumentFile.typeFile',
            'attachDocumentKind.attachDocumentType', 'attachDocumentKind.requiredDocumentKind')
            ->where('id',1)
            ->get()->toArray();

        //проверка обязательности
        $documentArray = [];
        foreach ($document as $d) {
            $row_id = $d['attach_document_kind']['required_document_kind']['row_id'];
            $table_n = $d['attach_document_kind'] ['required_document_kind']['table_n'];
            $required = array($row_id, $table_n);
            $doc_row_id = $d['row_id'];
            $doc_table_n = $d['table_n'];
            $doc_required = array($doc_row_id, $doc_table_n);
            if ($required == $doc_required) {
                $required_l = 1;
                $d = array_merge($d, array("required_l" => 1));
            }
            else {
                $required_l = 0;
                $d = array_merge($d, array("required_l" => 0));
            }
            $documentArray[] = $d;
        }

        $file = AttachedDocumentFile::with('attachDocument', 'attachDocumentFileTitle',
            'attachDocument.attachDocumentKind', 'attachDocument.attachDocumentType', 'typeFile')
            ->get()->toArray();

        for($i=0; $i<count($documentArray['0']['attach_document_file']); $i+=1)
        {
            $arr[] = [
                "document" => [
                    "value" => $documentArray['0']['attach_document_file'][$i]['att_doc_file'],
                    "name" => $documentArray['0']['attach_document_file'][$i]['att_doc_file_name'],
                    "input_name" => $documentArray['0']['attach_document_file'][$i]['att_doc_file_code'],
                    'type' => 'button',
                    'title' => 'Load file',
                    'action_type' => 'load_file',
                    'validation' => ['size' => 3072, 'ext' => array('jpg', 'jpeg', 'png', 'pdf')]
                ],
                'doc_size' => [
                    "value" => $documentArray['0']['attach_document_file'][$i]['att_doc_file_size'],
                ],
                'doc_ext' => [
                    "value" => $documentArray['0']['attach_document_file'][$i]['type_file']['0']['file_type_name'],
                ],
                "status" =>'existing',
                "id" => $documentArray['0']['attach_document_file'][$i]['id']
            ];
        }
        $kindArray = AttachedDocumentKind::with('attachDocumentType', 'requiredDocumentKind', 'attachDocument')
            ->get()->toArray();

        foreach ($kindArray as $k)
        {
            $row_id = $k['required_document_kind']['row_id'];
            $table_n = $k['required_document_kind']['table_n'];
            $required = array($row_id, $table_n);
            $doc_row_id = $k['attach_document']['row_id'];
            $doc_table_n = $k['attach_document']['table_n'];
            $doc_required = array($doc_row_id, $doc_table_n);
            if ($required == $doc_required) {
                $required_l = 1;
                $k = array_merge($k, array("required_l" => 1));
            }
            else {
                $required_l = 0;
                $k = array_merge($k, array("required_l" => 0));
            }
            $kind[] = $k;
            $result[] = [
                "att_doc_type" => [
                    "att_doc_type_id" => $k['attach_document_type']['id'],
                    "att_doc_type_name" => $k['attach_document_type']['att_doc_type_name'],
                ],
                'att_doc_kind_id' => $k['id'],
                "att_doc_kind_name" => $k['att_doc_kind_name'],
                "required" => $k['required_l'],
            ];
        }
        $list = [
            "main_data_models" => [
                "Contractors" => $arr,
                "Requisites" => [
                    [
                        'att_doc_type_name' => $documentArray['0']['attach_document_type']['att_doc_type_name'],
                        'att_doc_kind_id' => $documentArray['0']['att_doc_kind_id'],
                        'att_doc_kind_name' => "Default value", // нужно, чтобы вывести стандартное значение для селекта
                        'actual_l' => $documentArray['0']['actual_l'],
                        'required' => $documentArray['0']['required_l'], // может быть здесь оно и не надо, так как отрабатывает вотчер и устанавливает текущее значение
                    ]
                ]
            ],
            "add_data_models" => [
                "DocumentKinds" => $result
            ],
            "form_parameters" => [
                "form_title" => $getArrayCaptions['Contractors']['translation_captions']['caption_translation'],
                "form_base_data_model" => "Requisites",
            ],
            "actions" => [
                "actions_card" => [
                    ["title" => $getArrayCaptions['ok']['translation_captions']['caption_translation'], "code" => "save", "class" => "btn btn-green", "link" => "/admin/contractor", "img" => ""],
                    ["title" => $getArrayCaptions['apply']['translation_captions']['caption_translation'], "code" => "apply", "class" => "btn btn-green", "link" => "/admin/contractor", "img" => ""],
                    ["title" => $getArrayCaptions['back']['translation_captions']['caption_translation'], "code" => "back", "class" => "btn btn-grey", "link" => "", "img" => ""],
                ]
            ],
            "tabs" => [
                [
                    "tab_title" => $getArrayCaptions['EditingAttachedDocuments']['translation_captions']['caption_translation'],
                    "blocks_quantity" => 2,
                    "blocks" => [
                        [
                            "form_is_dependent" => false,
                            "block_title" => "Block2",
                            "block_zone_quantity" => 2,
                            "block_width" => "100%",
                            "block_model" => "Requisites",
                            "block_type" => "block_card",
                            "block_fields" => [
                                ['title' => $getArrayCaptions['DocumentKind']['translation_captions']['caption_translation'],
                                    'model' => 'att_doc_kind_id',
                                    'type' => 'lt-select',
                                    'options' => [],
                                    "options_data" => [
                                        "options_data_model" => "DocumentKinds",
                                        "options_field_id" => "att_doc_kind_id",
                                        "options_field_title" => "att_doc_kind_name",
                                        "search" => ""
                                    ],
                                    'width' => '50%',
                                    "zone" => "1",
                                    "order" => "1"
                                ],
                                ['title' => $getArrayCaptions['Actual']['translation_captions']['caption_translation'],
                                    'model' => 'actual_l',
                                    'type' => 'checkbox',
                                    'width' => '50%',
                                    "zone" => "1",
                                    "order" => "3"
                                ],
                                ['title' => $getArrayCaptions['DocumentType']['translation_captions']['caption_translation'],
                                    'model' => 'att_doc_type_name',
                                    'type' => 'label',
                                    'width' => '50%',
                                    "zone" => "1",
                                    "order" => "2"
                                ],
                                ['title' => $getArrayCaptions['RequiredDocument']['translation_captions']['caption_translation'],
                                    'model' => 'required',
                                    'type' => 'checkbox',
                                    'disabled' => 'true',
                                    'width' => '50%',
                                    "zone" => "1",
                                    "order" => "1"
                                ],
                            ]
                        ],
                        [
                            "form_is_dependent" => false,
                            "block_title" => 'block1',
                            "block_zone_quantity" => 1,
                            "block_width" => "100%",
                            "block_model" => "Contractors",
                            "block_type" => "block_list_base",
                            "current_new_id" => 1,
                            "block_actions" => [
                                "view" => true,
                                "download" => true,
                                "delete" => true,
                            ],
                            "block_fields" => [
                                ['key' => 'actions', 'sortable' => false,
                                    'class' => 'list_checkbox',
                                    'thStyle' => 'width: 6%',
                                    "zone" => "1",
                                    "order" => "1"
                                ],
                                ['key' => 'document', 'edit' => true, "filter" => true, 'type' => 'button', 'class' => 'col-input',
                                    "label" => $getArrayCaptions['Name']['translation_captions']['caption_translation'], 'thStyle' => 'width: 31%', "zone" => "1", "order" => "2"],
                                ['key' => "doc_size", 'edit' => true, "filter" => true, 'class' => '', 'type' => 'label', 'options_data' => ['search' => ''],
                                    "label" => $getArrayCaptions['Size']['translation_captions']['caption_translation'], 'thStyle' => 'width: 17%', "zone" => "1", "order" => "4"],
                                ['key' => "doc_ext", 'edit' => true, "filter" => true, 'type' => 'label', 'class' => '',
                                    'label' => $getArrayCaptions['Format']['translation_captions']['caption_translation']],
                                ['key' => "list_actions",  'class' => 'list_actions-box',
                                    'label' => $getArrayCaptions['Actions']['translation_captions']['caption_translation']]
                            ]
                        ],
                    ]
                ]
            ]
        ];
        return response()->json($list);
    }

    public function card(Request $request)
    {

        $methods = $request->accessMethods;

//        $this->texts = DB::table('_TranslationCaptions')
//            ->join('Requisites', '_TranslationCaptions.language_id', '=', 'languages.id')
//            ->join('_captions', '_TranslationCaptions.caption_id', '=', '_captions.id')
//            ->where('languages.language_code', config('app.locale'))
//        ->get();
        //$getArrayCaptions['AreaDB']['translation_captions']['caption_translation']

//        $this->texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();
        $captionName = [
            'ok', 'apply', 'back', 'CountryRegCountry',
            'AreaDB', 'Individual', 'DB', 'TaxpayerNumber',
            'ServerDB', 'CodeReasonNumber', 'Actual',

            'Main', 'CreationDetails', 'Contractor', 'ContractorFullName', 'ContractorShortName', 'RegistryNumber',
            'TaxpayerNumber', 'CodeReasonNumber', 'SocialSecurityNumber', 'CountryName', 'Database', 'EntrepreneurCertificate',
            'EntrepreneurCertificateDate', 'CreationDetails', 'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy'
        ];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $contractor = Contractor::with('country', 'dbarea', 'dbarea.dBase', 'dbarea.dBase.serverDb')
            ->where('id', $request->id)->get()->toArray();

        // Add key=>value to collections contractorColumn Albert Topalu 08.10.2018 17:44

        $contractorColumnArray = [];
        $ColumnContractor = [];
        foreach ($contractor as $contractorColumn) {

            $contractorColumn['country_name'] = $contractorColumn['country']['0']['country_name'];
            $contractorColumn['db_area_code'] = $contractorColumn['dbarea']['db_area_code'];
            $contractorColumn['server_name'] = $contractorColumn['dbarea']['d_base']['server_db']['server_name'];
            $contractorColumnArray[] = $contractorColumn;

            //select columns to array Albert Topalu 08.11.18
            $ColumnContractor[] = [
                'id' => $contractorColumn['id'],
                'actual_l' => $contractorColumn['actual_l'],
                'code_reason_number' => $contractorColumn['code_reason_number'],
                'contractor_full_name' => $contractorColumn['contractor_full_name'],
                'contractor_short_name' => $contractorColumn['contractor_short_name'],
                'country_id' => $contractorColumn['country_id'],
                'country_name' => $contractorColumn['country_name'],
                'db_area_code' => $contractorColumn['db_area_code'],
                'db_area_id' => $contractorColumn['db_area_id'],
                'server_name' => $contractorColumn['server_name'],
                'entrepreneur_certificate' => $contractorColumn['entrepreneur_certificate'],
                'entrepreneur_certificate_date' => $contractorColumn['entrepreneur_certificate_date'],
                'individual_l' => $contractorColumn['individual_l'],
                'register_number' => $contractorColumn['register_number'],
                'social_security_number' => $contractorColumn['social_security_number'],
                'taxpayer_number' => $contractorColumn['taxpayer_number'],
                'created_at' => $contractorColumn['created_at'],
                'updated_at' => $contractorColumn['updated_at'],
                'created_by' => $contractorColumn['created_by'],
                'updated_by' => $contractorColumn['updated_by'],
            ];
        }

        //END Add key=>value to collections  contractorColumn Albert Topalu 08.10.2018 17:444

        $countires = Country::select('id', 'country_name')->get()->toarray();

//        dd($ColumnContractorInfo);

        /*Albert Topalu 08.10.2018 11:56
        END Add key=>value to collections $info */
        $dbarea = DbArea::with('dBase', 'dBase.serverDb')->get();


        foreach ($methods as $key => $value) {
            if (isset($value) and ($value == "read")) {
                $card = [

                    "main_data_models" => [
                        "Contractor" => $ColumnContractor
                    ],

                    "add_data_models" => [
                        "DBAreas" => $dbarea,
                        "Countries" => $countires,
                    ],

                    "form_parameters" => [
                        "form_title" => $getArrayCaptions['Contractor']['translation_captions']['caption_translation'],
                        "form_code" => "contractors",
                        "form_is_dependent" => false, // {if true -> show field} {if false hidden field)
                        "form_type" => "card",
                        "form_base_data_model" => "Contractors",
                        "form_main_data_model_id_field" => "id",
                        "form_main_data_model_name" => $ColumnContractor[0]['contractor_short_name'],
                        "form_type_list" => [
                            "form_card_url" => "/contractors_new/",
                            "form_search_field" => "contractor_full_name",
                        ],
                    ],

//            "dependent" => [
//                "dependent_data_model" => "",
//                "dependent_fields" => [
//                    "title" => "Контрагент",
//                    "model" => "",
//                    "type"  => "select",
//                    "options_data" => [
//                        "options_data_model"      => "Contractors",
//                        "options_field_id"        => "id",
//                        "options_field_id_value"  => "",
//                        "options_field_title"     => "contractor_short_name"
//                    ]
//                ]
//            ],

                    "actions" => [
                        "actions_card" => [
//                           ["title" => $getArrayCaptions['ok']['translation_captions']['caption_translation'], "code" => "save", "class" => "btn btn-green", "link" => "/admin/contractor", "img" => ""],
//                            ["title" => $getArrayCaptions['apply']['translation_captions']['caption_translation'], "code" => "apply", "class" => "btn btn-green", "link" => "/admin/contractor", "img" => ""],
                            ["title" => $getArrayCaptions['back']['translation_captions']['caption_translation'], "code" => "back", "class" => "btn btn-grey", "link" => "", "img" => ""],
                        ]
                    ],

                    "links" => [
                        ["link_title" => "Contact Info",
                            "link_img" => "",
                            "link_type" => "internal",
                            "link_url" => "/contactInfo"
                        ]
                    ],

                    "tabs" => [
                        [
                            "tab_title" => $getArrayCaptions['Contractor']['translation_captions']['caption_translation'],
                            "blocks_quantity" => 1,
//                            "blocks" => [
//                                [
//                                    "block_title" => "Block1",
//                                    "block_zone_quantity" => 1,
//                                    "block_model" => "Contractor",
//                                    "block_type" => "block_card",
//                                    "block_fields" => [
//
//
////                                        ['title' => $this->texts->where('caption_name', "accContractorFullName")->first()->caption_translation, 'model' => 'contractor_full_name', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "1"],
//                                        ['title' => $getArrayCaptions['ContractorShortName']['translation_captions']['caption_translation'], 'model' => 'contractor_full_name', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "1"],
//
//                                        [
////                                            'title' => $this->texts->where('caption_name', "CountryRegCountry")->first()->caption_translation,
//                                            'title' => $getArrayCaptions['CountryRegCountry']['translation_captions']['caption_translation'],
//                                            'model' => 'country_name',
////                                        'type' => 'lt-select',
//                                            'type' => 'label',
//                                            'width' => '50%',
//                                            'options' => [],
//                                            "options_data" => [
//                                                "options_data_model" => "Countries",
//                                                "options_field_id" => "id",
//                                                "options_field_title" => "country_name",
////                                                "search" =>""
//                                            ],
//                                            "zone" => "1",
//                                            "order" => "2"
//                                        ],
//                                        [
////                                            'title' => $this->texts->where('caption_name', "AreaDB")->first()->caption_translation,
//                                            'title' => $getArrayCaptions['AreaDB']['translation_captions']['caption_translation'],
//                                            'model' => 'db_area_code',
////                                        'type' => 'lt-select',
//                                            'type' => 'label',
//                                            'options' => [],
//                                            "options_data" => [
//                                                "options_data_model" => "DBAreas",
//                                                "options_field_id" => "id",
//                                                "options_field_title" => "db_area_code",
//                                                'search' => ''
//                                            ],
//                                            "zone" => "1",
//                                            'width' => '50%',
//                                            "order" => "3"
//                                        ],
////                                        ['title' => $this->texts->where('caption_name', "accContractorShortName")->first()->caption_translation, 'model' => 'contractor_short_name', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "4"],
//                                        ['title' => $getArrayCaptions['ContractorShortName']['translation_captions']['caption_translation'], 'model' => 'contractor_short_name', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "4"],
////                                        ['title' => $this->texts->where('caption_name', "individual")->first()->caption_translation, 'model' => 'individual_l', 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "5"],
//                                        ['title' => $getArrayCaptions['Individual']['translation_captions']['caption_translation'], 'model' => 'individual_l', 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "5"],
////                                        ['title' => $this->texts->where('caption_name', "DB")->first()->caption_translation, 'model' => 'db_name', 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "6"],
//                                        ['title' => $getArrayCaptions['DB']['translation_captions']['caption_translation'], 'model' => 'db_name', 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "6"],
////                                        ['title' => $this->texts->where('caption_name', "registryNumber")->first()->caption_translation, 'model' => 'register_number', 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "7"],
//                                        ['title' => $getArrayCaptions['RegistryNumber']['translation_captions']['caption_translation'], 'model' => 'register_number', 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "7"],
////                                        ['title' => $this->texts->where('caption_name', "taxpayer_number")->first()->caption_translation, 'model' => 'taxpayer_number', 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "8"],
//                                        ['title' => $getArrayCaptions['TaxpayerNumber']['translation_captions']['caption_translation'], 'model' => 'taxpayer_number', 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "8"],
//
//                                    ]
//                                ],
//
//
//                                [
//                                    "block_title" => "Block2",
//                                    "block_zone_quantity" => 1,
//                                    "block_model" => "Contractor",
//                                    "block_type" => "block_card",
//                                    "block_fields" => [
//
//                                           // commit Albert Topalu 1.11.18 17:11
////                                        ['title' => $this->texts->where('caption_name', "entrepreneur_certificate")->first()->caption_translation, 'width' => '50%', 'model' => 'entrepreneur_certificate', 'type' => 'label', "zone" => "1", "order" => "1"],
////                                        ['title' => $this->texts->where('caption_name', "entrepreneur_certificate")->first()->caption_translation, 'width' => '50%', 'model' => 'entrepreneur_certificate', 'type' => 'label', "zone" => "1", "order" => "1"],
////                                        ['title' => $this->texts->where('caption_name', "ServerDB")->first()->caption_translation, 'width' => '50%', 'model' => 'server_name', 'type' => 'label', "zone" => "1", "order" => "2"],
////                                        ['title' => $this->texts->where('caption_name', "code_reason_number")->first()->caption_translation, 'width' => '50%', 'model' => 'code_reason_number', 'type' => 'label', "zone" => "1", "order" => "3"],
////                                        ['title' => $this->texts->where('caption_name', "entrepreneur_certificate_date")->first()->caption_translation, 'width' => '50%', 'model' => 'entrepreneur_certificate_date', 'type' => 'label', "zone" => "1", "order" => "4"],
////                                        ['title' => $this->texts->where('caption_name', "social_security_number")->first()->caption_translation, 'width' => '50%', 'model' => 'social_security_number', 'type' => 'label', "zone" => "1", "order" => "5"],
////                                        ['title' => $this->texts->where('caption_name', "Actual")->first()->caption_translation, 'width' => '50%', 'model' => 'actual_l', 'type' => 'label', "zone" => "1", "order" => "6"],
//                                          //END commit Albert Topalu 1.11.18 17:11
//
//                                        //Add commit Albert Topalu 1.11.18 17:11
//                                        ['title' => $getArrayCaptions['EntrepreneurCertificate']['translation_captions']['caption_translation'], 'width' => '50%', 'model' => 'entrepreneur_certificate', 'type' => 'label', "zone" => "1", "order" => "1"],
//                                        ['title' => $getArrayCaptions['ServerDB']['translation_captions']['caption_translation'], 'width' => '50%', 'model' => 'server_name', 'type' => 'label', "zone" => "1", "order" => "2"],
//                                        ['title' => $getArrayCaptions['CodeReasonNumber']['translation_captions']['caption_translation'], 'width' => '50%', 'model' => 'code_reason_number', 'type' => 'label', "zone" => "1", "order" => "3"],
//                                        ['title' => $getArrayCaptions['EntrepreneurCertificateDate']['translation_captions']['caption_translation'], 'width' => '50%', 'model' => 'entrepreneur_certificate_date', 'type' => 'label', "zone" => "1", "order" => "4"],
//                                        ['title' => $getArrayCaptions['SocialSecurityNumber']['translation_captions']['caption_translation'], 'width' => '50%', 'model' => 'social_security_number', 'type' => 'label', "zone" => "1", "order" => "5"],
//                                        ['title' => $getArrayCaptions['Actual']['translation_captions']['caption_translation'], 'width' => '50%', 'model' => 'actual_l', 'type' => 'label', "zone" => "1", "order" => "6"],
//                                        //END Add commit Albert Topalu 1.11.18 17:11
//
//                                    ]
//                                ]
//                            ]
                            "blocks" => [
                                [
                                    "block_title" => "Block1",
                                    "block_zone_quantity" => 2,
                                    "block_model" => "Contractor",
                                    "block_type" => "block_card",
                                    "block_fields" => [


//                                        ['title' => $this->texts->where('caption_name', "accContractorFullName")->first()->caption_translation, 'model' => 'contractor_full_name', 'type' => 'text', 'width' => '100%', "zone" => "1", "order" => "1"],
//                                        ['title' => $getArrayCaptions['ContractorShortName']['translation_captions']['caption_translation'] , 'model' => 'contractor_full_name', 'type' => 'text', 'width' => '100%', "zone" => "1", "order" => "1"],

                                        ['title' => $getArrayCaptions['ContractorFullName']['translation_captions']['caption_translation'], 'model' => 'contractor_full_name', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "1"],
                                        ['title' => $getArrayCaptions['ContractorShortName']['translation_captions']['caption_translation'], 'model' => 'contractor_short_name', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "1"],
                                        ['title' => $getArrayCaptions['RegistryNumber']['translation_captions']['caption_translation'], 'model' => 'register_number', 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "4"],
                                        ['title' => $getArrayCaptions['TaxpayerNumber']['translation_captions']['caption_translation'], 'model' => 'taxpayer_number', 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "5"],
                                        ['title' => $getArrayCaptions['CodeReasonNumber']['translation_captions']['caption_translation'], 'model' => 'code_reason_number', 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "6"],
                                        ['title' => $getArrayCaptions['SocialSecurityNumber']['translation_captions']['caption_translation'], 'model' => 'social_security_number', 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "4"],

                                        [
//                                            'title' => $this->texts->where('caption_name', "CountryRegCountry")->first()->caption_translation,
                                            'title' => $getArrayCaptions['CountryRegCountry']['translation_captions']['caption_translation'],
                                            'model' => 'country_name',
                                            'type' => 'label',
                                            'width' => '50%',
                                            'options' => [],
                                            "options_data" => [
                                                "options_data_model" => "Countries",
                                                "options_field_id" => "id",
                                                "options_field_title" => "country_name",
//                                                "search" =>""
                                            ],
                                            "zone" => "2",
                                            "order" => "1"
                                        ],
                                        [
//                                            'title' => $this->texts->where('caption_name', "AreaDB")->first()->caption_translation,
                                            'title' => $getArrayCaptions['AreaDB']['translation_captions']['caption_translation'],
                                            'model' => 'db_area_code',
                                            'type' => 'label',
                                            'options' => [],
                                            "options_data" => [
                                                "options_data_model" => "DBAreas",
                                                "options_field_id" => "id",
                                                "options_field_title" => "db_area_code",
                                                'search' => ''
                                            ],
                                            "zone" => "2",
                                            'width' => '50%',
                                            "order" => "1"
                                        ],

                                        ['title' => $getArrayCaptions['Individual']['translation_captions']['caption_translation'],
                                            'model' => 'individual_l',
                                            'type' => 'checkbox',
                                            'disabled' => true,
                                            'width' => '50%',
                                            "zone" => "2",
                                            "order" => "2"
                                        ],
                                        ['title' => $getArrayCaptions['Database']['translation_captions']['caption_translation'], 'model' => 'db_name',
                                            'type' => 'label', 'width' => '50%', "zone" => "2", "order" => "2"],
                                        ['title' => $getArrayCaptions['EntrepreneurCertificate']['translation_captions']['caption_translation'],
                                            'width' => '50%', 'model' => 'entrepreneur_certificate', 'type' => 'label', "zone" => "2", "order" => "3"],
                                        ['title' => $getArrayCaptions['ServerDB']['translation_captions']['caption_translation'], 'width' => '50%',
                                            'model' => 'server_name', 'type' => 'label', "zone" => "2", "order" => "3"],
                                        ['title' => $getArrayCaptions['EntrepreneurCertificateDate']['translation_captions']['caption_translation'],
                                            'width' => '50%', 'model' => 'entrepreneur_certificate_date', 'type' => 'label', "zone" => "2", "order" => "4"],
                                        ['title' => $getArrayCaptions['Actual']['translation_captions']['caption_translation'], 'width' => '50%',
                                            'model' => 'actual_l',
                                            'type' => 'checkbox',
                                            'disabled' => true,
                                            "zone" => "2",
                                            "order" => "4"
                                        ],

                                    ]
                                ]
                            ]
                        ],

                        [
                            "tab_title" => $getArrayCaptions['CreationDetails']['translation_captions']['caption_translation'],
                            "blocks_quantity" => 1,
                            "blocks" => [
                                [
                                    "block_title" => "Block1",
                                    "block_zone_quantity" => 2,
                                    "block_model" => "Contractor",
                                    "block_type" => "block_card",
                                    "block_fields" => [

                                        ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'], 'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "1"],
                                        ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'], 'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "2"],
                                        ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'], 'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "1"],
                                        ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'], 'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "2"],


                                    ]
                                ]
                            ]
                        ]
                    ]
                ];
            }

            if (isset($value) and (($value == "update"))) {
                $card = [

                    "main_data_models" => [
                        "Contractor" => $ColumnContractor
                    ],

                    "add_data_models" => [
                        "DBAreas" => $dbarea,
                        "Countries" => $countires,
                    ],

                    "form_parameters" => [
                        "form_title" => $getArrayCaptions['Contractor']['translation_captions']['caption_translation'],
                        "form_code" => "contractors",
                        "form_is_dependent" => false, // {if true -> show field} {if false hidden field)
                        "form_type" => "card",
                        "form_base_data_model" => "Contractors",
                        "form_main_data_model_id_field" => "id",
                        "form_main_data_model_name" => $ColumnContractor[0]['contractor_short_name'],
                        "form_type_list" => [
                            "form_card_url" => "/contractors_new/",
                            "form_search_field" => "contractor_full_name",
                        ],
                    ],

//            "dependent" => [
//                "dependent_data_model" => "",
//                "dependent_fields" => [
//                    "title" => "Контрагент",
//                    "model" => "",
//                    "type"  => "select",
//                    "options_data" => [
//                        "options_data_model"      => "Contractors",
//                        "options_field_id"        => "id",
//                        "options_field_id_value"  => "",
//                        "options_field_title"     => "contractor_short_name"
//                    ]
//                ]
//            ],

                    "actions" => [
                        "actions_card" => [
                            //commit Albert Topalu
//                            ["title" => $this->texts->where('caption_name', "ok")->first()->caption_translation, "code" => "save", "class" => "btn btn-green", "link" => "/admin/contractor", "img" => ""],
//                            ["title" => $this->texts->where('caption_name', "apply")->first()->caption_translation, "code" => "apply", "class" => "btn btn-green", "link" => "/admin/contractor", "img" => ""],
//                            ["title" => $this->texts->where('caption_name', "back")->first()->caption_translation, "code" => "back", "class" => "btn btn-grey", "link" => "", "img" => ""],
                            //Insert Albert Topalu
                            ["title" => $getArrayCaptions['ok']['translation_captions']['caption_translation'], "code" => "save", "class" => "btn btn-green", "link" => "/admin/contractor", "img" => ""],
                            ["title" => $getArrayCaptions['apply']['translation_captions']['caption_translation'], "code" => "apply", "class" => "btn btn-green", "link" => "/admin/contractor", "img" => ""],
                            ["title" => $getArrayCaptions['back']['translation_captions']['caption_translation'], "code" => "back", "class" => "btn btn-grey", "link" => "", "img" => ""],
                        ]
                    ],

                    "links" => [
                        ["link_title" => "Contact Info",
                            "link_img" => "",
                            "link_type" => "internal",
                            "link_url" => "/contactInfo"
                        ]
                    ],

                    "tabs" => [
                        [
                            "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                            "blocks_quantity" => 1,
                            "blocks" => [
                                [
                                    "block_title" => $getArrayCaptions['Contractor']['translation_captions']['caption_translation'],
                                    "block_zone_quantity" => 2,
                                    "block_zones_separator" => true,
                                    "block_model" => "Contractor",
                                    "block_type" => "block_card",
                                    "block_fields" => [


//                                        ['title' => $this->texts->where('caption_name', "accContractorFullName")->first()->caption_translation, 'model' => 'contractor_full_name', 'type' => 'text', 'width' => '100%', "zone" => "1", "order" => "1"],
//                                        ['title' => $getArrayCaptions['ContractorShortName']['translation_captions']['caption_translation'] , 'model' => 'contractor_full_name', 'type' => 'text', 'width' => '100%', "zone" => "1", "order" => "1"],
                                        ['title' => "Test Title", 'model' => '', 'type' => 'title', 'width' => '50%', "zone" => "1", "order" => "1", "border_right" => true],//todo это тестовый вариант, надо будет убрать
                                        ['title' => "Test Title2", 'model' => '', 'type' => 'title', 'width' => '50%', "zone" => "1", "order" => "1", "border_right" => false],//todo это тестовый вариант, надо будет убрать
                                        ['title' => $getArrayCaptions['ContractorFullName']['translation_captions']['caption_translation'], 'model' => 'contractor_full_name', 'type' => 'text', 'width' => '100%', "zone" => "1", "order" => "1", "border_right" => false, "validation" => ["required" => true, "min" => 4], "tip" => 'tip#1'],

                                        ['title' => $getArrayCaptions['ContractorShortName']['translation_captions']['caption_translation'], 'model' => 'contractor_short_name', 'type' => 'text', 'width' => '100%', "zone" => "1", "order" => "1", "border_right" => false, "tip" => 'tip#2'],
                                        ['title' => $getArrayCaptions['RegistryNumber']['translation_captions']['caption_translation'], 'model' => 'register_number', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "4", "border_right" => true],
                                        ['title' => $getArrayCaptions['TaxpayerNumber']['translation_captions']['caption_translation'], 'model' => 'taxpayer_number', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "5", "border_right" => false],
                                        ['title' => $getArrayCaptions['CodeReasonNumber']['translation_captions']['caption_translation'], 'model' => 'code_reason_number', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "6", "border_right" => true],
                                        ['title' => $getArrayCaptions['SocialSecurityNumber']['translation_captions']['caption_translation'], 'model' => 'social_security_number', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "4", "border_right" => false],

                                        ['title' => "Test Title4", 'model' => '', 'type' => 'title', 'width' => '50%', "zone" => "2", "order" => "1", "border_right" => true], //todo это тестовый вариант, надо будет убрать
                                        ['title' => "Test Title4", 'model' => '', 'type' => 'title', 'width' => '50%', "zone" => "2", "order" => "1", "border_right" => true], //todo это тестовый вариант, надо будет убрать

                                        [
//                                            'title' => $this->texts->where('caption_name', "CountryRegCountry")->first()->caption_translation,
                                            'title' => $getArrayCaptions['CountryRegCountry']['translation_captions']['caption_translation'],
                                            'model' => 'country_id',
                                            'type' => 'lt-select',
                                            'width' => '50%',
                                            'options' => [],
                                            "options_data" => [
                                                "options_data_model" => "Countries",
                                                "options_field_id" => "id",
                                                "options_field_title" => "country_name",
                                                "search" => ""
                                            ],
                                            "zone" => "2",
                                            "order" => "1",
                                            "border_right" => true

                                        ],
                                        [
//                                            'title' => $this->texts->where('caption_name', "AreaDB")->first()->caption_translation,
                                            'title' => $getArrayCaptions['AreaDB']['translation_captions']['caption_translation'],
                                            'model' => 'db_area_id',
                                            'type' => 'lt-select',
                                            'options' => [],
                                            "options_data" => [
                                                "options_data_model" => "DBAreas",
                                                "options_field_id" => "id",
                                                "options_field_title" => "db_area_code",
                                                "search" => ""
                                            ],
                                            "zone" => "2",
                                            'width' => '50%',
                                            "order" => "1",
                                            "border_right" => false
                                        ],

                                        ['title' => $getArrayCaptions['Individual']['translation_captions']['caption_translation'], 'model' => 'individual_l',
                                            'type' => 'checkbox', 'width' => '50%', "zone" => "2", "order" => "2", "border_right" => true],
                                        ['title' => $getArrayCaptions['Database']['translation_captions']['caption_translation'], 'model' => 'db_name',
                                            'type' => 'label', 'width' => '50%', "zone" => "2", "order" => "2", "border_right" => false],
                                        ['title' => $getArrayCaptions['EntrepreneurCertificate']['translation_captions']['caption_translation'],
                                            'width' => '50%', 'model' => 'entrepreneur_certificate', 'type' => 'text', "zone" => "2", "order" => "3", "border_right" => true],
                                        ['title' => $getArrayCaptions['ServerDB']['translation_captions']['caption_translation'], 'width' => '50%',
                                            'model' => 'server_name', 'type' => 'label', "zone" => "2", "order" => "3", "border_right" => false],
                                        ['title' => $getArrayCaptions['EntrepreneurCertificateDate']['translation_captions']['caption_translation'],
                                            'width' => '50%', 'model' => 'entrepreneur_certificate_date', 'type' => 'date', "zone" => "2", "order" => "4", "border_right" => true],
                                        ['title' => $getArrayCaptions['Actual']['translation_captions']['caption_translation'], 'width' => '50%',
                                            'model' => 'actual_l', 'type' => 'checkbox', "zone" => "2", "order" => "4", "border_right" => false],


                                        //commit Topalu Albert
//                                        ['title' => $this->texts->where('caption_name', "accContractorShortName")->first()->caption_translation, 'model' => 'contractor_short_name', 'type' => 'text', 'width' => '100%', "zone" => "1", "order" => "4"],
//                                        ['title' => $this->texts->where('caption_name', "individual")->first()->caption_translation, 'model' => 'individual_l', 'type' => 'checkbox', 'width' => '50%', "zone" => "1", "order" => "5"],
//                                        ['title' => $this->texts->where('caption_name', "DB")->first()->caption_translation, 'model' => 'db_name', 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "6"],
//                                        ['title' => $this->texts->where('caption_name', "registryNumber")->first()->caption_translation, 'model' => 'register_number', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "7"],
//                                        ['title' => $this->texts->where('caption_name', "taxpayer_number")->first()->caption_translation, 'model' => 'taxpayer_number', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "8"],
                                        //Insert Albert Topalu
//                                        ['title' => $getArrayCaptions['ContractorShortName']['translation_captions']['caption_translation'], 'model' => 'contractor_short_name', 'type' => 'text', 'width' => '100%', "zone" => "1", "order" => "4"],
//                                        ['title' => $getArrayCaptions['Individual']['translation_captions']['caption_translation'], 'model' => 'individual_l', 'type' => 'checkbox', 'width' => '50%', "zone" => "1", "order" => "5"],
//                                        ['title' => $getArrayCaptions['DB']['translation_captions']['caption_translation'], 'model' => 'db_name', 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "6"],
//                                        ['title' => $getArrayCaptions['Actual']['translation_captions']['caption_translation'], 'width' => '50%', 'model' => 'actual_l', 'type' => 'checkbox', "zone" => "1", "order" => "5"],
//                                        ['title' => $getArrayCaptions['RegistryNumber']['translation_captions']['caption_translation'], 'model' => 'register_number', 'type' => 'text', 'width' => '50%', "zone" => "2", "order" => "7"],
//                                        ['title' => $getArrayCaptions['TaxpayerNumber']['translation_captions']['caption_translation'], 'model' => 'taxpayer_number', 'type' => 'text', 'width' => '50%', "zone" => "2", "order" => "8"],


                                    ]
                                ],


//                                [
//                                    "block_title" => "Block2",
//                                    "block_zone_quantity" => 1,
//                                    "block_model" => "Contractor",
//                                    "block_type" => "block_card",
//                                    "block_fields" => [
//
//                                          //commit Albert Topalu
////                                        ['title' => $this->texts->where('caption_name', "entrepreneur_certificate")->first()->caption_translation, 'width' => '50%', 'model' => 'entrepreneur_certificate', 'type' => 'text', "zone" => "1", "order" => "1"],
////                                        ['title' => $this->texts->where('caption_name', "ServerDB")->first()->caption_translation, 'width' => '50%', 'model' => 'server_name', 'type' => 'label', "zone" => "1", "order" => "2"],
////                                        ['title' => $this->texts->where('caption_name', "code_reason_number")->first()->caption_translation, 'width' => '50%', 'model' => 'code_reason_number', 'type' => 'text', "zone" => "1", "order" => "3"],
////                                        ['title' => $this->texts->where('caption_name', "entrepreneur_certificate_date")->first()->caption_translation, 'width' => '50%', 'model' => 'entrepreneur_certificate_date', 'type' => 'date', "zone" => "1", "order" => "4"],
////                                        ['title' => $this->texts->where('caption_name', "social_security_number")->first()->caption_translation, 'width' => '50%', 'model' => 'social_security_number', 'type' => 'text', "zone" => "1", "order" => "5"],
////                                        ['title' => $this->texts->where('caption_name', "Actual")->first()->caption_translation, 'width' => '50%', 'model' => 'actual_l', 'type' => 'checkbox', "zone" => "1", "order" => "6"],
//
//                                        //Insert Albert Topalu
//                                        ['title' => $getArrayCaptions['EntrepreneurCertificate']['translation_captions']['caption_translation'], 'width' => '50%', 'model' => 'entrepreneur_certificate', 'type' => 'text', "zone" => "1", "order" => "1"],
//                                        ['title' => $getArrayCaptions['ServerDB']['translation_captions']['caption_translation'], 'width' => '50%', 'model' => 'server_name', 'type' => 'label', "zone" => "1", "order" => "2"],
//                                        ['title' => $getArrayCaptions['CodeReasonNumber']['translation_captions']['caption_translation'], 'width' => '50%', 'model' => 'code_reason_number', 'type' => 'text', "zone" => "1", "order" => "3"],
//                                        ['title' => $getArrayCaptions['EntrepreneurCertificateDate']['translation_captions']['caption_translation'], 'width' => '50%', 'model' => 'entrepreneur_certificate_date', 'type' => 'date', "zone" => "1", "order" => "4"],
//                                        ['title' => $getArrayCaptions['SocialSecurityNumber']['translation_captions']['caption_translation'], 'width' => '50%', 'model' => 'social_security_number', 'type' => 'text', "zone" => "1", "order" => "5"],
//                                        ['title' => $getArrayCaptions['Actual']['translation_captions']['caption_translation'], 'width' => '50%', 'model' => 'actual_l', 'type' => 'checkbox', "zone" => "1", "order" => "6"],
//
//                                    ]
//                                ]
                            ]
                        ],

                        [
                            "tab_title" => $getArrayCaptions['CreationDetails']['translation_captions']['caption_translation'],
                            "blocks_quantity" => 1,
                            "blocks" => [
                                [
                                    "block_title" => "Block1",
                                    "block_zone_quantity" => 2,
                                    "block_model" => "Contractor",
                                    "block_type" => "block_card",
                                    "block_fields" => [

                                        ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'], 'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "1"],
                                        ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'], 'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "2"],
                                        ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'], 'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "1"],
                                        ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'], 'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "2"],


                                    ]
                                ]
                            ]
                        ]
                    ]
                ];
            }
        }
        return response()->json($card);
    }

    //END Albert Topalu 17.10.18

    public function update(Request $request)
    {
        if (config('app.VueBlade')) {

            $model = $request->Contractor[0];
//            dd( $model);
            return Contractor::where('id', $model['id'])->update(
                ['country_id' => $model['country_id'],
                    'db_area_id' => $model['db_area_id'],
//                    'uid_1c_code' => $model['uid_1c_code'],
                    'individual_l' => $model['individual_l'],
//                    'identity_document' => $model['identity_document'],
                    'contractor_full_name' => $model['contractor_full_name'],
                    'contractor_short_name' => $model['contractor_short_name'],
                    'taxpayer_number' => $model['taxpayer_number'],
                    'code_reason_number' => $model['code_reason_number'],
                    'social_security_number' => $model['social_security_number'],
                    'register_number' => $model['register_number'],
                    'entrepreneur_certificate' => $model['entrepreneur_certificate'],
                    'entrepreneur_certificate_date' => $model['entrepreneur_certificate_date'],
                    'actual_l' => $model['actual_l'],
                    'updated_by' => (new ConsumerParameters())->consumerCode(),
                ]
            );
        } else {
            Contractor::where('id', $request->accContractorId)->update([
                'country_id' => $request->accCountry,
                'db_area_id' => $request->accDBArea,
                'uid_1c_code' => $request->accCompUid1cCode,
                'individual_l' => $request->accindividual_l,
                'identity_document' => $request->accIdentity_document,
                'contractor_full_name' => $request->accContractor_fullname,
                'contractor_short_name' => $request->accContractor_short_name,
                'taxpayer_number' => $request->accTaxpayer_number,
                'code_reason_number' => $request->accCode_reason_number,
                'social_security_number' => $request->accSocial_security_number,
                'register_number' => $request->accRegistry_number,
                'entrepreneur_certificate' => $request->accEntrepreneur_certificate,
                'entrepreneur_certificate_date' => $request->accEntrepreneur_certificate_date,
                'updated_by' => (new ConsumerParameters())->consumerCode()
            ]);
            return back()->with('alert', trans('messages.saved'));
        }
    }

    public function transactionsTest()
    {

//        DB::transaction(function(){
//            TestCron::where('account','account_1')->decrement('amount',100);
//
//            TestCron::where('account','account_')->increment('amount',100);
//        }, 5);


        DB::transaction(function () {

            $numer = TestCron::all()->toArray();

            if ($numer[0]['amount'] >= 100) {

                TestCron::where('account', 'account_1')
                    ->decrement('amount', 100);

                TestCron::where('account', 'account_2')
                    ->increment('amount', 100);
            }

        }, 5);
    }
}
