<?php

if(!empty($shops)){
  foreach ($shops as $row) { ?>
    <div class="col-md-1 col-sm-2 col-xs-3">
      <div class="row">
        <!-- <div class="col-sm-6 col-md-4"> -->
        <a href="<?php echo base_url('') ?><?php echo $row['shop_url']; ?>">
          <div class="thumbnail2">
            <div class='center'>
            <?php if ($row['shop_image']) { ?>
              <img src="<?= base_url().'logo_vendor/'.$row['shop_image'] ?>" style="height: 100%; width: 100%; object-fit: contain">
            <?php }else { ?>
              <img src="<?= base_url().'logo_vendor/DummyShop.png' ?>" style="height: 100%; width: 100%; object-fit: contain">
            <?php } ?>
            </div>

            <div class="caption text-center" style="height:40px;display: flex;justify-content: center;align-items: center;">
              <span class="text-center" style="font-size:80%"><?php echo $row['shop_name'] ?></span>
            </div>
          </div>
        </a>
        <!-- </div> -->
      </div>
    </div>

    <?php
  }

}else{
    echo "<p class='text-center'>No Shops yet</p>";
}
?>