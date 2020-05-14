<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;
/**
 * Description of AccessEntitiesByRole
 *
 * @author Юрий Юренко
 */
class AccessEntitiesByRole extends Model{
    
    
    
    protected $table = "_AccessEntitiesByRoles";

    protected $primaryKey = "id";

    protected $fillable = [
        'access_entity_id',
        'access_role_id',
        'action_type_id',
        'created_by',
        'updated_by',


//        'access_role_id',
//        'access_entity_id',
//        'allow_add_l',
//        'allow_delete_l',
//        'allow_read_l',
//        'allow_update_l',
//        'allow_select_option_l',
//        'created_by',
//        'updated_by',

    ];
    
    
    protected $casts = [
        'id' => 'integer',
        'access_entity_id' => 'integer',
        'access_role_id' => 'integer',
        'action_type_id' => 'integer',
        'created_by' => 'string',
        'updated_by' =>'string'


//        'id' => 'integer',
//        'access_role_id' => 'integer',
//        'access_entity_id' => 'integer',
//        'allow_add_l' => 'boolean',
//        'allow_delete_l' =>'boolean',
//        'allow_read_l' => 'boolean',
//        'allow_update_l' => 'boolean',
//        'allow_select_option_l' =>'boolean',
//        'created_by' => 'string',
//        'updated_by' => 'string',
//        'created_at' => 'datetime',
//        'updated_at' => 'datetime',
        
    ];
    
    
    
    
    protected $hidden = [
        'remember_token',
    ];

    //add Albert Topalu 12.10.18 13:59
//        public function accessEntities(){
//            return $this->hasMany('App\AccessEntity', 'id', 'access_entity_id');
//        }

//    public function actionTypes(){
//        return $this->hasMany('App\AccessType', 'id', 'action_type_id');
//    }
    //END add Albert Topalu 12.10.18 13:59




}

