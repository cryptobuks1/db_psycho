<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Facades\Auth;

class Substage extends Model
{
    protected $table = "Substages";

    protected $primaryKey = "id";

    protected $fillable = [
        'substage_name',
        'substage_function',
        'substage_description',
        'created_by',
        'updated_by'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];


    protected $hidden = [
        'remember_token',
    ];


    public function substage_lessons(){
        return $this->hasMany('App\Models\SubstageLesson','substage_id', 'id');
    }

    public function stage_substages(){
        return $this->hasMany('App\Models\StageSubstage','substage_id', 'id');
    }
}
