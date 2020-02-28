@extends('admin::layouts.master')
@section('content')
    @component('components.tabs')
        @slot('title')
            [{{$role['title']}}] 权限设置
        @endslot

        @slot('nav')
            <li class="nav-item">
                <a class="nav-link" href="/admin/role">角色列表</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">权限设置</a>
            </li>
        @endslot
        @slot('body')
            <form action="/admin/role/permission/{{$role->id}}" method="post">
                @csrf
                @foreach($modules as $module)
                    <div class="card-body">
                        @foreach($module['rules'] as $rules)
                            <div class="card card-flat">
                                <div class="card-header">{{$rules['group']}}</div>
                                <div class="col-12 col-sm-8 col-lg-6 form-check mt-2">
                                    @foreach($rules['permissions'] as $permission)
                                        <label class="custom-control custom-checkbox custom-control-inline">
                                            <input type="checkbox"
                                                   {{$role->hasPermissionTo($permission['name'])?"checked=''":''}}
                                                   name="name[]" value="{{$permission['name']}}" class="custom-control-input">
                                            <span class="custom-control-label">{{$permission['title']}}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
                <button type="submit" class="btn btn-primary">保存</button>
            </form>
        @endslot
    @endcomponent
@endsection
