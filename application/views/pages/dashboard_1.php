<style>
#chartdiv {
width: 100%;
height: 500px;
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

                  if(!$vendor['total']){
                    $vendor['total']=0;
                  }
                  ?><span data-counter="counterup" data-value="<?php echo $vendor['total'] ?>">0</span><?php
                ?>
                <!-- <span data-counter="counterup" data-value="<?php echo $sales['total'] ?>">0</span> -->
              </h3>
              <small>VENDOR AKTIF</small>
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
              <small>PRODUK BERDAFTAR</small>
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
              <small>JUALAN</small>
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
            <!-- <div class="status">
              <div class="status-title"> peningkatan </div>
              <div class="status-number"> 25% </div>
            </div> -->
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
              <small>PELANGGAN</small>
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
          <label class="control-label col-sm-2 text-center" for="Vendor">Vendor</label>
              <div class="col-sm-2">
                <?php echo form_dropdown('vendor_id', $list_vendor, set_value('vendor_id'), array('class'=>'form-control','id'=>'vendor_list')) ?>
              </div>

    					<label class="control-label col-sm-2 text-center" for="Bulan">Bulan</label>
    					<div class="col-sm-2">
                <?php
                $bulan = array(
                  "" => 'SILA PILIH',
                  "01" => 'JANUARI',
          				"02" => 'FEBRUARI',
          				"03" => 'MAC',
          				"04" => 'APRIL',
          				"05" => 'MEI',
          				"06" => 'JUN',
          				"07" => 'JULAI',
          				"08" => 'OGOS',
          				"09" => 'SEPTEMBER',
          				"10" => 'OKTOBER',
          				"11" => 'NOVEMBER',
          				"12" => 'DISEMBER'
          			);
                ?>
                <?php echo form_dropdown('bulan', $bulan, '', array('class'=>'form-control','id'=>'bulan')) ?>
    					</div>

    					<label class="control-label col-sm-2 text-center" for="Tahun">Tahun</label>
    					<div class="col-sm-2">
    					  <?php echo form_dropdown('tahun', $tahun, set_value('tahun'), array('class'=>'form-control','id'=>'tahun')) ?>
    					</div>
        </div>

      </div>
      <div class="col-sm-12">
          <br>
        <div align="center" class="col align-self-center">
          <input type="submit" name="submit" value="Cari" class="btn btn-primary btn-sm" />
          <input type="reset" value="Clear" class="btn btn-default btn-sm" />
        </div>
      <?php echo form_close(); ?>
    </div>
      <br>
      <hr>
      <?php
        if(!empty($all_report)){
          $k=0;
          foreach ($all_report as $key) {
            $temp_product[]=array('product_id' => $key['product_id']);
          }
          $arr_product2=array_unique($temp_product,SORT_REGULAR);
          $arr_product=array_values($arr_product2);
          //print_r($arr_product);
          for($i=0;$i<count($arr_product);$i++){
            $total_qty=0;$total_sale=0;$total_modal=0;
            for($j=0;$j<count($all_report);$j++){
              if($arr_product[$i]['product_id']==$all_report[$j]['product_id']){
                $total_qty+=$all_report[$j]['qty'];
                $total_sale+=$all_report[$j]['sale_price'];
                $total_modal+=$all_report[$j]['modal_price2'];
                $product_id=$all_report[$j]['product_id'];
                $product_name=$all_report[$j]['product_name'];
                $item_code=$all_report[$j]['item_code'];
                $vendor_id=$all_report[$j]['vendor_id'];
                $vendor_name=$all_report[$j]['vendor_name'];
                $vendor_status=$all_report[$j]['vendor_status'];
                $metal=$all_report[$j]['metal'];
                $product_type=$all_report[$j]['product_type'];
                $karat=$all_report[$j]['karat'];
                $weight=$all_report[$j]['weight'];
              }
            }
            $arr_sale[]=array(
              'product_id'=>$product_id,
              'product_name'=>$product_name,
              'item_code'=>$item_code,
              'vendor_id'=>$vendor_id,
              'vendor_name'=>$vendor_name,
              'vendor_status'=>$vendor_status,
              'metal'=>$metal,
              'product_type'=>$product_type,
              'karat'=>$karat,
              'weight'=>$weight,
              'total_qty_sale'=>$total_qty,
              'total_sale'=>$total_sale,
              'total_modal'=>$total_modal,
              'total_rev'=>$total_sale-$total_modal,
            );
          }

        }




       ?>

      <div class="col-md-12">
        <table class="table table-bordered" id="sample_1">
          <thead>
            <th class="text-center">No.</th>
            <th class="text-center">Vendor</th>
            <th class="text-center">Jualan Produk</th>
            <th class="text-center">Kuantiti</th>
            <th class="text-center">Jumlah Jualan (Rp)</th>
            <th class="text-center">Jumlah Keuntungan (Rp)</th>
          </thead>
          <tbody>
            <?php
            $n=1;
            if(!empty($all_report)){
              foreach ($arr_sale as $key) {
                ?>
                <tr>
                  <td><?php echo $n++; ?></td>
                  <td><?php echo $key['vendor_name']; ?></td>
                  <td><?php echo $key['product_name']; ?></td>
                  <td class="text-center"><?php echo $key['total_qty_sale']; ?></td>
                  <td class="text-center"><?php echo $key['total_sale']; ?></td>
                  <td class="text-center"><?php echo $key['total_rev']; ?></td>
                </tr>
                <?php
              }
            }
             ?>
          </tbody>
        </table>
      </div>
    </div>
</div>
</div>
