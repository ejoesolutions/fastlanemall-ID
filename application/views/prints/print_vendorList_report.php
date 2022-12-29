<!doctype html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  
  <title>COFFEE-FASTLANE.COM - VENDORS LIST REPORT</title>

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
                  echo "<td align='center'><h5>Sellers List Record</h5></td>";
                   ?>
                </tr>
                </table>
                <br>
                <table border="1" bordercolor="#666666" width="100%" cellpadding="4" style="border-collapse:collapse">
      						<tr bgcolor="#CCCCCC" class="style5">
                    <th width="10px" class="text-center">No.</th>
                    <th class="text-center">Shop</th>
                    <th class="text-center">Seller Name</th>
                    <th class="text-center">Phone No.</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Address</th>
                    <th class="text-center">Status</th>
      						</tr>
                  <tbody>
                    <?php
                    $n=1;
                    if(!empty($all_report)){
                      foreach ($all_report as $seller){
                        ?>
                          <tr>
                            <td><?php echo $n++;?></td>
                            <!-- <td class="text-center">
                              <?php
                              if ($seller['vendor_logo']) {

                                $image_properties = array(
                                  'src'   => base_url().'logo_vendor/'.$seller['vendor_logo'],
                                  'alt'   => $seller['vendor_name'],
                                  'class' => 'img-thumbnail',
                                  'width' => '50',
                                  'height'=> '50',
                                  'title' => $seller['vendor_name'],
                                );
                                echo img($image_properties);

                              } else {

                                $image_properties = array(
                                  'src'   => 'https://dummyimage.com/75x75/d6c7d6/9b9dad.jpg&text=No+Image',
                                  'alt'   => 'No image',
                                  'class' => 'img-thumbnail',
                                  'width' => '50',
                                  'height'=> '50',
                                  'title' => 'No image',
                                );
                                echo img($image_properties);
                              }

                              ?>
                            </td> -->
                            <td><?php echo $seller['shop_name'] ?></td>
                            <td><?php echo $seller['full_name'] ?></td>
                            <td class="text-center"><?php echo $seller['phone'] ?></td>
                            <td class="text-center"><?php echo $seller['email'] ?></td>
                            <td><?php echo $seller['address'].' '.$seller['postcode'].' '.$seller['town_area'].' '.$seller['state'] ?></td>
                            <td class="text-center">
                              <?php
                                if($seller['seller_status']==1){
                                  echo "Active";
                                }else{
                                  echo "Not Active";
                                }
                               ?>
                            </td>
                        </tr>

                    <?php
                      }
                    }
                     ?>
                  </tbody>
              </table>
        </div>
      </body>
      </html>
