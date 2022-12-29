<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Report extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->database();
    $this->load->model(array('admin_model','order_model','customer_model','product_model','report_model'));
		$this->lang->load('auth');

    if ($this->ion_auth->logged_in())
    {
      $user = $this->ion_auth->user()->row();
      $this->data['user_profile'] = $this->user_model->get_profile($user->id);
      $this->data['shop'] = $this->user_model->get_seller($user->id);
      if($this->data['user_profile']['user_group']==2){
        $this->data['count_order'] = $this->order_model->get_order_status(null,$this->data['shop']['seller_id']);
      }else {
        $this->data['count_order'] = $this->order_model->get_order_status();
      }
    }

    $this->data['products'] = $this->product_model->get_all_product();
    $this->data['logo'] = $this->admin_model->get_logo();
    $this->data['banner'] = $this->admin_model->get_banner();
    $this->data['pm'] = $this->product_model->get_productCategory();
    $this->data['footer'] = $this->admin_model->get_footer();
    $this->data['count_newSeller'] = $this->user_model->count_register_seller(); //utk side menu
    $this->data['count_pen_tranc'] = $this->user_model->count_pen_tranc(); //utk side menu
    $this->data['state']=$this->user_model->list_state();
    $this->data['list_shop'] = $this->product_model->list_seller();
    $this->data['currency'] = $this->admin_model->get_currency();
  }

  public function payments()
  {
    $this->data['payments'] = $this->report_model->get_payments();

    $this->template->load('layouts/admin','report/payments', $this->data);
  }

  public function claims()
  {
    if (!$this->ion_auth->logged_in())
    {
      redirect('user/login', 'refresh');
    }

    $this->data['claim_list'] = $this->admin_model->get_claim();
    $this->data['claim_total'] = $this->admin_model->total_claim();
    $this->data['rp_total'] = $this->admin_model->total_payment();
    $this->data['comm_list'] = $this->admin_model->get_all_comm();
    $this->data['commission'] = $this->admin_model->get_admin_commission();
    $this->data['shop_comm'] = $this->admin_model->get_shop_comm();
    $this->data['tranc'] = $this->admin_model->get_all_tranc();
    
    $this->template->load('layouts/admin','pages/list_transaction', $this->data);
  }
}
