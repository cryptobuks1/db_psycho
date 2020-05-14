<?php

namespace App\Http\Controllers\Api\TabCompanyContractor;

use App\Http\Classes\ApplicationChangeRequest;
use App\Http\Classes\CheckController;
use App\Models\ChangeRequest;
use App\Models\ChangeRequestController;
use App\Models\ChangeRequestControllerField;
use App\Models\ChangeRequestControllerFieldValue;
use App\Models\Consumer;
use App\Models\Contractor;
use App\Models\ContractorInfo;
use App\Models\ControllerLink;
use App\Models\Country;
use App\Models\DbArea;
use App\Http\Classes\ConsumerParameters;
use App\Models\DbTypeController;
use App\Models\ModelTables;
use App\Models\SystemParameter;
use App\Tasks\GetTranslatorsTask;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;


class ContractorsDillerController extends ContractorsController
{
    //Albert Topalu 17.10.18

    public function list(Request $request)
    {
        $currrentLang = Lang::locale();
        //get array accessMethods from  Http/Middleware/CheckAccess.php


//        $getClientIp =  $request->getClientIp();
//        $SERVER_ADDR =  request()->server('SERVER_ADDR');
//        $host1 = request()->getHttpHost();
//        $host2 = request()->getHost();
//        $https = $request->server();
//        $HttpHost= $request->server('HTTP_HOST');

        $serverParams =  $request->server(); //params
        $REMOTE_ADDR =  $request->server('REMOTE_ADDR'); // 127.0.0.1
        $HTTP_REFERER =  $request->server('HTTP_REFERER'); // http://localhost:8080/clients
        $REDIRECT_URL =  $request->server('REDIRECT_URL'); ///api/admin/contractor/diller/list
        $REQUEST_METHOD =  $request->server('REQUEST_METHOD'); //POST
        $HTTP_USER_AGENT =  $request->server('HTTP_USER_AGENT'); //Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/74.0.3729.169 Safari/537.36

        $captionName = [
            'ok',
            'apply',
            'back', 'Main', 'Contractors', 'ContractorsDillers', 'ContractorShortName', 'CountryName', 'CreatedAt', 'Database', 'Individual',
            'Actual', 'BankAccountTypes', 'CryptoWallets', 'contactInfo', 'Clients', 'ClientShortName', 'INN', 'KPP'
        ];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);
        $model = 'App\Models\Controller';
        $mainModel = $model::where('controller_code', class_basename(Route::current()->controller))
            ->value('controller_alias');

        $contractors = Contractor::query()
            ->whereNotNull("contractor_short_name")
            ->whereNotNull("contractor_full_name")
            ->select('id', 'contractor_short_name', 'created_at', 'country_id', 'actual_l', 'individual_l',
                'register_number', 'taxpayer_number')
            ->with('country')->get()->toArray();

        $list = [
            "main_data_models" => [
                $mainModel => $contractors
            ],
            "sets"             => $this->getButtonsList(['list_bottom', 'list_top', 'list_top_dropdown_actions', 'list_top_left_command_bar', 'list_top_right_command_bar']),
            "form_parameters"  => [
                "form_title"                    => $getArrayCaptions['Clients']['translation_captions']['caption_translation'],
                //                    "form_title" => $getArrayCaptions['Contractors']['translation_captions']['caption_translation'],
                "form_code"                     => $mainModel,
                "form_is_dependent"             => false, // {if true -> show field} {if false hidden field)
                "form_type"                     => "list",
                "form_base_data_model"          => $mainModel,
                "form_sort_by"                  => 'created_at',
                "form_sort_desc"                => true,
                "form_main_data_model_id_field" => "id",
                "form_type_list"                => [
                    "form_card_url"     => "/contractors_new/",
                    "form_search_field" => "contractor_short_name",
                ],
            ],

            "tabs" => [
                [
                    "tab_title"       => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                    "blocks_quantity" => 1,
                    "blocks"          => [

                        [
                            "block_title"         => $getArrayCaptions['Clients']['translation_captions']['caption_translation'],
                            "block_zone_quantity" => 1,
                            "block_model"         => "Contractors",
                            "block_type"          => "block_list_base",
                            "block_fields"        => [
                                /*list fields zone 1*/
                                //                                ['key' => 'actions', 'sortable' => false, 'class' => 'list_checkbox', "zone" => "1"],
                                ['key'     => 'actions', 'sortable' => false,
                                 'class'   => 'list_checkbox',
                                 'thStyle' => 'width: 6%',
                                 "zone"    => "1",
                                 "order"   => "1"
                                ],

                                ['key'   => 'contractor_short_name', 'sortable' => true, 'class' => 'contractor_short_name',
//                                 "label" => $getArrayCaptions['ClientShortName']['translation_captions']['caption_translation'].'--Contractor--_Diller', 'thStyle' => 'width: 31%', "zone" => "1", "order" => "2"],
                                 "label" => $getArrayCaptions['ClientShortName']['translation_captions']['caption_translation'], 'thStyle' => 'width: 31%', "zone" => "1", "order" => "2"],

                                ['key'   => 'register_number', 'sortable' => true, 'class' => 'created_at', "typeVal" => "number",
                                 "label" => $getArrayCaptions['KPP']['translation_captions']['caption_translation'], 'thStyle' => 'width: 13%', "zone" => "1", "order" => "5"],

                                ['key'   => 'taxpayer_number', 'sortable' => true, 'class' => 'created_at',  "typeVal" => "number",
                                 "label" => $getArrayCaptions['INN']['translation_captions']['caption_translation'], 'thStyle' => 'width: 13%', "zone" => "1", "order" => "6"],

                                ['key'   => "['country'][0]['country_name']", 'sortable' => true, 'class' => "['country'][0]['country_name']",
                                 "label" => $getArrayCaptions['CountryName']['translation_captions']['caption_translation'], 'thStyle' => 'width: 14%', "zone" => "1", "order" => "3"],

                                ['key'   => 'created_at', 'sortable' => true, 'class' => 'created_at',  "typeVal" => "date", "format" => "DD-MM-YYYY",
                                 "label" => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'], 'thStyle' => 'width: 11%', "zone" => "1", "order" => "4"],

                                ['key'     => 'individual_l', 'sortable' => true,
                                 'class'   => 'individual_l',
                                 "label"   => $getArrayCaptions['Individual']['translation_captions']['caption_translation'],
                                 'thStyle' => 'width: 6%',
                                 "zone"    => "1", "order" => "7"
                                ],

                                ['key'     => 'actual_l', 'sortable' => true, 'class' => 'actual_l',
                                 "label"   => $getArrayCaptions['Actual']['translation_captions']['caption_translation'],
                                 'thStyle' => 'width: 6%', "zone" => "1", "order" => "8"],

                            ]
                        ]
                    ]
                ]
            ]
        ];

        return response()->json($list);
    }




}
