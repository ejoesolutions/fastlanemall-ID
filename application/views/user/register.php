<div class="portlet box blue">
  <div class="portlet-title">
    <div class="caption">
      <?= $title ?>
    </div>
  </div>
  <div class="portlet-body">
    <div class="row">
      <div class="col-md-12 margin-top-20">
        <?= form_open() ?>

          <div class="form-group">
            <label class="control-label">USER'S CATEGORY</label>
            <?= form_dropdown('user_group', array(''=>'CHOOSE USER','1'=>'ADMIN', '3'=>'STAF'), set_value('user_group'), array('class'=>'form-control','required'=>'required')) ?>
          </div>
          <div class="form-group">
            <label class="control-label">FULL NAME</label>
            <?= form_input($full_name); ?>
            <?= form_error('full_name', '<p class="text-danger">', '</p>'); ?>
          </div>
          <?php if($identity_column!=='email') { ?>
            <div class="form-group">
              <label class="control-label">USERNAME</label>
              <?= form_input($identity); ?>
              <?= form_error('identity','<p class="text-danger">', '</p>'); ?>
            </div>
          <?php } ?>
          <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label">PHONE NO.</label>
            <?= form_input($phone); ?>
            <?= form_error('phone', '<p class="text-danger">', '</p>'); ?>
          </div>
          <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label">ADDRESS</label>
            <?= form_textarea($address); ?>
            <?= form_error('address', '<p class="text-danger">', '</p>'); ?>
          </div>
          <div class="form-group">
            <label class="control-label">POSTCODE</label>
            <?= form_input($postcode) ?>
            <?= form_error('postcode', '<p class="text-danger">', '</p>'); ?>
          </div>
          <div class="form-group">
            <label class="control-label">AREA</label>
            <?= form_input($town_area) ?>
            <?= form_error('town_area', '<p class="text-danger">', '</p>'); ?>
          </div>
          <!-- <div class="form-group">
            <label class="control-label">STATE</label>
            <?= form_dropdown($state_id,$state) ?>
            <?= form_error('state_id', '<p class="text-danger">', '</p>'); ?>
          </div> -->
          <input type="hidden" name="state_id" value="1">
          <hr>
          <!-- <p class="hint"> Maklumat Pengguna Sistem </p> -->
          <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label">EMAIL</label>
            <?= form_input($email); ?>
            <?= form_error('email', '<p class="text-danger">', '</p>'); ?>
          </div>

          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <?= form_input($password); ?>
            <?= form_error('password','<p class="text-danger">', '</p>'); ?>
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD CONFIRpATION</label>
            <?= form_input($password_confirm); ?>
            <?= form_error('password_confirm','<p class="text-danger">', '</p>'); ?>
          </div>
          <hr>

          <div class="form-group">
            <label class="control-label">STATUS</label><br>
            <input type="radio" name="active" value="1" checked="checked">
          </div>
          <div class="form-actions">
            <button type="submit" id="register-submit-btn" class="btn btn-primary">Register</button>
          </div>

        <?= form_close() ?>

      </div>
    </div>
  </div>
</div>
