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
            'title' =>  trans('administrator::administrator.description'),
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
        ],
        'display_name' => [
        	'title' => trans('administrator::administrator.description'),
        	'sortable' => false,
        ],
        'value' => [
            'type' => 'textarea',
        ],
        
    ],
    'filters' => [
        'id' => [
            'title' => 'ID',
        ],
        'name' => [
            'title' => 'Name',
        ],
        'value' => [
            'title' => 'Value',
        ],
    ],
];