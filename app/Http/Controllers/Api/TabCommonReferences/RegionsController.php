<?php

namespace App\Http\Controllers\Api\TabCommonReferences;

use App\Http\Classes\CheckController;
use App\Models\Country;
use App\Models\Notification;
use App\Models\Region;
use App\Texts;
use App\Models\Language;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use App\Http\Classes\ConsumerParameters;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use PragmaRX\Countries\Package\Countries;

class RegionsController extends Controller
{
    public function update(Request $request)
    {
        if(config('app.VueBlade'))
        {

            $model = $request->Regions[0];

            return Region::where('id', $model['id'])->update(
                [
                    'region_name'       => $model['region_name'],
                    'region_code'       => $model['region_code'],
                    'region_code_alpha' => $model['region_code_alpha'],
                    //'suser_name' => $request->suser_name,
                    'updated_by'        => (new ConsumerParameters())->consumerCode(),
                ]
            );
        }
        else
        {
            Region::where('id', $request->idRegion)->update(
                [
                    'region_name'       => $request->regionName,
                    'region_code'       => $request->regionCode,
                    'region_code_alpha' => $request->regionCodeAlpha,
                    //'suser_name' => $request->regionSuserName,
                    'updated_by'        => (new ConsumerParameters())->consumerCode(),
                ]
            );
            return back()->with('alert', trans('messages.saved'));
        }
    }

    public function insert(Request $request)
    {

        $model = $request->Regions[0];

        $NewRegion = new  Region();
        $NewRegion->country_id = $model['country_id'];
        $NewRegion->region_code = $model['region_code'];
        $NewRegion->region_code_alpha = $model['region_code_alpha'];
        $NewRegion->region_name = $model['region_name'];
        $NewRegion->created_by = (new ConsumerParameters())->consumerCode();
        $NewRegion->updated_by = (new ConsumerParameters())->consumerCode();
        $NewRegion->deleted_l = 0;
        $NewRegion->save();

        return $NewRegion->id;

        //        if (config('app.VueBlade')) {
        //            return Region::create([
        //                'country_id' => $request->country_id,
        //                'region_name' => $request->region_name,
        //                'region_code' => $request->region_code,
        //                'region_code_alpha' => $request->region_code_alpha,
        //                //'suser_name' => $request->suser_name,
        //                'created_by' => (new ConsumerParameters())->consumerCode()
        //
        //            ]);
        //        }
        //        else{
        //            Region::create([
        //            'country_id' => $request->countryNameId,
        //            'region_name' => $request->addRegionName,
        //            'region_code' => $request->addRegionCode,
        //            'region_code_alpha' => $request->addRegionCodeApha,
        //            //'suser_name' => $request->addRegionSuserName,
        //            'created_by' => (new ConsumerParameters())->consumerCode()
        //
        //        ]);
        //       return back()->with('alert', trans('messages.createRegion'));
        //        }
    }

    /*public function delete(Request $request){
        if (config('app.VueBlade')) {
            return Region::where('id', $request->id)->delete();
        }
        else{
            Region::where('id',$request['id'])->delete();
            return Session::flash('alert' ,trans('messages.remotely'));
        }
    }*/
    public function GetAjax(Request $request)
    {
        $regions = Region::where('country_id', $request->id)->get();
        return response()->json($regions);
    }

    public function ModalAjax(Request $request)
    {
        $request->id;
        $regionsAjax = Region::where('id', $request->id)->get();
        return response()->json($regionsAjax);
    }

