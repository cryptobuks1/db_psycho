<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $table = "reports";

    protected $primaryKey = "id";
//    protected $dateFormat = 'd/m/y';

    protected $fillable = [
        'user_id',
        'company_id',
        'report_name',
        'report_name_en',
        'report_name_ru',
        'report_lng',
        'report_organisation',
        'report_format',
        'report_start_date',
        'report_end_date',
        'report_file',
        'report_status',
    ];

    protected $casts = [
//        'report_start_date' => 'date_format:d/m/y',
//        'report_end_date' => 'date_format:d/m/y',
        'report_file' =>  'array'
        ];

    protected $hidden = [
        'remember_token',
    ];

    public function reportRequests()
    {
        return $this->hasMany('App\ReportRequest', 'report_id', 'id');
    }











}
