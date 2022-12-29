<style>
#chartdiv {
width: 100%;
height: 500px;
}
#exTab3 .nav-pills > li > a {
  border-radius: 4px 4px 0 0 ;
}

#exTab3 .tab-content {
  color : black;
  background-color: #e3ebff;
  padding : 5px 15px;
}

.container {
  position: relative;
  width: 50%;
  padding-bottom: 10px;
}
.image {
  opacity: 1;
  display: block;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.container:hover .image {
  opacity: 0.3;
}

.container:hover .middle {
  opacity: 1;
}

.text {
  /* background-color: #4CAF50; */
  color: black;
  font-size: 16px;
  padding: 1px 2px;
}
</style>
<!-- Resources -->
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/frozen.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

<!-- pending payment order -->
<?php if ($pending) { ?>
  <h4>Pending Release Payment</h3>
  <table class="table table-bordered">
    <tr>
      <th>Order ID</th>
      <th>Seller</th>
      <th>#</th>
    </tr>
    <?php foreach ($pending as $row) { ?>
      <tr>
        <td>#<?= $row['order_id'] ?></td>
        <td><?= $row['shop_name'] ?></td>
        <td><a href="<?= base_url('orders/detail/'.$row['order_id'].'/'.$row['seller_id']) ?>">View</a></td>
      </tr>
    <?php } ?>
  </table>
<?php } ?>

<div class="portlet box blue">
  <div class="portlet-title">
    <div class="caption">
      <?php echo $title ?>
    </div>
  </div>
  <div class="portlet-body">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2 ">
          <div class="display">
            <div class="number">
              <h3 class="font-green-sharp">
                <?php

                  if(!$seller['total']){
                    $seller['total']=0;
                  }
                  ?><span data-counter="counterup" data-value="<?php echo $seller['total'] ?>">0</span><?php
                ?>
                <!-- <span data-counter="counterup" data-value="<?php echo $sales['total'] ?>">0</span> -->
              </h3>
              <small>ACTIVE SELLERS</small>
            </div>
            <div class="icon">
              <i class="icon-pie-chart"></i>
            </div>
          </div>
          <div class="progress-info">
            <div class="progress">
              <span style="width:100%;" class="progress-bar progress-bar-success green-sharp">
                <!-- <span class="sr-only">76% Rekod</span> -->
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2 ">
          <div class="display">
            <div class="number">
              <h3 class="font-red-haze">
                <?php

                  if(!$produk['total']){
                    $produk['total']=0;
                  }
                  ?><span data-counter="counterup" data-value="<?php echo $produk['total'] ?>">0</span><?php
                ?>
                <!-- <span data-counter="counterup" data-value="<?php echo $wakalah['total'] ?>">0</span> -->
              </h3>
              <small>REGISTERED PRODUCTS</small>
            </div>
            <div class="icon">
              <i class="icon-like"></i>
            </div>
          </div>
          <div class="progress-info">
            <div class="progress">
              <span style="width: 100%;" class="progress-bar progress-bar-success red-haze">
                <!-- <span class="sr-only">85% aktif</span> -->
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2 ">
          <div class="display">
            <div class="number">
              <h3 class="font-blue-sharp">
                <?php
                if(!$sale['total']){
                  $sale['total']=0;
                }
                ?><span data-counter="counterup" data-value="<?php echo $sale['total'] ?>">0</span><?php
                ?>
                <!-- <small class="font-blue-sharp">MYR</small> -->
              </h3>
              <small>SALES</small>
            </div>
            <div class="icon">
              <i class="icon-basket"></i>
            </div>
          </div>
          <div class="progress-info">
            <div class="progress">
              <span style="width: 100%;" class="progress-bar progress-bar-success blue-sharp">
                <!-- <span class="sr-only">25% peningkatan</span> -->
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
        <div class="dashboard-stat2 ">
          <div class="display">
            <div class="number">
              <h3 class="font-purple-soft">
                <?php
                if(!$customer['total']){
                  $customer['total']=0;
                }
                ?><span data-counter="counterup" data-value="<?php echo $customer['total'] ?>">0</span><?php
                ?>
              </h3>
              <small>CUSTOMERS</small>
            </div>
            <div class="icon">
              <i class="icon-user"></i>
            </div>
          </div>
          <div class="progress-info">
            <div class="progress">
              <span style="width: 100%;" class="progress-bar progress-bar-success purple-soft">
                <!-- <span class="sr-only">16% repeat</span> -->
              </span>
            </div>
            <!-- <div class="status">
              <div class="status-title"> repeat </div>
              <div class="status-number"> 17% </div>
            </div> -->
          </div>
        </div>
      </div>
    </div>

</div>
</div>


<div class="portlet box blue">
  <div class="portlet-title">
    <div class="caption">
      <?php echo $title2 ?>
    </div>
  </div>
  <div class="portlet-body">
    <div class="row">
      <div class="col-md-12">
        <?php echo form_open('admin/dashboard', array('class'=>'form-horizontal')); ?>
        <div class="form_group">

              <div class="col-sm-12">
                <!-- <label class="control-label text-center" for="Vendor">Vendor</label> -->
                <?php

                $sel_report = array(
                  "" => 'Choose Report',
                  "1" => 'Daily Transaction Record',
          				"2" => 'Daily Sales Report According Vendor',
                  "3" => "Vendors' Daily Order",
                  "4" => "Products Types Daily Order",
                  "5" => "Sales Report",
                  // "6" => "Vendors Monthly Sales Report",
                  "7" => "Vendors List",
                  "8" => "Vendors' Products List",
                  "9" => "Clients List",
                  "10" => "Clients Transaction Records",
          			);
                ?>
                <?php echo form_dropdown('report_type', $sel_report, '', array('class'=>'form-control','id'=>'sel_report','onchange'=>'return select_report()','required'=>'required')) ?>
              </div>

              <!-- daily record -->
              <div id="sub1" style="display: none">
                <div class="col-sm-12">
                  <br>
                  <!-- <input type="date" name="daily" class="form-control" value="<?php echo date("Y-m-d"); ?>"> -->
                  <input name="report_daily" class="form-control date-picker" size="" type="text" value="" placeholder="Choose Date">
                </div>
              </div>

              <!-- daily record according vendor -->
              <div id="sub2" style="display: none">
                <div class="col-sm-12">
                  <br>
                  <input name="report_dailyVendor" class="form-control date-picker" size="" type="text" value="" placeholder="Choose Date">
                </div>
              </div>

              <!-- Vendor daily order -->
              <div id="sub3" style="display: none">
                <div class="col-sm-6">
                  <br>
                    <?php echo form_dropdown('seller_id_3', $list_shop, '', array('class'=>'form-control','id'=>'shop_list')) ?>
                </div>
                <div class="col-sm-6">
                  <br>
                    <input name="report_dailyOrderVendor" class="form-control date-picker" size="" type="text" value="" placeholder="Choose Date">
                </div>
              </div>

              <!-- Product Type Daily Order -->
              <div id="sub4" style="display: none">
                <div class="col-sm-6">
                  <br>
                    <?php echo form_dropdown('category_id', $list_product, '', array('class'=>'form-control')) ?>
                </div>
                <div class="col-sm-6">
                  <br>
                    <input name="report_productDaily" class="form-control date-picker" size="" type="text" value="" placeholder="Choose Date">
                </div>
              </div>

              <!-- Monthly Sales -->
              <div id="sub5" style="display: none">
                <div class="col-sm-4">
                  <br>
                    <?php echo form_dropdown('seller_id_5', $list_shop, '', array('class'=>'form-control','id'=>'seller_list')) ?>
                </div>
                <div class="col-sm-4">
                  <br>
                    <?php echo form_dropdown('bulan_5', $bulan,set_value('bulan'), array('class'=>'form-control','id'=>'bulan')) ?>
                </div>
                <div class="col-sm-4">
                  <br>
                    <?php echo form_dropdown('tahun_5', $tahun,set_value('tahun'),array('class'=>'form-control','id'=>'tahun')) ?>
                </div>
              </div>

              <!-- Vendor Monthly Sales -->
              <div id="sub6" style="display: none">
                <div class="col-sm-4">
                  <br>
                    <?php echo form_dropdown('seller_id_6', $list_shop, '', array('class'=>'form-control','id'=>'seller_list')) ?>
                </div>
                <div class="col-sm-4">
                  <br>
                    <?php echo form_dropdown('bulan_6', $bulan,'', array('class'=>'form-control','id'=>'bulan')) ?>
                </div>
                <div class="col-sm-4">
                  <br>
                    <?php echo form_dropdown('tahun_6', $tahun,'',array('class'=>'form-control','id'=>'tahun')) ?>
                </div>
              </div>

              <!-- Vendor Product List -->
              <div id="sub8" style="display: none">
                <div class="col-sm-12">
                  <br>
                    <?php echo form_dropdown('seller_id_8', $list_shop, '', array('class'=>'form-control','id'=>'seller_list')) ?>
                </div>
              </div>

              <!-- Clients Transaction Record -->
              <div id="sub10" style="display: none">
                <div class="col-sm-12">
                  <br>
                    <?php echo form_dropdown('cust_id', $list_client, '', array('class'=>'form-control','id'=>'client_list')) ?>
                </div>
              </div>

        </div>

      </div>
      <div class="col-sm-12">
        <br>
        <div align="center" class="col align-self-center">
          <input type="submit" name="submit" value="Search" class="btn btn-primary btn-sm" />
          <input type="reset" value="Clear" class="btn btn-default btn-sm" />
        </div>
      <?php echo form_close(); ?>
    </div>
      <br>
      <hr>
      <div class="col-md-12">
        <div class="table table-scroll">
          <?php
          if(isset($_POST['submit'])){
            if($report_type==1){
              $this->load->view('pages/report_daily');
            }
            if($report_type==2){
              $this->load->view('pages/report_daily_vendor');
            }
            if($report_type==3){
              $this->load->view('pages/report_dailyOrder_vendor');
            }
            if($report_type==4){
              $this->load->view('pages/report_productDailyOrder');
            }
            if($report_type==5){
              $this->load->view('pages/report_monthlySales');
            }
            if($report_type==6){
              $this->load->view('pages/report_vendorMonthlySales');
            }
            if($report_type==7){
              $this->load->view('pages/report_vendorLists');
            }
            if($report_type==8){
              $this->load->view('pages/report_vendorProductLists');
            }
            if($report_type==9){
              $this->load->view('pages/report_clientLists');
            }
            if($report_type==10){
              $this->load->view('pages/report_clientTransactions');
            }
          }
          ?>
        </div>
        <?php
    if(!empty($all_report)):

      if(isset($_POST['submit'])){
        if($report_type==1){
          echo anchor('admin/print_dailyReport/'.$report_type.'/'.$date, '<i class="fa fa-print"></i>Print', array('class'=>'btn btn-success','target'=>'_blank'));
        }
        else if($report_type==2){
          echo anchor('admin/print_dailyVendorReport/'.$report_type.'/'.$date, '<i class="fa fa-print"></i>Print', array('class'=>'btn btn-success','target'=>'_blank'));
        }
        else if($report_type==3){
          echo anchor('admin/print_dailyOrderVendorReport/'.$seller_id.'/'.$date, '<i class="fa fa-print"></i>Print', array('class'=>'btn btn-success','target'=>'_blank'));
        }
        else if($report_type==4){
          echo anchor('admin/print_productDailyOrderReport/'.$category_id.'/'.$date, '<i class="fa fa-print"></i>Print', array('class'=>'btn btn-success','target'=>'_blank'));
        }
        else if($report_type==5){
          if ($bln && !$seller_id) {
            echo anchor('admin/print_monthlySalesReport/'.$bln.'/'.$t.'/0', '<i class="fa fa-print"></i>Print', array('class'=>'btn btn-success','target'=>'_blank'));
          }elseif ($seller_id && !$bln) {
            echo anchor('admin/print_monthlySalesReport/0/'.$t.'/'.$seller_id, '<i class="fa fa-print"></i>Print', array('class'=>'btn btn-success','target'=>'_blank'));
          }elseif ($seller_id && $bln) {
            echo anchor('admin/print_monthlySalesReport/'.$bln.'/'.$t.'/'.$seller_id, '<i class="fa fa-print"></i>Print', array('class'=>'btn btn-success','target'=>'_blank'));
          }elseif (!$seller_id && !$t && !$bln) {
            echo anchor('admin/print_monthlySalesReport/0/0/0', '<i class="fa fa-print"></i>Print', array('class'=>'btn btn-success','target'=>'_blank'));
          }else {
            // echo anchor('admin/print_monthlySalesReport/'.$t, '<i class="fa fa-print"></i>Print', array('class'=>'btn btn-success','target'=>'_blank'));
            echo anchor('admin/print_monthlySalesReport/0/'.$t.'/0', '<i class="fa fa-print"></i>Print', array('class'=>'btn btn-success','target'=>'_blank'));
          }
          
        }
        else if($report_type==6){
          if ($bln) {
            echo anchor('admin/print_vendorMonthlySalesReport/'.$data_seller['seller_id'].'/'.$bln.'/'.$t, '<i class="fa fa-print"></i>Print', array('class'=>'btn btn-success','target'=>'_blank'));
          }else {
            // echo anchor('admin/print_monthlySalesReport/'.$t, '<i class="fa fa-print"></i>Print', array('class'=>'btn btn-success','target'=>'_blank'));
            echo anchor('admin/print_vendorMonthlySalesReport/'.$data_seller['seller_id'].'/0/'.$t, '<i class="fa fa-print"></i>Print', array('class'=>'btn btn-success','target'=>'_blank'));
          }
          
        }
        else if($report_type==7){
          echo anchor('admin/print_vendorLists', '<i class="fa fa-print"></i>Print', array('class'=>'btn btn-success','target'=>'_blank'));
        }
        else if($report_type==8){
          echo anchor('admin/print_vendorProductLists/'.$data_seller['seller_id'], '<i class="fa fa-print"></i>Print', array('class'=>'btn btn-success','target'=>'_blank'));
        }
        else if($report_type==9){
          echo anchor('admin/print_clientLists', '<i class="fa fa-print"></i>Print', array('class'=>'btn btn-success','target'=>'_blank'));
        }
        else if($report_type==10){
          echo anchor('admin/print_clientTransaction/'.$data_client['id'], '<i class="fa fa-print"></i>Print', array('class'=>'btn btn-success','target'=>'_blank'));
        }
      }

    endif;
     ?>
      </div>
    </div>
</div>
</div>

<script>
function select_report(){
    if (document.getElementById('sel_report').value == '1') {
        document.getElementById('sub1').style.display = 'block';
        document.getElementById('sub2').style.display = 'none';
        document.getElementById('sub3').style.display = 'none';
        document.getElementById('sub4').style.display = 'none';
        document.getElementById('sub5').style.display = 'none';
        document.getElementById('sub6').style.display = 'none';
        //document.getElementById('sub7').style.display = 'none';
        document.getElementById('sub8').style.display = 'none';
        //document.getElementById('sub9').style.display = 'none';
        document.getElementById('sub10').style.display = 'none';
        //document.getElementById('sub3').style.display = 'none';
    }else if (document.getElementById('sel_report').value == '2') {
        document.getElementById('sub1').style.display = 'none';
        document.getElementById('sub2').style.display = 'block';
        document.getElementById('sub3').style.display = 'none';
        document.getElementById('sub4').style.display = 'none';
        document.getElementById('sub5').style.display = 'none';
        document.getElementById('sub6').style.display = 'none';
        //document.getElementById('sub7').style.display = 'none';
        document.getElementById('sub8').style.display = 'none';
        //document.getElementById('sub9').style.display = 'none';
        document.getElementById('sub10').style.display = 'none';
    }else if (document.getElementById('sel_report').value == '3') {
        document.getElementById('sub1').style.display = 'none';
        document.getElementById('sub2').style.display = 'none';
        document.getElementById('sub3').style.display = 'block';
        document.getElementById('sub4').style.display = 'none';
        document.getElementById('sub5').style.display = 'none';
        document.getElementById('sub6').style.display = 'none';
        //document.getElementById('sub7').style.display = 'none';
        document.getElementById('sub8').style.display = 'none';
        //document.getElementById('sub9').style.display = 'none';
        document.getElementById('sub10').style.display = 'none';
    }else if (document.getElementById('sel_report').value == '4') {
        document.getElementById('sub1').style.display = 'none';
        document.getElementById('sub2').style.display = 'none';
        document.getElementById('sub3').style.display = 'none';
        document.getElementById('sub4').style.display = 'block';
        document.getElementById('sub5').style.display = 'none';
        document.getElementById('sub6').style.display = 'none';
        //document.getElementById('sub7').style.display = 'none';
        document.getElementById('sub8').style.display = 'none';
        //document.getElementById('sub9').style.display = 'none';
        document.getElementById('sub10').style.display = 'none';
    }else if (document.getElementById('sel_report').value == '5') {
        document.getElementById('sub1').style.display = 'none';
        document.getElementById('sub2').style.display = 'none';
        document.getElementById('sub3').style.display = 'none';
        document.getElementById('sub4').style.display = 'none';
        document.getElementById('sub5').style.display = 'block';
        document.getElementById('sub6').style.display = 'none';
        //document.getElementById('sub7').style.display = 'none';
        document.getElementById('sub8').style.display = 'none';
        //document.getElementById('sub9').style.display = 'none';
        document.getElementById('sub10').style.display = 'none';
    }else if (document.getElementById('sel_report').value == '6') {
        document.getElementById('sub1').style.display = 'none';
        document.getElementById('sub2').style.display = 'none';
        document.getElementById('sub3').style.display = 'none';
        document.getElementById('sub4').style.display = 'none';
        document.getElementById('sub5').style.display = 'none';
        document.getElementById('sub6').style.display = 'block';
        //document.getElementById('sub7').style.display = 'none';
        document.getElementById('sub8').style.display = 'none';
        //document.getElementById('sub9').style.display = 'none';
        document.getElementById('sub10').style.display = 'none';
    }else if (document.getElementById('sel_report').value == '8') {
        document.getElementById('sub1').style.display = 'none';
        document.getElementById('sub2').style.display = 'none';
        document.getElementById('sub3').style.display = 'none';
        document.getElementById('sub4').style.display = 'none';
        document.getElementById('sub5').style.display = 'none';
        document.getElementById('sub6').style.display = 'none';
        //document.getElementById('sub7').style.display = 'none';
        document.getElementById('sub8').style.display = 'block';
        //document.getElementById('sub9').style.display = 'none';
        document.getElementById('sub10').style.display = 'none';
    }else if (document.getElementById('sel_report').value == '10') {
        document.getElementById('sub1').style.display = 'none';
        document.getElementById('sub2').style.display = 'none';
        document.getElementById('sub3').style.display = 'none';
        document.getElementById('sub4').style.display = 'none';
        document.getElementById('sub5').style.display = 'none';
        document.getElementById('sub6').style.display = 'none';
        //document.getElementById('sub7').style.display = 'none';
        document.getElementById('sub8').style.display = 'none';
        //document.getElementById('sub9').style.display = 'none';
        document.getElementById('sub10').style.display = 'block';
    }else{
      document.getElementById('sub1').style.display = 'none';
      document.getElementById('sub2').style.display = 'none';
      document.getElementById('sub3').style.display = 'none';
      document.getElementById('sub4').style.display = 'none';
      document.getElementById('sub5').style.display = 'none';
      document.getElementById('sub6').style.display = 'none';
      //document.getElementById('sub7').style.display = 'none';
      document.getElementById('sub8').style.display = 'none';
      //document.getElementById('sub9').style.display = 'none';
      document.getElementById('sub10').style.display = 'none';
    }
  }
</script>