    public function card(Request $request)
    {
        if(!$this->isAdmin())
            abort(403);

        $captionName = [
            'ok',
            'apply',
            'back', 'Main', 'Region',
            'Regions', 'SystemDetails',
            'RegionName', 'RegionCode',
            'RegionCodeAlphaFull', 'Country',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy', 'BlockRegionAddNew'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $methods = $request->accessMethods;


        $region_id = $request->id;

        if($region_id == "new")
        {
            $region = Region::getNewObject();
            $country = Country::query()->find($request["dependent"]["id"]);
            $region["country_id"] = $country->id;
            $region["country_name"] = $country->country_name;
        }
        else
        {
            $region = Region::query()
                ->where("_Regions.id", $region_id)
                ->join('_Countries', '_Regions.country_id', '=', '_Countries.id')
                ->select("_Regions.*", "_Countries.country_name")
                ->get()->first()->toArray();
            $country = Country::query()->find($region["country_id"]);

        }

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
                        "block_title"         => $getArrayCaptions['Regions']['translation_captions']['caption_translation'],
                        "block_zone_quantity" => 1,
                        "block_model"         => $controller->controller_alias,
                        "block_type"          => "block_card",
                        "block_fields"        => [
                            [
                                'title' => $getArrayCaptions['RegionName']['translation_captions']['caption_translation'],
                               'model_name'=>$controller->controller_alias, 'model' => 'region_name', 'width' => '100%', 'type' => 'text', 'zone' => '1', 'order' => '1'
                            ],
                            [
                                'title' => $getArrayCaptions['RegionCode']['translation_captions']['caption_translation'],
                               'model_name'=>$controller->controller_alias, 'model' => 'region_code', 'width' => '50%', 'type' => 'text', 'zone' => '1', 'order' => '2'
                            ],
                            [
                                'title' => $getArrayCaptions['RegionCodeAlphaFull']['translation_captions']['caption_translation'],
                               'model_name'=>$controller->controller_alias, 'model' => 'region_code_alpha', 'width' => '50%', 'type' => 'text', 'zone' => '1', 'order' => '3'
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
                        "block_title"         => $getArrayCaptions['Regions']['translation_captions']['caption_translation'],
                        "block_zone_quantity" => 2,
                        "block_model"         => "Regions",
                        "block_type"          => "block_card",
                        "block_fields"        => [
                            [
                                'title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'],
                               'model_name'=>$controller->controller_alias, 'model' => 'created_at', 'type' => 'label', 'width' => '100%',
                                "zone"  => "1", "order" => "1"
                            ],
                            [
                                'title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'],
                               'model_name'=>$controller->controller_alias, 'model' => 'created_by', 'type' => 'label', 'width' => '100%',
                                "zone"  => "1", "order" => "2"
                            ],
                            [
                                'title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'],
                               'model_name'=>$controller->controller_alias, 'model' => 'updated_at', 'type' => 'label', 'width' => '100%',
                                "zone"  => "2", "order" => "1"
                            ],
                            [
                                'title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'],
                               'model_name'=>$controller->controller_alias, 'model' => 'updated_by', 'type' => 'label', 'width' => '100%',
                                "zone"  => "2", "order" => "2"
                            ],
                        ]
                    ]
                ]
            ];
        }

        $card = [

            "main_data_models" => [
                $controller->controller_alias => [$region],
            ],
            "add_data_models"  => [
                "Countries" => [$country],
            ],
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['Region']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => true,
                "form_type"                     => "card",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name"     => $region_id == "new" ? $getArrayCaptions['BlockRegionAddNew']['translation_captions']['caption_translation'] : $region["region_name"],
                "form_type_list"                => [
                    "form_list_url" => "regions",
                ],
            ],
            "sets"             => $this->getButtonsList(["card_actions"]),
            "dependent"        => [
                "dependent_data_model" => "Regions",
                "dependent_fields"     =>
                    [
                        "title"        => $getArrayCaptions['Country']['translation_captions']['caption_translation'],
                        "model"        => "country_id",
                        "type"         => "label",
                        "options"      => [],
                        "options_data" => [
                            "options_data_model"     => "Countries",
                            "options_field_id"       => "id",
                            "options_field_id_value" => "",
                            "options_field_title"    => "country_name",
                            "search"                 => ''
                        ],
                    ],
                "width"                => "100%"
            ],
            "tabs"             => $tabs
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
            'SystemDetails', 'Country',
            'RegionName', 'RegionCode',
            'RegionCodeAlphaShort', 'RegionCodeAlphaFull',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy',


        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);


        $regions = Region::query()
            ->with("country:id,country_name")
            ->join("_Countries", "_Countries.id", "=", "_Regions.country_id")
            ->select("_Regions.id", "_Regions.country_id",
                "_Regions.region_name", "_Regions.region_code_alpha", "_Regions.region_code",
                "_Countries.country_name")
            ->get();

        $countries = Country::query()
            ->select('id', 'country_name')
            ->get();

        $controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(Route::current()->controller))
            ->get()->first();

        $list = [

            "main_data_models" => [
                $controller->controller_alias => $regions,
            ],
            "add_data_models"  => [
                "Countries" => $countries,
            ],
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['Regions']['translation_captions']['caption_translation'],
                "form_code"                     => $controller->controller_alias,
                "form_is_dependent"             => true,
                "form_type"                     => "list",
                "form_base_data_model"          => $controller->controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_type_list"                => [

                    "form_card_url"     => "/regions/",
                    "form_search_field" => "region_name",
                ],
            ],
            "sets"             => $this->getButtonsList(['list_bottom', 'list_top', 'list_top_dropdown_actions', 'list_top_left_command_bar', 'list_top_right_command_bar']),
            "dependent"        => [

                "dependent_data_model" => $controller->controller_alias,
                "dependent_fields"     =>
                    [
                        "title"        => $getArrayCaptions['Country']['translation_captions']['caption_translation'],
                        "model"        => "country_id",
                        "type"         => "select",
                        "options"      => [],
                        "options_data" => [
                            "options_data_model"     => "Countries",
                            "options_field_id"       => "id",
                            "options_field_id_value" => "",
                            "options_field_title"    => "country_name",
                            "search"                 => ''
                        ],
                    ],
                "width"                => "100%"
            ],
            "links"            => [
                [
                    "link_title" => $getArrayCaptions['Countries']['translation_captions']['caption_translation'],
                    "link_url"   => "/countries", "class" => "btn btn-link", "link_type" => "internal",
                    "img"        => ""
                ],
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
                                    'key'     => 'actions', 'sortable' => false, 'class' => 'list_checkbox',
                                    'thStyle' => 'width: 6%', "zone" => "1", "order" => "1"
                                ],
                                [
                                    'key'     => "['country']['country_name']", 'sortable' => true, 'class' => 'country_name',
                                    'label'   => $getArrayCaptions['Country']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 30%', "zone" => "1", "order" => "2"
                                ],
                                [
                                    'key'     => 'region_name', 'sortable' => true, 'class' => 'region_name',
                                    'label'   => $getArrayCaptions['RegionName']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 30%', "zone" => "1", "order" => "3"
                                ],
                                [
                                    'key'     => 'region_code', 'sortable' => true, 'class' => 'region_code',
                                    'label'   => $getArrayCaptions['RegionCode']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 17%', "zone" => "1", "order" => "4"
                                ],
                                [
                                    'key'     => 'region_code_alpha', 'sortable' => true, 'class' => 'region_code_alpha',
                                    'label'   => $getArrayCaptions['RegionCodeAlphaShort']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 17%', "zone" => "1", "order" => "5"
                                ],
                            ]
                        ]
                    ]
                ],
            ]
        ];

        return response()->json($list);
    }



    /////////////////////////////for blade/////////////////////////////
    //    public function update(Request $request){
    //        Region::where('id',$request->idRegion)->update(
    //            [
    //                'region_name' => $request->regionName,
    //                'region_code' => $request->regionCode,
    //                'region_code_alpha' => $request->regionCodeAlpha,
    //                'suser_name' => $request->regionSuserName,
    //            ]
    //        );
    //        return back()->with('alert', trans('messages.saved'));
    //    }
    //
    //    public function insert(Request $request){
    //        Region::create([
    //            'country_id' => $request->countryNameId,
    //            'region_name' => $request->addRegionName,
    //            'region_code' => $request->addRegionCode,
    //            'region_code_alpha' => $request->addRegionCodeApha,
    //            'suser_name' => $request->addRegionSuserName
    //        ]);
    //       return back()->with('alert', trans('messages.createRegion'));
    //    }
    //    public function delete(Request $request){
    //        Region::where('id',$request['id'])->delete();
    //        return Session::flash('alert' ,trans('messages.remotely'));
    //    }
    //    public function GetAjax(Request $request){
    //        $regions= Region::where('country_id',$request->id)->get();
    //        return response()->json($regions);
    //    }
    //    public function ModalAjax(Request $request){
    //        $request->id;
    //        $regionsAjax= Region::where('id',$request->id)->get();
    //        return response()->json($regionsAjax);
    //    }

}
