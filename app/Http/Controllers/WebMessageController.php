<?php
namespace Hifone\Http\Controllers;

use Auth;
use DB;
use Hifone\Models\User;
use Hifone\Models\Blog;
use Hifone\Models\Vote;
use Hifone\Models\Node;
use Hifone\Models\Thread;
use Hifone\Models\Announcement;

class WebMessageController extends Controller
{
    public function room()
    {


        $webMessage = model('WebMessage');
        if (!empty($_GET['uid'])) {
            $room = $webMessage->getMessageRoom((int) $_GET['uid']);
            $roomId = $room['list_id'];
        } else {
            $roomId = (int) $_GET['roomid'];
        }

        $list = $webMessage->getMessageList($roomId, null, 'lt', 6);
        $isMore = count($list) == 6;
        if ($isMor) {
            array_shift($list);
        }
        $this->assign('isMore', $isMore);
        $webMessage->clearMessage($roomId, 'unread');
        $data = $this->buildMsgList($list, $webMessage->getUserId(), true);
        if ($list) {
            $last = end($list);
            $lastMessageId = (int) $last['message_id'];
        } else {
            $lastMessageId = 0;
        }
        $room = $webMessage->room()->find($roomId);
        $members = $webMessage->getRoomMember($roomId);
        $this->assign('room', $room);
        $this->assign('members', $members);
        $this->assign('title', $this->getRoomTitle($room, $members));
        $this->assign('list', $data);
        $this->assign('lastMessageId', $lastMessageId);
        $this->assign('curentUid', $webMessage->getUserId());
        $this->assign('roomId', $roomId);
        $this->display();
    }
}
