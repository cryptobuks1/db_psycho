<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Facades\Auth;

class Stage extends Model
{
    protected $table = "Stages";

    protected $primaryKey = "id";

    protected $fillable = [
        'teacher_id',
        'stage_name',
        'stage_function',
        'stage_description',
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


    public function teacher(){
        return $this->hasOne('App\Models\Application','id', 'teacher_id');
    }

    public function program_stages(){
        return $this->hasMany('App\Models\ProgramStage','stage_id', 'id');
    }

    public function correction_stages(){
        return $this->hasMany('App\Models\CorrectionStage','stage_id', 'id');
    }

    public function stage_substages(){
        return $this->hasMany('App\Models\StageSubstage','stage_id', 'id');
    }
}
