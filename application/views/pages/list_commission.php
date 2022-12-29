
<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
      <li><a href="#">Total Shop Wallet : <?= $currency['tag'].' '.($currency['show_decimal']==1 ? number_format($shop_comm['total'],2, '.', $currency['separate']) : substr(number_format($shop_comm['total'],2, '.', $currency['separate']), 0 ,-3)); ?></a></li>
    </ul>
    <form class="navbar-form navbar-right">
      <div class="form-group">
        <input type="text" id="claimInput" class="form-control" placeholer="<?= $currency['tag'] ?>" value="">
      </div>
      <a onclick="pay_amount()" class="btn btn-success">Claim</a>
    </form>
  </div>
</nav>