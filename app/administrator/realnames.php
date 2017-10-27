<?php

return [
    'title'   => '实名认证',
    'single'  => '实名认证',
    'model'=>'Hifone\Models\UserRealname',
    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'realname' => [
            'title'    => '姓名',
            'sortable' => false,
        ],
        'usercard' => [
            'title'  => '图片',
            'output' => function ($value) {
                return empty($value) ? 'N/A' : <<<EOD
    <img src="$value" width="200">
EOD;
            },
            'sortable' => false,
        ],
        'status' => [
            'title'    => '审核状态',
            'type'     => 'enum',
            'output' => function ($value) {
                $arr = [
                    '0'  => '未审核',
                    '1' => '审核通过',
                    '2'  => '审核未审核',
                ];
                return $arr[$value];
            },
            'sortable' => true,
        ],
        'created_at' => [
            'title'    => '创建时间',
            'sortable' => true,
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
        'status' => [
            'title'    => '审核状态',
            'type'     => 'enum',
            'options'  => [
                '0'  => '未审核',
                '1' => '审核通过',
                '2'  => '审核未审核',
            ],
        ],

    ],
    'filters' => [
        'id' => [
            'title' => 'ID',
        ],

    ],
    // 'actions' => [],
];
