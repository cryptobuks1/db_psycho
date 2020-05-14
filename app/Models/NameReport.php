<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NameReport extends Model
{
    protected $table = "name_reports";

    protected $primaryKey = "id";

    protected $fillable = [
        'name_report',
        'ru',
        'en',
    ];

    protected $hidden = [
        'remember_token',
    ];


    public function paramReports()
    {
        return $this->belongsToMany('App\Models\ParamReport', 'name_report_param_report',
            'name_report_id', 'param_report_id')->withPivot('value');

    }






}
