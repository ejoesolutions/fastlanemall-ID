<h1><?php echo lang('forgot_password_heading');?></h1>
<?php if ($message): ?>
  <div class="text-danger text-center">
    <p class="">
      <?php echo $message;?>
    </p>
    <hr>
  </div>
<?php endif; ?>

<?php echo form_open('user/forgot_password');?>

<p> Enter your username/registered email below to reset your password. </p>
<div class="form-group">
  <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username/Email" name="identity" />
</div>
<div class="form-actions">
  <?php echo anchor('user/login', 'Back', array('class'=>'btn green btn-outline')) ?>
  <!-- <button type="button" id="back-btn" class="btn green btn-outline">Back</button> -->
  <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
</div>


<?php echo form_close();?>
