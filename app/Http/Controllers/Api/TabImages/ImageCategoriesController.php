<?php

namespace App\Http\Controllers\Api\TabImages;

use App\Http\Classes\CheckController;
use App\Http\Classes\ConsumerParameters;
use App\Models\ImageCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Route;

class ImageCategoriesController extends Controller
{
    public function list(Request $request)
    {
        if(!$this->isAdmin())
            abort(403);

        $methods = $request->accessMethods;

        $captionName = [
            'ok',
            'apply',
            'back', 'Main',
            'Remark', 'SystemDetails',
            'Category', 'ImageCategoryName', 'Name', 'Code',
            'ImageCategoryCode', 'ImageCategoryPath', 'ImageCategories', 'ImageCategory',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy',
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $ImageCategories = ImageCategory::all()->toArray();

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $list = [
            "main_data_models" => [
                $controller->controller_alias => $ImageCategories,
            ],
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['ImageCategories']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false,
                "form_type"                     => "list",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_type_list"                => [
                    "form_card_url"     => "/imageCategories/",
                    "form_search_field" => "image_category_name",
                ],
            ],
            "tabs"             => [
                [
                    "tab_title"       => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                    "blocks_quantity" => 1,
                    "blocks"          => [
                        [
                            "block_zone_quantity" => 1,
                            "block_model"         => $controller->controller_alias,
                            "block_type"          => "block_list_base",
                            "block_fields"        => [
                                [
                                    'key'     => 'actions', 'sortable' => false, 'class' => 'list_checkbox',
                                    'thStyle' => 'width: 6%', "zone" => "1", "order" => "1"
                                ],
                                [
                                    'key'     => 'image_category_name', 'sortable' => true, 'class' => 'image_category_name',
                                    'label'   => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 30%', "zone" => "1", "order" => "2"
                                ],
                                [
                                    'key'     => 'image_category_code', 'sortable' => true, 'class' => 'image_category_code',
                                    'label'   => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 30%', "zone" => "1", "order" => "3"
                                ],
                                [
                                    'key'     => 'image_category_remark', 'sortable' => true, 'class' => 'image_category_remark',
                                    'label'   => $getArrayCaptions['Remark']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 30%', "zone" => "1", "order" => "4"
                                ],
                            ]
                        ]
                    ]
                ],
            ],
            "sets"             => $this->getButtonsList(['list_bottom', 'list_top', 'list_top_dropdown_actions', 'list_top_left_command_bar', 'list_top_right_command_bar']),
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
            'Remark', 'SystemDetails',
            'Category', 'ImageCategoryName', 'Name', 'Code',
            'ImageCategoryCode', 'ImageCategoryPath', 'ImageCategories', 'ImageCategory',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy',
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $image_category_id = $request->id;

        if($image_category_id == "new")
            $image_category = ImageCategory::getNewObject();
        else
            $image_category = ImageCategory::where('id', $image_category_id)->get()->first()->toArray();

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

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
                                'title' => $getArrayCaptions['ImageCategoryName']['translation_captions']['caption_translation'],
                                'model_name'=>$controller->controller_alias,'model' => 'image_category_name', 'width' => '60%', 'type' => 'text',
                                'zone'  => '1', 'order' => '1', "validation" => ["required" => true]
                            ],
                            [
                                'title' => $getArrayCaptions['ImageCategoryCode']['translation_captions']['caption_translation'],
                                'model_name'=>$controller->controller_alias,'model' => 'image_category_code', 'width' => '40%', 'type' => 'text',
                                'zone'  => '1', 'order' => '2', "validation" => ["required" => true]
                            ],
                            [
                                'title' => $getArrayCaptions['Remark']['translation_captions']['caption_translation'],
                                'model_name'=>$controller->controller_alias,'model' => 'image_category_remark', 'width' => '100%', 'type' => 'text',
                                'zone'  => '1', 'order' => '4'
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
                        "block_title"         => "Block1",
                        "block_zone_quantity" => 2,
                        "block_model"         => $controller->controller_alias,
                        "block_type"          => "block_card",
                        "block_fields"        => [
                            ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'], 'model_name'=>$controller->controller_alias,'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "1"],
                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'], 'model_name'=>$controller->controller_alias,'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "2"],
                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'], 'model_name'=>$controller->controller_alias,'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "1"],
                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'], 'model_name'=>$controller->controller_alias,'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "2"],
                        ]
                    ]
                ]
            ];
        }

        $card = [
            "main_data_models" => [
                $controller->controller_alias => [$image_category],
            ],
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['ImageCategories']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false,
                "form_type"                     => "card",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name"     => $image_category['image_category_name'],
                "form_type_list"                => [
                    "form_card_url" => "imageCategories",
                ],
            ],
            "sets"             => $this->getButtonsList(["card_actions"]),
            "tabs"             => $tabs
        ];
        return response()->json($card);
    }

    public function update(Request $request)
    {
        $model = $request->ImageCategories[0];
        return ImageCategory::where('id', $model['id'])->update([
            'image_category_name'   => $model['image_category_name'],
            'image_category_code'   => $model['image_category_code'],
            'image_category_remark' => $model['image_category_remark'],
            'updated_by'            => (new ConsumerParameters())->consumerCode(),
        ]);
    }
}
