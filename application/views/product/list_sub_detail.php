<div class="col-md-12">
  <div class="form-group uppercase">
    <label class="control-label">PRODUCT SUBCATEGORY</label>
    <select name="subcategory_id" id="" class="form-control">
      <?php foreach ($cList as $key) {
        echo '<option value="'.$key['category_id'].'">'.$key['category_type'].'</option>';
      } ?>
    </select>
  </div>
</div>