<?php

header('Access-Control-Allow-Credentials:  true');
Route::group(['middleware' => 'guest'], function () {
    Route::post('login', 'AuthController@login');
    Route::post('respondWithToken', 'AuthController@respondWithToken');
    Route::get('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me');
    Route::get('captcha', 'AuthController@captcha');
    ////////////////
    Route::get('/get_captcha/{config?}', function (\Mews\Captcha\Captcha $captcha, $config = 'default') {
        return $captcha->src($config);
    });
    Route::post('consumer/register', 'Auth\RegisterController@createConsumer')->name('register');
    Route::get('/consumer/verify/{token}', 'Auth\RegisterController@verify');
    Route::post('/consumer/verify/{token}', 'Auth\RegisterController@verify');
    Route::post('/consumer/changePassword/password', 'Auth\RegisterController@forgotPassword')->name('forgotPassword');
//        Route::post('/consumer/changePassword/confirm/{token}', 'Auth\RegisterController@confirmChangePassword')->name('changePassword');
    Route::post('/consumer/changePassword/confirm', 'Auth\RegisterController@confirmChangePassword')->name('changePassword');
    Route::get('/consumer/changePassword/{token}', 'Auth\RegisterController@showPassword')->name('showPassword');
    Route::post('/consumer/repeatVerify', 'Auth\RegisterController@repeatedVerifyUser')->name('repeatedVerify');
    Route::post('/verification/inputs', 'Admin\ConsumersController@getVerificationInputs')->name('verification-inputs-guest');
    ////////////////
});

Route::post('get/request/1c/report', 'AuthController@getRequest1cReport');


