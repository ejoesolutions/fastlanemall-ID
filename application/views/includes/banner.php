
  <?php
  if(!empty($banner)){
  foreach ($banner as $row){
    ?>
    <div class="banner banner-1">
      <img src="<?php echo base_url('banner/'.$row['file_name']) ?>" alt="">
      <div class="banner-caption text-center">
        <h1><?php echo $row['title'] ?></h1>
        <h3 class="white-color font-weak"><?php echo $row['description'] ?></h3>
        <!-- <button class="primary-btn">Shop Now</button> -->
      </div>
    </div>
    <?php
  }
}else{
  echo "<h1 align='center'>No Banner Available</h1>";
}
  ?>
