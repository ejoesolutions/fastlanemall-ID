<html>
<head>
	<meta charset="utf-8" />
  <title>Fastlanemall</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1" name="viewport" />
  <meta content="Special application for distribute your business" name="description" />

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<!------ Include the above in your HEAD tag ---------->

	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	 <style>
	 .form-gap {
 	 		padding-top: 70px;
		}
		body{
			background-color: black;
		}
	 </style>
	 <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url('assets/logo'); ?>/bar-logo.png">
   <link rel="apple-touch-icon" sizes="60x60" href="<?php echo base_url('assets/logo'); ?>/bar-logo.png">
   <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url('assets/logo'); ?>/bar-logo.png">
   <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url('assets/logo'); ?>/bar-logo.png">
   <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url('assets/logo'); ?>/bar-logo.png">
   <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url('assets/logo'); ?>/bar-logo.png">
   <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url('assets/logo'); ?>/bar-logo.png">
   <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url('assets/logo'); ?>/bar-logo.png">
   <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/logo'); ?>/bar-logo.png">
   <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo base_url('assets/logo'); ?>/bar-logo.png">
   <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('assets/logo'); ?>/bar-logo.png">
   <link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url('assets/logo'); ?>/bar-logo.png">
   <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/logo'); ?>/bar-logo.png">
   <link rel="manifest" href="<?php echo base_url('assets/logo'); ?>/manifest.json">
   <meta name="msapplication-TileColor" content="#ffffff">
   <meta name="msapplication-TileImage" content="<?php echo base_url('assets/logo'); ?>/bar-logo.png">
   <meta name="theme-color" content="#ffffff">
</head>
<body bgcolor="#E6E6FA">

 <div class="form-gap"></div>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>You can reset your password here.</p>
                  <div class="panel-body">
										<div id="infoMessage"><?php echo $message;?></div>
                    <?php echo form_open('auth/reset_password/' . $code);?>

                      <div class="form-group">
                        <div class="input-group">
                          <label for="new_password"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></label>
                          <?php echo form_input($new_password);?>
                        </div>
                      </div>
											<div class="form-group">
                        <div class="input-group">
                          <label for="new_password"><?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?></label>
                          <?php echo form_input($new_password_confirm);?>
                        </div>
                      </div>
											<!-- <div class="form-group">
                        <div class="input-group">
													<?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?> <br />
													<?php echo form_input($new_password_confirm);?>
                        </div>
                      </div> -->
                      <div class="form-group">
												<?php echo form_input($user_id);?>
												<?php echo form_hidden($csrf); ?>
												<!-- <p><?php echo form_submit('submit', lang('reset_password_submit_btn'));?></p> -->
                        <input name="submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                      </div>
                    <?php echo form_close();?>

                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
<!-- <h1><?php echo lang('reset_password_heading');?></h1>

<div id="infoMessage"><?php echo $message;?></div>

<?php echo form_open('auth/reset_password/' . $code);?>

		<p>
		<label for="new_password"><?php echo sprintf(lang('reset_password_new_password_label'), $min_password_length);?></label> <br />
		<?php echo form_input($new_password);?>
	</p>

	<p>
		<?php echo lang('reset_password_new_password_confirm_label', 'new_password_confirm');?> <br />
		<?php echo form_input($new_password_confirm);?>
	</p>

	<?php echo form_input($user_id);?>
	<?php echo form_hidden($csrf); ?>

	<p><?php echo form_submit('submit', lang('reset_password_submit_btn'));?></p>

<?php echo form_close();?> -->
<body></html>
