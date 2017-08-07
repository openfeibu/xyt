<?php

return [
    'title'   => trans('administrator::dashboard.users.users'),
    'single'  => trans('administrator::dashboard.users.users'),
    'model'=>'Hifone\Models\User',
    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'avatar_url' => [
            'title'  => trans('administrator::dashboard.users.avatar'),
            'output' => function ($value) {
                return empty($value) ? 'N/A' : <<<EOD
    <img src="$value" width="80">
EOD;
            },
            'sortable' => false,
        ],
        'username' => [
            'title'    => trans('administrator::dashboard.users.username'),
            'sortable' => false,
        ],
        'nickname' => [
            'title'    => trans('administrator::dashboard.users.nickname'),
            'sortable' => false,
        ],
        'mobile' => [
            'title' => '手机号码',
        ],
        'last_ip' => [
            'title' => 'ip',
            'sortable' => false,
        ],
        'email' => [
            'title' => trans('administrator::dashboard.users.email'),
        ],
        'is_banned' => [
            'title' => trans('administrator::dashboard.users.is_banned'),
            'type'     => 'enum',
            'output' => function ($value) {
                return $value == 1 ? '是' : '否';
            },
        ],
        'activity_banned' => [
            'title' => '活动黑名单',
            'type'     => 'enum',
            'output' => function ($value) {
                return $value == 1 ? '是' : '否';
            },
        ],
        'operation' => [
            'title'  => trans('administrator::administrator.operation'),
            'output' => function ($value, $model) {
                return $value;
            },
            'sortable' => false,
        ],
    ],
    'edit_fields' => [
        'username' => [
            'title' => trans('administrator::dashboard.users.username'),
        ],
        'email' => [
            'title' => trans('administrator::dashboard.users.email'),
        ],
        'mobile' => [
            'title' => '手机号码',
        ],
        'is_banned' => [
            'title'    => trans('administrator::dashboard.users.is_banned'),
            'type'     => 'enum',
            'options'  => [
                '1' => '是',
                '0'  => '否',
            ],
        ],
        'activity_banned' => [
            'title'    => '活动黑名单',
            'type'     => 'enum',
            'options'  => [
                '1' => '是',
                '0'  => '否',
            ],
        ],
        'avatar_url' => [
            'title' => trans('administrator::dashboard.users.avatar')
        ],
        /*
        'location' => [
            'title' => '所处城市'
        ],
        'company' => [
            'title' => '所处公司'
        ],
        'website' => [
            'title' => '个人网站'
        ],
        'signature' => [
            'title' => '个性签名'
        ],*/
        'nickname' => [
            'title' => trans('administrator::dashboard.users.nickname')
        ],
        'roles' => array(
            'type'       => 'relationship',
            'title'      => trans('administrator::dashboard.roles.roles'),
            'name_field' => 'display_name',
        ),
    ],
    'filters' => [
        'id' => [
            'title' => 'ID',
        ],
        'username' => [
            'title' => trans('administrator::dashboard.users.username'),
        ],
        'nickname' => [
            'title' => trans('administrator::dashboard.users.nickname')
        ],
        'email' => [
            'title' => trans('administrator::dashboard.users.email'),
        ],
        'mobile' => [
            'title' => '手机号码',
        ],
        'roles' => [
            'type'       => 'relationship',
            'title'      => trans('administrator::dashboard.roles.roles'),
            'name_field' => 'display_name',
        ],
        'is_banned' => [
            'title'    => trans('administrator::dashboard.users.is_banned'),
            'type'     => 'enum',
            'options'  => [
                '1' => '是',
                '0'  => '否',
            ],
        ],
        'activity_banned' => [
            'title'    => '是否活动黑名单',
            'type'     => 'enum',
            'options'  => [
                '1' => '是',
                '0'  => '否',
            ],
        ],
    ],
    'actions' => [],
];
