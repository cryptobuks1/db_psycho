<?php
/**
 * Created by PhpStorm.
 * User: albert
 * Date: 10/30/18
 * Time: 11:29 PM
 */

namespace App\Tasks;

use Illuminate\Support\Facades\DB;


class GetTranslatorsTask extends BaseTask
{
    public function getData()
    {
        return ['data' => 'value'];
    }

}