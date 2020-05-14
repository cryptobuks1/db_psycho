<?php

namespace App\Http\Controllers\Api\BL;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use App\Models\BL\BlInsurancePolicyContract;
use App\Models\ModelTables;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;

class BlInsurancePolicyContractsController extends Controller
{

    public function insert()
    {

    }

    public function update()
    {

    }

    /*public function delete(){

    }*/

    public function list_query(){
        return BlInsurancePolicyContract::query()
//            ->with('insuranceCompany', 'contractorContract')
            ->leftJoin("ContractorContracts", "ContractorContracts.id", "=", "blInsurancePolicyContracts.contractor_contract_id")
            ->has('blInsurancePolicyContractTabLeasingContract.contractorContract')
            ->select("blInsurancePolicyContracts.*",
                "ContractorContracts.*");
    }

    public function list(Request $request)
    {

//        return '123';

        $captionName = [
            'DateInsuranceContractNumber',
            'EndDateInsurance',
            'InsurancePremium',
            'PaymentDueDate',
            'Insured',
            'InsuranceCompany',
            'LeasingContractStatus',
            'LeasingSubject',
            'Franchise',
            'InsuranceContracts',
            'InformLessorInsuredEvent',
            'CaseAccident',
            'CaseStealing',
            'DateLeasingContractNumber'

        ];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $InsuranceContracts = [];
        $insuranceList = $this->list_query()->get()->toArray();

        foreach ($insuranceList as $key => $value) {
            //$insurantTable = ModelTables::where("table_n", $value['table_n_insurant'])->get()->toArray()[0];
            //$model = 'App' . $insurantTable['table_folder'] . '\\' . $insurantTable['table_code'];
            //$insurant = $model::where('id', $value['row_id_insurant'])->get()->toArray()[0] ?? null;
            array_push($InsuranceContracts, [
                'contractor_contract_name' => $value['contractor_contract_name'],
                'contractor_contract_expiration_date' => Carbon::parse($value['contractor_contract_expiration_date'])->format('d-m-Y H:i:s'),
                'bl_insurance_policy_contract_insurance_premium' => $this->formatNumbers($value['bl_insurance_policy_contract_insurance_premium']),
                'd1_payment_term_next_installment' => $value['d1_payment_term_next_installment'],
                //'insurant' => $insurant[$insurantTable['table_output_template']],
                'insurant' => $value['d9_insurant'],
                //'contractor_insurance_company_name' => $value['insurance_company']['contractor_short_name'],
                'contractor_insurance_company_name' => $value['d10_insurance_company'],
                'd11_leasing_contract_name' => $value['d11_leasing_contract_name'],
                'd2_leasing_contract_status' => $value['d2_leasing_contract_status'],
                'd3_leasing_object' => $value['d3_leasing_object'],
                'bl_insurance_policy_contract_franchise_amount' => $this->formatNumbers($value['bl_insurance_policy_contract_franchise_amount'])
            ]);
        }

        $model = 'App\Models\Controller';
        $mainModel = $model::where('controller_code',class_basename(Route::current()->controller))->value('controller_alias');

        $list = [
            "main_data_models" => [
                $mainModel => $InsuranceContracts
            ],
            "sets" => $this->getButtonsList(['list_bottom','list_top','list_top_dropdown_actions','list_top_left_command_bar','list_top_right_command_bar']),
            "form_parameters" => [
                "form_title" => $getArrayCaptions['InsuranceContracts']['translation_captions']['caption_translation'],
                "form_code" => "InsuranceContracts",
                "form_is_dependent" => false, // {if true -> show field} {if false hidden field)
                "form_type" => "list",
                "form_base_data_model" => $mainModel,
                "form_main_data_model_id_field" => "id",
                "prevent_list_click" => true,
                "list_async_data" => true,
                "list_header_break_line" => true,
                "form_type_list" => [
                    "form_card_url" => "/contractors_new/",
                    "form_search_field" => "",
                ],
            ],
            "links" => [

                ["link_title" => $getArrayCaptions['InformLessorInsuredEvent']['translation_captions']['caption_translation'],
                    "link_url" => "/contractorRequests/new",
                    "class" => "btn btn-link-inline",
                    "link_type" => "internal",
                    "img" => ""
                ],
//                ["link_title" => $getArrayCaptions['CaseAccident']['translation_captions']['caption_translation'],
//                    "link_url" => "/faq?id=10",
//                    "class" => "btn btn-link-inline",
//                    "link_type" => "internal",
//
//                    "img" => ""
//                ],
//                ["link_title" => $getArrayCaptions['CaseStealing']['translation_captions']['caption_translation'],
//                    "link_url" => "/faq?id=12",
//                    "class" => "btn btn-link-inline",
//                    "link_type" => "internal",
//
//                    "img" => ""
//                ],

            ],


            "tabs" => [
                [
                    "tab_title" => '',
                    "blocks_quantity" => 1,
                    "blocks" => [

                        [
//                            "block_title" => $getArrayCaptions['Contractors']['translation_captions']['caption_translation'],
                            "block_zone_quantity" => 1,
                            "block_model" => $mainModel,
                            "block_type" => "block_list_base",
                            "block_fields" => [
                                /*list fields zone 1*/
                                //['key' => 'index', "label" =>'№', 'sortable' => false, 'class' => '', "zone" => "1", 'thStyle' => 'width: 6%',],
//                                ['key' => 'actions', 'sortable' => false,
//                                    'class' => 'list_checkbox',
//                                    'thStyle' => 'width: 6%',
//                                    "zone" => "1",
//                                    "order" => "1"
//                                ],
//                                ['key' => 'contractor_short_name', 'sortable' => true, 'class' => 'contractor_short_name', "zone" => "1", "label"=>$getArrayCaptions['ContractorShortName']['translation_captions']['caption_translation'] ],
                                ['key' => 'contractor_contract_name', 'sortable' => true, 'class' => 'contractor_short_name',
                                    "label" => $getArrayCaptions['DateInsuranceContractNumber']['translation_captions']['caption_translation'], 'thStyle' => 'width:10%', "zone" => "1", "order" => "2", "filter" => true],

                                ['key' => "contractor_contract_expiration_date", 'sortable' => true, 'class' => "",'typeVal' => 'date','format'  => 'DD-MM-YYYY HH:mm:ss',
                                    "label" => $getArrayCaptions['EndDateInsurance']['translation_captions']['caption_translation'], 'thStyle' => 'width:10%', "zone" => "1", "order" => "4", "filter" => true],

                                ['key' => 'bl_insurance_policy_contract_insurance_premium', 'sortable' => true, 'class' => '','typeVal' => 'number','format' => '0,0.00',
                                    "label" => $getArrayCaptions['InsurancePremium']['translation_captions']['caption_translation'], 'thStyle' => 'width:10%', "zone" => "1", "order" => "5", "filter" => true],


                                ['key' => "d1_payment_term_next_installment", 'sortable' => true, 'class' => "",'typeVal' => 'date','format'  => 'DD-MM-YYYY HH:mm:ss',
                                    "label" => $getArrayCaptions['PaymentDueDate']['translation_captions']['caption_translation'], 'thStyle' => 'width:10%', "zone" => "1", "order" => "3", "filter" => true],

                                ['key' => "insurant", 'sortable' => true, 'class' => "",
                                    "label" => $getArrayCaptions['Insured']['translation_captions']['caption_translation'], 'thStyle' => 'width:10%', "zone" => "1", "order" => "3", "filter" => true],

                                ['key' => "contractor_insurance_company_name", 'sortable' => true, 'class' => "",
                                    "label" => $getArrayCaptions['InsuranceCompany']['translation_captions']['caption_translation'], 'thStyle' => 'width:10%', "zone" => "1", "order" => "3", "filter" => true],

                                ['key' => "d11_leasing_contract_name", 'sortable' => true, 'class' => "",
                                 "label" => $getArrayCaptions['DateLeasingContractNumber']['translation_captions']['caption_translation'], 'thStyle' => 'width:10%', "zone" => "1", "order" => "3", "filter" => true],

                                ['key' => "d2_leasing_contract_status", 'sortable' => true, 'class' => "",
                                    "label" => $getArrayCaptions['LeasingContractStatus']['translation_captions']['caption_translation'], 'thStyle' => 'width:10%', "zone" => "1", "order" => "3", "filter" => true],

                                ['key' => "d3_leasing_object", 'sortable' => true, 'class' => "",
                                    "label" => $getArrayCaptions['LeasingSubject']['translation_captions']['caption_translation'], 'thStyle' => 'width:10%', "zone" => "1", "order" => "3", "filter" => true],

                                ['key' => "bl_insurance_policy_contract_franchise_amount", 'sortable' => true, 'class' => "",'typeVal' => 'number','format' => '0,0.00',
                                    "label" => $getArrayCaptions['Franchise']['translation_captions']['caption_translation'], 'thStyle' => 'width:10%', "zone" => "1", "order" => "3", "filter" => true],


                            ]
                        ]
                    ]
                ]
            ]
        ];


        return response()->json($list);
    }

    public function card()
    {

    }

    private function formatNumbers($number){
        $str_value = str_replace(',', '.', $number);
        $str_value = preg_replace('/\s+/u', '', $str_value);
        $num_value = number_format(floatval($str_value), 2, ".", " ");
        return $num_value;
    }
}
