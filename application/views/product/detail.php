<div class="portlet box blue">
  <div class="portlet-title">
    <div class="caption">
      <?php echo $title;
       ?>
      <?php $gov_tax = '0.00'; ?>
    </div>
  </div>
  <style media="screen">
  .product .img-responsive {
    margin: 0 auto;
  }
  </style>
  <div class="portlet-body">
    <div class="row">
      <div class="col-md-2">&nbsp;</div>
      <div class="col-md-3">
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
            'src'   => 'https://dummyimage.com/500x500/f0daf0/27272b',
            'alt'   => $product['product_name'],
            'class' => 'img-responsive margin-top-30 ',
            'title' => $product['product_name'],
          );
        }

        echo img($image_properties);
        ?>
      </div>
      <div class="col-md-7">
        <div class="form-horizontal" role="form">

          <div class="form-body margin-top-20">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label class="control-label col-md-3"><strong>PRODUCT NAME : </strong></label>
                  <div class="col-md-8">
                    <p class="form-control-static"> <?php echo $product['product_name'] ?> </p>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label class="control-label col-md-3"><strong>SHOP NAME : </strong></label>
                  <div class="col-md-8">
                    <p class="form-control-static"> <?php echo $product['shop_name'] ?> </p>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label class="control-label col-md-3"><strong>TYPE : </strong></label>
                  <div class="col-md-8">
                    <p class="form-control-static">
                      <?php echo $product['category_type']; ?>
                    </p>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label class="control-label col-md-3"><strong>CODE : </strong></label>
                  <div class="col-md-8">
                    <p class="form-control-static"> <?php echo $product['item_code'] ?> </p>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label class="control-label col-md-3"><strong>WEIGHT : </strong></label>
                  <div class="col-md-8">
                    <p class="form-control-static">
                      <?php echo number_format($product['weight'],3).' g'; ?>
                    </p>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label class="control-label col-md-3"><strong>SIZE:</strong></label>
                  <div class="col-md-8">
                    <p class="form-control-static">
                      <?php echo $product['size']; ?>
                    </p>
                  </div>
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label class="control-label col-md-3">&nbsp;</label>
                  <div class="col-md-8">
                    <?php if ($this->uri->segment(2)=="product_detail"): ?>
                      <?php echo anchor('catalog/product_edit/'.$product['product_id'], '&nbsp;<i class="fa fa-edit"></i> Edit&nbsp;', array('class'=>'btn btn-primary')) ?>
                    <?php endif; ?>

                    <?php if ($product['stock'] == NULL): ?>
                      <?php echo anchor('catalog/product_delete/'.$product['product_id'], '<i class="fa fa-remove"></i> Delete', array('class'=>'btn btn-danger')) ?>
                    <?php endif; ?>

                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <table class="table table-bordered">
          <tr>
            <th>No</th>
            <th class="text-center">Addition Image</th>
            <th width="30%" class="text-center"><a class="" data-toggle="modal" href="#addImage"><button class="btn btn-primary">+ Image Product</button></a></th>
          </tr>
          <?php
          if(!empty($imej)){
            $j=1;
            foreach ($imej as $row2) {
              ?>
              <tr>
                <td><?php echo $j++; ?></td>
                <td class="text-center">
                  <?php
                  $image_properties = array(
                    'src'   => base_url().'images/'.$row2['image_add_file'],
                    'alt'   => $row2['image_add_file'],
                    'class' => 'img-thumbnail',
                    'width' => '100',
                    'height'=> '100',
                    'style'=>'border:0',
                    'title' => $row2['image_add_file'],
                  );
                  echo img($image_properties);
                   ?>
                </td>
                <td class="text-center"><?php echo anchor('catalog/del_other_image/'.$row2['image_add_id'].'/'.$row2['image_add_file'].'/'.$row2['product_id'], '<span class="fa fa-trash"> Delete</span>') ;?></td>
              </tr>
              <?php
            }
          }
           ?>
        </table>

        <div class="modal fade bs-modal-xl" id="addImage" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Add Image Product</h4>
              </div>
              <div class="modal-body">
                <?php echo form_open_multipart('catalog/store_other_image',array('class'=>'form-horizontal')) ?>
                <div class="form-group">
                  <div class="col-md-4">
                      <label class="control-label">Image Product</label>
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
                            <input type="file" name="imej_tambahan" required>
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
              </div>
              <div class="modal-footer">
                <?php echo form_hidden('product_id',$product['product_id']) ?>
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
  </div>
</div>

<div class="portlet box red">
  <div class="portlet-title">
    <div class="caption">
      Inventory
    </div>
  </div>
  <div class="portlet-body">
    <div class="row">
      <div class="col-md-8">
        <div class="form-body form-horizontal margin-top-20">
          <div class="row">

            <div class="col-md-8">
              <div class="form-group">
                <label class="control-label col-md-4"><strong>Current Stock :</strong></label>
                <div class="col-md-4">
                  <p class="form-control-static">
                    <?php if ($product['stock'] < '20') { ?>
                      <?php echo '<span class="text-danger">'.$product['stock'].'</span>' ?>
                    <?php } else { ?>
                      <?php echo '<span class="text-primary">'.$product['stock'].'</span>' ?>
                    <?php } ?>
                    <?php if ($product['stock'] == ''): ?>
                      <?php echo '<span class="text-danger">N/A</span>'; ?>
                    <?php endif; ?>
                  </p>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
