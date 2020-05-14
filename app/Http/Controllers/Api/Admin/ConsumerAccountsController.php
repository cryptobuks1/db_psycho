<?php



namespace App\Http\Controllers\Api\Admin;

use App\Models\Consumer;
use App\Models\ConsumerAccount;
use App\Http\Classes\ConsumerParameters;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\DB;

/**
 * Description of ConsumerAccountsController
 *
 * @author Юрий Юренко
 */
class ConsumerAccountsController extends Controller{


    public function update(Request $request){


        $model = $request->ConsumerAccounts[0];

        if (config('app.VueBlade')) {

            return ConsumerAccount::where('id', $model['id'])->update([
                    'consumer_id' => $model['consumer_id'],
                    'consumer_account_code' => $model['consumer_account_code'],
                    'consumer_account_name'  => $model['consumer_account_name'],
                    'actual_l'  => $model['actual_l'],
                    'updated_by' => (new ConsumerParameters())->consumerCode(),
                ]
            );
        }
        else{
            ConsumerAccount::where('id',$request->id)->update(
                [
                    'consumer_id' => $request->consumer_id,
                    'consumer_account_code' => $request->consumer_account_code,
                    'consumer_account_name'  => $request->consumer_account_name,
                    'actual_l'  => $request->actual_l,
                    'updated_by' => (new ConsumerParameters())->consumerCode(),
                ]
            );
        }
    }




