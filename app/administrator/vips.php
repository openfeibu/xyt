<?php

return [
    'title'   => 'vip套餐',
    'single'  => 'vip套餐',
    'model'=>'Hifone\Models\Vip',
    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'name' => [
            'title'    => 'VIP类型',
            'sortable' => false,
        ],
        'duration' => [
            'title'    => 'VIP时长（月）',
            'sortable' => false,
        ],
        'coin' => [
            'title'    => trans('hifone.coin'),
            'sortable' => false,
        ],
    ],
    'edit_fields' => [
		'name' => [
            'title'    => 'VIP类型',
        ],
        'duration' => [
            'title'    => 'VIP时长（月）',
        ],
        'coin' => [
            'title'    => trans('hifone.coin'),
        ],
    ],
    'filters' => [
        'id' => [
            'title' => 'ID',
        ],

    ],
    'actions' => [],
];