<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Support\Facades\Auth;

class Lesson extends Model
{
    protected $table = "Lessons";

    protected $primaryKey = "id";

    protected $fillable = [
        'lesson_name',
        'lesson_function',
        'lesson_description',
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


    public function substage_lessons(){
        return $this->hasMany('App\Models\SubstageLesson','lesson_id', 'id');
    }

}
