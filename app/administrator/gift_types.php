<?php

return [
    'title'   => '礼物分类',
    'single'  => '礼物分类',
    'model'   => 'Hifone\Models\GiftType',
    'action_permissions' => [
        // 'create' => function ($model) {
        //     return false;
        // },
        'update' => function ($model) {
            return false;
        },
        // 'delete' => function ($model) {
        //     return true;
        // },
        // 'view' => function ($model) {
        //     return true;
        // },
    ],
    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'name' => [
            'title' => '名称',
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
        'id' => [
            'title' => 'ID',
        ],
        'name' => [
            'title' => '名称',
        ],
    ],
    'filters' => [
        'id' => [
            'title' => 'ID',
        ],
    ],
];
