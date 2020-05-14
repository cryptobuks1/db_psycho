<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
/**
 * Description of DbType
 *
 * @author Юрий Юренко
 */
class DbType extends Model{



    protected $table = "__DbTypes";

    protected $primaryKey = "id";

    protected $fillable = [
        'db_id',
        'db_type_code',
        'db_type_name',
        'db_type_remark',
        'created_by',
        'updated_by',

    ];


    protected $casts = [
        'id' => 'integer',
        'db_id' => 'integer',
        'db_type_code' => 'string',
        'db_type_name' => 'string',
        'db_type_remark' => 'string',
        'created_by' => 'string',
        'updated_by' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',

    ];

    public static function getNewObject()
    {
        return [
            'id' => null,
            'db_type_code' => '',
            'db_type_name' => '',
            'db_type_remark' => null,
            'created_at' => '',
            'created_by' => '',
            'updated_at' => '',
            'updated_by' => '',
        ];
    }


    protected $hidden = [
        'remember_token',
    ];
}
