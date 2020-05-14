<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChangeRequestModelField extends Model
{
    protected $table = "ChangeRequestModelFields";

    protected $primaryKey = "id";

    protected $fillable = [
        'change_request_model_id',
        'system_status_id',
        'db_type_model_field_id',
        'field_reference',
        'row_key_value',
        'line_n',
        'comment',
        'created_by',
        'updated_by',
    ];

    public function changeRequestModelFieldValue(){
        return $this->hasMany(ChangeRequestModelFieldValue::class,'change_request_model_field_id','id');
    }

    public function dbTypeModelField(){
        return $this->hasOne(DbTypeModelField::class,'id','db_type_model_field_id');
    }
}
