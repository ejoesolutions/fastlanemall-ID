<?php

//print_r($cost);
 ?>

 <div class="form-group">
   <div class="col-md-4">


         <div class="fileinput fileinput-new" data-provides="fileinput">
           <div class="fileinput-new thumbnail">
             <?php
             if ($banner['file_name'] != '') {

               $image_properties = array(
                 'src'   => base_url().'banner/'.$banner['file_name'],
                 'alt'   => $banner['file_name'],
                 'class' => 'img-thumbnail',
                 // 'width' => '500',
                 // 'height'=> '500',
                 'title' => $banner['file_name'],
               );

             } else {

               $image_properties = array(
                 'src'   => 'https://dummyimage.com/75x75/d6c7d6/9b9dad.jpg&text=No+Image',
                 'alt'   => 'No image',
                 'class' => 'img-thumbnail',
                 'width' => '100',
                 'height'=> '100',
                 'title' => 'No image',
               );
             }

             echo img($image_properties);
             ?>
           </div>
           <div class="fileinput-preview fileinput-exists thumbnail img-thumbnail"></div>
           <br>
           <div>
             <span class="btn default btn-file">
               <span class="fileinput-new"> <i class="glyphicon glyphicon-camera"></i> <?php echo lang('form_button_image') ?> </span>
               <span class="fileinput-exists"> <?php echo lang('form_button_image_change') ?> </span>
               <input type="file" name="bannerfile">
             </span>
             <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> <?php echo lang('form_button_image_delete') ?> </a>
           </div>
           <div class="clearfix margin-top-10">
             <small><span class="text-danger">NOTE!</span> Ideal image 1200x675</small>
           </div>
         </div>

       </div>

   <?php echo form_hidden('banner_id',$banner['banner_id']);
    echo form_hidden('temp_banner',$banner['file_name']);
   ?>
 </div>
