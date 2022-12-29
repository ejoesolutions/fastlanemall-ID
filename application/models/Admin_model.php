<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function fetch_data($start,$limit)
  {

   $this->db->limit($start, $limit);
   $this->query = $this->db->get('vu_products_list');
   if ($this->query->num_rows() > 0) {
     foreach ($this->query->result() as $row) {
       $data[] = $row;
     }
     return $data;
   }
   return false;
  }

  public function get_logo() //use
  {
    $this->db->where('status',1);
    $this->query = $this->db->get('ci_logo');
    if ($this->query->num_rows() > 0) {
      return $this->query->row_array();
    }
  }

  public function get_banner() //use
  {
    //$this->db->where('status',1);
    $this->query = $this->db->get('ci_banner');
    if ($this->query->num_rows() > 0) {
      return $this->query->result_array();
    }
  }


  public function get_bannerDetail($banner_id)
  {
    $this->db->where('banner_id',$banner_id);
    $this->query = $this->db->get('ci_banner');
    if ($this->query->num_rows() > 0) {
      return $this->query->row_array();
    }
  }

  public function get_footer()
  {
    $this->query = $this->db->get('ci_footer');
    if ($this->query->num_rows() > 0) {
      return $this->query->row_array();
    }
  }

  //report
  public function count_order($seller_id='') //use
  {
    if($seller_id!=''){
      $this->db->where('seller_id',$seller_id);
    }
    $this->db->select('count(seller_id) as total');
    $this->query = $this->db->get('ci_order_status');
    if ($this->query->num_rows() > 0) {
      return $this->query->row_array();
    }
  }

  public function count_seller() //use
  {
    $this->db->where('seller_status',1);
    $this->db->select('count(seller_id) as total');
    $this->query = $this->db->get('ci_seller');
    if ($this->query->num_rows() > 0) {
      return $this->query->row_array();
    }
  }

  public function count_product($seller_id='') //use
  {
    if($seller_id!=''){
      $this->db->where('seller_id',$seller_id);
    }
    $this->db->select('count(product_id) as total');
    $this->query = $this->db->get('vu_products_list');
    if ($this->query->num_rows() > 0) {
      return $this->query->row_array();
    }
  }

  public function count_sale($seller_id='') //use
  {
    if($seller_id!=''){
      $this->db->where('seller_id',$seller_id);
    }
    $this->db->select('sum(qty) as total');
    $this->query = $this->db->get('sale_report');
    if ($this->query->num_rows() > 0) {
      return $this->query->row_array();
    }
  }

  public function count_sale_value($seller_id='') //use
  {
    if($seller_id!=''){
      $this->db->where('seller_id',$seller_id);
    }
    $this->db->select('sum(sale_price) as total');
    $this->query = $this->db->get('sale_report');
    if ($this->query->num_rows() > 0) {
      return $this->query->row_array();
    }
  }

  public function count_customer() //use
  {
    $this->db->where('user_group',2);
    $this->db->select('count(id) as total');
    $this->query = $this->db->get('ci_users');
    if ($this->query->num_rows() > 0) {
      return $this->query->row_array();
    }
  }

  public function get_vendor_list()
  {
    $this->db->where('vendor_status',1);
    $this->query = $this->db->get('ci_vendor');
    if ($this->query->num_rows() > 0) {
      return $this->query->result_array();
    }
  }

  public function get_all_report_sale($vendor_id='',$bulan='',$tahun='')
  {
    //$this->db->where('vendor_status',1);
    if($vendor_id){
      $this->db->where('vendor_id',$vendor_id);
    }
    if($bulan){
      $this->db->where('MONTH(created_date)', $bulan);
    }
    if($tahun){
      $this->db->where('YEAR(created_date)', $tahun);
    }
    $this->query = $this->db->get('sale_report');
    if ($this->query->num_rows() > 0) {
      return $this->query->result_array();
    }
  }

  public function get_product_sale()
  {
    $this->query = $this->db->get('product_sale');
    if ($this->query->num_rows() > 0) {
      return $this->query->result_array();
    }
  }

  public function get_year_order() //use
  {
    $this->db->DISTINCT();
    $this->db->select('YEAR(created_date) as tahun');
    $this->query  = $this->db->get('generate_report')->result_array();

    if(is_array( $this->query ) && count( $this->query ) > 0) {
      $return[''] = 'Choose Year';
      foreach($this->query as $row)
      {
        $return[$row['tahun']] = strtoupper($row['tahun']);
      }
      return $return;
    }else{
      $return[''] = 'Choose Year';
      return $return;
    }
  }

    public function dropdown_seller($general='') //use
  {
    //$this->db->order_by('ci_metal.metal_id', 'asc');
    $this->db->where('seller_status',1);
    $this->query  = $this->db->get('data_seller')->result_array();
    if(is_array( $this->query ) && count( $this->query ) > 0)
    {
      $return[''] = 'Choose Seller';
      foreach($this->query as $row)
      {
        $return[$row['seller_id']] = strtoupper($row['shop_name']);
      }
      return $return;
    }
  }

  public function get_month_order()
  {
    $bulan = array(
      "" => 'Choose Month',
      "01" => 'January',
      "02" => 'February',
      "03" => 'March',
      "04" => 'April',
      "05" => 'May',
      "06" => 'June',
      "07" => 'July',
      "08" => 'August',
      "09" => 'September',
      "10" => 'October',
      "11" => 'November',
      "12" => 'December'
    );
    return $bulan;
  }

  //report
  public function get_daily_report($daily='')
  {
    if($daily){
      $this->db->where('DATE(created_date)',$daily);
      //$this->db->where('status',4);
    }

    $this->query = $this->db->get('generate_report');
    if ($this->query->num_rows() > 0) {
      return $this->query->result_array();
    }
  }

  public function get_detail_order()
  {
    $this->query = $this->db->get('view_order');
    if ($this->query->num_rows() > 0) {
      return $this->query->result_array();
    }
  }

  public function get_dailyVendor_report($daily='')
  {
    if($daily){
      $this->db->where('DATE(created_date)',$daily);
      //$this->db->where('status',4);
    }

    $this->query = $this->db->get('generate_report');
    if ($this->query->num_rows() > 0) {
      return $this->query->result_array();
    }
  }

  public function get_dailyOrderVendor_report($daily='')
  {
    if($daily){
      $this->db->where('DATE(created_date)',$daily);
      //$this->db->where('status',4);
    }

    $this->query = $this->db->get('generate_report');
    if ($this->query->num_rows() > 0) {
      return $this->query->result_array();
    }
  }

  public function get_productType() //use
  {
    $this->query  = $this->db->get('ci_category')->result_array();
    if(is_array( $this->query ) && count( $this->query ) > 0)
    {
      $return[''] = 'Choose Product Type';
      foreach($this->query as $row)
      {
        $return[$row['category_id']] = strtoupper($row['category_type']);
      }
      return $return;
    }
  }

  public function get_productDailyOrder_report($daily='')
  {
    if($daily){
      $this->db->where('DATE(created_date)',$daily);
      //$this->db->where('status',4);
    }

    $this->query = $this->db->get('generate_report');
    if ($this->query->num_rows() > 0) {
      return $this->query->result_array();
    }
  }

  public function get_monthlySales_report($bulan,$tahun,$seller)
  {
    if ($bulan) {
      $this->db->where('MONTH(created_date)',$bulan);
    }
    if ($tahun) {
      $this->db->where('YEAR(created_date)',$tahun);
    }
    if ($seller) {
      $this->db->where('seller_id',$seller);
    }
    $this->db->order_by('seller_id','asc');
    $this->query = $this->db->get('generate_report');
    if ($this->query->num_rows() > 0) {
      return $this->query->result_array();
    }
  }

  public function get_vendorMonthlySales_report($seller_id,$bulan,$tahun)
  {
    if ($bulan) {
      $this->db->where('MONTH(created_date)',$bulan);
    }
    $this->db->where('YEAR(created_date)',$tahun);
    $this->db->where('seller_id',$seller_id);

    $this->query = $this->db->get('generate_report');
    if ($this->query->num_rows() > 0) {
      return $this->query->result_array();
    }
  }

  public function get_vendorProductList($seller_id)
  {
    $this->db->where('seller_id',$seller_id);
    $this->query = $this->db->get('vu_products_list');
    if ($this->query->num_rows() > 0) {
      return $this->query->result_array();
    }
  }

  public function get_clientsList($cust_id='')
  {
    $this->db->where('user_group',2);
    if($cust_id){
      $this->db->where('id',$cust_id);
      $this->query = $this->db->get('data_user');
      if ($this->query->num_rows() > 0) {
        return $this->query->row_array();
      }
    }else{
      $this->query = $this->db->get('data_user');
      if ($this->query->num_rows() > 0) {
        return $this->query->result_array();
      }
    }
  }

  public function list_clients()
  {
    $this->db->where('user_group',2);
    $this->query  = $this->db->get('data_user')->result_array();

    if(is_array( $this->query ) && count( $this->query ) > 0)
    {
      $return[''] = 'Choose Client';
      foreach($this->query as $row)
      {
        $return[$row['id']] = strtoupper($row['full_name'])." [".$row['ahli_id']."]";
      }
      return $return;
    }
  }


  public function get_clientsTransaction($cust_id)
  {
    $this->db->where('created_by',$cust_id);
    //$this->db->where('status',4);
    $this->query = $this->db->get('generate_report');
    if ($this->query->num_rows() > 0) {
      return $this->query->result_array();
    }
  }

  //audit
  public function get_audit()
  {
    $this->query = $this->db->get('ci_audit_log');
    if ($this->query->num_rows() > 0) {
      return $this->query->result_array();
    }
  }

  public function get_setting_day()
  {
    $this->query = $this->db->get('ci_setting_status');
    if ($this->query->num_rows() > 0) {
      return $this->query->row_array();
    }
  }

  public function get_admin_email()
  {
    $this->query = $this->db->get('ci_email_admin');
    if ($this->query->num_rows() > 0) {
      return $this->query->result_array();
    }
  }

  public function get_admin_charge()
  {
    $this->db->order_by('min', 'asc');
    $this->query = $this->db->get('service_charge');
    if ($this->query->num_rows() > 0) {
      return $this->query->result_array();
    }
  }

  public function get_admin_commission()
  {
    $this->query = $this->db->get('ci_commission');
    if ($this->query->num_rows() > 0) {
      return $this->query->row_array();
    }
  }

  public function check_charge($rm)
  {
    $this->db->where('min <=', $rm);
    $this->db->order_by('min', 'desc');
    $query = $this->db->get('service_charge');
    $ret = $query->row();
    return $ret->charge;
  }

  public function get_all_comm()
  {
    if ($this->data['shop']['seller_id']) {
      $this->db->where('coi.referrel', $this->data['shop']['seller_id']);
    }
    
    $this->db->where('coi.referrel !=', 0);
    $this->db->where('coi.referrel !=', NULL);
    $this->db->where('cos.order_status', 4);
    $this->db->select('
      coi.order_id,
      coi.ordered_price,
      coi.seller_price,
      cp.product_name,
      cs.shop_name,
      cup2.full_name as refer_name,
    ');
    $this->db->join('ci_order_status cos', 'cos.order_id = coi.order_id');
    $this->db->join('ci_seller cs', 'cs.seller_id = coi.referrel');
    $this->db->join('ci_products cp', 'cp.product_id = coi.product_id');
    $this->db->join('ci_users_profile cup', 'cup.user_id = cs.user_id');
    $this->db->join('ci_users_profile cup2', 'cup2.user_id = cup.refer_user_id');
    $this->query = $this->db->get('ci_order_items coi');
    if ($this->query->num_rows() > 0) {
      return $this->query->result_array();
    }
  }

  public function get_all_info()
  {
    $this->query = $this->db->get('ci_info');
    if ($this->query->num_rows() > 0) {
      return $this->query->result_array();
    }
  }

  public function get_all_tranc($daily='')
  {
    if ($daily) {
      $this->db->where("DAY(nt.req_date)", date('d', strtotime($daily)));
      $this->db->where("MONTH(nt.req_date)", date('m', strtotime($daily)));
      $this->db->where("YEAR(nt.req_date)", date('Y', strtotime($daily)));
    }

    if ($this->data['shop']['seller_id']) {
      $this->db->where('nt.shop_id', $this->data['shop']['seller_id']);
    }
    
    // $this->db->where('coi.referrel !=', 0);
    // $this->db->where('coi.referrel !=', NULL);
    // $this->db->where('cos.order_status', 4);
    $this->db->select('
      nt.*,
      cs.shop_name,
      cs.seller_id,
      cs.verify_image as shop_image,  
      cs.user_id,
      cup.full_name as refer_fullname,
      cu.verify_image as user_image,
    ');
    // $this->db->join('ci_order_status cos', 'cos.order_id = coi.order_id');
    // $this->db->join('ci_seller cs', 'cs.seller_id = nt.shop_id', 'left');
    $this->db->join('data_seller cs', 'cs.seller_id = nt.shop_id', 'left');
    // $this->db->join('ci_products cp', 'cp.product_id = coi.product_id');
    $this->db->join('ci_users_profile cup', 'cup.user_id = nt.user_id', 'left');
    $this->db->join('ci_users cu', 'cu.id = nt.user_id', 'left');
    // $this->db->join('ci_order_items coi', 'coi.order_id = nt.order_id', 'left');
    $this->db->order_by('nt.id', 'desc');
    $this->query = $this->db->get('new_transaction nt');
    if ($this->query->num_rows() > 0) {
      return $this->query->result_array();
    }
  }

  // public function get_shop_comm()
  // {
  //   $this->db->where('coi.referrel', $this->data['shop']['seller_id']);
  //   $this->db->where('coi.referrel !=', 0);
  //   $this->db->where('coi.referrel !=', NULL);
  //   $this->db->where('cos.order_status', 4);
  //   $this->db->select('
  //     SUM((coi.ordered_price - coi.seller_price) * (80/100)) as total,
  //   ');
  //   $this->db->join('ci_order_status cos', 'cos.order_id = coi.order_id');
  //   $this->db->join('ci_seller cs', 'cs.seller_id = coi.referrel');
  //   $this->db->join('ci_products cp', 'cp.product_id = coi.product_id');
  //   $this->db->join('ci_users_profile cup', 'cup.user_id = cs.user_id');
  //   $this->db->join('ci_users_profile cup2', 'cup2.user_id = cup.refer_user_id');
  //   $this->query = $this->db->get('ci_order_items coi');
  //   if ($this->query->num_rows() > 0) {
  //     return $this->query->row_array();
  //   }
  // }

  public function get_shop_comm()
  {
    $this->db->where('nt.shop_id', $this->data['shop']['seller_id']);
    $this->db->where('nt.category !=', 5);
    $this->db->select('
      SUM(nt.amount) as total,
    ');
    $this->query = $this->db->get('new_transaction nt');
    if ($this->query->num_rows() > 0) {
      return $this->query->row_array();
    }
  }

  public function get_member_comm($member_id)
  {
    $this->db->where('nt.user_id', $member_id);
    $this->db->select('
      SUM(nt.amount) as total,
    ');
    $this->query = $this->db->get('new_transaction nt');
    if ($this->query->num_rows() > 0) {
      return $this->query->row_array();
    }
  }

  public function all_claim($claim_id='')
  {
    if ($claim_id) {
      $this->db->where('cc.id', $claim_id);
    }
    $this->db->join('ci_seller cs', 'cs.seller_id = cc.seller_id', 'left');
    $this->query = $this->db->get('ci_claim cc');
    if ($this->query->num_rows() > 0) {
      return $this->query->result_array();
    }
  }

  public function all_payments()
  {
    $this->db->where('crp.pay_amount is not null');
    $this->db->join('ci_seller cs', 'cs.seller_id = crp.seller_id', 'left');
    $this->query = $this->db->get('ci_release_payment crp');
    if ($this->query->num_rows() > 0) {
      return $this->query->result_array();
    }
  }

  public function total_payment()
  {
    $this->db->where('crp.seller_id', $this->data['shop']['seller_id']);
    $this->db->where('crp.pay_amount is not null');
    $this->db->select('
      sum(crp.pay_amount) as total
    ');
    $this->db->join('ci_seller cs', 'cs.seller_id = crp.seller_id', 'left');
    $this->query = $this->db->get('ci_release_payment crp');
    if ($this->query->num_rows() > 0) {
      return $this->query->row_array();
    }
  }

  public function get_claim()
  {
    if ($this->data['shop']['seller_id']) {
      $this->db->where('cc.seller_id', $this->data['shop']['seller_id']);
    }
    $this->query = $this->db->get('ci_claim cc');
    if ($this->query->num_rows() > 0) {
      return $this->query->result_array();
    }
  }

  public function total_claim()
  {
    if ($this->data['shop']['seller_id']) {
      $this->db->where('cc.seller_id', $this->data['shop']['seller_id']);
    }
    $this->db->where('cc.status', 1);
    $this->db->select('
      sum(cc.claim) as total
    ');
    $this->query = $this->db->get('ci_claim cc');
    if ($this->query->num_rows() > 0) {
      return $this->query->row_array();
    }
  }

  public function get_verify_wallet($user_id)
  {
    $this->query = $this->db->get('data_seller');
    if ($this->query->num_rows() > 0) {
      return $this->query->row_array();
    }
  }

  public function get_currency()
  {
    $this->db->where('use_this', 1);
    $this->query = $this->db->get('currency');
    if ($this->query->num_rows() > 0) {
      return $this->query->row_array();
    }
  }

}
