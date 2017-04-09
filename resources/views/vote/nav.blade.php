<ul>
    <li @if($type == 'new') class="select" style="color: #146500;" @endif><a href="{{route('vote.index',['type' => 'new'])}}">最新投票</a></li>
    <li @if($type == 'hot') class="select" style="color: #146500;" @endif><a href="{{route('vote.index',['type' => 'hot'])}}">最热投票</a></li>
    <li @if($type == 'reward') class="select" style="color: #146500;" @endif><a href="{{route('vote.index',['type' => 'reward'])}}">悬赏投票</a></li>
    <li @if($type == 'mine') class="select" style="color: #146500;" @endif><a href="{{route('vote.index',['type' => 'mine'])}}">我的投票</a></li>
    <li id="sends_vote" class="btn_a" onclick="window.location.href='{{route('vote.create',['type' => 'mine'])}}'">+发起投票</li>
</ul>