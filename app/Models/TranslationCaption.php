<?php

namespace App\Models;

use App\Http\Traits\ConsumerCheck;
use App\Http\Traits\DefaultSystemParams;
use Illuminate\Database\Eloquent\Model;

class TranslationCaption extends Model
{
    use ConsumerCheck, DefaultSystemParams;
    protected $table = "_TranslationCaptions";

    protected $fillable = [
        'caption_id',
        'language_id',
        'caption_translation',
        'created_by',
        'updated_by'
    ];


    protected $primaryKey = "id";

    protected $hidden = [
        'remember_token',
    ];

    public static function getNewObject()
    {
        return [
            "id" => null,
            "caption_id" => null,
            "language_id" => null,
            "caption_translation" => "",
            "caption_name" => ""
        ];
    }





    public function capt()
    {
        return $this->hasOne('App\Models\Caption', 'id', 'caption_id');
    }

    public function language()
    {
        return $this->hasOne(Language::class, "id", "language_id");
    }


}
