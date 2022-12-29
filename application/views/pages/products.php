<!-- <style>

.content {
  position: relative;
  max-width: 400px;
  margin: auto;
  overflow: hidden;
}

.content .content-overlay {
  background-color: #000000;
  position: absolute;
  left: 0;
  top: 0;
  bottom: 0;
  right: 0;
  opacity: 0;
  -webkit-transition: all 0.4s ease-in-out 0s;
  -moz-transition: all 0.4s ease-in-out 0s;
  transition: all 0.4s ease-in-out 0s;
}

.content:hover .content-overlay{
  opacity: .9;
  /*background :#daa520;*/
  background: linear-gradient(to top, #ffffff 0%, #daa520 100%);

}

.content-image{
	width:100%;
}

.content-details {
  position: absolute;
  text-align: center;
  padding-left: 1em;
  padding-right: 1em;
  width: 100%;
  top: 50%;
  left: 50%;
  opacity: 0;
  -webkit-transform: translate(-50%, -50%);
  -moz-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  -webkit-transition: all 0.3s ease-in-out 0s;
  -moz-transition: all 0.3s ease-in-out 0s;
  transition: all 0.3s ease-in-out 0s;
}

.content:hover .content-details{
  top: 50%;
  left: 50%;
  opacity: 1;
}

.fadeIn-bottom{
  top: 80%;
}

.bottom {
	@include transition();
	@extend .p1-gradient-bg;
	a {
		display: inline-block;
		width: 25%;
		line-height: 40px;
		text-align: center;
		span {
			color: #ffffff;
		}
		&:hover {
			span {
				color: #ffffff;
			}
			background: #ffffff;
			box-shadow: 2.828px 2.828px 15px 0px rgba(0, 0, 0, 0.1);
		}
	}
	@include transition (all .3s linear);
}

.quarter-circle-bottom-left {
    z-index: 2;
    position: absolute;
    width: 45px;
    height: 45px;
    background: #E4B63B;
    bottom: -1px;
    left: 0px;
    border-radius: 0 45px 0 0;
    -moz-border-radius: 0 45px 0 0;
    -webkit-border-radius: 0 45px 0 0;
    color: black;
    line-height: 52px;
    font-size: 80%;
    border: 1px solid #E4B63B;
    font-weight: bold;
}
</style> -->
<div class="row">
  <!-- <div class="col-md-12">
    <div class="section-title">
      <h2 class="title">Products</h2>
      <?php $baseW=4.25; ?>
    </div>
  </div> -->
				<!-- ASIDE -->
				<div id="aside" class="col-md-3">

					<!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Filter by Seller</h3>
						<ul class="list-links">
              <?php
              $cat_id=$pCat['category_id'];
              if(!empty($seller)){
                  foreach($seller as $v){
                ?><li <?php if($this->uri->segment(4)==$v['seller_id']) { echo 'class="active"';}?>><a href="<?php echo base_url('page/products').'/'.$cat_id.'/'.$v['seller_id'] ?>"><?php echo $v['shop_name'] ?></a></li>
                <?php
              }
              }
               ?>
						</ul>
					</div>
					<!-- /aside widget -->

          <!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Filter by Weight(g)</h3>
            <p>Less than or equals to :</p>
            <?php

            if($this->uri->segment(4)!=''){
              echo form_open('page/products/'.$cat_id.'/'.$this->uri->segment(4));
            }else{
              echo form_open('page/products/'.$cat_id);
            }
            ?>
            <?php //echo form_open('page/products/'.$metal_id); ?>
						<input type="text" name="weight" class="form-control" required>
            <button type="submit" class="primary-btn">Filter</button>
            <?php echo form_close(); ?>
					</div>
					<!-- /aside widget -->

          <!-- aside widget -->
					<div class="aside">
						<h3 class="aside-title">Filter by Price(Rp)</h3>
            <p>Less than or equals to :</p>
            <?php

            if($this->uri->segment(4)!=''){
              echo form_open('page/products/'.$cat_id.'/'.$this->uri->segment(4));
            }else{
              echo form_open('page/products/'.$cat_id);
            }
            ?>
            <?php //echo form_open('page/products/'.$metal_id); ?>
						<input type="text" name="price" class="form-control" required>
            <button type="submit" class="primary-btn">Filter</button>
            <?php echo form_close(); ?>
					</div>
					<!-- /aside widget -->

				</div>
				<!-- /ASIDE -->

				<!-- MAIN -->
				<div id="main" class="col-md-9">
          <div class="section-title">
            <h3 class="title"><?php echo $pCat['category_type'] ?></h3>
            <?php $baseW=4.25; ?>
          </div>
          <?php
					//print_r($pList);
          if(!empty($pList)){
            foreach ($pList as $row) {
              if($row['stock']>0 && $row['seller_status']==1 && $row['product_status']==1){
								$info = pathinfo( $row['image_file'] );
				        $no_extension =  basename( $row['image_file'], '.'.$info['extension'] );
				        $thumb_image = $no_extension.'_thumb.'.$info['extension'];
              ?>
              <div class="col-md-3 col-sm-6 col-xs-6">
								<div class="content product product-single">
			              <div class="product-thumb">
			                <div class="content-overlay"></div>
			                <div class="quarter-circle-bottom-left" style="font-size:80%;text-align:center;"><?php if($row['weight']>=1000){ $n_weight=$row['weight']/1000; echo $n_weight.' kg';}else{ echo number_format($row['weight'],0).'g';} ?></div>
			                <img style="border:1px solid #e7e4e4;padding-left:1px;padding-right:1px;padding-top:1px;padding-bottom:1px;" class="content-image img-fluid d-block mx-auto" src="<?php echo base_url().'images/thumbnail/'.$thumb_image; ?>" alt="">
			                <div class="content-details fadeIn-bottom">
			                 <div class="bottom d-flex align-items-center justify-content-center">
			                   <?php
			                   $nuprice=0;$price_after_tax=0;$clean_price=0;$price_1=0;

			                   ?>
			                   <p style="color:black">

			                     <?php
			                     // if ($row->vendor_logo) {
			                     //
			                     //   $image_properties = array(
			                     //     'src'   => base_url().'logo_vendor/'.$row->vendor_logo,
			                     //     'alt'   => $row->vendor_name,
			                     //     'class' => 'img-thumbnail',
			                     //     'width' => '30',
			                     //     'height'=> '30',
			                     //     'style'=>'border:0',
			                     //     'title' => $row->vendor_name,
			                     //   );
			                     //   echo img($image_properties);
			                     //
			                     // } else {
			                     //
			                     //   $image_properties = array(
			                     //     'src'   => 'https://dummyimage.com/75x75/d6c7d6/9b9dad.jpg&text=No+Image',
			                     //     'alt'   => 'No image',
			                     //     'class' => 'img-thumbnail',
			                     //     'width' => '30',
			                     //     'height'=> '30',
			                     //     'style'=>'border:0',
			                     //     'title' => 'No image',
			                     //   );
			                     //   echo img($image_properties);
			                     // }

			                     ?>
			                     <br><?php echo $row['shop_name'] ?><br>
			                     CODE : <?php echo $row['item_code']; ?><br>
			                     PRICE : Rp <?php echo number_format($row['add_cost'],2);  ?><br>
			                     TAX :
			                       <?php
			                       $after_tax=$row['tax']*$row['add_cost'];
			                       echo $row['tax'] * 100;
			                       echo '% / Rp '.number_format($after_tax,2);
			                       ?><br>
			                     SHIPPING : Rp <?php echo number_format($row['shipping'],2); ?><br>
			                     <a href="<?php echo base_url('catalog/product_detail') ?>/<?php echo $row['product_id'].'/1'; ?>">View More</a>
			                   </p>
			                 </div>
			                </div>
			              </div>
			              <div class="product-body" align="right" style="height:190px">
			                <h4 class="product-price">
			                  <?php
			                    //$price_after_tax=($row->tax*$nuprice)+$nuprice;
			                    //$clean_price=$row->total_price+$after_tax;
			                  //echo "Rp ".number_format(round($clean_price,2));
			                  echo "Rp ".number_format($row['total_price'],2);
			                   ?>
			                </h4>

			                <p class="product-name" style="color:black;">
			                  <a href="<?php echo base_url('catalog/product_detail') ?>/<?php echo $row['product_id'].'/1'; ?>"><?php echo $row['product_name'] ?></a>
			                  <?php //echo "<br>".$row->category_type; ?><br>
			                  <span class="text-danger">In Stock : <?php echo $row['stock'] ?></span>
			                </p>
			              </div>
			            </div>
                <!--</a>-->
              </div>

              <?php
            }
            }
          }else{
            echo "<p class='text-center'>No Products Available</p>";
          }
           ?>
				</div>
				<!-- /MAIN -->
			</div>
			<!-- /row -->
