<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParamReport extends Model
{
    protected $table = "param_reports";

    protected $primaryKey = "id";

    protected $fillable = [
        'name_report',

    ];

    protected $hidden = [
        'remember_token',
    ];

    public function NameReports()
    {
        return $this->hasOne('App\Models\NameReport');
    }




}
