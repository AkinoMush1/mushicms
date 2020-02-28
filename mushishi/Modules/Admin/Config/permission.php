<?php
    return [
//        [
//            'group' => '系统管理',
//            'permissions' => [
//                ['title' => '网站配置', 'name' => 'Admin::config-site', 'guard' => 'admin'],
//                ['title' => '微信配置', 'name' => 'Admin::config-wechat', 'guard' => 'admin'],
//                ['title' => '邮件配置', 'name' => 'Admin::config-email', 'guard' => 'admin'],
//                ['title' => '权限管理', 'name' => 'Modules/Admin/Http/Controllers/RoleController@', 'guard' => 'admin'],
//            ]
//        ]
        [
            'group'       => '会员管理',
            'permissions' => [
                ['title' => '会员管理', 'name' => 'Modules\Admin\Http\Controllers\RoleController@index', 'guard' => 'admin'],
                ['title' => '添加会员', 'name' => 'Modules\Admin\Http\Controllers\RoleController@create', 'guard' => 'admin'],
                ['title' => '编辑会员', 'name' => 'Modules\Admin\Http\Controllers\RoleController@edit', 'guard' => 'admin'],
                ['title' => '删除会员', 'name' => 'Modules\Admin\Http\Controllers\RoleController@destory', 'guard' => 'admin'],
                ['title' => '查看会员', 'name' => 'Modules\Admin\Http\Controllers\RoleController@show', 'guard' => 'admin'],
            ],

        ]
    ];