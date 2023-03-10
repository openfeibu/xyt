<?php

return [
    'title'   => trans('administrator::dashboard.roles.roles'),
    'single'  => trans('administrator::dashboard.roles.roles'),
    'model'   => 'Hifone\Models\Role',

    'permission'=> function()
    {
        // return Auth::user()->hasRole('developer');
        return true;
    },

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'display_name' => [
            'title' => trans('administrator::dashboard.roles.display_name'),
            'sortable' => false
        ],
        'name' => [
            'title' => trans('administrator::dashboard.roles.name')
        ],
        'min_experience' => [
            'title' => "最低资产值范围"
        ],
        'max_experience' => [
            'title' => "最高资产值范围"
        ],
        'special' => [
            'title' => "特殊分组",
            'type'     => 'enum',
            'options'  => [
            	'2' => '管理员',
                '1' => 'vip',
                '0'  => '普通成员',
            ],
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
        'display_name' => [
            'title' => trans('administrator::dashboard.roles.display_name'),
        ],
        'name' => [
            'title' => trans('administrator::dashboard.roles.name'),
        ],
        'perms' => array(
            'type' => 'relationship',
            'title' => '权限',
            'name_field' => 'display_name',
        ),
        'min_experience' => [
            'title' => "最低资产值范围"
        ],
        'max_experience' => [
            'title' => "最高资产值范围"
        ],
        'special' => [
            'title' => "特殊分组",
            'type'     => 'enum',
            'options'  => [
                '2' => '管理员',
                '1' => 'vip',
                '0'  => '普通成员',
            ],
        ],
    ],

    'filters' => [
        'id' => [
            'title' => 'ID',
        ],
        'display_name' => [
            'title' => trans('administrator::dashboard.roles.display_name')
        ],
        'name' => [
            'title' => trans('administrator::dashboard.roles.name'),
        ]
    ],

    'rules' => [
        'name' => 'required|max:15|unique:roles,name',
        'display_name' => 'required|unique:roles,display_name'
    ],

    'messages' => [
        'name.required' => '标识不能为空',
        'name.unique' => '标识已存在',
        'display_name.required' => '显示名称不能为空',
        'display_name.unique' => '显示名称已存在'
    ]
];