<div class="portlet box blue">
  <div class="portlet-title">
    <div class="caption">
      <?php echo $title;

       ?>
    </div>
  </div>
  <div class="portlet-body">
    <table class="table table-bordered" id="sample_3">
      <thead>
        <th class="text-center">NO.</th>
        <th class="text-center">SHOP NAME</th>
        <th class="text-center">SELLER NAME</th>
        <!-- <th class="text-center">COMMISSION</th> -->
        <th class="text-center">EMAIL</th>
        <th class="text-center">PHONE</th>
        <th class="text-center">STATUS</th>
        <th class="text-center">CREATED</th>
        <th class="text-center">#</th>
      </thead>
      <tbody>
        <?php
        $i=1;

          if(!empty($seller)){
              foreach ($seller as $row){?>
            <?php if ($row['seller_verify'] != 0){ ?>
              <tr class="text-center">
                <td><?php echo $i++;?></td>
                <td><?php echo $row['shop_name'];?></td>
                <td><?php echo $row['full_name'];?></td>
                <!-- <td>Rp <?php echo number_format($row['total'], 2, '.', '') ;?></td> -->
                <td><?php echo $row['email'];?></td>
                <td class="text-center"><?php echo $row['phone'];?></td>
                <td class="text-center">
                  <?php if($row['seller_status']==1) {
                    echo '<span class="">Active</span>';
                  }else{
                    echo '<span class="text-danger">Deactive</span>';
                  }
                  ?>
                </td>
                <td class="text-center"><?php echo date("d/m/Y",strtotime($row['seller_created'])); ?></td>
                <td class="text-center">
                  <?php echo anchor('seller/upd_seller/'.$row['seller_id_link'], 'View') ;?>
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
