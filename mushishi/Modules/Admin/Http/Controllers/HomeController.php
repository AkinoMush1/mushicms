<?php


namespace Modules\Admin\Http\Controllers;


use App;
use Illuminate\View\FileViewFinder;
use View;

class HomeController
{
    public function __construct()
    {
        // 获取配置文件中的默认模板名称
        $template = \HDModule::config('admin.config.template');
        dd($template);
        // 方法一（该方法框架默认的分页模版会找不到）
        $path = [public_path('templates/'.$template)];
        View::setFinder(new FileViewFinder(App::make('files'), $path));
    }

    public function index() {
        return view('index');
    }
}