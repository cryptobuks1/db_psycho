<?php

namespace App\Http\Controllers\Api\Help;

use App\Http\Classes\CheckController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use App\Models\FaqDev;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class FaqController extends Controller
{
    //
    public function insert()
    {

    }


    public function index(Request $request)
    {
        //        return FaqDev::whereNull("children")->with('faq')->get();
        //        $res = [];
        //        $components = FaqDev::with('image')->orderBy("faq_title")->get()->toArray();
        //        $tcounter = 0;
        //
        //        usort($components, function($item1, $item2)
        //        {
        //            return $item1['faq_parent_id'] <=> $item2['faq_parent_id'];
        //        });
        //        foreach($components as $item => $value)
        //        {
        //            if($value['faq_parent_id'])
        //            {
        //                $counter = 0;
        //                foreach($res as $resitem => $resvalue)
        //                {
        //
        //                    if($resvalue['id'] == $value['faq_parent_id'])
        //                    {
        //
        //                        array_push($res[$counter]['children'], [
        //
        //                                "id"          => $value['id'],
        //                                "image"       => $value['image_id'],
        //                                "parent_id"   => $value['faq_parent_id'],
        //                                "group"       => $value['group_l'],
        //                                "code"        => $value['faq_code'],
        //                                "title"       => $value['faq_title'],
        //                                "description" => $value['faq_description'],
        //                                "img"         => $value['image']['image_path'],
        //                                'answer'      => '',
        //                            ]
        //                        );
        //                    }
        //                    $counter++;
        //                }
        //            }
        //            else
        //            {
        //                $value = [
        //                    "id"          => $value['id'],
        //                    "image"       => $value['image_id'],
        //                    "group"       => $value['group_l'],
        //                    "code"        => $value['faq_code'],
        //                    "title"       => $value['faq_title'],
        //                    "description" => $value['faq_description'],
        //                    "img"         => $value['image']['image_path'],
        //                    'children'    => []
        //                ];
        //
        //
        //                array_push($res, $value);
        //            }
        //        }

        $controller_code = class_basename(Route::current()->controller);


        $main_model = \App\Models\Controller::where("controller_code", $controller_code)
            ->select("id", "controller_code", "controller_table_n", "controller_alias")->first();

        return [
            "form_parameters"  => [
                "form_base_data_model" => $main_model->controller_alias,

            ],
            "main_data_models" => [
                $main_model->controller_alias => FaqDev::whereNull("faq_parent_id")
                    ->select(["id", "faq_title", "image_id", "faq_parent_id", "group_l"])
                    ->addSelect(DB::raw("'' as faq_text"))->with([
                        'children',
                        'image'
                    ])
                    ->orderBy("id")
                    ->get()
            ],
            //                ->select("image_id as image", "group_l as group", "faq_code as code", "faq_title as title", "faq_description as description")->get(),
            "sets"             => $this->getButtonsList(["faq_article_actions", "faq_command_bar", "faq_section_actions", "faq_dropdown_actions"]),

        ];

    }

    public function getAnswer(Request $request)
    {
        $res = FaqDev::where('id', $request->id)->value('faq_text');

        return $res;
    }

    public function getAllAnswer()
    {
        $res = [];
        $components = FaqDev::get()->toArray();
        foreach($components as $item => $value)
        {
            if($value['faq_parent_id'])
            {
                $value = [
                    "id"            => $value['id'],
                    "faq_parent_id" => $value['faq_parent_id'],
                    'faq_text'      => $value['faq_text'],
                ];
                array_push($res, $value);
            }
            else if(!$value['group_l'])
            {

                $value = [
                    "id"       => $value['id'],
                    'faq_text' => $value['faq_text'],
                ];
                array_push($res, $value);
            }

        }

        return $res;
    }

    public function update(Request $request)
    {

    }

    //    public function delete()
    //    {
    //
    //    }


    public function list()
    {

    }

    public function card(Request $request): JsonResponse
    {
        $isFaqNew = false;
        $parent_id_is_present = false;
        if(!$request->id)
            return response()->json([
                "error"   => true,
                "message" => "Id is missing"
            ], 400);
        if($request->id == "new")
        {
            if(!isset($request->group_l))
                return response()->json([
                    "error"   => true,
                    "message" => "group_l is missing"
                ], 400);

            $faq = FaqDev::getNewObject();
            $isFaqNew = true;
            if($request->parent_id)
                $parent_id_is_present = true;
            else
            {
                $sections = FaqDev::where([
                    "faq_parent_id" => null,
                    "group_l"       => true
                ])->select("id", "faq_title as faq_parent_title")->get();
            }
        }
        else
        {
            $faq = FaqDev::find($request->id);
        }

        $main_model = \App\Models\Controller::where('controller_code', class_basename(Route::current()->controller))
            ->value('controller_alias');

        $nameControllerMethod = [
            'controller'  => class_basename(Route::current()->controller),
            'accessRight' => 'record'
        ];
        $formShowParam = (new CheckController($nameControllerMethod))->getShowFormParameters();

        $res = [[
                    'id'         => $faq['id'] ?? null,
                    'faq_title'  => $faq['faq_title'],
                    'faq_code'   => $faq['faq_code'],
                    'actual_l'   => $faq['actual_l'],
                    'deleted_l'  => $faq['deleted_l'],
                    'created_at' => $faq['created_at'] ? $faq['created_at']->toDateTimeString() : null,
                    'created_by' => $faq['created_by'],
                    'updated_at' => $faq['updated_at'] ? $faq['updated_at']->toDateTimeString() : null,
                    'updated_by' => $faq['updated_by'],
                ]];


        if($isFaqNew)
        {
            if(!$request->group_l)
            {
                $res[0]["faq_text"] = $faq["faq_text"];

                if($parent_id_is_present)
                    $res[0]["faq_parent_id"] = (int)$request->parent_id;
                else
                {
                    //                    $res[0]["faq_parent_title"] = $sections[0]->faq_parent_title;
                    $res[0]["faq_parent_title"] = "Пустой раздел";
                    //                    $res[0]["faq_parent_id"] = $sections[0]->id;
                    $res[0]["faq_parent_id"] = null;
                }
            }
            $res[0]["group_l"] = $request->group_l;

        }
        else
        {
            if(!$faq["group_l"])
                $res[0]["faq_text"] = $faq["faq_text"] ?? "";

            $res[0]["group_l"] = $faq["group_l"];

        }

        $captionName = [
            'ok', 'apply', 'back', 'Main', 'SystemDetails',
            'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy',
            'Headline', 'Description', 'Section', 'Article'
        ];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);


        $block_fields = [

            ['title'      => $getArrayCaptions['Headline']['translation_captions']['caption_translation'], 'model' => 'faq_title', 'type' => 'text',
             'model_name' => $main_model,
             'width'      => ($isFaqNew && !$parent_id_is_present && !$res[0]["group_l"]) ? '75%' : '100%',
             "zone"       => "1", "order" => "1", "border_right" => false],

        ];

        if($isFaqNew && !$parent_id_is_present && !$res[0]["group_l"])
        {
            array_push($block_fields, [
                'title'        => $getArrayCaptions['Section']['translation_captions']['caption_translation'],
                'model'        => 'faq_parent_id',
                'type'         => 'lt-select',
                'model_name'   => $main_model,
                'width'        => '25%',
                'options'      => [],
                "options_data" => [
                    "options_data_model"  => "FaqDevSections",
                    "options_field_id"    => "id",
                    "options_field_title" => "faq_parent_title",
                    "search"              => ""
                ],
                "zone"         => "1",
                "order"        => "2",
                "border_right" => false
            ]);
        }

        if(!$res[0]["group_l"])
        {
            array_push($block_fields, [
                'title'      => $getArrayCaptions['Description']['translation_captions']['caption_translation'], 'model' => 'faq_text', 'type' => 'editor',
                'model_name' => $main_model,
                'width'      => '100%', "zone" => "1", "order" => "1", "border_right" => false
            ]);
            $res[0]["image_id"] = 23;
        }
        else
            $res[0]["image_id"] = 24;

        $tabs = [
            [
                "tab_title"       => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                "tab_name"        => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                "tab_description" => 'Description',
                "blocks_quantity" => 1,
                "blocks"          => [
                    [
                        "block_title"         => "BlockTitle",
                        "block_zone_quantity" => 1,
                        "block_model"         => $main_model,
                        "block_type"          => "block_card",
                        "block_fields"        => $block_fields
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
                        "block_model"         => $main_model,
                        "block_type"          => "block_card",
                        "block_fields"        => [
                            ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'], 'model_name' => $main_model, 'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "1"],
                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'], 'model_name' => $main_model, 'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "2"],
                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'], 'model_name' => $main_model, 'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "1"],
                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'], 'model_name' => $main_model, 'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "2"],
                        ]
                    ]
                ]
            ];
            array_push($tabs, $tabSystem);
        }
        $card = [
            "main_data_models" => [
                $main_model => $res
            ],


            "form_parameters" => [
                "form_title"                    => $res[0]["group_l"]
                    ? $getArrayCaptions['Section']['translation_captions']['caption_translation']
                    : $getArrayCaptions['Article']['translation_captions']['caption_translation'],
                "form_code"                     => $main_model,
                "disable_inputs"                => $formShowParam['read_only'],
                "form_is_dependent"             => false, // {if true -> show field} {if false hidden field)
                "form_type"                     => "card",
                "form_base_data_model"          => $main_model,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name"     => $res[0]['faq_title']
                    ? $res[0]['faq_title']
                    : ($request->group_l
                        ? "Создание раздела"
                        : "Создание статьи"),
            ],

            "sets" => $this->getButtonsList(['card_actions']),

            "tabs" => $tabs
        ];

        if($isFaqNew && !$parent_id_is_present)
            $card["add_data_models"] = [
                "FaqDevSections" => $sections,
            ];

        return response()->json($card);


    }


}
