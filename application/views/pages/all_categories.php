<div class="row">
  <div class="col-md-12">
    <div class="section-title">
      <h3 class="">All Categories</h3>
    </div>
  </div>

  <?php
    if(!empty($categories)){
      foreach ($categories as $key) { ?>
        <div class="col-md-2 col-sm-4 col-xs-6">
          <div class="row">
            <a <?php if ($key['status']==1) { echo 'href="'.base_url('page/products/'.$key['category_id']).'"';} ?>>
                <div class="thumbnail2 <?= $key['status']==0 ? 'isDisabled' : '' ?>" style="margin-bottom:0;padding:0;border-radius:0;">
                <div class='center' style="height: 200px;">
                <?php if ($key['category_logo']) { ?>
                  <img src="<?= base_url('logo/'.$key['category_logo']) ?>" style="height: 100%; width: 100%; object-fit: contain">
                <?php }else { ?>
                  <img src="<?= base_url().'logo_vendor/DummyShop.png' ?>" style="height: 100%; width: 100%; object-fit: contain">
                <?php } ?>
                </div>
                <div class="caption">
                  <h6 class="text-center"><?php echo $key['category_type'] ?></h6>
                </div>
              </div>
            </a>
          </div>
        </div>

        <?php
      }

    }else{
      echo "<p class='text-center'>No Shops yet</p>";
    }
  ?>

</div>
<!-- <ul class="pagination"> -->
  <?php
    //$total_records = count($products);
    // $limit =36;
    // $total_records = 0;
    // $pn=1;
    // if(!empty($shops)){
    //   foreach ($shops as $key) {
    //       $total_records++;
    //   }
    // }
    // // Number of pages required.
    // $total_pages = ceil($total_records / $limit);
    // $pagLink = "";
    // for ($i=1; $i<=$total_pages; $i++) {
    //   if ($i==$pn) {
    //       $pagLink .= "<li class='active'><a href='?page=".$i."'>".$i."</a></li>";
    //   }
    //   else  {
    //       $pagLink .= "<li><a href='?page=".$i."'>".$i."</a></li>";
    //   }
    // };
    // echo $pagLink;
  ?>
<!-- </ul> -->
