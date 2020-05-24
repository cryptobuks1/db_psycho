<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Facades\Auth;

class Program extends Model
{
    protected $table = "Programs";

    protected $primaryKey = "id";

    protected $fillable = [
        'diagnosis_id',
        'name',
        'function',
        'description',
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


    public function diagnosis(){
        return $this->hasOne('App\Models\Diagnosis','id', 'diagnosis_id');
    }

    public function corrections(){
        return $this->hasMany('App\Models\Correction','program_id', 'id');
    }
    public function program_stages(){
        return $this->hasMany('App\Models\ProgramStage','program_id', 'id');
    }

}
