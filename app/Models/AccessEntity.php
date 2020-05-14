<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;
/**
 * Description of AccessEntity
 *
 * @author Юрий Юренко
 */
class AccessEntity extends Model{
    
    
    
    
    protected $table = "__AccessEntities";

    protected $primaryKey = "id";

    protected $fillable = [
        'access_entity_code',
        'access_entity_name',
        'access_type_id',
        'table_n',
        'table_n_dep',
        'created_by',
        'updated_by',
    ];
    
    
    protected $casts = [
        'id' => 'integer',
        'access_entity_code' => 'integer',
        'access_entity_name' => 'string',
        'access_type_id' => 'integer',
        'table_n' => 'integer',
        'table_n_dep' => 'integer',
        'created_by' => 'string',
        'updated_by' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        
    ];
    
    
    
    
    protected $hidden = [
        'remember_token',
    ];

    
}
