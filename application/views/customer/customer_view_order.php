<style>
.note {
	margin: 0 0 20px 0;
	padding: 15px 30px 15px 15px;
	border-left: 5px solid #eee;
	-webkit-border-radius: 0 2px 2px 0;
	-moz-border-radius: 0 2px 2px 0;
	-ms-border-radius: 0 2px 2px 0;
	-o-border-radius: 0 2px 2px 0;
	border-radius: 0 2px 2px 0; }
	.note h1,
	.note h2,
	.note h3,
	.note h4,
	.note h5,
	.note h6 {
		margin-top: 0; }
		.note h1 .close,
		.note h2 .close,
		.note h3 .close,
		.note h4 .close,
		.note h5 .close,
		.note h6 .close {
			margin-right: -10px; }
	.note p {
		margin: 0;
		font-size: 13px; }
		.note p:last-child {
			margin-bottom: 0; }
	.note code,
	.note .highlight {
		background-color: #fff; }
	.note.note-default {
		background-color: white;
		border-color: #b0c1d2;
		color: black; }
		.note.note-default.note-bordered {
			background-color: #eef1f5;
			border-color: #c0cedb; }
		.note.note-default.note-shadow {
			background-color: #f1f4f7;
			border-color: #d1dbe4;
			box-shadow: 5px 5px rgba(212, 221, 230, 0.2); }
	.note.note-success {
		background-color: #c0edf1;
		border-color: #58d0da;
		color: black; }
		.note.note-success.note-bordered {
			background-color: #a7e6ec;
			border-color: #6dd6df; }
		.note.note-success.note-shadow {
			background-color: #abe7ed;
			border-color: #81dbe3;
			box-shadow: 5px 5px rgba(134, 221, 228, 0.2); }
	.note.note-info {
		background-color: #f5f8fd;
		border-color: #8bb4e7;
		color: #010407; }
		.note.note-info.note-bordered {
			background-color: #dbe8f8;
			border-color: #a0c2ec; }
		.note.note-info.note-shadow {
			background-color: #e0ebf9;
			border-color: #b5cff0;
			box-shadow: 5px 5px rgba(185, 210, 241, 0.2); }
	.note.note-warning {
		background-color: #faeaa9;
		border-color: #f3cc31;
		color: black; }
		.note.note-warning.note-bordered {
			background-color: #f8e38c;
			border-color: #f4d249; }
		.note.note-warning.note-shadow {
			background-color: #f9e491;
			border-color: #f6d861;
			box-shadow: 5px 5px rgba(246, 217, 102, 0.2); }
	.note.note-danger {
		background-color: #fef7f8;
		border-color: #f0868e;
		color: #210406; }
		.note.note-danger.note-bordered {
			background-color: #fbdcde;
			border-color: #f39da3; }
		.note.note-danger.note-shadow {
			background-color: #fbe1e3;
			border-color: #f6b3b8;
			box-shadow: 5px 5px rgba(246, 184, 189, 0.2); }

.note {
	-webkit-border-radius: 2px;
	-moz-border-radius: 2px;
	-ms-border-radius: 2px;
	-o-border-radius: 2px;
	border-radius: 2px;
	border: 0; }
</style>
<div class="row">
	<div class="col-md-2">
		<?php $this->load->view('includes/side_menu_cust') ?>
	</div>

	<div class="col-md-10">
		<h4>Order Details #<?= $orders['order_id'].' [ '.date('d/m/Y',strtotime($orders['created_date'])) ?> ]</h4>
		<?php

		$f=0;
		foreach ($order_status as $key) {
			if($key['order_status']<2)
			{
				$f++;
			}
		}
		if($f > 0) { ?>
			<a class="btn btn-danger" data-toggle="modal" href="#cancel_modal" style="margin-right: 10px;"> Cancel Order </a>
		<?php }

		if($orders['payment_type']=='Online Banking' && $orders['payment_date']=='') { ?>
			<a class="btn btn-primary" href="https://dev.toyyibpay.com/<?= $orders['bill_id'] ?>"> Pay Now </a>
		<?php } ?>
		
		<hr>
		<table class="table" border=0  width="100%" >
			<thead>
				<th>PRODUCT</th>
				<th>TOTAL</th>
			</thead>
			<tbody>
				<?php
				$i=1;
				$sub=0;
				if(!empty($items)){
					foreach ($items as $key) { ?>
						<tr>
							<td><?= $key['product_name'].' [ '.$key['item_code'].' ] x '.$key['qty'] ?>
								<br><?= $key['shop_name'] ?>
							</td>
							<td><?php
							$sub= $sub + $key['subtotal'];
							echo $currency['tag'].' '.($currency['show_decimal']==1 ? number_format($key['subtotal'],2, '.', $currency['separate']) : substr(number_format($key['subtotal'],2, '.', $currency['separate']), 0 ,-3)) ?></td>
						</tr>
						<?php
					}
				}
				?>
				<tr>
					<td>Shipping Cost :</td>
					<td><?= $currency['tag'].' '.($currency['show_decimal']==1 ? number_format($orders['total_shipping'],2, '.', $currency['separate']) : substr(number_format($orders['total_shipping'],2, '.', $currency['separate']), 0 ,-3)); ?></td>
				</tr>
				<tr>
					<td>Payment Method :</td>
					<td><?= $orders['payment_type']; ?></td>
				</tr>
				<?php
				if($orders['payment_type']=='Cash Deposit'){ ?>
					
				<?php } ?>

				<?php if(!empty($track)){ ?>
					<tr>
						<td>
							Shipping :
						</td>
						<td>
							<b>
								<?php
								foreach ($order_status as $key) {
									foreach ($track as $key2) { ?>
									<?php if($key['seller_id']==$key2['seller_id']) { ?>
											<button onclick="linkTrack('<?= $key2['tracking_code'] ?>')">TRACK ORDER</button>
											<?= '<br>'.$key2['courier_name'].' ( Tracking No '.$key['shop_name'].' : '.$key2['tracking_code'].' )<br>';
											if($key['order_status']!=4) { ?>
												<a href="#" class="btn btn-warning" onclick="location.href='<?= base_url('orders/receive_by_cust/'.$key2['order_id'].'/'.$key['order_status_id'].'/'.$key2['seller_id'].'/'.$user_profile['id']) ?>';" style="margin-top:10px">Order Received</a>
												<br>
											<?php }
										}
									}
								} ?>
						</td>
					</tr>
				<?php } ?>
				<tr>
					<td><b>Total :</b></td>
					<td>
						<?= '<b>'.$currency['tag'].' '.($currency['show_decimal']==1 ? number_format($orders['total_all'],2, '.', $currency['separate']) : substr(number_format($orders['total_all'],2, '.', $currency['separate']), 0 ,-3)).'</b>'; ?>
					</td>
				</tr>
			</tbody>
		</table>
			<div class="note note-warning">
				<p> <strong>Cancellation Orders: </strong> <br>
					<?php
						foreach ($order_status as $key) {
							if($key['order_status']==6) {
								echo 'Shop : '.$key['shop_name'];
								echo '<br>Reasons : '.$key['cancelled_desc'];
								echo '<br><br>';
							}
						}
					?>
				</p>
			</div>
		<br>
		<table class="table" border=0  width="100%" >
			<thead>
				<th>Shipping Address</th>
			</thead>
			<tbody>
				<?php
				$i=1;
				$sub=0;
				?>
				<tr>
						<td><?php
						echo $orders['ship_name'].'<br>';
						echo $orders['ship_address'].'<br>'.$orders['ship_postcode'].' '.$orders['ship_area'].', '
						// .$orders['ship_state'].'<br>'
						;
						echo $orders['ship_phone'];
						?>
						<br>
					</td>
				</tr>

			</tbody>
		</table>
	</div>

	<!-- edit billing address -->

	<!-- edit shipping address -->

	<div class="modal fade bs-modal-xl" id="submitPayReceipt" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">Upload Payment Receipt</h4>
				</div>
				<div class="modal-body">
					<?= form_open_multipart('orders/store_payment_receipt', array('class'=>'form-horizontal')); ?>
					<div class="form-group">
						<div class="col-md-4">
							<label class="control-label">Bank Name</label>
						</div>
						<div class="col-md-8">
							<input type="text" class="form-control" name="bank_name" list="bank-list" required>
							<datalist id="bank-list">
								<?php foreach ($bank as $k) { ?>
									<option value="<?= $k['reference_note'] ?>"><?= $k['reference_note'] ?></option>
								<?php } ?>
							</datalist>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-4">
							<label class="control-label">Receipt Image</label>
						</div>
						<div class="col-md-8">
							<input type="file" name="att_file" class="form-control" accept="image/tiff,image/jpeg,image/x-png,application/pdf" required>
							<span class="text-danger">Max size 500KB</span>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<?php
					foreach ($order_status as $k) {
						echo form_hidden('order_status_id[]',$k['order_status_id']);
						echo form_hidden('seller_id[]',$k['seller_id']);
					}
					?>
					<?= form_hidden('order_id',$orders['order_id']) ?>
					<?= form_hidden('payment_id',$orders['payment_id']) ?>
					<button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-success">Submit</button>
				</div>
				<?= form_close() ?>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>

	<div class="modal fade bs-modal-xl" id="viewPayReceipt" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">View Payment Receipt</h4>
				</div>
				<div class="modal-body">
					<?= form_open('', array('class'=>'form-horizontal')); ?>
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
								//echo '<img src="'.base_url('/payment_receipt/').$orders['att_file'].'" width="300px" height="350px">';
								?>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
					<?= form_close(); ?>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>

	<div class="modal fade in" id="cancel_modal" tabindex="-1" role="basic" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">Submit Cancel Order</h4>
				</div>
				<div class="modal-body">
					<div class="row">
						<?= form_open('orders/cancel_order_by_cust', array()); ?>
						<div class="col-md-12 form-horizontal">
							<div class="form-group">
								<label class="control-label col-md-3">Shop</label>
								<div class="col-md-9">
									<select name="seller_id" class="form-control input-sm">
										<?php
										foreach ($order_status as $key) {
											if($key['order_status'] < 2)
											{ ?>
												<option value="<?= $key['seller_id'].','.$key['order_status_id'] ?>"><?= $key['shop_name'] ?></option>
												<?php
											}
										}
											?>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label class="control-label col-md-3">Reasons</label>
								<div class="col-md-9">
									<input type="text" class="form-control input-sm" id="reasons" name="reasons" required>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="order_id" value="<?= $orders['order_id'] ?>">
					<input type="submit" name="submit" class="btn btn-success" value="Submit">
					<button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
				</div>
			</div>
			<?= form_close(); ?>
		</div>
	</div>

</div>
<script src="//www.tracking.my/track-button.js"></script>
<script>
  function linkTrack(num) {
    TrackButton.track({
      tracking_no: num
    });
  }
</script>