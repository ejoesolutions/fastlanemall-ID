<?php 

$date1 = date('Y-m-d', strtotime($seller['seller_created']));
$date2 = date('Y-m-d');

$diff = abs(strtotime($date2) - strtotime($date1));

$years = floor($diff / (365*60*60*24));
$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

?>

<div class="media">
  <a class="pull-left" href="#">
    <img class="media-object" src="<?= ($seller['shop_image']) ? base_url().'logo_vendor/'.$seller['shop_image'] : base_url().'logo_vendor/DummyShop.png' ?>" alt="..." width="140px">
  </a>
  <div class="media-body">
    <div class="col-md-5">
      <h3 class="media-heading">
        <?=  $seller['shop_name'] ?>
        <?php if ($seller['shop_city']) { ?>
          <br>
          <h5 style="color:#4A4E5A"><?= $seller['shop_city'] ?>, <?= $seller['shop_state'] ?></h5>
        <?php } ?>
        <input type="hidden" value="<?= $seller['seller_id'] ?>" id="sellerID">
      </h3>
      <div class="btn-group">
        <a href="https://wa.me/<?= $seller['phone'] ?>" class="btn btn-success"><i class="icon-bubbles"></i> Whatsapp</a>
        <a href="<?= base_url('') ?><?= $seller['shop_url'] ?>" class="btn btn-default"><i class="icon-bag"></i> View Shop</a>
      </div>
    </div>
    <div class="col-md-3 h5">
      <h4>Products : <span class="text-choco"><?= ($pList) ? count($pList): 0 ?></span></h4>
      <h4>Contact : <span class="text-choco"><?= $seller['phone'] ?></span></h4>
    </div>
    <div class="col-md-3 h5">
      <h4>Joined : <span class="text-choco"><?= ($years) ? $years.' years' : '' ?> <?= ($months) ? $months.' months' : '' ?> <?= (!$months && !$years) ? $days.' days' : '' ?> ago</span></h4>
    </div>
  </div>
</div>

