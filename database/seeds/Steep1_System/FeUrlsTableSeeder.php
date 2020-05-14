<?php

use Illuminate\Database\Seeder;

class FeUrlsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\FeUrl::truncate();


        /**/
        \App\Models\FeUrl::create([
            'id' => 1,
            'controller_id' => NULL,
            'fe_url_code' => NULL,
            'fe_url_parameter' => NULL,
            'caption_code' => NULL,
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
//            'fe_url_header_top' => '<div style="text-align: left">
//<h1>Кабинет клиента РБ ЛИЗИНГ</h1>
//<p style="text-align: left">Связаться с нами:</p>
//<table>
//<tr style="margin-bottom: 5px">
//<td style="padding-right: 15px;padding-bottom: 10px;">Тел:</td>
//<td><a style="color: #2f3339;" href="tel:+74955807334">+7 (495) 580 73 34</a></td>
//</tr>
//<tr>
//<td style="padding-right: 15px;padding-bottom: 10px;">E-mail:</td>
//<td><a style="color: #2f3339;" href="mailto:ru-leasing.info@rosbank.ru">ru-leasing.info@rosbank.ru</a></td>
//</tr>
//</table>
//</div>',
            'fe_url_header_top' => '<div style="text-align: left"> 
<h1>Добро пожаловать!</h1> 
</div>',
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 2,
            'controller_id' => NULL,
            'fe_url_code' => '404',
            'fe_url_parameter' => NULL,
            'caption_code' => 'Error404PageNotFound',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 3,
            'controller_id' => NULL,
            'fe_url_code' => '403',
            'fe_url_parameter' => NULL,
            'caption_code' => 'Error403Forbidden',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 4,
            'controller_id' => NULL,
            'fe_url_code' => '500',
            'fe_url_parameter' => NULL,
            'caption_code' => 'Error500Unexpected',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 5,
            'controller_id' => NULL,
            'fe_url_code' => '000',
            'fe_url_parameter' => NULL,
            'caption_code' => NULL,
            'deleted_l' => 0,
            'fe_url_image_id' => 42,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => '<p>Извините, страница, находится в разработке.</p> <p><a href="/" class="router-link-active">Вернитесь на главную</a> или <a href="/404" class="router-link-exact-active router-link-active">сообщите о проблеме</a></p>',
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 6,
            'controller_id' => NULL,
            'fe_url_code' => '*/new',
            'fe_url_parameter' => NULL,
            'caption_code' => 'new',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 7,
            'controller_id' => 6,
            'fe_url_code' => 'profile',
            'fe_url_parameter' => NULL,
            'caption_code' => 'UserProfile',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 8,
            'controller_id' => NULL,
            'fe_url_code' => 'profileTest',
            'fe_url_parameter' => NULL,
            'caption_code' => NULL,
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 9,
            'controller_id' => NULL,
            'fe_url_code' => 'textPage',
            'fe_url_parameter' => NULL,
            'caption_code' => NULL,
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 10,
            'controller_id' => NULL,
            'fe_url_code' => 'ExternalReports',
            'fe_url_parameter' => NULL,
            'caption_code' => 'ExternalReports',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 11,
            'controller_id' => NULL,
            'fe_url_code' => 'documents',
            'fe_url_parameter' => NULL,
            'caption_code' => NULL,
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 12,
            'controller_id' => 26,
            'fe_url_code' => 'actionLogs',
            'fe_url_parameter' => 'action_log_id',
            'caption_code' => 'ActionLogs',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 13,
            'controller_id' => 4,
            'fe_url_code' => 'contractors',
            'fe_url_parameter' => 'contractor_id',
            'caption_code' => 'Contractors',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 14,
            'controller_id' => 8,
            'fe_url_code' => 'companies',
            'fe_url_parameter' => 'company_id',
            'caption_code' => 'Companies',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 15,
            'controller_id' => 17,
            'fe_url_code' => 'dbAreas',
            'fe_url_parameter' => 'db_area_id',
            'caption_code' => 'DatabaseAreas',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 16,
            'controller_id' => 13,
            'fe_url_code' => 'countries',
            'fe_url_parameter' => 'country_id',
            'caption_code' => 'Countries',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 17,
            'controller_id' => 21,
            'fe_url_code' => 'consumerAccounts',
            'fe_url_parameter' => 'consumer_account_id',
            'caption_code' => 'ConsumerAccounts',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 18,
            'controller_id' => 61,
            'fe_url_code' => 'fileTypes',
            'fe_url_parameter' => 'file_type_id',
            'caption_code' => 'FileTypes',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 19,
            'controller_id' => 18,
            'fe_url_code' => 'attachedKind',
            'fe_url_parameter' => NULL,
            'caption_code' => 'DocumentKind',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 20,
            'controller_id' => 19,
            'fe_url_code' => 'attachedType',
            'fe_url_parameter' => NULL,
            'caption_code' => 'DocumentType',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 21,
            'controller_id' => 5,
            'fe_url_code' => 'languages',
            'fe_url_parameter' => 'language_id',
            'caption_code' => 'Languages',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 22,
            'controller_id' => 9,
            'fe_url_code' => 'serversDb',
            'fe_url_parameter' => 'server_id',
            'caption_code' => 'DatabaseServers',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 23,
            'controller_id' => 50,
            'fe_url_code' => 'banks',
            'fe_url_parameter' => 'bank_id',
            'caption_code' => 'Banks',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 24,
            'controller_id' => 49,
            'fe_url_code' => 'bankAccountTypes',
            'fe_url_parameter' => 'bank_account_types_id',
            'caption_code' => 'BankAccountTypes',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 25,
            'controller_id' => 48,
            'fe_url_code' => 'cryptoTokens',
            'fe_url_parameter' => 'crypto_token_id',
            'caption_code' => 'CryptoTokens',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 26,
            'controller_id' => 60,
            'fe_url_code' => 'images',
            'fe_url_parameter' => 'image_id',
            'caption_code' => 'Images',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 27,
            'controller_id' => 55,
            'fe_url_code' => 'imageCategories',
            'fe_url_parameter' => 'image_category_id',
            'caption_code' => 'ImageCategories',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 28,
            'controller_id' => 51,
            'fe_url_code' => 'currencies',
            'fe_url_parameter' => 'currency_id',
            'caption_code' => 'Currencies',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 29,
            'controller_id' => 46,
            'fe_url_code' => 'cryptoExchanges',
            'fe_url_parameter' => 'c_exchange_id',
            'caption_code' => 'CryptoExchanges',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 30,
            'controller_id' => 47,
            'fe_url_code' => 'cryptoPlatforms',
            'fe_url_parameter' => 'c_platform_id',
            'caption_code' => 'CryptoPlatforms',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 31,
            'controller_id' => 69,
            'fe_url_code' => 'captions',
            'fe_url_parameter' => 'caption_id',
            'caption_code' => 'CaptionList',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 32,
            'controller_id' => 10,
            'fe_url_code' => 'translationCaptions',
            'fe_url_parameter' => 'translation_caption_id',
            'caption_code' => 'CaptionTranslations',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 33,
            'controller_id' => 11,
            'fe_url_code' => 'dbs',
            'fe_url_parameter' => 'db_id',
            'caption_code' => 'Databases',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 34,
            'controller_id' => 15,
            'fe_url_code' => 'regions',
            'fe_url_parameter' => 'region_id',
            'caption_code' => 'Regions',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 35,
            'controller_id' => 20,
            'fe_url_code' => 'attachedFile',
            'fe_url_parameter' => 'att_doc_file_id',
            'caption_code' => 'AttachedDocuments',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 36,
            'controller_id' => 12,
            'fe_url_code' => 'dbTypes',
            'fe_url_parameter' => 'db_type_id',
            'caption_code' => 'DbTypes',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 37,
            'controller_id' => 45,
            'fe_url_code' => 'pages',
            'fe_url_parameter' => 'page_id',
            'caption_code' => NULL,
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 38,
            'controller_id' => 104,
            'fe_url_code' => 'customerRequests',
            'fe_url_parameter' => 'requests_id',
            'caption_code' => 'CustomerRequests',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 39,
            'controller_id' => 14,
            'fe_url_code' => 'contactInfo',
            'fe_url_parameter' => 'contractor_info_id',
            'caption_code' => 'contactInfo',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 40,
            'controller_id' => 30,
            'fe_url_code' => 'contactInfo',
            'fe_url_parameter' => 'company_info_id',
            'caption_code' => 'contactInfo',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 41,
            'controller_id' => 57,
            'fe_url_code' => 'cryptoExchangeAccounts',
            'fe_url_parameter' => 'c_account_id',
            'caption_code' => 'CryptoExchangeAccounts',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 42,
            'controller_id' => 56,
            'fe_url_code' => 'cryptoExchangeAccounts',
            'fe_url_parameter' => 'c_account_id',
            'caption_code' => 'CryptoExchangeAccounts',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 43,
            'controller_id' => 58,
            'fe_url_code' => 'cryptoPlatformAccounts',
            'fe_url_parameter' => 'c_account_id',
            'caption_code' => 'CryptoPlatformAccounts',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 44,
            'controller_id' => 59,
            'fe_url_code' => 'cryptoPlatformAccounts',
            'fe_url_parameter' => 'c_account_id',
            'caption_code' => 'CryptoPlatformAccounts',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 45,
            'controller_id' => 49,
            'fe_url_code' => 'bankAccounts',
            'fe_url_parameter' => 'bank_account_id',
            'caption_code' => 'BankAccount',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 46,
            'controller_id' => 62,
            'fe_url_code' => 'cryptoPlatformWallets',
            'fe_url_parameter' => NULL,
            'caption_code' => 'CryptoWallets',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-05 06:36:50',
            'updated_at' => '2019-04-05 06:36:50',
        ]);


        /**/
        \App\Models\FeUrl::create([
            'id' => 48,
            'controller_id' => 72,
            'fe_url_code' => 'leasingCalculations',
            'fe_url_parameter' => 'bl_leasing_calculation_id',
            'caption_code' => 'PreliminaryOffers',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-19 09:36:50',
            'updated_at' => '2019-04-19 09:36:50',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 49,
            'controller_id' => NULL,
            'fe_url_code' => 'finished',
            'fe_url_parameter' => NULL,
            'caption_code' => NULL,
            'deleted_l' => 0,
            'fe_url_image_id' => 43,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => '<h1>Ваша заявка успешно отправлена!<h1>',
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-04-23 15:42:00',
            'updated_at' => '2019-04-23 15:42:00',
        ]);

        /*Аналог Contractors*/
        \App\Models\FeUrl::create([
            'id' => 50,
            'controller_id' => 4,
            'fe_url_code' => 'clients',
            'fe_url_parameter' => 'client_id',
            'caption_code' => 'Contractors',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-11 15:42:00',
            'updated_at' => '2019-05-11 15:42:00',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 51,
            'controller_id' => 74,
            'fe_url_code' => 'leasingContracts',
            'fe_url_parameter' => 'bl_leasing_contract_id',
            'caption_code' => 'Contracts',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-13 15:42:00',
            'updated_at' => '2019-05-13 15:42:00',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 52,
            'controller_id' => 106,
            'fe_url_code' => 'contractorRequests',
            'fe_url_parameter' => 'bl_contractor_request_id',
            'caption_code' => 'ContractorRequests',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-05-13 15:42:00',
            'updated_at' => '2019-05-13 15:42:00',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 53,
            'controller_id' => 111,
            'fe_url_code' => 'reportsLeasingContractBalance',
            'fe_url_parameter' => 'bl_report_leasing_contract_balance_id',
            'caption_code' => 'ReportsLeasingContractBalance',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-04 15:42:00',
            'updated_at' => '2019-06-04 15:42:00',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 54,
            'controller_id' => 112,
            'fe_url_code' => 'insuranceContracts',
            'fe_url_parameter' => 'bl_insurance_policy_contract_id',
            'caption_code' => 'InsuranceContracts',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-04 15:42:01',
            'updated_at' => '2019-06-04 15:42:01',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 55,
            'controller_id' => 113,
            'fe_url_code' => 'notifications',
            'fe_url_parameter' => 'notification_id',
            'caption_code' => 'Notifications',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-04 15:42:02',
            'updated_at' => '2019-06-04 15:42:02',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 56,
            'controller_id' => 107,
            'fe_url_code' => 'contractorRequestTypes',
            'fe_url_parameter' => 'bl_contractor_request_type_id',
            'caption_code' => 'ContractorRequestTypes',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:00',
            'updated_at' => '2019-06-07 12:00:00',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 57,
            'controller_id' => 114,
            'fe_url_code' => 'users',
            'fe_url_parameter' => 'bl_administrator_id',
            'caption_code' => 'Users',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:00',
            'updated_at' => '2019-06-07 12:00:00',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 58,
            'controller_id' => 115,
            'fe_url_code' => 'faq',
            'fe_url_parameter' => 'faq_id',
            'caption_code' => 'Help',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:01',
            'updated_at' => '2019-06-07 12:00:01',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 59,
            'controller_id' => 104,
            'fe_url_code' => 'createCustomerRequests',
            'fe_url_parameter' => 'bl_customer_request_id',
            'caption_code' => 'CustomerRequests',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 60,
            'controller_id' => 96,
            'fe_url_code' => 'RequiredDocuments',
            'fe_url_parameter' => 'bl_req_doc_id',
            'caption_code' => 'ReceiveDocuments',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 61,
            'controller_id' => 116,
            'fe_url_code' => 'settlementReconciliationActs',
            'fe_url_parameter' => 'settlement_reconciliation_act_id',
            'caption_code' => 'ReconciliationRecords',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 62,
            'controller_id' => 116,
            'fe_url_code' => 'cardRequest',
            'fe_url_parameter' => 'cardRequest_id',
            'caption_code' => 'Query',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 63,
            'controller_id' => 117,
            'fe_url_code' => 'serviceAcceptanceActs',
            'fe_url_parameter' => 'service_acceptance_act_id',
            'caption_code' => 'AcceptanceActs',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 64,
            'controller_id' => 118,
            'fe_url_code' => 'invoices',
            'fe_url_parameter' => 'invoice_id',
            'caption_code' => 'Invoices',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 65,
            'controller_id' => 120,
            'fe_url_code' => 'leasingContractsFiles',
            'fe_url_parameter' => 'db_area_files_id',
            'caption_code' => 'ScanDocuments',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 66,
            'controller_id' => NULL,
            'fe_url_code' => 'profileIsReady',
            'fe_url_parameter' => NULL,
            'caption_code' => NULL,
            'deleted_l' => 0,
            'fe_url_image_id' => 48,
            'fe_url_header_top' => '<h1 style="padding-top: 30px;">Спасибо! Ваша заявка может быть отправлена на рассмотрение.</h1>',
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 67,
            'controller_id' => 123,
            'fe_url_code' => 'systemParameters',
            'fe_url_parameter' => 'system_parameter_id',
            'caption_code' => 'SystemParameters',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 68,
            'controller_id' => 124,
            'fe_url_code' => 'systemParametersValues',
            'fe_url_parameter' => 'system_parameter_value_id',
            'caption_code' => 'SystemParametersValues',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 69,
            'controller_id' => 125,
            'fe_url_code' => 'models',
            'fe_url_parameter' => 'model_id',
            'caption_code' => 'Models',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 70,
            'controller_id' => 126,
            'fe_url_code' => 'controllers',
            'fe_url_parameter' => 'controller_id',
            'caption_code' => 'Controllers',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 71,
            'controller_id' => 102,
            'fe_url_code' => 'menuItems',
            'fe_url_parameter' => 'menu_items_id',
            'caption_code' => 'MenuItems',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 72,
            'controller_id' => 103,
            'fe_url_code' => 'menuItemAccessRoles',
            'fe_url_parameter' => 'menu_item_access_role_id',
            'caption_code' => 'MenuItemAccessRoles',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 73,
            'controller_id' => 127,
            'fe_url_code' => 'paymentInvoices',
            'fe_url_parameter' => 'payment_invoice_id',
            'caption_code' => 'LeasingPaymentAccounts',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 74,
            'controller_id' => 85,
            'fe_url_code' => 'beRoutes',
            'fe_url_parameter' => 'be_route_id',
            'caption_code' => 'BeRoutes',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 75,
            'controller_id' => 81,
            'fe_url_code' => 'feComponents',
            'fe_url_parameter' => 'fe_component_id',
            'caption_code' => 'FeComponents',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 76,
            'controller_id' => 88,
            'fe_url_code' => 'feUrls',
            'fe_url_parameter' => 'fe_url_id',
            'caption_code' => 'FeUrls',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 77,
            'controller_id' => 87,
            'fe_url_code' => 'feRoutes',
            'fe_url_parameter' => 'fe_routes_id',
            'caption_code' => 'FeRoutes',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 78,
            'controller_id' => 86,
            'fe_url_code' => 'feRouteUrls',
            'fe_url_parameter' => 'fe_route_url_id',
            'caption_code' => 'FeRouteUrls',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 79,
            'controller_id' => 82,
            'fe_url_code' => 'feRouteSteps',
            'fe_url_parameter' => 'fe_route_step_id',
            'caption_code' => 'FeRouteSteps',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 80,
            'controller_id' => 83,
            'fe_url_code' => 'feRouteObjects',
            'fe_url_parameter' => 'fe_route_object_id',
            'caption_code' => 'FeRouteObjects',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 81,
            'controller_id' => 84,
            'fe_url_code' => 'feRouteStepObjects',
            'fe_url_parameter' => 'fe_route_step_object_id',
            'caption_code' => 'FeRouteStepObjects',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 82,
            'controller_id' => 128,
            'fe_url_code' => 'actionExchangeLogGroupBy',
            'fe_url_parameter' => 'action_exchange_log_group_by_id',
            'caption_code' => 'ExchangeTotal',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 83,
            'controller_id' => 129,
            'fe_url_code' => 'actionExchangeLog',
            'fe_url_parameter' => 'action_exchange_log_id',
            'caption_code' => 'ExchangeLog',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 84,
            'controller_id' => NULL,
            'fe_url_code' => 'contacts',
            'fe_url_parameter' => NULL,
            'caption_code' => 'Contacts',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
//            'fe_url_header_top' => '<div style="text-align: left">
//<h1>Контакты</h1>
//<table style="margin-bottom: 15px">
//<tr style="margin-bottom: 5px">
//<td style="padding-right: 15px;padding-bottom: 10px;">Адрес:</td>
//<td><a style="color: #2f3339;" href="https://yandex.ru/maps/org/rosbank/1099506148/?ll=37.647952%2C55.772633&z=17.2" target="_blank">107078, г. Москва, ул. Маши Порываевой, д. 34. Помещение III, комн. 80, эт. 4</a></td>
//</tr>
//<tr style="margin-bottom: 5px">
//<td style="padding-right: 15px;padding-bottom: 10px;">Тел:</td>
//<td><a style="color: #2f3339;" href="tel:+74955807334">+7 (495) 580 73 34</a></td>
//</tr>
//<tr>
//<td style="padding-right: 15px;padding-bottom: 10px;">E-mail:</td>
//<td><a style="color: #2f3339;" href="mailto:ru-leasing.info@rosbank.ru">ru-leasing.info@rosbank.ru</a></td>
//</tr>
//</table>
//<img src="img/maps.png" alt="">
//<p style="margin-top: 15px;text-align: left"><strong>Реквизиты</strong></p>
//<style>
//#contacts-table{
//max-width: 800px;
//border-spacing: 1px;
//font-size: 15px;
//}
//#contacts-table td{
//border: 1px solid #000;
//min-height: 20px;
//padding: 5px;
//}
//#contacts-table th{
//border: 1px solid #000;
//min-height: 20px;
//padding: 7px;
//}
//#contacts-table th:first-child{
//width: 300px;
//
//}
//</style>
//<table id="contacts-table">
//<thead>
//<tr>
//<th><strong>Полное наименование предприятия</strong></th>
//<th><strong>Общество с ограниченной ответственностью «РБ ЛИЗИНГ»</strong></th>
//</tr>
//</thead>
//<tbody>
//<tr>
//<td><strong>Сокращенное наименование</strong></td>
//<td><strong>ООО «РБ ЛИЗИНГ» </strong></td>
//</tr>
//<tr>
//<td>Зарегистрировано </td>
//<td>ГУ Московской регистрационной палатой за №001.251.318 от 11.09.1996 года</td>
//</tr>
//<tr>
//<td>ОГРН</td>
//<td>1027700131007 <br>от 15.08.2002 г. Свидетельство о внесении записи в Единый государственный реестр юридический лиц – серии 77 № 007772574</td>
//</tr>
//<tr>
//<td><strong>Юридический адрес</strong></td>
//<td><strong>107078, г. Москва, ул. Маши Порываевой, д. 34. Помещение III, комн. 80, эт. 4</strong></td>
//</tr>
//<tr>
//<td>Почтовый адрес</td>
//<td>107078, г. Москва, ул. Маши Порываевой, д. 34. Помещение III, комн. 80, эт. 4</td>
//</tr>
//<tr>
//<td>Тел. / Факс:</td>
//<td>(495) 580 73 34</td>
//</tr>
//<tr>
//<td><strong>ИНН / КПП</strong></td>
//<td><strong>7709202955 / 770801001</strong></td>
//</tr>
//<tr>
//<td>ОКПО</td>
//<td>18230410</td>
//</tr>
//<tr>
//<td><strong>ОКТМО</strong></td>
//<td><strong>45378000</strong> </td>
//</tr>
//<tr>
//<td>ОКОГУ</td>
//<td>4210014 </td>
//</tr>
//<tr>
//<td>ОКВЭД</td>
//<td>64.91 </td>
//</tr>
//<tr>
//<td>Платежные реквизиты</td>
//<td>ПАО РОСБАНК г.Москва<br>р/счет № 40701810900000012666 <br>к/счет № 30101810000000000256<br>БИК 044525256</td>
//</tr>
//</tbody>
//</table>
//</div>',
            'fe_url_header_top' => '<div style="text-align: left">
<h1>Контакты</h1>
</div>',
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 85,
            'controller_id' => 130,
            'fe_url_code' => 'statistics',
            'fe_url_parameter' => NULL,
            'caption_code' => 'Statistics',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);


        /**/
        \App\Models\FeUrl::create([
            'id' => 86,
            'controller_id' => 133,
            'fe_url_code' => 'partners',
            'fe_url_parameter' => 'partner_id',
            'caption_code' => 'Partners',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);


        /**/
        \App\Models\FeUrl::create([
            'id' => 87,
            'controller_id' => 134,
            'fe_url_code' => 'contactPerson',
            'fe_url_parameter' => 'contact_person_id',
            'caption_code' => 'ContactPersons',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);


        /**/
        \App\Models\FeUrl::create([
            'id' => 88,
            'controller_id' => 135,
            'fe_url_code' => 'contactPersonInfo',
            'fe_url_parameter' => 'contact_person_info_id',
            'caption_code' => 'ContactPersonInfo',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);


        /**/
        \App\Models\FeUrl::create([
            'id' => 89,
            'controller_id' => 136,
            'fe_url_code' => 'partnerPoints',
            'fe_url_parameter' => 'partner_point_id',
            'caption_code' => 'PartnerPoints',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);


        /**/
        \App\Models\FeUrl::create([
            'id' => 90,
            'controller_id' => 137,
            'fe_url_code' => 'partnerRegions',
            'fe_url_parameter' => 'partner_region_id',
            'caption_code' => 'PartnerRegions',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);


        /**/
        \App\Models\FeUrl::create([
            'id' => 91,
            'controller_id' => 138,
            'fe_url_code' => 'partnerEmployees',
            'fe_url_parameter' => 'partner_employee_id',
            'caption_code' => 'PartnerEmployees',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);


        /**/
        \App\Models\FeUrl::create([
            'id' => 92,
            'controller_id' => 139,
            'fe_url_code' => 'partnerEmployeeContactPersons',
            'fe_url_parameter' => 'partner_employee_contact_person_id',
            'caption_code' => 'PartnerEmployeeContactPersons',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);


        /**/
        \App\Models\FeUrl::create([
            'id' => 93,
            'controller_id' => 140,
            'fe_url_code' => 'userInterfaces',
            'fe_url_parameter' => 'user_interface_id',
            'caption_code' => 'UserInterfaces',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);


        /**/
        \App\Models\FeUrl::create([
            'id' => 94,
            'controller_id' => 142,
            'fe_url_code' => 'accessAxes',
            'fe_url_parameter' => 'access_axis_id',
            'caption_code' => 'AccessAxes',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);


        /**/
        \App\Models\FeUrl::create([
            'id' => 95,
            'controller_id' => 144,
            'fe_url_code' => 'accessRowParameters',
            'fe_url_parameter' => 'access_row_parameter_id',
            'caption_code' => 'AccessRowParameters',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);


        /**/
        \App\Models\FeUrl::create([
            'id' => 96,
            'controller_id' => 146,
            'fe_url_code' => 'qtPages',
            'fe_url_parameter' => 'qt_page_id',
            'caption_code' => 'QTPages',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);


        /**/
        \App\Models\FeUrl::create([
            'id' => 97,
            'controller_id' => 147,
            'fe_url_code' => 'qtBlocks',
            'fe_url_parameter' => 'qt_block_id',
            'caption_code' => 'QTBlocks',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);


        /**/
        \App\Models\FeUrl::create([
            'id' => 98,
            'controller_id' => 148,
            'fe_url_code' => 'qtSets',
            'fe_url_parameter' => 'qt_set_id',
            'caption_code' => 'QTSets',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);


        /**/
        \App\Models\FeUrl::create([
            'id' => 99,
            'controller_id' => 149,
            'fe_url_code' => 'qtQuestionKinds',
            'fe_url_parameter' => 'qt_question_kind_id',
            'caption_code' => 'QTQuestionKinds',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);


        /**/
        \App\Models\FeUrl::create([
            'id' => 100,
            'controller_id' => 163,
            'fe_url_code' => 'journalDocuments',
            'fe_url_parameter' => NULL,
            'caption_code' => 'JournalDocuments',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);


        /**/
        \App\Models\FeUrl::create([
            'id' => 101,
            'controller_id' => 164,
            'fe_url_code' => 'questionnaireTemplates',
            'fe_url_parameter' => 'questionnaire_template_id',
            'caption_code' => 'QuestionnaireTemplates',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);


        /**/
        \App\Models\FeUrl::create([
            'id' => 102,
            'controller_id' => 168,
            'fe_url_code' => 'questionnaireQuestions',
            'fe_url_parameter' => 'qt_sets_questions_list_id',
            'caption_code' => 'QTQuestions',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);


        /**/
        \App\Models\FeUrl::create([
            'id' => 103,
            'controller_id' => 72,
            'fe_url_code' => 'leasingCalculationsDev',
            'fe_url_parameter' => 'bl_leasing_calculation_id',
            'caption_code' => 'PreliminaryOffers',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2019-06-07 12:00:02',
            'updated_at' => '2019-06-07 12:00:02',
        ]);


        /**/
        \App\Models\FeUrl::create([
            'id' => 104,
            'controller_id' => 173,
            'fe_url_code' => 'calculationTemplates',
            'fe_url_parameter' => 'calculation_template_id',
            'caption_code' => 'CalculationTemplates',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeUrl::create([
            'id' => 105,
            'controller_id' => 169,
            'fe_url_code' => 'extensionOneAdditionalDetails',
            'fe_url_parameter' => 'one_additional_detail_id',
            'caption_code' => 'ExtensionOneAdditionalDetails',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeUrl::create([
            'id' => 106,
            'controller_id' => 101,
            'fe_url_code' => 'oneAdditionalDetails',
            'fe_url_parameter' => 'one_additional_detail_id',
            'caption_code' => 'OneAdditionalDetails',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeUrl::create([
            'id' => 107,
            'controller_id' => 164,
            'fe_url_code' => 'questionnairePreview',
            'fe_url_parameter' => NULL,
            'caption_code' => 'QuestionnairePreview',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeUrl::create([
            'id' => 108,
            'controller_id' => 104,
            'fe_url_code' => 'customerRequestsSteps',
            'fe_url_parameter' => 'requests_id',
            'caption_code' => 'CustomerRequests',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeUrl::create([
            'id' => 109,
            'controller_id' => 22,
            'fe_url_code' => 'accessRoles',
            'fe_url_parameter' => 'access_role_id',
            'caption_code' => 'AccessRoles',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 110,
            'controller_id' => 104,
            'fe_url_code' => 'questionnaireSteps',
            'fe_url_parameter' => 'fe_route_step_id',
            'caption_code' => 'CustomerRequests',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeUrl::create([
            'id' => 111,
            'controller_id' => 181,
            'fe_url_code' => 'qtQuestionTypes',
            'fe_url_parameter' => 'qt_question_type_id',
            'caption_code' => 'QTQuestionTypes',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeUrl::create([
            'id' => 112,
            'controller_id' => 183,
            'fe_url_code' => 'bnCurrencies',
            'fe_url_parameter' => 'bn_currency_id',
            'caption_code' => 'BnCurrencies',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeUrl::create([
            'id' => 113,
            'controller_id' => 184,
            'fe_url_code' => 'bnPaymentMethods',
            'fe_url_parameter' => 'bn_payment_method_id',
            'caption_code' => 'BnPaymentMethods',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeUrl::create([
            'id' => 114,
            'controller_id' => 185,
            'fe_url_code' => 'bnPaymentMethodGroups',
            'fe_url_parameter' => 'bn_payment_method_group_id',
            'caption_code' => 'BnPaymentMethodGroups',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeUrl::create([
            'id' => 115,
            'controller_id' => 186,
            'fe_url_code' => 'bnExchangers',
            'fe_url_parameter' => 'bn_exchanger_id',
            'caption_code' => 'BnExchangers',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeUrl::create([
            'id' => 116,
            'controller_id' => 187,
            'fe_url_code' => 'bnExchangeDirections',
            'fe_url_parameter' => 'bn_exchanger_direction_id',
            'caption_code' => 'BnExchangeDirections',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeUrl::create([
            'id' => 117,
            'controller_id' => 188,
            'fe_url_code' => 'bnExchangeOffers',
            'fe_url_parameter' => 'bn_exchanger_offer_id',
            'caption_code' => 'BnExchangeOffers',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 118,
            'controller_id' => 190,
            'fe_url_code' => 'qtValidations',
            'fe_url_parameter' => 'qt_validation_id',
            'caption_code' => 'QTValidations',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);

        /**/
        \App\Models\FeUrl::create([
            'id' => 119,
            'controller_id' => 191,
            'fe_url_code' => 'qtValidationRules',
            'fe_url_parameter' => 'qt_validation_rule_id',
            'caption_code' => 'QTValidationRules',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeUrl::create([
            'id' => 120,
            'controller_id' => 188,
            'fe_url_code' => 'bnExchangesAndOffers',
            'fe_url_parameter' => 'bn_exchanger_offer_id',
            'caption_code' => 'BnExchangeOffers',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        /**/
        \App\Models\FeUrl::create([
            'id' => 121,
            'controller_id' => 196,
            'fe_url_code' => 'loginAsUser',
            'fe_url_parameter' => 'user_id',
            'caption_code' => 'UserLogin',
            'deleted_l' => 0,
            'fe_url_image_id' => NULL,
            'fe_url_header_top' => NULL,
            'fe_url_header_bottom' => NULL,
            'fe_url_info' => NULL,
            'fe_url_footer_top' => NULL,
            'fe_url_footer_bottom' => NULL,
            'created_by' => 'seed',
            'updated_by' => 'seed',
            'created_at' => '2020-01-14 15:00:00',
            'updated_at' => '2020-01-14 15:00:00',
        ]);


        if (config("database.default") == "pgsql") {

            \Illuminate\Support\Facades\DB::statement("SELECT setval('\"public\".\"FeUrls_id_seq\"', 2000, true)");
        }


    }
}
