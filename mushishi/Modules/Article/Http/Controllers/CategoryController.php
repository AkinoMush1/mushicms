<?php

namespace Modules\Article\Http\Controllers;

use foo\bar;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Article\Entities\Category;
use Modules\Article\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Category $category)
    {
        $categorys = $category->getAll();
        return view('Article::category.index', compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create(Category $category)
    {
        $categorys = $category->getAll();
        return view('Article::category.create', compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(CategoryRequest $categoryRequest, Category $category)
    {
        $category->create(['name' => $categoryRequest->name, 'pid' => $categoryRequest->pid]);
        session()->flash('success', '添加栏目成功');
        return back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('Article::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit(Category $category)
    {
        $categories = $category->getAll($category);
        return view('Article::category.edit', compact('categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(CategoryRequest $categoryRequest, Category $category)
    {
        $category->update($categoryRequest->all());
        session()->flash('success', '栏目修改成功');
        return back();

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy(Category $category)
    {
        if ($category->hasChild($category)) {
            session()->flash('danger', '请先删除子栏目');
            return back();
        }

        $category->delete();
        session()->flash('success', '栏目删除成功');
        return back();
    }
}
