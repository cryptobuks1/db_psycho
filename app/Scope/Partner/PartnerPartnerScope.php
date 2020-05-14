<?php


namespace App\Scope\Partner;


use App\Http\Controllers\ConsumerAccessRowsController;
use App\Http\Traits\DefaultSystemParams;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class PartnerPartnerScope implements Scope
{
    use DefaultSystemParams;

    /**
     * @var string
     */
    private $model_name;

    /**
     * @param $model_name string
     */
    public function __construct($model_name)
    {

        $this->model_name = $model_name;
    }

    /**
     * @inheritDoc
     */
    public function apply(Builder $builder, Model $model)
    {
        $array = ConsumerAccessRowsController::getAccessRows($this->model_name);

        foreach($array as $key => $values)
        {
            $builder->where(function($query) use ($key, $values)
            {
                $query->whereIn($key, $values);
            });
        }
    }
}