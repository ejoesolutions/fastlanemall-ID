<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('product_model');
    $this->load->model('inventory_model');

    if (!$this->ion_auth->logged_in()) {
      redirect('user/login', 'refresh');
    }

    $user = $this->ion_auth->user()->row();
    $this->data['user_profile'] = $this->user_model->get_profile($user->id);
    $this->data['shop'] = $this->user_model->get_seller($user->id);
    $this->data['currency'] = $this->admin_model->get_currency();
    $this->data['state']=$this->user_model->state_list();
    //$this->data['metal'] = $this->product_model->get_gs_price();
  }

  public function index()
  {
    $this->data['title'] = 'Senarai Bekalan';

    $this->template->load('layouts/admin','inventory/table', $this->data);
  }

}
