@extends('admin::layouts.master')

@section('content')
    <div class="card" id="app">
        <div class="card-header">微信配置</div>
        <div class="tab-container">
            <form action="/wx/wx_config" method="post">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="">token</label>
                        <input type="text" class="form-control" name="token" value="{{$wx_config['token']??old('token')}}">
                    </div>
                    <div class="form-group">
                        <label for="">encodingaeskey</label>
                        <input type="text" class="form-control" name="encodingaeskey" value="{{$wx_config['encodingaeskey']??old('encodingaeskey')}}">
                    </div>
                    <div class="form-group">
                        <label for="">appid</label>
                        <input type="text" class="form-control" name="appid" value="{{$wx_config['appid']??old('appid')}}">
                    </div>
                    <div class="form-group">
                        <label for="">appsecret</label>
                        <input type="text" class="form-control" name="appsecret" value="{{$wx_config['appsecret']??old('appsecret')}}">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">保存</button>
                </div>
            </form>
        </div>
    </div>
@endsection
