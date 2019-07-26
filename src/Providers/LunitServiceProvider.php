<?php
/**
 * Created by PhpStorm.
 * User: hd-003
 * Date: 2019/7/26
 * Time: 15:07
 */

namespace Lubobo\LunitLaravel\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class LunitServiceProvider extends ServiceProvider
{
    public function register()
    {
//         echo '这是lunit 服务提供者';
        // 注册组件路由
        $this->registerRoutes();
        // 指定的组件的名称，自定义的资源目录地址
        $this->loadViewsFrom(
            __DIR__.'/../../resources/views', 'lunit'
        );
    }

    public function boot()
    {
        //
    }
    // 参考别人的写法
    // 对于源码熟悉更好一些
    private function registerRoutes()
    {
        Route::group($this->routeConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__.'/../Http/routes.php');
        });
    }

    private function routeConfiguration()
    {
        return [
            // 定义访问路由的域名
            // 'domain' => config('telescope.domain', null),
            // 是定义路由的命名空间
            'namespace' => 'Lubobo\LunitLaravel\Http\Controllers',
            // 这是前缀
            'prefix' => 'lunit',
            // 这是中间件
            'middleware' => 'web',
        ];
    }
}