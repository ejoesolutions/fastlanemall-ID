<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>COFFEE-FASTLANE.COM - DAILY REPORT</title>

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
                  echo "<td align='center'><h5>Daily Transaction Record for ".$date."</h5></td>";
                   ?>
                </tr>
                </table>
                <br>
                <table border="1" bordercolor="#666666" width="100%" cellpadding="4" style="border-collapse:collapse">
      						<tr bgcolor="#CCCCCC" class="style5">
                    <th width="10px" class="text-center">No.</th>
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
      						</tr>
                  <tbody>
                    <?php

                    $n=1;
                    foreach ($all_report as $k1) {
                      if($user_profile['user_group']==2){
                        if($k1['seller_id']==$shop['seller_id']){
                          $temp_order[]=$k1['order_id'];
                        }
                      }else{
                        $temp_order[]=$k1['order_id'];
                      }
                    }
                    $new_order=array_values(array_unique($temp_order));
                    //print_r($new_order);

                    foreach ($new_order as $key) {
                      // echo $key;
                      foreach ($detail_order as $k) {
                        if($k['order_id']==$key)
                        {
                          ?>
                          <tr>
                            <td><?php echo $n++; ?></td>
                            <td class="text-center"><?php echo date("H:i",strtotime($k['created_date'])); ?></td>
                            <td class="text-center"><?php echo $k['created_by'] ?></td>
                            <td><?php echo $k['full_name'] ?></td>
                            <td class="text-center"><?php echo $k['phone'] ?></td>
                            <td class="text-center"><?php echo $k['email'] ?></td>
                            <td>
                              <?php
                              $i=1;
                                foreach ($all_report as $v)
                                {
                                  if($v['order_id']==$k['order_id'])
                                  {
                                     if($user_profile['user_group']==2){
                                       if($shop['seller_id']==$v['seller_id']){
                                         echo $v['product_name'].'<br><br>';
                                       }
                                     }else{
                                       echo $v['product_name'].'<br><br>';
                                     }
                                  }
                                }
                               ?>
                            </td>
                            <td>
                              <?php
                              $i=1;
                                foreach ($all_report as $v)
                                {
                                  if($v['order_id']==$k['order_id'])
                                  {
                                    if($user_profile['user_group']==2){
                                      if($shop['seller_id']==$v['seller_id']){
                                        echo $v['category_type'].'<br><br>';
                                      }
                                    }else{
                                      echo $v['category_type'].'<br><br>';
                                    }

                                  }
                                }
                               ?>
                            </td>
                            <td>
                              <?php
                              $i=1;
                                foreach ($all_report as $v)
                                {
                                  if($v['order_id']==$k['order_id'])
                                  {
                                    if($user_profile['user_group']==2){
                                      if($shop['seller_id']==$v['seller_id']){
                                        echo $v['shop_name'].'<br><br>';
                                      }
                                    }else{
                                      echo $v['shop_name'].'<br><br>';
                                    }

                                  }
                                }
                               ?>
                            </td>
                            <td class="text-center">
                              <?php
                              $i=1;
                                foreach ($all_report as $v)
                                {
                                  if($v['order_id']==$k['order_id'])
                                  {
                                    if($user_profile['user_group']==2){
                                      if($shop['seller_id']==$v['seller_id']){
                                        echo number_format($v['weight'],2).'<br><br>';
                                      }
                                    }else{
                                      echo number_format($v['weight'],2).'<br><br>';
                                    }

                                  }
                                }
                               ?>
                            </td>
                            <td class="text-center">
                              <?php
                              $i=1;
                                foreach ($all_report as $v)
                                {
                                  if($v['order_id']==$k['order_id'])
                                  {
                                    if($user_profile['user_group']==2){
                                      if($shop['seller_id']==$v['seller_id']){
                                        echo $v['qty'].'<br><br>';
                                      }
                                    }else{
                                      echo $v['qty'].'<br><br>';
                                    }

                                  }
                                }
                               ?>
                            </td>
                            <td class="text-center">
                              <?php
                              $i=1;
                                foreach ($all_report as $v)
                                {
                                  if($v['order_id']==$k['order_id'])
                                  {
                                    if($user_profile['user_group']==2){
                                      if($shop['seller_id']==$v['seller_id']){
                                        echo $v['ordered_price'].'<br><br>';
                                      }
                                    }else{
                                      echo $v['ordered_price'].'<br><br>';
                                    }

                                  }
                                }
                               ?>
                            </td>
                            <td class="text-center">
                              <?php
                              $i=1;
                                foreach ($all_report as $v)
                                {
                                  if($v['order_id']==$k['order_id'])
                                  {
                                    if($user_profile['user_group']==2){
                                      if($shop['seller_id']==$v['seller_id']){
                                        echo $v['tax'].'<br><br>';
                                      }
                                    }else{
                                      echo $v['tax'].'<br><br>';
                                    }

                                  }
                                }
                               ?>
                            </td>
                            <td class="text-center">
                              <?php
                              $i=1;
                                foreach ($all_report as $v)
                                {
                                  if($v['order_id']==$k['order_id'])
                                  {
                                    if($user_profile['user_group']==2){
                                      if($shop['seller_id']==$v['seller_id']){
                                        echo $v['shipping'].'<br><br>';
                                      }
                                    }else{
                                      echo $v['shipping'].'<br><br>';
                                    }

                                  }
                                }
                               ?>
                            </td>
                            <td class="text-center">
                              <?php
                              $total_all=0;
                              $i=1;
                                foreach ($all_report as $v)
                                {
                                  if($v['order_id']==$k['order_id'])
                                  {
                                    if($user_profile['user_group']==2){
                                      if($shop['seller_id']==$v['seller_id']){
                                        echo $v['sale_price'].'<br><br>';
                                      }
                                    }else{
                                      echo $v['sale_price'].'<br><br>';
                                    }

                                  }

                                  if($user_profile['user_group']==2){
                                    if($shop['seller_id']==$v['seller_id']){
                                      $total_all+=$v['sale_price'];
                                    }
                                  }else{
                                    $total_all+=$v['sale_price'];
                                  }

                                }
                               ?>
                            </td>
                          </tr>
                          <?php
                        }
                      }
                    }

                     ?>
                     <tr>
                       <td colspan="15" align="right"><b>Total order on <?php echo $date ?> = Rp <?php echo number_format($total_all,2) ?></b></td>
                     </tr>
                  </tbody>
              </table>
        </div>
      </body>
      </html>
