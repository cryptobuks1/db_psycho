<?php

namespace App\Models\Questionnaires;

use Illuminate\Database\Eloquent\Model;

class QuestionnaireQuestion extends Model
{
    protected $table = "QuestionnaireQuestions";

    protected $primaryKey = "id";

    protected $fillable = [
        'que_que_text', 'que_id', 'que_type_id',
        'caption_id', 'email_l', 'questionnaire_name_l'
    ];

    protected $hidden = [
        'remember_token',
    ];
}
