<?php

use Illuminate\Database\Seeder;

class AccessEntitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\AccessEntity::truncate();

        \App\Models\AccessEntity::create([
            "id" => 12,
            "access_entity_code" => "DbTypesController",
            "access_entity_name" => "Databases Types Controller",
        ]);//
        
        
        \App\Models\AccessEntity::create([
            "id" => 13,
            "access_entity_code" => "CountriesController",
            "access_entity_name" => "Countries Controller",
        ]);//
        
        \App\Models\AccessEntity::create([
            "id" => 15,
            "access_entity_code" => "RegionsController",
            "access_entity_name" => "Regions Controller",
        ]);
        
         \App\Models\AccessEntity::create([
            "id" => 16,
            "access_entity_code" => "DbAreasController",
            "access_entity_name" => "DbAreas Controller",
        ]);
        
    }
}
