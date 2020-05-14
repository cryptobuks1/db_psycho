<?php

namespace App\Http\Controllers\Api\BL;

use App\Models\BL\BlLegalForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;

class BlLegalFormsController extends Controller
{
    //+++29.03.2019 Miniyar

    public function deleteMark(Request $request)
    {
        //todo После согласования структуры запроса перенести изменения
//        $formId = $request->request->all();
//        $form = BlLegalForm::where('id', $formId['id'])->first();
//        $form->deleted_l = !$form->deleted_l;
//        $form->save();
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
