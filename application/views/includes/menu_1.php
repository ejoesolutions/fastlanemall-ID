<!-- menu nav -->
<div class="menu-nav">
  <span class="menu-header">Menu <i class="fa fa-bars"></i></span>
  <ul class="menu-list">
    <li><a href="<?php echo base_url() ?>">Home</a></li>

    <!-- <li class="dropdown mega-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Products <i class="fa fa-caret-down"></i></a>
      <div class="custom-menu">
        <div class="row">
          <div class="col-md-3">
            <div class="hidden-sm hidden-xs">
              <a class="banner banner-1" href="#">
                <img src="<?php echo base_url('assets/layouts'); ?>/layout_shop/img/banner06.jpg" alt="">
                <div class="banner-caption text-center">
                  <h3 class="white-color text-uppercase">Gold</h3>
                </div>
              </a>
              <hr>
            </div>
            <ul class="list-links">
              <li>
              <h3 class="list-links-title">Categories</h3></li>
              <li><a href="#">Women’s Clothing</a></li>
              <li><a href="#">Men’s Clothing</a></li>
              <li><a href="#">Phones & Accessories</a></li>
              <li><a href="#">Jewelry & Watches</a></li>
              <li><a href="#">Bags & Shoes</a></li>
            </ul>
          </div>
          <div class="col-md-3">
            <div class="hidden-sm hidden-xs">
              <a class="banner banner-1" href="#">
                <img src="<?php echo base_url('assets/layouts'); ?>/layout_shop/img/banner07.jpg" alt="">
                <div class="banner-caption text-center">
                  <h3 class="white-color text-uppercase">Men’s</h3>
                </div>
              </a>
            </div>
            <hr>
            <ul class="list-links">
              <li>
                <h3 class="list-links-title">Categories</h3></li>
              <li><a href="#">Women’s Clothing</a></li>
              <li><a href="#">Men’s Clothing</a></li>
              <li><a href="#">Phones & Accessories</a></li>
              <li><a href="#">Jewelry & Watches</a></li>
              <li><a href="#">Bags & Shoes</a></li>
            </ul>
          </div>
          <div class="col-md-3">
            <div class="hidden-sm hidden-xs">
              <a class="banner banner-1" href="#">
                <img src="<?php echo base_url('assets/layouts'); ?>/layout_shop/img/banner08.jpg" alt="">
                <div class="banner-caption text-center">
                  <h3 class="white-color text-uppercase">Accessories</h3>
                </div>
              </a>
            </div>
            <hr>
            <ul class="list-links">
              <li>
                <h3 class="list-links-title">Categories</h3></li>
              <li><a href="#">Women’s Clothing</a></li>
              <li><a href="#">Men’s Clothing</a></li>
              <li><a href="#">Phones & Accessories</a></li>
              <li><a href="#">Jewelry & Watches</a></li>
              <li><a href="#">Bags & Shoes</a></li>
            </ul>
          </div>
          <div class="col-md-3">
            <div class="hidden-sm hidden-xs">
              <a class="banner banner-1" href="#">
                <img src="<?php echo base_url('assets/layouts'); ?>/layout_shop/img/banner09.jpg" alt="">
                <div class="banner-caption text-center">
                  <h3 class="white-color text-uppercase">Bags</h3>
                </div>
              </a>
            </div>
            <hr>
            <ul class="list-links">
              <li>
                <h3 class="list-links-title">Categories</h3></li>
              <li><a href="#">Women’s Clothing</a></li>
              <li><a href="#">Men’s Clothing</a></li>
              <li><a href="#">Phones & Accessories</a></li>
              <li><a href="#">Jewelry & Watches</a></li>
              <li><a href="#">Bags & Shoes</a></li>
            </ul>
          </div>
        </div>
      </div>
    </li> -->
    <!-- <li><a href="#">Sales</a></li> -->
   
    <li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Products <i class="fa fa-caret-down"></i></a>
      <ul class="custom-menu">
        <li><a href="<?php echo base_url() ?>">Wafer Emas</a></li>
        <!-- <li><a href="products.html">Products</a></li>
        <li><a href="product-page.html">Product Details</a></li>
        <li><a href="checkout.html">Checkout</a></li> -->
      </ul>
    </li>
    <?php if(!$this->ion_auth->logged_in()){ ?>
    <li><a href="<?php echo base_url('customer/register') ?>">Login/Register</a></li>
  <?php }else{
    ?>
    <li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">MY ACCOUNT <i class="fa fa-caret-down"></i></a>
      <ul class="custom-menu">
        <li><a href="<?php echo base_url('customer/dashboard') ?>">ACCOUNT</a></li>
        <li><a href="<?php echo base_url('member/logout') ?>">Logout</a></li>
        <!-- <li><a href="products.html">Products</a></li>
        <li><a href="product-page.html">Product Details</a></li>
        <li><a href="checkout.html">Checkout</a></li> -->
      </ul>
    </li>
    <!--<li><a href="<?php echo base_url('customer/logout') ?>">Logout</a></li>-->
    <?php
    } ?>
    <li class="pull-right"><a href="https://gold-fastlane.com/" target="_blank">Why Us</a></li>
    <!-- <li class="pull-right"><a href="#">Videos</a></li> -->
    <li class="pull-right"><a href="#">Contact Us</a></li>
  </ul>
</div>
<!-- menu nav -->
