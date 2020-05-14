<?php

namespace App\Http\Controllers\Api\BL;

use App\Models\BL\BlAttachedDocumentKind;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;

class BlAttachedDocumentKindsController extends Controller
{
    //+++28.03.2019 Miniyar

    public function deleteMark(Request $request)
    {
        //todo Когда будем знать структуру запроса переделать получение id
        //todo После согласования структуры запроса перенести изменения во все остальные контроллеры!
        //$kindId = $request->request->all();
        //$docKind = BlAttachedDocumentKind::where('id', $kindId['id'])->first();
        //$docKind->deleted_l = !$docKind->deleted_l;
        //$docKind->save();
        //return 1;
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
