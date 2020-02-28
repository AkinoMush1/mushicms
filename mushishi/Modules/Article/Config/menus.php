<?php
return [
    [
        "title" => "栏目管理",
        "icon" => "fa fa-navicon",
        "permission" => ['Modules\Article\Http\Controllers\CategoryController@index'],
        "menus" => [
            ["title" => "栏目管理", "permission" => "Modules\Article\Http\Controllers\CategoryController@index", "url" => '/article/category'],
        ],

    ],

    [
        "title" => "文章管理",
        "icon" => "fa fa-navicon",
        "permission" => ['Modules\Article\Http\Controllers\ContentController@index'],
        "menus" => [
            ["title" => "文章管理", "permission" => "Modules\Article\Http\Controllers\ContentController@index", "url" => '/article/content'],
        ],

    ],

    [
        "title" => "模板管理",
        "icon" => "fa fa-navicon",
        "permission" => ['Modules\Article\Http\Controllers\ContentController@index'],
        "menus" => [
            ["title" => "模板管理", "permission" => "Modules\Article\Http\Controllers\ContentController@index", "url" => '/article/template'],
        ],

    ],
    [
        "title" => "幻灯片管理",
        "icon" => "fa fa-navicon",
        "permission" => ['Modules\Admin\Http\Controllers\RoleController@index'],
        "menus" => [
            ["title" => "幻灯片管理", "permission" => "Modules\Admin\Http\Controllers\SlideController@index", "url" => '/article/slide'],
        ],
    ]
];