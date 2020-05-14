<?php

// + Miniyar Rakhimkulov 03.10.2019


namespace App\Http\Classes;

use App\Models\Caption;
use App\Models\ConsumerAccessRole;
use App\Models\MenuItem;
use App\Models\UserInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class MenuManager
{
    private static $accessRolesId = null;
    private static $arrayCaptionsMenu;
    private static $arrayCaptionsRoute = null;
    private static $menuItemTable = [];
    private static $check_access = true;
    private static $fields_list = null;
    private static $indent = 0;
    private static $marker = '  ';
    private static $delimiter = '&emsp;';
    private static $children_key;

    public function buildMenu($request)
    {
        $menuType = $request['menutype'];
        self::$children_key = $request['children_key'] ?? "children";

        if (isset($request['check_access'])) {
            self::$check_access = $request['check_access'];
        }

        $convert_to_list = false;
        if (isset($request['convert_to_list'])) {
            $convert_to_list = $request['convert_to_list'];
        }

        $convert_to_tree = false;
        if (isset($request['convert_to_tree'])) {
            $convert_to_tree = $request['convert_to_tree'];
        }

        $interface_id = null;
        $userInterface = null;

        if (array_key_exists ('interface_id', $request)){
            $interface_id = $request['interface_id'];
            if ($menuType == "bankNet"){
                $userInterface = UserInterface::where('user_interface_code', 'top_menu_bank_net')->first();
                $interface_id = $userInterface['id'];
            }

            if ($interface_id == NULL) {
                $userInterfaces = Auth::user()->getUserInterfaces();

                if ($userInterfaces != NULL) {
                    $interface_id = $userInterfaces[0]['id'];
                }
            }
        }



        if (isset($request['fields_list'])){
            self::$fields_list = $request['fields_list'];
        }
        else{
            self::$fields_list = [
                'title',
                'image',
                'depth',
                'link',
                'group_l',
                'separator'
            ];
        }

        $indentation = false;
        if(isset($request['indentation'])){
            $indentation = true;
            if(isset($request['indentation']['marker'])){
                self::$marker = $request['indentation']['marker'];
            }
            if (isset($request['indentation']['indent'])){
                self::$indent = $request['indentation']['indent'];
            }
        }

        if (self::$check_access) {
            $userInterface = UserInterface::where('id', $interface_id)->first();
            self::$accessRolesId = ConsumerAccessRole::leftJoin('_AccessRoles as ar', 'ar.id', '=', 'access_role_id')
                ->where('ar.user_interface_id', $interface_id)->where('consumer_id', Auth::user()->id)->select('ar.*')->get()->toArray();
//                ->where('ar.user_interface_id', $interface_id)->where('consumer_id', 1)->select('ar.*')->get()->toArray();
//            foreach ($accessRolesIdUnNum as $key => $value) {
//                self::$accessRolesId = Arr::add(self::$accessRolesId, $value['id'], $value);
//            }
        }
        else{
            self::$accessRolesId = null;
        }

        $menuItemTableUnNum = MenuItem::with(['feRoute', 'feRoute.feRouteUrl', 'feRoute.feRouteUrl.feUrl', 'image', 'menuItemAccessRole' => function ($query) use ($interface_id){
            $query->rightJoin('_AccessRoles as ar', 'ar.id', '=', 'MenuItemAccessRoles.access_role_id')->select('MenuItemAccessRoles.menu_item_id', 'ar.id as access_role_id', 'ar.access_role_name', 'menu_item_view_l');
        }])->orderBy('id')->get()->toArray();

        foreach ($menuItemTableUnNum as $key => $value) {
            $new_menu_item_access_role = [];
            foreach ($value['menu_item_access_role'] as $menu_item_access_role_key => $menu_item_access_role_value) {
                $new_menu_item_access_role[$menu_item_access_role_value['access_role_id']]=$menu_item_access_role_value;
            }
            $value['menu_item_access_role'] = $new_menu_item_access_role;
            self::$menuItemTable[$value['id']]=$value;
        }

        $captionName = Arr::pluck(self::$menuItemTable, 'caption_code');
        array_push($captionName, 'EmptyTitle');
        self::$arrayCaptionsMenu = $this->getTranslateByKeys($captionName);

        $captionName = Arr::pluck(self::$menuItemTable, 'fe_route.caption_code');
        self::$arrayCaptionsRoute = $this->getTranslateByKeys($captionName);

        $menu_item_id = NULL;

        if ($menuType == "top") {
            $menu_item_id = self::$check_access ? $userInterface['menu_item_id_top'] : 1;
        } elseif ($menuType == "left") {
            $menu_item_id = self::$check_access ? $userInterface['menu_item_id_left'] : 1;
        }
        elseif ($menuType == "bankNet") {

            $menu_item_id =  $userInterface['menu_item_id_top'];
        }

        if ($menu_item_id == NULL) {
            return [];
        }

        $params = [
            'depth' => 0,
            'menuItem' => '',
        ];

        //+Menu access
        $menu = [];
        $menuItem = self::$menuItemTable[$menu_item_id];
        if (self::$check_access) {
            $menu_view_l = self::checkMenuItemAccess($menuItem, self::$accessRolesId, false);
        }
        else {
            $menu_view_l = true;
        }
        //-

        //+Menu
        if (!$menu_view_l)
            return [];

        $kids = collect(Arr::where(self::$menuItemTable, function ($value, $key) use ($menu_item_id) {
            return $value['menu_item_parent_id'] == $menu_item_id;
        }))->sortBy('line_n')->toArray();
        $items = [];
        foreach ($kids as $kid) {
            $kidAccess = NULL;
            if (self::$check_access) {
                $kidAccess = self::checkMenuItemAccess($kid, self::$accessRolesId, false);
            }
            else {
                $kidAccess = true;
            }
            if ($kidAccess === true || $kidAccess === NULL) {
                $params['menuItem'] = $kid;
                array_push($items, $this->buildMenuItem($params));
            }

        }
        $menu = [
            "items" => $items,
            "menu_parameters" => [
                "first_level_icons" => true,
                "any_level_icons" => $menuType === 'top' ? false : true,
                "empty_title" => self::$arrayCaptionsMenu['EmptyTitle']['translation_captions']['caption_translation']
            ]
        ];
        //-

        if ($convert_to_list){
            if($indentation){
                $menu = $this->convertMenuToList($menu['items']);
            }
            else
                $menu = $this->convertMenuToList($menu['items']);
        }

        if ($convert_to_tree){
            $menu = $this->convertMenuToTree($menu['items']);
        }

        return $menu;
    }

    private function buildMenuItem($params)
    {
        //+Устанавливаем вспомогательные параметры
        $menuItem = $params['menuItem'];
        $depth = $params['depth'];
        $depth++;
        //-Устанавливаем вспомогательные параметры

        $item = array();

        // +++ Miniyar new 03.10.2019

        foreach (self::$fields_list as $test) {
            switch ($test) {
                case($test == 'id'):
                    $id = $menuItem['id'];
                    $item = array_add($item, "id", $id);
                    break;
                case($test == 'menu_item_code'):
                    $menu_item_code = $menuItem['menu_item_code'];
                    $item = array_add($item, "menu_item_code", $menu_item_code);
                    break;
                case($test == 'access_allowed_role_name'):
                    $access_allowed_role_name = '';
                    foreach ($menuItem['menu_item_access_role'] as $access_role) {
                        if ($access_role['menu_item_view_l'] == true)
                            $access_allowed_role_name = $access_allowed_role_name . $access_role['access_role']['access_role_name'] . ', ';
                    }
                    $access_allowed_role_name   = Str::replaceLast(', ', '', $access_allowed_role_name);
                    $item = array_add($item, "access_allowed_role_name", $access_allowed_role_name);
                    break;
                case($test == 'access_denied_role_name'):
                    $access_denied_role_name  = '';
                    foreach ($menuItem['menu_item_access_role'] as $access_role) {
                        if ($access_role['menu_item_view_l'] != true)
                            $access_denied_role_name  = $access_denied_role_name  . $access_role['access_role_name'] . ', ';
                    }
                    $access_denied_role_name    = Str::replaceLast(', ', '', $access_denied_role_name );
                    $item = array_add($item, "access_denied_role_name",  $access_denied_role_name );
                    break;
                case($test == 'image'):
                    $image = '';
                    if ($menuItem['image_id'] == NULL) {
                        if ($menuItem['group_l'] == 1) {
                            $image = '/img/interfacedashboard/folder.svg';
                        } else {
                            $image = '/img/interfacedashboard/file.svg';
                        }
                    } else {
                        $image = $menuItem['image']['image_path'];
                    }
                    $item = array_add($item, "img", $image);
                    break;
                case($test == 'depth'):
                    $item = array_add($item, "depth", $depth);
                    break;
                case($test == 'padding'):
                    $item = array_add($item, "padding", ($depth - 1) * self::$indent);
                    break;
                case($test == 'link'):
                    $link = '';
                    if ($menuItem['group_l'] == 0 && $menuItem['fe_route'] != NULL) {
                        foreach ($menuItem['fe_route']['fe_route_url'] as $fe_route_url) {
                            //commit Albert Topalu 18.04.19 14:44
//                    if ($fe_route_url['use_card_l'] === 0 && $fe_route_url['fe_url'] != NULL) {
                            //END commit Albert Topalu 18.04.19 14:44

                            //Edit Albert Topalu 18.04.19 14:44  $fe_route_url['use_card_l'] === ->  $fe_route_url['use_card_l'] ==
                            if ($fe_route_url['use_card_l'] == 0 && $fe_route_url['fe_url'] != NULL) {
                                $link = '/' . $fe_route_url['fe_url']['fe_url_code'];
                            }
                            //END Edit Albert Topalu 18.04.19 14:44
                        }
                    }
                    $item = array_add($item, "link", $link);
                    break;
                case($test == 'separator'):
                    $item = array_add($item, "separator", '10');
                    break;
                case($test == 'group_l'):
                    if ($menuItem['group_l'] == 0) {
                        $item = array_add($item, 'group_l', '0');
                    } else {
                        $item = array_add($item, 'group_l', '1');
                    }
                    break;
                case($test == 'line_n'):
                    $item = array_add($item, 'line_n', (string) $menuItem['line_n']);
                    break;
                case($test == 'updated_at'):
                    $item = array_add($item, 'updated_at', (string) $menuItem['updated_at']);
                    break;
            }
        }

        // --- Miniyar new 03.10.2019

        //+Устанавливаем значение title
        $title = $menuItem['menu_item_name'];
        if (array_key_exists($menuItem['caption_code'], self::$arrayCaptionsMenu)) {
            $title = self::$arrayCaptionsMenu[$menuItem['caption_code']]['translation_captions']['caption_translation'];
        }
        if ($title == NULL || $title == "") {
            if ($menuItem['fe_route'] != NULL) {
                $feRouteCaptionCode = $menuItem['fe_route']['caption_code'];

                if (array_key_exists($feRouteCaptionCode, self::$arrayCaptionsRoute)) {
                    $title = self::$arrayCaptionsRoute[$feRouteCaptionCode]['translation_captions']['caption_translation'];
                }
            }
        }
        $item = array_add($item, "title", $title);
        //-Устанавливаем значение title

        //+Устанавливаем значение children
        $children = [];
        $kids = collect(Arr::where(self::$menuItemTable, function ($value, $key) use ($menuItem) {
            return $value['menu_item_parent_id'] == $menuItem['id'];
        }))->sortBy('line_n')->toArray();

        foreach ($kids as $kid) {
            $kidAccess = NULL;
            if (self::$check_access) {
                $kidAccess = self::checkMenuItemAccess($kid, self::$accessRolesId, false);
            }
            else {
                $kidAccess = true;
            }

            if ($kidAccess === true || $kidAccess === NULL) {
                $params['menuItem'] = $kid;
                $params['depth'] = $depth;
                array_push($children, $this->buildMenuItem($params));
            }
        }

        if (!empty($children)) {
            $item = array_add($item, self::$children_key, $children);
        }
        //-Устанавливаем значение children

        return $item;
    }

    private function checkMenuItemAccess($menuItem, $accessRoles, $return_as_list = true){
        $menu_item_view_l = false;
        $parent = $menuItem['menu_item_parent_id'] == null ? null : self::$menuItemTable[$menuItem['menu_item_parent_id']];
        foreach ($accessRoles as $access_role_key => $access_role_value) {

            if(isset($menuItem['menu_item_access_role'][$access_role_value['id']])) {
                $role = $menuItem['menu_item_access_role'][$access_role_value['id']];

            }
            else {
                $role = [
                    'menu_item_id' => $menuItem['id'],
                    'access_role_id' => $access_role_value['id'],
                    'access_role_name' => $access_role_value['access_role_name'],
                    'menu_item_view_l' => $parent == null ? false : null
                ];
            }

            if ($parent != null){
                if (isset($parent['menu_item_access_role'][$access_role_value['id']]))
                    $parent_view_l = $parent['menu_item_access_role'][$access_role_value['id']]['menu_item_view_l'];
                else
                    $parent_view_l = self::checkMenuItemAccess($parent, [$access_role_value], false);

                if ($parent_view_l === false or $role['menu_item_view_l'] === false) {
                    $role['menu_item_view_l'] = false;
                } else {
                    $role['menu_item_view_l'] = true;
                }
            }

            $menuItem['menu_item_access_role'][$access_role_value['id']] = $role;
            if($menu_item_view_l === false)
                $menu_item_view_l = $role['menu_item_view_l'];
        }

        return $menu_item_view_l;
    }

    private function convertMenuToList($menu, $delimiter = '')
    {
        $list_menu = [];
        $items = $menu;

        foreach ($items as $key => $item){
            $cur_item = [];
            foreach ($item as $field_name => $field_value) {
                if ($field_name == 'title')
                    $cur_item = array_add($cur_item, $field_name, $delimiter . self::$marker . $field_value);
                else
                    $cur_item = array_add($cur_item, $field_name, $field_value);
            }
            array_push($list_menu, $cur_item);
            if (isset($item[self::$children_key])){
                $children_list = $this->convertMenuToList($item[self::$children_key], $delimiter . self::$delimiter);
                $list_menu = array_merge($list_menu, $children_list);
            }
        }

        return $list_menu;
    }

    private function convertMenuToTree($menu)
    {
        $tree_menu = $menu;

        return $tree_menu;
    }

    private function getTranslateByKeys(array $getCaptionName = [])
    {
        $captionsAll = Caption::with('translationCaptions')->whereIn('caption_name', $getCaptionName)->get()->toArray();
        $getArrayCaptions = [];
        foreach($captionsAll as $key => $value)
        {
            foreach($getCaptionName as $caption => $captionKey)
            {
                if(($value['caption_name'] == $captionKey))
                {
                    $getArrayCaptions[$captionKey] = $value; //change key array
                }
            }
        }
        return $getArrayCaptions;

    }
}

// - Miniyar Rakhimkulov 03.10.2019
