<div class="form-group margin-top-20">
<?php $baseW=4.25; ?>
  <div class="col-md-12 form-horizontal thumbnail">
    <div class="form-group">
      <label class="control-label col-md-4"><strong>NAMA PRODUK : </strong></label>
      <div class="col-md-8">
        <p class="form-control-static">
          <?php echo $product['product_name']; ?>
        </p>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-4"><strong>KOD PRODUK : </strong></label>
      <div class="col-md-8">
        <p class="form-control-static">
          <?php echo $product['item_code']; ?>
        </p>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-4"><strong>KETULENAN PRODUK : </strong></label>
      <div class="col-md-8">
        <p class="form-control-static">
          <?php echo $product['karat']; ?>
        </p>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-4"><strong>BERAT : </strong></label>
      <div class="col-md-8">
        <p class="form-control-static">
          <?php echo number_format($product['weight'],3).' g'; ?>
        </p>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-4"><strong>HARGA: </strong></label>
      <div class="col-md-8">
        <p class="form-control-static">
          <?php
          if ($product['product_type'] == 1 ) {
            // Formula emas = Harga x Berat x Kuality + Upah + Markup + GST
            // $harga_pasaran = $metal['gold_price'];
            // $harga_mentah = ($harga_pasaran * $product['weight'] * ($product['purity'])) + $product['wages'];
            // $harga_markup = $harga_mentah + (($product['markup']) * $harga_mentah);
            // $harga_trmasuk_gst = $harga_markup + (0.06 * $harga_markup);

            echo 'Rp '.number_format($metal['wafer_jual']*$product['weight']).'.00';
            $price_new = round($metal['wafer_jual']*$product['weight'],0).'.00';

            echo form_hidden('price',set_value('price', $price_new));
          } elseif ($product['product_type'] == 2) {
            echo 'Rp '.number_format(($metal['dinar_jual']/$baseW)*$product['weight']).'.00';
            $price_new = number_format(($metal['dinar_jual']/$baseW)*$product['weight']).'.00';
            echo form_hidden('price',set_value('price', $price_new));
          }else{
            echo 'Rp '.number_format($product['dirham_price']).'.00';
              $price_new = number_format($product['dirham_price']).'.00';
              echo form_hidden('price',set_value('price', $price_new));
          }
          // elseif ($product['product_type'] == 3) {
          //   echo 'Rp '.number_format($metal['dirham_jual']).'.00';
          //   $price_new = number_format($product['dirham_jual']).'.00';
          //   echo form_hidden('price',set_value('price', $price_new));
          // }
          // elseif ($product['product_type'] == 4) {
          //   echo 'Rp '.number_format($product['dirham_price']).'.00';
          //   $price_new = number_format($product['dirham_price']).'.00';
          //   echo form_hidden('price',set_value('price', $price_new));
          // }
          ?>
        </p>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-4"><strong>JUMLAH : </strong></label>
      <div class="col-md-8">
        <p class="form-control-static">
          <!-- <?php echo form_input('qty', set_value('qty'), array('class'=>'text-center')) ?> -->

          <?php echo form_hidden('product_id',$product['product_id']) ?>
          <?php echo form_hidden('product_name', $product['product_name']) ?>
          

          <input type="number" name="qty" class="text-center form-control" min="1" max="<?php echo $product['stock'] ?>">
        </p>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-4">&nbsp;</label>
      <div class="col-md-8">
        <p class="form-control-static">
          <?php echo form_submit('submit', 'Simpan', array('class'=>'btn btn-success', 'id'=>'btnSubmitOrder')); ?>
        </p>
      </div>
    </div>
  </div>
</div>
