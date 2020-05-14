<?php


namespace App\Scope;


use App\Http\Controllers\Api\Admin\ConsumerAccessRowsNewController;
use App\Http\Traits\DefaultSystemParams;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ContractorsScope implements Scope
{
    use DefaultSystemParams;

    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param \Illuminate\Database\Eloquent\Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        return $builder->where("id", 1);
        $db_area_id = self::getDefaultDBAreaId();

        $result = ConsumerAccessRowsNewController::getAccessRows("contractor_id", $db_area_id);
        if($result === true)
            return $builder->where("db_area_id", $db_area_id);
        else
            return $builder
                ->whereIn("id", $result["ids"])
                ->where("db_area_id", $db_area_id);
    }
}