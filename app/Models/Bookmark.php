<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $table = "bookmarks";

    protected $primaryKey = "id";

    protected $fillable = [
//        'fe_component_id',
        'consumer_id',
        'bookmark_url',
        'bookmark_representation',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'remember_token',
    ];

    public static function getNewObject()
    {
        return [
            "id" => null,
            'consumer_id'=>null,
            'bookmark_url' => '',
            'bookmark_representation' => "",
            "created_at" => "",
            "updated_at" => "",
            "created_by" => "",
            "updated_by" => "",
        ];
    }
}
