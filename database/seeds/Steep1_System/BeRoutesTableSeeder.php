<?php

use Illuminate\Database\Seeder;

class BeRoutesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\BeRoute::truncate();


        /**/
        \App\Models\BeRoute::create([
            'id' => 1,
            'controller_id' => 34,
            'action_type_id' => 2,
            'be_route_code' => '/admin/action/type/insert',
            'be_route_path' => 'TabSystem\ActionTypesController@insert',
            'be_route_name' => 'admin-action-type-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 2,
            'controller_id' => 34,
            'action_type_id' => 4,
            'be_route_code' => '/admin/action/type/update',
            'be_route_path' => 'TabSystem\ActionTypesController@update',
            'be_route_name' => 'admin-action-type-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 3,
            'controller_id' => 34,
            'action_type_id' => 3,
            'be_route_code' => '/admin/action/type/delete',
            'be_route_path' => 'TabSystem\ActionTypesController@delete',
            'be_route_name' => 'admin-action-type-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 4,
            'controller_id' => 34,
            'action_type_id' => 11,
            'be_route_code' => '/admin/action/type/show',
            'be_route_path' => 'TabSystem\ActionTypesController@show',
            'be_route_name' => 'admin-action-type-show',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 5,
            'controller_id' => 193,
            'action_type_id' => 7,
            'be_route_code' => '/admin/get/home/panel/elements',
            'be_route_path' => 'HomePanelController@index',
            'be_route_name' => 'get-home-panel-elements',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);

        /**/
        \App\Models\BeRoute::create([
            'id' => 13,
            'controller_id' => 12,
            'action_type_id' => 2,
            'be_route_code' => '/admin/dbtypes/insert',
            'be_route_path' => 'TabSystem\DbTypesController@insert',
            'be_route_name' => 'admin-dbtypes-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 14,
            'controller_id' => 12,
            'action_type_id' => 4,
            'be_route_code' => '/admin/dbtypes/update',
            'be_route_path' => 'TabSystem\DbTypesController@update',
            'be_route_name' => 'admin-dbtypes-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 15,
            'controller_id' => 12,
            'action_type_id' => 3,
            'be_route_code' => '/admin/dbtypes/delete',
            'be_route_path' => 'TabSystem\DbTypesController@delete',
            'be_route_name' => 'admin-dbtypes-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 16,
            'controller_id' => 12,
            'action_type_id' => 6,
            'be_route_code' => '/admin/dbtypes/list',
            'be_route_path' => 'TabSystem\DbTypesController@list',
            'be_route_name' => 'admin-dbtypes-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 17,
            'controller_id' => 12,
            'action_type_id' => 5,
            'be_route_code' => '/admin/dbtypes/card',
            'be_route_path' => 'TabSystem\DbTypesController@card',
            'be_route_name' => 'admin-dbtypes-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 18,
            'controller_id' => 22,
            'action_type_id' => 6,
            'be_route_code' => '/admin/access/roles/list',
            'be_route_path' => 'TabAccess\AccessRolesController@list',
            'be_route_name' => 'access-roles-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 19,
            'controller_id' => 22,
            'action_type_id' => 5,
            'be_route_code' => '/admin/access/roles/card',
            'be_route_path' => 'TabAccess\AccessRolesController@card',
            'be_route_name' => 'access-roles-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 20,
            'controller_id' => 22,
            'action_type_id' => 8,
            'be_route_code' => '/admin/access/roles/write',
            'be_route_path' => 'TabAccess\AccessRolesController@write',
            'be_route_name' => 'access-roles-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 22,
            'controller_id' => 24,
            'action_type_id' => 2,
            'be_route_code' => '/admin/consumer/accessroles/insert',
            'be_route_path' => 'TabAccess\ConsumerAccessRolesController@insert',
            'be_route_name' => 'admin-consumer-accessroles-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 23,
            'controller_id' => 24,
            'action_type_id' => 4,
            'be_route_code' => '/admin/consumer/accessroles/update',
            'be_route_path' => 'TabAccess\ConsumerAccessRolesController@update',
            'be_route_name' => 'admin-consumer-accessroles-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 24,
            'controller_id' => 24,
            'action_type_id' => 3,
            'be_route_code' => '/admin/consumer/accessroles/delete',
            'be_route_path' => 'TabAccess\ConsumerAccessRolesController@delete',
            'be_route_name' => 'admin-consumer-accessroles-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 25,
            'controller_id' => 24,
            'action_type_id' => 11,
            'be_route_code' => '/admin/consumer/accessroles/show',
            'be_route_path' => 'TabAccess\ConsumerAccessRolesController@show',
            'be_route_name' => 'admin-consumer-accessroles-show',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 26,
            'controller_id' => 9,
            'action_type_id' => 7,
            'be_route_code' => '/admin/serverdbs/index',
            'be_route_path' => 'TabServerDbArea\ServersDbController@index',
            'be_route_name' => 'admin-server-index',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 27,
            'controller_id' => 9,
            'action_type_id' => 2,
            'be_route_code' => '/admin/serverdbs/insert',
            'be_route_path' => 'TabServerDbArea\ServersDbController@insert',
            'be_route_name' => 'admin-server-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 28,
            'controller_id' => 9,
            'action_type_id' => 4,
            'be_route_code' => '/admin/serverdbs/update',
            'be_route_path' => 'TabServerDbArea\ServersDbController@update',
            'be_route_name' => 'admin-server-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 29,
            'controller_id' => 9,
            'action_type_id' => 3,
            'be_route_code' => '/admin/serverdbs/delete',
            'be_route_path' => 'TabServerDbArea\ServersDbController@delete',
            'be_route_name' => 'admin-server-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 30,
            'controller_id' => 9,
            'action_type_id' => 6,
            'be_route_code' => '/admin/serverdbs/list',
            'be_route_path' => 'TabServerDbArea\ServersDbController@list',
            'be_route_name' => 'admin-server-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 31,
            'controller_id' => 9,
            'action_type_id' => 5,
            'be_route_code' => '/admin/serverdbs/card',
            'be_route_path' => 'TabServerDbArea\ServersDbController@card',
            'be_route_name' => 'admin-server-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 32,
            'controller_id' => 11,
            'action_type_id' => 2,
            'be_route_code' => '/admin/db/insert',
            'be_route_path' => 'TabServerDbArea\ServersDbController@insert',
            'be_route_name' => 'admin-server-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 33,
            'controller_id' => 11,
            'action_type_id' => 4,
            'be_route_code' => '/admin/db/update',
            'be_route_path' => 'TabServerDbArea\ServersDbController@update',
            'be_route_name' => 'admin-db-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 34,
            'controller_id' => 11,
            'action_type_id' => 3,
            'be_route_code' => '/admin/db/delete',
            'be_route_path' => 'TabServerDbArea\ServersDbController@delete',
            'be_route_name' => 'admin-db-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 35,
            'controller_id' => 11,
            'action_type_id' => 6,
            'be_route_code' => '/admin/db/list',
            'be_route_path' => 'TabServerDbArea\ServersDbController@list',
            'be_route_name' => 'admin-db-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 36,
            'controller_id' => 11,
            'action_type_id' => 5,
            'be_route_code' => '/admin/db/card',
            'be_route_path' => 'TabServerDbArea\ServersDbController@card',
            'be_route_name' => 'admin-db-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 37,
            'controller_id' => 17,
            'action_type_id' => 2,
            'be_route_code' => '/admin/db/area/insert',
            'be_route_path' => 'TabServerDbArea\DbAreasController@insert',
            'be_route_name' => 'admin-db-area-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 38,
            'controller_id' => 17,
            'action_type_id' => 4,
            'be_route_code' => '/admin/db/area/update',
            'be_route_path' => 'TabServerDbArea\DbAreasController@update',
            'be_route_name' => 'admin-db-area-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 39,
            'controller_id' => 17,
            'action_type_id' => 3,
            'be_route_code' => '/admin/db/area/delete',
            'be_route_path' => 'TabServerDbArea\DbAreasController@delete',
            'be_route_name' => 'admin-db-area-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 40,
            'controller_id' => 17,
            'action_type_id' => 6,
            'be_route_code' => '/admin/db/area/list',
            'be_route_path' => 'TabServerDbArea\DbAreasController@list',
            'be_route_name' => 'admin-db-area-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 41,
            'controller_id' => 17,
            'action_type_id' => 5,
            'be_route_code' => '/admin/db/area/card',
            'be_route_path' => 'TabServerDbArea\DbAreasController@card',
            'be_route_name' => 'admin-db-area-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 42,
            'controller_id' => 13,
            'action_type_id' => 2,
            'be_route_code' => '/admin/country/insert',
            'be_route_path' => 'TabCommonReferences\CountriesController@insert',
            'be_route_name' => 'admin-country-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 43,
            'controller_id' => 13,
            'action_type_id' => 4,
            'be_route_code' => '/admin/country/update',
            'be_route_path' => 'TabCommonReferences\CountriesController@update',
            'be_route_name' => 'admin-country-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 44,
            'controller_id' => 13,
            'action_type_id' => 3,
            'be_route_code' => '/admin/country/delete',
            'be_route_path' => 'TabCommonReferences\CountriesController@delete',
            'be_route_name' => 'admin-country-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 45,
            'controller_id' => 13,
            'action_type_id' => 6,
            'be_route_code' => '/admin/country/list',
            'be_route_path' => 'TabCommonReferences\CountriesController@list',
            'be_route_name' => 'admin-country-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 46,
            'controller_id' => 13,
            'action_type_id' => 5,
            'be_route_code' => '/admin/country/card',
            'be_route_path' => 'TabCommonReferences\CountriesController@card',
            'be_route_name' => 'admin-country-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 48,
            'controller_id' => 13,
            'action_type_id' => 6,
            'be_route_code' => '/admin/countries/regionsList',
            'be_route_path' => 'TabCommonReferences\CountriesController@regionsList',
            'be_route_name' => 'admin-country-regions-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);

        /**/
        \App\Models\BeRoute::create([
            'id' => 51,
            'controller_id' => 15,
            'action_type_id' => 2,
            'be_route_code' => '/admin/region/insert',
            'be_route_path' => 'TabCommonReferences\RegionsController@insert',
            'be_route_name' => 'admin-region-get-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 52,
            'controller_id' => 15,
            'action_type_id' => 4,
            'be_route_code' => '/admin/region/update',
            'be_route_path' => 'TabCommonReferences\RegionsController@update',
            'be_route_name' => 'admin-region-get-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 53,
            'controller_id' => 15,
            'action_type_id' => 3,
            'be_route_code' => '/admin/region/delete',
            'be_route_path' => 'TabCommonReferences\RegionsController@delete',
            'be_route_name' => 'admin-region-get-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 54,
            'controller_id' => 15,
            'action_type_id' => 6,
            'be_route_code' => '/admin/region/list',
            'be_route_path' => 'TabCommonReferences\RegionsController@list',
            'be_route_name' => 'admin-region-get-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 55,
            'controller_id' => 15,
            'action_type_id' => 5,
            'be_route_code' => '/admin/region/card',
            'be_route_path' => 'TabCommonReferences\RegionsController@card',
            'be_route_name' => 'admin-region-get-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 56,
            'controller_id' => 31,
            'action_type_id' => 7,
            'be_route_code' => '/admin/company/report',
            'be_route_path' => 'TabCompanyContractor\CompaniesReportController@index',
            'be_route_name' => 'admin-company-report-index',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 57,
            'controller_id' => 31,
            'action_type_id' => 15,
            'be_route_code' => '/admin/company/report/create',
            'be_route_path' => 'TabCompanyContractor\CompaniesReportController@sendRequest',
            'be_route_name' => 'admin-company-send-request',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 58,
            'controller_id' => 31,
            'action_type_id' => 16,
            'be_route_code' => '/admin/company/report/html',
            'be_route_path' => 'TabCompanyContractor\CompaniesReportController@downloadHTML',
            'be_route_name' => 'admin-download-html',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 59,
            'controller_id' => 31,
            'action_type_id' => 17,
            'be_route_code' => '/admin/company/report/pdf',
            'be_route_path' => 'TabCompanyContractor\CompaniesReportController@downloadPDF',
            'be_route_name' => 'admin-download-pdf',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 60,
            'controller_id' => 31,
            'action_type_id' => 18,
            'be_route_code' => '/admin/company/report/xlsx',
            'be_route_path' => 'TabCompanyContractor\CompaniesReportController@downloadXLSX',
            'be_route_name' => 'admin-download-xlsx',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 61,
            'controller_id' => 31,
            'action_type_id' => 3,
            'be_route_code' => '/admin/company/report/delete',
            'be_route_path' => 'TabCompanyContractor\CompaniesReportController@delete',
            'be_route_name' => 'admin-report-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 62,
            'controller_id' => 31,
            'action_type_id' => 19,
            'be_route_code' => '/admin/company/report/get-updated-data',
            'be_route_path' => 'TabCompanyContractor\CompaniesReportController@getUpdatedDataById',
            'be_route_name' => 'get-updated-data',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 63,
            'controller_id' => 1,
            'action_type_id' => 7,
            'be_route_code' => '/admin/accesses',
            'be_route_path' => 'Admin\AccessesController@index',
            'be_route_name' => 'admin-accesses',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 64,
            'controller_id' => 1,
            'action_type_id' => 11,
            'be_route_code' => '/admin/accesses/show',
            'be_route_path' => 'Admin\AccessesController@show',
            'be_route_name' => 'admin-accesses-show',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 66,
            'controller_id' => 4,
            'action_type_id' => 4,
            'be_route_code' => '/admin/contractor/update',
            'be_route_path' => 'TabCompanyContractor\ContractorsController@update',
            'be_route_name' => 'admin-accesses-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 67,
            'controller_id' => 8,
            'action_type_id' => 4,
            'be_route_code' => '/admin/company/update',
            'be_route_path' => 'TabCompanyContractor\CompaniesController@update',
            'be_route_name' => 'admin-accesses-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 69,
            'controller_id' => 1,
            'action_type_id' => 2,
            'be_route_code' => '/admin/contractor/insert',
            'be_route_path' => 'Admin\AccessesController@insert',
            'be_route_name' => 'admin-accesses-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 70,
            'controller_id' => 1,
            'action_type_id' => 3,
            'be_route_code' => '/admin/contractor/delete',
            'be_route_path' => 'Admin\AccessesController@delete',
            'be_route_name' => 'admin-accesses-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 71,
            'controller_id' => 1,
            'action_type_id' => 22,
            'be_route_code' => '/admin/update/contractor/modal/ajax',
            'be_route_path' => 'Admin\AccessesController@consumerModalAjax',
            'be_route_name' => 'admin-consumer-modal-ajax',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 72,
            'controller_id' => 37,
            'action_type_id' => 7,
            'be_route_code' => '/admin/companies',
            'be_route_path' => 'Admin\AccessesCompanyController@index',
            'be_route_name' => 'admin-company-accesses',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 73,
            'controller_id' => 37,
            'action_type_id' => 11,
            'be_route_code' => '/admin/companies/show',
            'be_route_path' => 'Admin\AccessesCompanyController@show',
            'be_route_name' => 'admin-company-accesses-show',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 74,
            'controller_id' => 37,
            'action_type_id' => 4,
            'be_route_code' => '/admin/companies',
            'be_route_path' => 'Admin\AccessesCompanyController@update',
            'be_route_name' => 'admin-company-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 75,
            'controller_id' => 37,
            'action_type_id' => 2,
            'be_route_code' => '/admin/companies/insert',
            'be_route_path' => 'Admin\AccessesCompanyController@insert',
            'be_route_name' => 'admin-company-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 76,
            'controller_id' => 37,
            'action_type_id' => 3,
            'be_route_code' => '/admin/companies/delete',
            'be_route_path' => 'Admin\AccessesCompanyController@delete',
            'be_route_name' => 'admin-company-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 77,
            'controller_id' => 37,
            'action_type_id' => 23,
            'be_route_code' => '/update/company/modal/ajax',
            'be_route_path' => 'Admin\AccessesCompanyController@companyModalAjax',
            'be_route_name' => 'admin-company-modal-ajax',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 78,
            'controller_id' => 41,
            'action_type_id' => 7,
            'be_route_code' => '/admin/lang',
            'be_route_path' => 'Admin\LangController@index',
            'be_route_name' => 'admin-lang',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 79,
            'controller_id' => 41,
            'action_type_id' => 4,
            'be_route_code' => '/admin/lang',
            'be_route_path' => 'Admin\LangController@update',
            'be_route_name' => 'admin-lang-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 80,
            'controller_id' => 41,
            'action_type_id' => 2,
            'be_route_code' => '/admin/lang/insert',
            'be_route_path' => 'Admin\LangController@insert',
            'be_route_name' => 'admin-lang-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 81,
            'controller_id' => 41,
            'action_type_id' => 3,
            'be_route_code' => '/admin/lang/delete',
            'be_route_path' => 'Admin\LangController@delete',
            'be_route_name' => 'admin-lang-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 82,
            'controller_id' => 69,
            'action_type_id' => 7,
            'be_route_code' => '/admin/caption',
            'be_route_path' => 'Admin\CaptionController@index',
            'be_route_name' => 'admin-caption',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 83,
            'controller_id' => 69,
            'action_type_id' => 4,
            'be_route_code' => '/admin/caption',
            'be_route_path' => 'Admin\CaptionController@update',
            'be_route_name' => 'admin-caption-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 84,
            'controller_id' => 69,
            'action_type_id' => 2,
            'be_route_code' => '/admin/caption/insert',
            'be_route_path' => 'Admin\CaptionController@insert',
            'be_route_name' => 'admin-caption-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 85,
            'controller_id' => 69,
            'action_type_id' => 3,
            'be_route_code' => '/admin/caption/delete',
            'be_route_path' => 'Admin\CaptionController@delete',
            'be_route_name' => 'admin-caption-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 87,
            'controller_id' => 69,
            'action_type_id' => 7,
            'be_route_code' => '/admin/caption',
            'be_route_path' => 'Admin\CaptionController@index',
            'be_route_name' => 'admin-caption',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 88,
            'controller_id' => 69,
            'action_type_id' => 4,
            'be_route_code' => '/admin/caption',
            'be_route_path' => 'Admin\CaptionController@update',
            'be_route_name' => 'admin-caption-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 89,
            'controller_id' => 69,
            'action_type_id' => 2,
            'be_route_code' => '/admin/caption/insert',
            'be_route_path' => 'Admin\CaptionController@insert',
            'be_route_name' => 'admin-caption-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 90,
            'controller_id' => 69,
            'action_type_id' => 3,
            'be_route_code' => '/admin/caption/delete',
            'be_route_path' => 'Admin\CaptionController@delete',
            'be_route_name' => 'admin-caption-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 92,
            'controller_id' => 7,
            'action_type_id' => 7,
            'be_route_code' => '/admin/captions',
            'be_route_path' => 'TabSystem\CaptionsController@index',
            'be_route_name' => 'admin-captions-index',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 93,
            'controller_id' => 7,
            'action_type_id' => 5,
            'be_route_code' => '/admin/captions/card',
            'be_route_path' => 'TabSystem\CaptionsController@card',
            'be_route_name' => 'admin-captions-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 94,
            'controller_id' => 7,
            'action_type_id' => 6,
            'be_route_code' => '/admin/captions/list',
            'be_route_path' => 'TabSystem\CaptionsController@list',
            'be_route_name' => 'admin-captions-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 95,
            'controller_id' => 7,
            'action_type_id' => 2,
            'be_route_code' => '/admin/captions/insert',
            'be_route_path' => 'TabSystem\CaptionsController@insert',
            'be_route_name' => 'admin-captions-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 96,
            'controller_id' => 7,
            'action_type_id' => 4,
            'be_route_code' => '/admin/captions/update',
            'be_route_path' => 'TabSystem\CaptionsController@update',
            'be_route_name' => 'admin-captions-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 97,
            'controller_id' => 7,
            'action_type_id' => 3,
            'be_route_code' => '/admin/captions/delete',
            'be_route_path' => 'TabSystem\CaptionsController@delete',
            'be_route_name' => 'admin-captions-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 98,
            'controller_id' => 10,
            'action_type_id' => 6,
            'be_route_code' => '/admin/translationCaptions/list',
            'be_route_path' => 'TabTranslation\TranslationCaptionsController@list',
            'be_route_name' => 'admin-captions-translations-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 99,
            'controller_id' => 10,
            'action_type_id' => 2,
            'be_route_code' => '/admin/translationCaptions/insert',
            'be_route_path' => 'TabTranslation\TranslationCaptionsController@insert',
            'be_route_name' => 'admin-captions-translations-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 100,
            'controller_id' => 10,
            'action_type_id' => 5,
            'be_route_code' => '/admin/translationCaptions/card',
            'be_route_path' => 'TabTranslation\TranslationCaptionsController@card',
            'be_route_name' => 'admin-captions-translations-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 101,
            'controller_id' => 10,
            'action_type_id' => 3,
            'be_route_code' => '/admin/translationCaptions/delete',
            'be_route_path' => 'TabTranslation\TranslationCaptionsController@delete',
            'be_route_name' => 'admin-captions-translations-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 102,
            'controller_id' => 10,
            'action_type_id' => 4,
            'be_route_code' => '/admin/translationCaptions/update',
            'be_route_path' => 'TabTranslation\TranslationCaptionsController@update',
            'be_route_name' => 'admin-captions-translations-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 103,
            'controller_id' => 21,
            'action_type_id' => 6,
            'be_route_code' => '/admin/consumer/accounts/list',
            'be_route_path' => 'Admin\ConsumerAccountsController@list',
            'be_route_name' => 'admin-consumer-accounts-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 104,
            'controller_id' => 21,
            'action_type_id' => 5,
            'be_route_code' => '/admin/consumer/accounts/card',
            'be_route_path' => 'Admin\ConsumerAccountsController@card',
            'be_route_name' => 'admin-consumer-accounts-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 105,
            'controller_id' => 21,
            'action_type_id' => 2,
            'be_route_code' => '/admin/consumer/accounts/insert',
            'be_route_path' => 'Admin\ConsumerAccountsController@insert',
            'be_route_name' => 'admin-consumer-accounts-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 106,
            'controller_id' => 21,
            'action_type_id' => 4,
            'be_route_code' => '/admin/consumer/accounts/update',
            'be_route_path' => 'Admin\ConsumerAccountsController@update',
            'be_route_name' => 'admin-consumer-accounts-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 107,
            'controller_id' => 21,
            'action_type_id' => 3,
            'be_route_code' => '/admin/consumer/accounts/delete',
            'be_route_path' => 'Admin\ConsumerAccountsController@delete',
            'be_route_name' => 'admin-consumer-accounts-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 108,
            'controller_id' => 39,
            'action_type_id' => 7,
            'be_route_code' => '/admin/directoryCapt',
            'be_route_path' => 'Admin\DirectoryCaptionController@index',
            'be_route_name' => 'admin-directory-caption',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 109,
            'controller_id' => 39,
            'action_type_id' => 4,
            'be_route_code' => '/admin/directoryCapt',
            'be_route_path' => 'Admin\DirectoryCaptionController@update',
            'be_route_name' => 'admin-directory-caption-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 110,
            'controller_id' => 39,
            'action_type_id' => 2,
            'be_route_code' => '/admin/directoryCapt/insert',
            'be_route_path' => 'Admin\DirectoryCaptionController@insert',
            'be_route_name' => 'admin-directory-caption-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 111,
            'controller_id' => 39,
            'action_type_id' => 3,
            'be_route_code' => '/admin/directoryCapt/delete',
            'be_route_path' => 'Admin\DirectoryCaptionController@delete',
            'be_route_name' => 'admin-directory-caption-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 113,
            'controller_id' => 27,
            'action_type_id' => 7,
            'be_route_code' => '/admin/infokind',
            'be_route_path' => 'Admin\InfoKindsController@index',
            'be_route_name' => 'admin-info-kind',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 114,
            'controller_id' => 27,
            'action_type_id' => 4,
            'be_route_code' => '/admin/infokind',
            'be_route_path' => 'Admin\InfoKindsController@update',
            'be_route_name' => 'admin-info-kind-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 115,
            'controller_id' => 27,
            'action_type_id' => 2,
            'be_route_code' => '/admin/infokind/insert',
            'be_route_path' => 'Admin\InfoKindsController@insert',
            'be_route_name' => 'admin-info-kind-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 116,
            'controller_id' => 27,
            'action_type_id' => 3,
            'be_route_code' => '/admin/infokind/delete',
            'be_route_path' => 'Admin\InfoKindsController@delete',
            'be_route_name' => 'admin-info-kind-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 117,
            'controller_id' => 28,
            'action_type_id' => 4,
            'be_route_code' => '/admin/infotype',
            'be_route_path' => 'Admin\InfoTypesController@update',
            'be_route_name' => 'admin-info-type-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 118,
            'controller_id' => 28,
            'action_type_id' => 2,
            'be_route_code' => '/admin/infotype/insert',
            'be_route_path' => 'Admin\InfoTypesController@insert',
            'be_route_name' => 'admin-info-type-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 119,
            'controller_id' => 28,
            'action_type_id' => 3,
            'be_route_code' => '/admin/infotype/delete',
            'be_route_path' => 'Admin\InfoTypesController@delete',
            'be_route_name' => 'admin-info-type-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 120,
            'controller_id' => 25,
            'action_type_id' => 7,
            'be_route_code' => '/admin/accessRow',
            'be_route_path' => 'TabAccess\ConsumerAccessRowController@index',
            'be_route_name' => 'admin-consumer-access',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 121,
            'controller_id' => 25,
            'action_type_id' => 4,
            'be_route_code' => '/admin/accessRow',
            'be_route_path' => 'TabAccess\ConsumerAccessRowController@update',
            'be_route_name' => 'admin-consumer-access-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 122,
            'controller_id' => 25,
            'action_type_id' => 11,
            'be_route_code' => '/admin/accessRow/show',
            'be_route_path' => 'TabAccess\ConsumerAccessRowController@show',
            'be_route_name' => 'admin-consumer-access-show',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 123,
            'controller_id' => 25,
            'action_type_id' => 2,
            'be_route_code' => '/admin/accessRow/insert',
            'be_route_path' => 'TabAccess\ConsumerAccessRowController@insert',
            'be_route_name' => 'admin-consumer-access-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 124,
            'controller_id' => 25,
            'action_type_id' => 3,
            'be_route_code' => '/admin/accessRow/delete',
            'be_route_path' => 'TabAccess\ConsumerAccessRowController@delete',
            'be_route_name' => 'admin-consumer-access-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 125,
            'controller_id' => 23,
            'action_type_id' => 7,
            'be_route_code' => '/admin/accessType',
            'be_route_path' => 'TabAccess\AccessTypesController@index',
            'be_route_name' => 'admin-type-access',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 126,
            'controller_id' => 23,
            'action_type_id' => 4,
            'be_route_code' => '/admin/accessType',
            'be_route_path' => 'TabAccess\AccessTypesController@update',
            'be_route_name' => 'admin-type-access-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 127,
            'controller_id' => 23,
            'action_type_id' => 11,
            'be_route_code' => '/admin/accessType/show',
            'be_route_path' => 'TabAccess\AccessTypesController@show',
            'be_route_name' => 'admin-type-access-show',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 128,
            'controller_id' => 23,
            'action_type_id' => 2,
            'be_route_code' => '/admin/accessType/insert',
            'be_route_path' => 'TabAccess\AccessTypesController@insert',
            'be_route_name' => 'admin-type-access-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 129,
            'controller_id' => 23,
            'action_type_id' => 3,
            'be_route_code' => '/admin/accessType/delete',
            'be_route_path' => 'TabAccess\AccessTypesController@delete',
            'be_route_name' => 'admin-type-access-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 130,
            'controller_id' => 14,
            'action_type_id' => 11,
            'be_route_code' => '/admin/contractorsInfo',
            'be_route_path' => 'TabCompanyContractor\ContractorsInfoController@show',
            'be_route_name' => 'admin-contractor-info-show',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 132,
            'controller_id' => 14,
            'action_type_id' => 4,
            'be_route_code' => '/admin/contractorInfo',
            'be_route_path' => 'TabCompanyContractor\ContractorsInfoController@update',
            'be_route_name' => 'admin-contractor-info-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 133,
            'controller_id' => 14,
            'action_type_id' => 2,
            'be_route_code' => '/admin/contractorInfo/insert',
            'be_route_path' => 'TabCompanyContractor\ContractorsInfoController@insert',
            'be_route_name' => 'admin-contractor-info-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 134,
            'controller_id' => 14,
            'action_type_id' => 3,
            'be_route_code' => '/admin/contractorInfo/delete',
            'be_route_path' => 'TabCompanyContractor\ContractorsInfoController@delete',
            'be_route_name' => 'admin-contractor-info-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 135,
            'controller_id' => 30,
            'action_type_id' => 11,
            'be_route_code' => '/admin/companiesInfo',
            'be_route_path' => 'TabCompanyContractor\CompaniesInfoController@show',
            'be_route_name' => 'admin-company-info-show',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 137,
            'controller_id' => 30,
            'action_type_id' => 4,
            'be_route_code' => '/admin/companyInfo',
            'be_route_path' => 'TabCompanyContractor\CompaniesInfoController@update',
            'be_route_name' => 'admin-company-info-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 138,
            'controller_id' => 30,
            'action_type_id' => 2,
            'be_route_code' => '/admin/companyInfo/insert',
            'be_route_path' => 'TabCompanyContractor\CompaniesInfoController@insert',
            'be_route_name' => 'admin-company-info-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 139,
            'controller_id' => 30,
            'action_type_id' => 3,
            'be_route_code' => '/admin/companyInfo/delete',
            'be_route_path' => 'TabCompanyContractor\CompaniesInfoController@delete',
            'be_route_name' => 'admin-company-info-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 140,
            'controller_id' => 11,
            'action_type_id' => 7,
            'be_route_code' => '/admin/db',
            'be_route_path' => 'TabServerDbArea\DBasesController@index',
            'be_route_name' => 'admin-db',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 141,
            'controller_id' => 31,
            'action_type_id' => 30,
            'be_route_code' => '/admin/company/report/get',
            'be_route_path' => 'TabCompanyContractor\CompaniesReportController@getRequest',
            'be_route_name' => '',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 142,
            'controller_id' => 8,
            'action_type_id' => 6,
            'be_route_code' => '/admin/company/list',
            'be_route_path' => 'TabCompanyContractor\CompaniesController@list',
            'be_route_name' => 'company-access-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 143,
            'controller_id' => 8,
            'action_type_id' => 5,
            'be_route_code' => '/admin/company/card',
            'be_route_path' => 'TabCompanyContractor\CompaniesController@card',
            'be_route_name' => 'company-access-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 146,
            'controller_id' => 4,
            'action_type_id' => 6,
            'be_route_code' => '/admin/contractor/list',
            'be_route_path' => 'TabCompanyContractor\ContractorsController@list',
            'be_route_name' => 'contractor-access-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 147,
            'controller_id' => 4,
            'action_type_id' => 5,
            'be_route_code' => '/admin/contractor/card',
            'be_route_path' => 'TabCompanyContractor\ContractorsController@card',
            'be_route_name' => 'contractor-access-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 148,
            'controller_id' => 16,
            'action_type_id' => 6,
            'be_route_code' => '/admin/contractorSandBox/list',
            'be_route_path' => 'TabCompanyContractor\ContractorsControllerSandBox@list',
            'be_route_name' => 'contractor-access-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 149,
            'controller_id' => 14,
            'action_type_id' => 5,
            'be_route_code' => '/admin/contractor/contact/info/card',
            'be_route_path' => 'TabCompanyContractor\ContractorsInfoController@card',
            'be_route_name' => 'contractor-contact-info-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 150,
            'controller_id' => 14,
            'action_type_id' => 6,
            'be_route_code' => '/admin/contractor/contact/info/list',
            'be_route_path' => 'TabCompanyContractor\ContractorsInfoController@list',
            'be_route_name' => 'contractor-contact-info-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 151,
            'controller_id' => 5,
            'action_type_id' => 6,
            'be_route_code' => '/admin/languages/list',
            'be_route_path' => 'TabCommonReferences\LanguagesController@list',
            'be_route_name' => 'languages-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 152,
            'controller_id' => 5,
            'action_type_id' => 5,
            'be_route_code' => '/admin/language/card',
            'be_route_path' => 'TabCommonReferences\LanguagesController@card',
            'be_route_name' => 'languages-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 153,
            'controller_id' => 5,
            'action_type_id' => 4,
            'be_route_code' => '/admin/language/update',
            'be_route_path' => 'TabCommonReferences\LanguagesController@update',
            'be_route_name' => 'languages-card-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 154,
            'controller_id' => 20,
            'action_type_id' => 6,
            'be_route_code' => '/admin/attachedFile',
            'be_route_path' => 'AttachedFiles\AttachedFilesController@list',
            'be_route_name' => 'attached-files',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 155,
            'controller_id' => 20,
            'action_type_id' => 5,
            'be_route_code' => '/admin/contractorSandBox/list',
            'be_route_path' => 'AttachedFiles\AttachedFilesController@card',
            'be_route_name' => 'attached-files-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 156,
            'controller_id' => 18,
            'action_type_id' => 6,
            'be_route_code' => '/admin/attachedKind/list',
            'be_route_path' => 'AttachedFiles\AttachedDocumentKindController@list',
            'be_route_name' => 'attached-document-kind-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 157,
            'controller_id' => 18,
            'action_type_id' => 5,
            'be_route_code' => '/admin/attachedKind/card',
            'be_route_path' => 'AttachedFiles\AttachedDocumentKindController@card',
            'be_route_name' => 'attached-document-kind-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 158,
            'controller_id' => 19,
            'action_type_id' => 6,
            'be_route_code' => '/admin/attachedType/list',
            'be_route_path' => 'AttachedFiles\AttachedDocumentTypeController@list',
            'be_route_name' => 'attached-document-type-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 159,
            'controller_id' => 19,
            'action_type_id' => 5,
            'be_route_code' => '/admin/attachedType/card',
            'be_route_path' => 'AttachedFiles\AttachedDocumentTypeController@card',
            'be_route_name' => 'attached-document-type-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 161,
            'controller_id' => 20,
            'action_type_id' => 4,
            'be_route_code' => '/admin/attachedFile/update',
            'be_route_path' => 'AttachedFiles\AttachedFilesController@update',
            'be_route_name' => 'attached-card_list-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 162,
            'controller_id' => 50,
            'action_type_id' => 5,
            'be_route_code' => '/admin/banks/card',
            'be_route_path' => 'TabFinances\BanksController@card',
            'be_route_name' => 'banks-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 163,
            'controller_id' => 50,
            'action_type_id' => 6,
            'be_route_code' => '/admin/banks/list',
            'be_route_path' => 'TabFinances\BanksController@list',
            'be_route_name' => 'banks-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 164,
            'controller_id' => 50,
            'action_type_id' => 4,
            'be_route_code' => '/admin/banks/update',
            'be_route_path' => 'TabFinances\BanksController@update',
            'be_route_name' => 'banks-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 165,
            'controller_id' => 51,
            'action_type_id' => 5,
            'be_route_code' => '/admin/currencies/card',
            'be_route_path' => 'TabFinances\CurrenciesController@card',
            'be_route_name' => 'currencies-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 166,
            'controller_id' => 51,
            'action_type_id' => 6,
            'be_route_code' => '/admin/currencies/list',
            'be_route_path' => 'TabFinances\CurrenciesController@list',
            'be_route_name' => 'currencies-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 167,
            'controller_id' => 51,
            'action_type_id' => 4,
            'be_route_code' => '/admin/currencies/update',
            'be_route_path' => 'TabFinances\CurrenciesController@update',
            'be_route_name' => 'currencies-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 168,
            'controller_id' => 46,
            'action_type_id' => 5,
            'be_route_code' => '/admin/cryptoExchanges/card',
            'be_route_path' => 'TabCrypto\CryptoExchangesController@card',
            'be_route_name' => 'cryptoExchanges-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 169,
            'controller_id' => 46,
            'action_type_id' => 6,
            'be_route_code' => '/admin/cryptoExchanges/list',
            'be_route_path' => 'TabCrypto\CryptoExchangesController@list',
            'be_route_name' => 'cryptoExchanges-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 170,
            'controller_id' => 46,
            'action_type_id' => 4,
            'be_route_code' => '/admin/cryptoExchanges/update',
            'be_route_path' => 'TabCrypto\CryptoExchangesController@update',
            'be_route_name' => 'cryptoExchanges-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 171,
            'controller_id' => 47,
            'action_type_id' => 5,
            'be_route_code' => '/admin/cryptoPlatforms/card',
            'be_route_path' => 'TabCrypto\CryptoPlatformsController@card',
            'be_route_name' => 'cryptoPlatforms-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 172,
            'controller_id' => 47,
            'action_type_id' => 6,
            'be_route_code' => '/admin/cryptoPlatforms/list',
            'be_route_path' => 'TabCrypto\CryptoPlatformsController@list',
            'be_route_name' => 'cryptoPlatforms-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 173,
            'controller_id' => 47,
            'action_type_id' => 4,
            'be_route_code' => '/admin/cryptoPlatforms/update',
            'be_route_path' => 'TabCrypto\CryptoPlatformsController@update',
            'be_route_name' => 'cryptoPlatforms-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 174,
            'controller_id' => 48,
            'action_type_id' => 5,
            'be_route_code' => '/admin/cryptoTokens/card',
            'be_route_path' => 'TabCrypto\CryptoTokensController@card',
            'be_route_name' => 'cryptoTokens-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 175,
            'controller_id' => 48,
            'action_type_id' => 6,
            'be_route_code' => '/admin/cryptoTokens/list',
            'be_route_path' => 'TabCrypto\CryptoTokensController@list',
            'be_route_name' => 'cryptoTokens-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 176,
            'controller_id' => 48,
            'action_type_id' => 4,
            'be_route_code' => '/admin/cryptoTokens/update',
            'be_route_path' => 'TabCrypto\CryptoTokensController@update',
            'be_route_name' => 'cryptoTokens-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 177,
            'controller_id' => 53,
            'action_type_id' => 6,
            'be_route_code' => '/admin/contractor/bankAccounts/list',
            'be_route_path' => 'TabFinances\BankAccountContractorsController@list',
            'be_route_name' => 'contractor-bankAccounts-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 178,
            'controller_id' => 53,
            'action_type_id' => 5,
            'be_route_code' => '/admin/contractor/bankAccounts/card',
            'be_route_path' => 'TabFinances\BankAccountContractorsController@card',
            'be_route_name' => 'contractor-bankAccounts-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 179,
            'controller_id' => 53,
            'action_type_id' => 4,
            'be_route_code' => '/admin/contractor/bankAccounts/update',
            'be_route_path' => 'TabFinances\BankAccountContractorsController@update',
            'be_route_name' => 'contractor-bankAccounts-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 180,
            'controller_id' => 52,
            'action_type_id' => 6,
            'be_route_code' => '/admin/company/bankAccounts/list',
            'be_route_path' => 'TabFinances\BankAccountCompaniesController@list',
            'be_route_name' => 'company-bankAccounts-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 181,
            'controller_id' => 52,
            'action_type_id' => 5,
            'be_route_code' => '/admin/company/bankAccounts/card',
            'be_route_path' => 'TabFinances\BankAccountCompaniesController@card',
            'be_route_name' => 'company-bankAccounts-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 182,
            'controller_id' => 52,
            'action_type_id' => 4,
            'be_route_code' => '/admin/company/bankAccounts/update',
            'be_route_path' => 'TabFinances\BankAccountCompaniesController@update',
            'be_route_name' => 'company-bankAccounts-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 183,
            'controller_id' => 49,
            'action_type_id' => 6,
            'be_route_code' => '/admin/bankAccountTypes/list',
            'be_route_path' => 'TabFinances\BankAccountTypesController@list',
            'be_route_name' => 'bankAccountsTypes-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 184,
            'controller_id' => 49,
            'action_type_id' => 5,
            'be_route_code' => '/admin/bankAccountTypes/card',
            'be_route_path' => 'TabFinances\BankAccountTypesController@card',
            'be_route_name' => 'bankAccountsTypes-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 185,
            'controller_id' => 49,
            'action_type_id' => 4,
            'be_route_code' => '/admin/bankAccountTypes/update',
            'be_route_path' => 'TabFinances\BankAccountTypesController@update',
            'be_route_name' => 'bankAccountsTypes-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 186,
            'controller_id' => 55,
            'action_type_id' => 6,
            'be_route_code' => '/admin/imageCategories/list',
            'be_route_path' => 'TabImages\ImageCategoriesController@list',
            'be_route_name' => 'imageCategories-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 187,
            'controller_id' => 55,
            'action_type_id' => 5,
            'be_route_code' => '/admin/imageCategories/card',
            'be_route_path' => 'TabImages\ImageCategoriesController@card',
            'be_route_name' => 'imageCategories-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 188,
            'controller_id' => 55,
            'action_type_id' => 4,
            'be_route_code' => '/admin/imageCategories/update',
            'be_route_path' => 'TabImages\ImageCategoriesController@update',
            'be_route_name' => 'imageCategories-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 189,
            'controller_id' => 56,
            'action_type_id' => 6,
            'be_route_code' => '/admin/company/cryptoExchangeAccounts/list',
            'be_route_path' => 'TabCrypto\CompaniesCryptoExchangeAccountsController@list',
            'be_route_name' => 'companies-crypto-exchange-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 190,
            'controller_id' => 56,
            'action_type_id' => 5,
            'be_route_code' => '/admin/company/cryptoExchangeAccounts/card',
            'be_route_path' => 'TabCrypto\CompaniesCryptoExchangeAccountsController@card',
            'be_route_name' => 'companies-crypto-exchange-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 191,
            'controller_id' => 56,
            'action_type_id' => 4,
            'be_route_code' => '/admin/company/cryptoExchangeAccounts/update',
            'be_route_path' => 'TabCrypto\CompaniesCryptoExchangeAccountsController@update',
            'be_route_name' => 'companies-crypto-exchange-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 192,
            'controller_id' => 57,
            'action_type_id' => 6,
            'be_route_code' => '/admin/contractor/cryptoExchangeAccounts/list',
            'be_route_path' => 'TabCrypto\ContractorsCryptoExchangeAccountsController@list',
            'be_route_name' => 'contractors-crypto-exchange-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 193,
            'controller_id' => 57,
            'action_type_id' => 5,
            'be_route_code' => '/admin/contractor/cryptoExchangeAccounts/card',
            'be_route_path' => 'TabCrypto\ContractorsCryptoExchangeAccountsController@card',
            'be_route_name' => 'contractors-crypto-exchange-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 194,
            'controller_id' => 57,
            'action_type_id' => 4,
            'be_route_code' => '/admin/contractor/cryptoExchangeAccounts/update',
            'be_route_path' => 'TabCrypto\ContractorsCryptoExchangeAccountsController@update',
            'be_route_name' => 'contractors-crypto-exchange-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 195,
            'controller_id' => 58,
            'action_type_id' => 6,
            'be_route_code' => '/admin/contractor/cryptoPlatformAccounts/list',
            'be_route_path' => 'TabCrypto\ContractorsCryptoPlatformAccountsController@list',
            'be_route_name' => 'contractors-crypto-platform-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 196,
            'controller_id' => 58,
            'action_type_id' => 5,
            'be_route_code' => '/admin/contractor/cryptoPlatformAccounts/card',
            'be_route_path' => 'TabCrypto\ContractorsCryptoPlatformAccountsController@card',
            'be_route_name' => 'contractors-crypto-platform-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 197,
            'controller_id' => 58,
            'action_type_id' => 4,
            'be_route_code' => '/admin/contractor/cryptoPlatformAccounts/update',
            'be_route_path' => 'TabCrypto\ContractorsCryptoPlatformAccountsController@update',
            'be_route_name' => 'contractors-crypto-platform-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 198,
            'controller_id' => 59,
            'action_type_id' => 6,
            'be_route_code' => '/admin/company/cryptoPlatformAccounts/list',
            'be_route_path' => 'TabCrypto\CompaniesCryptoPlatformAccountsController@list',
            'be_route_name' => 'companies-crypto-platform-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 199,
            'controller_id' => 59,
            'action_type_id' => 5,
            'be_route_code' => '/admin/company/cryptoPlatformAccounts/card',
            'be_route_path' => 'TabCrypto\CompaniesCryptoPlatformAccountsController@card',
            'be_route_name' => 'companies-crypto-platform-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 200,
            'controller_id' => 59,
            'action_type_id' => 4,
            'be_route_code' => '/admin/company/cryptoPlatformAccounts/update',
            'be_route_path' => 'TabCrypto\CompaniesCryptoPlatformAccountsController@update',
            'be_route_name' => 'companies-crypto-platform-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 201,
            'controller_id' => 60,
            'action_type_id' => 6,
            'be_route_code' => '/admin/images/list',
            'be_route_path' => 'TabImages\ImagesController@list',
            'be_route_name' => 'images-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 202,
            'controller_id' => 60,
            'action_type_id' => 5,
            'be_route_code' => '/admin/images/card',
            'be_route_path' => 'TabImages\ImagesController@card',
            'be_route_name' => 'images-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 203,
            'controller_id' => 60,
            'action_type_id' => 4,
            'be_route_code' => '/admin/images/update',
            'be_route_path' => 'TabImages\ImagesController@update',
            'be_route_name' => 'images-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 204,
            'controller_id' => 61,
            'action_type_id' => 6,
            'be_route_code' => '/admin/fileTypes/list',
            'be_route_path' => 'TabImages\FileTypesController@list',
            'be_route_name' => 'fileTypes-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 205,
            'controller_id' => 61,
            'action_type_id' => 5,
            'be_route_code' => '/admin/fileTypes/card',
            'be_route_path' => 'TabImages\FileTypesController@card',
            'be_route_name' => 'fileTypes-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 206,
            'controller_id' => 61,
            'action_type_id' => 4,
            'be_route_code' => '/admin/fileTypes/update',
            'be_route_path' => 'TabImages\FileTypesController@update',
            'be_route_name' => 'fileTypes-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 207,
            'controller_id' => 62,
            'action_type_id' => 6,
            'be_route_code' => '/admin/contractor/cryptoPlatformWallets/list',
            'be_route_path' => 'TabCrypto\ContractorsCryptoPlatformWalletsController@list',
            'be_route_name' => 'contractors-crypto-wallets-platform-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 208,
            'controller_id' => 62,
            'action_type_id' => 5,
            'be_route_code' => '/admin/contractor/cryptoPlatformWallets/card',
            'be_route_path' => 'TabCrypto\ContractorsCryptoPlatformWalletsController@card',
            'be_route_name' => 'contractors-crypto-wallets-platform-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 209,
            'controller_id' => 62,
            'action_type_id' => 4,
            'be_route_code' => '/admin/contractor/cryptoPlatformWallets/update',
            'be_route_path' => 'TabCrypto\ContractorsCryptoPlatformWalletsController@update',
            'be_route_name' => 'contractors-crypto-wallets-platform-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 210,
            'controller_id' => 110,
            'action_type_id' => 3,
            'be_route_code' => '/admin/action/delete',
            'be_route_path' => 'Controller@delete',
            'be_route_name' => 'action-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 211,
            'controller_id' => 70,
            'action_type_id' => 6,
            'be_route_code' => '/admin/physical/persons/list',
            'be_route_path' => 'BL\PhysicalPersonsController@list',
            'be_route_name' => 'physical-persons-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 212,
            'controller_id' => 70,
            'action_type_id' => 5,
            'be_route_code' => '/admin/physical/persons/card',
            'be_route_path' => 'BL\PhysicalPersonsController@card',
            'be_route_name' => 'physical-persons-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 213,
            'controller_id' => 70,
            'action_type_id' => 2,
            'be_route_code' => '/admin/physical/persons/insert',
            'be_route_path' => 'BL\PhysicalPersonsController@insert',
            'be_route_name' => 'physical-persons-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 214,
            'controller_id' => 70,
            'action_type_id' => 4,
            'be_route_code' => '/admin/physical/persons/update',
            'be_route_path' => 'BL\PhysicalPersonsController@update',
            'be_route_name' => 'physical-persons-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 215,
            'controller_id' => 70,
            'action_type_id' => 10,
            'be_route_code' => '/admin/physical/persons/deleteMark',
            'be_route_path' => 'BL\PhysicalPersonsController@deleteMark',
            'be_route_name' => 'physical-persons-deleteMark',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 216,
            'controller_id' => 71,
            'action_type_id' => 6,
            'be_route_code' => '/admin/physical/persons/info/list',
            'be_route_path' => 'BL\PhysicalPersonInfoController@list',
            'be_route_name' => 'physical-persons-info-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 217,
            'controller_id' => 71,
            'action_type_id' => 5,
            'be_route_code' => '/admin/physical/persons/info/card',
            'be_route_path' => 'BL\PhysicalPersonInfoController@card',
            'be_route_name' => 'physical-persons-info-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 218,
            'controller_id' => 71,
            'action_type_id' => 2,
            'be_route_code' => '/admin/physical/persons/info/insert',
            'be_route_path' => 'BL\PhysicalPersonInfoController@insert',
            'be_route_name' => 'physical-persons-info-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 219,
            'controller_id' => 71,
            'action_type_id' => 4,
            'be_route_code' => '/admin/physical/persons/info/update',
            'be_route_path' => 'BL\PhysicalPersonInfoController@update',
            'be_route_name' => 'physical-persons-info-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 220,
            'controller_id' => 71,
            'action_type_id' => 10,
            'be_route_code' => '/admin/physical/persons/info/deleteMark',
            'be_route_path' => 'BL\PhysicalPersonInfoController@deleteMark',
            'be_route_name' => 'physical-persons-info-deleteMark',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 223,
            'controller_id' => 72,
            'action_type_id' => 2,
            'be_route_code' => '/admin/bl/leasing/calc/insert',
            'be_route_path' => 'BL\BlLeasingCalculationsController@insert',
            'be_route_name' => 'bl-leasing-calc-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 224,
            'controller_id' => 72,
            'action_type_id' => 4,
            'be_route_code' => '/admin/bl/leasing/calc/update',
            'be_route_path' => 'BL\BlLeasingCalculationsController@update',
            'be_route_name' => 'bl-leasing-calc-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 231,
            'controller_id' => 74,
            'action_type_id' => 6,
            'be_route_code' => '/admin/bl/leasing/contracts/list',
            'be_route_path' => 'BL/BlLeasingContractsController@list',
            'be_route_name' => 'bl-leas-cont-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 232,
            'controller_id' => 74,
            'action_type_id' => 5,
            'be_route_code' => '/admin/bl/leasing/contracts/card',
            'be_route_path' => 'BL/BlLeasingContractsController@card',
            'be_route_name' => 'bl-leas-cont-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 233,
            'controller_id' => 74,
            'action_type_id' => 2,
            'be_route_code' => '/admin/bl/leasing/contracts/insert',
            'be_route_path' => 'BL/BlLeasingContractsController@insert',
            'be_route_name' => 'bl-leas-cont-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 234,
            'controller_id' => 74,
            'action_type_id' => 4,
            'be_route_code' => '/admin/bl/leasing/contracts/update',
            'be_route_path' => 'BL/BlLeasingContractsController@update',
            'be_route_name' => 'bl-leas-cont-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 235,
            'controller_id' => 74,
            'action_type_id' => 10,
            'be_route_code' => '/admin/bl/leasing/contracts/deleteMark',
            'be_route_path' => 'BL/BlLeasingContractsController@deleteMark',
            'be_route_name' => 'bl-leas-cont-deleteMark',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 236,
            'controller_id' => 75,
            'action_type_id' => 6,
            'be_route_code' => '/admin/contractor/contracts/list',
            'be_route_path' => 'TabCompanyContractor\ContractorContractsController@list',
            'be_route_name' => 'contractor-contracts-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 237,
            'controller_id' => 75,
            'action_type_id' => 5,
            'be_route_code' => '/admin/contractor/contracts/card',
            'be_route_path' => 'TabCompanyContractor\ContractorContractsController@card',
            'be_route_name' => 'contractor-contracts-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 238,
            'controller_id' => 75,
            'action_type_id' => 2,
            'be_route_code' => '/admin/contractor/contracts/insert',
            'be_route_path' => 'TabCompanyContractor\ContractorContractsController@insert',
            'be_route_name' => 'contractor-contracts-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 239,
            'controller_id' => 75,
            'action_type_id' => 4,
            'be_route_code' => '/admin/contractor/contracts/update',
            'be_route_path' => 'TabCompanyContractor\ContractorContractsController@update',
            'be_route_name' => 'contractor-contracts-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 240,
            'controller_id' => 75,
            'action_type_id' => 10,
            'be_route_code' => '/admin/contractor/contracts/deleteMark',
            'be_route_path' => 'TabCompanyContractor\ContractorContractsController@deleteMark',
            'be_route_name' => 'contractor-contracts-deleteMark',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 241,
            'controller_id' => 76,
            'action_type_id' => 6,
            'be_route_code' => '/admin/contract/specifications/list',
            'be_route_path' => 'BL\BlLeasingContractSpecificationsController@list',
            'be_route_name' => 'contract-specifications-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 242,
            'controller_id' => 76,
            'action_type_id' => 5,
            'be_route_code' => '/admin/contract/specifications/card',
            'be_route_path' => 'BL\BlLeasingContractSpecificationsController@card',
            'be_route_name' => 'contract-specifications-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 243,
            'controller_id' => 76,
            'action_type_id' => 2,
            'be_route_code' => '/admin/contract/specifications/insert',
            'be_route_path' => 'BL\BlLeasingContractSpecificationsController@insert',
            'be_route_name' => 'contract-specifications-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 244,
            'controller_id' => 76,
            'action_type_id' => 4,
            'be_route_code' => '/admin/contract/specifications/update',
            'be_route_path' => 'BL\BlLeasingContractSpecificationsController@update',
            'be_route_name' => 'contract-specifications-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 245,
            'controller_id' => 76,
            'action_type_id' => 10,
            'be_route_code' => '/admin/contract/specifications/deleteMark',
            'be_route_path' => 'BL\BlLeasingContractSpecificationsController@deleteMark',
            'be_route_name' => 'contract-specifications-deleteMark',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 246,
            'controller_id' => 77,
            'action_type_id' => 6,
            'be_route_code' => '/admin/specif/tab/leasing/objects/list',
            'be_route_path' => 'BL\BlLeasContSpecTabLeasObjectsController@list',
            'be_route_name' => 'specif-tab-leasing-objects-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 247,
            'controller_id' => 77,
            'action_type_id' => 5,
            'be_route_code' => '/admin/specif/tab/leasing/objects/card',
            'be_route_path' => 'BL\BlLeasContSpecTabLeasObjectsController@card',
            'be_route_name' => 'specif-tab-leasing-objects-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 248,
            'controller_id' => 77,
            'action_type_id' => 2,
            'be_route_code' => '/admin/specif/tab/leasing/objects/insert',
            'be_route_path' => 'BL\BlLeasContSpecTabLeasObjectsController@insert',
            'be_route_name' => 'specif-tab-leasing-objects-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 249,
            'controller_id' => 77,
            'action_type_id' => 4,
            'be_route_code' => '/admin/specif/tab/leasing/objects/update',
            'be_route_path' => 'BL\BlLeasContSpecTabLeasObjectsController@update',
            'be_route_name' => 'specif-tab-leasing-objects-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 250,
            'controller_id' => 77,
            'action_type_id' => 10,
            'be_route_code' => '/admin/specif/tab/leasing/objects/deleteMark',
            'be_route_path' => 'BL\BlLeasContSpecTabLeasObjectsController@deleteMark',
            'be_route_name' => 'specif-tab-leasing-objects-deleteMark',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 251,
            'controller_id' => 78,
            'action_type_id' => 6,
            'be_route_code' => '/admin/bl/schedules/list',
            'be_route_path' => 'BL\BlSchedulesController@list',
            'be_route_name' => 'bl-schedules-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 252,
            'controller_id' => 78,
            'action_type_id' => 5,
            'be_route_code' => '/admin/bl/schedules/card',
            'be_route_path' => 'BL\BlSchedulesController@card',
            'be_route_name' => 'bl-schedules-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 253,
            'controller_id' => 78,
            'action_type_id' => 2,
            'be_route_code' => '/admin/bl/schedules/insert',
            'be_route_path' => 'BL\BlSchedulesController@insert',
            'be_route_name' => 'bl-schedules-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 254,
            'controller_id' => 78,
            'action_type_id' => 4,
            'be_route_code' => '/admin/bl/schedules/update',
            'be_route_path' => 'BL\BlSchedulesController@update',
            'be_route_name' => 'bl-schedules-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 255,
            'controller_id' => 78,
            'action_type_id' => 10,
            'be_route_code' => '/admin/bl/schedules/deleteMark',
            'be_route_path' => 'BL\BlSchedulesController@deleteMark',
            'be_route_name' => 'bl-schedules-deleteMark',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 256,
            'controller_id' => 78,
            'action_type_id' => 6,
            'be_route_code' => '/admin/bl/schedule/tab/schedule/list',
            'be_route_path' => 'BL\BlSchedulesController@list',
            'be_route_name' => 'bl-schedules-tab-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 257,
            'controller_id' => 78,
            'action_type_id' => 5,
            'be_route_code' => '/admin/bl/schedule/tab/schedule/card',
            'be_route_path' => 'BL\BlSchedulesController@card',
            'be_route_name' => 'bl-schedules-tab-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 258,
            'controller_id' => 78,
            'action_type_id' => 2,
            'be_route_code' => '/admin/bl/schedule/tab/schedule/insert',
            'be_route_path' => 'BL\BlSchedulesController@insert',
            'be_route_name' => 'bl-schedules-tab-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 259,
            'controller_id' => 78,
            'action_type_id' => 4,
            'be_route_code' => '/admin/bl/schedule/tab/schedule/update',
            'be_route_path' => 'BL\BlSchedulesController@update',
            'be_route_name' => 'bl-schedules-tab-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 260,
            'controller_id' => 78,
            'action_type_id' => 10,
            'be_route_code' => '/admin/bl/schedule/tab/schedule/deleteMark',
            'be_route_path' => 'BL\BlSchedulesController@deleteMark',
            'be_route_name' => 'bl-schedules-tab-deleteMark',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 261,
            'controller_id' => 79,
            'action_type_id' => 6,
            'be_route_code' => '/admin/bl/schedule/articles/list',
            'be_route_path' => 'BL\BlScheduleArticlesController@list',
            'be_route_name' => 'bl-schedule-articles-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 262,
            'controller_id' => 79,
            'action_type_id' => 5,
            'be_route_code' => '/admin/bl/schedule/articles/card',
            'be_route_path' => 'BL\BlScheduleArticlesController@card',
            'be_route_name' => 'bl-schedule-articles-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 263,
            'controller_id' => 79,
            'action_type_id' => 2,
            'be_route_code' => '/admin/bl/schedule/articles/insert',
            'be_route_path' => 'BL\BlScheduleArticlesController@insert',
            'be_route_name' => 'bl-schedule-articles-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 264,
            'controller_id' => 79,
            'action_type_id' => 4,
            'be_route_code' => '/admin/bl/schedule/articles/update',
            'be_route_path' => 'BL\BlScheduleArticlesController@update',
            'be_route_name' => 'bl-schedule-articles-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 265,
            'controller_id' => 79,
            'action_type_id' => 10,
            'be_route_code' => '/admin/bl/schedule/articles/deleteMark',
            'be_route_path' => 'BL\BlScheduleArticlesController@deleteMark',
            'be_route_name' => 'bl-schedule-articles-deleteMark',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 266,
            'controller_id' => 80,
            'action_type_id' => 6,
            'be_route_code' => '/admin/blLeasing/object/group/list',
            'be_route_path' => 'BL\BlLeasingObjectGroupsController@list',
            'be_route_name' => 'blLeasing-object-group-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 267,
            'controller_id' => 80,
            'action_type_id' => 5,
            'be_route_code' => '/admin/blLeasing/object/group/card',
            'be_route_path' => 'BL\BlLeasingObjectGroupsController@card',
            'be_route_name' => 'blLeasing-object-group-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 268,
            'controller_id' => 80,
            'action_type_id' => 4,
            'be_route_code' => '/admin/blLeasing/object/group/update',
            'be_route_path' => 'BL\BlLeasingObjectGroupsController@update',
            'be_route_name' => 'blLeasing-object-group-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 269,
            'controller_id' => 80,
            'action_type_id' => 3,
            'be_route_code' => '/admin/blLeasing/object/group/delete',
            'be_route_path' => 'BL\BlLeasingObjectGroupsController@delete',
            'be_route_name' => 'blLeasing-object-group-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 270,
            'controller_id' => 80,
            'action_type_id' => 2,
            'be_route_code' => '/admin/blLeasing/object/group/insert',
            'be_route_path' => 'BL\BlLeasingObjectGroupsController@insert',
            'be_route_name' => 'blLeasing-object-group-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 271,
            'controller_id' => 80,
            'action_type_id' => 10,
            'be_route_code' => '/admin/blLeasing/object/group/deleteMark',
            'be_route_path' => 'BL\BlLeasingObjectGroupsController@deleteMark',
            'be_route_name' => 'blLeasing-object-group-deleteMark',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 272,
            'controller_id' => 81,
            'action_type_id' => 6,
            'be_route_code' => '/admin/feComponents/list',
            'be_route_path' => 'FeBeRoutes\FeComponentsController@list',
            'be_route_name' => 'fe-components-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 273,
            'controller_id' => 81,
            'action_type_id' => 5,
            'be_route_code' => '/admin/feComponents/card',
            'be_route_path' => 'FeBeRoutes\FeComponentsController@card',
            'be_route_name' => 'fe-components-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 274,
            'controller_id' => 81,
            'action_type_id' => 4,
            'be_route_code' => '/admin/feComponents/update',
            'be_route_path' => 'FeBeRoutes\FeComponentsController@update',
            'be_route_name' => 'fe-components-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 276,
            'controller_id' => 81,
            'action_type_id' => 2,
            'be_route_code' => '/admin/feComponents/insert',
            'be_route_path' => 'FeBeRoutes\FeComponentsController@insert',
            'be_route_name' => 'fe-components-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 278,
            'controller_id' => 82,
            'action_type_id' => 2,
            'be_route_code' => '/admin/FeRoute/steps/insert',
            'be_route_path' => 'FeBeRoutes\FeRouteStepsController@insert',
            'be_route_name' => 'fe-route-steps-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 279,
            'controller_id' => 82,
            'action_type_id' => 4,
            'be_route_code' => '/admin/FeRoute/steps/update',
            'be_route_path' => 'FeBeRoutes\FeRouteStepsController@update',
            'be_route_name' => 'fe-route-steps-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 282,
            'controller_id' => 82,
            'action_type_id' => 5,
            'be_route_code' => '/admin/FeRoute/steps/card',
            'be_route_path' => 'FeBeRoutes\FeRouteStepsController@card',
            'be_route_name' => 'fe-route-steps-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 283,
            'controller_id' => 82,
            'action_type_id' => 6,
            'be_route_code' => '/admin/FeRoute/steps/list',
            'be_route_path' => 'FeBeRoutes\FeRouteStepsController@list',
            'be_route_name' => 'fe-route-steps-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 284,
            'controller_id' => 83,
            'action_type_id' => 2,
            'be_route_code' => '/admin/FeRoute/objects/insert',
            'be_route_path' => 'FeBeObjects\FeRouteObjectsController@insert',
            'be_route_name' => 'fe-route-object-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 285,
            'controller_id' => 83,
            'action_type_id' => 4,
            'be_route_code' => '/admin/FeRoute/objects/update',
            'be_route_path' => 'FeBeObjects\FeRouteObjectsController@update',
            'be_route_name' => 'fe-route-object-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 288,
            'controller_id' => 83,
            'action_type_id' => 5,
            'be_route_code' => '/admin/FeRoute/objects/card',
            'be_route_path' => 'FeBeObjects\FeRouteObjectsController@card',
            'be_route_name' => 'fe-route-object-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 289,
            'controller_id' => 83,
            'action_type_id' => 6,
            'be_route_code' => '/admin/FeRoute/objects/list',
            'be_route_path' => 'FeBeObjects\FeRouteObjectsController@list',
            'be_route_name' => 'fe-route-object-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 290,
            'controller_id' => 84,
            'action_type_id' => 2,
            'be_route_code' => '/admin/FeRoute/step/objects/insert',
            'be_route_path' => 'FeBeObjects\FeRouteStepObjectsController@insert',
            'be_route_name' => 'fe-route-step-object-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 291,
            'controller_id' => 84,
            'action_type_id' => 4,
            'be_route_code' => '/admin/FeRoute/step/objects/update',
            'be_route_path' => 'FeBeObjects\FeRouteStepObjectsController@update',
            'be_route_name' => 'fe-route-step-object-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 294,
            'controller_id' => 84,
            'action_type_id' => 5,
            'be_route_code' => '/admin/FeRoute/step/objects/card',
            'be_route_path' => 'FeBeObjects\FeRouteStepObjectsController@card',
            'be_route_name' => 'fe-route-step-object-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 295,
            'controller_id' => 84,
            'action_type_id' => 6,
            'be_route_code' => '/admin/FeRoute/step/objects/list',
            'be_route_path' => 'FeBeObjects\FeRouteStepObjectsController@list',
            'be_route_name' => 'fe-route-step-object-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 296,
            'controller_id' => 85,
            'action_type_id' => 2,
            'be_route_code' => '/admin/BeRoutes/insert',
            'be_route_path' => 'FeBeRoutes\BeRoutesController@insert',
            'be_route_name' => 'be-route-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 297,
            'controller_id' => 85,
            'action_type_id' => 4,
            'be_route_code' => '/admin/BeRoutes/update',
            'be_route_path' => 'FeBeRoutes\BeRoutesController@update',
            'be_route_name' => 'be-route-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 300,
            'controller_id' => 85,
            'action_type_id' => 5,
            'be_route_code' => '/admin/BeRoutes/card',
            'be_route_path' => 'FeBeRoutes\BeRoutesController@card',
            'be_route_name' => 'be-route-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 301,
            'controller_id' => 85,
            'action_type_id' => 6,
            'be_route_code' => '/admin/BeRoutes/list',
            'be_route_path' => 'FeBeRoutes\BeRoutesController@list',
            'be_route_name' => 'be-route-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 302,
            'controller_id' => 86,
            'action_type_id' => 2,
            'be_route_code' => '/admin/FeRoute/urls/insert',
            'be_route_path' => 'FeBeRoutes\FeRouteUrlsController@insert',
            'be_route_name' => 'fe-route-url-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 303,
            'controller_id' => 86,
            'action_type_id' => 4,
            'be_route_code' => '/admin/FeRoute/urls/update',
            'be_route_path' => 'FeBeRoutes\FeRouteUrlsController@update',
            'be_route_name' => 'fe-route-url-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 306,
            'controller_id' => 86,
            'action_type_id' => 5,
            'be_route_code' => '/admin/FeRoute/urls/card',
            'be_route_path' => 'FeBeRoutes\FeRouteUrlsController@card',
            'be_route_name' => 'fe-route-url-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 307,
            'controller_id' => 86,
            'action_type_id' => 6,
            'be_route_code' => '/admin/FeRoute/urls/list',
            'be_route_path' => 'FeBeRoutes\FeRouteUrlsController@list',
            'be_route_name' => 'fe-route-url-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 308,
            'controller_id' => 87,
            'action_type_id' => 2,
            'be_route_code' => '/admin/FeRoutes/insert',
            'be_route_path' => 'FeBeRoutes\FeRoutesController@insert',
            'be_route_name' => 'fe-routes-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 309,
            'controller_id' => 87,
            'action_type_id' => 4,
            'be_route_code' => '/admin/FeRoutes/update',
            'be_route_path' => 'FeBeRoutes\FeRoutesController@update',
            'be_route_name' => 'fe-routes-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 312,
            'controller_id' => 87,
            'action_type_id' => 5,
            'be_route_code' => '/admin/FeRoutes/card',
            'be_route_path' => 'FeBeRoutes\FeRoutesController@card',
            'be_route_name' => 'fe-routes-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 313,
            'controller_id' => 87,
            'action_type_id' => 6,
            'be_route_code' => '/admin/FeRoutes/list',
            'be_route_path' => 'FeBeRoutes\FeRoutesController@list',
            'be_route_name' => 'fe-routes-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 314,
            'controller_id' => 88,
            'action_type_id' => 2,
            'be_route_code' => '/admin/FeUrls/insert',
            'be_route_path' => 'FeBeRoutes\FeUrlsController@insert',
            'be_route_name' => 'fe-urls-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 315,
            'controller_id' => 88,
            'action_type_id' => 4,
            'be_route_code' => '/admin/FeUrls/update',
            'be_route_path' => 'FeBeRoutes\FeUrlsController@update',
            'be_route_name' => 'fe-urls-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 318,
            'controller_id' => 88,
            'action_type_id' => 5,
            'be_route_code' => '/admin/FeUrls/card',
            'be_route_path' => 'FeBeRoutes\FeUrlsController@card',
            'be_route_name' => 'fe-urls-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 319,
            'controller_id' => 88,
            'action_type_id' => 6,
            'be_route_code' => '/admin/FeUrls/list',
            'be_route_path' => 'FeBeRoutes\FeUrlsController@list',
            'be_route_name' => 'fe-urls-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 320,
            'controller_id' => 89,
            'action_type_id' => 6,
            'be_route_code' => '/admin/blAttached/document/kind/list',
            'be_route_path' => 'BL\BlAttachedDocumentKindsController@list',
            'be_route_name' => 'blAttached-document-kind-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 321,
            'controller_id' => 89,
            'action_type_id' => 5,
            'be_route_code' => '/admin/blAttached/document/kind/card',
            'be_route_path' => 'BL\BlAttachedDocumentKindsController@card',
            'be_route_name' => 'blAttached-document-kind-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 322,
            'controller_id' => 89,
            'action_type_id' => 4,
            'be_route_code' => '/admin/blAttached/document/kind/update',
            'be_route_path' => 'BL\BlAttachedDocumentKindsController@update',
            'be_route_name' => 'blAttached-document-kind-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 323,
            'controller_id' => 89,
            'action_type_id' => 3,
            'be_route_code' => '/admin/blAttached/document/kind/delete',
            'be_route_path' => 'BL\BlAttachedDocumentKindsController@delete',
            'be_route_name' => 'blAttached-document-kind-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 324,
            'controller_id' => 89,
            'action_type_id' => 2,
            'be_route_code' => '/admin/blAttached/document/kind/insert',
            'be_route_path' => 'BL\BlAttachedDocumentKindsController@insert',
            'be_route_name' => 'blAttached-document-kind-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 325,
            'controller_id' => 89,
            'action_type_id' => 10,
            'be_route_code' => '/admin/blAttached/document/kind/deleteMark',
            'be_route_path' => 'BL\BlAttachedDocumentKindsController@deleteMark',
            'be_route_name' => 'blAttached-document-kind-deleteMark',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 326,
            'controller_id' => 90,
            'action_type_id' => 6,
            'be_route_code' => '/admin/blFile/type/set/list',
            'be_route_path' => 'BL\BlFileTypeSetsController@list',
            'be_route_name' => 'blFile-type-set-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 327,
            'controller_id' => 90,
            'action_type_id' => 5,
            'be_route_code' => '/admin/blFile/type/set/card',
            'be_route_path' => 'BL\BlFileTypeSetsController@card',
            'be_route_name' => 'blFile-type-set-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 328,
            'controller_id' => 90,
            'action_type_id' => 4,
            'be_route_code' => '/admin/blFile/type/set/update',
            'be_route_path' => 'BL\BlFileTypeSetsController@update',
            'be_route_name' => 'blFile-type-set-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 329,
            'controller_id' => 90,
            'action_type_id' => 3,
            'be_route_code' => '/admin/blFile/type/set/delete',
            'be_route_path' => 'BL\BlFileTypeSetsController@delete',
            'be_route_name' => 'blFile-type-set-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 330,
            'controller_id' => 90,
            'action_type_id' => 2,
            'be_route_code' => '/admin/blFile/type/set/insert',
            'be_route_path' => 'BL\BlFileTypeSetsController@insert',
            'be_route_name' => 'blFile-type-set-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 331,
            'controller_id' => 90,
            'action_type_id' => 10,
            'be_route_code' => '/admin/blFile/type/set/deleteMark',
            'be_route_path' => 'BL\BlFileTypeSetsController@deleteMark',
            'be_route_name' => 'blFile-type-set-deleteMark',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 332,
            'controller_id' => 91,
            'action_type_id' => 6,
            'be_route_code' => '/admin/blFile/type/set/tab/file/type/list',
            'be_route_path' => 'BL\BlFileTypeSetTabFileTypesController@list',
            'be_route_name' => 'blFile-type-set-tab-file-type-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 333,
            'controller_id' => 91,
            'action_type_id' => 5,
            'be_route_code' => '/admin/blFile/type/set/tab/file/type/card',
            'be_route_path' => 'BL\BlFileTypeSetTabFileTypesController@card',
            'be_route_name' => 'blFile-type-set-tab-file-type-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 334,
            'controller_id' => 91,
            'action_type_id' => 4,
            'be_route_code' => '/admin/blFile/type/set/tab/file/type/update',
            'be_route_path' => 'BL\BlFileTypeSetTabFileTypesController@update',
            'be_route_name' => 'blFile-type-set-tab-file-type-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 335,
            'controller_id' => 91,
            'action_type_id' => 3,
            'be_route_code' => '/admin/blFile/type/set/tab/file/type/delete',
            'be_route_path' => 'BL\BlFileTypeSetTabFileTypesController@delete',
            'be_route_name' => 'blFile-type-set-tab-file-type-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 336,
            'controller_id' => 91,
            'action_type_id' => 2,
            'be_route_code' => '/admin/blFile/type/set/tab/file/type/insert',
            'be_route_path' => 'BL\BlFileTypeSetTabFileTypesController@insert',
            'be_route_name' => 'blFile-type-set-tab-file-type-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 337,
            'controller_id' => 91,
            'action_type_id' => 10,
            'be_route_code' => '/admin/blFile/type/set/tab/file/type/deleteMark',
            'be_route_path' => 'BL\BlFileTypeSetTabFileTypesController@deleteMark',
            'be_route_name' => 'blFile-type-set-tab-file-type-deleteMark',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 338,
            'controller_id' => 92,
            'action_type_id' => 6,
            'be_route_code' => '/admin/blLeasing/object/brand/list',
            'be_route_path' => 'BL\BlLeasingObjectBrandsController@list',
            'be_route_name' => 'blLeasing-object-brand-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 339,
            'controller_id' => 92,
            'action_type_id' => 5,
            'be_route_code' => '/admin/blLeasing/object/brand/card',
            'be_route_path' => 'BL\BlLeasingObjectBrandsController@card',
            'be_route_name' => 'blLeasing-object-brand-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 340,
            'controller_id' => 92,
            'action_type_id' => 4,
            'be_route_code' => '/admin/blLeasing/object/brand/update',
            'be_route_path' => 'BL\BlLeasingObjectBrandsController@update',
            'be_route_name' => 'blLeasing-object-brand-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 341,
            'controller_id' => 92,
            'action_type_id' => 3,
            'be_route_code' => '/admin/blLeasing/object/brand/delete',
            'be_route_path' => 'BL\BlLeasingObjectBrandsController@delete',
            'be_route_name' => 'blLeasing-object-brand-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 342,
            'controller_id' => 92,
            'action_type_id' => 2,
            'be_route_code' => '/admin/blLeasing/object/brand/insert',
            'be_route_path' => 'BL\BlLeasingObjectBrandsController@insert',
            'be_route_name' => 'blLeasing-object-brand-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 343,
            'controller_id' => 92,
            'action_type_id' => 10,
            'be_route_code' => '/admin/blLeasing/object/brand/deleteMark',
            'be_route_path' => 'BL\BlLeasingObjectBrandsController@deleteMark',
            'be_route_name' => 'blLeasing-object-brand-deleteMark',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 344,
            'controller_id' => 93,
            'action_type_id' => 6,
            'be_route_code' => '/admin/blLeasing/object/model/list',
            'be_route_path' => 'BL\BlLeasingObjectModelsController@list',
            'be_route_name' => 'blLeasing-object-model-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 345,
            'controller_id' => 93,
            'action_type_id' => 5,
            'be_route_code' => '/admin/blLeasing/object/model/card',
            'be_route_path' => 'BL\BlLeasingObjectModelsController@card',
            'be_route_name' => 'blLeasing-object-model-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 346,
            'controller_id' => 93,
            'action_type_id' => 4,
            'be_route_code' => '/admin/blLeasing/object/model/update',
            'be_route_path' => 'BL\BlLeasingObjectModelsController@update',
            'be_route_name' => 'blLeasing-object-model-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 347,
            'controller_id' => 93,
            'action_type_id' => 3,
            'be_route_code' => '/admin/blLeasing/object/model/delete',
            'be_route_path' => 'BL\BlLeasingObjectModelsController@delete',
            'be_route_name' => 'blLeasing-object-model-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 348,
            'controller_id' => 93,
            'action_type_id' => 2,
            'be_route_code' => '/admin/blLeasing/object/model/insert',
            'be_route_path' => 'BL\BlLeasingObjectModelsController@insert',
            'be_route_name' => 'blLeasing-object-model-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 349,
            'controller_id' => 93,
            'action_type_id' => 10,
            'be_route_code' => '/admin/blLeasing/object/model/deleteMark',
            'be_route_path' => 'BL\BlLeasingObjectModelsController@deleteMark',
            'be_route_name' => 'blLeasing-object-model-deleteMark',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 350,
            'controller_id' => 94,
            'action_type_id' => 6,
            'be_route_code' => '/admin/blLeasing/object/type/list',
            'be_route_path' => 'BL\BlLeasingObjectTypesController@list',
            'be_route_name' => 'blLeasing-object-type-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 351,
            'controller_id' => 94,
            'action_type_id' => 5,
            'be_route_code' => '/admin/blLeasing/object/type/card',
            'be_route_path' => 'BL\BlLeasingObjectTypesController@card',
            'be_route_name' => 'blLeasing-object-type-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 352,
            'controller_id' => 94,
            'action_type_id' => 4,
            'be_route_code' => '/admin/blLeasing/object/type/update',
            'be_route_path' => 'BL\BlLeasingObjectTypesController@update',
            'be_route_name' => 'blLeasing-object-type-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 353,
            'controller_id' => 94,
            'action_type_id' => 3,
            'be_route_code' => '/admin/blLeasing/object/type/delete',
            'be_route_path' => 'BL\BlLeasingObjectTypesController@delete',
            'be_route_name' => 'blLeasing-object-type-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 354,
            'controller_id' => 94,
            'action_type_id' => 2,
            'be_route_code' => '/admin/blLeasing/object/type/insert',
            'be_route_path' => 'BL\BlLeasingObjectTypesController@insert',
            'be_route_name' => 'blLeasing-object-type-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 355,
            'controller_id' => 94,
            'action_type_id' => 10,
            'be_route_code' => '/admin/blLeasing/object/type/deleteMark',
            'be_route_path' => 'BL\BlLeasingObjectTypesController@deleteMark',
            'be_route_name' => 'blLeasing-object-type-deleteMark',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 356,
            'controller_id' => 95,
            'action_type_id' => 6,
            'be_route_code' => '/admin/blLegal/form/list',
            'be_route_path' => 'BL\BlLegalFormsController@list',
            'be_route_name' => 'blLegal-form-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 357,
            'controller_id' => 95,
            'action_type_id' => 5,
            'be_route_code' => '/admin/blLegal/form/card',
            'be_route_path' => 'BL\BlLegalFormsController@card',
            'be_route_name' => 'blLegal-form-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 358,
            'controller_id' => 95,
            'action_type_id' => 4,
            'be_route_code' => '/admin/blLegal/form/update',
            'be_route_path' => 'BL\BlLegalFormsController@update',
            'be_route_name' => 'blLegal-form-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 359,
            'controller_id' => 95,
            'action_type_id' => 3,
            'be_route_code' => '/admin/blLegal/form/delete',
            'be_route_path' => 'BL\BlLegalFormsController@delete',
            'be_route_name' => 'blLegal-form-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 360,
            'controller_id' => 95,
            'action_type_id' => 2,
            'be_route_code' => '/admin/blLegal/form/insert',
            'be_route_path' => 'BL\BlLegalFormsController@insert',
            'be_route_name' => 'blLegal-form-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 361,
            'controller_id' => 95,
            'action_type_id' => 10,
            'be_route_code' => '/admin/blLegal/form/deleteMark',
            'be_route_path' => 'BL\BlLegalFormsController@deleteMark',
            'be_route_name' => 'blLegal-form-deleteMark',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 362,
            'controller_id' => 96,
            'action_type_id' => 6,
            'be_route_code' => '/admin/blRequired/document/list',
            'be_route_path' => 'BL\BlRequiredDocumentsController@list',
            'be_route_name' => 'blRequired-document-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 363,
            'controller_id' => 96,
            'action_type_id' => 5,
            'be_route_code' => '/admin/blRequired/document/card',
            'be_route_path' => 'BL\BlRequiredDocumentsController@card',
            'be_route_name' => 'blRequired-document-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 364,
            'controller_id' => 96,
            'action_type_id' => 4,
            'be_route_code' => '/admin/blRequired/document/update',
            'be_route_path' => 'BL\BlRequiredDocumentsController@update',
            'be_route_name' => 'blRequired-document-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 365,
            'controller_id' => 96,
            'action_type_id' => 3,
            'be_route_code' => '/admin/blRequired/document/delete',
            'be_route_path' => 'BL\BlRequiredDocumentsController@delete',
            'be_route_name' => 'blRequired-document-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 366,
            'controller_id' => 96,
            'action_type_id' => 2,
            'be_route_code' => '/admin/blRequired/document/insert',
            'be_route_path' => 'BL\BlRequiredDocumentsController@insert',
            'be_route_name' => 'blRequired-document-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 367,
            'controller_id' => 96,
            'action_type_id' => 10,
            'be_route_code' => '/admin/blRequired/document/deleteMark',
            'be_route_path' => 'BL\BlRequiredDocumentsController@deleteMark',
            'be_route_name' => 'blRequired-document-deleteMark',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 368,
            'controller_id' => 97,
            'action_type_id' => 6,
            'be_route_code' => '/admin/blStatus/list',
            'be_route_path' => 'BL\BlStatusesController@list',
            'be_route_name' => 'blStatus-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 369,
            'controller_id' => 97,
            'action_type_id' => 5,
            'be_route_code' => '/admin/blStatus/card',
            'be_route_path' => 'BL\BlStatusesController@card',
            'be_route_name' => 'blStatus-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 370,
            'controller_id' => 97,
            'action_type_id' => 4,
            'be_route_code' => '/admin/blStatus/update',
            'be_route_path' => 'BL\BlStatusesController@update',
            'be_route_name' => 'blStatus-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 371,
            'controller_id' => 97,
            'action_type_id' => 3,
            'be_route_code' => '/admin/blStatus/delete',
            'be_route_path' => 'BL\BlStatusesController@delete',
            'be_route_name' => 'blStatus-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 372,
            'controller_id' => 97,
            'action_type_id' => 2,
            'be_route_code' => '/admin/blStatus/insert',
            'be_route_path' => 'BL\BlStatusesController@insert',
            'be_route_name' => 'blStatus-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 373,
            'controller_id' => 97,
            'action_type_id' => 10,
            'be_route_code' => '/admin/blStatus/deleteMark',
            'be_route_path' => 'BL\BlStatusesController@deleteMark',
            'be_route_name' => 'blStatus-deleteMark',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 374,
            'controller_id' => 98,
            'action_type_id' => 6,
            'be_route_code' => '/admin/dbArea/file/list',
            'be_route_path' => 'AttachedFiles\DbAreaFilesController@list',
            'be_route_name' => 'dbArea-file-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 375,
            'controller_id' => 98,
            'action_type_id' => 5,
            'be_route_code' => '/admin/dbArea/file/card',
            'be_route_path' => 'AttachedFiles\DbAreaFilesController@card',
            'be_route_name' => 'dbArea-file-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 376,
            'controller_id' => 98,
            'action_type_id' => 4,
            'be_route_code' => '/admin/dbArea/file/update',
            'be_route_path' => 'AttachedFiles\DbAreaFilesController@update',
            'be_route_name' => 'dbArea-file-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 377,
            'controller_id' => 98,
            'action_type_id' => 3,
            'be_route_code' => '/admin/dbArea/file/delete',
            'be_route_path' => 'AttachedFiles\DbAreaFilesController@delete',
            'be_route_name' => 'dbArea-file-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 378,
            'controller_id' => 98,
            'action_type_id' => 2,
            'be_route_code' => '/admin/dbArea/file/insert',
            'be_route_path' => 'AttachedFiles\DbAreaFilesController@insert',
            'be_route_name' => 'dbArea-file-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 379,
            'controller_id' => 98,
            'action_type_id' => 10,
            'be_route_code' => '/admin/dbArea/file/deleteMark',
            'be_route_path' => 'AttachedFiles\DbAreaFilesController@deleteMark',
            'be_route_name' => 'dbArea-file-deleteMark',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 380,
            'controller_id' => 99,
            'action_type_id' => 6,
            'be_route_code' => '/admin/rate/vat/list',
            'be_route_path' => 'RateVATController@list',
            'be_route_name' => 'rate-vat-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 381,
            'controller_id' => 99,
            'action_type_id' => 5,
            'be_route_code' => '/admin/rate/vat/card',
            'be_route_path' => 'RateVATController@card',
            'be_route_name' => 'rate-vat-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 382,
            'controller_id' => 99,
            'action_type_id' => 4,
            'be_route_code' => '/admin/rate/vat/update',
            'be_route_path' => 'RateVATController@update',
            'be_route_name' => 'rate-vat-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 383,
            'controller_id' => 99,
            'action_type_id' => 3,
            'be_route_code' => '/admin/rate/vat/delete',
            'be_route_path' => 'RateVATController@delete',
            'be_route_name' => 'rate-vat-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 384,
            'controller_id' => 99,
            'action_type_id' => 2,
            'be_route_code' => '/admin/rate/vat/insert',
            'be_route_path' => 'RateVATController@insert',
            'be_route_name' => 'rate-vat-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 385,
            'controller_id' => 99,
            'action_type_id' => 10,
            'be_route_code' => '/admin/rate/vat/deleteMark',
            'be_route_path' => 'RateVATController@deleteMark',
            'be_route_name' => 'rate-vat-deleteMark',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 386,
            'controller_id' => 100,
            'action_type_id' => 6,
            'be_route_code' => '/admin/stored/file/list',
            'be_route_path' => 'StoredFilesController@list',
            'be_route_name' => 'stored-file-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 387,
            'controller_id' => 100,
            'action_type_id' => 5,
            'be_route_code' => '/admin/stored/file/card',
            'be_route_path' => 'StoredFilesController@card',
            'be_route_name' => 'stored-file-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 388,
            'controller_id' => 100,
            'action_type_id' => 4,
            'be_route_code' => '/admin/stored/file/update',
            'be_route_path' => 'StoredFilesController@update',
            'be_route_name' => 'stored-file-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 389,
            'controller_id' => 100,
            'action_type_id' => 3,
            'be_route_code' => '/admin/stored/file/delete',
            'be_route_path' => 'StoredFilesController@delete',
            'be_route_name' => 'stored-file-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 390,
            'controller_id' => 100,
            'action_type_id' => 2,
            'be_route_code' => '/admin/stored/file/insert',
            'be_route_path' => 'StoredFilesController@insert',
            'be_route_name' => 'stored-file-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 391,
            'controller_id' => 100,
            'action_type_id' => 10,
            'be_route_code' => '/admin/stored/file/deleteMark',
            'be_route_path' => 'StoredFilesController@deleteMark',
            'be_route_name' => 'stored-file-deleteMark',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 392,
            'controller_id' => 101,
            'action_type_id' => 6,
            'be_route_code' => '/admin/one/additional/detail/list',
            'be_route_path' => 'TabONE\OneAdditionalDetailsController@list',
            'be_route_name' => 'one-additional-detail-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 393,
            'controller_id' => 101,
            'action_type_id' => 5,
            'be_route_code' => '/admin/one/additional/detail/card',
            'be_route_path' => 'TabONE\OneAdditionalDetailsController@card',
            'be_route_name' => 'one-additional-detail-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 394,
            'controller_id' => 101,
            'action_type_id' => 4,
            'be_route_code' => '/admin/one/additional/detail/update',
            'be_route_path' => 'TabONE\OneAdditionalDetailsController@update',
            'be_route_name' => 'one-additional-detail-update',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 395,
            'controller_id' => 101,
            'action_type_id' => 3,
            'be_route_code' => '/admin/one/additional/detail/delete',
            'be_route_path' => 'TabONE\OneAdditionalDetailsController@delete',
            'be_route_name' => 'one-additional-detail-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 396,
            'controller_id' => 101,
            'action_type_id' => 2,
            'be_route_code' => '/admin/one/additional/detail/insert',
            'be_route_path' => 'TabONE\OneAdditionalDetailsController@insert',
            'be_route_name' => 'one-additional-detail-insert',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 397,
            'controller_id' => 101,
            'action_type_id' => 10,
            'be_route_code' => '/admin/one/additional/detail/deleteMark',
            'be_route_path' => 'TabONE\OneAdditionalDetailsController@deleteMark',
            'be_route_name' => 'one-additional-detail-deleteMark',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 398,
            'controller_id' => 6,
            'action_type_id' => 5,
            'be_route_code' => '/admin/user/card',
            'be_route_path' => 'Admin\ConsumersController@card',
            'be_route_name' => 'admin-user-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 399,
            'controller_id' => 6,
            'action_type_id' => 5,
            'be_route_code' => '/admin/user/card/dev',
            'be_route_path' => 'Admin\DevConsumersController@card',
            'be_route_name' => 'admin-user-card-dev',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 400,
            'controller_id' => 82,
            'action_type_id' => 7,
            'be_route_code' => '/admin/FeRoute/steps/index',
            'be_route_path' => 'FeBeRoutes\FeRouteStepsController@index',
            'be_route_name' => 'fe-route-steps-index',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 6:36:50',
            'updated_at' => '2019-04-05 6:36:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 401,
            'controller_id' => 88,
            'action_type_id' => 7,
            'be_route_code' => '/admin/FeUrls/index',
            'be_route_path' => 'FeBeRoutes\FeUrlsController@index',
            'be_route_name' => 'fe-urls-index',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 16:52:50',
            'updated_at' => '2019-04-23 16:52:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 403,
            'controller_id' => 106,
            'action_type_id' => 6,
            'be_route_code' => '/admin/bl/contractor/requests/list',
            'be_route_path' => 'BL\BlContractorRequestsController@list',
            'be_route_name' => 'bl-contractor-requests-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 16:52:50',
            'updated_at' => '2019-04-23 16:52:50',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 404,
            'controller_id' => 111,
            'action_type_id' => 6,
            'be_route_code' => '/admin/bl/report/leasing/contract/balance/list',
            'be_route_path' => 'BL\BlReportLeasingContractBalanceController@list',
            'be_route_name' => 'bl-leasing-contract-balance-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-04 16:52:50',
            'updated_at' => '2019-06-04 16:52:51',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 405,
            'controller_id' => 112,
            'action_type_id' => 6,
            'be_route_code' => '/admin/bl/insurance/policy/contracts/list',
            'be_route_path' => 'BL\BlInsurancePolicyContractsController@list',
            'be_route_name' => 'bl-insurance-policy-contracts-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-04 16:52:51',
            'updated_at' => '2019-06-04 16:52:52',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 406,
            'controller_id' => 111,
            'action_type_id' => 5,
            'be_route_code' => '/admin/bl/report/leasing/contract/balance/card',
            'be_route_path' => 'BL\BlReportLeasingContractBalanceController@card',
            'be_route_name' => 'bl-leasing-contract-balance-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-04 16:52:52',
            'updated_at' => '2019-06-04 16:52:53',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 407,
            'controller_id' => 113,
            'action_type_id' => 6,
            'be_route_code' => '/admin/notification/list',
            'be_route_path' => 'TabNotifications\NotificationsController@list',
            'be_route_name' => 'notification-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-04 16:52:53',
            'updated_at' => '2019-06-04 16:52:54',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 408,
            'controller_id' => 107,
            'action_type_id' => 6,
            'be_route_code' => '/admin/bl/contractor/request/types/list',
            'be_route_path' => 'BL\BlContractorRequestTypesController@list',
            'be_route_name' => 'bl-contractor-request-types-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:00',
            'updated_at' => '2019-06-07 12:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 409,
            'controller_id' => 106,
            'action_type_id' => 5,
            'be_route_code' => '/admin/bl/contractor/requests/card',
            'be_route_path' => 'BL\BlContractorRequestsController@card',
            'be_route_name' => 'bl-contractor-requests-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:00',
            'updated_at' => '2019-06-07 12:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 410,
            'controller_id' => 114,
            'action_type_id' => 6,
            'be_route_code' => '/admin/bl/administrators/list',
            'be_route_path' => 'BL\BlAdministratorsController@list',
            'be_route_name' => 'bl-administrators-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:00',
            'updated_at' => '2019-06-07 12:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 411,
            'controller_id' => 114,
            'action_type_id' => 5,
            'be_route_code' => '/admin/bl/administrators/card',
            'be_route_path' => 'BL\BlAdministratorsController@card',
            'be_route_name' => 'bl-administrators-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:00',
            'updated_at' => '2019-06-07 12:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 412,
            'controller_id' => 107,
            'action_type_id' => 5,
            'be_route_code' => '/admin/bl/contractor/request/types/card',
            'be_route_path' => 'BL\BlContractorRequestTypesController@card',
            'be_route_name' => 'bl-contractor-request-types-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:00',
            'updated_at' => '2019-06-07 12:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 413,
            'controller_id' => 115,
            'action_type_id' => 7,
            'be_route_code' => '/admin/FaqDev/index',
            'be_route_path' => 'Help\FaqController@index',
            'be_route_name' => 'faq-test',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:01',
            'updated_at' => '2019-06-07 12:00:01',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 414,
            'controller_id' => 106,
            'action_type_id' => 8,
            'be_route_code' => '/admin/bl/contractor/requests/write',
            'be_route_path' => 'BL\BlContractorRequestsController@write',
            'be_route_name' => 'bl-contractor-requests-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-12 12:00:01',
            'updated_at' => '2019-06-12 12:00:01',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 415,
            'controller_id' => 107,
            'action_type_id' => 8,
            'be_route_code' => '/admin/bl/contractor/request/types/write',
            'be_route_path' => 'BL\BlContractorRequestTypesController@write',
            'be_route_name' => 'bl-contractor-request-types-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-12 12:00:02',
            'updated_at' => '2019-06-12 12:00:02',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 416,
            'controller_id' => 26,
            'action_type_id' => 6,
            'be_route_code' => '/admin/action/logs/list',
            'be_route_path' => 'Admin\ActionLogsController@list',
            'be_route_name' => 'admin-action-logs-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:02',
            'updated_at' => '2019-06-18 12:00:02',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 417,
            'controller_id' => 26,
            'action_type_id' => 5,
            'be_route_code' => '/admin/action/logs/card',
            'be_route_path' => 'Admin\ActionLogsController@card',
            'be_route_name' => 'admin-action-logs-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:03',
            'updated_at' => '2019-06-18 12:00:03',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 418,
            'controller_id' => 115,
            'action_type_id' => 5,
            'be_route_code' => '/admin/FaqDev/card',
            'be_route_path' => 'Help\FaqController@card',
            'be_route_name' => 'admin-FaqDev-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:04',
            'updated_at' => '2019-06-18 12:00:04',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 419,
            'controller_id' => 12,
            'action_type_id' => 8,
            'be_route_code' => '/admin/dbtypes/write',
            'be_route_path' => 'TabSystem\DbTypesController@write',
            'be_route_name' => 'admin-dbtypes-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 12:00:04',
            'updated_at' => '2019-06-19 12:00:04',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 420,
            'controller_id' => 9,
            'action_type_id' => 8,
            'be_route_code' => '/admin/serverdbs/write',
            'be_route_path' => 'TabServerDbArea\ServersDbController@write',
            'be_route_name' => 'admin-server-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 12:00:04',
            'updated_at' => '2019-06-19 12:00:04',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 421,
            'controller_id' => 11,
            'action_type_id' => 8,
            'be_route_code' => '/admin/db/write',
            'be_route_path' => 'TabServerDbArea\DBasesController@write',
            'be_route_name' => 'admin-db-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 12:00:04',
            'updated_at' => '2019-06-19 12:00:04',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 422,
            'controller_id' => 17,
            'action_type_id' => 8,
            'be_route_code' => '/admin/db/area/write',
            'be_route_path' => 'TabServerDbArea\DbAreasController@write',
            'be_route_name' => 'admin-db-area-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-19 12:00:04',
            'updated_at' => '2019-06-19 12:00:04',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 423,
            'controller_id' => 115,
            'action_type_id' => 8,
            'be_route_code' => '/admin/FaqDev/write',
            'be_route_path' => 'Help\FaqController@write',
            'be_route_name' => 'admin-FaqDev-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:04',
            'updated_at' => '2019-06-20 12:00:04',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 424,
            'controller_id' => 4,
            'action_type_id' => 8,
            'be_route_code' => '/admin/contractor/write',
            'be_route_path' => 'TabCompanyContractor\ContractorsController@write',
            'be_route_name' => 'contractor-access-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:04',
            'updated_at' => '2019-06-20 12:00:04',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 425,
            'controller_id' => 14,
            'action_type_id' => 8,
            'be_route_code' => '/admin/contractorInfo/write',
            'be_route_path' => 'TabCompanyContractor\ContractorsInfoController@write',
            'be_route_name' => 'admin-contractor-info-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:04',
            'updated_at' => '2019-06-20 12:00:04',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 426,
            'controller_id' => 98,
            'action_type_id' => 8,
            'be_route_code' => '/admin/dbArea/file/write',
            'be_route_path' => 'AttachedFiles\DbAreaFilesController@write',
            'be_route_name' => 'dbArea-file-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:05',
            'updated_at' => '2019-06-20 12:00:05',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 429,
            'controller_id' => 110,
            'action_type_id' => 32,
            'be_route_code' => '/admin/action/file/download',
            'be_route_path' => 'Controller@download',
            'be_route_name' => 'file-download',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 430,
            'controller_id' => 110,
            'action_type_id' => 10,
            'be_route_code' => '/admin/action/deletemark',
            'be_route_path' => 'Controller@deleteMark',
            'be_route_name' => 'action-delete-mark',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 431,
            'controller_id' => 110,
            'action_type_id' => 34,
            'be_route_code' => '/admin/action/undeletemark',
            'be_route_path' => 'Controller@undeleteMark',
            'be_route_name' => 'action-undelete-mark',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 432,
            'controller_id' => 110,
            'action_type_id' => 35,
            'be_route_code' => '/admin/action/actualmark',
            'be_route_path' => 'Controller@actualMark',
            'be_route_name' => 'action-actual-mark',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 433,
            'controller_id' => 110,
            'action_type_id' => 36,
            'be_route_code' => '/admin/action/unactualmark',
            'be_route_path' => 'Controller@unactualMark',
            'be_route_name' => 'action-unactual-mark',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 434,
            'controller_id' => 116,
            'action_type_id' => 6,
            'be_route_code' => '/admin/acts/list',
            'be_route_path' => 'BL\SettlementReconciliationActsController@list',
            'be_route_name' => 'settlement-acts-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 435,
            'controller_id' => 116,
            'action_type_id' => 5,
            'be_route_code' => '/admin/acts/request/card',
            'be_route_path' => 'BL\SettlementReconciliationActsController@requestCard',
            'be_route_name' => 'settlement-acts-request-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 436,
            'controller_id' => 98,
            'action_type_id' => 6,
            'be_route_code' => '/admin/dbArea/file/list',
            'be_route_path' => 'AttachedFiles\DbAreaFilesController@list',
            'be_route_name' => 'dbArea-file-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 437,
            'controller_id' => 117,
            'action_type_id' => 6,
            'be_route_code' => '/admin/service/acts/list',
            'be_route_path' => 'BL\ServiceAcceptanceActsController@list',
            'be_route_name' => 'service-acts-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 438,
            'controller_id' => 118,
            'action_type_id' => 6,
            'be_route_code' => '/admin/invoices/list',
            'be_route_path' => 'BL\InvoicesController@list',
            'be_route_name' => 'invoices-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 439,
            'controller_id' => 117,
            'action_type_id' => 30,
            'be_route_code' => '/admin/service/acts/get/documents',
            'be_route_path' => 'BL\ServiceAcceptanceActsController@getDocuments',
            'be_route_name' => 'service-acts-get-documents',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 440,
            'controller_id' => 118,
            'action_type_id' => 30,
            'be_route_code' => '/admin/invoices/get/documents',
            'be_route_path' => 'BL\InvoicesController@getDocuments',
            'be_route_name' => 'invoices-get-documents',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 441,
            'controller_id' => 119,
            'action_type_id' => 6,
            'be_route_code' => '/admin/customer/requests/dbArea/files',
            'be_route_path' => 'BL\BlCustomerRequestsDbAreaFilesController@list',
            'be_route_name' => 'customer-requests-db-area-files',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 442,
            'controller_id' => 120,
            'action_type_id' => 6,
            'be_route_code' => '/admin/bl/leasing/contracts/list/dbArea/files',
            'be_route_path' => 'BL\BlLeasingContractsDbAreaFilesController@list',
            'be_route_name' => 'customer-requests-db-area-files',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 443,
            'controller_id' => 116,
            'action_type_id' => 30,
            'be_route_code' => '/admin/acts/documents/get',
            'be_route_path' => 'BL\SettlementReconciliationActsController@getDocuments',
            'be_route_name' => 'settlement-acts-get-documents',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 444,
            'controller_id' => 118,
            'action_type_id' => 5,
            'be_route_code' => '/admin/invoices/request/card',
            'be_route_path' => 'BL\InvoicesController@requestCard',
            'be_route_name' => 'invoices-request-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 445,
            'controller_id' => 117,
            'action_type_id' => 5,
            'be_route_code' => '/admin/service/acts/request/card',
            'be_route_path' => 'BL\ServiceAcceptanceActsController@requestCard',
            'be_route_name' => 'service-acts-request-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 446,
            'controller_id' => 122,
            'action_type_id' => 5,
            'be_route_code' => '/admin/questionnaire/card',
            'be_route_path' => 'Bl\BLDownloadProfileController@card',
            'be_route_name' => 'bl-download-profile-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 447,
            'controller_id' => 7,
            'action_type_id' => 8,
            'be_route_code' => '/admin/captions/write',
            'be_route_path' => 'TabSystem\CaptionsController@write',
            'be_route_name' => 'admin-captions-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 448,
            'controller_id' => 5,
            'action_type_id' => 8,
            'be_route_code' => '/admin/language/write',
            'be_route_path' => 'TabCommonReferences\LanguagesController@write',
            'be_route_name' => 'languages-card-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 449,
            'controller_id' => 10,
            'action_type_id' => 8,
            'be_route_code' => '/admin/translationCaptions/write',
            'be_route_path' => 'TabTranslation\TranslationCaptionsController@write',
            'be_route_name' => 'admin-captions-translations-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 450,
            'controller_id' => 13,
            'action_type_id' => 8,
            'be_route_code' => '/admin/country/write',
            'be_route_path' => 'TabCommonReferences\CountriesController@write',
            'be_route_name' => 'admin-country-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 451,
            'controller_id' => 15,
            'action_type_id' => 8,
            'be_route_code' => '/admin/region/write',
            'be_route_path' => 'TabCommonReferences\RegionsController@write',
            'be_route_name' => 'admin-region-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 452,
            'controller_id' => 51,
            'action_type_id' => 8,
            'be_route_code' => '/admin/currencies/write',
            'be_route_path' => 'TabFinances\CurrenciesController@write',
            'be_route_name' => 'currencies-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 453,
            'controller_id' => 50,
            'action_type_id' => 8,
            'be_route_code' => '/admin/banks/write',
            'be_route_path' => 'TabFinances\BanksController@write',
            'be_route_name' => 'banks-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 454,
            'controller_id' => 49,
            'action_type_id' => 8,
            'be_route_code' => '/admin/bankAccountTypes/write',
            'be_route_path' => 'TabFinances\BankAccountTypesController@write',
            'be_route_name' => 'bankAccountsTypes-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 455,
            'controller_id' => 60,
            'action_type_id' => 8,
            'be_route_code' => '/admin/images/write',
            'be_route_path' => 'TabImages\ImagesController@write',
            'be_route_name' => 'images-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 456,
            'controller_id' => 55,
            'action_type_id' => 8,
            'be_route_code' => '/admin/imageCategories/write',
            'be_route_path' => 'TabImages\ImageCategoriesController@write',
            'be_route_name' => 'imageCategories-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 457,
            'controller_id' => 61,
            'action_type_id' => 8,
            'be_route_code' => '/admin/fileTypes/write',
            'be_route_path' => 'TabImages\FileTypesController@write',
            'be_route_name' => 'fileTypes-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 458,
            'controller_id' => 123,
            'action_type_id' => 6,
            'be_route_code' => '/admin/system/parameters/list',
            'be_route_path' => 'TabSystem\SystemParametersController@list',
            'be_route_name' => 'system-parameters-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 459,
            'controller_id' => 123,
            'action_type_id' => 5,
            'be_route_code' => '/admin/system/parameters/card',
            'be_route_path' => 'TabSystem\SystemParametersController@card',
            'be_route_name' => 'system-parameters-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 460,
            'controller_id' => 123,
            'action_type_id' => 8,
            'be_route_code' => '/admin/system/parameters/write',
            'be_route_path' => 'TabSystem\SystemParametersController@write',
            'be_route_name' => 'system-parameters-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 461,
            'controller_id' => 124,
            'action_type_id' => 6,
            'be_route_code' => '/admin/system/parameters/values/list',
            'be_route_path' => 'TabSystem\SystemParametersValuesController@list',
            'be_route_name' => 'system-parameters-values-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 462,
            'controller_id' => 124,
            'action_type_id' => 5,
            'be_route_code' => '/admin/system/parameters/values/card',
            'be_route_path' => 'TabSystem\SystemParametersValuesController@card',
            'be_route_name' => 'system-parameters-values-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 463,
            'controller_id' => 124,
            'action_type_id' => 8,
            'be_route_code' => '/admin/system/parameters/values/write',
            'be_route_path' => 'TabSystem\SystemParametersValuesController@write',
            'be_route_name' => 'system-parameters-values-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 464,
            'controller_id' => 125,
            'action_type_id' => 6,
            'be_route_code' => '/admin/model/list',
            'be_route_path' => 'TabSystem\ModelsController@list',
            'be_route_name' => 'model-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 465,
            'controller_id' => 125,
            'action_type_id' => 5,
            'be_route_code' => '/admin/model/card',
            'be_route_path' => 'TabSystem\ModelsController@card',
            'be_route_name' => 'model-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 466,
            'controller_id' => 125,
            'action_type_id' => 8,
            'be_route_code' => '/admin/model/write',
            'be_route_path' => 'TabSystem\ModelsController@write',
            'be_route_name' => 'model-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 467,
            'controller_id' => 126,
            'action_type_id' => 6,
            'be_route_code' => '/admin/controller/list',
            'be_route_path' => 'TabSystem\ControllersController@list',
            'be_route_name' => 'controller-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 468,
            'controller_id' => 126,
            'action_type_id' => 5,
            'be_route_code' => '/admin/controller/card',
            'be_route_path' => 'TabSystem\ControllersController@card',
            'be_route_name' => 'controller-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 469,
            'controller_id' => 126,
            'action_type_id' => 8,
            'be_route_code' => '/admin/controller/write',
            'be_route_path' => 'TabSystem\ControllersController@write',
            'be_route_name' => 'controller-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 470,
            'controller_id' => 102,
            'action_type_id' => 24,
            'be_route_code' => '/admin/menu/items/tree',
            'be_route_path' => 'Menu\MenuItemsController@tree',
            'be_route_name' => 'menu-items-tree',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 471,
            'controller_id' => 102,
            'action_type_id' => 6,
            'be_route_code' => '/admin/menu/items/list',
            'be_route_path' => 'Menu\MenuItemsController@list',
            'be_route_name' => 'menu-items-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 472,
            'controller_id' => 102,
            'action_type_id' => 5,
            'be_route_code' => '/admin/menu/items/card',
            'be_route_path' => 'Menu\MenuItemsController@card',
            'be_route_name' => 'menu-items-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 473,
            'controller_id' => 102,
            'action_type_id' => 8,
            'be_route_code' => '/admin/menu/items/write',
            'be_route_path' => 'Menu\MenuItemsController@write',
            'be_route_name' => 'menu-items-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 474,
            'controller_id' => 103,
            'action_type_id' => 6,
            'be_route_code' => '/admin/menu/item/access/roles/list',
            'be_route_path' => 'Menu\MenuItemAccessRolesController@list',
            'be_route_name' => 'menu-item-access-roles-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 475,
            'controller_id' => 103,
            'action_type_id' => 5,
            'be_route_code' => '/admin/menu/item/access/roles/card',
            'be_route_path' => 'Menu\MenuItemAccessRolesController@card',
            'be_route_name' => 'menu-item-access-roles-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 476,
            'controller_id' => 103,
            'action_type_id' => 8,
            'be_route_code' => '/admin/menu/item/access/roles/write',
            'be_route_path' => 'Menu\MenuItemAccessRolesController@write',
            'be_route_name' => 'menu-item-access-roles-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 477,
            'controller_id' => 127,
            'action_type_id' => 6,
            'be_route_code' => '/admin/payment/invoices/list',
            'be_route_path' => 'BL\PaymentInvoicesController@list',
            'be_route_name' => 'payment-invoices-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 478,
            'controller_id' => 127,
            'action_type_id' => 5,
            'be_route_code' => '/admin/payment/invoices/request/card',
            'be_route_path' => 'BL\PaymentInvoicesController@requestCard',
            'be_route_name' => 'payment-invoices-request-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 479,
            'controller_id' => 127,
            'action_type_id' => 30,
            'be_route_code' => '/admin/payment/invoices/get/documents',
            'be_route_path' => 'BL\PaymentInvoicesController@getDocuments',
            'be_route_name' => 'payment-invoices-get-documents',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 480,
            'controller_id' => 85,
            'action_type_id' => 8,
            'be_route_code' => '/admin/BeRoutes/write',
            'be_route_path' => 'FeBeRoutes\BeRoutesController@write',
            'be_route_name' => 'be-route-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 481,
            'controller_id' => 81,
            'action_type_id' => 8,
            'be_route_code' => '/admin/feComponents/write',
            'be_route_path' => 'FeBeRoutes\FeComponentsController@write',
            'be_route_name' => 'fe-components-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 482,
            'controller_id' => 88,
            'action_type_id' => 8,
            'be_route_code' => '/admin/FeUrls/write',
            'be_route_path' => 'FeBeRoutes\FeUrlsController@write',
            'be_route_name' => 'fe-urls-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 483,
            'controller_id' => 87,
            'action_type_id' => 8,
            'be_route_code' => '/admin/FeRoutes/write',
            'be_route_path' => 'FeBeRoutes\FeRoutesController@write',
            'be_route_name' => 'fe-routes-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 484,
            'controller_id' => 86,
            'action_type_id' => 8,
            'be_route_code' => '/admin/FeRoute/urls/write',
            'be_route_path' => 'FeBeRoutes\FeRouteUrlsController@write',
            'be_route_name' => 'fe-route-url-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 485,
            'controller_id' => 82,
            'action_type_id' => 8,
            'be_route_code' => '/admin/FeRoute/steps/write',
            'be_route_path' => 'FeBeRoutes\FeRouteStepsController@write',
            'be_route_name' => 'fe-route-steps-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 486,
            'controller_id' => 83,
            'action_type_id' => 8,
            'be_route_code' => '/admin/FeRoute/objects/write',
            'be_route_path' => 'FeBeObjects\FeRouteObjectsController@write',
            'be_route_name' => 'fe-route-object-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 487,
            'controller_id' => 84,
            'action_type_id' => 8,
            'be_route_code' => '/admin/FeRoute/step/objects/write',
            'be_route_path' => 'FeBeObjects\FeRouteStepObjectsController@write',
            'be_route_name' => 'fe-route-step-object-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 488,
            'controller_id' => 128,
            'action_type_id' => 6,
            'be_route_code' => '/admin/action/exchange/logs/group/list',
            'be_route_path' => 'Admin\ActionExchangeLogGroupByController@list',
            'be_route_name' => 'action-exchange-logs-group-by-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 489,
            'controller_id' => 129,
            'action_type_id' => 6,
            'be_route_code' => '/admin/action/exchange/logs/list',
            'be_route_path' => 'Admin\ActionExchangeLogController@list',
            'be_route_name' => 'action-exchange-logs-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 490,
            'controller_id' => 26,
            'action_type_id' => 28,
            'be_route_code' => '/admin/action/logs/delete/all',
            'be_route_path' => 'Admin\ActionLogsController@deleteAll',
            'be_route_name' => 'action-logs-delete-all',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 491,
            'controller_id' => 6,
            'action_type_id' => 8,
            'be_route_code' => '/admin/user/profile/write',
            'be_route_path' => 'Admin\ConsumersController@write',
            'be_route_name' => 'admin-user-profile-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 492,
            'controller_id' => 114,
            'action_type_id' => 8,
            'be_route_code' => '/admin/bl/administrators/write',
            'be_route_path' => 'BL\BlAdministratorsController@write',
            'be_route_name' => 'bl-admin-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 493,
            'controller_id' => 106,
            'action_type_id' => 15,
            'be_route_code' => '/admin/bl/contractor/requests/send/request',
            'be_route_path' => 'BL\BlContractorRequestsController@sendRequest',
            'be_route_name' => 'bl-contractor-requests-send-request',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 494,
            'controller_id' => 130,
            'action_type_id' => 47,
            'be_route_code' => '/admin/statistic/finish',
            'be_route_path' => 'Admin\ActionLogsTotalsController@statisticFinish',
            'be_route_name' => 'statistic-finish',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 495,
            'controller_id' => 196,
            'action_type_id' => 6,
            'be_route_code' => '/admin/users/list',
            'be_route_path' => 'Admin\BlLogInAsUsersController@list',
            'be_route_name' => 'admin-users-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 497,
            'controller_id' => 132,
            'action_type_id' => 6,
            'be_route_code' => '/admin/contractor/diller/list',
            'be_route_path' => 'TabCompanyContractor\ContractorsDillerController@list',
            'be_route_name' => 'contractor-access-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 498,
            'controller_id' => 132,
            'action_type_id' => 6,
            'be_route_code' => '/admin/contractor/list',
            'be_route_path' => 'TabCompanyContractor\ContractorsDillerController@list',
            'be_route_name' => 'contractor-access-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 499,
            'controller_id' => 133,
            'action_type_id' => 6,
            'be_route_code' => '/admin/partner/list',
            'be_route_path' => 'Api\PartnersController@list',
            'be_route_name' => 'partner-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 500,
            'controller_id' => 133,
            'action_type_id' => 5,
            'be_route_code' => '/admin/partner/card',
            'be_route_path' => 'Api\PartnersController@card',
            'be_route_name' => 'partner-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 501,
            'controller_id' => 133,
            'action_type_id' => 8,
            'be_route_code' => '/admin/partner/write',
            'be_route_path' => 'PartnersController@write',
            'be_route_name' => 'partner-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 502,
            'controller_id' => 134,
            'action_type_id' => 6,
            'be_route_code' => '/admin/contact/person/list',
            'be_route_path' => 'ContactPersonsController@list',
            'be_route_name' => 'contact-person-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 503,
            'controller_id' => 134,
            'action_type_id' => 5,
            'be_route_code' => '/admin/contact/person/card',
            'be_route_path' => 'ContactPersonsController@card',
            'be_route_name' => 'contact-person-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 504,
            'controller_id' => 134,
            'action_type_id' => 8,
            'be_route_code' => '/admin/contact/person/write',
            'be_route_path' => 'ContactPersonsController@write',
            'be_route_name' => 'contact-person-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 505,
            'controller_id' => 135,
            'action_type_id' => 6,
            'be_route_code' => '/admin/contact/person/info/list',
            'be_route_path' => 'ContactPersonInfoController@list',
            'be_route_name' => 'contact-person-info-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 506,
            'controller_id' => 135,
            'action_type_id' => 5,
            'be_route_code' => '/admin/contact/person/info/card',
            'be_route_path' => 'ContactPersonInfoController@card',
            'be_route_name' => 'contact-person-info-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 507,
            'controller_id' => 135,
            'action_type_id' => 8,
            'be_route_code' => '/admin/contact/person/info/write',
            'be_route_path' => 'ContactPersonInfoController@write',
            'be_route_name' => 'contact-person-info-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 508,
            'controller_id' => 136,
            'action_type_id' => 6,
            'be_route_code' => '/admin/partner/point/list',
            'be_route_path' => 'PartnerPointsController@list',
            'be_route_name' => 'partner-point-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 509,
            'controller_id' => 136,
            'action_type_id' => 5,
            'be_route_code' => '/admin/partner/point/card',
            'be_route_path' => 'PartnerPointsController@card',
            'be_route_name' => 'partner-point-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 510,
            'controller_id' => 136,
            'action_type_id' => 8,
            'be_route_code' => '/admin/partner/point/write',
            'be_route_path' => 'PartnerPointsController@write',
            'be_route_name' => 'partner-point-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 511,
            'controller_id' => 137,
            'action_type_id' => 6,
            'be_route_code' => '/admin/partner/regions/list',
            'be_route_path' => 'PartnerRegionsController@list',
            'be_route_name' => 'partner-regions-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 512,
            'controller_id' => 137,
            'action_type_id' => 5,
            'be_route_code' => '/admin/partner/region/card',
            'be_route_path' => 'PartnerRegionsController@card',
            'be_route_name' => 'partner-region-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 513,
            'controller_id' => 137,
            'action_type_id' => 8,
            'be_route_code' => '/admin/partner/region/write',
            'be_route_path' => 'PartnerRegionsController@write',
            'be_route_name' => 'partner-region-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 514,
            'controller_id' => 138,
            'action_type_id' => 6,
            'be_route_code' => '/admin/partner/employee/list',
            'be_route_path' => 'PartnerEmployeesController@list',
            'be_route_name' => 'partner-employee-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 515,
            'controller_id' => 138,
            'action_type_id' => 5,
            'be_route_code' => '/admin/partner/employee/card',
            'be_route_path' => 'PartnerEmployeesController@card',
            'be_route_name' => 'partner-employee-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 516,
            'controller_id' => 138,
            'action_type_id' => 8,
            'be_route_code' => '/admin/partner/employee/write',
            'be_route_path' => 'PartnerEmployeesController@write',
            'be_route_name' => 'partner-employee-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 517,
            'controller_id' => 139,
            'action_type_id' => 6,
            'be_route_code' => '/admin/partner/employee/contact/person/list',
            'be_route_path' => 'PartnerEmployeeContactPersonsController@list',
            'be_route_name' => 'partner-employee-contact-person-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 518,
            'controller_id' => 139,
            'action_type_id' => 5,
            'be_route_code' => '/admin/partner/employee/contact/person/card',
            'be_route_path' => 'PartnerEmployeeContactPersonsController@card',
            'be_route_name' => 'partner-employee-contact-person-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 519,
            'controller_id' => 139,
            'action_type_id' => 8,
            'be_route_code' => '/admin/partner/employee/contact/person/write',
            'be_route_path' => 'PartnerEmployeeContactPersonsController@write',
            'be_route_name' => 'partner-employee-contact-person-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 520,
            'controller_id' => 140,
            'action_type_id' => 6,
            'be_route_code' => '/admin/user/interface/list',
            'be_route_path' => 'UserInterfacesController@list',
            'be_route_name' => 'user-interface-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 521,
            'controller_id' => 140,
            'action_type_id' => 5,
            'be_route_code' => '/admin/user/interface/card',
            'be_route_path' => 'UserInterfacesController@card',
            'be_route_name' => 'user-interface-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 522,
            'controller_id' => 140,
            'action_type_id' => 8,
            'be_route_code' => '/admin/user/interface/write',
            'be_route_path' => 'UserInterfacesController@write',
            'be_route_name' => 'user-interface-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 523,
            'controller_id' => 142,
            'action_type_id' => 6,
            'be_route_code' => '/admin/access/axes/list',
            'be_route_path' => 'Axes\AccessAxesController@list',
            'be_route_name' => 'access-axes-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 524,
            'controller_id' => 142,
            'action_type_id' => 5,
            'be_route_code' => '/admin/access/axes/card',
            'be_route_path' => 'Axes\AccessAxesController@card',
            'be_route_name' => 'access-axes-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 525,
            'controller_id' => 142,
            'action_type_id' => 8,
            'be_route_code' => '/admin/access/axes/write',
            'be_route_path' => 'Axes\AccessAxesController@write',
            'be_route_name' => 'access-axes-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 526,
            'controller_id' => 144,
            'action_type_id' => 6,
            'be_route_code' => '/admin/access/row/parameters/list',
            'be_route_path' => 'Axes\AccessRowParametersController@list',
            'be_route_name' => 'access-axes-row-parameters-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 527,
            'controller_id' => 144,
            'action_type_id' => 5,
            'be_route_code' => '/admin/access/row/parameters/card',
            'be_route_path' => 'Axes\AccessRowParametersController@card',
            'be_route_name' => 'access-axes-row-parameters-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 528,
            'controller_id' => 144,
            'action_type_id' => 8,
            'be_route_code' => '/admin/access/row/parameters/write',
            'be_route_path' => 'Axes\AccessRowParametersController@write',
            'be_route_name' => 'access-axes-row-parameters-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-20 12:00:07',
            'updated_at' => '2019-06-20 12:00:07',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 529,
            'controller_id' => 146,
            'action_type_id' => 6,
            'be_route_code' => '/admin/qt/page/list',
            'be_route_path' => 'QuestionnaireTemplates\QTPagesController@list',
            'be_route_name' => 'qt-page-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-26 15:00:00',
            'updated_at' => '2019-06-26 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 530,
            'controller_id' => 146,
            'action_type_id' => 5,
            'be_route_code' => '/admin/qt/page/card',
            'be_route_path' => 'QuestionnaireTemplates\QTPagesController@card',
            'be_route_name' => 'qt-page-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-26 15:00:00',
            'updated_at' => '2019-06-26 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 531,
            'controller_id' => 146,
            'action_type_id' => 8,
            'be_route_code' => '/admin/qt/page/write',
            'be_route_path' => 'QuestionnaireTemplates\QTPagesController@write',
            'be_route_name' => 'qt-page-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-26 15:00:00',
            'updated_at' => '2019-06-26 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 532,
            'controller_id' => 147,
            'action_type_id' => 6,
            'be_route_code' => '/admin/qt/block/list',
            'be_route_path' => 'QuestionnaireTemplates\QTBlocksController@list',
            'be_route_name' => 'qt-block-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-26 15:00:00',
            'updated_at' => '2019-06-26 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 533,
            'controller_id' => 147,
            'action_type_id' => 5,
            'be_route_code' => '/admin/qt/block/card',
            'be_route_path' => 'QuestionnaireTemplates\QTBlocksController@card',
            'be_route_name' => 'qt-block-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-26 15:00:00',
            'updated_at' => '2019-06-26 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 534,
            'controller_id' => 147,
            'action_type_id' => 8,
            'be_route_code' => '/admin/qt/block/write',
            'be_route_path' => 'QuestionnaireTemplates\QTBlocksController@write',
            'be_route_name' => 'qt-block-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-26 15:00:00',
            'updated_at' => '2019-06-26 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 535,
            'controller_id' => 148,
            'action_type_id' => 6,
            'be_route_code' => '/admin/qt/set/list',
            'be_route_path' => 'QuestionnaireTemplates\QTSetsController@list',
            'be_route_name' => 'qt-set-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-26 15:00:00',
            'updated_at' => '2019-06-26 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 536,
            'controller_id' => 148,
            'action_type_id' => 5,
            'be_route_code' => '/admin/qt/set/card',
            'be_route_path' => 'QuestionnaireTemplates\QTSetsController@card',
            'be_route_name' => 'qt-set-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-26 15:00:00',
            'updated_at' => '2019-06-26 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 537,
            'controller_id' => 148,
            'action_type_id' => 8,
            'be_route_code' => '/admin/qt/set/write',
            'be_route_path' => 'QuestionnaireTemplates\QTSetsController@write',
            'be_route_name' => 'qt-set-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-26 15:00:00',
            'updated_at' => '2019-06-26 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 538,
            'controller_id' => 149,
            'action_type_id' => 6,
            'be_route_code' => '/admin/qt/question/kind/list',
            'be_route_path' => 'QuestionnaireTemplates\QTQuestionKindsController@list',
            'be_route_name' => 'qt-question-kind-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-26 15:00:00',
            'updated_at' => '2019-06-26 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 539,
            'controller_id' => 149,
            'action_type_id' => 5,
            'be_route_code' => '/admin/qt/question/kind/card',
            'be_route_path' => 'QuestionnaireTemplates\QTQuestionKindsController@card',
            'be_route_name' => 'qt-question-kind-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-26 15:00:00',
            'updated_at' => '2019-06-26 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 540,
            'controller_id' => 149,
            'action_type_id' => 8,
            'be_route_code' => '/admin/qt/question/kind/write',
            'be_route_path' => 'QuestionnaireTemplates\QTQuestionKindsController@write',
            'be_route_name' => 'qt-question-kind-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-26 15:00:00',
            'updated_at' => '2019-06-26 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 541,
            'controller_id' => 163,
            'action_type_id' => 24,
            'be_route_code' => '/admin/journal/documents/tree',
            'be_route_path' => 'JournalDocumentsController@tree',
            'be_route_name' => 'journal-documents-tree',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-26 15:00:00',
            'updated_at' => '2019-06-26 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 542,
            'controller_id' => 155,
            'action_type_id' => 8,
            'be_route_code' => '/admin/partner/bl/contractor/requests/write',
            'be_route_path' => 'BL\PartnerBlContractorRequestsController@write',
            'be_route_name' => 'partner-bl-contractor-requests-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-26 15:00:00',
            'updated_at' => '2019-06-26 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 543,
            'controller_id' => 155,
            'action_type_id' => 15,
            'be_route_code' => '/admin/partner/bl/contractor/requests/send/request',
            'be_route_path' => 'BL\PartnerBlContractorRequestsController@sendRequest',
            'be_route_name' => 'partner-bl-contractor-requests-send-request',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-26 15:00:00',
            'updated_at' => '2019-06-26 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 544,
            'controller_id' => 155,
            'action_type_id' => 6,
            'be_route_code' => '/admin/partner/bl/contractor/requests/list',
            'be_route_path' => 'BL\PartnerBlContractorRequestsController@list',
            'be_route_name' => 'partner-bl-contractor-requests-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-26 15:00:00',
            'updated_at' => '2019-06-26 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 545,
            'controller_id' => 155,
            'action_type_id' => 5,
            'be_route_code' => '/admin/partner/bl/contractor/requests/card',
            'be_route_path' => 'BL\PartnerBlContractorRequestsController@card',
            'be_route_name' => 'partner-bl-contractor-requests-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-26 15:00:00',
            'updated_at' => '2019-06-26 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 546,
            'controller_id' => 154,
            'action_type_id' => 8,
            'be_route_code' => '/admin/client/bl/contractor/requests/write',
            'be_route_path' => 'BL\ClientBlContractorRequestsController@write',
            'be_route_name' => 'client-bl-contractor-requests-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-26 15:00:00',
            'updated_at' => '2019-06-26 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 547,
            'controller_id' => 154,
            'action_type_id' => 15,
            'be_route_code' => '/admin/client/bl/contractor/requests/send/request',
            'be_route_path' => 'BL\ClientBlContractorRequestsController@sendRequest',
            'be_route_name' => 'client-bl-contractor-requests-send-request',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-26 15:00:00',
            'updated_at' => '2019-06-26 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 548,
            'controller_id' => 154,
            'action_type_id' => 6,
            'be_route_code' => '/admin/client/bl/contractor/requests/list',
            'be_route_path' => 'BL\ClientBlContractorRequestsController@list',
            'be_route_name' => 'client-bl-contractor-requests-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-26 15:00:00',
            'updated_at' => '2019-06-26 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 549,
            'controller_id' => 154,
            'action_type_id' => 5,
            'be_route_code' => '/admin/client/bl/contractor/requests/card',
            'be_route_path' => 'BL\ClientBlContractorRequestsController@card',
            'be_route_name' => 'client-bl-contractor-requests-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-26 15:00:00',
            'updated_at' => '2019-06-26 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 550,
            'controller_id' => 164,
            'action_type_id' => 6,
            'be_route_code' => '/admin/qt/list',
            'be_route_path' => 'QuestionnaireTemplates\QuestionnaireTemplatesController@list',
            'be_route_name' => 'qt-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-26 15:00:00',
            'updated_at' => '2019-06-26 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 551,
            'controller_id' => 164,
            'action_type_id' => 24,
            'be_route_code' => '/admin/qt/tree',
            'be_route_path' => 'QuestionnaireTemplates\QuestionnaireTemplatesController@tree',
            'be_route_name' => 'qt-tree',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-26 15:00:00',
            'updated_at' => '2019-06-26 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 552,
            'controller_id' => 164,
            'action_type_id' => 5,
            'be_route_code' => '/admin/qt/card',
            'be_route_path' => 'QuestionnaireTemplates\QuestionnaireTemplatesController@card',
            'be_route_name' => 'qt-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-26 15:00:00',
            'updated_at' => '2019-06-26 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 553,
            'controller_id' => 165,
            'action_type_id' => 6,
            'be_route_code' => '/admin/partner/partner/list',
            'be_route_path' => 'Partners\PartnerPartnersController@list',
            'be_route_name' => 'partner-partner-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-26 15:00:00',
            'updated_at' => '2019-06-26 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 554,
            'controller_id' => 165,
            'action_type_id' => 8,
            'be_route_code' => '/admin/partner/partner/write',
            'be_route_path' => 'Partners\PartnerPartnersController@write',
            'be_route_name' => 'partner-partner-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-26 15:00:00',
            'updated_at' => '2019-06-26 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 555,
            'controller_id' => 165,
            'action_type_id' => 5,
            'be_route_code' => '/admin/partner/partner/card',
            'be_route_path' => 'Partners\PartnerPartnersController@card',
            'be_route_name' => 'partner-partner-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-26 15:00:00',
            'updated_at' => '2019-06-26 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 556,
            'controller_id' => 166,
            'action_type_id' => 6,
            'be_route_code' => '/admin/partner/partner/region/list',
            'be_route_path' => 'Partners\PartnerPartnerRegionsController@list',
            'be_route_name' => 'partner-partner-region-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-26 15:00:00',
            'updated_at' => '2019-06-26 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 557,
            'controller_id' => 166,
            'action_type_id' => 8,
            'be_route_code' => '/admin/partner/partner/region/write',
            'be_route_path' => 'Partners\PartnerPartnerRegionsController@write',
            'be_route_name' => 'partner-partner-region-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-26 15:00:00',
            'updated_at' => '2019-06-26 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 558,
            'controller_id' => 166,
            'action_type_id' => 5,
            'be_route_code' => '/admin/partner/partner/region/card',
            'be_route_path' => 'Partners\PartnerPartnerRegionsController@card',
            'be_route_name' => 'partner-partner-region-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-26 15:00:00',
            'updated_at' => '2019-06-26 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 559,
            'controller_id' => 167,
            'action_type_id' => 6,
            'be_route_code' => '/admin/partner/partner/point/list',
            'be_route_path' => 'Partners\PartnerPartnerPointsController@list',
            'be_route_name' => 'partner-partner-point-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-26 15:00:00',
            'updated_at' => '2019-06-26 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 560,
            'controller_id' => 167,
            'action_type_id' => 8,
            'be_route_code' => '/admin/partner/partner/point/write',
            'be_route_path' => 'Partners\PartnerPartnerPointsController@write',
            'be_route_name' => 'partner-partner-point-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-26 15:00:00',
            'updated_at' => '2019-06-26 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 561,
            'controller_id' => 167,
            'action_type_id' => 5,
            'be_route_code' => '/admin/partner/partner/point/card',
            'be_route_path' => 'Partners\PartnerPartnerPointsController@card',
            'be_route_name' => 'partner-partner-point-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-26 15:00:00',
            'updated_at' => '2019-06-26 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 562,
            'controller_id' => 168,
            'action_type_id' => 5,
            'be_route_code' => '/admin/qt/sets/questions/list/card',
            'be_route_path' => 'QuestionnaireTemplates\QTSetsQuestionsListController@card',
            'be_route_name' => 'qt-sets-questions-list-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-26 15:00:00',
            'updated_at' => '2019-06-26 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 563,
            'controller_id' => 168,
            'action_type_id' => 6,
            'be_route_code' => '/admin/qt/sets/questions/list/list',
            'be_route_path' => 'QuestionnaireTemplates\QTSetsQuestionsListController@list',
            'be_route_name' => 'qt-sets-questions-list-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-26 15:00:00',
            'updated_at' => '2019-06-26 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 564,
            'controller_id' => 164,
            'action_type_id' => 8,
            'be_route_code' => '/admin/qt/write',
            'be_route_path' => 'QuestionnaireTemplates\QuestionnaireTemplatesController@write',
            'be_route_name' => 'qt-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-26 15:00:00',
            'updated_at' => '2019-06-26 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 565,
            'controller_id' => 173,
            'action_type_id' => 6,
            'be_route_code' => '/admin/calculation/template/list',
            'be_route_path' => 'CalculationTemplatesController@list',
            'be_route_name' => 'calculation-template-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 566,
            'controller_id' => 173,
            'action_type_id' => 5,
            'be_route_code' => '/admin/calculation/template/card',
            'be_route_path' => 'CalculationTemplatesController@card',
            'be_route_name' => 'calculation-template-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 567,
            'controller_id' => 173,
            'action_type_id' => 8,
            'be_route_code' => '/admin/calculation/template/write',
            'be_route_path' => 'CalculationTemplatesController@write',
            'be_route_name' => 'calculation-template-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 568,
            'controller_id' => 101,
            'action_type_id' => 8,
            'be_route_code' => '/admin/one/additional/detail/write',
            'be_route_path' => 'TabONE\OneAdditionalDetailsController@write',
            'be_route_name' => 'one-additional-detail-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 569,
            'controller_id' => 169,
            'action_type_id' => 5,
            'be_route_code' => '/admin/extension/one/additional/detail/card',
            'be_route_path' => 'ExtensionOneAdditionalDetailsController@card',
            'be_route_name' => 'extension-one-additional-detail-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 570,
            'controller_id' => 169,
            'action_type_id' => 8,
            'be_route_code' => '/admin/extension/one/additional/detail/write',
            'be_route_path' => 'ExtensionOneAdditionalDetailsController@write',
            'be_route_name' => 'extension-one-additional-detail-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 571,
            'controller_id' => 164,
            'action_type_id' => 20,
            'be_route_code' => '/admin/qt/questionnairePreview',
            'be_route_path' => 'QuestionnaireTemplates\QuestionnaireTemplatesController@questionnairePreview',
            'be_route_name' => 'qt-list-questionnaire-preview',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);

        /**/
        \App\Models\BeRoute::create([
            'id' => 572,
            'controller_id' => 180,
            'action_type_id' => 20,
            'be_route_code' => '/admin/qt/questionnaire',
            'be_route_path' => 'QuestionnaireTemplates\QuestionnairesController@preview',
            'be_route_name' => 'qt-preview',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 573,
            'controller_id' => 181,
            'action_type_id' => 6,
            'be_route_code' => '/admin/qt/question/type/list',
            'be_route_path' => 'QuestionnaireTemplates\QTQuestionTypesController@list',
            'be_route_name' => 'qt-question-type-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 574,
            'controller_id' => 181,
            'action_type_id' => 5,
            'be_route_code' => '/admin/qt/question/type/card',
            'be_route_path' => 'QuestionnaireTemplates\QTQuestionTypesController@card',
            'be_route_name' => 'qt-question-type-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 575,
            'controller_id' => 181,
            'action_type_id' => 8,
            'be_route_code' => '/admin/qt/question/type/write',
            'be_route_path' => 'QuestionnaireTemplates\QTQuestionTypesController@write',
            'be_route_name' => 'qt-question-type-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);

        /**/
        \App\Models\BeRoute::create([
            'id' => 576,
            'controller_id' => 168,
            'action_type_id' => 8,
            'be_route_code' => '/admin/qt/sets/questions/list/write',
            'be_route_path' => 'QuestionnaireTemplates\QTSetsQuestionsListController@write',
            'be_route_name' => 'qt-sets-questions-list-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);

        /**/
        \App\Models\BeRoute::create([
            'id' => 579,
            'controller_id' => 72,
            'action_type_id' => 6,
            'be_route_code' => '/admin/bl/leasing/calc/list',
            'be_route_path' => 'BL\BlLeasingCalculationsController@list',
            'be_route_name' => 'bl-leasing-calc-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 580,
            'controller_id' => 72,
            'action_type_id' => 5,
            'be_route_code' => '/admin/bl/leasing/calc/card',
            'be_route_path' => 'BL\BlLeasingCalculationsController@card',
            'be_route_name' => 'bl-leasing-calc-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 581,
            'controller_id' => 72,
            'action_type_id' => 5,
            'be_route_code' => '/admin/bl/leasing/calc/card/dev',
            'be_route_path' => 'BL\BlLeasingCalculationsController@cardDev',
            'be_route_name' => 'bl-leasing-calc-card-dev',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 582,
            'controller_id' => 72,
            'action_type_id' => 10,
            'be_route_code' => '/admin/bl/leasing/calc/deleteMark',
            'be_route_path' => 'BL\BlLeasingCalculationsController@deleteMark',
            'be_route_name' => 'bl-leasing-calc-deleteMark',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 583,
            'controller_id' => 72,
            'action_type_id' => 3,
            'be_route_code' => '/admin/bl/leasing/calc/delete',
            'be_route_path' => 'BL\BlLeasingCalculationsController@delete',
            'be_route_name' => 'bl-leasing-calc-delete',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 584,
            'controller_id' => 72,
            'action_type_id' => 8,
            'be_route_code' => '/admin/bl/leasing/calc/write',
            'be_route_path' => 'BL\BlLeasingCalculationsController@write',
            'be_route_name' => 'bl-leasing-calc-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 585,
            'controller_id' => 152,
            'action_type_id' => 6,
            'be_route_code' => '/admin/сlient/bl/leasing/calc/list',
            'be_route_path' => 'BL\ClientBlLeasingCalculationsController@list',
            'be_route_name' => 'сlient-bl-leasing-calc-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 587,
            'controller_id' => 152,
            'action_type_id' => 5,
            'be_route_code' => '/admin/сlient/bl/leasing/calc/card',
            'be_route_path' => 'BL\ClientBlLeasingCalculationsController@card',
            'be_route_name' => 'сlient-bl-leasing-calc-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 588,
            'controller_id' => 152,
            'action_type_id' => 8,
            'be_route_code' => '/admin/сlient/bl/leasing/calc/write',
            'be_route_path' => 'BL\ClientBlLeasingCalculationsController@write',
            'be_route_name' => 'сlient-bl-leasing-calc-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 589,
            'controller_id' => 153,
            'action_type_id' => 6,
            'be_route_code' => '/admin/partner/bl/leasing/calc/list',
            'be_route_path' => 'BL\PartnerBlLeasingCalculationsController@list',
            'be_route_name' => 'partner-bl-leasing-calc-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 590,
            'controller_id' => 153,
            'action_type_id' => 5,
            'be_route_code' => '/admin/partner/bl/leasing/calc/card',
            'be_route_path' => 'BL\PartnerBlLeasingCalculationsController@card',
            'be_route_name' => 'partner-bl-leasing-calc-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 591,
            'controller_id' => 153,
            'action_type_id' => 8,
            'be_route_code' => '/admin/partner/bl/leasing/calc/write',
            'be_route_path' => 'BL\PartnerBlLeasingCalculationsController@write',
            'be_route_name' => 'partner-bl-leasing-calc-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 593,
            'controller_id' => 104,
            'action_type_id' => 6,
            'be_route_code' => '/admin/bl/customer/requests/list',
            'be_route_path' => 'BL\BlCustomerRequestsController@list',
            'be_route_name' => 'bl-customer-requests-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 594,
            'controller_id' => 104,
            'action_type_id' => 5,
            'be_route_code' => '/admin/bl/customer/requests/card',
            'be_route_path' => 'BL\BlCustomerRequestsController@card',
            'be_route_name' => 'bl-customer-requests-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 595,
            'controller_id' => 104,
            'action_type_id' => 8,
            'be_route_code' => '/admin/bl/customer/requests/write',
            'be_route_path' => 'BL\BlCustomerRequestsController@write',
            'be_route_name' => 'bl-customer-requests-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 596,
            'controller_id' => 104,
            'action_type_id' => 14,
            'be_route_code' => '/admin/bl/customer/requests/fields',
            'be_route_path' => 'BL\BlCustomerRequestsController@getFields',
            'be_route_name' => 'bl-customer-requests-fields',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 597,
            'controller_id' => 104,
            'action_type_id' => 42,
            'be_route_code' => '/admin/bl/customer/requests/request/card',
            'be_route_path' => 'BL\BlCustomerRequestsController@requestCard',
            'be_route_name' => 'bl-customer-requests-request-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 598,
            'controller_id' => 104,
            'action_type_id' => 15,
            'be_route_code' => '/admin/bl/customer/requests/request/send',
            'be_route_path' => 'BL\BlCustomerRequestsController@sendRequest',
            'be_route_name' => 'bl-customer-requests-request-send',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 600,
            'controller_id' => 156,
            'action_type_id' => 6,
            'be_route_code' => '/admin/сlient/bl/customer/requests/list',
            'be_route_path' => 'BL\ClientBlCustomerRequestsController@list',
            'be_route_name' => 'сlient-bl-customer-requests-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 601,
            'controller_id' => 156,
            'action_type_id' => 5,
            'be_route_code' => '/admin/сlient/bl/customer/requests/card',
            'be_route_path' => 'BL\ClientBlCustomerRequestsController@card',
            'be_route_name' => 'сlient-bl-customer-requests-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 602,
            'controller_id' => 156,
            'action_type_id' => 8,
            'be_route_code' => '/admin/сlient/bl/customer/requests/write',
            'be_route_path' => 'BL\ClientBlCustomerRequestsController@write',
            'be_route_name' => 'сlient-bl-customer-requests-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 603,
            'controller_id' => 156,
            'action_type_id' => 14,
            'be_route_code' => '/admin/сlient/bl/customer/requests/fields',
            'be_route_path' => 'BL\ClientBlCustomerRequestsController@getFields',
            'be_route_name' => 'сlient-bl-customer-requests-fields',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 604,
            'controller_id' => 156,
            'action_type_id' => 42,
            'be_route_code' => '/admin/сlient/bl/customer/requests/request/card',
            'be_route_path' => 'BL\ClientBlCustomerRequestsController@requestCard',
            'be_route_name' => 'сlient-bl-customer-requests-request-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 605,
            'controller_id' => 156,
            'action_type_id' => 15,
            'be_route_code' => '/admin/сlient/bl/customer/requests/request/send',
            'be_route_path' => 'BL\ClientBlCustomerRequestsController@sendRequest',
            'be_route_name' => 'сlient-bl-customer-requests-request-send',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 606,
            'controller_id' => 157,
            'action_type_id' => 6,
            'be_route_code' => '/admin/partner/bl/customer/requests/list',
            'be_route_path' => 'BL\PartnerBlCustomerRequestsController@list',
            'be_route_name' => 'partner-bl-customer-requests-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 607,
            'controller_id' => 157,
            'action_type_id' => 5,
            'be_route_code' => '/admin/partner/bl/customer/requests/card',
            'be_route_path' => 'BL\PartnerBlCustomerRequestsController@card',
            'be_route_name' => 'partner-bl-customer-requests-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 608,
            'controller_id' => 157,
            'action_type_id' => 8,
            'be_route_code' => '/admin/partner/bl/customer/requests/write',
            'be_route_path' => 'BL\PartnerBlCustomerRequestsController@write',
            'be_route_name' => 'partner-bl-customer-requests-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 609,
            'controller_id' => 157,
            'action_type_id' => 14,
            'be_route_code' => '/admin/partner/bl/customer/requests/fields',
            'be_route_path' => 'BL\PartnerBlCustomerRequestsController@getFields',
            'be_route_name' => 'partner-bl-customer-requests-fields',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 610,
            'controller_id' => 157,
            'action_type_id' => 42,
            'be_route_code' => '/admin/partner/bl/customer/requests/request/card',
            'be_route_path' => 'BL\PartnerBlCustomerRequestsController@requestCard',
            'be_route_name' => 'partner-bl-customer-requests-request-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 611,
            'controller_id' => 157,
            'action_type_id' => 15,
            'be_route_code' => '/admin/partner/bl/customer/requests/request/send',
            'be_route_path' => 'BL\PartnerBlCustomerRequestsController@sendRequest',
            'be_route_name' => 'partner-bl-customer-requests-request-send',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 612,
            'controller_id' => 179,
            'action_type_id' => 6,
            'be_route_code' => '/admin/steps/bl/customer/requests/list',
            'be_route_path' => 'BL\StepsBlCustomerRequestsController@list',
            'be_route_name' => 'steps-bl-customer-requests-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);

        /**/
        \App\Models\BeRoute::create([
            'id' => 613,
            'controller_id' => 190,
            'action_type_id' => 6,
            'be_route_code' => '/admin/qt/validations/list',
            'be_route_path' => 'QuestionnaireTemplates\QTValidationsController@list',
            'be_route_name' => 'qt-validations-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);

        /**/
        \App\Models\BeRoute::create([
            'id' => 614,
            'controller_id' => 190,
            'action_type_id' => 5,
            'be_route_code' => '/admin/qt/validations/card',
            'be_route_path' => 'QuestionnaireTemplates\QTValidationsController@card',
            'be_route_name' => 'qt-validations-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);

        /**/
        \App\Models\BeRoute::create([
            'id' => 615,
            'controller_id' => 190,
            'action_type_id' => 8,
            'be_route_code' => '/admin/qt/validations/write',
            'be_route_path' => 'QuestionnaireTemplates\QTValidationsController@write',
            'be_route_name' => 'qt-validations-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);

        /**/
        \App\Models\BeRoute::create([
            'id' => 616,
            'controller_id' => 191,
            'action_type_id' => 6,
            'be_route_code' => '/admin/qt/validation/rules/list',
            'be_route_path' => 'QuestionnaireTemplates\QTValidationRulesController@list',
            'be_route_name' => 'qt-validation-rules-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);

        /**/
        \App\Models\BeRoute::create([
            'id' => 617,
            'controller_id' => 191,
            'action_type_id' => 5,
            'be_route_code' => '/admin/qt/validation/rules/card',
            'be_route_path' => 'QuestionnaireTemplates\QTValidationRulesController@card',
            'be_route_name' => 'qt-validation-rules-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);

        /**/
        \App\Models\BeRoute::create([
            'id' => 618,
            'controller_id' => 191,
            'action_type_id' => 8,
            'be_route_code' => '/admin/qt/validation/rules/write',
            'be_route_path' => 'QuestionnaireTemplates\QTValidationRulesController@write',
            'be_route_name' => 'qt-validation-rules-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 630,
            'controller_id' => 183,
            'action_type_id' => 6,
            'be_route_code' => 'admin/bn/currencies/list',
            'be_route_path' => 'BankNet\BnCurrenciesController@list',
            'be_route_name' => 'bn-currencies-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 631,
            'controller_id' => 183,
            'action_type_id' => 5,
            'be_route_code' => 'admin/bn/currencies/card',
            'be_route_path' => 'BankNet\BnCurrenciesController@card',
            'be_route_name' => 'bn-currencies-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 632,
            'controller_id' => 183,
            'action_type_id' => 8,
            'be_route_code' => 'admin/bn/currencies/write',
            'be_route_path' => 'BankNet\BnCurrenciesController@write',
            'be_route_name' => 'bn-currencies-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 634,
            'controller_id' => 184,
            'action_type_id' => 6,
            'be_route_code' => 'admin/bn/payment/method/list',
            'be_route_path' => 'BankNet\BnPaymentMethodsController@list',
            'be_route_name' => 'bn-payment-method-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 635,
            'controller_id' => 184,
            'action_type_id' => 5,
            'be_route_code' => 'admin/bn/payment/method/card',
            'be_route_path' => 'BankNet\BnPaymentMethodsController@card',
            'be_route_name' => 'bn-payment-method-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 636,
            'controller_id' => 184,
            'action_type_id' => 8,
            'be_route_code' => 'admin/bn/payment/method/write',
            'be_route_path' => 'BankNet\BnPaymentMethodsController@write',
            'be_route_name' => 'bn-payment-method-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 638,
            'controller_id' => 185,
            'action_type_id' => 6,
            'be_route_code' => 'admin/bn/payment/method/groups/list',
            'be_route_path' => 'BankNet\BnPaymentMethodGroupsController@list',
            'be_route_name' => 'bn-payment-method-groups-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 639,
            'controller_id' => 185,
            'action_type_id' => 5,
            'be_route_code' => 'admin/bn/payment/method/groups/card',
            'be_route_path' => 'BankNet\BnPaymentMethodGroupsController@card',
            'be_route_name' => 'bn-payment-method-groups-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 640,
            'controller_id' => 185,
            'action_type_id' => 8,
            'be_route_code' => 'admin/bn/payment/method/groups/write',
            'be_route_path' => 'BankNet\BnPaymentMethodGroupsController@write',
            'be_route_name' => 'bn-payment-method-groups-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 642,
            'controller_id' => 186,
            'action_type_id' => 6,
            'be_route_code' => 'admin/bn/exchangers/list',
            'be_route_path' => 'BankNet\BnExchangersController@list',
            'be_route_name' => 'bn-exchanger-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 643,
            'controller_id' => 186,
            'action_type_id' => 5,
            'be_route_code' => 'admin/bn/exchangers/card',
            'be_route_path' => 'BankNet\BnExchangersController@card',
            'be_route_name' => 'bn-exchanger-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 644,
            'controller_id' => 186,
            'action_type_id' => 8,
            'be_route_code' => 'admin/bn/exchangers/write',
            'be_route_path' => 'BankNet\BnExchangersController@write',
            'be_route_name' => 'bn-exchanger-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 646,
            'controller_id' => 187,
            'action_type_id' => 6,
            'be_route_code' => 'admin/bn/exchange/directions/list',
            'be_route_path' => 'BankNet\BnExchangeDirectionsController@list',
            'be_route_name' => 'bn-exchange-directions-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 647,
            'controller_id' => 187,
            'action_type_id' => 5,
            'be_route_code' => 'admin/bn/exchange/directions/card',
            'be_route_path' => 'BankNet\BnExchangeDirectionsController@card',
            'be_route_name' => 'bn-exchange-directions-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 648,
            'controller_id' => 187,
            'action_type_id' => 8,
            'be_route_code' => 'admin/bn/exchange/directions/write',
            'be_route_path' => 'BankNet\BnExchangeDirectionsController@write',
            'be_route_name' => 'bn-exchange-directions-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 650,
            'controller_id' => 188,
            'action_type_id' => 6,
            'be_route_code' => 'admin/bn/exchange/offers/list',
            'be_route_path' => 'BankNet\BnExchangeOffersController@list',
            'be_route_name' => 'bn-exchange-offers-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 651,
            'controller_id' => 188,
            'action_type_id' => 5,
            'be_route_code' => 'admin/bn/exchange/offers/card',
            'be_route_path' => 'BankNet\BnExchangeOffersController@card',
            'be_route_name' => 'bn-exchange-offers-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 652,
            'controller_id' => 188,
            'action_type_id' => 8,
            'be_route_code' => 'admin/bn/exchange/offers/write',
            'be_route_path' => 'BankNet\BnExchangeOffersController@write',
            'be_route_name' => 'bn-exchange-offers-write',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 653,
            'controller_id' => 188,
            'action_type_id' => 6,
            'be_route_code' => 'bn/exchange/offers/list',
            'be_route_path' => 'BankNet\BnExchangeOffersController@list',
            'be_route_name' => 'bn-exchange-offers-list',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\BeRoute::create([
            'id' => 655,
            'controller_id' => 195,
            'action_type_id' => 5,
            'be_route_code' => 'admin/bank/net/contact/card',
            'be_route_path' => 'BankNet\BnContactsController@card',
            'be_route_name' => 'contact-bank-net-card',
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


    }
}
