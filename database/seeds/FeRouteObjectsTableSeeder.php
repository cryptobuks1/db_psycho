<?php

use Illuminate\Database\Seeder;

class FeRouteObjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\FeRouteObject::truncate();

//        /**/
//        \App\Models\FeRouteObject::create([
//            'id' => 1,
//            'fe_route_id' => 87,
//            'row_id_fe_route_object' => 1,
//            'completed_l' => false,
//            'deleted_l' => false,
//            'created_by' => 'seed',
//            'updated_by' => 'seed',
//            'created_at' => '2019-05-03 16:29:50',
//            'updated_at' => '2019-05-03 16:29:50',
//        ]);
//
//        if(config("database.default") == "pgsql"){
//
//            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"FeRouteObjects_id_seq\"', 100, true)");
//        }
    }
}
