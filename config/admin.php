<?php

return [

    /*
    |--------------------------------------------------------------------------
    | 后台开发模式
    |--------------------------------------------------------------------------
    |
    | 处于开发阶段的时候方便后台设置定义权限，开发完成请关闭这个选项
    |
    */

    'develop' => env('ADMIN_DEVELOP', false),

    /*
    |--------------------------------------------------------------------------
    | 后台路由前缀
    |--------------------------------------------------------------------------
    |
    | 方便以后修改后台地址，在使用url时应该使用route通过路由名称生成
    |
    */

    'routePrefix' => env('ADMIN_ROUTE_PREFIX', 'admin'),

    /*
    |--------------------------------------------------------------------------
    | 无需登录，无需鉴权
    |--------------------------------------------------------------------------
    |
    | 在后台中间件中，需要排除 无需登录，无需鉴权 的路由名称
    |
    */

    'noNeedLogin' => ['admin.login', 'admin.logout'],

    /*
    |--------------------------------------------------------------------------
    | 无需登录，需要鉴权
    |--------------------------------------------------------------------------
    |
    | 在后台中间件中，需要排除 无需登录，需要鉴权 的路由名称
    |
    */

    'noNeedRight' => [],

];