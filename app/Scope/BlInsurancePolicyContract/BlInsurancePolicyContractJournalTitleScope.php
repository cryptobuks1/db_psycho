<?php


namespace App\Scope\BlInsurancePolicyContract;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Query\JoinClause;

class BlInsurancePolicyContractJournalTitleScope implements Scope
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
            // Join на caption InsuranceContract
            ->join("__Captions as InsuranceContractCaption", function(JoinClause $join)
            {
                $join->where("InsuranceContractCaption.caption_name", "=", "InsuranceContract");
            })
            ->join("_TranslationCaptions as contract_translation", function(JoinClause $join)
            {
                $join->on("contract_translation.caption_id", "=",
                    "InsuranceContractCaption.id")
                    ->on("contract_translation.language_id", "=",
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
                "blInsurancePolicyContracts.contractor_contract_id")
            ->groupBy("blInsurancePolicyContracts.id", "contract_translation.caption_translation", "contractor_contracts.contractor_contract_number", "from_translation.caption_translation", "contractor_contracts.contractor_contract_date")
            ->addSelect("blInsurancePolicyContracts.*",
                \DB::raw("CONCAT(contract_translation.caption_translation, ' №', contractor_contracts.contractor_contract_number, ' ', from_translation.caption_translation, ' ', contractor_contracts.contractor_contract_date) as title"));
    }
}