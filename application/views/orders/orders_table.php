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
          <th data-priority="1" width="50px" class="text-center">No</th>
          <th data-priority="6">Order</th>
          <th data-priority="2" class="text-center">Date</th>
          <th data-priority="3" style="max-width:300px">Ship to</th>
          <th data-priority="4" class="text-center">Total</th>
          <th data-priority="5" class="text-center">Status</th>
          <!-- <th class="text-center">#</th> -->
        </tr>
      </thead>
      <tbody>
        <?php if ($orders):
          $n=1;
          ?>
          
          <?php
          foreach ($orders as $order) {
            if($user_profile['user_group']==0 || $user_profile['user_group']==1 || $user_profile['user_group']==3) { ?>
              <tr>
                <td class="text-center"><?= $n++; ?></td>
                <td class="text-left">
                  <?= '#'.$order['order_id'].'&nbsp by '.$order['full_name']; ?>
                  <br>
                </td>
                <td class="text-center"><?= date("d/m/Y",strtotime($order['created_date'])); ?></td>
                <td class="text-left"><?= $order['ship_name'].'<br>'.$order['ship_address'].'<br>'.$order['ship_postcode'].' '.$order['ship_area']
                // .'<br>'.$order['ship_state']
                .'<br>'.$order['ship_phone']; ?></td>
                <td class="text-center"><?= $currency['tag'].' '.($currency['show_decimal']==1 ? number_format($order['total_all'],2, '.', $currency['separate']) : substr(number_format($order['total_all'],2, '.', $currency['separate']), 0 ,-3)); ?></td>
                <td class="text-center">
                  <?php if($order['order_status']!=null && $order['order_status']==0) { ?>
                    <a data-role="verify_pending" data-id="<?php echo $order['order_id'] ?>" data-uid="<?php echo $order['created_by'] ?>" href="#" data-toggle="modal" title="Verify Pending Payment" class="btn btn-sm btn-warning">Verify</a><br>
                  <?php }

                  foreach ($order_status as $key) {

                    if($order['order_id']==$key['order_id']) {
                      echo $key['shop_name'].'<br>[ ';
                      if($key['order_status']==0 && $order['payment_type']!="Online Banking"){
                        //echo 'Waiting Pay Receipt';
                        echo anchor('orders/detail/'.$order['order_id'].'/'.$key['seller_id'], 'Waiting Pay Receipt');
                      }else if($key['order_status']==0 && $order['payment_type']=="Online Banking")
                      {
                        echo anchor('orders/detail/'.$order['order_id'].'/'.$key['seller_id'], 'To Pay');
                      }
                      else if($key['order_status']==1){
                        //echo 'On Hold';
                        echo anchor('orders/detail/'.$order['order_id'].'/'.$key['seller_id'], 'Processing');
                      }
                      else if($key['order_status']==2){
                        //echo 'Processing';
                        echo anchor('orders/detail/'.$order['order_id'].'/'.$key['seller_id'], 'Packing');
                      }
                      else if($key['order_status']==3){
                        //echo 'Shipping Out';
                        echo anchor('orders/detail/'.$order['order_id'].'/'.$key['seller_id'], 'Delivery');
                      }
                      else if($key['order_status']==4){
                        //echo 'Completed';
                        echo anchor('orders/detail/'.$order['order_id'].'/'.$key['seller_id'], 'Completed');
                      }
                      else if($key['order_status']==5){
                        //echo 'Completed';
                        echo anchor('orders/detail/'.$order['order_id'].'/'.$key['seller_id'], 'Verify & Notify');
                      }
                      else if($key['order_status']==6){
                        //echo 'Completed';
                        echo anchor('orders/detail/'.$order['order_id'].'/'.$key['seller_id'], 'Cancel');
                      }
                      echo ' ]<br>';
                    }
                  }
                  ?>
                </td>
              </tr>
              <?php
            }else if($user_profile['user_group']==2){
              foreach ($order_status as $key) {
                if($order['order_id']==$key['order_id'] && $shop['seller_id']==$key['seller_id']) { ?>
                  <tr>
                    <td class="text-center"><?= $n++; ?></td>
                    <td class="text-left"><?= '#'.$order['order_id'].'&nbsp by '.$order['full_name']; ?></td>
                    <td class="text-center"><?= date("d/m/Y",strtotime($order['created_date'])); ?></td>
                    <td class="text-left"><?= $order['ship_name'].'<br>'.$order['ship_address'].'<br>'.$order['ship_postcode'].' '.$order['ship_area'].'<br>'.$order['ship_state'].'<br>'.$order['ship_phone']; ?></td>
                    <td class="text-center">
                      <?php
                      if(!empty($items)){
                        $new_sub=0;
                        foreach ($items as $val) {
                          if($val['seller_id']==$shop['seller_id'] && $val['order_id']==$order['order_id'])
                          {
                            $new_sub=$new_sub+$val['subtotal'];
                          }
                        }
                        echo $currency['tag'].' '.($currency['show_decimal']==1 ? number_format($new_sub+$key['shipping_seller'],2, '.', $currency['separate']) : substr(number_format($new_sub+$key['shipping_seller'],2, '.', $currency['separate']), 0 ,-3));
                      }
                     ?>
                    </td>
                    <td class="text-center">
                      <?php
                      foreach ($order_status as $key) {
                        if($order['order_id']==$key['order_id'])
                        {
                          echo $key['shop_name'].'<br>[ ';
                          if($key['order_status']==0 && $order['payment_type']!="Online Banking"){

                            //echo 'Waiting Pay Receipt';
                            echo anchor('orders/detail/'.$order['order_id'].'/'.$key['seller_id'], 'Waiting Pay Receipt');
                          }
                          else if($key['order_status']==0 && $order['payment_type']=="Online Banking")
                          {
                            echo anchor('orders/detail/'.$order['order_id'].'/'.$key['seller_id'], 'To Pay');
                          }
                          else if($key['order_status']==1){
                            //echo 'On Hold';
                            echo anchor('orders/detail/'.$order['order_id'].'/'.$key['seller_id'], 'Processing');
                          }
                          else if($key['order_status']==2){
                            //echo 'Processing';
                            echo anchor('orders/detail/'.$order['order_id'].'/'.$key['seller_id'], 'Packing');
                          }
                          else if($key['order_status']==3){
                            //echo 'Shipping Out';
                            echo anchor('orders/detail/'.$order['order_id'].'/'.$key['seller_id'], 'Delivery');
                          }
                          else if($key['order_status']==4){
                            //echo 'Completed';
                            echo anchor('orders/detail/'.$order['order_id'].'/'.$key['seller_id'], 'Completed');
                          }
                          else if($key['order_status']==5){
                            //echo 'Completed';
                            echo anchor('orders/detail/'.$order['order_id'].'/'.$key['seller_id'], 'Verify & Notify');
                          }
                          else if($key['order_status']==6){
                            //echo 'Completed';
                            echo anchor('orders/detail/'.$order['order_id'].'/'.$key['seller_id'], 'Cancel');
                          }
                          echo ' ]<br>';
                        }
                      }
                      ?>
                    </td>
                  </tr>
                  <?php
                }
              }
            }
          }
          ?>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>

<div class="modal fade bs-modal-md" id="dataModal">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Verify Pending Payment</h4>
      </div>
      <?php echo form_open('orders/store_pending_payment', array('class'=>'form-horizontal')); ?>
      <div class="modal-body" id="pay_detail">
        <div class="form-group">
          <label class="col-md-3 control-label">Order No:</label>
          <div class="col-md-9">
            <input type="text" class="form-control input-sm" name="order_id" id="order_id" readonly>
            <input type="hidden" class="form-control input-sm" name="user_id" id="user_id">
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Reference Note:</label>
          <div class="col-md-9">
            <?php echo form_textarea('reference_note','',array('class'=>'form-control input-sm','required'=>'')) ?>
          </div>
        </div>
        <div class="form-group">
          <label class="col-md-3 control-label">Payment Date:</label>
          <div class="col-md-9">
            <input type="text" name="pay_date" data-date-format="d-m-yyyy" class="form-control input-sm datepicker date-picker" required>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
        <button type="submit" class="btn dark btn-primary">Save</button>
      </div>
      <?php echo form_close(); ?>
    </div>
  </div>
</div>
