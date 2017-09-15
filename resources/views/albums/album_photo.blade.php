@extends('layouts.common')

@section('content')
<link href="{{ asset('/build/dist/css/album.css') }}" type="text/css" rel="stylesheet" />
<div class="clear"></div>
    <div class="album">
        <form name="delPhotos" action="{{route('album.delPhotos')}}" method="post">
        <div class="album_nav">
            <div style="height: 20px;"></div>
            @include('albums.album_nav')
            <div ><input name="submit" type="submit" value="删除" class="del_btn"/></div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>

        <div class="clear"></div>
        <div class="album_centent">
	        @foreach($album_photos as $album_photo)
            <div class="album_centent_photo fleft">
                <dl>
                    <dd>
                        <a href="{{ route('album.show',$album_photo->id) }}" ><img src="{{ $album_photo->image }}" alt="" class="album_centent_photo_img" /></a>
                    </dd>

                    <dd>
                        <p style="text-align:center"><input type="checkbox" name="ids[]" value="{{$album_photo->id}}" ></p>
                    </dd>
                </dl>
            </div>
            @endforeach
        </div>
        </form>
    </div>

    {!! with(new \Hifone\Foundations\Pagination\CustomerPresenter($album_photos))->render(); !!}

@stop
