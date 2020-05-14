<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InfoKind extends Model
{
//    protected $table = "_Info_kinds";
    protected $table = "_InfoKinds";

    protected $primaryKey = "id";

    protected $fillable = [
        'info_type_id',
        'info_kind_code',
        'info_kind_name',
        'suser_name',
        'modify_date',
        'parent_id',
        'multiple_values_l'
    ];

    protected $hidden = [
        'remember_token',
    ];


    public function infotype(){
        return $this->belongsTo('App\Models\InfoType', 'id', 'info_type_id');
    }

    public function infoKinds()
    {
        return $this->hasMany(InfoKind::class, "parent_id", "id");
    }
}
