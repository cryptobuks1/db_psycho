<?php

namespace App\Http\Controllers\Api\TabCommonReferences;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;

class StepsController extends Controller
{
    //

    public function index(Request $request){


        $request_id=$request->request_id;

        $steps = [
            [
                "id" => 1,
                "url" => 'step1',
                "title" => "Шаг 1",
                "subtitle" => "Подготовка КП",
                "status" => 'invalid',
                "model_name"=>"Request",
                "model_id"=>93
            ],
            [
                "id" => 2,
                "url" => 'step2',
                "title" => "Шаг 2",
                "subtitle" => "Подготовка КП",
                "status" => 'default'
            ],
            [
                "id" => 3,
                "url" => 'step3',
                "title" => "Шаг 3",
                "subtitle" => "Подготовка КП",
                "status" => 'invalid'
            ], [
                "id" => 4,
                "url" => 'step4',
                "title" => "Шаг 4",
                "subtitle" => "Подготовка КП",
                "status" => 'invalid'
            ],
            [
                "id" => 5,
                "url" => 'step5',
                "title" => "Шаг 5",
                "subtitle" => "Подготовка КП",
                "status" => 'valid'
            ],
            [
                "id" => 6,
                "url" => 'step6',
                "title" => "Шаг 6",
                "subtitle" => "Подготовка КП",
                "status" => 'default'
            ],

        ];

        return response()->json($steps);
    }
}
