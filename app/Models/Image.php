<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = "Images";

    protected $primaryKey = "id";

    protected $fillable = [
        'image_code',
        'image_name',
        'image_path',
        'file_type_id',
        'image_category_id',
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
            'id'                => null,
            'image_code'        => null,
            'image_name'        => null,
            'image_path'        => null,
            'file_type_id'      => null,
            'image_category_id' => null,
            'created_at'        => '',
            'created_by'        => '',
            'updated_at'        => '',
            'updated_by'        => '',
        ];
    }

    public function fileType()
    {
        return $this->hasOne('App\Models\Image', 'id', 'image_id');
    }

}
