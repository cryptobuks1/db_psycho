<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Facades\Auth;

class SubstageLesson extends Model
{
    protected $table = "SubstageLessons";

    protected $primaryKey = "substage_id";
    protected $secondaryKey = "lesson_id";
    protected $secondaryKeyQueryValue = null;

    protected $fillable = [
        'substage_id',
        'lesson_id',
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

    public function substage(){
        return $this->hasOne('App\Models\Substage','id', 'substage_id');
    }

    public function lesson(){
        return $this->hasOne('App\Models\Lesson','id', 'lesson_id');
    }

}
