<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServerDb extends Model
{
    //    protected $table = "_serversDBs";
    protected $table = "_ServersDB";

    protected $primaryKey = "id";

    protected $fillable = [
        'server_id',
        'server_name',
        'server_ip',
        'server_url',
        'server_port',
        'server_http_code',
        'created_by' => 'string',
        'updated_by' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',

    ];

    protected $hidden = [
        'remember_token',
    ];

    public function servers()
    {
        return $this->hasMany('App\Models\DBase', 'server_id', 'id');
    }

    public static function getNewObject()
    {
        return [
            'id'               => null,
            'server_name'      => '',
            'server_ip'        => '',
            'server_url'       => '',
            'server_port'      => '',
            'server_http_code' => "null",
            'created_at'       => '',
            'created_by'       => '',
            'updated_at'       => '',
            'updated_by'       => '',
        ];
    }


}
