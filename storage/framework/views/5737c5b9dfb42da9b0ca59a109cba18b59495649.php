<?php foreach($user_votes as $key => $user_vote ): ?>
<p>
	<a href="<?php echo e(route('user.home',['username' =>$user_vote->user->username])); ?>" target="_blank" ><?php echo e($user_vote->user->username); ?></a>在 <?php echo e(friendlyDate($user_vote->created_at)); ?> 投票给 
	<?php foreach($user_vote->option_values as $k => $option_value): ?>
	"<?php echo e($option_value); ?> "<?php if(count($user_vote->option_values) != $k+1): ?>、<?php endif; ?>
	<?php endforeach; ?>
</p>
<?php endforeach; ?>

<?php echo with(new \Hifone\Foundations\Pagination\CustomerPresenter($user_votes))->render();; ?>