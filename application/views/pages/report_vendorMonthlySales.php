<table class="table table-bordered" id="sample_1">
<thead>
  <th class="text-center">No.</th>
  <th class="text-center">Seller</th>
  <th class="text-center">Product</th>
  <th class="text-center">Product Type</th>
  <th class="text-center">Weight (g)</th>
  <th class="text-center">Total Qty</th>
  <th class="text-center">Total Sales (Rp)</th>
</thead>
<tbody>
  <?php
  $n=1;
  if(!empty($all_report)){

    foreach ($all_report as $key) {
      $temp_product[]=array('product_id' => $key['product_id']);
    }
    $arr_product2=array_unique($temp_product,SORT_REGULAR);
    $arr_product=array_values($arr_product2);

    for($i=0;$i<count($arr_product);$i++){
      $total_qty=0;$total_sale=0;$total_modal=0;$net_total_sale=0;
      for($j=0;$j<count($all_report);$j++){
        if($arr_product[$i]['product_id']==$all_report[$j]['product_id']){
          $total_qty+=$all_report[$j]['qty'];
          $total_sale+=$all_report[$j]['sale_price'];
          $net_total_sale+=$all_report[$j]['total_sale'];
          $total_modal+=$all_report[$j]['modal_price2'];
          $product_id=$all_report[$j]['product_id'];
          $product_name=$all_report[$j]['product_name'];
          $item_code=$all_report[$j]['item_code'];
          $seller_id=$all_report[$j]['seller_id'];
          $shop_name=$all_report[$j]['shop_name'];
          $seller_status=$all_report[$j]['seller_status'];
          $category_id=$all_report[$j]['category_id'];
          $category_type=$all_report[$j]['category_type'];
          $weight=$all_report[$j]['weight'];
        }
      }
      $arr_sale[]=array(
        'product_id'=>$product_id,
        'product_name'=>$product_name,
        'item_code'=>$item_code,
        'seller_id'=>$seller_id,
        'shop_name'=>$shop_name,
        'seller_status'=>$seller_status,
        'category_id'=>$category_id,
        'category_type'=>$category_type,
        'weight'=>$weight,
        'total_qty_sale'=>$total_qty,
        'total_sale'=>$total_sale,
        'net_total_sale'=>$net_total_sale,
        'total_modal'=>$total_modal,
        'total_rev'=>$net_total_sale-$total_modal,
      );
    }
      $total_grand=0;
      foreach ($arr_sale as $key) {
        ?>
        <tr>
          <td><?php echo $n++; ?></td>
          <td><?php echo $key['shop_name']; ?></td>
          <td><?php echo $key['product_name']; ?></td>
          <td><?php echo $key['category_type']; ?></td>
          <td class="text-center"><?php echo number_format($key['weight'],2); ?></td>
          <td class="text-center"><?php echo $key['total_qty_sale']; ?></td>
          <td class="text-center"><?php echo number_format($key['net_total_sale'],2); ?></td>
        </tr>
        <?php
        $total_grand+=$key['net_total_sale'];

      }
      // $t_ship=0;
      // foreach ($order_status as $k) {
      //   if($k['order_status']==4 && $k['seller_id']==$seller_id)
      //   {
      //     $t_ship+=$k['shipping_seller'];
      //   }
      // }
    }
   ?>
</tbody>
</table>
<?php
  if(!empty($all_report)){
    //echo '<b>Total Shipping '.$data_seller['shop_name'].' '.$b.' '.$t.' = Rp '.number_format($t_ship,2).'</b>';
    echo '<br><b>Total monthly sales '.$data_seller['shop_name'].' '.$b.' '.$t.' = Rp '.number_format($total_grand,2).'</b>';
  }
?>
