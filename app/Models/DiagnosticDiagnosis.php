<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Facades\Auth;

class DiagnosticDiagnosis extends Model
{
    protected $table = "DiagnosticDiagnoses";

    protected $primaryKey = "diagnosis_id";
    protected $secondaryKey = "diagnostic_id";
    protected $secondaryKeyQueryValue = null;

    protected $fillable = [
        'diagnosis_id',
        'diagnostic_id',
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

    public function newQuery()
    {
        $query = parent::newQuery();
        $query->where($this->secondaryKey, '=', $this->secondaryKeyQueryValue);
        return $query;
    }

    public function diagnostic(){
        return $this->hasOne('App\Models\Diagnostic','id', 'diagnostic_id');
    }

    public function diagnosis(){
        return $this->hasOne('App\Models\DiagnosticDiagnoses','id', 'diagnosis_id');
    }

}
