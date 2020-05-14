<?php


namespace App\Http\Traits;


use App\Models\Controller;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

trait HasList
{
    /**
     * @var array
     */
    protected $list_block_fields;

    /**
     * @var array
     */
    protected $list_links;

    /**
     * @var array
     */
    protected $list_captions;

    /**
     * @var array
     */
    protected $translated_list_captions;

    /**
     * @var Model|Model[]|array
     */
    protected $list_model;

    /**
     * @var string
     */
    protected $list_controller_alias;

    /**
     * @var string
     */
    protected $list_form_search_field;

    /**
     * @var bool
     */
    protected $list_dependent;

    /**
     * Блок dependent
     * @var array
     */
    protected $list_dependent_block;

    /**
     * @var string
     */
    protected $list_form_title;

    /**
     * @var array
     */
    protected $list_add_data_models;

    /**
     * @var bool
     */
    protected $list_header_break_line;

    /**
     * @var array
     */
    protected $actions;

    /**
     * @var array
     */
    protected $list_sets_commands;

    /**
     * @param Request $request
     * @return JsonResponse
     */

    public function list(Request $request)
    {
        return $this->setListCaptions()
            ->listQuery()
            ->prepareListModelData()
            ->fetchListControllerAlias()
            ->setListFormSearchField()
            ->setListBlockFields()
            ->setListLinks()
            ->setListDependent()
            ->setListDependentBlock()
            ->setListAddDataModels()
            ->setListFormTitle()
            ->setListHeaderBreakLine()
            ->setListCommands()
            ->generateList($request);
    }

    public function generateList(Request $request)
    {
        $list = [
            "main_data_models" => [
                $this->list_controller_alias => $this->list_model
            ],
            "sets"             => $this->list_sets_commands,
            "form_parameters"  => [
                "form_title"                    => $this->getTranslatedListCaption($this->getListFormTitle()),
                "form_code"                     => $this->list_controller_alias,
                "form_is_dependent"             => $this->list_dependent,
                "form_type"                     => "list",
                "list_header_break_line"        => $this->isListHeaderBreakLine(),
                "form_base_data_model"          => $this->list_controller_alias,
                "form_main_data_model_id_field" => "id",
                "form_type_list"                => [
                    "form_search_field" => $this->getListFormSearchField()
                ],
            ],
            "tabs"             => [
                [
                    "tab_title"       => $this->getTranslatedListCaption('Main'),
                    "blocks_quantity" => 1,
                    "blocks"          => $this->getListBlockFields()
                ]
            ]
        ];

        $links = $this->getListLinks();

        if(is_array($links) && !empty($links))
        {
            $list["links"] = $links;
        }

        if($this->list_dependent)
        {
            $list["dependent"] = $this->getListDependentBlock();
        }

        $add_data_models = $this->getListAddDataModels();

        if(is_array($add_data_models) && !empty($add_data_models))
        {
            $list["add_data_models"] = $add_data_models;
        }

        if(is_array($this->actions) && !empty($this->actions))
        {
            $list["actions"] = $this->actions;
        }

        return response()->json($list);
    }

    /**
     * Перевод captions
     * @return $this
     */
    protected function translateListCaptions()
    {
        $this->translated_list_captions = $this->getTranslateByKeys($this->list_captions);

        return $this;
    }

    /**
     * Получает текущий controller_alias из таблицы контроллеров
     * @return $this
     */
    protected function fetchListControllerAlias()
    {
        $this->list_controller_alias = Controller::query()
            ->where('controller_code', class_basename(\Route::current()->controller))
            ->value('controller_alias');

        return $this;
    }

    /**
     * Установить list_block_fields (в методе указать какие).
     * @return $this
     */
    public function setListBlockFields()
    {
        $this->list_block_fields = [
            [
                "block_title"         => "Название",
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
                ]
            ]
        ];

        return $this;
    }

    /**
     * @return array
     */
    public function getListBlockFields(): array
    {
        return $this->list_block_fields;
    }

    /**
     * Установить links (в методе указать какие).
     * @return $this
     */
    public function setListLinks()
    {
        $this->list_links = [];

        return $this;
    }

    /**
     * @return array
     */
    public function getListLinks(): array
    {
        return $this->list_links;
    }

    /**
     * Установить captions (в методе указать какие). Например:
     * $this->list_captions = ["ok", "apply", "Main", "Name"];
     * @return $this
     */
    public function setListCaptions()
    {
        $this->list_captions = ["ok", "apply", "Main", "Name"];

        return $this;
    }

    /**
     * @param Model|Model[] $list_model
     * @return $this
     */
    public function setListModel($list_model)
    {
        $this->list_model = $list_model;

        return $this;
    }

    /**
     * @return $this
     */
    public function setListFormSearchField()
    {
        $this->list_form_search_field = "leased_asset";

        return $this;
    }

    /**
     * @return string
     */
    public function getListFormSearchField(): string
    {
        return $this->list_form_search_field;
    }

    /**
     * @param $caption_name
     * @return string
     */
    public function getTranslatedListCaption($caption_name)
    {
        return $this->translated_list_captions[$caption_name]['translation_captions']['caption_translation'] ?? "$caption_name (не найден)";
    }

    /**
     * Наборы команд
     * @return $this
     */
    public function setListCommands()

    {
        $this->list_sets_commands = $this->getButtonsList(['list_bottom', 'list_top', 'list_top_dropdown_actions', 'list_top_left_command_bar', 'list_top_right_command_bar']);

        return $this;
    }

    /**
     * Установить list_dependent (в методе указать значение). Например:
     * $this->list_dependent = false;
     * @return $this
     */
    public function setListDependent()
    {
        $this->list_dependent = false;

        return $this;
    }

    /**
     * Установить list_form_title (в методе указать какое). Например:
     * $this->list_form_title = "Name";
     * @return $this
     */
    public function setListFormTitle()
    {
        $this->list_form_title = "Name";

        return $this;
    }

    /**
     * @return string
     */
    public function getListFormTitle(): string
    {
        return $this->list_form_title;
    }

    /**
     * @return array
     */
    public function getListDependentBlock(): array
    {
        return $this->list_dependent_block;
    }

    /**
     * Установить list_dependent_block (указать в методе). Например:
     * $this->list_dependent_block = [];
     * @return $this
     */
    public function setListDependentBlock()
    {
        $this->list_dependent_block = [];

        return $this;
    }

    /**
     * @return array
     */
    public function getListAddDataModels(): array
    {
        return $this->list_add_data_models;
    }

    /**
     * Установить list_add_data_models (указать в методе). Например:
     * $this->list_add_data_models = [];
     * @return $this
     */
    public function setListAddDataModels()
    {
        $this->list_add_data_models = [];

        return $this;
    }

    /**
     * @return bool
     */
    public function isListHeaderBreakLine(): bool
    {
        return $this->list_header_break_line;
    }

    /**
     * @return self
     */
    public function setListHeaderBreakLine(): self
    {
        $this->list_header_break_line = false;

        return $this;
    }


    /**
     * Основная часть запроса на получение главной модели
     * @return $this
     */
    protected function listQuery()
    {
        $this->setListModel([[]]);

        return $this;
    }

    /**
     * Дополнительная часть запроса на получение главной модели
     * @param $builder
     * @return void
     */
    protected function listAdditionalQuery($builder)
    {

    }

    /**
     * Установить поля главной модели
     * @return $this
     */
    public function prepareListModelData()
    {


        return $this;
    }


}
