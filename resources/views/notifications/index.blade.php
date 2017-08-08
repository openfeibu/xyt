@extends('layouts.common')

@section('content')
    <div class="TA">
        <div class="b_ja">
             {!! $breadcrumb or '' !!}
        </div>
        <div class="clear"></div>
        <div class="content">
            <div class="tab1s" id="b_hb">
                <div class="b_hf">
                    <ul>
                        <li class="select" style="color: #146500;">全部通知</li>
                    </ul>
                </div>
                <div class="b_he">
                    <div class="notifications panel">
					    @if (count($notifications))
						<div class="panel-body remove-padding-horizontal notification-index content-body">

							<ul class="list-group row">
								@foreach ($notifications as $day => $item)
									<div class="notification-group">
									<div class="group-title"><i class="fa fa-clock-o"></i> {{ $day }}</div>
									@foreach($item as $notification)
										@include('notifications.partials.'.$notification->template)
									@endforeach
									</div>
								@endforeach
							</ul>
						</div>
						<div class="panel-footer text-right remove-padding-horizontal pager-footer">
							<!-- Pager -->
						</div>
					    @else
						<div class="panel-body">
							<div class="empty-block">{!! trans('hifone.notifications.noitem') !!}</div>
						</div>
					    @endif

					</div>


                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>

@stop
