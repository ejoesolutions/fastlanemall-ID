<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function get_payments()
  {
    $this->db->select('
      cp.*,
      cos.seller_id,
    ');
    $this->db->join('ci_order_status cos', 'cos.order_id = cp.order_id', 'left');
    $this->db->order_by('cp.payment_id', 'desc');
    $this->query = $this->db->get('ci_payment cp');
    if ($this->query->num_rows() > 0) {
      return $this->query->result_array();
    }
  }

}
