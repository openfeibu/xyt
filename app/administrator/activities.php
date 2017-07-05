<?php

return [
    'title'   => trans('administrator::dashboard.activities.activities'),
    'single'  => trans('administrator::dashboard.activities.activities'),
    'model'=>'Hifone\Models\Activity',
    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'name' => [
            'title'    => '活动名称',
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
            'title'    => '活动名称',
            'sortable' => false,
        ],
    ],
    'filters' => [
        'id' => [
            'title' => 'ID',
        ],

    ],
    'actions' => [


    ],
];
