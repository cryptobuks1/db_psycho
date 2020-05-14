<?php

use Illuminate\Database\Seeder;

class AccessEntitiesByRolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\AccessEntitiesByRole::truncate();

//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>1,
//            'access_entity_id'=>4,
//            'access_role_id'=>3,
//            'action_type_id'=>1,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>2,
//        'access_entity_id'=>3,
//        'access_role_id'=>3,
//        'action_type_id'=>2,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>3,
//        'access_entity_id'=>4,
//        'access_role_id'=>3,
//        'action_type_id'=>5,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>4,
//        'access_entity_id'=>3,
//        'access_role_id'=>3,
//        'action_type_id'=>6,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>5,
//        'access_entity_id'=>4,
//        'access_role_id'=>3,
//        'action_type_id'=>6,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>6,
//        'access_entity_id'=>4,
//        'access_role_id'=>3,
//        'action_type_id'=>4,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>10,
//        'access_entity_id'=>5,
//        'access_role_id'=>3,
//        'action_type_id'=>1,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>11,
//        'access_entity_id'=>6,
//        'access_role_id'=>3,
//        'action_type_id'=>5,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>12,
//        'access_entity_id'=>6,
//        'access_role_id'=>3,
//        'action_type_id'=>1,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>13,
//        'access_entity_id'=>5,
//        'access_role_id'=>3,
//        'action_type_id'=>4,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>14,
//        'access_entity_id'=>7,
//        'access_role_id'=>3,
//        'action_type_id'=>1,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>15,
//        'access_entity_id'=>7,
//        'access_role_id'=>3,
//        'action_type_id'=>4,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>16,
//        'access_entity_id'=>7,
//        'access_role_id'=>3,
//        'action_type_id'=>5,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>17,
//        'access_entity_id'=>8,
//        'access_role_id'=>3,
//        'action_type_id'=>1,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>18,
//        'access_entity_id'=>8,
//        'access_role_id'=>3,
//        'action_type_id'=>4,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>19,
//        'access_entity_id'=>9,
//        'access_role_id'=>3,
//        'action_type_id'=>1,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>20,
//        'access_entity_id'=>9,
//        'access_role_id'=>3,
//        'action_type_id'=>2,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>21,
//        'access_entity_id'=>9,
//        'access_role_id'=>3,
//        'action_type_id'=>3,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>22,
//        'access_entity_id'=>9,
//        'access_role_id'=>3,
//        'action_type_id'=>4,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>23,
//        'access_entity_id'=>9,
//        'access_role_id'=>3,
//        'action_type_id'=>5,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>24,
//        'access_entity_id'=>9,
//        'access_role_id'=>3,
//        'action_type_id'=>6,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>25,
//        'access_entity_id'=>10,
//        'access_role_id'=>3,
//        'action_type_id'=>1,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>26,
//        'access_entity_id'=>10,
//        'access_role_id'=>3,
//        'action_type_id'=>2,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>27,
//        'access_entity_id'=>10,
//        'access_role_id'=>3,
//        'action_type_id'=>3,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>28,
//        'access_entity_id'=>10,
//        'access_role_id'=>3,
//        'action_type_id'=>4,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>29,
//        'access_entity_id'=>10,
//        'access_role_id'=>3,
//        'action_type_id'=>5,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>30,
//        'access_entity_id'=>10,
//        'access_role_id'=>3,
//        'action_type_id'=>6,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>31,
//        'access_entity_id'=>11,
//        'access_role_id'=>3,
//        'action_type_id'=>1,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>32,
//        'access_entity_id'=>11,
//        'access_role_id'=>3,
//        'action_type_id'=>2,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>33,
//        'access_entity_id'=>11,
//        'access_role_id'=>3,
//        'action_type_id'=>3,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>34,
//        'access_entity_id'=>11,
//        'access_role_id'=>3,
//        'action_type_id'=>4,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>35,
//        'access_entity_id'=>11,
//        'access_role_id'=>3,
//        'action_type_id'=>5,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>36,
//        'access_entity_id'=>11,
//        'access_role_id'=>3,
//        'action_type_id'=>6,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>37,
//        'access_entity_id'=>12,
//        'access_role_id'=>3,
//        'action_type_id'=>1,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>38,
//        'access_entity_id'=>12,
//        'access_role_id'=>3,
//        'action_type_id'=>2,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>39,
//        'access_entity_id'=>12,
//        'access_role_id'=>3,
//        'action_type_id'=>3,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>40,
//        'access_entity_id'=>12,
//        'access_role_id'=>3,
//        'action_type_id'=>4,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>41,
//        'access_entity_id'=>12,
//        'access_role_id'=>3,
//        'action_type_id'=>5,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>42,
//        'access_entity_id'=>12,
//        'access_role_id'=>3,
//        'action_type_id'=>6,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>43,
//        'access_entity_id'=>13,
//        'access_role_id'=>3,
//        'action_type_id'=>1,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>44,
//        'access_entity_id'=>13,
//        'access_role_id'=>3,
//        'action_type_id'=>2,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>45,
//        'access_entity_id'=>13,
//        'access_role_id'=>3,
//        'action_type_id'=>3,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>46,
//        'access_entity_id'=>13,
//        'access_role_id'=>3,
//        'action_type_id'=>4,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>47,
//        'access_entity_id'=>13,
//        'access_role_id'=>3,
//        'action_type_id'=>5,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>48,
//        'access_entity_id'=>13,
//        'access_role_id'=>3,
//        'action_type_id'=>6,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>49,
//        'access_entity_id'=>4,
//        'access_role_id'=>4,
//        'action_type_id'=>1,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>50,
//        'access_entity_id'=>3,
//        'access_role_id'=>4,
//        'action_type_id'=>2,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>51,
//        'access_entity_id'=>4,
//        'access_role_id'=>4,
//        'action_type_id'=>5,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>52,
//        'access_entity_id'=>3,
//        'access_role_id'=>4,
//        'action_type_id'=>6,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>53,
//        'access_entity_id'=>4,
//        'access_role_id'=>4,
//        'action_type_id'=>6,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>55,
//        'access_entity_id'=>5,
//        'access_role_id'=>4,
//        'action_type_id'=>1,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>56,
//        'access_entity_id'=>6,
//        'access_role_id'=>4,
//        'action_type_id'=>5,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>57,
//        'access_entity_id'=>6,
//        'access_role_id'=>4,
//        'action_type_id'=>1,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>59,
//        'access_entity_id'=>7,
//        'access_role_id'=>4,
//        'action_type_id'=>1,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>61,
//        'access_entity_id'=>7,
//        'access_role_id'=>4,
//        'action_type_id'=>5,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>62,
//        'access_entity_id'=>8,
//        'access_role_id'=>4,
//        'action_type_id'=>1,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>64,
//        'access_entity_id'=>9,
//        'access_role_id'=>4,
//        'action_type_id'=>1,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>65,
//        'access_entity_id'=>9,
//        'access_role_id'=>4,
//        'action_type_id'=>2,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>66,
//        'access_entity_id'=>9,
//        'access_role_id'=>4,
//        'action_type_id'=>3,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>68,
//        'access_entity_id'=>9,
//        'access_role_id'=>4,
//        'action_type_id'=>5,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>69,
//        'access_entity_id'=>9,
//        'access_role_id'=>4,
//        'action_type_id'=>6,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>70,
//        'access_entity_id'=>10,
//        'access_role_id'=>4,
//        'action_type_id'=>1,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>71,
//        'access_entity_id'=>10,
//        'access_role_id'=>4,
//        'action_type_id'=>2,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>72,
//        'access_entity_id'=>10,
//        'access_role_id'=>4,
//        'action_type_id'=>3,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>74,
//        'access_entity_id'=>10,
//        'access_role_id'=>4,
//        'action_type_id'=>5,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>75,
//        'access_entity_id'=>10,
//        'access_role_id'=>4,
//        'action_type_id'=>6,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>76,
//        'access_entity_id'=>11,
//        'access_role_id'=>4,
//        'action_type_id'=>1,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>77,
//        'access_entity_id'=>11,
//        'access_role_id'=>4,
//        'action_type_id'=>2,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>78,
//        'access_entity_id'=>11,
//        'access_role_id'=>4,
//        'action_type_id'=>3,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>80,
//        'access_entity_id'=>11,
//        'access_role_id'=>4,
//        'action_type_id'=>5,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>81,
//        'access_entity_id'=>11,
//        'access_role_id'=>4,
//        'action_type_id'=>6,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>82,
//        'access_entity_id'=>12,
//        'access_role_id'=>4,
//        'action_type_id'=>1,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>83,
//        'access_entity_id'=>12,
//        'access_role_id'=>4,
//        'action_type_id'=>2,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>84,
//        'access_entity_id'=>12,
//        'access_role_id'=>4,
//        'action_type_id'=>3,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>86,
//        'access_entity_id'=>12,
//        'access_role_id'=>4,
//        'action_type_id'=>5,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>87,
//        'access_entity_id'=>12,
//        'access_role_id'=>4,
//        'action_type_id'=>6,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>88,
//        'access_entity_id'=>13,
//        'access_role_id'=>4,
//        'action_type_id'=>1,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>89,
//        'access_entity_id'=>13,
//        'access_role_id'=>4,
//        'action_type_id'=>2,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>90,
//        'access_entity_id'=>13,
//        'access_role_id'=>4,
//        'action_type_id'=>3,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>92,
//        'access_entity_id'=>13,
//        'access_role_id'=>4,
//        'action_type_id'=>5,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>93,
//        'access_entity_id'=>13,
//        'access_role_id'=>4,
//        'action_type_id'=>6,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>101,
//        'access_entity_id'=>15,
//        'access_role_id'=>3,
//        'action_type_id'=>1,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>102,
//        'access_entity_id'=>15,
//        'access_role_id'=>3,
//        'action_type_id'=>2,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>103,
//        'access_entity_id'=>15,
//        'access_role_id'=>3,
//        'action_type_id'=>3,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>104,
//        'access_entity_id'=>15,
//        'access_role_id'=>3,
//        'action_type_id'=>4,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>105,
//        'access_entity_id'=>15,
//        'access_role_id'=>3,
//        'action_type_id'=>5,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>106,
//        'access_entity_id'=>15,
//        'access_role_id'=>3,
//        'action_type_id'=>6,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>107,
//        'access_entity_id'=>15,
//        'access_role_id'=>4,
//        'action_type_id'=>1,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>108,
//        'access_entity_id'=>15,
//        'access_role_id'=>4,
//        'action_type_id'=>2,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>109,
//        'access_entity_id'=>15,
//        'access_role_id'=>4,
//        'action_type_id'=>3,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>110,
//        'access_entity_id'=>15,
//        'access_role_id'=>4,
//        'action_type_id'=>5,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>111,
//        'access_entity_id'=>15,
//        'access_role_id'=>4,
//        'action_type_id'=>6,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>112,
//        'access_entity_id'=>16,
//        'access_role_id'=>3,
//        'action_type_id'=>1,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>113,
//        'access_entity_id'=>16,
//        'access_role_id'=>3,
//        'action_type_id'=>2,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>114,
//        'access_entity_id'=>16,
//        'access_role_id'=>3,
//        'action_type_id'=>3,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>115,
//        'access_entity_id'=>16,
//        'access_role_id'=>3,
//        'action_type_id'=>4,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>116,
//        'access_entity_id'=>16,
//        'access_role_id'=>3,
//        'action_type_id'=>5,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>117,
//        'access_entity_id'=>16,
//        'access_role_id'=>3,
//        'action_type_id'=>6,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>118,
//        'access_entity_id'=>17,
//        'access_role_id'=>3,
//        'action_type_id'=>1,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>119,
//        'access_entity_id'=>17,
//        'access_role_id'=>3,
//        'action_type_id'=>2,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>120,
//        'access_entity_id'=>17,
//        'access_role_id'=>3,
//        'action_type_id'=>3,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>121,
//        'access_entity_id'=>17,
//        'access_role_id'=>3,
//        'action_type_id'=>4,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>122,
//        'access_entity_id'=>17,
//        'access_role_id'=>3,
//        'action_type_id'=>5,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>123,
//        'access_entity_id'=>17,
//        'access_role_id'=>3,
//        'action_type_id'=>6,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>124,
//        'access_entity_id'=>20,
//        'access_role_id'=>3,
//        'action_type_id'=>1,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//        'created_at'=>'2018-12-04 08:27:31',
//        'updated_at'=>'2018-12-04 08:27:31'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>125,
//        'access_entity_id'=>20,
//        'access_role_id'=>3,
//        'action_type_id'=>2,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//        'created_at'=>'2018-12-04 08:27:31',
//        'updated_at'=>'2018-12-04 08:27:31'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>126,
//        'access_entity_id'=>20,
//        'access_role_id'=>3,
//        'action_type_id'=>3,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//        'created_at'=>'2018-12-04 08:27:31',
//        'updated_at'=>'2018-12-04 08:27:31'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>127,
//        'access_entity_id'=>20,
//        'access_role_id'=>3,
//        'action_type_id'=>4,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//        'created_at'=>'2018-12-04 08:27:32',
//        'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>128,
//        'access_entity_id'=>20,
//        'access_role_id'=>3,
//        'action_type_id'=>5,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//        'created_at'=>'2018-12-04 08:27:32',
//        'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>129,
//        'access_entity_id'=>20,
//        'access_role_id'=>3,
//        'action_type_id'=>6,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//        'created_at'=>'2018-12-04 08:27:32',
//        'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>130,
//        'access_entity_id'=>18,
//        'access_role_id'=>3,
//        'action_type_id'=>1,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//        'created_at'=>'2018-12-04 08:27:32',
//        'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>131,
//        'access_entity_id'=>18,
//        'access_role_id'=>3,
//        'action_type_id'=>2,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//        'created_at'=>'2018-12-04 08:27:32',
//        'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>132,
//        'access_entity_id'=>18,
//        'access_role_id'=>3,
//        'action_type_id'=>3,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//        'created_at'=>'2018-12-04 08:27:32',
//        'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>133,
//        'access_entity_id'=>18,
//        'access_role_id'=>3,
//        'action_type_id'=>4,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//        'created_at'=>'2018-12-04 08:27:32',
//        'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>134,
//        'access_entity_id'=>18,
//        'access_role_id'=>3,
//        'action_type_id'=>5,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//        'created_at'=>'2018-12-04 08:27:32',
//        'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>135,
//        'access_entity_id'=>18,
//        'access_role_id'=>3,
//        'action_type_id'=>6,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//        'created_at'=>'2018-12-04 08:27:32',
//        'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>136,
//        'access_entity_id'=>19,
//        'access_role_id'=>3,
//        'action_type_id'=>1,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//        'created_at'=>'2018-12-04 08:27:32',
//        'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>137,
//        'access_entity_id'=>19,
//        'access_role_id'=>3,
//        'action_type_id'=>2,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//        'created_at'=>'2018-12-04 08:27:32',
//        'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>138,
//        'access_entity_id'=>19,
//        'access_role_id'=>3,
//        'action_type_id'=>3,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//        'created_at'=>'2018-12-04 08:27:32',
//        'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>139,
//        'access_entity_id'=>19,
//        'access_role_id'=>3,
//        'action_type_id'=>4,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//        'created_at'=>'2018-12-04 08:27:32',
//        'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>140,
//        'access_entity_id'=>19,
//        'access_role_id'=>3,
//        'action_type_id'=>5,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//        'created_at'=>'2018-12-04 08:27:32',
//        'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>141,
//        'access_entity_id'=>19,
//        'access_role_id'=>3,
//        'action_type_id'=>6,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//        'created_at'=>'2018-12-04 08:27:32',
//        'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//
//        /*y.yurenko ConsumerAccountsController starts*/
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>142,
//        'access_entity_id'=>21,
//        'access_role_id'=>3,
//        'action_type_id'=>1,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//        'created_at'=>'2018-12-05 09:41:32',
//        'updated_at'=>'2018-12-05 09:41:32'
//        ] );
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>143,
//        'access_entity_id'=>21,
//        'access_role_id'=>3,
//        'action_type_id'=>2,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//        'created_at'=>'2018-12-05 09:41:32',
//        'updated_at'=>'2018-12-05 09:41:32'
//        ] );
//
//
//        //
//
//         \App\Models\AccessEntitiesByRole::create( [
//        'id'=>144,
//        'access_entity_id'=>21,
//        'access_role_id'=>3,
//        'action_type_id'=>3,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//        'created_at'=>'2018-12-05 09:41:32',
//        'updated_at'=>'2018-12-05 09:41:32'
//        ] );
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>145,
//        'access_entity_id'=>21,
//        'access_role_id'=>3,
//        'action_type_id'=>4,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//        'created_at'=>'2018-12-05 09:41:32',
//        'updated_at'=>'2018-12-05 09:41:32'
//        ] );
//        //
//
//         \App\Models\AccessEntitiesByRole::create( [
//        'id'=>146,
//        'access_entity_id'=>21,
//        'access_role_id'=>3,
//        'action_type_id'=>5,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//        'created_at'=>'2018-12-05 09:41:32',
//        'updated_at'=>'2018-12-05 09:41:32'
//        ] );
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>147,
//        'access_entity_id'=>21,
//        'access_role_id'=>3,
//        'action_type_id'=>6,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//        'created_at'=>'2018-12-05 09:41:32',
//        'updated_at'=>'2018-12-05 09:41:32'
//        ] );
//        //
//
//         \App\Models\AccessEntitiesByRole::create( [
//        'id'=>148,
//        'access_entity_id'=>21,
//        'access_role_id'=>4,
//        'action_type_id'=>1,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//        'created_at'=>'2018-12-05 09:41:32',
//        'updated_at'=>'2018-12-05 09:41:32'
//        ] );
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>149,
//        'access_entity_id'=>21,
//        'access_role_id'=>4,
//        'action_type_id'=>2,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//        'created_at'=>'2018-12-05 09:41:32',
//        'updated_at'=>'2018-12-05 09:41:32'
//        ] );
//        //
//
//         \App\Models\AccessEntitiesByRole::create( [
//        'id'=>150,
//        'access_entity_id'=>21,
//        'access_role_id'=>4,
//        'action_type_id'=>3,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//        'created_at'=>'2018-12-05 09:41:32',
//        'updated_at'=>'2018-12-05 09:41:32'
//        ] );
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>151,
//        'access_entity_id'=>21,
//        'access_role_id'=>4,
//        'action_type_id'=>4,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//        'created_at'=>'2018-12-05 09:41:32',
//        'updated_at'=>'2018-12-05 09:41:32'
//        ] );
//        //
//
//
//         \App\Models\AccessEntitiesByRole::create( [
//        'id'=>152,
//        'access_entity_id'=>21,
//        'access_role_id'=>4,
//        'action_type_id'=>5,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//        'created_at'=>'2018-12-05 09:41:32',
//        'updated_at'=>'2018-12-05 09:41:32'
//        ] );
//
//        \App\Models\AccessEntitiesByRole::create( [
//        'id'=>153,
//        'access_entity_id'=>21,
//        'access_role_id'=>4,
//        'action_type_id'=>6,
//        'created_by'=>NULL,
//        'updated_by'=>NULL,
//        'created_at'=>'2018-12-05 09:41:32',
//        'updated_at'=>'2018-12-05 09:41:32'
//        ] );
//
//        /*ConsumerAccountsController end*/
//
//        /*Insert Albert Topalu 29.12.18*/
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>154,
//            'access_entity_id'=>46,
//            'access_role_id'=>3,
//            'action_type_id'=>1,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//            'created_at'=>'2018-12-04 08:27:32',
//            'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>155,
//            'access_entity_id'=>46,
//            'access_role_id'=>3,
//            'action_type_id'=>2,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//            'created_at'=>'2018-12-04 08:27:32',
//            'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>156,
//            'access_entity_id'=>46,
//            'access_role_id'=>3,
//            'action_type_id'=>3,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//            'created_at'=>'2018-12-04 08:27:32',
//            'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>157,
//            'access_entity_id'=>46,
//            'access_role_id'=>3,
//            'action_type_id'=>4,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//            'created_at'=>'2018-12-04 08:27:32',
//            'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>158,
//            'access_entity_id'=>46,
//            'access_role_id'=>3,
//            'action_type_id'=>5,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//            'created_at'=>'2018-12-04 08:27:32',
//            'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>159,
//            'access_entity_id'=>46,
//            'access_role_id'=>3,
//            'action_type_id'=>6,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//            'created_at'=>'2018-12-04 08:27:32',
//            'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>160,
//            'access_entity_id'=>47,
//            'access_role_id'=>3,
//            'action_type_id'=>1,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//            'created_at'=>'2018-12-04 08:27:32',
//            'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>161,
//            'access_entity_id'=>47,
//            'access_role_id'=>3,
//            'action_type_id'=>2,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//            'created_at'=>'2018-12-04 08:27:32',
//            'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>162,
//            'access_entity_id'=>47,
//            'access_role_id'=>3,
//            'action_type_id'=>3,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//            'created_at'=>'2018-12-04 08:27:32',
//            'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>163,
//            'access_entity_id'=>47,
//            'access_role_id'=>3,
//            'action_type_id'=>4,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//            'created_at'=>'2018-12-04 08:27:32',
//            'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>164,
//            'access_entity_id'=>47,
//            'access_role_id'=>3,
//            'action_type_id'=>5,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//            'created_at'=>'2018-12-04 08:27:32',
//            'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>165,
//            'access_entity_id'=>47,
//            'access_role_id'=>3,
//            'action_type_id'=>6,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//            'created_at'=>'2018-12-04 08:27:32',
//            'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>166,
//            'access_entity_id'=>48,
//            'access_role_id'=>3,
//            'action_type_id'=>1,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//            'created_at'=>'2018-12-04 08:27:32',
//            'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>167,
//            'access_entity_id'=>48,
//            'access_role_id'=>3,
//            'action_type_id'=>2,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//            'created_at'=>'2018-12-04 08:27:32',
//            'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>168,
//            'access_entity_id'=>48,
//            'access_role_id'=>3,
//            'action_type_id'=>3,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//            'created_at'=>'2018-12-04 08:27:32',
//            'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>169,
//            'access_entity_id'=>48,
//            'access_role_id'=>3,
//            'action_type_id'=>4,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//            'created_at'=>'2018-12-04 08:27:32',
//            'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>170,
//            'access_entity_id'=>48,
//            'access_role_id'=>3,
//            'action_type_id'=>5,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//            'created_at'=>'2018-12-04 08:27:32',
//            'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>171,
//            'access_entity_id'=>48,
//            'access_role_id'=>3,
//            'action_type_id'=>6,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//            'created_at'=>'2018-12-04 08:27:32',
//            'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>172,
//            'access_entity_id'=>49,
//            'access_role_id'=>3,
//            'action_type_id'=>1,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//            'created_at'=>'2018-12-04 08:27:32',
//            'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>173,
//            'access_entity_id'=>49,
//            'access_role_id'=>3,
//            'action_type_id'=>2,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//            'created_at'=>'2018-12-04 08:27:32',
//            'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>174,
//            'access_entity_id'=>49,
//            'access_role_id'=>3,
//            'action_type_id'=>3,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//            'created_at'=>'2018-12-04 08:27:32',
//            'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>175,
//            'access_entity_id'=>49,
//            'access_role_id'=>3,
//            'action_type_id'=>4,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//            'created_at'=>'2018-12-04 08:27:32',
//            'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>176,
//            'access_entity_id'=>49,
//            'access_role_id'=>3,
//            'action_type_id'=>5,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//            'created_at'=>'2018-12-04 08:27:32',
//            'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>177,
//            'access_entity_id'=>48,
//            'access_role_id'=>3,
//            'action_type_id'=>6,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//            'created_at'=>'2018-12-04 08:27:32',
//            'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>178,
//            'access_entity_id'=>50,
//            'access_role_id'=>3,
//            'action_type_id'=>1,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//            'created_at'=>'2018-12-04 08:27:32',
//            'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>179,
//            'access_entity_id'=>50,
//            'access_role_id'=>3,
//            'action_type_id'=>2,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//            'created_at'=>'2018-12-04 08:27:32',
//            'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>180,
//            'access_entity_id'=>50,
//            'access_role_id'=>3,
//            'action_type_id'=>3,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//            'created_at'=>'2018-12-04 08:27:32',
//            'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>181,
//            'access_entity_id'=>50,
//            'access_role_id'=>3,
//            'action_type_id'=>4,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//            'created_at'=>'2018-12-04 08:27:32',
//            'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>182,
//            'access_entity_id'=>50,
//            'access_role_id'=>3,
//            'action_type_id'=>5,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//            'created_at'=>'2018-12-04 08:27:32',
//            'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>183,
//            'access_entity_id'=>50,
//            'access_role_id'=>3,
//            'action_type_id'=>6,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//            'created_at'=>'2018-12-04 08:27:32',
//            'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>184,
//            'access_entity_id'=>51,
//            'access_role_id'=>3,
//            'action_type_id'=>1,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//            'created_at'=>'2018-12-04 08:27:32',
//            'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>185,
//            'access_entity_id'=>51,
//            'access_role_id'=>3,
//            'action_type_id'=>2,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//            'created_at'=>'2018-12-04 08:27:32',
//            'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>186,
//            'access_entity_id'=>51,
//            'access_role_id'=>3,
//            'action_type_id'=>3,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//            'created_at'=>'2018-12-04 08:27:32',
//            'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>187,
//            'access_entity_id'=>51,
//            'access_role_id'=>3,
//            'action_type_id'=>4,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//            'created_at'=>'2018-12-04 08:27:32',
//            'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>188,
//            'access_entity_id'=>51,
//            'access_role_id'=>3,
//            'action_type_id'=>5,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//            'created_at'=>'2018-12-04 08:27:32',
//            'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>189,
//            'access_entity_id'=>51,
//            'access_role_id'=>3,
//            'action_type_id'=>6,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//            'created_at'=>'2018-12-04 08:27:32',
//            'updated_at'=>'2018-12-04 08:27:32'
//        ] );
//
//
//        /*Access to Read User insert Albert Topalu */
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>190,
//            'access_entity_id'=>46,
//            'access_role_id'=>4,
//            'action_type_id'=>1,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>191,
//            'access_entity_id'=>46,
//            'access_role_id'=>4,
//            'action_type_id'=>5,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>192,
//            'access_entity_id'=>46,
//            'access_role_id'=>4,
//            'action_type_id'=>6,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>193,
//            'access_entity_id'=>47,
//            'access_role_id'=>4,
//            'action_type_id'=>1,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>194,
//            'access_entity_id'=>47,
//            'access_role_id'=>4,
//            'action_type_id'=>5,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>195,
//            'access_entity_id'=>47,
//            'access_role_id'=>4,
//            'action_type_id'=>6,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>196,
//            'access_entity_id'=>48,
//            'access_role_id'=>4,
//            'action_type_id'=>1,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>197,
//            'access_entity_id'=>48,
//            'access_role_id'=>4,
//            'action_type_id'=>5,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>198,
//            'access_entity_id'=>48,
//            'access_role_id'=>4,
//            'action_type_id'=>6,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>199,
//            'access_entity_id'=>49,
//            'access_role_id'=>4,
//            'action_type_id'=>1,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>200,
//            'access_entity_id'=>49,
//            'access_role_id'=>4,
//            'action_type_id'=>5,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>201,
//            'access_entity_id'=>49,
//            'access_role_id'=>4,
//            'action_type_id'=>6,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>202,
//            'access_entity_id'=>50,
//            'access_role_id'=>4,
//            'action_type_id'=>1,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>203,
//            'access_entity_id'=>50,
//            'access_role_id'=>4,
//            'action_type_id'=>5,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>204,
//            'access_entity_id'=>50,
//            'access_role_id'=>4,
//            'action_type_id'=>6,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        /*End Access to Read User insert Albert Topalu */
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>205,
//            'access_entity_id'=>51,
//            'access_role_id'=>3,
//            'action_type_id'=>1,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>206,
//            'access_entity_id'=>51,
//            'access_role_id'=>3,
//            'action_type_id'=>2,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>207,
//            'access_entity_id'=>51,
//            'access_role_id'=>3,
//            'action_type_id'=>3,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>208,
//            'access_entity_id'=>51,
//            'access_role_id'=>3,
//            'action_type_id'=>4,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>209,
//            'access_entity_id'=>51,
//            'access_role_id'=>3,
//            'action_type_id'=>5,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>210,
//            'access_entity_id'=>51,
//            'access_role_id'=>3,
//            'action_type_id'=>6,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        \App\Models\AccessEntitiesByRole::create( [
//            'id'=>211,
//            'access_entity_id'=>52,
//            'access_role_id'=>3,
//            'action_type_id'=>1,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>212,
//            'access_entity_id'=>52,
//            'access_role_id'=>3,
//            'action_type_id'=>2,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>213,
//            'access_entity_id'=>52,
//            'access_role_id'=>3,
//            'action_type_id'=>3,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>214,
//            'access_entity_id'=>52,
//            'access_role_id'=>3,
//            'action_type_id'=>4,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>215,
//            'access_entity_id'=>52,
//            'access_role_id'=>3,
//            'action_type_id'=>5,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>216,
//            'access_entity_id'=>52,
//            'access_role_id'=>3,
//            'action_type_id'=>6,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>217,
//            'access_entity_id'=>53,
//            'access_role_id'=>3,
//            'action_type_id'=>1,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>218,
//            'access_entity_id'=>53,
//            'access_role_id'=>3,
//            'action_type_id'=>2,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>219,
//            'access_entity_id'=>53,
//            'access_role_id'=>3,
//            'action_type_id'=>3,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>220,
//            'access_entity_id'=>53,
//            'access_role_id'=>3,
//            'action_type_id'=>4,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>221,
//            'access_entity_id'=>53,
//            'access_role_id'=>3,
//            'action_type_id'=>5,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>222,
//            'access_entity_id'=>53,
//            'access_role_id'=>3,
//            'action_type_id'=>6,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>223,
//            'access_entity_id'=>54,
//            'access_role_id'=>3,
//            'action_type_id'=>1,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>224,
//            'access_entity_id'=>54,
//            'access_role_id'=>3,
//            'action_type_id'=>2,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>225,
//            'access_entity_id'=>54,
//            'access_role_id'=>3,
//            'action_type_id'=>3,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>226,
//            'access_entity_id'=>54,
//            'access_role_id'=>3,
//            'action_type_id'=>4,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>227,
//            'access_entity_id'=>54,
//            'access_role_id'=>3,
//            'action_type_id'=>5,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>228,
//            'access_entity_id'=>54,
//            'access_role_id'=>3,
//            'action_type_id'=>6,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>229,
//            'access_entity_id'=>55,
//            'access_role_id'=>3,
//            'action_type_id'=>1,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>230,
//            'access_entity_id'=>55,
//            'access_role_id'=>3,
//            'action_type_id'=>2,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>231,
//            'access_entity_id'=>55,
//            'access_role_id'=>3,
//            'action_type_id'=>3,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>232,
//            'access_entity_id'=>55,
//            'access_role_id'=>3,
//            'action_type_id'=>4,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>233,
//            'access_entity_id'=>55,
//            'access_role_id'=>3,
//            'action_type_id'=>5,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>234,
//            'access_entity_id'=>55,
//            'access_role_id'=>3,
//            'action_type_id'=>6,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>235,
//            'access_entity_id'=>56,
//            'access_role_id'=>3,
//            'action_type_id'=>1,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>236,
//            'access_entity_id'=>56,
//            'access_role_id'=>3,
//            'action_type_id'=>2,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>237,
//            'access_entity_id'=>56,
//            'access_role_id'=>3,
//            'action_type_id'=>3,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>238,
//            'access_entity_id'=>56,
//            'access_role_id'=>3,
//            'action_type_id'=>4,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>239,
//            'access_entity_id'=>56,
//            'access_role_id'=>3,
//            'action_type_id'=>5,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>240,
//            'access_entity_id'=>56,
//            'access_role_id'=>3,
//            'action_type_id'=>6,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>241,
//            'access_entity_id'=>57,
//            'access_role_id'=>3,
//            'action_type_id'=>1,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>242,
//            'access_entity_id'=>57,
//            'access_role_id'=>3,
//            'action_type_id'=>2,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>243,
//            'access_entity_id'=>57,
//            'access_role_id'=>3,
//            'action_type_id'=>3,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>244,
//            'access_entity_id'=>57,
//            'access_role_id'=>3,
//            'action_type_id'=>4,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>245,
//            'access_entity_id'=>57,
//            'access_role_id'=>3,
//            'action_type_id'=>5,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>246,
//            'access_entity_id'=>57,
//            'access_role_id'=>3,
//            'action_type_id'=>6,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>247,
//            'access_entity_id'=>58,
//            'access_role_id'=>3,
//            'action_type_id'=>1,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>248,
//            'access_entity_id'=>58,
//            'access_role_id'=>3,
//            'action_type_id'=>2,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>249,
//            'access_entity_id'=>58,
//            'access_role_id'=>3,
//            'action_type_id'=>3,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>250,
//            'access_entity_id'=>58,
//            'access_role_id'=>3,
//            'action_type_id'=>4,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>251,
//            'access_entity_id'=>58,
//            'access_role_id'=>3,
//            'action_type_id'=>5,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>252,
//            'access_entity_id'=>58,
//            'access_role_id'=>3,
//            'action_type_id'=>6,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>253,
//            'access_entity_id'=>59,
//            'access_role_id'=>3,
//            'action_type_id'=>1,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>254,
//            'access_entity_id'=>59,
//            'access_role_id'=>3,
//            'action_type_id'=>2,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>255,
//            'access_entity_id'=>59,
//            'access_role_id'=>3,
//            'action_type_id'=>3,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>256,
//            'access_entity_id'=>59,
//            'access_role_id'=>3,
//            'action_type_id'=>4,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>257,
//            'access_entity_id'=>59,
//            'access_role_id'=>3,
//            'action_type_id'=>5,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>258,
//            'access_entity_id'=>59,
//            'access_role_id'=>3,
//            'action_type_id'=>6,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>259,
//            'access_entity_id'=>60,
//            'access_role_id'=>3,
//            'action_type_id'=>1,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>260,
//            'access_entity_id'=>60,
//            'access_role_id'=>3,
//            'action_type_id'=>2,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>261,
//            'access_entity_id'=>60,
//            'access_role_id'=>3,
//            'action_type_id'=>3,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>262,
//            'access_entity_id'=>60,
//            'access_role_id'=>3,
//            'action_type_id'=>4,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>263,
//            'access_entity_id'=>60,
//            'access_role_id'=>3,
//            'action_type_id'=>5,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>264,
//            'access_entity_id'=>60,
//            'access_role_id'=>3,
//            'action_type_id'=>6,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>265,
//            'access_entity_id'=>61,
//            'access_role_id'=>3,
//            'action_type_id'=>1,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>266,
//            'access_entity_id'=>61,
//            'access_role_id'=>3,
//            'action_type_id'=>2,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>267,
//            'access_entity_id'=>61,
//            'access_role_id'=>3,
//            'action_type_id'=>3,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>268,
//            'access_entity_id'=>61,
//            'access_role_id'=>3,
//            'action_type_id'=>4,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>269,
//            'access_entity_id'=>61,
//            'access_role_id'=>3,
//            'action_type_id'=>5,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>270,
//            'access_entity_id'=>61,
//            'access_role_id'=>3,
//            'action_type_id'=>6,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>271,
//            'access_entity_id'=>62,
//            'access_role_id'=>3,
//            'action_type_id'=>1,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>272,
//            'access_entity_id'=>62,
//            'access_role_id'=>3,
//            'action_type_id'=>2,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>273,
//            'access_entity_id'=>62,
//            'access_role_id'=>3,
//            'action_type_id'=>3,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>274,
//            'access_entity_id'=>62,
//            'access_role_id'=>3,
//            'action_type_id'=>4,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>275,
//            'access_entity_id'=>62,
//            'access_role_id'=>3,
//            'action_type_id'=>5,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );
//
//        App\Models\AccessEntitiesByRole::create( [
//            'id'=>276,
//            'access_entity_id'=>62,
//            'access_role_id'=>3,
//            'action_type_id'=>6,
//            'created_by'=>NULL,
//            'updated_by'=>NULL,
//
//        ] );



        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 1,
            'action_type_id' => 1,
            'access_role_id' => 3,
            'access_entity_id' => 4,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 2,
            'action_type_id' => 5,
            'access_role_id' => 3,
            'access_entity_id' => 4,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 3,
            'action_type_id' => 6,
            'access_role_id' => 3,
            'access_entity_id' => 4,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 4,
            'action_type_id' => 4,
            'access_role_id' => 3,
            'access_entity_id' => 4,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 5,
            'action_type_id' => 1,
            'access_role_id' => 3,
            'access_entity_id' => 5,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 6,
            'action_type_id' => 5,
            'access_role_id' => 3,
            'access_entity_id' => 6,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 7,
            'action_type_id' => 1,
            'access_role_id' => 3,
            'access_entity_id' => 6,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 8,
            'action_type_id' => 4,
            'access_role_id' => 3,
            'access_entity_id' => 5,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 9,
            'action_type_id' => 1,
            'access_role_id' => 3,
            'access_entity_id' => 7,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 10,
            'action_type_id' => 4,
            'access_role_id' => 3,
            'access_entity_id' => 7,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 11,
            'action_type_id' => 5,
            'access_role_id' => 3,
            'access_entity_id' => 7,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 12,
            'action_type_id' => 1,
            'access_role_id' => 3,
            'access_entity_id' => 8,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 13,
            'action_type_id' => 4,
            'access_role_id' => 3,
            'access_entity_id' => 8,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 14,
            'action_type_id' => 1,
            'access_role_id' => 3,
            'access_entity_id' => 9,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 15,
            'action_type_id' => 2,
            'access_role_id' => 3,
            'access_entity_id' => 9,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 16,
            'action_type_id' => 3,
            'access_role_id' => 3,
            'access_entity_id' => 9,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 17,
            'action_type_id' => 4,
            'access_role_id' => 3,
            'access_entity_id' => 9,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 18,
            'action_type_id' => 5,
            'access_role_id' => 3,
            'access_entity_id' => 9,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 19,
            'action_type_id' => 6,
            'access_role_id' => 3,
            'access_entity_id' => 9,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 20,
            'action_type_id' => 1,
            'access_role_id' => 3,
            'access_entity_id' => 10,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 21,
            'action_type_id' => 2,
            'access_role_id' => 3,
            'access_entity_id' => 10,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 22,
            'action_type_id' => 3,
            'access_role_id' => 3,
            'access_entity_id' => 10,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 23,
            'action_type_id' => 4,
            'access_role_id' => 3,
            'access_entity_id' => 10,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 24,
            'action_type_id' => 5,
            'access_role_id' => 3,
            'access_entity_id' => 10,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 25,
            'action_type_id' => 6,
            'access_role_id' => 3,
            'access_entity_id' => 10,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 26,
            'action_type_id' => 1,
            'access_role_id' => 3,
            'access_entity_id' => 11,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 27,
            'action_type_id' => 2,
            'access_role_id' => 3,
            'access_entity_id' => 11,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 28,
            'action_type_id' => 3,
            'access_role_id' => 3,
            'access_entity_id' => 11,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 29,
            'action_type_id' => 4,
            'access_role_id' => 3,
            'access_entity_id' => 11,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 30,
            'action_type_id' => 5,
            'access_role_id' => 3,
            'access_entity_id' => 11,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 31,
            'action_type_id' => 6,
            'access_role_id' => 3,
            'access_entity_id' => 11,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 32,
            'action_type_id' => 1,
            'access_role_id' => 3,
            'access_entity_id' => 12,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 33,
            'action_type_id' => 2,
            'access_role_id' => 3,
            'access_entity_id' => 12,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 34,
            'action_type_id' => 3,
            'access_role_id' => 3,
            'access_entity_id' => 12,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 35,
            'action_type_id' => 4,
            'access_role_id' => 3,
            'access_entity_id' => 12,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 36,
            'action_type_id' => 5,
            'access_role_id' => 3,
            'access_entity_id' => 12,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 37,
            'action_type_id' => 6,
            'access_role_id' => 3,
            'access_entity_id' => 12,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 38,
            'action_type_id' => 1,
            'access_role_id' => 3,
            'access_entity_id' => 13,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 39,
            'action_type_id' => 2,
            'access_role_id' => 3,
            'access_entity_id' => 13,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 40,
            'action_type_id' => 3,
            'access_role_id' => 3,
            'access_entity_id' => 13,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 41,
            'action_type_id' => 4,
            'access_role_id' => 3,
            'access_entity_id' => 13,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 42,
            'action_type_id' => 5,
            'access_role_id' => 3,
            'access_entity_id' => 13,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 43,
            'action_type_id' => 6,
            'access_role_id' => 3,
            'access_entity_id' => 13,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 44,
            'action_type_id' => 1,
            'access_role_id' => 4,
            'access_entity_id' => 4,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 45,
            'action_type_id' => 5,
            'access_role_id' => 4,
            'access_entity_id' => 4,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 46,
            'action_type_id' => 6,
            'access_role_id' => 4,
            'access_entity_id' => 4,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 47,
            'action_type_id' => 1,
            'access_role_id' => 4,
            'access_entity_id' => 5,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 48,
            'action_type_id' => 5,
            'access_role_id' => 4,
            'access_entity_id' => 6,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 49,
            'action_type_id' => 1,
            'access_role_id' => 4,
            'access_entity_id' => 6,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 50,
            'action_type_id' => 1,
            'access_role_id' => 4,
            'access_entity_id' => 7,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 51,
            'action_type_id' => 5,
            'access_role_id' => 4,
            'access_entity_id' => 7,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 52,
            'action_type_id' => 1,
            'access_role_id' => 4,
            'access_entity_id' => 8,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 53,
            'action_type_id' => 1,
            'access_role_id' => 4,
            'access_entity_id' => 9,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 54,
            'action_type_id' => 2,
            'access_role_id' => 4,
            'access_entity_id' => 9,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 55,
            'action_type_id' => 3,
            'access_role_id' => 4,
            'access_entity_id' => 9,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 56,
            'action_type_id' => 5,
            'access_role_id' => 4,
            'access_entity_id' => 9,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 57,
            'action_type_id' => 6,
            'access_role_id' => 4,
            'access_entity_id' => 9,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 58,
            'action_type_id' => 1,
            'access_role_id' => 4,
            'access_entity_id' => 10,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 59,
            'action_type_id' => 2,
            'access_role_id' => 4,
            'access_entity_id' => 10,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 60,
            'action_type_id' => 3,
            'access_role_id' => 4,
            'access_entity_id' => 10,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 61,
            'action_type_id' => 5,
            'access_role_id' => 4,
            'access_entity_id' => 10,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 62,
            'action_type_id' => 6,
            'access_role_id' => 4,
            'access_entity_id' => 10,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 63,
            'action_type_id' => 1,
            'access_role_id' => 4,
            'access_entity_id' => 11,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 64,
            'action_type_id' => 2,
            'access_role_id' => 4,
            'access_entity_id' => 11,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 65,
            'action_type_id' => 3,
            'access_role_id' => 4,
            'access_entity_id' => 11,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 66,
            'action_type_id' => 5,
            'access_role_id' => 4,
            'access_entity_id' => 11,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 67,
            'action_type_id' => 6,
            'access_role_id' => 4,
            'access_entity_id' => 11,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 68,
            'action_type_id' => 1,
            'access_role_id' => 4,
            'access_entity_id' => 12,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 69,
            'action_type_id' => 2,
            'access_role_id' => 4,
            'access_entity_id' => 12,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 70,
            'action_type_id' => 3,
            'access_role_id' => 4,
            'access_entity_id' => 12,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 71,
            'action_type_id' => 5,
            'access_role_id' => 4,
            'access_entity_id' => 12,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 72,
            'action_type_id' => 6,
            'access_role_id' => 4,
            'access_entity_id' => 12,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 73,
            'action_type_id' => 1,
            'access_role_id' => 4,
            'access_entity_id' => 13,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 74,
            'action_type_id' => 2,
            'access_role_id' => 4,
            'access_entity_id' => 13,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 75,
            'action_type_id' => 3,
            'access_role_id' => 4,
            'access_entity_id' => 13,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 76,
            'action_type_id' => 5,
            'access_role_id' => 4,
            'access_entity_id' => 13,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 77,
            'action_type_id' => 6,
            'access_role_id' => 4,
            'access_entity_id' => 13,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 78,
            'action_type_id' => 1,
            'access_role_id' => 3,
            'access_entity_id' => 15,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 79,
            'action_type_id' => 2,
            'access_role_id' => 3,
            'access_entity_id' => 15,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 80,
            'action_type_id' => 3,
            'access_role_id' => 3,
            'access_entity_id' => 15,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 81,
            'action_type_id' => 4,
            'access_role_id' => 3,
            'access_entity_id' => 15,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 82,
            'action_type_id' => 5,
            'access_role_id' => 3,
            'access_entity_id' => 15,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 83,
            'action_type_id' => 6,
            'access_role_id' => 3,
            'access_entity_id' => 15,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 84,
            'action_type_id' => 1,
            'access_role_id' => 4,
            'access_entity_id' => 15,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 85,
            'action_type_id' => 2,
            'access_role_id' => 4,
            'access_entity_id' => 15,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 86,
            'action_type_id' => 3,
            'access_role_id' => 4,
            'access_entity_id' => 15,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 87,
            'action_type_id' => 5,
            'access_role_id' => 4,
            'access_entity_id' => 15,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 88,
            'action_type_id' => 6,
            'access_role_id' => 4,
            'access_entity_id' => 15,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 89,
            'action_type_id' => 1,
            'access_role_id' => 3,
            'access_entity_id' => 16,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 90,
            'action_type_id' => 2,
            'access_role_id' => 3,
            'access_entity_id' => 16,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 91,
            'action_type_id' => 3,
            'access_role_id' => 3,
            'access_entity_id' => 16,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 92,
            'action_type_id' => 4,
            'access_role_id' => 3,
            'access_entity_id' => 16,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 93,
            'action_type_id' => 5,
            'access_role_id' => 3,
            'access_entity_id' => 16,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 94,
            'action_type_id' => 6,
            'access_role_id' => 3,
            'access_entity_id' => 16,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 95,
            'action_type_id' => 1,
            'access_role_id' => 3,
            'access_entity_id' => 17,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 96,
            'action_type_id' => 2,
            'access_role_id' => 3,
            'access_entity_id' => 17,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 97,
            'action_type_id' => 3,
            'access_role_id' => 3,
            'access_entity_id' => 17,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 98,
            'action_type_id' => 4,
            'access_role_id' => 3,
            'access_entity_id' => 17,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 99,
            'action_type_id' => 5,
            'access_role_id' => 3,
            'access_entity_id' => 17,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 100,
            'action_type_id' => 6,
            'access_role_id' => 3,
            'access_entity_id' => 17,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 101,
            'action_type_id' => 1,
            'access_role_id' => 3,
            'access_entity_id' => 20,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 102,
            'action_type_id' => 2,
            'access_role_id' => 3,
            'access_entity_id' => 20,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 103,
            'action_type_id' => 3,
            'access_role_id' => 3,
            'access_entity_id' => 20,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 104,
            'action_type_id' => 4,
            'access_role_id' => 3,
            'access_entity_id' => 20,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 105,
            'action_type_id' => 5,
            'access_role_id' => 3,
            'access_entity_id' => 20,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 106,
            'action_type_id' => 6,
            'access_role_id' => 3,
            'access_entity_id' => 20,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 107,
            'action_type_id' => 1,
            'access_role_id' => 3,
            'access_entity_id' => 18,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 108,
            'action_type_id' => 2,
            'access_role_id' => 3,
            'access_entity_id' => 18,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 109,
            'action_type_id' => 3,
            'access_role_id' => 3,
            'access_entity_id' => 18,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 110,
            'action_type_id' => 4,
            'access_role_id' => 3,
            'access_entity_id' => 18,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 111,
            'action_type_id' => 5,
            'access_role_id' => 3,
            'access_entity_id' => 18,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 112,
            'action_type_id' => 6,
            'access_role_id' => 3,
            'access_entity_id' => 18,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 113,
            'action_type_id' => 1,
            'access_role_id' => 3,
            'access_entity_id' => 19,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 114,
            'action_type_id' => 2,
            'access_role_id' => 3,
            'access_entity_id' => 19,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 115,
            'action_type_id' => 3,
            'access_role_id' => 3,
            'access_entity_id' => 19,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 116,
            'action_type_id' => 4,
            'access_role_id' => 3,
            'access_entity_id' => 19,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 117,
            'action_type_id' => 5,
            'access_role_id' => 3,
            'access_entity_id' => 19,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 118,
            'action_type_id' => 6,
            'access_role_id' => 3,
            'access_entity_id' => 19,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 119,
            'action_type_id' => 1,
            'access_role_id' => 3,
            'access_entity_id' => 21,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 120,
            'action_type_id' => 2,
            'access_role_id' => 3,
            'access_entity_id' => 21,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 121,
            'action_type_id' => 3,
            'access_role_id' => 3,
            'access_entity_id' => 21,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 122,
            'action_type_id' => 4,
            'access_role_id' => 3,
            'access_entity_id' => 21,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 123,
            'action_type_id' => 5,
            'access_role_id' => 3,
            'access_entity_id' => 21,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 124,
            'action_type_id' => 6,
            'access_role_id' => 3,
            'access_entity_id' => 21,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 125,
            'action_type_id' => 1,
            'access_role_id' => 4,
            'access_entity_id' => 21,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 126,
            'action_type_id' => 2,
            'access_role_id' => 4,
            'access_entity_id' => 21,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 127,
            'action_type_id' => 3,
            'access_role_id' => 4,
            'access_entity_id' => 21,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 128,
            'action_type_id' => 4,
            'access_role_id' => 4,
            'access_entity_id' => 21,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 129,
            'action_type_id' => 5,
            'access_role_id' => 4,
            'access_entity_id' => 21,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 130,
            'action_type_id' => 6,
            'access_role_id' => 4,
            'access_entity_id' => 21,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 131,
            'action_type_id' => 1,
            'access_role_id' => 3,
            'access_entity_id' => 46,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 132,
            'action_type_id' => 2,
            'access_role_id' => 3,
            'access_entity_id' => 46,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 133,
            'action_type_id' => 3,
            'access_role_id' => 3,
            'access_entity_id' => 46,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 134,
            'action_type_id' => 4,
            'access_role_id' => 3,
            'access_entity_id' => 46,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 135,
            'action_type_id' => 5,
            'access_role_id' => 3,
            'access_entity_id' => 46,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 136,
            'action_type_id' => 6,
            'access_role_id' => 3,
            'access_entity_id' => 46,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 137,
            'action_type_id' => 1,
            'access_role_id' => 3,
            'access_entity_id' => 47,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 138,
            'action_type_id' => 2,
            'access_role_id' => 3,
            'access_entity_id' => 47,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 139,
            'action_type_id' => 3,
            'access_role_id' => 3,
            'access_entity_id' => 47,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 140,
            'action_type_id' => 4,
            'access_role_id' => 3,
            'access_entity_id' => 47,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 141,
            'action_type_id' => 5,
            'access_role_id' => 3,
            'access_entity_id' => 47,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 142,
            'action_type_id' => 6,
            'access_role_id' => 3,
            'access_entity_id' => 47,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 143,
            'action_type_id' => 1,
            'access_role_id' => 3,
            'access_entity_id' => 48,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 144,
            'action_type_id' => 2,
            'access_role_id' => 3,
            'access_entity_id' => 48,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 145,
            'action_type_id' => 3,
            'access_role_id' => 3,
            'access_entity_id' => 48,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 146,
            'action_type_id' => 4,
            'access_role_id' => 3,
            'access_entity_id' => 48,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 147,
            'action_type_id' => 5,
            'access_role_id' => 3,
            'access_entity_id' => 48,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 148,
            'action_type_id' => 6,
            'access_role_id' => 3,
            'access_entity_id' => 48,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 149,
            'action_type_id' => 1,
            'access_role_id' => 3,
            'access_entity_id' => 49,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 150,
            'action_type_id' => 2,
            'access_role_id' => 3,
            'access_entity_id' => 49,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 151,
            'action_type_id' => 3,
            'access_role_id' => 3,
            'access_entity_id' => 49,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 152,
            'action_type_id' => 4,
            'access_role_id' => 3,
            'access_entity_id' => 49,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 153,
            'action_type_id' => 5,
            'access_role_id' => 3,
            'access_entity_id' => 49,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 154,
            'action_type_id' => 6,
            'access_role_id' => 3,
            'access_entity_id' => 48,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 155,
            'action_type_id' => 1,
            'access_role_id' => 3,
            'access_entity_id' => 50,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 156,
            'action_type_id' => 2,
            'access_role_id' => 3,
            'access_entity_id' => 50,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 157,
            'action_type_id' => 3,
            'access_role_id' => 3,
            'access_entity_id' => 50,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 158,
            'action_type_id' => 4,
            'access_role_id' => 3,
            'access_entity_id' => 50,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 159,
            'action_type_id' => 5,
            'access_role_id' => 3,
            'access_entity_id' => 50,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 160,
            'action_type_id' => 6,
            'access_role_id' => 3,
            'access_entity_id' => 50,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 161,
            'action_type_id' => 1,
            'access_role_id' => 3,
            'access_entity_id' => 51,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 162,
            'action_type_id' => 2,
            'access_role_id' => 3,
            'access_entity_id' => 51,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 163,
            'action_type_id' => 3,
            'access_role_id' => 3,
            'access_entity_id' => 51,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 164,
            'action_type_id' => 4,
            'access_role_id' => 3,
            'access_entity_id' => 51,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 165,
            'action_type_id' => 5,
            'access_role_id' => 3,
            'access_entity_id' => 51,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 166,
            'action_type_id' => 6,
            'access_role_id' => 3,
            'access_entity_id' => 51,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 167,
            'action_type_id' => 1,
            'access_role_id' => 4,
            'access_entity_id' => 46,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 168,
            'action_type_id' => 5,
            'access_role_id' => 4,
            'access_entity_id' => 46,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 169,
            'action_type_id' => 6,
            'access_role_id' => 4,
            'access_entity_id' => 46,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 170,
            'action_type_id' => 1,
            'access_role_id' => 4,
            'access_entity_id' => 47,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 171,
            'action_type_id' => 5,
            'access_role_id' => 4,
            'access_entity_id' => 47,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 172,
            'action_type_id' => 6,
            'access_role_id' => 4,
            'access_entity_id' => 47,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 173,
            'action_type_id' => 1,
            'access_role_id' => 4,
            'access_entity_id' => 48,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 174,
            'action_type_id' => 5,
            'access_role_id' => 4,
            'access_entity_id' => 48,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 175,
            'action_type_id' => 6,
            'access_role_id' => 4,
            'access_entity_id' => 48,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 176,
            'action_type_id' => 1,
            'access_role_id' => 4,
            'access_entity_id' => 49,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 177,
            'action_type_id' => 5,
            'access_role_id' => 4,
            'access_entity_id' => 49,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 178,
            'action_type_id' => 6,
            'access_role_id' => 4,
            'access_entity_id' => 49,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 179,
            'action_type_id' => 1,
            'access_role_id' => 4,
            'access_entity_id' => 50,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 180,
            'action_type_id' => 5,
            'access_role_id' => 4,
            'access_entity_id' => 50,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 181,
            'action_type_id' => 6,
            'access_role_id' => 4,
            'access_entity_id' => 50,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 182,
            'action_type_id' => 1,
            'access_role_id' => 3,
            'access_entity_id' => 51,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 183,
            'action_type_id' => 2,
            'access_role_id' => 3,
            'access_entity_id' => 51,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 184,
            'action_type_id' => 3,
            'access_role_id' => 3,
            'access_entity_id' => 51,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 185,
            'action_type_id' => 4,
            'access_role_id' => 3,
            'access_entity_id' => 51,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 186,
            'action_type_id' => 5,
            'access_role_id' => 3,
            'access_entity_id' => 51,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 187,
            'action_type_id' => 6,
            'access_role_id' => 3,
            'access_entity_id' => 51,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 188,
            'action_type_id' => 1,
            'access_role_id' => 3,
            'access_entity_id' => 52,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 189,
            'action_type_id' => 2,
            'access_role_id' => 3,
            'access_entity_id' => 52,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 190,
            'action_type_id' => 3,
            'access_role_id' => 3,
            'access_entity_id' => 52,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 191,
            'action_type_id' => 4,
            'access_role_id' => 3,
            'access_entity_id' => 52,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 192,
            'action_type_id' => 5,
            'access_role_id' => 3,
            'access_entity_id' => 52,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 193,
            'action_type_id' => 6,
            'access_role_id' => 3,
            'access_entity_id' => 52,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 194,
            'action_type_id' => 1,
            'access_role_id' => 3,
            'access_entity_id' => 53,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 195,
            'action_type_id' => 2,
            'access_role_id' => 3,
            'access_entity_id' => 53,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 196,
            'action_type_id' => 3,
            'access_role_id' => 3,
            'access_entity_id' => 53,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 197,
            'action_type_id' => 4,
            'access_role_id' => 3,
            'access_entity_id' => 53,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 198,
            'action_type_id' => 5,
            'access_role_id' => 3,
            'access_entity_id' => 53,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 199,
            'action_type_id' => 6,
            'access_role_id' => 3,
            'access_entity_id' => 53,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 200,
            'action_type_id' => 1,
            'access_role_id' => 3,
            'access_entity_id' => 49,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 201,
            'action_type_id' => 2,
            'access_role_id' => 3,
            'access_entity_id' => 49,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 202,
            'action_type_id' => 3,
            'access_role_id' => 3,
            'access_entity_id' => 49,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 203,
            'action_type_id' => 4,
            'access_role_id' => 3,
            'access_entity_id' => 49,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 204,
            'action_type_id' => 5,
            'access_role_id' => 3,
            'access_entity_id' => 49,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 205,
            'action_type_id' => 6,
            'access_role_id' => 3,
            'access_entity_id' => 49,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 206,
            'action_type_id' => 1,
            'access_role_id' => 3,
            'access_entity_id' => 55,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 207,
            'action_type_id' => 2,
            'access_role_id' => 3,
            'access_entity_id' => 55,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 208,
            'action_type_id' => 3,
            'access_role_id' => 3,
            'access_entity_id' => 55,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 209,
            'action_type_id' => 4,
            'access_role_id' => 3,
            'access_entity_id' => 55,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 210,
            'action_type_id' => 5,
            'access_role_id' => 3,
            'access_entity_id' => 55,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 211,
            'action_type_id' => 6,
            'access_role_id' => 3,
            'access_entity_id' => 55,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 212,
            'action_type_id' => 1,
            'access_role_id' => 3,
            'access_entity_id' => 56,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 213,
            'action_type_id' => 2,
            'access_role_id' => 3,
            'access_entity_id' => 56,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 214,
            'action_type_id' => 3,
            'access_role_id' => 3,
            'access_entity_id' => 56,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 215,
            'action_type_id' => 4,
            'access_role_id' => 3,
            'access_entity_id' => 56,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 216,
            'action_type_id' => 5,
            'access_role_id' => 3,
            'access_entity_id' => 56,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 217,
            'action_type_id' => 6,
            'access_role_id' => 3,
            'access_entity_id' => 56,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 218,
            'action_type_id' => 1,
            'access_role_id' => 3,
            'access_entity_id' => 57,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 219,
            'action_type_id' => 2,
            'access_role_id' => 3,
            'access_entity_id' => 57,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 220,
            'action_type_id' => 3,
            'access_role_id' => 3,
            'access_entity_id' => 57,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 221,
            'action_type_id' => 4,
            'access_role_id' => 3,
            'access_entity_id' => 57,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 222,
            'action_type_id' => 5,
            'access_role_id' => 3,
            'access_entity_id' => 57,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 223,
            'action_type_id' => 6,
            'access_role_id' => 3,
            'access_entity_id' => 57,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 224,
            'action_type_id' => 1,
            'access_role_id' => 3,
            'access_entity_id' => 58,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 225,
            'action_type_id' => 2,
            'access_role_id' => 3,
            'access_entity_id' => 58,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 226,
            'action_type_id' => 3,
            'access_role_id' => 3,
            'access_entity_id' => 58,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 227,
            'action_type_id' => 4,
            'access_role_id' => 3,
            'access_entity_id' => 58,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 228,
            'action_type_id' => 5,
            'access_role_id' => 3,
            'access_entity_id' => 58,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 229,
            'action_type_id' => 6,
            'access_role_id' => 3,
            'access_entity_id' => 58,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 230,
            'action_type_id' => 1,
            'access_role_id' => 3,
            'access_entity_id' => 59,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 231,
            'action_type_id' => 2,
            'access_role_id' => 3,
            'access_entity_id' => 59,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 232,
            'action_type_id' => 3,
            'access_role_id' => 3,
            'access_entity_id' => 59,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 233,
            'action_type_id' => 4,
            'access_role_id' => 3,
            'access_entity_id' => 59,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 234,
            'action_type_id' => 5,
            'access_role_id' => 3,
            'access_entity_id' => 59,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 235,
            'action_type_id' => 6,
            'access_role_id' => 3,
            'access_entity_id' => 59,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 236,
            'action_type_id' => 1,
            'access_role_id' => 3,
            'access_entity_id' => 60,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 237,
            'action_type_id' => 2,
            'access_role_id' => 3,
            'access_entity_id' => 60,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 238,
            'action_type_id' => 3,
            'access_role_id' => 3,
            'access_entity_id' => 60,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 239,
            'action_type_id' => 4,
            'access_role_id' => 3,
            'access_entity_id' => 60,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 240,
            'action_type_id' => 5,
            'access_role_id' => 3,
            'access_entity_id' => 60,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 241,
            'action_type_id' => 6,
            'access_role_id' => 3,
            'access_entity_id' => 60,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 242,
            'action_type_id' => 1,
            'access_role_id' => 3,
            'access_entity_id' => 61,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 243,
            'action_type_id' => 2,
            'access_role_id' => 3,
            'access_entity_id' => 61,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 244,
            'action_type_id' => 3,
            'access_role_id' => 3,
            'access_entity_id' => 61,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 245,
            'action_type_id' => 4,
            'access_role_id' => 3,
            'access_entity_id' => 61,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 246,
            'action_type_id' => 5,
            'access_role_id' => 3,
            'access_entity_id' => 61,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 247,
            'action_type_id' => 6,
            'access_role_id' => 3,
            'access_entity_id' => 61,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 248,
            'action_type_id' => 1,
            'access_role_id' => 3,
            'access_entity_id' => 62,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 249,
            'action_type_id' => 2,
            'access_role_id' => 3,
            'access_entity_id' => 62,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 250,
            'action_type_id' => 3,
            'access_role_id' => 3,
            'access_entity_id' => 62,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 251,
            'action_type_id' => 4,
            'access_role_id' => 3,
            'access_entity_id' => 62,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 252,
            'action_type_id' => 5,
            'access_role_id' => 3,
            'access_entity_id' => 62,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 253,
            'action_type_id' => 6,
            'access_role_id' => 3,
            'access_entity_id' => 62,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-01-01 00:00:00',
            'updated_at' => '2019-01-01 00:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 254,
            'action_type_id' => 1,
            'access_role_id' => 6,
            'access_entity_id' => 4,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 255,
            'action_type_id' => 6,
            'access_role_id' => 6,
            'access_entity_id' => 4,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 256,
            'action_type_id' => 5,
            'access_role_id' => 6,
            'access_entity_id' => 4,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 257,
            'action_type_id' => 1,
            'access_role_id' => 6,
            'access_entity_id' => 14,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 258,
            'action_type_id' => 6,
            'access_role_id' => 6,
            'access_entity_id' => 14,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 259,
            'action_type_id' => 5,
            'access_role_id' => 6,
            'access_entity_id' => 14,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 260,
            'action_type_id' => 1,
            'access_role_id' => 6,
            'access_entity_id' => 9,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 261,
            'action_type_id' => 6,
            'access_role_id' => 6,
            'access_entity_id' => 9,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 262,
            'action_type_id' => 5,
            'access_role_id' => 6,
            'access_entity_id' => 9,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 263,
            'action_type_id' => 1,
            'access_role_id' => 6,
            'access_entity_id' => 11,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 264,
            'action_type_id' => 6,
            'access_role_id' => 6,
            'access_entity_id' => 11,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 265,
            'action_type_id' => 5,
            'access_role_id' => 6,
            'access_entity_id' => 11,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 266,
            'action_type_id' => 1,
            'access_role_id' => 6,
            'access_entity_id' => 17,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 267,
            'action_type_id' => 6,
            'access_role_id' => 6,
            'access_entity_id' => 17,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 268,
            'action_type_id' => 5,
            'access_role_id' => 6,
            'access_entity_id' => 17,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 269,
            'action_type_id' => 1,
            'access_role_id' => 6,
            'access_entity_id' => 12,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 270,
            'action_type_id' => 6,
            'access_role_id' => 6,
            'access_entity_id' => 12,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 271,
            'action_type_id' => 5,
            'access_role_id' => 6,
            'access_entity_id' => 12,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 272,
            'action_type_id' => 1,
            'access_role_id' => 7,
            'access_entity_id' => 4,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 273,
            'action_type_id' => 6,
            'access_role_id' => 7,
            'access_entity_id' => 4,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 274,
            'action_type_id' => 5,
            'access_role_id' => 7,
            'access_entity_id' => 4,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 275,
            'action_type_id' => 1,
            'access_role_id' => 7,
            'access_entity_id' => 14,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 276,
            'action_type_id' => 6,
            'access_role_id' => 7,
            'access_entity_id' => 14,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 277,
            'action_type_id' => 5,
            'access_role_id' => 7,
            'access_entity_id' => 14,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 278,
            'action_type_id' => 1,
            'access_role_id' => 6,
            'access_entity_id' => 6,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 279,
            'action_type_id' => 5,
            'access_role_id' => 6,
            'access_entity_id' => 6,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 280,
            'action_type_id' => 1,
            'access_role_id' => 7,
            'access_entity_id' => 6,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);


        /**/
        \App\Models\AccessEntitiesByRole::create([
            'id' => 281,
            'action_type_id' => 5,
            'access_role_id' => 7,
            'access_entity_id' => 6,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:00:00',
            'updated_at' => '2019-04-10 16:00:00',
        ]);

    }
}
