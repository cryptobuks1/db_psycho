<?php
//created Albert Topalu 03.04.19
namespace App\Models\BL;

use App\Http\Controllers\Api\JournalDocumentsController;
use App\Scope\BlLeasingContractSpecificationTabLeasingObject\BlLeasingContractSpecificationTabLeasingObjectJournalTitleScope;
use Illuminate\Database\Eloquent\Model;

class BlLeasingContractSpecificationTabLeasingObject extends Model
{
    protected $table = "blLeasingContractSpecificationTabLeasingObjects";

    protected $primaryKey = "id";

    protected $fillable = [
        'bl_leasing_object_model_id',
        'bl_leasing_object_type_id',
        'rate_VAT_id',
        'contractor_id',
        'bl_leasing_contract_specification_id',
        'bl_leasing_object_brand_id',
        'line_n',
        'bl_leasing_object_price',
        'bl_leasing_object_quantity',
        'bl_leasing_object_sum',
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
            static::addGlobalScope(new BlLeasingContractSpecificationTabLeasingObjectJournalTitleScope());
    }

    public function model()
    {
        return $this->hasOne('App\Models\BL\BlLeasingObjectModel', 'id', 'bl_leasing_object_model_id');
    }

    public function type()
    {
        return $this->hasOne('App\Models\BL\BlLeasingObjectType', 'id', 'bl_leasing_object_type_id');
    }

    public function brand()
    {
        return $this->hasOne('App\Models\BL\BlLeasingObjectBrand', 'id', 'bl_leasing_object_brand_id');
    }

    public  function dealer(){
        return $this->hasOne('App\Models\Contractor','id','contractor_id');
    }












}
