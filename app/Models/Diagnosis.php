<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Facades\Auth;

class Diagnosis extends Model
{
    protected $table = "Diagnoses";

    protected $primaryKey = "id";

    protected $fillable = [
        'diagnosis_group_id',
        'name',
        'code',
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


    public function diagnosis_group(){
        return $this->hasMany('App\Models\DiagnosisGroup','id', 'diagnosis_group_id');
    }

}
