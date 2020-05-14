<?php

namespace App\Http\Controllers\Api\FeBeRoutes;

use App\Http\Classes\CheckController;
use App\Http\Classes\ConsumerParameters;
use App\Models\Image;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use App\Models\FeUrl;
use Illuminate\Support\Facades\Route;

class FeUrlsController extends Controller
{
    public function index(Request $request){
        // Код страницы
        $code = $request->code;
        $image_path = null;

        // Выборка из `FeUrl` через связь `image`
        $fe_url = FeUrl::with('image')->where('fe_url_code',$code)->get()->toArray();

        // Проверка на наличие `image`
        if($fe_url[0]['image']) $image_path =  $fe_url[0]['image']['image_path'];
        // Записываем необходимые параметры
        $fe_url_header_top =  $fe_url[0]['fe_url_header_top'];
        $fe_url_header_bottom =  $fe_url[0]['fe_url_header_bottom'];
        $fe_url_info =  $fe_url[0]['fe_url_info'];
        $fe_url_footer_top =  $fe_url[0]['fe_url_footer_top'];
        $fe_url_footer_bottom =  $fe_url[0]['fe_url_footer_bottom'];

        // Формирование JSON
        $response = [
            "image_path" => $image_path,
            "fe_url_header_top" => $fe_url_header_top,
            "fe_url_header_bottom" => $fe_url_header_bottom,
            "fe_url_info" => $fe_url_info,
            "fe_url_footer_top" => $fe_url_footer_top,
            "fe_url_footer_bottom" => $fe_url_footer_bottom,
        ];
        return response()->json($response);
    }

