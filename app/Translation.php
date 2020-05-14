<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Translation extends Model
{
    protected $table = "translation_captions";

    protected $primaryKey = "id";

    protected $fillable = [
        'language_id',
        'caption_id',
        'caption_translation',
        'suser_name',
        'modify_date',
    ];

    protected $hidden = [
        'remember_token',
    ];

    public function capt(){
        return $this->hasOne('App\Models\Caption','id', 'caption_id');
    }

}
