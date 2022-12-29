<div class="portlet box blue">
  <div class="portlet-title">
    <div class="caption">
      <?php echo $title; ?>
    </div>
  </div>
  <div class="portlet-body">
    <table class="table table-bordered" id="sample_3">
      <thead>
        <th width="10">NO.</th>
        <th class="text-center">EMAIL</th>
      </thead>
      <tbody>
        <?php
        $i=1;
        if(!empty($news)){
          foreach ($news as $n){?>
            <tr class="text-center">
              <td><?php echo $i++;?></td>
              <td><?php echo $n['email'] ?></td>
            </tr>
        <?php } } ?>
    </tbody>
  </table>
</div>
</div>