    public function list(Request $request)
    {
        if(!$this->isAdmin())
            abort(403);

        $methods = $request->accessMethods;

        $captionName = [
            'ok',
            'apply',
            'back', 'Main',
            'Name', 'Code', 'ControllerNumber',
            'DeletedL', 'Actual', 'Controller', 'Caption', 'PageSpoofing', 'FeUrls', 'Parameter'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $ModelTables = FeUrl::query()
            ->leftJoin('__Controllers as controller', 'FeUrls.controller_id', '=', 'controller.id')
            ->select('FeUrls.id', 'fe_url_code', 'fe_url_parameter', 'controller.controller_name', 'FeUrls.caption_code', 'deleted_l', 'actual_l',
                DB::raw('CASE WHEN (concat(fe_url_header_top,fe_url_header_bottom,fe_url_footer_top,fe_url_footer_bottom,fe_url_info) = \'\') is not false 
                THEN FALSE ELSE TRUE END as page_spoofing'))
            ->orderBy('caption_code')
            ->get()->toArray();


        $list = [

            "main_data_models" => [

                $controller->controller_alias => $ModelTables,

            ],
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['FeUrls']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false,
                "form_type"                     => "list",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                'list_header_break_line' => true,
                "form_type_list"                => [
                    "form_card_url"     => "/fe/url/",
                    "form_search_field" => "",
                ],
            ],
            "sets"             => $this->getButtonsList(['list_bottom', 'list_top', 'list_top_dropdown_actions', 'list_top_left_command_bar', 'list_top_right_command_bar']),
            "tabs"             => [
                [
                    "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                    "blocks_quantity" => 1,
                    "blocks"          => [
                        [
                            //"block_title" => "none",
                            "block_zone_quantity" => 1, //add Albert Topalu
                            "block_model"         => $controller->controller_alias,
                            "block_type"          => "block_list_base",
                            "block_fields"        => [
                                ['key'      => 'actions', 'type'    => 'checkbox',
                                    'sortable' => false,
                                    'class'    => 'list_checkbox',
                                    'thStyle'  => 'width: 6%',
                                    "zone"     => "1",
                                    "order"    => "1"
                                ],
                                ['key'      => 'deleted_l', 'type'    => 'checkbox',
                                    'sortable' => false,
                                    'class'    => 'deleted_l',
                                    'label'    => $getArrayCaptions['DeletedL']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 8%',
                                    "zone"     => "1",
                                    "order"    => "2"
                                ],
                                ['key'      => 'actual_l', 'type'    => 'checkbox',
                                    'sortable' => false,
                                    'class'    => 'actual_l',
                                    'label'    => $getArrayCaptions['Actual']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 8%',
                                    "zone"     => "1",
                                    "order"    => "3"
                                ],
                                [
                                    'key'      => 'fe_url_code',
                                    'sortable' => true,
                                    'class'    => 'fe_url_code',
                                    'label'    => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 17%',
                                    "zone"     => "1",
                                    "order"    => "4"
                                ],
                                [
                                    'key'      => 'fe_url_parameter',
                                    'sortable' => true,
                                    'class'    => 'fe_url_parameter',
                                    'label'    => $getArrayCaptions['Parameter']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 17%',
                                    "zone"     => "1",
                                    "order"    => "5"
                                ],
                                [
                                    'key'      => 'controller_name',
                                    'sortable' => true,
                                    'class'    => 'controller_name',
                                    'label'    => $getArrayCaptions['Controller']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 17%',
                                    "zone"     => "1",
                                    "order"    => "6"
                                ],
                                [
                                    'key'      => 'caption_code',
                                    'sortable' => true,
                                    'class'    => 'caption_code',
                                    'label'    => $getArrayCaptions['Caption']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 19%',
                                    "zone"     => "1",
                                    "order"    => "7"
                                ],
                                [
                                'key'      => 'page_spoofing', 'type' => 'checkbox',
                                'sortable' => true,
                                'class'    => 'page_spoofing',
                                'label'    => $getArrayCaptions['PageSpoofing']['translation_captions']['caption_translation'],
                                'thStyle'  => 'width: 8%',
                                "zone"     => "1",
                                "order"    => "8"
                            ],
                            ]
                        ]
                    ]
                ],
            ]
        ];

        return response()->json($list);
    }

    public function card(Request $request)
    {
        if(!$this->isAdmin())
            abort(403);


        $methods = $request->accessMethods;

        $captionName = [
            'ok',
            'apply',
            'back', 'Main',
            'SystemDetails',
            'CreatedAt',
            'CreatedBy', 'UpdatedAt', 'UpdatedBy',
            'CreationDetails',
            'Code','Parameter','Controller','Caption','Image',
            'PageSetup', 'Preview', 'HeaderTop', 'HeaderBottom',
            'BodyPage', 'FooterTop', 'FooterBottom', 'PageTheme',
            'Actual', 'FeUrl', 'new'
        ];

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $modelTable_id = $request->id;
        if($modelTable_id == "new"){
            $modelTable = FeUrl::getNewObject();

        }
        else {
            $modelTable = FeUrl::query()
                ->with([
                    'controller' => function ($query) {
                        $query->select('id', 'controller_name');
                    },
                    'image' => function ($query) {
                        $query->select('id', 'image_name');
                    }
                ])
                ->find($modelTable_id);
        }
        array_push($captionName, $modelTable->caption_code ?? '');
        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $Controllers = \App\Models\Controller::select('id', 'controller_name')
            ->get()->toArray();
        $Images = Image::select('id', 'image_name', 'image_path')
            ->get()->toArray();


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
                        "block_zone_quantity" => 1,
                        "block_model"         => $controller->controller_alias,
                        "block_type"          => "block_card",
                        "block_fields"        => [
                            [
                                'title' => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'fe_url_code', 'width' => '50%', 'type' => 'text',
                                'zone'  => '1', 'order' => '1'
                            ],
                            [
                                'title' => $getArrayCaptions['Parameter']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'fe_url_parameter', 'width' => '50%', 'type' => 'text',
                                'zone'  => '1', 'order' => '2'
                            ],
                            [
                                'title' => $getArrayCaptions['Controller']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'controller_id',
                                'width' => '50%',
                                'type' => 'vue-select',
                                'zone' => '1',
                                'order' => '3',
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => "Controllers",
                                    "options_field_id" => "id",
                                    "options_field_title" => "controller_name",
                                    "search" => ""
                                ],
                            ],
                            [
                                'title' => $getArrayCaptions['Caption']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'caption_code', 'width' => '25%', 'type' => 'text',
                                'zone'  => '1', 'order' => '4'
                            ],
                            [
                                'title' => $getArrayCaptions['Image']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'image_id',
                                'width' => '25%',
                                'type' => 'vue-select',
                                'zone' => '1',
                                'order' => '5',
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => "Images",
                                    "options_field_id" => "id",
                                    "options_field_title" => "image_name",
                                    "search" => ""
                                ],
                            ],
                            [
                                'title' => $getArrayCaptions['PageSetup']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => '', 'width' => '50%', 'type' => 'title',
                                'zone'  => '1', 'order' => '6'
                            ],
                            [
                                'title' => $getArrayCaptions['Preview']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => '', 'width' => '50%', 'type' => 'button',
                                'zone'  => '1', 'order' => '7'
                            ],
                            [
                                'title' => $getArrayCaptions['HeaderTop']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'fe_url_header_top', 'width' => '100%', 'type' => 'text',
                                'zone'  => '1', 'order' => '8'
                            ],
                            [
                                'title' => $getArrayCaptions['HeaderBottom']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'fe_url_header_bottom', 'width' => '100%', 'type' => 'text',
                                'zone'  => '1', 'order' => '9'
                            ],
                            [
                                'title' => $getArrayCaptions['BodyPage']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'fe_url_info', 'width' => '100%', 'type' => 'text',
                                'zone'  => '1', 'order' => '10'
                            ],
                            [
                                'title' => $getArrayCaptions['FooterTop']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'fe_url_footer_top', 'width' => '100%', 'type' => 'text',
                                'zone'  => '1', 'order' => '11'
                            ],
                            [
                                'title' => $getArrayCaptions['FooterBottom']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'fe_url_footer_bottom', 'width' => '100%', 'type' => 'text',
                                'zone'  => '1', 'order' => '12'
                            ],
                            [
                                'title' => $getArrayCaptions['PageTheme']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'fe_url_page_theme', 'width' => '100%', 'type' => 'text',
                                'zone'  => '1', 'order' => '13'
                            ],
                            [
                                'title' => $getArrayCaptions['Actual']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'actual_l', 'width' => '33%', 'type' => 'checkbox',
                                'zone'  => '1', 'order' => '14'
                            ],
                        ]
                    ]
                ]
            ]
        ];

        if($formShowParam['show_system_tab'])
        {
            $tabs[] = [
                "tab_title"       => $getArrayCaptions['SystemDetails']['translation_captions']['caption_translation'],
                "blocks_quantity" => 1,
                "blocks"          => [
                    [
                        "block_zone_quantity" => 2,
                        "block_model"         => $controller->controller_alias,
                        "block_type"          => "block_card",
                        "block_fields"        => [
                            ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1",
                                "order" => "1"
                            ],

                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1",
                                "order" => "2"
                            ],

                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2",
                                "order" => "1"
                            ],

                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'],
                                'model_name' => $controller->controller_alias,
                                'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2",
                                "order" => "2"
                            ],

                        ]
                    ]
                ]
            ];
        }

        $res = [[ //Итоговый массив рекизитов
            'id' => $modelTable['id'],
            'controller_id' => $modelTable['controller_id'],
            'controller_name' => $modelTable['controller']['controller_name'] ?? null,
            'image_id' => $modelTable['fe_url_image_id'],
            'image_name' => $modelTable['image']['image_name'] ?? null,
            'fe_url_code' => $modelTable['fe_url_code'],
            'fe_url_parameter' => $modelTable['fe_url_parameter'],
            'caption_code' => $modelTable['caption_code'],
            'fe_url_header_top' => $modelTable['fe_url_header_top'],
            'fe_url_header_bottom' => $modelTable['fe_url_header_bottom'],
            'fe_url_footer_top' => $modelTable['fe_url_footer_top'],
            'fe_url_footer_bottom' => $modelTable['fe_url_footer_bottom'],
            'fe_url_page_theme' => $modelTable['fe_url_page_theme'],
            'fe_url_info' => $modelTable['fe_url_info'],
            'actual_l' => $modelTable['actual_l'],
            'created_at' => $modelTable['created_at'] instanceof Carbon ? $modelTable['created_at']->toDateTimeString() : $modelTable['created_at'],
            'updated_at' => $modelTable['updated_at'] instanceof Carbon ? $modelTable['updated_at']->toDateTimeString() : $modelTable['updated_at'],
            'created_by'      => (new ConsumerParameters())->consumerCode(),
            'updated_by'      => (new ConsumerParameters())->consumerCode(),
        ]];

        $card = [
            "main_data_models" => [

                $controller->controller_alias => $res,

            ],
            "add_data_models"  => [
                "Controllers" => $Controllers,
                "Images"    => $Images,
            ],
            "form_parameters" => [
                "form_title"                    => $getArrayCaptions['FeUrl']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false,
                "form_type"                     => "card",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name"     => $modelTable_id == "new" ? $getArrayCaptions['new']['translation_captions']['caption_translation'] : $getArrayCaptions[$modelTable->caption_code]['translation_captions']['caption_translation'],
                "form_type_list"                => [
                    "form_card_url" => "fe/url",
                ],
            ],
            "sets" => $this->getButtonsList(["card_actions"]),
            "tabs" => $tabs
        ];

        return response()->json($card);


    }

    public function update(Request $request)
    {
        $model = $request->Models[0];

        return FeUrl::where('id', $model['id'])->update([
            'id'              => $model['id'],
            'controller_id'         => $model['controller_id'],
            'fe_url_code'      => $model['fe_url_code'],
            'fe_url_parameter'      => $model['fe_url_parameter'],
            'caption_code'   => $model['caption_code'],
            'deleted_l' => $model['deleted_l'],
            'created_at'      => $model['created_at'],
            'updated_at'      => $model['updated_at'],
            'created_by'      => (new ConsumerParameters())->consumerCode(),
            'updated_by'      => (new ConsumerParameters())->consumerCode(),
        ]);
    }


}
