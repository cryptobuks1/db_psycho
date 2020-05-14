<?php

namespace App\Http\Controllers\Api;

use App\Models\Bookmark;
use FontLib\Table\Type\post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BookmarksController extends Controller
{
    public function index(Request $request)
    {
        $consumer_id = $request->consumer_id;

        return Bookmark::where('consumer_id', $consumer_id)->get()->toArray();
    }

    public function addBookmark(Request $request)
    {
        $bookmarks_controller = \App\Models\Controller::query()
            ->where("controller_code", class_basename(\Route::current()->controller))
            ->first();

        $bookmark = [
            "id"                      => null,
            "consumer_id"             => \Auth::getUser()->id,
            "bookmark_url"            => $request->bookmark_url,
            "bookmark_representation" => $request->bookmark_representation
        ];

        $bookmark_request = new Request([
            "form_parameters"  => [
                "form_base_data_model" => $bookmarks_controller->controller_alias
            ],
            "main_data_models" => [
                $bookmarks_controller->controller_alias => [$bookmark]
            ]
        ]);

        $write_result = $this->write($bookmark_request)->getOriginalContent();

        if(isset($write_result["error"]) && $write_result["error"] === true)
        {
            return response()->json([
                "message" => "Ошибка при добавлении в избранное"
            ], 400);
        }

        return response()->json([
            "message"  => "Успешно добавлено в избранное",
            "bookmarks" => Bookmark::query()->where([
                "consumer_id" => \Auth::getUser()->id
            ])->get()
        ]);
    }

    public function deleteBookmark(Request $request)
    {
        $bookmark_url = $request->bookmark_url;

        Bookmark::query()->where([
            "consumer_id"  => \Auth::getUser()->id,
            "bookmark_url" => $bookmark_url
        ])->delete();

        return response()->json([
            "message" => "Успешно убрано из избранного",
            "bookmarks" => Bookmark::query()->where([
                "consumer_id" => \Auth::getUser()->id
            ])->get()
        ]);
    }
}
