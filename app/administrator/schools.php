<?php

return [
    'title'   => trans('administrator::dashboard.area.schools'),
    'single'  => trans('administrator::dashboard.area.schools'),
    'model'=>'Hifone\Models\School',
    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'name' => [
            'title'    => trans('administrator::dashboard.schools.name'),
            'sortable' => false,
        ],
        'area' => array(
            'title'    => trans('administrator::dashboard.area.name'),
            'sortable' => false,
            'output'   => function ($value, $model) {
                if($model->area)
                {
                    return admin_link(
                        $model->area->title,
                        'area',
                        $model->area_id
                    );
                }else{
                    return '未知';
                }

            },
        ),
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
            'title' => trans('administrator::dashboard.schools.name'),
        ],
        'area' => array(
            'type'       => 'relationship',
            'title'      => trans('administrator::dashboard.area.title'),
            'name_field' => 'title',
        ),
    ],
    'filters' => [
        'id' => [
            'title' => 'ID',
        ],
        'name' => [
            'title' => trans('administrator::dashboard.schools.name'),
        ],
        'area' => array(
            'type'       => 'relationship',
            'title'      => trans('administrator::dashboard.area.name'),
            'name_field' => 'title',
        ),
    ],
    'actions' => [],
];
