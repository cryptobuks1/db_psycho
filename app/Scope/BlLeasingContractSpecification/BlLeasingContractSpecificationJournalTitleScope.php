<?php


namespace App\Scope\BlLeasingContractSpecification;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Query\JoinClause;

class BlLeasingContractSpecificationJournalTitleScope implements Scope
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
            // Join на caption test_caption
            ->join("__Captions as test_captionCaption", function(JoinClause $join)
            {
                $join->where("test_captionCaption.caption_name", "=", "LeasingContractSpecification");
            })
            ->join("_TranslationCaptions as test_translation", function(JoinClause $join)
            {
                $join->on("test_translation.caption_id", "=",
                    "test_captionCaption.id")
                    ->on("test_translation.language_id", "=",
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
            ->join("ContractorContracts as contractor_contracts", "contractor_contracts.id", "=",
                "blLeasingContractSpecifications.contractor_contract_id")
            ->addSelect("blLeasingContractSpecifications.*",
                \DB::raw("CONCAT(test_translation.caption_translation, ' №', contractor_contracts.contractor_contract_number, ' ', from_translation.caption_translation, ' ', contractor_contracts.contractor_contract_date) as title"));
    }
}