Route::group(['prefix' => 'admin', 'middleware' => ['auth.jwt.custom', 'checkAccess', 'switchLang', 'addAccessControlExposeHeaders']], function () {
    Route::post('/changePassword', 'Auth\ChangePasswordController@changePassword')->name('change-password');
    Route::post('/setPassword', 'Auth\ChangePasswordController@setPassword')->name('set-password');

    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

    Route::any('/menu', 'Admin\MenuController@index')->name('admin-menu');
//        Route::post('/changePassword', 'Auth\ChangePasswordController@changePassword')->name('change-password');


    Route::post('/footer', 'Admin\FooterController@index')->name('footer');//Footer 13.09.18 Alex Yaroshchuk
    /*Yuriy Yurenko
        * роуты для операций CRUD __ActionTypes
        *
        */
    Route::post('/action/type/insert', 'TabSystem\ActionTypesController@insert')->name('admin-action-type-insert');
    Route::post('/action/type/update', 'TabSystem\ActionTypesController@update')->name('admin-action-type-update');
    Route::post('/action/type/delete', 'TabSystem\ActionTypesController@delete')->name('admin-action-type-delete');
    Route::post('/action/type/show', 'TabSystem\ActionTypesController@show')->name('admin-action-type-show');


    /*Yuriy Yurenko
    * роуты для операций CRUD _AccessEntities
    *
    */
    Route::post('/access/entities/insert', 'TabAccess\AccessEntitiesController@insert')->name('admin-acceess-entities-insert');
    Route::post('/access/entities/update', 'TabAccess\AccessEntitiesController@update')->name('admin-acceess-entities-update');
    Route::post('/access/entities/delete', 'TabAccess\AccessEntitiesController@delete')->name('admin-acceess-entities-delete');
    Route::post('/access/entities/show', 'TabAccess\AccessEntitiesController@show')->name('admin-acceess-entities-show');


    /*Yuriy Yurenko
      * роуты для операций CRUD _AccessEntitiesByRoles
      *
      */
    Route::post('/access/entities/roles/insert', 'TabAccess\AccessEntitiesByRolesController@insert')->name('admin-access-entities-by-roles-insert');
    Route::post('/access/entities/roles/update', 'TabAccess\AccessEntitiesByRolesController@update')->name('admin-access-entities-by-roles-update');
    Route::post('/access/entities/roles/delete', 'TabAccess\AccessEntitiesByRolesController@delete')->name('admin-access-entities-by-roles-delete');
    Route::post('/access/entities/roles/show', 'TabAccess\AccessEntitiesByRolesController@show')->name('admin-access-entities-by-roles-show');


    /*Yuriy Yurenko
    * роуты для операций CRUD _DbTypes
    *
    */
    Route::post('/dbtypes/insert', 'TabSystem\DbTypesController@insert')->name('admin-dbtypes-insert');
    Route::post('/dbtypes/update', 'TabSystem\DbTypesController@update')->name('admin-dbtypes-update');
    Route::post('/dbtypes/delete', 'TabSystem\DbTypesController@delete')->name('admin-dbtypes-delete');
    Route::post('/dbtypes/list', 'TabSystem\DbTypesController@list')->name('admin-dbtypes-list');
    Route::post('/dbtypes/card', 'TabSystem\DbTypesController@card')->name('admin-dbtypes-card');
    Route::post('/dbtypes/write', 'TabSystem\DbTypesController@write')->name('admin-dbtypes-write');



    Route::post('/access/roles/list', 'TabAccess\AccessRolesController@list')->name('access-roles-list');
    Route::post('/access/roles/card', 'TabAccess\AccessRolesController@card')->name('access-roles-card');
    Route::post('/access/roles/write', 'TabAccess\AccessRolesController@write')->name('access-roles-write');

    /*Yuriy Yurenko
    * роуты для операций CRUD _ConsumerAccessRoles
    *
    */
    Route::post('/consumer/accessroles/insert', 'TabAccess\ConsumerAccessRolesController@insert')->name('admin-consumer-accessroles-insert');
    Route::post('/consumer/accessroles/update', 'TabAccess\ConsumerAccessRolesController@update')->name('admin-consumer-accessroles-update');
    Route::post('/consumer/accessroles/delete', 'TabAccess\ConsumerAccessRolesController@delete')->name('admin-consumer-accessroles-delete');
    Route::post('/consumer/accessroles/show', 'TabAccess\ConsumerAccessRolesController@show')->name('admin-consumer-accessroles-show');


    //commit Albert Topalu 09.04.19 16:56
    /* create Alex Yaroshchuk */
//            Route::get('/user/profile', 'Admin\ConsumersController@index')->name('admin-user-profile');
    //END commit Albert Topalu 09.04.19 16:56


    Route::post('/consumer/email', 'Auth\ChangeLoginController@changeEmail');
    Route::get('/consumer/changeEmail/{token}', 'Auth\ChangeLoginController@confirmEmail');
    Route::post('/admin/changeLogin/profile', 'Auth\ChangeLoginController@changeLogin')->name('user-change-login');
    Route::post('/admin/checkLogin/profile', 'Auth\ChangeLoginController@checkLogin')->name('user-check-login');

    /*роут для карточки пользователя */
    Route::post('/user/card', 'Admin\ConsumersController@card')->name('admin-user-card');


    Route::post('/user/profile/update', 'Admin\ConsumersController@update')->name('admin-user-profile-update');
    Route::post('/user/profile/write', 'Admin\ConsumersController@write')->name('admin-user-profile-write');

    /*y.yurenko routes for ServersDbController*/
    Route::get('/serverdbs', 'TabServerDbArea\ServersDbController@index')->name('admin-server-index');
    Route::post('/serverdbs/update', 'TabServerDbArea\ServersDbController@update')->name('admin-server-update');
    Route::post('/serverdbs/insert', 'TabServerDbArea\ServersDbController@insert')->name('admin-server-insert');
    Route::post('/serverdbs/delete', 'TabServerDbArea\ServersDbController@delete')->name('admin-server-delete');
    Route::post('/serverdbs/list', 'TabServerDbArea\ServersDbController@list')->name('admin-server-list');
    Route::post('/serverdbs/card', 'TabServerDbArea\ServersDbController@card')->name('admin-server-card');
    Route::post('/serverdbs/write', 'TabServerDbArea\ServersDbController@write')->name('admin-server-write');

    //commit Albert Topalu 90.04.19 17:14
    //Route::post('/db', 'TabServerDbArea\DBasesController@update')->name('admin-db-update');
    //END commit Albert Topalu 90.04.19 17:14


    Route::post('/db/insert', 'TabServerDbArea\DBasesController@insert')->name('admin-db-insert');
    Route::post('/db/delete', 'TabServerDbArea\DBasesController@delete')->name('admin-db-delete');
    Route::post('/db/list', 'TabServerDbArea\DBasesController@list')->name('admin-db-list');
    Route::post('/db/card', 'TabServerDbArea\DBasesController@card')->name('admin-db-card');
    Route::post('/db/update', 'TabServerDbArea\DBasesController@update')->name('admin-db-update');
    Route::post('/db/write', 'TabServerDbArea\DBasesController@write')->name('admin-db-write');
    //commit Albert Topalu 90.04.19 17:14
    //Route::post('/db/area', 'TabServerDbArea\DbAreasController@update')->name('admin-db-area-update');
    //END commit Albert Topalu 90.04.19 17:14

    Route::post('/db/area/insert', 'TabServerDbArea\DbAreasController@insert')->name('admin-db-area-insert');
    Route::post('/db/area/delete', 'TabServerDbArea\DbAreasController@delete')->name('admin-db-area-delete');
    Route::post('/db/area/list', 'TabServerDbArea\DbAreasController@list')->name('admin-db-area-list');
    Route::post('/db/area/card', 'TabServerDbArea\DbAreasController@card')->name('admin-db-area-card');
    Route::post('/db/area/update', 'TabServerDbArea\DbAreasController@update')->name('admin-db-area-update');
    Route::post('/db/area/write', 'TabServerDbArea\DbAreasController@write')->name('admin-db-area-write');
    Route::post('/db/area/connection/test', 'TabServerDbArea\DbAreasController@testConnection')->name('admin-db-area-write');

    /*y.yurenko*/
    Route::get('/country/region', 'TabCommonReferences\CountriesController@index')->name('admin-country-region-index');
    Route::post('/update/country/modal/ajax', 'TabCommonReferences\CountriesController@ModalAjax')->name('admin-country-modal-ajax');
    Route::post('/country/update', 'TabCommonReferences\CountriesController@update')->name('admin-country-update');
    Route::post('/country/insert', 'TabCommonReferences\CountriesController@insert')->name('admin-country-insert');
    Route::post('/country/delete', 'TabCommonReferences\CountriesController@delete')->name('admin-country-delete');
    Route::post('/country/list', 'TabCommonReferences\CountriesController@list')->name('admin-country-list');
    Route::post('/country/card', 'TabCommonReferences\CountriesController@card')->name('admin-country-card');
    Route::post('/country/write', 'TabCommonReferences\CountriesController@write')->name('admin-country-write');
    /*y.yurenko route for regions list link in counries card*/
    Route::post('/countries/regionsList', 'TabCommonReferences\CountriesController@regionsList')->name('admin-country-regions-list');

    Route::post('/get/region/ajax', 'TabCommonReferences\RegionsController@GetAjax')->name('admin-region-get-ajax');
    Route::post('/update/region/modal/ajax', 'TabCommonReferences\RegionsController@ModalAjax')->name('admin-region-modal-ajax');

    Route::post('/region/update', 'TabCommonReferences\RegionsController@update')->name('admin-region-update');
    Route::post('/region/insert', 'TabCommonReferences\RegionsController@insert')->name('admin-region-insert');
    Route::post('/region/delete', 'TabCommonReferences\RegionsController@delete')->name('admin-region-delete');
    Route::post('/region/list', 'TabCommonReferences\RegionsController@list')->name('admin-region-list');
    Route::post('/region/card', 'TabCommonReferences\RegionsController@card')->name('admin-region-card');
    Route::post('/region/write', 'TabCommonReferences\RegionsController@write')->name('admin-region-write');

    Route::post('/company/report', 'TabCompanyContractor\CompaniesReportController@index')->name('admin-company-report-index');
    Route::post('/company/report/create', 'TabCompanyContractor\CompaniesReportController@sendRequest')->name('admin-company-send-request');
    Route::post('/company/report/html', 'TabCompanyContractor\CompaniesReportController@downloadHTML')->name('admin-download-html');
    Route::post('/company/report/pdf', 'TabCompanyContractor\CompaniesReportController@downloadPDF')->name('admin-download-pdf');
    Route::post('/company/report/xlsx', 'TabCompanyContractor\CompaniesReportController@downloadXLSX')->name('admin-download-xlsx');
    Route::post('/company/report/delete', 'TabCompanyContractor\CompaniesReportController@delete')->name('admin-report-delete');
    Route::post('/company/report/get-updated-data', 'TabCompanyContractor\CompaniesReportController@getUpdatedDataById')->name('get-updated-data');

    ///Эндпоинт для контрактора
    Route::get('/accesses', 'Admin\AccessesController@index')->name('admin-accesses');
    Route::post('/accesses/show', 'Admin\AccessesController@show')->name('admin-accesses-show');
    Route::post('/accesses/buildCard', 'Admin\AccessesController@buildContractorsCard')->name('admin-accesses-build');

    //Albert Topalu 29.10.18 14:00 change controller
    // Route::post('/contractor', 'Admin\AccessesController@update')->name('admin-accesses-update');
//                Route::post('/contractor', 'TabCompanyContractor\ContractorsController@write')->name('admin-accesses-update');
    Route::post('/contractor', 'TabCompanyContractor\ContractorsController@update')->name('admin-accesses-update');
    //END Albert Topalu 29.10.18 14:00 change controller

    //Alex Yaroshchuk 06.05.18 15:00
    Route::post('/company', 'TabCompanyContractor\CompaniesController@update')->name('admin-accesses-update');
    //END Alex Yaroshchuk 06.05.18 15:00

    //тестовый роут для
    Route::post('/contractor/test', 'Admin\AccessesController@test')->name('admin-accesses-test');
    Route::post('/contractor/insert', 'Admin\AccessesController@insert')->name('admin-accesses-insert');
    Route::post('/contractor/delete', 'Admin\AccessesController@delete')->name('admin-accesses-delete');
    ///
    Route::post('/update/contractor/modal/ajax', 'Admin\AccessesController@consumerModalAjax')->name('admin-consumer-modal-ajax');



    Route::get('/lang', 'Admin\LangController@index')->name('admin-lang');
    Route::post('/lang', 'Admin\LangController@update')->name('admin-lang-update');
    Route::post('/lang/insert', 'Admin\LangController@insert')->name('admin-lang-insert');
    Route::post('/lang/delete', 'Admin\LangController@delete')->name('admin-lang-delete');


    /*
     * Y.Yurenko
     *old routs with wrong controller name not in plural*/
    Route::get('/caption', 'Admin\CaptionController@index')->name('admin-caption');
    Route::post('/caption', 'Admin\CaptionController@update')->name('admin-caption-update');
    Route::post('/caption/insert', 'Admin\CaptionController@insert')->name('admin-caption-insert');
    Route::post('/caption/delete', 'Admin\CaptionController@delete')->name('admin-caption-delete');
    Route::post('/caption/deleteOne', 'Admin\CaptionController@deleteOne')->name('admin-caption-delete-one');


    /*
     * Y.Yurenko
     * new routs with correct controller name in plural*/
    Route::get('/captions', 'TabSystem\CaptionsController@index')->name('admin-captions-index');
    Route::post('/captions/card', 'TabSystem\CaptionsController@card')->name('admin-captions-card');
    Route::post('/captions/list', 'TabSystem\CaptionsController@list')->name('admin-captions-list');
    Route::post('/captions/insert', 'TabSystem\CaptionsController@insert')->name('admin-captions-insert');
    Route::post('/captions/update', 'TabSystem\CaptionsController@update')->name('admin-captions-update');
    Route::post('/captions/delete', 'TabSystem\CaptionsController@delete')->name('admin-captions-delete');
    Route::post('/captions/write', 'TabSystem\CaptionsController@write')->name('admin-captions-write');
    // Route::post('/captions/deleteOne', 'Admin\CaptionsController@deleteOne')->name('admin-captions-delete-one');


    /*
     * Y.Yurenko
     * new routs for TranslationCaptionsController
     */
    Route::post('/translationCaptions/list', 'TabTranslation\TranslationCaptionsController@list')->name('admin-captions-translations-list');
    Route::post('/translationCaptions/insert', 'TabTranslation\TranslationCaptionsController@insert')->name('admin-captions-translations-insert');
    Route::post('/translationCaptions/card', 'TabTranslation\TranslationCaptionsController@card')->name('admin-captions-translations-card');
    Route::post('/translationCaptions/delete', 'TabTranslation\TranslationCaptionsController@delete')->name('admin-captions-translations-delete');
    Route::post('/translationCaptions/update', 'TabTranslation\TranslationCaptionsController@update')->name('admin-captions-translations-update');
    Route::post('/translationCaptions/write', 'TabTranslation\TranslationCaptionsController@write')->name('admin-captions-translations-write');


    Route::post('/consumer/accounts/list', 'Admin\ConsumerAccountsController@list')->name('admin-consumer-accounts-list');
    Route::post('/consumer/accounts/card', 'Admin\ConsumerAccountsController@card')->name('admin-consumer-accounts-card');
    Route::post('/consumer/accounts/insert', 'Admin\ConsumerAccountsController@insert')->name('admin-consumer-accounts-insert');
    Route::post('/consumer/accounts/update', 'Admin\ConsumerAccountsController@update')->name('admin-consumer-accounts-update');
    Route::post('/consumer/accounts/delete', 'Admin\ConsumerAccountsController@delete')->name('admin-consumer-accounts-delete');

    Route::get('/directoryCapt', 'Admin\DirectoryCaptionController@index')->name('admin-directory-caption');
    Route::post('/directoryCapt', 'Admin\DirectoryCaptionController@update')->name('admin-directory-caption-update');
    Route::post('/directoryCapt/insert', 'Admin\DirectoryCaptionController@insert')->name('admin-directory-caption-insert');
    Route::post('/directoryCapt/delete', 'Admin\DirectoryCaptionController@delete')->name('admin-directory-caption-delete');
    Route::post('/update/caption/modal/ajax', 'Admin\CaptionController@captionModalAjax')->name('admin-caption-modal-ajax');

    Route::get('/infokind', 'Admin\InfoKindsController@index')->name('admin-info-kind');
    Route::post('/infokind', 'Admin\InfoKindsController@update')->name('admin-info-kind-update');
    Route::post('/infokind/insert', 'Admin\InfoKindsController@insert')->name('admin-info-kind-insert');
    Route::post('/infokind/delete', 'Admin\InfoKindsController@delete')->name('admin-info-kind-delete');

    Route::post('/infotype', 'Admin\InfoTypesController@update')->name('admin-info-type-update');
    Route::post('/infotype/insert', 'Admin\InfoTypesController@insert')->name('admin-info-type-insert');
    Route::post('/infotype/delete', 'Admin\InfoTypesController@delete')->name('admin-info-type-delete');

    Route::get('/accessType', 'TabAccess\AccessTypesController@index')->name('admin-type-access');
    Route::post('/accessType', 'TabAccess\AccessTypesController@update')->name('admin-type-access-update');
    Route::get('/accessType/show', 'TabAccess\AccessTypesController@show')->name('admin-type-access-show');
    Route::post('/accessType/insert', 'TabAccess\AccessTypesController@insert')->name('admin-type-access-insert');
    Route::post('/accessType/delete', 'TabAccess\AccessTypesController@delete')->name('admin-type-access-delete');

    ///////////Эндпоинты для post запросов для ContractorInfo and CompanyInfo

    Route::post('/contractorsInfo', 'TabCompanyContractor\ContractorsInfoController@show')->name('admin-contractor-info-show');

    Route::post('/contractorsInfo/card', 'TabCompanyContractor\ContractorsInfoController@showCard')->name('admin-contractor-info-showCard');
    Route::post('/contractorInfo', 'TabCompanyContractor\ContractorsInfoController@update')->name('admin-contractor-info-update');
    Route::post('/contractorInfo/insert', 'TabCompanyContractor\ContractorsInfoController@insert')->name('admin-contractor-info-insert');
    Route::post('/contractorInfo/delete', 'TabCompanyContractor\ContractorsInfoController@delete')->name('admin-contractor-info-delete');
    Route::post('/contractorInfo/write', 'TabCompanyContractor\ContractorsInfoController@write')->name('admin-contractor-info-write');

    Route::post('/companiesInfo', 'TabCompanyContractor\CompaniesInfoController@show')->name('admin-company-info-show');
    //Alex Yaroshcuk for cart Info
    Route::post('/companiesInfo/card', 'TabCompanyContractor\CompaniesInfoController@showCard')->name('admin-company-info-showCard');
    Route::post('/companyInfo', 'TabCompanyContractor\CompaniesInfoController@update')->name('admin-company-info-update');
    Route::post('/companyInfo/insert', 'TabCompanyContractor\CompaniesInfoController@insert')->name('admin-company-info-insert');
    Route::post('/companyInfo/delete', 'TabCompanyContractor\CompaniesInfoController@delete')->name('admin-company-info-delete');

    ///////////////////////////////////////////////////////////////////////////

    Route::get('/db', 'TabServerDbArea\DBasesController@index')->name('admin-db');
    Route::any('/company/report/get', 'TabCompanyContractor\CompaniesReportController@getRequest');

    ////////////////////////////////////////////////////////////////////////////


    Route::post('/company/list', 'TabCompanyContractor\CompaniesController@list')->name('company-access-list');
    Route::post('/company/card', 'TabCompanyContractor\CompaniesController@card')->name('company-access-card');

    Route::post('/company/ContactInfoList', 'TabCompanyContractor\CompaniesInfoController@contactInfoList')->name('company-contactInfoList');
    Route::post('/company/ContactInfoCard', 'TabCompanyContractor\CompaniesInfoController@contactInfoCard')->name('company-contactInfoCard');

    Route::post('/contractor/list', 'TabCompanyContractor\ContractorsController@list')->name('contractor-access-list');
    Route::post('/contractor/diller/list', 'TabCompanyContractor\ContractorsDillerController@list')->name('contractor-access-list');

    Route::post('/contractor/card', 'TabCompanyContractor\ContractorsController@card')->name('contractor-access-card');
    Route::post('/contractor/listDev', 'TabCompanyContractor\ContractorsController@listDev')->name('contractor-access-list-dev');
    Route::post('/contractor/cardDev', 'TabCompanyContractor\ContractorsController@cardDev')->name('contractor-access-card-dev');
    Route::post('/contractorSandBox/list', 'TabCompanyContractor\ContractorsControllerSandBox@list')->name('contractor-access-list');//todo в этом контроллере тестируем JSON для прикрипленных файлов
    Route::post('/contractor/write', 'TabCompanyContractor\ContractorsController@write')->name('contractor-access-write');
    Route::post('/contractor/fields', 'TabCompanyContractor\ContractorsController@getFields')->name('contractor-access-fields');
//    Route::post('/contractor/write', function()
//    {
//        return \App\Http\Classes\SignalManager::getSignalData(28);
//    })->name('contractor-access-write');


//            Route::post('/contactInfoList', 'TabCompanyContractor\ContractorsInfoController@contactInfoList')->name('test-check-contactInfoList');
//            Route::post('/contactInfoCard', 'TabCompanyContractor\ContractorsInfoController@contactInfoCard')->name('test-check-contactInfoCard');
    Route::post('/contractor/contact/info/list', 'TabCompanyContractor\ContractorsInfoController@list')->name('contractor-contact-info-list');
    Route::post('/contractor/contact/info/card', 'TabCompanyContractor\ContractorsInfoController@card')->name('contractor-contact-info-card');

    Route::post('/languages/list', 'TabCommonReferences\LanguagesController@list')->name('languages-list');
    Route::post('/language/card', 'TabCommonReferences\LanguagesController@card')->name('languages-card');
    Route::post('/language/update', 'TabCommonReferences\LanguagesController@update')->name('languages-card-update');
    Route::post('/language/write', 'TabCommonReferences\LanguagesController@write')->name('languages-card-write');


    Route::post('/attachedFile', 'AttachedFiles\AttachedFilesController@list')->name('attached-files');
    Route::post('/contractorSandBox/list', 'AttachedFiles\AttachedFilesController@card')->name('attached-files-card');

    Route::post('/attachedKind/list', 'AttachedFiles\AttachedDocumentKindController@list')->name('attached-document-kind-list');
    Route::post('/attachedKind/card', 'AttachedFiles\AttachedDocumentKindController@card')->name('attached-document-kind-card');
    Route::post('/attachedType/list', 'AttachedFiles\AttachedDocumentTypeController@list')->name('attached-document-type-list');
    Route::post('/attachedType/card', 'AttachedFiles\AttachedDocumentTypeController@card')->name('attached-document-type-card');

    Route::any('/attachedCard/card', 'AttachedFiles\AttachedFilesController@card_list')->name('attached-card_list-files');
    Route::any('/attachedFile/update', 'AttachedFiles\AttachedFilesController@update')->name('attached-card_list-update');


    Route::post('/banks/card', 'TabFinances\BanksController@card')->name('banks-card');
    Route::post('/banks/list', 'TabFinances\BanksController@list')->name('banks-list');
    Route::post('/banks/update', 'TabFinances\BanksController@update')->name('banks-update');
    Route::post('/banks/write', 'TabFinances\BanksController@write')->name('banks-write');

    Route::post('/currencies/card', 'TabFinances\CurrenciesController@card')->name('currencies-card');
    Route::post('/currencies/list', 'TabFinances\CurrenciesController@list')->name('currencies-list');
    Route::post('/currencies/update', 'TabFinances\CurrenciesController@update')->name('currencies-update');
    Route::post('/currencies/write', 'TabFinances\CurrenciesController@write')->name('currencies-write');

    Route::post('/cryptoExchanges/card', 'TabCrypto\CryptoExchangesController@card')->name('cryptoExchanges-card');
    Route::post('/cryptoExchanges/list', 'TabCrypto\CryptoExchangesController@list')->name('cryptoExchanges-list');
    Route::post('/cryptoExchanges/update', 'TabCrypto\CryptoExchangesController@update')->name('cryptoExchanges-update');

    Route::any('/cryptoPlatforms/card', 'TabCrypto\CryptoPlatformsController@card')->name('cryptoPlatforms-card');
    Route::any('/cryptoPlatforms/list', 'TabCrypto\CryptoPlatformsController@list')->name('cryptoPlatforms-list');
    Route::post('/cryptoPlatforms/update', 'TabCrypto\CryptoPlatformsController@update')->name('cryptoPlatforms-update');

    Route::any('/cryptoTokens/card', 'TabCrypto\CryptoTokensController@card')->name('cryptoTokens-card');
    Route::any('/cryptoTokens/list', 'TabCrypto\CryptoTokensController@list')->name('cryptoTokens-list');
    Route::post('/cryptoTokens/update', 'TabCrypto\CryptoTokensController@update')->name('cryptoTokens-update');

    Route::post('/contractor/bankAccounts/list', 'TabFinances\BankAccountContractorsController@list')->name('contractor-bankAccounts-list');
    Route::post('/contractor/bankAccounts/card', 'TabFinances\BankAccountContractorsController@card')->name('contractor-bankAccounts-card');
    Route::post('/contractor/bankAccounts/update', 'TabFinances\BankAccountContractorsController@update')->name('contractor-bankAccounts-update');

    Route::post('/company/bankAccounts/list', 'TabFinances\BankAccountCompaniesController@list')->name('company-bankAccounts-list');
    Route::post('/company/bankAccounts/card', 'TabFinances\BankAccountCompaniesController@card')->name('company-bankAccounts-card');
    Route::post('/company/bankAccounts/update', 'TabFinances\BankAccountCompaniesController@update')->name('company-bankAccounts-update');

    Route::post('/bankAccounts/list', 'TabFinances\BankAccountsController@list')->name('bankAccounts-list');
    Route::post('/bankAccounts/card', 'TabFinances\BankAccountsController@card')->name('bankAccounts-card');
    Route::post('/bankAccounts/write', 'TabFinances\BankAccountsController@write')->name('bankAccounts-write');


    Route::post('/bankAccountTypes/list', 'TabFinances\BankAccountTypesController@list')->name('bankAccountsTypes-list');
    Route::post('/bankAccountTypes/card', 'TabFinances\BankAccountTypesController@card')->name('bankAccountsTypes-card');
    Route::post('/bankAccountTypes/update', 'TabFinances\BankAccountTypesController@update')->name('bankAccountsTypes-update');
    Route::post('/bankAccountTypes/write', 'TabFinances\BankAccountTypesController@write')->name('bankAccountsTypes-write');

    Route::post('/imageCategories/list', 'TabImages\ImageCategoriesController@list')->name('imageCategories-list');
    Route::post('/imageCategories/card', 'TabImages\ImageCategoriesController@card')->name('imageCategories-card');
    Route::post('/imageCategories/update', 'TabImages\ImageCategoriesController@update')->name('imageCategories-update');
    Route::post('/imageCategories/write', 'TabImages\ImageCategoriesController@write')->name('imageCategories-write');

    Route::any('/company/cryptoExchangeAccounts/list', 'TabCrypto\CompaniesCryptoExchangeAccountsController@list')->name('companies-crypto-exchange-list');
    Route::any('/company/cryptoExchangeAccounts/card', 'TabCrypto\CompaniesCryptoExchangeAccountsController@card')->name('companies-crypto-exchange-card');
    Route::any('/company/cryptoExchangeAccounts/update', 'TabCrypto\CompaniesCryptoExchangeAccountsController@update')->name('companies-crypto-exchange-update');

    Route::any('/contractor/cryptoExchangeAccounts/list', 'TabCrypto\ContractorsCryptoExchangeAccountsController@list')->name('contractors-crypto-exchange-list');
    Route::any('/contractor/cryptoExchangeAccounts/card', 'TabCrypto\ContractorsCryptoExchangeAccountsController@card')->name('contractors-crypto-exchange-card');
    Route::any('/contractor/cryptoExchangeAccounts/update', 'TabCrypto\ContractorsCryptoExchangeAccountsController@update')->name('contractors-crypto-exchange-update');

    Route::any('/contractor/cryptoPlatformAccounts/list', 'TabCrypto\ContractorsCryptoPlatformAccountsController@list')->name('contractors-crypto-platform-list');
    Route::any('/contractor/cryptoPlatformAccounts/card', 'TabCrypto\ContractorsCryptoPlatformAccountsController@card')->name('contractors-crypto-platform-card');
    Route::any('/contractor/cryptoPlatformAccounts/update', 'TabCrypto\ContractorsCryptoPlatformAccountsController@update')->name('contractors-crypto-platform-update');

    Route::any('/company/cryptoPlatformAccounts/list', 'TabCrypto\CompaniesCryptoPlatformAccountsController@list')->name('companies-crypto-platform-list');
    Route::any('/company/cryptoPlatformAccounts/card', 'TabCrypto\CompaniesCryptoPlatformAccountsController@card')->name('companies-crypto-platform-card');
    Route::any('/company/cryptoPlatformAccounts/update', 'TabCrypto\CompaniesCryptoPlatformAccountsController@update')->name('companies-crypto-platform-update');

    Route::any('/images/list', 'TabImages\ImagesController@list')->name('images-list');
    Route::any('/images/card', 'TabImages\ImagesController@card')->name('images-card');
    Route::post('/images/update', 'TabImages\ImagesController@update')->name('images-update');
    Route::post('/images/write', 'TabImages\ImagesController@write')->name('images-write');

    Route::any('/fileTypes/list', 'TabImages\FileTypesController@list')->name('fileTypes-list');
    Route::any('/fileTypes/card', 'TabImages\FileTypesController@card')->name('fileTypes-card');
    Route::post('/fileTypes/update', 'TabImages\FileTypesController@update')->name('fileTypes-update');
    Route::post('/fileTypes/write', 'TabImages\FileTypesController@write')->name('fileTypes-write');


    Route::post('/contractor/cryptoPlatformWallets/list', 'TabCrypto\ContractorsCryptoPlatformWalletsController@list')->name('contractors-crypto-wallets-platform-list');
    Route::post('/contractor/cryptoPlatformWallets/card', 'TabCrypto\ContractorsCryptoPlatformWalletsController@card')->name('contractors-crypto-wallets-platform-card');
    Route::post('/contractor/cryptoPlatformWallets/update', 'TabCrypto\ContractorsCryptoPlatformWalletsController@update')->name('contractors-crypto-wallets-platform-update');


    Route::post('/getSteps', 'TabCommonReferences\StepsController@index');


    Route::post('/physical/persons/list', 'BL\PhysicalPersonsController@list')->name('physical-persons-list');
    Route::post('/physical/persons/card', 'BL\PhysicalPersonsController@card')->name('physical-persons-card');
    Route::post('/physical/persons/insert', 'BL\PhysicalPersonsController@insert')->name('physical-persons-insert');
    Route::post('/physical/persons/update', 'BL\PhysicalPersonsController@update')->name('physical-persons-update');
    Route::post('/physical/persons/deleteMark', 'BL\PhysicalPersonsController@deleteMark')->name('physical-persons-deleteMark');

    Route::post('/physical/persons/info/list', 'BL\PhysicalPersonInfoController@list')->name('physical-persons-info-list');
    Route::post('/physical/persons/info/card', 'BL\PhysicalPersonInfoController@card')->name('physical-persons-info-card');
    Route::post('/physical/persons/info/insert', 'BL\PhysicalPersonInfoController@insert')->name('physical-persons-info-insert');
    Route::post('/physical/persons/info/update', 'BL\PhysicalPersonInfoController@update')->name('physical-persons-info-update');
    Route::post('/physical/persons/info/deleteMark', 'BL\PhysicalPersonInfoController@deleteMark')->name('physical-persons-info-deleteMark');

    Route::post('/bl/leasing/contracts/list', 'BL\BlLeasingContractsController@list')->name('bl-leas-cont-list');
    Route::post('/bl/leasing/contracts/card', 'BL\BlLeasingContractsController@card')->name('bl-leas-cont-card');
    Route::post('/bl/leasing/contracts/insert', 'BL\BlLeasingContractsController@insert')->name('bl-leas-cont-insert');
    Route::post('/bl/leasing/contracts/update', 'BL\BlLeasingContractsController@update')->name('bl-leas-cont-update');
    Route::post('/bl/leasing/contracts/deleteMark', 'BL\BlLeasingContractsController@deleteMark')->name('bl-leas-cont-deleteMark');


    Route::post('/contractor/contracts/list', 'TabCompanyContractor\ContractorContractsController@list')->name('contractor-contracts-list');
    Route::post('/contractor/contracts/card', 'TabCompanyContractor\ContractorContractsController@card')->name('contractor-contracts-card');
    Route::post('/contractor/contracts/insert', 'TabCompanyContractor\ContractorContractsController@insert')->name('contractor-contracts-insert');
    Route::post('/contractor/contracts/update', 'TabCompanyContractor\ContractorContractsController@update')->name('contractor-contracts-update');
    Route::post('/contractor/contracts/deleteMark', 'TabCompanyContractor\ContractorContractsController@deleteMark')->name('contractor-contracts-deleteMark');

    Route::post('/contract/specifications/list', 'BL\BlLeasingContractSpecificationsController@list')->name('contract-specifications-list');
    Route::post('/contract/specifications/card', 'BL\BlLeasingContractSpecificationsController@card')->name('contract-specifications-card');
    Route::post('/contract/specifications/insert', 'BL\BlLeasingContractSpecificationsController@insert')->name('contract-specifications-insert');
    Route::post('/contract/specifications/update', 'BL\BlLeasingContractSpecificationsController@update')->name('contract-specifications-update');
    Route::post('/contract/specifications/deleteMark', 'BL\BlLeasingContractSpecificationsController@deleteMark')->name('contract-specifications-deleteMark');


    Route::post('/specif/tab/leasing/objects/list', 'BL\BlLeasContSpecTabLeasObjectsController@list')->name('specif-tab-leasing-objects-list');
    Route::post('/specif/tab/leasing/objects/card', 'BL\BlLeasContSpecTabLeasObjectsController@card')->name('specif-tab-leasing-objects-card');
    Route::post('/specif/tab/leasing/objects/insert', 'BL\BlLeasContSpecTabLeasObjectsController@insert')->name('specif-tab-leasing-objects-insert');
    Route::post('/specif/tab/leasing/objects/update', 'BL\BlLeasContSpecTabLeasObjectsController@update')->name('specif-tab-leasing-objects-update');
    Route::post('/specif/tab/leasing/objects/deleteMark', 'BL\BlLeasContSpecTabLeasObjectsController@deleteMark')->name('specif-tab-leasing-objects-deleteMark');


    Route::post('bl/schedules/list', 'BL\BlSchedulesController@list')->name('bl-schedules-list');
    Route::post('bl/schedules/card', 'BL\BlSchedulesController@card')->name('bl-schedules-card');
    Route::post('bl/schedules/insert', 'BL\BlSchedulesController@insert')->name('bl-schedules-insert');
    Route::post('bl/schedules/update', 'BL\BlSchedulesController@update')->name('bl-schedules-update');
    Route::post('bl/schedules/deleteMark', 'BL\BlSchedulesController@deleteMark')->name('bl-schedules-deleteMark');

    //commit Albert Topalu 10.04.19 11:42
//            Route::post('bl/schedule/tab/schedule/list',  'BL\BlSchedulesController@list')->name('bl-schedules-tab-list');
//            Route::post('bl/schedule/tab/schedule/card',  'BL\BlSchedulesController@card')->name('bl-schedules-tab-card');
//            Route::post('bl/schedule/tab/schedule/insert',  'BL\BlSchedulesController@insert')->name('bl-schedules-tab-insert');
//            Route::post('bl/schedule/tab/schedule/update',  'BL\BlSchedulesController@update')->name('bl-schedules-tab-update');
//            Route::post('bl/schedule/tab/schedule/deleteMark',  'BL\BlSchedulesController@deleteMark')->name('bl-schedules-tab-deleteMark');
    //END commit Albert Topalu 10.04.19 11:42


    Route::post('bl/schedule/articles/list', 'BL\BlScheduleArticlesController@list')->name('bl-schedule-articles-list');
    Route::post('bl/schedule/articles/card', 'BL\BlScheduleArticlesController@card')->name('bl-schedule-articles-card');
    Route::post('bl/schedule/articles/insert', 'BL\BlScheduleArticlesController@insert')->name('bl-schedule-articles-insert');
    Route::post('bl/schedule/articles/update', 'BL\BlScheduleArticlesController@update')->name('bl-schedule-articles-update');
    Route::post('bl/schedule/articles/deleteMark', 'BL\BlScheduleArticlesController@deleteMark')->name('bl-schedule-articles-deleteMark');


    //END Albert Topalu 04.04.19 11:04

    Route::post('/blLeasing/object/group/list', 'BL\BlLeasingObjectGroupsController@list')->name('blLeasing-object-group-list');
    Route::post('/blLeasing/object/group/card', 'BL\BlLeasingObjectGroupsController@card')->name('blLeasing-object-group-card');
    Route::post('/blLeasing/object/group/update', 'BL\BlLeasingObjectGroupsController@update')->name('blLeasing-object-group-update');
    Route::post('/blLeasing/object/group/delete', 'BL\BlLeasingObjectGroupsController@delete')->name('blLeasing-object-group-delete');
    Route::post('/blLeasing/object/group/insert', 'BL\BlLeasingObjectGroupsController@insert')->name('blLeasing-object-group-insert');
    Route::post('/blLeasing/object/group/deleteMark', 'BL\BlLeasingObjectGroupsController@deleteMark')->name('blLeasing-object-group-deleteMark');
    Route::post('/blLeasing/object/group/write', 'BL\BlLeasingObjectGroupsController@write')->name('blLeasing-object-group-write');
    Route::post('/blLeasing/object/group/all', 'BL\BlLeasingObjectGroupsController@all')->name('blLeasing-object-group-all');

    Route::post('/feComponents/list', 'FeBeRoutes\FeComponentsController@list')->name('fe-components-list');
    Route::post('/feComponents/card', 'FeBeRoutes\FeComponentsController@card')->name('fe-components-card');
    Route::post('/feComponents/update', 'FeBeRoutes\FeComponentsController@update')->name('fe-components-update');
    Route::post('/feComponents/delete', 'FeBeRoutes\FeComponentsController@delete')->name('fe-components-delete');
    Route::post('/feComponents/insert', 'FeBeRoutes\FeComponentsController@insert')->name('fe-components-insert');
    Route::post('/feComponents/deleteMark', 'FeBeRoutes\FeComponentsController@deleteMark')->name('fe-components-deleteMark');
    Route::post('/feComponents/write', 'FeBeRoutes\FeComponentsController@write')->name('fe-components-write');

    Route::post('/access/axes/list', 'Axes\AccessAxesController@list')->name('access-axes-list');
    Route::post('/access/axes/card', 'Axes\AccessAxesController@card')->name('access-axes-card');
    Route::post('/access/axes/write', 'Axes\AccessAxesController@write')->name('access-axes-write');

    Route::post('/access/axes/tab/parameters/list', 'Axes\AccessAxesParametersController@list')->name('access-axes-tab-parameters-list');
    Route::post('/access/axes/tab/parameters/card', 'Axes\AccessAxesParametersController@card')->name('access-axes-tab-parameters-card');
    Route::post('/access/axes/tab/parameters/update', 'Axes\AccessAxesParametersController@update')->name('access-axes-tab-parameters-update');
    Route::post('/access/axes/tab/parameters/insert', 'Axes\AccessAxesParametersController@insert')->name('access-axes-tab-parameters-insert');

    Route::post('/access/row/parameters/list', 'Axes\AccessRowParametersController@list')->name('access-axes-row-parameters-list');
    Route::post('/access/row/parameters/card', 'Axes\AccessRowParametersController@card')->name('access-axes-row-parameters-card');
    Route::post('/access/row/parameters/write', 'Axes\AccessRowParametersController@write')->name('access-axes-row-parameters-write');

    /* Alexey 17.5.2019 */
    Route::post('/Help/insert', 'Help\HelpController@insert')->name('help-insert');
    Route::post('/Help/update', 'Help\HelpController@update')->name('help-update');
    Route::post('/Help/delete', 'Help\HelpController@delete')->name('help-delete');
    Route::post('/Help/deleteMark', 'Help\HelpController@deleteMark')->name('help-deleteMark');
    Route::post('/Help/list', 'Help\HelpController@list')->name('help-list');
    Route::post('/Help/index', 'Help\HelpController@index')->name('help-test');


    Route::post('/Pages/insert', 'Help\PagesController@insert')->name('pages-insert');
    Route::post('/Pages/update', 'Help\PagesController@update')->name('pages-update');
    Route::post('/Pages/delete', 'Help\PagesController@delete')->name('pages-delete');
    Route::post('/Pages/deleteMark', 'Help\PagesController@deleteMark')->name('pages-deleteMark');
    Route::post('/Pages/list', 'Help\PagesController@list')->name('pages-list');
    Route::post('/Pages/index', 'Help\PagesController@index')->name('pages-index');
    Route::post('/Pages/getAnswer', 'Help\PagesController@getAnswer')->name('pages-getAnswer');

    Route::post('/help/access/roles/insert', 'Help\HelpAccessRolesController@insert')->name('help-access-roles-insert');
    Route::post('/help/access/roles/update', 'Help\HelpAccessRolesController@update')->name('help-access-roles-update');
    Route::post('/help/access/roles/delete', 'Help\HelpAccessRolesController@delete')->name('help-access-roles-delete');
    Route::post('/help/access/roles/deleteMark', 'Help\HelpAccessRolesController@deleteMark')->name('help-access-roles-deleteMark');
    Route::post('/help/access/roles/list', 'Help\HelpAccessRolesController@list')->name('help-access-roles-list');
    Route::post('/help/access/roles/index', 'Help\HelpAccessRolesController@index')->name('help-access-roles-index');
    /* Alexey 17.5.2019 end*/

    /* Alexey 10.6.2019 */
    Route::post('/FaqDev/insert', 'Help\FaqController@insert')->name('faq-insert');
    Route::post('/FaqDev/update', 'Help\FaqController@update')->name('faq-update');
    Route::post('/FaqDev/delete', 'Help\FaqController@delete')->name('faq-delete');
    Route::post('/FaqDev/deleteMark', 'Help\FaqController@deleteMark')->name('faq-deleteMark');
    Route::post('/FaqDev/list', 'Help\FaqController@list')->name('faq-list');
    Route::post('/FaqDev/card', 'Help\FaqController@card')->name('admin-faq-card');
    Route::post('/FaqDev/write', 'Help\FaqController@write')->name('admin-faq-write');
    Route::post('/FaqDev/index', 'Help\FaqController@index')->name('faq-test');
    Route::post('/FaqDev/getAnswer', 'Help\FaqController@getAnswer')->name('faq-getAnswer');
    Route::post('/FaqDev/getAllAnswer', 'Help\FaqController@getAllAnswer')->name('faq-getAllAnswer');
    /* Alexey 10.6.2019 end*/


    //Alex Shlemko 04.04.19
    Route::post('/FeRoute/steps/insert', 'FeBeRoutes\FeRouteStepsController@insert')->name('fe-route-steps-insert');
    Route::post('/FeRoute/steps/update', 'FeBeRoutes\FeRouteStepsController@update')->name('fe-route-steps-update');
    Route::post('/FeRoute/steps/delete', 'FeBeRoutes\FeRouteStepsController@delete')->name('fe-route-steps-delete');
    Route::post('/FeRoute/steps/deleteMark', 'FeBeRoutes\FeRouteStepsController@deleteMark')->name('fe-route-steps-deleteMark');
    Route::post('/FeRoute/steps/list', 'FeBeRoutes\FeRouteStepsController@list')->name('fe-route-steps-list');
    Route::post('/FeRoute/steps/card', 'FeBeRoutes\FeRouteStepsController@card')->name('fe-route-steps-card');
    Route::post('/FeRoute/steps/write', 'FeBeRoutes\FeRouteStepsController@write')->name('fe-route-steps-write');
    Route::post('/FeRoute/steps/index', 'FeBeRoutes\FeRouteStepsController@index')->name('fe-route-steps-index');


    //Alex Shlemko 05.04.19
    Route::post('/FeRoute/step/objects/insert', 'FeBeObjects\FeRouteStepObjectsController@insert')->name('fe-route-step-object-insert');
    Route::post('/FeRoute/step/objects/update', 'FeBeObjects\FeRouteStepObjectsController@update')->name('fe-route-step-object-update');
    Route::post('/FeRoute/step/objects/delete', 'FeBeObjects\FeRouteStepObjectsController@delete')->name('fe-route-step-object-delete');
    Route::post('/FeRoute/step/objects/deleteMark', 'FeBeObjects\FeRouteStepObjectsController@deleteMark')->name('fe-route-step-object-deleteMark');
    Route::post('/FeRoute/step/objects/card', 'FeBeObjects\FeRouteStepObjectsController@card')->name('fe-route-step-object-card');
    Route::post('/FeRoute/step/objects/list', 'FeBeObjects\FeRouteStepObjectsController@list')->name('fe-route-step-object-list');
    Route::post('/FeRoute/step/objects/write', 'FeBeObjects\FeRouteStepObjectsController@write')->name('fe-route-step-object-write');
    Route::post('/FeRoute/step/objects/closeStep', 'FeBeObjects\FeRouteStepObjectsController@closeStep')->name('fe-route-step-object-closeStep');
    Route::post('/FeRoute/step/objects/rollbackStep', 'FeBeObjects\FeRouteStepObjectsController@rollbackStep')->name('fe-step-route-object-rollbackStep');

    //Alex Shlemko 05.04.19
    Route::post('/FeRoute/objects/insert', 'FeBeObjects\FeRouteObjectsController@insert')->name('fe-route-object-insert');
    Route::post('/FeRoute/objects/update', 'FeBeObjects\FeRouteObjectsController@update')->name('fe-route-object-update');
    Route::post('/FeRoute/objects/delete', 'FeBeObjects\FeRouteObjectsController@delete')->name('fe-route-object-delete');
    Route::post('/FeRoute/objects/deleteMark', 'FeBeObjects\FeRouteObjectsController@deleteMark')->name('fe-route-object-deleteMark');
    Route::post('/FeRoute/objects/card', 'FeBeObjects\FeRouteObjectsController@card')->name('fe-route-object-card');
    Route::post('/FeRoute/objects/list', 'FeBeObjects\FeRouteObjectsController@list')->name('fe-route-object-list');
    Route::post('/FeRoute/objects/write', 'FeBeObjects\FeRouteObjectsController@write')->name('fe-route-object-write');


    //Alex Shlemko 05.04.19
    Route::post('/BeRoutes/insert', 'FeBeRoutes\BeRoutesController@insert')->name('be-route-insert');
    Route::post('/BeRoutes/update', 'FeBeRoutes\BeRoutesController@update')->name('be-route-update');
    Route::post('/BeRoutes/delete', 'FeBeRoutes\BeRoutesController@delete')->name('be-route-delete');
    Route::post('/BeRoutes/deleteMark', 'FeBeRoutes\BeRoutesController@deleteMark')->name('be-route-deleteMark');
    Route::post('/BeRoutes/card', 'FeBeRoutes\BeRoutesController@card')->name('be-route-card');
    Route::post('/BeRoutes/list', 'FeBeRoutes\BeRoutesController@list')->name('be-route-list');
    Route::post('/BeRoutes/write', 'FeBeRoutes\BeRoutesController@write')->name('be-route-write');

    Route::post('/FeRoute/urls/insert', 'FeBeRoutes\FeRouteUrlsController@insert')->name('fe-route-url-insert');
    Route::post('/FeRoute/urls/update', 'FeBeRoutes\FeRouteUrlsController@update')->name('fe-route-url-update');
    Route::post('/FeRoute/urls/delete', 'FeBeRoutes\FeRouteUrlsController@delete')->name('fe-route-url-delete');
    Route::post('/FeRoute/urls/deleteMark', 'FeBeRoutes\FeRouteUrlsController@deleteMark')->name('fe-route-url-deleteMark');
    Route::post('/FeRoute/urls/card', 'FeBeRoutes\FeRouteUrlsController@card')->name('fe-route-url-card');
    Route::post('/FeRoute/urls/list', 'FeBeRoutes\FeRouteUrlsController@list')->name('fe-route-url-list');
    Route::post('/FeRoute/urls/write', 'FeBeRoutes\FeRouteUrlsController@write')->name('fe-route-url-write');

    //Bogdan Yartsun 08.04.2019
    Route::post('FeRoutes/insert', 'FeBeRoutes\FeRoutesController@insert')->name('fe-routes-insert');
    Route::post('FeRoutes/update', 'FeBeRoutes\FeRoutesController@update')->name('fe-routes-update');
    Route::post('FeRoutes/delete', 'FeBeRoutes\FeRoutesController@delete')->name('fe-routes-delete');
    Route::post('FeRoutes/deleteMark', 'FeBeRoutes\FeRoutesController@deleteMark')->name('fe-routes-deleteMark');
    Route::post('FeRoutes/card', 'FeBeRoutes\FeRoutesController@card')->name('fe-routes-card');
    Route::post('FeRoutes/list', 'FeBeRoutes\FeRoutesController@list')->name('fe-routes-list');
    Route::post('FeRoutes/write', 'FeBeRoutes\FeRoutesController@write')->name('fe-routes-write');
    Route::post('FeRoutes/index', 'FeBeRoutes\FeRoutesController@index')->name('fe-routes-index');
    Route::post('FeRoutes/getBreadcrumbs', 'FeBeRoutes\FeRoutesController@getBreadcrumbs')->name('fe-routes-breadcrumbs');

    Route::post('FeUrls/insert', 'FeBeRoutes\FeUrlsController@insert')->name('fe-urls-insert');
    Route::post('FeUrls/index', 'FeBeRoutes\FeUrlsController@index')->name('fe-urls-index');
    Route::post('FeUrls/update', 'FeBeRoutes\FeUrlsController@update')->name('fe-urls-update');
    Route::post('FeUrls/delete', 'FeBeRoutes\FeUrlsController@delete')->name('fe-urls-delete');
    Route::post('FeUrls/deleteMark', 'FeBeRoutes\FeUrlsController@deleteMark')->name('fe-urls-deleteMark');
    Route::post('FeUrls/card', 'FeBeRoutes\FeUrlsController@card')->name('fe-urls-card');
    Route::post('FeUrls/list', 'FeBeRoutes\FeUrlsController@list')->name('fe-urls-list');
    Route::post('FeUrls/write', 'FeBeRoutes\FeUrlsController@write')->name('fe-urls-write');

    //Bogdan Yartsun 08.04.2019
    //Bogdan Yartsun 16.05.2019
    Route::post('FeSetsItems/insert', 'FeItems\FeSetsItemsController@insert')->name('fe-sets-items-insert');
    Route::post('FeSetsItems/index', 'FeItems\FeSetsItemsController@index')->name('fe-sets-items-index');
    Route::post('FeSetsItems/update', 'FeItems\FeSetsItemsController@update')->name('fe-sets-items-update');
    Route::post('FeSetsItems/delete', 'FeItems\FeSetsItemsController@delete')->name('fe-sets-items-delete');
    Route::post('FeSetsItems/deleteMark', 'FeItems\FeSetsItemsController@deleteMark')->name('fe-sets-items-deleteMark');
    Route::post('FeSetsItems/card', 'FeItems\FeSetsItemsController@card')->name('fe-sets-items-card');
    Route::post('FeSetsItems/list', 'FeItems\FeSetsItemsController@list')->name('fe-sets-items-list');


    Route::post('FeSetsItemsControllers/insert', 'FeItems\FeSetsItemsControllersController@insert')->name('fe-sets-items-insert');
    Route::post('FeSetsItemsControllers/index', 'FeItems\FeSetsItemsControllersController@index')->name('fe-sets-items-index');
    Route::post('FeSetsItemsControllers/update', 'FeItems\FeSetsItemsControllersController@update')->name('fe-sets-items-update');
    Route::post('FeSetsItemsControllers/delete', 'FeItems\FeSetsItemsControllersController@delete')->name('fe-sets-items-delete');
    Route::post('FeSetsItemsControllers/deleteMark', 'FeItems\FeSetsItemsControllersController@deleteMark')->name('fe-sets-items-deleteMark');
    Route::post('FeSetsItemsControllers/card', 'FeItems\FeSetsItemsControllersController@card')->name('fe-sets-items-card');
    Route::post('FeSetsItemsControllers/list', 'FeItems\FeSetsItemsControllersController@list')->name('fe-sets-items-list');


    Route::post('FeCssClasses/insert', 'FeItems\FeCssClassesControllers@insert')->name('fe-css-classes-insert');
    Route::post('FeCssClasses/index', 'FeItems\FeCssClassesControllers@index')->name('fe-css-classes-index');
    Route::post('FeCssClasses/update', 'FeItems\FeCssClassesControllers@update')->name('fe-css-classes-update');
    Route::post('FeCssClasses/delete', 'FeItems\FeCssClassesControllers@delete')->name('fe-css-classes-delete');
    Route::post('FeCssClasses/deleteMark', 'FeItems\FeCssClassesControllers@deleteMark')->name('fe-css-classes-deleteMark');
    Route::post('FeCssClasses/card', 'FeItems\FeCssClassesControllers@card')->name('fe-css-classes-card');
    Route::post('FeCssClasses/list', 'FeItems\FeCssClassesControllers@list')->name('fe-css-classes-list');

    Route::post('FeItems/insert', 'FeItems\FeItemsController@insert')->name('fe-items-insert');
    Route::post('FeItems/index', 'FeItems\FeItemsController@index')->name('fe-items-index');
    Route::post('FeItems/update', 'FeItems\FeItemsController@update')->name('fe-items-update');
    Route::post('FeItems/delete', 'FeItems\FeItemsController@delete')->name('fe-items-delete');
    Route::post('FeItems/deleteMark', 'FeItems\FeItemsController@deleteMark')->name('fe-items-deleteMark');
    Route::post('FeItems/card', 'FeItems\FeItemsController@card')->name('fe-items-card');
    Route::post('FeItems/list', 'FeItems\FeItemsController@list')->name('fe-items-list');

    Route::post('FeSets/insert', 'FeItems\FeSetsController@insert')->name('fe-sets-insert');
    Route::post('FeSets/index', 'FeItems\FeSetsController@index')->name('fe-sets-index');
    Route::post('FeSets/update', 'FeItems\FeSetsController@update')->name('fe-sets-update');
    Route::post('FeSets/delete', 'FeItems\FeSetsController@delete')->name('fe-sets-delete');
    Route::post('FeSets/deleteMark', 'FeItems\FeSetsController@deleteMark')->name('fe-sets-deleteMark');
    Route::post('FeSets/card', 'FeItems\FeSetsController@card')->name('fe-sets-card');
    Route::post('FeSets/list', 'FeItems\FeSetsController@list')->name('fe-sets-list');
    //Bogdan Yartsun 16.05.2019
    //+++08.04.2019 Miniyar

    Route::post('/blAttached/document/kind/list', 'BL\BlAttachedDocumentKindsController@list')->name('blAttached-document-kind-list');
    Route::post('/blAttached/document/kind/card', 'BL\BlAttachedDocumentKindsController@card')->name('blAttached-document-kind-card');
    Route::post('/blAttached/document/kind/update', 'BL\BlAttachedDocumentKindsController@update')->name('blAttached-document-kind-update');
    Route::post('/blAttached/document/kind/delete', 'BL\BlAttachedDocumentKindsController@delete')->name('blAttached-document-kind-delete');
    Route::post('/blAttached/document/kind/insert', 'BL\BlAttachedDocumentKindsController@insert')->name('blAttached-document-kind-insert');
    Route::post('/blAttached/document/kind/deleteMark', 'BL\BlAttachedDocumentKindsController@deleteMark')->name('blAttached-document-kind-deleteMark');

    Route::post('/blFile/type/set/list', 'BL\BlFileTypeSetsController@list')->name('blFile-type-set-list');
    Route::post('/blFile/type/set/card', 'BL\BlFileTypeSetsController@card')->name('blFile-type-set-card');
    Route::post('/blFile/type/set/update', 'BL\BlFileTypeSetsController@update')->name('blFile-type-set-update');
    Route::post('/blFile/type/set/delete', 'BL\BlFileTypeSetsController@delete')->name('blFile-type-set-delete');
    Route::post('/blFile/type/set/insert', 'BL\BlFileTypeSetsController@insert')->name('blFile-type-set-insert');
    Route::post('/blFile/type/set/deleteMark', 'BL\BlFileTypeSetsController@deleteMark')->name('blFile-type-set-deleteMark');

    Route::post('/blFile/type/set/tab/file/type/list', 'BL\BlFileTypeSetTabFileTypesController@list')->name('blFile-type-set-tab-file-type-list');
    Route::post('/blFile/type/set/tab/file/type/card', 'BL\BlFileTypeSetTabFileTypesController@card')->name('blFile-type-set-tab-file-type-card');
    Route::post('/blFile/type/set/tab/file/type/update', 'BL\BlFileTypeSetTabFileTypesController@update')->name('blFile-type-set-tab-file-type-update');
    Route::post('/blFile/type/set/tab/file/type/delete', 'BL\BlFileTypeSetTabFileTypesController@delete')->name('blFile-type-set-tab-file-type-delete');
    Route::post('/blFile/type/set/tab/file/type/insert', 'BL\BlFileTypeSetTabFileTypesController@insert')->name('blFile-type-set-tab-file-type-insert');
    Route::post('/blFile/type/set/tab/file/type/deleteMark', 'BL\BlFileTypeSetTabFileTypesController@deleteMark')->name('blFile-type-set-tab-file-type-deleteMark');

    Route::post('/blLeasing/object/brand/list', 'BL\BlLeasingObjectBrandsController@list')->name('blLeasing-object-brand-list');
    Route::post('/blLeasing/object/brand/card', 'BL\BlLeasingObjectBrandsController@card')->name('blLeasing-object-brand-card');
    Route::post('/blLeasing/object/brand/update', 'BL\BlLeasingObjectBrandsController@update')->name('blLeasing-object-brand-update');
    Route::post('/blLeasing/object/brand/delete', 'BL\BlLeasingObjectBrandsController@delete')->name('blLeasing-object-brand-delete');
    Route::post('/blLeasing/object/brand/insert', 'BL\BlLeasingObjectBrandsController@insert')->name('blLeasing-object-brand-insert');
    Route::post('/blLeasing/object/brand/deleteMark', 'BL\BlLeasingObjectBrandsController@deleteMark')->name('blLeasing-object-brand-deleteMark');

    Route::post('/blLeasing/object/model/list', 'BL\BlLeasingObjectModelsController@list')->name('blLeasing-object-model-list');
    Route::post('/blLeasing/object/model/card', 'BL\BlLeasingObjectModelsController@card')->name('blLeasing-object-model-card');
    Route::post('/blLeasing/object/model/update', 'BL\BlLeasingObjectModelsController@update')->name('blLeasing-object-model-update');
    Route::post('/blLeasing/object/model/delete', 'BL\BlLeasingObjectModelsController@delete')->name('blLeasing-object-model-delete');
    Route::post('/blLeasing/object/model/insert', 'BL\BlLeasingObjectModelsController@insert')->name('blLeasing-object-model-insert');
    Route::post('/blLeasing/object/model/deleteMark', 'BL\BlLeasingObjectModelsController@deleteMark')->name('blLeasing-object-model-deleteMark');

    Route::post('/blLeasing/object/type/list', 'BL\BlLeasingObjectTypesController@list')->name('blLeasing-object-type-list');
    Route::post('/blLeasing/object/type/card', 'BL\BlLeasingObjectTypesController@card')->name('blLeasing-object-type-card');
    Route::post('/blLeasing/object/type/update', 'BL\BlLeasingObjectTypesController@update')->name('blLeasing-object-type-update');
    Route::post('/blLeasing/object/type/delete', 'BL\BlLeasingObjectTypesController@delete')->name('blLeasing-object-type-delete');
    Route::post('/blLeasing/object/type/insert', 'BL\BlLeasingObjectTypesController@insert')->name('blLeasing-object-type-insert');
    Route::post('/blLeasing/object/type/deleteMark', 'BL\BlLeasingObjectTypesController@deleteMark')->name('blLeasing-object-type-deleteMark');

    Route::post('/blLegal/form/list', 'BL\BlLegalFormsController@list')->name('blLegal-form-list');
    Route::post('/blLegal/form/card', 'BL\BlLegalFormsController@card')->name('blLegal-form-card');
    Route::post('/blLegal/form/update', 'BL\BlLegalFormsController@update')->name('blLegal-form-update');
    Route::post('/blLegal/form/delete', 'BL\BlLegalFormsController@delete')->name('blLegal-form-delete');
    Route::post('/blLegal/form/insert', 'BL\BlLegalFormsController@insert')->name('blLegal-form-insert');
    Route::post('/blLegal/form/deleteMark', 'BL\BlLegalFormsController@deleteMark')->name('blLegal-form-deleteMark');

    Route::post('/blRequired/document/list', 'BL\BlRequiredDocumentsController@list')->name('blRequired-document-list');
    Route::post('/blRequired/document/card', 'BL\BlRequiredDocumentsController@card')->name('blRequired-document-card');
    Route::post('/blRequired/document/update', 'BL\BlRequiredDocumentsController@update')->name('blRequired-document-update');
    Route::post('/blRequired/document/delete', 'BL\BlRequiredDocumentsController@delete')->name('blRequired-document-delete');
    Route::post('/blRequired/document/insert', 'BL\BlRequiredDocumentsController@insert')->name('blRequired-document-insert');
    Route::post('/blRequired/document/deleteMark', 'BL\BlRequiredDocumentsController@deleteMark')->name('blRequired-document-deleteMark');

    Route::post('/blStatus/list', 'BL\BlStatusesController@list')->name('blStatus-list');
    Route::post('/blStatus/card', 'BL\BlStatusesController@card')->name('blStatus-card');
    Route::post('/blStatus/update', 'BL\BlStatusesController@update')->name('blStatus-update');
    Route::post('/blStatus/delete', 'BL\BlStatusesController@delete')->name('blStatus-delete');
    Route::post('/blStatus/insert', 'BL\BlStatusesController@insert')->name('blStatus-insert');
    Route::post('/blStatus/deleteMark', 'BL\BlStatusesController@deleteMark')->name('blStatus-deleteMark');

    Route::post('/dbArea/file/list', 'AttachedFiles\DbAreaFilesController@list')->name('dbArea-file-list');
    Route::post('/dbArea/file/card', 'AttachedFiles\DbAreaFilesController@card')->name('dbArea-file-card');
    Route::post('/dbArea/file/update', 'AttachedFiles\DbAreaFilesController@update')->name('dbArea-file-update');
    Route::post('/dbArea/file/delete', 'AttachedFiles\DbAreaFilesController@delete')->name('dbArea-file-delete');
    Route::post('/dbArea/file/insert', 'AttachedFiles\DbAreaFilesController@insert')->name('dbArea-file-insert');
    Route::post('/dbArea/file/write', 'AttachedFiles\DbAreaFilesController@write')->name('dbArea-file-write');
    Route::post('/dbArea/file/deleteMark', 'AttachedFiles\DbAreaFilesController@deleteMark')->name('dbArea-file-deleteMark');

    Route::post('/rate/vat/list', 'RateVATController@list')->name('rate-vat-list');
    Route::post('/rate/vat/card', 'RateVATController@card')->name('rate-vat-card');
    Route::post('/rate/vat/update', 'RateVATController@update')->name('rate-vat-update');
    Route::post('/rate/vat/delete', 'RateVATController@delete')->name('rate-vat-delete');
    Route::post('/rate/vat/insert', 'RateVATController@insert')->name('rate-vat-insert');
    Route::post('/rate/vat/deleteMark', 'RateVATController@deleteMark')->name('rate-vat-deleteMark');

    Route::post('/stored/file/list', 'StoredFilesController@list')->name('stored-file-list');
    Route::post('/stored/file/card', 'StoredFilesController@card')->name('stored-file-card');
    Route::post('/stored/file/update', 'StoredFilesController@update')->name('stored-file-update');
    Route::post('/stored/file/delete', 'StoredFilesController@delete')->name('stored-file-delete');
    Route::post('/stored/file/insert', 'StoredFilesController@insert')->name('stored-file-insert');
    Route::post('/stored/file/deleteMark', 'StoredFilesController@deleteMark')->name('stored-file-deleteMark');


    Route::post('/one/additional/detail/list', 'TabONE\OneAdditionalDetailsController@list')->name('one-additional-detail-list');
    Route::post('/one/additional/detail/card', 'TabONE\OneAdditionalDetailsController@card')->name('one-additional-detail-card');
    Route::post('/one/additional/detail/update', 'TabONE\OneAdditionalDetailsController@update')->name('one-additional-detail-update');
    Route::post('/one/additional/detail/delete', 'TabONE\OneAdditionalDetailsController@delete')->name('one-additional-detail-delete');
    Route::post('/one/additional/detail/insert', 'TabONE\OneAdditionalDetailsController@insert')->name('one-additional-detail-insert');
    Route::post('/one/additional/detail/deleteMark', 'TabONE\OneAdditionalDetailsController@deleteMark')->name('one-additional-detail-deleteMark');
    Route::post('/one/additional/detail/write', 'TabONE\OneAdditionalDetailsController@write')->name('one-additional-detail-write');


    // + ЗубановИА 12022020
    //<editor-fold desc="Лизинговый расчет / Комерческое предложение / Все что с ним связано">
    //<editor-fold desc="ОСНОВНОЙ">
    Route::post('/bl/leasing/calc/list', 'BL\BlLeasingCalculationsController@list')->name('bl-leasing-calc-list');
    Route::post('/bl/leasing/calc/card', 'BL\BlLeasingCalculationsController@card')->name('bl-leasing-calc-card');
    Route::post('/bl/leasing/calc/card/dev', 'BL\BlLeasingCalculationsController@cardDev')->name('bl-leasing-calc-card-dev');
    Route::post('/bl/leasing/calc/deleteMark', 'BL\BlLeasingCalculationsController@deleteMark')->name('bl-leasing-calc-deleteMark');
    Route::post('/bl/leasing/calc/delete', 'BL\BlLeasingCalculationsController@delete')->name('bl-leasing-calc-delete');
    Route::post('/bl/leasing/calc/write', 'BL\BlLeasingCalculationsController@write')->name('bl-leasing-calc-write');
    Route::post('/bl/leasing/calc/fields', 'BL\BlLeasingCalculationsController@getFields')->name('bl-leasing-calc-fields');
    Route::post('/bl/leasing/calc/update/leas/subject', 'BL\BlLeasingCalculationsController@updateLeasSubject')->name('bl-leasing-calc-update-leas-subject');
    //</editor-fold>
    //<editor-fold desc="КЛИЕНТ">
    Route::post('/сlient/bl/leasing/calc/list', 'BL\ClientBlLeasingCalculationsController@list')->name('сlient-bl-leasing-calc-list');
    Route::post('/сlient/bl/leasing/calc/card', 'BL\ClientBlLeasingCalculationsController@card')->name('сlient-bl-leasing-calc-card');
    Route::post('/сlient/bl/leasing/calc/write', 'BL\ClientBlLeasingCalculationsController@write')->name('сlient-bl-leasing-calc-write');
    //</editor-fold>
    //<editor-fold desc="ДИЛЕР/ПАРТНЕР">
    Route::post('/partner/bl/leasing/calc/list', 'BL\PartnerBlLeasingCalculationsController@list')->name('partner-bl-leasing-calc-list');
    Route::post('/partner/bl/leasing/calc/card', 'BL\PartnerBlLeasingCalculationsController@card')->name('partner-bl-leasing-calc-card');
    Route::post('/partner/bl/leasing/calc/write', 'BL\PartnerBlLeasingCalculationsController@write')->name('partner-bl-leasing-calc-write');
    //</editor-fold>
    //<editor-fold desc="ТЧ ДОПОЛНИТЕЛЬНЫЕ ПАРАМЕТРЫ">
    // Тут возможно будут роуты для методов контроллера под табличную часть
    //</editor-fold>
    //</editor-fold>

    //<editor-fold desc="Обращение клиента / Заявка на лизинг / Все что с ним связано">
    //<editor-fold desc="ОСНОВНОЙ">
    Route::post('bl/customer/requests/list', 'BL\BlCustomerRequestsController@list')->name('bl-customer-requests-list');
    Route::post('bl/customer/requests/card', 'BL\BlCustomerRequestsController@card')->name('bl-customer-requests-card');
    Route::post('bl/customer/requests/write', 'BL\BlCustomerRequestsController@write')->name('bl-customer-requests-write');
    Route::post('bl/customer/requests/fields', 'BL\BlCustomerRequestsController@getFields')->name('bl-customer-requests-fields');
    Route::post('bl/customer/requests/request/card', 'BL\BlCustomerRequestsController@requestCard')->name('bl-customer-requests-request-card');
    Route::post('bl/customer/requests/request/send', 'BL\BlCustomerRequestsController@sendRequest')->name('bl-customer-requests-request-send');
    Route::post('bl/customer/requests/stage', 'BL\BlCustomerRequestsController@changesStage')->name('bl-customer-requests-request-stage');

    Route::post('bl/customer/requests/tab/comments/write', 'BL\BlCustomerRequestsTabCommentsController@write')->name('bl-customer-requests-tab-comments-write');

    //</editor-fold>
    //<editor-fold desc="КЛИЕНТ">
    Route::post('/сlient/bl/customer/requests/list', 'BL\ClientBlCustomerRequestsController@list')->name('сlient-bl-customer-requests-list');
    Route::post('/сlient/bl/customer/requests/card', 'BL\ClientBlCustomerRequestsController@card')->name('сlient-bl-customer-requests-card');
    Route::post('/сlient/bl/customer/requests/write', 'BL\ClientBlCustomerRequestsController@write')->name('сlient-bl-customer-requests-write');
    Route::post('/сlient/bl/customer/requests/fields', 'BL\ClientBlCustomerRequestsController@getFields')->name('сlient-bl-customer-requests-fields');
    Route::post('/сlient/bl/customer/requests/request/card', 'BL\ClientBlCustomerRequestsController@requestCard')->name('сlient-bl-customer-requests-request-card');
    Route::post('/сlient/bl/customer/requests/request/send', 'BL\ClientBlCustomerRequestsController@getFields')->name('сlient-bl-customer-requests-fields');
    //</editor-fold>
    //<editor-fold desc="ДИЛЕР/ПАРТНЕР">
    Route::post('/partner/bl/customer/requests/list', 'BL\PartnerBlCustomerRequestsController@list')->name('partner-bl-customer-requests-list');
    Route::post('/partner/bl/customer/requests/card', 'BL\PartnerBlCustomerRequestsController@card')->name('partner-bl-customer-requests-card');
    Route::post('/partner/bl/customer/requests/write', 'BL\PartnerBlCustomerRequestsController@write')->name('partner-bl-customer-requests-write');
    Route::post('/partner/bl/customer/requests/fields', 'BL\PartnerBlCustomerRequestsController@getFields')->name('partner-bl-customer-requests-fields');
    Route::post('/partner/bl/customer/requests/request/card', 'BL\PartnerBlCustomerRequestsController@requestCard')->name('partner-bl-customer-requests-request-card');
    Route::post('/partner/bl/customer/requests/request/send', 'BL\PartnerBlCustomerRequestsController@getFields')->name('partner-bl-customer-requests-fields');
    //</editor-fold>
    //<editor-fold desc="Шаги">
    Route::post('/steps/bl/customer/requests/list', 'BL\StepsBlCustomerRequestsController@list')->name('steps-bl-customer-requests-list');
    //</editor-fold>
    //<editor-fold desc="ПРИКРЕПЛЕННЫЕ ФАЙЛЫ/ДОКУМЕНТЫ К ОБРАЩЕНИЮ КЛИЕНТА">
    Route::post('/customer/requests/dbArea/files', 'BL\BlCustomerRequestsDbAreaFilesController@list')->name('customer-requests-db-area-files');
    //</editor-fold>
    //</editor-fold>
    // - ЗубановИА 12022020



    Route::post('/bl/contractor/requests/list', 'BL\BlContractorRequestsController@list')->name('bl-contractor-requests-list');
//    Route::post('/bl/contractor/requests/list', 'BL\ClientBlContractorRequestsController@list')->name('bl-contractor-requests-list');
//    Route::post('/bl/contractor/requests/list', 'BL\PartnerBlContractorRequestsController@list')->name('bl-contractor-requests-list');
    Route::post('/bl/contractor/requests/card', 'BL\BlContractorRequestsController@card')->name('bl-contractor-requests-card');
    Route::post('/bl/contractor/requests/write', 'BL\BlContractorRequestsController@write')->name('bl-contractor-requests-write');

//    Route::post('/bl/contractor/requests/card', 'BL\PartnerBlContractorRequestsController@card')->name('bl-contractor-requests-card');
    Route::post('/partner/bl/contractor/requests/write', 'BL\PartnerBlContractorRequestsController@write')->name('partner-bl-contractor-requests-write');
    Route::post('/partner/bl/contractor/requests/send/request', 'BL\PartnerBlContractorRequestsController@sendRequest')->name('partner-bl-contractor-requests-send-request');


    Route::post('/bl/contractor/requests/write', 'BL\BlContractorRequestsController@write')->name('bl-contractor-requests-write');
    Route::post('/bl/contractor/requests/update', 'BL\BlContractorRequestsController@update')->name('bl-contractor-requests-update');
    Route::post('/bl/contractor/requests/delete', 'BL\BlContractorRequestsController@delete')->name('bl-contractor-requests-delete');
    Route::post('/bl/contractor/requests/insert', 'BL\BlContractorRequestsController@insert')->name('bl-contractor-requests-insert');
    Route::post('/bl/contractor/requests/deleteMark', 'BL\BlContractorRequestsController@deleteMark')->name('bl-contractor-requests-deleteMark');
    Route::post('/bl/contractor/requests/cardDev', 'BL\BlContractorRequestsController@cardDev')->name('bl-contractor-requests-card-dev');
    Route::post('/bl/contractor/requests/send/request', 'BL\BlContractorRequestsController@sendRequest')->name('bl-contractor-requests-send-request');

    Route::post('/bl/contractor/request/types/list', 'BL\BlContractorRequestTypesController@list')->name('bl-contractor-request-types-list');
    Route::post('/bl/contractor/request/types/card', 'BL\BlContractorRequestTypesController@card')->name('bl-contractor-request-types-card');
    Route::post('/bl/contractor/request/types/update', 'BL\BlContractorRequestTypesController@update')->name('bl-contractor-request-types-update');
    Route::post('/bl/contractor/request/types/delete', 'BL\BlContractorRequestTypesController@delete')->name('bl-contractor-request-types-delete');
    Route::post('/bl/contractor/request/types/insert', 'BL\BlContractorRequestTypesController@insert')->name('bl-contractor-request-types-insert');
    Route::post('/bl/contractor/request/types/deleteMark', 'BL\BlContractorRequestTypesController@deleteMark')->name('bl-contractor-request-types-deleteMark');
    Route::post('/bl/contractor/request/types/write', 'BL\BlContractorRequestTypesController@write')->name('bl-contractor-request-types-write');


    //---08.04.2019 Miniyar

    // ---- Alex Shlemko 09.04.18
    Route::post('/menu/items/insert', 'Menu\MenuItemsController@insert')->name('menu-items-insert');
    Route::post('/menu/items/update', 'Menu\MenuItemsController@update')->name('menu-items-update');
    Route::post('/menu/items/delete', 'Menu\MenuItemsController@delete')->name('menu-items-delete');
    Route::post('/menu/items/deleteMark', 'Menu\MenuItemsController@deleteMark')->name('menu-items-deleteMark');
    Route::post('/menu/items/list', 'Menu\MenuItemsController@list')->name('menu-items-list');
    Route::post('/menu/items/tree', 'Menu\MenuItemsController@tree')->name('menu-items-tree');
    Route::post('/menu/items/card', 'Menu\MenuItemsController@card')->name('menu-items-card');
    Route::post('/menu/items/write', 'Menu\MenuItemsController@write')->name('menu-items-write');
    Route::post('/menu/items/tree/save', 'Menu\MenuItemsController@saveTree')->name('menu-items-tree-save');
    Route::post('/menu/item/access/roles/write', 'Menu\MenuItemAccessRolesController@write')->name('menu-item-access-roles-write');

    Route::post('/menu/item/access/roles/insert', 'Menu\MenuItemAccessRolesController@insert')->name('menu-item-access-roles-insert');
    Route::post('/menu/item/access/roles/update', 'Menu\MenuItemAccessRolesController@update')->name('menu-item-access-roles-update');
    Route::post('/menu/item/access/roles/delete', 'Menu\MenuItemAccessRolesController@delete')->name('menu-item-access-roles-delete');
    Route::post('/menu/item/access/roles/deleteMark', 'Menu\MenuItemAccessRolesController@deleteMark')->name('menu-item-access-roles-deleteMark');
    Route::post('/menu/item/access/roles/card', 'Menu\MenuItemAccessRolesController@card')->name('menu-item-access-roles-card');
    Route::post('/menu/item/access/roles/list', 'Menu\MenuItemAccessRolesController@list')->name('menu-item-access-roles-list');

    // --- Alex Shlemko 09.04.18

    // +++++ Alex Shlemko 05.06.19
    Route::post('/bl/insurance/policy/contracts/list', 'BL\BlInsurancePolicyContractsController@list')->name('bl-leas-cont-list');
    Route::post('/bl/insurance/policy/contracts/card', 'BL\BlInsurancePolicyContractsController@card')->name('bl-leas-cont-card');
    Route::post('/bl/insurance/policy/contracts/insert', 'BL\BlInsurancePolicyContractsController@insert')->name('bl-leas-cont-insert');
    Route::post('/bl/insurance/policy/contracts/update', 'BL\BlInsurancePolicyContractsController@update')->name('bl-leas-cont-update');
    Route::post('/bl/insurance/policy/contracts/deleteMark', 'BL\BlInsurancePolicyContractsController@deleteMark')->name('bl-leas-cont-deleteMark');
    // ---- Alex Shlemko 05.06.19


    Route::post('/bl/administrators/list', 'BL\BlAdministratorsController@list')->name('bl-admin-list');
    Route::post('/bl/administrators/card', 'BL\BlAdministratorsController@card')->name('bl-admin-card');
    Route::post('/bl/administrators/write', 'BL\BlAdministratorsController@write')->name('bl-admin-write');
    Route::post('/bl/administrators/insert', 'BL\BlAdministratorsController@insert')->name('bl-admin-insert');
    Route::post('/bl/administrators/update', 'BL\BlAdministratorsController@update')->name('bl-admin-update');
    Route::post('/bl/administrators/deleteMark', 'BL\BlAdministratorsController@deleteMark')->name('bl-admin-deleteMark');
    Route::post('/bl/administrators/mail/send', 'BL\BlAdministratorsController@handleSendMail')->name('bl-admin-handle-send-mail');

    ////Dev test Routes
    Route::post('/user/card/dev', 'Admin\DevConsumersController@card')->name('admin-user-card-dev');
    Route::post('/user/card/dev/update', 'Admin\DevConsumersController@update')->name('admin-user-card-dev-update');

    // -- Albert 3.06.19
//            Route::post('/report/leasing/list', 'BL\BlReportLeasingContractBalanceController@list')->name('report-leasing-list');

//            Route::post('/report/leasing/card', 'BL\BlReportLeasingContractBalanceController@card')->name('report-leasing-card');
//            Route::post('/report/leasing/create', 'BL\BlReportLeasingContractBalanceController@sendRequest')->name('report-leasing-create');

    Route::post('/bl/report/leasing/contract/balance/list', 'BL\BlReportLeasingContractBalanceController@list')->name('bl-leasing-contract-balance-list');
    Route::post('/bl/report/leasing/contract/balance/card', 'BL\BlReportLeasingContractBalanceController@card')->name('bl-leasing-contract-balance-card');
    Route::post('/bl/report/leasing/contract/balance/create', 'BL\BlReportLeasingContractBalanceController@sendRequest')->name('bl-leasing-contract-balance-create');

    Route::post('/notification/list', 'TabNotifications\NotificationsController@list')->name('notification-list');


    //+++ Анашкин 20.05
    Route::post('/action/deletemark', 'Controller@deleteMark')->name('action-delete-mark');
    Route::post('/action/undeletemark', 'Controller@undeleteMark')->name('action-undelete-mark');
    Route::post('/action/actualmark', 'Controller@actualMark')->name('action-actual-mark');
    Route::post('/action/unactualmark', 'Controller@unactualMark')->name('action-unactual-mark');
    Route::post('/action/delete', 'Controller@delete')->name('action-delete');
    Route::post('/action/write', 'TabCompanyContractor\ContractorsController@write')->name('action-write');
    Route::post('/action/getbuttonslist', 'TabCompanyContractor\ContractorsController@getButtonsList')->name('action-get-buttons-list');

    Route::post('/action/file/download', 'Controller@download')->name('file-download');

    Route::post('/action/logs/list', 'Admin\ActionLogsController@list')->name('action-logs-list');
    Route::post('/action/logs/card', 'Admin\ActionLogsController@card')->name('action-logs-card');
    Route::post('/action/logs/delete/all', 'Admin\ActionLogsController@deleteAll')->name('action-logs-delete-all');

    Route::post('/acts/list', 'BL\SettlementReconciliationActsController@list')->name('settlement-acts-list');
    Route::post('/acts/download', 'BL\SettlementReconciliationActsController@download')->name('settlement-acts-download');
    Route::post('/acts/request/card', 'BL\SettlementReconciliationActsController@requestCard')->name('settlement-acts-request-card');
    Route::post('/acts/documents/get', 'BL\SettlementReconciliationActsController@getDocuments')->name('settlement-acts-get-documents');

    Route::post('/service/acts/list', 'BL\ServiceAcceptanceActsController@list')->name('service-acts-list');
    Route::post('/service/acts/download', 'BL\ServiceAcceptanceActsController@download')->name('service-acts-download');
    Route::post('/service/acts/request/card', 'BL\ServiceAcceptanceActsController@requestCard')->name('service-acts-request-card');
    Route::post('/service/acts/get/documents', 'BL\ServiceAcceptanceActsController@getDocuments')->name('service-acts-get-documents');

    Route::post('/invoices/list', 'BL\InvoicesController@list')->name('invoices-list');
    Route::post('/invoices/download', 'BL\InvoicesController@download')->name('invoices-acts-download');
    Route::post('/invoices/request/card', 'BL\InvoicesController@requestCard')->name('invoices-request-card');
    Route::post('/invoices/ge/admin/bl/leasing/contracts/listt/documents', 'BL\InvoicesController@getDocuments')->name('invoices-get-documents');

    Route::post('/payment/invoices/list', 'BL\PaymentInvoicesController@list')->name('payment-invoices-list');
    Route::post('/payment/invoices/request/card', 'BL\PaymentInvoicesController@requestCard')->name('payment-invoices-request-card');
    Route::post('/payment/invoices/get/documents', 'BL\PaymentInvoicesController@getDocuments')->name('payment-invoices-get-documents');



    Route::post('/bl/leasing/contracts/list/dbArea/files', 'BL\BlLeasingContractsDbAreaFilesController@list')->name('leasing-contracts-db-area-files');
    Route::post('/questionnaire/card', 'BL\BLDownloadProfileController@card')->name('bl-download-profile-card');

    Route::any('/menu', 'Admin\MenuController@index')->name('admin-menu');

    Route::post('/model/list', 'TabSystem\ModelsController@list')->name('model-list');
    Route::post('/model/card', 'TabSystem\ModelsController@card')->name('model-card');
    Route::post('/model/write', 'TabSystem\ModelsController@write')->name('model-write');

    Route::post('/controller/list', 'TabSystem\ControllersController@list')->name('controller-list');
    Route::post('/controller/card', 'TabSystem\ControllersController@card')->name('controller-card');
    Route::post('/controller/write', 'TabSystem\ControllersController@write')->name('controller-write');
    Route::post('/system/parameters/list', 'TabSystem\SystemParametersController@list')->name('system-parameters-list');
    Route::post('/system/parameters/card', 'TabSystem\SystemParametersController@card')->name('system-parameters-card');
    Route::post('/system/parameters/write', 'TabSystem\SystemParametersController@write')->name('system-parameters-write');

    Route::post('/system/parameters/values/list', 'TabSystem\SystemParametersValuesController@list')->name('system-parameters-values-list');
    Route::post('/system/parameters/values/card', 'TabSystem\SystemParametersValuesController@card')->name('system-parameters-values-card');
    Route::post('/system/parameters/values/write', 'TabSystem\SystemParametersValuesController@write')->name('system-parameters-values-write');

    Route::post('/action/exchange/logs/group/list', 'Admin\ActionExchangeLogGroupByController@list')->name('action-exchange-logs-group-by-list');
    Route::post('/action/exchange/logs/list', 'Admin\ActionExchangeLogController@list')->name('action-exchange-logs-list');

    Route::post('/statistic', 'Admin\ActionLogsTotalsController@statistic')->name('statistic');
    Route::post('/statistic/finish', 'Admin\ActionLogsTotalsController@statisticFinish')->name('statistic-finish');


    Route::post('/verification/inputs', 'Admin\ConsumersController@getVerificationInputs')->name('verification-inputs');
//    Route::post('/login-as-user', 'Admin\ConsumersController@logInAsUser')->name('login-as-user');


    Route::post('/language/set', 'TabCommonReferences\LanguagesController@switchLanguage')->name('switch-language')->middleware("switchLang");

    Route::post('/partner/list', 'PartnersController@list')->name('partner-list');
//    Route::post('/partner/list', 'Partners\PartnerPartnersController@list')->name('partner-list');

    Route::post('/partner/card', 'PartnersController@card')->name('partner-card');
    Route::post('/partner/write', 'PartnersController@write')->name('partner-write');

    Route::post('/partner/point/list', 'PartnerPointsController@list')->name('partner-point-list');
    Route::post('/partner/point/list', 'Partners\PartnerPointPartnerPointsController@list')->name('partner-point-list');
    Route::post('/partner/point/card', 'PartnerPointsController@card')->name('partner-point-card');
    Route::post('/partner/point/write', 'PartnerPointsController@write')->name('partner-point-write');

    Route::post('/partner/regions/list', 'PartnerRegionsController@list')->name('partner-regions-list');
    Route::post('/partner/region/card', 'PartnerRegionsController@card')->name('partner-region-card');
//    Route::post('/partner/region/card', 'Partners\PartnerPartnerRegionsController@card')->name('partner-region-card');
    Route::post('/partner/region/write', 'PartnerRegionsController@write')->name('partner-region-write');

    Route::post('/contact/person/list', 'ContactPersonsController@list')->name('contact-person-list');
    Route::post('/contact/person/card', 'ContactPersonsController@card')->name('contact-person-card');
    Route::post('/contact/person/write', 'ContactPersonsController@write')->name('contact-person-write');

    Route::post('/contact/person/info/list', 'ContactPersonInfoController@list')->name('contact-person-info-list');
    Route::post('/contact/person/info/card', 'ContactPersonInfoController@card')->name('contact-person-info-card');
    Route::post('/contact/person/info/write', 'ContactPersonInfoController@write')->name('contact-person-info-write');

    Route::post('/partner/employee/list', 'PartnerEmployeesController@list')->name('partner-employee-list');
    Route::post('/partner/employee/card', 'PartnerEmployeesController@card')->name('partner-employee-card');
    Route::post('/partner/employee/write', 'PartnerEmployeesController@write')->name('partner-employee-write');

    Route::post('/partner/employee/contact/person/list', 'PartnerEmployeeContactPersonsController@list')->name('partner-employee-contact-person-list');
    Route::post('/partner/employee/contact/person/card', 'PartnerEmployeeContactPersonsController@card')->name('partner-employee-contact-person-card');
    Route::post('/partner/employee/contact/person/write', 'PartnerEmployeeContactPersonsController@write')->name('partner-employee-contact-person-write');

    Route::post('/user/interface/list', 'UserInterfacesController@list')->name('user-interface-list');
    Route::post('/user/interface/card', 'UserInterfacesController@card')->name('user-interface-card');
    Route::post('/user/interface/write', 'UserInterfacesController@write')->name('user-interface-write');

    Route::post('/qt/list', 'QuestionnaireTemplates\QuestionnaireTemplatesController@list')->name('qt-list');
    Route::post('/qt/card', 'QuestionnaireTemplates\QuestionnaireTemplatesController@card')->name('qt-card');
    Route::post('/qt/tree', 'QuestionnaireTemplates\QuestionnaireTemplatesController@tree')->name('qt-tree');
    Route::post('/qt/write', 'QuestionnaireTemplates\QuestionnaireTemplatesController@write')->name('qt-write');
    Route::post('/qt/questionnairePreview', 'QuestionnaireTemplates\QuestionnaireTemplatesController@preview')->name('qt-template-preview');
    Route::post('/qt/copy', 'QuestionnaireTemplates\QuestionnaireTemplatesController@copyTemplate')->name('qt-template-copy');

    Route::post('/qt/questionnaire/save', 'QuestionnaireTemplates\QuestionnairesController@save')->name('qt-questionnaire-save');
    Route::post('/qt/questionnaire/tree/save', 'QuestionnaireTemplates\QuestionnairesController@saveTree')->name('qt-questionnaire-tree-save');
    Route::post('/qt/questionnaire', 'QuestionnaireTemplates\QuestionnairesController@questionnairePreview')->name('qt-preview');
    Route::post('/qt/questionnaire/copy', 'QuestionnaireTemplates\QuestionnairesController@copyQuestionnaire')->name('qt-copy');

    Route::post('/qt/page/list', 'QuestionnaireTemplates\QTPagesController@list')->name('qt-page-list');
    Route::post('/qt/page/card', 'QuestionnaireTemplates\QTPagesController@card')->name('qt-page-card');
    Route::post('/qt/page/write', 'QuestionnaireTemplates\QTPagesController@write')->name('qt-page-write');

    Route::post('/qt/block/list', 'QuestionnaireTemplates\QTBlocksController@list')->name('qt-block-list');
    Route::post('/qt/block/card', 'QuestionnaireTemplates\QTBlocksController@card')->name('qt-block-card');
    Route::post('/qt/block/write', 'QuestionnaireTemplates\QTBlocksController@write')->name('qt-block-write');

    Route::post('/qt/set/list', 'QuestionnaireTemplates\QTSetsController@list')->name('qt-set-list');
    Route::post('/qt/set/card', 'QuestionnaireTemplates\QTSetsController@card')->name('qt-set-card');
    Route::post('/qt/set/write', 'QuestionnaireTemplates\QTSetsController@write')->name('qt-set-write');

    Route::post('/qt/question/kind/list', 'QuestionnaireTemplates\QTQuestionKindsController@list')->name('qt-question-kind-list');
    Route::post('/qt/question/kind/card', 'QuestionnaireTemplates\QTQuestionKindsController@card')->name('qt-question-kind-card');
    Route::post('/qt/question/kind/write', 'QuestionnaireTemplates\QTQuestionKindsController@write')->name('qt-question-kind-write');
    Route::post('/qt/question/kind/fields', 'QuestionnaireTemplates\QTQuestionKindsController@getFields')->name('qt-question-kind-fields');

    Route::post('/qt/question/type/list', 'QuestionnaireTemplates\QTQuestionTypesController@list')->name('qt-question-type-list');
    Route::post('/qt/question/type/card', 'QuestionnaireTemplates\QTQuestionTypesController@card')->name('qt-question-type-card');
    Route::post('/qt/question/type/write', 'QuestionnaireTemplates\QTQuestionTypesController@write')->name('qt-question-type-write');
    Route::post('/qt/question/type/fields', 'QuestionnaireTemplates\QTQuestionTypesController@getFields')->name('qt-question-type-fields');


    Route::post("/journal/documents/tree", "JournalDocumentsController@tree")->name("journal-documents-tree");

    Route::post("/qt/sets/questions/list/card", "QuestionnaireTemplates\QTSetsQuestionsListController@card")->name("qt-sets-questions-list-card");
    Route::post("/qt/sets/questions/list/list", "QuestionnaireTemplates\QTSetsQuestionsListController@list")->name("qt-sets-questions-list-list");
    Route::post("/qt/sets/questions/list/write", "QuestionnaireTemplates\QTSetsQuestionsListController@write")->name("qt-sets-questions-list-write");

    Route::post("/qt/sets/questions/list/fields", "QuestionnaireTemplates\QTSetsQuestionsListController@getFields")->name("qt-sets-questions-list-fields");

    Route::post('/qt/validations/list', 'QuestionnaireTemplates\QTValidationsController@list')->name('qt-validations-list');
    Route::post('/qt/validations/card', 'QuestionnaireTemplates\QTValidationsController@card')->name('qt-validations-card');
    Route::post('/qt/validations/write', 'QuestionnaireTemplates\QTValidationsController@write')->name('qt-validations-write');

    Route::post('/qt/validation/rules/list', 'QuestionnaireTemplates\QTValidationRulesController@list')->name('qt-validation-rules-list');
    Route::post('/qt/validation/rules/card', 'QuestionnaireTemplates\QTValidationRulesController@card')->name('qt-validation-rules-card');
    Route::post('/qt/validation/rules/write', 'QuestionnaireTemplates\QTValidationRulesController@write')->name('qt-validation-rules-write');


    // + Miniyar 14.01.2019

    Route::post('/calculation/template/parameter/setting/list', 'CalculationTemplateParameterSettingsController@list')->name('calculation-template-parameter-settings-list');
    Route::post('/calculation/template/parameter/setting/card', 'CalculationTemplateParameterSettingsController@card')->name('calculation-template-parameter-settings-card');
    Route::post('/calculation/template/parameter/setting/write', 'CalculationTemplateParameterSettingsController@write')->name('calculation-template-parameter-settings-write');

    Route::post('/extension/one/additional/detail/list', 'ExtensionOneAdditionalDetailsController@list')->name('extension-one-additional-detail-list');
    Route::post('/extension/one/additional/detail/card', 'ExtensionOneAdditionalDetailsController@card')->name('extension-one-additional-detail-card');
    Route::post('/extension/one/additional/detail/write', 'ExtensionOneAdditionalDetailsController@write')->name('extension-one-additional-detail-write');
    Route::post('/extension/one/additional/detail/fields', 'ExtensionOneAdditionalDetailsController@getFields')->name('extension-one-additional-detail-fields');

    Route::post('/calculation/template/list', 'CalculationTemplatesController@list')->name('calculation-template-list');
    Route::post('/calculation/template/card', 'CalculationTemplatesController@card')->name('calculation-template-card');
    Route::post('/calculation/template/write', 'CalculationTemplatesController@write')->name('calculation-template-write');

    Route::post('/calculation/parameter/type/list', 'CalculationParameterTypesController@list')->name('calculation-parameter-type-list');
    Route::post('/calculation/parameter/type/card', 'CalculationParameterTypesController@card')->name('calculation-parameter-type-card');
    Route::post('/calculation/parameter/type/write', 'CalculationParameterTypesController@write')->name('calculation-parameter-type-write');

    Route::post('/calculation/parameter/answer/list/list', 'CalculationParameterAnswerListController@list')->name('calculation-parameter-answer-list-list');
    Route::post('/calculation/parameter/answer/list/card', 'CalculationParameterAnswerListController@card')->name('calculation-parameter-answer-list-card');
    Route::post('/calculation/parameter/answer/list/write', 'CalculationParameterAnswerListController@write')->name('calculation-parameter-answer-list-write');

    Route::post('/bn/currencies/list', 'BankNet\BnCurrenciesController@list')->name('bn-currencies-list');
    Route::post('/bn/currencies/card', 'BankNet\BnCurrenciesController@card')->name('bn-currencies-card');
    Route::post('/bn/currencies/write', 'BankNet\BnCurrenciesController@write')->name('bn-currencies-write');

    Route::post('/bn/payment/method/groups/list', 'BankNet\BnPaymentMethodGroupsController@list')->name('bn-payment-method-groups-list');
    Route::post('/bn/payment/method/groups/card', 'BankNet\BnPaymentMethodGroupsController@card')->name('bn-payment-method-groups-card');
    Route::post('/bn/payment/method/groups/write', 'BankNet\BnPaymentMethodGroupsController@write')->name('bn-payment-method-groups-write');

    Route::post('/bn/payment/method/list', 'BankNet\BnPaymentMethodsController@list')->name('bn-payment-method-list');
    Route::post('/bn/payment/method/card', 'BankNet\BnPaymentMethodsController@card')->name('bn-payment-method-card');
    Route::post('/bn/payment/method/write', 'BankNet\BnPaymentMethodsController@write')->name('bn-payment-method-write');

    Route::post('/bn/exchange/offers/list', 'BankNet\BnExchangeOffersController@list')->name('bn-exchange-offers-list');
    Route::post('/bn/exchange/offers/card', 'BankNet\BnExchangeOffersController@card')->name('bn-exchange-offers-card');
    Route::post('/bn/exchange/offers/write', 'BankNet\BnExchangeOffersController@write')->name('bn-exchange-offers-write');

    Route::post('/bn/exchangers/list', 'BankNet\BnExchangersController@list')->name('bn-exchange-list');
    Route::post('/bn/exchangers/card', 'BankNet\BnExchangersController@card')->name('bn-exchange-card');
    Route::post('/bn/exchangers/write', 'BankNet\BnExchangersController@write')->name('bn-exchange-write');

    Route::post('/bn/exchange/directions/list', 'BankNet\BnExchangeDirectionsController@list')->name('bn-exchange-directions-list');
    Route::post('/bn/exchange/directions/card', 'BankNet\BnExchangeDirectionsController@card')->name('bn-exchange-directions-card');
    Route::post('/bn/exchange/directions/write', 'BankNet\BnExchangeDirectionsController@write')->name('bn-exchange-directions-write');

    Route::post('/get/home/panel/elements', 'HomePanelController@index')->name('get-home-panel-elements');
    Route::post('/get/home/panel/top', 'HomePanelController@getTopObjects')->name('get-home-panel-top');

    Route::post('/add/bookmark', 'BookmarksController@addBookmark')->name('add-bookmark');
    Route::post('/delete/bookmark', 'BookmarksController@deleteBookmark')->name('delete-bookmark');

    // - Miniyar 14.01.2019

//     Route::post('/action/logs/list', 'Admin\LogInAsUsersController@list')->name('action-logs-list');
//    Route::post('/login-as-user', 'Admin\LogInAsUsersController@logInAsUser')->name('login-as-user');

    Route::post('/users/list', 'Admin\LogInAsUsersController@list')->name('admin-users-list');
    Route::post('/login-as-user', 'Admin\LogInAsUsersController@logInAsUser')->name('login-as-user');



    /**
     * Test cron Controller
     */

    Route::post('/cron/test', 'TestCron@cron')->name('test-cron');



});

