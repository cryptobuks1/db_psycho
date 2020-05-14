<?php


namespace App\Http\Controllers\Api\TabAccess;


use Illuminate\Support\Facades\DB;
use App\Models\AccessEntity;
use App\Http\Controllers\Api\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Description of AccessEntitiesController
 *
 * @author Юрий Юренко
 */
class AccessEntitiesController
{

    public function show(Request $request)
    {
        return AccessEntity::get()->toarray();
    }


    public function insert(Request $request)
    {

        if (config('app.VueBlade')) {
            return AccessEntity::create([
                'access_entity_code' => $request->access_entity_code,
                'access_entity_name' => $request->access_entity_name,
                'access_type_id' => $request->access_type_id,
                'created_by' => 'кукурууку' //Auth::user()->consumer_name,
            ]);
        } else {
            AccessEntity::create([
                'access_entity_code' => $request->access_entity_code,
                'access_entity_name' => $request->access_entity_name,
                'access_type_id' => $request->access_type_id,
                'created_by' => 'кукурууку' //Auth::user()->consumer_name,
            ]);

        }
    }

    public function update(Request $request)
    {

        return AccessEntity::where('id', $request->id)->update([
            'access_entity_code' => $request->access_entity_code,
            'access_entity_name' => $request->access_entity_name,
            'access_type_id' => $request->access_type_id,
            'updated_by' => Auth::user()->consumer_name,
        ]);
    }

    public function delete(Request $request)
    {

        return AccessEntity::where('id', $request->id)->delete();

    }
}
