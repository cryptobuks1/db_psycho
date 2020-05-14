<?php


namespace App\Scope\BlLeasingCalculation;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Query\JoinClause;

class BlLeasingCalculationJournalTitleScope implements Scope
{

    /**
     * @inheritDoc
     */
    public function apply(Builder $builder, Model $model)
    {
        $current_lang = \Lang::locale();
        $builder ->join("_Languages as Languages", function(JoinClause $join) use ($current_lang)
        {
            $join->where("Languages.language_code", "=", $current_lang);
        })
            // Join на caption LeasingCalculation
            ->join("__Captions as LeasingCalculationCaption", function(JoinClause $join)
            {
                $join->where("LeasingCalculationCaption.caption_name", "=", "LeasingCalculation");
            })
            ->join("_TranslationCaptions as leasing_translation", function(JoinClause $join)
            {
                $join->on("leasing_translation.caption_id", "=",
                    "LeasingCalculationCaption.id")
                    ->on("leasing_translation.language_id", "=",
                        "Languages.id");
            })
            // Join на caption ot
            ->join("__Captions as otCaption", function(JoinClause $join)
            {
                $join->where("otCaption.caption_name", "=", "from");
            })
            ->join("_TranslationCaptions as from_translation", function(JoinClause $join)
            {
                $join->on("from_translation.caption_id", "=",
                    "otCaption.id")
                    ->on("from_translation.language_id", "=",
                        "Languages.id");
            })
        ->addSelect("blLeasingCalculations.*",\DB::raw("CONCAT(leasing_translation.caption_translation, ' №', bl_leasing_calculation_number, ' ', from_translation.caption_translation, ' ', bl_leasing_calculation_date) as title"));
    }
}