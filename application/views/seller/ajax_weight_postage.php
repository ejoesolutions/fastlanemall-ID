

  <?php if (!$postage_sm['shipcost_set'] && !$postage_ss['shipcost_set']) { ?>
    <span class="text-danger">You have to set a shipping weightcost. Click <a href="<?= base_url('admin/setting') ?>">Here</a></span>
  <script>
    document.getElementById("subButton").disabled = true;
  </script>
  <?php }else { ?>
  <span class="text-primary">Postage SM : Rp <?= $postage_sm['shipcost_set'] ?></span>
  <br>
  <span class="text-primary">Postage SS : Rp <?= $postage_ss['shipcost_set'] ?></span>
  <script>
    document.getElementById("subButton").disabled = false;
  </script>
  <?php } ?>