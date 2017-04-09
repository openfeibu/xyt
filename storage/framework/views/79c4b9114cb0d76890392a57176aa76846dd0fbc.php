<?php $__env->startSection('content'); ?>
<link href="<?php echo e(asset('/build/dist/css/pay.css')); ?>" type="text/css" rel="stylesheet" />
<style>
    table{width: 100%;margin: 0 auto;text-align:center;}
    table tr{height:40px;line-height: 40px;font-size: 14px;}
</style>
        <div class="TA" >
            <?php echo $__env->make('pay.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="clear" style="height: 10px;"></div>
            <?php echo isset($breadcrumb) ? $breadcrumb : ''; ?>

            <div class="clear" style="height: 100px;"></div>
            
            <div class="money_query">
                <div class="money_query_user">
                    <img src="<?php echo e($user->avatar); ?>" style="width: 100px;height: 100px;" alt="" />
                    <dl>
                        <dd><?php echo e($user->username); ?></dd>
                        <dd><?php echo e($user->work); ?>/<?php echo e($user->school); ?></dd>
                    </dl>
                </div>
                <div class="money_query_left fleft">
                    <span class="money_query_span"><font style="color: #DABC72">ID:</font><?php echo e($user->id); ?></span>
                    <div class="money_query_left_footer clear">
                        <div>
                            <ul>
                                <a href="<?php echo e(route('pay.index')); ?>"><li>交易记录</li></a>
                                <a href="<?php echo e(route('pay.index',['type' => 'recharge'])); ?>"><li>充值查询</li></a>
                                <a href="<?php echo e(route('pay.index',['type' => 'convert'])); ?>"><li>互换</li></a>
                            </ul>
                        </div>
                    </div>
                </div>

                <span id="span_">账户余额</span>
                <div class="money_query_right fleft">
                    <div class="money_query_right_all">
                        <div class="money_query_right_main">
                            <dl>
                                <dd>
                                    <img src="<?php echo e(asset('/build/dist/images/query_money.png')); ?>" alt="" />
                                    象牙币余额
                                </dd>
                                <dd style="color: #51B837;font-size: 18px;"><?php echo e($user->coin); ?></dd>
                                <dd><span>充值</span></dd>
                            </dl>
                        </div>
                        <div class="money_query_right_main">
                             <dl>
                                <dd>
                                    <img src="<?php echo e(asset('/build/dist/images/query_home.png')); ?>" alt="" />
                                    积分余额
                                </dd>
                                <dd style="color: #51B837;font-size: 18px;"><?php echo e($user->score); ?></dd>
                                <dd><span>充值</span></dd>
                            </dl>
                        </div>

                    </div>
                </div>

                <div style="height: 20px" class="clear"></div>
                <!--
                <div class="transaction_query" >
	                 
                    <form action="">
                       <p class="fleft" style="margin-top: 0px;margin-left: 20px;">
                            起始时间：<input type="datetime-local" name="begin_date" value="2015/03/27 10:41" id="begin_date"/>到<input type="datetime-local" name="over_date" value="2015/03/27 10:41" id="over_date"/>
                            <ul style="margin-top: 30px;">
                                <a href=""><li style="width: 50px;">今日</li></a>
                                <a href=""><li>最近1个月</li></a>
                                <a href=""><li>最近3个月</li></a>
                                <a href=""><li>最近6个月</li></a>
                                <a href=""><li>最近1年</li></a>
                            </ul>
                        </p>
                        <div class="clear" style="height: 20px;width: 100%;"></div>
                        <p class="clear" style="margin-left: 20px;">
                            状态：
                            <select name="" id="">
                                <option value="">全部</option>
                                <option value="">在线</option>
                                <option value="">离线</option>
                            </select>
                            <input type="submit" id="submit2" />
                        </p>
                    </form>
                    
                </div>
                -->
                <?php if($type == 'recharge'): ?>
                <div class="money_query_footer clear">
                    <!--<p style="margin-top: 40px;margin-left: 20px;">请输入订单号查询：<input type="text" name="" value="" />
                        <span>查询</span>
                    </p>-->
                    <div style="height: 30px;border-bottom: 1px #e2e1e1 solid"></div>
                    <table>
                        <tr>
                            <th>订单号</th>
                            <th>充值金额</th>
                            <th>充值方式</th>
                            <th>充值时间</th>
                            <th>充值状态</th>
                        </tr>
                        <hr />
                        <?php foreach($recharges as $key => $recharge): ?>
                        <tr>
                            <td><?php echo e($recharge->out_trade_no); ?></td>
                            <td><?php echo e($recharge->money); ?></td>
                            <td><?php echo e(trans('hifone.pay_id.'.$recharge->pay_id)); ?></td>
                            <td><?php echo e($recharge->created_at); ?></td>
                            <td><?php echo e(trans('hifone.pay_status.'.$recharge->pay_status)); ?></td>
                        </tr>
                        <?php endforeach; ?>
                         <?php echo with(new \Hifone\Foundations\Pagination\CustomerPresenter($recharges))->render();; ?>

                    </table>
                </div>
                <?php elseif($type == 'convert'): ?>
                <div style="height: 30px;width: 290px;margin-left: 50px;background: #FAEDED;border: 2px #e2e1e1 solid;padding-left: 10px;line-height: 30px;font-size: 15px" class="clear">
                    目前。<span style="color: #51B837;font-size: 16px"> 象牙币 </span>兑换<span style="color: #51B837;font-size: 16px"> 积分 </span>的比例：1:<?php echo e($convert->value); ?>

                </div>
                <div style="height: 10px;"></div>

                <div class="exchange">
                    <div class="exchange_main">
                        <div class="exchange_main_left fleft">
                            <p>※请输入兑换积分的数量：</p>
                            <form action="<?php echo e(route('pay.convert')); ?>" method="post">
	                        <?php echo csrf_field(); ?>

                            <div class="fleft exchange_main_content" style="margin-left: 120px;">
                                <dl>
                                    <dd><span>积分</span></dd>
                                    <dd><input type="text" name="score" id="score" value="<?php echo e(Input::old('score')); ?>"/></dd>
                                </dl>
                            </div>
                            <div style="margin-top: 35px;margin-left: 20px;" class="fleft exchange_main_content">
                                <img src="<?php echo e(asset('/build/dist/images/arrowto.png')); ?>" alt="" />
                            </div>
                            <div style="" class="fleft exchange_main_content">
                                <dl>
                                    <dd><span style="width: 100px;">可换象牙币</span></dd>
                                    <dd><input type="text" name="toCoin" id="toCoin" value="<?php echo e(Input::old('toCoin')); ?>" disabled/></dd>
                                </dl>
                            </div>
                            <div style="" class="fleft exchange_main_content">
	                            <input type="hidden" name="type" value="score">
                                <button style="margin-left: 20px;margin-top: 40px;" id="toCoinBtn" type="submit">兑换</button>
                            </div>
                            </form>
                        </div>
                        <div class="exchange_main_right fleft">
                            <p style="margin-left: 50px;">※请输入兑换积分的数量：</p>
                            <form action="<?php echo e(route('pay.convert')); ?>" method="post">
	                        <?php echo csrf_field(); ?>

                            <div class="fleft exchange_main_content" style="margin-left: 120px;">
                                <dl>
                                    <dd><span style="width: 70px;">象牙币</span></dd>
                                    <dd><input type="text" id="coin" name="coin" value="<?php echo e(Input::old('coin')); ?>" /></dd>
                                </dl>
                            </div>
                            <div style="margin-top: 35px;margin-left: 20px;" class="fleft exchange_main_content">
                                <img src="<?php echo e(asset('/build/dist/images/arrowto.png')); ?>" alt="" />
                            </div>
                            <div style="" class="fleft exchange_main_content">
                                <dl>
                                    <dd><span style="width: 70px;">可换积分</span></dd>
                                    <dd><input type="text" name="toScore" id="toScore" value="<?php echo e(Input::old('toScore')); ?>" disabled/></dd>
                                </dl>
                            </div>
                            <div style="" class="fleft exchange_main_content">
	                            <input type="hidden" name="type" value="coin">
                                <button style="margin-left: 20px;margin-top: 40px;" id="toScoreBtn" type="submit">兑换</button>
                            </div>
                            </form>
                        </div>
                    </div>
                    
                    <div class="clear"></div>
                    <p style="font-size:25px;margin-left:20px;margin-top: 30px;">兑换记录:</p>
                    <div class="exchange_record">
                        <table>
                            <tr>
                                <th>兑换时间</th>
                                <th>兑换积分/象牙币</th>
                                <th>获得积分/象牙币</th>
                            </tr>
                            <?php foreach($converts as $key => $convert): ?>
                            <tr>
                                <td><?php echo e($convert->created_at); ?></td>
                                <td><?php echo e($convert->value); ?></td>
                                <td><?php echo e($convert->get_value); ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                         <?php echo with(new \Hifone\Foundations\Pagination\CustomerPresenter($converts))->render();; ?>

                    </div>
                </div>
                <?php else: ?>
                <div class="transaction_query_content">
                    交易记录详情：
                    <table>
                        <tr>
                            <th>订单号</th>
                            <th>交易<?php echo e(trans('hifone.coin')); ?></th>
                            <th>交易方式</th>
                            <th>充值时间</th>
                            <th>充值状态</th>
                        </tr>
                        <hr />
                        <?php foreach($accounts as $key => $account): ?>
                        <tr>
                            <td><?php echo e($account->out_trade_no); ?></td>
                            <td><?php echo e($account->coin); ?></td>
                            <td><?php echo e(trans('hifone.account.pay_type.'.$account->pay_type)); ?></td>
                            <td><?php echo e($account->created_at); ?></td>
                            <td><?php echo e(trans('hifone.account.status.'.$account->status)); ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <?php echo with(new \Hifone\Foundations\Pagination\CustomerPresenter($accounts))->render();; ?>

                    </table>
                </div>
                <?php endif; ?>
            </div>
           
      </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.common', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>