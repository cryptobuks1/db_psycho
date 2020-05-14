<?php


namespace App\Scope\BlLeasingContract;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Query\JoinClause;

class BlLeasingContractJournalTitleScope implements Scope
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
            // Join на caption DocumentBlLeasingContract
            ->join("__Captions as DocumentBlLeasingContractCaption", function(JoinClause $join)
            {
                $join->where("DocumentBlLeasingContractCaption.caption_name", "=", "LeasingContract");
            })
            ->join("_TranslationCaptions as leasing_translation", function(JoinClause $join)
            {
                $join->on("leasing_translation.caption_id", "=",
                    "DocumentBlLeasingContractCaption.id")
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
            ->join("ContractorContracts as contractor_contracts", "contractor_contracts.id", "=",
                "blLeasingContracts.contractor_contract_id")
            ->addSelect("blLeasingContracts.*",
                \DB::raw("CONCAT(leasing_translation.caption_translation, ' №', contractor_contracts.contractor_contract_number, ' ', from_translation.caption_translation, ' ', contractor_contracts.contractor_contract_date) as title"));
    }
}