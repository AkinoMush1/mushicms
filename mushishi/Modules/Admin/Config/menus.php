<?php
    return [
        [
            "title" => "系统管理",
            "icon" => "fa fa-navicon",
            "permission" => ['Modules\Admin\Http\Controllers\RoleController@index'],
            "menus" => [
                ["title" => "角色管理", "permission" => "Modules\Admin\Http\Controllers\RoleController@index", "url" => '/admin/role'],
            ],
        ],
        [
            "title" => "模块管理",
            "icon" => "fa fa-navicon",
            "permission" => ['Modules\Admin\Http\Controllers\RoleController@index'],
            "menus" => [
                ["title" => "模块管理", "permission" => "Modules\Admin\Http\Controllers\RoleController@index", "url" => '/admin/module'],
            ],
        ],
    ];
