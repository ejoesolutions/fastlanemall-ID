<div class="portlet box blue">
  <div class="portlet-title">
    <div class="caption">
      <?php echo $title; ?>
    </div>
  </div>
  <div class="portlet-body">
    <table class="table table-bordered" id="sample_1">
      <thead>
        <tr class="uppercase">
          <th class="text-center" nowrap >NO</th>
          <th nowrap class="text-center">SUBCATEGORY NAME</th>
          <th class="text-center">#</th>
        </tr>
      </thead>
      <tbody>
        <?php
          if(!empty($subcategory)){
            $n=1;
            foreach ($subcategory as $c) {
              ?>
              <tr>
                <td class="text-center"><?php echo $n++; ?></td>
                <td class="text-center"><?php echo $c['category_type']; ?></td>
                <td class="text-center">
                  <a id="<?php echo $c['category_id']; ?>" class="upd_subcategory"><i class="far fa-edit fa-lg"></i></a>
                </td>
              </tr>
              <?php
            }
          }
        ?>
      </tbody>
    </table>
    <a class="" data-toggle="modal" href="#addSubcategory"><button class="btn btn-primary">+ Subcategory</button></a>

    <div class="modal fade bs-modal-xl" id="addSubcategory" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Add Subcategory</h4>
          </div>
          <div class="modal-body">
            <?php echo form_open('catalog/store_subcategory/'.$this->uri->segment(3),array('class'=>'form-horizontal','id'=>'form_category')) ?>
            <div class="form-group">
              <div class="col-md-4">
                <label class="control-label">Subcategory Name</label>
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

    <div class="modal fade bs-modal-xl" id="editSubcategory" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Edit Subcategory</h4>
          </div>
          <?php echo form_open('catalog/upd_subcategory/'.$this->uri->segment(3), array('class'=>'form-horizontal')); ?>
          <div class="modal-body" id="detail_subcategory">

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
