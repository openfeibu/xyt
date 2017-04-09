<?php

namespace Hifone\Widgets;

use DB;
use Auth;
use Hifone\Models\User;
use Hifone\Models\Vote;
use Hifone\Models\VoteUser;
use Hifone\Models\VoteOption;
use Arrilot\Widgets\AbstractWidget;
use Illuminate\Support\Facades\View;

class VoteList extends AbstractWidget
{
	/**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];
    
	public function __construct (array $config)
	{
		parent::__construct($config);		
	}
	public function run ()
	{
		

	}
}