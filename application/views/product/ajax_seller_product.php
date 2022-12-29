<div class="form-group">
  <label class="control-label col-md-4">PRODUCT</label>
  <div class="col-md-6">
    <?php echo form_dropdown('product_id', $sproduct, '', array('class'=>'form-control','required'=>'required')) ?>
  </div>
</div>
<input type='hidden' name='seller_id' value='<?php echo $seller_id ?>'>
