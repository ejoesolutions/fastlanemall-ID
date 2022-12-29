<table class="table table-bordered" id="sample_1">
<thead>
  <th class="text-center">No.</th>
  <th class="text-center">Seller</th>
  <th class="text-center">Time</th>
  <th class="text-center">Cust ID</th>
  <th class="text-center">Cust Name</th>
  <th class="text-center">Contact No</th>
  <th class="text-center">Email</th>
  <th class="text-center">Product Name</th>
  <th class="text-center">Product Type</th>
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
    // foreach ($all_report as $key) {
    //   $arr_order[]=array('order_id'=>$key['order_id']);
    // }
    // $unik_order=array_values(array_unique($arr_order,SORT_REGULAR));

    foreach ($data_seller as $row) {
      $total_all=0;$t_ship2=0;
      foreach ($all_report as $k) {
        //foreach ($detail_order as $v) {
          //if($k['order_id']==$v['order_id']){
            if($row['seller_id']==$k['seller_id']){
              ?>
              <tr>
                <td><?php echo $n++; ?></td>
                <td><?php echo $row['shop_name']; ?></td>
                <td class="text-center"><?php echo date("d/m/Y H:i",strtotime($k['created_date'])); ?></td>
                <td class="text-center"><?php echo $k['created_by'] ?></td>
                <td><?php echo $k['full_name'] ?></td>
                <td class="text-center"><?php echo $k['phone'] ?></td>
                <td class="text-center"><?php echo $k['email'] ?></td>
                <td><?php echo $k['product_name'] ?></td>
                <td><?php echo $k['category_type'] ?></td>
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
          //}
        //}
      }
      // foreach ($order_status as $key) {
      //   if($key['order_status']==4 && $row['seller_id']==$key['seller_id'])
      //   {
      //     foreach ($unik_order as $key2) {
      //       if($key2['order_id']==$key['order_id'])
      //       {
      //         $t_ship2+=$key['shipping_seller'];
      //       }
      //     }
      //   }
      // }

      $total_each_seller[]=array('shop_name'=>$row['shop_name'],'seller_name'=>$row['full_name'],'subtotal_seller'=>$total_all);
    }
  }
   ?>
</tbody>
</table>
<?php
  if(!empty($all_report)){
    $grand_total=0;$t_ship=0;
    foreach ($total_each_seller as $value) {
        if($value['subtotal_seller']!=0){
            $grand_total+=$value['subtotal_seller'];
            // $t_ship+=$value['shipping_seller'];
            //echo '<b>Total shipping for '.$value['shop_name'].' = Rp '.number_format($value['shipping_seller'],2).'</b><br>';
            echo '<b>Total sales for '.$value['shop_name'].' on '.date("d M Y",strtotime($date)).' = Rp '.number_format($value['subtotal_seller'],2).'</b><br>';
        }
    }
    echo '<b>Grand Total Sales on '.date("d M Y",strtotime($date)).' = Rp '.number_format($grand_total,2).'</b>';
  }
 ?>
