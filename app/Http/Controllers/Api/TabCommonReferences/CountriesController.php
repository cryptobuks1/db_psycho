<?php

namespace App\Http\Controllers\Api\TabCommonReferences;

use App\Http\Classes\CheckController;
use App\Models\Country;
use App\Http\Controllers\Api\Controller;
use App\Models\Region;
use App\Texts;
use App\Models\Language;
use App\Http\Classes\ConsumerParameters;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Validator;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PragmaRX\Countries\Package\Countries;


class CountriesController extends Controller
{
    public function index()
    {
        if(config('app.VueBlade'))
        {
            $consumer = Auth::user();
            //            $texts = DB::table('_TranslationCaptions')
            //                ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
            //                ->join('_captions', '_TranslationCaptions.caption_id', '=', '_captions.id')
            //                ->where('languages.language_code', config('app.locale'))
            //                ->get();

            $texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();

            $countriesAll = Country::with('regions')->get();
            return response()->json([
                'consumer'     => $consumer,
                'texts'        => $texts,
                'countriesAll' => $countriesAll
            ]);
        }
        else
        {
            $consumer = Auth::user();
            //                    $texts = DB::table('_TranslationCaptions')
            //                        ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
            //                        ->join('_captions', '_TranslationCaptions.caption_id','=','_captions.id')
            //                        ->where('languages.language_code', config('app.locale'))
            //                        ->get();
            $texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();


            $countriesAll = Country::with('regions')->get();

            return view('/auth.admin.page.country-region',
                compact('texts', 'consumer', 'countriesAll'));
        }
    }

    public function update(Request $request)
    {
        if(config('app.VueBlade'))
        {

            $model = $request->Countries[0];

            return Country::where('id', $model['id'])->update(
                [
                    'country_name'        => $model['country_name'],
                    'country_full_name'   => $model['country_full_name'],
                    'country_code'        => $model['country_code'],
                    'country_code_alpha2' => $model['country_code_alpha2'],
                    'country_code_alpha3' => $model['country_code_alpha3'],
                    'updated_by'          => (new ConsumerParameters())->consumerCode(),
                    //'suser_name' => $request->suser_name,
                ]
            );
        }
        else
        {
            Country::where('id', $request->idCountry)->update(
                [
                    'country_name'        => $request->countryName,
                    'country_full_name'   => $request->countryFullName,
                    'country_code'        => $request->countryCode,
                    'country_code_alpha2' => $request->countryCodeAlpha2,
                    'country_code_alpha3' => $request->countryCodeAlpha3,
                    'suser_name'          => $request->countrySuserName,
                ]
            );
            return back()->with('alert', trans('messages.saved'));
        }
    }

    public function old_insert(Request $request)
    {
        //        if (config('app.VueBlade')) {
        //
        //            $validator = Validator::make($request->all(), [
        //                'country_name' => 'required|unique:_Countries',
        //
        //            ]);
        //
        //            if ($validator->fails()) {
        //
        //                $response = [
        //
        //                    "status" => 1,
        //                    "message" => $validator->messages(),
        //                ];
        //
        //                return response()->json($response);
        //            }
        //
        //            return Country::create([
        //                'country_name' => $request->country_name,
        //                'country_full_name' => $request->country_full_name,
        //                'country_code' => $request->country_code,
        //                'country_code_alpha2' => $request->country_code_alpha2,
        //                'country_code_alpha3' => $request->country_code_alpha3,
        //                'created_by' => (new ConsumerParameters())->consumerCode(),
        //                //'suser_name' => $request->suser_name,
        //            ]);
        //        } else {
        //            Country::create([
        //                'country_name' => $request->addCountryName,
        //                'country_full_name' => $request->addCountryFullName,
        //                'country_code' => $request->addCountryCode,
        //                'country_code_alpha2' => $request->addCountryCodeAlpha2,
        //                'country_code_alpha3' => $request->addCountryCodeAlpha3,
        //                'suser_name' => $request->addCountrySuserName,
        //            ]);
        //            return back()->with('alert', trans('messages.createCountry'));
        //        }
    }

