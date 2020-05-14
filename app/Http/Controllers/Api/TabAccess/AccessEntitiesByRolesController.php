<?php

namespace App\Http\Controllers\Api\TabAccess;


use Illuminate\Support\Facades\DB;
use App\Models\AccessEntitiesByRole;
use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
/**
 * Description of AccessEntitiesByRolesController
 *
 * @author Юрий Юренко
 */
class AccessEntitiesByRolesController extends Controller{
    
    
    
    public function show(Request $request){

         return AccessEntitiesByRole::get()->toarray();
    }

    public function insert(Request $request){
        
        if (config('app.VueBlade')) {
            return AccessEntitiesByRole::create([
               'access_role_id' => $request->access_role_id,
               'access_entity_id' => $request->access_entity_id,
               'allow_add_l' => $request->allow_add_l,
               'allow_delete_l' => $request->allow_delete_l,
               'allow_read_l' => $request->allow_read_l,
               'allow_update_l' => $request->allow_update_l,
               'allow_select_option_l' =>$request->allow_select_option_l,
               'created_by' => Auth::user()->consumer_name,
            ]);
        }
        else{
            AccessEntitiesByRole::create([
               'access_role_id' => $request->access_role_id,
               'access_entity_id' => $request->access_entity_id,
               'allow_add_l' => $request->allow_add_l,
               'allow_delete_l' => $request->allow_delete_l,
               'allow_read_l' => $request->allow_read_l,
               'allow_update_l' => $request->allow_update_l,
               'allow_select_option_l' =>$request->allow_select_option_l,
               'created_by' => Auth::user()->consumer_name,
            ]);
        }
    }
    

    public function update(Request $request){
        
        return AccessEntitiesByRole::where('id', $request->id)->update([
           'access_role_id' => $request->access_role_id,
           'access_entity_id' => $request->access_entity_id,
           'allow_add_l' => $request->allow_add_l,
           'allow_delete_l' => $request->allow_delete_l,
           'allow_read_l' => $request->allow_read_l,
           'allow_update_l' => $request->allow_update_l,
           'allow_select_option_l' =>$request->allow_select_option_l,
           'updated_by' => Auth::user()->consumer_name,
        ]);
    }

    /*public function delete(Request $request){
        return AccessEntitiesByRole::where('id', $request->id)->delete();
    }*/

}
