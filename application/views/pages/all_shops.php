<div class="row">
  <!-- section title -->
  <div class="col-md-12">
    <div class="section-title">
      <h3 class="title">All Shops</h3>
      <div class="pull-right">
        <input type="text" id="searchForm" class="form-control" placeholder="Search Shop">
      </div>
    </div>
  </div>
    <!-- section title -->
    <div id="showFirst">
      <?php
      if(!empty($shops)){
        foreach ($shops as $row) { ?>
          <div class="col-md-1 col-sm-2 col-xs-3" style="border-color:pink">
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
   </div>

   <div id="allShopList"></div>

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

<script>
    $(document).on('keyup', '#searchForm',function(){
      var search = $(this).val();

      console.log(search);

      $.ajax({
        url:"<?= base_url() ?>page/filter_shop",
        method:"post",
        data:{search:search},
        success:function(data){
          $('#allShopList').html(data);
          document.getElementById('showFirst').style.display = "none";
        }
      });
    });
</script>