<style>
#menu {
position: relative;
}


/* li:nth-child(odd) {
background-color: yellow;
}

li:nth-child(even) {
background-color: blue;
} */

#nav {
/* position: absolute; */
/* top: 0; */
width: 200px;
}

#prev {
  position: absolute;
  left: 0;
  border-radius: 20px;
  display: inline-block;
  background-color: #ffff;
  color: black;
  border: 2px solid #F2F3F4;
  padding: 5px;
  cursor: pointer;
  top: 120px;
  font-weight: bold;
}

#prev:hover {
  position: absolute;
  left: 0;
  border-radius: 20px;
  display: inline-block;
  background-color: #ffff;
  color: black;
  border: 2px solid #F2F3F4;
  padding: 9px;
  cursor: pointer;
  top: 120px;
  font-weight: bold;
}

#next {
  position: absolute;
  right: 0;
  border-radius: 20px;
  display: inline-block;
  background-color: #ffff;
  color: black;
  border: 2px solid #F2F3F4;
  padding: 5px;
  cursor: pointer;
  top: 120px;
  font-weight: bold;
}

#next:hover {
  position: absolute;
  right: 0;
  border-radius: 20px;
  display: inline-block;
  background-color: #ffff;
  color: black;
  border: 2px solid #F2F3F4;
  padding: 9px;
  cursor: pointer;
  top: 120px;
  font-weight: bold;
}

.cards {
  display: grid;
  grid-template-columns: repeat(12, 1fr);
  grid-auto-rows: auto;
  grid-gap: 1rem;
}
  
  
.card {
  border: 2px solid #e7e7e7;
  border-radius: 4px;   
  padding: .5rem;
}

.row2 {
  /* width: 100%; */
  display: flex;
  flex-direction: row;
  /* justify-content: center; */
  width: auto;
  overflow: hidden;
  /* white-space: nowrap; */
  /* display: block; */
  list-style: none;
  padding: 0;
}

.block {
  width: 100px;
}

div.b {
  word-wrap: break-word !important;
}

</style>
<div class="section-title">
  <h2>Categories<span style="font-size:50%;float:right"><a href="<?php echo base_url("page/all_categories") ?>">View All</a></p></h2>
</div>
<div id="menu">
  <div class="row2">
    <?php foreach ($cat_list1 as $key) { ?>
      <div class="block">
        <a <?php if ($key['status']==1) { echo 'href="'.base_url('page/products/'.$key['category_id']).'"';} ?>>
          <div class="thumbnail <?= $key['status']==0 ? 'isDisabled' : '' ?>" style="height:137px;width:100px;padding:0;margin:0;border: 1px solid #F8F9F9;border-radius: 0;">    
          <div class="thumb-hover">
            <?php if ($key['category_logo']) { ?>
              <img src="<?= base_url('logo/'.$key['category_logo']) ?>" style="height: 100%; width: 100%;">
            <?php }else { ?>
              <img src="<?= base_url().'logo_vendor/DummyShop.png' ?>" style="height: 90px; width: 100%; object-fit: contain">
            <?php } ?>
            <div class="caption text-center" style='line-height: 80%;overflow-x: hidden;'>
              <span style="font-size:70%;"><?= $key['category_type'] ?></span>
            </div>
          </div>
          </div>
        </a>
      </div>
    <?php } ?>
  </div>

  <div class="row2">
    <?php foreach ($cat_list2 as $key) { ?>
      <div class="block">
        <a <?php if ($key['status']==1) { echo 'href="'.base_url('page/products/'.$key['category_id']).'"';} ?>>
          <div class="thumbnail <?= $key['status']==0 ? 'isDisabled' : '' ?>" style="height:137px;width:100px;padding:0;margin:0;border: 1px solid #F8F9F9;border-radius: 0;">
          <div class="thumb-hover">
            <?php if ($key['category_logo']) { ?>
              <img src="<?= base_url('logo/'.$key['category_logo']) ?>" style="height: 100%; width: 100%;">
            <?php }else { ?>
              <img src="<?= base_url().'logo_vendor/DummyShop.png' ?>" style="height: 90px; width: 100%; object-fit: contain">
            <?php } ?>
            <div class="caption text-center" style='line-height: 80%;overflow-x: hidden;'>
              <span style="font-size:70%;"><?= $key['category_type'] ?></span>
            </div>
          </div>
          </div>
        </a>
      </div>
    <?php } ?>
  </div>

