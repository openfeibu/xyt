<?php

/*
 * This file is part of Hifone.
 *
 *
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Hifone\Models;

use AltThree\Validator\ValidatingTrait;
use Hifone\Presenters\UserPresenter;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use McCool\LaravelAutoPresenter\HasPresenter;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract, HasPresenter
{
    use Authenticatable, CanResetPassword, EntrustUserTrait;

    // Enable hasRole( $name ), can( $permission ),
    //   and ability($roles, $permissions, $options)

    // Enable soft delete

    protected $dates = ['deleted_at'];

    /**
     * The properties that cannot be mass assigned.
     *
     * @var string[]
     */
    protected $guarded = ['id', 'notifications', 'is_banned','activity_banned'];

    /**
     * The hidden properties.
     *
     * These are excluded when we are serializing the model.
     *
     * @var string[]
     */
    protected $hidden = ['password', 'remember_token'];
    /**
     * The validation rules.
     *
     * @var string[]
     */
    public $rules = [
        'username' => ['required', 'max:15','unique:users,username'],
        'email'    => 'required|max:255|email|unique:users,email',
        'mobile' => 'required',
        'password' => 'required',
        'sex' 	   => 'required',
        'school_id' => 'required|numeric|exists:schools,id',
    	'school' => 'required',
    	'city' => 'required|integer|min:1|exists:areas,id',
    	'province' => 'required|integer|min:1|exists:areas,id',
    	'location' => 'required|string',
    	'work' => 'required|string',
    	'birthday' => 'required|string',
    ];

    protected $searchable = [
        'username',
    ];

    /**
     * Find by username, or throw an exception.
     *
     * @param string $username The username.
     * @param mixed  $columns  The columns to return.
     *
     * @throws ModelNotFoundException if no matching User exists.
     *
     * @return User
     */
    public static function findByUsernameOrFail(
        $username,
        $columns = ['*']
    ) {
        if (!is_null($user = static::whereUsername($username)->first($columns))) {
            return $user;
        }

        throw new ModelNotFoundException();
    }
	public static function findByUidOrFail ($uid,$columns = ['*'])
	{
		 if (!is_null($user = static::where('id',$uid)->first($columns))) {
             $user->link = route('user.home', [$uid]);
            return $user;
        }

        throw new ModelNotFoundException();
	}
	public static function findByUid ($uid,$columns = ['*'])
	{
		if (!is_null($user = static::where('id',$uid)->first($columns))) {
            $user->link = route('user.home', [$uid]);
            return $user;
        }

        return false;
	}
    public function favoriteThreads()
    {
        return $this->belongsToMany(Thread::class, 'favorites')->withTimestamps();
    }

    /**
     * Users can have many threads.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function threads()
    {
        return $this->hasMany(Thread::class);
    }

    /**
     * Users can have many replies.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    /**
     * Users can have many credits.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function credits()
    {
        return $this->hasMany(Credit::class);
    }

    public function notifications()
    {
        return $this->morphMany(Notification::class, 'object');
    }

    public function follows()
    {
        return $this->morphMany(Follow::class, 'followable');
    }

	public function following()
    {
        return $this->morphMany(Follow::class, 'user','followable_type');
    }

    public function identities()
    {
        return $this->hasMany(Identity::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function scopeSearch($query, $search)
    {
        return  $query->where(function ($query) use ($search) {
            $query->where('username', 'LIKE', "%$search%");
        });
    }

    /**
     * ----------------------------------------
     * UserInterface
     * ----------------------------------------.
     */
    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    /**
     * ----------------------------------------
     * RemindableInterface
     * ----------------------------------------.
     */
    public function getReminderEmail()
    {
        return $this->email;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public function getAvatarAttribute()
    {
        return $this->avatar_url ? $this->avatar_url : '/images/noavatar/big.jpg';
    }

    public function getAvatarSmallAttribute()
    {
        return $this->avatar_url ? $this->avatar_url : '/images/noavatar/middle.jpg';
    }

    /**
     * Cache github avatar to local.
     */
    public function cacheAvatar()
    {
        //Download Image
        $guzzle = new GuzzleHttp\Client();
        $response = $guzzle->get($this->image_url);

        //Get ext
        $content_type = explode('/', $response->getHeader('Content-Type'));
        $ext = array_pop($content_type);

        $avatar_name = $this->id.'_'.time().'.'.$ext;
        $save_path = public_path('uploads/avatars/').$avatar_name;

        //Save File
        $content = $response->getBody()->getContents();
        file_put_contents($save_path, $content);

        //Delete old file
        if ($this->avatar) {
            @unlink(public_path('uploads/avatars/').$this->avatar);
        }

        //Save to database
        $this->avatar = $avatar_name;
        $this->save();
    }

    /**
     * Get the presenter class.
     *
     * @return string
     */
    public function getPresenterClass()
    {
        return UserPresenter::class;
    }

    /*public function isDisableUser($uid, $type = 'login')
    {
        if (!in_array($type, array('login', 'post'))) {
            $type = 'login';
        }
        if (empty($uid)) {
            return false;
        }
        $key = 'is_disable_user_'.$type.'_'.$uid;
        $result = S($key);
        if ($result == false) {
            $map['uid'] = $uid;
            $map['type'] = $type;
            $time = time();
            $map['start_time'] = array('lt', $time);
            $map['end_time'] = array('gt', $time);
            $data = $this->where($map)->first();

            if (empty($data)) {
                $result['status'] = false;
            } else {
                $result['status'] = true;
                $result['time'] = $data['end_time'];
            }
            S($key, $result);
        }

        if ($result['status'] && $result['time'] < time()) {
            S($key, null);

            return false;
        }

        return $result['status'];
    }*/
    public function dating ()
    {
    	return $this->hasOne(UserDating::class);
    }
    public function standard ()
    {
    	return $this->hasOne(UserStandard::class);
    }
    public function detail ()
    {
    	return $this->hasOne(UserDetail::class);
    }
    public function happy ()
    {
    	return $this->hasOne(UserHappy::class);
    }
}
