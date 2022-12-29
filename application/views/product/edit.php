<div class="portlet box blue">
  <div class="portlet-title">
    <div class="caption">
      <?php echo $title; ?>
    </div>
  </div>
  <div class="portlet-body form">
    <?php echo form_open_multipart('catalog/store_product_update', array('class'=>'')); ?>
    <input type="hidden" name="product_id" id="product_id" value="<?php echo $product['product_id']; ?>">
    <div class="form-body">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group margin-top-20">

            <div class="fileinput fileinput-new" data-provides="fileinput">
              <div class="fileinput-new thumbnail img-responsive">
                <?php
                if ($product['image_file'] != '') {

                  $image_properties = array(
                    'src'   => base_url().'images/'.$product['image_file'],
                    'alt'   => $product['product_name'],
                    'class' => 'img-responsive margin-top-30 ',
                    'title' => $product['product_name'],
                  );

                } else {

                  $image_properties = array(
                    // 'src'   => 'https://www.placehold.it/500x500/EFEFEF/AAAAAA&amp;text=<?php echo lang("form_button_image_non")
                    'src'   => 'https://via.placeholder.com/500',
                    'alt'   => $product['product_name'],
                    'class' => 'img-responsive margin-top-30 ',
                    'title' => $product['product_name'],
                  );
                }

                echo img($image_properties); ?>
              </div>
              <div class="fileinput-preview fileinput-exists thumbnail img-responsive"></div>
              <br>
              <div>
                <span class="btn default btn-file">
                  <span class="fileinput-new"> <i class="glyphicon glyphicon-camera"></i> <?php echo lang('form_button_image') ?> </span>
                  <span class="fileinput-exists"> <?php echo lang('form_button_image_change') ?> </span>
                  <input type="file" name="userfile">
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
                <?php echo form_dropdown('seller_id',$seller,$product['seller_id'],array('class'=>'form-control','required'=>'required','id'=>'seller_id')); ?>
              </div>
            <?php
          } ?>
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
                <?php echo form_error('product_code', '<p class="text-danger">', '</p>'); ?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group uppercase">
                <label class="control-label">PRODUCT CATEGORY</label>
                <select name="category_id" id="category_type" class="form-control">
                  <?php foreach ($category as $v) {
                    if($product['category_id']==$v['category_id']){ ?>
                      <option value="<?php echo $v['category_id'] ?>" selected><?php echo $v['category_type'] ?></option>
                      <?php
                    }else{ ?>
                      <option value="<?php echo $v['category_id'] ?>"><?php echo $v['category_type'] ?></option>
                      <?php
                    }
                  } ?>
                </select>
              </div>
            </div>

            <div id="SubCat" class="col-md-12">
              <div class="form-group">
                <label class="control-label">PRODUCT SUBCATEGORY</label>
                <select name="subcategory_id" id="" class="form-control">
                  <?php foreach ($subcategory as $v) {
                    if($product['subcategory_id']==$v['category_id']){ ?>
                      <option value="<?php echo $v['category_id'] ?>" selected><?php echo $v['category_type'] ?></option>
                      <?php
                    }else{ ?>
                      <option value="<?php echo $v['category_id'] ?>"><?php echo $v['category_type'] ?></option>
                      <?php
                    }
                  } ?>
                </select>
              </div>
            </div>
            <!-- subcategory ajax -->
            <div id="showSubCat"></div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <hr>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="control-label">WEIGHT (g)</label>
                    <?php echo form_input($weight);?>
                    <?php echo form_error('weight', '<p class="text-danger">', '</p>'); ?>
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
                <div id="showModal" class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">SELLING PRICE (<?= $currency['tag'] ?>)</label>
                    <input type="text" class="form-control" name="product_price" value="<?= ($currency['show_decimal']==1 ? number_format($product['product_price'],2, '.', $currency['separate']) : substr(number_format($product['product_price'],2, '.', $currency['separate']), 0 ,-3)) ?>" <?= ($product['cfl'] == null && ($user_profile['user_group']==0 || $user_profile['user_group']==1)) ? '' : '' ?>>
                  </div>
                </div>
                <div id="showSeller" class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">BASE PRICE (<?= $currency['tag'] ?>)</label>
                    <input type="text" class="form-control" name="seller_price" value="<?= ($currency['show_decimal']==1 ? number_format($product['seller_price'],2, '.', $currency['separate']) : substr(number_format($product['seller_price'],2, '.', $currency['separate']), 0 ,-3)) ?>" <?= ($product['cfl'] == null && ($user_profile['user_group']==0 || $user_profile['user_group']==1)) ? '' : '' ?>>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label class="control-label">RETAIL PRICE (<?= $currency['tag'] ?>)</label>
                    <input type="text" class="form-control" id="add_cost" name="add_cost" value="<?= ($currency['show_decimal']==1 ? number_format($product['add_cost'],2, '.', $currency['separate']) : substr(number_format($product['add_cost'],2, '.', $currency['separate']), 0 ,-3)) ?>" <?= ($product['cfl'] == null && ($user_profile['user_group']==0 || $user_profile['user_group']==1)) ? '' : '' ?>>
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
                      <?php if($product['discount']!=null){ ?>
                        <input type="checkbox" name="event_product[]" value="discount" id="myCheck" onclick="myFunction()" checked> Discount (%)
                        <div id="text" style="display:show">
                          <input type="text" name="product_disc" class="form-control" id="discount" onkeyup="calcDis()" value="<?php echo $product['discount'] ?>">
                          <s><span class="text-danger" id="showprice"></span></s>
                          <span id="showCalcDis"></span>
                        </div>
                        <?php
                      }else{ ?>
                        <input type="checkbox" name="event_product[]" value="discount" id="myCheck" onclick="myFunction()"> Discount (%)
                        <div id="text" style="display:none">
                          <input type="text" name="product_disc" id="discount" onkeyup="calcDis()" class="form-control">
                          <s><span class="text-danger" id="showprice"></span></s>
                          <span id="showCalcDis"></span>
                        </div>
                        <?php
                      } ?>
                    </div>
                    <div class="col-md-3">
                      <?php if($product['new_product']!=null){ ?>
                        <input type="checkbox" name="event_product[]" value="np" checked> New Product
                        <?php
                      }else{ ?>
                        <input type="checkbox" name="event_product[]" value="np"> New Product
                        <?php
                      }
                      ?>
                    </div>
                    <div class="col-md-3">
                      <?php if($product['top_product']!=null){ ?>
                        <input type="checkbox" name="event_product[]" value="tp" checked> Top Product
                        <?php
                      }else{ ?>
                        <input type="checkbox" name="event_product[]" value="tp"> Top Product
                        <?php
                      } ?>
                    </div>
                    
                    <?php if ($product['cfl_product']!='approved') { ?>
                      <div class="col-md-3">
                        <?php if($cfl_product || $product['cfl_product']=='yes'){ ?>    
                          <input type="checkbox" name="event_product[]" onclick="cflFunction()" id="cflCheck" value="cfl" checked> FLM Product
                        <?php }else{ ?>
                          <input type="checkbox" name="event_product[]" onclick="cflFunction()" id="cflCheck" value="cfl"> FLM Product
                        <?php } ?>
                      </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <input type="hidden" name='image_id' value='<?= $product['image_id'];?>'>
        <input type="hidden" name='temp_image' value='<?= $product['image_file'];?>'>
        <input type="hidden" id="cflPro" value='<?= $cfl_product ?>'>
        <hr>
        <div class="col-md-9">
          <?php if ($product['cfl_product']=='yes' && ($user_profile['user_group']==0 || $user_profile['user_group']==1 || $user_profile['user_group']==3)) { ?>
            <a href="#" onclick="location.href = '<?= base_url('catalog/approve_product/'.$product['product_id'].'/'.$product['seller_id']) ?>';" class="btn btn-warning btn-block pull-right">Approve</a>
          <?php } ?>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <?= form_submit('submit', 'Save', array('class'=>'btn btn-primary btn-block')) ?>
          </div>
        </div>

        <?php if ($product['stock'] == NULL ): ?>
          <div class="col-md-2">
            <div class="form-group">
              <?= anchor('catalog/product_delete/'.$product['product_id'], 'Delete', array('class'=>'btn btn-block btn-danger')) ?>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </div>
    <?= form_close() ?>
  </div>
</div>

<script>
  
  $(document).ready(function() {
    const check = document.getElementById('cflPro').value;
    
    if (check == '') {
      document.getElementById('showModal').style.display = "none";
      document.getElementById('showSeller').style.display = "none";
    }else {
      document.getElementById('showModal').style.display = "block";
      document.getElementById('showSeller').style.display = "block";
    }
  });

  $(document).ready(function() {
    const price = document.getElementById('add_cost').value;
    const discount = document.getElementById('discount').value;

    const total = price * ((100 - discount)/100);

    document.getElementById('showprice').innerHTML = 'Rp ' + price;
    document.getElementById('showCalcDis').innerHTML = 'Rp ' + RoundNum(total, 2);
  });

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
      console.log('check');
      document.getElementById('showModal').style.display = "block";
      document.getElementById('showSeller').style.display = "block";
    } else {
      document.getElementById('showModal').style.display = "none";
      document.getElementById('showSeller').style.display = "none";
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

  function calcDis() {
  
    const price = document.getElementById('add_cost').value;
    const discount = document.getElementById('discount').value;

    const total = price * ((100 - discount)/100);

    document.getElementById('showprice').innerHTML = 'Rp ' + price;
    document.getElementById('showCalcDis').innerHTML = 'Rp ' + RoundNum(total, 2);
  }

</script>
