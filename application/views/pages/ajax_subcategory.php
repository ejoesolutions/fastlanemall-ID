<select name="" id="filterSubCat" class="form-control">
  <option value="">Filter Subcategory</option>
  <?php foreach ($sCat as $key) {
    echo '<option value="'.$key['category_id'].'">'.$key['category_type'].'</option>';
  } ?>
</select>
