<div class="form-group">
  <div class="col-md-4">
    <label class="control-label">Shop Area</label>
  </div>
  <div class="col-md-8">
    <input class="form-control" type="text" name="shop_area" value="<?= $city['bandar'] ?>" required readonly>
  </div>
</div>
<div class="form-group">
  <div class="col-md-4">
    <label class="control-label">Shop State</label>
  </div>
  <div class="col-md-8">
    <input class="form-control" type="text" name="shop_state" value="<?= $city['state'] ?>" required readonly>
    <input type="hidden" name="shop_state_id" value="<?= $city['state_id'] ?>">
  </div>
</div>