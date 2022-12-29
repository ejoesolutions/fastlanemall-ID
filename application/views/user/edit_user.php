<div class="portlet box blue">
  <div class="portlet-title">
    <div class="caption">
      <?= $title ?>
    </div>
  </div>
  <div class="portlet-body">
    <?= form_open();?>
    <div class="row">
      <?php if ($user_profile['verify_image']) { ?>
        <div class="col-md-12" style="margin-bottom:40px">
          <img src="<?= base_url('images/verify/'.$user_profile['verify_image']) ?>" alt="" style="height: 300px; width: 100%; object-fit: contain">
        </div>
      <?php } ?>
        
        <div class="col-md-6">
          <div class="form-group">
            <label class="control-label">FULL NAME</label>
            <?= form_input($full_name) ?>
            <?= form_error('full_name', '<p class="text-danger">', '</p>'); ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label class="control-label">USERNAME</label>
            <?= form_input($username) ?>
            <?= form_error('username', '<p class="text-danger">', '</p>'); ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label class="control-label">MEMBER ID</label>
            <?= form_input($ahli_id) ?>
            <?= form_error('ahli_id', '<p class="text-danger">', '</p>'); ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label class="control-label">PHONE NO.</label>
            <?= form_input($phone) ?>
            <?= form_error('phone', '<p class="text-danger">', '</p>'); ?>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label class="control-label">ADDRESS</label>
            <?= form_textarea($address) ?>
            <?= form_error('address', '<p class="text-danger">', '</p>'); ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label class="control-label">POSTCODE</label>
            <?= form_input($postcode) ?>
            <?= form_error('postcode', '<p class="text-danger">', '</p>'); ?>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label class="control-label">AREA</label>
            <?= form_input($town_area) ?>
            <?= form_error('town_area', '<p class="text-danger">', '</p>'); ?>
          </div>
        </div>
        <!-- <div class="col-md-12">
          <div class="form-group">
            <label class="control-label">STATE</label>
            <?= form_dropdown($state_id,$state,$state_id['value']) ?>
            <?= form_error('state_id', '<p class="text-danger">', '</p>'); ?>
          </div>
        </div> -->
        <hr>
        <div class="col-md-4">
          <div class="form-group">
            <label class="control-label">EMAIL <small class="text-danger"> <strong>*Note:</strong> Each person must have one unique email.</small></label>
            <?= form_input($email) ?>
            <?= form_error('email', '<p class="text-danger">', '</p>'); ?>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <?= form_input($password) ?>
            <?= form_error('password', '<p class="text-danger">', '</p>'); ?>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label class="control-label">PASSWORD CONFIRMATION</label>
            <?= form_input($password_confirm) ?>
            <?= form_error('password_confirm', '<p class="text-danger">', '</p>'); ?>
          </div>
        </div>
        <hr>

      <?php if($user_profile['user_group']!=2){ ?>
        <div class="col-md-12">
          <div class="form-group">
            <h3>Status</h3>
            <?php if($user_info['active']=='1') { ?>
              <input type="radio" name="active" value="1" checked="checked"> Active<br>
              <input type="radio" name="active" value="0"> Deactive
            <?php }else{ ?>
              <input type="radio" name="active" value="1"> Active<br>
              <input type="radio" name="active" value="0" checked="checked"> Deactive
            <?php } ?>
          </div>
        </div>
      <?php }else{
        echo form_hidden('active',1);
      } ?>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="form-group">
          <?= form_hidden('id', $user_info['id']);?>
          <?= form_hidden('user_group', $user_info['user_group']);?>
          <?= form_hidden('ori_email', $user_info['email']);?>
          <?= form_submit('submit', lang('edit_user_submit_btn'), array('class'=>'btn btn-success'));?>
        </div>
      </div>
    </div>
    <?= form_close();?>
  </div>
</div>


<div class="portlet box blue">
  <div class="portlet-title">
    <div class="caption">
      Referral List
    </div>
  </div>
  <div class="portlet-body">

  <!-- Table -->
  <table class="table table-bordered">
    <thead>
      <tr>
        <th class="text-center" scope="col">#</th>
        <th class="text-center" scope="col">Fullname</th>
        <th class="text-center" scope="col">Member Id</th>
      </tr>
    </thead>
    <tbody>
      <?php

      if ($referral) {
      $i = 1;  
      foreach ($referral as $key) { ?>
        <tr>
          <th class="text-center"><?= $i++ ?></th>
          <td><?= $key['full_name'] ?></td>
          <td class="text-center"><?= $key['ahli_id'] ?></td>
        </tr>
      <?php } } ?>
    </tbody>
  </table>
  </div>
</div>