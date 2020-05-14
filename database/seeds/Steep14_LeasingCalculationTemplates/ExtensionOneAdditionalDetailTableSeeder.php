<?php

use Illuminate\Database\Seeder;

class ExtensionOneAdditionalDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\ExtensionOneAdditionalDetail::truncate();

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 1,
            'calculation_parameter_type_id' => 5,
            'one_add_detail_id'             => 1,
            'one_additional_detail_code'    => "AdvanceCurrency",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 2,
            'calculation_parameter_type_id' => 5,
            'one_add_detail_id'             => 2,
            'one_additional_detail_code'    => "LeasingContractCurrency",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 3,
            'calculation_parameter_type_id' => 5,
            'one_add_detail_id'             => 3,
            'one_additional_detail_code'    => "LeasingSubjectCurrency",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 4,
            'calculation_parameter_type_id' => 5,
            'one_add_detail_id'             => 4,
            'one_additional_detail_code'    => "FinancingCurrency",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 5,
            'calculation_parameter_type_id' => 5,
            'one_add_detail_id'             => 5,
            'one_additional_detail_code'    => "InsuranceOption",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 6,
            'calculation_parameter_type_id' => 5,
            'one_add_detail_id'             => 6,
            'one_additional_detail_code'    => "StateDuty",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 7,
            'calculation_parameter_type_id' => 6,
            'one_add_detail_id'             => 7,
            'one_additional_detail_code'    => "LeasingContractDate",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 8,
            'calculation_parameter_type_id' => 6,
            'one_add_detail_id'             => 8,
            'one_additional_detail_code'    => "LeasingStartDate",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 9,
            'calculation_parameter_type_id' => 6,
            'one_add_detail_id'             => 9,
            'one_additional_detail_code'    => "FirstPaymentDate",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 10,
            'calculation_parameter_type_id' => 9,
            'one_add_detail_id'             => 10,
            'one_additional_detail_code'    => "IsAgent",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 11,
            'calculation_parameter_type_id' => 9,
            'one_add_detail_id'             => 11,
            'one_additional_detail_code'    => "AreCostsForTheTracker",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 12,
            'calculation_parameter_type_id' => 9,
            'one_add_detail_id'             => 12,
            'one_additional_detail_code'    => "IsSubsidy",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 13,
            'calculation_parameter_type_id' => 9,
            'one_add_detail_id'             => 13,
            'one_additional_detail_code'    => "IsFranchise",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 14,
            'calculation_parameter_type_id' => 9,
            'one_add_detail_id'             => 14,
            'one_additional_detail_code'    => "LeasingSubjectOnLesseeBalance",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 15,
            'calculation_parameter_type_id' => 1,
            'one_add_detail_id'             => 15,
            'one_additional_detail_code'    => "TotalVATonAdvance",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 16,
            'calculation_parameter_type_id' => 4,
            'one_add_detail_id'             => 16,
            'one_additional_detail_code'    => "LeasingRate",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 17,
            'calculation_parameter_type_id' => 5,
            'one_add_detail_id'             => 17,
            'one_additional_detail_code'    => "LeasingSubject",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => true,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 18,
            'calculation_parameter_type_id' => 2,
            'one_add_detail_id'             => 18,
            'one_additional_detail_code'    => "AdvancePercent",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 19,
            'calculation_parameter_type_id' => 1,
            'one_add_detail_id'             => 19,
            'one_additional_detail_code'    => "RegistrationCosts",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 20,
            'calculation_parameter_type_id' => 2,
            'one_add_detail_id'             => 20,
            'one_additional_detail_code'    => "LeasingContractExpireDate",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 21,
            'calculation_parameter_type_id' => 2,
            'one_add_detail_id'             => 21,
            'one_additional_detail_code'    => "DCTSupplyExpireDate",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 22,
            'calculation_parameter_type_id' => 1,
            'one_add_detail_id'             => 22,
            'one_additional_detail_code'    => "AgentRate",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 23,
            'calculation_parameter_type_id' => 1,
            'one_add_detail_id'             => 23,
            'one_additional_detail_code'    => "LendingRate",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 24,
            'calculation_parameter_type_id' => 1,
            'one_add_detail_id'             => 24,
            'one_additional_detail_code'    => "MarginRate",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 25,
            'calculation_parameter_type_id' => 1,
            'one_add_detail_id'             => 25,
            'one_additional_detail_code'    => "SupplyVATRate",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 26,
            'calculation_parameter_type_id' => 1,
            'one_add_detail_id'             => 26,
            'one_additional_detail_code'    => "CalculationVATRate",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 27,
            'calculation_parameter_type_id' => 1,
            'one_add_detail_id'             => 27,
            'one_additional_detail_code'    => "InsuranceRate",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 28,
            'calculation_parameter_type_id' => 1,
            'one_add_detail_id'             => 28,
            'one_additional_detail_code'    => "AppreciationRate",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 29,
            'calculation_parameter_type_id' => 1,
            'one_add_detail_id'             => 29,
            'one_additional_detail_code'    => "LeasingSubjectCost",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 30,
            'calculation_parameter_type_id' => 1,
            'one_add_detail_id'             => 30,
            'one_additional_detail_code'    => "CASCOCost",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 31,
            'calculation_parameter_type_id' => 5,
            'one_add_detail_id'             => 31,
            'one_additional_detail_code'    => "StateRegistrationPartyLessee",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 32,
            'calculation_parameter_type_id' => 5,
            'one_add_detail_id'             => 32,
            'one_additional_detail_code'    => "InsuranceCompany",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 33,
            'calculation_parameter_type_id' => 5,
            'one_add_detail_id'             => 33,
            'one_additional_detail_code'    => "InsuranceCompanyName",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 34,
            'calculation_parameter_type_id' => 5,
            'one_add_detail_id'             => 34,
            'one_additional_detail_code'    => "InsuresLessee",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 35,
            'calculation_parameter_type_id' => 1,
            'one_add_detail_id'             => 35,
            'one_additional_detail_code'    => "AdvanceAmount",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 36,
            'calculation_parameter_type_id' => 1,
            'one_add_detail_id'             => 36,
            'one_additional_detail_code'    => "AgentFee",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 37,
            'calculation_parameter_type_id' => 2,
            'one_add_detail_id'             => 37,
            'one_additional_detail_code'    => "LeasingContractAmount",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 38,
            'calculation_parameter_type_id' => 1,
            'one_add_detail_id'             => 38,
            'one_additional_detail_code'    => "LeasingSubjectTaxSum",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 39,
            'calculation_parameter_type_id' => 1,
            'one_add_detail_id'             => 39,
            'one_additional_detail_code'    => "TrackerExpenses",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 40,
            'calculation_parameter_type_id' => 1,
            'one_add_detail_id'             => 40,
            'one_additional_detail_code'    => "SubsidyAmount",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 41,
            'calculation_parameter_type_id' => 1,
            'one_add_detail_id'             => 41,
            'one_additional_detail_code'    => "FinancingAmount",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 42,
            'calculation_parameter_type_id' => 1,
            'one_add_detail_id'             => 42,
            'one_additional_detail_code'    => "FranchiseAmount",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 43,
            'calculation_parameter_type_id' => 5,
            'one_add_detail_id'             => 43,
            'one_additional_detail_code'    => "PaymentType",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 44,
            'calculation_parameter_type_id' => 1,
            'one_add_detail_id'             => 44,
            'one_additional_detail_code'    => "TransportTax",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        \App\Models\ExtensionOneAdditionalDetail::create([
            'id'                            => 45,
            'calculation_parameter_type_id' => 9,
            'one_add_detail_id'             => 45,
            'one_additional_detail_code'    => "AccountVATRateChanges",
            'db_area_id'                    => 6,
            'deleted_l'                     => false,
            'actual_l'                      => true,
            'answer_list_l'                 => false,
            'created_by'                    => 'seeds',
            'updated_by'                    => 'seeds',
        ]);

        if(config("database.default") == "pgsql"){

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"ExtensionOneAdditionalDetails_id_seq\"', 50, true)");
        }
    }
}
