<?php

namespace App\Http\Controllers\Api\TabCommonReferences;

use App\Http\Classes\CheckController;
use App\Models\Contractor;
use App\Country;
use App\Models\DbArea;
use App\Http\Classes\ConsumerParameters;
use App\Models\Language;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Route;

// Albert Topalu create controller

class LanguagesController extends Controller
{
    //commit Albert Topalu 02.11.18 10:51
    //    public function __construct() {
    //        /*get translations*/
    ////        $this->texts = DB::table('translation_captions')
    ////            ->join('languages', 'translation_captions.language_id', '=', 'languages.id')
    ////            ->join('_captions', 'translation_captions.caption_id', '=', '_captions.id')
    ////            ->where('languages.language_code', config('app.locale'))
    ////        ->get();
    //        $this->texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();
    //    }

    public function list(Request $request)
    {
        if(!$this->isAdmin())
            abort(403);

        $methods = $request->accessMethods;

        //        $currrentLang = Lang::locale();
        $languages = Language::query()
            ->orderBy("language_name", "asc")
            ->get();
        //        $contractors = Contractor::get()->toarray();

        $captionName = [
            'Languages',
            'LanguageTableName',
            'LanguageTableView',
            'LanguageTableCodeShort',
            'LanguageTableCode3Short',
            'NumericCode',
        ];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $list = [

            "main_data_models" => [
                $controller->controller_alias => $languages
            ],

            "form_parameters" => [
                "form_title"                    => $getArrayCaptions['Languages']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false, // {if true -> show field} {if false hidden field)
                "form_type"                     => "list",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_type_list"                => [
                    "form_card_url"     => "/languages",
                    "form_search_field" => "language_name",
                ],
            ],
            "sets"            => $this->getButtonsList(['list_bottom', 'list_top', 'list_top_dropdown_actions', 'list_top_left_command_bar', 'list_top_right_command_bar']),
            "tabs"            => [
                [
                    //                  "tab_title" => "Контрагенты",
                    "blocks_quantity" => 1,
                    "blocks"          => [

                        [
                            "block_title"         => "Main",
                            "block_zone_quantity" => 1,
                            "block_model"         => $controller->controller_alias,
                            "block_type"          => "block_list_base",
                            "block_fields"        => [
                                ['key' => 'actions', 'sortable' => false, 'class' => 'list_checkbox', 'thStyle' => 'width: 6%', "zone" => "1"],
                                ['key'   => 'language_name', 'sortable' => true, 'class' => 'language_name',
                                 "label" => $getArrayCaptions['LanguageTableName']['translation_captions']['caption_translation'], 'thStyle' => 'width: 26%', "zone" => "1"],

                                ['key'   => 'language_view', 'sortable' => true, 'class' => 'language_view',
                                 "label" => $getArrayCaptions['LanguageTableView']['translation_captions']['caption_translation'], 'thStyle' => 'width: 26%', "zone" => "1"],

                                ['key'   => 'language_code', 'sortable' => true, 'class' => 'language_code',
                                 "label" => $getArrayCaptions['LanguageTableCodeShort']['translation_captions']['caption_translation'], 'thStyle' => 'width: 14%', "zone" => "1"],

                                ['key'   => 'language_code3', 'sortable' => true, 'class' => 'language_code3',
                                 "label" => $getArrayCaptions['LanguageTableCode3Short']['translation_captions']['caption_translation'], 'thStyle' => 'width: 14%', "zone" => "1"],

                                ['key'   => 'language_code_n', 'sortable' => true, 'class' => 'language_code_n',
                                 "label" => $getArrayCaptions['NumericCode']['translation_captions']['caption_translation'], 'thStyle' => 'width: 14%', "zone" => "1"],
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
        if(!$this->isAdmin())
            abort(403);

        $methods = $request->accessMethods;


        $language_id = $request->id;

        if($language_id == "new")
            $language = Language::getNewObject();
        else
            $language = Language::query()->where('id', $request->id)
                ->select('id', 'language_code', 'language_name', 'language_name_ru', 'language_view', 'language_code3',
                    'language_code_n', 'created_at', 'updated_at', 'created_by', 'updated_by')
                ->get()->first()->toArray();

        $captionName = [
            'ok', 'apply', 'back', 'LanguageTableName', 'LanguageTableNameRu', 'LanguageTableView',
            'LanguageTableCodeFull', 'LanguageTableCode3Full', 'NumericCode', 'Main', 'Language',
            'SystemDetails', 'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy', 'addNewLang'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

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
                        "block_title"         => "Block1",
                        "block_zone_quantity" => 2,
                        "block_model"         => $controller->controller_alias,
                        "block_type"          => "block_card",
                        "block_fields"        => [
                            ['title' => $getArrayCaptions['LanguageTableName']['translation_captions']['caption_translation'], "model_name"=>$controller->controller_alias,'model' => 'language_name', 'type' => 'text', 'width' => '100%', "zone" => "1", "order" => "1"],
                            ['title' => $getArrayCaptions['LanguageTableNameRu']['translation_captions']['caption_translation'], "model_name"=>$controller->controller_alias,'model' => 'language_name_ru', 'type' => 'text', 'width' => '100%', "zone" => "1", "order" => "2"],
                            ['title' => $getArrayCaptions['LanguageTableView']['translation_captions']['caption_translation'], "model_name"=>$controller->controller_alias,'model' => 'language_view', 'type' => 'text', 'width' => '100%', "zone" => "1", "order" => "3"],
                            ['title' => $getArrayCaptions['LanguageTableCodeFull']['translation_captions']['caption_translation'], "model_name"=>$controller->controller_alias,'model' => 'language_code', 'type' => 'text', 'width' => '100%', "zone" => "2", "order" => "1"],
                            ['title' => $getArrayCaptions['LanguageTableCode3Full']['translation_captions']['caption_translation'], "model_name"=>$controller->controller_alias,'model' => 'language_code3', 'type' => 'text', 'width' => '100%', "zone" => "2", "order" => "2"],
                            ['title' => $getArrayCaptions['NumericCode']['translation_captions']['caption_translation'], "model_name"=>$controller->controller_alias,'model' => 'language_code_n', 'type' => 'text', 'width' => '100%', "zone" => "2", "order" => "3"],
                        ]
                    ],
                ]
            ]
        ];

        if($formShowParam['show_system_tab'])
        {
            $tabs[] = [
                "tab_title"       => $getArrayCaptions['SystemDetails']['translation_captions']['caption_translation'],
                "tab_name"        => $getArrayCaptions['SystemDetails']['translation_captions']['caption_translation'],
                "tab_description" => '',
                "blocks_quantity" => 1,
                "blocks"          => [
                    [
                        "block_title"         => "Block1",
                        "block_zone_quantity" => 2,
                        "block_model"         => $controller->controller_alias,
                        "block_type"          => "block_card",
                        "block_fields"        => [
                            ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'], "model_name"=>$controller->controller_alias,'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "1"],
                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'], "model_name"=>$controller->controller_alias,'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "2"],
                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'], "model_name"=>$controller->controller_alias,'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "1"],
                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'], "model_name"=>$controller->controller_alias,'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2", "order" => "2"],
                        ]
                    ]
                ]
            ];
        }

