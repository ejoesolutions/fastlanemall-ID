<div class="row">
  <div class="col-md-2">
    <?php $this->load->view('includes/side_menu_cust') ?>
  </div>

  <div class="col-md-10">
    <table class="table" width="100%" id='sample_1'>
      <thead >
        <th class="text-center">No.</th>
        <th class="text-center">ID</th>
        <th class="text-center">Name</th>
        <th class="text-center">Shop</th>
      </thead>
      <tbody>
        <?php
        $i=1;

        if(!empty($referral)){
          foreach ($referral as $key) { ?>
            <tr class="text-center">
              <td><?= $i++ ?></td>
              <td><?= $key['ahli_id'] ?></td>
              <td><?= $key['full_name'] ?></td>
              <td><?= $key['shop_name'] ?></td>
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
        <h4 class="modal-title">Confirmation</h4>
      </div>
      <div class="modal-body">

      <?php echo form_open_multipart('admin/claim_comm_member', array('class'=>'form-horizontal')); ?>

        <div class="form-group row">
          <label class="control-label col-md-4">AMOUNT (Rp)</label>
          <div class="col-md-8">
            <input type="text" name="amount" id="amount" class="form-control" readonly>
            <input type="hidden" name="member_id" value="<?= $user_profile['id'] ?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-4">FULLNAME</label>
          <div class="col-md-8">
            <input type="text" value="<?= $user_profile['full_name'] ?>" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-4">BANK</label>
          <div class="col-md-8">
            <!-- <input type="text" value="<?= $this->data['shop']['seller_bank'] ?>" class="form-control" readonly> -->
            <input type="text" name="bank" class="form-control" required>
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-4">ACCOUNT</label>
          <div class="col-md-8">
            <!-- <input type="text" value="<?= base64_decode($this->data['shop']['seller_account']) ?>" class="form-control" readonly> -->
            <input type="text" name="account" class="form-control" required>
          </div>
        </div>
        <?php if (!$user_profile['verify_image']) { ?>
          <div class="form-group row">
            <label class="control-label col-md-4">IC IMAGE</label>
            <div class="col-md-8">
              <input type="file" class="form-control" name="verify_ic" required>
            </div>
          </div>
        <?php }else { ?>
          <div class="form-group row">
            <label class="control-label col-md-4">Verify</label>
            <div class="col-md-8">
              <img src="<?= base_url('images/verify/'.$user_profile['verify_image']) ?>" style="height: 390px; width: 100%; object-fit: contain">
            </div>
          </div>
        <?php } ?>
        <div class="form-group row" id="showLimit">
          <label class="control-label col-md-4"></label>
          <div class="col-md-8">
            <span class="text-danger">The amount you enter exceeds your limit</span>
          </div>
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" id="claimBtn" name="btn_claim">Claim</button>
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
        <div class="form-group row">
          <label class="control-label col-md-4">AMOUNT (Rp)</label>
          <div class="col-md-8">
            <input type="text" id="d_amount" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-4">TO</label>
          <div class="col-md-8">
            <input type="text" id="d_shop_name" value="<?= $user_profile['full_name'] ?>" class="form-control" readonly>
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
      </div>
    </div>
  </div>
</div>

<div class="modal fade bs-modal-lg borde-full" id="detailRebate" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content text-dark">
      <div class="modal-header bg-header">
        <h4 class="modal-title">Rebate Detail</h4>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label class="control-label col-md-4">AMOUNT (Rp)</label>
          <div class="col-md-8">
            <input type="text" id="r_amount" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-4">TO</label>
          <div class="col-md-8">
            <input type="text" value="<?= $user_profile['full_name'] ?>" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-4">ORDER ID</label>
          <div class="col-md-8">
            <input type="text" id="d_order_id" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-4"></label>
          <div class="col-md-8">
          <a href="" id="d_order_link">View Order Detail</a>

          </div>
        </div>
        <!-- <div class="form-group row">
          <label class="control-label col-md-4">PAYMENT TYPE</label>
          <div class="col-md-8">
            <input type="text" id="pay_type" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-4">NOTE</label>
          <div class="col-md-8">
            <input id="d_note" class="form-control" readonly>
          </div>
        </div> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script>
  function pay_amount() {

    const claim = Number(document.querySelector('#claimInput').value);
    const limit = Number(<?= number_format($member_comm['total'], 2, '.', '')  ?>);

    if (claim < 1) {
      alert('Insert value');
    }else {
      $("#claimModal").modal()
      if (claim > limit) {
        document.querySelector('#claimBtn').classList.add('hide');
        document.querySelector('#showLimit').classList.remove('hide');
        
        document.addEventListener('keypress', function (e) {
          if (e.keyCode === 13 || e.which === 13) {
            e.preventDefault();
            return false;
          }
        });

      } else {
        document.querySelector('#claimBtn').classList.remove('hide');
        document.querySelector('#showLimit').classList.add('hide');
      }

      document.querySelector('#amount').value = claim;

    }
  }

  $(document).on("click", ".open-detailModal", function (e) {

    e.preventDefault();

    var _self = $(this);

    // var shop_name = _self.data('shop_name');
    var amount = _self.data('amount');
    var note = _self.data('note');
    var type = _self.data('type');
    var date_claim = _self.data('claim_date');
    var date_pay = _self.data('pay_date');
    // var fullname = _self.data('fullname');

    let x='';
    if (type==1) {
      x="BANK IN";
    }else if (type==2) {
      x="CASH";
    }else if (type==3) {
      x="CHEQUE";
    }

    // if (shop_name) {
    //   $("#d_shop_name").val(shop_name);
    // }else if (fullname) {
      // $("#d_shop_name").val(fullname);
    // }
    $("#d_amount").val(amount);
    $("#d_note").val(note);
    $("#pay_type").val(x); 
    $("#d_pay_date").val(date_pay); 
    $("#d_claim_date").val(date_claim); 

  });

  $(document).on("click", ".open-rebateModal", function (e) {

    e.preventDefault();

    var _self = $(this);

    var amount = _self.data('amount');
    var order_id = _self.data('order_id');

    $("#r_amount").val(amount);
    $("#d_order_id").val(`#${order_id}`);
    $('#d_order_link').attr('href','<?= base_url('member/view_order/') ?>' + order_id);
  });

</script>