
    <div class="album_nav_select">
        <ul>
            <a href="{{ route('album.index') }}"><li>全部相册</li></a>
            <a href="{{ route('album.album',['user_id'=>Auth::id()])}}"><li>我的相册</li></a>
            <a href="{{ route('album.index',['type'=>'activity']) }}"><li>活动照片</li></a>
            <!--<a href=""><li>好友相册</li></a>
            <a href=""><li style="width: 130px;">我表态过的相册</li></a>-->
            <a href="{{route('album.upload_common')}}"><li style="background: orange;width: 120px;">+上传新图片</li></a>
        </ul>
    </div>