        $card = [
            "main_data_models" => [
                $controller->controller_alias => [$language]
            ],
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['Language']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false, // {if true -> show field} {if false hidden field)
                "disable_inputs"                => $formShowParam['read_only'],
                "form_type"                     => "card",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name"     => $language_id == "new" ? $getArrayCaptions['addNewLang']['translation_captions']['caption_translation'] : $language["language_name"],
                "form_type_list"                => [
                    "form_card_url"     => "/admin/language/card",
                    "form_search_field" => "language_name",
                ],
            ],
            "tabs"             => $tabs,
            "sets"             => $this->getButtonsList(["card_actions"])
        ];

        return response()->json($card);
    }

    public function update(Request $request)
    {

        $model = $request->Language[0];
        return Language::where('id', $model['id'])->update(
            [
                'language_name'    => $model['language_name'],
                'language_name_ru' => $model['language_name_ru'],
                'language_code'    => $model['language_code'],
                'language_view'    => $model['language_view'],
                'language_code3'   => $model['language_code3'],
                'language_code_n'  => $model['language_code_n'],
                'updated_by'       => (new ConsumerParameters())->consumerCode(),
            ]
        );
    }

    public function switchLanguage(Request $request)
    {
        try
        {
            $lang = $request["lang"];


            \Illuminate\Support\Facades\Session::put('lang', $lang);
            Lang::setLocale($lang);
        } catch(\Exception $exception)
        {
            return response()->json([
                "error"   => true,
                "message" => $this->isAdmin() ? $exception->getMessage() : "Ошибка"
            ], 400);
        }

        return;
    }
}
