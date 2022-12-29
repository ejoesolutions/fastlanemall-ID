<style>
.active {
  background-color : #189ca2;
  color : white;
}

.not-active {
  background-color:#246f96;
  color:white;
}
</style>

<ul class="nav nav-pills nav-stacked">
  <li>
    <a href="<?php echo base_url('member/dashboard') ?>" class="<?php echo ($this->uri->segment(2) == 'dashboard') ? 'active' : 'not-active' ?>">
      My Account
    </a>
  </li>
  <li>
    <a href="<?php echo base_url('member/addresses') ?>" class="<?php echo ($this->uri->segment(2) == 'addresses') ? 'active' : 'not-active' ?>">
      My Addresses
    </a>
  </li>
  <li>
    <a href="<?php echo base_url('member/orders') ?>" class="<?php echo ($this->uri->segment(2) == 'orders' || $this->uri->segment(2) == 'view_order') ? 'active' : 'not-active' ?>">
      My Orders
    </a>
  </li>
  <li>
    <a href="<?php echo base_url('member/comissions') ?>" class="<?php echo ($this->uri->segment(2) == 'comissions') ? 'active' : 'not-active' ?>">
      My Commissions
    </a>
  </li>
  <li>
    <a href="<?php echo base_url('member/referral') ?>" class="<?php echo ($this->uri->segment(2) == 'referral') ? 'active' : 'not-active' ?>">
      Referral Status
    </a>
  </li>
</ul>
<br>