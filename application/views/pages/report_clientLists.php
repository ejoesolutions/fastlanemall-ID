<table class="table table-bordered" id="sample_1">
  <thead>
    <th width="10">No.</th>
    <th class="text-center">ID</th>
    <th class="text-center">Name</th>
    <th class="text-center">Contact No.</th>
    <th class="text-center">Email</th>
    <th class="text-center">Address</th>
  </thead>
  <tbody>
    <?php
    $i=1;
    if(!empty($all_report)){
      foreach ($all_report as $c){
        ?>
          <tr>
            <td><?php echo $i++;?></td>
            <td><?php echo $c['ahli_id'] ?></td>
            <td><?php echo $c['full_name'] ?></td>
            <td class="text-center"><?php echo $c['phone'] ?></td>
            <td class="text-center"><?php echo $c['email'] ?></td>
            <td><?php echo $c['address'].' '.$c['postcode'].' '.$c['town_area'].' '.$c['state'] ?></td>
        </tr>

    <?php
      }
    }
    ?>
</tbody>
</table>
