<?php

return [
    'title'   => trans('administrator::dashboard.activities.activities'),
    'single'  => trans('administrator::dashboard.activities.activities'),
    'model'=>'Hifone\Models\Activity',
    'columns' => [
        'id' => [
            'title' => 'ID',
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
    'actions' => [],
];