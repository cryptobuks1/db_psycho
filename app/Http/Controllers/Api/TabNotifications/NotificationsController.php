<?php

namespace App\Http\Controllers\Api\TabNotifications;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Route;


class NotificationsController extends Controller
{

    public function index(){
//<<<<<<< HEAD
//        if(config("database.default") == "pgsql")
//        {
//            $notifications= Notification
//                ::select([DB::raw("to_char(notification_date, 'dd-mm-yyyy') as notification_date"),'notification_text','notification_title','Notifications.updated_at','contractor_short_name', 'Notifications.id'])
//                ->leftJoin('Contractors as cont' , 'contractor_id', '=', 'cont.id')
//                ->get()->toArray();
//
//        }
//        if(config("database.default") == "mysql")
//        {
//            $notifications= Notification
//                ::select([DB::raw("notification_date"),'notification_text','notification_title','Notifications.updated_at','contractor_short_name', 'Notifications.id'])
//                ->leftJoin('Contractors as cont' , 'contractor_id', '=', 'cont.id')
//                ->get()->toArray();
//        }
//
//=======
        $notifications= Notification
            ::select([DB::raw("notification_date"),'notification_text','notification_title','Notifications.updated_at','contractor_short_name', 'Notifications.id'])
            ->leftJoin('Contractors as cont' , 'contractor_id', '=', 'cont.id')
            ->get()->toArray();
//>>>>>>> feature/demo
        return  $notifications;
    }

    public function list(Request $request)
    {

        $captionName = [
            'ok',
            'apply',
            'back', 'Main', 'Databases',
            'DbTypes', 'DbType', 'DbTypeCode',
            'DbTypeName', 'DbTypeRemark',
            'Code','Name','Remark','Notifications','Date','Headline','Text','Contractor'
        ];

        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $notifications = $this->index();

//        $model = 'App\Models\Controller';

        $mainModel = \App\Models\Controller::where('controller_code',class_basename(Route::current()->controller))->value('controller_alias');

        $list = [

            "main_data_models" => [
                $mainModel => $notifications,
            ],
            "sets" => $this->getButtonsList(['list_bottom','list_top','list_top_dropdown_actions','list_top_left_command_bar','list_top_right_command_bar']),
            "form_parameters" => [
                "form_title" => $getArrayCaptions['Notifications']['translation_captions']['caption_translation'],
                "form_code" => "Notification",
                "form_is_dependent" => false,
                "form_type" => "list",
                "form_base_data_model" => $mainModel,
                "form_main_data_model_id_field" => "id",
                "prevent_list_click" => true,
                "form_type_list" => [
                    "form_search_field" => "notification_title",
                    "form_search_field" => "id",
                ],
            ],
//            "links" => [
//
////                ["link_title" => $getArrayCaptions['Databases']['translation_captions']['caption_translation'],
//                ["link_title" => 'Create a New Report',
////                    "link_url" => "/externalReport/create",
//                    "link_url" => "/reportsLeasingContractBalance/create",
//                    "class" => "btn btn-link",
//                    "link_type" => "internal",
//                    "img" => ""
//                ],
//            ],
            "tabs" => [

                [
                    "tab_title" => $getArrayCaptions['Main']['translation_captions']['caption_translation'],
//                    "blocks_quantity" => 0,  //commit Albert Topalu
                    "blocks_quantity" => 1,   //add Albert Topalu 16.11.18
                    "blocks" => [

                        [
                            "block_title" => $getArrayCaptions['DbTypes']['translation_captions']['caption_translation'],
//                            "block_zone_quantity" => 0, //commit Albert Topalu
                            "block_zone_quantity" => 1, //add Albert Topalu
                            "block_model" => $mainModel,
                            "block_type" => "block_list_base",
                            "block_fields" => [

                                ['key' => 'actions',
                                    'sortable' => false,
                                    'class' => 'list_checkbox',
                                    'thStyle' => 'width: 6%',
                                    "zone" => "1", //add Albert Topalu 16.11.18
                                    "order" => "1"  //add Albert Topalu 16.11.18
                                ],

                                [
                                    'key' => 'notification_date',
                                    'sortable' => true,
                                    'class' => 'notification_date',
                                    'label' => $getArrayCaptions['Date']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 10%',
                                    "zone" => "1", //add Albert Topalu 16.11.18
                                    "order" => "2" //add Albert Topalu 16.11.18


                                ],
                                [
                                    'key' => 'notification_title',
                                    'sortable' => true,
                                    'class' => 'notification_title',
                                    'label' => $getArrayCaptions['Headline']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 24%',
                                    "zone" => "1", //add Albert Topalu 16.11.18
                                    "order" => "3" //add Albert Topalu 16.11.18


                                ],

                                ['key' => 'notification_text',
                                    'sortable' => true,
                                    'class' => 'notification_text',
                                    'label' => $getArrayCaptions['Text']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 40',
                                    "zone" => "1", //add Albert Topalu 16.11.18
                                    "order" => "4" //add Albert Topalu 16.11.18

                                ],

                                ['key' => 'contractor_short_name',
                                    'sortable' => true,
                                    'class' => "contractor['contractor_short_name']",
                                    'label' => $getArrayCaptions['Contractor']['translation_captions']['caption_translation'],
                                    'thStyle' => 'width: 20%',
                                    "zone" => "1", //add Albert Topalu 16.11.18
                                    "order" => "5" //add Albert Topalu 16.11.18
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
