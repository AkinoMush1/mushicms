<?php


namespace Modules\Article\Http\Controllers;


use App;
use Illuminate\View\FileViewFinder;
use Modules\Article\Entities\Category;
use Modules\Article\Entities\Content;
use View;

class HomeController
{
    public function __construct()
    {
        // 获取配置文件中的默认模板名称
        $template = \HDModule::config('article.config.template');
//        // 方法一（该方法框架默认的分页模版会找不到）
//        $path = [public_path('templates/'.$template)];
//        View::setFinder(new FileViewFinder(App::make('files'), $path));
        $finder = app('view')->getFinder();
        $finder->prependLocation(public_path('templates/' . $template));

    }
    public function index()
    {
        return view('index');
    }

    public function lists(Category $category)
    {
        $data = Content::where('category_id', $category['id'])->paginate(10);
        return view('lists', compact('data', 'category'));
    }

    public function content(Content $content)
    {
        return view('content', compact('content'));
    }
}