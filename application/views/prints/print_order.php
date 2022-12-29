<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>COFFEE-FASTLANE.COM - PRINT ORDER RECEIPT</title>

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
                   echo "<td align='center'><h4>COFFEE-FASTLANE</h4></td>";
                    ?>
					     	 </tr>
                 <tr>
                  <?php
                  echo "<td align='center'><h4>".$seller['shop_name']." Order's Receipt</h4></td>";
                   ?>
                </tr>
                </table>
                <br>
                <table border="1" bordercolor="#666666" width="100%" cellpadding="4" style="border-collapse:collapse">
                  <thead>
                    <tr>
                      <th colspan="1">Order #<?php echo $orders['order_id'] ?> details</th>
                      <td colspan="2"><b>Payment</b> via <?php echo $orders['payment_type'] ?></td>
                    </tr>
                    <tr>
                      <th width="25%">General</th>
                      <th width="30%">Seller</th>
                      <th width="30%">Shipping</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Order created :<br><?php echo date('d/m/Y @ H:i:s',strtotime($orders['created_date'])) ?></td>
                      <td>
                        <?php
                        echo $order_status[0]['shop_name'];
                        echo '<br>'.$order_status[0]['address'].'<br>'.$order_status[0]['postcode'].' '.$order_status[0]['town_area'].'<br>'.$order_status[0]['state'];
                         ?>
                         <br><br>Email : <?php echo $order_status[0]['email']; ?>
                         <br>Phone : <?php echo $order_status[0]['phone']; ?>
                      </td>
                      <td>
                        <?php
                        echo $orders['ship_name'];
                        echo '<br>'.$orders['ship_address'].'<br>'.$orders['ship_postcode'].' '.$orders['ship_area'].'<br>'.$orders['ship_state'];
                        echo '<br>'.$orders['ship_phone'];
                         ?>
                        <?php
                          if(!empty($track)){
                            ?>
                            <br><br>Tracking No : <?php echo $track['tracking_code']; ?>
                            <br>Courier : <?php echo $track['courier_name']; ?>
                            <?php
                          }
                         ?>
                      </td>
                    </tr>
                  </tbody>
              </table>
              <br><br>
              <table border="1" bordercolor="#666666" width="100%" cellpadding="4" style="border-collapse:collapse">
                <thead>
                  <tr>
                    <th>Item</th>
                    <?php if(!empty($siri)){ ?>
                    <th class="text-center">Siri No.</th>
                  <?php } ?>
                    <th class="text-center">Cost</th>
                    <th class="text-center">Qty</th>
                    <th class="text-center">Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  //print_r($items);
                  if(!empty($items)){
                    $n_subtotal=0;
                    foreach ($items as $key) {
                      if($key['seller_id']==$seller_id)
                      {
                        ?>
                        <tr>
                          <td><?php echo $key['product_name'].'&nbsp;[ '.$key['item_code'].' ] - '.number_format($key['weight'],0).' g' ?></td>

                          <?php if(!empty($siri)){ ?>
                          <td>
                            <?php
                                      $s=0;
                                      //print_r($pid);
                                      foreach ($pid as $key1) {
                                        $i=$key1['total'];
                                        foreach ($siri as $value_siri) {
                                          if($key1['product_id']==$value_siri['product_id'] && $value_siri['product_id']==$key['product_id']){
                                            echo $value_siri['serial_no'];
                                            $s++;
                                            if($i-1!=0){
                                              echo ' , ';
                                              $i--;
                                            }
                                            if($s>2){
                                                echo "<br>";$s=0;
                                            }
                                          }
                                        }
                                    }
                                    ?>
                          </td>
                        <?php } ?>
                          <td class="text-center"><?php echo 'Rp '.number_format($key['ordered_price'],2) ?></td>
                          <td class="text-center"><?php echo $key['qty'] ?></td>
                          <td class="text-center"><?php echo 'Rp '.number_format($key['subtotal'],2) ?></td>
                        </tr>
                        <?php
                        $n_subtotal=$n_subtotal+$key['subtotal'];
                      }
                    }
                  }
                  $total_order_seller=0;
                  $total_order_seller=$n_subtotal+$order_status[0]['shipping_seller'];
                  ?>
                  <tr>
                    <?php if(!empty($siri) && $siri[0]['seller_id']==$seller_id){
                      echo '<td colspan="4" class="text-right"><b>Total Shipping</b></td><td class="text-center"><b>Rp '.number_format($order_status[0]['shipping_seller'],2).'</b></td>';
                    }else{
                        echo '<td colspan="3" class="text-right"><b>Total Shipping</b></td><td class="text-center"><b>Rp '.number_format($order_status[0]['shipping_seller'],2).'</b></td>';
                    } ?>
                  </tr>
                  <tr>
                    <!-- <td colspan="4" class="text-right"><b>Net Total</b></td>
                    <td colspan="4" class="text-center"><b><?php echo 'Rp '.number_format($orders['total_all'],2) ?></b></td> -->
                    <?php if(!empty($siri) && $siri[0]['seller_id']==$seller_id){
                      echo '<td colspan="4" class="text-right"><b>Net Total</b></td><td class="text-center"><b>Rp '.number_format($total_order_seller,2).'</b></td>';
                    }else{
                        echo '<td colspan="3" class="text-right"><b>Net Total</b></td><td class="text-center"><b>Rp '.number_format($total_order_seller,2).'</b></td>';
                    } ?>
                  </tr>
                </tbody>
              </table>
        </div>
      </body>
      </html>
