<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Article\Entities\Category;
use Modules\Article\Entities\Content;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function lists(Category $category)
    {
        $data = Content::where('category_id', $category['id'])->paginate(10);
        return view('lists', compact('data', 'category'));
    }


    public function content(Content $content)
    {
        dd(123456);
        return view('content', compact('content'));
    }
}
