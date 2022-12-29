<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->database();
    $this->load->model(array('admin_model','order_model','customer_model','product_model'));
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
    $this->data['state'] = $this->user_model->state_list();
    $this->data['order_status'] = $this->order_model->get_order_status();
    $this->data['list_shop'] = $this->product_model->list_seller();
    $this->data['currency'] = $this->admin_model->get_currency();

  }

  public function index()
  {
    $this->mainpage();
  }

  public function mainpage()
  {
    $this->data['category'] = $this->product_model->get_productCategory();
    $this->data['cat_list1'] = $this->product_model->front_category1(count($this->data['category']));
    $this->data['cat_list2'] = $this->product_model->front_category2(count($this->data['category']));
    
    $this->load->view('layouts/main',$this->data);
  }

  public function fetch_products(){
    $this->data['p'] = $this->admin_model->fetch_data($this->input->post('limit'), $this->input->post('start'));
    $this->load->view('pages/fetch_product', $this->data);
  }

  public function add_newslatter()
  {
    $this->db->insert('ci_newslatter',array('email'=>$this->input->post('email')));
    redirect('','refresh');
  }

  public function dashboard()
  {
    if (!$this->ion_auth->logged_in())
    {
      redirect('user/login', 'refresh');
    }
    $this->data['title'] = 'Dashboard';
    $this->data['title2'] = 'Report Summary';

    $this->data['seller']=$this->admin_model->count_seller();
    $this->data['produk']=$this->admin_model->count_product();
    $this->data['sale']=$this->admin_model->count_sale();
    $this->data['customer']=$this->admin_model->count_customer();
    $this->data['list_shop']=$this->admin_model->dropdown_seller();
    $this->data['list_product']=$this->admin_model->get_productType();
    $this->data['tahun'] = $this->admin_model->get_year_order();
    $this->data['bulan'] = $this->admin_model->get_month_order();
    $this->data['list_client'] = $this->admin_model->list_clients();
    $this->data['order_status'] = $this->order_model->get_order_status();
    $this->data['pending'] = $this->order_model->count_pending_payment();

    //search report 
    $report_type=$this->input->post('report_type');
    if($report_type!=''){
      if($report_type==1){

        $daily= date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('report_daily'))));
        $this->data['all_report']=$this->admin_model->get_all_tranc($daily);
        $this->data['date']=$daily;
        $this->data['report_type']=$report_type;

        //audit
        $data_log=array(
          'ip_address'=>$ip = $this->input->ip_address(),
          'user_id'=>$this->data['user_profile']['id'],
          'username'=>$this->data['user_profile']['username'],
          'time_record'=>date("Y-m-d H:i:s"),
          'description'=>'Search report daily transaction record [Date:'.$daily.']',
        );
        $this->db->insert('ci_audit_log',$data_log);

      } if($report_type==2){

        $daily= date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('report_dailyVendor'))));
        $this->data['all_report'] = $this->admin_model->get_dailyVendor_report($daily);
        $this->data['data_seller'] = $this->user_model->get_seller();
        $this->data['date']=$daily;
        $this->data['report_type']=$report_type;
        //audit
        $data_log=array(
          'ip_address'=>$ip = $this->input->ip_address(),
          'user_id'=>$this->data['user_profile']['id'],
          'username'=>$this->data['user_profile']['username'],
          'time_record'=>date("Y-m-d H:i:s"),
          'description'=>'Search daily sales report according seller [Date:'.$daily.']',
        );
        $this->db->insert('ci_audit_log',$data_log);
      }
      if($report_type==3){

        $seller_id=$this->input->post('seller_id_3');
        $daily= date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('report_dailyOrderVendor'))));
        $this->data['all_report'] = $this->admin_model->get_dailyOrderVendor_report($daily);
        $this->data['seller_id'] = $seller_id;
        $this->data['data_seller'] = $this->user_model->get_detail_seller(null, $seller_id);
        $this->data['date']=$daily;
        $this->data['report_type']=$report_type;

        //audit
        $data_log=array(
          'ip_address'=>$ip = $this->input->ip_address(),
          'user_id'=>$this->data['user_profile']['id'],
          'username'=>$this->data['user_profile']['username'],
          'time_record'=>date("Y-m-d H:i:s"),
          'description'=>'Search report seller daily order [Seller ID:'.$seller_id.',Date:'.$daily.']',
        );
        $this->db->insert('ci_audit_log',$data_log);
      }
      if($report_type==4){

        $category_id=$this->input->post('category_id');
        $daily= date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('report_productDaily'))));
        $this->data['all_report'] = $this->admin_model->get_productDailyOrder_report($daily);
        $this->data['category_id'] = $category_id;
        $this->data['data_pType'] = $this->product_model->get_productCategory($category_id);
        $this->data['date']=$daily;
        $this->data['report_type']=$report_type;

        //audit
        $data_log=array(
          'ip_address'=>$ip = $this->input->ip_address(),
          'user_id'=>$this->data['user_profile']['id'],
          'username'=>$this->data['user_profile']['username'],
          'time_record'=>date("Y-m-d H:i:s"),
          'description'=>'Search report product type daily order [Category ID:'.$category_id.',Date:'.$daily.']',
        );
        $this->db->insert('ci_audit_log',$data_log);
      }
      if($report_type==5){

        $seller=$this->input->post('seller_id_5');
        $bulan=$this->input->post('bulan_5');
        $tahun=$this->input->post('tahun_5');
        
        $this->data['all_report'] = $this->admin_model->get_monthlySales_report($bulan,$tahun,$seller);
        $this->data['report_type']=$report_type;
        if($bulan==1){
          $this->data['b'] = "January";
        }elseif($bulan==2){
          $this->data['b'] = "February";
        }elseif($bulan==3){
          $this->data['b'] = "March";
        }elseif($bulan==4){
          $this->data['b'] = "April";
        }elseif($bulan==5){
          $this->data['b'] = "May";
        }elseif($bulan==6){
          $this->data['b'] = "June";
        }elseif($bulan==7){
          $this->data['b'] = "July";
        }elseif($bulan==8){
          $this->data['b'] = "August";
        }elseif($bulan==9){
          $this->data['b'] = "September";
        }elseif($bulan==10){
          $this->data['b'] = "October";
        }elseif($bulan==11){
          $this->data['b'] = "November";
        }elseif($bulan==12){
          $this->data['b'] = "December";
        }else {
          $this->data['b'] = "";
        }
        $this->data['bln'] = $bulan;
        $this->data['t'] = $tahun;
        $this->data['seller_id'] = $seller;

        //audit
        $data_log=array(
          'ip_address'=>$ip = $this->input->ip_address(),
          'user_id'=>$this->data['user_profile']['id'],
          'username'=>$this->data['user_profile']['username'],
          'time_record'=>date("Y-m-d H:i:s"),
          'description'=>'Search monthly sales report [Month:'.$bulan.',Year:'.$tahun.']',
        );
        $this->db->insert('ci_audit_log',$data_log);
      }
      if($report_type==6){

        $seller_id=$this->input->post('seller_id_6');
        $bulan=$this->input->post('bulan_6');
        $tahun=$this->input->post('tahun_6');

        $this->data['all_report'] = $this->admin_model->get_vendorMonthlySales_report($seller_id,$bulan,$tahun);
        $this->data['report_type']=$report_type;
        $this->data['data_seller'] = $this->user_model->get_detail_seller($seller_id);
        if($bulan==1){
          $this->data['b'] = "January";
        }elseif($bulan==2){
          $this->data['b'] = "February";
        }elseif($bulan==3){
          $this->data['b'] = "March";
        }elseif($bulan==4){
          $this->data['b'] = "April";
        }elseif($bulan==5){
          $this->data['b'] = "May";
        }elseif($bulan==6){
          $this->data['b'] = "June";
        }elseif($bulan==7){
          $this->data['b'] = "July";
        }elseif($bulan==8){
          $this->data['b'] = "August";
        }elseif($bulan==9){
          $this->data['b'] = "September";
        }elseif($bulan==10){
          $this->data['b'] = "October";
        }elseif($bulan==11){
          $this->data['b'] = "November";
        }elseif($bulan==12){
          $this->data['b'] = "December";
        }else {
          $this->data['b'] = "";
        }
        $this->data['bln'] = $bulan;
        $this->data['t'] = $tahun;

        //audit
        $data_log=array(
          'ip_address' => $ip = $this->input->ip_address(),
          'user_id' => $this->data['user_profile']['id'],
          'username' => $this->data['user_profile']['username'],
          'time_record' => date("Y-m-d H:i:s"),
          'description' => 'Search seller monthly sales report [Seller ID:'.$seller_id.',Month:'.$bulan.',Year:'.$tahun.']',
        );
        $this->db->insert('ci_audit_log',$data_log);
      }
      if($report_type==7){

        $this->data['all_report'] = $this->user_model->get_seller();
        $this->data['report_type'] = $report_type;

        //audit
        $data_log=array(
          'ip_address'=>$ip = $this->input->ip_address(),
          'user_id'=>$this->data['user_profile']['id'],
          'username'=>$this->data['user_profile']['username'],
          'time_record'=>date("Y-m-d H:i:s"),
          'description'=>'Search sellers list report',
        );
        $this->db->insert('ci_audit_log',$data_log);
      }
      if($report_type==8){

        $seller_id=$this->input->post('seller_id_8');
        $this->data['all_report'] = $this->admin_model->get_vendorProductList($seller_id);
        $this->data['data_seller'] = $this->user_model->get_detail_seller(null, $seller_id);
        $this->data['report_type']=$report_type;
        //audit
        $data_log=array(
          'ip_address'=>$ip = $this->input->ip_address(),
          'user_id'=>$this->data['user_profile']['id'],
          'username'=>$this->data['user_profile']['username'],
          'time_record'=>date("Y-m-d H:i:s"),
          'description'=>'Search seller product list report [Seller ID:'.$seller_id.']',
        );
        $this->db->insert('ci_audit_log',$data_log);
      }
      if($report_type==9){

        $this->data['all_report'] = $this->admin_model->get_clientsList();
        $this->data['report_type']=$report_type;
        //audit
        $data_log=array(
          'ip_address'=>$ip = $this->input->ip_address(),
          'user_id'=>$this->data['user_profile']['id'],
          'username'=>$this->data['user_profile']['username'],
          'time_record'=>date("Y-m-d H:i:s"),
          'description'=>'Search clients list report',
        );
        $this->db->insert('ci_audit_log',$data_log);
      }
      if($report_type==10){

        $cust_id=$this->input->post('cust_id');
        $this->data['all_report'] = $this->admin_model->get_clientsTransaction($cust_id);
        $this->data['report_type']=$report_type;
        $this->data['data_client']=$this->admin_model->get_clientsList($cust_id);
        //audit
        $data_log=array(
          'ip_address'=>$ip = $this->input->ip_address(),
          'user_id'=>$this->data['user_profile']['id'],
          'username'=>$this->data['user_profile']['username'],
          'time_record'=>date("Y-m-d H:i:s"),
          'description'=>'Search report client transaction record [User ID:'.$cust_id.']',
        );
        $this->db->insert('ci_audit_log',$data_log);
      }
    }
    $this->data['detail_order'] = $this->admin_model->get_detail_order();
    $this->template->load('layouts/admin','pages/dashboard', $this->data);
  }

  public function setting()
  {
    if (!$this->ion_auth->logged_in())
    {
      redirect('user/login', 'refresh');
    }

    if ($this->data['user_profile']['user_group'] == 3)
    {
      return show_404('The page you requested was not found.');
    }
    
    $this->data['title'] = 'Setting';
    $this->data['cost'] = $this->order_model->get_weightcost($this->data['shop']['seller_id']);
    $this->data['logo'] = $this->admin_model->get_logo();
    $this->data['footer'] = $this->admin_model->get_footer();
    $this->data['due'] = $this->admin_model->get_setting_day();
    $this->data['email'] = $this->admin_model->get_admin_email();
    $this->data['charge'] = $this->admin_model->get_admin_charge();
    $this->data['info'] = $this->admin_model->get_all_info();
    $this->data['commission'] = $this->admin_model->get_admin_commission();

    $this->template->load('layouts/admin','pages/setting_page', $this->data);
  }

  public function commission()
  {
    if (!$this->ion_auth->logged_in())
    {
      redirect('user/login', 'refresh');
    }
    $this->data['title'] = 'Commission';
    $this->data['claim_list']=$this->admin_model->get_claim();
    $this->data['claim_total']=$this->admin_model->total_claim();
    $this->data['rp_total']=$this->admin_model->total_payment();
    $this->data['comm_list']=$this->admin_model->get_all_comm();//latest
    $this->data['commission']=$this->admin_model->get_admin_commission();
    $this->data['shop_comm']=$this->admin_model->get_shop_comm();
    
    $this->template->load('layouts/admin','pages/list_commission', $this->data);
  }

  public function commission_claim()
  {
    $this->data['claim_list']=$this->admin_model->all_claim();

    $this->template->load('layouts/admin','pages/all_claim', $this->data);
  }

  public function payment()
  {
    $this->data['all_payments']=$this->admin_model->all_payments();

    $this->template->load('layouts/admin','pages/all_payments', $this->data);
  }

  public function store_email()
  {
    $this->db->insert('ci_email_admin',array('email'=>$this->input->post('admin_email')));
    redirect('admin/setting#7b','refresh');
  }

  public function del_email($id)
  {
    $this->db->where('row_id',$id);
    $this->db->delete('ci_email_admin');
    redirect('admin/setting#7b','refresh');
  }

  public function del_charge($id)
  {
    $this->db->where('id',$id);
    $this->db->delete('service_charge');
    redirect('admin/setting#7c','refresh');
  }

  public function store_days()
  {
    $due_id=$this->input->post('due_id');
    $day_complete = $this->input->post('day_to_complete');

    $this->db->where('id',$due_id);
    $this->db->update('ci_setting_status',array('day_to_complete'=>$day_complete));
    redirect('admin/setting#6b','refresh');
  }

  public function store_weightcost($var=''){
    $weightcost=array(
      'weightInitial_set'=>$this->input->post('weightInitial_set'),
      'weightFinal_set'=>$this->input->post('weightFinal_set'),
      'shipcost_set'=>$this->input->post('shipcost_set'),
      'area'=>$this->input->post('area'),
      'seller_id'=>$this->input->post('seller_id'),
    );
    $this->db->insert('ci_weightcost',$weightcost);

    if($var==1){
      redirect('catalog/shipping_rule/'.$this->input->post('seller_id'),'refresh');
    }else{
      redirect('admin/setting','refresh');
    }

  }

  public function update_weightcost($var=''){

    $weightcost_id=$this->input->post('weightcost_id');
    $upd_data=array(
      'weightInitial_set'=>$this->input->post('weightInitial_set'),
      'weightFinal_set'=>$this->input->post('weightFinal_set'),
      'shipcost_set'=>$this->input->post('shipcost_set'),
      'area'=>$this->input->post('area'),
    );
    $this->db->where('weightcost_id',$weightcost_id);
    $this->db->update('ci_weightcost',$upd_data);
    if($var==1){
      redirect('catalog/shipping_rule/'.$this->input->post('seller_id'),'refresh');
    }else{
      redirect('admin/setting','refresh');
    }
  }

  public function delete_weightcost($weightcost_id,$var=''){

    $this->db->where('weightcost_id',$weightcost_id);
    $this->db->delete('ci_weightcost');
    if($var!=''){
      redirect('catalog/shipping_rule/'.$var,'refresh');
    }else{
      redirect('admin/setting','refresh');
    }
  }

  public function get_weightcostID(){

    $weightcost_id = $this->input->post('weightcost_id');

    $this->data['cost'] = $this->order_model->get_weightcostDetail($weightcost_id);
    $this->load->view('pages/cost_detail', $this->data);
  }

  public function store_logo(){
    // Muat naik imej
    $config['upload_path'] = 'logo';
    $config['allowed_types']  = 'jpg|png|jpeg';
    // $config['max_width']  =  1500;
    // $config['max_height']  =  1500;
    $config['encrypt_name']  =  TRUE;
    $config['remove_spaces']  =  TRUE;
    $config['file_ext_tolower']  =  TRUE;
    $config['overwrite']  =  FALSE;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('userfile')) {

        $upload_data = $this->upload->data();
        $image_file = $upload_data['raw_name'] . $upload_data['file_ext'];

        // Simpan imej dalam database
        $imageData = array(
          'image_file' => $image_file,
          'status'=>1,
        );
          if($this->data['logo']['logo_id']!=''){
        $this->db->where('logo_id',$this->input->post('logo_id'));
        $this->db->update('ci_logo',$imageData);

        unlink("logo/".$this->input->post('temp_logo'));
      }else{
        $this->db->insert('ci_logo',$imageData);
      }

        //audit
        $data_log=array(
          'ip_address'=>$ip = $this->input->ip_address(),
          'user_id'=>$this->data['user_profile']['id'],
          'username'=>$this->data['user_profile']['username'],
          'time_record'=>date("Y-m-d H:i:s"),
          'description'=>'Upload logo',
        );
        $this->db->insert('ci_audit_log',$data_log);

        $m="Upload successful.";
      //   echo "<script type='text/javascript'>alert('$m');</script>";
      //   redirect('admin/setting#2b', 'refresh');
      echo "<script type='text/javascript'>alert('$m');window.location.href = '" . base_url() . "admin/setting#2b';</script>";
    }else{
      $m="Upload unsuccessful.";
      //  echo "<script type='text/javascript'>alert('$m');</script>";
      //  redirect('admin/setting#2b', 'refresh');
      echo "<script type='text/javascript'>alert('$m');window.location.href = '" . base_url() . "admin/setting#2b';</script>";
    }
  }

    public function store_banner(){

      // Muat naik imej

      $config['upload_path'] = 'banner';
      $config['allowed_types']  = 'jpg|png|jpeg';
      // $config['max_width']  =  1500;
      // $config['max_height']  =  1500;
      $config['encrypt_name']  =  TRUE;
      $config['remove_spaces']  =  TRUE;
      $config['file_ext_tolower']  =  TRUE;
      $config['overwrite']  =  FALSE;

      $this->load->library('upload', $config);
      if ($this->upload->do_upload('bannerFile')) {

        $upload_data = $this->upload->data();
        $image_file = $upload_data['raw_name'] . $upload_data['file_ext'];

        // Simpan imej dalam database
        $imageData = array(
          'file_name' => $image_file,
          'title'=>null,
          'description'=>null,
        );
        $this->db->insert('ci_banner',$imageData);

        //audit
        $data_log=array(
          'ip_address'=>$ip = $this->input->ip_address(),
          'user_id'=>$this->data['user_profile']['id'],
          'username'=>$this->data['user_profile']['username'],
          'time_record'=>date("Y-m-d H:i:s"),
          'description'=>'Upload banner',
        );
        $this->db->insert('ci_audit_log',$data_log);

        $m="Upload successful.";
        echo "<script type='text/javascript'>alert('$m');window.location.href = '" . base_url() . "admin/setting#3b';</script>";
      }else{
        $m="Upload unsuccessful.";
        echo "<script type='text/javascript'>alert('$m');window.location.href = '" . base_url() . "admin/setting#3b';</script>";
      }

    }

    public function upd_banner(){

      // Muat naik imej
      // $title=$this->input->post('title');
      // $description=$this->input->post('description');
      $banner_id=$this->input->post('banner_id');
      $config['upload_path'] = 'banner';
      $config['allowed_types']  = 'jpg|png|jpeg';
      // $config['max_width']  =  1500;
      // $config['max_height']  =  1500;
      $config['encrypt_name']  =  TRUE;
      $config['remove_spaces']  =  TRUE;
      $config['file_ext_tolower']  =  TRUE;
      $config['overwrite']  =  FALSE;

      $this->load->library('upload', $config);
      if ($this->upload->do_upload('bannerfile')) {

          $upload_data = $this->upload->data();
          $image_file = $upload_data['raw_name'] . $upload_data['file_ext'];

          // Simpan imej dalam database
          $imageData = array(
            'file_name' => $image_file,
            'title'=>null,
            'description'=>null,
          );
          $this->db->where('banner_id',$banner_id);
          $this->db->update('ci_banner',$imageData);

          if($this->input->post('temp_banner')!=''){
            unlink("banner/".$this->input->post('temp_banner'));
          }

          //audit
          $data_log=array(
            'ip_address'=>$ip = $this->input->ip_address(),
            'user_id'=>$this->data['user_profile']['id'],
            'username'=>$this->data['user_profile']['username'],
            'time_record'=>date("Y-m-d H:i:s"),
            'description'=>'Update banner',
          );
          $this->db->insert('ci_audit_log',$data_log);

          $m="Update successful.";
          //  echo "<script type='text/javascript'>alert('$m');</script>";
          //  redirect('admin/setting#3b', 'refresh');
          echo "<script type='text/javascript'>alert('$m');window.location.href = '" . base_url() . "admin/setting#3b';</script>";
      }else{
        $m="Update unsuccessful.";
      //   echo "<script type='text/javascript'>alert('$m');</script>";
      //   redirect('admin/setting#3b', 'refresh');
      echo "<script type='text/javascript'>alert('$m');window.location.href = '" . base_url() . "admin/setting#3b';</script>";
      }

    }


    public function get_bannerID(){
      $banner_id=$this->input->post('banner_id');
      $this->data['banner'] = $this->admin_model->get_bannerDetail($banner_id);
      $this->load->view('pages/banner_detail', $this->data);
    }

    public function get_claimID()
    {
      $claim_id=$this->input->post('claim_id');
      $this->data['claim'] = $this->admin_model->all_claim($claim_id);
      $this->load->view('pages/claim_detail', $this->data);
    }

    public function del_banner($banner_id,$banner_file){

      $this->db->where('banner_id',$banner_id);
      $this->db->delete('ci_banner');

      unlink("banner/".$banner_file);

      $data_log=array(
        'ip_address'=>$ip = $this->input->ip_address(),
        'user_id'=>$this->data['user_profile']['id'],
        'username'=>$this->data['user_profile']['username'],
        'time_record'=>date("Y-m-d H:i:s"),
        'description'=>'Delete banner',
      );
      $this->db->insert('ci_audit_log',$data_log);
      redirect('admin/setting#3b', 'refresh');
    }

    public function store_footer(){
      $arr_footer=array(
        'site_description'=>$this->input->post('site_description'),
        'facebook'=>$this->input->post('facebook'),
        'twitter'=>$this->input->post('twitter'),
        'instagram'=>$this->input->post('instagram'),
        'pinterest'=>$this->input->post('pinterest'),
        'about_us'=>$this->input->post('about_us'),
        'shipping_return'=>$this->input->post('shipping_return'),
        'shipping_guide'=>$this->input->post('shipping_guide'),
        'faq'=>$this->input->post('faq'),
        'stay_connected'=>$this->input->post('stay_connected'),
      );

      if($this->input->post('footer_id')){
        $this->db->where('footer_id',$this->input->post('footer_id'));
        $this->db->update('ci_footer',$arr_footer);
      }else{
        $this->db->insert('ci_footer',$arr_footer);
      }

      //audit
      $data_log=array(
        'ip_address'=>$ip = $this->input->ip_address(),
        'user_id'=>$this->data['user_profile']['id'],
        'username'=>$this->data['user_profile']['username'],
        'time_record'=>date("Y-m-d H:i:s"),
        'description'=>'Update footer',
      );

      $this->db->insert('ci_audit_log',$data_log);
      redirect('admin/setting#4b', 'refresh');
    }

    public function store_menu(){
      $arr_menu=array(
        'why_us'=>$this->input->post('why_us'),
        'contact_us'=>$this->input->post('contact_us'),
      );
      if($this->input->post('footer_id')){
        $this->db->where('footer_id',$this->input->post('footer_id'));
        $this->db->update('ci_footer',$arr_menu);
      }else{
        $this->db->insert('ci_footer',$arr_menu);
      }

      $info = array(
        'about_us' => $this->input->post('about_us'),
        'shipping' => $this->input->post('shipping'),
        'guide' => $this->input->post('guide'),
      );
      $this->db->where('id', 1);
      $this->db->update('ci_info', $info);
      
      //audit
      $data_log=array(
        'ip_address'=>$ip = $this->input->ip_address(),
        'user_id'=>$this->data['user_profile']['id'],
        'username'=>$this->data['user_profile']['username'],
        'time_record'=>date("Y-m-d H:i:s"),
        'description'=>'Update link menu',
      );
      $this->db->insert('ci_audit_log',$data_log);
      redirect('admin/setting#5b', 'refresh');
    }

    // print report
  public function print_dailyReport($type,$daily)
  {
    //audit
    $data_log=array(
      'ip_address'=>$ip = $this->input->ip_address(),
      'user_id'=>$this->data['user_profile']['id'],
      'username'=>$this->data['user_profile']['username'],
      'time_record'=>date("Y-m-d H:i:s"),
      'description'=>'Print report daily transaction record [Date:'.$daily.']',
    );
    $this->db->insert('ci_audit_log',$data_log);

    $this->data['all_report'] = $this->admin_model->get_daily_report($daily);
    $this->data['detail_order'] = $this->admin_model->get_detail_order();
    $this->data['date']=date("d F Y",strtotime($daily));
    //$this->template->load('layouts/admin','prints/print_daily_report', $this->data);
    $html=$this->load->view('prints/print_daily_report1', $this->data, TRUE);

    //$this->load->library('m_pdf');
    $pdfFilePath = 'Daily Transaction Record '.$this->data['date'].'.pdf';

    //define('_MPDF_TTFONTDATAPATH','uploads');
    // $this->m_pdf->showImageErrors = true;
    // $this->m_pdf->pdf->setFooter('Printed Date '.date('d/m/Y').' - Coffee-Fastlane.com');
    // $this->m_pdf->pdf->AddPage('L');
    // $this->m_pdf->pdf->WriteHTML($html);
    // $this->m_pdf->pdf->Output($pdfFilePath, 'I');
    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
    $mpdf->setFooter('Printed Date '.date('d/m/Y').' - Coffee-Fastlane.com');
    $mpdf->AddPage('L');
    $mpdf->WriteHTML($html);
    $mpdf->Output($pdfFilePath, 'I');
  }

  public function print_dailyVendorReport($type,$daily)
  {
    //audit
    $data_log=array(
      'ip_address'=>$ip = $this->input->ip_address(),
      'user_id'=>$this->data['user_profile']['id'],
      'username'=>$this->data['user_profile']['username'],
      'time_record'=>date("Y-m-d H:i:s"),
      'description'=>'Print daily sales report according seller [Date:'.$daily.']',
    );
    $this->db->insert('ci_audit_log',$data_log);

    $this->data['detail_order'] = $this->admin_model->get_detail_order();
    $this->data['date']=date("d F Y",strtotime($daily));
    $this->data['all_report'] = $this->admin_model->get_dailyVendor_report($daily);
    $this->data['data_seller'] = $this->user_model->get_seller();
    //$this->template->load('layouts/admin','prints/print_dailyVendor_report', $this->data);
    $html=$this->load->view('prints/print_dailyVendor_report1', $this->data, TRUE);

    // $this->load->library('m_pdf');
    $pdfFilePath = 'Daily Sales Report Sorted According To Seller '.$this->data['date'].'.pdf';

    // define('_MPDF_TTFONTDATAPATH','uploads');
    // $this->m_pdf->showImageErrors = true;
    // $this->m_pdf->pdf->setFooter('Printed Date '.date('d/m/Y').' - Coffee-Fastlane.com');
    // $this->m_pdf->pdf->AddPage('L');
    // $this->m_pdf->pdf->WriteHTML($html);
    // $this->m_pdf->pdf->Output($pdfFilePath, 'I');
    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
    $mpdf->setFooter('Printed Date '.date('d/m/Y').' - Coffee-Fastlane.com');
    $mpdf->AddPage('L');
    $mpdf->WriteHTML($html);
    $mpdf->Output($pdfFilePath, 'I');

  }

  public function print_dailyOrderVendorReport($seller_id,$daily)
  {
    //audit
    $data_log=array(
      'ip_address'=>$ip = $this->input->ip_address(),
      'user_id'=>$this->data['user_profile']['id'],
      'username'=>$this->data['user_profile']['username'],
      'time_record'=>date("Y-m-d H:i:s"),
      'description'=>'Print report vendor daily order [Seller ID:'.$seller_id.',Date:'.$daily.']',
    );
    $this->db->insert('ci_audit_log',$data_log);

    $this->data['detail_order'] = $this->admin_model->get_detail_order();
    $this->data['date']=date("d F Y",strtotime($daily));
    $this->data['all_report'] = $this->admin_model->get_dailyOrderVendor_report($daily);
    $this->data['seller_id'] = $seller_id;
    $this->data['data_seller'] = $this->user_model->get_detail_seller($seller_id);

    //$this->template->load('layouts/admin','prints/print_dailyOrderVendor_report', $this->data);
    $html=$this->load->view('prints/print_dailyOrderVendor_report1', $this->data, TRUE);

    // $this->load->library('m_pdf');
    $pdfFilePath = 'Daily Order Report '.$this->data['data_seller']['shop_name'].' on '.$this->data['date'].'.pdf';

    // define('_MPDF_TTFONTDATAPATH','uploads');
    // $this->m_pdf->showImageErrors = true;
    // $this->m_pdf->pdf->setFooter('Printed Date '.date('d/m/Y').' - Coffee-Fastlane.com');
    // $this->m_pdf->pdf->AddPage('L');
    // $this->m_pdf->pdf->WriteHTML($html);
    // $this->m_pdf->pdf->Output($pdfFilePath, 'I');
    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
    $mpdf->setFooter('Printed Date '.date('d/m/Y').' - Coffee-Fastlane.com');
    $mpdf->AddPage('L');
    $mpdf->WriteHTML($html);
    $mpdf->Output($pdfFilePath, 'I');
  }

  public function print_productDailyOrderReport($category_id,$daily)
  {
    //audit
    $data_log=array(
      'ip_address'=>$ip = $this->input->ip_address(),
      'user_id'=>$this->data['user_profile']['id'],
      'username'=>$this->data['user_profile']['username'],
      'time_record'=>date("Y-m-d H:i:s"),
      'description'=>'Print report product type daily order [Category ID:'.$category_id.',Date:'.$daily.']',
    );
    $this->db->insert('ci_audit_log',$data_log);

    $this->data['detail_order'] = $this->admin_model->get_detail_order();
    $this->data['date']=date("d F Y",strtotime($daily));
    $this->data['all_report'] = $this->admin_model->get_productDailyOrder_report($daily);
    $this->data['category_id'] = $category_id;
    $this->data['data_pType'] = $this->product_model->get_productCategory($category_id);

    //$this->template->load('layouts/admin','prints/print_dailyOrderVendor_report', $this->data);
    $html=$this->load->view('prints/print_productDailyOrder_report1', $this->data, TRUE);

    // $this->load->library('m_pdf');
    $pdfFilePath = 'Daily Order Report '.$this->data['data_pType']['category_type'].' on '.$this->data['date'].'.pdf';

    // define('_MPDF_TTFONTDATAPATH','uploads');
    // $this->m_pdf->showImageErrors = true;
    // $this->m_pdf->pdf->setFooter('Printed Date '.date('d/m/Y').' - Coffee-Fastlane.com');
    // $this->m_pdf->pdf->AddPage('L');
    // $this->m_pdf->pdf->WriteHTML($html);
    // $this->m_pdf->pdf->Output($pdfFilePath, 'I');
    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
    $mpdf->setFooter('Printed Date '.date('d/m/Y').' - Coffee-Fastlane.com');
    $mpdf->AddPage('L');
    $mpdf->WriteHTML($html);
    $mpdf->Output($pdfFilePath, 'I');
  }

  public function print_monthlySalesReport($bulan,$tahun,$seller)
  {
    //audit
    $data_log=array(
      'ip_address'=>$ip = $this->input->ip_address(),
      'user_id'=>$this->data['user_profile']['id'],
      'username'=>$this->data['user_profile']['username'],
      'time_record'=>date("Y-m-d H:i:s"),
      'description'=>'Print monthly sales report [Month:'.$bulan.',Year:'.$tahun.']',
    );
    $this->db->insert('ci_audit_log',$data_log);
    //$this->data['detail_order'] = $this->admin_model->get_detail_order();
    //$daily= date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('report_productDaily'))));
    $this->data['all_report'] = $this->admin_model->get_monthlySales_report($bulan,$tahun,$seller);
    if($bulan==1){
      $this->data['b']="January";
    }elseif($bulan==2){
      $this->data['b']="February";
    }elseif($bulan==3){
      $this->data['b']="March";
    }elseif($bulan==4){
      $this->data['b']="April";
    }elseif($bulan==5){
      $this->data['b']="May";
    }elseif($bulan==6){
      $this->data['b']="June";
    }elseif($bulan==7){
      $this->data['b']="July";
    }elseif($bulan==8){
      $this->data['b']="August";
    }elseif($bulan==9){
      $this->data['b']="September";
    }elseif($bulan==10){
      $this->data['b']="October";
    }elseif($bulan==11){
      $this->data['b']="November";
    }elseif($bulan==12){
      $this->data['b']="December";
    }else {
      $this->data['b']="";
    }
    $this->data['bln']=$bulan;
    $this->data['t']=$tahun;

    //$this->template->load('layouts/admin','prints/print_monthlySales_report', $this->data);
    $html=$this->load->view('prints/print_monthlySales_report1', $this->data, TRUE);

    // $this->load->library('m_pdf');
    $pdfFilePath = 'Sales Report '.$this->data['b'].' '.$this->data['t'].'.pdf';

    // define('_MPDF_TTFONTDATAPATH','uploads');
    // $this->m_pdf->showImageErrors = true;
    // $this->m_pdf->pdf->setFooter('Printed Date '.date('d/m/Y').' - Coffee-Fastlane.com');
    // $this->m_pdf->pdf->AddPage('L');
    // $this->m_pdf->pdf->WriteHTML($html);
    // $this->m_pdf->pdf->Output($pdfFilePath, 'I');
    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
    $mpdf->setFooter('Printed Date '.date('d/m/Y').' - Coffee-Fastlane.com');
    $mpdf->AddPage('L');
    $mpdf->WriteHTML($html);
    $mpdf->Output($pdfFilePath, 'I');
  }

  public function print_vendorMonthlySalesReport($seller_id,$bulan,$tahun)
  {
    //audit
    $data_log=array(
      'ip_address'=>$ip = $this->input->ip_address(),
      'user_id'=>$this->data['user_profile']['id'],
      'username'=>$this->data['user_profile']['username'],
      'time_record'=>date("Y-m-d H:i:s"),
      'description'=>'Print seller monthly sales report [Seller ID:'.$seller_id.',Month:'.$bulan.',Year:'.$tahun.']',
    );
    $this->db->insert('ci_audit_log',$data_log);
    $this->data['seller_id']=$seller_id;
    $this->data['all_report'] = $this->admin_model->get_vendorMonthlySales_report($seller_id,$bulan,$tahun);
    $this->data['data_seller'] = $this->user_model->get_detail_seller($seller_id);
    if($bulan==1){
      $this->data['b']="January";
    }elseif($bulan==2){
      $this->data['b']="February";
    }elseif($bulan==3){
      $this->data['b']="March";
    }elseif($bulan==4){
      $this->data['b']="April";
    }elseif($bulan==5){
      $this->data['b']="May";
    }elseif($bulan==6){
      $this->data['b']="June";
    }elseif($bulan==7){
      $this->data['b']="July";
    }elseif($bulan==8){
      $this->data['b']="August";
    }elseif($bulan==9){
      $this->data['b']="September";
    }elseif($bulan==10){
      $this->data['b']="October";
    }elseif($bulan==11){
      $this->data['b']="November";
    }elseif($bulan==12){
      $this->data['b']="December";
    }
    $this->data['bln']=$bulan;
    $this->data['t']=$tahun;

    //$this->template->load('layouts/admin','prints/print_dailyOrderVendor_report', $this->data);
    $html=$this->load->view('prints/print_vendorMonthlySales_report1', $this->data, TRUE);

    // $this->load->library('m_pdf');
    $pdfFilePath = 'Monthly Sales Report for '.$this->data['data_seller']['shop_name'].' '.$this->data['b'].' '.$this->data['t'].'.pdf';

    // define('_MPDF_TTFONTDATAPATH','uploads');
    // $this->m_pdf->showImageErrors = true;
    // $this->m_pdf->pdf->setFooter('Printed Date '.date('d/m/Y').' - Coffee-Fastlane.com');
    // $this->m_pdf->pdf->AddPage('L');
    // $this->m_pdf->pdf->WriteHTML($html);
    // $this->m_pdf->pdf->Output($pdfFilePath, 'I');
    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
    $mpdf->setFooter('Printed Date '.date('d/m/Y').' - Coffee-Fastlane.com');
    $mpdf->AddPage('L');
    $mpdf->WriteHTML($html);
    $mpdf->Output($pdfFilePath, 'I');
  }

  public function print_vendorLists()
  {
    //audit
    $data_log=array(
      'ip_address'=>$ip = $this->input->ip_address(),
      'user_id'=>$this->data['user_profile']['id'],
      'username'=>$this->data['user_profile']['username'],
      'time_record'=>date("Y-m-d H:i:s"),
      'description'=>'Print vendors list report',
    );
    $this->db->insert('ci_audit_log',$data_log);

    $this->data['all_report']=$this->user_model->get_seller();
    //$this->template->load('layouts/admin','prints/print_dailyOrderVendor_report', $this->data);
    $html=$this->load->view('prints/print_vendorList_report', $this->data, TRUE);

    // $this->load->library('m_pdf');
    $pdfFilePath = 'Sellers List Record.pdf';

    // define('_MPDF_TTFONTDATAPATH','uploads');
    // $this->m_pdf->showImageErrors = true;
    // $this->m_pdf->pdf->setFooter('Printed Date '.date('d/m/Y').' - Coffee-Fastlane.com');
    // $this->m_pdf->pdf->AddPage('L');
    // $this->m_pdf->pdf->WriteHTML($html);
    // $this->m_pdf->pdf->Output($pdfFilePath, 'I');
    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
    $mpdf->setFooter('Printed Date '.date('d/m/Y').' - Coffee-Fastlane.com');
    $mpdf->AddPage('L');
    $mpdf->WriteHTML($html);
    $mpdf->Output($pdfFilePath, 'I');
  }

  public function print_vendorProductLists($seller_id)
  {
    //audit
    $data_log=array(
      'ip_address'=>$ip = $this->input->ip_address(),
      'user_id'=>$this->data['user_profile']['id'],
      'username'=>$this->data['user_profile']['username'],
      'time_record'=>date("Y-m-d H:i:s"),
      'description'=>'Print seller product list report [Seller ID:'.$seller_id.']',
    );
    $this->db->insert('ci_audit_log',$data_log);

    $this->data['all_report'] = $this->admin_model->get_vendorProductList($seller_id);
    $this->data['data_seller'] = $this->user_model->get_detail_seller($seller_id);

    //$this->template->load('layouts/admin','prints/print_dailyOrderVendor_report', $this->data);
    $html=$this->load->view('prints/print_vendorProductList_report', $this->data, TRUE);

    // $this->load->library('m_pdf');
    $pdfFilePath = 'Products List for '.$this->data['data_seller']['shop_name'].'.pdf';

    // define('_MPDF_TTFONTDATAPATH','uploads');
    // $this->m_pdf->showImageErrors = true;
    // $this->m_pdf->pdf->setFooter('Printed Date '.date('d/m/Y').' - Coffee-Fastlane.com');
    // $this->m_pdf->pdf->AddPage('L');
    // $this->m_pdf->pdf->WriteHTML($html);
    // $this->m_pdf->pdf->Output($pdfFilePath, 'I');
    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
    $mpdf->setFooter('Printed Date '.date('d/m/Y').' - Coffee-Fastlane.com');
    $mpdf->AddPage('L');
    $mpdf->WriteHTML($html);
    $mpdf->Output($pdfFilePath, 'I');
  }

  public function print_clientLists()
  {
    //audit
    $data_log=array(
      'ip_address'=>$ip = $this->input->ip_address(),
      'user_id'=>$this->data['user_profile']['id'],
      'username'=>$this->data['user_profile']['username'],
      'time_record'=>date("Y-m-d H:i:s"),
      'description'=>'Print clients list report',
    );
    $this->db->insert('ci_audit_log',$data_log);

    $this->data['all_report'] = $this->admin_model->get_clientsList();
    //$this->template->load('layouts/admin','prints/print_clientList_report', $this->data);
    $html=$this->load->view('prints/print_clientList_report', $this->data, TRUE);

    // $this->load->library('m_pdf');
    $pdfFilePath = 'Clients List Record.pdf';

    // define('_MPDF_TTFONTDATAPATH','uploads');
    // $this->m_pdf->showImageErrors = true;
    // $this->m_pdf->pdf->setFooter('Printed Date '.date('d/m/Y').' - Coffee-Fastlane.com');
    // $this->m_pdf->pdf->AddPage('L');
    // $this->m_pdf->pdf->WriteHTML($html);
    // $this->m_pdf->pdf->Output($pdfFilePath, 'I');
  }

  public function print_clientTransaction($cust_id)
  {
    //audit
    $data_log=array(
      'ip_address'=>$ip = $this->input->ip_address(),
      'user_id'=>$this->data['user_profile']['id'],
      'username'=>$this->data['user_profile']['username'],
      'time_record'=>date("Y-m-d H:i:s"),
      'description'=>'Print report client transaction record [User ID:'.$cust_id.']',
    );
    $this->db->insert('ci_audit_log',$data_log);

    $this->data['all_report'] = $this->admin_model->get_clientsTransaction($cust_id);
    $this->data['data_client']=$this->admin_model->get_clientsList($cust_id);
    $this->data['detail_order'] = $this->admin_model->get_detail_order();
    //$this->template->load('layouts/admin','prints/print_clientTransaction_report', $this->data);
    $html=$this->load->view('prints/print_clientTransaction_report1', $this->data, TRUE);

    // $this->load->library('m_pdf');
    $pdfFilePath = 'Transactions Record - '.$this->data['data_client']['full_name'].'.pdf';

    // define('_MPDF_TTFONTDATAPATH','uploads');
    // $this->m_pdf->showImageErrors = true;
    // $this->m_pdf->pdf->setFooter('Printed Date '.date('d/m/Y').' - Coffee-Fastlane.com');
    // $this->m_pdf->pdf->AddPage('L');
    // $this->m_pdf->pdf->WriteHTML($html);
    // $this->m_pdf->pdf->Output($pdfFilePath, 'I');
    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
    $mpdf->setFooter('Printed Date '.date('d/m/Y').' - Coffee-Fastlane.com');
    $mpdf->AddPage('L');
    $mpdf->WriteHTML($html);
    $mpdf->Output($pdfFilePath, 'I');
  }

  //audit trails
  public function audit()
  {
    if (!$this->ion_auth->logged_in())
    {
      redirect('user/login', 'refresh');
    }
    $this->data['title'] = 'Audit Trails';
    $this->data['audit'] = $this->admin_model->get_audit();
    $this->template->load('layouts/admin','pages/audit_page', $this->data);
  }

  public function audit_report()
  {
    if (!$this->ion_auth->logged_in())
    {
      redirect('user/login', 'refresh');
    }
    $this->data['title'] = 'Reports';
    $dir = $_SERVER['DOCUMENT_ROOT'].'/shop/audit_trail_report/';
    $this->data['audit'] = scandir($dir);
    $this->template->load('layouts/admin','pages/audit_report', $this->data);
  }

  function download($file){
    $this->load->helper('download');
    $pth    =   'audit_trail_report/'.$file;
    // $nme    =   $file;
     force_download($pth, NULL);
  }

  public function print_auditTrails($var='')
  {
    //audit
    // $data_log=array(
    //   'ip_address'=>$ip = $this->input->ip_address(),
    //   'user_id'=>$this->data['user_profile']['id'],
    //   'username'=>$this->data['user_profile']['username'],
    //   'time_record'=>date("Y-m-d H:i:s"),
    //   'description'=>'Print report client transaction record [User ID:'.$cust_id.']',
    // );
    // $this->db->insert('ci_audit_log',$data_log);

    $this->data['audit'] = $this->admin_model->get_audit();
    //$this->template->load('layouts/admin','prints/print_clientTransaction_report', $this->data);
    $html=$this->load->view('prints/print_audit_trails', $this->data, TRUE);

    //$this->load->library('m_pdf');
    if($var!=''){
        $pdfFilePath = 'Audit Trails Record '.date("d-m-y").'.pdf';
    }else{
        $pdfFilePath = date("m-y",strtotime("- 1 month")).'_Audit_Trails_Record.pdf';
    }

    // define('_MPDF_TTFONTDATAPATH','uploads');
    // $this->m_pdf->showImageErrors = true;
    // $this->m_pdf->pdf->setFooter('Printed Date '.date('d/m/Y').' - Coffee-Fastlane.com');
    // $this->m_pdf->pdf->AddPage('P');
    // $this->m_pdf->pdf->WriteHTML($html);
    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
    $mpdf->setFooter('Printed Date '.date('d/m/Y').' - Coffee-Fastlane.com');
    $mpdf->AddPage('L');
    $mpdf->WriteHTML($html);

    if($var!=''){
        //$this->m_pdf->pdf->Output($pdfFilePath,'I');
        $mpdf->Output($pdfFilePath, 'I');
    }else{
        $loc=$_SERVER['DOCUMENT_ROOT'].'/shop/audit_trail_report/';
        $this->m_pdf->pdf->Output($loc.$pdfFilePath);
        $this->db->truncate('ci_audit_log');
    }
  }

  public function store_commission()
  {
    $data = array(
      'referrel' => $this->input->post('comm_referrel'),
      'member' => $this->input->post('comm_member'),
      'rebate' => $this->input->post('comm_rebate'),
      'min_sc' => $this->input->post('min_sc'),
    );
    $this->db->where('id', 1);
    $this->db->update('ci_commission', $data);
    
    redirect('admin/setting','refresh');
  }

  public function claim_comm()
  {

    $config['upload_path'] = 'images';
    $config['allowed_types']  = 'jpg|png|jpeg';
    $config['encrypt_name']  =  TRUE;
    $config['remove_spaces']  =  TRUE;
    $config['file_ext_tolower']  =  TRUE;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('verify_ic')) {

      $upload_data = $this->upload->data();
      $image_file = $upload_data['raw_name'] . $upload_data['file_ext'];

      // Simpan imej dalam database
      $imageData = array(
        'verify_image' => $image_file,
      );
      $this->db->where('id', $this->data['user_profile']['id']);
      $this->db->update('ci_users', $imageData);

      $this->load->library('image_lib');

      /* First size */
      $configSize1['image_library']   = 'gd2';
      $configSize1['source_image']    = 'images/'.$image_file;
      $configSize1['maintain_ratio']  = TRUE;
      $configSize1['width']           = 500;
      $configSize1['height']          = 500;
      $configSize1['new_image']       = 'images/verify/'.$image_file;
     
      $this->image_lib->initialize($configSize1);
      $this->image_lib->resize();
      $this->image_lib->clear();
      
      $config['source_image'] = 'images/verify/'.$image_file;
      $config['wm_overlay_path'] = 'images/verify/sample.png';
      $config['wm_type'] = 'overlay';

      $this->image_lib->initialize($config);

      $this->image_lib->watermark();
    }

    $object = array(
      'amount' => '-'.$this->input->post('amount'),
      'shop_id' => $this->input->post('seller_id'),
      'category' => 4,
      'status' => 0,
      'req_date' => date('Y-m-d H:i:s'),
      'pay_date' => NULL,
    );
    $this->db->insert('new_transaction', $object);
    

    $m="Claimed successful";
    echo "<script type='text/javascript'>alert('$m');window.location.href = '" . base_url() . "report/claims';</script>";
  }

  public function claim_comm_member()
  {
    $config['upload_path'] = 'images/';
    $config['allowed_types']  = 'jpg|png|jpeg';
    // $config['max_width']  =  1500;
    // $config['max_height']  =  1500;
    $config['encrypt_name']  =  TRUE;
    $config['remove_spaces']  =  TRUE;
    $config['file_ext_tolower']  =  TRUE;
    // $config['overwrite']  =  FALSE;

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('verify_ic')) {

      $upload_data = $this->upload->data();
      $image_file = $upload_data['raw_name'] . $upload_data['file_ext'];

      // Simpan imej dalam database
      $imageData = array(
        'verify_image' => $image_file,
      );
      $this->db->where('id', $this->data['user_profile']['id']);
      $this->db->update('ci_users', $imageData);

      $this->load->library('image_lib');

      /* First size */
      $configSize1['image_library']   = 'gd2';
      $configSize1['source_image']    = 'images/'.$image_file;
      $configSize1['maintain_ratio']  = TRUE;
      $configSize1['width']           = 500;
      $configSize1['height']          = 500;
      $configSize1['new_image']       = 'images/verify/'.$image_file;
     
      $this->image_lib->initialize($configSize1);
      $this->image_lib->resize();
      $this->image_lib->clear();
      
      $config['source_image'] = 'images/verify/'.$image_file;
      $config['wm_overlay_path'] = 'images/verify/sample.png';
      $config['wm_type'] = 'overlay';

      // create gambar watermark
      $this->image_lib->initialize($config);
      $this->image_lib->watermark();

      // delete gambar asal
      unlink("images/".$image_file);
    }

    $object = array(
      'amount' => '-'.$this->input->post('amount'),
      'user_id' => $this->input->post('member_id'),
      'category' => 4,
      'status' => 0,
      'req_date' => date('Y-m-d H:i:s'),
      'pay_date' => NULL,
    );
    $this->db->insert('new_transaction', $object);

    $m="Claimed successful";
    echo "<script type='text/javascript'>alert('$m');window.location.href = '" . base_url() . "member/comissions';</script>";
  }

  public function claim_comm_upd()
  {
    $claim_id = $this->input->post('claim_id');
    $payment_type = $this->input->post('payment_type');
    $note = $this->input->post('note');
    $user_id = $this->input->post('user_id');

    $update = array(
      'verify_wallet' => 1,
    );
    $this->db->where('id', $user_id);
    $this->db->update('ci_users', $update);

    $object = array(
      'status' => 1,
      'pay_date' => date('Y-m-d H:i:s'),
      'pay_type' => $payment_type,
      'note' => $note,
    );
    $this->db->where('id', $claim_id);
    $this->db->update('new_transaction', $object);
    
    redirect('report/claims','refresh');
  }

  public function store_charge()
  {
    $object = array(
      'min' => $this->input->post('min'),
      'charge' => $this->input->post('charge'),
    );
    $this->db->insert('service_charge', $object);

    redirect('admin/setting','refresh');    
  }

}
