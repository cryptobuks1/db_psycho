<?php

namespace App\Http\Controllers\Api\BL;

use App\Models\BL\BlScheduleType;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;

class BlScheduleTypesController extends Controller
{
    //+++29.03.2019 Miniyar

    public function deleteMark(Request $request)
    {
        //todo После согласования структуры запроса перенести изменения
//        $scheduleTypeId = $request->request->all();
//        $scheduleType = BlScheduleType::where('id', $scheduleTypeId['id'])->first();
//        $scheduleType->deleted_l = !$scheduleType->deleted_l;
//        $scheduleType->save();
//        return 1;
    }

    public function insert() {

    }

    public function update() {

    }

    /*public function delete(){

    }*/

    public function list() {

    }

    public function card() {

    }

    //---29.03.2019 Miniyar
}
