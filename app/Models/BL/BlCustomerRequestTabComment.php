<?php

namespace App\Models\BL;

use App\Http\Controllers\Api\BL\ClientBlCustomerRequestsController;
use App\Http\Controllers\Api\BL\PartnerBlCustomerRequestsController;
use App\Http\Controllers\Api\JournalDocumentsController;
use App\Scope\BlCustomerRequest\ClientBlCustomerRequestScope;
use App\Scope\BlCustomerRequest\PartnerBlCustomerRequestScope;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class BlCustomerRequestTabComment extends Model
{
    protected $table = "blCustomerRequestTabComments";

    protected $primaryKey = "id";

    protected $fillable = [
        "bl_customer_request_id",
        "line_n",
        "comments_system",
        "comments_guid",
        "comments_description",
        "comments_author",
        "comments_date",
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',

    ];

    public static function getNewObject()
    {
        return [
            'id'                     => null,
            "bl_customer_request_id" => null,
            "line_n"                 => null,
            "comments_system"        => null,
            "comments_guid"          => null,
            "comments_description"   => null,
            "comments_author"        => \Auth::user()->getFIO(),
            "comments_date"          => Carbon::now()->format("Y-m-d H:i:s"),
            'created_by'             => "",
            'updated_by'             => "",
            'created_at'             => "",
            'updated_at'             => "",
        ];
    }
}
