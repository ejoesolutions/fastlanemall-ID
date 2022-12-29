<div class="portlet box blue">
  <div class="portlet-title">
    <div class="caption">
      <?php echo $title ?>
    </div>
  </div>
  <div class="portlet-body">
    <table class="table table-bordered" id="sample_3">
      <thead>
        <tr>
          <th width="50px" class="text-center">No</th>
          <th>Order</th>
          <th class="text-center">Date</th>
          <th>Billing</th>
          <th>Ship to</th>
          <th class="text-center">Total</th>
          <th class="text-center">Status</th>
          <th class="text-center">#</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($orders) && !empty($items)):
          $n=1;
          //print_r($items);
          foreach ($orders as $k)
          {
            foreach ($items as $k2)
            {
                if($k['order_id']==$k2['order_id']){
                    ?>
                    <tr>
                      <td class="text-center"><?php echo $n++; ?></td><!--echo $order->order_id-->
                      <td class="text-left"><?php echo '#'.$k['order_id'].'&nbsp by '.$k['full_name']; ?><br>Seller : <?php echo $k2['shop_name'] ?></td>
                      <td class="text-center"><?php echo date("d/m/Y",strtotime($k['created_date'])); ?></td>
                      <td class="text-left"><?php echo $k['bill_name'].'<br>'.$k['bill_address']; ?></td>
                      <td class="text-left"><?php echo $k['ship_name'].'<br>'.$k['ship_address'].'<br>'.$k['ship_phone']; ?></td>
                      <td class="text-center">
                        <?php echo 'Rp '.number_format($k2['subtotal'],2); ?>
                      </td>
                      <td class="text-center">
                        <?php
                        if($k['status']==0){
                          echo 'Waiting Pay Receipt';
                        }
                        if($k['status']==1){
                          echo 'On Hold';
                        }
                        if($k['status']==2){
                          echo 'Processing';
                        }
                        if($k['status']==3){
                          echo 'Shipping Out';
                        }
                        if($k['status']==4){
                          echo 'Completed';
                        }
                        ?>
                      </td>
                      <th class="text-center"><?php echo anchor('orders/detail/'.$k['order_id'], 'View') ?></th>
                    </tr>
                    <?php
                }
            }
          }
          ?>

        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
