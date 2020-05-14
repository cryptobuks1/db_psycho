<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ControllerLink extends Model
{
    protected $table = "__ControllerLinks";

    protected $primaryKey = "id";

    protected $fillable = [
        'controller_id',
        'controller_id_link',
        'table_field_name_composite',
        'table_field_name',
        'parent_link_l',
        'table_l',
        'created_by',
        'updated_by',
    ];


    protected $hidden = [
        'remember_token',
    ];

    public function models()
    {
        return $this->hasOne('App\Models\ModelTables', 'table_n', 'controller_table_n');
    }

    public function controllerParent()
    {
        return $this->hasOne('App\Models\Controller', 'id', 'controller_id_link');
    }

    public function controller(){
        return $this->hasMany('App\Models\Controller', 'id', 'controller_id_link');
    }

    public function controllerLinkParent()
    {
        return $this->hasOne('App\Models\Controller', 'id', 'controller_id');
    }
}
