<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 6/24/19
 * Time: 9:38 AM
 */

namespace App\Http\Traits;


use App\Models\SystemParameter;

trait DefaultSystemParams
{
    public static function getDefaultDBAreaId()
    {
        // Returns the first sys_par_value where sys_par_code == DefaultDbAreaID
        return SystemParameter::where("sys_par_code", "DefaultDbAreaID")
            ->pluck("sys_par_value")[0];
    }
    public static function getDefaultCompanyId()
    {
        // Returns the first sys_par_value where sys_par_code == DefaultCompanyID
        return SystemParameter::where("sys_par_code", "DefaultCompanyID")
            ->pluck("sys_par_value")[0];
    }
    public static function getStorageTypeSystem()
    {
        // Returns the first sys_par_value where sys_par_code == StorageTypeSystem
        return SystemParameter::where("sys_par_code", "StorageTypeSystem")
            ->pluck("sys_par_value")[0];
    }
    public static function getParameter($parameter)
    {
        // Returns the first sys_par_value where sys_par_code == $parameter
        return SystemParameter::where("sys_par_code", $parameter)
            ->pluck("sys_par_value")[0];
    }
}