<div class="portlet box blue">
  <div class="portlet-title">
    <div class="caption">
      <?= $title ?>
    </div>
  </div>
  <div class="portlet-body">
    <table class="table table-bordered" id="" width="100%">
      <thead>
        <tr>
          <th colspan="1">Order #<?= $orders['order_id'] ?> details</th>
          <td colspan="2">
            <?php
            if($user_profile['user_group']==0 || $user_profile['user_group']==1){
              if($orders['payment_type']=='Online Banking'){ ?>
                <b>Payment</b> via <?= $orders['payment_type'].' [ '.$orders['reference_note'].' ]';
              }else{ ?>
                <b>Payment</b> via <?= $orders['payment_type'];

                if(!empty($orders['att_file'])){ ?> 
                  [ <a class="" data-toggle="modal" href="#viewPayReceipt"><b>View Receipt</b></a> ]
                  <?php
                }
              }
            }else{ ?>
              <b>Payment</b> via <?= $orders['payment_type'];
            } ?>
          </td>
        </tr>
        <tr>
          <th width="25%">General</th>
          <th width="30%">Seller</th>
          <th width="30%">Shipping</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Order created :<br>
            <?= date('d/m/Y @ H:i:s',strtotime($orders['created_date'])); ?>
            <?php if ($order_status[0]['complete_date']) {
              echo '<br>Order completed :<br>';
              echo date('d/m/Y @ H:i:s',strtotime($order_status[0]['complete_date']));
            } ?>
          </td>
          <td rowspan="2">
            <?php
              echo $order_status[0]['shop_name'];
              echo '<br>'.$order_status[0]['address'].'<br>'.$order_status[0]['postcode'].' '.$order_status[0]['town_area'].'<br>'
              // .$order_status[0]['state']
              ;
             ?>
             <br><br>Email : <?php echo $order_status[0]['email']; ?>
             <br>Phone : <?php echo $order_status[0]['phone']; ?>
          </td>
          <td rowspan="2">
            <?php
            echo $orders['ship_name'];
            echo '<br>'.$orders['ship_address'].'<br>'.$orders['ship_postcode'].' '.$orders['ship_area'].'<br>'
            // .$orders['ship_state']
            ;
            echo '<br>'.$orders['ship_phone'];
            ?>
            <?php if(!empty($track)){ ?>
              <br><br>Tracking No : <?php echo $track['tracking_code']; ?>
              <br>Courier : <?php echo $track['courier_name']; ?>
            <?php } ?>
          </td>
        </tr>
        <tr>
          <td>Status :<br>
            <?php
            $stat=array(
              array('0'=>'1','1'=>'Processing'),
              array('0'=>'2','1'=>'Packing'),
              array('0'=>'3','1'=>'Delivery'),
              array('0'=>'4','1'=>'Completed'),
              array('0'=>'6','1'=>'Cancel')
            ); ?>
            <?php echo form_open('orders/updateStatus'); ?>
            <select name="status" class="form-control" id="status" onchange="set_productsiri()">
              <?php
              for($i=0;$i<count($stat);$i++){

                foreach ($order_status as $key) {
                  if($key['seller_id']==$seller_id){
                    if($key['order_status']==$stat[$i][0] && $key['order_status']==1){
                      echo '<option value="1" selected>Processing</option>';
                    }
                    else if($key['order_status']==$stat[$i][0] && $key['order_status']==2){
                      echo '<option value="2" selected>Packing</option>';
                    }
                    else if($key['order_status']==$stat[$i][0] && $key['order_status']==3){
                      echo '<option value="3" selected>Delivery</option>';
                    }
                    else if($key['order_status']==$stat[$i][0] && $key['order_status']==4){
                      echo '<option value="4" selected>Completed</option>';
                    }
                    else if($key['order_status']==$stat[$i][0] && $key['order_status']==6){
                      echo '<option value="6" selected>Cancel</option>';
                    }
                    else{
                      echo '<option value="'.$stat[$i][0].'">'.$stat[$i][1].'</option>';
                    }
                  }
                }
              } ?>
            </select><br>
            <?php echo form_hidden('temp_sellerID',$seller_id) ?>
            <?php echo form_hidden('order_id',$orders['order_id']) ?>
            <?php echo form_hidden('owner_id',$orders['created_by']) ?>
            <?php echo form_hidden('order_status_id',$order_status[0]['order_status_id']) ?>

            <input type="submit" name="submitStatus" value="Update" id="submitStatus" style="display:none" class="btn btn-primary">
            <?php echo form_close(); ?>

          </td>

        </tr>
      </tbody>
    </table>

    <?php if(empty($siri) || $siri[0]['seller_id']!=$seller_id){ ?>
      <div id="show_siriproduct" style="display:none">
        <table class="table table-bordered" id="" width="100%">
          <?= form_open('orders/store_siriproduct') ?>
          <tr>
            <th>No.</th>
            <th>Product</th>
            <th>Product Code</th>
            <th>Siri No.</th>
          </tr>
          <?= form_hidden('order_id', $orders['order_id']) ?>
          <?= form_hidden('owner_id', $orders['created_by']) ?>
          <?php if ($items){ 
                  $n=1;
                  $p=0;
                  
                  foreach ($items as $item){
                    if($item['seller_id']==$seller_id){
                      for($i=0;$i<$item['qty'];$i++) { ?>
                        <tr>
                          <td><?= $n++; ?></td>
                          <td><?= $item['product_name'] ?></td>
                          <td><?= $item['item_code'] ?></td>
                          <?php if(!isset($_POST['submitStatus2'])){ ?>
                            <td><input type="text" name="no_siri[]" id="no_siri" class="form-control uppercase" required></td>
                          <?php }else{ ?>
                            <td><input type="text" name="no_siri[]" id="no_siri" class="form-control uppercase" value="<?= $no_siri[$p++]; ?>" required></td>
                          <?php } ?>
                          <?= form_hidden('siri_item[]', $item['product_id']) ?>
                        </tr>
                        <?php
                      }
                    }
                    echo form_hidden('product_id[]',$item['product_id']);
                    echo form_hidden('qty[]',$item['qty']);
                    echo form_hidden('seller_id[]', $item['seller_id']);

                  }
                  if(isset($_POST['submitStatus2'])){
                    echo "<script type='text/javascript'>alert('$error_msg');</script>";
                  }
                }
             ?>
             <tr>
              <?= form_hidden('post_seller', $seller_id);
              foreach ($order_status as $key) {
                if($key['order_id']==$this->uri->segment(3) && $key['seller_id']==$this->uri->segment(4))
                {
                  echo form_hidden('order_status_id',$key['order_status_id']);
                  echo form_hidden('next_transaction',$key['next_transaction']);
                }
              }
              if(isset($_POST['submitStatus2'])){
                echo form_hidden('order_status_id',$_POST['order_status_id']);
                echo form_hidden('next_transaction',$_POST['next_transaction']);
              }
              ?>
              <td colspan="4" class="text-right"><input type="submit" name="submitStatus2" value="Update" class="btn btn-primary"></td>
             </tr>
             <?= form_close(); ?>
        </table>

      </div>
      <?php
    }
    ?>
    <!-- close section status 2 -->

    <!-- open section status 3 -->
    <?php if(empty($track) ){ ?>
    <div id="show_tracking" style="display:none">
      <table class="table table-bordered" id="" width="100%">
        <?= form_open('orders/store_tracking') ?>
        <tr>
          <th>No.</th>
          <th>Tracking Code</th>
          <th>Courier Name</th>
        </tr>
        <tr>
          <td><?= '1'; ?></td>
          <td><input type="text" name="no_tracking" id="no_tracking" class="form-control" required></td>
          <td>
            <input type="text" name="courier" id="courier" class="form-control" list="list-courier" required>
            <datalist id="list-courier">
              <?php foreach ($list_courier as $key) { ?>
                <option value="<?= $key['courier_name'] ?>"><?= $key['courier_name'] ?></option><?php
              } ?>
            </datalist>
          </td>
        </tr>
        <tr>
          <?= form_hidden('order_id', $orders['order_id']) ?>
          <?= form_hidden('buyer_email', $orders['email']) ?>
          <?= form_hidden('seller_id', $seller_id) ?>
          <?= form_hidden('owner_id', $orders['created_by']);
          foreach ($order_status as $key) {
            if($key['order_id']==$this->uri->segment(3) && $key['seller_id']==$this->uri->segment(4))
            {
              echo form_hidden('order_status_id',$key['order_status_id']);
            }
          }
          ?>
          <td colspan="3" class="text-right"><input type="submit" name="submitStatus3" id="submitStatus3" value="Update" class="btn btn-primary" ></td>
        </tr>
         <?= form_close(); ?>
      </table>
    </div>
    <?php } ?>
    <!-- close section status 3 -->

    <!-- open section status 4 -->
    <div id="show_transfer" style="display:none">
      <table class="table table-bordered" id="" width="100%">
        <?= form_open('orders/#') ?>
        <tr>
          <th>No.</th>
          <th>Tracking Code</th>
          <th>Courier Name</th>
        </tr>
        <tr>
          <td><?= '1'; ?></td>
          <td><input type="text" name="no_tracking" id="no_tracking" class="form-control" required></td>
          <td>
            <input type="text" name="courier" id="courier" class="form-control" list="list-courier" required>
            <datalist id="list-courier">
              <?php foreach ($list_courier as $key) { ?>
                <option value="<?= $key['courier_name'] ?>"><?= $key['courier_name'] ?></option>
              <?php } ?>
            </datalist>
          </td>
        </tr>
        <tr>
          <?= form_hidden('order_id', $orders['order_id']) ?>
          <?= form_hidden('buyer_email', $orders['email']) ?>
          <?= form_hidden('seller_id', $seller_id) ?>
          <?= form_hidden('owner_id', $orders['created_by']);
          foreach ($order_status as $key) {
            if($key['order_id']==$this->uri->segment(3) && $key['seller_id']==$this->uri->segment(4))
            {
              echo form_hidden('order_status_id',$key['order_status_id']);
            }
          } ?>
          <td colspan="3" class="text-right"><input type="submit" name="submitStatus3" id="submitStatus3" value="Update" class="btn btn-primary" ></td>
        </tr>
        <?= form_close(); ?>
      </table>
    </div>
    <!-- close section status 4 -->

    <!-- open section status 6 -->
    <div id="show_cancelled" style="display:none">
      <table class="table table-bordered" id="" width="100%">
        <?= form_open('orders/store_cancel_order') ?>
        <tr>
          <th>Reasons :</th>
        </tr>
        <tr>
          <td><?= form_textarea('reasons','',array('class'=>'form-control uppercase','required'=>'')) ?></td>
        </tr>
        <tr>
          <?= form_hidden('order_id', $orders['order_id']) ?>
          <?= form_hidden('buyer_email', $orders['email']) ?>
          <?= form_hidden('seller_id', $seller_id) ?>
          <?= form_hidden('owner_id', $orders['created_by']);
          foreach ($order_status as $key) {
            if($key['order_id']==$this->uri->segment(3) && $key['seller_id']==$this->uri->segment(4))
            {
              echo form_hidden('order_status_id',$key['order_status_id']);
            }
          } ?>
          <td colspan="3" class="text-right"><input type="submit" name="submitStatus6" id="submitStatus6" value="Update" class="btn btn-primary" ></td>
        </tr>
        <?= form_close(); ?>
      </table>
    </div>
    <!-- close section status 6 -->

    <table class="table table-bordered" id="" width="100%">
      <thead>
        <tr>
          <th>Item</th>
        <?php if(!empty($siri) || $siri[0]['seller_id']==$seller_id){ ?>
          <th class="text-center">Siri No.</th>
        <?php } ?>
          <th class="text-center">Cost</th>
          <th class="text-center">Qty</th>
          <th class="text-center">Total</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if(!empty($items)){
          $total_modal_price = 0;
          $total_service_charge = 0;
          $n_subtotal=0;
          foreach ($items as $key) {
            if($key['seller_id']==$seller_id) { ?>
                <tr>
                  <td>
                    <?php echo $key['product_name'].'&nbsp;[ '.$key['item_code'].' ] - '.$key['weight'].' g' ?>
                    <br>Seller : <?= $key['cfl']==1 ? $key['cfl_shop'].' / ' : '' ?> <?= $key['shop_name'] ?>
                    <?php if ($seller_id == 1 || $key['cfl']== 1) { ?>
                      <br>From : <?php echo $key['referrel'] ?> 
                      <?php if ($key['seller_price']) {

                        $comm = ($key['ordered_price'] - $key['seller_price']) * ($commission['referrel']/100);
                        $comm2 = ($key['ordered_price'] - $key['seller_price']) * ($commission['member']/100);
                        $rebate = ($key['seller_price'] - $key['modal_price']) * ($commission['rebate']/100);

                        echo "<span> | Commission = ".$currency['tag']." ".($currency['show_decimal']==1 ? number_format($comm,2, '.', $currency['separate']) : substr(number_format($comm,2, '.', $currency['separate']), 0 ,-3))."</span>";
                        echo "<br> Referral : ".$key['refer_fullname'];
                        echo "<span> | Commission = ".$currency['tag']." ".($currency['show_decimal']==1 ? number_format($comm2,2, '.', $currency['separate']) : substr(number_format($comm2,2, '.', $currency['separate']), 0 ,-3))."</span>";
                        echo "<br><span> Rebate = ".$currency['tag']." ".($currency['show_decimal']==1 ? number_format($rebate,2, '.', $currency['separate']) : substr(number_format($rebate,2, '.', $currency['separate']), 0 ,-3))."</span>";

                        $total_modal_price += number_format($key['modal_price'], 2, '.', '');
                      }
                    }else {
                      $fee = number_format($key['subtotal'],2, '.', '');

                      $charge = $this->admin_model->check_charge($fee);

                      $total_charge = number_format(($fee * (number_format($charge,2, '.', '')/100)),2, '.', '');

                      if ($total_charge <=  $commission['min_sc']) {
                        $total_service_charge += $commission['min_sc'];
                      }else {
                        $total_service_charge += $total_charge;
                      }
                      $total_modal_price += $fee;

                      echo "<br><span>Service Charge = ".$currency['tag']." ".($currency['show_decimal']==1 ? number_format($total_service_charge,2, '.', $currency['separate']) : substr(number_format($total_service_charge,2, '.', $currency['separate']), 0 ,-3))."</span>";
                      
                    } ?>
                  </td>

                  <?php if(!empty($siri) && $siri[0]['seller_id']==$seller_id){ ?> 

                  <td class="text-center">
                    <?php
                    $s=0;
                    foreach ($pid as $key1) {
                      $i=$key1['total'];
                      foreach ($siri as $value_siri) {
                        if($key1['product_id']==$value_siri['product_id'] && $value_siri['product_id']==$key['product_id']){
                          echo $value_siri['serial_no'];
                          $s++;
                          if($i-1!=0){
                            echo ' , ';
                            $i--;
                          }
                          if($s>2){
                            echo "<br>";$s=0;
                          }
                        }
                      }
                    }
                    ?>
                  </td>
                <?php } ?>
                  <td class="text-center"><?= $currency['tag'].' '.($currency['show_decimal']==1 ? number_format($key['ordered_price'],2, '.', $currency['separate']) : substr(number_format($key['ordered_price'],2, '.', $currency['separate']), 0 ,-3)) ?></td>
                  <td class="text-center"><?= $key['qty'] ?></td>
                  <td class="text-center"><?= $currency['tag'].' '.($currency['show_decimal']==1 ? number_format($key['subtotal'],2, '.', $currency['separate']) : substr(number_format($key['subtotal'],2, '.', $currency['separate']), 0 ,-3)) ?></td>
                </tr>
                <?php
                $n_subtotal=$n_subtotal+$key['subtotal'];

            }
          }
        }

        echo "<input type='hidden' value='".$total_modal_price."' id='modalPrice'>";
        echo "<input type='hidden' value='".($currency['show_decimal']==1 ? number_format($total_service_charge,2, '.', $currency['separate']) : substr(number_format($total_service_charge,2, '.', $currency['separate']), 0 ,-3))."' id='service_charge'>";

        $total_order_seller = 0;
        $total_order_seller = $n_subtotal+$order_status[0]['shipping_seller'];
        ?>
        <tr>
          <?php if(!empty($siri) && $siri[0]['seller_id']==$seller_id){
            echo '<td colspan="4" class="text-right"><b>Total Shipping</b></td><td colspan="4" class="text-center"><b>'.$currency['tag'].' '.($currency['show_decimal']==1 ? number_format($order_status[0]['shipping_seller'],2, '.', $currency['separate']) : substr(number_format($order_status[0]['shipping_seller'],2, '.', $currency['separate']), 0 ,-3)).'</b></td>';
            echo '<input type="hidden" id="totalShip" value="'.number_format($order_status[0]['shipping_seller'],2, '.', '').'">';
          }else{
            echo '<td colspan="3" class="text-right"><b>Total Shipping</b></td><td colspan="3" class="text-center"><b>'.$currency['tag'].' '.($currency['show_decimal']==1 ? number_format($order_status[0]['shipping_seller'],2, '.', $currency['separate']) : substr(number_format($order_status[0]['shipping_seller'],2, '.', $currency['separate']), 0 ,-3)).'</b></td>';
            echo '<input type="hidden" id="totalShip" value="'.number_format($order_status[0]['shipping_seller'],2, '.', '').'">';
          } ?>
        </tr>
        <tr>
          <?php if(!empty($siri) && $siri[0]['seller_id']==$seller_id){
            echo '<td colspan="4" class="text-right"><b>Net Total</b></td><td colspan="4" class="text-center"><b>'.$currency['tag'].' '.($currency['show_decimal']==1 ? number_format($total_order_seller,2, '.', $currency['separate']) : substr(number_format($total_order_seller,2, '.', $currency['separate']), 0 ,-3)).'</b></td>';
          }else{
            echo '<td colspan="3" class="text-right"><b>Net Total</b></td><td colspan="3" class="text-center"><b>'.$currency['tag'].' '.($currency['show_decimal']==1 ? number_format($total_order_seller,2, '.', $currency['separate']) : substr(number_format($total_order_seller,2, '.', $currency['separate']), 0 ,-3)).'</b></td>';
          } ?>
        </tr>
      </tbody>
    </table>
    <?php

      if(!empty($siri) && $siri[0]['seller_id']==$seller_id){
        echo anchor('orders/print_order/'.$orders['order_id'].'/'.$seller_id, '<i class="fa fa-print"></i>Print', array('class'=>'btn btn-success','target'=>'_blank'));
      }
      if(($user_profile['user_group']==0 || $user_profile['user_group']==1) && $order_status[0]['order_status']==5){
        foreach ($order_status as $key) {
          if($key['order_id']==$this->uri->segment(3) && $key['seller_id']==$this->uri->segment(4))
          {
            $arr_data=array('order_status_id'=>$key['order_status_id'],'next_transaction'=>$key['next_transaction'],'email'=>$orders['email']);
          }
        }
        $n_data=json_encode($arr_data);
        echo anchor('orders/notify_seller?order_id='.$orders['order_id'].'&seller_id='.$seller_id.'&json='.urlencode($n_data), '<i class="fa fa-speaker"></i>Notify Seller', array('class'=>'btn btn-warning'));

      }
      if($order_status[0]['order_status']==5){ ?>
        <p class="text-danger">*Note : Waiting admin to verify payment and notify seller.</p><?php
      }
      if($order_status[0]['order_status']==3){ ?>
        <p class="text-danger">*Note : Waiting for customer to receive the order within <?php echo $due['day_to_complete'] ?> days.<br>Once order completed and received in good condition, admin will transfer money to seller.</p><?php
      }

      if($user_profile['user_group']==0 || $user_profile['user_group']==1){
        foreach ($order_status as $key) {
        if($key['order_status']>=1 && $key['order_status']<=2)
          { ?>
            <p class="text-danger">*Note : Please make sure shipping out items before <b><?php echo date('d/m/y',strtotime($order_status[0]['next_transaction'])) ?></b> or order will be cancel automatically.</p>
            <?php
          }
        }
      }else{
        if($order_status[0]['order_status']>=1 && $order_status[0]['order_status']<=2){ ?>
          <p class="text-danger">*Note : Please make sure shipping out items before <b><?php echo date('d/m/y',strtotime($order_status[0]['next_transaction'])) ?></b> or order will be cancel automatically.</p>
          <?php
        }
      }
      if($release['pay_amount']=='' && $order_status[0]['order_status'] ==4 && ($user_profile['user_group']==0 || $user_profile['user_group']==1 || $user_profile['user_group']==3)){ ?>
        <a class="btn btn-warning" id="btnreleasePayment" data-toggle="modal" href="#releasePayment">Release Payment</a>
        <p class="text-danger">*Note : Please release the payment to seller after order status is completed and update the status here.</p><?php
      } else if($release['pay_amount']=='' && $order_status[0]['order_status'] ==4 && $user_profile['user_group'] > 1){ ?>
        <p class="text-danger">*Note : Waiting for admin to release the payment.</p><?php
      }else if($release['pay_amount']!='' && $order_status[0]['order_status'] ==4 && ($user_profile['user_group']==0 || $user_profile['user_group']==1)){ ?>
        <a class="btn btn-default" data-toggle="modal" id="btnreleasePayment" href="#releasePayment">Release Payment Complete</a>
        <?php
      }
      else if($release['pay_amount']!='' && $order_status[0]['order_status'] ==4 && $user_profile['user_group'] > 1){ ?>
        <a class="btn btn-default" data-toggle="modal" id="btnreleasePayment" href="#releasePayment">Release Payment Complete</a><?php
      } 
      if($order_status[0]['order_status']==6) { ?>
        <div class="note note-warning">
          <p><strong>Reasons :</strong><br>
            <?= $order_status[0]['cancelled_desc'] ?>
          </p>
        </div>
      <?php } ?>
  </div>
