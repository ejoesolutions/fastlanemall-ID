<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More

  }

  public function get_shipAddress($user_id){
    $this->db->where('user_id',$user_id);
    $this->db->where('ship_default',1);
    // $this->db->join('ci_state','ci_state.state_id=ci_shipping.ship_state');
    $this->query = $this->db->get('ci_shipping');
    if ($this->query->num_rows() > 0) {
      return $this->query->row_array();
    }
    return false;
  }

  public function ship_address($user_id){
    $this->db->where('user_id',$user_id);
    // $this->db->join('ci_state','ci_state.state_id=ci_shipping.ship_state');
    $this->query = $this->db->get('ci_shipping');
    if ($this->query->num_rows() > 0) {
      return $this->query->row_array();
    }
    return false;
  }

  public function count_ahli()
  {
    $this->db->where('cu.user_group','2');
    $this->db->select('LPAD(count(cu.id),6,0) as total');
    $this->query = $this->db->get('ci_users cu');
    if ($this->query->num_rows() > 0) {
      return $this->query->row_array();
    }
  }

  public function get_ahli_id($ahli_id)
  {
    $this->db->where('ahli_id', $ahli_id);
    $query = $this->db->get('ci_users_profile');
    $ret = $query->row();
    if ($ret) {
      return $ret->user_id;
    }
    return FALSE;
  }
  
}
