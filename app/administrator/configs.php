<?php

return [

    'title'   => trans('administrator::dashboard.settings.settings'),
    'single'  => trans('administrator::dashboard.settings.settings'),
    'model'=>'Hifone\Models\Setting',
    'columns'=>[
        'id' => [
            'title' => 'ID',
        ],
        'name' => [
            'title' =>  trans('administrator::administrator.key_name'),
        ],
        'display_name' => [
        	'title' => trans('administrator::administrator.description'),
        	'sortable' => false,
        ],
        'value' => [
            'title' => 'Value',
        ],
        'operation' => [
            'title'  => trans('administrator::administrator.operation'),
            'output' => function ($value, $model) {
                return $value;
            },
            'sortable' => false,
        ],
    ],
    'edit_fields'=>[
        'name' => [
            'type'=>'text',
            'title' =>  trans('administrator::administrator.key_name'),
        ],
        'display_name' => [
        	'title' => trans('administrator::administrator.description'),
        	'sortable' => false,
        ],
        'value' => [
            'type' => 'textarea',
            'title' =>  trans('administrator::administrator.value'),
        ],
        
    ],
    'filters' => [
        'id' => [
            'title' => 'ID',
        ],
        'name' => [
            'title' =>  trans('administrator::administrator.key_name'),
        ],
        'value' => [
            'title' =>  trans('administrator::administrator.value'),
        ],
    ],
];