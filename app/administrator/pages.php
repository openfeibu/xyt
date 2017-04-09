<?php

return [
    'title'   => trans('administrator::dashboard.pages.pages'),
    'single'  => trans('administrator::dashboard.pages.pages'),
    'model'   => 'Hifone\Models\Page',

    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'type' => [
            'title'    => trans('administrator::dashboard.pages.page_types.title'),
            'sortable' => false,
            'output'   => function ($value, $model) {
               	if($value){
	                return $value->type;
	            }
	            return '';
            },
        ],
        'title' => [
            'title'    => trans('administrator::dashboard.pages.title'),
            'sortable' => false,
        ],
        'slug' => [
            'title'    => trans('administrator::dashboard.pages.slug'),
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
    	'type' => [
            'title'              => trans('administrator::dashboard.pages.page_types.title'),
            'type'               => 'relationship',
            'name_field'         => 'type',
            'search_fields'      => array("CONCAT(id, ' ', name)"),
            'options_sort_field' => 'id',
        ],

        'title' => [
            'title' => trans('administrator::dashboard.pages.title'),
        ],
        'slug' => [
            'title' => trans('administrator::dashboard.pages.slug'),
        ],
        'body_original' => [
            'title' => "简介",
            'hint'     => 'support Markdown',
            'type'     => 'textarea',
        ],
        'body' => [
            'title' => trans('administrator::dashboard.pages.body'),
            'hint'     => 'support Markdown',
            'type'     => 'wysiwyg',
        ],

    ],
    'filters' => [
        'id' => [
            'title' => 'ID',
        ],
        'type' => [
            'title'    => trans('administrator::dashboard.pages.page_types.title'),
            'type'               => 'relationship',
            'name_field'         => 'type',
            'search_fields'      => array("CONCAT(id, ' ', name)"),
            'options_sort_field' => 'id',
        ],
        'title' => [
            'title' => trans('administrator::dashboard.pages.title'),
        ],
        'slug' => [
            'title' => trans('administrator::dashboard.pages.slug'),
        ],

    ],
    'rules'   => [
        'title' => 'required|min:1|unique:pages'
    ],
    'messages' => [
        'title.unique'   => '页面标题在数据库里有重复，请选用其他名称。',
        'title.required' => '请确保标题至少一个字符以上',
    ],
];
