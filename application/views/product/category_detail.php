<div class="form-group">
  <div class="col-md-4">
    <label class="control-label">Product Type</label>
  </div>
  <div class="col-md-8">
    <input type="text" class="form-control" name="category_type" value="<?php echo $cType['category_type'] ?>" required>
  </div>
  <div class="col-md-4" style="margin-top:10px">
    <label class="control-label">Status</label>
  </div>
  <div class="col-md-8" style="margin-top:10px">
    <div class="form-check">
      <input class="form-check-input" type="radio" name="category_status" id="exampleRadios1" value="1" <?php if ($cType['status']==1) { echo "checked"; } ?>>
      <label class="form-check-label" for="exampleRadios1">
        Active
      </label>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="category_status" id="exampleRadios2" value="0" <?php if ($cType['status']==0) { echo "checked"; } ?>>
      <label class="form-check-label" for="exampleRadios2">
        Not Active
      </label>
    </div>
  </div>
  <div class="col-md-4" style="margin-top:10px">
    <label class="control-label">Update Logo</label>
  </div>
  <div class="col-md-8" style="margin-top:10px">
    <input type="file" class="form-control" name="category_logo">
  </div>
  <div class="col-md-4">
    <!-- <label class="control-label">Update Logo</label> -->
  </div>
  <div class="col-md-8">
    <span class="text-info">Fixed 300 x 300 </span>
  </div>
</div>
<?php echo form_hidden('category_id',$cType['category_id']); ?>
  