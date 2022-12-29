<?php

//print_r($default_add);
 ?>
 <h5>Are you sure to delete this data?</h5>
 <div class="form-group">
   <div class="col-md-4">
       <label class="control-label">Name</label>
   </div>
   <div class="col-md-8">
    <input type="text" class="form-control" name="name" value="<?php echo $address['name'] ?>" readonly>
   </div>
 </div>
 <div class="form-group">
   <div class="col-md-4">
       <label class="control-label">Phone</label>
   </div>
   <div class="col-md-8">
       <input type="text" class="form-control" name="phone" value="<?php echo $address['phone'] ?>" readonly>
   </div>
 </div>
 <div class="form-group">
   <div class="col-md-4">
       <label class="control-label">Address</label>
   </div>
   <div class="col-md-8">
       <textarea name="address" class="form-control" readonly><?php echo $address['address'] ?></textarea>
   </div>
   <input type="hidden" name="default_add" value="<?php echo $address['default_add'] ?>">
   <input type="hidden" name="address_id" value="<?php echo $address['address_id'] ?>">
 </div>
 </div>
