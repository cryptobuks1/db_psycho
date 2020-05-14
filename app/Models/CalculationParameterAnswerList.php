<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\DefaultSystemParams;

class CalculationParameterAnswerList extends Model
{
    use DefaultSystemParams;
    protected $table = "CalculationParameterAnswerList";

    protected $primaryKey = "id";

    protected $fillable = [
        'extension_one_additional_detail_id',
        'calculation_parameter_value',
        'table_n',
        'row_id',
        'active_l',
        'deleted_l',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'remember_token',
    ];

    public static function getNewObject()
    {
        return [
            'id'                                 => null,
            'extension_one_additional_detail_id' => null,
            'calculation_parameter_value'        => null,
            'table_n'                            => null,
            'row_id'                             => null,
            'active_l'                           => true,
            'deleted_l'                          => false,
            'created_at'                         => '',
            'created_by'                         => '',
            'updated_at'                         => '',
            'updated_by'                         => '',
        ];
    }

    public function extensionOneAdditionalDetail()
    {
        return $this->hasOne('App\Models\ONE\ExtensionOneAdditionalDetail', 'id', 'extension_one_additional_detail_id');
    }
}
