<?php

namespace App\Http\Controllers\Api;

use App\Models\StoredFile;
use Illuminate\Http\Request;

class StoredFilesController extends Controller
{
    //+++05.04.2019 Miniyar

    public function deleteMark(Request $request)
    {
        //todo Когда будем знать структуру запроса переделать получение id
        //todo После согласования структуры запроса перенести изменения во все остальные контроллеры!
        //$storedFileId = $request->request->all();
        //$storedFile = StoredFile::where('id', $storedFileId['id'])->first();
        //$storedFile->deleted_l = !$storedFile->deleted_l;
        //$storedFile->save();
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

    //---05.04.2019 Miniyar
}
