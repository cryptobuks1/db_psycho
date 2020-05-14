<?php

namespace App\Models\Questionnaires;

use Illuminate\Database\Eloquent\Model;

class QuestionnaireAnswer extends Model
{
    protected $table = "QuestionnaireAnswers";

    protected $primaryKey = "id";

    protected $fillable = [
        'que_ans_name', 'que_id',
    ];

    protected $hidden = [
        'remember_token',
    ];

    public function questionnaires(){
        return $this->hasMany('App\Models\Questionnaires\Questionnaire','id', 'que_id');
    }
}
