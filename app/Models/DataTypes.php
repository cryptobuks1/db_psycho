<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataTypes extends Model
{
    protected $table = "__DataTypes";

    protected $primaryKey = "id";

    protected $fillable = [
        'data_type_code',
        'data_type_name',
        'data_type_rem'
    ];

    protected $hidden = [
        'remember_token',
    ];

    public function systemParameter(){
        return $this->hasMany('App\Models\SystemParameter', 'data_type_id', 'id');
    }
}
