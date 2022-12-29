<hr>
<div class="row">
  <div class="col-md-4">
    <div class="form-group">
      <label class="control-label">WEIGHT (g)</label>
      <?php echo form_input($weight);?>
      <?php echo form_error('weight', '<p class="text-danger">', '</p>'); ?>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label class="control-label">SIZE</label>
      <?php echo form_input($size);?>
      <?php echo form_error('size', '<p class="text-danger">', '</p>'); ?>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label class="control-label">MODAL PRICE (Rp)</label>
      <?php echo form_input($product_price);?>
      <?php echo form_error('product_price', '<p class="text-danger">', '</p>'); ?>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-4">
    <div class="form-group">
      <label class="control-label">SHIPPING COST (Rp)</label>
      <?php echo form_input($shipping);?>
      <?php echo form_error('shipping', '<p class="text-danger">', '</p>'); ?>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label class="control-label">TAX (%)</label>
      <?php echo form_input($tax);?>
      <?php echo form_error('tax', '<p class="text-danger">', '</p>'); ?>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label class="control-label">SELL PRICE (Rp)</label>
      <?php echo form_input($add_cost);?>
      <?php echo form_error('add_cost', '<p class="text-danger">', '</p>'); ?>
    </div>
  </div>

</div>
<div class="row">
  <div class="col-md-12">
    <div class="form-group">
      <label class="control-label">DESCRIPTION</label>
      <?php echo form_textarea($description);?>
      <?php echo form_error('description', '<p class="text-danger">', '</p>'); ?>
    </div>
  </div>
</div>
