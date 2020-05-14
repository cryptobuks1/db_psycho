<?php
/**
 * Created by PhpStorm.
 * User: ubuntu
 * Date: 7/1/19
 * Time: 2:10 PM
 */

namespace App\Http\Classes;


class FileManager
{
    /**
     * @param int $bytes
     * @param int $precision
     * @return string
     */
    public static function convertBytesToString(int $bytes, $precision = 2): string
    {
        $units = array('B', 'KB', 'MB', 'GB', 'TB');

        $base = log($bytes, 1024);
        $suffixes = array('', 'KB', 'MB', 'G', 'T');

        return round(pow(1024, $base - floor($base)), $precision) .' '. $suffixes[floor($base)];
    }
}