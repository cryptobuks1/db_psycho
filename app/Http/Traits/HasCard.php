<?php


namespace App\Http\Traits;


use App\Http\Classes\CheckController;
use App\Models\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

trait HasCard
{

    /**
     * @var array
     */
    protected $card_captions;

    /**
     * @var array
     */
    protected $translated_card_captions;

    /**
     * @var string
     */
    protected $card_controller_alias;

    /**
     * @var array
     */
    protected $card_model;

    /**
     * @var bool
     */
    protected $is_new_object;

    /**
     * @var bool
     */
    protected $card_dependent;

    /**
     * @var array
     */
    protected $card_dependent_block;

    /**
     * @var array
     */
    protected $card_add_data_models;

    /**
     * @var array
     */
    protected $card_block_fields;

    /**
     * @var array
     */
    protected $card_show_form_parameters;

    /**
     * @var string
     */
    protected $card_form_title;

    /**
     * @var string
     */
    protected $card_main_data_model_name;

    /**
     * @var array
     */
    protected $card_links;

    /**
     * @var array
     */
    protected $card_main_data_models;

    /**
     * @var array
     */
    protected $card_sets_list;

    /**
     * @var bool
     */
    protected $hide_quotes;

    /**
     * Время в миллисекундах
     * @var int
     */
    protected $requery_interval;


    public function card(Request $request)
    {
        return $this->fetchCardControllerAlias()
            ->cardQuery()
            ->prepareCardModelData()
            ->setCardMainDataModels()
            ->setCardCaptions()
            ->setCardFormTitle()
            ->setCardDependent()
            ->setCardDependentBlock()
            ->setCardBlockFields()
            ->setCardSystemTab()
            ->setCardAddDataModels()
            ->setCardMainDataModelName()
            ->setCardLinks()
            ->setHideQuotes()
            ->setCardSetsList()
            ->setRequeryInterval()
            ->generateCard($request);
    }

    /**
     * @param Request $request
     * @return array
     */
    public function generateCard(Request $request): array
    {
        $card = [
            "sets"             => $this->getCardSets(),
            "tabs"             => $this->getCardBlockFields(),
            "main_data_models" => $this->getCardMainDataModels(),
            "form_parameters"  => [
                "form_title"                    => $this->getCardFormTitle(),
                "form_code"                     => $this->card_controller_alias,
                "disable_inputs"                => $this->card_show_form_parameters['read_only'],
                "form_is_dependent"             => $this->isCardDependent(),
                "form_type"                     => "card",
                "form_base_data_model"          => $this->card_controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_main_data_model_name"     => $this->getCardMainDataModelName(),
                "hide_quotes"                   => $this->getHideQuotes()
            ],
            "add_data_models" => $this->getCardAddDataModels()
        ];


        if($this->isCardDependent())
        {
            $card["dependent"] = $this->getCardDependentBlock();
        }

//        $this->loadAddDataModels($card);

        $links = $this->getCardLinks();

        if(is_array($links) && !empty($links))
        {
            $card["links"] = $links;
        }

        if(!is_null($this->requery_interval))
            $card["form_parameters"]["requery_interval"] = $this->requery_interval;

        return $card;
    }

    /**
     * Получает текущий controller_alias из таблицы контроллеров
     * @return $this
     */
    protected function fetchCardControllerAlias(): self
    {
        $this->card_controller_alias = Controller::query()
            ->where('controller_code', class_basename(\Route::current()->controller))
            ->value('controller_alias');

        return $this;
    }

    /**
     * @return $this
     */
    public function setRequeryInterval(): self
    {
        $this->requery_interval = null;

        return $this;
    }

    /**
     * @return array
     */
    protected function getCardSets()
    {
        return $this->getButtonsList($this->getCardSetsList());
    }


    /**
     * @return array
     */
    public function getCardCaptions(): array
    {
        return $this->card_captions;
    }

    /**
     * @return $this
     */
    public function setCardCaptions(): self
    {
        $this->card_captions = ["Name"];

        return $this;
    }

    /**
     * @return $this
     */
    public function translateCardCaptions(): self
    {
        $this->translated_card_captions = $this->getTranslateByKeys($this->getCardCaptions());

        return $this;
    }

    /**
     * @return Model|Model[]
     */
    public function getCardModel()
    {
        return $this->card_model;
    }

    /**
     * @param Model|Model[] $card_model
     */
    public function setCardModel($card_model): void
    {
        $this->card_model = $card_model;
    }

    /**
     * @return bool
     */
    public function isNewObject(): bool
    {
        return $this->is_new_object;
    }

    /**
     * @param bool $is_new_object
     */
    public function setIsNewObject(bool $is_new_object): void
    {
        $this->is_new_object = $is_new_object;
    }

    /**
     * @return bool
     */
    public function isCardDependent(): bool
    {
        return $this->card_dependent;
    }

    /**
     * @return $this
     */
    public function setCardDependent(): self
    {
        $this->card_dependent = false;

        return $this;
    }

    /**
     * @return array
     */
    public function getCardDependentBlock(): array
    {
        return $this->card_dependent_block;
    }

    /**
     * @return $this
     */
    public function setCardDependentBlock(): self
    {
        if($this->isCardDependent())
        {
            $this->card_dependent_block = [];
        }

        return $this;
    }

    /**
     * @return array
     */
    public function getCardAddDataModels(): array
    {
        return $this->card_add_data_models ?? [];
    }

    /**
     * @return $this
     */
    public function setCardAddDataModels(): self
    {
        $this->card_add_data_models = [];

        return $this;
    }

