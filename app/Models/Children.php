<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Facades\Auth;

class Children extends Model
{
    protected $table = "Children";

    protected $primaryKey = "id";

    protected $fillable = [
        'diagnosis_id',
        'parent_id',
        'name',
        'second_name',
        'middle_name',
        'age',
        'gender',
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

    public function parent(){
        return $this->hasOne('App\Models\Consumer','id', 'parent_id');
    }

    public function diagnosis(){
        return $this->hasOne('App\Models\Diagnosis','id', 'diagnosis_id');
    }

}
