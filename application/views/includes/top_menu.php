
<ul class="nav navbar-nav pull-right">

  <!-- <li class="dropdown dropdown-user">
    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
      <span class="username">
        <?php if($this->session->userdata('site_lang') == 'english'):?>
          &nbsp;<img alt="" src="<?php echo base_url('assets/') ?>global/img/flags/gb.png"> <small> ENGLISH</small>
        <?php endif;?>
        <?php if($this->session->userdata('site_lang') == 'bahasa'):?>
          &nbsp;<img alt="" src="<?php echo base_url('assets/') ?>global/img/flags/my.png"> <small> MALAY</small>
        <?php endif;?>
        <?php if($this->session->userdata('site_lang') == ''):?>
          &nbsp;<img alt="" src="<?php echo base_url('assets/') ?>global/img/flags/gb.png"> <small> ENGLISH</small>
        <?php endif;?>
      </span>
      <i class="fa fa-angle-down"></i>
    </a>
    <ul class="dropdown-menu dropdown-menu-default">
      <li>
        <?php echo anchor('languages/change/english', img(base_url('assets/').'global/img/flags/gb.png').' <small> ENGLISH</small>') ?>
      </li>

      <li>
        <?php echo anchor('languages/change/bahasa', img(base_url('assets/').'global/img/flags/my.png').' <small> MALAY</small>') ?>
      </li>
    </ul>
  </li> -->

  <li class="dropdown dropdown-user">
    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
      <!-- <span class="username"> <i class="icon-user"></i> My Profile </span> -->
      <?php
      //print_r($user_profile);
      if ($user_profile['user_group']==1): ?>
        <span class="username over-flow-name"> <i class="icon-user"></i> Welcome, <?php echo  $user_profile['full_name'].' [ADMIN]'; ?> </span><?php
      endif;
      if ($user_profile['user_group']==0): ?>
        <span class="username over-flow-name"><i class="icon-user"></i> Welcome, <?php echo  $user_profile['full_name'].' [SUPERADMIN]'; ?> </span><?php
      endif;
      if ($user_profile['user_group']==2): ?>
        <span class="username over-flow-name"> <i class="icon-user"></i> Welcome, <?php echo  $user_profile['full_name'].' [SELLER]'; ?></span><?php
      endif;
      if ($user_profile['user_group']==3): ?>
        <span class="username over-flow-name"> <i class="icon-user"></i> Welcome, <?php echo  $user_profile['full_name'].' [STAFF]'; ?> </span><?php
      endif;
       ?>
      <i class="fa fa-angle-down"></i>
    </a>
    <ul class="dropdown-menu dropdown-menu-default">
      <li>
        <?php echo anchor('user/edit/'.$user_profile["id"],'<i class="icon-user"></i> My Profile') ?>
      </li>
      <li>
        <?php echo anchor('user/logout', '<i class="icon-key"></i> Log Out', array()) ?>
      </li>
    </ul>
  </li>

</ul>
