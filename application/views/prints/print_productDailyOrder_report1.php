<!doctype html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <title>COFFEE-FASTLANE.COM - PRODUCTS TYPES DAILY ORDER REPORT</title>

  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> -->

  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"> -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <style>
  body{
    font-size:12px;
  }
  .invoice-box{
    max-width:800px;
    margin:auto;
    padding:30px;
    border:1px solid #eee;
    line-height:24px;
    font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    color:#555;

  }

  .invoice-box table{
    width:100%;
    line-height:inherit;
    text-align:left;
    height: 100%;
  }

  .invoice-box table td{
    padding:5px;
    vertical-align:top;
  }

  .invoice-box table tr td:nth-child(2){
    text-align:right;
  }

  .text-center {
    padding: 15px;
    text-align: center;
  }
  .invoice-box table tr.top table td{
    padding-bottom:20px;
  }

  .invoice-box table tr.top table td.title{
    font-size:35px;
    line-height:35px;
    color:#333;
  }

  .invoice-box table tr.information table td{
    padding-bottom:40px;
  }

  .invoice-box table tr.heading td{
    background:#eee;
    border-bottom:1px solid #ddd;
    font-weight:bold;
  }

  .invoice-box table tr.details td{
    padding-bottom:20px;
  }

  .invoice-box table tr.item td{
    border-bottom:1px solid #eee;
  }

  .invoice-box table tr.item.last td{
    border-bottom:none;
  }

  .invoice-box table tr.total td:nth-child(2){
    border-top:2px solid #eee;
    font-weight:bold;
  }

  @media only screen and (max-width: 600px) {
    .invoice-box table tr.top table td{
      width:100%;
      display:block;
      text-align:center;
    }

    .invoice-box table tr.information table td{
      width:100%;
      display:block;
      text-align:center;
    }
  }
  </style>
