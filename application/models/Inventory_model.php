<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function count_sales()
  {
    $this->db->select('SUM(product_qty) AS total');
    $this->query = $this->db->get('ci_sales');
    if ($this->query->num_rows() > 0) {
      return $this->query->row_array();
    }
  }

  public function move()
  {
    // code...
  }

}