<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChangeRequestModel extends Model
{
    protected $table = "ChangeRequestModels";

    protected $primaryKey = "id";

    protected $fillable = [
        'db_type_model_id',
        'db_type_model_id_dep',
        'change_request_id',
        'row_id',
        'row_id_dep',
        'parent_id',
        'deleted_l',
        'created_by',
        'updated_by',
    ];

    public function changeRequestModelField(){
        return $this->hasMany(ChangeRequestModelField::class,'change_request_model_id','id')
            ->with('dbTypeModelField'); //get field name in _DbTypeControllerFields
    }

    public function dbTypeModel()
    {
        return $this->hasMany(DbTypeModel::class, 'id', 'db_type_model_id');
    }

}
