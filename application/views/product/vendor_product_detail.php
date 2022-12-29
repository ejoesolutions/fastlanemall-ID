
<div class="row">
  <?php if($p_detail['product_status']!=0): ?>
  <?php $baseW=4.25; ?>
  <div class="product product-details clearfix">
  <div class="col-md-5">
    <div id="product-main-view">
      <div class="center2">
        <?php
        $info = pathinfo( $p_detail['image_file'] );
        $no_extension =  basename( $p_detail['image_file'], '.'.$info['extension'] );
        $medium_image = $no_extension.'_thumb.'.$info['extension'];
        ?>
        <a href="#"><img onclick="image(this)" data-link="<?= $medium_image ?>" src="<?php echo base_url().'images/medium/'.$medium_image; ?>" alt="" style="height: 100%; width: 100%; object-fit: contain"></a>
      </div>
      <?php if(!empty($imej)){
        foreach ($imej as $key) { 
        $info = pathinfo( $key['image_add_file'] );
        $no_extension =  basename( $key['image_add_file'], '.'.$info['extension'] );
        $medium_image = $no_extension.'_thumb.'.$info['extension']; ?>
        <div class="center2">
          <a href="#"><img onclick="image(this)" data-link="<?= $medium_image ?>" src="<?php echo base_url().'images/medium/'.$medium_image; ?>" alt="" style="height: 100%; width: 100%; object-fit: contain"></a>
        </div>
        <?php
      }} ?>
    </div>
    <div id="product-view">
      <div class="product-view">
        <?php
        $info = pathinfo( $p_detail['image_file'] );
        $no_extension =  basename( $p_detail['image_file'], '.'.$info['extension'] );
        $thumb_image = $no_extension.'_thumb.'.$info['extension'];
        ?>
        <img src="<?php echo base_url().'images/thumbnail/'.$thumb_image; ?>" alt="">
      </div>
        <?php
        if(!empty($imej)){
        foreach ($imej as $key) {
          $info = pathinfo( $key['image_add_file'] );
          $no_extension =  basename( $key['image_add_file'], '.'.$info['extension'] );
          $thumb_image = $no_extension.'_thumb.'.$info['extension'];
          ?>
          <div class="product-view">
            <img src="<?php echo base_url().'images/thumbnail/'.$thumb_image; ?>" alt="">
          </div>
          <?php
        }} ?>
			</div>
  </div>
  <?php echo form_open('cart/add_pesanan', array('class'=>'horizontal-form')); ?>
  <div class="col-md-7">
    <div class="product-body">
      <div class="sharethis-inline-share-buttons"></div>
      <h2 class="product-name"><?= $p_detail['product_name'] ?></h2>
      <h1 class="product-price-detail">
        <?php
        $nuprice=0;$price_after_tax=0;$clean_price=0;$price_1=0;
        if($p_detail['discount']!=null){
          echo '<span class="btn btn-orange">'.$p_detail['discount'].'% OFF</span><br>';
          echo '<del style="color:#AEB6BF">Rp '.$p_detail['add_cost'].'</del><br>';
          $clean_price=number_format($p_detail['add_cost']-($p_detail['add_cost']*($p_detail['discount']/100)),2, '.', '');
        }else{
          $clean_price=number_format($p_detail['add_cost'], 2, '.', '');
        }
        echo $currency['tag'].' '.($currency['show_decimal']==1 ? number_format($clean_price,2, '.', $currency['separate']) : substr(number_format($clean_price,2, '.', $currency['separate']), 0 ,-3));
        echo form_hidden('price',set_value('price', $clean_price)); ?>
     </h1>
      <br>
      <p><strong>Shop Name:</strong> <?= $p_detail['shop_name'] ?></p>
      <p><strong>Availability:</strong> In Stock [ <?= $p_detail['stock'] ?> ]</p>
      <p><strong>Product Code:</strong> <?= $p_detail['item_code'] ?></p>
      <hr>
      <div class="product-btns">
        <div class="qty-input">
          <span class="text-uppercase">QTY: </span>
          <input type="number" name="qty" class="input text-center" min="1" max="<?= $p_detail['stock'] ?>" value='1'>
        </div>

          <?php echo form_hidden('item_code',$p_detail['item_code']) ?>
          <?php echo form_hidden('product_code',$p_detail['product_code']) ?>
          <?php echo form_hidden('product_id',$p_detail['product_id']) ?>
          <?php echo form_hidden('product_name', $p_detail['product_name']);
          echo form_hidden('weight', $p_detail['weight']);
          echo form_hidden('seller_id', $p_detail['seller_id']);
          echo form_hidden('shop_name', $p_detail['shop_name']);
          echo form_hidden('modal', $p_detail['product_price']);
          echo form_hidden('seller_price', $p_detail['seller_price']);

          //print_r($p_detail);
          echo form_hidden('unit_price', $p_detail['add_cost']);
          echo form_hidden('tax_price', $p_detail['tax']*$p_detail['add_cost']);
          echo form_hidden('ship_price', $p_detail['shipping']);
          echo form_hidden('referrel', $seller['seller_id']);
          ?>

        <div class="pull-right">
          <button class="btn btn-green" type="submit" id="btnSubmitOrder"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
        </div>
      </div>
    </div>    
  </div>
  <?= form_close(); ?>

</div>
<?php endif; ?>
<?php if($p_detail['product_status']==0): ?>
  <p class="text-center">Product not available!</p>
  <?php endif; ?>

</div>

<div>
  <hr>
  <h4>Product Specifications</h4>
  <p><?php echo 'Berat :';  ?>
    <?php
      if($p_detail['weight']>=1000){
        $n_weight=$p_detail['weight']/1000;
        echo $n_weight.' kg';
      }else{
        echo number_format($p_detail['weight'],2).' g';
      }
      ?>
    <br><?php echo 'Size : '.$p_detail['size']  ?>
    <hr>
    <h4>Product Description</h4>

    <p><?php echo $p_detail['description']; ?></p>
  </p>
</div>

