<?php

namespace App\Http\Controllers\Api\BL;

use App\Models\BL\BlLeasingObjectType;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;

class BlLeasingObjectTypesController extends Controller
{
    //+++29.03.2019 Miniyar

    public function deleteMark(Request $request)
    {
        //todo После согласования структуры запроса перенести изменения
//        $objectTypeId = $request->request->all();
//        $leasingObjectType = BlLeasingObjectType::where('id', $objectTypeId['id'])->first();
//        $leasingObjectType->deleted_l = !$leasingObjectType->deleted_l;
//        $leasingObjectType->save();
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
