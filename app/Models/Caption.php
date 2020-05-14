<?php

namespace App\Models;

use App\Http\Traits\ConsumerCheck;
use App\Http\Traits\DefaultSystemParams;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;

class Caption extends Model
{
    use ConsumerCheck, DefaultSystemParams;
    protected $table = "__Captions";

    protected $primaryKey = "id";

    protected $fillable = [
        'caption_name',
        'caption_remark',
        'created_by',
        'updated_by',
    ];

    protected $hidden = [
        'remember_token',
    ];

    public static function getNewObject()
    {
        return [
            'id'               => null,
            'caption_name'    => null,
            'caption_remark'    => null,
            'created_at'       => '',
            'created_by'       => '',
            'updated_at'       => '',
            'updated_by'       => '',
        ];
    }

//    public function newQuery($excludeDeleted = true)
//    {
//        if($this->isAdmin())
//            return parent::newQuery($excludeDeleted);
//        else
//            return parent::newQuery($excludeDeleted)
//                ->where("id", 0);
//    }

//    public function translation(){
//        return $this->hasOne('App\Translation','caption_id', 'id');
//    }


    public function allTranslations()
    {
        return $this->hasMany(TranslationCaption::class, "caption_id", "id");
    }

    public function translationCaptions()
    {
        $currrentLang = Lang::locale();
//        $currrentLang = 'ru';
        $languagesId = \Illuminate\Support\Facades\DB::table('_Languages')->select('id')->where('language_code', '=',  $currrentLang )->value('id');

        return $this->hasOne('App\Models\TranslationCaption', 'caption_id', 'id')
            ->where('language_id', $languagesId);
    }


//    public function translationCaption(){
//        $langLocale =  Lang::locale();
//        $langLocaleId = \Illuminate\Support\Facades\DB::table('languages')
//            ->select('id')
//            ->where('language_code', $langLocale)
//            ->value('id');
//
//        return $this->hasMany('App\TranslationCaption','caption_id', 'id')
//            ->where('language_id', $langLocaleId)
//            ;
//    }


}
