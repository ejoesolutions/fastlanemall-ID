<style>
#chartdiv {
  width: 100%;
  height: 500px;
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
                  if(!$order['total']){
                    $order['total']=0;
                  }
                  ?><span data-counter="counterup" data-value="<?= $order['total'] ?>">0</span><?php
                ?>
                <!-- <span data-counter="counterup" data-value="<?php echo $sales['total'] ?>">0</span> -->
              </h3>
              <small>ALL ORDERS</small>
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
              <small>PRODUCTS</small>
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
                if(!$sale_value['total']){
                  $sale_value['total']=0;
                }
                $t_ship=0;
                foreach ($order_status as $key) {
                  if($key['order_status']==4 && $key['seller_id']==$shop['seller_id']){
                    $t_ship+=$key['shipping_seller'];
                  }
                }
                ?><span data-counter="counterup" data-value="<?= ($currency['show_decimal']==1 ? number_format($sale_value['total']+$t_ship,2, '.', $currency['separate']) : substr(number_format($sale_value['total']+$t_ship,2, '.', $currency['separate']), 0 ,-3)) ?>">0</span><?php
                ?>
              </h3>
              <small>SALES VALUE</small>
            </div>
            <div class="icon">
              <i class="fa fa-money"></i>
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
        <?php //print_r($shop) ?>
        <?php echo form_open('seller/seller_dashboard', array('class'=>'form-horizontal')); ?>
        <div class="form_group">

              <div class="col-sm-12">
                <!-- <label class="control-label text-center" for="Vendor">Vendor</label> -->
                <?php
                $sel_report = array(
                  "" => 'Choose Report',
                  "1" => 'Daily Transaction Record',
          				// "2" => 'Daily Sales Report According Vendor',
                  // "3" => "Vendors' Daily Order",
                  "4" => "Products Types Daily Order",
                  "5" => "Monthly Sales Report",
                  // "6" => "Vendors Monthly Sales Report",
                  // "7" => "Vendors List",
                  // "8" => "Vendors' Products List",
                  // "9" => "Clients List",
                  // "10" => "Clients Transaction Records",
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
                <div class="col-sm-6">
                  <br>
                    <?php echo form_dropdown('bulan_5', $bulan,set_value('bulan'), array('class'=>'form-control','id'=>'bulan')) ?>
                </div>
                <div class="col-sm-6">
                  <br>
                    <?php echo form_dropdown('tahun_5', $tahun,set_value('tahun'),array('class'=>'form-control','id'=>'tahun')) ?>
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
            if($report_type==4){
              $this->load->view('pages/report_productDailyOrder');
            }
            if($report_type==5){
              $this->load->view('pages/report_monthlySales');
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
        else if($report_type==4){
          echo anchor('admin/print_productDailyOrderReport/'.$category_id.'/'.$date, '<i class="fa fa-print"></i>Print', array('class'=>'btn btn-success','target'=>'_blank'));
        }
        else if($report_type==5){
          echo anchor('admin/print_monthlySalesReport/'.$bln.'/'.$t, '<i class="fa fa-print"></i>Print', array('class'=>'btn btn-success','target'=>'_blank'));
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
        //document.getElementById('sub2').style.display = 'none';
        //document.getElementById('sub3').style.display = 'none';
        document.getElementById('sub4').style.display = 'none';
        document.getElementById('sub5').style.display = 'none';
        //document.getElementById('sub6').style.display = 'none';
        //document.getElementById('sub7').style.display = 'none';
        //document.getElementById('sub8').style.display = 'none';
        //document.getElementById('sub9').style.display = 'none';
        document.getElementById('sub10').style.display = 'none';
        //document.getElementById('sub3').style.display = 'none';
    }else if (document.getElementById('sel_report').value == '2') {
        document.getElementById('sub1').style.display = 'none';
        //document.getElementById('sub2').style.display = 'block';
        //document.getElementById('sub3').style.display = 'none';
        document.getElementById('sub4').style.display = 'none';
        document.getElementById('sub5').style.display = 'none';
        //document.getElementById('sub6').style.display = 'none';
        //document.getElementById('sub7').style.display = 'none';
        //document.getElementById('sub8').style.display = 'none';
        //document.getElementById('sub9').style.display = 'none';
        document.getElementById('sub10').style.display = 'none';
    }else if (document.getElementById('sel_report').value == '3') {
        document.getElementById('sub1').style.display = 'none';
        // document.getElementById('sub2').style.display = 'none';
        // document.getElementById('sub3').style.display = 'block';
        document.getElementById('sub4').style.display = 'none';
        document.getElementById('sub5').style.display = 'none';
        //document.getElementById('sub6').style.display = 'none';
        //document.getElementById('sub7').style.display = 'none';
        //document.getElementById('sub8').style.display = 'none';
        //document.getElementById('sub9').style.display = 'none';
        document.getElementById('sub10').style.display = 'none';
    }else if (document.getElementById('sel_report').value == '4') {
        document.getElementById('sub1').style.display = 'none';
        // document.getElementById('sub2').style.display = 'none';
        // document.getElementById('sub3').style.display = 'none';
        document.getElementById('sub4').style.display = 'block';
        document.getElementById('sub5').style.display = 'none';
        //document.getElementById('sub6').style.display = 'none';
        //document.getElementById('sub7').style.display = 'none';
        //document.getElementById('sub8').style.display = 'none';
        //document.getElementById('sub9').style.display = 'none';
        document.getElementById('sub10').style.display = 'none';
    }else if (document.getElementById('sel_report').value == '5') {
        document.getElementById('sub1').style.display = 'none';
        // document.getElementById('sub2').style.display = 'none';
        // document.getElementById('sub3').style.display = 'none';
        document.getElementById('sub4').style.display = 'none';
        document.getElementById('sub5').style.display = 'block';
        //document.getElementById('sub6').style.display = 'none';
        //document.getElementById('sub7').style.display = 'none';
        //document.getElementById('sub8').style.display = 'none';
        //document.getElementById('sub9').style.display = 'none';
        document.getElementById('sub10').style.display = 'none';
    }else if (document.getElementById('sel_report').value == '6') {
        document.getElementById('sub1').style.display = 'none';
        // document.getElementById('sub2').style.display = 'none';
        // document.getElementById('sub3').style.display = 'none';
        document.getElementById('sub4').style.display = 'none';
        document.getElementById('sub5').style.display = 'none';
        // document.getElementById('sub6').style.display = 'block';
        //document.getElementById('sub7').style.display = 'none';
        // document.getElementById('sub8').style.display = 'none';
        //document.getElementById('sub9').style.display = 'none';
        document.getElementById('sub10').style.display = 'none';
    }else if (document.getElementById('sel_report').value == '8') {
        document.getElementById('sub1').style.display = 'none';
        // document.getElementById('sub2').style.display = 'none';
        // document.getElementById('sub3').style.display = 'none';
        document.getElementById('sub4').style.display = 'none';
        document.getElementById('sub5').style.display = 'none';
        // document.getElementById('sub6').style.display = 'none';
        //document.getElementById('sub7').style.display = 'none';
        // document.getElementById('sub8').style.display = 'block';
        //document.getElementById('sub9').style.display = 'none';
        document.getElementById('sub10').style.display = 'none';
    }else if (document.getElementById('sel_report').value == '10') {
        document.getElementById('sub1').style.display = 'none';
        // document.getElementById('sub2').style.display = 'none';
        // document.getElementById('sub3').style.display = 'none';
        document.getElementById('sub4').style.display = 'none';
        document.getElementById('sub5').style.display = 'none';
        // document.getElementById('sub6').style.display = 'none';
        //document.getElementById('sub7').style.display = 'none';
        // document.getElementById('sub8').style.display = 'none';
        //document.getElementById('sub9').style.display = 'none';
        document.getElementById('sub10').style.display = 'block';
    }else{
      document.getElementById('sub1').style.display = 'none';
      // document.getElementById('sub2').style.display = 'none';
      // document.getElementById('sub3').style.display = 'none';
      document.getElementById('sub4').style.display = 'none';
      document.getElementById('sub5').style.display = 'none';
      //document.getElementById('sub6').style.display = 'none';
      //document.getElementById('sub7').style.display = 'none';
      // document.getElementById('sub8').style.display = 'none';
      //document.getElementById('sub9').style.display = 'none';
      document.getElementById('sub10').style.display = 'none';
    }
  }
</script>
