
<div class="container">
  <div class="pull-left">
   <!-- Logo -->
    <div class="header-logo">
      <a class="" href="<?php echo base_url() ?>">
        <img src="<?php echo base_url('logo/'.$logo['image_file']); ?>" alt="Logo" width="210px">
      </a>
    </div>
    <!-- /Logo -->
  </div>
  <div class="pull-right">
    <ul class="header-btns">
      <!-- Account -->
        <li class="header-account header-search">
          <!-- <div class="header-search"> -->
            <?php echo form_open('page/search',array('class'=>'')); ?>
              <input class="form-control" type="text" name="search_text" placeholder="Search" style="width:140px;height:40px">
      				<button class="search-btn"><i class="fa fa-search"></i></button>
            <?php echo form_close(); ?>
          <!-- </div> -->
        </li>
      <!-- /Account -->

      <!-- Cart -->
      <?php
      $total=0.0;
      foreach ($this->cart->contents() as $items){
        $total=$total+$items['subtotal'];
      } ?>
      <!--<li class="header-cart dropdown default-dropdown">-->
      <!--  <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">-->
      <!--    <div class="header-btns-icon">-->
      <!--      <i class="fa fa-shopping-cart"></i>-->
      <!--      <span class="qty"><?php echo count($this->cart->contents()) ?></span>-->
      <!--    </div>-->
      <!--  </a>-->
      <!--  <div class="custom-menu">-->
      <!--    <div id="shopping-cart">-->
      <!--      <div class="shopping-cart-btns">-->
      <!--        <a href="<?php echo base_url('member/cart') ?>"><button class="main-btn">View Cart</button></a>-->
      <!--        <a href="<?php echo base_url('orders/checkout') ?>"><button class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></button></a>-->
      <!--      </div>-->
      <!--    </div>-->
      <!--  </div>-->
      <!--</li>-->
      <li class="dropdown dropdown-user header-cart">
        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">

          <div class="header-btns-icon">
            <i class="fa fa-shopping-cart"></i>
            <span class="qty"><?php echo count($this->cart->contents()) ?></span>
          </div>
        </a>
        <ul class="dropdownshop-menu dropdown-menu-default">
          <li align="center">
            <a href="<?php echo base_url('member/cart') ?>"><button class="main-btn">View Cart</button></a>
          </li>
          <li align="center">
            <?php if(!empty($this->cart->contents())){ ?>
            <a href="<?php echo base_url('orders/checkout') ?>"><button class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></button></a>
          <?php }else{
            ?>
              <a href="#"><button class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></button></a>
            <?php
          } ?>
          </li>
        </ul>
      </li>

      <li class="nav-toggle" style="margin-left:0">
        <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
      </li>

      <?php if(!empty($user_profile)){ ?>
        <li><span class="black-color">Hello, <br><span class="over-flow-name"><?php echo $user_profile['full_name'] ?></span></span></li>
      <?php } ?>
      <!-- /Cart -->

      <li class="dropdown dropdown-user header-cart" style="margin-left:0">
        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">

          <div class="header-btns-icon">
            <i class="fa fa-user"></i>
            <!-- <span class="qty"><?php echo count($this->cart->contents()) ?></span> -->
          </div>
        </a>
        <ul class="dropdownshop-menu dropdown-menu-default">
          <?php if(!$this->ion_auth->logged_in()){ ?>
            <li align="center">
              <a href="<?php echo base_url('member/register') ?>"><button class="main-btn">Login/Register</button></a>
            </li>
            <?php
          }else{
          ?>
          <li align="center">
            <a href="<?php echo base_url('member/dashboard') ?>"><button class="main-btn">My Account</button></a>
          </li>
          <?php if(empty($shop['seller_id'])){ ?>
            <li align="center">
              <a data-toggle="modal" href="#submitSeller"><button class="main-btn">Be a Seller!</button></a>
            </li>
            <?php
          }
           ?>
           <li align="center">
             <a href="<?php echo base_url('member/logout') ?>"><button class="main-btn">Logout</button></a>
           </li>
          <?php
          }
          ?>
        </ul>
      </li>
      <!-- Mobile nav toggle-->
      <!-- <li class="nav-toggle">
        <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
      </li> -->
      <!-- / Mobile nav toggle -->
    </ul>
  <!--  <?php if(!empty($user_profile)){ ?>-->
  <!--  <div class="pull-right">-->
  <!--    <p style="color:white">Hello, <?php echo $user_profile['full_name'] ?></p>-->
  <!--  </div>-->
  <!--<?php } ?>-->
  </div>
</div>
