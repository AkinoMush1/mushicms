@extends('admin::layouts.master')
@section('content')
    @component('components.tabs')
        @slot('title')
            编辑栏目
        @endslot

        @slot('nav')
            <li class="nav-item">
                <a class="nav-link" href="/article/category">栏目列表</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">编辑栏目</a>
            </li>
        @endslot
        @slot('body')
            <form action="/article/category/{{$category['id']}}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>栏目名称</label>
                    <input type="text" name="name" placeholder="请输入中文角色" class="form-control" value="{{$category['name']}}">
                </div>

                <div class="form-group">
                    <label>父级栏目</label>
                    <select class="form-control" name="pid" id="">
                        <option value='0'>顶级栏目</option>
                        @foreach($categories as $category)
                        <option value="{{$category['id']}}"
                                {{$category['_selected'] ? 'selected' : ''}}
                                {{$category['_disabled'] ? 'disabled' : ''}}
                        >{!! $category['_name'] !!}</option>
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