    public function insert(Request $request)
    {


        $model = $request->Countries[0];

        $NewCountry = new  Country();
        $NewCountry->country_name = $model['country_name'];
        $NewCountry->country_full_name = $model['country_full_name'];
        $NewCountry->country_code = $model['country_code'];
        $NewCountry->country_code_alpha2 = $model['country_code_alpha2'];
        $NewCountry->country_code_alpha3 = $model['country_code_alpha3'];
        $NewCountry->own_doc_types_l = $model['own_doc_types_l'];
        $NewCountry->created_by = (new ConsumerParameters())->consumerCode();
        $NewCountry->updated_by = (new ConsumerParameters())->consumerCode();
        $NewCountry->deleted_l = 0;
        $NewCountry->save();

        return $NewCountry->id;

        //        if (config('app.VueBlade')) {
        //
        //            $validator = Validator::make($request->all(), [
        //                'country_name' => 'required|unique:_Countries',
        //
        //            ]);
        //
        //            if ($validator->fails()) {
        //
        //                $response = [
        //
        //                    "status" => 1,
        //                    "message" => $validator->messages(),
        //                ];
        //
        //                return response()->json($response);
        //            }
        //
        //            return Country::create([
        //                'country_name' => $request->country_name,
        //                'country_full_name' => $request->country_full_name,
        //                'country_code' => $request->country_code,
        //                'country_code_alpha2' => $request->country_code_alpha2,
        //                'country_code_alpha3' => $request->country_code_alpha3,
        //                'created_by' => (new ConsumerParameters())->consumerCode(),
        //                //'suser_name' => $request->suser_name,
        //            ]);
        //        } else {
        //            Country::create([
        //                'country_name' => $request->addCountryName,
        //                'country_full_name' => $request->addCountryFullName,
        //                'country_code' => $request->addCountryCode,
        //                'country_code_alpha2' => $request->addCountryCodeAlpha2,
        //                'country_code_alpha3' => $request->addCountryCodeAlpha3,
        //                'suser_name' => $request->addCountrySuserName,
        //            ]);
        //            return back()->with('alert', trans('messages.createCountry'));
        //        }
    }


    public function ModalAjax(Request $request)
    {
        return $data = Country::where('id', $request->id)->get();
    }
    /////////////////////////////for blade/////////////////////////////////////////
    //   public function index(){
    //        $consumer = Auth::user();
    //
    //        $texts = DB::table('_TranslationCaptions')
    //            ->join('languages', '_TranslationCaptions.language_id', '=', 'languages.id')
    //            ->join('_captions', '_TranslationCaptions.caption_id','=','_captions.id')
    //            ->where('languages.language_code', config('app.locale'))
    //            ->get();
    //
    //         $countriesAll = Country::with('regions')->get();
    //
    //      return view('/auth.admin.page.country-region',
    //            compact('texts','consumer','countriesAll'));
    //    }
    //
    //    public function update(Request $request){
    //        Country::where('id',$request->idCountry)->update(
    //            [
    //                'country_name' => $request->countryName,
    //                'country_full_name' => $request->countryFullName,
    //                'country_code' => $request->countryCode,
    //                'country_code_alpha2' => $request->countryCodeAlpha2,
    //                'country_code_alpha3' => $request->countryCodeAlpha3,
    //                'suser_name' => $request->countrySuserName,
    //            ]
    //        );
    //        return back()->with('alert', trans('messages.saved'));
    //     }
    //
    //    public function insert(Request $request){
    //      Country::create([
    //            'country_name' => $request->addCountryName,
    //            'country_full_name' => $request->addCountryFullName,
    //            'country_code' => $request->addCountryCode,
    //            'country_code_alpha2' => $request->addCountryCodeAlpha2,
    //            'country_code_alpha3' => $request->addCountryCodeAlpha3,
    //            'suser_name' => $request->addCountrySuserName,
    //        ]);
    //         return back()->with('alert', trans('messages.createCountry'));
    //    }
    //
    //    public function delete(Request $request){
    //        $delMsg = Country::where('id',$request['deleteCountryId'])->with('regions')->get()->first();
    //        if (count($delMsg->regions) > 0){
    //            return back()->with('alert', trans('messages.deleteFirstRegion'));
    //        }
    //        elseif (count($delMsg->regions) == 0) {
    //            $delMsg->delete();
    //            return back()->with('alert',trans('messages.remotely'));
    //        }
    //    }
    //    public function ModalAjax(Request $request){
    //        $data= Country::where('id',$request->id)->get();
    //        return response()->json($data);
    //    }

