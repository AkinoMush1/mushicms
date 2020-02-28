@extends('admin::layouts.master')
@section('content')
    @component('components.tabs')
        @slot('title')
            角色管理
        @endslot

        @slot('nav')
            <li class="nav-item">
                <a class="nav-link active" href="#">角色列表</a>
            </li>
            <li class="nav-item">
                <a data-toggle="modal" data-target="#modelId" class="nav-link" href="#">添加角色</a>
            </li>
            @component('components.modal', ['id'=>'modelId', 'title'=>'添加角色', 'url'=>'/admin/role'])
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
                    <th>角色名称</th>
                    <th>角色标识</th>
                    <th class="number">创建时间</th>
                    <th class="actions"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td >{{$role->id}}</td>
                        <td >{{$role->title}}</td>
                        <td >{{$role->name}}</td>
                        <td class="number">{{$role->created_at}}</td>
                        <td class="actions">
                            <div class="btn-group btn-space">
                                <button data-toggle="modal" data-target="#edit{{$role->id}}" type="button" class="btn btn-outline-primary">编辑</button>
                                <a  class="btn btn-outline-secondary" href="/admin/role/permission/{{$role->id}}">权限</a>
                                <a type="button" class="btn btn-outline-danger" href="{{route('roleDelete', $role->id)}}">删除</a>
                            </div>
                            @component('components.modal', ['id'=>"edit{$role->id}", 'title'=>'编辑角色', 'method'=>'PUT', 'url'=>"/admin/role/{$role->id}"])
                                <div class="form-group">
                                    <label>Title</label>
                                    <input type="text" name="title" placeholder="请输入中文角色" class="form-control" value="{{$role->title}}">
                                </div>

                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" placeholder="请输入英文标识" class="form-control" value="{{$role->name}}">
                                </div>
                            @endcomponent
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endslot
    @endcomponent
@endsection
