<?php

return[
	'title'   => trans('administrator::dashboard.profile_setting.profile_setting'),
	'single'  => trans('administrator::dashboard.profile_setting.profile_setting'),
	'model'   => 'Hifone\Models\ProfileSetting',
	'columns' => [
		'id' => [
            'title' => 'ID',
        ],
        'field_key'=>[
        	'title' => trans('administrator::dashboard.profile_setting.field_key'),
        	'sortable' => false,
        ],
        'field_name'=>[
        	'title' => trans('administrator::dashboard.profile_setting.field_name'),
        	'sortable' => false,
        ],
        'field_type'=>[
        	'title' => trans('administrator::dashboard.profile_setting.field_type'),
        	'sortable' => false,
        ],
        'visiable'=>[
        	'title' => trans('administrator::dashboard.profile_setting.visiable'),
        ],
        'editable'=>[
        	'title' => trans('administrator::dashboard.profile_setting.editable'),
        ],
        'required'=>[
        	'title' => trans('administrator::dashboard.profile_setting.required'),
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
        'field_key'=>[
        	'title' => trans('administrator::dashboard.profile_setting.field_key'),
        	'sortable' => false,
        ],
        'field_name'=>[
        	'title' => trans('administrator::dashboard.profile_setting.field_name'),
        	'sortable' => false,
        ],
        'field_type'=>[
        	'title' => trans('administrator::dashboard.profile_setting.field_type'),
        	//'type'               => 'relationship',
           
        	'sortable' => false,
        ],
        'visiable'=>[
        	'title' => trans('administrator::dashboard.profile_setting.visiable'),
        	'type'     => 'enum',
            'options'  => [
                '1' => 'Yes',
                '0'  => 'No',
            ],
        ],
        'editable'=>[
        	'title' => trans('administrator::dashboard.profile_setting.editable'),
        	'type'     => 'enum',
            'options'  => [
                '1' => 'Yes',
                '0'  => 'No',
            ],
        ],
        'required'=>[
        	'title' => trans('administrator::dashboard.profile_setting.required'),
        	'type'     => 'enum',
            'options'  => [
                '1' => 'Yes',
                '0'  => 'No',
            ],
        ],
       	'form_type'=>[
        	'title' => trans('administrator::dashboard.profile_setting.form_type'),
        	'type'     => 'enum',
        	'options'  => [
                 	'input' =>  trans('administrator::dashboard.profile_setting.input_form'),          // 输入表单
		            'inputnums' =>  trans('administrator::dashboard.profile_setting.num_input'),                // 纯数字input输入
		            'textarea' =>  trans('administrator::dashboard.profile_setting.several_textfield'),            // 多行文本
		            'select' =>  trans('administrator::dashboard.profile_setting.dropdown_menu'),                // 下拉菜单
		            'radio' =>  trans('administrator::dashboard.profile_setting.radio_button'),                    // 单选框
		            'checkbox' =>  trans('administrator::dashboard.profile_setting.check_box'),                    // 复选框
		            'date' =>  trans('administrator::dashboard.profile_setting.time_select'),                    // 时间选择
		        ],
        ],
        'notice'=>[
        	'title' => trans('administrator::dashboard.profile_setting.notice'),
        ],
        'form_default_value'=>[
        	'title' => trans('administrator::dashboard.profile_setting.form_default_value.title'),
        	'description' => trans('administrator::dashboard.profile_setting.form_default_value.description'),
        	
        ],
        
       
    ],
    'filters' => [
		'id' => [
            'title' => 'ID',
        ],
        'field_key'=>[
        	'title' => trans('administrator::dashboard.profile_setting.field_key'),       
        ],
        'field_name'=>[
        	'title' => trans('administrator::dashboard.profile_setting.field_name'),      	
        ],
        'field_type'=>[
        	'title' => trans('administrator::dashboard.profile_setting.field_type'),
        ],

    ],
   
];

