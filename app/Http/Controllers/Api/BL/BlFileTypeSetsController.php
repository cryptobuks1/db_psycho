<?php

namespace App\Http\Controllers\Api\BL;

use App\Models\BL\BlFileTypeSet;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;

class BlFileTypeSetsController extends Controller
{
    //+++28.03.2019 Miniyar

    public function deleteMark(Request $request)
    {
        //todo После согласования структуры запроса перенести изменения
//        $fileSetId = $request->request->all();
//        $fileSet = BlFileTypeSet::where('id', $fileSetId['id'])->first();
//        $fileSet->deleted_l = !$fileSet->deleted_l;
//        $fileSet->save();
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
