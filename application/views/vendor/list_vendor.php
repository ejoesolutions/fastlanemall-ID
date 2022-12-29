<div class="portlet box blue">
  <div class="portlet-title">
    <div class="caption">
      <?php echo $title; ?>
    </div>
  </div>
  <div class="portlet-body">
    <table class="table table-bordered" id="sample_1">
      <thead>
        <th width="10">NO.</th>
        <th class="text-center">LOGO</th>
        <th class="text-center">VENDOR</th>
        <th class="text-center">CONTACT</th>
        <th class="text-center">EMAIL</th>
        <th class="text-center">ADDRESS</th>
        <th class="text-center">STATUS</th>
        <th class="text-center">#</th>
      </thead>
      <tbody>
        <?php
        $i=1;
        if(!empty($vendor)){
          foreach ($vendor as $v){?>
              <tr>
                <td><?php echo $i++;?></td>
                <td class="text-center">
                  <?php
                  if ($v['vendor_logo']) {

                    $image_properties = array(
                      'src'   => base_url().'logo_vendor/'.$v['vendor_logo'],
                      'alt'   => $v['vendor_name'],
                      'class' => 'img-thumbnail',
                      'width' => '50',
                      'height'=> '50',
                      'title' => $v['vendor_name'],
                    );
                    echo img($image_properties);

                  } else {

                    $image_properties = array(
                      'src'   => 'https://dummyimage.com/75x75/d6c7d6/9b9dad.jpg&text=No+Image',
                      'alt'   => 'No image',
                      'class' => 'img-thumbnail',
                      'width' => '50',
                      'height'=> '50',
                      'title' => 'No image',
                    );
                    echo img($image_properties);
                  }

                  ?>
                </td>
                <td><?php echo $v['vendor_name'] ?></td>
                <td><?php echo $v['vendor_phone'] ?></td>
                <td><?php echo $v['vendor_email'] ?></td>
                <td><?php echo $v['vendor_address'] ?></td>
                <td class="text-center">
                  <?php
                    if($v['vendor_status']==1){
                      echo "Active";
                    }else{
                      echo "Deactive";
                    }
                   ?>
                </td>
                <td class="text-center">
                  <?php //echo anchor('user/edit/'.$v['vendor_id'], 'View') ;?>
                  <a id="<?php echo $v['vendor_id']; ?>" class="upd_vendor"><span class="fa fa-edit">Edit</span></a>
              </td>

            </tr>

        <?php
      }
        }
        ?>
    </tbody>
  </table>
  <a class="" data-toggle="modal" href="#addVendor"><button class="btn btn-primary">+ Vendor</button></a>

  <div class="modal fade bs-modal-xl" id="addVendor" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="modal-title">Add Vendor</h4>
        </div>
        <div class="modal-body">
          <?php echo form_open_multipart('catalog/store_vendor',array('class'=>'form-horizontal')) ?>
          <div class="form-group">
            <div class="col-md-4">
                <label class="control-label">Vendor's Name</label>
            </div>
            <div class="col-md-8">
                <input type="text" class="form-control" name="vendor_name" required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-4">
                <label class="control-label">Phone</label>
            </div>
            <div class="col-md-8">
                <input type="text" class="form-control" name="vendor_phone" required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-4">
                <label class="control-label">Email</label>
            </div>
            <div class="col-md-8">
                <input type="email" class="form-control" name="vendor_email" required>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-4">
                <label class="control-label">Address</label>
            </div>
            <div class="col-md-8">
                <textarea class="form-control" name="vendor_address" required></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-4">
                <label class="control-label">Logo Vendor</label>
            </div>
            <div class="col-md-4">
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
                      <input type="file" name="vendor_logo">
                    </span>
                    <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> <?php echo lang('form_button_image_delete') ?> </a>
                  </div>
                  <div class="clearfix margin-top-10">
                    <small><span class="text-danger">NOTE!</span><br>Image size : 150px x 70px</small>
                    <?php if (isset($error_image)): ?>
                      <?php echo '<p><small class="text-danger">'. $error_image .'</small></p>'; ?>
                    <?php endif; ?>
                  </div>
              </div>
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Save</button>
        </div>
        <?php echo form_close() ?>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <div class="modal fade bs-modal-xl" id="editVendor" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="modal-title">Edit Vendor</h4>
        </div>
        <?php echo form_open_multipart('catalog/upd_vendor', array('class'=>'form-horizontal')); ?>
        <div class="modal-body" id="detail_vendor">

        </div>
        <div class="modal-footer">

          <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Save</button>
        </div>
        <?php echo form_close() ?>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
</div>
</div>
