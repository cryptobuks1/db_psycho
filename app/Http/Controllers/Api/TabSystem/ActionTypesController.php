<?php

namespace App\Http\Controllers\Api\TabSystem;

use App\Models\ActionType;


use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActionTypesController extends Controller{

    
    
    
    public function insert(Request $request){
        
        if (config('app.VueBlade')) {
            return ActionType::create([
                'action_type_code' => $request->action_type_code,
                'action_type_name' => $request->action_type_name,
                'use_for_entity_l' => $request->use_for_entity_l,
                'use_for_list_l' => $request->use_for_list_l,
                'created_by' => 'zz'// Auth::user()->consumer_name,
               
            ]);
        }
        else{
            ActionType::create([
                'action_type_code' => $request->action_type_code,
                'action_type_name' => $request->action_type_name,
                'use_for_entity_l' => $request->use_for_entity_l,
                'use_for_list_l' => $request->use_for_list_l,
                'created_by' => Auth::user()->consumer_name,
            ]);
        
        }
    }

    public function update(Request $request){
        
        return  ActionType::where('id', $request->id)->update([
                'action_type_code' => $request->action_type_code,
                'action_type_name' => $request->action_type_name,
                'use_for_entity_l' => $request->use_for_entity_l,
                'use_for_list_l' => $request->use_for_list_l,
                'updated_by' => Auth::user()->consumer_name,
        ]);
    }
    
    
    
    
    /*public function delete(Request $request){
        
        return ActionType::where('id', $request->id)->delete();
       
    }*/
    
}
