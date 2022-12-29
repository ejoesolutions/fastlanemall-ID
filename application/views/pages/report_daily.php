<table class="table table-bordered" id="sample_1">
  <thead>
    <th data-priority="1" class="text-center">NO.</th>
    <th data-priority="3" class="text-center">ORDER ID</th>
    <th data-priority="6" class="text-center">FOR</th>
    <th data-priority="5" class="text-center">TO</th>
    <th data-priority="4" class="text-center">STATUS</th>
    <th data-priority="3" class="text-center">AMOUNT (Rp)</th>
    <th data-priority="8" class="text-center">NOTE</th>
    <th data-priority="2" class="text-center">#</th>
  </thead>
  <tbody>
    <?php
    $i=1;

      if(!empty($all_report)){
        foreach ($all_report as $row){?>
            <tr class="text-center">
              <td><?php echo $i++;?></td>
              <td>
              <?php if (!$this->data['shop']['seller_id'] && $row['category']!=4) { ?>
                <a href="<?= base_url('') ?>orders/detail/<?= $row['order_id'] ?>/<?= $row['seller_id'] ?>">#<?php echo $row['order_id'];?></a>
              <?php }else { ?>
                #<?php echo $row['order_id'];?>
              <?php } ?>
              </td>
              <td>
                <?php if ($row['category']==1) { 
                  echo "Release Payment";
                }else if ($row['category']==2 || $row['category']==3) {
                  echo "Referral Commission";
                }elseif ($row['category']==4) {
                  echo "Claim Payment";
                }elseif ($row['category']==5) {
                  echo "Service Charge";
                }elseif ($row['category']==6) {
                  echo "Rebate";
                } ?>
              </td>
              <td>
                <?php if ($row['shop_id']) { 
                  echo $row['shop_name'];
                }elseif ($row['refer_fullname']) {
                  echo $row['refer_fullname'];
                } ?>
              </td>
              <td><?= ($row['status']==0) ? '<span class="label label-warning">Pending</span>' : '<span class="label label-success">Complete</span>' ?></td>
              <td><?php echo $row['amount'];?></td>
              <td><?php echo $row['note'];?></td>
              <td>
                <?php if ($row['category']==4 && $row['status']==0 && ($user_profile['user_group']==1 || $user_profile['user_group']==0)) {  ?>
                  <a data-toggle="modal" data-target="#payModal" class="text-info open-payModal"
                    data-seller_id="<?= $row['seller_id'] ?>" data-id="<?= $row['id'] ?>" data-shop_name="<?= $row['shop_name'] ?>" data-amount="<?= $row['amount'] ?>" data-fullname="<?= $row['refer_fullname'] ?>" data-shop_image="<?= $row['shop_image'] ?>" data-user_image="<?= $row['user_image'] ?>" data-user_id="<?= $row['user_id'] ?>">
                    Pay
                  </a>
                <?php }else if ($row['category']==4 && $row['status']==1) { ?>
                  <a data-toggle="modal" data-target="#detailClaim" class="text-info open-detailModal"
                    data-shop_name="<?= $row['shop_name'] ?>" data-amount="<?= $row['amount'] ?>" data-note="<?= $row['note'] ?>" data-type="<?= $row['pay_type'] ?>" data-claim_date="<?= date('d-m-Y H:i', strtotime($row['req_date'])) ?>" data-pay_date="<?= date('d-m-Y H:i', strtotime($row['pay_date'])) ?>"  data-fullname="<?= $row['refer_fullname'] ?>">
                    Detail
                  </a>
                <?php }else if ($row['category']==1 || $row['category']==5) { ?>
                  <a href="<?= base_url('orders/detail/'.$row['order_id'].'/'.$row['shop_id']) ?>">Detail</a>
                <?php }else {
                  echo '-';
                } ?>
              </td>
          </tr>
          <?php 
        }
      } ?>
  </tbody>
</table>