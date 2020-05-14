<?php

namespace App\Http\Controllers\Api\TabImages;

use App\Http\Classes\CheckController;
use App\Http\Classes\ConsumerParameters;
use App\Models\FileType;
use App\Models\Image;
use App\Models\ImageCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Route;

class ImagesController extends Controller
{
    public function list(Request $request)
    {
        if(!$this->isAdmin())
            abort(403);

        $methods = $request->accessMethods;

        $captionName = [
            'ok', 'apply', 'back', 'Main',
            'Remark', 'Image', 'Country', 'SystemDetails', 'Actual',
            'CryptoAccounts', 'Code', 'Name', 'CryptoAccount', 'CryptoAccountHolder',
            'Images', 'Image', 'Format', 'Path', 'Category',
            'ImageName', 'ImageCode', 'ImageCategory',
            'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy',
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $Image = Image::leftjoin('_FileTypes', 'Images.file_type_id', '=', '_FileTypes.id')
            ->leftjoin('_ImageCategories', 'Images.image_category_id', '=', '_ImageCategories.id')
            ->select('_ImageCategories.*', '_FileTypes.*', 'Images.*')
            ->get()->toArray();

        $ImageCategories = ImageCategory::all()->toArray();

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $list = [
            "main_data_models" => [
                $controller->controller_alias => $Image,
            ],
            "add_data_models"  => [
                "ImageCategories" => $ImageCategories
            ],
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['Images']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => true,
                "form_type"                     => "list",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_type_list"                => [
                    "form_card_url"     => "/images/",
                    "form_search_field" => "image_name",
                ],
            ],
            "dependent"        => [
                "dependent_data_model" => $controller->controller_alias,
                "dependent_fields"     => [
                    "title"        => $getArrayCaptions['ImageCategory']['translation_captions']['caption_translation'],
                    "model"        => "image_category_id",
                    "type"         => "select",
                    "options"      => [],
                    "options_data" => [
                        "options_data_model"     => "ImageCategories",
                        "options_field_id"       => "id",
                        "options_field_id_value" => "",
                        "options_field_title"    => "image_category_name",
                        "search"                 => ''
                    ],
                ],
                "width"                => "100%",
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
                                    'key'     => 'image_name', 'sortable' => true, 'class' => 'image_name',
                                    'label'   => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 25%', "zone" => "1", "order" => "2"
                                ],
                                [
                                    'key'     => 'image_code', 'sortable' => true, 'class' => 'image_code',
                                    'label'   => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 23%', "zone" => "1", "order" => "3"
                                ],
                                [
                                    'key'     => "image_category_name", 'sortable' => true, 'class' => 'image_category_name',
                                    'label'   => $getArrayCaptions['Category']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 23%', "zone" => "1", "order" => "4"
                                ],
                                [
                                    'key'     => "image_path", 'sortable' => true, 'class' => 'image_path',
                                    'label'   => $getArrayCaptions['Image']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 10%', "zone" => "1", "order" => "8"
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
            'ok', 'apply', 'back', 'Main',
            'Remark', 'Image', 'Country', 'SystemDetails', 'Actual',
            'CryptoAccounts', 'Code', 'Name', 'CryptoAccount', 'CryptoAccountHolder',
            'Images', 'Image', 'Format', 'Path', 'Category',
            'ImageName', 'ImageCode', 'ImageCategory',
            'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy',
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $image_id = $request->id;

        if($image_id == "new")
        {
            $image = Image::getNewObject();
            $image_category = ImageCategory::query()->find($request["dependent"]["id"]);
            $image["image_category_id"] = $image_category->id;
            $image["image_category_name"] = $image_category->image_category_name;
            $image["image_category_code"] = $image_category->image_category_code;
        }
        else
            $image = Image::query()
                ->leftjoin('_FileTypes', 'Images.file_type_id', '=', '_FileTypes.id')
                ->leftjoin('_ImageCategories', 'Images.image_category_id', '=', '_ImageCategories.id')
                ->select('_ImageCategories.*', '_FileTypes.*', 'Images.*')
                ->with('fileType')
                ->where('Images.id', $image_id)
                ->get()->first()->toArray();

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $nameControllerMethod = [
            'controller'  => class_basename(Route::current()->controller),
            'accessRight' => 'record'
        ];
        $formShowParam = (new CheckController($nameControllerMethod))->getShowFormParameters();


        $ImageCategories = ImageCategory::all()->toArray();
        $FileTypes = FileType::all()->toArray();

        $tabs = [
            [
                "tab_title"       => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                "blocks_quantity" => 1,
                "blocks"          => [
                    [
                        "block_title"         => "Block1",
                        "block_zone_quantity" => 1,
                        "block_model"         => $controller->controller_alias,
                        "block_type"          => "block_card",
                        "block_fields"        => [
                            ['title'      => $getArrayCaptions['ImageName']['translation_captions']['caption_translation'], 'model_name'=>$controller->controller_alias,'model' => 'image_name', 'type' => 'text', 'width' => '33%', "zone" => "1", "order" => "1",
                             "validation" => ["required" => true]],
                            ['title'      => $getArrayCaptions['ImageCode']['translation_captions']['caption_translation'], 'model_name'=>$controller->controller_alias,'model' => 'image_code', 'type' => 'text', 'width' => '33%', "zone" => "1", "order" => "2",
                             "validation" => ["required" => true]],
                            [
                                'title'        => $getArrayCaptions['Format']['translation_captions']['caption_translation'],
                                'model'        => 'file_type_id', 'type' => 'vue-select', 'width' => '33%',
                                'model_name'   =>$controller->controller_alias,
                                'options'      => [],
                                "options_data" => [
                                    "options_data_model"  => "FileTypes",
                                    "options_field_id"    => "id",
                                    "options_field_title" => "file_type_name",
                                    "search"              => ""
                                ],
                                "zone"         => "1", "order" => "3"
                            ],
                            [
                                'title'        => $getArrayCaptions['ImageCategory']['translation_captions']['caption_translation'],
                                'model'        => 'image_category_id', 'type' => 'vue-select', 'width' => '66%',
                                'model_name'   =>$controller->controller_alias,
                                'options'      => [],
                                "options_data" => [
                                    "options_data_model"  => "ImageCategories",
                                    "options_field_id"    => "id",
                                    "options_field_title" => "image_category_name",
                                    "search"              => ""
                                ],
                                "zone"         => "1", "order" => "4"
                            ],
                        ]
                    ],
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
                $controller->controller_alias => [$image]
            ],
            "add_data_models"  => [
                "ImageCategories" => $ImageCategories,
                "FileTypes"       => $FileTypes,
            ],
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['Images']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => true, // {if true -> show field} {if false hidden field)
                "form_type"                     => "card",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name"     => $image['image_name'],
                "form_type_list"                => [
                    "form_card_url"     => "/images/",
                    "form_search_field" => "image_name",
                ],
            ],
            "dependent"        => [
                "dependent_data_model" => $controller->controller_alias,
                "dependent_fields"     => [
                    "title"        => $getArrayCaptions['Image']['translation_captions']['caption_translation'],
                    "model"        => "image_category_id",
                    "type"         => "label",
                    "options"      => [],
                    "options_data" => [
                        "options_data_model"     => "ImageCategories",
                        "options_field_id"       => "id",
                        "options_field_id_value" => "",
                        "options_field_title"    => "image_category_name",
                        "search"                 => ''
                    ],
                ],
                "width"                => "100%",
            ],
            "sets"             => $this->getButtonsList(["card_actions"]),
            "tabs"             => $tabs
        ];
        return response()->json($card);
    }

    public function update(Request $request)
    {
        $model = $request->Images[0];
        return Image::where('id', $model['id'])->update([
            'image_code'        => $model['image_code'],
            'image_name'        => $model['image_name'],
            'image_path'        => $model['image_path'],
            'file_type_id'      => $model['file_type_id'],
            'image_category_id' => $model['image_category_id'],
            'updated_by'        => (new ConsumerParameters())->consumerCode(),
        ]);
    }
}
