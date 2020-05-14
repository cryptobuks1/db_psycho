<?php


/*
 * 18.10.2018
 * Yuriy Yurenko
 * 
 * new controller named in the plural CaptionsController  */

//namespace App\Http\Controllers\Api\Admin;
namespace App\Http\Controllers\Api\TabSystem;

use App\Http\Classes\CheckController;
use App\Models\BL\PaymentInvoice;
use Exception;
use Google\Cloud\Translate\TranslateClient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Api\Controller;
use App\Models\ServerDb;
use App\Texts;
use App\Models\Caption;
use App\Models\Language;
use App\Models\TranslationCaption;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Stichoza\GoogleTranslate\GoogleTranslate;

class CaptionsController extends Controller
{

    /**
     * The language captions will be translated from
     * @var string
     */
    private $source;

    /**
     * The language captions will be translated to
     * @var string
     */
    private $target;

    /**
     * Language model object
     * @var Model|null|object
     */
    private $target_language;

    /**
     * GoogleTranslate object
     * @var GoogleTranslate
     */
    private $google_translate;

    /**
     * Foreach iteration position
     * @var integer
     */
    private $position = 0;

    /**
     * Array of id of found captions
     * @var Collection|array
     */
    private $captions_ids;

    public function index()
    {


        if(config('app.VueBlade'))
        {
            $consumer = Auth::user();

            $lang = Language::all();
            $captAll = DB::table('__Captions')
                ->select('id', 'caption_name', 'caption_rem')
                ->get();
            $capt = DB::table('__Captions')
                ->join('_TranslationCaptions', '_TranslationCaptions.caption_id', '=', '_Captions.id')
                ->join('_Languages', '_Languages.id', '=', '_TranslationCaptions.language_id')
                ->select('__Captions.caption_name', '__Captions.caption_rem', '_TranslationCaptions.*',
                    '_Languages.language_name')
                ->get();
            return response()->json([
                'consumer' => $consumer,
                'texts'    => $this->texts,
                'lang'     => $lang,
                'capt'     => $capt,
                'captAll'  => $captAll,
            ]);
        }
    }

    public function captionModalAjax(Request $request)
    {
        $caption = DB::table('__Captions')
            ->join('_TranslationCaptions', '_TranslationCaptions.caption_id', '=', '__Captions.id')
            ->join('_Languages', '_Languages.id', '=', '_TranslationCaptions.language_id')
            ->select('__Captions.caption_name', '__Captions.caption_rem', '_TranslationCaptions.*',
                '_Languages.language_name')
            ->where('_TranslationCaptions.language_id', $request->id)
            ->get();
        return response()->json($caption);
    }


