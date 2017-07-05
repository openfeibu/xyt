 @extends('layouts.common')

@section('title')
    {{ trans('hifone.threads.add') }}_@parent
@stop
<link rel="stylesheet" href="{{ elixir('dist/css/all.css') }}">
<script src="{{ elixir('dist/js/all.js') }}"></script>
@section('content')
	<div class="clear" style="height:50px"></div>
    <div class="thread_create">
		<div style="margin-top:-20px;margin-bottom:15px;font-size:18px">
			<a href="{{ route('thread.index') }}" style="color:#51B837">&lt;&lt;返回话题主页</a>
		</div>
        <div class="col-md-9 main-col" style="width:1000px;margin-left:-15px;">
            <div class="panel panel-default corner-radius">
                <div class="panel-heading">发起新话题</div>
                <div class="panel-body">
                    <div class="reply-box form box-block">
                        @if (isset($thread))
                            {!! Form::model($thread, ['route' => ['thread.update', $thread->id], 'id' => 'thread_edit_form', 'class' => 'create_form', 'method' => 'patch']) !!}
                        @else
                            {!! Form::open(['route' => 'thread.store','id' => 'thread_create_form', 'class' => 'create_form', 'method' => 'post']) !!}
                        @endif

                        <div class="form-group">
                            {!! Form::text('thread[title]', isset($thread) ? $thread->title : null, ['class' => 'form-control', 'id' => 'thread_title', 'placeholder' => trans('hifone.threads.title')]) !!}
                        </div>

                        <div class="form-group">
                            <select class="form-control selectpicker" name="thread[node_id]">
                                <option value=""
                                        disabled {!! $node ? null : 'selected'; !!}>{{ trans('hifone.threads.pick_node') }}</option>
                                @foreach ($sections as $section)
                                        @if(isset($section->nodes))
                                            @foreach ($section->nodes as $item)
                                                <option value="{{ $item->id }}" {!! (Input::old('node_id') == $item->id || (isset($node) && $node->id==$item->id)) ? 'selected' : ''; !!} >
                                                    - {{ $item->name }}</option>
                                            @endforeach
                                        @endif
                                @endforeach
                            </select>
                        </div>
                        <!-- editor start -->
                    <!-- end -->
                        <div class="form-group">
                            {!! Form::textarea('thread[body]', isset($thread) ? $thread->body_original : null, ['class' => 'post-editor form-control',
                                                              'rows' => 15,
                                                              'style' => "overflow:hidden",
                                                              'id' => 'body_field',
                                                              'placeholder' => "请填写话题内容"]) !!}
                        </div>


                        <div class="form-group">
                            <p style="position: relative;width: 250px;"><input type="checkbox" name="anonymous" value="1"/> 匿名（需要花费{{config('system_config.anonymous_integral')}}分积分）</p>
                        </div>
                        <div class="form-group status-post-submit">
                            {!! Form::submit(trans('forms.publish'), ['class' => 'btn btn-primary col-xs-2', 'style' => "background:#51B837;border:0px",'id' => 'thread-create-submit']) !!}
                        </div>

                        <div class="box preview markdown-body" id="preview-box" style="display:none;"></div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-3 side-bar">
            @if ( $node )
                <div class="panel panel-default corner-radius help-box">
                    <div class="panel-heading text-center">
                        <h3 class="panel-title">{{ trans('hifone.nodes.current') }} : {{{ $node->name }}}</h3>
                    </div>
                    <div class="panel-body">
                        {{ $node->description }}
                    </div>
                </div>
            @endif

        </div>
    </div>
@stop
