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
use Hifone\Models\Credit\Rule as CreditRule;
use Hifone\Models\Scopes\Recent;
use Hifone\Presenters\CreditPresenter;
use Illuminate\Database\Eloquent\Model;
use McCool\LaravelAutoPresenter\HasPresenter;
use DB;
use Auth;

class Credit extends Model implements HasPresenter
{
    use ValidatingTrait, Recent;

    /**
     * The fillable properties.
     *
     * @var string[]
     */
    protected $fillable = ['user_id', 'rule_id', 'balance', 'body', 'frequency_tag','experience'];

    /**
     * The validation rules.
     *
     * @var string[]
     */
    public $rules = [
        'user_id'    => 'required|int',
        'rule_id'    => 'required|int',
    ];

    /**
     * Overrides the models boot method.
     */
    public static function boot()
    {
        parent::boot();

        self::creating(function ($credit) {
            if (!$credit->frequency_tag) {
                $credit->frequency_tag = self::generateFrequencyTag();
            }
        });
    }

    /**
     * Credits can belong to a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * A credit belongs to a credit rule.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function rule()
    {
        return $this->belongsTo(CreditRule::class, 'rule_id');
    }

    public function notifications()
    {
        return $this->morphMany(Notification::class, 'object');
    }

    /**
     * Returns a frequency tag.
     *
     * @return string
     */
    public static function generateFrequencyTag()
    {
        return date('Ymd');
    }

    /**
     * Get the presenter class.
     *
     * @return string
     */
    public function getPresenterClass()
    {
        return CreditPresenter::class;
    }

	/**
     * ?????????????????????????????????
     *
     *
     */
	public static function checkSignForOneday(){
		$user_id = Auth::user()->id;
		$first_signs = Credit::select(DB::raw('created_at'))
										->where('user_id',$user_id)
										->where('rule_id',14)
										->get();
		foreach ($first_signs as $key => $first_sign) {
			$time = date("Y-m-d",strtotime($first_sign->created_at));
			if($time == date("Y-m-d")){
				return false;
			}
		}
		return true;
	}
}
