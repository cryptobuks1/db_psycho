<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NameReportParamReport extends Model
{
    protected $table = "name_report_param_report";
    protected $primaryKey = "id";



    protected $fillable = [
        'name_report_id',
        'param_report_id',
    ];

    protected $hidden = [
        'remember_token',
    ];

    public function ParamReportsValue(){
        return $this->hasOne('App\ParamReportsValue');
    }


}
