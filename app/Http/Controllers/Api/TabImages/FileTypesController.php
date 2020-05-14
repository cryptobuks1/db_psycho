<?php

namespace App\Http\Controllers\Api\TabImages;

use App\Http\Classes\CheckController;
use App\Http\Classes\ConsumerParameters;
use App\Models\FileType;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class FileTypesController extends Controller
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
            'Image', 'Format', 'Name', 'Code', 'FileTypeCode',
            'Images', 'Path', 'FileTypeName', 'ImageCategory',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy',
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $FileTypes = FileType::query()
            ->with('image:id,image_name,image_path')
            ->orderBy("_FileTypes.id", "asc")
            ->leftjoin('Images as images', 'images.id', '=', '_FileTypes.image_id')
            ->select("_FileTypes.*", DB::raw("images.image_name as image_name"),
                DB::raw("images.image_path as image_path"))
            ->get()->toArray();

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $list = [
            "main_data_models" => [
                $controller->controller_alias => $FileTypes,
            ],
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['Format']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false,
                "form_type"                     => "list",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_type_list"                => [
                    "form_card_url"     => "/fileTypes/",
                    "form_search_field" => "file_type_name",
                ],
            ],
            "tabs"             => [
                [
                    "tab_title"       => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                    "blocks_quantity" => 1,
                    "blocks"          => [
                        [
                            //"block_title" => "none",
                            "block_zone_quantity" => 1,
                            "block_model"         => $controller->controller_alias,
                            "block_type"          => "block_list_base",
                            "block_fields"        => [
                                [
                                    'key'     => 'actions', 'sortable' => false, 'class' => 'list_checkbox',
                                    'thStyle' => 'width: 6%', "zone" => "1", "order" => "1"
                                ],
                                [
                                    'key'     => 'file_type_name', 'sortable' => true, 'class' => 'file_type_name',
                                    'label'   => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 44%', "zone" => "1", "order" => "2"
                                ],
                                [
                                    'key'     => 'file_type_code', 'sortable' => true, 'class' => 'file_type_code',
                                    'label'   => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 20%', "zone" => "1", "order" => "3"
                                ],
                                [
                                    'key'     => 'image_name', 'sortable' => true, 'class' => 'image_name',
                                    'label'   => $getArrayCaptions['Remark']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 20%', "zone" => "1", "order" => "4"
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
            'ok',
            'apply',
            'back', 'Main',
            'Remark', 'SystemDetails',
            'Image', 'Format', 'Name', 'Code', 'FileTypeCode',
            'Images', 'Path', 'FileTypeName', 'ImageCategory',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy',
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $file_type_id = $request->id;

        if($file_type_id == "new")
            $file_type = FileType::getNewObject();
        else
            $file_type = FileType::query()
                ->leftjoin('Images', 'Images.id', '=', '_FileTypes.image_id')
                ->where('_FileTypes.id', $file_type_id)
                ->get()->first()->toArray();

        $Images = Image::all()->toArray();

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
                                'title' => $getArrayCaptions['FileTypeName']['translation_captions']['caption_translation'],
                                'model_name'=>$controller->controller_alias,'model' => 'file_type_name', 'width' => '60%', 'type' => 'text',
                                'zone'  => '1', 'order' => '1', "validation" => ["required" => true]
                            ],
                            [
                                'title' => $getArrayCaptions['FileTypeCode']['translation_captions']['caption_translation'],
                                'model_name'=>$controller->controller_alias,'model' => 'file_type_code', 'width' => '40%', 'type' => 'text',
                                'zone'  => '1', 'order' => '2', "validation" => ["required" => true]
                            ],
                            [
                                'title'        => $getArrayCaptions['Image']['translation_captions']['caption_translation'],
                                'model'        => 'image_id', 'type' => 'vue-select', 'width' => '60%',
                                'model_name'=>$controller->controller_alias,
                                'options'      => [],
                                "options_data" => [
                                    "options_data_model"  => "Images",
                                    "options_field_id"    => "id",
                                    "options_field_title" => "image_name",
                                    "search"              => ""
                                ],
                                "zone"         => "1", "order" => "3"
                            ],
                            [
                                'title' => 'Previev', 'model_name'=>$controller->controller_alias,'model' => 'image_id', 'type' => 'img-previev',
                                'width' => '40%', "zone" => "1", "order" => "4"
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
                $controller->controller_alias => [$file_type],
            ],
            "add_data_models"  => [
                "Images" => $Images,
            ],
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['Format']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false,
                "form_type"                     => "card",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name"     => $file_type['file_type_name'],
                "form_type_list"                => [
                    "form_card_url" => "fileTypes",
                ],
            ],
            "sets"             => $this->getButtonsList(["card_actions"]),
            "tabs"             => $tabs
        ];
        return response()->json($card);
    }

    public function update(Request $request)
    {
        $model = $request->FileTypes[0];
        return FileType::where('id', $model['id'])->update([
            'file_type_name' => $model['file_type_name'],
            'file_type_code' => $model['file_type_code'],
            'image_id'       => $model['image_id'],
            'updated_by'     => (new ConsumerParameters())->consumerCode(),
        ]);
    }
}
