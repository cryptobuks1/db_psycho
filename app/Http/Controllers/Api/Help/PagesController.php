<?php

namespace App\Http\Controllers\Api\Help;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use App\Models\Page;

class PagesController extends Controller
{
    public function index(){

    }

    public function getAnswer(Request $request)
    {

        $id = $request->id;
        $id = Page::where('id', $id)->get()->toArray();

        return $id;

    }

    public function update(Request $request)
    {

    }

    /*public function delete(){

    }*/

    

    public function list()
    {

    }

    public function card()
    {

    }
}
