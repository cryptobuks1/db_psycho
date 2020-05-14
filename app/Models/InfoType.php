<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoType extends Model
{
//    protected $table = "_Info_types";
    protected $table = "_InfoTypes";

    protected $primaryKey = "id";

    protected $fillable = [
        'info_type_code',
        'info_type_name',
    ];

    protected $hidden = [
        'remember_token',
    ];

    public function infokind(){
        return $this->hasMany('App\Models\InfoKind', 'info_type_id', 'id');
    }

}
