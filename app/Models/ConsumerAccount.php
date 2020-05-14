<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ConsumerAccount extends Model{
    
    
    protected $table = "_ConsumerAccounts";

    protected $primaryKey = "id";

    protected $fillable = [
        
        
        'consumer_id',
        'consumer_account_code',
        'consumer_account_name',
        'actual_l',
        'deleted_l',
        'created_by',
        'updated_by',

    ];
    
    
        
    protected $casts = [
        
        'id' => 'integer',
        'consumer_id' => 'integer',
        'consumer_account_code' => 'string',
        'consumer_account_name' => 'string',
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
