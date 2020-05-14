<?php

namespace App\Http\Controllers\Api;

use App\Models\RateVAT;
use Illuminate\Http\Request;

class RateVATController extends Controller
{
    //+++29.03.2019 Miniyar

    public function deleteMark(Request $request)
    {
        //todo После согласования структуры запроса перенести изменения
//        $rateVatId = $request->request->all();
//        $rateVat = RateVAT::where('id', $rateVatId['id'])->first();
//        $rateVat->deleted_l = !$rateVat->deleted_l;
//        $rateVat->save();
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
