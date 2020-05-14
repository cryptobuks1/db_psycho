<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FaqDev extends Model
{
    protected $table = "faq";

    protected $primaryKey = "id";

    protected $fillable = [

        'image_id',
        'faq_parent_id',
        'group_l',
        'faq_code',
        'faq_title',
        'faq_description',
        'faq_text',
        'actual_l',
        'deleted_l',
        'created_by',
        'updated_by',

    ];

    public static function getNewObject()
    {
        return [
            'image_id'        => null,
            'faq_parent_id'   => null,
            'group_l'         => false,
            'faq_code'        => 'somesupperId',
            'faq_title'       => null,
            'faq_description' => null,
            'faq_text'        => '',
            'actual_l'        => true,
            'deleted_l'       => false,
            'created_by'      => null,
            'updated_by'      => null,
            'created_at'      => null,
            'updated_at'      => null,
        ];
    }

    public function children()
    {
        return $this->hasMany(FaqDev::class, 'faq_parent_id', 'id')
            ->select(["id", "faq_parent_id", "faq_title", "image_id", "group_l"])->addSelect(DB::raw("'' as faq_text"))->with("image");
    }

    public function image()
    {
        return $this->hasOne('App\Models\Image', 'id', 'image_id');
    }


    protected $hidden = [
        'remember_token',
    ];
}
