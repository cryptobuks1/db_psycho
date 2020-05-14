<?php

use Illuminate\Database\Seeder;

class ModelsTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\ModelTables::truncate();


        /*Модель данных 'Сущности (Контроллеры) для Доступа по Ролям'*/
        \App\Models\ModelTables::create([
            'id' => 1,
            'table_n' => 1,
            'table_code' => 'AccessEntitiesByRole',
            'table_name' => '_AccessEntitiesByRoles',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /*Модель логов действий пользователей в системе*/
        \App\Models\ModelTables::create([
            'id' => 2,
            'table_n' => 2,
            'table_code' => 'ActionLog',
            'table_name' => '__ActionLogs',
            'table_output_template' => 'id',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 3,
            'table_n' => 3,
            'table_code' => 'AccessRole',
            'table_name' => '_AccessRoles',
            'table_output_template' => 'access_role_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 4,
            'table_n' => 4,
            'table_code' => 'AccessType',
            'table_name' => '__AccessTypes',
            'table_output_template' => 'access_type_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 5,
            'table_n' => 5,
            'table_code' => 'ActionType',
            'table_name' => '__ActionTypes',
            'table_output_template' => 'action_type_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 6,
            'table_n' => 6,
            'table_code' => 'Caption',
            'table_name' => '__Captions',
            'table_output_template' => 'caption_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 7,
            'table_n' => 7,
            'table_code' => 'Company',
            'table_name' => 'Companies',
            'table_output_template' => 'company_short_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 8,
            'table_n' => 8,
            'table_code' => 'CompanyInfo',
            'table_name' => 'CompanyInfo',
            'table_output_template' => 'representation',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 9,
            'table_n' => 9,
            'table_code' => 'Consumer',
            'table_name' => 'Consumers',
            'table_output_template' => 'consumer_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 1,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 10,
            'table_n' => 10,
            'table_code' => 'ConsumerAccessRole',
            'table_name' => '_ConsumerAccessRoles',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 11,
            'table_n' => 11,
            'table_code' => 'ConsumerAccessRow',
            'table_name' => 'ConsumerAccessRows',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 12,
            'table_n' => 12,
            'table_code' => 'ConsumerActivityToken',
            'table_name' => 'ConsumerActivityTokens',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 13,
            'table_n' => 13,
            'table_code' => 'Contractor',
            'table_name' => 'Contractors',
            'table_output_template' => 'contractor_short_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 14,
            'table_n' => 14,
            'table_code' => 'ContractorInfo',
            'table_name' => 'ContractorInfo',
            'table_output_template' => 'representation',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 15,
            'table_n' => 15,
            'table_code' => 'Country',
            'table_name' => '_Countries',
            'table_output_template' => 'country_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 16,
            'table_n' => 16,
            'table_code' => 'DataTypes',
            'table_name' => '__DataTypes',
            'table_output_template' => 'data_type_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 17,
            'table_n' => 17,
            'table_code' => 'DbArea',
            'table_name' => '_DbAreas',
            'table_output_template' => 'db_area_code',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 18,
            'table_n' => 18,
            'table_code' => 'DBase',
            'table_name' => '_DBases',
            'table_output_template' => 'db_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 19,
            'table_n' => 19,
            'table_code' => 'DbType',
            'table_name' => '__DbTypes',
            'table_output_template' => 'db_type_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 20,
            'table_n' => 20,
            'table_code' => 'InfoKind',
            'table_name' => '_InfoKinds',
            'table_output_template' => 'info_kind_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 21,
            'table_n' => 21,
            'table_code' => 'InfoType',
            'table_name' => '_InfoTypes',
            'table_output_template' => 'info_type_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 22,
            'table_n' => 22,
            'table_code' => 'BlSalePoints',
            'table_name' => 'blSalePoints',
            'table_output_template' => 'bl_sale_point_name',
            'table_folder' => '\Models\BL',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 23,
            'table_n' => 23,
            'table_code' => 'Language',
            'table_name' => '_Languages',
            'table_output_template' => 'language_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 24,
            'table_n' => 24,
            'table_code' => 'ModelTables',
            'table_name' => '__ModelTables',
            'table_output_template' => 'table_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 25,
            'table_n' => 25,
            'table_code' => 'NameReport',
            'table_name' => 'name_reports',
            'table_output_template' => 'name_report',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 26,
            'table_n' => 26,
            'table_code' => 'NameReportParamReport',
            'table_name' => 'name_report_param_report',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 27,
            'table_n' => 27,
            'table_code' => 'ParamReport',
            'table_name' => 'param_reports',
            'table_output_template' => 'name_param',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 28,
            'table_n' => 28,
            'table_code' => 'Region',
            'table_name' => '_Regions',
            'table_output_template' => 'region_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 29,
            'table_n' => 29,
            'table_code' => 'ServerDb',
            'table_name' => '_ServersDB',
            'table_output_template' => 'server_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 30,
            'table_n' => 30,
            'table_code' => 'SystemOperation',
            'table_name' => 'SystemOperations',
            'table_output_template' => 'sys_oper_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 31,
            'table_n' => 31,
            'table_code' => 'SystemParameter',
            'table_name' => 'SystemParameters',
            'table_output_template' => 'sys_par_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 32,
            'table_n' => 32,
            'table_code' => 'SystemParameterValue',
            'table_name' => 'SystemParametersValues',
            'table_output_template' => 'sys_par_code',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 33,
            'table_n' => 33,
            'table_code' => 'TranslationCaption',
            'table_name' => '_TranslationCaptions',
            'table_output_template' => 'caption_translation',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 34,
            'table_n' => 34,
            'table_code' => 'ZzCompany',
            'table_name' => 'ZzCompanies',
            'table_output_template' => 'company_short_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 35,
            'table_n' => 35,
            'table_code' => 'ZzCompanyInfo',
            'table_name' => 'ZzCompanyInfo',
            'table_output_template' => 'representation',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 36,
            'table_n' => 36,
            'table_code' => 'ZzContractor',
            'table_name' => 'ZzContractors',
            'table_output_template' => 'contractor_short_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 37,
            'table_n' => 37,
            'table_code' => 'ZzContractorInfo',
            'table_name' => 'ZzContractorInfo',
            'table_output_template' => 'representation',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 40,
            'table_n' => 40,
            'table_code' => 'QueueSignal',
            'table_name' => 'queue_signals',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 41,
            'table_n' => 41,
            'table_code' => 'Report',
            'table_name' => 'reports',
            'table_output_template' => 'report_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 42,
            'table_n' => 42,
            'table_code' => 'ReportRequest',
            'table_name' => 'report_requests',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 43,
            'table_n' => 43,
            'table_code' => 'RequestNumber',
            'table_name' => 'request_numbers',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 44,
            'table_n' => 44,
            'table_code' => 'CryptoExchange',
            'table_name' => '_CryptoExchanges',
            'table_output_template' => 'c_exchange_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 45,
            'table_n' => 45,
            'table_code' => 'CryptoPlatform',
            'table_name' => '_CryptoPlatforms',
            'table_output_template' => 'c_platform_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 47,
            'table_n' => 47,
            'table_code' => 'CryptoToken',
            'table_name' => '_CryptoTokens',
            'table_output_template' => 'c_token_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 48,
            'table_n' => 48,
            'table_code' => 'Bank',
            'table_name' => '_Banks',
            'table_output_template' => 'bank_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 49,
            'table_n' => 49,
            'table_code' => 'BankAccountType',
            'table_name' => 'BankAccountTypes',
            'table_output_template' => 'bank_account_type_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 50,
            'table_n' => 50,
            'table_code' => 'Currency',
            'table_name' => '_Currencies',
            'table_output_template' => 'currency_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 51,
            'table_n' => 51,
            'table_code' => 'AttachedDocument',
            'table_name' => 'AttachedDocuments',
            'table_output_template' => 'att_doc_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 52,
            'table_n' => 52,
            'table_code' => 'AttachedDocumentFile',
            'table_name' => 'AttachedDocumentFiles',
            'table_output_template' => 'att_doc_file_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 53,
            'table_n' => 53,
            'table_code' => 'AttachedDocumentFileTitle',
            'table_name' => 'AttachedDocumentFileTitles',
            'table_output_template' => 'att_doc_title_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 54,
            'table_n' => 54,
            'table_code' => 'AttachedDocumentKind',
            'table_name' => 'AttachedDocumentKinds',
            'table_output_template' => 'att_doc_kind_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 55,
            'table_n' => 55,
            'table_code' => 'AttachedDocumentType',
            'table_name' => 'AttachedDocumentTypes',
            'table_output_template' => 'att_doc_type_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 57,
            'table_n' => 57,
            'table_code' => 'ConsumerAccount',
            'table_name' => '_ConsumerAccounts',
            'table_output_template' => 'consumer_account_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 58,
            'table_n' => 58,
            'table_code' => 'OneAdditionalDetail',
            'table_name' => 'OneAdditionalDetail',
            'table_output_template' => 'one_add_detail_name',
            'table_folder' => '\Models\ONE',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 59,
            'table_n' => 59,
            'table_code' => 'RateVAT',
            'table_name' => '_RateVAT',
            'table_output_template' => 'rate_VAT_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 60,
            'table_n' => 60,
            'table_code' => 'BlLeasingObjectType',
            'table_name' => 'blLeasingObjectTypes',
            'table_output_template' => 'bl_leasing_object_type_name',
            'table_folder' => '\Models\BL',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 61,
            'table_n' => 61,
            'table_code' => 'BlLeasingObjectModel',
            'table_name' => 'blLeasingObjectModels',
            'table_output_template' => 'bl_leasing_object_model_name',
            'table_folder' => '\Models\BL',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 62,
            'table_n' => 62,
            'table_code' => 'BlLeasingObjectBrand',
            'table_name' => 'blLeasingObjectBrands',
            'table_output_template' => 'bl_leasing_object_brand_name',
            'table_folder' => '\Models\BL',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 63,
            'table_n' => 63,
            'table_code' => 'BlLegalForm',
            'table_name' => 'blLegalForms',
            'table_output_template' => 'bl_legal_form_name',
            'table_folder' => '\Models\BL',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 64,
            'table_n' => 64,
            'table_code' => 'BlScheduleType',
            'table_name' => 'blScheduleTypes',
            'table_output_template' => 'bl_schedule_type_name',
            'table_folder' => '\Models\BL',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 65,
            'table_n' => 65,
            'table_code' => 'BlStatus',
            'table_name' => 'blStatuses',
            'table_output_template' => 'bl_status_name',
            'table_folder' => '\Models\BL',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 66,
            'table_n' => 66,
            'table_code' => 'PhysicalPerson',
            'table_name' => 'PhysicalPersons',
            'table_output_template' => 'physical_person_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 67,
            'table_n' => 67,
            'table_code' => 'PhysicalPersonInfo',
            'table_name' => 'PhysicalPersonInfo',
            'table_output_template' => 'representation',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 68,
            'table_n' => 68,
            'table_code' => 'BlFileTypeSet',
            'table_name' => 'BlFileTypeSets',
            'table_output_template' => 'bl_file_type_set_name',
            'table_folder' => '\Models\BL',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 69,
            'table_n' => 69,
            'table_code' => 'BlFileTypeSetTabFileType',
            'table_name' => 'blFileTypeSetTabFileTypes',
            'table_output_template' => NULL,
            'table_folder' => '\Models\BL',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 70,
            'table_n' => 70,
            'table_code' => 'BlLeasingObjectGroup',
            'table_name' => 'blLeasingObjectGroups',
            'table_output_template' => 'bl_leasing_object_group_name',
            'table_folder' => '\Models\BL',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 71,
            'table_n' => 71,
            'table_code' => 'BlLeasingCalculation',
            'table_name' => 'blLeasingCalculations',
            'table_output_template' => 'bl_leasing_calculation_number',
            'table_folder' => '\Models\BL',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 1,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 72,
            'table_n' => 72,
            'table_code' => 'BlLeasingCalculationsTabAdditionalDetail',
            'table_name' => 'blLeasingCalculationsTabAdditionalDetails',
            'table_output_template' => NULL,
            'table_folder' => '\Models\BL',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 73,
            'table_n' => 73,
            'table_code' => 'FeUrl',
            'table_name' => 'FeUrls',
            'table_output_template' => 'fe_url_code',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 74,
            'table_n' => 74,
            'table_code' => 'FeRoute',
            'table_name' => 'FeRoutes',
            'table_output_template' => 'fe_route_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 75,
            'table_n' => 75,
            'table_code' => 'FeComponent',
            'table_name' => 'FeComponents',
            'table_output_template' => 'fe_component_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 76,
            'table_n' => 76,
            'table_code' => 'BeRoute',
            'table_name' => 'BeRoutes',
            'table_output_template' => 'be_route_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 77,
            'table_n' => 77,
            'table_code' => 'FeRouteUrl',
            'table_name' => 'FeRouteUrls',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 78,
            'table_n' => 78,
            'table_code' => 'FeRouteStep',
            'table_name' => 'FeRoutesSteps',
            'table_output_template' => 'fe_route_step_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 79,
            'table_n' => 79,
            'table_code' => 'FeRouteObject',
            'table_name' => 'FeRouteObjects',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 80,
            'table_n' => 80,
            'table_code' => 'FeRouteStepObject',
            'table_name' => 'FeRouteStepObjects',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 81,
            'table_n' => 81,
            'table_code' => 'BlCustomerRequest',
            'table_name' => 'blCustomerRequests',
            'table_output_template' => 'bl_customer_request_number',
            'table_folder' => '\Models\BL',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 82,
            'table_n' => 82,
            'table_code' => 'BlCustomerRequestTabLeasingObject',
            'table_name' => 'blCustomerRequestTabLeasingObjects',
            'table_output_template' => NULL,
            'table_folder' => '\Models\BL',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 83,
            'table_n' => 83,
            'table_code' => 'BankAccount',
            'table_name' => 'BankAccounts',
            'table_output_template' => 'bank_account_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 84,
            'table_n' => 84,
            'table_code' => 'Image',
            'table_name' => 'Images',
            'table_output_template' => 'image_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 85,
            'table_n' => 85,
            'table_code' => 'FileType',
            'table_name' => '_FileTypes',
            'table_output_template' => 'file_type_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 86,
            'table_n' => 86,
            'table_code' => 'BlLeasingContract',
            'table_name' => 'blLeasingContracts',
            'table_output_template' => 'contractor_contract_name',
            'table_folder' => '\Models\BL',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 87,
            'table_n' => 87,
            'table_code' => 'ContractorContract',
            'table_name' => 'ContractorContracts',
            'table_output_template' => 'contractor_contract_name',
            'table_folder' => '\Models\BL',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 88,
            'table_n' => 88,
            'table_code' => 'BlLeasingContractSpecification',
            'table_name' => 'blLeasingContractSpecifications',
            'table_output_template' => NULL,
            'table_folder' => '\Models\BL',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 89,
            'table_n' => 89,
            'table_code' => 'BlLeasingContractSpecificationTabLeasingObject',
            'table_name' => 'blLeasingContractSpecificationTabLeasingObjects',
            'table_output_template' => NULL,
            'table_folder' => '\Models\BL',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 90,
            'table_n' => 90,
            'table_code' => 'BlSchedule',
            'table_name' => 'blSchedules',
            'table_output_template' => NULL,
            'table_folder' => '\Models\BL',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 91,
            'table_n' => 91,
            'table_code' => 'BlScheduleArticle',
            'table_name' => 'blScheduleArticles',
            'table_output_template' => NULL,
            'table_folder' => '\Models\BL',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 92,
            'table_n' => 92,
            'table_code' => 'BlAttachedDocumentKind',
            'table_name' => 'BlAttachedDocumentKinds',
            'table_output_template' => NULL,
            'table_folder' => '\Models\BL',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 93,
            'table_n' => 93,
            'table_code' => 'BlRequiredDocument',
            'table_name' => 'BlRequiredDocuments',
            'table_output_template' => NULL,
            'table_folder' => '\Models\BL',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 94,
            'table_n' => 94,
            'table_code' => 'DbAreaFile',
            'table_name' => 'DbAreaFiles',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 1,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 95,
            'table_n' => 95,
            'table_code' => 'StoredFile',
            'table_name' => 'StoredFiles',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 96,
            'table_n' => 96,
            'table_code' => 'MenuItem',
            'table_name' => 'MenuItems',
            'table_output_template' => 'menu_item_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 97,
            'table_n' => 97,
            'table_code' => 'MenuItemAccessRole',
            'table_name' => 'MenuItemAccessRoles',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 98,
            'table_n' => 98,
            'table_code' => 'BlScheduleTabSchedule',
            'table_name' => 'blScheduleTabSchedules',
            'table_output_template' => NULL,
            'table_folder' => '\Models\BL',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 99,
            'table_n' => 99,
            'table_code' => 'FeRouteStep',
            'table_name' => 'FeRoutesSteps',
            'table_output_template' => 'fe_route_step_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 100,
            'table_n' => 100,
            'table_code' => 'Questionnaire',
            'table_name' => 'Questionnaires',
            'table_output_template' => NULL,
            'table_folder' => '\Models\Questionnaires',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 101,
            'table_n' => 101,
            'table_code' => 'QuestionnaireAnswer',
            'table_name' => 'QuestionnaireAnswers',
            'table_output_template' => NULL,
            'table_folder' => '\Models\Questionnaires',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 102,
            'table_n' => 102,
            'table_code' => 'QuestionnaireQuestion',
            'table_name' => 'QuestionnaireQuestions',
            'table_output_template' => NULL,
            'table_folder' => '\Models\Questionnaires',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 103,
            'table_n' => 103,
            'table_code' => 'QuestionnaireQuestionAnswer',
            'table_name' => 'QuestionnaireQuestionAnswers',
            'table_output_template' => NULL,
            'table_folder' => '\Models\Questionnaires',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 104,
            'table_n' => 104,
            'table_code' => 'AppendedFile',
            'table_name' => 'AppendedFiles',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 105,
            'table_n' => 105,
            'table_code' => 'ChangeRequest',
            'table_name' => 'ChangeRequests',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 106,
            'table_n' => 106,
            'table_code' => 'ChangeRequestController',
            'table_name' => 'ChangeRequestControllers',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 107,
            'table_n' => 107,
            'table_code' => 'ChangeRequestControllerField',
            'table_name' => 'ChangeRequestControllerFields',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 108,
            'table_n' => 108,
            'table_code' => 'ChangeRequestControllerFieldValue',
            'table_name' => 'ChangeRequestControllerFieldValues',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 109,
            'table_n' => 109,
            'table_code' => 'Controller',
            'table_name' => '__Controllers',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 110,
            'table_n' => 110,
            'table_code' => 'ControllerLink',
            'table_name' => '__ControllerLinks',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 112,
            'table_n' => 112,
            'table_code' => 'CryptoAccount',
            'table_name' => 'CryptoAccounts',
            'table_output_template' => 'c_account_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 113,
            'table_n' => 113,
            'table_code' => 'CryptoWallet',
            'table_name' => 'CryptoWallets',
            'table_output_template' => 'c_wallet_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 114,
            'table_n' => 114,
            'table_code' => 'DbAreaByAccount',
            'table_name' => '_DbAreaByAccounts',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 115,
            'table_n' => 115,
            'table_code' => 'DbAreaFile',
            'table_name' => 'DbAreaFiles',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 116,
            'table_n' => 116,
            'table_code' => 'DbTypeController',
            'table_name' => '_DbTypeControllers',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 117,
            'table_n' => 117,
            'table_code' => 'DbTypeControllerField',
            'table_name' => '_DbTypeControllerFields',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 118,
            'table_n' => 118,
            'table_code' => 'ImageCategory',
            'table_name' => '_ImageCategories',
            'table_output_template' => 'image_category_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 119,
            'table_n' => 119,
            'table_code' => 'RequiredDocumentKind',
            'table_name' => 'RequiredDocumentKinds',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 120,
            'table_n' => 120,
            'table_code' => 'FeSetsItem',
            'table_name' => '__FeSetsItems',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 121,
            'table_n' => 121,
            'table_code' => 'FeSetsItemsController',
            'table_name' => '__FeSetsItemsControllers',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 122,
            'table_n' => 122,
            'table_code' => 'FeCssClass',
            'table_name' => '__FeCssClasses',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 123,
            'table_n' => 123,
            'table_code' => 'AccessRight',
            'table_name' => '__AccessRights',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 124,
            'table_n' => 124,
            'table_code' => 'AccessRightByRole',
            'table_name' => '_AccessRightByRoles',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 125,
            'table_n' => 125,
            'table_code' => 'BlContractorRequestType',
            'table_name' => 'blContractorRequestTypes',
            'table_output_template' => 'bl_contractor_request_type_name',
            'table_folder' => '\Models\BL',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 126,
            'table_n' => 126,
            'table_code' => 'BlContractorRequest',
            'table_name' => 'blContractorRequests',
            'table_output_template' => 'bl_contractor_request_title',
            'table_folder' => '\Models\BL',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 127,
            'table_n' => 127,
            'table_code' => 'FeItem',
            'table_name' => '__FeItems',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 128,
            'table_n' => 128,
            'table_code' => 'FeSet',
            'table_name' => '__FeSets',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 129,
            'table_n' => 129,
            'table_code' => 'Help',
            'table_name' => 'Help',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 130,
            'table_n' => 130,
            'table_code' => 'Page',
            'table_name' => 'Pages',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 131,
            'table_n' => 131,
            'table_code' => 'HelpAccessRole',
            'table_name' => 'HelpAccessRoles',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 132,
            'table_n' => 132,
            'table_code' => 'BlScheduleTabArticle',
            'table_name' => 'blScheduleTabArticles',
            'table_output_template' => NULL,
            'table_folder' => '\Models\BL',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 133,
            'table_n' => 133,
            'table_code' => 'BlInsurancePolicyContract',
            'table_name' => 'blInsurancePolicyContracts',
            'table_output_template' => 'contractor_contract_name',
            'table_folder' => '\Models\BL',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 134,
            'table_n' => 134,
            'table_code' => 'Notification',
            'table_name' => 'Notifications',
            'table_output_template' => 'notification_title',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 136,
            'table_n' => 136,
            'table_code' => 'FaqDev',
            'table_name' => 'faq',
            'table_output_template' => 'faq_title',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 137,
            'table_n' => 137,
            'table_code' => 'SettlementReconciliationAct',
            'table_name' => 'SettlementReconciliationActs',
            'table_output_template' => NULL,
            'table_folder' => '\Models\BL',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 1,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 138,
            'table_n' => 138,
            'table_code' => 'ServiceAcceptanceAct',
            'table_name' => 'ServiceAcceptanceActs',
            'table_output_template' => NULL,
            'table_folder' => '\Models\BL',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 1,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 139,
            'table_n' => 139,
            'table_code' => 'Invoice',
            'table_name' => 'Invoices',
            'table_output_template' => NULL,
            'table_folder' => '\Models\BL',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 1,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 140,
            'table_n' => 140,
            'table_code' => 'PaymentInvoice',
            'table_name' => 'PaymentInvoices',
            'table_output_template' => NULL,
            'table_folder' => '\Models\BL',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 1,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 141,
            'table_n' => 141,
            'table_code' => 'ActionLogsTotal',
            'table_name' => '__ActionLogsTotal',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 1,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 142,
            'table_n' => 142,
            'table_code' => 'BlInsurancePolicyContractTabLeasingContract',
            'table_name' => 'blInsurancePolicyContractTabLeasingContracts',
            'table_output_template' => NULL,
            'table_folder' => '\Models\BL',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 143,
            'table_n' => 143,
            'table_code' => 'Partner',
            'table_name' => 'Partners',
            'table_output_template' => 'partner_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 144,
            'table_n' => 144,
            'table_code' => 'ContactPerson',
            'table_name' => 'ContactPersons',
            'table_output_template' => 'contact_person_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 145,
            'table_n' => 145,
            'table_code' => 'ContactPersonInfo',
            'table_name' => 'ContactPersonInfo',
            'table_output_template' => 'representation',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 146,
            'table_n' => 146,
            'table_code' => 'PartnerPoint',
            'table_name' => 'PartnerPoints',
            'table_output_template' => 'partner_point_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 147,
            'table_n' => 147,
            'table_code' => 'PartnerRegion',
            'table_name' => 'PartnerRegions',
            'table_output_template' => 'partner_regions_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 148,
            'table_n' => 148,
            'table_code' => 'PartnerEmployee',
            'table_name' => 'PartnerEmployees',
            'table_output_template' => 'partner_employee_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 149,
            'table_n' => 149,
            'table_code' => 'PartnerEmployeeContactPerson',
            'table_name' => 'PartnerEmployeeContactPersons',
            'table_output_template' => 'contact_person_id',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 150,
            'table_n' => 150,
            'table_code' => 'UserInterface',
            'table_name' => '__UserInterfaces',
            'table_output_template' => "user_interface_name",
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 151,
            'table_n' => 151,
            'table_code' => 'AccessAxis',
            'table_name' => '__AccessAxes',
            'table_output_template' => 'access_axis_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 152,
            'table_n' => 152,
            'table_code' => 'AccessAxesParameter',
            'table_name' => '__AccessAxesParameters',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 153,
            'table_n' => 153,
            'table_code' => 'AccessRowParameter',
            'table_name' => '__AccessRowParameters',
            'table_output_template' => 'parameter_code',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 154,
            'table_n' => 154,
            'table_code' => 'PartnerPointsTabContractor',
            'table_name' => 'PartnerPointsTabContractors',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 155,
            'table_n' => 155,
            'table_code' => 'QTPage',
            'table_name' => 'QTPages',
            'table_output_template' => 'page_name',
            'table_folder' => '\Models\QuestionnaireTemplates',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 156,
            'table_n' => 156,
            'table_code' => 'QTBlock',
            'table_name' => 'QTBlocks',
            'table_output_template' => 'block_name',
            'table_folder' => '\Models\QuestionnaireTemplates',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 157,
            'table_n' => 157,
            'table_code' => 'QTSet',
            'table_name' => 'QTSets',
            'table_output_template' => 'question_set_name',
            'table_folder' => '\Models\QuestionnaireTemplates',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 158,
            'table_n' => 158,
            'table_code' => 'QTQuestionKind',
            'table_name' => 'QTQuestionKinds',
            'table_output_template' => 'question_kind_name',
            'table_folder' => '\Models\QuestionnaireTemplates',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 159,
            'table_n' => 159,
            'table_code' => 'QuestionnaireTemplate',
            'table_name' => 'QuestionnaireTemplates',
            'table_output_template' => 'questionnaire_templates_name',
            'table_folder' => '\Models\QuestionnaireTemplates',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 160,
            'table_n' => 160,
            'table_code' => 'QTSetsQuestionsList',
            'table_name' => 'QTSetsQuestionsList',
            'table_output_template' => 'question_name',
            'table_folder' => '\Models\QuestionnaireTemplates',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 161,
            'table_n' => 161,
            'table_code' => 'ExtensionOneAdditionalDetail',
            'table_name' => 'ExtensionOneAdditionalDetails',
            'table_output_template' => 'one_additional_detail_code',
            'table_folder' => '\Models',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 162,
            'table_n' => 162,
            'table_code' => 'CalculationParameterType',
            'table_name' => 'CalculationParameterTypes',
            'table_output_template' => 'calculation_parameter_type_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 163,
            'table_n' => 163,
            'table_code' => 'CalculationParameterAnswerList',
            'table_name' => 'CalculationParameterAnswerList',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 164,
            'table_n' => 164,
            'table_code' => 'CalculationTemplateParameterSetting',
            'table_name' => 'CalculationTemplateParameterSettings',
            'table_output_template' => NULL,
            'table_folder' => '\Models',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 165,
            'table_n' => 165,
            'table_code' => 'CalculationTemplate',
            'table_name' => 'CalculationTemplates',
            'table_output_template' => 'calculation_template_name',
            'table_folder' => '\Models',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 166,
            'table_n' => 166,
            'table_code' => 'QTQuestionAnswerList',
            'table_name' => 'QTQuestionAnswerList',
            'table_output_template' => NULL,
            'table_folder' => '\Models\QuestionnaireTemplates',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 167,
            'table_n' => 167,
            'table_code' => 'QTQuestionType',
            'table_name' => 'QTQuestionTypes',
            'table_output_template' => 'question_type_name',
            'table_folder' => '\Models\QuestionnaireTemplates',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 168,
            'table_n' => 168,
            'table_code' => 'QTQuestionTable',
            'table_name' => 'QTQuestionTables',
            'table_output_template' => 'id',
            'table_folder' => '\Models\QuestionnaireTemplates',
            'use_db_area_l' => 1,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 169,
            'table_n' => 169,
            'table_code' => 'QTQuestionTableAttribute',
            'table_name' => 'QTQuestionTableAttributes',
            'table_output_template' => 'id',
            'table_folder' => '\Models\QuestionnaireTemplates',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 170,
            'table_n' => 170,
            'table_code' => 'BlCustomerRequestTabComment',
            'table_name' => 'blCustomerRequestTabComments',
            'table_output_template' => 'id',
            'table_folder' => '\Models\BL',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);

        /**/
        \App\Models\ModelTables::create([
            'id' => 171,
            'table_n' => 171,
            'table_code' => 'Questionnaire',
            'table_name' => 'Questionnaire',
            'table_output_template' => 'id',
            'table_folder' => '\Models\Questionnaires',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
            ]);

        /**/
        \App\Models\ModelTables::create([
            'id' => 172,
            'table_n' => 172,
            'table_code' => 'QTQuestionValidationRule',
            'table_name' => 'QTQuestionValidationRules',
            'table_output_template' => 'id',
            'table_folder' => '\Models\QuestionnaireTemplates',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
	        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 173,
            'table_n' => 173,
            'table_code' => 'BnCurrency',
            'table_name' => 'bnCurrencies',
            'table_output_template' => 'currency_name',
            'table_folder' => '\Models\BankNet',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 174,
            'table_n' => 174,
            'table_code' => 'BnPaymentMethod',
            'table_name' => 'bnPaymentMethods',
            'table_output_template' => 'payment_method_name',
            'table_folder' => '\Models\BankNet',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 175,
            'table_n' => 175,
            'table_code' => 'BnPaymentMethodGroup',
            'table_name' => 'bnPaymentMethodGroups',
            'table_output_template' => 'payment_method_group_name',
            'table_folder' => '\Models\BankNet',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 176,
            'table_n' => 176,
            'table_code' => 'BnExchangeDirection',
            'table_name' => 'bnExchangeDirections',
            'table_output_template' => 'exchange_direction_name',
            'table_folder' => '\Models\BankNet',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 177,
            'table_n' => 177,
            'table_code' => 'BnExchanger',
            'table_name' => 'bnExchangers',
            'table_output_template' => 'exchanger_name',
            'table_folder' => '\Models\BankNet',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 178,
            'table_n' => 178,
            'table_code' => 'BnExchangeOffer',
            'table_name' => 'bnExchangeOffers',
            'table_output_template' => 'id',
            'table_folder' => '\Models\BankNet',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
        ]);

        /**/
        \App\Models\ModelTables::create([
            'id' => 179,
            'table_n' => 179,
            'table_code' => 'QTAnswerScenario',
            'table_name' => 'QTAnswerScenarios',
            'table_output_template' => 'id',
            'table_folder' => '\Models\QuestionnaireTemplates',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
            ]);


        /**/
        \App\Models\ModelTables::create([
            'id' => 180,
            'table_n' => 180,
            'table_code' => 'QTValidation',
            'table_name' => 'QTValidations',
            'table_output_template' => 'id',
            'table_folder' => '\Models\QuestionnaireTemplates',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
            ]);

        /**/
        \App\Models\ModelTables::create([
            'id' => 181,
            'table_n' => 181,
            'table_code' => 'QTValidationRule',
            'table_name' => 'QTValidationRules',
            'table_output_template' => 'id',
            'table_folder' => '\Models\QuestionnaireTemplates',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
            ]);

        /**/
        \App\Models\ModelTables::create([
            'id' => 182,
            'table_n' => 182,
            'table_code' => 'QTDependentField',
            'table_name' => 'QTDependentFields',
            'table_output_template' => 'id',
            'table_folder' => '\Models\QuestionnaireTemplates',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
            ]);

        /**/
        \App\Models\ModelTables::create([
            'id' => 183,
            'table_n' => 183,
            'table_code' => 'Bookmark',
            'table_name' => 'bookmarks',
            'table_output_template' => 'id',
            'table_folder' => '\Models',
            'use_db_area_l' => 0,
            'use_stored_file_l' => 0,
            ]);

        if (config("database.default") == "pgsql") {

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"__ModelTables_id_seq\"', 1000, true)");
        }

    }
}
