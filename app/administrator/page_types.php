<?php

return [
    'title'   => trans('administrator::dashboard.pages.page_types.title'),
    'single'  => trans('administrator::dashboard.pages.page_types.title'),
    'model'   => 'Hifone\Models\Type',

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'pid' => [
            'title' => 'PID',
        ],
        'is_show' => [
            'title' => '是否显示',
            'type'     => 'enum',
            'output' => function ($value) {
                return $value == 1 ? '显示' : '隐藏';
            },
        ],
        'type' => [
            'title'    => trans('administrator::dashboard.pages.page_types.title'),
            'sortable' => false,
        ],
        'parentType' => [
            'title'    => trans('administrator::dashboard.pages.page_types.parent_title'),
            'sortable' => false,
            'output'   => function ($value, $model) {
                if($value){
	                return $value->type;
	            }
	            return '';
            },
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
    	'type' => [
            'title'    => trans('administrator::dashboard.pages.page_types.title'),
        ],
        'is_show' => [
            'title' => '是否显示',
            'type'     => 'enum',
            'options'  => [
                '1' => '显示',
                '0'  => '隐藏',
            ],
        ],
    	'parentType' => [
            'title'              => trans('administrator::dashboard.pages.page_types.parent_title'),
            'type'               => 'relationship',
            'name_field'         => 'type',
            'search_fields'      => array("CONCAT(id, ' ', name)"),
            'options_sort_field' => 'id',
        ],
    ],
    'filters' => [
        'id' => [
            'title' => 'ID',
        ],
    ],
];
