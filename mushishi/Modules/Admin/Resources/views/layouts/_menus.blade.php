<div class="left-sidebar-scroll">
    <div class="left-sidebar-content">
        <ul class="sidebar-elements">
            @foreach(\HDModule::getMenus() as $moduleName => $groups)
                <li class="divider">{{$moduleName}}</li>
                @foreach($groups as $group)
                @if(\HDModule::hadPermission($group['permission'], 'admin'))
                <li class="parent">
                    <a href="#"><i class="{{$group['icon']}}"></i><span>{{$group['title']}}</span></a>
                    <ul class="sub-menu">
                        @foreach($group['menus'] as $menu)
                        @if(\HDModule::hadPermission($menu['permission'], 'admin'))
                        <li>
                            <a href="{{$menu['url']}}">{{$menu['title']}}</a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </li>
                @endif
                @endforeach
            @endforeach
        </ul>
    </div>
</div>