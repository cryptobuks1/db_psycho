<?php

namespace App\Http\Controllers\Api\BL;

use App\Models\BL\BlLeasingObjectModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;

class BlLeasingObjectModelsController extends Controller
{
    //+++29.03.2019 Miniyar

    public function deleteMark(Request $request)
    {
        //todo После согласования структуры запроса перенести изменения
//        $objectModelId = $request->request->all();
//        $leasingObjectModel = BlLeasingObjectModel::where('id', $objectModelId['id'])->first();
//        $leasingObjectModel->deleted_l = !$leasingObjectModel->deleted_l;
//        $leasingObjectModel->save();
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
