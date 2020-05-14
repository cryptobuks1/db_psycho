<?php

namespace App\Http\Controllers\Api\AttachedFiles;

use App\Http\Classes\ConsumerParameters;
use App\Mail\ConsumerRegistered;
use App\Models\FileType;
use App\Models\RequiredDocumentKind;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Lang;
use App\Models\AttachedDocumentFile;
use App\Models\AttachedDocument;
use App\Models\AttachedDocumentFileTitle;
use App\Models\AttachedDocumentKind;
use App\Models\AttachedDocumentType;


class AttachedFilesController extends Controller
{
    public function list(Request $request)
    {
        $currrentLang = Lang::locale();
        $methods = $request->accessMethods;
//        $typeFile = new SplFileInfo($request->file);
//        $typeFile = $typeFile->getExtension();

        //Для проверки обязательного документа
//        $required = AttachedDocument::with('attachDocumentKind.requiredDocumentKind')->first()
//            ->attachDocumentKind->requiredDocumentKind->row_id;//row_id
//        $required = AttachedDocument::where('row_id', $required)->value('id');

        $document = AttachedDocument::with('attachDocumentFile.typeFile', 'attachDocumentFile', 'attachDocumentKind', 'attachDocumentType',
            'attachDocumentKind.attachDocumentType', 'attachDocumentKind.requiredDocumentKind')
            ->get()->toArray();
//         $reqDoc = RequiredDocumentKind::with('attachedDocumentKind', 'attachedDocumentKind.attachDocument')
//             ->get()->toArray();
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
            } else {
                $required_l = 0;
                $d = array_merge($d, array("required_l" => 0));
            }
            $documentArray[] = $d;
        }
