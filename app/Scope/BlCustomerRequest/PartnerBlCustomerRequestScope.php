<?php


namespace App\Scope\BlCustomerRequest;


use App\Http\Controllers\ConsumerAccessRowsController;
use App\Http\Traits\DefaultSystemParams;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class PartnerBlCustomerRequestScope implements Scope
{
    use DefaultSystemParams;

    /**
     * @var string
     */
    private $model_name;

    /**
     * MyContractorsScope constructor.
     * @param $model_name string
     */
    public function __construct($model_name)
    {

        $this->model_name = $model_name;
    }
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
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