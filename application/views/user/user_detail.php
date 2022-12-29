<div class="portlet box blue">
  <div class="portlet-title">
    <div class="caption">
      <?php echo $title ?>
    </div>
  </div>
  <div class="portlet-body">
    <div class="row">
      <div class="col-md-12 form-horizontal">
        <?php if($user_info['user_group']=='2'): ?>
        <div class="form-group">
          <label class="control-label col-md-3">WAKALAH</label>
          <div class="col-md-9">
            <p class="form-control-static"><?php echo $user_info['wakalah_name'] ?></p>
          </div>
        </div>
      <?php endif; ?>
        <div class="form-group">
          <label class="control-label col-md-3">NAMA PENUH</label>
          <div class="col-md-9">
            <p class="form-control-static"><?php echo $user_info['full_name'] ?></p>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3">NO K/P</label>
          <div class="col-md-9">
            <p class="form-control-static"><?php echo $user_info['nic_no'] ?></p>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3">EMEL</label>
          <div class="col-md-9">
            <p class="form-control-static"><?php echo $user_info['email'] ?></p>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3">NO. TELEFON</label>
          <div class="col-md-9">
            <p class="form-control-static"><?php echo $user_info['phone'] ?></p>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3">ALAMAT</label>
          <div class="col-md-9">
            <p class="form-control-static"><?php echo nl2br($user_info['address']) ?></p>
          </div>
      </div>
    </div>
        <div class="form-group">
          <label class="control-label col-md-3">&nbsp;</label>

          <div class="col-md-9">
            <?php
            $f=0;
            foreach ($currentGroups as $key) {
              if($key->name=='verify_wakalah'){
                $f=1;
              }
            }
            if($f==0){
              echo anchor('user/edit/'.$user_info['id'], 'Kemasikini', array('class'=>'btn btn-success'));
            }else{
              $m="Anda tiada kebenaran untuk mengemaskini data ini.";
                echo "<script type='text/javascript'>alert('$m');</script>";
            }

            ?>
            <!-- <?php echo anchor('user/edit/'.$user_info['id'], 'Kemasikini', array('class'=>'btn btn-success'));?> -->
            <!-- <?php echo anchor('user/edit/'.$user_info['id'], 'Hapus', array('class'=>'btn btn-danger'));?> -->
          </div>
        </div>


  </div>
</div>
