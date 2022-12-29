<div class="portlet box blue">
  <div class="portlet-title">
    <div class="caption">
      <?php echo $title; ?>
    </div>
  </div>
  <div class="portlet-body form">
    <?php echo form_open('seller/update_seller', array('class'=>'')); ?>
    <div class="form-body">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group margin-top-20">

            <div class="fileinput fileinput-new" data-provides="fileinput">
              <div class="fileinput-new thumbnail img-responsive">
                <img src="https://www.placehold.it/400x400/EFEFEF/AAAAAA&amp;text=<?php echo lang('form_button_image_non') ?>" alt="" />
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
                <small><span class="text-danger">NOTE!</span> <?php echo lang('form_button_upload_note') ?></small>
                <?php if (isset($error_image)): ?>
                  <?php echo '<p><small class="text-danger">'. $error_image .'</small></p>'; ?>
                <?php endif; ?>
              </div>
            </div>

          </div>
        </div>
        <div class="col-md-8">
          <!-- <div class="form-group margin-top-20">
            <label class="control-label">SHOP NAME</label>
            <input type="text" name="shop_name" value="<?php echo $seller['shop_name'] ?>" class="form-control" readonly>
          </div> -->

          <!-- <div class="row"> -->
            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label">SHOP NAME</label>
                  <input type="text" name="shop_name" value="<?php echo $seller['shop_name'] ?>" class="form-control" readonly>

                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group uppercase">
                  <label class="control-label">SELLER NAME</label>
                  <input type="text" name="full_name" value="<?php echo $seller['full_name'] ?>" class="form-control" readonly>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label">EMAIL</label>
                  <input type="email" name="email" value="<?php echo $seller['email'] ?>" class="form-control" readonly>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group uppercase">
                  <label class="control-label">PHONE</label>
                  <input type="text" name="phone" value="<?php echo $seller['phone'] ?>" class="form-control" readonly>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-4">
                <div class="form-group uppercase">
                  <label class="control-label">TYPE</label>
                  <input type="text" name="seller_type" value="<?php echo $seller['seller_type'] ?>" class="form-control" readonly>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group uppercase">
                  <label class="control-label">CREATED ON</label>
                  <input type="text" name="created_seller" value="<?php echo date('d/m/Y H:i:s',strtotime($seller['seller_created'])) ?>" class="form-control" readonly>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-8">
                <div class="form-group uppercase">
                  <label class="control-label">ADDRESS</label>
                  <textarea name="address" class="form-control" readonly><?php echo $seller['address'] ?></textarea>
                </div>
              </div>
            </div>

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


            <div class="row">
              <div class="col-md-4">
                <div class="form-group uppercase">
                  <?php echo form_hidden('seller_id',$seller['seller_id']) ?>
                  <?php echo form_submit('submit', 'Update', array('class'=>'btn btn-primary btn-block')) ?>
                </div>
              </div>
            </div>
          <!-- </div> -->

        </div>

      </div>

    </div>
    <?php echo form_close() ?>
  </div>

</div>
