<?php

namespace App\Models\Questionnaires;

use App\Models\Consumer;
use App\Models\QuestionnaireTemplates\QuestionnaireTemplate;
use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{
    protected $table = "Questionnaire";

    protected $primaryKey = "id";

    protected $fillable = [
        "questionnaire_templates_id",
        "consumer_id",
        "deleted_l",
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',

    ];

    public static function getNewObject()
    {
        return [
            "questionnaire_templates_id" => null,
            "consumer_id" => null,
            "deleted_l" => false,
            'created_by' => "",
            'updated_by' => "",
            'created_at' => "",
            'updated_at' => "",
        ];
    }

    public function questionnairesAnswer()
    {
        return $this->BelongsTo('App\Models\Questionnaires\QuestionnaireAnswer', 'que_id', 'id');
    }

    public function consumer()
    {
        return $this->hasOne(Consumer::class, "id", "consumer_id");
    }

    public function questionnaireTemplate()
    {
        return $this->hasOne(QuestionnaireTemplate::class, "id", "questionnaire_templates_id");
    }

    public function questionnaireQuestionAnswer()
    {
        return $this->hasMany(QuestionnaireQuestionAnswer::class, "questionnaire_id", "id");
    }
}