<div id="nav">
  <div id="prev"><i class="fa fa-chevron-left fa-lg" aria-hidden="true" style="color:#AAB7B8"></i></div>
  <div id="next"><i class="fa fa-chevron-right fa-lg" aria-hidden="true" style="color:#AAB7B8"></i></div>
</div>
</div>

<div class="row" style="margin-top:20px">
<!-- section title -->
<div class="col-md-12">
  <div class="section-title">
    <h2>New Products<span style="font-size:50%;float:right"><a href="<?php echo base_url("page/new_products") ?>">View All</a></p></h2>
  </div>
</div>
<!-- section title -->
<?php

  //$data=[];
  $this->db->LIMIT(12,0);
  $this->db->where('vu_products_list.seller_status=1 and vu_products_list.product_status=1 and vu_products_list.stock>0 and vu_products_list.new_product IS NOT NULL');
  $this->db->select('
    vu_products_list.*,
    ci_seller.shop_city,
    ci_seller.shop_state,
  ');
  $this->db->order_by('vu_products_list.product_id','desc');
  $this->db->join('ci_seller', 'ci_seller.seller_id = vu_products_list.seller_id', 'left');
  $this->query = $this->db->get('vu_products_list');
  if ($this->query->num_rows() > 0) {
    foreach ($this->query->result() as $row) {
      $data_new[] = $row;
    }
    //return $data;
  }

  if(!empty($data_new)){
    foreach ($data_new as $row) {
      if($row->stock>0 && $row->seller_status==1 && $row->product_status==1){
        $info = pathinfo( $row->image_file );
        $no_extension =  basename( $row->image_file, '.'.$info['extension'] );
        $thumb_image = $no_extension.'_thumb.'.$info['extension'];
      ?>
      <div class="col-md-2 col-sm-6 col-xs-6 c-padding" style="margin:0">
        <!-- <a href="<?php echo base_url('') ?><?php echo $seller['shop_url'] ?>/p/<?php echo $seller['seller_id'] ?>/<?php echo $row->product_id; ?>"> -->
        <a href="<?php echo base_url('catalog/product_detail') ?>/<?php echo $row->product_id.'/1'; ?>">
        <div class="content product product-single custom-banner" style="margin-top:10px;margin-bottom:0">
            <div class="product-thumb" style="margin:0;">
              <div class="content-overlay"></div>
              <?php if($row->discount!=null){ ?>
                <div class="discount-label red"> <span>-<?php echo $row->discount.'%' ?></span> </div>
              <?php }
              if($row->top_product!=null){ ?>
                <div class="discount-label-2 yellow"> <span>TOP!</span> </div>
              <?php }
              if($row->new_product!=null) { ?>
                <div class="discount-label-3 black"> <span>NEW!</span> </div>
              <?php } ?>
              <!-- <img style="height: 100%; width: 100%; object-fit: contain" class="content-image" src="<?php echo base_url().'images/thumbnail/'.$thumb_image; ?>" alt=""> -->
              <div class="center" style="height: 182px;">
                <img src="<?php echo base_url().'images/thumbnail/'.$thumb_image; ?>" alt=" " style="height: 100%; width: 100%; object-fit: contain" />
              </div>
              <div class="content-details fadeIn-bottom">
               <div class="bottom d-flex align-items-center justify-content-center">
                 <?php $nuprice=0;$price_after_tax=0;$clean_price=0;$price_1=0; ?>
                 <p style="color:black">
                  <?php
                  if ($row->shop_image) {
                    $image = $row->shop_image;
                    $image_properties = array(
                      'src'   => base_url().'logo_vendor/small/'.$image,
                      'alt'   => $row->shop_name,
                      'class' => '',
                      'width' => '30',
                      'height'=> '30',
                      'style'=>'border:0',
                      'title' => $row->shop_name,
                    );
                    echo img($image_properties);

                  } else {

                     $image_properties = array(
                      //  'src'   => 'https://dummyimage.com/75x75/d6c7d6/9b9dad.jpg&text=No+Image',
                       'src'   => base_url().'logo_vendor/DummyShop.png',
                       'alt'   => 'No image',
                       'class' => '',
                       'width' => '30',
                       'height'=> '30',
                       'style'=>'border:0',
                       'title' => 'No image',
                     );
                     echo img($image_properties);
                   }

                   ?>
                   <br><?= $row->shop_name ?><br>
                   CODE : <?php echo $row->item_code; ?>
                   <!-- PRICE : Rp <?php echo number_format($row->add_cost,2);?><br> -->
                 </p>
               </div>
              </div>
            </div>
            <div class="product-body" align="left" style="height:107px;margin-top:0.1px">
              <p class="over-flow" style="color:black;margin-top:0;margin-bottom:3px;line-height: 1;">
                <a class="product-name2" href="<?php echo base_url('catalog/product_detail') ?>/<?php echo $row->product_id.'/1'; ?>"><?php echo $row->product_name ?></a>
              </p>
              <h4 class="product-price">
                <b>
                <?php
                  if($row->discount!=null)
                  {
                    $clean_price = $row->add_cost - ($row->add_cost*($row->discount/100));
                    echo '<span style="text-decoration: line-through;color:#AEB6BF;margin-right:2px;font-size:84%"><span style="font-size:81%">'.$currency['tag'].'</span>'.($currency['show_decimal']==1 ? number_format($row->add_cost,2, '.', $currency['separate']) : substr(number_format($row->add_cost,2, '.', $currency['separate']), 0 ,-3)).'</span>';

                    echo '<span style="font-size:81%">'.$currency['tag'].'</span>'.($currency['show_decimal']==1 ? number_format($clean_price,2, '.', $currency['separate']) : substr(number_format($clean_price,2, '.', $currency['separate']), 0 ,-3));
                  }else{
                    echo '<span style="font-size:81%">'.$currency['tag'].'</span>'.($currency['show_decimal']==1 ? number_format($row->add_cost,2, '.', $currency['separate']) : substr(number_format($row->add_cost,2, '.', $currency['separate']), 0 ,-3));
                  }
                ?>
                </b>
              </h4>
              <p style="margin:0;line-height: 1.2;">
                <span class="text-danger" style="font-size:82%">In Stock : <?= $row->stock ?></span>
                <!-- <br> -->
              </p>
              <span style="color:#AEB6BF;font-size:84%"><?= $row->shop_city ?>, <?= $row->shop_state ?></span>

                
            </div>
          </div>
        </a>
      </div>

      <?php
    }
}

  }else{
    echo "<p class='text-center'>No products yet</p>";
  }
 ?>

</div>
<div class="row">
<!-- section title -->
<div class="col-md-12">
  <br>
  <div class="section-title">
    <h2>Top Products <span  style="font-size:50%;float:right"><a href="<?php echo base_url("page/top_products") ?>">View All</a></span></h2>
  </div>
</div>
<!-- section title -->
<?php
  //print_r($products);

  //$data=[];
  $this->db->LIMIT(12,0);
  $this->db->where('vu_products_list.seller_status=1 and vu_products_list.product_status=1 and vu_products_list.stock>0 and vu_products_list.top_product IS NOT NULL');
  $this->db->order_by('vu_products_list.product_id','desc');
  $this->db->join('ci_seller', 'ci_seller.seller_id = vu_products_list.seller_id', 'left');
  $this->query = $this->db->get('vu_products_list');
  if ($this->query->num_rows() > 0) {
    foreach ($this->query->result() as $row) {
      $data_top[] = $row;
    }
    //return $data;
  }
  //print_r($data);

  if(!empty($data_top)){
    foreach ($data_top as $row) {
      if($row->stock>0 && $row->seller_status==1 && $row->product_status==1){
        $info = pathinfo( $row->image_file );
        $no_extension =  basename( $row->image_file, '.'.$info['extension'] );
        $thumb_image = $no_extension.'_thumb.'.$info['extension'];
      ?>
      <div class="col-md-2 col-sm-6 col-xs-6 c-padding" style="margin:0">
        <!-- <a href="<?php echo base_url('') ?><?php echo $seller['shop_url'] ?>/p/<?php echo $seller['seller_id'] ?>/<?php echo $row->product_id; ?>"> -->
        <a href="<?php echo base_url('catalog/product_detail') ?>/<?php echo $row->product_id.'/1'; ?>">
        <div class="content product product-single custom-banner" style="margin-top:10px;margin-bottom:0">
            <div class="product-thumb" style="margin:0;">
              <div class="content-overlay"></div>
              <!-- <div class="quarter-circle-bottom-left" style="font-size:80%;text-align:center;"><?php if($row->weight>=1000){ $n_weight=$row->weight/1000; echo $n_weight.' kg';}else{ echo number_format($row->weight,0).'g';} ?></div> -->
              <?php
              if($row->discount!=null){
                ?><div class="discount-label red"> <span>-<?php echo $row->discount.'%' ?></span> </div><?php
              }
              if($row->top_product!=null){
                ?><div class="discount-label-2 yellow"> <span>TOP!</span> </div><?php
              }
              if($row->new_product!=null)
              {
                ?><div class="discount-label-3 black"> <span>NEW!</span> </div><?php
              }
              ?>
              <!-- <img style="height: 100%; width: 100%; object-fit: contain" class="content-image" src="<?php echo base_url().'images/thumbnail/'.$thumb_image; ?>" alt=""> -->
              <div class="center" style="height: 182px;">
                <img src="<?php echo base_url().'images/thumbnail/'.$thumb_image; ?>" alt=" " style="height: 100%; width: 100%; object-fit: contain" />
              </div>
              <div class="content-details fadeIn-bottom">
               <div class="bottom d-flex align-items-center justify-content-center">
                 <?php $nuprice=0;$price_after_tax=0;$clean_price=0;$price_1=0; ?>
                 <p style="color:black">
                  <?php
                  if ($row->shop_image) {
                    $image = $row->shop_image;
                    $image_properties = array(
                      'src'   => base_url().'logo_vendor/small/'.$image,
                      'alt'   => $row->shop_name,
                      'class' => '',
                      'width' => '30',
                      'height'=> '30',
                      'style'=>'border:0',
                      'title' => $row->shop_name,
                    );
                    echo img($image_properties);

                  } else {

                     $image_properties = array(
                      //  'src'   => 'https://dummyimage.com/75x75/d6c7d6/9b9dad.jpg&text=No+Image',
                       'src'   => base_url().'logo_vendor/DummyShop.png',
                       'alt'   => 'No image',
                       'class' => '',
                       'width' => '30',
                       'height'=> '30',
                       'style'=>'border:0',
                       'title' => 'No image',
                     );
                     echo img($image_properties);
                   }

                   ?>
                   <br><?= $row->shop_name ?><br>
                   CODE : <?php echo $row->item_code; ?>
                   <!-- PRICE : Rp <?php echo number_format($row->add_cost,2);?><br> -->
                 </p>
               </div>
              </div>
            </div>
            <div class="product-body" align="left" style="height:107px;margin-top:0.1px">
              <p class="over-flow" style="color:black;margin-top:0;margin-bottom:3px;line-height: 1;">
                <a class="product-name2" href="<?php echo base_url('catalog/product_detail') ?>/<?php echo $row->product_id.'/1'; ?>"><?php echo $row->product_name ?></a>
              </p>
              <h4 class="product-price">
                <?php
                  if($row->discount!=null)
                  {
                    $clean_price=$row->add_cost-($row->add_cost*($row->discount/100));
                    echo '<span style="text-decoration: line-through;color:#AEB6BF;margin-right:2px;font-size:84%"><span style="font-size:81%">'.$currency['tag'].'</span>'.($currency['show_decimal']==1 ? number_format($row->add_cost,2, '.', $currency['separate']) : substr(number_format($row->add_cost,2, '.', $currency['separate']), 0 ,-3)).'</span>';

                    echo '<span style="font-size:81%">'.$currency['tag'].'</span>'.($currency['show_decimal']==1 ? number_format($clean_price,2, '.', $currency['separate']) : substr(number_format($clean_price,2, '.', $currency['separate']), 0 ,-3));
                  }else{
                    echo '<span style="font-size:81%">'.$currency['tag'].'</span>'.($currency['show_decimal']==1 ? number_format($row->add_cost,2, '.', $currency['separate']) : substr(number_format($row->add_cost,2, '.', $currency['separate']), 0 ,-3));
                  }
                 ?>
              </h4>
              <p style="margin:0;line-height: 1.2;">
                <span class="text-danger" style="font-size:82%">In Stock : <?php echo $row->stock ?></span>
                <!-- <br> -->
              </p>
              <span style="color:#AEB6BF;font-size:84%"><?= $row->shop_city ?>, <?= $row->shop_state ?></span>
            </div>
          </div>
        </a>
      </div>

      <?php
    }
}

  }else{
      echo "<p class='text-center'>No products yet</p>";
  }
 ?>

</div>
<div class="row">
<!-- section title -->
<div class="col-md-12">
  <br>
  <div class="section-title">
    <h2>Discount Products<span style="font-size:50%;float:right"><a href="<?php echo base_url("page/discount_products") ?>">View All</a></span></h2>
  </div>
</div>
<!-- section title -->
<?php
  //print_r($products);

  //$data=[];
  $this->db->LIMIT(12,0);
  $this->db->where('vu_products_list.seller_status=1 and vu_products_list.product_status=1 and vu_products_list.stock>0 and vu_products_list.discount IS NOT NULL');
  $this->db->order_by('vu_products_list.product_id','desc');
  $this->db->join('ci_seller', 'ci_seller.seller_id = vu_products_list.seller_id', 'left');
  $this->query = $this->db->get('vu_products_list');
  if ($this->query->num_rows() > 0) {
    foreach ($this->query->result() as $row) {
      $data_discount[] = $row;
    }
    //return $data;
  }
  //print_r($data);

  if(!empty($data_discount)){
    foreach ($data_discount as $row) {
      if($row->stock>0 && $row->seller_status==1 && $row->product_status==1){
        $info = pathinfo( $row->image_file );
        $no_extension =  basename( $row->image_file, '.'.$info['extension'] );
        $thumb_image = $no_extension.'_thumb.'.$info['extension'];
      ?>
      <div class="col-md-2 col-sm-6 col-xs-6 c-padding" style="margin:0">
        <a href="<?php echo base_url('catalog/product_detail') ?>/<?php echo $row->product_id.'/1'; ?>">
        <div class="content product product-single custom-banner" style="margin-top:10px;margin-bottom:0">
            <div class="product-thumb" style="margin:0;">
              <div class="content-overlay"></div>
              <!-- <div class="quarter-circle-bottom-left" style="font-size:80%;text-align:center;"><?php if($row->weight>=1000){ $n_weight=$row->weight/1000; echo $n_weight.' kg';}else{ echo number_format($row->weight,0).'g';} ?></div> -->
              <?php
              if($row->discount!=null){
                ?><div class="discount-label red"> <span>-<?php echo $row->discount.'%' ?></span> </div><?php
              }
              if($row->top_product!=null){
                ?><div class="discount-label-2 yellow"> <span>TOP!</span> </div><?php
              }
              if($row->new_product!=null)
              {
                ?><div class="discount-label-3 black"> <span>NEW!</span> </div><?php
              }
              ?>
              <!-- <img style="height: 100%; width: 100%; object-fit: contain" class="content-image" src="<?php echo base_url().'images/thumbnail/'.$thumb_image; ?>" alt=""> -->
              <div class="center" style="height: 182px;">
                <img src="<?php echo base_url().'images/thumbnail/'.$thumb_image; ?>" alt=" " style="height: 100%; width: 100%; object-fit: contain" />
              </div>
              <div class="content-details fadeIn-bottom">
               <div class="bottom d-flex align-items-center justify-content-center">
                 <?php $nuprice=0;$price_after_tax=0;$clean_price=0;$price_1=0; ?>
                 <p style="color:black">
                  <?php
                  if ($row->shop_image) {
                    $image = $row->shop_image;
                    $image_properties = array(
                      'src'   => base_url().'logo_vendor/small/'.$image,
                      'alt'   => $row->shop_name,
                      'class' => '',
                      'width' => '30',
                      'height'=> '30',
                      'style'=>'border:0',
                      'title' => $row->shop_name,
                    );
                    echo img($image_properties);

                  } else {

                     $image_properties = array(
                      //  'src'   => 'https://dummyimage.com/75x75/d6c7d6/9b9dad.jpg&text=No+Image',
                       'src'   => base_url().'logo_vendor/DummyShop.png',
                       'alt'   => 'No image',
                       'class' => '',
                       'width' => '30',
                       'height'=> '30',
                       'style'=>'border:0',
                       'title' => 'No image',
                     );
                     echo img($image_properties);
                   }

                   ?>
                   <br><?= $row->shop_name ?><br>
                   CODE : <?php echo $row->item_code; ?>
                 </p>
               </div>
              </div>
            </div>
            <div class="product-body" align="left" style="height:107px;margin-top:0.1px">
              <p class="over-flow" style="color:black;margin-top:0;margin-bottom:3px;line-height: 1;">
                <a class="product-name2" href="<?php echo base_url('catalog/product_detail') ?>/<?php echo $row->product_id.'/1'; ?>"><?php echo $row->product_name ?></a>
              </p>
              <h4 class="product-price">
                <?php
                  if($row->discount!=null) {
                    $clean_price=$row->add_cost-($row->add_cost*($row->discount/100));
                    echo '<span style="text-decoration: line-through;color:#AEB6BF;margin-right:2px;font-size:84%"><span style="font-size:81%">'.$currency['tag'].'</span>'.($currency['show_decimal']==1 ? number_format($row->add_cost,2, '.', $currency['separate']) : substr(number_format($row->add_cost,2, '.', $currency['separate']), 0 ,-3)).'</span>';
                    echo '<span style="font-size:81%">'.$currency['tag'].'</span>'.($currency['show_decimal']==1 ? number_format($clean_price,2, '.', $currency['separate']) : substr(number_format($clean_price,2, '.', $currency['separate']), 0 ,-3));
                  }else{
                    echo '<span style="font-size:81%">'.$currency['tag'].'</span>'.($currency['show_decimal']==1 ? number_format($row->add_cost,2, '.', $currency['separate']) : substr(number_format($row->add_cost,2, '.', $currency['separate']), 0 ,-3));
                  }
                ?>
              </h4>
              <p style="margin:0;line-height: 1.2;">
                <span class="text-danger" style="font-size:82%">In Stock : <?php echo $row->stock ?></span>
              </p>
              <span style="color:#AEB6BF;font-size:84%"><?= $row->shop_city ?>, <?= $row->shop_state ?></span>   
            </div>
          </div>
        </a>
      </div>

      <?php
    }
  }

  }else{
    echo "<p class='text-center'>No products yet</p>";
  }
 ?>

</div>

<script>
$('#prev').on('click', function() {
$('#menu .row2').animate({
  scrollLeft: '-=300'
}, 300, 'swing');
});

$('#next').on('click', function() {
$('#menu .row2').animate({
  scrollLeft: '+=300'
}, 300, 'swing');
});
</script>