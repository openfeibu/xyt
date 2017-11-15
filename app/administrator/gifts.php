<?php

return [
    'title'   => '礼物配置',
    'single'  => '礼物配置',
    'model'=>'Hifone\Models\Gift',
    'columns' => [
        'id' => [
            'title' => 'ID',
        ],
        'type' => [
            'title'    => '礼物分类',
            'sortable' => false,
            'output'   => function ($value, $model) {
               	if($value){
	                return $value->name;
	            }
	            return '';
            },
        ],
        'gift_name' => [
            'title'    => '礼物名字',
            'sortable' => false,
        ],
        'gift_img' => [
            'title'    => '礼物图片',
            'sortable' => false,
            'type'      => 'image',
        ],
        'gift_number' => [
            'title'    => '数量',
            'sortable' => false,
        ],
        'gift_experience' => [
            'title'    => '增加经验',
            'sortable' => false,
        ],
        'score' => [
            'title'    => '花费积分',
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
            'title'              => '礼物分类',
            'type'               => 'relationship',
            'name_field'         => 'name',
            'search_fields'      => array("CONCAT(id, ' ', name)"),
            'options_sort_field' => 'id',
        ],
        'gift_name' => [
            'title'    => '礼物名字',
        ],
        'gift_img' => [
            'title'    => '礼物图片',
            'type'      => 'image',
            'location' => 'uploads/gift_img/'
        ],
        'gift_number' => [
            'title'    => '数量',
        ],
        'gift_experience' => [
            'title'    => '增加经验',
        ],
        'score' => [
            'title'    => '花费积分',
        ],
    ],
    'filters' => [
        'id' => [
            'title' => 'ID',
        ],

    ],

    // 'actions' => [],
];
