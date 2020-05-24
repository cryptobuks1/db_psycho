<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Facades\Auth;

class Correction extends Model
{
    protected $table = "Corrections";

    protected $primaryKey = "id";

    protected $fillable = [
        'program_id',
        'application_id',
        'correction_name',
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


    public function application(){
        return $this->hasOne('App\Models\Application','id', 'application_id');
    }

    public function program(){
        return $this->hasOne('App\Models\Program','id', 'program_id');
    }

    public function correction_stages(){
        return $this->hasMany('App\Models\CorrectionStage','correction_id', 'id');
    }

}
