@extends('admin::layouts.master')
@section('content')
    @component('components.tabs')
        @slot('title')
            栏目管理
        @endslot

        @slot('nav')
            <li class="nav-item">
                <a class="nav-link active" href="#">栏目列表</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/article/category/create">添加栏目</a>
            </li>
            @component('components.modal', ['id'=>'articleId', 'title'=>'添加栏目', 'url'=>'/article/role'])
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" placeholder="请输入中文角色" class="form-control" value="{{old('title')}}">
                </div>

                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" placeholder="请输入英文标识" class="form-control" value="{{old('name')}}">
                </div>
            @endcomponent
        @endslot
        @slot('body')
            <table class="table">
                <thead>
                <tr>
                    <th>编号</th>
                    <th>栏目名称</th>
                    <th>创建时间</th>
                    <th>修改时间</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($categorys as $category)
                        <tr>
                            <td >{{$category['id']}}</td>
                            <td >{!! $category['_name'] !!}</td>
                            <td >{{$category['created_at']}}</td>
                            <td >{{$category['updated_at']}}</td>
                            <td >
                                <div class="btn-group" role="group" aria-label="Basic example" style="float:right" >
                                <a href="/article/category/{{$category['id']}}/edit" class="btn btn-primary">编辑</a>
                                <form action="/article/category/{{$category['id']}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">删除</button>
                                </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endslot
    @endcomponent
@endsection
