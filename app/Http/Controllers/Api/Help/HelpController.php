<?php

namespace App\Http\Controllers\Api\Help;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use App\Models\Help;

class HelpController extends Controller
{
    public function insert()
    {

    }


    public function index()
    {
        $res = [];
        $components = Help::with('image', 'page')->get()->toArray();

        usort($components, function ($item1, $item2) {
            return $item1['help_parent_id'] <=> $item2['help_parent_id'];
        });
        foreach ($components as $item => $value) {
            if ($value['help_parent_id']) {
                $counter=0;
                foreach ($res as $resitem => $resvalue) {

                    if ($resvalue['id'] == $value['help_parent_id']) {

                        array_push($res[$counter]['children'], [

                                "title" => $value['help_title'],
                                "id" => $value['id'],
                                "page_id"  => $value['page_id'],
                                "img" => $value['image']['image_path'],
                                "answer" => '',
                            ]
                        );
                    }
                    $counter ++ ;
                }
            } else {
                $value =
                    [
                        'id' => $value['id'],
                        'title'=> $value['help_title'],
                        'img' => $value['image']['image_path'],
                        'group_l'=>$value['group_l'],
                        'children' =>[]
                    ];

                array_push($res, $value);
            }
        }


        return $res;

    }

    public function getAnswer(Request $request)
    {


    }

    public function update(Request $request)
    {

    }

    /*public function delete(){

    }*/



    public function list()
    {

    }

    public function card()
    {

    }
}
