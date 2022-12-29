<style>
.topnav {
  overflow: hidden;
  background-color: #189ca2;

}

.topnav a {
  float: left;
  display: block;
  color: #ffff;
  text-align: center;
  padding: 15px 16px;
  text-decoration: none;
  font-size: 16px;
}

.active2 {
  background-color: #4CAF50;
  color: white;
}

.topnav .icon {
  display: none;
}

.dropdown_new {
  float: left;
  overflow: hidden;
}

.dropdown_new .dropbtn {
  font-size: 16px;
  border: none;
  outline: none;
  color: white;
  padding: 15px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: #183C28;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
  background-color: #fff;
}

.topnav a:hover, .dropdown_new:hover .dropbtn {
  background-color: #246f96;
  color: white;
}

.dropdown-content a:hover {
  background-color: #ddd;
  color: black;
}

.dropdown_new:hover .dropdown-content {
  display: block;
}

@media screen and (max-width: 991px) {
  .topnav a:not(:first-child), .dropdown_new .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 991px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown_new {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown_new .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}
</style>
<div class="topnav responsive" id="myTopnav">
  <a href="<?php echo base_url() ?>">Home</a>
  <a href="<?php echo base_url("page/all_products") ?>">All Products</a>
  <a href="<?php echo base_url("page/all_categories") ?>">Categories</a>
  <!-- <div class="dropdown_new">
    <button class="dropbtn">Categories
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content" style="height:350%; overflow:hidden; overflow-y:scroll;">
      <?php
        //print_r($pm);
        if(!empty($pm)){
            foreach ($pm as $key) {
          ?>
          <a href="<?php echo base_url("page/products/").$key['category_id'] ?>"><?php echo $key['category_type'] ?></a>
          <?php
        }
        }
       ?>
    </div>
  </div> -->
  <a href='<?php echo base_url("page/all_shops"); ?>'>Shops</a>
  
  <!--
  <div class="dropdown_new">
    <button class="dropbtn">Shops
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content" style="height:350%; overflow:hidden; overflow-y:scroll;">
      <?php
        //print_r($pm);
        if(!empty($list_shop)){
            foreach ($list_shop as $key) {
          ?>
          <a href="<?php echo base_url("page/shops/").$key['seller_id'] ?>"><?php echo $key['shop_name'] ?></a>
          <?php
        }
        }
       ?>
    </div>
  </div>
  -->
  
  <?php if(!$this->ion_auth->logged_in()){ ?>
  <!-- <a href="<?php echo base_url('customer/register') ?>">Login/Register</a> -->
<?php }else{
  ?>
  <!-- <div class="dropdown_new">
    <button class="dropbtn">My Account
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="<?php echo base_url('customer/dashboard') ?>">Dashboard</a>
      <?php
        if(empty($shop['seller_id'])){
          ?><a data-toggle="modal" href="#submitSeller">Be a Seller!</a><?php
        }
       ?>
      <a href="<?php echo base_url('member/logout') ?>">Logout</a>
    </div>
  </div> -->
  <?php
  }
  ?>
  <?php $none=base_url('#'); ?>
  <!-- <a href="<?php if($footer['why_us']!=NULL){ echo $footer['why_us']; }else{echo $none;} ?>" target="_blank">Why Us</a> -->
  <!-- <a href="<?php if($footer['contact_us']!=NULL){ echo $footer['contact_us']; }else{echo $none;} ?>">Contact Us</a> -->
  <?php
  if(isset($shop['seller_status'])){
    ?><a href="<?php echo base_url('seller/seller_dashboard') ?>">Seller Centre</a><?php
  }else{
    ?><a data-toggle="modal" href="#loginSeller">Seller Centre</a><?php
  }
   ?>
  <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>

<!-- <div class="modal fade bs-modal-xl" id="loginSeller" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Login Seller Centre</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('seller/login',array('class'=>'form-horizontal')) ?>
        <div class="form-group">
          <div class="col-md-4">
              <label class="control-label">Username/Email</label>
          </div>
          <div class="col-md-8">
              <input class="form-control" type="text" name="identity" placeholder="Username/Email" required>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4">
              <label class="control-label">Password</label>
          </div>
          <div class="col-md-8">
              <input class="form-control" type="password" name="password" placeholder="Password" required>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Login</button>
      </div>
      <?php echo form_close() ?>
    </div>
  </div>
</div>

<div class="modal fade bs-modal-xl" id="submitSeller" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
        <h4 class="modal-title">Create Shop</h4>
      </div>
      <div class="modal-body">
        <?php echo form_open('seller/create_shop',array('class'=>'form-horizontal')) ?>
        <div class="form-group">
          <div class="col-md-4">
              <label class="control-label">Shop Name</label>
          </div>
          <div class="col-md-8">
              <input class="form-control" type="text" name="shop_name" required>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4">
              <label class="control-label">Seller Type</label>
          </div>
          <div class="col-md-8">
              <select name="seller_type" class="form-control" required>
                <option value="">--Select--</option>
                <option value="PERSONAL">Personal</option>
                <option value="COMPANY">Company</option>
              </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4">
              <label class="control-label">Bank Name</label>
          </div>
          <div class="col-md-8">
              <input class="form-control" type="text" name="seller_bank" required>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-4">
              <label class="control-label">Bank Account No.</label>
          </div>
          <div class="col-md-8">
              <input class="form-control" type="text" name="seller_acc" required>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Submit</button>
      </div>
      <?php echo form_close() ?>
    </div>
  </div>
</div> -->


<script>
  function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }
  </script>