Route::post("/qt/sets/questions/list/fields", "QuestionnaireTemplates\QTSetsQuestionsListController@getFields")->name("qt-sets-questions-list-fields");

//Route::post('/captions/translate', 'TabSystem\CaptionsController@translateCaptions')->name('translate-captions');


/*-----------------------BankNet------------------------*/

Route::group(['middleware' => ['switchLang']], function () {


    Route::post('/faq/index/public', 'Help\FaqController@index')->name('faq-public');
    Route::post('/faq/get/answer/public', 'Help\FaqController@getAnswer')->name('faq-get-answer-public');
    Route::post('/menu/translateList/public', 'Admin\MenuController@translateList')->name('admin-menu-translateList-public');
    Route::post('/language/set/public', 'TabCommonReferences\LanguagesController@switchLanguage')->name('switch-language-public');

    Route::post('/bank/net/contact/send/email', 'BankNet\BnContactsController@sendEmail')->name('contact-bank-net-send-email');
    Route::post('/bank/net/contact/card', 'BankNet\BnContactsController@card')->name('contact-bank-net-card');
    Route::post('/footer/bank/net', 'BankNet\FooterNetBanksController@index')->name('footer-bank-net');
    Route::post('/bank/net/get/payment/methods', 'BankNet\NetBanksController@paymentMethods')->name('bank-net-payment-methods');
    Route::post('/bank/net/get/payment/methods/groups', 'BankNet\NetBanksController@paymentMethodsGroups')->name('bank-net-payment-methods-groups');
    Route::post('/bank/net/get/currencies/fiat', 'BankNet\NetBanksController@currenciesFiat')->name('bank-net-currencies-fiat');
    Route::post('/get/payment/methods/groups', 'BankNet\NetBanksController@getPaymentMethodsGroupsDb')->name('get-payment-methods-groups');
    Route::post('/bank/net/get/exchangers', 'BankNet\NetBanksController@exchangers')->name('bank-net-exchangers');
    Route::post('/bank/net/get/directions', 'BankNet\NetBanksController@directions')->name('bank-net-directions');
    Route::post('/bank/net/get/services', 'BankNet\NetBanksController@services')->name('bank-net-services');

    Route::post('/bn/exchange/offers/list', 'BankNet\BnExchangeOffersController@list')->name('bn-exchange-offers-list');

    Route::post('/build/error', 'Admin\ErrorsController@buildError')->name('api-build-error');

    Route::any('/menu/bank/net', 'Admin\MenuController@index')->name('admin-menu');;

});

//Route::post('/admin/access/roles/list', 'BankNet\BnExchangeOffersController@list')->name('bn-exchange-offers-list');




/*-----------------------END BankNet------------------------*/
