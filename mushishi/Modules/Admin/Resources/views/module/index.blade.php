@extends('admin::layouts.master')
@section('content')
    <div class="card" id="app">
        <div class="card-header">模块管理</div>
        <div class="tab-container">
            <ul role="tablist" class="nav nav-tabs">
                <li class="nav-item"><a href="/admin/module" class="nav-link active">模块列表</a></li>
                <li class="nav-item"><a href="/admin/module_update_cache" class="nav-link">更新缓存</a></li>
            </ul>
            <div class="card card-contrast card-border-color-success">
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th style="width: 10%;">编号</th>
                            <th>模块名称</th>
                            <th>模块标识</th>
                            <th>前台可访问</th>
                            <th>创建时间</th>
                            <th>修改时间</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datas as $data)
                        <tr>
                            <td style="width: 10%;">{{$data['id']}}</td>
                            <td>{{$data['name']}}</td>
                            <td>{{$data['title']}}</td>
                            <td>{{$data['front_access']?'是':'否'}}</td>
                            <td>{{$data['created_at']}}</td>
                            <td>{{$data['updated_at']}}</td>
                            <td class="text-right">
                                @if($data['front_access'])
                                <a class="btn btn-primary" href="/admin/module_set_default/{{$data['id']}}" type="button"
                                >设为默认</a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function del(id, el) {
            if (confirm('确定删除吗？')) {
                $(el).next('form').trigger('submit')
            }
        }
    </script>
@endsection
