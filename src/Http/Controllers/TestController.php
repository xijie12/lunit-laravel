<?php
/**
 * Created by PhpStorm.
 * User: hd-003
 * Date: 2019/7/26
 * Time: 14:58
 */

namespace Lubobo\LunitLaravel\Http\Controllers;

use Illuminate\Routing\Controller;

class TestController extends Controller
{
    public function index()
    {
        return "test";
    }
}