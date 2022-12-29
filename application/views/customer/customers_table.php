<div class="portlet box blue">
  <div class="portlet-title">
    <div class="caption">
      <?php echo $title; ?>
    </div>
  </div>
  <div class="portlet-body">
    <table class="table table-bordered" id="sample_3">
      <thead>
        <th>NO</th>
        <th>NAMA</th>
        <th>NO K/P</th>
        <th>NO TELEFON</th>
        <th>EMAIL</th>
        <th class="text-center">STATUS</th>
        <th class="text-center">DICIPTA</th>
        <?php if ($this->ion_auth->in_group(array('wakalah_admin'))): ?>
        <th class="text-center">#</th>
      <?php endif;?>
      </thead>
      <tbody>
        <?php
        //print_r($customers);
        $i=1;
        if($customers){


        foreach ($customers as $customer):?>
        <tr>
          <td><?php echo $i++;?></td>
          <td><?php echo anchor('member/get_history/'.$customer->mykad, $customer->name);?></td>
          <td><?php echo htmlspecialchars($customer->mykad,ENT_QUOTES,'UTF-8');?></td>
          <td><?php echo htmlspecialchars($customer->phone,ENT_QUOTES,'UTF-8');?></td>
          <td><?php echo htmlspecialchars($customer->email,ENT_QUOTES,'UTF-8');?></td>
          <td class="text-center"><?php echo ($customer->status) ? 'Aktif' :  'Tidak Aktif';?></td>
          <td class="text-center"><?php echo htmlspecialchars($customer->created,ENT_QUOTES,'UTF-8');?></td>
          <?php if ($this->ion_auth->in_group(array('wakalah_admin'))): ?>
          <td class="text-center">
            <?php echo anchor('member/detail/'.$customer->customer_id, 'View') ;?>
          </td>
        <?php endif; ?>
        </tr>
      <?php endforeach;
      } ?>
    </tbody>
  </table>
</div>
</div>
