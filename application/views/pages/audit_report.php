<div class="portlet box blue">
  <div class="portlet-title">
    <div class="caption">
      <?php echo $title;

       ?>
    </div>
  </div>
  <div class="portlet-body">
    <table class="table table-bordered" id="sample_1">
      <thead>
        <th class="text-center">NO.</th>
        <th class="text-center">FILE</th>
        <th class="text-center">#</th>
      </thead>
      <tbody>
        <?php
        $n=1;
        // $dir = "C:/xampp1/htdocs/step_shop_kopi/audit_trail_report/";
        // $a = scandir($dir);

        for ($i=2; $i < count($audit); $i++) {
          ?>
          <tr>
            <td width="10px"><?php echo $n++; ?></td>
            <td><?php echo $audit[$i]; ?></td>
            <td class="text-center"><?php echo anchor(base_url('admin/download/'.$audit[$i]), '<i class="fa fa-download"></i>', array('target'=>'_blank')) ?></td>
          </tr>
          <?php
        }
        ?>
    </tbody>
  </table>
</div>
</div>
