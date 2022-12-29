<div class="portlet box blue">
  <div class="portlet-title">
    <div class="caption">
      All Payments
    </div>
  </div>
  <div class="portlet-body">
    <table class="table table-bordered" id="sample_4">
      <thead>
        <th class="text-center">NO.</th>
        <th class="text-center">ID</th>
        <th class="text-center">SHOP</th>
        <th class="text-center">AMOUNT (Rp)</th>
        <th class="text-center">RELEASE DATE</th>
        <!-- <th class="text-center">STATUS</th> -->
        <!-- <th class="text-center">#</th> -->
      </thead>
      <tbody>
        <?php
        $i=1;

          if(!empty($all_payments)){
            foreach ($all_payments as $row){?>
                <tr class="text-center">
                  <td><?php echo $i++;?></td>
                  <td>#<?= $row['release_pay_id'] ?></td>
                  <td><?= $row['shop_name'] ?></td>
                  <td><?= number_format($row['pay_amount'], 2, '.', '') ?></td>
                  <td><?= date('d-m-Y', strtotime($row['ref_date']))  ?></td>
                  <!-- <td><?= ($row['status']==0) ? '<span class="label label-warning">Pending</span>' : '<span class="label label-success">Complete</span>' ?></td> -->
                  <!-- <td>
                    <?php if ($row['status']==1) { ?>
                      <a data-toggle="modal" data-target="#detailClaim" class="text-info open-detailModal"
                        data-shop_name="<?= $row['shop_name'] ?>" data-amount="<?= $row['claim'] ?>" data-note="<?= $row['note'] ?>" data-type="<?= $row['payment_type'] ?>" data-claim_date="<?= date('d-m-Y H:i', strtotime($row['date_claim'])) ?>" data-pay_date="<?= date('d-m-Y H:i', strtotime($row['date_pay'])) ?>">
                        View Payment Detail
                      </a>
                    <?php }else { ?>
                      <a data-toggle="modal" data-target="#claimModal" class="text-info open-payModal"
                        data-seller_id="<?= $row['seller_id'] ?>" data-id="<?= $row['id'] ?>" data-shop_name="<?= $row['shop_name'] ?>" data-amount="<?= $row['claim'] ?>">
                        Pay
                      </a>
                    <?php } ?>
                  </td> -->
              </tr>
              <?php 
            }
          } ?>
      </tbody>
    </table>
  </div>
</div>


<div class="modal fade bs-modal-lg borde-full" id="claimModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content text-dark">
      <div class="modal-header bg-header">
        <h4 class="modal-title">Payment Confirmation</h4>
      </div>
      <div class="modal-body">

      <?php echo form_open_multipart('admin/claim_comm_upd', array('class'=>'form-horizontal')); ?>

        <div class="form-group row">
          <label class="control-label col-md-4">AMOUNT (Rp)</label>
          <div class="col-md-8">
            <input type="text" id="amount" class="form-control" readonly>
            <input type="hidden" name="seller_id" id="seller_id">
            <input type="hidden" name="claim_id" id="claim_id">
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-4">SHOP NAME</label>
          <div class="col-md-8">
            <input type="text" id="shop_name" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-4">PAYMENT TYPE</label>
          <div class="col-md-8">
            <select name="payment_type" class="form-control">
              <option value="1">BANK IN</option>
              <option value="2">CASH</option>
              <option value="3">CHEQUE</option>
            </select>
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-4">NOTE</label>
          <div class="col-md-8">
            <!-- <input type="text" name="note" class="form-control"> -->
            <textarea name="d_note" cols="30" rows="4" class="form-control"></textarea>
          </div>
        </div>
        <!-- <div class="form-group row">
          <label class="control-label col-md-4">BANK</label>
          <div class="col-md-8">
            <input type="text" id="shop_bank" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-4">ACCOUNT</label>
          <div class="col-md-8">
            <input type="text" value="<?= base64_decode($this->data['shop']['seller_account']) ?>" class="form-control" readonly>
          </div>
        </div> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" name="btn_claim">Confirm</button>
      </div>
      <?php echo form_close() ?>
    </div>
  </div>
</div>


<div class="modal fade bs-modal-lg borde-full" id="detailClaim" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content text-dark">
      <div class="modal-header bg-header">
        <h4 class="modal-title">Payment Detail</h4>
      </div>
      <div class="modal-body">

      <!-- <?php echo form_open_multipart('admin/claim_comm_upd', array('class'=>'form-horizontal')); ?> -->

        <div class="form-group row">
          <label class="control-label col-md-4">AMOUNT (Rp)</label>
          <div class="col-md-8">
            <input type="text" id="d_amount" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-4">SHOP NAME</label>
          <div class="col-md-8">
            <input type="text" id="d_shop_name" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-4">CLAIM DATE</label>
          <div class="col-md-8">
            <input type="text" id="d_claim_date" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-4">PAY DATE</label>
          <div class="col-md-8">
            <input type="text" id="d_pay_date" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-4">PAYMENT TYPE</label>
          <div class="col-md-8">
            <!-- <select id="d_payment_type" class="form-control">
              <option value="1">BANK IN</option>
              <option value="2">CASH</option>
              <option value="3">CHEQUE</option>
            </select> -->
            <input type="text" id="pay_type" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-4">NOTE</label>
          <div class="col-md-8">
            <input id="d_note" class="form-control" readonly>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <!-- <button type="submit" class="btn btn-success" name="btn_claim">Confirm</button> -->
      </div>
      <!-- <?php echo form_close() ?> -->
    </div>
  </div>
</div>

<script>

$(document).ready(function () {

  $(document).on("click", ".open-payModal", function (e) {

    e.preventDefault();

    var _self = $(this);

    var id = _self.data('id');
    var seller_id = _self.data('seller_id');
    var shop_name = _self.data('shop_name');
    var amount = _self.data('amount');

    $("#claim_id").val(id);
    $("#seller_id").val(seller_id);
    $("#shop_name").val(shop_name);
    $("#amount").val(amount);

  });

  $(document).on("click", ".open-detailModal", function (e) {

    e.preventDefault();

    var _self = $(this);

    var shop_name = _self.data('shop_name');
    var amount = _self.data('amount');
    var note = _self.data('note');
    var type = _self.data('type');
    var date_claim = _self.data('claim_date');
    var date_pay = _self.data('pay_date');

    let x='';
    if (type==1) {
      x="BANK IN";
    }else if (type==2) {
      x="CASH";
    }else if (type==3) {
      x="CHEQUE";
    }

    $("#d_shop_name").val(shop_name);
    $("#d_amount").val(amount);
    $("#d_note").val(note);
    $("#d_note").val(note);
    $("#pay_type").val(x); 
    $("#d_pay_date").val(date_pay); 
    $("#d_claim_date").val(date_claim); 

  });
});


</script>

