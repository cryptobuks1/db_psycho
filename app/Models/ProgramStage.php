<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Facades\Auth;

class ProgramStage extends Model
{
    protected $table = "ProgramStages";

    protected $primaryKey = "program_id";
    protected $secondaryKey = "stage_id";
    protected $secondaryKeyQueryValue = null;

    protected $fillable = [
        'program_id',
        'stage_id',
        'line_n',
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

    public function program(){
        return $this->hasOne('App\Models\Program','id', 'program_id');
    }

    public function stage(){
        return $this->hasOne('App\Models\Stage','id', 'stage_id');
    }

}
