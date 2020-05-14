<?php
//created Albert Topalu 03.04.19


namespace App\Models\BL;

use App\Http\Controllers\Api\JournalDocumentsController;
use App\Scope\BlLeasingContractSpecification\BlLeasingContractSpecificationJournalTitleScope;
use Illuminate\Database\Eloquent\Model;

class BlLeasingContractSpecification extends Model
{
    protected $table = "blLeasingContractSpecifications";

    protected $primaryKey = "id";

    protected $fillable = [
        'contractor_id',
        'contractor_contract_id',
        'db_area_id',
        'company_id',
        'bl_leasing_contract_specification_date',
        'uid_1c_code',
        'deleted_l',
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
            static::addGlobalScope(new BlLeasingContractSpecificationJournalTitleScope());
    }

    public function leasingObjects()
    {
        return $this->hasMany('App\Models\BL\BlLeasingContractSpecificationTabLeasingObject', 'bl_leasing_contract_specification_id', 'id');
    }

    public function schedulePayments()
    {
        return $this->hasMany('App\Models\BL\BlLeasingSchedulePayments', 'bl_leasing_contract_specification_id', 'id');
    }

    public function calculation(){
        return $this->hasOne('App\Models\BL\BlLeasingCalculation','bl_leasing_contract_specification_id', 'id');
    }

    public function blLeasingCalculations()
    {
        return $this->hasMany(BlLeasingCalculation::class, "bl_leasing_contract_specification_id", "id");
    }
}