    public function card(Request $request){


        $methods = $request->accessMethods;

        $captionName = [
            'ok',
            'apply',
            'back', 'Main',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy',
            'ConsumerAccounts','Consumer',
            'ConsumerAccountCode','ConsumerAccountName',
            'Actual','SystemDetails'

        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $ConsumerAccounts = DB::table('_ConsumerAccounts')
            ->leftJoin('Consumers', '_ConsumerAccounts.consumer_id', '=', 'Consumers.id')
            ->select('_ConsumerAccounts.*', "Consumers.consumer_name")
           ->where("_ConsumerAccounts.id",$request->id)
           ->get()->toarray();

        //$Consumers = Consumer::select("id",DB::raw('CONCAT(email," - ",consumer_name) AS consumer_name'))->get()->toarray();

        $Consumers=Consumer::get()->toarray();

        foreach ($methods as $key => $value) {
            if (isset($value) and ($value == "read")) {


                    $card = [

                        "main_data_models" => [

                            "ConsumerAccounts" => $ConsumerAccounts,

                        ],
                       /*
                        "add_data_models" => [

                            "Consumers" => $Consumers,

                       ],
                       */
                       "form_parameters" => [
                            "form_title" => $getArrayCaptions['ConsumerAccounts']['translation_captions']['caption_translation'],
                            "form_code" => "consumerAccounts",
                            "form_is_dependent" => false,
                            "form_type" => "card",
                            "form_base_data_model" => "ConsumerAccounts",
                            "form_main_data_model_id_field" => "id",
                            "form_main_data_model_name" => $ConsumerAccounts[0]->consumer_account_name,
                            "form_type_list" => [
                                        "form_list_url" => "consumerAccounts",

                            ],

                        ],

                        "actions" => [

                            "actions_card" =>[
                                    //["title" =>$getArrayCaptions['ok']['translation_captions']['caption_translation'], "code" => "save", "class" => "btn btn-green", "link" => "admin/consumer/accounts/update", "img" => ""],
                                   // ["title" =>$getArrayCaptions['apply']['translation_captions']['caption_translation'], "code" => "apply", "class" => "btn btn-green", "link" => "admin/consumer/accounts/update", "img" => ""],
                                    ["title" =>$getArrayCaptions['back']['translation_captions']['caption_translation'], "code" => "back", "class" => "btn btn-grey", "link" => "", "img" => ""],
                            ]
                        ],
                        /*
                        "dependent" =>[

                                    "dependent_data_model" => "ConsumerAccounts",
                                    "dependent_fields" =>
                                    [
                                        "title" => $getArrayCaptions['Consumer']['translation_captions']['caption_translation'],
                                        "model" => "consumer_id",
                                        "type" => "lt-select",
                                        "options" =>[],
                                        "options_data" => [
                                            "options_data_model"      => "Consumers",
                                            "options_field_id"        => "id",
                                            "options_field_id_value"  => "",
                                            "options_field_title"     => "consumer_name",
                                            "search" => ''
                                        ],
                                    ],

                                    "width" => "100%"

                        ],
                       */
                        "tabs" => [

                                        [

                                            "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                                            "blocks_quantity" => 1,
                                            "blocks" =>[

                                                [
                                                    //"block_title" =>"",
                                                    "block_zone_quantity" => 1,
                                                    "block_model" => "ConsumerAccounts",
                                                    "block_type" => "block_card",
                                                    "block_fields" => [

                                                        [
                                                            'title' => $getArrayCaptions['ConsumerAccountCode']['translation_captions']['caption_translation'],
                                                            'model' => 'consumer_account_code',
                                                            'width' =>'100%',
                                                            'type'=>'label',
                                                            'zone'=>'1',
                                                            'order'=>'1'
                                                        ],
                                                        [
                                                            'title' => $getArrayCaptions['ConsumerAccountName']['translation_captions']['caption_translation'] ,
                                                            'model' => 'consumer_account_name',
                                                            'width' =>'100%',
                                                            'type'=>'label',
                                                            'zone'=>'1',
                                                            'order'=>'2'
                                                        ],
                                                        [
                                                            'title' => $getArrayCaptions['Actual']['translation_captions']['caption_translation'],
                                                            'model' => 'actual_l',
                                                            'width' => '100%',
                                                            'type'=> 'label',
                                                            'zone'=>'1',
                                                            'order'=>'3'
                                                        ],


                                                    ]


                                                ]

                                            ]
                                        ],

                                        [

                                            "tab_title" => $getArrayCaptions['SystemDetails']['translation_captions']['caption_translation'],
                                            "blocks_quantity" => 1,
                                            "blocks" => [
                                                [

                                                    //"block_title" => $getArrayCaptions['CreationDetails']['translation_captions']['caption_translation'],
                                                    "block_zone_quantity" => 2,
                                                    "block_model" => "ConsumerAccounts",
                                                    "block_type" => "block_card",
                                                    "block_fields" => [
                                                        ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'],
                                                            'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1",
                                                            "order" => "1"
                                                        ],

                                                        ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'],
                                                            'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1",
                                                            "order" => "2"
                                                        ],

                                                        ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'],
                                                            'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2",
                                                            "order" => "1"
                                                        ],

                                                        ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'],
                                                            'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2",
                                                            "order" => "2"
                                                        ],

                                                    ]
                                                ]
                                            ]


                                        ]

                        ]
                    ];
            }

            if (isset($value) and ($value == "update")) {


                    $card = [

                        "main_data_models" => [

                            "ConsumerAccounts" => $ConsumerAccounts,

                        ],
                       /*
                        "add_data_models" => [

                            "Consumers" => $Consumers,

                       ],
                       */
                       "form_parameters" => [
                            "form_title" => $getArrayCaptions['ConsumerAccounts']['translation_captions']['caption_translation'],
                            "form_code" => "consumerAccounts",
                            "form_is_dependent" => false,
                            "form_type" => "card",
                            "form_base_data_model" => "ConsumerAccounts",
                            "form_main_data_model_id_field" => "id",
                            "form_main_data_model_name" => $ConsumerAccounts[0]->consumer_account_name,
                            "form_type_list" => [
                                        "form_list_url" => "consumerAccounts",

                            ],

                        ],

                        "actions" => [

                            "actions_card" =>[
                                    ["title" =>$getArrayCaptions['ok']['translation_captions']['caption_translation'], "code" => "save", "class" => "btn btn-green", "link" => "admin/consumer/accounts/update", "img" => ""],
                                    ["title" =>$getArrayCaptions['apply']['translation_captions']['caption_translation'], "code" => "apply", "class" => "btn btn-green", "link" => "admin/consumer/accounts/update", "img" => ""],
                                    ["title" =>$getArrayCaptions['back']['translation_captions']['caption_translation'], "code" => "back", "class" => "btn btn-grey", "link" => "", "img" => ""],
                            ]
                        ],
                        /*
                        "dependent" =>[

                                    "dependent_data_model" => "ConsumerAccounts",
                                    "dependent_fields" =>
                                    [
                                        "title" => $getArrayCaptions['Consumer']['translation_captions']['caption_translation'],
                                        "model" => "consumer_id",
                                        "type" => "lt-select",
                                        "options" =>[],
                                        "options_data" => [
                                            "options_data_model"      => "Consumers",
                                            "options_field_id"        => "id",
                                            "options_field_id_value"  => "",
                                            "options_field_title"     => "consumer_name",
                                            "search" => ''
                                        ],
                                    ],

                                    "width" => "100%"

                        ],
                       */
                        "tabs" => [

                                        [

                                            "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
                                            "blocks_quantity" => 1,
                                            "blocks" =>[

                                                [
                                                    //"block_title" =>"",
                                                    "block_zone_quantity" => 1,
                                                    "block_model" => "ConsumerAccounts",
                                                    "block_type" => "block_card",
                                                    "block_fields" => [

                                                        [
                                                            'title' => $getArrayCaptions['ConsumerAccountCode']['translation_captions']['caption_translation'],
                                                            'model' => 'consumer_account_code',
                                                            'width' =>'100%',
                                                            'type'=>'text',
                                                            'zone'=>'1',
                                                            'order'=>'1'
                                                        ],
                                                        [
                                                            'title' => $getArrayCaptions['ConsumerAccountName']['translation_captions']['caption_translation'] ,
                                                            'model' => 'consumer_account_name',
                                                            'width' =>'100%',
                                                            'type'=>'text',
                                                            'zone'=>'1',
                                                            'order'=>'2'
                                                        ],
                                                        [
                                                            'title' => $getArrayCaptions['Actual']['translation_captions']['caption_translation'],
                                                            'model' => 'actual_l',
                                                            'width' => '100%',
                                                            'type'=> 'checkbox',
                                                            'zone'=>'1',
                                                            'order'=>'3'
                                                        ],


                                                    ]


                                                ]

                                            ]
                                        ],

                                        [

                                            "tab_title" => $getArrayCaptions['SystemDetails']['translation_captions']['caption_translation'],
                                            "blocks_quantity" => 1,
                                            "blocks" => [
                                                [

                                                    //"block_title" => $getArrayCaptions['CreationDetails']['translation_captions']['caption_translation'],
                                                    "block_zone_quantity" => 2,
                                                    "block_model" => "ConsumerAccounts",
                                                    "block_type" => "block_card",
                                                    "block_fields" => [
                                                        ['title' => $getArrayCaptions['CreatedAt']['translation_captions']['caption_translation'],
                                                            'model' => 'created_at', 'type' => 'label', 'width' => '100%', "zone" => "1",
                                                            "order" => "1"
                                                        ],

                                                        ['title' => $getArrayCaptions['CreatedBy']['translation_captions']['caption_translation'],
                                                            'model' => 'created_by', 'type' => 'label', 'width' => '100%', "zone" => "1",
                                                            "order" => "2"
                                                        ],

                                                        ['title' => $getArrayCaptions['UpdatedAt']['translation_captions']['caption_translation'],
                                                            'model' => 'updated_at', 'type' => 'label', 'width' => '100%', "zone" => "2",
                                                            "order" => "1"
                                                        ],

                                                        ['title' => $getArrayCaptions['UpdatedBy']['translation_captions']['caption_translation'],
                                                            'model' => 'updated_by', 'type' => 'label', 'width' => '100%', "zone" => "2",
                                                            "order" => "2"
                                                        ],

                                                    ]
                                                ]
                                            ]


                                        ]

                        ]
                    ];

            }


        }

      // return var_dump("<pre>",$card,"</pre>");
       return response()->json($card);


    }




    public function list(Request $request){


      $methods = $request->accessMethods;

        $captionName = [
            'ok',
            'apply',
            'back', 'Main',
            'CreatedAt', 'CreatedBy',
            'UpdatedAt', 'UpdatedBy',
            'ConsumerAccounts','Consumer',
            'Code','Name','Actual',

        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);



        $ConsumerAccounts = DB::table('_ConsumerAccounts')
            ->leftJoin('Consumers', '_ConsumerAccounts.consumer_id', '=', 'Consumers.id')
            ->select('_ConsumerAccounts.*', "Consumers.consumer_name")
            ->get()->toarray();

       $Consumers = Consumer::select("id",DB::raw('CONCAT(email," - ",consumer_name) AS consumer_name'))->get()->toarray();

       //$Consumers=Consumer::get()->toarray();


        $list = [

            "main_data_models" => [

               "ConsumerAccounts" => $ConsumerAccounts,

            ],

            "add_data_models" => [

               "Consumers" => $Consumers,

            ],

            "form_parameters" => [
                "form_title" => $getArrayCaptions['ConsumerAccounts']['translation_captions']['caption_translation'],
                "form_code" => "сonsumerAccounts",
                "form_is_dependent" => true,
                "form_type" => "list",
                "form_base_data_model" => "ConsumerAccounts",
                "form_main_data_model_id_field" => "id",
                "form_type_list" => [

                    "form_card_url" => "сonsumerAccounts",
                    "form_search_field" => "сonsumer_account_name",
                ],
            ],

            "dependent" =>[

                        "dependent_data_model" => "ConsumerAccounts",
                        "dependent_fields" =>
                        [
                            "title" => $getArrayCaptions['Consumer']['translation_captions']['caption_translation'],
                            "model" => "consumer_id",
                            "type" => "lt-select",
                            "options" =>[],
                            "options_data" => [
                                "options_data_model"      => "Consumers",
                                "options_field_id"        => "id",
                                "options_field_id_value"  => "",
                                "options_field_title"     => "consumer_name",
                                "search" => ''
                            ],
                        ],

                        "width" => "100%"

            ],

            "tabs" => [

                [
                    "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],

                    "blocks_quantity" => 1,
                    "blocks" => [

                        [
                            "block_title" => "",
                            "block_zone_quantity" => 1,
                            "block_model" => "ConsumerAccounts",
                            "block_type" => "block_list_base",
                            "block_fields" => [

                                [
                                    'key' => 'actions',
                                    'sortable' => false,
                                    'class' => 'list_checkbox',
                                    'thStyle' => 'width: 6%',
                                    "zone" => "1",
                                    "order" => "1"
                                ],

                                [
                                    'key' => 'consumer_account_code',
                                    'sortable' => true,
                                    'class' => 'consumer_account_code',
                                    'label' => $getArrayCaptions['Code']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 28%',
                                    "zone" => "1",
                                    "order" => "2"


                                ],
                                [
                                    'key' => 'consumer_account_name',
                                    'sortable' => true,
                                    'class' => 'consumer_account_name',
                                    'label' => $getArrayCaptions['Name']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 30%',
                                    "zone" => "1",
                                    "order" => "3"


                                ],

                                [
                                    'key' => 'consumer_name',
                                    'sortable' => true,
                                    'class' => 'consumer_name',
                                    'label' => $getArrayCaptions['Consumer']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 30%',
                                    "zone" => "1",
                                    "order" => "4"

                                ],
                                [
                                    'key' => 'actual_l',
                                    'sortable' => false,
                                    'label' => $getArrayCaptions['Actual']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 6%',
                                    "zone" => "1",
                                    "order" => "5"
                                ],


                            ]
                        ]
                    ]


                ],



            ]
        ];


        //return var_dump("<pre>",$list,"</pre>");
       return response()->json($list);




    }


}
