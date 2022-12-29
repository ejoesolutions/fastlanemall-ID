<div class="portlet box blue">
  <div class="portlet-title">
    <div class="caption">
      Payments
    </div>
  </div>
  <div class="portlet-body">
    <table class="table table-bordered" id="sample_3">
      <thead>
        <th data-priority="1" class="text-center">NO.</th>
        <th data-priority="4" class="text-center">ORDER ID</th>
        <th data-priority="3" class="text-center">BILL ID</th>
        <th data-priority="5" class="text-center">AMOUNT (<?= $currency['tag'] ?>)</th>
        <th data-priority="2" class="text-center">STATUS</th>
        <th data-priority="6" class="text-center">PAYMENT DATE</th>
        <th data-priority="6" class="text-center">COMPLETED DATE</th>
        <th data-priority="6" class="text-center">DETAIL</th>
      </thead>
      <tbody>
        <?php
        $i=1;

          if(!empty($payments)){
            foreach ($payments as $row){ ?>
              <tr class="text-center">
                <td><?php echo $i++;?></td>
                <td>#<?= $row['order_id'] ?></td>
                <td><?= $row['bill_id'] ?></td>
                <td><?= ($currency['show_decimal']==1 ? number_format($row['payment_amount'],2, '.', $currency['separate']) : substr(number_format($row['payment_amount'],2, '.', $currency['separate']), 0 ,-3)) ?></td>
                <td>
                  <?php if ($row['payment_date']) {
                    echo '<span style="color:#1E8449">Completed</span>';
                  }else {
                    echo '<span style="color:#D4AC0D">Pending</span>';
                  } ?>
                </td>
                <td><?= $row['recorded_date'] ? date('d-m-Y, h:i A', strtotime($row['recorded_date'])) : '' ?></td>
                <td><?= $row['payment_date'] ? date('d-m-Y, h:i A', strtotime($row['payment_date'])) : '' ?></td>
                <td><a href="<?= base_url('orders/detail/') ?><?= $row['order_id'] ?>/<?= $row['seller_id'] ?>">Detail</a></td>
              </tr>
              <?php 
            }
          } ?>
      </tbody>
    </table>
  </div>
</div>