    /**
     * @return array
     */
    public function getCardBlockFields(): array
    {
        return $this->card_block_fields;
    }

    /**
     * @return $this
     */
    public function setCardBlockFields(): self
    {
        $this->card_block_fields = [];

        return $this;
    }

    /**
     * @param $caption_name
     * @return string
     */
    public function getTranslatedCardCaption($caption_name)
    {
        return $this->translated_card_captions[$caption_name]['translation_captions']['caption_translation'] ?? "$caption_name (не найден)";
    }

    /**
     * Проверить на права и добавить таб для системных данных
     * @return $this
     */
    public function setCardSystemTab()
    {
        $nameControllerMethod = [
            'controller'  => class_basename(\Route::current()->controller),
            'accessRight' => 'record'
        ];
        $this->card_show_form_parameters = (new CheckController($nameControllerMethod))->getShowFormParameters();

        if($this->card_show_form_parameters['show_system_tab'])
        {
            $tabSystem = [
                "tab_title"       => $this->getTranslatedCardCaption("SystemDetails"),
                "tab_name"        => $this->getTranslatedCardCaption("SystemDetails"),
                "tab_description" => '',
                "blocks_quantity" => 1,
                "blocks"          => [
                    [
                        "block_title"         => "Block1",
                        "block_zone_quantity" => 2,
                        "block_model"         => $this->card_controller_alias,
                        "block_type"          => "block_card",
                        "block_fields"        => [
                            [
                                'title'      => $this->getTranslatedCardCaption("CreatedAt"),
                                'model_name' => $this->card_controller_alias,
                                'model'      => 'created_at',
                                'type'       => 'label',
                                'width'      => '100%',
                                "zone"       => "1",
                                "order"      => "1"
                            ],
                            [
                                'title'      => $this->getTranslatedCardCaption("CreatedBy"),
                                'model_name' => $this->card_controller_alias,
                                'model'      => 'created_by',
                                'type'       => 'label',
                                'width'      => '100%',
                                "zone"       => "1",
                                "order"      => "2"
                            ],
                            [
                                'title'      => $this->getTranslatedCardCaption("UpdatedAt"),
                                'model_name' => $this->card_controller_alias,
                                'model'      => 'updated_at',
                                'type'       => 'label',
                                'width'      => '100%',
                                "zone"       => "2",
                                "order"      => "1"
                            ],
                            [
                                'title'      => $this->getTranslatedCardCaption("UpdatedBy"),
                                'model_name' => $this->card_controller_alias,
                                'model'      => 'updated_by',
                                'type'       => 'label',
                                'width'      => '100%',
                                "zone"       => "2",
                                "order"      => "2"
                            ],
                        ]
                    ]
                ]
            ];
            array_push($this->card_block_fields, $tabSystem);
        }

        return $this;
    }

    /**
     * @return string
     */
    public function getCardFormTitle(): string
    {
        return $this->getTranslatedCardCaption($this->card_form_title);
    }

    /**
     * @return $this
     */
    public function setCardFormTitle(): self
    {
        $this->card_form_title = "Name";

        return $this;
    }

    /**
     * @return string
     */
    public function getCardMainDataModelName(): string
    {
        return $this->card_main_data_model_name;
    }

    /**
     * @return $this;
     */
    public function setCardMainDataModelName(): self
    {
        $this->card_main_data_model_name = "Стандартное название";

        return $this;
    }

    /**
     * @return array
     */
    public function getCardLinks(): ?array
    {
        return $this->card_links;
    }

    /**
     * @return $this
     */
    public function setCardLinks(): self
    {
        $this->card_links = [];

        return $this;
    }

    /**
     * @return array
     */
    public function getCardMainDataModels(): array
    {
        $main_data_models = $this->card_main_data_models;

        $main_data_models = array_merge($main_data_models, [
            $this->card_controller_alias => $this->card_model
        ]);

        return $main_data_models;
    }

    /**
     * Установить дополнительные модели в блок main_data_models
     * @return $this
     */
    public function setCardMainDataModels(): self
    {
        $this->card_main_data_models = [];

        return $this;
    }

    /**
     * @return array
     */
    public function getCardSetsList(): array
    {
        return $this->card_sets_list;
    }

    /**
     * @return $this
     */
    public function setCardSetsList(): self
    {
        $this->card_sets_list = ['card_actions'];

        return $this;
    }

    /**
     * @return $this
     */
    public function setHideQuotes(): self
    {
        $this->hide_quotes = false;

        return $this;
    }

    /**
     * @return bool
     */
    public function getHideQuotes(): bool
    {
        return $this->hide_quotes;
    }


    /**
     * Основная часть запроса на получение главной модели
     * @return $this
     */
    protected function cardQuery()
    {
        $this->setCardModel([[]]);

        return $this;
    }

    /**
     * Дополнительная часть запроса на получение главной модели
     * @param Builder|array $builder
     * @return void
     */
    protected function cardAdditionalQuery($builder)
    {

    }

    /**
     * Установить поля главной модели
     * @return $this
     */
    public function prepareCardModelData()
    {


        return $this;
    }

    /**
     * @param array $card
     * @return array
     */
    public function loadAddDataModels(&$card): array
    {
        $add_data_models = $this->getCardAddDataModels();

        if(is_array($add_data_models) && (!empty($add_data_models) || $this->isCardDependent()))
        {
            $card["add_data_models"] = $add_data_models;
        }

        return $card;
    }


}
