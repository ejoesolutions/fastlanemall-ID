<div class="form-group">
  <div class="col-md-4">
    <label class="control-label">Min Weight (g)</label>
  </div>
  <div class="col-md-8">
    <input type="text" class="form-control" name="weightInitial_set" value="<?= number_format($cost['weightInitial_set'],3) ?>" required>
  </div>
</div>
<div class="form-group">
  <div class="col-md-4">
    <label class="control-label">Max Weight (g)</label>
  </div>
  <div class="col-md-8">
    <input type="text" class="form-control" name="weightFinal_set" value="<?= number_format($cost['weightFinal_set'],3) ?>" required>
  </div>
</div>
<div class="form-group">
  <div class="col-md-4">
    <label class="control-label">Shipping cost</label>
  </div>
  <div class="col-md-8">
    <input type="text" class="form-control" name="shipcost_set" value="<?= ($currency['show_decimal']==1 ? number_format($cost['shipcost_set'],2, '.', $currency['separate']) : substr(number_format($cost['shipcost_set'],2, '.', $currency['separate']), 0 ,-3)) ?>" required>
  </div>
</div>
<div class="form-group">
  <div class="col-md-4">
    <label class="control-label">Area</label>
  </div>
  <div class="col-md-8">
    <?= form_dropdown('area',array('1'=>'Area 1','2'=>'Area 2'),$cost['area'],array('class'=>'form-control')) ?>
  </div>
</div>
  <?= form_hidden('weightcost_id',$cost['weightcost_id']) ?>
  <?= form_hidden('seller_id',$cost['seller_id']) ?>
</div>
