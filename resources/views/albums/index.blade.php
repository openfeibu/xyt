 @extends('layouts.common')

@section('content')
<link href="{{ asset('/build/dist/css/album.css') }}" type="text/css" rel="stylesheet" />
<div class="clear"></div>
    <div class="album">
        <div class="album_nav">
            <div style="height: 20px;"></div>
            @include('albums.album_nav')
            <div class="clear"></div>
            <div style="height: 20px;"></div>
            <div class="album_nav_footer">
                <ul>
                    <a href="{{ route('album.index') }}"><li>全部</li></a>
                    <li><a href="{{ route('album.index',['type'=>$type,'order'=>'new']) }}">最新照片</a></li>
                    <li><a href="{{ route('album.index',['type'=>$type,'order'=>'hot']) }}">热门照片</a></li>

                </ul>
            </div>
        </div>
        <div class="clear"></div>
        <div class="album_centent">
	        @foreach($album_photos as $album_photo)
            <div class="album_centent_photo fleft">
                <dl>
                    <dd>
                        <a href="{{ route('album.show',$album_photo->id) }}" ><img src="{{$album_photo->image}}" alt="" class="album_centent_photo_img" /></a>
                        
                    </dd>
                    <dd class="album_centent_photo_dd2">
                        &nbsp;&nbsp;图片来自&nbsp;<span class="" ><a href="{{$album_photo->link}}" style="color: #7CD3F9" target="__blank">{{$album_photo->form}}</a></span>
                    </dd>
                </dl>
            </div>
            @endforeach
        </div>
    </div>

    {!! with(new \Hifone\Foundations\Pagination\CustomerPresenter($album_photos))->render(); !!}

@stop
