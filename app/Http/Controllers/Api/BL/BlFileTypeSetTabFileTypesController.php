<?php

namespace App\Http\Controllers\Api\BL;

use App\Models\BL\BlFileTypeSetTabFileType;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;

class BlFileTypeSetTabFileTypesController extends Controller
{
    //+++28.03.2019 Miniyar

    public function deleteMark(Request $request)
    {
        //todo После согласования структуры запроса перенести изменения
//        $bunchId = $request->request->all();
//        $bunch = BlFileTypeSetTabFileType::where('id', $bunchId['id'])->first();
//        $bunch->deleted_l = !$bunch->deleted_l;
//        $bunch->save();
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

    //---28.03.2019 Miniyar
}
