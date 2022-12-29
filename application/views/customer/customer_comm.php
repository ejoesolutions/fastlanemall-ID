<div class="row">
  <div class="col-md-2">
    <?php $this->load->view('includes/side_menu_cust') ?>
  </div>

  <div class="col-md-10">
    
    <nav class="navbar navbar-default" role="navigation">
      <div class="container-fluid">
        <ul class="nav navbar-nav">
          <li><a href="#">Total Member Wallet : <?= $currency['tag'] ?> <?= ($currency['show_decimal']==1 ? number_format($member_comm['total'],2, '.', $currency['separate']) : substr(number_format($member_comm['total'],2, '.', $currency['separate']), 0 ,-3)); ?></a></li>
        </ul>
        <form class="navbar-form navbar-right">
          <div class="form-group">
            <input type="text" id="claimInput" class="form-control" placeholer="<?= $currency['tag'] ?>">
          </div>
          <a onclick="pay_amount()"  class="btn btn-success">Claim</a>
        </form>
      </div>
    </nav>
    <hr>
    <table class="table" width="100%" id='sample_1' data-ordering="false">
      <thead >
        <th class="text-center">For</th>
        <th class="text-center"><?= $currency['tag'] ?></th>
        <th class="text-center">Status</th>
        <th class="text-center">Detail</th>
      </thead>
      <tbody>
        <?php
        $i=1;

        if(!empty($order_comm)){
          foreach ($order_comm as $key) { ?>
            <tr class="text-center">
              <td>
                <?php if ($key['category']==1) { 
                  echo "Release Payment";
                }else if ($key['category']==2 || $key['category']==3) {
                  echo "Referral Commission";
                }elseif ($key['category']==4) {
                  echo "Claim Payment";
                }elseif ($key['category']==6) {
                  echo "Rebate";
                } ?>
              </td>
              <td><?= ($currency['show_decimal']==1 ? number_format($key['amount'],2, '.', $currency['separate']) : substr(number_format($key['amount'],2, '.', $currency['separate']), 0 ,-3)); ?></td>
              <td><?= ($key['status']==0) ? '<span class="label label-warning">Pending</span>' : '<span class="label label-success">Complete</span>' ?> </td>
              <td>
                <?php if ($key['category']==4 && $key['status']==1) { ?>
                  <a href="" data-toggle="modal" data-target="#detailClaim" class="text-primary open-detailModal"
                    data-amount="<?= $key['amount'] ?>" data-note="<?= $key['note'] ?>" data-type="<?= $key['pay_type'] ?>" data-claim_date="<?= date('d-m-Y H:i', strtotime($key['req_date'])) ?>" data-pay_date="<?= date('d-m-Y H:i', strtotime($key['pay_date'])) ?>">
                    View
                  </a>
                <?php }elseif ($key['category']==6 && $key['status']==1) { ?>
                  <a href="" data-toggle="modal" data-target="#detailRebate" class="text-primary open-rebateModal"
                    data-amount="<?= $key['amount'] ?>" data-order_id="<?= $key['order_id'] ?>" data-date="<?= $key['req_date'] ?>">
                    View
                  </a>
                <?php }elseif ($key['category']==2 || $key['category']==3) { ?>
                  <a href="" data-toggle="modal" data-target="#detailRefer" class="text-primary open-referModal"
                    data-amount="<?= $key['amount'] ?>" data-shop="<?= $key['shop_name'] ?>" data-date="<?= $key['req_date'] ?>">
                    View
                  </a>
                <?php } else {
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

      <?= form_open_multipart('admin/claim_comm_member', array('class'=>'form-horizontal')); ?>

        <div class="form-group row">
          <label class="control-label col-md-4">AMOUNT (<?= $currency['tag'] ?>)</label>
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
          <label class="control-label col-md-4">AMOUNT (<?= $currency['tag'] ?>)</label>
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
          <label class="control-label col-md-4">DATE</label>
          <div class="col-md-8">
            <input type="text" id="d_date" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-4"></label>
          <div class="col-md-8">
            <a href="" id="d_order_link">View Order Detail</a>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade bs-modal-lg borde-full" id="detailRefer" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content text-dark">
      <div class="modal-header bg-header">
        <h4 class="modal-title">Referral Commission Detail</h4>
      </div>
      <div class="modal-body">
        <div class="form-group row">
          <label class="control-label col-md-4">AMOUNT (<?= $currency['tag'] ?>)</label>
          <div class="col-md-8">
            <input type="text" id="refer_amount" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-4">TO</label>
          <div class="col-md-8">
            <input type="text" value="<?= $user_profile['full_name'] ?>" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-4">FROM</label>
          <div class="col-md-8">
            <input type="text" id="r_shop" class="form-control" readonly>
          </div>
        </div>
        <div class="form-group row">
          <label class="control-label col-md-4">DATE</label>
          <div class="col-md-8">
            <input type="text" id="r_date" class="form-control" readonly>
          </div>
        </div>
        <!-- <div class="form-group row">
          <label class="control-label col-md-4"></label>
          <div class="col-md-8">
          <a href="" id="d_order_link">View Order Detail</a>
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
    var date = _self.data('date');

    $("#r_amount").val(amount);
    $("#d_date").val(date);
    $("#d_order_id").val(`#${order_id}`);
    $('#d_order_link').attr('href','<?= base_url('member/view_order/') ?>' + order_id);
  });

  $(document).on("click", ".open-referModal", function (e) {

    e.preventDefault();

    var _self = $(this);

    var amount = _self.data('amount');
    var shop = _self.data('shop');
    var date = _self.data('date');

    $("#refer_amount").val(amount);
    $("#r_shop").val(shop);
    $("#r_date").val(date);
  });

</script>