<div class="portlet box blue">
  <div class="portlet-title">
    <div class="caption">
      <?php echo $title; ?>
    </div>
  </div>
  <div class="portlet-body">
    <table class="table table-bordered" id="sample_3">
      <thead>
        <th data-priority="1" class="text-center">NO.</th>
        <th data-priority="2" class="text-center">NAME</th>
        <th data-priority="3" class="text-center">REFERRAL</th>
        <!-- <th class="text-center">COMMISSION</th> -->
        <th data-priority="7" class="text-center">EMAIL</th>
        <th data-priority="4" class="text-center">STATUS</th>
        <th data-priority="5" class="text-center">CATEGORY</th>
        <th data-priority="8" class="text-center">CREATED</th>
        <th data-priority="9" class="text-center">ACCESSED</th>
        <th data-priority="6" class="text-center">#</th>
      </thead>
      <tbody>
        <?php
        $i=1;

          foreach ($users as $user){ ?>
              <tr class="text-center">
                <td><?php echo $i++;?></td>
                <td><?php echo htmlspecialchars($user['full_name'],ENT_QUOTES,'UTF-8');?></td>
                <td><?= $user['total_referral'] > 0 ? $user['total_referral'] : 0 ?></td>
                <td><?php echo htmlspecialchars($user['email'],ENT_QUOTES,'UTF-8');?></td>
                <td class="text-center">
                  <?php if($user['active']) {
                    echo '<span class="">Active</span>';
                  }else{
                    echo '<span class="text-danger">Deactive</span>';
                  } ?>
                </td>
                <td class="text-center">
                  <?php if($user['user_group']==0) {
                    echo '<span class="">Superadmin</span>';
                  }else if($user['user_group']==1){
                    echo '<span class="">Admin</span>';
                  }elseif ($user['user_group']==3) {
                    echo '<span class="">Staff</span>';
                  }else{
                    echo '<span class="">Customer</span>';
                  } ?>
                </td>
                <td class="text-center">
                  <?php if ($user['created_on']) {
                    echo htmlspecialchars(date('d-m-Y', $user['created_on']),ENT_QUOTES,'UTF-8');
                  } else {
                    echo '<span class="text-danger">No Record</span>';
                  } ?>
                </td>
                <td class="text-center">
                  <?php
                  if ($user['last_login'])
                  {
                    echo htmlspecialchars(date('d-m-Y', $user['last_login']),ENT_QUOTES,'UTF-8');
                  } else {
                    echo '<span class="text-danger">No Record</span>';
                  }
                  ?>
                </td>
                <td class="text-center">
                  <?php echo anchor('user/edit/'.$user['id'], 'View') ;?>
                  <?php if($user['user_group']!=0) {
                    //echo anchor('user/delete_user/'.$user['id'], ' | Delete',array('onclick'=>'return confirm("Are you sure?")'));
                      ?>
                    <a href="<?php echo base_url('user/delete_user/'.$user['id']) ?>" onclick="return confirm('All records that related to this user also will be deleted.')"> | Delete</a>
                      <?php
                    }
                   ?>
              </td>

            </tr>
            <?php } ?>
    </tbody>
  </table>

</div>
</div>
