<table class="table table-bordered" id="sample_1">
  <thead>
    <th width="10">No.</th>
    <!-- <th class="text-center">LOGO</th> -->
    <th class="text-center">Shop</th>
    <th class="text-center">Seller Name</th>
    <th class="text-center">Phone No.</th>
    <th class="text-center">Email</th>
    <th class="text-center">Address</th>
    <th class="text-center">Status</th>
  </thead>
  <tbody>
    <?php
    $i=1;
    if(!empty($all_report)){
      foreach ($all_report as $seller){
        ?>
          <tr>
            <td><?php echo $i++;?></td>
            <!-- <td class="text-center">
              <?php
              if ($seller['vendor_logo']) {

                $image_properties = array(
                  'src'   => base_url().'logo_vendor/'.$seller['vendor_logo'],
                  'alt'   => $v['vendor_name'],
                  'class' => 'img-thumbnail',
                  'width' => '50',
                  'height'=> '50',
                  'title' => $seller['vendor_name'],
                );
                echo img($image_properties);

              } else {

                $image_properties = array(
                  'src'   => 'https://dummyimage.com/75x75/d6c7d6/9b9dad.jpg&text=No+Image',
                  'alt'   => 'No image',
                  'class' => 'img-thumbnail',
                  'width' => '50',
                  'height'=> '50',
                  'title' => 'No image',
                );
                echo img($image_properties);
              }

              ?>
            </td> -->
            <td><?php echo $seller['shop_name'] ?></td>
            <td><?php echo $seller['full_name'] ?></td>
            <td class="text-center"><?php echo $seller['phone'] ?></td>
            <td class="text-center"><?php echo $seller['email'] ?></td>
            <td><?php echo $seller['address'].' '.$seller['postcode'].' '.$seller['town_area'].' '.$seller['state'] ?></td>
            <td class="text-center">
              <?php
                if($seller['seller_status']==1){
                  echo "Active";
                }else{
                  echo "Not Active";
                }
               ?>
            </td>
        </tr>

    <?php
      }
    }
    ?>
</tbody>
</table>
