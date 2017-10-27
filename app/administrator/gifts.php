<?php

return [
    'title'   => '礼物配置',
    'single'  => '礼物配置',
    'model'=>'Hifone\Models\Gift',
    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'gift_name' => [
            'title'    => '礼物名字',
            'sortable' => false,
        ],
        'gift_img' => [
            'title'    => '礼物图片',
            'sortable' => false,
        ],
        'gift_number' => [
            'title'    => '数量',
            'sortable' => false,
        ],
        'gift_experience' => [
            'title'    => '增加经验',
            'sortable' => false,
        ],
        'score' => [
            'title'    => '花费积分',
            'sortable' => false,
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
        'gift_name' => [
            'title'    => '礼物名字',
        ],
        'gift_img' => [
            'title'    => '礼物图片',
        ],
        'gift_number' => [
            'title'    => '数量',
        ],
        'gift_experience' => [
            'title'    => '增加经验',
        ],
        'score' => [
            'title'    => '花费积分',
        ],
    ],
    'filters' => [
        'id' => [
            'title' => 'ID',
        ],

    ],
    // 'actions' => [],
];
