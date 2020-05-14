{{--{--}}
{{--"form":[--}}
{{--{--}}
{{--"main_data_models":[--}}
{{--{"Имя Модели": "ОбьектМодели"},--}}

{{--{--}}
{{--"data_model_name":"NameDataModel",--}}
{{--"data_model_fields":[--}}
{{--{--}}
{{--"НазваниеПоля1":"ЗначениеПоля1",--}}
{{--"НазваниеПоля2":"ЗначениеПоля2"--}}
{{--},--}}

{{--{--}}
{{--"НазваниеПоля1":"ЗначениеПоля1",--}}
{{--"НазваниеПоля2":"ЗначениеПоля2"--}}
{{--}--}}
{{--]--}}
{{--}--}}
{{--]--}}
{{--},--}}

{{--{--}}
{{--"add_data_models":[--}}
{{--{"Имя Модели": "ОбьектМодели"},--}}

{{--{"data_model_name":"NameDataModel",--}}
{{--"model_data_fields":[--}}
{{--{--}}
{{--"НазваниеПоля1":"ЗначениеПоля1",--}}
{{--"НазваниеПоля2":"ЗначениеПоля2"--}}
{{--},--}}

{{--{--}}
{{--"НазваниеПоля1":"ЗначениеПоля1",--}}
{{--"НазваниеПоля2":"ЗначениеПоля2"--}}
{{--}--}}
{{--]--}}
{{--}--}}
{{--]--}}
{{--},--}}

{{--{--}}
{{--"form_parameters":{--}}
{{--"form_title":"Контрагенты",--}}
{{--"form_code":"contractors",--}}
{{--"form_is_dependent":"true",--}}
{{--"form_type":"list",--}}
{{--"form_base_data_model":"Contractors",--}}
{{--"form_main_data_model_id_field":"id",--}}
{{--"form_type_list":{--}}
{{--"form_card_url":"contractor",--}}
{{--"form_search_field":"contractor_name"--}}
{{--},--}}

{{--"form_type_card":{--}}
{{--"form_list_url":"contractors"--}}
{{--}--}}
{{--}--}}
{{--},--}}

{{--{--}}
{{--"dependent":{--}}
{{--"form_title":"Контрагенты",--}}
{{--"form_code":"contractors"--}}
{{--}--}}
{{--},--}}

{{--{--}}
{{--"actions":[--}}
{{--{--}}
{{--"actions_common":[--}}
{{--{"title":"Добавить","code":"add_row","link":"ссылка на действие","img":""},--}}
{{--{"title":"Изменить","code":"update_row","link":"ссылка на действие","img":""},--}}
{{--{"title":"Удалить","code":"delete_row","link":"ссылка на действие","img":""}--}}
{{--]--}}
{{--},--}}

{{--{--}}
{{--"actions_list":[--}}
{{--{"title":"Изменить","code":"update_row","link":"ссылка на действие","img":""},--}}
{{--{"title":"Удалить","code":"delete_row","link":"ссылка на действие","img":""}--}}
{{--]--}}
{{--},--}}

{{--{--}}
{{--"actions_card":[--}}
{{--{"title":"Ok","code":"save","link":"ссылка на действие","img":""},--}}
{{--{"title":"Применить","code":"apply","link":"ссылка на действие","img":""},--}}
{{--{"title":"Назад","code":"back","link":"ссылка на действие","img":""}--}}
{{--]--}}
{{--}--}}
{{--]--}}
{{--},--}}

{{--{--}}
{{--"links":[--}}
{{--{"link_title":"Ссылка",--}}
{{--"link_img":"",--}}
{{--"link_type":"internal",--}}
{{--"link_url":"Ссылка перехода"--}}
{{--}--}}
{{--]--}}

{{--},--}}

{{--{--}}
{{--"tabs":[--}}
{{--{--}}
{{--"tab_title":"Основной",--}}
{{--"blocks":[--}}
{{--{--}}
{{--"block_title":"",--}}
{{--"block_zone_quantity":1,--}}
{{--"block_model": "модель этого блока",--}}
{{--"block_type" : "block_list_base",--}}
{{--"block_fields":[--}}
{{--{--}}
{{--"key":"actions",--}}
{{--"label":"Действие",--}}
{{--"'sortable":"false",--}}
{{--"class":"list_checkbox",--}}
{{--"thStyle":"width:20%"--}}
{{--},--}}

{{--{--}}
{{--"title":"Полное наименование контрагента",--}}
{{--"model":"contractor_full_name",--}}
{{--"type":"text",--}}

{{--"options_data":[--}}
{{--{--}}
{{--"options_data_model":"",--}}
{{--"options_field_id":"id",--}}
{{--"options_field_title":"country_name"--}}
{{--}--}}
{{--],--}}

{{--"optoins":[],--}}
{{--"width":"50%",--}}
{{--"long_i":"true",--}}
{{--"zone":"1",--}}
{{--"order":1--}}
{{--}--}}
{{--]--}}
{{--}--}}

{{--]--}}
{{--}--}}

{{--]--}}
{{--}--}}
{{--]--}}
{{--}--}}

