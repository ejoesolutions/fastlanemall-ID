<div class="form-group">
  <div class="col-md-4">
      <label class="control-label">Shop Name</label>
  </div>
  <div class="col-md-8">
      <input type="text" class="form-control" name="shop_name" value="<?php echo $seller['shop_name'] ?>" readonly>
  </div>
</div>
<div class="form-group">
  <div class="col-md-4">
      <label class="control-label">Seller Name</label>
  </div>
  <div class="col-md-8">
      <input type="text" class="form-control" name="full_name" value="<?php echo $seller['full_name'] ?>" readonly>
  </div>
</div>
<div class="form-group">
  <div class="col-md-4">
      <label class="control-label">Email</label>
  </div>
  <div class="col-md-8">
      <input type="email" class="form-control" name="email" value="<?php echo $seller['email'] ?>" readonly>
  </div>
</div>
<div class="form-group">
  <div class="col-md-4">
      <label class="control-label">Phone</label>
  </div>
  <div class="col-md-8">
      <input type="text" class="form-control" name="phone" value="<?php echo $seller['phone'] ?>" readonly>
  </div>
</div>
<div class="form-group">
  <div class="col-md-4">
      <label class="control-label">Address</label>
  </div>
  <div class="col-md-8">
      <textarea class="form-control" name="address" readonly><?php echo $seller['address'].' '.$seller['postcode'].' '.$seller['town_area'].' '.$seller['state'] ?></textarea>
  </div>
</div>
<div class="form-group">
  <div class="col-md-4">
      <label class="control-label">Bank Name</label>
  </div>
  <div class="col-md-8">
      <input type="text" class="form-control" name="seller_bank" value="<?php echo $seller['seller_bank'] ?>" readonly>
  </div>
</div>
<div class="form-group">
  <div class="col-md-4">
      <label class="control-label">Account No.</label>
  </div>
  <div class="col-md-8">
      <input type="text" class="form-control" name="seller_acc" value="<?php echo base64_decode($seller['seller_account']) ?>" readonly>
  </div>
</div>

<?php echo form_hidden('seller_id',$seller['seller_id']); ?>
<?php //echo form_hidden('temp_logo',$seller['vendor_logo']); ?>
