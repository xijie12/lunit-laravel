<?php
namespace Lubobo\LunitLaravel\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

/**
 * 这是一个控制器 需要继承一个laravel所提供的控制器
 */
class LunitController extends Controller
{
    public function index()
    {
        $r = view();
        return view('lunit::index');// ?? view(??)
    }

    // 如下内容，想要丰富就自个完善吧
    // 用来接收测试的请求
    public function store(Request $request)
    {
        // 用反射去创建实例类，缓存记录....
        $namespace  = $request->input('namespace');
        $className  = $request->input('className');
        $action     = $request->input('action');
        $param      = $request->input('param');
        $class = ($className == "") ? $namespace : $namespace.'\\'.$className;
        // 要提换的值  需要的结果
        $class = str_replace("/", "\\", $class);
        $object = new $class();// 创建实际的类
        $param = ($param == "") ? [] : explode('|', $param) ;// 参数的处理
        $data = call_user_func_array([$object, $action], $param);// 最终的执行
        return (is_array($data)) ? json_encode($data) : dd($data);
    }
}
