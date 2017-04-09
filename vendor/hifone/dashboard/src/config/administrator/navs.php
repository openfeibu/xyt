<?php
return[
	'title'   => trans('administrator::dashboard.nav.nav'),
	'single'  => trans('administrator::dashboard.nav.nav'),
	'model'   => 'Hifone\Models\Nav',
	
	'columns' => [
		'id' => [
            'title' => 'ID',
            
        ],
        'name' => [
        	'title' => trans('administrator::dashboard.nav.title'),
        	'sortable' => false,
        ],
        'url' => [
        	'title' => trans('administrator::dashboard.nav.url'),
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
        	'title' => trans('administrator::dashboard.nav.title'),
        ],
        'url' => [
        	'title' => trans('administrator::dashboard.nav.url'),
        ],
        
	],
	'filters' => [

        'title' => [
        	'title' => trans('administrator::dashboard.nav.title'),
        ],
    ],
];