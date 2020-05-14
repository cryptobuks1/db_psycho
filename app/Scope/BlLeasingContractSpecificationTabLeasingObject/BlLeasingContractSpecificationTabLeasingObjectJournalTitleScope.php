<?php


namespace App\Scope\BlLeasingContractSpecificationTabLeasingObject;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Query\JoinClause;

class BlLeasingContractSpecificationTabLeasingObjectJournalTitleScope implements Scope
{

    /**
     * @inheritDoc
     */
    public function apply(Builder $builder, Model $model)
    {
        $current_lang = \Lang::locale();
        $builder->join("_Languages as Languages", function(JoinClause $join) use ($current_lang)
        {
            $join->where("Languages.language_code", "=", $current_lang);
        })
            // Join на caption LeasingSubject
            ->join("__Captions as LeasingSubjectCaption", function(JoinClause $join)
            {
                $join->where("LeasingSubjectCaption.caption_name", "=", "LeasingSubject");
            })
            ->join("_TranslationCaptions as leasing_translation", function(JoinClause $join)
            {
                $join->on("leasing_translation.caption_id", "=",
                    "LeasingSubjectCaption.id")
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
            ->leftJoin("blLeasingObjectTypes as bl_leasing_object_types", "bl_leasing_object_types.id", "=",
                "blLeasingContractSpecificationTabLeasingObjects.bl_leasing_object_type_id")
            ->leftJoin("blLeasingObjectBrands as bl_leasing_object_brands", "bl_leasing_object_brands.id", "=",
                "blLeasingContractSpecificationTabLeasingObjects.bl_leasing_object_brand_id")
            ->leftJoin("blLeasingObjectModels as bl_leasing_object_models", "bl_leasing_object_models.id", "=",
                "blLeasingContractSpecificationTabLeasingObjects.bl_leasing_object_model_id")
            ->addSelect("blLeasingContractSpecificationTabLeasingObjects.*",
                \DB::raw("CONCAT(leasing_translation.caption_translation, ' ', bl_leasing_object_types.bl_leasing_object_type_name, ' ', bl_leasing_object_brands.bl_leasing_object_brand_name, ' ', bl_leasing_object_models.bl_leasing_object_model_name) as title"));
    }
}