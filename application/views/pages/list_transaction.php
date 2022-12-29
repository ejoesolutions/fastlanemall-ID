

<?php if ($user_profile['user_group']==2) {
  $this->load->view('pages/list_commission');
} ?>

<div class="portlet box blue">
  <div class="portlet-title">
    <div class="caption">
      All Transactions
    </div>
  </div>
  <div class="portlet-body">
    <table class="table table-bordered" id="sample_3">
      <thead>
        <th data-priority="1" class="text-center">NO.</th>
        <th data-priority="3" class="text-center">ORDER ID</th>
        <th data-priority="6" class="text-center">FOR</th>
        <th data-priority="5" class="text-center">TO</th>
        <th data-priority="4" class="text-center">STATUS</th>
        <th data-priority="3" class="text-center">AMOUNT (<?= $currency['tag'] ?>)</th>
        <th data-priority="8" class="text-center">NOTE</th>
        <th data-priority="2" class="text-center">#</th>
      </thead>
      <tbody>
        <?php
        $i=1;

          if(!empty($tranc)){
            foreach ($tranc as $row){ ?>
              <tr class="text-center">
                <td><?= $i++;?></td>
                <td>
                #<?= $row['order_id'];?>
                </td>
                <td>
                  <?php if ($row['category']==1) { 
                    echo "Release Payment";
                  }else if ($row['category']==2) {
                    echo "Commission";
                  }else if ($row['category']==3) {
                    echo "Referral Commission";
                  }elseif ($row['category']==4) {
                    echo "Claim Payment";
                  }elseif ($row['category']==5) {
                    echo "Service Charge";
                  }elseif ($row['category']==6) {
                    echo "Rebate";
                  } ?>
                </td>
                <td>
                  <?php if ($row['shop_id']) { 
                    echo $row['shop_name'];
                  }elseif ($row['refer_fullname']) {
                    echo $row['refer_fullname'];
                  } ?>
                </td>
                <td><?= ($row['status']==0) ? '<span class="label label-warning">Pending</span>' : '<span class="label label-success">Complete</span>' ?></td>
                <td><?= ($currency['show_decimal']==1 ? number_format($row['amount'],2, '.', $currency['separate']) : substr(number_format($row['amount'],2, '.', $currency['separate']), 0 ,-3));?></td>
                <td><?= $row['note'];?></td>
                <td>
                  <?php if ($row['category']==4 && $row['status']==0 && ($user_profile['user_group']==1 || $user_profile['user_group']==0)) {  ?>
                    <a data-toggle="modal" data-target="#payModal" class="text-info open-payModal"
                      data-seller_id="<?= $row['seller_id'] ?>" data-id="<?= $row['id'] ?>" data-shop_name="<?= $row['shop_name'] ?>" data-amount="<?= ($currency['show_decimal']==1 ? number_format($row['amount'],2, '.', $currency['separate']) : substr(number_format($row['amount'],2, '.', $currency['separate']), 0 ,-3)) ?>" data-fullname="<?= $row['refer_fullname'] ?>" data-shop_image="<?= $row['shop_image'] ?>" data-user_image="<?= $row['user_image'] ?>" data-user_id="<?= $row['user_id'] ?>">
                      Pay
                    </a>
                  <?php }else if ($row['category']==4 && $row['status']==1) { ?>
                    <a data-toggle="modal" data-target="#detailClaim" class="text-info open-detailModal"
                      data-shop_name="<?= $row['shop_name'] ?>" data-amount="<?= $row['amount'] ?>" data-note="<?= $row['note'] ?>" data-type="<?= $row['pay_type'] ?>" data-claim_date="<?= date('d-m-Y H:i', strtotime($row['req_date'])) ?>" data-pay_date="<?= date('d-m-Y H:i', strtotime($row['pay_date'])) ?>"  data-fullname="<?= $row['refer_fullname'] ?>">
                      Detail
                    </a>
                  <?php }else if ($row['category']==1 || $row['category']==5) { ?>
                    <a href="<?= base_url('orders/detail/'.$row['order_id'].'/'.$row['shop_id']) ?>">Detail</a>
                  <?php }else {
                    echo '-';
                  } ?>
                </td>
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

      <?= form_open_multipart('admin/claim_comm', array('class'=>'form-horizontal')); ?>

        <div class="form-group row">
          <label class="control-label col-md-4">AMOUNT (<?= $currency['tag'] ?>)</label>
          <div class="col-md-8">
            <input type="text" name="amount" id="amount" class="form-control" readonly>
            <input type="hidden" name="seller_id" value="<?= $this->data['shop']['seller_id'] ?>">
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-4">SHOP NAME</label>
          <div class="col-md-8">
            <input type="text" value="<?= $this->data['shop']['shop_name'] ?>" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-4">BANK</label>
          <div class="col-md-8">
            <input type="text" value="<?= $this->data['shop']['seller_bank'] ?>" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-4">ACCOUNT</label>
          <div class="col-md-8">
            <input type="text" value="<?= base64_decode($this->data['shop']['seller_account']) ?>" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row" id="showLimit">
          <label class="control-label col-md-4"></label>
          <div class="col-md-8">
            <span class="text-danger">The amount you enter exceeds your limit</span>
          </div>
        </div>
        <?php if (!$this->data['shop']['verify_image']) { ?>
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
              <img src="<?= base_url('images/verify/'.$this->data['shop']['verify_image']) ?>" style="height: 390px; width: 100%; object-fit: contain">
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" id="claimBtn" name="btn_claim">Claim</button>
      </div>
      <?= form_close() ?>
    </div>
  </div>
</div>

<div class="modal fade bs-modal-lg borde-full" id="payModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content text-dark">
      <div class="modal-header bg-header">
        <h4 class="modal-title">Payment Confirmation</h4>
      </div>
      <div class="modal-body">

      <?= form_open_multipart('admin/claim_comm_upd', array('class'=>'form-horizontal')); ?>

        <div class="form-group row">
          <label class="control-label col-md-4">AMOUNT (<?= $currency['tag'] ?>)</label>
          <div class="col-md-8">
            <input type="text" id="amount_claim" class="form-control" readonly>
            <input type="hidden" name="seller_id" id="seller_id">
            <input type="hidden" name="user_id" id="user_id">
            <input type="hidden" name="claim_id" id="claim_id">
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-4">TO</label>
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
            <textarea name="note" cols="30" rows="4" class="form-control"></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-4">Verify</label>
          <div class="col-md-8">
            <div class="thumbnail">
              <img id="verify_image" style="height: 380px; width: 100%; object-fit: contain">
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success" name="btn_claim">Confirm</button>
      </div>
      <?= form_close() ?>
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
          <label class="control-label col-md-4">AMOUNT (<?= $currency['tag'] ?>)</label>
          <div class="col-md-8">
            <input type="text" id="d_amount" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-4">TO</label>
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


<script>

  $(document).ready(function () {

    $(document).on("click", ".open-payModal", function (e) {
      e.preventDefault();

      var _self = $(this);

      var id = _self.data('id');
      var seller_id = _self.data('seller_id');
      var shop_name = _self.data('shop_name');
      var amount = _self.data('amount');
      var fullname = _self.data('fullname');
      var user_image = _self.data('user_image');
      var shop_image = _self.data('shop_image');
      var user_id = _self.data('user_id');
      
      $("#claim_id").val(id);
      $("#seller_id").val(seller_id);
      $("#user_id").val(user_id);
      if (shop_name) {
        $("#shop_name").val(shop_name);
      }else if (fullname) {
        $("#shop_name").val(fullname);
      }
      $("#amount_claim").val(amount);
      if (shop_image) {
        $("#verify_image").attr("src", "<?= base_url('images/verify/') ?>" + shop_image);
      }else if (user_image) {
        $("#verify_image").attr("src", "<?= base_url('images/verify/') ?>" + user_image);
      }
      
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
      var fullname = _self.data('fullname');

      let x = '';
      if (type==1) {
        x = "BANK IN";
      }else if (type==2) {
        x = "CASH";
      }else if (type==3) {
        x = "CHEQUE";
      }

      if (shop_name) {
        $("#d_shop_name").val(shop_name);
      }else if (fullname) {
        $("#d_shop_name").val(fullname);
      }
      $("#d_amount").val(amount);
      $("#d_note").val(note);
      $("#d_note").val(note);
      $("#pay_type").val(x); 
      $("#d_pay_date").val(date_pay); 
      $("#d_claim_date").val(date_claim); 

    });
  });

  function pay_amount() {

    const claim = Number(document.querySelector('#claimInput').value);
    const limit = Number(<?= number_format($shop_comm['total'], 2, '.', '')  ?>);

    if (claim < 1) {
      alert('Insert value');
    }else {

      $("#claimModal").modal();
      
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

  //user xleh tekan enter 
  $(document).ready(function() {
    $(window).keydown(function(event){
      if(event.keyCode == 13) {
        event.preventDefault();
        return false;
      }
    });
  });

  //user xleh tekan tab
  $(document).ready(function() {
    $(window).keydown(function(event){
      if(event.keyCode == 9) {
        event.preventDefault();
        return false;
      }
    });
  });
</script>