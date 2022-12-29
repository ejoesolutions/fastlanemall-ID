<div class="row">
					<div class="col-md-6">
            <?php echo form_open('orders/store_order', array()) ?>
						<div class="billing-details">
							<div class="section-title">
								<h3 class="title">Billing Details</h3>
							</div>
              <?php //print_r($ship) ?>
							<div class="form-group">
                <label class="control-label">Name</label>
                <input type="text" name="full_name" class="form-control" value="<?php echo $bill['bill_name'] ?>">
							</div>
                <div class="form-group">
                  <label class="control-label">Email</label>
                  <input type="text" name="email" class="form-control" value="<?php echo $bill['bill_email'] ?>">
                </div>

							<div class="form-group">

                <label class="control-label">Address</label>
                <textarea name="address" class="form-control"><?php echo $bill['bill_address'] ?></textarea>
							</div>

							<div class="form-group">

                <label class="control-label">Phone</label>
                <input type="text" name="phone" class="form-control" value="<?php echo $bill['bill_phone'] ?>">
							</div>
						</div>
            <!-- <?php echo form_close() ?> -->
            <input type="checkbox" name="other_ship" id="other_ship" value="1" class="input-checkbox" onclick="my_funct()">Ship to a different address?
            <!-- Add shipping address -->
            <div id="show_ship" style="display:none">
              <div class="billing-details">
  							<div class="section-title">
  								<!-- <h3 class="title">Billing Details</h3> -->
  							</div>
                <?php //print_r($order) ?>
  							<div class="form-group">
                  <label class="control-label">Name</label>
                  <?php
                  if(!empty($ship)){
                    ?><input type="text" name="full_name" class="form-control" value="<?php echo $order['full_name'] ?>"><?php
                  }else{
                    ?><input type="text" name="full_name" class="form-control"><?php
                  }
                   ?>
  							</div>
  							<div class="form-group">
                  <label class="control-label">Address</label>
                  <?php
                  if(!empty($ship)){
                    ?><textarea name="address" class="form-control" value="<?php echo $order['address'] ?>"><?php echo $order['address'] ?></textarea><?php
                  }else{
                    ?><textarea name="address" class="form-control"></textarea><?php
                  }
                   ?>
                </div>
  							<div class="form-group">
                  <label class="control-label">Phone</label>
                  <?php
                  if(!empty($ship)){
                    ?><input type="text" name="phone" class="form-control" value="<?php echo $order['phone'] ?>"><?php
                  }else{
                    ?><input type="text" name="phone" class="form-control" ><?php
                  }
                   ?>
  							</div>
  						</div>
            </div>
					</div>
          <div class="col-md-6">
            <div class="payments-methods">
							<div class="section-title">
								<h4 class="title">Payments Methods</h4>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="payments" id="payments-1" value="Bank Transfer" required>
								<label for="payments-1">Direct Bank Transfer</label>
								<div class="caption">
									<p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.
										<p>
								</div>
							</div>
							<!-- <div class="input-checkbox">
								<input type="radio" name="payments" id="payments-2">
								<label for="payments-2">Cheque Payment</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										<p>
								</div>
							</div> -->
							<div class="input-checkbox">
								<input type="radio" name="payments" id="payments-3" value="DDompet">
								<label for="payments-3">DDompet System</label>
								<div class="caption">
									<p>Make your payment directly using DDompet. Your order will not be shipped until the funds have cleared in our account.
										<p>
								</div>
							</div>
						</div>
          </div>
          <div class="col-md-12">
            <div class="order-summary clearfix">
              <div class="section-title">
                <h3 class="title">MY CART</h3>
              </div>
              <table class="shopping-cart-table table">
                <thead>
                  <tr>
                    <th>Product</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Total</th>
                    <th class="text-right"></th>
                  </tr>
                </thead>
                <tbody>

                  <?php
                  $i = 1;
                  $total_all=0.0;$total_sub=0.0;
                  //print_r($this->cart->contents());
                  foreach ($this->cart->contents() as $items){
                    echo form_hidden($i.'[rowid]', $items['rowid']);
                    ?>
                    <tr>
                      <td class="details">
                        <a href="#"><?php echo $items['name']; ?></a>
                        <ul>
                          <li><span>Code: <?php echo $items['item_code']; ?></span></li>
                          <!-- <li><span>Color: Camelot</span></li> -->
                        </ul>
                      </td>
                      <td class="price text-center"><strong><?php echo 'Rp '.$this->cart->format_number($items['price']); ?></strong></td>
                      <td class="qty text-center">
                        <!-- <button type="button" id="<?php echo $items['rowid']; ?>" class="calc_decs"><<</button>
                        <input type="text" name="qty" class="text-center" min="1" value="<?php echo $items['qty']; ?>" id="input_qty" onchange="upd_val()">
                        <button type="button" id="<?php echo $items['rowid']; ?>" class="calc_inc">>></button> -->
                        <strong><?php echo $items['qty']; ?></strong>
                      </td>
                      <td class="total text-center"><strong class="primary-color">
                        <?php echo 'Rp '.$this->cart->format_number($items['subtotal']); ?>
                        <!-- <div id='subtotal'></div> -->
                      </strong></td>
                      <!-- <td class="text-right"><?php echo anchor('customer/clear_item_cart/'.$items['rowid'], '<span class="fa fa-trash"></span>', array('class'=>'btn btn-danger')); ?></td> -->
                    </tr>

                    <?php
                    $i++;
                    $total_sub=$total_sub+$items['subtotal'];
                    echo form_hidden('item_id[]', $items['id']);
                    echo form_hidden('item_name[]', $items['name']);
                    echo form_hidden('item_price[]', $items['price']);
                    echo form_hidden('item_qty[]', $items['qty']);
                    echo form_hidden('item_subtotal[]', $items['subtotal']);
                }
                   ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th class="empty" colspan="2"></th>
                    <th>SUB-TOTAL</th>
                    <?php $premium=5; ?>
                    <th colspan="2" class="text-center">Rp <?php echo number_format($total_sub,2) ?></th>
                  </tr>
                  <tr>
                    <th class="empty" colspan="2"></th>
                    <th>PREMIUM FEE</th>
                    <?php $premium=5; ?>
                    <th colspan="2" class=" text-center">Rp <?php echo number_format($premium,2) ?></th>
                  </tr>
                  <tr>
                    <th class="empty" colspan="2"></th>
                    <th>SST Tax</th>
                    <?php $sst=5; ?>
                    <td colspan="2" class="text-center">Rp <?php echo number_format($sst,2) ?></td>
                  </tr>
                  <tr>
                    <th class="empty" colspan="2"></th>
                    <th>SHIPPING</th>
                    <td colspan="2" class="text-center">Free Shipping</td>
                  </tr>
                  <tr>
                    <th class="empty" colspan="2"></th>
                    <th class="total">TOTAL</th>
                    <?php
                    $total_all=$total_sub+$premium+$sst;
                     ?>
                    <th colspan="2" class="total text-center">Rp <?php echo number_format($total_all,2) ?></th>
                  </tr>
                </tfoot>
              </table>
              <div class="pull-right">
                <?php echo form_hidden('total_all', $total_all); ?>
                <button class="primary-btn" type="submit">Place Order</button>
              </div>
                <?php echo form_close() ?>
            </div>
          </div>

    </div>
<script>
   function my_funct(){
    var ship = document.getElementById('other_ship');
    if(ship.checked){
      document.getElementById('show_ship').style.display="block";
    }else{
      document.getElementById('show_ship').style.display="none";
    }
  }
</script>
