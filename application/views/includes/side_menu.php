<style>
.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;

  /* Position the tooltip */
  position: absolute;
  z-index: 1;
  top: -5px;
  left: 105%;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}
</style>

<li class="heading">
  <h3><a href="<?= base_url('') ?>" class="text-info" style="text-decoration: none;"><i class="glyphicon glyphicon-chevron-left"></i> To Front Page</a></h3>
</li>
<?php $count_process_order=0; ?>
<li class="nav-item <?php if($this->uri->segment(2)=="dashboard") { echo 'active open';}?>">
  <?php if ($user_profile['user_group']==0 || $user_profile['user_group']==1){ ?>
    <a  class="nav-link nav-toggle" href="<?php echo base_url('admin/dashboard') ?>">
      <i class="icon-home"></i>
      <span class="title">Dashboard</span>
      <!-- <span class="arrow"></span> -->
    </a>
  <?php }else{
    ?>
    <a  class="nav-link nav-toggle" href="<?php echo base_url('seller/seller_dashboard') ?>">
      <i class="icon-home"></i>
      <span class="title">Dashboard</span>
      <!-- <span class="arrow"></span> -->
    </a>
    <?php
  } ?>

</li>

<!-- admin -->
<?php if ($user_profile['user_group']==1){
  foreach ($count_order as $key) {
    if($key['order_status']<4)
    {
      $count_process_order++;
    }
  }

  ?>
  <!-- <li class="nav-item <?php if($this->uri->segment(1)=="catalog" && $this->uri->segment(2)=="product_detail") { echo 'active open';}?>"> -->
    <li class="nav-item">

    <?php if($this->uri->segment(1)=="catalog" && $this->uri->segment(2)=="category") { ?>
      <li class="nav-item active">
    <?php } ?>
    <?php if($this->uri->segment(1)=="catalog" && ($this->uri->segment(2)=="new_product" || $this->uri->segment(2)=="product_detail" || $this->uri->segment(2)=="product_edit")) {?>
      <li class="nav-item active">
    <?php } ?>
    <?php if($this->uri->segment(1)=="catalog" && $this->uri->segment(2)=="add_stock") { ?>
      <li class="nav-item active">
    <?php } ?>
    <?php if($this->uri->segment(1)=="catalog" && $this->uri->segment(2)=="products") { ?>
      <li class="nav-item active">
    <?php } ?>
    <?php if($this->uri->segment(1)=="catalog" && ($this->uri->segment(2)=="manage_shipping" || $this->uri->segment(2)=="shipping_rule")) {?>
      <li class="nav-item active">
    <?php } ?>
    <a href="javascript:;" class="nav-link nav-toggle">
      <i class="icon-notebook"></i>
      <span class="title">Catalog</span>
      <span class="arrow"></span>
    </a>
    <ul class="sub-menu">
      <!-- <li class="nav-item <?php if($this->uri->segment(2)=="vendor") { echo 'active';}?>">
        <?php echo anchor('catalog/vendor', '<span class="title">Vendors List</span>', array('class'=>'nav-link')) ?>
      </li> -->
      <li class="nav-item <?php if($this->uri->segment(2)=="category") { echo 'active';}?>">
        <?php echo anchor('catalog/category', '<span class="title">Products Category</span>', array('class'=>'nav-link')) ?>
      </li>
      <li class="nav-item <?php if($this->uri->segment(2)=="new_product") { echo 'active';}?>">
        <?php echo anchor('catalog/new_product', '<span class="title">Add Products</span>', array('class'=>'nav-link')) ?>
      </li>
      <li class="nav-item <?php if($this->uri->segment(2)=="products" || $this->uri->segment(2)=="product_detail" || $this->uri->segment(2)=="product_edit") { echo 'active';}?>">
        <?php echo anchor('catalog/products', '<span class="title">Products List</span>', array('class'=>'nav-link')) ?>
      </li>
      <li class="nav-item <?php if($this->uri->segment(2)=="add_stock") { echo 'active';}?>">
        <?php echo anchor('catalog/add_stock', '<span class="title">Manage Stock</span>', array('class'=>'nav-link')) ?>
      </li>
      <li class="nav-item <?php if($this->uri->segment(2)=="manage_shipping" || $this->uri->segment(2)=="shipping_rule") { echo 'active';}?>">
        <?php echo anchor('catalog/manage_shipping', '<span class="title">Manage Shipping</span>', array('class'=>'nav-link')) ?>
      </li>
    </ul>
  </li>

  <li class="nav-item <?php if($this->uri->segment(1)=="orders") { echo 'active open';}?>">
    <a href="javascript:;" class="nav-link nav-toggle">
      <i class="icon-basket"></i>
      <!-- <span class="title">Orders</span> -->
      <span class="title">Orders <span class="badge"><?php echo $count_process_order; ?></span>
        <!-- <span class="badge badge-danger" title="On Hold"><?php echo $count_order['status'] ?></span>
        <span class="badge badge-warning" title="Processing"><?php echo $count_order['status'] ?></span>
        <span class="badge badge-success" title="Shipping Out"><?php echo $count_order['status'] ?></span> -->
      </span>
      <span class="arrow"></span>

    </a>
    <ul class="sub-menu">
      <li class="nav-item <?php if($this->uri->segment(2)=="all_orders" || $this->uri->segment(2)=="detail") { echo 'active';}?>">
        <?php echo anchor('orders/all_orders', '<span class="title">Orders List <span class="badge badge-info">'.$count_process_order.'</span></span>', array('class'=>'nav-link')) ?>
      </li>
      <!-- <li class="nav-item <?php if($this->uri->segment(2)=="setting") { echo 'active';}?>">
        <?php echo anchor('orders/setting', '<span class="title">Setting</span>', array('class'=>'nav-link')) ?>
      </li> -->
      <!-- <li class="nav-item <?php if($this->uri->segment(2)=="trace") { echo 'active';}?>">
        <?php echo anchor('orders/trace', '<span class="title">Trace & Track</span>', array('class'=>'nav-link')) ?>
      </li>
      <li class="nav-item <?php if($this->uri->segment(2)=="reports") { echo 'active';}?>">
        <?php echo anchor('orders/reports', '<span class="title">Reports</span>', array('class'=>'nav-link')) ?>
      </li> -->
    </ul>
  </li>

  <li class="nav-item <?php if($this->uri->segment(2)=="claims" || $this->uri->segment(2)=="payments") { echo 'active open';}?>">
    <a href="javascript:;" class="nav-link nav-toggle">
      <i class="fas fa-exchange-alt"></i>
      <span class="title">Transactions <span class="badge"><?php echo $count_pen_tranc['total']; ?></span></span>
      <span class="arrow"></span>
    </a>
    <ul class="sub-menu">
      <li class="nav-item <?php if($this->uri->segment(2)=="claims") { echo 'active';}?>">
        <?php echo anchor('report/claims', '<span class="title">Claims <span class="badge badge-info">'.$count_pen_tranc['total'].'</span></span>', array('class'=>'nav-link')) ?>
      </li>
      <li class="nav-item <?php if($this->uri->segment(2)=="payments") { echo 'active';}?>">
        <?php echo anchor('report/payments', '<span class="title">Payments</span>', array('class'=>'nav-link')) ?>
      </li>
      <!-- <li class="nav-item <?php if($this->uri->segment(2)=="commission") { echo 'active';}?>">
        <?php echo anchor('admin/commission', '<span class="title">All Commissions</span>', array('class'=>'nav-link')) ?>
      </li> -->
      <!-- <li class="nav-item <?php if($this->uri->segment(2)=="commission_claim") { echo 'active';}?>">
        <?php echo anchor('admin/commission_claim', '<span class="title">Claimed Commissions</span>', array('class'=>'nav-link')) ?>
      </li> -->
    </ul>
  </li>

  <!-- Manage users for master admin -->

  <li class="nav-item <?php if($this->uri->segment(1)=="user") { echo 'active open';}?>">
    <a href="javascript:;" class="nav-link nav-toggle">
      <i class="icon-users"></i>
      <span class="title">Users</span>
      <span class="arrow"></span>
    </a>
    <ul class="sub-menu">
      <li class="nav-item <?php if($this->uri->segment(2)=="get_users" || $this->uri->segment(2)=="edit") { echo 'active';}?>">
        <?php echo anchor('user/get_users', '<span class="title">Users List</span>', array('class'=>'nav-link')) ?>
      </li>
      <li class="nav-item <?php if($this->uri->segment(2)=="register") { echo 'active';}?>">
        <?php echo anchor('user/register', '<span class="title">Register User</span>', array('class'=>'nav-link')) ?>
      </li>
      <li class="nav-item <?php if($this->uri->segment(2)=="get_customer") { echo 'active';}?>">
        <?php echo anchor('user/get_customer', '<span class="title">Customer List</span>', array('class'=>'nav-link')) ?>
      </li>
      <!-- <li class="nav-item <?php if($this->uri->segment(2)=="newslatter") { echo 'active';}?>">
        <?php echo anchor('user/newslatter', '<span class="title">Newslatter</span>', array('class'=>'nav-link')) ?>
      </li> -->
    </ul>
  </li>

  <li class="nav-item <?php if($this->uri->segment(1)=="seller") { echo 'active open';}?>">
    <a href="javascript:;" class="nav-link nav-toggle">
      <i class="icon-users"></i>
      <span class="title">Sellers <span class="badge"><?php echo $count_newSeller['total'] ?></span></span>
      <span class="arrow"></span>

    </a>
    <ul class="sub-menu">
      <li class="nav-item <?php if($this->uri->segment(2)=="seller_list" || $this->uri->segment(2)=="upd_seller") { echo 'active';}?>">
        <?php echo anchor('seller/seller_list', '<span class="title">Sellers List</span>', array('class'=>'nav-link')) ?>
      </li>
      <li class="nav-item <?php if($this->uri->segment(2)=="new_seller") { echo 'active';}?>">
        <?php echo anchor('seller/new_seller', '<span class="title">New Seller <span class="badge badge-info">'.$count_newSeller['total'].'</span></span>', array('class'=>'nav-link')) ?>
      </li>
    </ul>
  </li>

  <li class="nav-item <?php if($this->uri->segment(2)=="setting") { echo 'active open';}?>">
    <a  class="nav-link nav-toggle" href="<?php echo base_url('admin/setting') ?>">
      <i class="fa fa-cog"></i>
      <span class="title">Setting</span>
      <!-- <span class="arrow"></span> -->
    </a>
  </li>

  <!-- <li class="nav-item <?php if($this->uri->segment(2)=="payment") { echo 'active open';}?>">
    <a href="javascript:;" class="nav-link nav-toggle">
      <i class="fa glyphicon glyphicon-usd"></i>
      <span class="title">Payment</span>
      <span class="arrow"></span>
    </a>
    <ul class="sub-menu">
      <li class="nav-item <?php if($this->uri->segment(2)=="payment") { echo 'active';} ?>">
        <?php echo anchor('admin/payment', '<span class="title">All Payments</span>', array('class'=>'nav-link')) ?>
      </li>
      <li class="nav-item <?php if($this->uri->segment(2)=="commission_claim") { echo 'active';}?>">
        <?php echo anchor('admin/commission_claim', '<span class="title">Claimed Commissions</span>', array('class'=>'nav-link')) ?>
      </li>
    </ul>
  </li> -->
  
  <?php } ?>

  <!-- superadmin -->
  <?php if ($user_profile['user_group']==0){
    foreach ($count_order as $key) {
      if($key['order_status']<4) {
        $count_process_order++;
      }
    }
    ?>
    <!-- <li class="nav-item <?php if($this->uri->segment(1)=="catalog" && $this->uri->segment(2)=="product_detail") { echo 'active open';}?>"> -->
      <li class="nav-item">

      <?php if($this->uri->segment(1)=="catalog" && $this->uri->segment(2)=="category") {?>
        <li class="nav-item active">
      <?php } ?>
      <?php if($this->uri->segment(1)=="catalog" && ($this->uri->segment(2)=="new_product" || $this->uri->segment(2)=="product_detail" || $this->uri->segment(2)=="product_edit")) {?>
        <li class="nav-item active">
      <?php } ?>
      <?php if($this->uri->segment(1)=="catalog" && $this->uri->segment(2)=="add_stock") {?>
        <li class="nav-item active">
      <?php } ?>
      <?php if($this->uri->segment(1)=="catalog" && $this->uri->segment(2)=="products") {?>
        <li class="nav-item active">
      <?php } ?>
      <?php if($this->uri->segment(1)=="catalog" && ($this->uri->segment(2)=="manage_shipping" || $this->uri->segment(2)=="shipping_rule")) {?>
      <li class="nav-item active">
    <?php } ?>
      <a href="javascript:;" class="nav-link nav-toggle">
        <i class="icon-notebook"></i>
        <span class="title">Catalog</span>
        <span class="arrow"></span>
      </a>
      <ul class="sub-menu">
        <!-- <li class="nav-item <?php if($this->uri->segment(2)=="vendor") { echo 'active';}?>">
          <?php echo anchor('catalog/vendor', '<span class="title">Vendors List</span>', array('class'=>'nav-link')) ?>
        </li> -->
        <li class="nav-item <?php if($this->uri->segment(2)=="category") { echo 'active';}?>">
          <?php echo anchor('catalog/category', '<span class="title">Products Category</span>', array('class'=>'nav-link')) ?>
        </li>
        <li class="nav-item <?php if($this->uri->segment(2)=="new_product") { echo 'active';}?>">
          <?php echo anchor('catalog/new_product', '<span class="title">Add Products</span>', array('class'=>'nav-link')) ?>
        </li>
        <li class="nav-item <?php if($this->uri->segment(2)=="products" || $this->uri->segment(2)=="product_detail" || $this->uri->segment(2)=="product_edit") { echo 'active';}?>">
          <?php echo anchor('catalog/products', '<span class="title">Products List</span>', array('class'=>'nav-link')) ?>
        </li>
        <li class="nav-item <?php if($this->uri->segment(2)=="add_stock") { echo 'active';}?>">
          <?php echo anchor('catalog/add_stock', '<span class="title">Manage Stock</span>', array('class'=>'nav-link')) ?>
        </li>
        <li class="nav-item <?php if($this->uri->segment(2)=="manage_shipping" || $this->uri->segment(2)=="shipping_rule") { echo 'active';}?>">
          <?php echo anchor('catalog/manage_shipping', '<span class="title">Manage Shipping</span>', array('class'=>'nav-link')) ?>
        </li>
      </ul>
    </li>

    <li class="nav-item <?php if($this->uri->segment(1)=="orders") { echo 'active open';}?>">
      <a href="javascript:;" class="nav-link nav-toggle">
        <i class="icon-basket"></i>
        <span class="title">Orders <span class="badge"><?php echo $count_process_order; ?></span></span>
        <span class="arrow"></span>
      </a>
      <ul class="sub-menu">
        <li class="nav-item <?php if($this->uri->segment(2)=="all_orders" || $this->uri->segment(2)=="detail") { echo 'active';}?>">
          <?php echo anchor('orders/all_orders', '<span class="title">Orders List <span class="badge badge-info">'.$count_process_order.'</span></span>', array('class'=>'nav-link')) ?>
        </li>
        <!-- <li class="nav-item <?php if($this->uri->segment(2)=="setting") { echo 'active';}?>">
          <?php echo anchor('orders/setting', '<span class="title">Setting</span>', array('class'=>'nav-link')) ?>
        </li> -->
        <!-- <li class="nav-item <?php if($this->uri->segment(2)=="trace") { echo 'active';}?>">
          <?php echo anchor('orders/trace', '<span class="title">Trace & Track</span>', array('class'=>'nav-link')) ?>
        </li>
        <li class="nav-item <?php if($this->uri->segment(2)=="reports") { echo 'active';}?>">
          <?php echo anchor('orders/reports', '<span class="title">Reports</span>', array('class'=>'nav-link')) ?>
        </li> -->
      </ul>
    </li>

    <li class="nav-item <?php if($this->uri->segment(2)=="claims" || $this->uri->segment(2)=="payments") { echo 'active open';}?>">
      <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fas fa-exchange-alt"></i>
        <span class="title">Transactions <span class="badge badge-info"><?= $count_pen_tranc['total'] ?></span></span>
        <span class="arrow"></span>
      </a>
      <ul class="sub-menu">
        <li class="nav-item <?php if($this->uri->segment(2)=="claims") { echo 'active';}?>">
          <?php echo anchor('report/claims', '<span class="title">Claims <span class="badge badge-info">'.$count_pen_tranc['total'].'</span></span>', array('class'=>'nav-link')) ?>
        </li>
        <li class="nav-item <?php if($this->uri->segment(2)=="payments") { echo 'active';}?>">
          <?php echo anchor('report/payments', '<span class="title">Payments</span>', array('class'=>'nav-link')) ?>
        </li>
        <!-- <li class="nav-item <?php if($this->uri->segment(2)=="commission") { echo 'active';}?>">
          <?php echo anchor('admin/commission', '<span class="title">All Commissions</span>', array('class'=>'nav-link')) ?>
        </li> -->
        <!-- <li class="nav-item <?php if($this->uri->segment(2)=="commission_claim") { echo 'active';}?>">
          <?php echo anchor('admin/commission_claim', '<span class="title">Claimed Commissions</span>', array('class'=>'nav-link')) ?>
        </li> -->
      </ul>
    </li>

    <li class="nav-item <?php if($this->uri->segment(1)=="user") { echo 'active open';}?>">
      <a href="javascript:;" class="nav-link nav-toggle">
        <i class="icon-users"></i>
        <span class="title">Users</span>
        <span class="arrow"></span>
      </a>
      <ul class="sub-menu">
        <li class="nav-item <?php if($this->uri->segment(2)=="get_users" || $this->uri->segment(2)=="edit") { echo 'active';}?>">
          <?php echo anchor('user/get_users', '<span class="title">Users List</span>', array('class'=>'nav-link')) ?>
        </li>
        <li class="nav-item <?php if($this->uri->segment(2)=="register") { echo 'active';}?>">
          <?php echo anchor('user/register', '<span class="title">Register User</span>', array('class'=>'nav-link')) ?>
        </li>
        <li class="nav-item <?php if($this->uri->segment(2)=="get_customer") { echo 'active';}?>">
          <?php echo anchor('user/get_customer', '<span class="title">Customer List</span>', array('class'=>'nav-link')) ?>
        </li>
        <!-- <li class="nav-item <?php if($this->uri->segment(2)=="newslatter") { echo 'active';}?>">
          <?php echo anchor('user/newslatter', '<span class="title">Newslatter</span>', array('class'=>'nav-link')) ?>
        </li> -->
      </ul>
    </li>

    <li class="nav-item <?php if($this->uri->segment(1)=="seller") { echo 'active open';}?>">
      <a href="javascript:;" class="nav-link nav-toggle">
        <i class="icon-users"></i>
        <span class="title">Sellers <span class="badge"><?php echo $count_newSeller['total'] ?></span></span>
        <span class="arrow"></span>
      </a>
      <ul class="sub-menu">
        <li class="nav-item <?php if($this->uri->segment(2)=="seller_list" || $this->uri->segment(2)=="upd_seller") { echo 'active';}?>">
          <?php echo anchor('seller/seller_list', '<span class="title">Sellers List</span>', array('class'=>'nav-link')) ?>
        </li>
        <li class="nav-item <?php if($this->uri->segment(2)=="new_seller") { echo 'active';}?>">
          <?php echo anchor('seller/new_seller', '<span class="title">New Seller <span class="badge">'.$count_newSeller['total'].'</span></span>', array('class'=>'nav-link')) ?>
        </li>
      </ul>
    </li>

    <li class="nav-item <?php if($this->uri->segment(2)=="setting") { echo 'active open';}?>">
      <a  class="nav-link nav-toggle" href="<?php echo base_url('admin/setting') ?>">
        <i class="fa fa-cog"></i>
        <span class="title">Setting</span>
        <!-- <span class="arrow"></span> -->
      </a>
    </li>

    <li class="nav-item <?php if($this->uri->segment(1)=="admin" && ($this->uri->segment(2)=="audit" || $this->uri->segment(2)=="audit_report")) { echo 'active open';}?>">
      <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-history"></i>
        <span class="title">Audit Trails</span>
        <span class="arrow"></span>
      </a>
      <ul class="sub-menu">
        <li class="nav-item <?php if($this->uri->segment(2)=="audit") { echo 'active';}?>">
          <?php echo anchor('admin/audit', '<span class="title">Live Tracking</span>', array('class'=>'nav-link')) ?>
        </li>
        <li class="nav-item <?php if($this->uri->segment(2)=="audit_report") { echo 'active';}?>">
          <?php echo anchor('admin/audit_report', '<span class="title">Reports</span>', array('class'=>'nav-link')) ?>
        </li>
      </ul>
    </li>

    <?php } ?>

    <!-- seller -->
    <?php if ($user_profile['user_group']==2){
      foreach ($count_order as $key) {
        if($key['order_status']<4 && $key['seller_id']==$shop['seller_id'])
        {
          $count_process_order++;
        }
      }
       ?>
      <!-- <li class="nav-item <?php if($this->uri->segment(1)=="catalog" && $this->uri->segment(2)=="product_detail") { echo 'active open';}?>"> -->
        <li class="nav-item">
        <?php if($this->uri->segment(1)=="catalog" && $this->uri->segment(2)=="vendor") {?>
          <li class="nav-item active">
        <?php } ?>
        <?php if($this->uri->segment(1)=="catalog" && $this->uri->segment(2)=="category") {?>
          <li class="nav-item active">
        <?php } ?>
        <?php if($this->uri->segment(1)=="catalog" && ($this->uri->segment(2)=="new_product" || $this->uri->segment(2)=="product_detail" || $this->uri->segment(2)=="product_edit")) {?>
          <li class="nav-item active">
        <?php } ?>
        <?php if($this->uri->segment(1)=="catalog" && $this->uri->segment(2)=="add_stock") {?>
          <li class="nav-item active">
        <?php } ?>
        <?php if($this->uri->segment(1)=="catalog" && $this->uri->segment(2)=="products") {?>
          <li class="nav-item active">
        <?php } ?>
        <a href="javascript:;" class="nav-link nav-toggle">
          <i class="icon-notebook"></i>
          <span class="title">Catalog</span>
          <span class="arrow"></span>
        </a>
        <ul class="sub-menu">
          <li class="nav-item <?php if($this->uri->segment(2)=="new_product") { echo 'active';}?>">
            <?php echo anchor('catalog/new_product', '<span class="title">Add Products</span>', array('class'=>'nav-link')) ?>
          </li>
          <li class="nav-item <?php if($this->uri->segment(2)=="products" || $this->uri->segment(2)=="product_detail" || $this->uri->segment(2)=="product_edit") { echo 'active';}?>">
            <?php echo anchor('catalog/products', '<span class="title">Products List</span>', array('class'=>'nav-link')) ?>
          </li>
          <li class="nav-item <?php if($this->uri->segment(2)=="add_stock") { echo 'active';}?>">
            <?php echo anchor('catalog/add_stock', '<span class="title">Manage Stock</span>', array('class'=>'nav-link')) ?>
          </li>

        </ul>
      </li>

      <li class="nav-item <?php if($this->uri->segment(1)=="orders") { echo 'active open';}?>">
        <a href="javascript:;" class="nav-link nav-toggle">
          <i class="icon-basket"></i>
          <!-- <span class="title">Orders</span> -->
          <span class="title">Orders <span class="badge"><?php echo $count_process_order; ?></span></span>
          <span class="arrow"></span>

        </a>
        <ul class="sub-menu">
          <li class="nav-item <?php if($this->uri->segment(2)=="all_orders" || $this->uri->segment(2)=="detail") { echo 'active';}?>">
            <?php echo anchor('orders/all_orders', '<span class="title">Orders List <span class="badge badge-info">'.$count_process_order.'</span></span>', array('class'=>'nav-link')) ?>
          </li>
          
        </ul>
      </li>
      <li class="nav-item <?php if($this->uri->segment(2)=="upd_seller") { echo 'active open';}?>">
        <a  class="nav-link nav-toggle" href="<?php echo base_url('seller/upd_seller/'.$shop['seller_id']) ?>">
          <i class="icon-credit-card"></i>
          <span class="title">Account</span>
          <!-- <span class="arrow"></span> -->
        </a>
      </li>

      <li class="nav-item <?php if($this->uri->segment(2)=="claims") { echo 'active open';}?>">
        <a  class="nav-link nav-toggle" href="<?php echo base_url('report/claims') ?>">
          <i class="fas fa-exchange-alt"></i>
          <span class="title">Transactions</span>
        </a>
      </li>
      
      <li class="nav-item <?php if($this->uri->segment(2)=="setting") { echo 'active open';}?>">
        <a  class="nav-link nav-toggle" href="<?php echo base_url('admin/setting') ?>">
          <i class="fa fa-cog"></i>
          <span class="title">Setting</span>
          <!-- <span class="arrow"></span> -->
        </a>
      </li>
      <?php } ?>