    public function list(Request $request)
    {
        if(!$this->isAdmin())
            abort(403);

        $methods = $request->accessMethods;

        $captionName = [
            'ok',
            'apply',
            'back', 'Main', 'CaptionList',
            'Languages', 'Translate',
            'Caption', 'CaptionRem',
            'Rus', 'Eng'


        ];


        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $language_ru_id = Language::query()
            ->where("language_code", "ru")
            ->select("id")
            ->get()->first();

        $language_en_id = Language::query()
            ->where("language_code", "en")
            ->select("id")
            ->get()->first();


        $captions = Caption::query()
            ->orderBy("caption_name", "asc")
            ->leftJoin("_TranslationCaptions as ru_translation", function(JoinClause $join) use ($language_ru_id)
            {
                $join->on("ru_translation.caption_id", "=", "__Captions.id")
                    ->where("ru_translation.language_id", "=", $language_ru_id->id);
            })
            ->leftJoin("_TranslationCaptions as en_translation", function(JoinClause $join) use ($language_en_id)
            {
                $join->on("en_translation.caption_id", "=", "__Captions.id")
                    ->where("en_translation.language_id", "=", $language_en_id->id);
            })
            ->select("__Captions.*",
                "ru_translation.caption_translation as ru_translation",
                "en_translation.caption_translation as en_translation")
            ->get();

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();


        $list = [

            "main_data_models" => [
                $controller->controller_alias => $captions
            ],

            "form_parameters" => [
                "form_title"                    => $getArrayCaptions['CaptionList']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false, // {if true -> show field} {if false hidden field)
                "form_type"                     => "list",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_type_list"                => [
                    //                    "form_card_url" => "/admin/captions/card",
                    "form_card_url"     => "/captions", // edit Albert Topalu 23.10.18 10:04
                    "form_search_field" => "caption_name",
                ],
            ],
            "links"           => [

                ["link_title" => $getArrayCaptions['Languages']['translation_captions']['caption_translation'],
                 "link_url"   => "/languages", "class" => "link btn btn-link", "link_type" => "internal_push", "img" => ""],
                ["link_title" => $getArrayCaptions['Translate']['translation_captions']['caption_translation'],
                 "link_url"   => "/translationCaptions", "class" => "link btn btn-link", "link_type" => "internal_push", "img" => ""],
            ],
            "tabs"            => [
                [
                    "blocks_quantity" => 0,
                    "blocks"          => [

                        [
                            "block_title"         => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                            "block_zone_quantity" => 0,
                            "block_model"         => $controller->controller_alias,
                            "block_type"          => "block_list_base",
                            "block_fields"        => [
                                /*list fields zone 1*/
                                ['key' => 'actions', 'sortable' => false, 'class' => 'list_checkbox', 'thStyle' => 'width: 6%', "zone" => "1"],
                                ['key'   => 'caption_name', 'sortable' => true, 'class' => 'caption_name',
                                 "label" => $getArrayCaptions['Caption']['translation_captions']['caption_translation'], 'thStyle' => 'width: 23%', "zone" => "1"
                                ],

                                ['key'     => 'caption_rem', 'sortable' => true, 'class' => 'caption_rem',
                                 "label"   => $getArrayCaptions['CaptionRem']['translation_captions']['caption_translation'],
                                 'thStyle' => 'width: 23%', "zone" => "1"],

                                ['key'     => 'ru_translation', 'sortable' => true, 'class' => 'caption_rem',
                                 "label"   => $getArrayCaptions['Rus']['translation_captions']['caption_translation'],
                                 'thStyle' => 'width: 23%', "zone" => "1"],

                                ['key'     => 'en_translation', 'sortable' => true, 'class' => 'caption_rem',
                                 "label"   => $getArrayCaptions['Eng']['translation_captions']['caption_translation'],
                                 'thStyle' => 'width: 23%', "zone" => "1"],

                            ]
                        ]
                    ]
                ]

            ],
            "sets"            => $this->getButtonsList(['list_bottom', 'list_top', 'list_top_dropdown_actions', 'list_top_left_command_bar', 'list_top_right_command_bar'])


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
            'back', 'Main', 'CaptionList',
            'Languages', 'Translate',
            'Caption', 'CaptionRem', 'CaptionCode',
            'SystemDetails', 'CreatedAt', 'CreatedBy', 'UpdatedAt', 'UpdatedBy',
            'AddNewCaption', 'Translations'
        ];


        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $caption_id = $request->id;

