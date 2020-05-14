<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class DbAreaByAccount extends Model{
    
    
    protected $table = "_DbAreaByAccounts";

    protected $primaryKey = "id";

    protected $fillable = [
        
        'db_area_by_consumer_account_id',
        'db_area_id',
        'consumer_account_id',
        'actual_l',
        'deleted_l',
        'created_by',
        'updated_by',

    ];
    
    
        
    protected $casts = [
        
        
        'id' => 'integer',
        'db_area_by_consumer_account_id'  => 'integer',
        'db_area_id' => 'integer',
        'consumer_account_id' => 'integer',
        'actual_l'=> 'boolean',
        'deleted_l'=> 'boolean',
        'created_by' => 'string',
        'updated_by' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        
        
    ];
    
    
    protected $hidden = [
        'remember_token',
    ];

   
}
