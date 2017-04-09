@foreach($replies as $k=>$reply)
var clickNumber =0;
$('#like{!! $reply->id !!}').click(function(){
	if(clickNumber%2==0){
		$.ajax({
			type: 'GET',
			url: "{{ route('like.store') }}",
			data: { type : 'Reply',id:'{!!$reply->id!!}'},
			dataType: 'json',
			success: function(data){
				$('#like_count{!! $reply->id !!}').text(data);
			},
			error: function(xhr, type){
				alert('点赞失败，请重试!')
			}
		});
	}else{
		$.ajax({
			type: 'GET',
			url: "{{ route('like.store') }}",
			data: { type : 'Reply_destroy',id:'{!!$reply->id!!}'},
			dataType: 'json',
			success: function(data){
				$('#like_count{!! $reply->id !!}').text(data);
			},
			error: function(xhr, type){
				alert('取消点赞失败，请重试!')
			}
		});
	}
	clickNumber++;
});
@endforeach

var clickNumber_thread =0;
$('#thread{{{$thread->id}}}').click(function(){
	if(clickNumber_thread %2==0){
		$.ajax({
			type: 'GET',
			url: "{{ route('like.store') }}",
			data: { type : 'Thread',id:'{!!$thread->id!!}'},
			dataType: 'json',
			success: function(data){
				$('#thread_count{{{$thread->id}}}').text(data);
			},
			error: function(xhr, type){
				alert('点赞失败，请重试!')
			}
		});
	}else{
		$.ajax({
			type: 'GET',
			url: "{{ route('like.store') }}",
			data: { type : 'Thread_destroy',id:'{!!$thread->id!!}'},
			dataType: 'json',
			success: function(data){
				$('#thread_count{{{$thread->id}}}').text(data);
			},
			error: function(xhr, type){
				alert('取消点赞失败，请重试!')
			}
		});
	}
	clickNumber_thread ++;
});