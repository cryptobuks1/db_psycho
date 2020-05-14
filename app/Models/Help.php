<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    protected $table = "Help";

    protected $primaryKey = "id";

    protected $fillable = [

        'image_id',
        'page_id',
        'help_parent_id',
        'group_l',
        'help_code',
        'help_title',
        'help_description',
        'actual_l',
        'deleted_l',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',

    ];

    public function image(){
        return $this->hasOne('App\Models\Image', 'id', 'image_id');
    }

    public function page(){
        return $this->hasOne('App\Models\Page', 'id', 'page_id');
    }

    protected $hidden = [
        'remember_token',
    ];
};
