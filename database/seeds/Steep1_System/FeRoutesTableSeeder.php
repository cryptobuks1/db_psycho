<?php

use Illuminate\Database\Seeder;

class FeRoutesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\FeRoute::truncate();


        /**/
        \App\Models\FeRoute::create([
            'id' => 1,
            'fe_component_id' => 5,
            'be_route_id' => NULL,
            'caption_code' => 'Error_HomeController/index_404',
            'fe_route_code' => 404,
            'fe_route_name' => 'Ошибка 404',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 2,
            'fe_component_id' => 5,
            'be_route_id' => NULL,
            'caption_code' => 'Error_HomeController/index_403',
            'fe_route_code' => 403,
            'fe_route_name' => 'Ошибка 403',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 3,
            'fe_component_id' => 5,
            'be_route_id' => NULL,
            'caption_code' => 'Error_HomeController/index_500',
            'fe_route_code' => 500,
            'fe_route_name' => 'Ошибка 500',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 4,
            'fe_component_id' => 22,
            'be_route_id' => 401,
            'caption_code' => 'Info_FeUrlsController/index_000',
            'fe_route_code' => '000',
            'fe_route_name' => 'Инфо 000',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 5,
            'fe_component_id' => 22,
            'be_route_id' => 401,
            'caption_code' => 'Info_FeUrlsController/index',
            'fe_route_code' => '',
            'fe_route_name' => NULL,
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 6,
            'fe_component_id' => 3,
            'be_route_id' => NULL,
            'caption_code' => 'Card_HomeController/index_new',
            'fe_route_code' => '*/new',
            'fe_route_name' => 'Новый',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 7,
            'fe_component_id' => 14,
            'be_route_id' => 398,
            'caption_code' => 'Profile_ConsumersController/card',
            'fe_route_code' => 'profile',
            'fe_route_name' => 'Профиль карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 9,
            'fe_component_id' => 19,
            'be_route_id' => NULL,
            'caption_code' => 'TextPage_HomeController/index',
            'fe_route_code' => 'pages',
            'fe_route_name' => NULL,
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 14,
            'fe_component_id' => 10,
            'be_route_id' => 146,
            'caption_code' => 'List_ContractorsController/list',
            'fe_route_code' => 'contractors',
            'fe_route_name' => 'Контрагенты список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 15,
            'fe_component_id' => 3,
            'be_route_id' => 147,
            'caption_code' => 'Card_ContractorsController/card',
            'fe_route_code' => 'contractors/:contractor_id',
            'fe_route_name' => 'Контрагенты карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 16,
            'fe_component_id' => 10,
            'be_route_id' => 150,
            'caption_code' => 'List_ContractorsInfoController/list_contractors',
            'fe_route_code' => 'contractors/:contractor_id/contactInfo',
            'fe_route_name' => 'Контактная информация контрагента список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 17,
            'fe_component_id' => 3,
            'be_route_id' => 149,
            'caption_code' => 'Card_ContractorsInfoController/card_contractors',
            'fe_route_code' => 'contractors/:contractor_id/contactInfo/:contractor_info_id',
            'fe_route_name' => 'Контактная информация контрагента карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 18,
            'fe_component_id' => 10,
            'be_route_id' => 192,
            'caption_code' => 'List_ContractorsCryptoExchangeAccountsController/list',
            'fe_route_code' => 'contractors/:contractor_id/cryptoExchangeAccounts',
            'fe_route_name' => 'Крипто счета биржы список (контрагент)',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 19,
            'fe_component_id' => 3,
            'be_route_id' => 193,
            'caption_code' => 'Card_ContractorsCryptoExchangeAccountsController/card',
            'fe_route_code' => 'contractors/:contractor_id/cryptoExchangeAccounts/:c_account_id',
            'fe_route_name' => 'Крипто счета биржы карточка (контрагент)',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 20,
            'fe_component_id' => 10,
            'be_route_id' => 195,
            'caption_code' => 'List_ContractorsCryptoPlatformAccountsController/list',
            'fe_route_code' => 'contractors/:contractor_id/cryptoPlatformAccounts',
            'fe_route_name' => 'Крипто счета платформы список (контрагент)',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 21,
            'fe_component_id' => 3,
            'be_route_id' => 196,
            'caption_code' => 'Card_ContractorsCryptoPlatformAccountsController/card',
            'fe_route_code' => 'contractors/:contractor_id/cryptoPlatformAccounts/:c_account_id',
            'fe_route_name' => 'Крипто счета платформы карточка (контрагент)',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 22,
            'fe_component_id' => 10,
            'be_route_id' => 177,
            'caption_code' => 'List_BankAccountContractorsController/list',
            'fe_route_code' => 'contractors/:contractor_id/bankAccounts',
            'fe_route_name' => 'Банковские счета список (контрагент)',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 23,
            'fe_component_id' => 3,
            'be_route_id' => 178,
            'caption_code' => 'Card_BankAccountContractorsController/card',
            'fe_route_code' => 'contractors/:contractor_id/bankAccounts/:bank_account_id',
            'fe_route_name' => 'Банковские счета карточка (контрагент)',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 24,
            'fe_component_id' => 10,
            'be_route_id' => 207,
            'caption_code' => 'List_ContractorsCryptoPlatformWalletsController/list',
            'fe_route_code' => 'contractors/:contractor_id/cryptoPlatformWallets',
            'fe_route_name' => 'Крипто кошельки платформы список (контрагент)',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 25,
            'fe_component_id' => 3,
            'be_route_id' => 208,
            'caption_code' => 'Card_ContractorsCryptoPlatformWalletsController/card',
            'fe_route_code' => 'contractors/:contractor_id/cryptoPlatformWallets/:',
            'fe_route_name' => 'Крипто кошельки платформы карточка (контрагент)',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 28,
            'fe_component_id' => 10,
            'be_route_id' => 142,
            'caption_code' => 'List_CompaniesController/list',
            'fe_route_code' => 'companies',
            'fe_route_name' => 'Организации список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 29,
            'fe_component_id' => 3,
            'be_route_id' => 143,
            'caption_code' => 'Card_CompaniesController/card',
            'fe_route_code' => 'companies/:company_id',
            'fe_route_name' => 'Организации карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 30,
            'fe_component_id' => 10,
            'be_route_id' => 144,
            'caption_code' => 'List_CompaniesInfoController/contactInfoList',
            'fe_route_code' => 'companies/:company_id/contactInfo',
            'fe_route_name' => 'Контактная информация организации список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 31,
            'fe_component_id' => 3,
            'be_route_id' => 145,
            'caption_code' => 'Card_CompaniesInfoController/contactInfoCard',
            'fe_route_code' => 'companies/:company_id/contactInfo/:contractor_info_id',
            'fe_route_name' => 'Контактная информация организации карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 32,
            'fe_component_id' => 10,
            'be_route_id' => 189,
            'caption_code' => 'List_CompaniesCryptoExchangeAccountsController/list',
            'fe_route_code' => 'companies/:company_id/cryptoExchangeAccounts',
            'fe_route_name' => 'Крипто счета биржы список (организация)',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 33,
            'fe_component_id' => 3,
            'be_route_id' => 190,
            'caption_code' => 'Card_CompaniesCryptoExchangeAccountsController/card',
            'fe_route_code' => 'companies/:company_id/cryptoExchangeAccounts/:c_account_id',
            'fe_route_name' => 'Крипто счета биржы карточка (организация)',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 34,
            'fe_component_id' => 10,
            'be_route_id' => 198,
            'caption_code' => 'List_CompaniesCryptoPlatformAccountsController/list',
            'fe_route_code' => 'companies/:company_id/cryptoPlatformAccounts',
            'fe_route_name' => 'Крипто счета платформы список (организация)',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 35,
            'fe_component_id' => 3,
            'be_route_id' => 199,
            'caption_code' => 'Card_CompaniesCryptoPlatformAccountsController/card',
            'fe_route_code' => 'companies/:company_id/cryptoPlatformAccounts/:c_account_id',
            'fe_route_name' => 'Крипто счета платформы карточка (организация)',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 36,
            'fe_component_id' => 10,
            'be_route_id' => 180,
            'caption_code' => 'List_BankAccountCompaniesController/list',
            'fe_route_code' => 'companies/:company_id/bankAccounts',
            'fe_route_name' => 'Банковские счета список (организация)',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 37,
            'fe_component_id' => 3,
            'be_route_id' => 181,
            'caption_code' => 'Card_BankAccountCompaniesController/card',
            'fe_route_code' => 'companies/:company_id/bankAccounts/:bank_account_id',
            'fe_route_name' => 'Банковские счета карточка (организация)',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 38,
            'fe_component_id' => 10,
            'be_route_id' => 593,
            'caption_code' => 'List_BlCustomerRequestsController/list_Steps',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 42,
            'fe_component_id' => 10,
            'be_route_id' => 40,
            'caption_code' => 'List_DbAreasController/list',
            'fe_route_code' => 'dbAreas',
            'fe_route_name' => 'Области базы данных список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 43,
            'fe_component_id' => 3,
            'be_route_id' => 41,
            'caption_code' => 'Card_DbAreasController/card',
            'fe_route_code' => 'dbAreas/:db_area_id',
            'fe_route_name' => 'Области базы данных карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 44,
            'fe_component_id' => 10,
            'be_route_id' => 45,
            'caption_code' => 'List_CountriesController/list',
            'fe_route_code' => 'countries',
            'fe_route_name' => 'Страны список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 45,
            'fe_component_id' => 3,
            'be_route_id' => 46,
            'caption_code' => 'Card_CountriesController/card',
            'fe_route_code' => 'countries/:country_id',
            'fe_route_name' => 'Страны карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 46,
            'fe_component_id' => 10,
            'be_route_id' => 48,
            'caption_code' => 'List_CountriesController/regionsList',
            'fe_route_code' => 'countries/:country_id/regions',
            'fe_route_name' => 'Регионы (страны) список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 47,
            'fe_component_id' => 3,
            'be_route_id' => 55,
            'caption_code' => 'Card_RegionsController/card_Country_Region',
            'fe_route_code' => 'countries/:country_id/regions/:region_id',
            'fe_route_name' => 'Регионы (страны) карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 48,
            'fe_component_id' => 10,
            'be_route_id' => 103,
            'caption_code' => 'List_ConsumerAccountsController/list',
            'fe_route_code' => 'consumerAccounts',
            'fe_route_name' => 'Аккаунты пользователей список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 49,
            'fe_component_id' => 3,
            'be_route_id' => 104,
            'caption_code' => 'Card_ConsumerAccountsController/card',
            'fe_route_code' => 'consumerAccounts/:consumer_account_id',
            'fe_route_name' => 'Аккаунты пользователей карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 50,
            'fe_component_id' => 10,
            'be_route_id' => 204,
            'caption_code' => 'List_FileTypesController/list',
            'fe_route_code' => 'fileTypes',
            'fe_route_name' => 'Типы файлов список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 51,
            'fe_component_id' => 3,
            'be_route_id' => 205,
            'caption_code' => 'Card_FileTypesController/card',
            'fe_route_code' => 'fileTypes/:file_type_id',
            'fe_route_name' => 'Типы файлов карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 52,
            'fe_component_id' => 10,
            'be_route_id' => 156,
            'caption_code' => 'List_AttachedDocumentKindController/list',
            'fe_route_code' => 'attachedKind',
            'fe_route_name' => 'Виды прикрепленных документов список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 53,
            'fe_component_id' => 3,
            'be_route_id' => 157,
            'caption_code' => 'Card_AttachedDocumentKindController/card',
            'fe_route_code' => 'attachedKind/:',
            'fe_route_name' => 'Виды прикрепленных документов карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 54,
            'fe_component_id' => 10,
            'be_route_id' => 158,
            'caption_code' => 'List_AttachedDocumentTypeController/list',
            'fe_route_code' => 'attachedType',
            'fe_route_name' => 'Типы прикрепленных документов список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 55,
            'fe_component_id' => 3,
            'be_route_id' => 159,
            'caption_code' => 'Card_AttachedDocumentTypeController/card',
            'fe_route_code' => 'attachedType/:',
            'fe_route_name' => 'Типы прикрепленных документов карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 56,
            'fe_component_id' => 10,
            'be_route_id' => 151,
            'caption_code' => 'List_LanguagesController/list',
            'fe_route_code' => 'languages',
            'fe_route_name' => 'Языки список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 57,
            'fe_component_id' => 3,
            'be_route_id' => 152,
            'caption_code' => 'Card_LanguagesController/card',
            'fe_route_code' => 'languages/:language_id',
            'fe_route_name' => 'Языки карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 58,
            'fe_component_id' => 10,
            'be_route_id' => 30,
            'caption_code' => 'List_ServersDbController/list',
            'fe_route_code' => 'serversDb',
            'fe_route_name' => 'Сервера список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 59,
            'fe_component_id' => 3,
            'be_route_id' => 31,
            'caption_code' => 'Card_ServersDbController/card',
            'fe_route_code' => 'serversDb/:server_id',
            'fe_route_name' => 'Сервера карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 60,
            'fe_component_id' => 10,
            'be_route_id' => 163,
            'caption_code' => 'List_BanksController/list',
            'fe_route_code' => 'banks',
            'fe_route_name' => 'Банк список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 61,
            'fe_component_id' => 3,
            'be_route_id' => 162,
            'caption_code' => 'Card_BanksController/card',
            'fe_route_code' => 'banks/:bank_id',
            'fe_route_name' => 'Банк карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 62,
            'fe_component_id' => 10,
            'be_route_id' => 183,
            'caption_code' => 'List_BankAccountTypesController/list',
            'fe_route_code' => 'bankAccountTypes',
            'fe_route_name' => 'Типы банковских счетов список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 63,
            'fe_component_id' => 3,
            'be_route_id' => 184,
            'caption_code' => 'Card_BankAccountTypesController/card',
            'fe_route_code' => 'bankAccountTypes/:bank_account_types_id',
            'fe_route_name' => 'Типы банковских счетов карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 64,
            'fe_component_id' => 10,
            'be_route_id' => 175,
            'caption_code' => 'List_CryptoTokensController/list',
            'fe_route_code' => 'cryptoTokens',
            'fe_route_name' => 'Крипто токены список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 65,
            'fe_component_id' => 3,
            'be_route_id' => 174,
            'caption_code' => 'Card_CryptoTokensController/card',
            'fe_route_code' => 'cryptoTokens/:crypto_token_id',
            'fe_route_name' => 'Крипто токены карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 66,
            'fe_component_id' => 10,
            'be_route_id' => 201,
            'caption_code' => 'List_ImagesController/list',
            'fe_route_code' => 'images',
            'fe_route_name' => 'Картинки список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 67,
            'fe_component_id' => 3,
            'be_route_id' => 202,
            'caption_code' => 'Card_ImagesController/card',
            'fe_route_code' => 'images/:image_id',
            'fe_route_name' => 'Картинки карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 68,
            'fe_component_id' => 10,
            'be_route_id' => 186,
            'caption_code' => 'List_ImageCategoriesController/list',
            'fe_route_code' => 'imageCategories',
            'fe_route_name' => 'Категории картинок список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 69,
            'fe_component_id' => 3,
            'be_route_id' => 187,
            'caption_code' => 'Card_ImageCategoriesController/card',
            'fe_route_code' => 'imageCategories/:image_category_id',
            'fe_route_name' => 'Категории картинок карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 70,
            'fe_component_id' => 10,
            'be_route_id' => 166,
            'caption_code' => 'List_CurrenciesController/list',
            'fe_route_code' => 'currencies',
            'fe_route_name' => 'Влюта список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 71,
            'fe_component_id' => 3,
            'be_route_id' => 165,
            'caption_code' => 'Card_CurrenciesController/card',
            'fe_route_code' => 'currencies/:currency_id',
            'fe_route_name' => 'Валюта карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 72,
            'fe_component_id' => 10,
            'be_route_id' => 169,
            'caption_code' => 'List_CryptoExchangesController/list',
            'fe_route_code' => 'cryptoExchanges',
            'fe_route_name' => 'Крипто биржы список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 73,
            'fe_component_id' => 3,
            'be_route_id' => 168,
            'caption_code' => 'Card_CryptoExchangesController/card',
            'fe_route_code' => 'cryptoExchanges/:c_exchange_id',
            'fe_route_name' => 'Крипто биржы карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 74,
            'fe_component_id' => 10,
            'be_route_id' => 172,
            'caption_code' => 'List_CryptoPlatformsController/list',
            'fe_route_code' => 'cryptoPlatforms',
            'fe_route_name' => 'Крипто платформы список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 75,
            'fe_component_id' => 3,
            'be_route_id' => 171,
            'caption_code' => 'Card_CryptoPlatformsController/card',
            'fe_route_code' => 'cryptoPlatforms/:c_platform_id',
            'fe_route_name' => 'Крипто платформы карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 76,
            'fe_component_id' => 10,
            'be_route_id' => 94,
            'caption_code' => 'List_CaptionsController/list',
            'fe_route_code' => 'captions',
            'fe_route_name' => 'Надписи список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 77,
            'fe_component_id' => 3,
            'be_route_id' => 93,
            'caption_code' => 'Card_CaptionsController/card',
            'fe_route_code' => 'captions/:caption_id',
            'fe_route_name' => 'Надписи карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 78,
            'fe_component_id' => 10,
            'be_route_id' => 98,
            'caption_code' => 'List_TranslationCaptionsController/list',
            'fe_route_code' => 'translationCaptions',
            'fe_route_name' => 'Переводы надписей список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 79,
            'fe_component_id' => 3,
            'be_route_id' => 100,
            'caption_code' => 'Card_TranslationCaptionsController/card',
            'fe_route_code' => 'translationCaptions/:translation_caption_id',
            'fe_route_name' => 'Переводы надписей карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 80,
            'fe_component_id' => 10,
            'be_route_id' => 35,
            'caption_code' => 'List_DBasesController/list',
            'fe_route_code' => 'dbs',
            'fe_route_name' => 'Базы данных список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 81,
            'fe_component_id' => 3,
            'be_route_id' => 36,
            'caption_code' => 'Card_DBasesController/card',
            'fe_route_code' => 'dbs/:db_id',
            'fe_route_name' => 'Базы данных карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 82,
            'fe_component_id' => 10,
            'be_route_id' => 54,
            'caption_code' => 'List_RegionsController/list',
            'fe_route_code' => 'regions',
            'fe_route_name' => 'Регионы список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 83,
            'fe_component_id' => 3,
            'be_route_id' => 55,
            'caption_code' => 'Card_RegionsController/card_Region',
            'fe_route_code' => 'regions/:region_id',
            'fe_route_name' => 'Регионы карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 84,
            'fe_component_id' => 18,
            'be_route_id' => 400,
            'caption_code' => 'Steps_FeRouteStepsController/index_StepsForDemo',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 85,
            'fe_component_id' => 10,
            'be_route_id' => 16,
            'caption_code' => 'List_DbTypesController/list',
            'fe_route_code' => 'dbTypes',
            'fe_route_name' => 'Типы баз данных список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 86,
            'fe_component_id' => 3,
            'be_route_id' => 17,
            'caption_code' => 'Card_DbTypesController/card',
            'fe_route_code' => 'dbTypes/:db_type_id',
            'fe_route_name' => 'Типы баз данных карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 87,
            'fe_component_id' => 18,
            'be_route_id' => 400,
            'caption_code' => 'Steps_FeRouteStepsController/index',
            'fe_route_code' => 'customerRequests/:requests_id',
            'fe_route_name' => 'Шаги FrontEnd Route',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 88,
            'fe_component_id' => 10,
            'be_route_id' => 579,
            'caption_code' => 'List_BlLeasingCalculationsController/list',
            'fe_route_code' => 'leasingCalculations',
            'fe_route_name' => 'Лизинговые расчеты список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 89,
            'fe_component_id' => 3,
            'be_route_id' => 580,
            'caption_code' => 'Card_BlLeasingCalculationsController/card',
            'fe_route_code' => 'leasingCalculations/:bl_leasing_calculation_id',
            'fe_route_name' => 'Лизинговые расчеты карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 90,
            'fe_component_id' => 10,
            'be_route_id' => 612,
            'caption_code' => 'List_BlCustomerRequestsController/list',
            'fe_route_code' => 'customerRequests',
            'fe_route_name' => 'Обращения клиентов список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 18:00:00',
            'updated_at' => '2019-04-23 18:00:00',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 91,
            'fe_component_id' => 22,
            'be_route_id' => 401,
            'caption_code' => 'Info_FeUrlsController/index_finished',
            'fe_route_code' => 'finished',
            'fe_route_name' => 'Завершено',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-10 16:29:50',
            'updated_at' => '2019-04-10 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 92,
            'fe_component_id' => 3,
            'be_route_id' => 232,
            'caption_code' => 'Card_BlLeasingContractsController/card',
            'fe_route_code' => 'leasingContracts/:bl_leasing_contract_id',
            'fe_route_name' => 'Договор лизинга карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-13 16:29:50',
            'updated_at' => '2019-05-13 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 93,
            'fe_component_id' => 10,
            'be_route_id' => 146,
            'caption_code' => 'List_ContractorsController/list_client',
            'fe_route_code' => 'clients',
            'fe_route_name' => 'Клиенты список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-13 16:29:50',
            'updated_at' => '2019-05-13 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 94,
            'fe_component_id' => 3,
            'be_route_id' => 147,
            'caption_code' => 'Card_ContractorsController/card_client',
            'fe_route_code' => 'clients/:client_id',
            'fe_route_name' => 'Клиенты  карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-13 16:29:50',
            'updated_at' => '2019-05-13 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 95,
            'fe_component_id' => 10,
            'be_route_id' => 150,
            'caption_code' => 'List_ContractorsInfoController/list_client',
            'fe_route_code' => 'clients/:client_id/contactInfo',
            'fe_route_name' => 'Контактная информация клиента список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-13 16:29:50',
            'updated_at' => '2019-05-13 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 96,
            'fe_component_id' => 3,
            'be_route_id' => 149,
            'caption_code' => 'Card_ContractorsInfoController/card_client',
            'fe_route_code' => 'clients/:client_id/contactInfo/:contractor_info_id',
            'fe_route_name' => 'Контактная информация клиента карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-13 16:29:50',
            'updated_at' => '2019-05-13 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 97,
            'fe_component_id' => 10,
            'be_route_id' => 231,
            'caption_code' => 'List_BlLeasingContractsController/list',
            'fe_route_code' => 'leasingContracts',
            'fe_route_name' => 'Договор лизинга список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-15 16:29:50',
            'updated_at' => '2019-05-15 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 98,
            'fe_component_id' => 10,
            'be_route_id' => 403,
            'caption_code' => 'List_BlContractorRequestsController/list',
            'fe_route_code' => 'contractorRequests',
            'fe_route_name' => 'Запросы контрагента список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-15 16:29:50',
            'updated_at' => '2019-05-15 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 99,
            'fe_component_id' => 10,
            'be_route_id' => 404,
            'caption_code' => 'List_BlReportLeasingContractBalanceController/list',
            'fe_route_code' => 'reportsLeasingContractBalance',
            'fe_route_name' => 'Акты взаиморасчетов по договорам лизинга список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-04 16:29:50',
            'updated_at' => '2019-06-04 16:29:50',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 100,
            'fe_component_id' => 10,
            'be_route_id' => 405,
            'caption_code' => 'List_BlInsurancePolicyContractsController/list',
            'fe_route_code' => 'insuranceContracts',
            'fe_route_name' => 'Договоры страхования список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-04 16:29:51',
            'updated_at' => '2019-06-04 16:29:51',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 101,
            'fe_component_id' => 3,
            'be_route_id' => 406,
            'caption_code' => 'Card_BlReportLeasingContractBalanceController/card',
            'fe_route_code' => 'reportsLeasingContractBalance/:bl_report_leasing_contract_balance_id',
            'fe_route_name' => 'Акты взаиморасчетов по договорам лизинга карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-04 16:29:52',
            'updated_at' => '2019-06-04 16:29:52',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 102,
            'fe_component_id' => 10,
            'be_route_id' => 407,
            'caption_code' => 'List_NotificationsController/list',
            'fe_route_code' => 'notifications',
            'fe_route_name' => 'Уведомления список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-04 16:29:53',
            'updated_at' => '2019-06-04 16:29:53',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 103,
            'fe_component_id' => 10,
            'be_route_id' => 408,
            'caption_code' => 'List_BlContractorRequestTypesController/list',
            'fe_route_code' => 'contractorRequestTypes',
            'fe_route_name' => 'Типы запросов контрагентов список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:00',
            'updated_at' => '2019-06-07 12:00:00',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 104,
            'fe_component_id' => 25,
            'be_route_id' => 409,
            'caption_code' => 'RequestCard_BlContractorRequestsController/card',
            'fe_route_code' => 'contractorRequests/:bl_contractor_request_id',
            'fe_route_name' => 'Запросы контрагента карточка запроса',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:00',
            'updated_at' => '2019-06-07 12:00:00',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 105,
            'fe_component_id' => 10,
            'be_route_id' => 410,
            'caption_code' => 'List_BlAdministratorsController/list',
            'fe_route_code' => 'administrators',
            'fe_route_name' => 'Администраторы список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:00',
            'updated_at' => '2019-06-07 12:00:00',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 106,
            'fe_component_id' => 3,
            'be_route_id' => 412,
            'caption_code' => 'Card_BlContractorRequestTypesController/card',
            'fe_route_code' => 'contractorRequestTypes/:bl_contractor_request_type_id',
            'fe_route_name' => 'Типы запросов контрагентов карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:01',
            'updated_at' => '2019-06-07 12:00:01',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 107,
            'fe_component_id' => 23,
            'be_route_id' => 413,
            'caption_code' => 'Faq_FaqController/index',
            'fe_route_code' => 'faq',
            'fe_route_name' => 'FAQ',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 108,
            'fe_component_id' => 3,
            'be_route_id' => 411,
            'caption_code' => 'Card_BlAdministratorsController/card',
            'fe_route_code' => 'administrators/:bl_administrator_id',
            'fe_route_name' => 'Администраторы карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:03',
            'updated_at' => '2019-06-07 12:00:03',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 109,
            'fe_component_id' => 10,
            'be_route_id' => 416,
            'caption_code' => 'List_ActionLogsController/list',
            'fe_route_code' => 'actionLogs',
            'fe_route_name' => 'Логи список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:03',
            'updated_at' => '2019-06-18 12:00:03',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 110,
            'fe_component_id' => 3,
            'be_route_id' => 417,
            'caption_code' => 'Card_ActionLogsController/card',
            'fe_route_code' => 'actionLogs/:action_log_id',
            'fe_route_name' => 'Логи карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:03',
            'updated_at' => '2019-06-18 12:00:03',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 111,
            'fe_component_id' => 3,
            'be_route_id' => 418,
            'caption_code' => 'Card_FaqController/card',
            'fe_route_code' => 'faq/:faq_id',
            'fe_route_name' => 'FAQ карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:04',
            'updated_at' => '2019-06-18 12:00:04',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 112,
            'fe_component_id' => 10,
            'be_route_id' => 593,
            'caption_code' => 'List_BlCustomerRequestsController/list',
            'fe_route_code' => 'customerRequestsDev',
            'fe_route_name' => 'Обращение клиента список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 113,
            'fe_component_id' => 3,
            'be_route_id' => 594,
            'caption_code' => 'Card_BlCustomerRequestsController/card',
            'fe_route_code' => 'customerRequestsDev/:bl_contractor_request_id',
            'fe_route_name' => 'Обращение клиента карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 114,
            'fe_component_id' => 24,
            'be_route_id' => 374,
            'caption_code' => 'AttachedFiles_DbAreaFilesController/list',
            'fe_route_code' => 'RequiredDocuments',
            'fe_route_name' => 'Прикрепленные документы список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 115,
            'fe_component_id' => 10,
            'be_route_id' => 434,
            'caption_code' => 'List_SettlementReconciliationActsController/list',
            'fe_route_code' => 'settlementReconciliationActs',
            'fe_route_name' => 'Акты сверки взаиморасчетов список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 116,
            'fe_component_id' => 25,
            'be_route_id' => 435,
            'caption_code' => 'RequestCard_SettlementReconciliationActsController/card',
            'fe_route_code' => 'settlementReconciliationActs/cardRequest',
            'fe_route_name' => 'Акты сверки взаиморасчетов карточка запроса',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 117,
            'fe_component_id' => 10,
            'be_route_id' => 437,
            'caption_code' => 'List_ServiceAcceptanceActsController/list',
            'fe_route_code' => 'serviceAcceptanceActs',
            'fe_route_name' => 'Акты выполненных работ список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 118,
            'fe_component_id' => 10,
            'be_route_id' => 438,
            'caption_code' => 'List_InvoicesController/list',
            'fe_route_code' => 'invoices',
            'fe_route_name' => 'Счета список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 119,
            'fe_component_id' => 24,
            'be_route_id' => 442,
            'caption_code' => 'AttachedFiles_BlLeasingContractsDbAreaFilesController/list',
            'fe_route_code' => 'leasingContracts/:bl_leasing_contract_id/leasingContractsFiles',
            'fe_route_name' => 'Прикрепленные документы к договору лизинга список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 120,
            'fe_component_id' => 25,
            'be_route_id' => 444,
            'caption_code' => 'RequestCard_InvoicesController/card',
            'fe_route_code' => 'invoices/cardRequest',
            'fe_route_name' => 'Счета карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 121,
            'fe_component_id' => 25,
            'be_route_id' => 445,
            'caption_code' => 'RequestCard_ServiceAcceptanceActsController/card',
            'fe_route_code' => 'serviceAcceptanceActs/cardRequest',
            'fe_route_name' => 'Акты выполненных работ карточка запроса',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 122,
            'fe_component_id' => 10,
            'be_route_id' => 458,
            'caption_code' => 'List_SystemParametersController/list',
            'fe_route_code' => 'systemParameters',
            'fe_route_name' => 'Системные параметры список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 123,
            'fe_component_id' => 3,
            'be_route_id' => 459,
            'caption_code' => 'Card_SystemParametersController/card',
            'fe_route_code' => 'systemParameters/:system_parameter_id',
            'fe_route_name' => 'Системные параметры карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 124,
            'fe_component_id' => 10,
            'be_route_id' => 461,
            'caption_code' => 'List_SystemParametersValuesController/list',
            'fe_route_code' => 'systemParametersValues',
            'fe_route_name' => 'Значения системных параметров список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 125,
            'fe_component_id' => 3,
            'be_route_id' => 462,
            'caption_code' => 'Card_SystemParametersValuesController/card',
            'fe_route_code' => 'systemParametersValues/:system_parameter_value_id',
            'fe_route_name' => 'Значения системных параметров карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 126,
            'fe_component_id' => 10,
            'be_route_id' => 464,
            'caption_code' => 'List_ModelsController/list',
            'fe_route_code' => 'models',
            'fe_route_name' => 'Модели список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 127,
            'fe_component_id' => 3,
            'be_route_id' => 465,
            'caption_code' => 'Card_ModelsController/card',
            'fe_route_code' => 'models/:model_id',
            'fe_route_name' => 'Модели карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 128,
            'fe_component_id' => 10,
            'be_route_id' => 467,
            'caption_code' => 'List_ControllersController/list',
            'fe_route_code' => 'controllers',
            'fe_route_name' => 'Контроллеры список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 129,
            'fe_component_id' => 3,
            'be_route_id' => 468,
            'caption_code' => 'Card_ControllersController/card',
            'fe_route_code' => 'controllers/:controller_id',
            'fe_route_name' => 'Контроллеры карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 130,
            'fe_component_id' => 26,
            'be_route_id' => 470,
            'caption_code' => 'Tree_MenuItemsController/tree',
            'fe_route_code' => 'menuItems',
            'fe_route_name' => 'Меню и его группы/пункты дерево',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 131,
            'fe_component_id' => 10,
            'be_route_id' => 471,
            'caption_code' => 'List_MenuItemsController/list',
            'fe_route_code' => 'menuItemsList',
            'fe_route_name' => 'Меню и его группы/пункты список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 132,
            'fe_component_id' => 3,
            'be_route_id' => 472,
            'caption_code' => 'Card_MenuItemsController/card',
            'fe_route_code' => 'menuItems/:menu_items_id',
            'fe_route_name' => 'Меню и его группы/пункты карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 133,
            'fe_component_id' => 10,
            'be_route_id' => 474,
            'caption_code' => 'List_MenuItemAccessRolesController/list',
            'fe_route_code' => 'menuItemAccessRoles',
            'fe_route_name' => 'Доступы к пунктам меню по ролям список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 134,
            'fe_component_id' => 3,
            'be_route_id' => 475,
            'caption_code' => 'Card_MenuItemAccessRolesController/card',
            'fe_route_code' => 'menuItemAccessRoles/:menu_item_access_role_id',
            'fe_route_name' => 'Доступы к пунктам меню по ролям карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 135,
            'fe_component_id' => 10,
            'be_route_id' => 477,
            'caption_code' => 'List_PaymentInvoicesController/list',
            'fe_route_code' => 'paymentInvoices',
            'fe_route_name' => 'Счета на оплату список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 136,
            'fe_component_id' => 25,
            'be_route_id' => 478,
            'caption_code' => 'RequestCard_PaymentInvoicesController/card',
            'fe_route_code' => 'paymentInvoices/cardRequest',
            'fe_route_name' => 'Счета на оплату карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 137,
            'fe_component_id' => 10,
            'be_route_id' => 301,
            'caption_code' => 'List_BeRoutesController/list',
            'fe_route_code' => 'beRoutes',
            'fe_route_name' => 'Роуты BackEnd список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 138,
            'fe_component_id' => 3,
            'be_route_id' => 300,
            'caption_code' => 'Card_BeRoutesController/card',
            'fe_route_code' => 'beRoutes/:be_route_id',
            'fe_route_name' => 'Роуты BackEnd карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 139,
            'fe_component_id' => 10,
            'be_route_id' => 272,
            'caption_code' => 'List_FeComponentsController/list',
            'fe_route_code' => 'feComponents',
            'fe_route_name' => 'Компоненты на фронте список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 140,
            'fe_component_id' => 3,
            'be_route_id' => 273,
            'caption_code' => 'Card_FeComponentsController/card',
            'fe_route_code' => 'feComponents/:fe_component_id',
            'fe_route_name' => 'Компоненты на фронте карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 141,
            'fe_component_id' => 10,
            'be_route_id' => 319,
            'caption_code' => 'List_FeUrlsController/list',
            'fe_route_code' => 'feUrls',
            'fe_route_name' => 'Параметры в роутах список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 142,
            'fe_component_id' => 3,
            'be_route_id' => 318,
            'caption_code' => 'Card_FeUrlsController/card',
            'fe_route_code' => 'feUrls/:fe_url_id',
            'fe_route_name' => 'Параметры в роутах карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 143,
            'fe_component_id' => 10,
            'be_route_id' => 313,
            'caption_code' => 'List_FeRoutesController/list',
            'fe_route_code' => 'feRoutes',
            'fe_route_name' => 'Роуты передаваемые на фронт список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 144,
            'fe_component_id' => 3,
            'be_route_id' => 312,
            'caption_code' => 'Card_FeRoutesController/card',
            'fe_route_code' => 'feRoutes/:fe_routes_id',
            'fe_route_name' => 'Роуты передаваемые на фронт карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 145,
            'fe_component_id' => 10,
            'be_route_id' => 307,
            'caption_code' => 'List_FeRouteUrlsController/list',
            'fe_route_code' => 'feRouteUrls',
            'fe_route_name' => 'Url роутов список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 146,
            'fe_component_id' => 3,
            'be_route_id' => 306,
            'caption_code' => 'Card_FeRouteUrlsController/card',
            'fe_route_code' => 'feRouteUrls/:fe_route_url_id',
            'fe_route_name' => 'Url роутов карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 147,
            'fe_component_id' => 10,
            'be_route_id' => 283,
            'caption_code' => 'List_FeRouteStepsController/list',
            'fe_route_code' => 'feRouteSteps',
            'fe_route_name' => 'Шаги FrontEnd Route список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 148,
            'fe_component_id' => 3,
            'be_route_id' => 282,
            'caption_code' => 'Card_FeRouteStepsController/card',
            'fe_route_code' => 'feRouteSteps/:fe_route_step_id',
            'fe_route_name' => 'Шаги FrontEnd Route карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 149,
            'fe_component_id' => 10,
            'be_route_id' => 289,
            'caption_code' => 'List_FeRouteObjectsController/list',
            'fe_route_code' => 'feRouteObjects',
            'fe_route_name' => 'Основной объект FrontEnd Route список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 150,
            'fe_component_id' => 3,
            'be_route_id' => 288,
            'caption_code' => 'Card_FeRouteObjectsController/card',
            'fe_route_code' => 'feRouteObjects/:fe_route_object_id',
            'fe_route_name' => 'Основной объект FrontEnd Route карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 151,
            'fe_component_id' => 10,
            'be_route_id' => 295,
            'caption_code' => 'List_FeRouteStepObjectsController/list',
            'fe_route_code' => 'feRouteStepObjects',
            'fe_route_name' => 'Объекты шага FrontEnd Route список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 152,
            'fe_component_id' => 3,
            'be_route_id' => 294,
            'caption_code' => 'Card_FeRouteStepObjectsController/card',
            'fe_route_code' => 'feRouteStepObjects/:fe_route_step_object_id',
            'fe_route_name' => 'Объекты шага FrontEnd Route карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 153,
            'fe_component_id' => 10,
            'be_route_id' => 488,
            'caption_code' => 'List_ActionExchangeLogGroupByController/list',
            'fe_route_code' => 'actionExchangeLogGroupBy',
            'fe_route_name' => 'Обмен итого список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 154,
            'fe_component_id' => 10,
            'be_route_id' => 489,
            'caption_code' => 'List_ActionExchangeLogController/list',
            'fe_route_code' => 'actionExchangeLog',
            'fe_route_name' => 'Обмен логи список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 155,
            'fe_component_id' => 10,
            'be_route_id' => 461,
            'caption_code' => 'List_SystemParametersValuesController/list_InCardOwner',
            'fe_route_code' => 'systemParameters/:system_parameter_id/systemParametersValues',
            'fe_route_name' => 'Значения системных параметров со страницы Системные параметры список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 156,
            'fe_component_id' => 3,
            'be_route_id' => 462,
            'caption_code' => 'Card_SystemParametersValuesController/card_InCardOwner',
            'fe_route_code' => 'systemParameters/:system_parameter_id/systemParametersValues/:system_parameter_value_id',
            'fe_route_name' => 'Значения системных параметров со страницы Системные параметры карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 157,
            'fe_component_id' => 22,
            'be_route_id' => 401,
            'caption_code' => 'Info_FeUrlsController/index_contacts',
            'fe_route_code' => 'contacts',
            'fe_route_name' => 'Контакты',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 158,
            'fe_component_id' => 9,
            'be_route_id' => 494,
            'caption_code' => 'Home_ActionLogsTotalsController/statisticFinish',
            'fe_route_code' => 'statistics',
            'fe_route_name' => 'Статистика',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 159,
            'fe_component_id' => 10,
            'be_route_id' => 98,
            'caption_code' => 'List_TranslationCaptionsController/list_withTranslation',
            'fe_route_code' => 'captions/:caption_id/translationCaptions',
            'fe_route_name' => 'Переводы надписей со страницы Надписей список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 160,
            'fe_component_id' => 3,
            'be_route_id' => 100,
            'caption_code' => 'Card_TranslationCaptionsController/card_withTranslation',
            'fe_route_code' => 'captions/:caption_id/translationCaptions/:translation_caption_id',
            'fe_route_name' => 'Переводы надписей со страницы Надписей карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 161,
            'fe_component_id' => 3,
            'be_route_id' => 475,
            'caption_code' => 'Card_MenuItemAccessRolesController/card_InCardMenuItem',
            'fe_route_code' => 'menuItems/:menu_items_id/menuItemAccessRoles/:menu_item_access_role_id',
            'fe_route_name' => 'Доступы к пунктам меню со страницы Меню по ролям карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 162,
            'fe_component_id' => 10,
            'be_route_id' => 474,
            'caption_code' => 'List_MenuItemAccessRolesController/list_InCardMenuItem',
            'fe_route_code' => 'menuItems/:menu_items_id/menuItemAccessRoles',
            'fe_route_name' => 'Доступы к пунктам меню со страницы Меню по ролям список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 163,
            'fe_component_id' => 3,
            'be_route_id' => 306,
            'caption_code' => 'Card_FeRouteUrlsController/card_inCardFeRoutes',
            'fe_route_code' => 'feRoutes/:fe_routes_id/feRouteUrls/:fe_route_url_id',
            'fe_route_name' => 'FeRoutesUrls со страницы FeRoutes карточка',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 164,
            'fe_component_id' => 10,
            'be_route_id' => 307,
            'caption_code' => 'List_FeRouteUrlsController/list_inCardFeRoutes',
            'fe_route_code' => 'feRoutes/:fe_routes_id/feRouteUrls',
            'fe_route_name' => 'FeRoutesUrls со страницы FeRoutes список',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 165,
            'fe_component_id' => 3,
            'be_route_id' => 500,
            'caption_code' => 'Card_PartnersController/card',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 166,
            'fe_component_id' => 10,
            'be_route_id' => 499,
            'caption_code' => 'List_PartnersController/list',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 167,
            'fe_component_id' => 10,
            'be_route_id' => 502,
            'caption_code' => 'List_ContactPersonsController/list',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 168,
            'fe_component_id' => 3,
            'be_route_id' => 503,
            'caption_code' => 'Card_ContactPersonsController/card',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 169,
            'fe_component_id' => 10,
            'be_route_id' => 505,
            'caption_code' => 'List_ContactPersonInfoController/list',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 170,
            'fe_component_id' => 3,
            'be_route_id' => 506,
            'caption_code' => 'Card_ContactPersonInfoController/card',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 171,
            'fe_component_id' => 10,
            'be_route_id' => 508,
            'caption_code' => 'List_PartnerPointsController/list_FromPartners',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 172,
            'fe_component_id' => 3,
            'be_route_id' => 509,
            'caption_code' => 'Card_PartnerPointsController/card_FromPartners',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 173,
            'fe_component_id' => 10,
            'be_route_id' => 505,
            'caption_code' => 'List_ContactPersonInfoController/list_FromContractors',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 174,
            'fe_component_id' => 3,
            'be_route_id' => 506,
            'caption_code' => 'Card_ContactPersonInfoController/card_FromContractors',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 175,
            'fe_component_id' => 10,
            'be_route_id' => 502,
            'caption_code' => 'List_ContactPersonsController/list_FromContractors',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 176,
            'fe_component_id' => 3,
            'be_route_id' => 503,
            'caption_code' => 'Card_ContactPersonsController/card_FromContractors',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 177,
            'fe_component_id' => 10,
            'be_route_id' => 511,
            'caption_code' => 'List_PartnerRegionsController/list_FromPartners',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 178,
            'fe_component_id' => 3,
            'be_route_id' => 512,
            'caption_code' => 'Card_PartnerRegionsController/card_FromPartners',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 179,
            'fe_component_id' => 10,
            'be_route_id' => 508,
            'caption_code' => 'List_PartnerPointsController/list_FromPartnersPartnerRegions',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 180,
            'fe_component_id' => 3,
            'be_route_id' => 509,
            'caption_code' => 'Card_PartnerPointsController/card_FromPartnersPartnerRegions',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 181,
            'fe_component_id' => 10,
            'be_route_id' => 514,
            'caption_code' => 'List_PartnerEmployeesController/list_FromPartners',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 182,
            'fe_component_id' => 3,
            'be_route_id' => 515,
            'caption_code' => 'Card_PartnerEmployeesController/card_FromPartners',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 183,
            'fe_component_id' => 10,
            'be_route_id' => 517,
            'caption_code' => 'List_PartnerEmployeeContactPersonsController/list_FromPartners',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 184,
            'fe_component_id' => 3,
            'be_route_id' => 518,
            'caption_code' => 'Card_PartnerEmployeeContactPersonsController/card_FromPartners',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 185,
            'fe_component_id' => 10,
            'be_route_id' => 511,
            'caption_code' => 'List_PartnerRegionsController/list',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 186,
            'fe_component_id' => 3,
            'be_route_id' => 512,
            'caption_code' => 'Card_PartnerRegionsController/card',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 187,
            'fe_component_id' => 10,
            'be_route_id' => 508,
            'caption_code' => 'List_PartnerPointsController/list',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 188,
            'fe_component_id' => 3,
            'be_route_id' => 509,
            'caption_code' => 'Card_PartnerPointsController/card',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 189,
            'fe_component_id' => 10,
            'be_route_id' => 502,
            'caption_code' => 'List_ContactPersonsController/list_FromClients',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 190,
            'fe_component_id' => 3,
            'be_route_id' => 503,
            'caption_code' => 'Card_ContactPersonsController/card_FromClients',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 191,
            'fe_component_id' => 10,
            'be_route_id' => 505,
            'caption_code' => 'List_ContactPersonInfoController/list_FromClients',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 192,
            'fe_component_id' => 3,
            'be_route_id' => 506,
            'caption_code' => 'Card_ContactPersonInfoController/card_FromClients',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 193,
            'fe_component_id' => 10,
            'be_route_id' => 520,
            'caption_code' => 'List_UserInterfacesController/list',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 194,
            'fe_component_id' => 3,
            'be_route_id' => 521,
            'caption_code' => 'Card_UserInterfacesController/card',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 195,
            'fe_component_id' => 10,
            'be_route_id' => 523,
            'caption_code' => 'List_AccessAxesController/list',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 196,
            'fe_component_id' => 3,
            'be_route_id' => 524,
            'caption_code' => 'Card_AccessAxesController/card',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 197,
            'fe_component_id' => 10,
            'be_route_id' => 526,
            'caption_code' => 'List_AccessRowParametersController/list',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 198,
            'fe_component_id' => 3,
            'be_route_id' => 527,
            'caption_code' => 'Card_AccessRowParametersController/card',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 199,
            'fe_component_id' => 10,
            'be_route_id' => 508,
            'caption_code' => 'List_PartnerPointsController/list_FromPartnerRegions',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 200,
            'fe_component_id' => 3,
            'be_route_id' => 509,
            'caption_code' => 'Card_PartnerPointsController/card_FromPartnerRegions',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 201,
            'fe_component_id' => 10,
            'be_route_id' => 529,
            'caption_code' => 'List_QTPagesController/list',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 202,
            'fe_component_id' => 3,
            'be_route_id' => 530,
            'caption_code' => 'Card_QTPagesController/card',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 203,
            'fe_component_id' => 10,
            'be_route_id' => 532,
            'caption_code' => 'List_QTBlocksController/list',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 204,
            'fe_component_id' => 3,
            'be_route_id' => 533,
            'caption_code' => 'Card_QTBlocksController/card',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 205,
            'fe_component_id' => 10,
            'be_route_id' => 535,
            'caption_code' => 'List_QTSetsController/list',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 206,
            'fe_component_id' => 3,
            'be_route_id' => 536,
            'caption_code' => 'Card_QTSetsController/card',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 207,
            'fe_component_id' => 10,
            'be_route_id' => 538,
            'caption_code' => 'List_QTQuestionKindsController/list',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 208,
            'fe_component_id' => 3,
            'be_route_id' => 539,
            'caption_code' => 'Card_QTQuestionKindsController/card',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 209,
            'fe_component_id' => 26,
            'be_route_id' => 541,
            'caption_code' => 'Tree_JournalDocumentsController/tree',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 210,
            'fe_component_id' => 10,
            'be_route_id' => 550,
            'caption_code' => 'List_QuestionnaireTemplatesController/list',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 211,
            'fe_component_id' => 3,
            'be_route_id' => 552,
            'caption_code' => 'Card_QuestionnaireTemplatesController/card',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 212,
            'fe_component_id' => 3,
            'be_route_id' => 562,
            'caption_code' => 'Card_QTSetsQuestionsListController/card',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 213,
            'fe_component_id' => 3,
            'be_route_id' => 580,
            'caption_code' => 'Card_BlLeasingCalculationsController/card_Dev',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 214,
            'fe_component_id' => 10,
            'be_route_id' => 579,
            'caption_code' => 'List_BlLeasingCalculationsController',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-18 12:00:05',
            'updated_at' => '2019-06-18 12:00:05',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 215,
            'fe_component_id' => 10,
            'be_route_id' => 565,
            'caption_code' => 'List_CalculationTemplatesController/list',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 216,
            'fe_component_id' => 3,
            'be_route_id' => 566,
            'caption_code' => 'Card_CalculationTemplatesController/card',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 217,
            'fe_component_id' => 3,
            'be_route_id' => 569,
            'caption_code' => 'Card_ExtensionOneAdditionalDetailsController/card',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 218,
            'fe_component_id' => 10,
            'be_route_id' => 392,
            'caption_code' => 'List_OneAdditionalDetailsController/list',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 219,
            'fe_component_id' => 3,
            'be_route_id' => 393,
            'caption_code' => 'Card_OneAdditionalDetailsController/card',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 220,
            'fe_component_id' => 27,
            'be_route_id' => 571,
            'caption_code' => 'Questionnaire_QuestionnaireTemplatesController/questionnairePreview',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 221,
            'fe_component_id' => 3,
            'be_route_id' => 569,
            'caption_code' => 'Card_ExtensionOneAdditionalDetailsController/card_From_OneAD',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 222,
            'fe_component_id' => 10,
            'be_route_id' => 579,
            'caption_code' => 'List_BlLeasingCalculationsController/list_From_CustomerRequests',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 223,
            'fe_component_id' => 3,
            'be_route_id' => 580,
            'caption_code' => 'Card_BlLeasingCalculationsController/card_From_CustomerRequests',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 224,
            'fe_component_id' => 10,
            'be_route_id' => 585,
            'caption_code' => 'List_ClientBlLeasingCalculationsController/list',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 225,
            'fe_component_id' => 10,
            'be_route_id' => 18,
            'caption_code' => 'List_AccessRolesController/list',
            'fe_route_code' => 'List_AccessRolesController',
            'fe_route_name' => 'Список ролей доступов',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 226,
            'fe_component_id' => 3,
            'be_route_id' => 19,
            'caption_code' => 'Card_AccessRolesController/card',
            'fe_route_code' => 'Card_AccessRolesController',
            'fe_route_name' => 'Карточка настройки доступов роли',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);

        /**/
        \App\Models\FeRoute::create([
            'id' => 227,
            'fe_component_id' => 18,
            'be_route_id' => 400,
            'caption_code' => 'Steps_FeRouteStepsController/index_Шаги под анкету',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 1,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);

        /**/
        \App\Models\FeRoute::create([
            'id' => 228,
            'fe_component_id' => 10,
            'be_route_id' => 612,
            'caption_code' => 'List_StepsBlCustomerRequestsController/list_QuestionnaireSteps',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 229,
            'fe_component_id' => 10,
            'be_route_id' => 573,
            'caption_code' => 'List_QTQuestionTypesController/list',
            'fe_route_code' => '',
            'fe_route_name' => 'Типы вопросов',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 230,
            'fe_component_id' => 3,
            'be_route_id' => 574,
            'caption_code' => 'Card_QTQuestionTypesController/card',
            'fe_route_code' => '',
            'fe_route_name' => 'Карточка типа вопроса',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 231,
            'fe_component_id' => 10,
            'be_route_id' => 563,
            'caption_code' => 'List_QTSetsQuestionsListController/list',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 232,
            'fe_component_id' => 10,
            'be_route_id' => 630,
            'caption_code' => 'List_BnCurrenciesController/list',
            'fe_route_code' => '',
            'fe_route_name' => 'Лист валют (BankNet)',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 233,
            'fe_component_id' => 3,
            'be_route_id' => 631,
            'caption_code' => 'Card_BnCurrenciesController/card',
            'fe_route_code' => '',
            'fe_route_name' => 'Карточка валюты (BankNet)',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 234,
            'fe_component_id' => 10,
            'be_route_id' => 634,
            'caption_code' => 'List_BnPaymentMethodsController/list',
            'fe_route_code' => '',
            'fe_route_name' => 'Лист способов/методов оплат (BankNet)',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 235,
            'fe_component_id' => 3,
            'be_route_id' => 635,
            'caption_code' => 'Card_BnPaymentMethodsController/card',
            'fe_route_code' => '',
            'fe_route_name' => 'Карточка способа/метода оплаты (BankNet)',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 236,
            'fe_component_id' => 10,
            'be_route_id' => 638,
            'caption_code' => 'List_BnPaymentMethodGroupsController/list',
            'fe_route_code' => '',
            'fe_route_name' => 'Лист групп направлений обмена (BankNet)',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 237,
            'fe_component_id' => 3,
            'be_route_id' => 639,
            'caption_code' => 'Card_BnPaymentMethodGroupsController/card',
            'fe_route_code' => '',
            'fe_route_name' => 'Карточка группы направления обмена (BankNet)',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 238,
            'fe_component_id' => 10,
            'be_route_id' => 642,
            'caption_code' => 'List_BnExchangersController/list',
            'fe_route_code' => '',
            'fe_route_name' => 'Лист обменников (BankNet)',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 239,
            'fe_component_id' => 3,
            'be_route_id' => 643,
            'caption_code' => 'Card_BnExchangersController/card',
            'fe_route_code' => '',
            'fe_route_name' => 'Карточка обменника (BankNet)',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 240,
            'fe_component_id' => 10,
            'be_route_id' => 646,
            'caption_code' => 'List_BnExchangeDirectionsController/list',
            'fe_route_code' => '',
            'fe_route_name' => 'Лист направлений обмена (BankNet)',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 241,
            'fe_component_id' => 3,
            'be_route_id' => 647,
            'caption_code' => 'Card_BnExchangeDirectionsController/card',
            'fe_route_code' => '',
            'fe_route_name' => 'Карточка направления обмена (BankNet)',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 242,
            'fe_component_id' => 10,
            'be_route_id' => 650,
            'caption_code' => 'List_BnExchangeOffersController/list',
            'fe_route_code' => '',
            'fe_route_name' => 'Лист объявлений (BankNet)',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 243,
            'fe_component_id' => 3,
            'be_route_id' => 651,
            'caption_code' => 'Card_BnExchangeOffersController/card',
            'fe_route_code' => '',
            'fe_route_name' => 'Карточка объявлений (BankNet)',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 244,
            'fe_component_id' => 10,
            'be_route_id' => 613,
            'caption_code' => 'List_QTValidationsController/list',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);

        /**/
        \App\Models\FeRoute::create([
            'id' => 245,
            'fe_component_id' => 3,
            'be_route_id' => 614,
            'caption_code' => 'Card_QTValidationsController/card',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);

        /**/
        \App\Models\FeRoute::create([
            'id' => 246,
            'fe_component_id' => 10,
            'be_route_id' => 616,
            'caption_code' => 'List_QTValidationRulesController/list',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);

        /**/
        \App\Models\FeRoute::create([
            'id' => 247,
            'fe_component_id' => 3,
            'be_route_id' => 617,
            'caption_code' => 'Card_QTValidationRulesController/card',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 248,
            'fe_component_id' => 3,
            'be_route_id' => 655,
            'caption_code' => 'Card_BnContactsController/card',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 249,
            'fe_component_id' => 10,
            'be_route_id' => 653,
            'caption_code' => 'List_BnExchangeOffersController/list',
            'fe_route_code' => '',
            'fe_route_name' => '',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeRoute::create([
            'id' => 250,
            'fe_component_id' => 10,
            'be_route_id' => 495,
            'caption_code' => 'List_LogInAsUsersController/list',
            'fe_route_code' => '',
            'fe_route_name' => 'Список пользователей сайта',
            'parent_id' => NULL,
            'has_children' => 0,
            'use_steps_l' => 0,
            'deleted_l' => 0,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);



        if (config("database.default") == "pgsql") {

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"FeRoutes_id_seq\"', 2000, true)");
        }

    }
}
