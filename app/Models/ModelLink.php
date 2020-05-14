<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelLink extends Model
{
    protected $table = "__ModelLinks";

    protected $primaryKey = "id";

    protected $fillable = [
        'table_n',
        'table_n_link',
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


    public function controller()
    {
        return $this->hasMany(Controller::class, "controller_table_n", "table_n_link");
    }

    public function models()
    {
        return $this->hasOne(ModelTables::class, 'table_n', 'table_n');
    }

    public function modelParent()
    {
        return $this->hasOne(ModelTables::class, 'table_n', 'table_n_link');
    }
    public function modelLinkParent()
    {
        return $this->hasOne(ModelTables::class, 'table_n', 'table_n');
    }

    public function controllerParent()
    {
        return $this->hasOne('App\Models\Controller', 'controller_table_n', 'table_n_link');
    }
}
