<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More

  }

  public function get_users()
  {
    $this->db->where('user_group !=', 2);
    $this->db->join('
    (SELECT sum((ci_order_items.ordered_price - ci_order_items.seller_price) * (20/100)) as total, ci_users_profile.user_id, ci_order_items.seller_id
      FROM ci_order_items
      INNER JOIN ci_seller ON ci_seller.seller_id=ci_order_items.referrel
      INNER JOIN ci_products ON ci_products.product_id=ci_order_items.product_id
      INNER JOIN ci_users_profile ON ci_users_profile.user_id=ci_seller.user_id
      WHERE ci_order_items.referrel != 0 AND ci_order_items.referrel IS NOT NULL
      GROUP BY ci_users_profile.user_id) AS total
    ','total.user_id=data_user.id','left');
    $this->db->order_by('user_group','asc');
    $this->query = $this->db->get('data_user');
    if ($this->query->num_rows() > 0) {
      foreach ($this->query->result_array() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function get_customer()
  {
    $this->db->where('user_group', 2);
    $this->db->join('
    (SELECT sum((ci_order_items.ordered_price - ci_order_items.seller_price) * (20/100)) as total, ci_users_profile.user_id, ci_order_items.seller_id
      FROM ci_order_items
      INNER JOIN ci_seller ON ci_seller.seller_id=ci_order_items.referrel
      INNER JOIN ci_products ON ci_products.product_id=ci_order_items.product_id
      INNER JOIN ci_users_profile ON ci_users_profile.user_id=ci_seller.user_id
      WHERE ci_order_items.referrel != 0 AND ci_order_items.referrel IS NOT NULL
      GROUP BY ci_users_profile.user_id) AS total
    ','total.user_id=data_user.id','left');
    $this->db->join('
    (SELECT count(ci_users_profile.user_id) as total_referral, ci_users_profile.user_id, ci_users_profile.refer_user_id
      FROM ci_users_profile
      GROUP BY ci_users_profile.refer_user_id) AS total_referral
    ','total_referral.refer_user_id=data_user.id','left');
    $this->db->order_by('user_group','asc');
    $this->query = $this->db->get('data_user');
    if ($this->query->num_rows() > 0) {
      foreach ($this->query->result_array() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function get_profile($user_id = '') //use
  {
    if ($user_id) {
      $this->db->where('du.id', $user_id);
    }
    $this->query = $this->db->get('data_user du');
    if ($this->query->num_rows() > 0) {
      return $this->query->row_array();
    }
  }

  // public function get_referral($user_id)
  // {
  //   if ($user_id) {
  //     $this->db->where('cup.refer_user_id', $user_id);
  //   }
  //   $this->query = $this->db->get('ci_users_profile cup');
  //   if ($this->query->num_rows() > 0) {
  //     return $this->query->result_array();
  //   }
  // }

  public function get_email($email)
  {
    $this->db->select('count(email) as count');
    $this->db->where('email', $email);
    $this->query = $this->db->get('data_user');
    if ($this->query->num_rows() > 0) {
      return $this->query->row_array();
    }
    return 0;
  }

  public function get_new_seller()
  {
    $this->query = $this->db->get('data_seller');

    if ($this->query->num_rows() > 0) {
      foreach ($this->query->result_array() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  } 

  public function get_seller($user_id='') //use
  {
    if($user_id!=''){
      $this->db->where('user_id', $user_id);
      //$this->db->where('seller_status',1);
      $this->query = $this->db->get('data_seller');
      if ($this->query->num_rows() > 0) {
        return $this->query->row_array();
      }
    }else{
      $this->db->join('
      (SELECT sum((ci_order_items.ordered_price - ci_order_items.seller_price) * (80/100)) as total, ci_order_items.referrel, ci_order_items.seller_id
        FROM ci_order_items
        INNER JOIN ci_order_status ON ci_order_status.order_id = ci_order_items.order_id
        INNER JOIN ci_seller ON ci_seller.seller_id=ci_order_items.referrel
        INNER JOIN ci_products ON ci_products.product_id=ci_order_items.product_id
        WHERE ci_order_items.referrel != 0 AND ci_order_items.referrel IS NOT NULL AND ci_order_status.order_status = 4
        GROUP BY ci_order_items.referrel) AS total
      ','total.referrel=data_seller.seller_id','left');
      $this->query = $this->db->get('data_seller');

      if ($this->query->num_rows() > 0) {
        foreach ($this->query->result_array() as $row) {
          $data[] = $row;
        }
        return $data;
      }
      return false;
    }
  }

    // public function get_detail_seller($seller_id)
    public function get_detail_seller($shop_url, $seller_id)
    {
      // $this->db->where('seller_id', $seller_id);
      if ($seller_id) {
        $this->db->where('data_seller.seller_id', $seller_id);
      }else {
        $this->db->where('data_seller.shop_url', $shop_url);
      }
      $this->db->join('postcode', 'postcode.poskod = data_seller.shop_postcode', 'left');
      $this->query = $this->db->get('data_seller');
      if ($this->query->num_rows() > 0) {
        return $this->query->row_array();
      }
    }

    public function all_shops($search="")
    {
      if ($search) {
        $this->db->like('shop_name', $search);
      }
      $this->db->where('seller_status',1);
      $this->query = $this->db->get('data_seller');
      if ($this->query->num_rows() > 0) {
        return $this->query->result_array();
      }
    }

    public function dropdown_seller()
    {
      //$this->db->order_by('ci_metal.metal_id', 'asc');
      $this->db->where('seller_status',1);
      $this->query  = $this->db->get('data_seller')->result_array();
      if(is_array( $this->query ) && count( $this->query ) > 0)
      {
        $return[''] = 'CHOOSE SELLER';
        foreach($this->query as $row)
        {
          $return[$row['seller_id']] = strtoupper($row['shop_name']);
        }
        return $return;
      }
    }

    public function count_register_seller()
    {
      $this->db->where('seller_verify',0);
      $this->db->select('count(seller_id) as total');
      $this->query = $this->db->get('data_seller');
      if ($this->query->num_rows() > 0) {
        return $this->query->row_array();
      }
    }
    
    public function newslatter(){
    $this->query = $this->db->get('ci_newslatter');
    if ($this->query->num_rows() > 0) {
      return $this->query->result_array();
    }
    return false;
  }
  
  public function state_list(){
    $this->query  = $this->db->get('ci_state')->result_array();
    if(is_array( $this->query ) && count( $this->query ) > 0)
    {
      $return[''] = '--STATE--';
      foreach($this->query as $row)
      {
        $return[$row['state_id']] = $row['state'];
      }
      return $return;
    }
  }

  public function list_state()
  {
    $this->query = $this->db->get('ci_state');
    if ($this->query->num_rows() > 0) {
      return $this->query->result_array();
    }
    return false;
  }

  public function state($state_id=''){
    if($state_id){
      $this->db->where('state_id',$state_id);
      $this->query = $this->db->get('ci_state');
      if ($this->query->num_rows() > 0) {
        return $this->query->row_array();
      }
    }else{
      $this->query = $this->db->get('ci_state');
      if ($this->query->num_rows() > 0) {
        return $this->query->result_array();
      }
    }
  }

  public function get_city($postcode)
  {
    $this->db->where('postcode.poskod',$postcode);
    // $this->db->join('ci_state', 'ci_state.short_name = postcode.negeri', 'left');
    $this->query = $this->db->get('postcode');
    if ($this->query->num_rows() > 0) {
      return $this->query->row_array();
    }
  }

  public function get_state($postcode)
  {
    // $this->db->where('poskod', $postcode);
    // $this->query = $this->db->get('postcode');
    // if ($this->query->num_rows() > 0) {
    //   return $this->query->result_array();
    // }

    $this->db->where('postcode.poskod', $postcode);
    $this->db->join('ci_state', 'ci_state.short_name = postcode.negeri', 'left');
    $query = $this->db->get('postcode');
    $ret = $query->row();
    if ($ret) {
      return $ret->state;
    }
    
  }

  public function avb_state_list()
  {
    $this->db->join('ci_seller', 'ci_seller.shop_state_id = ci_state.state_id', 'inner');
    $this->db->group_by('ci_state.state');
    $this->query = $this->db->get('ci_state');
    if ($this->query->num_rows() > 0) {
      return $this->query->result_array();
    }
  }
  
  public function avb_city_list($state_id)
  {
    // $this->db->group_by('ci_state.state');
    $this->db->where('ci_seller.shop_state_id', $state_id);
    $this->db->join('ci_state', 'ci_state.state_id = ci_seller.shop_state_id', 'left');
    $this->db->group_by('ci_seller.shop_city');
    $this->query = $this->db->get('ci_seller');
    if ($this->query->num_rows() > 0) {
      return $this->query->result_array();
    }
  }

  public function count_pen_tranc()
  {
    $this->db->where('status', 0);
    $this->db->select('count(id) as total');
    $this->query = $this->db->get('new_transaction');
    return $this->query->row_array();
  }

  public function get_referral($user_id)
  {
    $this->db->where('refer_user_id', $user_id);
    $this->db->join('ci_seller', 'ci_seller.user_id = ci_users_profile.user_id', 'left');
    $this->query = $this->db->get('ci_users_profile');
    if ($this->query->num_rows() > 0) {
      return $this->query->result_array();
    }
    return FALSE;
  }

}
