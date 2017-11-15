<?php
namespace Hifone\Http\Controllers;

use Auth;
use DB;
use Hifone\Models\User;
use Hifone\Models\Blog;
use Hifone\Models\Vote;
use Hifone\Models\Node;
use Hifone\Models\Thread;
use Hifone\Models\Advertisement;
use Hifone\Models\Announcement;
use Hifone\Models\AlbumPhoto;

class IndexController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->title = '首页';
    }
    public function index()
    {
	    $new_boys = app('repository')->model(User::class)->where('sex',1)->orderBy('id','desc')->take(5)->get();
	    $new_girls = app('repository')->model(User::class)->where('sex',2)->orderBy('id','desc')->take(5)->get();
	    $threads =  app('repository')->model(Thread::class)->orderBy('is_excellent','desc')->orderBy('view_count','desc')->orderBy('id','desc')->take(10)->get();
	    $new_blogs = app('blogRepository')->newBlogs(20);
	    $hot_blogs = app('blogRepository')->hotBlogs(20);
	   	$new_votes = app('voteRepository')->newVote(20);
        $hot_votes = app('voteRepository')->hotVote(20);
        $new_activities = app('activityRepository')->newActivities(10);
	   	$recommend_users = app('repository')->model(User::class)->where('is_recommend',1)->orderBy('id','desc')->take(8)->get();
	    foreach( $threads as $key => $thread )
	    {
		    $node = app('repository')->model(Node::class)->where('id',$thread->node_id)->first(['id','name']);
	    	$thread->node_name = $node->name;
	    }
	    $new_boys = app('userRepository')->handleUsers($new_boys);
	    $new_girls = app('userRepository')->handleUsers($new_girls);
	    $recommend_users = app('userRepository')->handleUsers($recommend_users);

		$page_paramter =  $var = [
        	'p' => 0,
        	'loadId' => 0,
        	'load_count' => 0,
        	'app' => 'space',
        	'feed_type' => 'post',
        	'feed_key' => '',
        	'fgid' =>   0,
        	'topic_id' =>   0,
        	'gid' =>  0,
        ];
        $page_paramter['type'] = 'space';
        $var['type'] = 'indexSpace';
        $var['page_paramter'] = $page_paramter;
        $var['limitnums'] = 20;
        $spaces = app('spaceRepository')->getData($var, 'indexFeedList');
        $summaries = app('activityRepository')->summaries();
        $announcements = app('pageRepository')->announcements();
        $basic_data = config('form_config.basic_data');
		$standard_data = config('form_config.standard_data');
        $page_notices =  app('pageRepository')->getPages(13);
        $album_photos = AlbumPhoto::where('activity_id','>',0)->take(9)->get();
        $ads = app(Advertisement::class)->where('adspace_id',1)->orderBy('sort','asc')->orderBy('id','asc')->get();
		return $this->view('index.index')
					->with('new_boys',$new_boys)
					->with('new_girls',$new_girls)
					->with('new_blogs',$new_blogs)
					->with('hot_blogs',$hot_blogs)
					->with('new_votes',$new_votes)
					->with('hot_votes',$hot_votes)
					->with('threads',$threads)
                    ->with('ads',$ads)
					->with('space_content',$spaces['html'])
					->with('recommend_users',$recommend_users)
					->with('summaries',$summaries)
					->with('announcements',$announcements)
                    ->with('page_notices',$page_notices)
					->with('new_activities',$new_activities)
					->with('standard_data',$standard_data)
					->with('basic_data',$basic_data)
                    ->with('album_photos',$album_photos);
    }
}
