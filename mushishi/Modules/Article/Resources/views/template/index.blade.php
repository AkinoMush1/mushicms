@extends('admin::layouts.master')
@section('content')
    @component('components.tabs')
        @slot('title')
            模板管理
        @endslot

        @slot('nav')
            <li class="nav-item">
                <a class="nav-link active" href="#">模板设置</a>
            </li>
        @endslot
        @slot('body')
            <div class="row">
                @foreach($templates as $template)
                <div class="card col-sm-3">
                    <div class="card-block">
                        <img src="{{$template['preview']}}" alt="" style="width: 100%;height: 180px">
                        @if(HDModule::config('article.config.template') == $template['name'])
                            <a type="button" class="btn btn-success btn-block" href="template/setDefault/{{$template['name']}}">默认模板</a>
                        @else
                            <a type="button" class="btn btn-secondary btn-block" href="template/setDefault/{{$template['name']}}">设为默认模板</a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        @endslot
    @endcomponent
@endsection
