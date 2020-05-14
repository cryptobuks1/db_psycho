<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImageCategory extends Model
{
    protected $table = "_ImageCategories";

    protected $primaryKey = "id";

    protected $fillable = [
        'image_category_code',
        'image_category_name',
        'image_category_path',
        'deleted_l',
        'created_by',
        'updated_by',

    ];


    protected $hidden = [
        'remember_token',
    ];

    public static function getNewObject()
    {
        return [
            'id'                  => null,
            'image_category_code' => null,
            'image_category_name' => null,
            'image_category_path' => null,
            'created_at'          => '',
            'created_by'          => '',
            'updated_at'          => '',
            'updated_by'          => '',
        ];
    }
}