<!-- staff -->
<?php if ($user_profile['user_group']==3){
  foreach ($count_order as $key) {
    if($key['order_status']<4)
    {
      $count_process_order++;
    }
  }

  ?>
  <!-- <li class="nav-item <?php if($this->uri->segment(1)=="catalog" && $this->uri->segment(2)=="product_detail") { echo 'active open';}?>"> -->
    <li class="nav-item">
    <?php if($this->uri->segment(1)=="catalog" && $this->uri->segment(2)=="category") { ?>
      <li class="nav-item active">
    <?php } ?>
    <?php if($this->uri->segment(1)=="catalog" && ($this->uri->segment(2)=="new_product" || $this->uri->segment(2)=="product_detail" || $this->uri->segment(2)=="product_edit")) {?>
      <li class="nav-item active">
    <?php } ?>
    <?php if($this->uri->segment(1)=="catalog" && $this->uri->segment(2)=="add_stock") { ?>
      <li class="nav-item active">
    <?php } ?>
    <?php if($this->uri->segment(1)=="catalog" && $this->uri->segment(2)=="products") { ?>
      <li class="nav-item active">
    <?php } ?>
    <?php if($this->uri->segment(1)=="catalog" && ($this->uri->segment(2)=="manage_shipping" || $this->uri->segment(2)=="shipping_rule")) {?>
      <li class="nav-item active">
    <?php } ?>
    <a href="javascript:;" class="nav-link nav-toggle">
      <i class="icon-notebook"></i>
      <span class="title">Catalog</span>
      <span class="arrow"></span>
    </a>
    <ul class="sub-menu">
      <li class="nav-item <?php if($this->uri->segment(2)=="new_product") { echo 'active';}?>">
        <?php echo anchor('catalog/new_product', '<span class="title">Add Products</span>', array('class'=>'nav-link')) ?>
      </li>
      <li class="nav-item <?php if($this->uri->segment(2)=="products" || $this->uri->segment(2)=="product_detail" || $this->uri->segment(2)=="product_edit") { echo 'active';}?>">
        <?php echo anchor('catalog/products', '<span class="title">Products List</span>', array('class'=>'nav-link')) ?>
      </li>
      <li class="nav-item <?php if($this->uri->segment(2)=="add_stock") { echo 'active';}?>">
        <?php echo anchor('catalog/add_stock', '<span class="title">Manage Stock</span>', array('class'=>'nav-link')) ?>
      </li>
      <li class="nav-item <?php if($this->uri->segment(2)=="manage_shipping" || $this->uri->segment(2)=="shipping_rule") { echo 'active';}?>">
        <?php echo anchor('catalog/manage_shipping', '<span class="title">Manage Shipping</span>', array('class'=>'nav-link')) ?>
      </li>
    </ul>
  </li>

  <li class="nav-item <?php if($this->uri->segment(1)=="orders") { echo 'active open';}?>">
    <a href="javascript:;" class="nav-link nav-toggle">
      <i class="icon-basket"></i>
      <!-- <span class="title">Orders</span> -->
      <span class="title">Orders <span class="badge"><?php echo $count_process_order; ?></span>
        <!-- <span class="badge badge-danger" title="On Hold"><?php echo $count_order['status'] ?></span>
        <span class="badge badge-warning" title="Processing"><?php echo $count_order['status'] ?></span>
        <span class="badge badge-success" title="Shipping Out"><?php echo $count_order['status'] ?></span> -->
      </span>
      <span class="arrow"></span>

    </a>
    <ul class="sub-menu">
      <li class="nav-item <?php if($this->uri->segment(2)=="all_orders" || $this->uri->segment(2)=="detail") { echo 'active';}?>">
        <?php echo anchor('orders/all_orders', '<span class="title">Orders List <span class="badge badge-info">'.$count_process_order.'</span></span>', array('class'=>'nav-link')) ?>
      </li>
    </ul>
  </li>

  <li class="nav-item <?php if($this->uri->segment(2)=="claims" || $this->uri->segment(2)=="payments") { echo 'active open';}?>">
    <a href="javascript:;" class="nav-link nav-toggle">
      <i class="fas fa-exchange-alt"></i>
      <span class="title">Transactions <span class="badge"><?php echo $count_pen_tranc['total']; ?></span></span>
      <span class="arrow"></span>
    </a>
    <ul class="sub-menu">
      <li class="nav-item <?php if($this->uri->segment(2)=="claims") { echo 'active';}?>">
        <?php echo anchor('report/claims', '<span class="title">Claims <span class="badge badge-info">'.$count_pen_tranc['total'].'</span></span>', array('class'=>'nav-link')) ?>
      </li>
      <li class="nav-item <?php if($this->uri->segment(2)=="payments") { echo 'active';}?>">
        <?php echo anchor('report/payments', '<span class="title">Payments</span>', array('class'=>'nav-link')) ?>
      </li>
      <!-- <li class="nav-item <?php if($this->uri->segment(2)=="commission") { echo 'active';}?>">
        <?php echo anchor('admin/commission', '<span class="title">All Commissions</span>', array('class'=>'nav-link')) ?>
      </li> -->
      <!-- <li class="nav-item <?php if($this->uri->segment(2)=="commission_claim") { echo 'active';}?>">
        <?php echo anchor('admin/commission_claim', '<span class="title">Claimed Commissions</span>', array('class'=>'nav-link')) ?>
      </li> -->
    </ul>
  </li>

  <li class="nav-item <?php if($this->uri->segment(1)=="seller") { echo 'active open';}?>">
    <a href="javascript:;" class="nav-link nav-toggle">
      <i class="icon-users"></i>
      <span class="title">Sellers <span class="badge"><?php echo $count_newSeller['total'] ?></span></span>
      <span class="arrow"></span>

    </a>
    <ul class="sub-menu">
      <li class="nav-item <?php if($this->uri->segment(2)=="seller_list" || $this->uri->segment(2)=="upd_seller") { echo 'active';}?>">
        <?php echo anchor('seller/seller_list', '<span class="title">Sellers List</span>', array('class'=>'nav-link')) ?>
      </li>
      <li class="nav-item <?php if($this->uri->segment(2)=="new_seller") { echo 'active';}?>">
        <?php echo anchor('seller/new_seller', '<span class="title">New Seller <span class="badge badge-info">'.$count_newSeller['total'].'</span></span>', array('class'=>'nav-link')) ?>
      </li>
    </ul>
  </li>
  
  <?php } ?>