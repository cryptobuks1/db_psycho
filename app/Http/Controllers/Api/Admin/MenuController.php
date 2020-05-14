<?php

/* Controller builds admin menu by user type
 * it returns JSON array with menu structure
 * YuriyYurenko 12.09.2018
 * http://broker/menu?mode=0&object=mainmenu&lang=en
 */

namespace App\Http\Controllers\Api\Admin;

use App\Http\Classes\StoredFileManager;
use App\Http\Controllers\Api\BookmarksController;
use App\Http\Controllers\Api\Controller;
use App\Http\Controllers\Api\Menu\MenuItemAccessRolesController;
use App\Http\Controllers\Api\TabNotifications\NotificationsController;
use App\Models\AccessRole;
use App\Models\Consumer;
use App\Models\ConsumerAccessRole;
use App\Models\Contractor;
use App\Models\ContractorInfo;
use App\Models\FeRoute;
use App\Models\FeRouteUrl;
use App\Models\Image;
use App\Models\MenuItem;
use App\Models\MenuItemAccessRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Translation;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Arr;
use App\Http\Classes\MenuManager;

class MenuController extends Controller
{

    /**
     * @var Consumer
     */
    public $consumer;

    /*method returns JSON for build menu and other objects*/
    public function index(Request $request)
    {

        /*$request contents 3 params
         *$request->module
         *$request->object
         *$request->mode now just 0
         *
         */
        /*gets current user*/
        $this->consumer = Auth::user();
        $menu = array();
        $lang = config('app.locale');

        //$this->addTranslations(); //adds translations for menu

        /*get all translations captions*/
//        $this->texts = DB::table('translation_captions')
//            ->join('languages', 'translation_captions.language_id', '=', 'languages.id')
//            ->join('_captions', 'translation_captions.caption_id', '=', '_captions.id')
//            ->where('languages.language_code',$lang)
//            ->get();
        $this->texts = (new \App\Http\Controllers\Api\TabTranslation\TranslationCaptionsController())->translations();

        if ($request->object == 'mainmenu' && $request->module == 'main') {
            ///menu?mode=0&module=main&object=mainmenu
            /*
             *  superadmin = 1
             *  user = 2
             *  manager = 3
             * /
             */

            //+++Минияр 09.04.2019



            $params = [
                "menutype" => $request->menutype,
//                "check_access" => true,
                "check_access" => ($request->menutype == 'bankNet') ? false : true,
                "convert_to_list" => false,
                "interface_id" => $request->interface_id ?? null,
            ];

            $menu = (new MenuManager())->buildMenu($params);

            //---Минияр 09.04.2019

            //  return var_dump("<pre>",$menu,"</pre>");

            return response()->json($menu, (empty($menu)) ? 403 : 200);

        } elseif ($request->object == 'footer' && $request->module == 'main') {
            ///menu?mode=0&module=main&object=footer
            $footer = $this->buildFooter();
            return response()->json($footer);
        } elseif ($request->object == 'profilemenu' && $request->module == 'main') {
            ///menu?mode=0&module=main&object=profilemenu
            $userProfileMenu = $this->buildUserProfileMenu();
            return response()->json($userProfileMenu);
        } // Bogdan Yartsun 01.10.2018
        elseif ($request->object == 'buildBreadcrumbs' && $request->module == 'main') {
            $breadcrumbs = $this->buildBreadcrumbs();
            return response()->json($breadcrumbs);
        } // Bogdan Yartsun 25.02.2019
        elseif ($request->object == 'buildRoutes' && $request->module == 'main') {
            $buildRoutes = $this->buildRoutes();
            return response()->json($buildRoutes);
        } //Alex Yaroschuk 22.11.2018
        elseif ($request->object == 'buildNameBreacrumbs' && $request->module == 'main') {
            $name = $this->buildNameBreacrumbs($request);
            $headers = ['Content-Type' => 'application/json; charset=utf-8'];
//            $name = response()->json($name, 200, $headers, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
//            dd($name);
//            return response()->json($name, 200, $headers, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
//            return response()->json($name, 200, $headers, JSON_UNESCAPED_UNICODE);
//            $name = json_encode($name, JSON_UNESCAPED_UNICODE);
//            dd($name);
            return response()->json($name, 200, $headers, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
        } elseif ($request->object == 'buildError' && $request->module == 'main') {
            $errors = $this->buildError();
            return response()->json($errors);
        } //Bogdan Yartsun 30.11.2018
        elseif ($request->object == 'translateList' && $request->module == 'main') {
            $listTranslation = $this->translateList();
            return response()->json($listTranslation);
        }
    }

    public function buildUserProfileMenu()
    {

        $userProfileMenu = array();

        $user_photo = $this->consumer->getUserPhoto();

        $captionName = ['ClientCabinet', 'FeedbackPhone', 'Notifications'];
        $getArrayCaptions = $this->getTranslateByKeys($captionName);

        $consumer_name = $this->consumer->getDisplayName();
        // +++ Miniyar 20.11.2019
        $consumer_interfaces = $this->consumer->getUserInterfaces();
        // --- Miniyar 20.11.2019

        if (request()->interface_id != "undefined" && request()->interface_id != "null") {
            $home_url = array_first(Arr::where($consumer_interfaces, function ($item) {
                return $item['id'] == request()->interface_id;
            }))['home_url'];
        } else {
            $home_url = $consumer_interfaces[0]['home_url'];
        }

        $userProfileMenu = [
            'actions' => [
                [
                    'title' => $this->texts->where('caption_name', "UserProfileShort")->first()->caption_translation,
                    'link' => '/profile',
                    'img' => '',
                    'type' => 'link'
                ],
                [
                    'title' => $this->texts->where('caption_name', "LogOut")->first()->caption_translation,
                    'link' => '/api/logout',
                    'img' => '',
                    'type' => 'logout'
                ],
                [
                    'title' => "Изменить тему",
                    'img' => '',
                    'type' => 'change_style'
                ],
            ],

            'notifications' => (new NotificationsController)->index(),

//            'notifications'=>[
//                [
//                    'id'=>1,
//                    'title'=>"Просречен кредит на 5 дней ",
//                    'link'=>'/contractors/1'
//                ],
//                [
//                    'id'=>2,
//                    'title'=>"Просречен кредит на 15 дней ",
//                    'link'=>'/contractors/4'
//                ],
//                [
//                    'id'=>3,
//                    'title'=>"Просречен кредит на 105 дней ",
//                    'link'=>'/contractors/2'
//                ],
//
//            ],

//            'username'=> $this->consumer->consumer_name,
            // +++ Miniyar 20.11.2019
            'user_interfaces' => $consumer_interfaces,
            // --- Miniyar 20.11.2019

            'user' => [
                'username' => $consumer_name,
                'verification_required' => $this->consumer->column_change_password_l === true || $this->consumer->agreement_accepted_date === null,
                "user_photo" => is_null($user_photo) ? null : $user_photo["mime"] . "," . $user_photo["file"],
                "first_name" => $this->consumer->first_name,
                "middle_name" => $this->consumer->middle_name,
                "last_name" => $this->consumer->last_name,
                "phone_number" => $this->consumer->phone_number,
                "email" => $this->consumer->email,
            ],

            'translations' => [
                'Notifications' => $getArrayCaptions['Notifications']['translation_captions']['caption_translation'],
                'ClientCabinet' => $getArrayCaptions['ClientCabinet']['translation_captions']['caption_translation'],
                'FeedbackPhone' => $getArrayCaptions['FeedbackPhone']['translation_captions']['caption_translation'],
            ],
            "bookmarks" => (new BookmarksController())->index(new Request(['consumer_id' => $this->consumer->id])),

            'localStorageTimeout' => self::getParameter('LocalStorageTimeout'),
            "default_url" => $home_url,
            "use_home_page" => self::getParameter("UseHomePage")
        ];

        return $userProfileMenu;

    }

    public function buildRoutes()
    {
        $routes = [
            ["path" => "/404", "component" => "Error", "meta" => ['error' => '404']],
            ["path" => "/403", "component" => "Error", "meta" => ['error' => '403']],
            ["path" => "/500", "component" => "Error", "meta" => ['error' => '500']],
            ["path" => "/", "component" => "Home", "meta" => []],
            ["path" => "*/new", "component" => "Card", "meta" => []],
            ["path" => "/profile", "component" => "Profile", "meta" => []],
            ["path" => "/profileTest", "component" => "Profile", "meta" => []],
            ["path" => "/textPage", "component" => "TextPage", "meta" => []],
            ["path" => "/externalReportsByCompanies", "component" => "List", "meta" => []],
            ["path" => "/externalReportsByCompanies/create", "component" => "Report", "meta" => []],
            ["path" => "/documents", "component" => "Document", "meta" => []],
            ["path" => "/documents2", "component" => "Document", "meta" => []],
            ["path" => "/contractors", "component" => "List", "meta" => ["route" => "/admin/contractor/list", "id_field" => "id"]],
            ["path" => "/contractors/:id", "component" => "Card", "meta" => ["route" => "/admin/contractor/card", "id_field" => "id", "model" => "Contractor", "column" => "contractor_short_name"]],
            ["path" => "/contractors/:id/contactInfo", "component" => "List", "meta" => ["route" => "/admin/contactInfoList", "id_field" => "id"]],
            ["path" => "/contractors/:id/contactInfo/:cont_id", "component" => "Card", "meta" => ["route" => "/admin/contactInfoCard", "id_field" => "cont_id", "model" => "InfoType", "column" => "info_type_name"]],
            ["path" => "/contractors/:id/cryptoExchangeAccounts", "component" => "List", "meta" => ["route" => "/admin/contractor/cryptoExchangeAccounts/list", "id_field" => "id",]],
            ["path" => "/contractors/:id/cryptoExchangeAccounts/:cont_id", "component" => "Card", "meta" => ["route" => "/admin/contractor/cryptoExchangeAccounts/card", "id_field" => "cont_id", "model" => "contactInfo", "column" => "info_type_name"]],
            ["path" => "/contractors/:id/cryptoPlatformAccounts", "component" => "List", "meta" => ["route" => "/admin/contractor/cryptoPlatformAccounts/list", "id_field" => "id",]],
            ["path" => "/contractors/:id/cryptoPlatformAccounts/:cont_id", "component" => "Card", "meta" => ["route" => "/admin/contractor/cryptoPlatformAccounts/card", "id_field" => "cont_id", "model" => "contactInfo", "column" => "info_type_name"]],
            ["path" => "/contractors/:id/bankAccounts", "component" => "List", "meta" => ["route" => "/admin/contractor/bankAccounts/list", "id_field" => "id",]],
            ["path" => "/contractors/:id/bankAccounts/:cont_id", "component" => "Card", "meta" => ["route" => "/admin/contractor/bankAccounts/card", "id_field" => "cont_id", "model" => "contactInfo", "column" => "info_type_name"]],
            ["path" => "/contractors/:id/cryptoPlatformWallets", "component" => "List", "meta" => ["route" => "/admin/contractor/cryptoPlatformWallets/list", "id_field" => "id",]],
            ["path" => "/contractors/:id/cryptoPlatformWallets/:cont_id", "component" => "Card", "meta" => ["route" => "/admin/contractor/cryptoPlatformWallets/card", "id_field" => "cont_id", "model" => "contactInfo", "column" => "info_type_name"]],
            ["path" => "/contractors/:id/cryptoExchangeWallets", "component" => "List", "meta" => ["route" => "/admin/contractor/cryptoExchangeWallets/list", "id_field" => "id",]],
            ["path" => "/contractors/:id/cryptoExchangeWallets/:cont_id", "component" => "Card", "meta" => ["route" => "/admin/contractor/cryptoExchangeWallets/card", "id_field" => "cont_id", "model" => "contactInfo", "column" => "info_type_name"]],
            ["path" => "/companies", "component" => "List", "meta" => ["route" => "/admin/company/list", "id_field" => "id"]],
            ["path" => "/companies/:id", "component" => "Card", "meta" => ["route" => "/admin/company/card", "id_field" => "id", "model" => "Company", "column" => "company_short_name"]],
            ["path" => "/companies/:id/contactInfo", "component" => "List", "meta" => ["route" => "/admin/company/ContactInfoList", "id_field" => "id",]],
            ["path" => "/companies/:id/contactInfo/:cont_id", "component" => "Card", "meta" => ["route" => "/admin/company/card", "id_field" => "cont_id", "model" => "contactInfo", "column" => "info_type_name"]],
            ["path" => "/companies/:id/cryptoExchangeAccounts", "component" => "List", "meta" => ["route" => "/admin/company/cryptoExchangeAccounts/list", "id_field" => "id",]],
            ["path" => "/companies/:id/cryptoExchangeAccounts/:cont_id", "component" => "Card", "meta" => ["route" => "/admin/company/cryptoExchangeAccounts/card", "id_field" => "cont_id", "model" => "contactInfo", "column" => "info_type_name"]],
            ["path" => "/companies/:id/cryptoPlatformAccounts", "component" => "List", "meta" => ["route" => "/admin/company/cryptoPlatformAccounts/list", "id_field" => "id",]],
            ["path" => "/companies/:id/cryptoPlatformAccounts/:cont_id", "component" => "Card", "meta" => ["route" => "/admin/company/cryptoPlatformAccounts/card", "id_field" => "cont_id", "model" => "contactInfo", "column" => "info_type_name"]],
            ["path" => "/companies/:id/bankAccounts", "component" => "List", "meta" => ["route" => "/admin/company/bankAccounts/list", "id_field" => "id",]],
            ["path" => "/companies/:id/bankAccounts/:cont_id", "component" => "Card", "meta" => ["route" => "/admin/company/bankAccounts/card", "id_field" => "cont_id", "model" => "contactInfo", "column" => "info_type_name"]],
            ["path" => "/companies/:id/cryptoPlatformWallets", "component" => "List", "meta" => ["route" => "/admin/company/cryptoPlatformWallets/list", "id_field" => "id",]],
            ["path" => "/companies/:id/cryptoPlatformWallets/:cont_id", "component" => "Card", "meta" => ["route" => "/admin/company/cryptoPlatformWallets/card", "id_field" => "cont_id", "model" => "contactInfo", "column" => "info_type_name"]],
            ["path" => "/companies/:id/cryptoExchangeWallets", "component" => "List", "meta" => ["route" => "/admin/company/cryptoExchangeWallets/list", "id_field" => "id",]],
            ["path" => "/companies/:id/cryptoExchangeWallets/:cont_id", "component" => "Card", "meta" => ["route" => "/admin/company/cryptoExchangeWallets/card", "id_field" => "cont_id", "model" => "contactInfo", "column" => "info_type_name"]],
            ["path" => "/dbAreas", "component" => "List", "meta" => ["route" => "/admin/db/area/list", "id_field" => "id"]],
            ["path" => "/dbAreas/:id", "component" => "Card", "meta" => ["route" => "/admin/db/area/card", "id_field" => "id", "model" => "DbArea", "column" => "db_area_code"]],
            ["path" => "/countries", "component" => "List", "meta" => ["route" => "/admin/country/list", "id_field" => "id"]],
            ["path" => "/countries/:id", "component" => "Card", "meta" => ["route" => "/admin/country/card", "id_field" => "id", "model" => "Country", "column" => "country_name"]],
            ["path" => "/countries/:id/regions", "component" => "List", "meta" => ["route" => "/admin/countries/regionsList", "id_field" => "id",]],
            ["path" => "/countries/:id/regions/:cont_id", "component" => "Card", "meta" => ["route" => "/admin/region/card", "id_field" => "cont_id", "model" => "Region", "column" => "region_name"]],
            ["path" => "/consumerAccounts", "component" => "List", "meta" => ["route" => "/admin/consumer/accounts/list", "id_field" => "id"]],
            ["path" => "/consumerAccounts/:id", "component" => "Card", "meta" => ["route" => "/admin/consumer/accounts/card", "id_field" => "id", "model" => "ConsumerAccount", "column" => "consumer_account_name"]],
            ["path" => "/fileTypes", "component" => "List", "meta" => ["route" => "/admin/fileTypes/list", "id_field" => "id"]],
            ["path" => "/fileTypes/:id", "component" => "Card", "meta" => ["route" => "/admin/fileTypes/card", "id_field" => "id", "model" => "FileType", "column" => "file_type_name"]],
            ["path" => "/attachedKind", "component" => "List", "meta" => ["route" => "/admin/attachedKind/list", "id_field" => "id"]],
            ["path" => "/attachedKind/:id", "component" => "Card", "meta" => ["route" => "/admin/attachedKind/card", "id_field" => "id", "model" => "AttachedDocumentKind", "column" => "att_doc_kind_name"]],
            ["path" => "/attachedType", "component" => "List", "meta" => ["route" => "/admin/attachedType/list", "id_field" => "id"]],
            ["path" => "/attachedType/:id", "component" => "Card", "meta" => ["route" => "/admin/attachedType/card", "id_field" => "id", "model" => "AttachedDocumentType", "column" => "att_doc_type_name"]],
            ["path" => "/languages", "component" => "List", "meta" => ["route" => "/admin/languages/list", "id_field" => "id"]],
            ["path" => "/languages/:id", "component" => "Card", "meta" => ["route" => "/admin/language/card", "id_field" => "id", "model" => "Language", "column" => "language_name"]],
            ["path" => "/serversDb", "component" => "List", "meta" => ["route" => "/admin/serverdbs/list", "id_field" => "id"]],
            ["path" => "/serversDb/:id", "component" => "Card", "meta" => ["route" => "/admin/serverdbs/card", "id_field" => "id", "model" => "ServerDb", "column" => "server_name"]],
            ["path" => "/banks", "component" => "List", "meta" => ["route" => "/admin/banks/list", "id_field" => "id"]],
            ["path" => "/banks/:id", "component" => "Card", "meta" => ["route" => "/admin/banks/card", "id_field" => "id", "model" => "Bank", "column" => "bank_name"]],
            ["path" => "/bankAccountTypes", "component" => "List", "meta" => ["route" => "/admin/bankAccountTypes/list", "id_field" => "id"]],
            ["path" => "/bankAccountTypes/:id", "component" => "Card", "meta" => ["route" => "/admin/bankAccountTypes/card", "id_field" => "id", "model" => "BankAccountType", "column" => "bank_account_type_name"]],
            ["path" => "/cryptoTokens", "component" => "List", "meta" => ["route" => "/admin/cryptoTokens/list", "id_field" => "id"]],
            ["path" => "/cryptoTokens/:id", "component" => "Card", "meta" => ["route" => "/admin/cryptoTokens/card", "id_field" => "id", "model" => "CryptoToken", "column" => "c_token_code"]],
            ["path" => "/images", "component" => "List", "meta" => ["route" => "/admin/images/list", "id_field" => "id"]],
            ["path" => "/images/:id", "component" => "Card", "meta" => ["route" => "/admin/images/card", "id_field" => "id", "model" => "Image", "column" => "image_name"]],
            ["path" => "/imageCategories", "component" => "List", "meta" => ["route" => "/admin/imageCategories/list", "id_field" => "id"]],
            ["path" => "/imageCategories/:id", "component" => "Card", "meta" => ["route" => "/admin/imageCategories/card", "id_field" => "id", "model" => "ImageCategory", "column" => "image_category_name"]],
            ["path" => "/currencies", "component" => "List", "meta" => ["route" => "/admin/currencies/list", "id_field" => "id"]],
            ["path" => "/currencies/:id", "component" => "Card", "meta" => ["route" => "/admin/currencies/card", "id_field" => "id", "model" => "Currency", "column" => "currency_name"]],
            ["path" => "/cryptoExchanges", "component" => "List", "meta" => ["route" => "/admin/cryptoExchanges/list", "id_field" => "id"]],
            ["path" => "/cryptoExchanges/:id", "component" => "Card", "meta" => ["route" => "/admin/cryptoExchanges/card", "id_field" => "id", "model" => "CryptoExchange", "column" => "c_exchange_name"]],
            ["path" => "/cryptoPlatforms", "component" => "List", "meta" => ["route" => "/admin/cryptoPlatforms/list", "id_field" => "id"]],
            ["path" => "/cryptoPlatforms/:id", "component" => "Card", "meta" => ["route" => "/admin/cryptoPlatforms/card", "id_field" => "id", "model" => "CryptoPlatform", "column" => "c_platform_name"]],
            ["path" => "/captions", "component" => "List", "meta" => ["route" => "/admin/captions/list", "id_field" => "id"]],
            ["path" => "/captions/:id", "component" => "Card", "meta" => ["route" => "/admin/captions/card", "id_field" => "id", "model" => "Caption", "column" => "caption_name"]],
            ["path" => "/translationCaptions", "component" => "List", "meta" => ["route" => "/admin/translationCaptions/list", "id_field" => "id"]],
            ["path" => "/translationCaptions/:id", "component" => "Card", "meta" => ["route" => "/admin/translationCaptions/card", "id_field" => "id", "model" => "TranslationCaption", "column" => "caption_translation"]],
            ["path" => "/dbs", "component" => "List", "meta" => ["route" => "/admin/db/list", "id_field" => "id"]],
            ["path" => "/dbs/:id", "component" => "Card", "meta" => ["route" => "/admin/db/card", "id_field" => "id", "model" => "DBase", "column" => "db_name"]],
            ["path" => "/regions", "component" => "List", "meta" => ["route" => "/admin/region/list", "id_field" => "id"]],
            ["path" => "/regions/:id", "component" => "Card", "meta" => ["route" => "/admin/region/card", "id_field" => "id", "model" => "Region", "column" => "region_name"]],
            ["path" => "/attachedFile", "component" => "List", "meta" => ["route" => "/admin/attachedFile", "id_field" => "id"]],
            ["path" => "/dbTypes", "component" => "List", "meta" => ["route" => "/admin/dbtypes/list", "id_field" => "id"]],
            ["path" => "/dbTypes/:id", "component" => "Card", "meta" => ["route" => "/admin/dbtypes/card", "id_field" => "id", "model" => "DbType", "column" => "db_type_name"]],
            ["path" => "/pages", "component" => "List", "meta" => ["route" => "/admin/dbtypes/list", "id_field" => "id"]],
            ["path" => "/pages/:id", "component" => "Card", "meta" => ["route" => "/admin/dbtypes/card", "id_field" => "id", "model" => "contractors", "column" => "contractor_short_name"]],
            ["path" => "/requests/:id", "component" => "Steps", "meta" => ["model" => ''], "children" => [
                ["path" => "step1", "component" => "Card", "meta" => ["route" => "/admin/dbtypes/card", "id_field" => "id"]],
                ["path" => "step2", "component" => "List", "meta" => ["route" => "/admin/db/list", "id_field" => "id"]],
                ["path" => "step3", "component" => "List", "meta" => ["route" => "/admin/translationCaptions/list", "id_field" => "id"]],
                ["path" => "step4", "component" => "Card", "meta" => ["route" => "/admin/dbtypes/card", "id_field" => "id"]],
                ["path" => "step5", "component" => "List", "meta" => ["route" => "/admin/dbtypes/list", "id_field" => "id"]],
                ["path" => "step6", "component" => "List", "meta" => ["route" => "/admin/dbtypes/list", "id_field" => "id"]],
            ]]

        ];

        return $routes;

    }


    /*function builds a manager main menu*/
    public function buildManagerMainMenu()
    {


//        $managerMenu = array() ;
//
//        $managerMenu[] = array(
//
//            'title' => $this->texts->where('caption_name', "UserProfile")->first()->caption_translation,
//            'img' => '/img/userData.svg',
//            'link' => '',
//
//            'children'=>[
//                [
//                    'title'=>$this->texts->where('caption_name', "UserData")->first()->caption_translation,
//                    'link'=> '/profile',
//                    'img' => ''
//                ],
//                [
//                    'title'=>"Profile Test",
//                    'link'=> '/profileTest',
//                    'img' => ''
//                ],
//            ]
//
//
//        );
//
//        $managerMenu[]= array(
//
//            'title' => $this->texts->where('caption_name', "Administration")->first()->caption_translation,
//            'img' => '/img/administration.svg',
//            'link' => '',
//            'children'=>[
//
//                ['title'=>$this->texts->where('caption_name', "Companies")->first()->caption_translation, 'link'=>'/companies','img' => ''],
//                ['title'=>$this->texts->where('caption_name', "Contractors")->first()->caption_translation, 'link'=> '/contractors','img' => ''],
//                ['title'=>$this->texts->where('caption_name', "CountriesAndRegions")->first()->caption_translation, 'link'=> '','img' => '',
//
//                    'children'=>[
//                        ['title'=>$this->texts->where('caption_name', "Countries")->first()->caption_translation, 'link'=>'/countries','img' => ''],
//                        [
//                            'title'=>$this->texts->where('caption_name', "Regions")->first()->caption_translation,
//                            'link'=>'',
//                            'img' => '',
//                            'children'=>[
//                                ['title'=>$this->texts->where('caption_name', "Countries")->first()->caption_translation, 'link'=>'/countries','img' => ''],
//                                ['title'=>$this->texts->where('caption_name', "Regions")->first()->caption_translation, 'link'=>'/regions','img' => ''],
//                            ]
//                        ],
//                    ]
//
//                ],
//                [
//                    'title'=>$this->texts->where('caption_name', "ExternalDatabaseSettings")->first()->caption_translation,
//                    'link'=>'',
//                    'img' => '',
//                    'children'=> [
//
//                         ['title'=>$this->texts->where('caption_name', "DatabaseServers")->first()->caption_translation, 'link'=>'/serversDb','img' => ''],
//                         ['title'=>$this->texts->where('caption_name', "Databases")->first()->caption_translation, 'link'=>'/dbs','img' => ''],
//                         ['title'=>$this->texts->where('caption_name', "DbTypes")->first()->caption_translation, 'link'=>'/dbTypes','img' => ''],
//                         ['title'=>$this->texts->where('caption_name', "DatabaseAreas")->first()->caption_translation, 'link'=>'/dbAreas','img' => ''],
//                         ['title'=>$this->texts->where('caption_name', "ConsumerAccounts")->first()->caption_translation, 'link'=>'/consumerAccounts','img' => ''],
//                    ]
//                ],
//                [
//                    'title' => $this->texts->where('caption_name', "LanguageSettings")->first()->caption_translation,
//                    'img' => '',
//                    'link' => '',
//                    'children'=>[
//                        ['title'=>$this->texts->where('caption_name', "Languages")->first()->caption_translation, 'link'=>'/languages','img' => ''],
//                        ['title'=>$this->texts->where('caption_name', "CaptionsCodes")->first()->caption_translation, 'link'=>'/captions','img' => ''],
//                        ['title'=>$this->texts->where('caption_name', "CaptionTranslations")->first()->caption_translation, 'link'=>'/translationCaptions','img' => ''],
//                    ]
//                ],
//                [
//                    'title' => $this->texts->where('caption_name', "Finances")->first()->caption_translation,
//                    'img'=> '',
//                    'link' => '',
//                    'children'=>[
//                        ['title'=>$this->texts->where('caption_name', "Currencies")->first()->caption_translation, 'link'=>'/currencies','img' => ''],
//                        ['title'=>$this->texts->where('caption_name', "Banks")->first()->caption_translation, 'link'=>'/banks','img' => ''],
//                        ['title'=>$this->texts->where('caption_name', "BankAccountTypes")->first()->caption_translation, 'link'=>'/bankAccountTypes','img' => ''],
//                    ]
//                ],
//                [
//                    'title' => $this->texts->where('caption_name', "CryptoAssets")->first()->caption_translation,
//                    'img'=> '',
//                    'link' => '',
//                    'children'=>[
//                        ['title'=>$this->texts->where('caption_name', "CryptoTokens")->first()->caption_translation, 'link'=>'/cryptoTokens','img' => ''],
//                        ['title'=>$this->texts->where('caption_name', "CryptoExchanges")->first()->caption_translation, 'link'=>'/cryptoExchanges','img' => ''],
//                        ['title'=>$this->texts->where('caption_name', "CryptoPlatforms")->first()->caption_translation, 'link'=>'/cryptoPlatforms','img' => ''],
//                    ]
//                ],
//                [
//                    'title' => $this->texts->where('caption_name', "SystemImages")->first()->caption_translation,
//                    'img'=> '',
//                    'link' => '',
//                    'children'=>[
//                        ['title'=>$this->texts->where('caption_name', "ImageCategories")->first()->caption_translation, 'link'=>'/imageCategories','img' => ''],
//                        ['title'=>$this->texts->where('caption_name', "Images")->first()->caption_translation, 'link'=>'/images','img' => ''],
//                        ['title'=>$this->texts->where('caption_name', "FileTypes")->first()->caption_translation, 'link'=>'/fileTypes','img' => ''],
//                    ]
//                ],
//            ]
//        );
//
//        $managerMenu[] = array(
//
//
//            'title'=>$this->texts->where('caption_name', "ExternalReports")->first()->caption_translation,
//            'link'=>'',
//            'img'=> '/img/report.svg',
//            'children'=> [
//                ['title'=>$this->texts->where('caption_name', "Companies")->first()->caption_translation, 'link'=> '/externalReportsByCompanies','img' => ''],
//                ['title'=>$this->texts->where('caption_name', "Contractors")->first()->caption_translation, 'link'=> '/externalReportsByContractors','img' => ''],
//            ]
//        );

        $managerMenu = [
            "items" => [
                [

                    'title' => $this->texts->where('caption_name', "UserProfile")->first()->caption_translation,
                    'img' => '/img/userData.svg',
                    'link' => '',
                    'separator' => '10',
                    'depth' => 1,
                    'children' => [
                        [
                            'title' => $this->texts->where('caption_name', "UserData")->first()->caption_translation,
                            'link' => '/profile',
                            'img' => '',
                            'separator' => '10',
                            'depth' => 2
                        ],
//                        [
//                            'title' => "Profile Test",
//                            'link' => '/profileTest',
//                            'img' => '',
//                            'depth'=>2
//                        ],
                    ]
                ],
                [
                    'title' => $this->texts->where('caption_name', "Administration")->first()->caption_translation,
                    'img' => '/img/administration.svg',
                    'link' => '',
                    'separator' => '10',
                    'depth' => 1,
                    'children' => [

//                        ['title' => $this->texts->where('caption_name', "Companies")->first()->caption_translation, 'link' => '/companies', 'img' => ''],
                        ['title' => $this->texts->where('caption_name', "Contractors")->first()->caption_translation, 'link' => '/contractors', 'img' => '', 'separator' => '10'],
//                        ['title' => 'Pages', 'link' => '/pages', 'img' => '','separator' => '10'],
//                        ['title' => $this->texts->where('caption_name', "CountriesAndRegions")->first()->caption_translation, 'link' => '', 'img' => '', 'depth'=>2,
//
//
//                            'children' => [
//                                ['title' => $this->texts->where('caption_name', "Countries")->first()->caption_translation, 'link' => '/countries', 'img' => '','depth'=>3],
//                                [
//                                    'title' => $this->texts->where('caption_name', "Regions")->first()->caption_translation,
//                                    'link' => '',
//                                    'img' => '',
//                                    'depth'=>3,
//                                    'children' => [
//                                        ['title' => $this->texts->where('caption_name', "Countries")->first()->caption_translation, 'link' => '/countries', 'img' => '', 'depth'=>4],
//                                        ['title' => $this->texts->where('caption_name', "Regions")->first()->caption_translation, 'link' => '/regions', 'img' => '', 'depth'=>4],
//                                    ]
//                                ],
//                            ]
//
//                        ],
                        [
                            'title' => $this->texts->where('caption_name', "ExternalDatabaseSettings")->first()->caption_translation,
                            'link' => '',
                            'img' => '',
                            'children' => [

                                ['title' => $this->texts->where('caption_name', "DatabaseServers")->first()->caption_translation, 'link' => '/serversDb', 'img' => '', 'depth' => '3'],
                                ['title' => $this->texts->where('caption_name', "Databases")->first()->caption_translation, 'link' => '/dbs', 'img' => '', 'depth' => '3'],
                                ['title' => $this->texts->where('caption_name', "DbTypes")->first()->caption_translation, 'link' => '/dbTypes', 'img' => '', 'depth' => '3'],
                                ['title' => $this->texts->where('caption_name', "DatabaseAreas")->first()->caption_translation, 'link' => '/dbAreas', 'img' => '', 'depth' => '3'],
//                                ['title' => $this->texts->where('caption_name', "ConsumerAccounts")->first()->caption_translation, 'link' => '/consumerAccounts', 'img' => '', 'depth' => '3'],
                            ]
                        ],
//                        [
//                            'title' => $this->texts->where('caption_name', "LanguageSettings")->first()->caption_translation,
//                            'img' => '',
//                            'link' => '',
//                            'children' => [
//                                ['title' => $this->texts->where('caption_name', "Languages")->first()->caption_translation, 'link' => '/languages', 'img' => '', 'depth' => '3'],
//                                ['title' => $this->texts->where('caption_name', "CaptionsCodes")->first()->caption_translation, 'link' => '/captions', 'img' => '', 'depth' => '3'],
//                                ['title' => $this->texts->where('caption_name', "CaptionTranslations")->first()->caption_translation, 'link' => '/translationCaptions', 'img' => '', 'depth' => '3'],
//                            ]
//                        ],
//                        [
//                            'title' => $this->texts->where('caption_name', "Finances")->first()->caption_translation,
//                            'img' => '',
//                            'link' => '',
//                            'children' => [
//                                ['title' => $this->texts->where('caption_name', "Currencies")->first()->caption_translation, 'link' => '/currencies', 'img' => '', 'depth' => '3'],
//                                ['title' => $this->texts->where('caption_name', "Banks")->first()->caption_translation, 'link' => '/banks', 'img' => '', 'depth' => '3'],
//                                ['title' => $this->texts->where('caption_name', "BankAccountTypes")->first()->caption_translation, 'link' => '/bankAccountTypes', 'img' => '', 'depth' => '3'],
//                            ]
//                        ],
//                        [
//                            'title' => $this->texts->where('caption_name', "CryptoAssets")->first()->caption_translation,
//                            'img' => '',
//                            'link' => '',
//                            'children' => [
//                                ['title' => $this->texts->where('caption_name', "CryptoTokens")->first()->caption_translation, 'link' => '/cryptoTokens', 'img' => '', 'depth' => '3'],
//                                ['title' => $this->texts->where('caption_name', "CryptoExchanges")->first()->caption_translation, 'link' => '/cryptoExchanges', 'img' => '', 'depth' => '3'],
//                                ['title' => $this->texts->where('caption_name', "CryptoPlatforms")->first()->caption_translation, 'link' => '/cryptoPlatforms', 'img' => '', 'depth' => '3'],
//                            ]
//                        ],
//                        [
//                            'title' => $this->texts->where('caption_name', "SystemImages")->first()->caption_translation,
//                            'img' => '',
//                            'link' => '',
//                            'children' => [
//                                ['title' => $this->texts->where('caption_name', "ImageCategories")->first()->caption_translation, 'link' => '/imageCategories', 'img' => '','depth' => '3'],
//                                ['title' => $this->texts->where('caption_name', "Images")->first()->caption_translation, 'link' => '/images', 'img' => '','depth' => '3'],
//                                ['title' => $this->texts->where('caption_name', "FileTypes")->first()->caption_translation, 'link' => '/fileTypes', 'img' => '','depth' => '3'],
//                            ]
//                        ],
                    ]
                ],
//                [
//                    'title' => $this->texts->where('caption_name', "ExternalReports")->first()->caption_translation,
//                    'link' => '',
//                    'img' => '/img/report.svg',
//                    'depth'=>1,
//                    'children' => [
//                        ['title' => $this->texts->where('caption_name', "Companies")->first()->caption_translation, 'link' => '/externalReportsByCompanies', 'img' => ''],
//                        ['title' => $this->texts->where('caption_name', "Contractors")->first()->caption_translation, 'link' => '/externalReportsByContractors', 'img' => ''],
//                    ]
//                ]
            ],
            "menu_parameters" => [
                "first_level_icons" => true,
                "any_level_icons" => true,
            ]
        ];

        return $managerMenu;

    }


    /*function builds an admin main menu*/
    public function buildAdminMainMenu()
    {


        $adminMenu = array();

        $adminMenu[] = array(

            'title' => $this->texts->where('caption_name', "UserProfile")->first()->caption_translation,
            'img' => '/img/userData.svg',
            'link' => '',

            'children' => [
                [
                    'title' => $this->texts->where('caption_name', "UserData")->first()->caption_translation,
                    'link' => '/profile',
                    'img' => ''
                ],
            ]


        );

        $adminMenu[] = array(

            'title' => $this->texts->where('caption_name', "Administration")->first()->caption_translation,
            'img' => '/img/administration.svg',
            'link' => '',
            'children' => [

                ['title' => $this->texts->where('caption_name', "Companies")->first()->caption_translation, 'link' => '/companies', 'img' => ''],
                ['title' => $this->texts->where('caption_name', "Contractors")->first()->caption_translation, 'link' => '/contractors', 'img' => ''],
                [
                    'title' => $this->texts->where('caption_name', "ExternalDatabaseSettings")->first()->caption_translation,
                    'link' => '',
                    'img' => '',
                    'children' => [
                        ['title' => $this->texts->where('caption_name', "DatabaseServers")->first()->caption_translation, 'link' => '/serversDb', 'img' => ''],
                        ['title' => $this->texts->where('caption_name', "Databases")->first()->caption_translation, 'link' => '/dbs', 'img' => ''],
                        ['title' => $this->texts->where('caption_name', "DatabaseAreas")->first()->caption_translation, 'link' => '/dbAreas', 'img' => ''],
                        ['title' => $this->texts->where('caption_name', "DbTypes")->first()->caption_translation, 'link' => '/dbTypes', 'img' => ''],
                        ['title' => $this->texts->where('caption_name', "ConsumerAccounts")->first()->caption_translation, 'link' => '/consumerAccounts', 'img' => ''],

                    ]
                ],
                ['title' => $this->texts->where('caption_name', "CountriesAndRegions")->first()->caption_translation, 'link' => '', 'img' => '',

                    'children' => [
                        ['title' => $this->texts->where('caption_name', "Countries")->first()->caption_translation, 'link' => '/countries', 'img' => ''],
                        ['title' => $this->texts->where('caption_name', "Regions")->first()->caption_translation, 'link' => '/regions', 'img' => ''],
                    ]

                ],
                [
                    'title' => $this->texts->where('caption_name', "LanguageSettings")->first()->caption_translation,
                    'img' => '',
                    'link' => '',
                    'children' => [
                        ['title' => $this->texts->where('caption_name', "Languages")->first()->caption_translation, 'link' => '/languages', 'img' => ''],
                        ['title' => $this->texts->where('caption_name', "CaptionsCodes")->first()->caption_translation, 'link' => '/captionsСodes', 'img' => ''],
                        ['title' => $this->texts->where('caption_name', "CaptionTranslations")->first()->caption_translation, 'link' => '/translationCaptions', 'img' => ''],
                    ]
                ],
                ['title' => $this->texts->where('caption_name', "contactInfo")->first()->caption_translation, 'link' => '', 'img' => '',

                    'children' => [
                        ['title' => $this->texts->where('caption_name', "ContactInfoKinds")->first()->caption_translation, 'link' => '/infoKinds', 'img' => ''],
                        ['title' => $this->texts->where('caption_name', "ContactInfoTypes")->first()->caption_translation, 'link' => '/infoTypes', 'img' => ''],
                        ['title' => $this->texts->where('caption_name', "CompaniesContactInfo")->first()->caption_translation, 'link' => '/companiesContactInfo', 'img' => ''],
                        ['title' => $this->texts->where('caption_name', "ContractorsContactInfo")->first()->caption_translation, 'link' => '/contractorsContactInfo', 'img' => ''],
                    ]

                ],
                ['title' => $this->texts->where('caption_name', "Accesses")->first()->caption_translation, 'link' => '', 'img' => '',
                    'children' => [
                        ['title' => $this->texts->where('caption_name', "AccessTypes")->first()->caption_translation, 'link' => '/accessTypes', 'img' => ''],
                        ['title' => $this->texts->where('caption_name', "ConsumersAccesses")->first()->caption_translation, 'link' => '/consumersAccesses', 'img' => ''],
                        ['title' => $this->texts->where('caption_name', "AccessTypeRows")->first()->caption_translation, 'link' => '/accessTypeRows', 'img' => ''],
                        ['title' => $this->texts->where('caption_name', "AccessEntities")->first()->caption_translation, 'link' => '/accessEntities', 'img' => ''],

                    ]


                ],
                [
                    'title' => $this->texts->where('caption_name', "DataChanges")->first()->caption_translation,
                    'link' => '',
                    'img' => '',
                    'children' => [
                        ['title' => $this->texts->where('caption_name', "DataChangeReasons")->first()->caption_translation, 'link' => '/dataChangeReasons', 'img' => ''],
                        ['title' => $this->texts->where('caption_name', "CompaniesChanges")->first()->caption_translation, 'link' => '/companiesChanges', 'img' => ''],
                        ['title' => $this->texts->where('caption_name', "CompaniesContactInfoChanges")->first()->caption_translation, 'link' => '/companiesContactInfoChanges', 'img' => ''],
                        ['title' => $this->texts->where('caption_name', "ContractorsChanges")->first()->caption_translation, 'link' => '/ContractorsChanges', 'img' => ''],
                        ['title' => $this->texts->where('caption_name', "ContractorsContactInfoChanges")->first()->caption_translation, 'link' => '/contractorsContactInfoChanges', 'img' => ''],

                    ]
                ],


            ]

        );

        $adminMenu[] = array(


            'title' => $this->texts->where('caption_name', "ExternalReports")->first()->caption_translation,
            'link' => '',
            'img' => '/img/report.svg',
            'children' => [


                ['title' => $this->texts->where('caption_name', "Companies")->first()->caption_translation, 'link' => '/externalReportsByCompanies', 'img' => ''],
                ['title' => $this->texts->where('caption_name', "Contractors")->first()->caption_translation, 'link' => '/externalReportsByContractors', 'img' => ''],
            ]


        );

        return $adminMenu;

    }

    /*function builds a simple user main menu*/
    public function buildUserMainMenu()
    {


        $userMenu = array();

        /*displayed to all type of users*/
        $userMenu[] = array(

            'title' => $this->texts->where('caption_name', "UserProfile")->first()->caption_translation,
            'img' => '/img/userData.svg',
            'link' => '',

            'children' => [
                [
                    'title' => $this->texts->where('caption_name', "UserData")->first()->caption_translation,
                    'link' => '/profile',
                    'img' => ''
                ],
            ]

        );


        $userMenu[] = array(


            'title' => $this->texts->where('caption_name', "ExternalReports")->first()->caption_translation,
            'link' => '',
            'img' => '/img/report.svg',
            'children' => [


                ['title' => $this->texts->where('caption_name', "Companies")->first()->caption_translation, 'link' => '/externalReportsByCompanies', 'img' => ''],

            ]


        );

        return $userMenu;

    }

    public function buildFooter()
    {

        //
        $footer = [
            'menu' => [
                [
//                    'title' => $this->texts->where('caption_name', "Blog")->first()->caption_translation,
                    'title' => 'Blog',
                    'link' => '/blog',
                    'img' => '',
                ],
                [
//                    'title' => $this->texts->where('caption_name', "Support")->first()->caption_translation,
                    'title' => 'Support',
                    'link' => '/support',
                    'img' => '',
                ],
                [
//                    'title' => $this->texts->where('caption_name', "TermsAndConditions")->first()->caption_translation,
                    'title' => 'TermsAndConditions',
                    'link' => '/terms',
                    'img' => '',
                ],
                [
//                    'title' => $this->texts->where('caption_name', "Privacy")->first()->caption_translation,
                    'title' => 'Privacy',
                    'link' => '/privacy',
                    'img' => '',
                ]
            ],
            'copyright' => [
                'caption' => 'DIGITAL AGENCY 2019 | LardanSoft'
            ]
        ];

        return $footer;

    }

    // Bogdan Yartsun 01.10.2018
    public function buildBreadcrumbs()
    {

        $breadcrumbs[] = [
            '/' => $this->texts->where('caption_name', "Dashboard")->first()->caption_translation,
            '/profile' => $this->texts->where('caption_name', "personalInfo")->first()->caption_translation,
            '/contractors/:id' => $this->texts->where('caption_name', "NameContractor")->first()->caption_translation,
            '/contractors/:id/contactInfo' => $this->texts->where('caption_name', "contactInfo")->first()->caption_translation,
            '/contractors_new' => $this->texts->where('caption_name', "Contractors")->first()->caption_translation,
            '/contractors_new/:id' => $this->texts->where('caption_name', "NameContractor")->first()->caption_translation,
            '/contractors_new/:id/contactInfo' => $this->texts->where('caption_name', "contactInfo")->first()->caption_translation,
            '/companies/:id' => $this->texts->where('caption_name', "NameCompany")->first()->caption_translation,
            '/companies/:id/contactInfo' => $this->texts->where('caption_name', "contactInfo")->first()->caption_translation,
            '/companies/:id/contactInfo/:cont_id' => $this->texts->where('caption_name', "contactInfo")->first()->caption_translation,
            '/contractors/:id/contactInfo/:cont_id' => $this->texts->where('caption_name', "contactInfo")->first()->caption_translation,
            '/externalReportsByCompanies' => $this->texts->where('caption_name', "ExternalReports")->first()->caption_translation,
            '/externalReportsByCompanies/create' => $this->texts->where('caption_name', "CreateReport")->first()->caption_translation,
            '/contractorsContactInfoChanges' => $this->texts->where('caption_name', "ContractorsContactInfoChanges")->first()->caption_translation,
            '/ContractorsChanges' => $this->texts->where('caption_name', "ContractorsChanges")->first()->caption_translation,
            '/companiesContactInfoChanges' => $this->texts->where('caption_name', "CompaniesContactInfoChanges")->first()->caption_translation,
            '/companiesChanges' => $this->texts->where('caption_name', "CompaniesChanges")->first()->caption_translation,
            '/dataChangeReasons' => $this->texts->where('caption_name', "DataChangeReasons")->first()->caption_translation,
            '/accessEntities' => $this->texts->where('caption_name', "AccessEntities")->first()->caption_translation,
            '/accessTypeRows' => $this->texts->where('caption_name', "AccessTypeRows")->first()->caption_translation,
            '/consumersAccesses' => $this->texts->where('caption_name', "ConsumersAccesses")->first()->caption_translation,
            '/accessTypes' => $this->texts->where('caption_name', "AccessTypes")->first()->caption_translation,
            '/contractorsContactInfo' => $this->texts->where('caption_name', "ContractorsContactInfo")->first()->caption_translation,
            '/companiesContactInfo' => $this->texts->where('caption_name', "CompaniesContactInfo")->first()->caption_translation,
            '/infoTypes' => $this->texts->where('caption_name', "ContactInfoTypes")->first()->caption_translation,
            '/infoKinds' => $this->texts->where('caption_name', "ContactInfoKinds")->first()->caption_translation,
            '/translationCaptions' => $this->texts->where('caption_name', "CaptionTranslations")->first()->caption_translation, //todo поменять на правильный caption
            '/dbTypes' => $this->texts->where('caption_name', "DbTypes")->first()->caption_translation,                                                                                     //todo поменять на правильный caption
            '/regions' => $this->texts->where('caption_name', "Regions")->first()->caption_translation,
            '/countries' => $this->texts->where('caption_name', "Countries")->first()->caption_translation,
            '/dbAreas' => $this->texts->where('caption_name', "DatabaseAreas")->first()->caption_translation,
            '/dbs' => $this->texts->where('caption_name', "Databases")->first()->caption_translation,
            '/serversDb' => $this->texts->where('caption_name', "DatabaseServers")->first()->caption_translation,
            '/contractors' => $this->texts->where('caption_name', "Contractors")->first()->caption_translation,
            '/companies' => $this->texts->where('caption_name', "Companies")->first()->caption_translation,
            '/languages' => $this->texts->where('caption_name', "Languages")->first()->caption_translation,
            '/captions' => $this->texts->where('caption_name', "CaptionList")->first()->caption_translation,
            // Yartsun Bogdan 13:14 06.11.2018 add string
            '/companies_new' => $this->texts->where('caption_name', "Companies")->first()->caption_translation,
            // Yartsun Bogdan 13:14 06.11.2018 add string
            // Yartsun Bogdan 11:04 07.11.2018 add string
            '/companies_new/:id/contactInfo' => $this->texts->where('caption_name', "contactInfo")->first()->caption_translation,
            '/countries/:id/regions' => $this->texts->where('caption_name', "Regions")->first()->caption_translation,
            '/attachedType' => $this->texts->where('caption_name', "DocumentType")->first()->caption_translation,
            '/attachedKind' => $this->texts->where('caption_name', "DocumentKind")->first()->caption_translation,
            // Yartsun Bogdan 11:04 07.11.2018 add string
            'currentLng' => Lang::locale(),
            '/banks' => $this->texts->where('caption_name', "Banks")->first()->caption_translation,
            '/currencies' => $this->texts->where('caption_name', "Currencies")->first()->caption_translation,
            '/cryptoExchanges' => $this->texts->where('caption_name', "CryptoExchanges")->first()->caption_translation,
            '/cryptoPlatforms' => $this->texts->where('caption_name', "CryptoPlatforms")->first()->caption_translation,
            '/cryptoTokens' => $this->texts->where('caption_name', "CryptoTokens")->first()->caption_translation,
            '/bankAccountTypes' => $this->texts->where('caption_name', "BankAccountTypes")->first()->caption_translation,
            '/companies/:id/bankAccounts' => $this->texts->where('caption_name', "BankAccount")->first()->caption_translation,
            '/contractors/:id/bankAccounts' => $this->texts->where('caption_name', "BankAccount")->first()->caption_translation,
            '/imageCategories' => $this->texts->where('caption_name', "ImageCategories")->first()->caption_translation,
            '/companies/:id/cryptoExchangeAccounts' => $this->texts->where('caption_name', "CryptoExchangeAccounts")->first()->caption_translation,
            '/contractors/:id/cryptoExchangeAccounts' => $this->texts->where('caption_name', "CryptoExchangeAccounts")->first()->caption_translation,
            '/companies/:id/cryptoPlatformAccounts' => $this->texts->where('caption_name', "CryptoPlatformAccounts")->first()->caption_translation,
            '/contractors/:id/cryptoPlatformAccounts' => $this->texts->where('caption_name', "CryptoPlatformAccounts")->first()->caption_translation,
            '/images' => $this->texts->where('caption_name', "Images")->first()->caption_translation,
            '/fileTypes' => $this->texts->where('caption_name', "Format")->first()->caption_translation,
            '/contractors/:id/cryptoPlatformAccounts/:id/cryptoPlatformWallets' => $this->texts->where('caption_name', "CryptoWallets")->first()->caption_translation,
        ];

        return $breadcrumbs;
    }

    //Bogdan Yartsun 30.11.2018
    public function translateList()
    {

        //insert Albert Topalu 19.11.18 15:04
        $captionName = [
            'Showing', 'of', 'onThePage', 'Actions',
            'Search', 'CreateReport', 'ReportsList', 'All', 'ThereAreNoRecordsMatchingRequest', 'Filter',
            'Payment', 'Planned', 'Paid', 'Overdue', 'SortAZ', 'SortZA', 'FilterCondition', 'FilterValue', 'Empty', 'CellEmpty', 'DataCell',
            'TextСontains', 'EnterText', 'TextNotContain', 'TextBeginsWith', 'TextEndsWith', 'TextExactly', 'ChooseDate', 'DateTo', 'DateAfter',
            'More', 'MoreOrEqual', 'InsertNumber', 'Less', 'LessOrEqual', 'Equally', 'NotEqual', 'Between', 'Before', 'NotBetween', 'Date', 'NotSelected','DeselectAll','SelectAll'
        ];
        //End insert Albert Topalu 19.11.18 15:04
        $getArrayCaptions = $this->getTranslateByKeys($captionName);
        $listTranslation = [
            'DeselectAll' => $getArrayCaptions['DeselectAll']['translation_captions']['caption_translation'],
            'SelectAll' => $getArrayCaptions['SelectAll']['translation_captions']['caption_translation'],
            'Showing' => $getArrayCaptions['Showing']['translation_captions']['caption_translation'],
            'of' => $getArrayCaptions['of']['translation_captions']['caption_translation'],
            'onThePage' => $getArrayCaptions['onThePage']['translation_captions']['caption_translation'],
            'Actions' => $getArrayCaptions['Actions']['translation_captions']['caption_translation'],
            'all_select' => $getArrayCaptions['All']['translation_captions']['caption_translation'],
            'Search' => $getArrayCaptions['Search']['translation_captions']['caption_translation'],
            'EmptyFilteredText' => $getArrayCaptions['ThereAreNoRecordsMatchingRequest']['translation_captions']['caption_translation'],
            'enableFilter' => $getArrayCaptions['Filter']['translation_captions']['caption_translation'],
            'Payment' => $getArrayCaptions['Payment']['translation_captions']['caption_translation'],
            'Planned' => $getArrayCaptions['Planned']['translation_captions']['caption_translation'],
            'Paid' => $getArrayCaptions['Paid']['translation_captions']['caption_translation'],
            'Overdue' => $getArrayCaptions['Overdue']['translation_captions']['caption_translation'],
            'SortAZ' => $getArrayCaptions['SortAZ']['translation_captions']['caption_translation'],
            'SortZA' => $getArrayCaptions['SortZA']['translation_captions']['caption_translation'],
            'FilterCondition' => $getArrayCaptions['FilterCondition']['translation_captions']['caption_translation'],
            'FilterValue' => $getArrayCaptions['FilterValue']['translation_captions']['caption_translation'],
            'Empty' => $getArrayCaptions['Empty']['translation_captions']['caption_translation'],
            'CellEmpty' => $getArrayCaptions['CellEmpty']['translation_captions']['caption_translation'],
            'DataCell' => $getArrayCaptions['DataCell']['translation_captions']['caption_translation'],
            'TextСontains' => $getArrayCaptions['TextСontains']['translation_captions']['caption_translation'],
            'EnterText' => $getArrayCaptions['EnterText']['translation_captions']['caption_translation'],
            'TextNotContain' => $getArrayCaptions['TextNotContain']['translation_captions']['caption_translation'],
            'TextBeginsWith' => $getArrayCaptions['TextBeginsWith']['translation_captions']['caption_translation'],
            'TextEndsWith' => $getArrayCaptions['TextEndsWith']['translation_captions']['caption_translation'],
            'TextExactly' => $getArrayCaptions['TextExactly']['translation_captions']['caption_translation'],
            'ChooseDate' => $getArrayCaptions['ChooseDate']['translation_captions']['caption_translation'],
            'DateTo' => $getArrayCaptions['DateTo']['translation_captions']['caption_translation'],
            'DateAfter' => $getArrayCaptions['DateAfter']['translation_captions']['caption_translation'],
            'More' => $getArrayCaptions['More']['translation_captions']['caption_translation'],
            'MoreOrEqual' => $getArrayCaptions['MoreOrEqual']['translation_captions']['caption_translation'],
            'InsertNumber' => $getArrayCaptions['InsertNumber']['translation_captions']['caption_translation'],
            'Less' => $getArrayCaptions['Less']['translation_captions']['caption_translation'],
            'LessOrEqual' => $getArrayCaptions['LessOrEqual']['translation_captions']['caption_translation'],
            'Equally' => $getArrayCaptions['Equally']['translation_captions']['caption_translation'],
            'NotEqual' => $getArrayCaptions['NotEqual']['translation_captions']['caption_translation'],
            'Between' => $getArrayCaptions['Between']['translation_captions']['caption_translation'],
            'Before' => $getArrayCaptions['Before']['translation_captions']['caption_translation'],
            'NotBetween' => $getArrayCaptions['NotBetween']['translation_captions']['caption_translation'],
            'Date' => $getArrayCaptions['Date']['translation_captions']['caption_translation'],
            'NotSelected' => $getArrayCaptions['NotSelected']['translation_captions']['caption_translation'],
        ];
        return $listTranslation;
    }

    //Alex Yaroshchuk 22.11.2018
    public function buildNameBreacrumbs(Request $request)
    {


        $model = 'App\Models\\' . $request->component;
        $name = $model::where('id', $request->id)->value($request->column);
        return $name;


        //commit Albert Topalu 11.04.19 17:05
        /*$model = $request['component'];
        if($model == 'contractors')
        {
            $model = 'Contractor';
            $model_name = 'App\Models\\' . $model;
            $name = $model_name::where('id', $request->id)->value('contractor_short_name');
        }
        if($model == 'companies')
        {
            $model = 'Company';
            $model_name = 'App\Models\\' . $model;
            $name = $model_name::where('id', $request->id)->value('company_short_name');
        }
        if($model == 'captions')
        {
            $model = 'Caption';
            $model_name = 'App\Models\\' . $model;
            $name = $model_name::where('id', $request->id)->value('caption_name');
        }
        if($model == 'languages')
        {
            $model = 'Language';
            $model_name = 'App\Models\\' . $model;
            $name = $model_name::where('id', $request->id)->value('language_name');
        }
        if($model == 'servers')
        {
            $model = 'ServerDB';
            $model_name = 'App\Models\\' . $model;
            $name = $model_name::where('id', $request->id)->value('server_name');
        }
        if($model == 'translationCaptions')
        {
            $model = 'TranslationCaption';
            $model_name = 'App\Models\\' . $model;
            $name = $model_name::where('id', $request->id)->value('caption_translation');
        }
        if($model == 'dbs')
        {
            $model = 'DBase';
            $model_name = 'App\Models\\' . $model;
            $name = $model_name::where('id', $request->id)->value('db_name');
        }
        if($model == 'dbTypes')
        {
            $model = 'DbType';
            $model_name = 'App\Models\\' . $model;
            $name = $model_name::where('id', $request->id)->value('db_type_name');
        }
        if($model == 'countries')
        {
            $model = 'Country';
            $model_name = 'App\Models\\' . $model;
            $name = $model_name::where('id', $request->id)->value('country_name');
        }
        if($model == 'regions')
        {
            $model = 'Region';
            $model_name = 'App\Models\\' . $model;
            $name = $model_name::where('id', $request->id)->value('region_name');
        }
        if($model == 'dbAreas'){
            $model = 'DbArea';
            $model_name = 'App\Models\\' . $model;
            $name = $model_name::where('id', $request->id)->value('db_area_code');
        }
        if($model == 'dbAreas'){
            $model = 'DbArea';
            $model_name = 'App\Models\\' . $model;
            $name = $model_name::where('id', $request->id)->value('db_area_code');
        }
        if($model == 'consumerAccounts'){
            $model = 'ConsumerAccount';
            $model_name = 'App\Models\\' . $model;
            $name = $model_name::where('id', $request->id)->value('consumer_account_name');
        }
        if($model == 'attachedKind'){
            $model = 'AttachedDocumentKind';
            $model_name = 'App\Models\\' . $model;
            $name = $model_name::where('id', $request->id)->value('att_doc_kind_name');
        }
        if($model == 'attachedType'){
            $model = 'AttachedDocumentType';
            $model_name = 'App\Models\\' . $model;
            $name = $model_name::where('id', $request->id)->value('att_doc_type_name');
        }
        if($model == 'attachedFile'){
            $model = 'AttachedDocumentFile';
            $model_name = 'App\Models\\' . $model;
            $name = $model_name::where('id', $request->id)->value('att_doc_file_name');
        }
        if($model == 'banks'){
            $model = 'Bank';
            $model_name = 'App\Models\\' . $model;
            $name = $model_name::where('id', $request->id)->value('bank_name');
        }
        if($model == 'cryptoExchanges'){
            $model = 'CryptoExchange';
            $model_name = 'App\Models\\' . $model;
            $name = $model_name::where('id', $request->id)->value('c_exchange_name');
        }
        if($model == 'cryptoPlatforms'){
            $model = 'CryptoPlatform';
            $model_name = 'App\Models\\' . $model;
            $name = $model_name::where('id', $request->id)->value('c_platform_name');
        }
        if($model == 'bankAccountTypes'){
            $model = 'BankAccountType';
            $model_name = 'App\Models\\' . $model;
            $name = $model_name::where('id', $request->id)->value('bank_account_type_name');
        }
        if($model == 'bankAccounts'){
            $model = 'BankAccount';
            $model_name = 'App\Models\\' . $model;
            $name = $model_name::where('id', $request->id)->value('bank_account_name');
        }
        if($model == 'currencies'){
            $model = 'Currency';
            $model_name = 'App\Models\\' . $model;
            $name = $model_name::where('id', $request->id)->value('currency_name');
        }
        if($model == 'cryptoTokens'){
            $model = 'CryptoToken';
            $model_name = 'App\Models\\' . $model;
            $name = $model_name::where('id', $request->id)->value('c_token_name');
        }
        if($model == 'cryptoExchangeAccounts'){
            $model = 'CryptoAccount';
            $model_name = 'App\Models\\' . $model;
            $name = $model_name::where('id', $request->id)->value('c_account_name');
        }
        if($model == 'cryptoPlatformAccounts'){
            $model = 'CryptoAccount';
            $model_name = 'App\Models\\' . $model;
            $name = $model_name::where('id', $request->id)->value('c_account_name');
        }
        if($model == 'images'){
            $model = 'Image';
            $model_name = 'App\Models\\' . $model;
            $name = $model_name::where('id', $request->id)->value('image_name');
        }
        if($model == 'fileTypes'){
            $model = 'FileType';
            $model_name = 'App\Models\\' . $model;
            $name = $model_name::where('id', $request->id)->value('file_type_name');
        }
        if($model == 'contactInfo'){
            $model = 'InfoType';
            $model_name = 'App\Models\\' . $model;
            $name = $model_name::where('id', $request->id)->value('info_type_name');

        }
        if($model == 'cryptoPlatformWallets') {
            $model = 'CryptoWallet';
            $model_name = 'App\Models\\' . $model;
            $name = $model_name::where('id', $request->id)->value('c_wallet_name');
        }
        return $name;*/
        //END commit Albert Topalu 11.04.19 17:05
    }


    public function buildError()
    {
        $errors = [
            '500' => $this->texts->where('caption_name', "Error500Unexpected")->first()->caption_translation,
            '403' => $this->texts->where('caption_name', "Error403Forbidden")->first()->caption_translation,
            '404' => $this->texts->where('caption_name', "Error404PageNotFound")->first()->caption_translation,
            'PageDoesnExist' => $this->texts->where('caption_name', "ErrorPageDoesnExist")->first()->caption_translation,
            'GoHeadOver' => $this->texts->where('caption_name', "ErrorGoHeadOver")->first()->caption_translation,
            'or' => $this->texts->where('caption_name', "or")->first()->caption_translation,
            'ContactUs' => $this->texts->where('caption_name', "ErrorContactUs")->first()->caption_translation,
        ];

        return $errors;
    }


    public function addTranslations()
    {
        /*

        insert into _captions (id,caption_name) values (441,'Companies');
        insert into _captions (id,caption_name) values (442,'Contractors');
        insert into _captions (id,caption_name) values (443,'ExternalDatabaseSettings');
        insert into _captions (id,caption_name) values (444,'DatabaseServers');
        insert into _captions (id,caption_name) values (445,'Databases');
        insert into _captions (id,caption_name) values (446,'DatabaseAreas');
        insert into _captions (id,caption_name) values (447,'CountriesAndRegions');
        insert into _captions (id,caption_name) values (448,'Countries');
        insert into _captions (id,caption_name) values (449,'Regions');
        insert into _captions (id,caption_name) values (450,'LanguageSettings');
        insert into _captions (id,caption_name) values (451,'Languages');
        insert into _captions (id,caption_name) values (452,'CaptionsCodes');
        insert into _captions (id,caption_name) values (453,'CaptionTranslations');
        insert into _captions (id,caption_name) values (454,'ContactInfoKinds');
        insert into _captions (id,caption_name) values (455,'ContactInfoTypes');
        insert into _captions (id,caption_name) values (456,'CompaniesContactInfo');
        insert into _captions (id,caption_name) values (457,'ContractorsContactInfo');
        insert into _captions (id,caption_name) values (458,'AccessTypes');
        insert into _captions (id,caption_name) values (459,'ConsumersAccesses');
        insert into _captions (id,caption_name) values (460,'DataChanges');
        insert into _captions (id,caption_name) values (461,'DataChangeReasons');
        insert into _captions (id,caption_name) values (462,'CompaniesChanges');
        insert into _captions (id,caption_name) values (463,'CompaniesContactInfoChanges');
        insert into _captions (id,caption_name) values (464,'ContractorsChanges');
        insert into _captions (id,caption_name) values (465,'ContractorsContactInfoChanges');
        insert into _captions (id,caption_name) values (466,'ExternalReports');


        Translation::create([
            'caption_id' => 466,
            'caption_translation' =>'Внешние отчеты',
            'language_id' => 2,
        ]);



        Translation::create([
            'caption_id' => 466,
            'caption_translation' =>'External reports',
            'language_id' => 1,
        ]);

 */


    }
}
