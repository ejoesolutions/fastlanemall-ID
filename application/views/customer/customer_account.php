<div class="row">
	<div class="col-md-2">
		<?php $this->load->view('includes/side_menu_cust') ?>
	</div>
	<div class="col-md-10">
		<h4>My Account</h4>
		<table class="table">
			<?php if ($user_profile['verify_image']) { ?>
			<tr>
				<td>Verify IC</td>
				<td>
					<div class="pull-left">
						<img src="<?= base_url('images/verify/'.$user_profile['verify_image']) ?>" style="height: 140px; width: 100%; object-fit: contain">
					</div>
				</td>
			</tr>
			<?php } ?>
			<tr>
				<td>Username</td>
				<td><?= $user_profile['username'] ?></td>
			</tr>
			<tr>
				<td>Member ID</td>
				<td>
					<?= $user_profile['ahli_id'] ?>
				</td>
			</tr>
			<tr>
				<td>Member URL</td>
				<td>
					<a id="copy" class="text-primary"><?= base_url('') ?>member/register/<?= $user_profile['ahli_id'] ?></a>
					<br>
					<span id="copied" class="hidden" style="color: #189ca2">Link Copied</span>
				</td>
			</tr>
			<tr>
				<td>Name</td>
				<td><?= $user_profile['full_name'] ?></td>
			</tr>
			<tr>
				<td>Phone</td>
				<td><?= $user_profile['phone'] ?></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><?= $user_profile['email'] ?></td>
			</tr>
			<tr>
				<td>Address</td>
				<td><?= $user_profile['address'].'<br>'.$user_profile['postcode'].' '.$user_profile['town_area']
				// .'<br>'.$user_profile['state'] ?>
				</td>
			</tr>
		</table>

		<a class="" data-toggle="modal" href="#editAccount"><button class="btn btn-primary">Edit</button></a>

		<!-- edit modal -->
		<div class="modal fade bs-modal-xl" id="editAccount" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
						<h4 class="modal-title">Edit Account</h4>
					</div>
					<div class="modal-body">
						<?= form_open('member/update_account',array('class'=>'form-horizontal')) ?>
						<div class="form-group">
							<div class="col-md-4">
								<label class="control-label">Name</label>
							</div>
							<div class="col-md-8">
								<input type="text" class="form-control" name="full_name" value="<?= $user_profile['full_name'] ?>" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-4">
								<label class="control-label">Phone</label>
							</div>
							<div class="col-md-8">
								<input type="text" class="form-control" name="phone" value="<?= $user_profile['phone'] ?>" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-4">
								<label class="control-label">Email</label>
							</div>
							<div class="col-md-8">
								<input type="email" class="form-control" name="email" value="<?= $user_profile['email'] ?>" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-4">
								<label class="control-label">Address</label>
							</div>
							<div class="col-md-8">
								<textarea name="address" class="form-control" required value="<?= $user_profile['address'] ?>"><?= $user_profile['address'] ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-4">
								<label class="control-label">Postcode</label>
							</div>
							<div class="col-md-8">
								<input type="text" class="form-control" name="postcode" value="<?= $user_profile['postcode'] ?>" required>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-4">
								<label class="control-label">Area</label>
							</div>
							<div class="col-md-8">
								<input type="text" class="form-control" name="town_area" value="<?= $user_profile['town_area'] ?>" required>
							</div>
						</div>
						<!-- <div class="form-group">
							<div class="col-md-4">
								<label class="control-label">State</label>
							</div>
							<div class="col-md-8">
								<?= form_dropdown('state_id',$state,$user_profile['state_id'],array('class'=>'form-control','required'=>'required')) ?>
							</div>
						</div> -->
						<hr>
						<div class="form-group">
							<div class="col-md-4">
								<label class="control-label">Password</label>
							</div>
							<div class="col-md-8">
								<input type="password" class="form-control" name="password">
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-4">
								<label class="control-label">Re-Type Password</label>
							</div>
							<div class="col-md-8">
								<input type="password" class="form-control" name="password_confirm">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<?= form_hidden('user_id',$user_profile['id']) ?>
						<?= form_hidden('ori_email',$user_profile['email']) ?>
						
						<?= form_hidden('ship',$ship_id['shipping_id']) ?>
						<button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-success">Save</button>
					</div>
					<?= form_close() ?>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	const span = document.querySelector("#copy");

	span.onclick = function() {
		document.execCommand("copy");
	}

	span.addEventListener("copy", function(event) {
		event.preventDefault();
		if (event.clipboardData) {
			event.clipboardData.setData("text/plain", span.textContent);
			
			document.getElementById('copied').classList.remove('hidden');
		}
	});
</script>