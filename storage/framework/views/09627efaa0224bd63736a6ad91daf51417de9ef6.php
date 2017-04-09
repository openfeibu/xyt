<ul class="pull-right list-inline remove-margin-bottom thread-filter">
    <li>
        <a <?php echo thread_filter('recent'); ?>>
            <i class="fa fa-history"></i> <?php echo e(trans('hifone.threads.recent')); ?>

        </a>
    </li>
    <li>
        <a <?php echo thread_filter('excellent'); ?>>
            <i class="fa fa-diamond"> </i> <?php echo e(trans('hifone.threads.excellent')); ?>

        </a>
    </li>
    <li>
        <a <?php echo thread_filter('like'); ?>>
            <i class="fa fa-thumbs-o-up"> </i> <?php echo e(trans('hifone.threads.like')); ?>

        </a>
    </li>
    <li>
        <a <?php echo thread_filter('unanswered'); ?>>
            <i class="fa fa-eye"></i> <?php echo e(trans('hifone.threads.unanswered')); ?>

        </a>
    </li>
</ul>