<?php

$contractorsCard = array(

    "main_data_models"=>[


        "Contractors" => $contractor,
        "ZZContractors" => $ZZContractors,
        "ZZCOntractor"=>  $ZZContractor,


    ],
    "add_data_models" =>[

        "Countries" => $countires,
        "DBAreas" => $dbarea,


    ],
    "form_parameters"=>[

        "form_title" => $this->texts->where('caption_name', "AccContractor")->first()->caption_translation,
        "form_code" => "contractors",
        "form_type" => "card",
        //"form_base_data_model" => "Contractors",
        //"form_main_data_model_id_field" => "id",

    ],
    "actions"=>[

        "actions_card" => [
            ["title" => $this->texts->where('caption_name', "ok")->first()->caption_translation, "code" => "save", "class" => "btn btn-green" ,    "link" => "ссылка на действие", "img" => ""],
            ["title" => $this->texts->where('caption_name', "apply")->first()->caption_translation, "code" => "apply", "class" => "btn btn-green",    "link" => "ссылка на действие", "img" => ""],
            ["title" => $this->texts->where('caption_name', "back")->first()->caption_translation, "code" => "back", "class" => "btn btn-grey",    "link" => "ссылка на действие", "img" => ""],
        ]


    ],
    "links" => [

        ["link_title" => "Компании", "link_url" => "/companies", "link_type" => "internal", "img" => ""],
    ],
    "tabs" =>[

        [
            "tab_title" => "Контрагенты",
            "blocks_quantity" => 1,
            "blocks" => [
                [
                    "block_title" => "Block1",
                    "block_zone_quantity" => 1,
                    "block_model" => "Contractors",
                    "block_type" => "block_card",
                    "block_fields"=> [

                        ['title'=>$this->texts->where('caption_name', "accContractorFullName")->first()->caption_translation, 'model'=>'contractor_full_name', 'type'=>'text','width' => '100%',"zone"=>"1","order"=>"1"],
                        ['title'=>$this->texts->where('caption_name', "CountryRegCountry")->first()->caption_translation, 'model'=>'country_id', 'type'=>'select','width' => '50%',  'options'=>[],"zone"=>"1","order"=>"2"],
                        [
                            'title'=>$this->texts->where('caption_name', "AreaDB")->first()->caption_translation,
                            'model'=>'db_area_id',
                            'type'=>'select',
                            'options'=>[],
                            "options_data"=>[
                                "options_data_model" =>"Countries",
                                "options_field_id" => "id",
                                "options_field_title" => "country_name"
                            ],
                            "zone"=>"1",
                            'width' => '50%',
                            "order"=>"3"
                        ],
                        ['title'=>$this->texts->where('caption_name', "accContractorShortName")->first()->caption_translation, 'model'=>'contractor_short_name', 'type'=>'text',  'width' => '100%',"zone"=>"1","order"=>"4"],
                        ['title'=>$this->texts->where('caption_name', "individual")->first()->caption_translation, 'model'=>'individual_l', 'type'=>'checkbox',  'width' => '50%',"zone"=>"1","order"=>"5"],
                        ['title'=>$this->texts->where('caption_name', "DB")->first()->caption_translation, 'model'=>'db_name', 'type'=>'label',  'width' => '50%',"zone"=>"1","order"=>"6"],
                        ['title'=>$this->texts->where('caption_name', "registryNumber")->first()->caption_translation, 'model'=>'register_number', 'type'=>'text',  'width' => '50%',"zone"=>"1","order"=>"7"],
                        ['title'=>$this->texts->where('caption_name', "taxpayer_number")->first()->caption_translation, 'model'=>'taxpayer_number', 'type'=>'text',  'width' => '50%',"zone"=>"1","order"=>"8"],


                    ]
                ],
                [
                    "block_title" => "Block2",
                    "block_zone_quantity" => 1,
                    "block_model" => "Contractors",
                    "block_type" => "block_card",
                    "block_fields"=> [


                        ['title'=>$this->texts->where('caption_name', "entrepreneur_certificate")->first()->caption_translation, 'width' => '100%', 'model'=>'entrepreneur_certificate', 'type'=>'text',"zone"=>"1","order"=>"1"],
                        ['title'=>$this->texts->where('caption_name', "ServerDB")->first()->caption_translation, 'width' => '25%', 'model'=>'server_name', 'type'=>'label',"zone"=>"1","order"=>"2"],
                        ['title'=>$this->texts->where('caption_name', "code_reason_number")->first()->caption_translation, 'width' => '25%', 'model'=>'code_reason_number', 'type'=>'text',"zone"=>"1","order"=>"3"],
                        ['title'=>$this->texts->where('caption_name', "entrepreneur_certificate_date")->first()->caption_translation, 'width' => '25%', 'model'=>'entrepreneur_certificate_date', 'type'=>'date',"zone"=>"1","order"=>"4"],
                        ['title'=>$this->texts->where('caption_name', "social_security_number")->first()->caption_translation, 'width' => '25%', 'model'=>'social_security_number', 'type'=>'text',"zone"=>"1","order"=>"5"],
                        ['title'=>$this->texts->where('caption_name', "Actual")->first()->caption_translation, 'width' => '50%', 'model'=>'actual_l', 'type'=>'checkbox', "zone"=>"1","order"=>"6"],

                    ]
                ]
            ]
        ],
        [

            "tab_title" => "ZZ Контрагенты",
            "blocks_quantity" => 1,
            "blocks" =>[

                [

                    "block_title" => "List",
                    "block_zone_quantity" => 2,
                    "block_model" => "ZZContractors",
                    "block_type" => "block_list_base",
                    "block_fields"=> [
                        /*list fields zone 1*/
                        [ 'key'=> 'actions', 'sortable'=> false,'class'=> 'list_checkbox',"zone"=>"1"],
                        [ 'key'=> 'contractor_full_name', 'sortable'=> true, 'class'=> 'contractor_full_name',"zone"=>"1"],
                        [ 'key'=> 'created_at', 'sortable'=> true,'class'=> 'created_at',"zone"=>"1" ],
                        [ 'key'=> 'register_number', 'sortable'=> true,'class'=> 'register_number',"zone"=>"1"],
                        [ 'key'=> 'last_name', 'sortable'=> false,'class'=>'last_name',"zone"=>"1"],
                        [ 'key'=> 'first_name', 'sortable'=> false,'class'=> 'list_actions-box',"zone"=>"1"],
                        /*form fields zone 2*/
                        ['title'=>$this->texts->where('caption_name', "entrepreneur_certificate")->first()->caption_translation, 'model'=>'entrepreneur_certificate', 'type'=>'text',"zone"=>"2","order"=>"1"],
                        ['title'=>$this->texts->where('caption_name', "cardMiddlename")->first()->caption_translation, 'model'=>'middle_name', 'type'=>'text',"zone"=>"2","order"=>"3"],
                        ['title'=>$this->texts->where('caption_name', "entrepreneur_certificate_date")->first()->caption_translation, 'model'=>'entrepreneur_certificate_date', 'type'=>'date',"zone"=>"2","order"=>"4"],
                        ['title'=>$this->texts->where('caption_name', "social_security_number")->first()->caption_translation, 'model'=>'social_security_number', 'type'=>'text',"zone"=>"2","order"=>"5"],

                    ]

                ]

            ]


        ]


    ]




);
	