    public function regionsList(Request $request)
    {
        if(!$this->isAdmin())
            abort(403);
        /*
         y.yurenko*
         method returns json with list or regions in the country card
         *
         */

        $methods = $request->accessMethods;

        $captionName = [
            'ok',
            'apply',
            'back', 'Main',
            'Countries', 'Regions',
            'Name', 'Code',
            'SystemDetails', 'Country',
            'RegionName', 'RegionCode',
            'RegionCodeAlphaShort', 'RegionCodeAlphaFull',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy',


        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $country = Country::query()->find($request->id);

        $Regions = DB::table('_Regions')
            ->join('_Countries', '_Regions.country_id', '=', '_Countries.id')
            ->select('_Regions.*', "_Countries.country_name")
            ->where('_Regions.country_id', $request->id)
            ->get()->toArray();

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        // $Countries = Country::where('id', $request->id)->get()->all();


        $list = [

            "main_data_models" => [

                $controller->controller_alias => $Regions,

            ],
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['Regions']['translation_captions']['caption_translation'],
                "form_code"                     => "countries/X/regions",
                "form_is_dependent"             => true,
                "form_type"                     => "list",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_type_list"                => [

                    "form_card_url"     => "countries/regionsList",
                    "form_search_field" => "country_name",
                ],
            ],
            "sets"             => $this->getButtonsList(['list_bottom', 'list_top', 'list_top_dropdown_actions', 'list_top_left_command_bar', 'list_top_right_command_bar']),
            "dependent"        => [
                "dependent_data_model" => $controller->controller_alias,
                "dependent_fields"     => [
                    "title" => $getArrayCaptions['Country']['translation_captions']['caption_translation'],
                    "current_value" => $country->country_name ?? "Country was not found",

                    "model" => "country_name",
                    "type"  => "label",
                    "width" => "100%"
                ]
            ],
            "tabs"             => [
                [
                    "tab_title"       => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                    "blocks_quantity" => 1,
                    "blocks"          => [
                        [
                            "block_title"         => $getArrayCaptions['Regions']['translation_captions']['caption_translation'],
                            "block_zone_quantity" => 1,
                            "block_model"         => $controller->controller_alias,
                            "block_type"          => "block_list_base",
                            "block_fields"        => [
                                [
                                    'key'      => 'actions', 'type'    => 'checkbox','sortable' => false,'class'    => 'list_checkbox',
                                    'thStyle'  => 'width: 6%',"zone"     => "1","order"    => "1"
                                ],
                                [
                                    'key'      => 'region_name','sortable' => true,'class'    => 'region_name',
                                    'label'    => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 50%',"zone"     => "1","order"    => "3"
                                ],

                                [
                                    'key'      => 'region_code','sortable' => true,'class'    => 'region_code',
                                    'label'    => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 22%',"zone"     => "1","order"    => "4"
                                ],
                                [
                                    'key'      => 'region_code_alpha','sortable' => true,'class'    => 'region_code_alpha',
                                    'label'    => $getArrayCaptions['RegionCodeAlphaShort']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 22%',"zone"     => "1","order"    => "5"
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
            'CountryName', 'SystemDetails',
            'CountryFullName', 'CountryCodeFull',
            'CountryCode2Full', 'CountryCode3Full',
            'CreatedAt', 'Regions',
            'CreatedBy', 'UpdatedAt', 'UpdatedBy',
            'CreationDetails', 'BlockCountryAddNew'


        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $country_id = $request->id;
        if($country_id == "new")
            $country = Country::getNewObject();
        else
            $country = Country::query()
                ->find($country_id);

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
                                'title' => $getArrayCaptions['CountryName']['translation_captions']['caption_translation'],
                                'model_name'=>$controller->controller_alias,'model' => 'country_name', 'width' => '100%', 'type' => 'text',
                                'zone'  => '1', 'order' => '1'
                            ],
                            [
                                'title' => $getArrayCaptions['CountryFullName']['translation_captions']['caption_translation'],
                                'model_name'=>$controller->controller_alias,'model' => 'country_full_name', 'width' => '100%', 'type' => 'text',
                                'zone'  => '1', 'order' => '2'
                            ],
                            [
                                'title' => $getArrayCaptions['CountryCodeFull']['translation_captions']['caption_translation'],
                                'model_name'=>$controller->controller_alias,'model' => 'country_code', 'width' => '33%', 'type' => 'text',
                                'zone'  => '1', 'order' => '3'
                            ],
                            [
                                'title' => $getArrayCaptions['CountryCode2Full']['translation_captions']['caption_translation'],
                                'model_name'=>$controller->controller_alias,'model' => 'country_code_alpha2', 'width' => '33%', 'type' => 'text',
                                'zone'  => '1', 'order' => '4'
                            ],
                            [
                                'title' => $getArrayCaptions['CountryCode3Full']['translation_captions']['caption_translation'],
                                'model_name'=>$controller->controller_alias,'model' => 'country_code_alpha3', 'width' => '33%', 'type' => 'text',
                                'zone'  => '1', 'order' => '5'
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
                             'model_name'=>$controller->controller_alias,'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1",
                             "order" => "1"
                            ],

                            ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'],
                             'model_name'=>$controller->controller_alias,'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1",
                             "order" => "2"
                            ],

                            ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'],
                             'model_name'=>$controller->controller_alias,'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2",
                             "order" => "1"
                            ],

                            ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'],
                             'model_name'=>$controller->controller_alias,'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2",
                             "order" => "2"
                            ],

                        ]
                    ]
                ]
            ];
        }

        $card = [

            "main_data_models" => [

                $controller->controller_alias => [$country],

            ],

            "form_parameters" => [
                "form_title"                    => $getArrayCaptions['CountryName']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false,
                "form_type"                     => "card",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name"     => $country_id == "new" ? $getArrayCaptions['BlockCountryAddNew']['translation_captions']['caption_translation'] : $country->country_name,
                "form_type_list"                => [

                    "form_card_url" => "/countries/",
                ],
            ],

            "sets" => $this->getButtonsList(["card_actions"]),

            "tabs" => $tabs
        ];

        if($country_id != "new")
            $card["links"] = [
                [
                    "link_title" => $getArrayCaptions['Regions']['translation_captions']['caption_translation'],
                    "link_url"   => "/regions",
                    "class"      => "btn btn-green",
                    "link_type"  => "internal_push",
                    "img"        => ""
                ],
            ];

        return response()->json($card);


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
            'Countries', 'Regions',
            'Name', 'NumericCode',
            'CountryCode2Short',
            'CountryCode3Short'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $Countries = Country::query()
            ->select('id', 'country_name', 'country_code', 'country_code_alpha2', 'country_code_alpha3')
            ->orderBy('country_name')
            ->get();


        $list = [

            "main_data_models" => [

                $controller->controller_alias => $Countries,

            ],
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['Countries']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => false,
                "form_type"                     => "list",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_type_list"                => [

                    "form_card_url"     => "/countries/",
                    "form_search_field" => "country_name",
                ],
            ],
            "sets"             => $this->getButtonsList(['list_bottom', 'list_top', 'list_top_dropdown_actions', 'list_top_left_command_bar', 'list_top_right_command_bar']),
            "links"            => [

                ["link_title" => $getArrayCaptions['Regions']['translation_captions']['caption_translation'],
                 "link_url"   => "/regions",
                 "class"      => "link btn btn-link",
                 "link_type"  => "internal",
                 "img"        => ""
                ],
            ],
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
                                [
                                    'key'      => 'country_name',
                                    'sortable' => true,
                                    'class'    => 'country_name',
                                    'label'    => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 31%',
                                    "zone"     => "1",
                                    "order"    => "2"


                                ],
                                [
                                    'key'      => 'country_code',
                                    'sortable' => true,
                                    'class'    => 'country_code',
                                    'label'    => $getArrayCaptions['NumericCode']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 21%',
                                    "zone"     => "1",
                                    "order"    => "3"


                                ],

                                [
                                    'key'      => 'country_code_alpha2',
                                    'sortable' => true,
                                    'class'    => 'country_code_alpha2',
                                    'label'    => $getArrayCaptions['CountryCode2Short']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 21%',
                                    "zone"     => "1",
                                    "order"    => "4"

                                ],
                                [
                                    'key'      => 'country_code_alpha3',
                                    'sortable' => true,
                                    'class'    => 'country_code_alpha3',
                                    'label'    => $getArrayCaptions['CountryCode3Short']['translation_captions']['caption_translation'],
                                    'thStyle'  => 'width: 21%',
                                    "zone"     => "1",
                                    "order"    => "5"

                                ],


                            ]
                        ]
                    ]


                ],


            ]
        ];

        return response()->json($list);


    }
}
