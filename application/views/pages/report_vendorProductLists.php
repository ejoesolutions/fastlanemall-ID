<table class="table table-bordered" id="sample_1">
  <thead>
    <th width="10">No.</th>
    <th class="text-center">Seller</th>
    <th class="text-center">Product Name</th>
    <th class="text-center">Product Type</th>
    <th class="text-center">Weight (g)</th>
    <th class="text-center">Price (Rp)</th>
    <th class="text-center">Tax (Rp)</th>
    <th class="text-center">Shipping (Rp)</th>
    <th class="text-center">Sell Price (Rp)</th>
  </thead>
  <tbody>
    <?php
    $n=1;
    if(!empty($all_report)){
      foreach ($all_report as $row){
        ?>
        <tr>
          <td><?php echo $n++; ?></td>
          <td><?php echo $row['shop_name'] ?></td>
          <td><?php echo $row['product_name'] ?></td>
          <td><?php echo $row['category_type'] ?></td>
          <td class="text-center"><?php echo number_format($row['weight'],2) ?></td>
          <td class="text-center"><?php echo $row['add_cost'] ?></td>
          <td class="text-center"><?php echo number_format($row['add_cost']*$row['tax'],2) ?></td>
          <td class="text-center"><?php echo number_format($row['shipping'],2) ?></td>
          <td class="text-center"><?php echo number_format($row['total_price'],2) ?></td>
        <?php
      }
    }
    ?>
</tbody>
</table>
