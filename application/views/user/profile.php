<div class="portlet box blue">
  <div class="portlet-title">
    <div class="caption">
      <?php echo $title ?>
    </div>
  </div>
  <div class="portlet-body">
    <div class="row">
      <div class="col-md-12">
        <div class="profile-sidebar">

          <div class="portlet light profile-sidebar-portlet bordered">
            <div class="profile-userpic">
              <img src="https://dummyimage.com/400x400/afc4f0/8386a8" class="img-responsive" alt="">
            </div>
            <div class="profile-usertitle">
              <div class="profile-usertitle-name"> <?php echo $user_profile['full_name']; ?> </div>
              <!-- <div class="profile-usertitle-job"> RESELLER </div> -->
            </div>
            <!-- <div class="profile-usermenu">
              <ul class="nav">
                <li class="active">
                  <a href="page_user_profile_1.html">
                    <i class="icon-home"></i> Overview
                  </a>
                </li>
                <li>
                  <a href="page_user_profile_1_account.html">
                    <i class="icon-settings"></i> Settings
                  </a>
                </li>
                <li>
                  <a href="page_user_profile_1_help.html">
                    <i class="icon-envelope"></i> Messages
                  </a>
                </li>
              </ul>
            </div> -->
          </div>

          <div class="portlet light bordered">
            <!-- <?php if ($this->ion_auth->in_group('agent')): ?>
              <div class="row list-separated profile-stat">
                <a href="#">
                <div class="col-md-4 col-sm-4 col-xs-6">
                  <div class="uppercase profile-stat-title"> 37 </div>
                  <div class="uppercase profile-stat-text"> Orders </div>
                </div>
                </a>
                <a href="#">
                <div class="col-md-4 col-sm-4 col-xs-6">
                  <div class="uppercase profile-stat-title"> 51 </div>
                  <div class="uppercase profile-stat-text"> Sold </div>
                </div>
                </a>
                <a href="#">
                <div class="col-md-4 col-sm-4 col-xs-6">
                  <div class="uppercase profile-stat-title"> 61 </div>
                  <div class="uppercase profile-stat-text"> Agents </div>
                </div>
                </a>
              </div>
            <?php endif; ?> -->
            <div>
              <h4 class="profile-desc-title">Contacts:</h4>
              <span class="profile-desc-text">
                 <!-- <?php
                 if ($user_profile['address']) {
                   echo $user_profile['address'];
                 } else {
                   echo 'No address provided '. anchor('#', '<i class="fa fa-plus-circle"></i>',array('class'=>'btn','title'=>'Update address'));
                 }

                ?> -->
               </span>
              <div class="margin-top-20 profile-desc-link">
                <i class="fa fa-envelope"></i>
                <a href="mailto:<?php echo $user_profile['email']; ?>"><?php echo $user_profile['email']; ?></a>
              </div>
              <div class="margin-top-20 profile-desc-link">
                <i class="fa fa-phone"></i>
                <b><?php echo $user_profile['phone']; ?></b>
              </div>
              <!-- <div class="margin-top-20 profile-desc-link">
                <i class="fa fa-facebook"></i>
                <a href="http://www.facebook.com/keenthemes/">keenthemes</a>
              </div> -->

            </div>
          </div>

        </div>

        <div class="profile-content">
          <div class="row">
            <div class="col-md-12">
              <div class="portlet light bordered">
                <div class="portlet-title">
                  <div class="caption caption-md">
                    <i class="icon-bar-chart theme-font hide"></i>
                    <span class="caption-subject font-blue-madison bold uppercase">Profile</span>
                    <!-- <pre><?php print_r($user_profile) ?></pre> -->
                    <br><br>
                    <table class="table table-striped">
                      <tr>
                        <th width=50%>NAMA</th>
                        <td><?php echo $user_profile['full_name'];?></td>
                      </tr>
                      <tr>
                        <th>USERNAME</th>
                        <td><?php echo $user_profile['username'];?></td>
                      </tr>
                      <tr>
                        <th>ALAMAT</th>
                        <td><?php echo $user_profile['address'];?></td>
                      </tr>
                      <?php
                      if(!$this->ion_auth->in_group(array('admin','user_admin','manage_product','manage_order','verify_order'))){
                        ?>
                        <tr>
                          <th>NAMA SYARIKAT</th>
                          <td><?php echo $user_profile['company_name'];?></td>
                        </tr>
                        <tr>
                          <th>NAMA WAKALAH</th>
                          <td><?php echo $user_profile['wakalah_name'];?></td>
                        </tr>
                        <?php
                      }
                       ?>

                    </table>
                    <hr>
                    <?php echo anchor('user/edit/'.$user_profile['id'], 'Kemasikini', array('class'=>'btn btn-success')); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