<div class="row">
    <hr>
    <?php 
    if ($this->uri->segment(2) && $this->uri->segment(3)) {
      $this->load->view('product/vendor_product_detail');
      echo "<hr>";
    }else { ?>
      <div class="section-title">
        <h3 class="">Products by <?php echo $seller['shop_name'] ?></h3>
      </div>
    <?php } ?>
    <?php 
    if ($this->uri->segment(2) && $this->uri->segment(3)) {
      echo "<h4 class='title'>More Products by ".$seller['shop_name']."</h4>";
    } ?>
  </div>
  <!-- section title -->
  <div class="row" style="margin-bottom:20px">
    <div class="col-md-6">
      <select name="" id="filterCat" class="form-control">
        <option value="">Filter Category</option>
        <?php foreach ($pCat as $key) {
          echo '<option value="'.$key['category_id'].'">'.$key['category_type'].'</option>';
        } ?>
      </select>
    </div>
    <div class="col-md-6">
      <select name="" id="disSubCat" class="form-control" disabled>
        <option value="">Filter Subcategory</option>
      </select>

      <div id="showSubs"></div>

    </div>
  </div>
  <div id="shopProducts">
  <?php
    $limit =36;
    if (isset($_GET["page"])) {
      $pn  = $_GET["page"];
    } else {
      $pn=1;
    };

    $start_from = ($pn-1) * $limit;

    $this->db->LIMIT($limit,$start_from);
    $this->db->where('vu_products_list.seller_status=1 and vu_products_list.product_status=1 and vu_products_list.stock>0');
    if($this->uri->segment(1)!=''){
      $this->db->where('vu_products_list.shop_url',$this->uri->segment(1));
      $this->db->or_where('vu_products_list.seller_id',1);
      $this->db->or_where('vu_products_list.cfl',1);
    }
    $this->db->select('
      vu_products_list.*,
      ci_seller.shop_city,
      ci_seller.shop_state,
    ');
    $this->db->order_by('vu_products_list.seller_id desc,vu_products_list.product_id desc');
    $this->db->join('ci_seller', 'ci_seller.seller_id = vu_products_list.seller_id', 'left');
    
    $this->query = $this->db->get('vu_products_list');
    if ($this->query->num_rows() > 0) {
      foreach ($this->query->result() as $row) {
        $data[] = $row;
      }
    }

    if(!empty($data)){
      foreach ($data as $row) {
        if($row->stock>0 && $row->seller_status==1 && $row->product_status==1){
          $info = pathinfo( $row->image_file );
          $no_extension =  basename( $row->image_file, '.'.$info['extension'] );
          $thumb_image = $no_extension.'_thumb.'.$info['extension'];
        ?>
        <div class="col-md-2 col-sm-6 col-xs-6 c-padding" style="margin:0">
          <a href="<?php echo base_url('') ?><?php echo $seller['shop_url'] ?>/p/<?php echo $seller['seller_id'] ?>/<?php echo $row->product_id; ?>">
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
                        'src'   => base_url().'logo_vendor/DummyShop.png',
                        'alt'   => 'No image',
                        'class' => '',
                        'width' => '30',
                        'height'=> '30',
                        'style'=>'border:0',
                        'title' => 'No image',
                      );
                      echo img($image_properties);
                    } ?>
                    
                    <br><?= $row->shop_name ?><br>
                    CODE : <?= $row->item_code; ?>
                   </p>
                 </div>
                </div>
              </div>
              <div class="product-body" align="left" style="height:107px;margin-top:0.1px">
                <p class="over-flow" style="color:black;margin-top:0;margin-bottom:3px;line-height: 1;">
                  <a class="product-name2" href="<?= base_url('') ?><?= $seller['shop_url'] ?>/p/<?= $seller['seller_id'] ?>/<?= $row->product_id; ?>"><?= $row->product_name ?></a>
                </p>
                <h4 class="product-price">
                  <?php if($row->discount!=null) {
                    $clean_price=$row->add_cost-($row->add_cost*($row->discount/100));
                    echo '<span style="text-decoration: line-through;color:#AEB6BF;margin-right:2px;font-size:84%"><span style="font-size:81%">'.$currency['tag'].'</span>'.($currency['show_decimal']==1 ? number_format($row->add_cost,2, '.', $currency['separate']) : substr(number_format($row->add_cost,2, '.', $currency['separate']), 0 ,-3)).'</span>';

                    echo '<span style="font-size:81%">'.$currency['tag'].'</span>'.($currency['show_decimal']==1 ? number_format($clean_price,2, '.', $currency['separate']) : substr(number_format($clean_price,2, '.', $currency['separate']), 0 ,-3));
                  }else{
                    echo '<span style="font-size:81%">'.$currency['tag'].'</span>'.($currency['show_decimal']==1 ? number_format($row->add_cost,2, '.', $currency['separate']) : substr(number_format($row->add_cost,2, '.', $currency['separate']), 0 ,-3));
                  } ?>
                </h4>
                <p style="margin:0;line-height: 1.2;">
                  <span class="text-danger" style="font-size:82%">In Stock : <?= $row->stock ?></span>
                </p>
                <span style="color:#AEB6BF;font-size:80%"><?= $row->shop_city ?>, <?= $row->shop_state ?></span>
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

<div id="detail"></div>

<script>
  $(document).on('change', '#filterCat, #filterSubCat',function(){

    var category_id = $('#filterCat').val();
    var subcategory_id = $('#filterSubCat').val();
    var sellerID = $('#sellerID').val();
    
    $.ajax({
      url:"<?= base_url() ?>page/search_shops",
      method:"post",
      data:{category_id:category_id ,sellerID:sellerID , subcategory_id:subcategory_id},
      success:function(data){
        $('#detail').html(data);
        document.getElementById('shopProducts').style.display = "none";
        document.getElementById('pagination').style.display = "none";
      }
    });
  });

  $(document).on('change', '#filterCat',function(){

    var category_id = $('#filterCat').val();

    $.ajax({
      url:"<?php echo base_url() ?>page/get_subcategory",
      method:"post",
      data:{category_id : category_id},
      success:function(data){
        $('#showSubs').html(data);
        document.getElementById('disSubCat').style.display = "none";
      }
    });
  });
</script>

