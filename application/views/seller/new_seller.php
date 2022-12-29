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
            <?php if ($row['seller_verify'] == 0){ ?>
              <tr>
                <td><?php echo $i++;?></td>
                <td><?php echo $row['shop_name'];?></td>
                <td><?php echo $row['full_name'];?></td>
                <td><?php echo $row['email'];?></td>
                <td class="text-center"><?php echo $row['phone'];?></td>
                <td class="text-center">
                  <?php if($row['seller_verify']==0) {
                    echo '<span class="text-danger">Unverified</span>';
                  } ?>
                </td>
                <td class="text-center"><?php echo date("d/m/Y",strtotime($row['seller_created'])); ?></td>
                <td class="text-center">
                  <!-- <a id="<?php echo $row['seller_id']; ?>" class="upd_verify">verify</a> -->
                  <a onclick="return confirm('Verify Seller?');" href="<?= base_url('seller/upd_verify/'.$row['seller_id']) ?>" class="upd_verify">verify</a>
                  
                </td>
              </tr>
            <?php }
            }
          }
        ?>
    </tbody>
  </table>

  <div class="modal fade bs-modal-xl" id="verifySeller" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="modal-title">Verify Seller</h4>
        </div>
        <?php echo form_open('seller/upd_verify', array('class'=>'form-horizontal')); ?>
        <div class="modal-body" id="detail_seller">

        </div>
        <div class="modal-footer">

          <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Verify</button>
        </div>
        <?php echo form_close() ?>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</div>
</div>

