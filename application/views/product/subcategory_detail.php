<div class="form-group">
  <div class="col-md-4">
    <label class="control-label">Subcategory Name</label>
  </div>
  <div class="col-md-8">
    <input type="text" class="form-control" name="category_type" value="<?php echo $cType['category_type'] ?>" required>
  </div>
</div>
<?php echo form_hidden('category_id',$cType['category_id']); ?>
