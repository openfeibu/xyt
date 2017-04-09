<?php

namespace Hifone\Models;
use Hifone\Models\Scopes\ForUser;
use Hifone\Models\Scopes\Recent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
	use ForUser,Recent,SoftDeletes;
	
    protected $table = 'comments';

    protected $dates = ['deleted_at'];

    protected $fillable = ['type','app','table','row_id','app_user_id','user_id','content','to_comment_id','to_user_id','data','is_del','client_type','is_audit','storey','app_detail_url','app_detail_summary','client_ip','client_port','digg_count','created_at','updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    } 
}
