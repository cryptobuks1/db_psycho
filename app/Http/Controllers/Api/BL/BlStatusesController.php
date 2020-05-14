<?php

namespace App\Http\Controllers\Api\BL;

use App\Models\BL\BlStatus;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;

class BlStatusesController extends Controller
{
    //+++29.03.2019 Miniyar

    public function deleteMark(Request $request)
    {
        //todo После согласования структуры запроса перенести изменения
//        $statusId = $request->request->all();
//        $status = BlStatus::where('id', $statusId['id'])->first();
//        $status->deleted_l = !$status->deleted_l;
//        $status->save();
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
