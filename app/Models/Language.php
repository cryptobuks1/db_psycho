<?php

namespace App\Models;

use App\Http\Traits\ConsumerCheck;
use App\Http\Traits\DefaultSystemParams;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use ConsumerCheck, DefaultSystemParams;
    //    protected $table = "languages";
    protected $table = "_Languages";

    protected $fillable = [
        'language_code',
        'language_view',
        'language_name',
        'language_name_ru',
        'language_code3',
        'language_code_n',
        'updated_by'
    ];

    public static function getNewObject()
    {
        return [
            'id'               => null,
            'language_code'    => null,
            'language_view'    => null,
            'language_name'    => null,
            'language_name_ru' => null,
            'language_code3'   => false,
            'language_code_n'  => null,
            'created_at'       => '',
            'created_by'       => '',
            'updated_at'       => '',
            'updated_by'       => '',
        ];
    }

    protected $primaryKey = "id";

    protected $hidden = [
        'remember_token',
    ];



    public function text()
    {
        return $this->hasMany('App\Texts', 'language_id', 'id');
    }

    public function translation()
    {
        return $this->hasMany('App\Translation', 'language_id', 'id');
    }
}
