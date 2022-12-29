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
        <th class="text-center">SHOP NAME</th>
        <th class="text-center">SELLER NAME</th>
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
                  <td class="text-center"><?php echo $row['shop_name'];?></td>
                  <td><?php echo $row['full_name'];?></td>
                  <td class="text-center">
                    <?php echo anchor('catalog/shipping_rule/'.$row['seller_id'], 'Manage') ;?>
                  </td>
              </tr>
              <?php }
             }
          } ?>
    </tbody>
  </table>
</div>
</div>
