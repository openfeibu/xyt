<?php foreach($verifiers as $verifier): ?>
<tr class="collapsed">
<td><i class="fa fa-angle-right"></i></td>
<td><?php echo e($verifier->getName()); ?></td>
<td><?php echo $verifier->verify() ? '<i class="fa fa-check text-success"></i>' : '<i class="fa fa-close text-danger"></i>'; ?></td>
</tr>
<?php endforeach; ?>