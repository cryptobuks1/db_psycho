<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Facades\Auth;

class Diagnostic extends Model
{
    protected $table = "Diagnostics";

    protected $primaryKey = "id";

    protected $fillable = [
        'application_id',
        'comment',
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

    public function diagnostic_diagnoses(){
        return $this->hasMany('App\Models\DiagnosticDiagnosis','diagnostic_id', 'id');
    }

}
