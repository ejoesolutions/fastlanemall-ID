 <div class="portlet box blue">
  <div class="portlet-title">
    <div class="caption">
      <?= $title; ?>
    </div>
  </div>
  <div class="portlet-body">
    <table class="table table-bordered" id="sample_1">
      <thead>
        <tr class="uppercase">
          <th nowrap >NO</th>
          <th nowrap class="text-center">MIN WEIGHT (g)</th>
          <th nowrap class="text-center">MAX WEIGHT (g)</th>
          <th nowrap class="text-center">SHIPPING COST (<?= $currency['show_decimal'] ?>)</th>
          <th nowrap class="text-center">AREA</th>
          <th class="text-center">#</th>
        </tr>
      </thead>
      <tbody>
        <?php
          if(!empty($shipcost)){
            $n=1;
            foreach ($shipcost as $c) { ?>
              <tr>
                <td><?= $n++; ?></td>
                <td class="text-center"><?= number_format($c['weightInitial_set'],3); ?></td>
                <td class="text-center"><?= number_format($c['weightFinal_set'],3); ?></td>
                <td class="text-center"><?= ($currency['show_decimal']==1 ? number_format($c['shipcost_set'],2, '.', $currency['separate']) : substr(number_format($c['shipcost_set'],2, '.', $currency['separate']), 0 ,-3)); ?></td>
                <td class="text-center">
                  <?php
                    if($c['area']==1){
                      echo 'Area 1';
                    }else{
                      echo 'Area 2';
                    }
                  ?>
                </td>
                <td class="text-center">
                  <a id="<?= $c['weightcost_id']; ?>" class="view_data"><span class="fa fa-edit">Edit</span></a> <br>
                  <a href="<?= base_url('admin/delete_weightcost/'.$c['weightcost_id'].'/'.$c['seller_id']) ?>" class="upd_category"><span class="fa fa-trash">Delete</span></a>
                </td>
              </tr>
              <?php
            }
          }
        ?>
      </tbody>
    </table>
    <a class="" data-toggle="modal" href="#addShipcost"><button class="btn btn-primary">+ Shipping Cost</button></a>

    <div class="modal fade bs-modal-xl" id="addShipcost" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Add Shipping Cost</h4>
          </div>
          <div class="modal-body">
            <?= form_open('admin/store_weightcost/1',array('class'=>'form-horizontal','id'=>'form_category')) ?>
            <div class="form-group">
              <div class="col-md-4">
                <label class="control-label">Min Weight (g)</label>
              </div>
              <div class="col-md-8">
                <input type="text" class="form-control" name="weightInitial_set" required>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-4">
                <label class="control-label">Max Weight (g)</label>
              </div>
              <div class="col-md-8">
                <input type="text" class="form-control" name="weightFinal_set" required>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-4">
                <label class="control-label">Shipping Cost (Rp)</label>
              </div>
              <div class="col-md-8">
                <input type="text" class="form-control" name="shipcost_set" required>
              </div>
            </div>
            <div class="form-group">
              <div class="col-md-4">
                <label class="control-label">Area</label>
              </div>
              <div class="col-md-8">
                <?= form_dropdown('area',array('1'=>'Area 1','2'=>'Area 2'),set_value('area'),array('class'=>'form-control','required'=>'required')) ?>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <?php if(!empty($shipcost)){
              echo form_hidden('seller_id',$c['seller_id']);
            }else{
              echo form_hidden('seller_id',$this->uri->segment(3));
            } ?>
            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-success" value="Save">
          </div>
          <?= form_close() ?>
        </div>
      </div>
    </div>

    <div class="modal fade bs-modal-xl" id="editWeight" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title">Edit Shipping Cost</h4>
          </div>
          <?= form_open('admin/update_weightcost/1', array('class'=>'form-horizontal')); ?>
          <div class="modal-body" id="detail">

          </div>
          <div class="modal-footer">

            <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Save</button>
          </div>
          <?= form_close() ?>
        </div>
      </div>
    </div>

  </div>
</div>
