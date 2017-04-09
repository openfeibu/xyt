<?php if(is_array($item)): ?>
	<li class="menu">
		<span><?php echo e(trans('administrator::administrator.'.$key)); ?></span>
		<ul>
			<?php foreach($item as $k => $subitem): ?>
				<?php echo view('administrator::partials.menu_item', array(
                    'item'           => $subitem,
                    'key'            => $k,
                    'settingsPrefix' => $settingsPrefix,
                    'pagePrefix'     => $pagePrefix,
                ))?>
			<?php endforeach; ?>
		</ul>
	</li>
<?php else: ?>
	<li class="item">
		<?php if(strpos($key, $settingsPrefix) === 0): ?>
			<a href="<?php echo e(route('admin_settings', array(substr($key, strlen($settingsPrefix))))); ?>"><?php echo e($item); ?></a>
		<?php elseif(strpos($key, $pagePrefix) === 0): ?>
			<a href="<?php echo e(route('admin_page', array(substr($key, strlen($pagePrefix))))); ?>"><?php echo e($item); ?></a>
		<?php else: ?>
			<a href="<?php echo e(route('admin_index', array($key))); ?>"><?php echo e($item); ?></a>
		<?php endif; ?>
	</li>
<?php endif; ?>
