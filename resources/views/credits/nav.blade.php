<div class="gexing_main_nav">
    <p>
        <a href="{{route('credit.index')}}"  class="{!! Route::currentRouteName() == 'credit.index' ? 'active' : '' !!}">我的积分</a>&nbsp;&nbsp;|&nbsp;&nbsp;
        <a href="{{route('credit.rule')}}"  class="{!! Route::currentRouteName() == 'credit.rule' ? 'active' : '' !!}">积分规则</a>&nbsp;&nbsp;|&nbsp;&nbsp;
        <a href="{{route('credit.role')}}"  class="{!! Route::currentRouteName() == 'credit.role' ? 'active' : '' !!}">用户组规则</a>
        <!-- &nbsp;&nbsp;|&nbsp;&nbsp;<a href="{{route('credit.permission')}}"  class="{!! Route::currentRouteName() == 'credit.permission' ? 'active' : '' !!}">用户组权限</a></p> -->
</div>
