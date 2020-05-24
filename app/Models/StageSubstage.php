<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Facades\Auth;

class StageSubstage extends Model
{
    protected $table = "StageSubstages";

    protected $primaryKey = "stage_id";
    protected $secondaryKey = "substage_id";
    protected $secondaryKeyQueryValue = null;

    protected $fillable = [
        'stage_id',
        'substage_id',
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

    public function stage(){
        return $this->hasOne('App\Models\Stage','id', 'stage_id');
    }

    public function substage(){
        return $this->hasOne('App\Models\Substage','id', 'substage_id');
    }

}
