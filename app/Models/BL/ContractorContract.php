<?php
//created Albert Topalu 03.04.19

namespace App\Models\BL;

use App\Http\Controllers\Api\Admin\ConsumerAccessRowsNewController;
use App\Http\Traits\ConsumerCheck;
use App\Http\Traits\DefaultSystemParams;
use App\Models\Contractor;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class ContractorContract extends Model
{
    use ConsumerCheck, DefaultSystemParams;
    protected $table = "ContractorContracts";

    protected $primaryKey = "id";

    protected $fillable = [
        'db_area_id',
        'table_n',
        'row_id',
        'contractor_id',
        'company_id',
        'contractor_contract_date',
        'contractor_contract_number',
        'contractor_contract_expiration_date',
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

    public function newQuery($excludeDeleted = true)
    {
        $db_area_id = self::getDefaultDBAreaId();
        if($this->isAdmin())
            return parent::newQuery($excludeDeleted);
        else
        {
            $return = parent::newQuery($excludeDeleted)->where("db_area_id", $db_area_id);

            $result = ConsumerAccessRowsNewController::getAccessRows("contractor_id", $db_area_id);
            if(is_array($result))
                $return = $return->whereIn("contractor_id", $result["ids"]);

            $result = ConsumerAccessRowsNewController::getAccessRows("company_id", $db_area_id);
            if(is_array($result))
                $return = $return->whereIn("company_id", $result["ids"]);

            return $return;
        }
    }

//    public function blLeasingContract()
//    {
//        return $this->hasOne(BlLeasingContract::class, 'contractor_contract_id', 'id');
//    }

    public function contractor()
    {
        return $this->hasOne(Contractor::class, 'id', 'contractor_id');
    }

    public function specifications()
    {
        return $this->hasMany('App\Models\BL\BlLeasingContractSpecification', 'contractor_contract_id', 'id');
    }

    public function leasingContract()
    {
        return $this->hasOne('App\Models\BL\BlLeasingContract', 'contractor_contract_id', 'id');
    }

    public function schedule()
    {
        return $this->hasMany("App\Models\BL\BlLeasingSchedulePayments", 'contractor_contract_id', 'id');
    }
    public function dbarea()
    {
        return $this->hasOne('App\Models\DbArea', 'id', 'db_area_id');
    }

}
