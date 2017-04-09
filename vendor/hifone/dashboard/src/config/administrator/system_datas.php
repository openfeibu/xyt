<?php
return[
	'title'  	 => trans('administrator::dashboard.system_datas.system_datas'),
	'single' 	 => trans('administrator::dashboard.system_datas.system_datas'),
	'model'   	 => 'Hifone\Models\SystemData',
	'page_type'  => 'config',
	'columns' => [
		'id' => [
            'title' => 'ID',
            
        ],
        'key' => [
        	'title' => trans('administrator::administrator.key_name'),
        	'sortable' => false,
        ],
        'display_name' => [
        	'title' => trans('administrator::administrator.description'),
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
		'id' => [
            'title' => 'ID',
            
        ],
   //     'value' => [
			//'title' => trans('administrator::dashboard.system_datas.value'),	
			//'type'  => 'textarea',
   //     ],
    ],
    'filters' => [
		'id' => [
            'title' => 'ID',
            
        ],
        'key' => [
        	'title' => trans('administrator::administrator.key_name'),
        ],
    ],
];
    