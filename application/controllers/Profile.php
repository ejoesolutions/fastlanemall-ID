<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    if (!$this->ion_auth->logged_in()) {
      redirect('user/login', 'refresh');
    }

    $user = $this->ion_auth->user()->row();
    $this->data['user_profile'] = $this->user_model->get_profile($user->id);
    $this->data['currency'] = $this->admin_model->get_currency();
  }

  function index()
  {
    $this->data['title'] = 'My profile';

    $this->template->load('layouts/admin','user/profile', $this->data);
  }

  function edit()
  {
    $this->data['title'] = 'My profile';

    $this->template->load('layouts/admin','user/edit_profile', $this->data);
  }

}