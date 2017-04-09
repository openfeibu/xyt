<?php
	
return[
	'title'     => trans('administrator::dashboard.area.area'),
	'single'    => trans('administrator::dashboard.area.area'),
	'model'     => 'Hifone\Models\Area',
	'page_type' => 'category' ,
    /*'action_permissions' => [
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
    ],*/
    
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
	'edit_fields' => [
		'pid' => [
			'title' => 'PID',
			
        ],
		 'title' => [
        	'title' => trans('administrator::dashboard.area.title'),
        ],
        
	],
	'filters' => [
		'id' => [
            'title' => 'ID',
        ],
         'pid' => [
			'title' => 'PID',
			
        ],
        'title' => [
        	'title' => trans('administrator::dashboard.area.title'),
        ],
    ],
    'sort' => [
    	'field' => 'id',
    	'direction' => 'asc',
    ],
   	
];