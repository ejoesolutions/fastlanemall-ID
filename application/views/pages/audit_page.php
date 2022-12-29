<div class="portlet box blue">
  <div class="portlet-title">
    <div class="caption">
      <?php echo $title;

       ?>
    </div>
  </div>
  <div class="portlet-body">
    <table class="table table-bordered" id="sample_1">
      <thead>
        <th class="text-center">NO.</th>
        <th class="text-center">IP ADDRESS</th>
        <th class="text-center">USER ID</th>
        <th class="text-center">USERNAME</th>
        <th class="text-center">ACTIONS</th>
        <th class="text-center">RECORDED DATE</th>
      </thead>
      <tbody>
        <?php
        $i=1;

      if(!empty($audit)){
        foreach ($audit as $row){?>
          <?php //if ($user['user_group'] != 0){ ?>
            <tr>
              <td><?php echo $i++;?></td>
              <td><?php echo $row['ip_address'];?></td>
              <td><?php echo $row['user_id'];?></td>
              <td><?php echo $row['username'];?></td>
              <td><?php echo $row['description'];?></td>
              <td><?php echo date('d/m/Y h:i:s',strtotime($row['time_record']));?></td>
          </tr>
          <?php }
      }
        ?>
    </tbody>
  </table>
  <?php
  if(!empty($audit)){
    echo anchor('admin/print_auditTrails/1', '<i class="fa fa-print"></i>Print', array('class'=>'btn btn-success','target'=>'_blank'));
  }
   ?>
</div>
</div>
