<?php
namespace App\Http\Controllers\Api\TabAccess;

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\ConsumerAccessRole;
/**
 * Description of ConsumerAccessRoleController
 *
 * @author Юрий Юренко
 */
class ConsumerAccessRolesController extends Controller{

    
    
    public function show(Request $request){
         
         
         return ConsumerAccessRole::get()->toarray();
         
         
    }
    
    
    
    
    
    
    
    
    public function insert(Request $request){
        
        if (config('app.VueBlade')) {
            return ConsumerAccessRole::create([
                'access_role_id' => $request->access_role_id,
                'consumer_id' => $request->consumer_id,
                'created_by' => Auth::user()->consumer_name,
               
            ]);
        }
        else{
            ConsumerAccessRole::create([
                'access_role_id' => $request->access_role_id,
                'consumer_id' => $request->consumer_id,
                'created_by' => Auth::user()->consumer_name,
            ]);
        
        }
    }
    
    
    public function update(Request $request){
        
        return ConsumerAccessRole::where('id', $request->id)->update([
            'access_role_id' => $request->access_role_id,
            'consumer_id' => $request->consumer_id,
            'updated_by' =>  Auth::user()->consumer_name,
        ]);
    }
    
    /*public function delete(Request $request){
        
        return ConsumerAccessRole::where('id', $request->id)->delete();
       
    }*/
    
}
