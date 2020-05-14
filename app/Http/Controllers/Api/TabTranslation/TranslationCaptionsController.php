<?php

/** create controller
 * @author Albert Topalu 25.10.18
 * y.yurenko  29.10.2018
 */

namespace App\Http\Controllers\Api\TabTranslation;


use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Route;

use App\Models\TranslationCaption;
use App\Models\Language;
use App\Models\Caption;
use Illuminate\Support\Facades\Validator;


/*y.yurenko  29.10.2018*/

class TranslationCaptionsController extends Controller
{


    public function card(Request $request)
    {
        if(!$this->isAdmin())
            abort(403);


        $captionName = [
            'ok',
            'apply',
            'back', 'Main', 'Translation',
            'Language', 'Caption', 'Translations',
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $methods = $request->accessMethods;

        $caption_translation_id = $request->id;



        $captions = [];

        if($caption_translation_id == "new")
        {
            $translation_caption = TranslationCaption::getNewObject();

            $language = Language::query()->find($request["owner_id"]);

            if($request["dependent"]["controller_alias"] == "Caption")
            {
                $caption = Caption::query()->find($request["dependent"]["id"]);

                $translation_caption["caption_id"] = $caption->id;
                $translation_caption["caption_name"] = $caption->caption_name;
            }
            else
            {
                $caption_name_field = [
                    'title'        => $getArrayCaptions['Caption']['translation_captions']['caption_translation'],
                    'model'        => 'caption_id',
                    'type'         => 'lt-select',
                    'width'        => '100%',
                    'options'      => [],
                    "options_data" => [
                        "options_data_model"  => "Captions",
                        "options_field_id"    => "id",
                        "options_field_title" => "caption_name",
                        "search"              => ""
                    ],
                    "zone"         => "1",
                    "order"        => "1",
                    "border_right" => false
                ];

                $captions = Caption::query()->select("id", "caption_name")->get();
            }

            $translation_caption["language_id"] = $language->id;
            $translation_caption["language_code"] = $language->language_code;
            $translation_caption["language_name"] = $language->language_name;
        }
        else
        {
            $translation_caption = DB::table('_TranslationCaptions')
                ->join('__Captions', '_TranslationCaptions.caption_id', '=', '__Captions.id')
                ->join('_Languages', '_Languages.id', '=', '_TranslationCaptions.language_id')
                ->select('__Captions.*', '_TranslationCaptions.*', '_Languages.language_code',
                    "_Languages.language_name")
                ->where('_TranslationCaptions.id', $caption_translation_id)
                ->get()->first();

        }


        $Languages = Language::select('id', 'language_name')->get()->toarray();

//        $Captions = DB::table('__Captions')
//            ->leftJoin('_TranslationCaptions', '_TranslationCaptions.caption_id', '=', '__Captions.id')
//            ->select('__Captions.id', '__Captions.caption_name')
//            ->whereNull('_TranslationCaptions.caption_id')
//            ->get()->toArray();

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $caption_name_field = [
            'title' => $getArrayCaptions['Caption']['translation_captions']['caption_translation'],
            'model_name'=> $controller->controller_alias, 'model' => 'caption_name', 'width' => '100%', 'type' => 'label',
            'zone'  => '1', 'order' => '1'
        ];

        $card = [

            "main_data_models" => [

                $controller->controller_alias => [$translation_caption],

            ],
            "add_data_models"  => [

                "Languages" => $Languages,
                "Captions"  => $captions,

            ],
            "form_parameters"  => [
                "form_title"                => $getArrayCaptions['Translation']['translation_captions']['caption_translation'],
                "form_code"                 => $controller->controller_alias,
                "form_is_dependent"         => true,
                "form_type"                 => "card",
                "form_base_data_model"      => $controller->controller_alias,
                "form_main_data_model_name" => is_array($translation_caption) ? $translation_caption["caption_name"] : $translation_caption->caption_name,
                //                        "form_main_data_model_name" => $translation_caption[0]['caption_translation'],
                "form_type_list"            => [
                    "form_list_url"     => "admin/translationCaptions/list",
                    "form_search_field" => "caption_name",
                ],
            ],
            "sets"             => $this->getButtonsList(["card_actions"]),
            "dependent"        => [
                "dependent_data_model" => "TranslationCaptions",
                "dependent_fields"     =>
                    [
                        "title"        => $getArrayCaptions['Language']['translation_captions']['caption_translation'],
                        "model"        => "language_id", // это поле не может быть пустым, так как по нему   языка из верхнего селекта записывается в основную модель
                        "type"         => "label",
                        "options"      => [],
                        "options_data" => [
                            "options_data_model"     => "Languages",
                            "options_field_id"       => "id",
                            "options_field_id_value" => "",
                            "options_field_title"    => "language_name",
                            "search"                 => ''
                        ],
                    ],
                //обьект внизу не совсем корректен
                //                        "data" => [
                //                            "data_model" => "Languages",
                //                            "field_id" => "id",
                //                            "field_id_value" =>$languageId,
                //                            "field_title" => "language_name",
                //                        ],
                "width"                => "100%"

            ],
            "tabs"             => [

                [

                    "tab_title"       => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                    "blocks_quantity" => 1, //не может быть 0
                    "blocks"          => [

                        [
                            "block_title"         => $getArrayCaptions['Translations']['translation_captions']['caption_translation'],
                            "block_zone_quantity" => 2,// по описанию тут должно быть 2 зоны
                            "block_model"         => $controller->controller_alias,
                            "block_type"          => "block_card",
                            "block_fields"        => [

                                $caption_name_field,
                                [
                                    'title' => $getArrayCaptions['Translation']['translation_captions']['caption_translation'],
                                   'model_name'=> $controller->controller_alias, 'model' => 'caption_translation', 'width' => '100%', 'type' => 'text',
                                    'zone'  => '2', 'order' => '2'
                                ],

                            ]


                        ]

                    ]
                ]

            ]
        ];
        //return var_dump("<pre>",$card,"</pre>");
        return response()->json($card);
    }


    public function update(Request $request)
    {


        /*result of our validate rules*/
        $validator = $this->applyValidator($request);


        if($validator->fails())
        {

            $response = [

                "status"  => 1,
                "message" => $validator->messages(),
            ];

            return response()->json($response);
        }

        $model = $request->TranslationCaptions[0];

        if(config('app.VueBlade'))
        {


            /*if good and valid update record*/
            return TranslationCaption::where('id', $model['id'])->update(
                [
                    'language_id'         => $model['language_id'],
                    'caption_id'          => $model['caption_id'],
                    'caption_translation' => $model['caption_translation'],
                ]
            );
        }
        else
        {


            /*if good and valid create record*/
            TranslationCaption::where('id', $request->idServer)->update(
                [
                    'language_id'         => $request->language_id,
                    'caption_id'          => $request->caption_id,
                    'caption_translation' => $request->caption_translation,
                ]
            );
            return back()->with('alert', trans('messages.saved'));
        }

    }



    /*y.yurenko*/
    //    public function delete(Request $request) {
    //
    //
    //
    //        $model = $request->TranslationCaptions[0];
    //
    //        return TranslationCaption::where('id', $model['id'])->delete();
    //
    //    }


    /*y.yurenko*/
    public function insert(Request $request)
    {


        /*result of our validate rules*/
        $validator = $this->applyValidator($request);


        if($validator->fails())
        {

            $response = [

                "status"  => 1,
                "message" => $validator->messages(),
            ];

            return response()->json($response);
        }


        $model = $request->TranslationCaptions[0];
        /*if success all access checks  */
        if(config('app.VueBlade'))
        {
            /*if Vue and data is not valid send a message*/

            /*if not exist and rules is valid add record*/
            return TranslationCaption::create([

                'language_id'         => $model['language_id'],
                'caption_id'          => $model['caption_id'],
                'caption_translation' => $model['caption_translation'],

            ]);

        }
        else
        {

            /*if good and valid create record*/
            TranslationCaption::create([
                'language_id'         => $request->language_id,
                'caption_id'          => $request->caption_id,
                'caption_translation' => $request->caption_translation,
            ]);
            return back()->with('alert', trans('messages.createDb'));
        }


    }

    public function applyValidator(Request $request)
    {

        /*validation rules*/
        if(!empty($request->caption_translation))
        {
            /*if not empty caption_translation then unique validation*/
            $validator = Validator::make($request->TranslationCaptions[0], [

                'language_id'         => 'required|integer',
                'caption_id'          => 'required|integer',
                'caption_translation' => 'required|unique:_TranslationCaptions',

            ]);


        }
        else
        {

            /*if empty  caption_translation then only these fields validation*/
            $validator = Validator::make($request->TranslationCaptions[0], [
                'language_id' => 'required|integer',
                'caption_id'  => 'required|integer',

            ]);


        }


        return $validator;

    }


    public function list(Request $request)
    {
        if(!$this->isAdmin())
            abort(403);


        $captionName = [
            'ok',
            'apply',
            'back', 'Main', 'Translations',
            'Languages', 'Caption', 'Language',
            'Translation', 'Caption', 'Language',
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);
        //get array accessMethods from  Http/Middleware/CheckAccess.php
        $methods = $request->accessMethods;

        $block_fields = [
            ['key'     => 'actions', 'sortable' => false, 'class' => 'list_checkbox',
             'thStyle' => 'width: 6%', "zone" => "1"
            ],
            ['key'     => "language_name", 'sortable' => true, 'class' => 'language_name',
             "label"   => $getArrayCaptions['Language']['translation_captions']['caption_translation'],
             'thStyle' => 'width: 30%', "zone" => "1",
            ],
            [
                'key'     => "caption_translation", 'sortable' => true, 'class' => 'caption_translation',
                "label"   => $getArrayCaptions['Translation']['translation_captions']['caption_translation'],
                'thStyle' => 'width: 30%', "zone" => "1",
            ],
        ];

        if(isset($request["dependent"]))
        {
            $translation_captions = TranslationCaption::query()
                ->where("caption_id", $request["dependent"]["id"])
                ->with(["capt", "language"])
                ->get();
        }
        else
        {
            $translation_captions = TranslationCaption::query()
                ->with(["capt", "language"])
                ->get();

            // Add caption_name column to $block_fields
            array_splice($block_fields, 1, 0, [[
                                                   'key'     => 'caption_name', 'sortable' => true, 'class' => 'caption_rem',
                                                   "label"   => $getArrayCaptions['Caption']['translation_captions']['caption_translation'],
                                                   'thStyle' => 'width: 30%', "zone" => "1",
                                               ]]);
        }

        $languages = Language::query()
            ->whereIn("language_code", ["ru", "en"])
            ->get();

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $model_elements = [];

        foreach($translation_captions as $translation_caption)
        {
            $model_elements[] = [
                "id"                  => $translation_caption->id,
                "caption_name"        => $translation_caption->capt->caption_name ?? "caption_name не найден",
                "language_name"       => $translation_caption->language->language_name,
                "caption_translation" => $translation_caption->caption_translation
            ];
        }

        $list = [

            "main_data_models" => [

                $controller->controller_alias => $model_elements,

            ],
            "add_data_models"  => [
                "Languages" => $languages
            ],
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['Translations']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => true,
                "form_type"                     => "list",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_type_list"                => [

                    "form_card_url"     => "admin/translationCaptions/card",
                    "form_search_field" => "caption_name",
                ],
            ],

            "dependent" => [
                "dependent_data_model" => $controller->controller_alias,
                "dependent_fields"     =>
                    [
                        "title"        => $getArrayCaptions['Languages']['translation_captions']['caption_translation'],
                        "model"        => "",
                        "type"         => "select",
                        "options_data" => [
                            "options_data_model"     => "Languages",
                            "options_field_id"       => "id",
                            "options_field_id_value" => "",
                            "options_field_title"    => "language_name",

                        ],
                        "width"        => "20%"
                    ],

            ],

            "tabs" => [

                [
                    "tab_title"       => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                    "blocks_quantity" => 0,
                    "blocks"          => [

                        [
                            "block_title"         => $getArrayCaptions['Translations']['translation_captions']['caption_translation'],
                            "block_zone_quantity" => 0,
                            "block_model"         => $controller->controller_alias,
                            "block_type"          => "block_list_base",
                            "block_fields"        => $block_fields
                        ]
                    ]


                ]


            ],
            "sets" => $this->getButtonsList(['list_bottom', 'list_top', 'list_top_dropdown_actions', 'list_top_left_command_bar', 'list_top_right_command_bar'])

        ];


