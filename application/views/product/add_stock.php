<div class="portlet box blue">
  <div class="portlet-title">
    <div class="caption">
      <?php echo $title ?>
    </div>
  </div>
  <div class="portlet-body">
    <div class="row">
      <div class="col-md-12 margin-top-20">
        <?php echo form_open('catalog/store_inventory', array('class'=>'form-horizontal')) ?>
        <?php
        if($user_profile['user_group']==0 || $user_profile['user_group']==1){
          ?>
          <div class="form-group">
          <label class="control-label col-md-4">SELLER</label>
          <div class="col-md-6">
            <?php echo form_dropdown('seller_id', $seller, set_value('seller_id'), array('class'=>'form-control','required'=>'required','id'=>'seller_id')) ?>
          </div>
        </div>
        <div id="sub_form_vendor">
          <?php if (set_value('seller_id')): ?>
            <?php $this->load->view('product/ajax_seller_product') ?>
          <?php endif; ?>
        </div>
          <?php
        }else{
          ?>
          <div class="form-group">
            <label class="control-label col-md-4">PRODUCT</label>
            <div class="col-md-6">
              <?php echo form_dropdown('product_id', $list_products, '', array('class'=>'form-control','required'=>'required')) ?>
            </div>
          </div>
          <?php
        }
         ?>


        <div class="form-group">
          <label class="control-label col-md-4">PRODUCT QTY</label>
          <div class="col-md-3">
            <?php echo form_input('qty','', array('class'=>'form-control','required'=>'required')) ?>
            <span class="text-info">*Nota: Untuk penolakan stok masukkan (-), cth: -10</span>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-4">&nbsp;</label>
          <div class="col-md-3">
            <?php echo form_submit('submit','Save', array('class'=>'btn btn-success')) ?>
          </div>
        </div>
        <?php echo form_close() ?>
      </div>

    </div>
  </div>
</div>
