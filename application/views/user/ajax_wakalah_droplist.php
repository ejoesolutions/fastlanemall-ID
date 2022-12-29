<?php

if($this->input->post('user_group') == 2) {
echo '<label class="control-label">PILIH WAKALAH</label>';
echo form_dropdown('wakalah_id', $lists, set_value('wakalah_id'), array('class'=>'form-control','required'=>'required'));
}
// echo '<br>';
// echo '<div class="form-group">';
// echo '<label class="control-label">KATEGORI PENGGUNA</label><br>';
// echo '<input type="radio" name="type" value="1" checked="checked">Admin Wakalah<br>';
// echo '<input type="radio" name="type" value="2">Staff Wakalah';
// echo '</div><hr>';
