<div class="portlet box blue">
  <div class="portlet-title">
    <div class="caption">
      <?php echo $title; ?>
    </div>
  </div>
  <div class="portlet-body">
    <table class="table table-bordered" id="sample_3">
      <thead>
        <th class="text-center">NO.</th>
        <th class="text-center">NAME</th>
        <!-- <th class="text-center">COMMISSION</th> -->
        <th class="text-center">EMAIL</th>
        <th class="text-center">STATUS</th>
        <th class="text-center">CATEGORY</th>
        <th class="text-center">CREATED</th>
        <th class="text-center">ACCESSED</th>
        <th class="text-center">#</th>
      </thead>
      <tbody>
        <?php
        $i=1;

        //superadmin
        if($user_profile['user_group']==0){
          foreach ($users as $user){?>
              <tr class="text-center">
                <td><?php echo $i++;?></td>
                <td><?php echo htmlspecialchars($user['full_name'],ENT_QUOTES,'UTF-8');?></td>
                <td><?php echo htmlspecialchars($user['email'],ENT_QUOTES,'UTF-8');?></td>
                <td class="text-center">
                  <?php if($user['active'])
                  {
                    echo '<span class="">Active</span>';
                  }else{
                    echo '<span class="text-danger">Deactive</span>';
                  }
                  ?>
                </td>
                <td class="text-center">
                  <?php if($user['user_group']==0)
                  {
                    echo '<span class="">Superadmin</span>';
                  }else if($user['user_group']==1){
                    echo '<span class="">Admin</span>';
                  }elseif ($user['user_group']==3) {
                    echo '<span class="">Staff</span>';
                  }else{
                    echo '<span class="">Customer</span>';
                  }
                  ?>
                </td>
                <td class="text-center">
                  <?php
                  if ($user['created_on'])
                  {
                    echo htmlspecialchars(date('d-m-Y', $user['created_on']),ENT_QUOTES,'UTF-8');
                  } else {
                    echo '<span class="text-danger">No Record</span>';
                  }
                  ?>
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
                  <?php
                    if($user['user_group']!=0)
                    {
                      //echo anchor('user/delete_user/'.$user['id'], ' | Delete',array('onclick'=>'return confirm("Are you sure?")'));
                      ?>
                      <a href="<?php echo base_url('user/delete_user/'.$user['id']) ?>" onclick="return confirm('All records that related to this user also will be deleted.')"> | Delete</a>
                      <?php
                    }
                   ?>
              </td>

            </tr>
            <?php }
           //}
        }

        //admin
        if($user_profile['user_group']==1){
          foreach ($users as $user){?>
            <?php if ($user['user_group'] != 0){ ?>
              <tr class="text-center">
                <td><?php echo $i++;?></td>
                <td><?php echo htmlspecialchars($user['full_name'],ENT_QUOTES,'UTF-8');?></td>
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
                  }else if($user['user_group']==3){
                    echo '<span class="">Staff</span>';
                  }else{
                    echo '<span class="">Customer</span>';
                  } ?>
                </td>
                <td class="text-center">
                  <?php
                  if ($user['created_on'])
                  {
                    echo htmlspecialchars(date('d-m-Y', $user['created_on']),ENT_QUOTES,'UTF-8');
                  } else {
                    echo '<span class="text-danger">No Record</span>';
                  }
                  ?>
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
                  
              </td>

            </tr>
            <?php }
           }
        }
        ?>
    </tbody>
  </table>

</div>
</div>