        return response()->json($list);

    }

    function Test()
    {
        $getTest = ContractorsController::textTranslations();
    }

    public function translations()
    {
        //        \Illuminate\Support\Facades\Request::test();
        //        $test1= $request->test;

        $langLocale = Lang::locale();

        if($langLocale == "en")
        {
            $langLocale = "";
        }
        else
        {
            $langLocale;
        }
        //       $test= $this->Test();
        //        $getTest= ContractorsController::textTranslations();
        //        $controller = class_basename(Route::current()->controller);

        //        if (!empty($controller) and ($controller !="MenuController") or $controller !="AccessesController"){
        //            $getTest= $controller::textTranslations();
        //        }

        //                $getTest= ContractorsController::textTranslations();


        $texts = DB::table('_TranslationCaptions')
            ->join('_Languages', '_TranslationCaptions.language_id', '=', '_Languages.id')
            ->join('__Captions', '_TranslationCaptions.caption_id', '=', '__Captions.id')
            ->where('_Languages.language_code', config('app.locale'))
            ->select('_TranslationCaptions.caption_translation', '__Captions.caption_name')
            ->get();


        //        $captionName= [
        //            'ForgottenPassword',
        //            'Retrieve','Login','RegistrationFirstTimeHere','CreateAccount',
        //            'Create','HaveAccount','FullRegistrationForm','EnterYourEmail','Send',
        //            'RememberPassword'
        //        ];
        //
        //        $getArrayCaptions= $this->getTranslateByKeys($captionName);
        //
        //        dd($getArrayCaptions);


        return $texts;
    }
    //END get all TranslationCaptions Albert Topalu 25.10.18 12:00


    //get all TranslationCaptions Albert Topalu 25.10.18 12:00

    //    public function test(Request $request){
    //        $test= $request->test;
    //        return $test;
    //    }
}
