<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeUrl extends Model
{
    protected $table = "FeUrls";

    protected $primaryKey = "id";

    protected $fillable = [
        'controller_id',
        'fe_url_code',
        'fe_url_parameter',
        'fe_url_image_id',
        'caption_code',
        'actual_l',
        'deleted_l',
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
            "controller_id" => "",
            'fe_url_image_id' => '',
            "fe_url_code" => "",
            "fe_url_parameter" => "",
            "caption_code" => "",
            "fe_url_page_theme" => "",
            "fe_url_header_top" => "",
            "fe_url_header_bottom" => "",
            "fe_url_footer_top" => "",
            "fe_url_footer_bottom" => "",
            "fe_url_info" => "",
            'actual_l' => "",
            "deleted_l" => "",
            "created_at" => "",
            "updated_at" => "",
            "created_by" => "",
            "updated_by" => "",
        ];
    }

    public function controller(){
        return $this->hasOne('App\Models\Controller','id', 'controller_id');
    }
    public function image(){
        return $this->hasOne('App\Models\Image','id', 'fe_url_image_id');
    }
}
