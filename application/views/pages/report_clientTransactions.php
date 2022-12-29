<table class="table table-bordered" id="sample_1">
  <thead>
    <th width="10">No.</th>
    <th class="text-center">DateTime</th>
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
        if($user_profile['user_group']==2){
          if($shop['seller_id']==$k['seller_id'])
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
            <td class="text-center"><?php echo $k['email'] ?></td>
            <td><?php echo $k['product_name'] ?></td>
            <td><?php echo $k['category_type'] ?></td>
            <td><?php echo $k['shop_name'] ?></td>
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
     ?>
  </tbody>
</table>
