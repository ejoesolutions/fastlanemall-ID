<div class="portlet box blue">
  <div class="portlet-title">
    <div class="caption">
      <?php echo $title ?>
    </div>
  </div>
  <div class="portlet-body">
    <?php echo form_open('member/edit');?>
    <?php echo form_hidden('customer_id', $customers['customer_id']) ?>
    <div class="row">
      <div class="col-md-8">
        <div class="form-group">
            <tr>
              <td><label class="control-label col-md-4">NAMA</label></td>
              <td><input type="text" name="name" value="<?php echo $customers['name'] ?>" required class="form-control"></td>
            </tr>
            <tr>
              <td><label class="control-label col-md-4">NO KP</label></td>
              <td><input type="text" name="mykad" value="<?php echo $customers['mykad'] ?>" required class="form-control"></td>
            </tr>
            <tr>
              <td><label class="control-label col-md-4">NO TELEFON</label></td>
              <td><input type="text" name="phone" value="<?php echo $customers['phone'] ?>" required class="form-control"></td>
            </tr>
            <tr>
              <td><label class="control-label col-md-4">EMEL</label></td>
              <td><input type="email" name="email" value="<?php echo $customers['email'] ?>" required class="form-control"></td>
            </tr>
            <tr>
              <td><label class="control-label col-md-4">ALAMAT</label></td>
              <td><textarea name="address" required class="form-control"><?php echo $customers['address']; ?></textarea></td>
            </tr>

          </div>
      </div>
        <div class="form-group">
          <label class="control-label col-md-3">&nbsp;</label>
          <div class="col-md-9">
            <?php echo form_submit('submit', 'Kemaskini', array('class'=>'btn btn-success')); ?>
            <!-- <?php echo anchor('customer/detail/'.$customers['customer_id'], 'Kemasikini', array('class'=>'btn btn-success'));?> -->
            <!-- <?php echo anchor('customer/edit/'.$customer['customer_id'], 'Hapus', array('class'=>'btn btn-danger'));?>
          </div>
        </div>
      <?php //endforeach; ?>

  </div>
</div>
