<?php

namespace App\Models\BL;

use App\Http\Controllers\Api\JournalDocumentsController;
use App\Scope\BlLeasingCalculation\BlLeasingCalculationJournalTitleScope;
use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\DefaultSystemParams;

class BlLeasingCalculation extends Model
{
    use DefaultSystemParams;
    protected $table = "blLeasingCalculations";

    protected $primaryKey = "id";

    protected $fillable = [
        'bl_status_id',
        'bl_leasing_object_group_id',
        'bl_leasing_contract_specification_id',
        'calculation_template_id',
        'table_n_base',
        'row_id_base',
        'company_id',
        'currency_id',
        'bl_leasing_calculation_number',
        'bl_leasing_calculation_date',
        'bl_leasing_calculation_kind',
        'db_area_id',
        'uid_1c_code',
        'item_line_code',
        'deleted_l',
        'calculating_l',
        'stored_file_id',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];
    protected $hidden = [
        'remember_token',
    ];

    protected static function boot()
    {
        parent::boot();

        if(\App::runningInConsole())
            return;

        if(\Route::current()->controller instanceof JournalDocumentsController)
            static::addGlobalScope(new BlLeasingCalculationJournalTitleScope());
    }

    public static function getCardUrl()
    {
        $controller = \Route::current()->controller;

        if($controller instanceof JournalDocumentsController)
            return "leasingCalculations";

        // Стандартное значение
        return "leasingCalculations";
    }

    public static function getNewObject()
    {
        return [
            'id'                                   => null,
            'bl_status_id'                         => null,
            'bl_leasing_object_group_id'           => null,
            'bl_leasing_contract_specification_id' => null,
            'calculation_template_id'              => null,
            'table_n_base'                         => null,
            'row_id_base'                          => null,
            'company_id'                           => self::getDefaultCompanyId(),
            'currency_id'                          => null,
            'bl_leasing_calculation_number'        => '',
            'bl_leasing_calculation_date'          => null,
            'bl_leasing_calculation_kind'          => '',
            'db_area_id'                           => self::getDefaultDBAreaId(),
            'uid_1c_code'                          => null,
            'stored_file_id'                       => null,
            'deleted_l'                            => false,
            'calculating_l'                        => false,
            'created_by'                           => null,
            'updated_by'                           => null,
            'created_at'                           => null,
            'updated_at'                           => null,
        ];
    }

    public function company()
    {
        return $this->hasOne('App\Models\Company', 'id', 'company_id');
    }

    public function currency()
    {
        return $this->hasOne('App\Models\Currency', 'id', 'currency_id');
    }

    public function blstatus()
    {
        return $this->hasOne('App\Models\BL\BlStatus', 'id', 'bl_status_id');
    }

    public function dbarea()
    {
        return $this->hasOne('App\Models\DbArea', 'id', 'db_area_id');
    }

    public function blLeasingCalculationsTabAdditionalDetail()
    {
        return $this->HasMany('App\Models\BL\BlLeasingCalculationsTabAdditionalDetail', 'bl_leasing_calculation_id', 'id');
    }

    public function blLeasingObjectGroups()
    {
        return $this->HasMany('App\Models\BL\BlLeasingObjectGroup', 'id', 'bl_leasing_object_group_id');
    }

    public function blSchedule()
    {
        return $this->HasMany('App\Models\BL\BlSchedule', 'bl_leasing_calculation_id', 'id');
    }

    public function blCustomerRequest()
    {
        return $this->hasOne('App\Models\BL\BlCustomerRequest', 'id', 'row_id_base');
    }

    public function blLeasingContract()
    {
        return $this->hasOne('App\Models\BL\BlLeasingContract', 'id', 'row_id_base');
    }

    public function blCustomerRequestTabLeasingObjects()
    {
        return $this->hasMany(BlCustomerRequestTabLeasingObject::class, "bl_leasing_object_group_id", "bl_leasing_object_group_id");
    }

    public function blLeasingContractSpecificationTabLeasingObjects()
    {
        return $this->hasMany(BlLeasingContractSpecificationTabLeasingObject::class, "bl_leasing_contract_specification_id", "bl_leasing_contract_specification_id");
    }
}
