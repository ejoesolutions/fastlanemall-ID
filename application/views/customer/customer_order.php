

<div class="row">
	<div class="col-md-2">
		<?php $this->load->view('includes/side_menu_cust') ?>
	</div>

	<div class="col-md-10">
	<?= $this->session->flashdata('upload'); ?>
		<h4>My Orders</h4>
		<hr>
		<table class="table text-center" border=0  width="100%" id='sample_1'>
			<thead>
				<th data-priority="1" class="text-center">No.</th>
				<th data-priority="6" class="text-center">Order No.</th>
				<th data-priority="5" class="text-center">Date</th>
				<th data-priority="4" class="text-center">Total</th>
				<th data-priority="3" class="text-center">Status</th>
				<th data-priority="2" class="text-center">Action</th>
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
						$arr_Item[]=array('order_id'=>$key['order_id'],'total_item'=>$countItem); ?>
						<tr>
							<td><?php echo $i++; ?></td>
							<td>#<?php echo $key['order_id']; ?></td>
							<td>
								<?php echo date('d/m/Y',strtotime($key['created_date'])) ?>
								<br>
								<?php echo date('H:i a',strtotime($key['created_date'])) ?>
							</td>
							<td>
								<?php
								echo $currency['tag'].' '.($currency['show_decimal']==1 ? number_format($key['total_all'],2, '.', $currency['separate']) : substr(number_format($key['total_all'],2, '.', $currency['separate']), 0 ,-3)).'<br>for ';
								for($n=0;$n<count($arr_Item);$n++){
									if($arr_Item[$n]['order_id']==$key['order_id']){
										echo $arr_Item[$n]['total_item'].' items';
									}
								} ?>
							</td>
							<td>
								<?php
								foreach ($order_status as $k) {
									if($k['order_id']==$key['order_id'])
									{
										echo $k['shop_name'].'<br>[';
										if($k['order_status']==0 && $key['payment_type']!="Online Banking"){
											echo 'Upload Pay Receipt';
										}else if($k['order_status']==0 && $key['payment_type']=="Online Banking"){
											echo 'To Pay';
										}
										else if($k['order_status']==1){
											echo 'Processing';
										}
										else if($k['order_status']==2){
											echo 'Packing';
										}
										else if($k['order_status']==3){
											echo 'Delivery';
										}
										else if($k['order_status']==4){
											echo 'Completed';
										}
										else if($k['order_status']==5){
											echo 'Notify Seller';
										}
										else if($k['order_status']==6){
											echo 'Cancel Order';
										}
										echo ']<br>';
									}
								} ?>
							</td>
							<td><?php echo anchor('member/view_order/'.$key['order_id'], '<button type="button" class="btn btn-primary">View</button>') ?></td>
						</tr>
						<?php
					}
				} ?>
			</tbody>
		</table>
	</div>
</div>
