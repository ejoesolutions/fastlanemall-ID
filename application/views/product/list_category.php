<div class="portlet box blue">
  <div class="portlet-title">
    <div class="caption">
      <?php echo $title; ?>
    </div>
  </div>
  <div class="portlet-body">
    <table class="table table-bordered" id="sample_1">
      <thead>
        <tr>
          <th class="text-center" width="20px">NO</th>
          <th class="text-center">LOGO</th>
          <th class="text-center">PRODUCT TYPE</th>
          <th class="text-center" width="40px">STATUS</th>
          <th class="text-center">#</th>
        </tr>
      </thead>
      <tbody>
        <?php
          if(!empty($category)){
            $n=1;
            foreach ($category as $c) { ?>
              <tr>
                <td class="text-center"><?= $n++; ?></td>
                <td class="text-center">
                  <?php if ($c['category_logo']) { ?>
                    <img src="<?= base_url('logo/'.$c['category_logo']); ?>" alt="" style="width:150px;height:150px">
                  <?php }else { ?>
                    <img src="<?= base_url().'logo_vendor/DummyShop.png' ?>" alt="" style="width:150px;height:150px">
                  <?php } ?>
                </td>
                <td class="text-center"><?= $c['category_type']; ?></td>
                <td class="text-center"><?= $c['status']==1 ? '<span class="label label-success">Active</span>' : '<span class="label label-default">Not Active</span>' ?></td>
                <td class="text-center">
                  <a title="Edit Category" id="<?= $c['category_id']; ?>" class="upd_category"><i class="far fa-edit fa-lg"></i></a>
                  |
                  <a title="View Subcategory" href="<?= base_url('catalog/subcategory/'.$c['category_id']) ?>"> <i class="fas fa-list-ol fa-lg"></i></a>
                </td>
              </tr>
              <?php
            }
          }
        ?>
      </tbody>
    </table>
    <a class="" data-toggle="modal" href="#addCategory"><button class="btn btn-primary">+ Category</button></a>

    <div class="modal fade bs-modal-xl" id="addCategory" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Add Category</h4>
          </div>
          <div class="modal-body">
            <?php echo form_open('catalog/store_category',array('class'=>'form-horizontal','id'=>'form_category')) ?>
            <div class="form-group">
              <div class="col-md-4">
                <label class="control-label">Category Name</label>
              </div>
              <div class="col-md-8">
                <input type="text" class="form-control" name="category_type" id="category_type" required>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-success" value="Save">
          </div>
          <?php echo form_close() ?>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <div class="modal fade bs-modal-xl" id="editCategory" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Edit Category</h4>
          </div>
          <?php echo form_open_multipart('catalog/upd_category/'.$this->uri->segment(3), array('class'=>'form-horizontal')); ?>
          <div class="modal-body" id="detail_category">

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
