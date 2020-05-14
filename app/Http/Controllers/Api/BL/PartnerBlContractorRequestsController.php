<?php

namespace App\Http\Controllers\Api\BL;

use App\Http\Traits\HasCard;
use App\Models\Contractor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;

class PartnerBlContractorRequestsController extends BlContractorRequestsController
{

    protected function listAdditionalQuery(Builder $builder)
    {
        $builder->with(["partner"]);
//            ->has("partner");
        return $builder;
     }


    public function prepareListModelData()
    {
        $models = $this->list_model;

        $this->list_model = [];

        foreach ($models as $model)
        {
            array_push($this->list_model, [
                'id'                    => $model['id'],
                'Date'                  => Carbon::parse($model['created_at'])->format('d-m-Y H:i:s'),
                'ContractorRequestType' => $model['blcont_request_type']['bl_contractor_request_type_name'],
                'Name'                  => $model['bl_contractor_request_title'],
                'Status'                => $model['blstatus']['bl_status_name'],
                'Contractor'            => $model['contractor']['contractor_short_name'],
                'partner' => $model['partner'][0]['partner_name'] ?? ''
            ]);
        }

        return $this;
    }

    public function setListBlockFields()
    {
        $this->list_block_fields = [
            [
                "block_title"         => $this->getTranslatedListCaption('Clients'),
                "block_zone_quantity" => 1,
                "block_model"         => $this->list_controller_alias,
                "block_type"          => "block_list_base",
                "block_fields"        => [
                    ['key'     => 'actions', 'sortable' => false,
                        'class'   => 'list_checkbox',
                        'thStyle' => 'width: 6%',
                        "zone"    => "1",
                        "order"   => "1"
                    ],
                    ['key'   => 'Date', 'sortable' => true, 'class' => 'created_at',
                        "label" => $this->getTranslatedListCaption('Date'), 'thStyle' => 'width: 10%', 'typeVal' => 'date', 'format' => 'MM-DD-YYYY',],

                    ['key'   => 'ContractorRequestType', 'sortable' => true,
                        "label" => $this->getTranslatedListCaption('QueryType'), 'thStyle' => 'width: 21%'],

                    ['key'   => "Contractor", 'sortable' => true,
                        "label" => $this->getTranslatedListCaption('Contractor'), 'thStyle' => 'width: 21%', 'typeVal' => 'number', 'format' => '0,0.00',],
                    ['key'   => "Name", 'sortable' => true,
                        "label" => $this->getTranslatedListCaption('Name'), 'thStyle' => 'width: 21%'],
                    ['key'   => "Status", 'sortable' => true,
                        "label" => $this->getTranslatedListCaption('Status'), 'thStyle' => 'width: 21%'],

                    ['key'   => "partner", 'sortable' => true,
                        "label" => 'partner', 'thStyle' => 'width: 21%'],
                ]
            ]
        ];

        return $this;
    }

