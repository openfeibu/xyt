<?php

return [
    'title'   => trans('administrator::dashboard.tasks.tasks'),
    'single'  => trans('administrator::dashboard.tasks.tasks'),
    'model'=>'Hifone\Models\Task',
    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'name' => [
            'title' => '标志',
            'sortable' => false,
        ],
        'slug' => [
            'title'    => trans('administrator::dashboard.credit_rules.slug'),
            'sortable' => false,
        ],
        'desc' => [
            'title' => '描述',
            'sortable' => false,
        ],
        'image' => [
            'title' => '图片',
            'sortable' => false,
        ],
        'user_count' => [
            'title' => '参与人数',
        ],
        'frequency' => [
            'title'    => trans('administrator::dashboard.credits.frequency_tag'),
            'sortable' => false,
        ],
        'score' => [
            'title'    => '积分',
        ],
        'url' => [
            'title'    => '链接',
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
    	'name' => [
            'title' => '标志',
        ],
        'slug' => [
            'title'    => trans('administrator::dashboard.credit_rules.slug'),
        ],
        'desc' => [
            'title' => '描述',
            'hint'     => 'support Markdown',
            'type'     => 'wysiwyg',
        ],
        'image' => [
            'title' => '图片',
        ],
        'frequency' => [
            'title'    => trans('administrator::dashboard.credits.frequency_tag'),
            'description' => '-1.一次性；0.无限次；1.每天一次；'
        ],
        'score' => [
            'title'    => '积分',
        ],
       	'url' => [
            'title'    => '链接',
        ],
    ],
    'filters' => [
        'id' => [
            'title' => 'ID',
        ],

    ],
    'actions' => [],
];
