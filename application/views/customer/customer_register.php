<div class="row">
	<div class="col-md-6">
		<div class="">
			<div class="section-title">
				<h3 class="">Already a Member? Login</h3>
			</div>
			<?= form_open('member/login',array('class'=>'clearfix')) ?>
			<div class="form-group">
				<label class="control-label">Username</label>
				<input class="form-control" type="text" name="identity" placeholder="Username/Email" required autocomplete="off">
			</div>
			<div class="form-group">
				<label class="control-label">Password</label>
				<input class="form-control" type="password" name="password" placeholder="Password" required autocomplete="new-password">
			</div>
			<div class="form-group">
				<table width="100%">
					<tr>
						<td><button type="submit" class="btn btn-green-no" name="submit">Login</button></td>
						<td align="right">Forgot Password? <a class="" data-toggle="modal" href="#forgotPswd"><b>Reset Here<b></a></td>
					</tr>
				</table>
			</div>
			<?= form_close() ?>
	</div>

	<div class="modal fade bs-modal-xl" id="forgotPswd" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
					<h4 class="modal-title">Reset Password</h4>
				</div>
				<div class="modal-body">
					<p>Enter your username/registered email below to reset your password. </p>
					<?= form_open('user/forgot_password',array('class'=>'form-horizontal')) ?>
					<div class="form-group">
						<div class="col-md-4">
							<label class="control-label">Username/Email</label>
						</div>
						<div class="col-md-8">
							<input type="text" class="form-control" name="identity" required>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<?= form_hidden('user_group',2); ?>
					<button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-success">Submit</button>
				</div>
				<?= form_close() ?>
			</div>
		</div>
	</div>

</div>

	<div class="col-md-6">
		<?= form_open('',array('class'=>'clearfix')) ?>
		<div class="billing-details">
			<div class="section-title">
				<h3 class="">Create Account</h3>
			</div>
			<div class="form-group">
				<?= form_input($full_name); ?>
				<?= form_error('full_name', '<p class="text-danger">', '</p>'); ?>
			</div>
			<?php if($identity_column!=='email') { ?>
				<div class="form-group">
					<?= form_input($identity); ?>
					<?= form_error('identity','<p class="text-danger">', '</p>'); ?>
				</div>
			<?php } ?>
			<div class="form-group">
				<?= form_input($email); ?>
				<?= form_error('email', '<p class="text-danger">', '</p>'); ?>
			</div>
			<div class="form-group">
				<?= form_textarea($address); ?>
				<?= form_error('address', '<p class="text-danger">', '</p>'); ?>
			</div>
			<div class="form-group">
				<?= form_input($postcode); ?>
				<?= form_error('postcode', '<p class="text-danger">', '</p>'); ?>
			</div>
			<div class="form-group">
					<?= form_input($town_area); ?>
					<?= form_error('town_area', '<p class="text-danger">', '</p>'); ?>
			</div>
			<!-- <div class="form-group">
					<?= form_dropdown('state_id', $state, set_value('state_id'), array('class'=>'form-control','required'=>'required')) ?>
			</div> -->
			<div class="form-group">
				<?= form_input($phone); ?>
				<?= form_error('phone', '<p class="text-danger">', '</p>'); ?>
			</div>
			<div class="form-group">
				<?= form_input($refer_member); ?>
				<?= form_error('refer_member', '<p class="text-danger">', '</p>'); ?>
			</div>
			<div class="form-group">
			<?= form_input($password); ?>
			<?= form_error('password','<p class="text-danger">', '</p>'); ?>
		</div>
		<div class="form-group">
			<?= form_input($password_confirm); ?>
			<?= form_error('password_confirm','<p class="text-danger">', '</p>'); ?>
		</div>
			<div class="form-actions">
				<input type="hidden" name="user_group" value="2">
				<input type="hidden" name="active" value="1">
				<button type="submit" id="register-submit-btn" class="btn btn-green-no">Register</button>
			</div>
		</div>
		<?= form_close() ?>
	</div>


</div>
