<?php


namespace App\Config;


class Routes
{

    public static function routingTable()
    {
        return [
            'index' => ['aquarium@index', '', '?', 'Aquarium'],
            'page' => ['aquarium@index', 'param', '?', 'Aquarium'],
//            'aquarium' => ['aquarium@index', '', '?', 'Aquarium'],
            '' => ['aquarium@index', '', '?', 'Aquarium'],
            'diary' => ['aquarium@diary', '', '?', ''],
            'view' => ['aquarium@view', 'param'],
            'edit' => ['aquarium@edit', 'param'],
            'update' => ['aquarium@update', 'param'],
            'create' => ['aquarium@create', '', '?', 'Make a entry'],
            'store' => ['aquarium@store', ''],
            'charts' => ['aquarium@charts', '', '?', 'Charts'],
            'delete' => ['aquarium@delete', 'param'],
//            'task' => ['aquarium@task', ''],
//            'admin' => ['admin@index', '', '?'],
//            'admin/index' => ['admin@index', '', '?'],
//            'admin/login' => ['admin@login', ''],
//            'admin/logout' => ['admin@logout', ''],
//            'admin/category' => ['category@index', '?'],
//            'admin/category/view' => ['category@view', 'param'],
//            'admin/category/index' => ['category@view', '?'],
//            'admin/category/page' => ['category@index', 'param', '?'],
//            'admin/category/create' => ['category@create', ''],
//            'admin/category/store' => ['category@store', ''],
            'user/index' => ['user@index', '', '?'],
            'user/register' => ['user@register', '', '', 'Sign Up'],
            'user/login' => ['user@login', '', '', 'Sign In'],
            'user/logout' => ['user@logout', '', '', 'Log Out'],
            'user/account' => ['user@account', 'param'],
            'verification' =>['user@verification', '', '?'],
//            '' => ['ads@index', '', '?', 'Home'],
//            'page' => ['ads@index', 'param', '?'],
//            'index' => ['ads@index', ''],
//            'view' => ['ads@view', 'param'],
//            'category/view' => ['category@view', 'param'],
//            'create' => ['ads@create', ''],
//            'store' => ['ads@store', ''],
            'webform' => ['webform@form', ''],
            'webform-callback' => ['webform@store', '']
        ];

    }
}