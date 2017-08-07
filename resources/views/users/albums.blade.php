@foreach($albums as $album)

    <div class="photo_list">
        <a href="{{ route('album.album_photos',['album_id'=>$album->id]) }}"><img src="{{$album->image}}" alt="" /></a>
		<p style="text-align:center;">{{$album->name}}</p>
    </div>
@endforeach