//        dd($documentArray);
//       конец проверки на обязательность

        $captionName = [
            'Documents', 'Main', 'Actual', 'CreatedAt', 'Type', 'DocumentsKinds',
            'AttachedDocuments', 'NameAttachedDocument', 'Status', 'Format',
            'Size', 'Name', 'Document', 'ListActions'

        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);
        $list = [
            "main_data_models" => [
                "Documents" => $documentArray,
            ],
            "form_parameters" => [
                "form_title" => $getArrayCaptions['AttachedDocuments']['translation_captions']['caption_translation'],
                "form_code" => "documents",
                "form_is_dependent" => true, // {if true -> show field} {if false hidden field)
                "form_type" => "list",
                "form_base_data_model" => "Documents",
                "form_main_data_model_id_field" => "id",
                "form_type_list" => [
                    "form_card_url" => "/documents_new/",
                    "form_search_field" => "documents_full_name",
                ],
            ],

            "dependent" => [
                "dependent_data_model" => "",
                "dependent_fields" => [
//                    "title" =>  $getArrayCaptions['Document']['translation_captions']['caption_translation'],
                    "model" => "",
                    "type" => "select",
                    "options_data" => [
                        "options_data_model" => "Documents",
                        "options_field_id" => "id",
                        "options_field_id_value" => "",
                        "options_field_title" => "att_doc_name"
                    ],
                    "width" => "100%"
                ]
            ],
            "tabs" => [
                [
                    "tab_title" => $getArrayCaptions['Document']['translation_captions']['caption_translation'],
                    "blocks_quantity" => 1,
                    "blocks" => [
                        [
                            "block_title" => $getArrayCaptions['Document']['translation_captions']['caption_translation'],
                            "block_zone_quantity" => 1,
                            "block_model" => "Documents",
                            "block_type" => "block_list_base",
                            "block_fields" => [
                                ['key' => 'actions', 'sortable' => false, 'class' => 'list_checkbox', 'thStyle' => 'width: 6%', "zone" => "1", "order" => "1"],
                                ['key' => 'att_doc_name', 'sortable' => true, 'class' => 'att_doc_name',
                                    "label" => $getArrayCaptions['Document']['translation_captions']['caption_translation'], 'thStyle' => 'width: 14%', "zone" => "1", "order" => "2"],
                                ['key' => "['attach_document_kind']['att_doc_kind_name']", 'sortable' => true, 'class' => "['attach_document_kind']['att_doc_kind_name']",
                                    "label" => $getArrayCaptions['DocumentsKinds']['translation_captions']['caption_translation'], 'thStyle' => 'width: 16%', "zone" => "1", "order" => "3"],
                                ['key' => 'actual_l', 'sortable' => true, 'class' => 'actual_l',
                                    "label" => $getArrayCaptions['Actual']['translation_captions']['caption_translation'], 'thStyle' => 'width: 9%', "zone" => "1", "order" => "4"],
                                ['key' => "att_doc_file_status", 'sortable' => true, 'class' => 'status',
                                    "label" => $getArrayCaptions['Status']['translation_captions']['caption_translation'], 'thStyle' => 'width: 10%', "zone" => "1", "order" => "5"],
                                ['key' => "att_doc_file_name", 'sortable' => true, 'class' => "['attach_document_file'][0]['att_doc_file_name']",
                                    "label" => $getArrayCaptions['Name']['translation_captions']['caption_translation'], 'thStyle' => 'width: 15%', "zone" => "1", "order" => "6"],
                                ['key' => "attach_document_file", 'sortable' => true, 'class' => "['attach_document_file'][0]['type_file']",
                                    "label" => $getArrayCaptions['Format']['translation_captions']['caption_translation'], 'thStyle' => 'width: 10%', "zone" => "1", "order" => "7"],
                                ['key' => "att_doc_file_size", 'sortable' => true, 'class' => "['attach_document_file'][0]['att_doc_file_size']",
                                    "label" => $getArrayCaptions['Size']['translation_captions']['caption_translation'], 'thStyle' => 'width: 10%', "zone" => "1", "order" => "8"],
                                ['key' => 'list_actions', 'sortable' => false, 'class' => 'list_actions-box',
                                    "label" => $getArrayCaptions['ListActions']['translation_captions']['caption_translation'], 'thStyle' => 'width: 10%', "zone" => "1", "order" => "9"]
                            ]
                        ]
                    ]
                ]
            ]
        ];
        return response()->json($list);
    }


    public function card(Request $request)
    {
        $currrentLang = Lang::locale();

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
            ->where('id', 1)
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
            } else {
                $required_l = 0;
                $d = array_merge($d, array("required_l" => 0));
            }
            $documentArray[] = $d;
        }

        $file = AttachedDocumentFile::with('attachDocument', 'attachDocumentFileTitle',
            'attachDocument.attachDocumentKind', 'attachDocument.attachDocumentType', 'typeFile')
            ->get()->toArray();

        for ($i = 0; $i < count($documentArray['0']['attach_document_file']); $i += 1) {
            $arr[] = [
                "document" => [
                    "value" => $documentArray['0']['attach_document_file'][$i]['att_doc_file'],
                    "name" => $documentArray['0']['attach_document_file'][$i]['att_doc_file_name'],
                    "input_name" => $documentArray['0']['attach_document_file'][$i]['att_doc_file_code'],
                    'type' => 'button',
                    'title' => 'Load file',
                    'action_type' => 'load_file',
                    'validation' => ['size' => 3072, 'ext' => array('jpg', 'jpeg', 'png', 'pdf')],

                ],
                'doc_size' => [
                    "value" => $documentArray['0']['attach_document_file'][$i]['att_doc_file_size'],
                ],
                'doc_ext' => [
                    "value" => $documentArray['0']['attach_document_file'][$i]['type_file']['0']['file_type_name'],
                ],
                "status" => 'existing',
                "id" => $documentArray['0']['attach_document_file'][$i]['id'],
                "_rowVariant" => "success",  // если надо залить весь ряд;  возможные значения :[ 'danger', 'success', 'info', 'warning']
//               "_cellVariants"=>['document'=>'danger', 'doc_size'=>'success', 'doc_ext'=>'info'] // заливка каждой ячейки отдельно
            ];
        }
        $kindArray = AttachedDocumentKind::with('attachDocumentType', 'requiredDocumentKind', 'attachDocument')
            ->get()->toArray();

        foreach ($kindArray as $k) {
            $row_id = $k['required_document_kind']['row_id'];
            $table_n = $k['required_document_kind']['table_n'];
            $required = array($row_id, $table_n);
            $doc_row_id = $k['attach_document']['row_id'];
            $doc_table_n = $k['attach_document']['table_n'];
            $doc_required = array($doc_row_id, $doc_table_n);
            if ($required == $doc_required) {
                $required_l = 1;
                $k = array_merge($k, array("required_l" => 1));
            } else {
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
                "id" => $k['id']
            ];
        }
        $list = [
            "main_data_models" => [
                "Documents" => $arr,
                "Requisites" => [
                    [
                        'id' => $documentArray['0']['id'],
                        'att_doc_type_name' => $documentArray['0']['attach_document_type']['att_doc_type_name'],
                        'att_doc_kind_id' => $documentArray['0']['att_doc_kind_id'],
                        'att_doc_type_id' => $documentArray['0']['att_doc_type_id'],
                        'att_doc_kind_name' => "Default value", // нужно, чтобы вывести стандартное значение для селекта
                        'actual_l' => $documentArray['0']['actual_l'],
                        'required' => $documentArray['0']['required_l'], // может быть здесь оно и не надо, так как отрабатывает вотчер и устанавливает текущее значение
                        'date' => [
                            'from' => '',
                            'to' => ''
                        ],
                        'test' => "TESTTESTTEST"
                    ]
                ],
                "Leasing_subject" => [
                    [
                        "brand" => "Toyota",
                        "model" => "Camry",
                        "year" => "2016",
                        "dealer" => "Toyota Center "
                    ]
                ],
                "Insurance" => [
                    [
                        "insurance_type" => "Franshize",
                        "franshize" => 30000
                    ]

                ],
                "Parameters" => [
                    [
                        "leasing_product" => "Standart",
                        "subsidy" => "No",
                        "value" => 2300000,
                        "advance_percentage" => 15,
                        "advance_payment" => 250000,
                        "term" => 13,
                        "start_date" => "23.01.2018"
                    ]
                ],
                "Mutual_settlements" => [
                    [
                        'first' => [
                            'from' => '',
                            'to' => ''
                        ],
                        'second' => [
                            'from' => '',
                            'to' => ''
                        ],
                        'third' => [
                            'from' => '',
                            'to' => ''
                        ],
                    ]
                ],
                "Manager" => [
                    [

                        "name" => "Ivanov Petr",
                        "phone" => 12234555666,
                        "email" => 'ivan@rosbank.ru',
                        "office" => "office address"
                    ]
                ],
                "Profile" => [
                    [
                        "organization_type" => 'ип',
                        "company_full_name" => '',
                        "company_full_name_en" => '',
                        "inn" => '',
                        "kpp" => '',
                        "ogrn" => '',
                        "rs" => '',
                        "bik" => '',
                        "okpo" => '',
                        "site" => '',
                        "company_group" => '',
                        "company_group_is" => '',
                    ]
                ],
                "EIO" => [
                    [
                        "last_name" => "",
                        "first_name" => "",
                        "middle_name" => "",
                        "phone_number" => "",
                        "email" => "",
                        "birth_date" => "",
                        "country" => "",
                        "region" => "",
                        "locality" => "",
                        "post" => "",
                        "inn" => "",
                        "citizenship" => "",
                        "passport_serie" => "",
                        "passport_number" => "",
                        "date_of_issue" => "",
                        "international_passport_issued" => "",
                        "issuing_officer" => "",
                        "international_passport_number" => "",
                        "starting_date" => "",
                        "ending_date" => "",
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
                    ["title" => $getArrayCaptions['ok']['translation_captions']['caption_translation'], "code" => "save", "class" => "btn btn-green", "link" => "/admin/attachedFile/update", "img" => ""],
                    ["title" => $getArrayCaptions['apply']['translation_captions']['caption_translation'], "code" => "apply", "class" => "btn btn-green", "link" => "/admin/attachedFile/update", "img" => ""],
                    ["title" => $getArrayCaptions['back']['translation_captions']['caption_translation'], "code" => "back", "class" => "btn btn-grey", "link" => "", "img" => ""],
                ]
            ],
            "tabs" => [

                [
                    "tab_title" => "стр.1",
                    "tab_type" => "default",
                    "blocks_quantity" => 3,
                    "blocks" => [
                        [
                            "form_is_dependent" => false,
                            "block_title" => "Общие сведения о юридическом лице",
                            "block_zone_quantity" => 1,
                            "block_width" => "100%",
                            "block_model" => "Profile",
                            "block_type" => "block_card",
                            "visible" => true,
                            "accordion" => true,
                            "show_name" => true,
                            "block_fields" => [
                                [
                                    'title' => "",
                                    'model' => 'organization_type',
                                    'type' => 'radiobuttons',
                                    'width' => '100%',
                                    "zone" => "1",
                                    "order" => "4",
                                    "border_right" => false,
                                    "additional" => [
                                        "title" => "Прочее, указать",
                                        "type" => "text",
                                        "mask" => "XX/XX/X/XX",
                                        "validation" => ["min" => 4]

                                    ],
                                    "display" => 'vertical', // horizontal,vertical
                                    "options" => [
                                        "view" => "checkbox", // radio,checkbox
                                        "direction" => "horizontal", // horizontal,vertical
                                    ],
                                    "list" => [
                                        ['name' => 'ооо', 'title' => 'ООО', "margin" => "margin-right: 20px"],
                                        ['name' => 'зао', 'title' => 'ЗАО',],
                                        ['name' => 'оао', 'title' => 'ОАО'],
                                        ['name' => 'пао', 'title' => 'ПАО'],
                                        ['name' => 'ип', 'title' => 'ИП'],
                                    ]
                                ],

                                ['title' => "Полное наименование компании",
                                    'model' => 'company_full_name',
                                    'type' => 'text',
                                    'width' => '100%',
                                    "zone" => "1",
                                    "order" => "1",
                                ],
                                ['title' => "Наименование компании на латинице ",
                                    'model' => 'company_full_name_en',
                                    'type' => 'text',
                                    'width' => '100%',
                                    "zone" => "1",
                                    "order" => "1",
                                    "tip" => " в соответствии с Уставом организации"
                                ],
                                ['title' => "ИНН",
                                    'model' => 'inn',
                                    'type' => 'text',
                                    'width' => '33%',
                                    "zone" => "1",
                                    "order" => "1",
                                ],
                                ['title' => "КПП",
                                    'model' => 'kpp',
                                    'type' => 'text',
                                    'width' => '33%',
                                    "zone" => "1",
                                    "order" => "1",
                                ],
                                ['title' => "ОГРН",
                                    'model' => 'ogrn',
                                    'type' => 'text',
                                    'width' => '33%',
                                    "zone" => "1",
                                    "order" => "1",
                                ],
                                ['title' => "Р/С",
                                    'model' => 'rs',
                                    'type' => 'text',
                                    'width' => '70%',
                                    "zone" => "1",
                                    "order" => "1",
                                ],
                                ['title' => "БИК",
                                    'model' => 'bik',
                                    'type' => 'text',
                                    'width' => '30%',
                                    "zone" => "1",
                                    "order" => "1",
                                ],
                                ['title' => "ОКПО",
                                    'model' => 'okpo',
                                    'type' => 'text',
                                    'width' => '33%',
                                    "zone" => "1",
                                    "order" => "1",
                                ],
                                ['title' => "Сайт",
                                    'model' => 'site',
                                    'type' => 'text',
                                    'width' => '33%',
                                    "zone" => "1",
                                    "order" => "1",
                                ],
                                ['title' => "Группа Компаний",
                                    'model' => 'company_group',
                                    'type' => 'text',
                                    'width' => '33%',
                                    "zone" => "1",
                                    "order" => "1",
                                    "tip" => "является"
                                ],

                                [
                                    'model' => 'company_group_is',
                                    'type' => 'radiobuttons',
                                    'width' => '100%',
                                    "zone" => "1",
                                    "order" => "4",
                                    "border_right" => false,
                                    "display" => 'horizontal', // horizontal,vertical
                                    "options" => [
                                        "view" => "radio", // radio,checkbox
                                        "direction" => "vertical", // horizontal,vertical
                                    ],
                                    "list" => [
                                        ['name' => '1', 'title' => 'Органом государственной власти, иным государственным органом, органом местного самоуправления, учреждением, находящимся в их ведении', "margin" => "margin-right: 20px"],
                                        ['name' => '2', 'title' => 'Государственным внебюджетным фондом',],
                                        ['name' => '3', 'title' => 'Организацией, в которой Российская Федерация, субъекты Российской Федерации либо муниципальные образования имеют более 50 процентов акций (долей) в капитале'],
                                        ['name' => '4', 'title' => 'Эмитентом ценных бумаг, допущенных к организованным торгам, который раскрывает информацию в соответствии с законодательством Российской Федерации о ценных бумагах'],
                                    ]
                                ],


                            ]
                        ],
                        [
                            "form_is_dependent" => false,
                            "block_title" => "Единоличный исполнительный орган (резидент РФ)",
                            "block_zone_quantity" => 1,
                            "block_width" => "100%",
                            "block_model" => "EIO",
                            "block_type" => "block_card",
                            "show_name" => true,
                            "visible" => true,
                            "accordion" => true,
                            "block_fields" => [


                                ['title' => "Фамилия",
                                    'model' => 'last_name',
                                    'type' => 'text',
                                    'width' => '33%',
                                    "zone" => "1",
                                    "order" => "1",
                                ],
                                ['title' => "Имя",
                                    'model' => 'first_name',
                                    'type' => 'text',
                                    'width' => '33%',
                                    "zone" => "1",
                                    "order" => "1",
                                ],
                                ['title' => "Отчество",
                                    'model' => 'middle_name',
                                    'type' => 'text',
                                    'width' => '33%',
                                    "zone" => "1",
                                    "order" => "1",
                                ],
                                ['title' => "Контактный телефон",
                                    'model' => "phone_number",
                                    'type' => 'text',
                                    'width' => '33%',
                                    "zone" => "1",
                                    "order" => "1",
                                ],
                                ['title' => "E-mail",
                                    'model' => 'email',
                                    'type' => 'text',
                                    'width' => '33%',
                                    "zone" => "1",
                                    "order" => "1",
                                ],
                                ['title' => "Дата Рождения",
                                    'model' => 'birth_date',
                                    'type' => 'date',
                                    'width' => '33%',
                                    "zone" => "1",
                                    "order" => "1",
                                ],

                                ['title' => "Место Рождения",
                                    'model' => '',
                                    'type' => 'title',
                                    'width' => '100%',
                                    "zone" => "1",
                                    "order" => "1",
                                ],
                                ['title' => "Страна",
                                    'model' => 'country',
                                    'type' => 'text',
                                    'width' => '33%',
                                    "zone" => "1",
                                    "order" => "1",
                                ],
                                ['title' => "Регион",
                                    'model' => 'region',
                                    'type' => 'text',
                                    'width' => '33%',
                                    "zone" => "1",
                                    "order" => "1",
                                ],
                                ['title' => "Населенный пункт",
                                    'model' => 'locality',
                                    'type' => 'text',
                                    'width' => '33%',
                                    "zone" => "1",
                                    "order" => "1",
                                ],
                                ['title' => "Должность",
                                    'model' => 'post',
                                    'type' => 'text',
                                    'width' => '33%',
                                    "zone" => "1",
                                    "order" => "1",
                                ],
                                ['title' => "ИНН",
                                    'model' => 'inn',
                                    'type' => 'text',
                                    'width' => '33%',
                                    "zone" => "1",
                                    "order" => "1",
                                ],
                                ['title' => "Гражданство",
                                    'model' => 'citizenship',
                                    'type' => 'text',
                                    'width' => '33%',
                                    "zone" => "1",
                                    "order" => "1",
                                ],
                                ['title' => "Паспорт Серия",
                                    'model' => 'passport_serie',
                                    'type' => 'text',
                                    'width' => '33%',
                                    "zone" => "1",
                                    "order" => "1",
                                ],
                                ['title' => "Паспорт Номер",
                                    'model' => 'passport_number',
                                    'type' => 'text',
                                    'width' => '33%',
                                    "zone" => "1",
                                    "order" => "1",
                                ],
                                ['title' => "Дата выдачи",
                                    'model' => 'passport_number',
                                    'type' => 'date',
                                    'width' => '33%',
                                    "zone" => "1",
                                    "order" => "1",
                                ],
                                ['title' => "Выдан",
                                    'model' => 'international_passport_issued',
                                    'type' => 'text',
                                    'width' => '33%',
                                    "zone" => "1",
                                    "order" => "1",
                                ],
                                ['title' => "Код подразделения",
                                    'model' => 'issuing_officer',
                                    'type' => 'text',
                                    'width' => '33%',
                                    "zone" => "1",
                                    "order" => "1",
                                ],
                                ['title' => "Номер/Серия",
                                    'model' => 'international_passport_number',
                                    'type' => 'text',
                                    'width' => '33%',
                                    "zone" => "1",
                                    "order" => "1",
                                ],
                                ['title' => "Начало пребывания",
                                    'model' => 'starting_date',
                                    'type' => 'date',
                                    'width' => '33%',
                                    "zone" => "1",
                                    "order" => "1",
                                ],
                                ['title' => "Окончание пребывания",
                                    'model' => 'ending_date',
                                    'type' => 'date',
                                    'width' => '33%',
                                    "zone" => "1",
                                    "order" => "1",
                                ],


                            ]
                        ],
                        [
                            "form_is_dependent" => false,
                            "block_title" => "Единоличный исполнительный орган (нерезидент РФ)",
                            "block_zone_quantity" => 1,
                            "block_width" => "100%",
                            "block_model" => "Profile",
                            "block_type" => "block_card",
                            "show_name" => true,
                            "accordion" => true,
                            "visible"=>false,
                            "block_fields" => [
                                [
                                    'title' => "",
                                    'model' => 'organization_type',
                                    'type' => 'radiobuttons',
                                    'width' => '100%',
                                    "zone" => "1",
                                    "order" => "4",
                                    "border_right" => false,
                                    "additional" => [
                                        "title" => "Прочее, указать",
                                        "type" => "text",
                                        "mask" => "XX/XX/X/XX",
                                        "validation" => ["min" => 4]

                                    ],
                                    "display" => 'vertical', // horizontal,vertical
                                    "options" => [
                                        "view" => "checkbox", // radio,checkbox
                                        "direction" => "horizontal", // horizontal,vertical
                                    ],
                                    "list" => [
                                        ['name' => 'ооо', 'title' => 'ООО', "margin" => "margin-right: 20px"],
                                        ['name' => 'зао', 'title' => 'ЗАО',],
                                        ['name' => 'оао', 'title' => 'ОАО'],
                                        ['name' => 'пао', 'title' => 'ПАО'],
                                        ['name' => 'ип', 'title' => 'ИП'],
                                    ]
                                ],

                                ['title' => "Полное наименование компании",
                                    'model' => 'company_full_name',
                                    'type' => 'text',
                                    'width' => '100%',
                                    "zone" => "1",
                                    "order" => "1",
                                ],
                                ['title' => "Наименование компании на латинице ",
                                    'model' => 'company_full_name_en',
                                    'type' => 'text',
                                    'width' => '100%',
                                    "zone" => "1",
                                    "order" => "1",
                                    "tip" => " в соответствии с Уставом организации"
                                ],
                                ['title' => "ИНН",
                                    'model' => 'inn',
                                    'type' => 'text',
                                    'width' => '33%',
                                    "zone" => "1",
                                    "order" => "1",
                                ],
                                ['title' => "КПП",
                                    'model' => 'kpp',
                                    'type' => 'text',
                                    'width' => '33%',
                                    "zone" => "1",
                                    "order" => "1",
                                ],
                                ['title' => "ОГРН",
                                    'model' => 'ogrn',
                                    'type' => 'text',
                                    'width' => '33%',
                                    "zone" => "1",
                                    "order" => "1",
                                ],
                                ['title' => "Р/С",
                                    'model' => 'rs',
                                    'type' => 'text',
                                    'width' => '70%',
                                    "zone" => "1",
                                    "order" => "1",
                                ],
                                ['title' => "БИК",
                                    'model' => 'bik',
                                    'type' => 'text',
                                    'width' => '30%',
                                    "zone" => "1",
                                    "order" => "1",
                                ],
                                ['title' => "ОКПО",
                                    'model' => 'okpo',
                                    'type' => 'text',
                                    'width' => '33%',
                                    "zone" => "1",
                                    "order" => "1",
                                ],
                                ['title' => "Сайт",
                                    'model' => 'site',
                                    'type' => 'text',
                                    'width' => '33%',
                                    "zone" => "1",
                                    "order" => "1",
                                ],
                                ['title' => "Группа Компаний",
                                    'model' => 'company_group',
                                    'type' => 'text',
                                    'width' => '33%',
                                    "zone" => "1",
                                    "order" => "1",
                                    "tip" => "является"
                                ],

                                [
                                    'model' => 'company_group_is',
                                    'type' => 'radiobuttons',
                                    'width' => '100%',
                                    "zone" => "1",
                                    "order" => "4",
                                    "border_right" => false,
                                    "display" => 'horizontal', // horizontal,vertical
                                    "options" => [
                                        "view" => "radio", // radio,checkbox
                                        "direction" => "vertical", // horizontal,vertical
                                    ],
                                    "list" => [
                                        ['name' => '1', 'title' => 'Органом государственной власти, иным государственным органом, органом местного самоуправления, учреждением, находящимся в их ведении', "margin" => "margin-right: 20px"],
                                        ['name' => '2', 'title' => 'Государственным внебюджетным фондом',],
                                        ['name' => '3', 'title' => 'Организацией, в которой Российская Федерация, субъекты Российской Федерации либо муниципальные образования имеют более 50 процентов акций (долей) в капитале'],
                                        ['name' => '4', 'title' => 'Эмитентом ценных бумаг, допущенных к организованным торгам, который раскрывает информацию в соответствии с законодательством Российской Федерации о ценных бумагах'],
                                    ]
                                ],


                            ]
                        ],

                    ]
                ],
                [
                    "tab_title" => $getArrayCaptions['EditingAttachedDocuments']['translation_captions']['caption_translation'],
                    "sectors_quantity" => 2,
                    "tab_type" => "step",
                    "blocks" => [
//                        [
//                            "form_is_dependent" => false,
//                            "block_title" => "Block2",
//                            "block_zone_quantity" => 1,
//                            "block_model" => "Requisites",
//                            "column"=>"1/2",
//                            "row"=>'1/7',
//                            "sector"=>"left",
//                            "block_type" => "block_card",
//                            "block_fields" => [
//
//                                ['title' => $getArrayCaptions['DocumentKind']['translation_captions']['caption_translation'],
//                                    'model' => 'att_doc_kind_id',
//                                    'type' => 'lt-select',
//                                    'options' => [],
//                                    "options_data" => [
//                                        "options_data_model" => "DocumentKinds",
//                                        "options_field_id" => "att_doc_kind_id",
//                                        "options_field_title" => "att_doc_kind_name",
//                                        "search" => ""
//                                    ],
//                                    'width' => '100%',
//                                    "zone" => "1",
//                                    "order" => "1"
//                                ],
//                                ['title' => $getArrayCaptions['Actual']['translation_captions']['caption_translation'],
//                                    'model' => 'actual_l',
//                                    'type' => 'checkbox',
//                                    'width' => '100%',
//                                    "zone" => "1",
//                                    "order" => "3"
//                                ],
//                                ['title' => $getArrayCaptions['DocumentType']['translation_captions']['caption_translation'],
//                                    'model' => 'att_doc_type_name',
//                                    'type' => 'label',
//                                    'width' => '100%',
//                                    "zone" => "1",
//                                    "order" => "2"
//                                ],
//                                ['title' => $getArrayCaptions['RequiredDocument']['translation_captions']['caption_translation'],
//                                    'model' => 'required',
//                                    'type' => 'checkbox',
//                                    'disabled' => 'true',
//                                    'width' => '100%',
//                                    "zone" => "1",
//                                    "order" => "1"
//                                ],
//
//                                ['title' => "Test field",
//                                    'model' => 'date',
//                                    'type' => 'double-date',
//                                    'width' => '100%',
//                                    "zone" => "1",
//                                    "order" => "2"
//                                ],
//                                ['title' => "Test field2",
//                                    'model' => 'test',
//                                    'type' => 'text',
//                                    'width' => '100%',
//                                    "zone" => "1",
//                                    "order" => "2",
//                                    'validation' => ['required' => true, 'min' => 5]
//                                ],
//                            ]
//                        ],
                        [
                            "form_is_dependent" => false,
                            "block_title" => "Leasing subject",
                            "block_zone_quantity" => 1,
                            "column" => "1/2",
                            "row" => "1/6",
                            "sector" => "left",
                            "block_model" => "Leasing_subject",
                            "block_type" => "block_card",
                            "block_fields" => [

                                ['title' => "Test Title",
                                    'model' => '',
                                    'type' => 'title',
                                    'width' => '100%',
                                    "zone" => "1",
                                    "order" => "1",
                                ],
                                ['title' => "Марка",
                                    'model' => 'brand',
                                    'type' => 'text',
                                    'options' => [],
                                    'width' => '100%',
                                    "zone" => "1",
                                    "order" => "1"
                                ],
                                ['title' => "Модель",
                                    'model' => 'model',
                                    'type' => 'text',
                                    'width' => '100%',
                                    "zone" => "1",
                                    "order" => "3"
                                ],
                                ['title' => "Гоd",
                                    'model' => 'year',
                                    'type' => 'text',
                                    'width' => '100%',
                                    "zone" => "1",
                                    "order" => "2"
                                ],
                                ['title' => "Дилер",
                                    'model' => 'dealer',
                                    'type' => 'text',
                                    'width' => '50%',
                                    "zone" => "1",
                                    "order" => "1"
                                ],


                            ]
                        ],
                        [
                            "form_is_dependent" => false,
                            "block_title" => "Insurance",
                            "block_zone_quantity" => 1,
                            "column" => "2/3",
                            "row" => "1/3",
                            "sector" => "left",
                            "block_model" => "Insurance",
                            "block_type" => "block_card",
                            "block_fields" => [
                                ['title' => "Тип страховки",
                                    'model' => 'insurance_type',
                                    'type' => 'text',
                                    'options' => [],
                                    'width' => '100%',
                                    "zone" => "1",
                                    "order" => "1"
                                ],
                                ['title' => "Франшиза",
                                    'model' => 'franshize',
                                    'type' => 'text',
                                    'width' => '100%',
                                    "zone" => "1",
                                    "order" => "3"
                                ],

                            ]
                        ],
                        [
                            "form_is_dependent" => false,
                            "block_title" => "Parameters",
                            "block_zone_quantity" => 1,
                            "column" => "1/2",
                            "row" => "6/13",
                            "sector" => "left",
                            "block_model" => "Parameters",
                            "block_type" => "block_card",
                            "block_fields" => [
                                ['title' => "Продукт лизинга",
                                    'model' => 'leasing_product',
                                    'type' => 'text',
                                    'options' => [],
                                    'width' => '100%',
                                    "zone" => "1",
                                    "order" => "1"
                                ],
                                ['title' => "Субсидия",
                                    'model' => 'subsidy',
                                    'type' => 'text',
                                    'width' => '100%',
                                    "zone" => "1",
                                    "order" => "3"
                                ],
                                ['title' => "Стоимость",
                                    'model' => 'value',
                                    'type' => 'text',
                                    'width' => '100%',
                                    "zone" => "1",
                                    "order" => "3"
                                ],
                                ['title' => "Процентная ставка",
                                    'model' => 'advance_percentage',
                                    'type' => 'text',
                                    'width' => '100%',
                                    "zone" => "1",
                                    "order" => "3"
                                ],
                                ['title' => "Платеж",
                                    'model' => 'advance_payment',
                                    'type' => 'text',
                                    'width' => '100%',
                                    "zone" => "1",
                                    "order" => "3"
                                ],
                                ['title' => "Срок",
                                    'model' => 'term',
                                    'type' => 'text',
                                    'width' => '100%',
                                    "zone" => "1",
                                    "order" => "3"
                                ],
                                ['title' => "Дата начала",
                                    'model' => 'start_date',
                                    'type' => 'text',
                                    'width' => '100%',
                                    "zone" => "1",
                                    "order" => "3"
                                ],

                            ]
                        ],
                        [
                            "form_is_dependent" => false,
                            "block_title" => "Mutual_settlements",
                            "block_zone_quantity" => 1,
                            "column" => "2/3",
                            "row" => "3/6",
                            "sector" => "left",
                            "block_model" => "Mutual_settlements",
                            "block_type" => "block_card",
                            "block_fields" => [
                                ['title' => "first",
                                    'model' => 'first',
                                    'type' => 'double-date',
                                    'options' => [],
                                    'width' => '100%',
                                    "zone" => "1",
                                    "order" => "1"
                                ],
                                ['title' => "second",
                                    'model' => 'second',
                                    'type' => 'double-date',
                                    'options' => [],
                                    'width' => '100%',
                                    "zone" => "1",
                                    "order" => "1"
                                ],
                                ['title' => "third",
                                    'model' => 'third',
                                    'type' => 'double-date',
                                    'options' => [],
                                    'width' => '100%',
                                    "zone" => "1",
                                    "order" => "1"
                                ],


                            ]
                        ],
                        [
                            "form_is_dependent" => false,
                            "block_title" => "Manager",
                            "block_zone_quantity" => 2,
                            "column" => "1/3",
                            "row" => "13/15",
                            "sector" => "left",
                            "block_model" => "Manager",
                            "block_type" => "block_card",
                            "block_fields" => [
                                ['title' => "Name",
                                    'model' => 'name',
                                    'type' => 'text',
                                    'options' => [],
                                    'width' => '100%',
                                    "zone" => "1",
                                    "order" => "1"
                                ],
                                ['title' => "Phone",
                                    'model' => 'phone',
                                    'type' => 'text',
                                    'width' => '100%',
                                    "zone" => "2",
                                    "order" => "3"
                                ],
                                ['title' => "Email",
                                    'model' => 'email',
                                    'type' => 'text',
                                    'width' => '100%',
                                    "zone" => "1",
                                    "order" => "3"
                                ],
                                ['title' => "Office",
                                    'model' => 'office',
                                    'type' => 'text',
                                    'width' => '100%',
                                    "zone" => "2",
                                    "order" => "3"
                                ],

                            ]
                        ],

                        [
                            "form_is_dependent" => false,
                            "block_title" => 'block1',
                            "form_search_field" => '["document"]["name"]',
                            "block_zone_quantity" => 1,
                            "column" => "1/3",
                            "row" => "1",
                            "sector" => "right",
                            "block_model" => "Documents",
                            "block_type" => "block_list_base",
                            "current_new_id" => 1,
                            "block_actions" => [
                                ["action_code" => "view",
                                    "name" => "View",
                                ],
                                ["action_code" => "download",
                                    "name" => "Download",
                                ],
                                ["action_code" => "delete",
                                    "name" => "Delete",
                                ],
                                ["action_code" => "add_line",
                                    "name" => "Add line",
                                ],

                            ],
                            "block_fields" => [
                                ['key' => 'actions', 'sortable' => false,
                                    'class' => 'list_checkbox',
                                    'thStyle' => 'width: 6%',
                                    "zone" => "1",
                                    "order" => "1"
                                ],
                                ['key' => 'document', 'edit' => true, "filter" => true, "sortable" => true, 'type' => 'button', 'class' => 'col-input',
                                    "label" => $getArrayCaptions['Name']['translation_captions']['caption_translation'], 'thStyle' => 'width: 31%', "zone" => "1", "order" => "2"],
                                ['key' => "doc_size", 'edit' => true, "filter" => true, "sortable" => true, 'class' => '', 'type' => 'label', 'options_data' => ['search' => ''],
                                    "label" => $getArrayCaptions['Size']['translation_captions']['caption_translation'], 'thStyle' => 'width: 17%', "zone" => "1", "order" => "4"],
                                ['key' => "doc_ext", 'edit' => true, "filter" => true, "sortable" => true, 'type' => 'label', 'class' => '',
                                    'label' => $getArrayCaptions['Format']['translation_captions']['caption_translation']],
                                ['key' => "list_actions", 'class' => 'list_actions-box',
                                    'label' => $getArrayCaptions['Actions']['translation_captions']['caption_translation']
                                ]
                            ]
                        ],
                    ]
                ],
                [
                    "tab_title" => "TAB titile 3",
                    "blocks_quantity" => 2,
                    "tab_type" => "step",
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

                                ['title' => "Test field",
                                    'model' => 'date',
                                    'type' => 'double-date',
                                    'width' => '100%',
                                    "zone" => "2",
                                    "order" => "2"
                                ],

                            ]
                        ],
                        [
                            "form_is_dependent" => false,
                            "block_title" => 'block1',
                            "block_zone_quantity" => 1,
                            "block_width" => "100%",
                            "block_model" => "Documents",
                            "block_type" => "block_list_base",
                            "current_new_id" => 1,
                            "block_actions" => [
                                ["action_code" => "view",
                                    "name" => "View",
                                ],
                                ["action_code" => "download",
                                    "name" => "Download",
                                ],
                                ["action_code" => "delete",
                                    "name" => "Delete",
                                ],
                                ["action_code" => "add_line",
                                    "name" => "Add line",
                                ],

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
                                ['key' => "list_actions", 'class' => 'list_actions-box',
                                    'label' => $getArrayCaptions['Actions']['translation_captions']['caption_translation']]
                            ]
                        ],
                    ]
                ],
            ]
        ];
        return response()->json($list);
    }


    public function createDocument1C($resArray, $id_owner, $result)
    {
        $attachDocument = new AttachedDocument();

        $object_type_code = $resArray['request']['request_parameters']['object_type_code'];
        $object_kind_n = $resArray['request']['request_parameters']['object_kind'];
        $uid_1c_code = $resArray['request']['request_parameters']['uid_1c_code'];
        $table_n = $resArray['request']['request_parameters']['owner']['owner_name'];

        $typeDOCid = AttachedDocumentType::where('id', $result['att_doc_type'])
            ->value('id');

        $attachDocument->att_doc_kind_id = $result['att_doc_kind_id'];
        $attachDocument->att_doc_type_id = $result['att_doc_type'];
        $attachDocument->actual_l = $result['actual_l'];
        $attachDocument->att_doc_name = $result['att_doc_name'];
        $attachDocument->uid_1c_code = $uid_1c_code;
        $attachDocument->row_id = $id_owner;
        $attachDocument->table_n = $table_n;
        $attachDocument->save();

        $status = [
            'status' => [
                'status_code' => (string)1,
                'status_description' => 'successfully',
            ]
        ];

//        dd($status);
    }


    public function update(Request $request)
    {
        $Documents = $request->Documents;
//        dd($Documents);
        foreach ($Documents as $document) {
            $ext = FileType::where('file_type_code', $document['doc_ext']['value'])->first()->value('id');

            AttachedDocumentFile::where('id', $document['id'])->update([
                'att_doc_file' => $document['document']['value'],
                'att_doc_file_name' => $document['document']['name'],
                'att_doc_file_code' => $document['document']['name'],
                'att_doc_file_size' => $document['doc_size']['value'],
                'file_type_id' => $ext,
            ]);


            $img = $document['document']['value'];
            $name = $document['document']['name'];
            $ext = $document['doc_ext']['value'];


            $folderPath = "img/";
            $image_parts = explode(";base64,", $img);
            $image_base64 = base64_decode($image_parts[1]);
            $file = $folderPath . $name . $ext;
            file_put_contents($file, $image_base64);
        }
        $model = $request->Requisites[0];
        return AttachedDocument::where('id', $model['id'])->update([
            'att_doc_kind_id' => $model['att_doc_kind_id'],
            'att_doc_type_id' => $model['att_doc_type_id'],
            'updated_by' => (new ConsumerParameters())->consumerCode(),
        ]);
    }

}
