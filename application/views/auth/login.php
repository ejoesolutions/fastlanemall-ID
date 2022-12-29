<?php echo form_open('user/login', array('class'=>'login-form')); ?>

  <h3 class="form-title font-green">Sign In</h3>
  <hr>
  <!-- <?php if ($message): ?>
    <div class="alert alert-danger">
      <button class="close" data-close="alert"></button>
      <span> <?php echo $message;?> </span>
    </div>
  <?php endif; ?> -->

  <div class="alert alert-danger display-hide">
    <button class="close" data-close="alert"></button>
    <span> Fill Username/Email and Password. </span>
  </div>
  <div class="form-group">
    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
    <label class="control-label visible-ie8 visible-ie9">Username</label>
    <?php echo form_input($identity);?>
    <!-- <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="identity" /> -->
  </div>
  <div class="form-group">
    <label class="control-label visible-ie8 visible-ie9">Password</label>
    <input class="form-control form-control-solid placeholder-no-fix" type="password" name="password" autocomplete="off" placeholder="Password" name="password" />
  </div>
  <div class="form-actions">
    <?php echo form_submit('submit', 'Login', array('class'=>'btn green uppercase')); ?>
    <label class="rememberme check mt-checkbox mt-checkbox-outline">
      <input type="checkbox" name="remember" value="1" />Remember
      <span></span>
    </label>
    <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>

  </div>

<?php echo form_close(); ?>

<?php echo form_open('user/forgot_password', array('class'=>'forget-form')) ?>
  <h3 class="font-green">Forget Password ?</h3>
  <p> Enter your username/registered email below to reset your password. </p>
  <div class="form-group">
    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username/Email" name="identity" />
  </div>
  <div class="form-actions">
    <button type="button" id="back-btn" class="btn green btn-outline">Back</button>
    <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
  </div>
<?php echo form_close(); ?>
