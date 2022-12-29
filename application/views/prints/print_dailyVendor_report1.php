<!doctype html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <title>COFFEE-FASTLANE.COM - DAILY REPORT SORT BY VENDOR</title>

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
                    <th class="text-center">Seller</th>
                    <th class="text-center">Time</th>
                    <th class="text-center">Order ID</th>
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
      						</tr>
                  <tbody>
                    <?php
                    foreach ($all_report as $k1) {
                      $temp_order[]=$k1['order_id'];
                    }
                    $new_order=array_values(array_unique($temp_order));

                    if(!empty($all_report)){
                      foreach ($data_seller as $r1) {
                        $total_all=0;
                        foreach ($new_order as $r2) {
                          foreach ($all_report as $r3) {
                            if($r2==$r3['order_id']){
                              if($r3['seller_id']==$r1['seller_id']){
                                $total_all+=$r3['total_sale'];
                              }
                            }
                          }
                        }
                        $arr_vendor2[]=array('seller_id'=>$r1['seller_id'],'shop_name'=>$r1['shop_name'],'seller_name'=>$r1['full_name'],'subtotal_seller'=>$total_all);
                      }

                      foreach ($arr_vendor2 as $v2) {
                        if($v2['subtotal_seller']!=0){
                          $arr_seller[]=array('seller_id'=>$v2['seller_id'],'shop_name'=>$v2['shop_name'],'seller_name'=>$r1['full_name'],'subtotal_seller'=>$v2['subtotal_seller']);
                        }
                      }
                      //print_r($arr_seller);

                      $grand_total=0;
                      $t_ship=0;
                      foreach ($arr_seller as $row) {
                        $n=1;$t_ship2=0;
                        foreach ($all_report as $k) {
                          if($row['seller_id']==$k['seller_id'])
                          {
                            ?>
                            <tr>
                              <td><?php echo $n++; ?></td>
                              <td><?php echo $row['shop_name']; ?></td>
                              <td class="text-center"><?php echo date("d/m/Y H:i",strtotime($k['created_date'])); ?></td>
                              <td class="text-center"><?php echo $k['order_id'] ?></td>
                              <td><?php echo $k['full_name'] ?></td>
                              <td class="text-center"><?php echo $k['phone'] ?></td>
                              <td class="text-center"><?php echo $k['email'] ?></td>
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
                          }
                        }
                        // foreach ($order_status as $key) {
                        //   if($key['order_status']==4 && $row['seller_id']==$key['seller_id'])
                        //   {
                        //     foreach ($new_order as $key2) {
                        //       if($key2==$key['order_id'])
                        //       {
                        //         $t_ship2+=$key['shipping_seller'];
                        //       }
                        //     }
                        //   }
                        // }
                        // $t_ship+=$t_ship2;
                        ?>

                        <tr>
                          <td colspan="15" align="right"><?php echo '<b>Total Sales for '.$row['shop_name'].' on '.date("d M Y",strtotime($date)).' = Rp '.number_format($row['subtotal_seller'],2).'</b>';?></td>
                        </tr>
                        <?php
                        $grand_total+=$row['subtotal_seller'];
                      }
                    }
                     ?>
                     <tr>
                       <td colspan="15" align="right"><?php echo '<b>Grand Total Sales on '.date("d M Y",strtotime($date)).' = Rp '.number_format($grand_total,2).'</b>';?></td>
                     </tr>
                  </tbody>
              </table>
        </div>
      </body>
      </html>