</div>

<!-- Modal view pay slip -->
<div class="modal fade bs-modal-xl" id="viewPayReceipt" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">View Payment Receipt</h4>
      </div>
      <div class="modal-body" class="form-horizontal">
        <div class="form-group">
          <div class="col-md-4">
            <label class="control-label">Bank Name</label>
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control" name="bank_name" value="<?= $orders['reference_note'] ?>" readonly>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4">
            <label class="control-label">Receipt Image</label>
          </div>
          <div class="col-md-8">
            <?php
            $extension = pathinfo($orders['att_file'], PATHINFO_EXTENSION);
            if($extension=='pdf'){
              echo anchor('orders/download/'.$orders['att_file'], 'Download Here', array(''));
            }else{
              echo '<img src="'.base_url('/payment_receipt/').$orders['att_file'].'" width="300px" height="350px">';
            }
            ?>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>

      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


<div class="modal fade bs-modal-xl" id="releasePayment" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Release Payment Status</h4>
      </div>
      <div class="modal-body form-horizontal">
        <?php echo form_open('orders/upd_release_pay', array('class'=>'')); ?>
        <div class="form-group">
          <div class="col-md-4">
            <label class="control-label">Total Modal (<?= $currency['tag'] ?>)</label>
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control" id="showModal" readonly>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4">
            <label class="control-label">Total Shipping (<?= $currency['tag'] ?>)</label>
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control" id="showShip" readonly>
          </div>
        </div>
        <div class="form-group" id="show_charge" style="display:none">
          <div class="col-md-4">
            <label class="control-label">Service Charge (<?= $currency['tag'] ?>)</label>
          </div>
          <div class="col-md-8">
            <input type="text" class="form-control" id="get_service_get" name="pay_sc" readonly>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4">
            <label class="control-label">Payment Amount (<?= $currency['tag'] ?>)</label>
          </div>
          <div class="col-md-8">
            <?php if($release['pay_amount']!=''){ ?>
              <input type="text" class="form-control" id="releasePayAmount" value="<?= ($currency['show_decimal']==1 ? number_format($release['pay_amount'],2, '.', $currency['separate']) : substr(number_format($release['pay_amount'],2, '.', $currency['separate']), 0 ,-3)) ?>" name="pay_amount" readonly>
            <?php }else{ ?>
              <input type="text" class="form-control" id="releasePayAmount" name="pay_amount" required>
            <?php } ?>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4">
            <label class="control-label">Payment Date</label>
          </div>
          <div class="col-md-8">
            <?php if($release['pay_amount']!=''){ ?>
              <input type="text" class="form-control" value="<?php echo date('d/m/Y',strtotime($release['ref_date'])) ?>" name="ref_date" readonly>
            <?php }else{ ?>
              <input type="date" class="form-control" name="ref_date" required>
            <?php } ?>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4">
              <label class="control-label">Reference Note</label>
          </div>
          <div class="col-md-8">
            <?php if($release['pay_amount']!=''){
              echo form_textarea('ref_note',nl2br($release['ref_note']),array('readonly'=>'','class'=>'form-control'));
            }else{
              echo form_textarea('ref_note',nl2br($release['ref_note']),array('required'=>'','class'=>'form-control'));
            } ?>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="order_id" value="<?= $orders['order_id'] ?>">
        <input type="hidden" name="seller_id" value="<?= $seller_id ?>">
        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
        <?php if($release['pay_amount']==''): ?>
        <input type="submit" name="submit" class="btn green" value="Submit">
      <?php endif; ?>
      </div>
      <?= form_close(); ?>
    </div>
  </div>
