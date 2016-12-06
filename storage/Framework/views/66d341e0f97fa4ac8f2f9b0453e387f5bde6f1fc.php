<?php $__env->startSection('content'); ?>
<div class="x_content">
<p>Openstaande orders</p>
<div class="table-responsive">
  <table class="table table-striped jambo_table">
    <thead>
      <tr class="headings">
        <th class="column-title">Order nr. </th>
        <th class="column-title">Geplaatst op </th>
        <th class="column-title">Klant </th>
        <th class="column-title">Leveren op </th>
        <th class="column-title">Prijs </th>
        <th class="column-title">Status betaling </th>
        <th class="column-title no-link last"><span class="nobr">Action</span>
        </th>
        <th class="bulk-actions" colspan="7">
          <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
        </th>
      </tr>
    </thead>

    <tbody>
    <?php foreach($orders as $order): ?>
      <tr class="even pointer">
        <td class=" "><?php echo e($order->id); ?></td>
        <td class=" "><?php echo e($order->created_at); ?></td>
        <td class=" "><?php echo e($order->user->getFullName()); ?></td>
        <td class=" "><?php echo e($order->deliverydate); ?></td>
        <td class=" ">€ <?php echo e(($order->price / 100)); ?></td>
        <td class=" "><?php echo e(($order->payment->paid) ? 'Betaald' : 'Openstaand'); ?></td>
        <td class=" last"><a href="#">Details</a></td>
      </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>