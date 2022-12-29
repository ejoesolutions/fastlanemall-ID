<?php
  //print_r($output);
 //  $output='';
 //  foreach($p as $row)
 //  {
 //   $output .= '
 //   <div class="post_data">
 //    <h3 class="text-danger">'.$row->vendor_name.'</h3>
 //    <p>'.$row->product_name.'</p>
 //   </div>
 //   ';
 //  }
 // //}
 //  echo $output;
 if(!empty($p)){
 foreach ($p as $row) {
if($row->stock>0 && $row->seller_status==1 && $row->product_status==1){
  $info = pathinfo( $row->image_file );
  $no_extension =  basename( $row->image_file, '.'.$info['extension'] );
  $thumb_image = $no_extension.'_thumb.'.$info['extension'];
?>
<div class="col-md-2 col-sm-6 col-xs-6">
  <a href="<?php echo base_url('catalog/product_detail') ?>/<?php echo $row->product_id.'/1'; ?>">
  <div class="content product product-single">
      <div class="product-thumb">
        <div class="content-overlay"></div>
        <div class="quarter-circle-bottom-left" style="font-size:80%;text-align:center;"><?php if($row->weight>=1000){ $n_weight=$row->weight/1000; echo $n_weight.' kg';}else{ echo number_format($row->weight,0).'g';} ?></div>
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
             <br><?php echo $row->shop_name ?><br>
             CODE : <?php echo $row->item_code; ?><br>
             PRICE : Rp <?php echo number_format($row->add_cost,2);  ?><br>
             <!-- TAX :
               <?php
               $after_tax=$row->tax*$row->add_cost;
               echo $row->tax * 100;
               echo '% / Rp '.number_format($after_tax,2);
               ?><br>
             SHIPPING : Rp <?php echo number_format($row->shipping,2); ?><br> -->
             <!-- <a href="<?php echo base_url('catalog/product_detail') ?>/<?php echo $row->product_id.'/1'; ?>">View More</a> -->
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
          echo "Rp ".number_format($row->total_price,2);
           ?>
        </h4>

        <p class="product-name" style="color:black;">
          <a href="<?php echo base_url('catalog/product_detail') ?>/<?php echo $row->product_id.'/1'; ?>"><?php echo $row->product_name ?></a>
          <?php //echo "<br>".$row->category_type; ?><br>
          <span class="text-danger">In Stock : <?php echo $row->stock ?></span>
        </p>
      </div>
    </div>
  </a>
</div>

<?php
}
}
}
 ?>
