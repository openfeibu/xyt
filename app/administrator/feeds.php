<?php

return [
    'title'   => trans('administrator::dashboard.feed.feed'),
    'single'  => trans('administrator::dashboard.feed.feed'),
    'model'=>'Hifone\Models\Feed',
    'is_category' => 'pid' ,
    'action_permissions' => [
        'create' => function ($model) {
            return false;
        },
        'update' => function ($model) {
            return false;
        },
        'delete' => function ($model) {
            return true;
        },
        'view' => function ($model) {
            return true;
        },
    ],
    'columns' => [
		'id' => [
            'title' => 'ID',
        ],
        'pid' => [
			'title' => 'PID',
			
        ],
        'title' => [
        	'title' => trans('administrator::dashboard.area.title'),
        ],
        'operation' => [
            'title'  => trans('administrator::administrator.operation'),
            'output' => function ($value, $model) {
                return $value;
            },
            'sortable' => false,
        ],
	],