        if($caption_id == "new")
            $caption = Caption::getNewObject();
        else
            $caption = Caption::query()
                ->where("id", $caption_id)
                ->withCount("allTranslations")
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
                        "block_zone_quantity" => 1,
                        "block_model"         => $controller->controller_alias,
                        "block_type"          => "block_card",
                        "block_fields"        => [
                            ['title' => $getArrayCaptions['Caption']['translation_captions']['caption_translation'], 'model_name'=>$controller->controller_alias,'model' => 'caption_name', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "1"],
                            ['title' => $getArrayCaptions['CaptionRem']['translation_captions']['caption_translation'], 'model_name'=>$controller->controller_alias,'model' => 'caption_rem', 'type' => 'text', 'width' => '50%', "zone" => "1", "order" => "2"],
                        ]
                    ]
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
                $controller->controller_alias => [$caption]
            ],
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['CaptionCode']['translation_captions']['caption_translation'],
                "form_code"                     => "captions",
                "form_is_dependent"             => false, // {if true -> show field} {if false hidden field)
                "form_type"                     => "card",
                "form_base_data_model"          => "Captions",
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name"     => $caption_id == "new" ? $getArrayCaptions['AddNewCaption']['translation_captions']['caption_translation'] : $caption["caption_name"],
                "form_type_list"                => [
                    "form_card_url"     => "/admin/captions/card",
                    "form_search_field" => "language_name",
                ],
            ],

            "tabs" => $tabs,
            "sets" => $this->getButtonsList(["card_actions"])
        ];

        if($caption_id !== "new")
        {
            $card["links"] = [
                [
                    // TODO replace by caption
                    "link_title" => $getArrayCaptions['Translations']['translation_captions']['caption_translation'] . " ({$caption->all_translations_count})",
                    "link_img"   => "",
                    "link_type"  => "internal_push",
                    "link_url"   => "/translationCaptions"
                ],
            ];
        }


        return response()->json($card);
    }

    //End Edit cod Albert Topalu 23.10.18 11:42


    public function update(Request $request)
    {

        $model = $request->Captions[0];


        return Caption::where('id', $model['id'])->update([
            'caption_name' => $model['caption_name'],
            'caption_rem'  => $model['caption_rem'],

        ]);

    }


    public function insert(Request $request)
    {

        //get array accessMethods from  Http/Middleware/CheckAccess.php
        $methods = $request->accessMethods;

        $validator = Validator::make($request->all(), [
            'caption_name' => 'required|unique:__Captions',

        ]);

        if($validator->fails())
        {

            $response = [

                "status"  => 1,
                "message" => $validator->messages(),
            ];

            return response()->json($response);
        }

        $result = Caption::create([
            'caption_name' => $request->caption_name,
            'caption_rem'  => $request->caption_rem,

        ]);

        return $result;

    }


    /*public function delete(Request $request)
    {
        //get array accessMethods from  Http/Middleware/CheckAccess.php
        $methods = $request->accessMethods;
 


        return Caption::where('id', $request->id)->delete();

    }*/

    /**
     * @throws Exception
     */
    public function translateCaptions()
    {
        //        $project_id = "skillful-cider-253911";
        //
        //        $translate = new TranslateClient([
        //            "projectId" => $project_id,
        ////            "key" => "AIzaSyCXd3M-Cb0KvyBMKTNS23nfaowez6l51Go"
        //        ]);
        //
        //        $translations = $translate->translateBatch(["Hello world"], [
        //            "source" => "en",
        //            "target" => "ru"
        //        ]);
        //        return $translations;


        $captions_ids = [5, 7, 9];
        $captions_ids = array_keys(array_fill(0, 1000, null));

        $this->source = "en";

        // The language captions will be translated to
        $this->target = "de";

        $this->target_language = Language::query()->where("language_code", $this->target)
            ->first();

        if(is_null($this->target_language))
            throw new Exception("Язык " . $this->target . " небыл найден в базе");

        // Define new GoogleTranslate object
        //        $this->google_translate = new GoogleTranslate($this->target, $this->source);

        $captions = Caption::query()
            ->whereIn("__Captions.id", $captions_ids)
            ->join("_Languages", function(JoinClause $join)
            {
                $join->where("language_code", "=", $this->source);
            })
            ->join("_TranslationCaptions as translation_captions", function(JoinClause $join)
            {
                $join->on("translation_captions.language_id", "=", "_Languages.id")
                    ->on("translation_captions.caption_id", "=", "__Captions.id");
            })
            ->groupBy("__Captions.id", "translation_captions.caption_translation")
            ->select("__Captions.id", "translation_captions.caption_translation",
                DB::raw("char_length(translation_captions.caption_translation) as length"))
            ->get();

        $this->captions_ids = $captions->pluck("id");

        $captions_translation = $captions->pluck("caption_translation");

        // String that will be translated
        //        $imploded_translations = $captions_translation->implode("\n");

        $str_len = $captions->sum("length");

        // Maximum allowed string length in GoogleTranslate
        $max_str_len = 4000;

        if($str_len > $max_str_len)
        {
            // Reset captions ids
            $this->captions_ids = [];

            $strings_to_translate = [];
            $strings_length = 0;

            foreach($captions as $caption)
            {
                if($strings_length + $caption->length >= $max_str_len)
                {
                    // Translate
                    $this->translateAndSaveCaptions($strings_to_translate);

                    // Set captions_ids, $strings_to_translate and $strings_length to last caption
                    // because current caption was not translated now and we need to translate it later
                    $this->captions_ids = [$caption->id];
                    $strings_to_translate = [$caption->caption_translation];
                    $strings_length = $caption->length;
                }
                else
                {
                    // Add translation to $strings_to_translate and continue
                    array_push($this->captions_ids, $caption->id);

                    // Add caption_translation to the array
                    array_push($strings_to_translate, $caption->caption_translation);

                    $strings_length += $caption->length;
                }
            }
        }
        else
        {
            $this->translateAndSaveCaptions($captions_translation);
        }

        //        if($str_len > $max_str_len)
        //        {
        //            // Count of string chunks
        //            $chunks_count = $str_len % $max_str_len;
        //
        //            $count = $captions->count();
        //
        //            $captions->chunk($count / $chunks_count + 1)->map(function(Collection $chunked_translation)
        //            {
        //                $this->captions_ids = $chunked_translation->pluck("id");
        //
        //                $imploded_translations = $chunked_translation->implode("caption_translation", "\n");
        //
        //                $this->translateAndSaveCaptions($imploded_translations);
        //            });
        //        }
        //        else
        //        {
        //            $this->translateAndSaveCaptions($imploded_translations);
        //        }


    }

    private function translateAndSaveCaptions($strings_to_translate)
    {
        //        // Translate captions and explode the result into array
        //        $translated_captions = explode("\n", $this->google_translate->translate($strings_to_translate));
        //
        //        foreach($translated_captions as $translated_caption)
        //        {
        //            $translation_caption = new TranslationCaption();
        //
        //            $translation_caption->caption_id = $this->captions_ids[$this->position];
        //            $translation_caption->language_id = $this->target_language->id;
        //            $translation_caption->caption_translation = $translated_caption;
        //
        //            $translation_caption->save();
        //            $this->position++;
        //        }
        //
        //        // Reset position
        //        $this->position = 0;
    }


}
