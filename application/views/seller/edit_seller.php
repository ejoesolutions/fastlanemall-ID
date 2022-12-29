<div class="portlet box blue">
  <div class="portlet-title">
    <div class="caption">
      <?php echo $title; ?>
    </div>
  </div>
  <div class="portlet-body form">
    <?php echo form_open_multipart('seller/update_seller', array('class'=>'')); ?>
    <div class="form-body">
      <div class="row">
        <center>
        <div class="col-md-3">
          <div class="form-group margin-top-20">

            <div class="fileinput fileinput-new" data-provides="fileinput">
              <div class="fileinput-new thumbnail">
                <div class="center">
                <?php
                  if ($seller['shop_image'] != '') {

                    $image_properties = array(
                      'src'   => base_url().'logo_vendor/'.$seller['shop_image'],
                      'alt'   => $seller['shop_name'],
                      'style' => 'height: 100%; width: 100%; object-fit: contain',
                      'title' => $seller['shop_name'],
                    );

                  } else {

                    $image_properties = array(
                      'src'   => base_url().'logo_vendor/DummyShop.png',
                      'alt'   => $seller['shop_name'],
                      'style' => 'height: 100%; width: 100%; object-fit: contain',
                      'title' => $seller['shop_name'],
                    );
                  }

                  echo img($image_properties);
                  ?>
                </div>
              </div>
              <div class="fileinput-preview fileinput-exists thumbnail" stlye="height: 100%; width: 300px; object-fit: contain"></div>
              <br>
              <div>
                <?php if($user_profile['user_group']==2){ ?>
                  <span class="btn default btn-file">
                    <span class="fileinput-new"> <i class="glyphicon glyphicon-camera"></i> <?php echo lang('form_button_image') ?> </span>
                    <span class="fileinput-exists"> <?php echo lang('form_button_image_change') ?> </span>
                    <input type="file" name="shop_image">
                  </span><?php
                } ?>
                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> <?php echo lang('form_button_image_delete') ?> </a>
              </div>
              <div class="clearfix margin-top-10">
                <small><span class="text-danger">NOTE!</span> <?php echo lang('form_button_upload_note') ?></small>
                <?php if (isset($error_image)): ?>
                  <?php echo '<p><small class="text-danger">'. $error_image .'</small></p>'; ?>
                <?php endif; ?>
              </div>
            </div>

          </div>
        </div>
        </center>
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="control-label">STORE NAME</label>
                  <input type="text" name="shop_name" value="<?php echo $seller['shop_name'] ?>" class="form-control" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label">STORE URL <span class="text-danger">*</span><small>(WITHOUT SPACE)</small></label>
                <div class="input-group">
                  <span class="input-group-addon"><?= base_url('') ?></span>
                  <input type="text" name="shop_url" value="<?php echo $seller['shop_url'] ?>" class="form-control" onkeypress="return event.charCode != 32" required>
                </div>
                <?php echo $this->session->flashdata('upload'); ?>
                <input type="hidden" name="shop_url_old" value="<?php echo $seller['shop_url'] ?>">
                <!-- <span class="text-primary" >*Example : MyShop</span> -->
              </div>
              
            </div>

            <div class="col-md-6">
              <div class="form-group uppercase">
                <label class="control-label">SELLER NAME</label>
                <input type="text" name="full_name" value="<?php echo $seller['full_name'] ?>" class="form-control">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="control-label">EMAIL</label>
                <input type="email" name="email" value="<?php echo $seller['email'] ?>" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group uppercase">
                <label class="control-label">PHONE</label>
                <input type="text" name="phone" value="<?php echo $seller['phone'] ?>" class="form-control">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group uppercase">
                <label class="control-label">TYPE</label>
                <input type="text" name="seller_type" value="<?php echo $seller['seller_type'] ?>" class="form-control" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group uppercase">
                <label class="control-label">CREATED ON</label>
                <input type="text" name="created_seller" value="<?php echo date('d/m/Y H:i:s',strtotime($seller['seller_created'])) ?>" class="form-control" readonly>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="control-label">ADDRESS</label>
                <input type="text" name="shop_address" value="<?php echo $seller['shop_address'] ?>" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group uppercase">
                <label class="control-label">POSTCODE</label>
                <input type="text" id="textbox" name="shop_postcode" value="<?= $seller['shop_postcode'] ?>" class="form-control">
              </div>
            </div>
            <!-- ajax show city -->
            <div id="show_city"></div>
          </div>
          <hr>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group uppercase">
                <label class="control-label">BANK NAME</label>
                <?php if($user_profile['user_group']==2){ ?>
                  <input type="text" name="seller_bank" value="<?php echo $seller['seller_bank'] ?>" class="form-control" required>
                <?php }else{ ?>
                  <input type="text" name="seller_bank" value="<?php echo $seller['seller_bank'] ?>" class="form-control" required>
                <?php } ?>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group uppercase">
                <label class="control-label">ACCOUNT NO</label>
                <?php 
                if($user_profile['user_group']==2){
                  ?><input type="text" name="seller_account" value="<?php echo base64_decode($seller['seller_account']) ?>" class="form-control" required><?php
                }else{
                  ?><input type="text" name="seller_account" value="<?php echo base64_decode($seller['seller_account']) ?>" class="form-control" required><?php
                }
                ?>
              </div>
            </div>
            <?php if($user_profile['user_group']==2){ ?>
              <div class="col-md-12">
                <span class="text-danger">**Please fill the Bank Name & Account No. to receive the payment's order.</span>
              </div>
              <?php } ?>
          </div><hr>
          <?php if($user_profile['user_group']!=2){ ?>
            <div class="row">
              <div class="col-md-4">
                <div class="form-group uppercase">
                  <label class="control-label">STATUS</label><br>
                  <?php
                    if($seller['seller_status']==1){
                      ?><input type="radio" name="seller_status" value="1" checked> Active<?php
                      ?><br><input type="radio" name="seller_status" value="0"> Deactive<?php
                    }else{
                      ?><input type="radio" name="seller_status" value="1"> Active<?php
                      ?><br><input type="radio" name="seller_status" value="0"checked> Deactive<?php
                    }
                   ?>
                 </div>
              </div>
            </div>
            <?php
          } ?>
        </div>
      </div>

      <div class="row">
        <div class="col-md-9">
          &nbsp;
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <?php echo form_hidden('temp_logo',$seller['shop_image']); ?>
            <?php echo form_hidden('seller_id',$seller['seller_id']); ?>
            <?php echo form_hidden('user_id',$seller['user_id']); ?>
            <?php echo form_submit('submit', lang('form_button_submit'), array('class'=>'btn btn-primary btn-block')) ?>
          </div>
        </div>
      </div>
    </div>
    <?php echo form_close() ?>
  </div>

</div>

<script>
  $('#shop_state').val(<?= $seller['state_id'] ?>).trigger("change");
</script>

<script type="text/javascript">
$(document).ready(function(){   

  $("#textbox").keyup(function() {       
    $.ajax({
      type: "POST",
      url: "<?= base_url('seller/get_city') ?>", 
      data: {textbox: $("#textbox").val()},
      dataType: "text",  
      cache:false,
      success: 
      function(data){
        $("#show_city").html(data);
        // $("#show_form").text(data);
      }
    });// you have missed this bracket
    return false;
  });

  $.ajax({
    type: "POST",
    url: "<?= base_url('seller/get_city') ?>", 
    data: {textbox: $("#textbox").val()},
    dataType: "text",  
    cache:false,
    success: 
    function(data){
      $("#show_city").html(data);
      // $("#show_form").text(data);
    }
  });// you have missed this bracket
  return false;
});
</script>