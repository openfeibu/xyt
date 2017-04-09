<?php

return [
    'title'   => trans('administrator::dashboard.activities.activity_categories'),
    'single'  => trans('administrator::dashboard.activities.activity_categories'),
    'model'=>'Hifone\Models\ActivityCategory',
    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'pid' => [
            'title' => 'PID',
        ],
        'title' => [
            'title'    => '活动分类名称',
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
    	'pid' => [
            'title' => 'pid',
        ],
		'title' => [
            'title'    => '活动分类名称',
        ],
        
    ],
    'filters' => [
        'id' => [
            'title' => 'ID',
        ],
		'pid' => [
            'title' => 'pid',
        ],
        'title' => [
            'title'    => '活动分类名称',
        ],
    ],
    'actions' => [],
];