<?php

namespace App\Http\Controllers\Api\BL;

use App\Models\BL\BlContractorRequest;
use App\Models\BL\BlContractorRequestType;
use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Classes\CheckController;
use App\Http\Middleware\CheckAccess;

class BlContractorRequestTypesController extends Controller
{
    //+++Miniyar 07.06.2019

    public function list(Request $request){
        $contReqTypes = BlContractorRequestType::get()->toArray();

        $captionName = ['ContractorRequestTypes', 'Name', 'Actual', 'cardEmail'];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $model = 'App\Models\Controller';
        $mainModel = $model::where('controller_code',class_basename(Route::current()->controller))->value('controller_alias');

        $res = [];

        foreach ($contReqTypes as $contReqType)
        {
            $temp = [
                'id' => $contReqType['id'],
                'Email' => $contReqType['e_mail'],
                'Name' => $contReqType['bl_contractor_request_type_name'],
                'actual_l' => $contReqType['actual_l']
            ];

            array_push($res, $temp);
        }

        $list = [
            "main_data_models" => [
                $mainModel => $res,
            ],
            "form_parameters" => [
                "form_title" => $getArrayCaptions['ContractorRequestTypes']['translation_captions']['caption_translation'],
                "form_code" => $mainModel,
                "form_is_dependent" => false, // {if true -> show field} {if false hidden field)
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
            "tabs" => [
                [
                    "tab_title" => $getArrayCaptions['ContractorRequestTypes']['translation_captions']['caption_translation'],
                    "blocks_quantity" => 1,
                    "blocks" => [
                        [
                            "block_title" => $getArrayCaptions['ContractorRequestTypes']['translation_captions']['caption_translation'],
                            "block_zone_quantity" => 1,
                            "block_model" => $mainModel,
                            "block_type" => "block_list_base",
                            "block_actions" => [
                                "fillRequest" => true,
                            ],
                            "block_fields" => [
                                ['key' => "actions", 'class' => 'list_checkbox', 'thStyle' => 'width: 10%'],
                                ['key' => "Name", 'sortable' => true, 'class' => '', 'thStyle' => 'width: 40%', 'options_data' => ['search' => ''],
                                    "label" => $getArrayCaptions['Name']['translation_captions']['caption_translation'], "filter" => true],
                                ['key' => "Email", 'sortable' => true, 'class' => '', 'thStyle' => 'width: 35%', 'options_data' => ['search' => ''],
                                    "label" => $getArrayCaptions['cardEmail']['translation_captions']['caption_translation'], "filter" => true],
                                ['key' => "actual_l", 'sortable' => true, 'class' => 'actual_l', 'thStyle' => 'width: 15%',
                                    'label' => $getArrayCaptions['Actual']['translation_captions']['caption_translation'], "filter" => true],
                            ]
                        ],
                    ]
                ]
            ]
        ];

        return response()->json($list);
    }

    public function card(Request $request){
        $contReqTypeId = $request->id;

        if ($contReqTypeId == "new") {
            $contReqType = BlContractorRequestType::getNewObject();
        }
        else {
            $contReqType = BlContractorRequestType::where('id', $contReqTypeId)->first()->toArray();
        }

        $model = 'App\Models\Controller';
        $mainModel = $model::where('controller_code',class_basename(Route::current()->controller))->value('controller_alias');

        $captionName = ['ContractorRequestType', 'Name', 'Actual', 'back', 'CreatedAt',
            'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'SystemDetails', 'cardEmail'];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        //+Получение прав доступа
        $nameControllerMethod=[
            'controller'=> class_basename(Route::current()->controller),
            'accessRight' => 'record'
        ];
        $formShowParam = (new CheckController($nameControllerMethod))->getShowFormParameters();
        //-Получение прав доступа

        $res = [[
            'id'                                => $contReqType['id'],
            'e_mail'                            => $contReqType['e_mail'],
            'bl_contractor_request_type_name'   => $contReqType['bl_contractor_request_type_name'],
            'actual_l'                          => $contReqType['actual_l'],
            'db_area_id'                        => $contReqType['db_area_id'],
            'created_at'                        => $contReqType['created_at'],
            'created_by'                        => $contReqType['created_by'],
            'updated_at'                        => $contReqType['updated_at'],
            'updated_by'                        => $contReqType['updated_by'],
        ]];

        $card = [
            "main_data_models" => [
                $mainModel => $res,
            ],
            "sets" => $this->getButtonsList('card_actions'),
            "form_parameters" => [
                "form_title" => $getArrayCaptions['ContractorRequestType']['translation_captions']['caption_translation'],
                "form_code" => $mainModel,
                "form_is_dependent" => false, // {if true -> show field} {if false hidden field)
                "form_type" => "card",
                "disable_inputs" => $formShowParam['read_only'],
                "form_base_data_model" => $mainModel,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name" => $res[0]['bl_contractor_request_type_name']??"Новый тип запроса",
//                "form_type_list" => [
//                    "form_card_url" => "/contractors_new/",
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
                            "block_title" => $getArrayCaptions['ContractorRequestType']['translation_captions']['caption_translation'],
                            "block_zone_quantity" => 1,
                            "block_model" => $mainModel,
                            "block_type" => "block_card",
                            "block_fields" => [
                                ['title' => $getArrayCaptions['Name']['translation_captions']['caption_translation'], 'model_name'=>$mainModel,'model' => 'bl_contractor_request_type_name', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "1", "border_right" => false],
                                ['title' => $getArrayCaptions['cardEmail']['translation_captions']['caption_translation'], 'model_name'=>$mainModel,'model' => 'e_mail', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "1", "border_right" => false],
                                ['title' => $getArrayCaptions['Actual']['translation_captions']['caption_translation'], 'model_name'=>$mainModel,'model' => 'actual_l', 'type' => 'checkbox', 'width' => '50%', "zone" => "1", "order" => "2", "border_right" => false],
                            ]
                        ]
                    ]
                ]
            ]
        ];

        if($formShowParam['show_system_tab']) {

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
                                'model_name'=>$mainModel,'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1",
                                "order" => "1"
                            ],

                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'],
                                'model_name'=>$mainModel,'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1",
                                "order" => "2"
                            ],

                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'],
                                'model_name'=>$mainModel,'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2",
                                "order" => "1"
                            ],

                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'],
                                'model_name'=>$mainModel,'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2",
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

    //---Miniyar 07.06.2019

    public function insert(){

    }

    public function update(){

    }

    /*public function delete(){

    }*/

//    public function deleteMark(){
//
//    }
}
