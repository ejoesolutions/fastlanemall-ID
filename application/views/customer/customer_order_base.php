<div class="row">
					<div class="col-md-4">
            <?php $this->load->view('includes/side_menu_cust') ?>
					</div>

          <div class="col-md-8">
            <h4>My Orders</h4>
            <!-- <a class="btn btn-success" data-toggle="modal" href="#addAddress"> Add New Address </a> -->
            <!-- <button type="button" class="btn btn-success">+ Add New Address</button> -->
            <hr>
            <!-- <?php print_r($orders) ?> -->
            <table class="table" border=0  width="100%" id='sample_1'>
              <thead>
                <th>No.</th>
                <th>Order No.</th>
                <th>Date</th>
                <th>Total</th>
                <th>Status</th>
                <th>Action</th>
              </thead>
              <tbody>
                <?php
                $i=1;

                $arr_Item=[];
								if(!empty($orders)){
									foreach ($orders as $key) {
	                  $countItem=0;
	                  if(!empty($items)){
											foreach ($items as $row) {
		                    if($key['order_id']==$row['order_id']){
		                      $countItem=$countItem+$row['qty'];
		                    }
		                  }
										}
	                  $arr_Item[]=array('order_id'=>$key['order_id'],'total_item'=>$countItem);
	                  ?>
	                  <tr>
	                    <td><?php echo $i++; ?></td>
	                    <td><?php echo $key['order_id']; ?></td>
	                    <td><?php echo date('d/m/Y',strtotime($key['created_date'])) ?></td>
	                    <td>
	                      <?php
	                      echo 'Rp '.number_format($key['total_all'],2).' for ';
	                      for($n=0;$n<count($arr_Item);$n++){
	                        if($arr_Item[$n]['order_id']==$key['order_id']){
	                          echo $arr_Item[$n]['total_item'].' items';
	                        }
	                      }

	                      ?></td>
	                    <td><?php
											//print_r($order_status);
											foreach ($order_status as $k) {
												if($k['order_id']==$key['order_id'])
												{
													echo $k['shop_name'].'<br>[ ';
													if($k['order_status']==0){
														echo 'Upload Pay Receipt';
													}
			                     if($k['order_status']==1){
			                       echo 'On Hold';
			                     }
			                     if($k['order_status']==2){
			                       echo 'Processing';
			                     }
			                     if($k['order_status']==3){
			                       echo 'Delivery';
			                     }
			                     if($k['order_status']==4){
			                       echo 'Completed';
			                     }
													 if($k['order_status']==5){
			                       echo 'Notify Seller';
			                     }
													 if($k['order_status']==6){
			                       echo 'Cancel Order';
			                     }
													 echo ' ]<br>';
												}
											}

	                     ?></td>
	                     <td><?php echo anchor('member/view_order/'.$key['order_id'], '<button type="button" class="primary-btn">View</button>') ?></td>
	                  </tr>
	                  <?php
	                }
								}


                 ?>
              </tbody>
            </table>
					</div>
</div>
