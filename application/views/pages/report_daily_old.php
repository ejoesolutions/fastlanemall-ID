<table class="table table-bordered" id="sample_1">
<thead>
  <th class="text-center">No.</th>
  <th class="text-center">Time</th>
  <th class="text-center">Cust ID</th>
  <th class="text-center">Cust Name</th>
  <th class="text-center">Contact No</th>
  <th class="text-center">Email</th>
  <th class="text-center">Product Name</th>
  <th class="text-center">Product Type</th>
  <th class="text-center">Seller</th>
  <th class="text-center">Weight (g)</th>
  <th class="text-center">Qty</th>
  <th class="text-center">Price (Rp)</th>
  <th class="text-center">Tax (Rp)</th>
  <th class="text-center">Shipping (Rp)</th>
  <th class="text-center">Total Price (Rp)</th>
</thead>
<tbody>
  <?php
  $n=1;
  if(!empty($all_report)){
    $total_all=0;
    foreach ($all_report as $k) {
      //$arr_order[]=array('order_id'=>$k['order_id']);
      if($user_profile['user_group']==2)
      {
          if($k['seller_id']==$shop['seller_id'])
          {
            ?>
            <tr>
              <td><?php echo $n++; ?></td>
              <td class="text-center"><?php echo date("d/m/Y H:i",strtotime($k['created_date'])); ?></td>
              <td class="text-center"><?php echo $k['created_by'] ?></td>
              <td><?php echo $k['full_name'] ?></td>
              <td class="text-center"><?php echo $k['phone'] ?></td>
              <td class="text-center"><?php echo $k['email'] ?></td>
              <td><?php echo $k['product_name'] ?></td>
              <td><?php echo $k['category_type'] ?></td>
              <td><?php echo $k['shop_name'] ?></td>
              <td class="text-center"><?php echo $k['weight'] ?></td>
              <td class="text-center"><?php echo $k['qty'] ?></td>
              <td class="text-center"><?php echo $k['ordered_price'] ?></td>
              <td class="text-center"><?php echo $k['tax'] ?></td>
              <td class="text-center"><?php echo $k['shipping_seller'] ?></td>
              <td class="text-center"><?php echo $k['total_sale'] ?></td>
            </tr>
            <?php
            $total_all+=$k['total_sale'];

          }
      }else{
        ?>
        <tr>
          <td><?php echo $n++; ?></td>
          <td class="text-center"><?php echo date("d/m/Y H:i",strtotime($k['created_date'])); ?></td>
          <td class="text-center"><?php echo $k['created_by'] ?></td>
          <td><?php echo $k['full_name'] ?></td>
          <td class="text-center"><?php echo $k['phone'] ?></td>
          <td class="text-center"><?php echo $k['email'] ?></td>
          <td><?php echo $k['product_name'] ?></td>
          <td><?php echo $k['category_type'] ?></td>
          <td><?php echo $k['shop_name'] ?></td>
          <td class="text-center"><?php echo $k['weight'] ?></td>
          <td class="text-center"><?php echo $k['qty'] ?></td>
          <td class="text-center"><?php echo $k['ordered_price'] ?></td>
          <td class="text-center"><?php echo $k['tax'] ?></td>
          <td class="text-center"><?php echo $k['shipping_seller'] ?></td>
          <td class="text-center"><?php echo $k['total_sale'] ?></td>
        </tr>
        <?php
        $total_all+=$k['total_sale'];

      }

    }
    //$unik_order=array_values(array_unique($arr_order,SORT_REGULAR));
    //print_r($unik_order);
    //$t_ship=0;

    //   foreach ($order_status as $key) {
    //     if($key['order_status']==4)
    //     {
    //       if($user_profile['user_group']==2){
    //         if($shop['seller_id']==$key['seller_id'])
    //         {
    //           foreach ($unik_order as $key2) {
    //             if($key2['order_id']==$key['order_id'])
    //             {
    //               $t_ship+=$key['shipping_seller'];
    //             }
    //           }
    //         }
    //       }else{
    //         foreach ($unik_order as $key2) {
    //           if($key2['order_id']==$key['order_id'])
    //           {
    //             $t_ship+=$key['shipping_seller'];
    //           }
    //         }
    //       }
    //     }
    // }
  }
   ?>
</tbody>
</table>
<?php
  if(!empty($all_report)){
    //echo '<b>Total shipping = Rp '.number_format($t_ship,2).'</b>';
    echo '<b>Total order on '.date("d M Y",strtotime($date)).' = Rp '.number_format($total_all,2).'</b>';
  }
