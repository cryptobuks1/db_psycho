<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Facades\Auth;

class DiagnosisGroup extends Model
{
    protected $table = "DiagnosisGroups";

    protected $primaryKey = "id";

    protected $fillable = [
        'diagnosis_group_name',
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


    public function diagnoses(){
        return $this->hasMany('App\Models\Diagnosis','diagnosis_group_id', 'id');
    }

}
