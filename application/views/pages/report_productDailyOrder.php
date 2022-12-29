<table class="table table-bordered" id="sample_1">
<thead>
  <th class="text-center">No.</th>
  <th class="text-center">Time</th>
  <th class="text-center">Cust ID</th>
  <th class="text-center">Cust Name</th>
  <th class="text-center">Contact No</th>
  <th class="text-center">Ship To</th>
  <th class="text-center">Seller</th>
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
    $total_all=0;
    foreach ($all_report as $k) {
        if($category_id==$k['category_id']){
              if($user_profile['user_group']==2){
                  if($k['seller_id']==$shop['seller_id']){
                    ?>
                    <tr>
                      <td><?php echo $n++; ?></td>
                      <td class="text-center"><?php echo date("d/m/Y H:i",strtotime($k['created_date'])); ?></td>
                      <td class="text-center"><?php echo $k['created_by'] ?></td>
                      <td><?php echo $k['full_name'] ?></td>
                      <td class="text-center"><?php echo $k['phone'] ?></td>
                      <td><?php echo $k['ship_address'].' '.$k['ship_postcode'].' '.$k['ship_area'].' '.$k['state'] ?></td>
                      <td><?php echo $k['shop_name'] ?></td>
                      <td><?php echo $k['product_name'] ?></td>
                      <td><?php echo $k['category_type'] ?></td>
                      <td class="text-center"><?php echo number_format($k['weight'],2) ?></td>
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
                  <td><?php echo $k['ship_address'].' '.$k['ship_postcode'].' '.$k['ship_area'].' '.$k['state'] ?></td>
                  <td><?php echo $k['shop_name'] ?></td>
                  <td><?php echo $k['product_name'] ?></td>
                  <td><?php echo $k['category_type'] ?></td>
                  <td class="text-center"><?php echo number_format($k['weight'],2) ?></td>
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

    }
  }
   ?>
</tbody>
</table>
<?php
  if(!empty($all_report)){
    echo '<b>Total daily order for '.$data_pType['category_type'].' on '.date("d M Y",strtotime($date)).' = Rp '.number_format($total_all,2).'</b>';
  }
?>