</div>


<?php
  if(!empty($order_status)){
    foreach ($order_status as $os) {
      if($os['seller_id']==$seller_id)
      {
        $new_order=array('seller_id'=>$os['seller_id'],'status'=>$os['order_status']);
      }
    }
  }
 ?>
<script>

$(document).ready(function(){

  const sc = -Math.abs(document.querySelector('#service_charge').value);

  if (sc != '') {
    document.getElementById("show_charge").style.display="";
    document.querySelector('#get_service_get').value = RoundNum(sc,2);
  }

});
  
  function set_productsiri(){
    var select_status=$('#status').val();
    var status="<?= $new_order['status'] ?>";
    var group ="<?= $user_profile['user_group'] ?>";

    if(status=='1'){
      $('#show_tracking').hide();
    }
    if(status=='1' && select_status=='2'){
      $('#show_siriproduct').show();
      $('#show_tracking').hide();
      $('#show_cancelled').hide();
    }
    if(status=='1' && select_status=='6'){
      $('#show_siriproduct').hide();
      $('#show_cancelled').show();
    }
    if(status=='1' && (select_status=='1' || select_status=='3' || select_status=='4')){
      $('#show_siriproduct').hide();
      $('#show_tracking').hide();
      $('#show_cancelled').hide();
    }
    if(status=='2' && select_status=='3'){
      $('#show_tracking').show();
    }
    if(status=='2' && select_status=='6' && group!='2'){
      $('#submitStatus').show();
    }
    if(status=='2' && (select_status=='1' || select_status=='2' || select_status=='4' || select_status=='6')){
      $('#show_tracking').hide();
    }
    if(status=='3' && select_status=='4' && group!='2'){
        alert('Please make sure release a payment to seller after updating the status.');
      $('#submitStatus').show();
    }
    if(status=='3' && select_status=='6' && group!='2'){
      $('#submitStatus').show();
    }
    if(status=='3' && (select_status=='1' || select_status=='2' || select_status=='3' || select_status=='6')){
      $('#submitStatus').hide();
    }

  }

  function RoundNum( num, precision ) {
    return (+(Math.round(+(num + 'e' + precision)) + 'e' + -precision)).toFixed(precision);
  }

  $(document).on('click', '#btnreleasePayment', function () {

    const total_modal = Number(document.getElementById('modalPrice').value);
    const total_ship = Number(document.getElementById('totalShip').value);
    const service_charge = -Math.abs(document.getElementById('service_charge').value);

    const x = total_modal + total_ship + service_charge;

    document.getElementById('releasePayAmount').value = separate(x);
    document.getElementById('showModal').value = separate(total_modal);
    document.getElementById('showShip').value = separate(total_ship);

  });
</script>