</head>
<body>
  <div class="">
          <!-- <table  class="table table-bordered">
            <tr>
              <td colspan="4" align="center"> -->
                <table width="100%">
                  <tr>
                   <?php
                   echo "<td align='center'><h4>COFFEE-FASTLANE.COM</h4></td>";
                    ?>
					     	 </tr>
                 <tr>
                  <?php
                  echo "<td align='center'><h5>Daily Order for product ".$data_pType['category_type']." on ".$date."</h5></td>";
                   ?>
                </tr>
                </table>
                <br>
                <table border="1" bordercolor="#666666" width="100%" cellpadding="4" style="border-collapse:collapse">
      						<tr bgcolor="#CCCCCC" class="style5">
                    <th width="10px" class="text-center">No.</th>
                    <th class="text-center">Time</th>
                    <th class="text-center">Order ID</th>
                    <th class="text-center">Cust Name</th>
                    <th class="text-center">Contact No</th>
                    <th class="text-center">Ship To</th>
                    <th class="text-center">Seller</th>
                    <th class="text-center">Product Name</th>
                    <th class="text-center">Weight (g)</th>
                    <th class="text-center">Qty</th>
                    <th class="text-center">Price (Rp)</th>
                    <th class="text-center">Tax (Rp)</th>
                    <th class="text-center">Shipping (Rp)</th>
                    <th class="text-center">Total Price (Rp)</th>
      						</tr>
                  <tbody>
                    <?php
                    $n=1;
                    if(!empty($all_report)){
                      //print_r($all_report);
                      foreach ($all_report as $k1) {
                        if($category_id==$k1['category_id']){
                          $arr_order[]=array('order_id'=>$k1['order_id'],
                                              // 'seller_id'=>$k1['seller_id'],
                                              'created_date'=>$k1['created_date'],
                                              'full_name'=>$k1['full_name'],
                                              'phone'=>$k1['phone'],
                                              'ship_address'=>$k1['ship_address'],
                                              'ship_area'=>$k1['ship_area'],
                                              'ship_postcode'=>$k1['ship_postcode'],
                                              'ship_state'=>$k1['state']
                                            );

                      }
                    }
                      $new_order=array_values(array_unique($arr_order,SORT_REGULAR));

                      $total_all=0;
                      foreach ($new_order as $k) {
                        ?>
                        <tr>
                          <td><?php echo $n++; ?></td>
                          <td class="text-center"><?php echo date("H:i",strtotime($k['created_date'])); ?></td>
                          <td class="text-center"><?php echo $k['order_id'] ?></td>
                          <td><?php echo $k['full_name'] ?></td>
                          <td class="text-center"><?php echo $k['phone'] ?></td>
                          <td><?php echo $k['ship_address'].' '.$k['ship_postcode'].' '.$k['ship_area'].' '.$k['ship_state'] ?></td>
                          <td>
                            <?php
                            foreach ($all_report as $k2) {
                              if($category_id==$k2['category_id']){
                               if($k['order_id']==$k2['order_id'])
                               {
                                 if($user_profile['user_group']==2){
                                   if($k2['seller_id']==$shop['seller_id']){
                                     echo $k2['shop_name'].'<br><br>';
                                   }
                                 }else{
                                   echo $k2['shop_name'].'<br><br>';
                                 }
                               }
                             }
                            }
                            ?>
                          </td>
                          <td>
                            <?php
                            foreach ($all_report as $k2) {
                              if($category_id==$k2['category_id']){
                               if($k['order_id']==$k2['order_id'])
                               {
                                 if($user_profile['user_group']==2){
                                   if($k2['seller_id']==$shop['seller_id']){
                                     echo $k2['product_name'].'<br><br>';
                                   }
                                 }else{
                                   echo $k2['product_name'].'<br><br>';
                                 }
                               }
                             }
                            }
                            ?>
                          </td>
                          <td class="text-center">
                            <?php
                            foreach ($all_report as $k2) {
                              if($category_id==$k2['category_id']){
                               if($k['order_id']==$k2['order_id'])
                               {
                                 if($user_profile['user_group']==2){
                                   if($k2['seller_id']==$shop['seller_id']){
                                     echo number_format($k2['weight'],2).'<br><br>';
                                   }
                                 }else{
                                   echo number_format($k2['weight'],2).'<br><br>';
                                 }
                               }
                             }
                            }
                            ?>
                          </td>
                          <td class="text-center">
                            <?php
                            foreach ($all_report as $k2) {
                              if($category_id==$k2['category_id']){
                               if($k['order_id']==$k2['order_id'])
                               {
                                 if($user_profile['user_group']==2){
                                   if($k2['seller_id']==$shop['seller_id']){
                                     echo $k2['qty'].'<br><br>';
                                   }
                                 }else{
                                   echo $k2['qty'].'<br><br>';
                                 }
                               }
                             }
                            }
                            ?>
                          </td>
                          <td class="text-center">
                            <?php
                            foreach ($all_report as $k2) {
                              if($category_id==$k2['category_id']){
                               if($k['order_id']==$k2['order_id'])
                               {
                                 if($user_profile['user_group']==2){
                                   if($k2['seller_id']==$shop['seller_id']){
                                     echo $k2['ordered_price'].'<br><br>';
                                   }
                                 }else{
                                   echo $k2['ordered_price'].'<br><br>';
                                 }
                               }
                             }
                            }
                            ?>
                          </td>
                          <td class="text-center">
                            <?php
                            foreach ($all_report as $k2) {
                              if($category_id==$k2['category_id']){
                               if($k['order_id']==$k2['order_id'])
                               {
                                 if($user_profile['user_group']==2){
                                   if($k2['seller_id']==$shop['seller_id']){
                                     echo $k2['tax'].'<br><br>';
                                   }
                                 }else{
                                   echo $k2['tax'].'<br><br>';
                                 }
                               }
                             }
                            }
                            ?>
                          </td>
                          <td class="text-center">
                            <?php
                            foreach ($all_report as $k2) {
                              if($category_id==$k2['category_id']){
                               if($k['order_id']==$k2['order_id'])
                               {
                                 if($user_profile['user_group']==2){
                                   if($k2['seller_id']==$shop['seller_id']){
                                     echo $k2['shipping_seller'].'<br><br>';
                                   }
                                 }else{
                                   echo $k2['shipping_seller'].'<br><br>';
                                 }
                               }
                             }
                            }
                            ?>
                          </td>
                          <td class="text-center">
                            <?php

                            foreach ($all_report as $k2) {
                              if($category_id==$k2['category_id']){
                               if($k['order_id']==$k2['order_id'])
                               {
                                 if($user_profile['user_group']==2){
                                   if($k2['seller_id']==$shop['seller_id']){
                                     echo $k2['total_sale'].'<br><br>';
                                     $total_all+=$k2['total_sale'];
                                   }
                                 }else{
                                   echo $k2['total_sale'].'<br><br>';
                                   $total_all+=$k2['total_sale'];
                                 }
                               }
                             }
                            }
                            ?>
                          </td>
                        <?php
                      }
                    }
                     ?>
                     <tr>
                       <td colspan="14" align="right"><b>Total order = Rp <?php echo number_format($total_all,2) ?></b></td>
                     </tr>
                  </tbody>
              </table>
        </div>
      </body>
      </html>
