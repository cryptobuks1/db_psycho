<?php

/** create controller
 * @author Albert Topalu 25.10.18
 * y.yurenko  29.10.2018
 */

namespace App\Http\Controllers\TabTranslation;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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





    public function card(Request $request) {
        
        
        
        
        $captionName= [
            'ok',
            'apply',
            'back','Main','Translation',
            'Languages','Caption','Translations',
        ];
        
        $getArrayCaptions= $this->getTranslateByKeys($captionName);

        $methods = $request->accessMethods;
        
        $TranslationCaptions = DB::table('_TranslationCaptions')
            ->join('__Captions', '_TranslationCaptions.caption_id', '=', '__Captions.id')
            ->join('_Languages', '_Languages.id', '=', '_TranslationCaptions.language_id')
            ->select('__Captions.*', '_TranslationCaptions.*','_Languages.language_code',"_Languages.language_name")
            ->where('_TranslationCaptions.id', $request->id)
            ->get()->toarray();

        $languageId = $request->language_id;
        $Languages = Language::select('id','language_name')->get()->toarray();

        $Captions = DB::table('__Captions')
            ->leftJoin('_TranslationCaptions', '_TranslationCaptions.caption_id', '=', '__Captions.id')
            ->select('__Captions.id', '__Captions.caption_name')
            ->whereNull('_TranslationCaptions.caption_id')
            ->get()->toarray();

                
        foreach ($methods as $key=>$value){

            if (isset($value) and ($value == "read") ){    
                $card = [

                    "main_data_models" => [

                        "TranslationCaptions" => $TranslationCaptions,

                    ],
                    "add_data_models" => [

                        "Languages" => $Languages,
                        "Captions" => $Captions,

                    ],
                    "form_parameters" => [  
                        "form_title" => $getArrayCaptions['Translation']['translation_captions']['caption_translation'],
                        "form_code" => "translationCaptions",
                        "form_is_dependent" => true,
                        "form_type" => "card",
                        "form_base_data_model" => "TranslationCaptions",
                        "form_main_data_model_id_field" => "id",
                        "form_main_data_model_name" => $TranslationCaptions[0]->caption_name,
                        "form_type_list" => [
                            "form_list_url" => "admin/translationCaptions/list",
                            "form_search_field" => "caption_name",
                        ],
                    ],
                    "actions" => [

                        "actions_card" =>
                            [
                                //["title" => $getArrayCaptions['ok']['translation_captions']['caption_translation'], "code" => "save", "class" => "btn btn-green", "link" => "/admin/translationCaptions/update", "img" => ""],
                                //["title" => $getArrayCaptions['apply']['translation_captions']['caption_translation'], "code" => "apply", "class" => "btn btn-green", "link" => "/admin/translationCaptions/update", "img" => ""],
                                ["title" => $getArrayCaptions['back']['translation_captions']['caption_translation'], "code" => "back", "class" => "btn btn-grey", "link" => "", "img" => ""],
                            ]
                    ],
                        "dependent" =>[
                        "dependent_data_model" => "TranslationCaptions",
                        "dependent_fields" =>
                            [   
                                "title" => $getArrayCaptions['Languages']['translation_captions']['caption_translation'],
                                "model" => "language_id", // это поле не может быть пустым, так как по нему   языка из верхнего селекта записывается в основную модель
                                "type" => "lt-select",
                                "options" =>[],
                                "options_data" => [
                                    "options_data_model"      => "Languages",
                                    "options_field_id"        => "id",
                                    "options_field_id_value"  => "",
                                    "options_field_title"     => "language_name",
                                    "search" => ''
                                ],
                            ],

                        "width" => "100%"

                    ],
                    "tabs" => [

                        [       

                            "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                            "blocks_quantity" => 1,
                            "blocks" =>[

                                [       
                                    "block_title" => $getArrayCaptions['Translation']['translation_captions']['caption_translation'],
                                    "block_zone_quantity" => 2,
                                    "block_model" => "TranslationCaptions",
                                    "block_type" => "block_card",
                                    "block_fields" => [

                                                
                                        [
                                            'title' => $getArrayCaptions['Caption']['translation_captions']['caption_translation'],
                                            'model' => 'caption_name',
                                            'width' =>'100%', 
                                            'type'=>'label',
                                            'zone'=>'1',
                                            'order'=>'1'
                                        ],
                                            
                                        [
                                            'title' => $getArrayCaptions['Translation']['translation_captions']['caption_translation'],
                                            'model' => 'caption_translation',
                                            'width' =>'100%', 
                                            'type'=>'label',
                                            'zone'=>'2',
                                            'order'=>'2'
                                        ],

                                    ]


                                ]

                            ]
                        ]

                    ]
                ];

               

            }
            if (isset($value) and  (($value == "update")) ){
                    
                $card = [
                    
                    "main_data_models" => [

                        "TranslationCaptions" => $TranslationCaptions, //тут должна быть только один обьект языка, а не вся таблица

                    ],
                    "add_data_models" => [

                        "Languages" => $Languages,
                        "Captions" => $Captions,

                    ],          
                    "form_parameters" => [
                        "form_title" => $getArrayCaptions['Translation']['translation_captions']['caption_translation'],
                        "form_code" => "translationCaptions",
                        "form_is_dependent" => true,
                        "form_type" => "card",
                        "form_base_data_model" => "TranslationCaptions",
                        "form_main_data_model_name" => $TranslationCaptions[0]->caption_name,
//                        "form_main_data_model_name" => $TranslationCaptions[0]['caption_translation'],
                        "form_type_list" => [
                            "form_list_url" => "admin/translationCaptions/list",
                            "form_search_field" => "caption_name",
                        ],
                    ],
                    "actions" => [

                        "actions_card" =>
                            [
                                ["title" => $getArrayCaptions['ok']['translation_captions']['caption_translation'], "code" => "save", "class" => "btn btn-green", "link" => "/admin/translationCaptions/update", "img" => ""],
                                ["title" => $getArrayCaptions['apply']['translation_captions']['caption_translation'], "code" => "apply", "class" => "btn btn-green", "link" => "/admin/translationCaptions/update", "img" => ""],
                                ["title" => $getArrayCaptions['back']['translation_captions']['caption_translation'], "code" => "back", "class" => "btn btn-grey", "link" => "", "img" => ""],
                            ]
                    ],
                    "dependent" =>[
                        "dependent_data_model" => "TranslationCaptions",
                        "dependent_fields" =>
                            [   
                                "title" => $getArrayCaptions['Languages']['translation_captions']['caption_translation'],
                                "model" => "language_id", // это поле не может быть пустым, так как по нему   языка из верхнего селекта записывается в основную модель
                                "type" => "lt-select",
                                "options" =>[],
                                "options_data" => [
                                    "options_data_model"      => "Languages",
                                    "options_field_id"        => "id",
                                    "options_field_id_value"  => "",
                                    "options_field_title"     => "language_name",
                                    "search" => ''
                                ],
                            ],
                        //обьект внизу не совсем корректен
//                        "data" => [
//                            "data_model" => "Languages",
//                            "field_id" => "id",
//                            "field_id_value" =>$languageId,
//                            "field_title" => "language_name",
//                        ],
                        "width" => "100%"

                    ],
                    "tabs" => [

                        [       

                            "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                            "blocks_quantity" => 1, //не может быть 0
                            "blocks" =>[
                                        
                                [
                                    "block_title" => $getArrayCaptions['Translations']['translation_captions']['caption_translation'],
                                    "block_zone_quantity" => 2,// по описанию тут должно быть 2 зоны
                                    "block_model" => "TranslationCaptions",
                                    "block_type" => "block_card",
                                    "block_fields" => [

                                                
                                        [
                                            'title' => $getArrayCaptions['Caption']['translation_captions']['caption_translation'],
                                            'model' => 'caption_name',
                                            'width' =>'100%',
                                            'type'=>'label',
                                            'zone'=>'1',
                                            'order'=>'1'
                                        ],
                                                   
                                        [
                                            'title' => $getArrayCaptions['Translation']['translation_captions']['caption_translation'],
                                            'model' => 'caption_translation',
                                            'width' =>'100%', 
                                            'type'=>'text',
                                            'zone'=>'2',
                                            'order'=>'2'
                                        ],

                                    ]


                                ]

                            ]
                        ]

                    ]
                ];



            }

        }
        //return var_dump("<pre>",$card,"</pre>");
        return response()->json($card);
    }


    public function update(Request $request) {


        /*result of our validate rules*/
        $validator = $this->applyValidator($request);


        if ($validator->fails()) {

            $response =[

                "status"=>1,
                "message" => $validator->messages(),
            ];

            return response()->json($response);
        }

        $model = $request->TranslationCaptions[0];

        if (config('app.VueBlade')) {



            /*if good and valid update record*/
            return TranslationCaption::where('id', $model['id'])->update(
                [
                    'language_id' => $model['language_id'],
                    'caption_id' => $model['caption_id'],
                    'caption_translation' =>$model['caption_translation'],
                ]
            );
        }
        else{


            /*if good and valid create record*/
            TranslationCaption::where('id',$request->idServer)->update(
                [
                    'language_id' => $request->language_id,
                    'caption_id' => $request->caption_id,
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
    public function insert(Request $request) {



        /*result of our validate rules*/
        $validator = $this->applyValidator($request);


        if ($validator->fails()) {

            $response =[

                "status"=>1,
                "message" =>$validator->messages(),
            ];

            return response()->json($response);
        }


        $model = $request->TranslationCaptions[0];
        /*if success all access checks  */
        if (config('app.VueBlade')) {
            /*if Vue and data is not valid send a message*/

            /*if not exist and rules is valid add record*/
            return TranslationCaption::create([

                'language_id' => $model['language_id'],
                'caption_id' => $model['caption_id'],
                'caption_translation' =>$model['caption_translation'],

            ]);

        }
        else{

            /*if good and valid create record*/
            TranslationCaption::create([
                'language_id' => $request->language_id,
                'caption_id' => $request->caption_id,
                'caption_translation' => $request->caption_translation,
            ]);
            return back()->with('alert', trans('messages.createDb'));
        }



    }

    public function applyValidator(Request $request){

        /*validation rules*/
        if(!empty($request->caption_translation)){
            /*if not empty caption_translation then unique validation*/
            $validator = Validator::make($request->TranslationCaptions[0], [

                'language_id' => 'required|integer',
                'caption_id' => 'required|integer',
                'caption_translation' => 'required|unique:_TranslationCaptions',

            ]);


        }else{

            /*if empty  caption_translation then only these fields validation*/
            $validator = Validator::make($request->TranslationCaptions[0], [
                'language_id' => 'required|integer',
                'caption_id' => 'required|integer',

            ]);


        }



        return  $validator;

    }



    public function list(Request $request){

        

        $captionName= [
            'ok',
            'apply',
            'back','Main','Translations',
            'Languages','Caption','Language',
            'Translation','Caption','Language',
        ];
        
        $getArrayCaptions= $this->getTranslateByKeys($captionName);
        //get array accessMethods from  Http/Middleware/CheckAccess.php
        $methods = $request->accessMethods;


        $TranslationCaptions = DB::table('_TranslationCaptions')
            ->join('__Captions', '_TranslationCaptions.caption_id', '=', '__Captions.id')
            ->join('_Languages', '_Languages.id', '=', '_TranslationCaptions.language_id')
            ->select('__Captions.*', '_TranslationCaptions.*','_Languages.language_code','_Languages.language_name')
            ->get();

        $Languages = Language::select('id','language_name')->get()->toarray();

        /*get only captions which havent translate */
        $Captions = DB::table('__Captions')
            ->leftJoin('_TranslationCaptions', '_TranslationCaptions.caption_id', '=', '__Captions.id')
            ->select('__Captions.id', '__Captions.caption_name')
            ->whereNull('_TranslationCaptions.caption_id')
            ->get()->toarray();

        $list = [

            "main_data_models" => [

                "TranslationCaptions" => $TranslationCaptions,

            ],
            // Bogdan Yartsun 15:56 08.11.2018
            //"add_data_models" => [

              // "Languages" => $Languages,
               //"Captions" => $Captions,

          //  ],
            // Bogdan Yartsun 14:52 05.11.2018
            "form_parameters" => [ 
                "form_title" => $getArrayCaptions['Translations']['translation_captions']['caption_translation'],
                "form_code" => "translationCaptions",
                "form_is_dependent" => true,
                "form_type" => "list",
                "form_base_data_model" => "TranslationCaptions",
                "form_main_data_model_id_field" => "id",
                "form_type_list" => [

                    "form_card_url" => "admin/translationCaptions/card",
                    "form_search_field" => "caption_name",
                ],
            ],

            "dependent" =>[
                "dependent_data_model" => "",
                // Bogdan Yartsun 14:53 05.11.2018
                "dependent_fields" =>
                    [               
                        "title" => $getArrayCaptions['Languages']['translation_captions']['caption_translation'],
                        "model" => "",
                        "type" => "select",
                        "options_data" => [
                            "options_data_model" => "Languages",
                            "options_field_id" => "id",
                            "options_field_id_value" =>"",
                            "options_field_title" => "language_name",

                        ],
                        "width" => "20%"
                    ],
                // Bogdan Yartsun 14:53 05.11.2018

            ],

            "tabs"=>[
                            
                [
                    "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                    "blocks_quantity" => 0,
                    "blocks" => [
                               
                        [
                            "block_title" => $getArrayCaptions['Translations']['translation_captions']['caption_translation'],
                            "block_zone_quantity" => 0,
                            "block_model" => "TranslationCaptions",
                            "block_type" => "block_list_base",
                            "block_fields" => [
                                // Bogdan Yartsun 14:54 05.11.2018
                                [   'key' => 'actions',
                                    'sortable' => false,
                                    'class' => 'list_checkbox',
                                    'thStyle'=> 'width: 6%',
                                    "zone" => "1"
                                ],
                                // Bogdan Yartsun 14:52 05.11.2018
                                [
                                    'key' => 'caption_name',
                                    'sortable' => true,
                                    'class' => 'caption_rem',
                                    "label"=> $getArrayCaptions['Caption']['translation_captions']['caption_translation'],
                                    'thStyle'=> 'width: 30%',
                                    "zone" => "1",

                                ],          

                                [   'key' => 'language_name',
                                    'sortable' => true,
                                    'class' => 'language_name',
                                    "label" => $getArrayCaptions['Language']['translation_captions']['caption_translation'],
                                    'thStyle'=> 'width: 30%',
                                    "zone" => "1",

                                ],          
                                [
                                    'key' => 'caption_translation',
                                    'sortable' => true,
                                    'class' => 'caption_translation',
                                    "label"=> $getArrayCaptions['Translation']['translation_captions']['caption_translation'],
                                    'thStyle'=> 'width: 30%',
                                    "zone" => "1",

                                ],

                            ]
                        ]
                    ]


                ]


            ]

        ];


        return response()->json($list);

    }

    function Test()
    {
        $getTest= ContractorsController::textTranslations();
    }

    public function translations(){
//        \Illuminate\Support\Facades\Request::test();
//        $test1= $request->test;

        $langLocale =  Lang::locale();

        if ($langLocale == "en"){
            $langLocale= "";
        }else{
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
