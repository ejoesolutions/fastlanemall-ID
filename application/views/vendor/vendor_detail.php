<div class="form-group">
  <div class="col-md-4">
      <label class="control-label">Vendor's Name</label>
  </div>
  <div class="col-md-8">
      <input type="text" class="form-control" name="vendor_name" value="<?php echo $vendor['vendor_name'] ?>" required>
  </div>
</div>
<div class="form-group">
  <div class="col-md-4">
      <label class="control-label">Phone</label>
  </div>
  <div class="col-md-8">
      <input type="text" class="form-control" name="vendor_phone" value="<?php echo $vendor['vendor_phone'] ?>" required>
  </div>
</div>
<div class="form-group">
  <div class="col-md-4">
      <label class="control-label">Email</label>
  </div>
  <div class="col-md-8">
      <input type="email" class="form-control" name="vendor_email" value="<?php echo $vendor['vendor_email'] ?>" required>
  </div>
</div>
<div class="form-group">
  <div class="col-md-4">
      <label class="control-label">Address</label>
  </div>
  <div class="col-md-8">
      <textarea class="form-control" name="vendor_address" required><?php echo $vendor['vendor_address'] ?></textarea>
  </div>
</div>
<div class="form-group">
  <div class="col-md-4">
      <label class="control-label">Logo Vendor</label>
  </div>
  <div class="col-md-4">
    <div class="fileinput fileinput-new" data-provides="fileinput">
      <div class="fileinput-new thumbnail img-responsive">
        <?php
        if ($vendor['vendor_logo'] != '') {

          $image_properties = array(
            'src'   => base_url().'logo_vendor/'.$vendor['vendor_logo'],
            'alt'   => $vendor['vendor_name'],
            'class' => 'img-responsive',
            'title' => $vendor['vendor_name'],
          );

        } else {

          $image_properties = array(
            'src'   => 'https://www.placehold.it/500x500/EFEFEF/AAAAAA&amp;text=',
            'alt'   => 'No image',
            'class' => 'img-responsive',
            'title' => 'No image',
          );
        }

        echo img($image_properties);
        ?>
      </div>
      <div class="fileinput-preview fileinput-exists thumbnail img-responsive"></div>
      <br>
      <div>
        <span class="btn default btn-file">
          <span class="fileinput-new"> <i class="glyphicon glyphicon-camera"></i> <?php echo lang('form_button_image') ?> </span>
          <span class="fileinput-exists"> <?php echo lang('form_button_image_change') ?> </span>
          <input type="file" name="vendor_logo">
        </span>
        <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> <?php echo lang('form_button_image_delete') ?> </a>
      </div>
      <div class="clearfix margin-top-10">
        <small><span class="text-danger">NOTE!</span><br>Image size : 150px x 70px</small>
        <?php if (isset($error_image)): ?>
          <?php echo '<p><small class="text-danger">'. $error_image .'</small></p>'; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<div class="form-group">
  <div class="col-md-4">
      <label class="control-label">Status</label>
  </div>
  <div class="col-md-8">
    <?php
      if($vendor['vendor_status']==1){
        ?><input type="radio" name="vendor_status" value="1" checked> Active<?php
        ?><br><input type="radio" name="vendor_status" value="0"> Deactive<?php
      }else{
        ?><input type="radio" name="vendor_status" value="1"> Active<?php
        ?><br><input type="radio" name="vendor_status" value="0"checked> Deactive<?php
      }
     ?>

  </div>
</div>
<?php echo form_hidden('vendor_id',$vendor['vendor_id']); ?>
<?php echo form_hidden('temp_logo',$vendor['vendor_logo']); ?>
