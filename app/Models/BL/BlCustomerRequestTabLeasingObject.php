<?php

namespace App\Models\BL;

use App\Http\Controllers\Api\JournalDocumentsController;
use App\Scope\BlCustomerRequestTabLeasingObject\BlCustomerRequestTabLeasingObjectJournalTitleScope;
use Illuminate\Database\Eloquent\Model;

class BlCustomerRequestTabLeasingObject extends Model
{
    protected $table = "blCustomerRequestTabLeasingObjects";

    protected $primaryKey = "id";

    protected $fillable = [
        'bl_customer_request_id',
        'line_n',
        'bl_leasing_object_type_id',
        'bl_leasing_object_brand_id',
        'bl_leasing_object_model_id',
        'bl_leasing_object_group_id',
        'bl_leasing_object_price',
        'bl_leasing_object_quantity',
        'bl_leasing_object_sum',
        'bl_leasing_calculation_main_document_id',
        'currency_id',
        'rate_VAT_id',
        'item_line_code',
        'supplier_contractor_id',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',

    ];

    protected static function boot()
    {
        parent::boot();

        if(\App::runningInConsole())
            return;

        if(\Route::current()->controller instanceof JournalDocumentsController)
            static::addGlobalScope(new BlCustomerRequestTabLeasingObjectJournalTitleScope());
    }

    public static function getNewObject()
    {
        return [
            'id'                                      => null,
            'bl_customer_request_id'                  => null,
            'line_n'                                  => 1,
            'bl_leasing_object_type_id'               => null,
            'bl_leasing_object_brand_id'              => null,
            'bl_leasing_object_model_id'              => null,
            'bl_leasing_object_group_id'              => null,
            'bl_leasing_object_price'                 => null,
            'bl_leasing_object_quantity'              => null,
            'bl_leasing_object_sum'                   => null,
            'bl_leasing_calculation_main_document_id' => null,
            'currency_id'                             => null,
            'rate_VAT_id'                             => null,
            'supplier_contractor_id'                  => null,
        ];
    }

    protected $hidden = [
        'remember_token',
    ];

    public function blLeasingObjectTypes()
    {
        return $this->hasOne('App\Models\BL\BlLeasingObjectType', 'id', 'bl_leasing_object_type_id');
    }

    public function blLeasingObjectBrands()
    {
        return $this->hasOne('App\Models\BL\BlLeasingObjectBrand', 'id', 'bl_leasing_object_brand_id');
    }

    public function blLeasingObjectModels()
    {
        return $this->hasOne('App\Models\BL\BlLeasingObjectModel', 'id', 'bl_leasing_object_model_id');
    }

    public function blLeasingObjectGroups()
    {
        return $this->hasOne('App\Models\BL\BlLeasingObjectGroup', 'id', 'bl_leasing_object_group_id');
    }

    public function blCustomerRequests()
    {
        return $this->hasOne('App\Models\BL\BlCustomerRequest', 'id', 'bl_customer_request_id');
    }
}
