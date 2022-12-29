<div class="portlet box blue">
  <div class="portlet-title">
    <div class="caption">
      <?php echo $title; ?>
    </div>
  </div>
  <div class="portlet-body form">
    <?php echo form_open_multipart('', array('class'=>'')); ?>
    <div class="form-body">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group margin-top-20">

            <div class="fileinput fileinput-new" data-provides="fileinput">
              <div class="fileinput-new thumbnail img-responsive">
                <!-- <img src="https://www.placehold.it/400x400/EFEFEF/AAAAAA&amp;text=<?php echo lang('form_button_image_non') ?>" alt="" /> -->
                <img src="https://via.placeholder.com/500" alt="" />
              </div>
              <div class="fileinput-preview fileinput-exists thumbnail img-responsive"></div>
              <br>
              <div>
                <span class="btn default btn-file">
                  <span class="fileinput-new"> <i class="glyphicon glyphicon-camera"></i> <?php echo lang('form_button_image') ?> </span>
                  <span class="fileinput-exists"> <?php echo lang('form_button_image_change') ?> </span>
                  <input type="file" name="userfile" id="userfile">
                </span>
                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> <?php echo lang('form_button_image_delete') ?> </a>
              </div>
              <div class="clearfix margin-top-10">
                <small><span class="text-danger">NOTE!</span> <?php echo lang('form_button_upload_note') ?> | Size < 250KB</small>
                <?php if (isset($error_image)): ?>
                  <?php echo '<p><small class="text-danger">'. $error_image .'</small></p>'; ?>
                <?php endif; ?>
              </div>
            </div>

          </div>
        </div>

        <div class="col-md-8">

          <?php if($user_profile['user_group']==0 || $user_profile['user_group']==1 || $user_profile['user_group']==3){ ?>
            <div class="form-group margin-top-20">
              <label class="control-label">SELLER</label>
              <?php echo form_dropdown('seller_id', $seller, set_value('seller_id'), array('class'=>'form-control','id'=>'seller_id','required'=>'required')) ?>
            </div>
          <?php } ?>
          <input type="hidden" id="getSellerId" value="<?= $shop['seller_id'] ?>">

          <div class="form-group margin-top-20">
            <label class="control-label">PRODUCT NAME</label>
            <?php echo form_input($product_name);?>
            <?php echo form_error('product_name', '<p class="text-danger">', '</p>'); ?>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label">PRODUCT CODE</label>
                <?php echo form_input($item_code);?>
                <?php echo form_error('item_code', '<p class="text-danger">', '</p>'); ?>
                <!-- <small class="text-danger">(Letak '-' sekiranya tiada)</small> -->
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group uppercase">
                <label class="control-label">PRODUCT CATEGORY</label>
                <?php echo form_dropdown('category_id', $cType, set_value('category_id'), array('class'=>'form-control','id'=>'category_type','required'=>'required')) ?>
              </div>
            </div>
            <!-- subcategory ajax -->
            <div id="showSubCat"></div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label">WEIGHT (g)</label>
                <?php echo form_input($weight);?>
                <?php echo form_error('weight', '<p class="text-danger">', '</p>'); ?>
                <div id="ShowPostage"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label">SIZE</label>
                <?php echo form_input($size);?>
                <?php echo form_error('size', '<p class="text-danger">', '</p>'); ?>
              </div>
            </div>
          </div>
          <div class="row">
            <div>
              <div id="showModal" class="col-md-4 <?php echo $shop['seller_id']!=1 ? 'hide' : '' ?>">
                <div class="form-group">
                  <label class="control-label">MODAL PRICE (Rp)</label>
                  <?php echo form_input($product_price);?>
                  <?php echo form_error('product_price', '<p class="text-danger">', '</p>'); ?>
                </div>
              </div>
              <div id="showSeller" class="col-md-4 <?php echo $shop['seller_id']!=1 ? 'hide' : '' ?>">
                <div class="form-group">
                  <label class="control-label">SELLER PRICE (Rp)</label>
                  <?php echo form_input($seller_price);?>
                  <?php echo form_error('seller_price', '<p class="text-danger">', '</p>'); ?>
                </div>
              </div>
              <div id="showSell" class="col-md-4">
                <div class="form-group">
                  <label class="control-label">SELL PRICE (Rp)</label>
                  <?php echo form_input($add_cost);?>
                  <?php echo form_error('add_cost', '<p class="text-danger">', '</p>'); ?>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="control-label">DESCRIPTION</label>
                <?php echo form_textarea($description);?>
                <?php echo form_error('description', '<p class="text-danger">', '</p>'); ?>
              </div>
            </div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="control-label">EVENTS</label><br>
                <div class="col-md-3">
                  <input type="checkbox" name="event_product[]" value="discount" id="myCheck" onclick="myFunction()"> Discount (%)
                    <div id="text" style="display:none">
                      <input type="text" id="discount" name="product_disc" onkeyup="calcDis()" class="form-control">
                      <s><span class="text-danger" id="showprice"></span></s>
                      <span id="showCalcDis"></span>
                    </div>
                </div>
                <div class="col-md-3">
                  <input type="checkbox" name="event_product[]" value="np"> New Product
                </div>
                <div class="col-md-3">
                  <input type="checkbox" name="event_product[]" value="tp"> Top Product
                </div>
                <div class="col-md-3">
                  <input type="checkbox" onclick="cflFunction()" id="cflCheck" name="event_product[]" value="cfl"> FLM Product
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
        <hr>
      <div class="row">
        <div class="col-md-9">
          &nbsp;
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <button type="submit" id="subButton" class="btn btn-primary btn-block">Submit</button>
          </div>
        </div>
      </div>

      <hr>

    </div>
    <?php echo form_close() ?>
  </div>

</div>
<script>

function myFunction() {
  var checkBox = document.getElementById("myCheck");
  var text = document.getElementById("text");
  if (checkBox.checked == true){
    text.style.display = "block";
  } else {
    text.style.display = "none";
  }
}

function cflFunction() {
  var checkBox = document.getElementById("cflCheck");
  if (checkBox.checked == true){
    document.getElementById('showModal').classList.remove('hide');
    document.getElementById('showSeller').classList.remove('hide');
  } else {
    document.getElementById('showModal').classList.add('hide');
    document.getElementById('showSeller').classList.add('hide');
  }
}

$("#seller_id").change(function () {

  const id = this.value;

  if (id != 1) {
    // document.querySelector('#showSell').classList.remove('hide');
    document.querySelector('#showModal').classList.add('hide');
    document.querySelector('#showSeller').classList.add('hide');
  }else {
    // document.querySelector('#showSell').classList.remove('hide');
    document.querySelector('#showSeller').classList.remove('hide');
    document.querySelector('#showModal').classList.remove('hide');
  }

});

$(document).ready(function(){

  $("#weight").keyup(function() {
    console.log($("#getSellerId").val());     
    $.ajax({
      type: "POST",
      url: "<?= base_url('seller/get_postage_weight') ?>", 
      data: {weight: $("#weight").val(),seller_id: $("#getSellerId").val()},
      dataType: "text",  
      cache:false,
      success: 
      function(data){
        $("#ShowPostage").html(data);
        // $("#show_form").text(data);
      }
    });// you have missed this bracket
    return false;
  });
});

$(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});

function calcDis() {
  
  const price = document.getElementById('add_cost').value;
  const discount = document.getElementById('discount').value;

  const total = price * ((100 - discount)/100);

  document.getElementById('showprice').innerHTML = 'Rp ' + price;
  document.getElementById('showCalcDis').innerHTML = 'Rp ' + RoundNum(total, 2);
}



</script>