    public function setCardBlockFields()
    {
        $contractors = Contractor::select(['id', 'contractor_short_name'])
            ->where('actual_l', true)->orderBy('id')->get()->toArray();

        $singleContractor = count($contractors) == 1 ? true : false;
        $this->card_block_fields = [
            [
                "tab_title" => $this->getTranslatedCardCaption("Main"),
                "tab_description" => '',
                "blocks_quantity" => 1,
                "blocks" => [
                    [
                        "block_title" => $this->getTranslatedCardCaption("ContractorRequest"),
                        "block_zone_quantity" => 1,
                        "block_width" => "50%",
                        "block_model" => $this->card_controller_alias,
                        "block_type" => "block_card",
                        "block_fields" => [
                            ['title' => $this->getTranslatedCardCaption("Theme"), 'model_name' => $this->card_controller_alias, 'model' => 'bl_contractor_request_title', 'type' => 'text', 'width' => '100%', "zone" => "1", "order" => "1", "border_right" => false],
                            $singleContractor == false ?
                                ['title' => $this->getTranslatedCardCaption("Contractor"),
                                    'model' => 'contractor_id',
                                    'model_name' => $this->card_controller_alias,
                                    'type' => 'vue-select',
                                    'width' => '100%',
                                    'options' => [],
                                    "options_data" => [
                                        "options_data_model" => "Contractors",
                                        "options_field_id" => "id",
                                        "options_field_title" => "contractor_short_name",
                                        "search" => ""
                                    ],
                                    "zone" => "1",
                                    "order" => "2",
                                    "border_right" => false,
                                    "validation" => ["required" => true]] :
                                ['title' => $this->getTranslatedCardCaption("Contractor"), 'model_name' => $this->card_controller_alias, 'model' => 'contractor_short_name', 'type' => 'label', 'width' => '100%', "zone" => "1", "order" => "2", "border_right" => false, 'validation' => ['required' => true]],
                            ['title' => $this->getTranslatedCardCaption("QueryType"),
                                'model' => 'bl_contractor_request_type_id',
                                'model_name' => $this->card_controller_alias,
                                'type' => 'vue-select',
                                'width' => '50%',
                                'options' => [],
                                "options_data" => [
                                    "options_data_model" => "BlContractorRequestTypes",
                                    "options_field_id" => "id",
                                    "options_field_title" => "bl_contractor_request_type_name",
                                    "search" => ""
                                ],
                                "zone" => "1",
                                "order" => "3",
                                "border_right" => false,
                                "validation" => ["required" => true]],
                            ['title' => $this->getTranslatedCardCaption("Status"), 'model' => 'status', 'model_name' => $this->card_controller_alias, 'type' => 'label', 'width' => '50%', "zone" => "1", "order" => "4", "border_right" => false],
                            ['title' => $this->getTranslatedCardCaption("Description"), 'model_name' => $this->card_controller_alias, 'model' => 'bl_contractor_request_description', 'type' => 'textarea', 'width' => '100%', "zone" => "1", "order" => "5", "border_right" => false],
                        ]
                    ]
                ],
            ]
        ];


        If (!$this->isNewObject()) {
            $emptyFile[] = [
                'id'                 => null,
                'db_area_file_name'  => null,
                'stored_file_id'     => null,
                'bl_att_doc_kind_id' => null,
                'table_n_owner'      => $this->contrsModelTableN,
                'row_id_owner'       => $this->card_model['contractor_id'] ?? null,
                'table_n_doc'        => $this->dbareaFilesModelTableN,
                'row_id_doc'         => $this->contReqId,
                'db_area_id'         => self::getDefaultDBAreaId(),
                'uid_1c_code'        => null,
                'deleted_l'          => false,
                'created_by'         => "",
                'updated_by'         => "",
                'created_at'         => "",
                'updated_at'         => "",
                'stored_file_bd'     => "",
                'stored_file_size'   => "",
                'stored_file_ext'    => "",
            ];

            array_push($this->card_block_fields[0]['blocks'], [
                "form_is_dependent" => false,
                "block_title" => "Присоединенные файлы",
                "block_zone_quantity" => 1,
                "block_width" => "50%",
                "block_model" => $this->dbareaFilesModelName,
                "block_type" => "block_card",
                "block_fields" => [
                    [
                        'title' => $this->getTranslatedCardCaption("AttachDocument"),
                        'model' => 'files',
                        'item_actions' => $this->getButtonsList([($this->card_model[0]['sent_l']) ? 'att_file_download' : 'att_file_bar']),
                        'type' => 'file_loader',
                        'model_name' => $this->dbareaFilesModelName,
                        'fields' => [
                            ['label' => $this->getTranslatedCardCaption("Name"), 'key' => 'db_area_file_name', 'class' => 'file-loader-name'],
                            ['label' => $this->getTranslatedCardCaption("Format"), 'key' => 'extension'],
                            ['label' => $this->getTranslatedCardCaption("Size"), 'key' => 'size'],
                            ['label' => $this->getTranslatedCardCaption("Actions"), 'key' => 'list_actions'],
                        ],
                        'validation' => ['size' => 3072, 'ext' => array('jpg', 'jpeg', 'png', 'pdf')],
                        'width' => '100%',
                        "zone" => "1",
                        "order" => "4",
                        "border_right" => false,
                        'empty_model' => [$this->dbareaFilesModelName => $emptyFile],
                    ],
                ]
            ]);
            $card['tabs'][0]['blocks_quantity'] = 2;
        }

        return $this;
    }


}
