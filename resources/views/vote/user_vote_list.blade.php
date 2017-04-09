@foreach($user_votes as $key => $user_vote )
<p>
	<a href="{{ route('user.home',['username' =>$user_vote->user->id]) }}" target="_blank" >{{ $user_vote->user->username }}</a>在 {{ friendlyDate($user_vote->created_at) }} 投票给 
	@foreach($user_vote->option_values as $k => $option_value)
	"{{ $option_value }} "@if(count($user_vote->option_values) != $k+1)、@endif
	@endforeach
</p>
@endforeach

