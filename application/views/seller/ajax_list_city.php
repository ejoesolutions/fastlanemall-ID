  <!-- <div class="aside"> -->
  <select class="form-control" name="city" style="margin-top:20px">
    <option selected>Select</option>
    <?php 
    foreach ($state_list as $key) {
      echo '<option value="'.$key['shop_city'].'">'.$key['shop_city'].'</option>';
    } ?>
  </select>
<!-- </div> -->