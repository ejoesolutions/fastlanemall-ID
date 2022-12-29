<?php if ($this->ion_auth->in_group('wakalah_admin')): ?>
<!-- laporan setiap wakalah cawangan -->
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
        <tr class="uppercase" bgcolor='grey'>
          <th width="30px" >NO.</th>
          <th nowrap >WAKALAH</th>
          <th nowrap >PRODUK</th>
          <th class="text-center" width="160px">STOK</th>
        </tr>
      </thead>
      <tbody>
        <?php if($products_wakalah){ ?>
            <?php
            $n=1;
            ?>
            <?php
            foreach ($wakalah as $value)
            {
              //if($user_profile['wakalah_id']!=$value->wakalah_id)
              //{
                ?>
                <tr>
                  <td><?php echo $n++; ?></td>
                  <?php if($value->hq==1){?>
                      <td><?php echo $value->wakalah_name.' - HQ'; ?></td>
                  <?php }else{ ?>
                      <td><?php echo $value->wakalah_name; ?></td>
                  <?php } ?>
                  <td>
                  <?php
                  $f=0;
                  foreach ($products_wakalah as $row)
                  {
                      if($row->wakalah_id==$value->wakalah_id)
                      {
                         echo '<strong>'.$row->product_name.'</strong> - '.$row->karat;
                         echo '<br><small>CODE : '.$row->item_code.'</small><br>';
                         $f=1;
                      }
                  }
                  if($f!=1){
                    echo "N/A";
                  }
                  ?>
                 </td>
                 <td class="text-center">
                 <?php
                 foreach ($products_wakalah as $row)
                 {
                     if($row->wakalah_id==$value->wakalah_id)
                     {

                       if ($row->stock < 20 ) {
                         echo '<span class="text-danger">'.$row->stock.'<br></span>';
                       } else {
                         echo '<span class="text-info">'.$row->stock.'<br></span>';
                       }

                        //echo $row->stock.'<br>';
                        echo '<br>';
                        $f=1;
                     }
                 }
                 if($f!=1){
                   echo "N/A";
                 }
                 ?>
                </td>
              </tr>
              <?php
              //}
            }
          }
      ?>
      </tbody>
    </table>
  </div>
</div>
<?php endif; ?>
