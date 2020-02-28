@extends('admin::layouts.master')
@section('content')
    @component('components.tabs')
        @slot('title')
            栏目管理
        @endslot

        @slot('nav')
            <li class="nav-item">
                <a class="nav-link" href="/article/category">栏目列表</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">添加栏目</a>
            </li>
        @endslot
        @slot('body')
            <form action="/article/category" method="post">
                @csrf
                <div class="form-group">
                    <label>栏目名称</label>
                    <input type="text" name="name" placeholder="请输入中文角色" class="form-control" value="{{old('title')}}">
                </div>

                <div class="form-group">
                    <label>父级栏目</label>
                    <select class="form-control" name="pid" id="">
                        <option value='0'>父级栏目</option>
                        @foreach($categorys as $category)
                        <option value={{$category['id']}}>{!! $category['_name'] !!}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">保存提交</button>
                </div>

            </form>
        @endslot
    @endcomponent
@endsection
