<?php

namespace App\Http\Controllers\Api\BL;

use App\Models\BL\BlLeasingObjectBrand;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;

class BlLeasingObjectBrandsController extends Controller
{
    //+++29.03.2019 Miniyar

    public function deleteMark(Request $request)
    {
        //todo После согласования структуры запроса перенести изменения
//        $objectBrandId = $request->request->all();
//        $leasingObjectBrand = BlLeasingObjectBrand::where('id', $objectBrandId['id'])->first();
//        $leasingObjectBrand->deleted_l = !$leasingObjectBrand->deleted_l;
//        $leasingObjectBrand->save();
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
