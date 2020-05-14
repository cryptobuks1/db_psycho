<?php

use Illuminate\Database\Seeder;

class ControllersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\Controller::truncate();

        /**/
        \App\Models\Controller::create([
            'id' => 1,
            'controller_code' => 'AccessesController',
            'controller_alias' => 'Accesses',
            'controller_name' => 'Accesses Controller',
            'controller_table_n' => NULL,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'Accesses',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 4,
            'controller_code' => 'ContractorsController',
            'controller_alias' => 'Contractors',
            'controller_name' => 'Contractors Controller',
            'controller_table_n' => 13,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'CatalogContractors',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 5,
            'controller_code' => 'LanguagesController',
            'controller_alias' => 'Languages',
            'controller_name' => 'Languages Controller',
            'controller_table_n' => 23,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'Languages',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 6,
            'controller_code' => 'ConsumersController',
            'controller_alias' => 'Consumers',
            'controller_name' => 'Consumers Controller',
            'controller_table_n' => 9,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'Consumers',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 7,
            'controller_code' => 'CaptionsController',
            'controller_alias' => 'Captions',
            'controller_name' => 'Captions Controller',
            'controller_table_n' => 6,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'Captions',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 8,
            'controller_code' => 'CompaniesController',
            'controller_alias' => 'Companies',
            'controller_name' => 'Company Controller',
            'controller_table_n' => 7,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'CatalogCompanies',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 9,
            'controller_code' => 'ServersDbController',
            'controller_alias' => 'ServersDb',
            'controller_name' => 'Servers Db Controller',
            'controller_table_n' => 29,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'ServersDb',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 10,
            'controller_code' => 'TranslationCaptionsController',
            'controller_alias' => 'TranslationCaptions',
            'controller_name' => 'Translation CaptionsController',
            'controller_table_n' => 33,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'TranslationCaptions',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 11,
            'controller_code' => 'DBasesController',
            'controller_alias' => 'DBases',
            'controller_name' => 'Data Bases Controller',
            'controller_table_n' => 18,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'DBases',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 12,
            'controller_code' => 'DbTypesController',
            'controller_alias' => 'DbTypes',
            'controller_name' => 'Db TypesController',
            'controller_table_n' => 19,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'DbTypes',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 13,
            'controller_code' => 'CountriesController',
            'controller_alias' => 'Countries',
            'controller_name' => 'CountriesController',
            'controller_table_n' => 15,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'CatalogCountries',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 14,
            'controller_code' => 'ContractorsInfoController',
            'controller_alias' => 'ContractorsInfo',
            'controller_name' => 'ContractorsInfoController',
            'controller_table_n' => 14,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'ContractorsInfo',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 15,
            'controller_code' => 'RegionsController',
            'controller_alias' => 'Regions',
            'controller_name' => 'RegionsController',
            'controller_table_n' => 28,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'Regions',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 17,
            'controller_code' => 'DbAreasController',
            'controller_alias' => 'DbAreas',
            'controller_name' => 'Db Areas Controller',
            'controller_table_n' => 17,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'DbAreas',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 18,
            'controller_code' => 'AttachedDocumentKindController',
            'controller_alias' => 'AttachedDocumentKind',
            'controller_name' => 'Attached Document Kind Controller',
            'controller_table_n' => 54,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'AttachedDocumentKind',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 19,
            'controller_code' => 'AttachedDocumentTypeController',
            'controller_alias' => 'AttachedDocumentType',
            'controller_name' => 'AttachedDocumentTypeController',
            'controller_table_n' => 55,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'AttachedDocumentType',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 21,
            'controller_code' => 'ConsumerAccountsController',
            'controller_alias' => 'ConsumerAccounts',
            'controller_name' => 'Consumer Accounts Controller',
            'controller_table_n' => 57,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'ConsumerAccounts',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 22,
            'controller_code' => 'AccessRolesController',
            'controller_alias' => 'AccessRoles',
            'controller_name' => 'Access Roles Controller',
            'controller_table_n' => 3,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'AccessRoles',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 23,
            'controller_code' => 'AccessTypesController',
            'controller_alias' => 'AccessTypes',
            'controller_name' => 'Access Types Controller',
            'controller_table_n' => 4,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'AccessTypes',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 24,
            'controller_code' => 'ConsumerAccessRolesController',
            'controller_alias' => 'ConsumerAccessRoles',
            'controller_name' => 'Consumer Access Roles Controller',
            'controller_table_n' => 10,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'ConsumerAccessRoles',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 25,
            'controller_code' => 'ConsumerAccessRowController',
            'controller_alias' => 'ConsumerAccessRow',
            'controller_name' => 'Consumer Access Row Controller',
            'controller_table_n' => 11,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'ConsumerAccessRow',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 26,
            'controller_code' => 'ActionLogsController',
            'controller_alias' => 'ActionLogs',
            'controller_name' => 'Action Logs Controller',
            'controller_table_n' => 2,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'ActionLogs',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 27,
            'controller_code' => 'InfoKindsController',
            'controller_alias' => 'InfoKinds',
            'controller_name' => 'Info Kinds',
            'controller_table_n' => 20,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'CatalogInfoKinds',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 28,
            'controller_code' => 'InfoTypesController',
            'controller_alias' => 'InfoTypes',
            'controller_name' => 'Info Types Controller',
            'controller_table_n' => 21,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'EnumerationInfoTypes',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 30,
            'controller_code' => 'CompaniesInfoController',
            'controller_alias' => 'CompaniesInfo',
            'controller_name' => 'Companies Info Controller',
            'controller_table_n' => 8,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'CompaniesInfo',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 31,
            'controller_code' => 'CompaniesReportController',
            'controller_alias' => 'CompaniesReport',
            'controller_name' => 'Companies Report',
            'controller_table_n' => 41,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'CompaniesReport',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 32,
            'controller_code' => 'AuthController',
            'controller_alias' => 'Auth',
            'controller_name' => 'Auth',
            'controller_table_n' => NULL,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'Auth',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 34,
            'controller_code' => 'ActionTypesController',
            'controller_alias' => 'ActionTypes',
            'controller_name' => 'ActionTypes Controller',
            'controller_table_n' => 5,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'ActionTypes',
        ]);


        /*AuthController для поступа пользователям по API*/
        \App\Models\Controller::create([
            'id' => 41,
            'controller_code' => 'LangController',
            'controller_alias' => 'Lang',
            'controller_name' => 'Lang Controller',
            'controller_table_n' => 23,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'Lang',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 46,
            'controller_code' => 'CryptoExchangesController',
            'controller_alias' => 'CryptoExchanges',
            'controller_name' => 'Crypto Exchanges Controller',
            'controller_table_n' => 44,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'CryptoExchanges',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 47,
            'controller_code' => 'CryptoPlatformsController',
            'controller_alias' => 'CryptoPlatforms',
            'controller_name' => 'Crypto Platforms Controller',
            'controller_table_n' => 45,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'CryptoPlatforms',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 48,
            'controller_code' => 'CryptoTokensController',
            'controller_alias' => 'CryptoTokens',
            'controller_name' => 'Crypto Tokens Controller',
            'controller_table_n' => 47,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'CryptoTokens',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 49,
            'controller_code' => 'BankAccountTypesController',
            'controller_alias' => 'BankAccountTypes',
            'controller_name' => 'Bank Account Types Controller',
            'controller_table_n' => 49,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'BankAccountTypes',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 50,
            'controller_code' => 'BanksController',
            'controller_alias' => 'Banks',
            'controller_name' => 'Banks Controller',
            'controller_table_n' => 48,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'Banks',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 51,
            'controller_code' => 'CurrenciesController',
            'controller_alias' => 'Currencies',
            'controller_name' => 'Currencies Controller',
            'controller_table_n' => 50,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'CatalogCurrencies',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 53,
            'controller_code' => 'BankAccountContractorsController',
            'controller_alias' => 'BankAccountContractors',
            'controller_name' => 'Bank Account Contractors Controller',
            'controller_table_n' => 83,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'BankAccountContractors',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 54,
            'controller_code' => 'BankAccountTypesController',
            'controller_alias' => 'BankAccountTypes',
            'controller_name' => 'Bank Account Types Controller',
            'controller_table_n' => 49,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'BankAccountTypes',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 55,
            'controller_code' => 'ImageCategoriesController',
            'controller_alias' => 'ImageCategories',
            'controller_name' => 'Image Categories Controller',
            'controller_table_n' => 84,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'ImageCategories',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 60,
            'controller_code' => 'ImagesController',
            'controller_alias' => 'Images',
            'controller_name' => 'Images Controller',
            'controller_table_n' => 84,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'Images',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 61,
            'controller_code' => 'FileTypesController',
            'controller_alias' => 'FileTypes',
            'controller_name' => 'File Types Controller',
            'controller_table_n' => 85,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'CatalogFileTypes',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 63,
            'controller_code' => 'AttachedDocumentFilesController',
            'controller_alias' => 'AttachedDocumentFiles',
            'controller_name' => 'Attached Document Files Controller',
            'controller_table_n' => 52,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'AttachedDocumentFiles',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 64,
            'controller_code' => 'AttachedDocumentsController',
            'controller_alias' => 'AttachedDocuments',
            'controller_name' => 'Attached Documents Controller',
            'controller_table_n' => 51,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'AttachedDocuments',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 65,
            'controller_code' => 'AttachedDocumentFileTitlesController',
            'controller_alias' => 'AttachedDocumentFileTitles',
            'controller_name' => 'Attached Document File Titles Controller',
            'controller_table_n' => 53,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'AttachedDocumentFileTitles',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 66,
            'controller_code' => 'BlScheduleTabScheduleController',
            'controller_alias' => 'BlScheduleTabSchedule',
            'controller_name' => 'Schedule Tab Schedule Controller',
            'controller_table_n' => 98,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'BlScheduleTabSchedule',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 67,
            'controller_code' => 'BlScheduleTabArticlesController',
            'controller_alias' => 'BlScheduleTabArticles',
            'controller_name' => 'Schedule Tab Articles Controller',
            'controller_table_n' => 132,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'BlScheduleTabArticles',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 68,
            'controller_code' => 'ChangeLoginController',
            'controller_alias' => 'ChangeLogin',
            'controller_name' => 'Change Login Controller',
            'controller_table_n' => NULL,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'ChangeLogin',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 69,
            'controller_code' => 'CaptionController',
            'controller_alias' => 'Caption',
            'controller_name' => 'Caption Controller',
            'controller_table_n' => 6,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'Caption',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 70,
            'controller_code' => 'PhysicalPersonsController',
            'controller_alias' => 'PhysicalPersons',
            'controller_name' => 'Physical Persons Controller',
            'controller_table_n' => 66,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'CatalogPhysicalPersons',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 71,
            'controller_code' => 'PhysicalPersonInfoController',
            'controller_alias' => 'PhysicalPersonInfo',
            'controller_name' => 'Physical PersonInfo Controller',
            'controller_table_n' => 67,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'PhysicalPersonInfo',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 72,
            'controller_code' => 'BlLeasingCalculationsController',
            'controller_alias' => 'BlLeasingCalculations',
            'controller_name' => 'Bl Leasing Calculations Controller',
            'controller_table_n' => 71,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'DocumentBlLeasingCalculation',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 73,
            'controller_code' => 'BlLeasingCalculationsTabAdditionalDetailsController',
            'controller_alias' => 'BlLeasingCalculationsTabAdditionalDetails',
            'controller_name' => 'Bl Leasing Calculations Tab Additional Details Controller',
            'controller_table_n' => 72,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'BlLeasingCalculationsTabAdditionalDetails',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 74,
            'controller_code' => 'BlLeasingContractsController',
            'controller_alias' => 'BlLeasingContracts',
            'controller_name' => 'BlLeasing Contracts Controller',
            'controller_table_n' => 86,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'DocumentBlLeasingContract',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 75,
            'controller_code' => 'ContractorContractsController',
            'controller_alias' => 'ContractorContracts',
            'controller_name' => 'Contractor Contracts Controller',
            'controller_table_n' => 87,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'CatalogContractorContracts',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 76,
            'controller_code' => 'BlLeasingContractSpecificationsController',
            'controller_alias' => 'BlLeasingContractSpecifications',
            'controller_name' => 'BlLeasing Contract Specifications Controller',
            'controller_table_n' => 88,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'DocumentBlLeasingContractSpecification',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 77,
            'controller_code' => 'BlLeasContSpecTabLeasObjectsController',
            'controller_alias' => 'BlLeasContSpecTabLeasObjects',
            'controller_name' => 'Bl Leas Cont Spec Tab Leas Objects Controller',
            'controller_table_n' => 89,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'BlLeasContSpecTabLeasObjects',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 78,
            'controller_code' => 'BlSchedulesController',
            'controller_alias' => 'BlSchedules',
            'controller_name' => 'Bl Schedules Controller',
            'controller_table_n' => 90,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'CatalogBlSchedules',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 79,
            'controller_code' => 'BlScheduleArticlesController',
            'controller_alias' => 'BlScheduleArticles',
            'controller_name' => 'Bl Schedule Articles Controller',
            'controller_table_n' => 91,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'CCTBlScheduleArticles',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 80,
            'controller_code' => 'BlLeasingObjectGroupsController',
            'controller_alias' => 'BlLeasingObjectGroups',
            'controller_name' => 'Bl Leasing Object Groups Controller',
            'controller_table_n' => 70,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'CatalogBlLeasingObjectGroups',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 81,
            'controller_code' => 'FeComponentsController',
            'controller_alias' => 'FeComponents',
            'controller_name' => 'Fe Components Controller',
            'controller_table_n' => 75,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'FeComponents',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 82,
            'controller_code' => 'FeRouteStepsController',
            'controller_alias' => 'FeRouteSteps',
            'controller_name' => 'Fe Route Steps Controller',
            'controller_table_n' => 78,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'FeRouteSteps',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 83,
            'controller_code' => 'FeRouteObjectsController',
            'controller_alias' => 'FeRouteObjects',
            'controller_name' => 'Fe Route Objects Controller',
            'controller_table_n' => 79,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'FeRouteObjects',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 84,
            'controller_code' => 'FeRouteStepObjectsController',
            'controller_alias' => 'FeRouteStepObjects',
            'controller_name' => 'Fe Route Step Objects Controller',
            'controller_table_n' => 80,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'FeRouteStepObjects',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 85,
            'controller_code' => 'BeRoutesController',
            'controller_alias' => 'BeRoutes',
            'controller_name' => 'Be Routes Controller',
            'controller_table_n' => 76,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'BeRoutes',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 86,
            'controller_code' => 'FeRouteUrlsController',
            'controller_alias' => 'FeRouteUrls',
            'controller_name' => 'Fe Route Urls Controller',
            'controller_table_n' => 77,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'FeRouteUrls',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 87,
            'controller_code' => 'FeRoutesController',
            'controller_alias' => 'FeRoutes',
            'controller_name' => 'Fe Routes Controller',
            'controller_table_n' => 74,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'FeRoutes',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 88,
            'controller_code' => 'FeUrlsController',
            'controller_alias' => 'FeUrls',
            'controller_name' => 'Fe Urls Controller',
            'controller_table_n' => 73,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'FeUrls',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 89,
            'controller_code' => 'BlAttachedDocumentKindsController',
            'controller_alias' => 'BlAttachedDocumentKinds',
            'controller_name' => 'Bl Attached Document Kinds Controller',
            'controller_table_n' => 92,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'CatalogAttachedDocumentKind',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 90,
            'controller_code' => 'BlFileTypeSetsController',
            'controller_alias' => 'BlFileTypeSets',
            'controller_name' => 'Bl File Type Sets Controller',
            'controller_table_n' => 68,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'CatalogBlFileTypeSets',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 91,
            'controller_code' => 'BlFileTypeSetTabFileTypesController',
            'controller_alias' => 'BlFileTypeSetTabFileTypes',
            'controller_name' => 'Bl File Type Set Tab File Types Controller',
            'controller_table_n' => 69,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'BlFileTypeSetTabFileTypes',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 92,
            'controller_code' => 'BlLeasingObjectBrandsController',
            'controller_alias' => 'BlLeasingObjectBrands',
            'controller_name' => 'Bl Leasing Object Brands Controller',
            'controller_table_n' => 62,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'CatalogBlLeasingObjectBrands',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 93,
            'controller_code' => 'BlLeasingObjectModelsController',
            'controller_alias' => 'BlLeasingObjectModels',
            'controller_name' => 'Bl Leasing Object Models Controller',
            'controller_table_n' => 61,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'CatalogBlLeasingObjectModels',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 94,
            'controller_code' => 'BlLeasingObjectTypesController',
            'controller_alias' => 'BlLeasingObjectTypes',
            'controller_name' => 'Bl Leasing Object Types Controller',
            'controller_table_n' => 60,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'CatalogBlLeasingObjectTypes',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 95,
            'controller_code' => 'BlLegalFormsController',
            'controller_alias' => 'BlLegalForms',
            'controller_name' => 'Bl Legal Forms Controller',
            'controller_table_n' => 63,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'CatalogBlLegalForms',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 96,
            'controller_code' => 'BlRequiredDocumentsController',
            'controller_alias' => 'BlRequiredDocuments',
            'controller_name' => 'Bl Required Documents Controller',
            'controller_table_n' => 93,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'BlRequiredDocuments',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 97,
            'controller_code' => 'BlStatusesController',
            'controller_alias' => 'BlStatuses',
            'controller_name' => 'Bl Statuses Controller',
            'controller_table_n' => 65,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'CatalogBlStatuses',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 98,
            'controller_code' => 'DbAreaFilesController',
            'controller_alias' => 'DbAreaFiles',
            'controller_name' => 'Db Area Files Controller',
            'controller_table_n' => 94,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'CatalogDbAreaFiles',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 99,
            'controller_code' => 'RateVATController',
            'controller_alias' => 'RateVAT',
            'controller_name' => 'Rate VAT Controller',
            'controller_table_n' => 59,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'EnumerationRateVAT',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 100,
            'controller_code' => 'StoredFilesController',
            'controller_alias' => 'StoredFiles',
            'controller_name' => 'Stored Files Controller',
            'controller_table_n' => 95,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'StoredFiles',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 101,
            'controller_code' => 'OneAdditionalDetailsController',
            'controller_alias' => 'OneAdditionalDetails',
            'controller_name' => 'One Additional Details Controller',
            'controller_table_n' => 58,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'CCTOneAdditionalDetails',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 102,
            'controller_code' => 'MenuItemsController',
            'controller_alias' => 'MenuItems',
            'controller_name' => 'Menu Items Controller',
            'controller_table_n' => 96,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'MenuItems',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 103,
            'controller_code' => 'MenuItemAccessRolesController',
            'controller_alias' => 'MenuItemAccessRoles',
            'controller_name' => 'Menu Item Access Roles Controller',
            'controller_table_n' => 97,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'MenuItemAccessRoles',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 104,
            'controller_code' => 'BlCustomerRequestsController',
            'controller_alias' => 'BlCustomerRequests',
            'controller_name' => 'Customer Requests Controller',
            'controller_table_n' => 81,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'DocumentBlCustomerRequests',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 105,
            'controller_code' => 'BlCustomerRequestTabLeasingObjectsController',
            'controller_alias' => 'BlCustomerRequestTabLeasingObjects',
            'controller_name' => 'Customer Request Tab Leasing Objects Controller',
            'controller_table_n' => 82,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'BlCustomerRequestTabLeasingObjects',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 106,
            'controller_code' => 'BlContractorRequestsController',
            'controller_alias' => 'BlContractorRequests',
            'controller_name' => 'Contractor Requests Controller',
            'controller_table_n' => 126,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'DocumentBlContractorRequests',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 107,
            'controller_code' => 'BlContractorRequestTypesController',
            'controller_alias' => 'BlContractorRequestTypes',
            'controller_name' => 'Contractor Request Types Controller',
            'controller_table_n' => 125,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'CatalogBlContractorRequestTypes',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 108,
            'controller_code' => 'BlSalePointsController',
            'controller_alias' => 'BlSalePoints',
            'controller_name' => 'Sale Points Controller',
            'controller_table_n' => 22,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'CatalogBlSalePoints',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 109,
            'controller_code' => 'BlScheduleTypesController',
            'controller_alias' => 'BlScheduleTypes',
            'controller_name' => 'Schedule Types Controller',
            'controller_table_n' => 64,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'CatalogBlScheduleTypes',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 110,
            'controller_code' => 'Controller',
            'controller_alias' => 'MasterController',
            'controller_name' => 'Master Controller',
            'controller_table_n' => 109,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'MasterController',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 111,
            'controller_code' => 'BlReportLeasingContractBalanceController',
            'controller_alias' => 'BlReportLeasingContractBalance',
            'controller_name' => 'Bl Report Leasing Contract Balance Controller',
            'controller_table_n' => 41,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'BlReportLeasingContractBalance',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 112,
            'controller_code' => 'BlInsurancePolicyContractsController',
            'controller_alias' => 'BlInsurancePolicyContract',
            'controller_name' => 'Bl Insurance Policy Contracts Controller',
            'controller_table_n' => 133,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'DocumentBlInsurancePolicyContract',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 113,
            'controller_code' => 'NotificationsController',
            'controller_alias' => 'Notification',
            'controller_name' => 'Notifications Controller',
            'controller_table_n' => 134,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'Notification',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 114,
            'controller_code' => 'BlAdministratorsController',
            'controller_alias' => 'BlAdministrator',
            'controller_name' => 'Bl Administrators Controller',
            'controller_table_n' => 9,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'BlAdministrator',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 115,
            'controller_code' => 'FaqController',
            'controller_alias' => 'Faq',
            'controller_name' => 'Faq Controller',
            'controller_table_n' => 136,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'Faq',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 116,
            'controller_code' => 'SettlementReconciliationActsController',
            'controller_alias' => 'SettlementReconciliationActs',
            'controller_name' => 'Settlement Reconciliation Acts Controller',
            'controller_table_n' => 137,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'SettlementReconciliationActs',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 117,
            'controller_code' => 'ServiceAcceptanceActsController',
            'controller_alias' => 'ServiceAcceptanceActs',
            'controller_name' => 'Service Acceptance Acts Controller',
            'controller_table_n' => 138,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'ServiceAcceptanceActs',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 118,
            'controller_code' => 'InvoicesController',
            'controller_alias' => 'Invoices',
            'controller_name' => 'Invoices Controller',
            'controller_table_n' => 139,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'Invoices',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 119,
            'controller_code' => 'BlCustomerRequestsDbAreaFilesController',
            'controller_alias' => 'BlCustomerRequestsDbAreaFiles',
            'controller_name' => 'Customer Requests Db Area Files Controller',
            'controller_table_n' => 94,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'BlCustomerRequestsDbAreaFiles',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 120,
            'controller_code' => 'BlLeasingContractsDbAreaFilesController',
            'controller_alias' => 'BlLeasingContractsDbAreaFiles',
            'controller_name' => 'Leasing Contracts DbArea Files Controller',
            'controller_table_n' => 94,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'BlLeasingContractsDbAreaFiles',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 121,
            'controller_code' => 'ChangePasswordController',
            'controller_alias' => 'ChangePassword',
            'controller_name' => 'Change Password Controller',
            'controller_table_n' => NULL,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'ChangePassword',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 122,
            'controller_code' => 'BLDownloadProfileController',
            'controller_alias' => 'BLDownloadProfile',
            'controller_name' => 'BL Download Profile Controller',
            'controller_table_n' => NULL,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'BLDownloadProfile',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 123,
            'controller_code' => 'SystemParametersController',
            'controller_alias' => 'SystemParameters',
            'controller_name' => 'System Parameters Controller',
            'controller_table_n' => 31,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'SystemParameters',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 124,
            'controller_code' => 'SystemParametersValuesController',
            'controller_alias' => 'SystemParameters',
            'controller_name' => 'System Parameters Values Controller',
            'controller_table_n' => 32,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'SystemParameters',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 125,
            'controller_code' => 'ModelsController',
            'controller_alias' => 'Models',
            'controller_name' => 'Models Controller',
            'controller_table_n' => 24,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'Models',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 126,
            'controller_code' => 'ControllersController',
            'controller_alias' => 'Controllers',
            'controller_name' => 'Controllers Controller',
            'controller_table_n' => 109,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'Controllers',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 127,
            'controller_code' => 'PaymentInvoicesController',
            'controller_alias' => 'PaymentInvoices',
            'controller_name' => 'Payment Invoices Controller',
            'controller_table_n' => 140,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'PaymentInvoices',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 128,
            'controller_code' => 'ActionExchangeLogGroupByController',
            'controller_alias' => 'ActionExchangeLogGroupBy',
            'controller_name' => 'Action Exchange Log Group By Controller',
            'controller_table_n' => 2,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'ActionExchangeLogGroupBy',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 129,
            'controller_code' => 'ActionExchangeLogController',
            'controller_alias' => 'ActionExchangeLog',
            'controller_name' => 'Action Exchange Log Controller',
            'controller_table_n' => 2,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'ActionExchangeLog',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 130,
            'controller_code' => 'ActionLogsTotalsController',
            'controller_alias' => 'ActionLogsTotals',
            'controller_name' => 'Action Logs Totals Controller',
            'controller_table_n' => 141,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'ActionLogsTotals',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 131,
            'controller_code' => 'BlInsurancePolicyContractTabLeasingContractsController',
            'controller_alias' => 'BlInsurancePolicyContractTabLeasingContracts',
            'controller_name' => 'Bl Insurance Policy Contract Tab Leasing Contracts Controller',
            'controller_table_n' => 142,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'BlInsurancePolicyContractTabLeasingContracts',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 132,
            'controller_code' => 'ContractorsDillerController',
            'controller_alias' => 'ContractorsDiller',
            'controller_name' => 'Contractors Diller Controller',
            'controller_table_n' => 13,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'ContractorsDillers',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 133,
            'controller_code' => 'PartnersController',
            'controller_alias' => 'Partners',
            'controller_name' => 'Partners Controller',
            'controller_table_n' => 143,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'Partners',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 134,
            'controller_code' => 'ContactPersonsController',
            'controller_alias' => 'ContactPersons',
            'controller_name' => 'Contact Persons Controller',
            'controller_table_n' => 144,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'ContactPersons',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 135,
            'controller_code' => 'ContactPersonInfoController',
            'controller_alias' => 'ContactPersonInfo',
            'controller_name' => 'Contact Person Info Controller',
            'controller_table_n' => 145,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'ContactPersonInfo',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 136,
            'controller_code' => 'PartnerPointsController',
            'controller_alias' => 'PartnerPoints',
            'controller_name' => 'Partner Points Controller',
            'controller_table_n' => 146,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'PartnerPoints',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 137,
            'controller_code' => 'PartnerRegionsController',
            'controller_alias' => 'PartnerRegions',
            'controller_name' => 'Partner Regions Controller',
            'controller_table_n' => 147,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'PartnerRegions',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 138,
            'controller_code' => 'PartnerEmployeesController',
            'controller_alias' => 'PartnerEmployees',
            'controller_name' => 'Partner Employees Controller',
            'controller_table_n' => 148,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'PartnerEmployees',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 139,
            'controller_code' => 'PartnerEmployeeContactPersonsController',
            'controller_alias' => 'PartnerEmployeeContactPersons',
            'controller_name' => 'Partner Employee Contact Persons Controller',
            'controller_table_n' => 149,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'PartnerEmployeeContactPersons',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 140,
            'controller_code' => 'UserInterfacesController',
            'controller_alias' => 'UserInterfaces',
            'controller_name' => 'User Interfaces Controller',
            'controller_table_n' => 150,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'UserInterfaces',
        ]);

        /**/
        \App\Models\Controller::create([
            'id' => 141,
            'controller_code' => 'HelpController',
            'controller_alias' => 'Help',
            'controller_name' => 'Help Controller',
            'controller_table_n' => 129,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'Help',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 142,
            'controller_code' => 'AccessAxesController',
            'controller_alias' => 'AccessAxes',
            'controller_name' => 'Access Axes Controller',
            'controller_table_n' => 151,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'AccessAxis',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 143,
            'controller_code' => 'AccessAxesParametersController',
            'controller_alias' => 'AccessAxesParameters',
            'controller_name' => 'Access Axes Parameters Controller',
            'controller_table_n' => 152,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'AccessAxesParameters',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 144,
            'controller_code' => 'AccessRowParametersController',
            'controller_alias' => 'AccessRowParameters',
            'controller_name' => 'Access Row Parameters Controller',
            'controller_table_n' => 153,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'AccessRowParameters',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 145,
            'controller_code' => 'PartnerPointsTabContractorsController',
            'controller_alias' => 'PartnerPointsTabContractors',
            'controller_name' => 'Partner Points Tab Contractors Controller',
            'controller_table_n' => 154,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'PartnerPointsTabContractors',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 146,
            'controller_code' => 'QTPagesController',
            'controller_alias' => 'QTPages',
            'controller_name' => 'QT Pages Controller',
            'controller_table_n' => 155,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'QTPages',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 147,
            'controller_code' => 'QTBlocksController',
            'controller_alias' => 'QTBlocks',
            'controller_name' => 'QT Blocks Controller',
            'controller_table_n' => 156,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'QTBlocks',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 148,
            'controller_code' => 'QTSetsController',
            'controller_alias' => 'QTSets',
            'controller_name' => 'QT Sets Controller',
            'controller_table_n' => 157,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'QTSets',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 149,
            'controller_code' => 'QTQuestionKindsController',
            'controller_alias' => 'QTQuestionKinds',
            'controller_name' => 'QT Question Kinds Controller',
            'controller_table_n' => 158,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'QTQuestionKinds',
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 150,
            'controller_code' => 'ClientBlLeasingContractsController',
            'controller_alias' => 'ClientBlLeasingContracts',
            'controller_name' => 'Client Leasing Contracts Controller',
            'controller_table_n' => 86,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'DocumentBlLeasingContract',
            'access_axis_id' => 1,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 151,
            'controller_code' => 'PartnerBlLeasingContractsController',
            'controller_alias' => 'PartnerBlLeasingContracts',
            'controller_name' => 'Partner Leasing Contracts Controller',
            'controller_table_n' => 86,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'DocumentBlLeasingContract',
            'access_axis_id' => 2,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 152,
            'controller_code' => 'ClientBlLeasingCalculationsController',
            'controller_alias' => 'ClientBlLeasingCalculations',
            'controller_name' => 'Client Leasing Calculations Controller',
            'controller_table_n' => 71,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'DocumentBlLeasingCalculation',
            'access_axis_id' => 1,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 153,
            'controller_code' => 'PartnerBlLeasingCalculationsController',
            'controller_alias' => 'PartnerBlLeasingCalculations',
            'controller_name' => 'Partner Leasing Calculations Controller',
            'controller_table_n' => 71,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'DocumentBlLeasingCalculation',
            'access_axis_id' => 2,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 154,
            'controller_code' => 'ClientBlContractorRequestsController',
            'controller_alias' => 'ClientBlContractorRequests',
            'controller_name' => 'Client Contractor Requests Controller',
            'controller_table_n' => 126,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'DocumentBlContractorRequests',
            'access_axis_id' => 1,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 155,
            'controller_code' => 'PartnerBlContractorRequestsController',
            'controller_alias' => 'PartnerBlContractorRequests',
            'controller_name' => 'Partner Contractor  Requests Controller',
            'controller_table_n' => 126,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'DocumentBlContractorRequests',
            'access_axis_id' => 2,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 156,
            'controller_code' => 'ClientBlCustomerRequestsController',
            'controller_alias' => 'ClientBlCustomerRequests',
            'controller_name' => 'Client Customer Requests Controller',
            'controller_table_n' => 81,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'DocumentBlCustomerRequests',
            'access_axis_id' => 1,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 157,
            'controller_code' => 'PartnerBlCustomerRequestsController',
            'controller_alias' => 'PartnerBlCustomerRequests',
            'controller_name' => 'Partner Customer Requests Controller',
            'controller_table_n' => 81,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'DocumentBlCustomerRequests',
            'access_axis_id' => 2,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 158,
            'controller_code' => 'ClientBlInsurancePolicyContractsController',
            'controller_alias' => 'ClientBlInsurancePolicyContracts',
            'controller_name' => 'Client InsurancePolicy Contracts Controller',
            'controller_table_n' => 133,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'DocumentBlInsurancePolicyContract',
            'access_axis_id' => 1,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 159,
            'controller_code' => 'PartnerBlInsurancePolicyContractsController',
            'controller_alias' => 'PartnerBlInsurancePolicyContracts',
            'controller_name' => 'Partner Insurance Policy Contracts Controller',
            'controller_table_n' => 133,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'DocumentBlInsurancePolicyContract',
            'access_axis_id' => 2,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 160,
            'controller_code' => 'ClientInvoicesController',
            'controller_alias' => 'ClientInvoices',
            'controller_name' => 'Client Invoices Controller',
            'controller_table_n' => 139,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'Invoices',
            'access_axis_id' => 1,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 161,
            'controller_code' => 'ClientPaymentInvoicesController',
            'controller_alias' => 'ClientPaymentInvoices',
            'controller_name' => 'Client Payment Invoices Controller',
            'controller_table_n' => 140,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'PaymentInvoices',
            'access_axis_id' => 1,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 162,
            'controller_code' => 'ClientServiceAcceptanceActsController',
            'controller_alias' => 'ClientServiceAcceptanceActs',
            'controller_name' => 'Client Service Acceptance Acts Controller',
            'controller_table_n' => 138,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'ServiceAcceptanceActs',
            'access_axis_id' => 1,
        ]);

        /**/
        \App\Models\Controller::create([
            'id' => 163,
            'controller_code' => 'JournalDocumentsController',
            'controller_alias' => 'JournalDocuments',
            'controller_name' => 'Journal Documents Controller',
            'controller_table_n' => NULL,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'JournalDocuments',
            'access_axis_id' => NULL,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 164,
            'controller_code' => 'QuestionnaireTemplatesController',
            'controller_alias' => 'QuestionnaireTemplates',
            'controller_name' => 'Questionnaire Templates Controller',
            'controller_table_n' => 159,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'QuestionnaireTemplates',
            'access_axis_id' => NULL,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 165,
            'controller_code' => 'PartnerPartnersController',
            'controller_alias' => 'PartnerPartners',
            'controller_name' => 'Partner Partners Controller',
            'controller_table_n' => 143,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'Partners',
            'access_axis_id' => 2,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 166,
            'controller_code' => 'PartnerPartnerRegionsController',
            'controller_alias' => 'PartnerPartnerRegions',
            'controller_name' => 'Partner Partner Regions Controller',
            'controller_table_n' => 147,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'PartnerRegion',
            'access_axis_id' => 2,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 167,
            'controller_code' => 'PartnerPartnerPointsController',
            'controller_alias' => 'PartnerPartnerPoints',
            'controller_name' => 'Partner Partner Points Controller',
            'controller_table_n' => 146,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'PartnerPoints',
            'access_axis_id' => 2,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 168,
            'controller_code' => 'QTSetsQuestionsListController',
            'controller_alias' => 'QTSetsQuestionsList',
            'controller_name' => 'QTSets Questions List Controller',
            'controller_table_n' => 160,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'QTSetsQuestionsList',
            'access_axis_id' => NULL,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 169,
            'controller_code' => 'ExtensionOneAdditionalDetailsController',
            'controller_alias' => 'ExtensionOneAdditionalDetails',
            'controller_name' => 'Extension One Additional Details Controller',
            'controller_table_n' => 161,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'ExtensionOneAdditionalDetail',
            'access_axis_id' => NULL,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 170,
            'controller_code' => 'CalculationParameterTypesController',
            'controller_alias' => 'CalculationParameterTypes',
            'controller_name' => 'Calculation Parameter Types Controller',
            'controller_table_n' => 162,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'CalculationParameterType',
            'access_axis_id' => NULL,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 171,
            'controller_code' => 'QTQuestionAnswerListController',
            'controller_alias' => 'QTQuestionAnswerList',
            'controller_name' => 'QT Question Answer List Controller',
            'controller_table_n' => 166,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'QTQuestionAnswerList',
            'access_axis_id' => NULL,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 172,
            'controller_code' => 'CalculationParameterAnswerListController',
            'controller_alias' => 'CalculationParameterAnswerList',
            'controller_name' => 'Calculation Parameter Answer List Controller',
            'controller_table_n' => 163,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'CalculationParameterAnswerList',
            'access_axis_id' => NULL,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 173,
            'controller_code' => 'CalculationTemplatesController',
            'controller_alias' => 'CalculationTemplates',
            'controller_name' => 'Calculation Templates Controller',
            'controller_table_n' => 165,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'CalculationTemplate',
            'access_axis_id' => NULL,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 174,
            'controller_code' => 'CalculationTemplateParameterSettingsController',
            'controller_alias' => 'CalculationTemplateParameterSettings',
            'controller_name' => 'Calculation Template Parameter Settings Controller',
            'controller_table_n' => 164,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'CalculationTemplateParameterSettings',
            'access_axis_id' => NULL,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 175,
            'controller_code' => 'QTQuestionTablesController',
            'controller_alias' => 'QTQuestionTables',
            'controller_name' => 'QT Question Tables Controller',
            'controller_table_n' => 168,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'QTQuestionTable',
            'access_axis_id' => NULL,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 176,
            'controller_code' => 'QTQuestionTableAttributesController',
            'controller_alias' => 'QTQuestionTableAttributes',
            'controller_name' => 'QT Question Table Attributes Controller',
            'controller_table_n' => 169,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'QTQuestionTableAttribute',
            'access_axis_id' => NULL,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 177,
            'controller_code' => 'MyContractorsController',
            'controller_alias' => 'MyContractors',
            'controller_name' => 'My Contractors Controller',
            'controller_table_n' => 13,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'MyContractor',
            'access_axis_id' => 1,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 178,
            'controller_code' => 'BlCustomerRequestsTabCommentsController',
            'controller_alias' => 'BlCustomerRequestsTabComments',
            'controller_name' => 'BL Customer Requests Tab Comments Controller',
            'controller_table_n' => 170,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'blCustomerRequestsTabComment',
            'access_axis_id' => NULL,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 179,
            'controller_code' => 'StepsBlCustomerRequestsController',
            'controller_alias' => 'StepsBlCustomerRequests',
            'controller_name' => 'Steps Bl Customer Requests Controller',
            'controller_table_n' => 81,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'PreliminaryOffer',
            'access_axis_id' => NULL,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 180,
            'controller_code' => 'QuestionnairesController',
            'controller_alias' => 'Questionnaires',
            'controller_name' => 'Questionnaires Controller',
            'controller_table_n' => 100,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'Questionnaire',
            'access_axis_id' => NULL,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 181,
            'controller_code' => 'QTQuestionTypesController',
            'controller_alias' => 'QTQuestionTypes',
            'controller_name' => 'QTQuestion Types Controller',
            'controller_table_n' => 167,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'QTQuestionTypes',
            'access_axis_id' => NULL,
        ]);

        /**/
        \App\Models\Controller::create([
            'id' => 182,
            'controller_code' => 'QTQuestionValidationRulesController',
            'controller_alias' => 'QTQuestionValidationRules',
            'controller_name' => 'QT Question Validation Rules Controller',
            'controller_table_n' => 172,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'QTQuestionValidationRule',
            'access_axis_id' => NULL,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 183,
            'controller_code' => 'BnCurrenciesController',
            'controller_alias' => 'BnCurrencies',
            'controller_name' => 'BankNet Currencies Controller',
            'controller_table_n' => 173,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'BnCurrency',
            'access_axis_id' => NULL,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 184,
            'controller_code' => 'BnPaymentMethodsController',
            'controller_alias' => 'BnPaymentMethods',
            'controller_name' => 'BankNet Payment Methods Controller',
            'controller_table_n' => 174,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'BnPaymentMethod',
            'access_axis_id' => NULL,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 185,
            'controller_code' => 'BnPaymentMethodGroupsController',
            'controller_alias' => 'BnPaymentMethodGroups',
            'controller_name' => 'BankNet Payment Method Groups Controller',
            'controller_table_n' => 175,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'BnPaymentMethodGroup',
            'access_axis_id' => NULL,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 186,
            'controller_code' => 'BnExchangersController',
            'controller_alias' => 'BnExchangers',
            'controller_name' => 'BankNet Exchangers Controller',
            'controller_table_n' => 177,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'BnExchanger',
            'access_axis_id' => NULL,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 187,
            'controller_code' => 'BnExchangeDirectionsController',
            'controller_alias' => 'BnExchangeDirections',
            'controller_name' => 'BankNet Exchange Directions Controller',
            'controller_table_n' => 176,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'BnExchangeDirection',
            'access_axis_id' => NULL,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 188,
            'controller_code' => 'BnExchangeOffersController',
            'controller_alias' => 'BnExchangeOffers',
            'controller_name' => 'BankNet Exchange Offers Controller',
            'controller_table_n' => 178,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'BnExchangeOffer',
            'access_axis_id' => NULL,
        ]);

        /**/
        \App\Models\Controller::create([
            'id' => 189,
            'controller_code' => 'QTAnswerScenariosController',
            'controller_alias' => 'QTAnswerScenarios',
            'controller_name' => 'QT Answer Scenarios Controller',
            'controller_table_n' => 179,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'QTAnswerScenario',
            'access_axis_id' => NULL,
        ]);

        /**/
        \App\Models\Controller::create([
            'id' => 190,
            'controller_code' => 'QTValidationsController',
            'controller_alias' => 'QTValidations',
            'controller_name' => 'QT Validations Controller',
            'controller_table_n' => 180,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'QTValidation',
            'access_axis_id' => NULL,
        ]);

        /**/
        \App\Models\Controller::create([
            'id' => 191,
            'controller_code' => 'QTValidationRulesController',
            'controller_alias' => 'QTValidationRules',
            'controller_name' => 'QT Validation Rules Controller',
            'controller_table_n' => 181,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'QTValidationRule',
            'access_axis_id' => NULL,
        ]);

        /**/
        \App\Models\Controller::create([
            'id' => 192,
            'controller_code' => 'QTDependentFieldController',
            'controller_alias' => 'QTDependentField',
            'controller_name' => 'QT Dependent Field Controller',
            'controller_table_n' => 182,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'QTDependentField',
            'access_axis_id' => NULL,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 193,
            'controller_code' => 'HomePanelController',
            'controller_alias' => 'HomePanel',
            'controller_name' => 'Home Panel Controller',
            'controller_table_n' => null,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'HomePanel',
            'access_axis_id' => null,
        ]);

        /**/
        \App\Models\Controller::create([
            'id' => 194,
            'controller_code' => 'BookmarksController',
            'controller_alias' => 'Bookmarks',
            'controller_name' => 'Bookmarks Controller',
            'controller_table_n' => 183,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'Bookmark',
            'access_axis_id' => NULL,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 195,
            'controller_code' => 'BnContactsController',
            'controller_alias' => 'BnContacts',
            'controller_name' => 'Bn Contacts Controller',
            'controller_table_n' => NULL,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'BnContacts',
            'access_axis_id' => NULL,
        ]);


        /**/
        \App\Models\Controller::create([
            'id' => 196,
            'controller_code' => 'LogInAsUsersController',
            'controller_alias' => 'LogInAsUsers',
            'controller_name' => 'LogIn As Users Controller',
            'controller_table_n' => 9,
            'controller_table_n_dep' => NULL,
            'caption_code' => 'LogInAsUsers',
            'access_axis_id' => NULL,
        ]);

    }
}
