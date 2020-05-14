<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ActionType extends Model{
    
    
    protected $table = "__ActionTypes";

    protected $primaryKey = "id";

    protected $fillable = [
        'access_right_id',
        'action_type_code',
        'action_type_name',
        'created_by',
        'updated_by',
    ];
    
    
        
    protected $casts = [
        'id' => 'integer',
        'action_type_code' => 'string',
        'action_type_name' => 'string',
        'created_by' => 'string',
        'updated_by' => 'string',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        
    ];
    
    
    protected $hidden = [
        'remember_token',
    ];

   
}
