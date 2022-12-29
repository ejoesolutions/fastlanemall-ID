<?php
class LanguagesLoader
{
  function initialize()
  {

    $ci =& get_instance();

    $ci->load->helper('language');
    $sitelang = $ci->session->userdata('site_lang');

    if ($sitelang) {

      $ci->lang->load('form',$sitelang);

    } else {

      $ci->lang->load('form','english');

    }
  }
}
