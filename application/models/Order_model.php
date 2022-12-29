<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function get_order($user_id='',$order_id='')
  {
    if($user_id){
      $this->db->where('created_by', $user_id);
    }
    if($order_id){
      $this->db->where('order_id', $order_id);
    }
    //$this->db->join('ci_users_profile', 'ci_users_profile.user_id = view_order.created_by');
    $this->db->join('
      (
        select distinct order_id as o_id,order_status,complete_date from ci_order_status where order_status=0
        ) as order_status
    ','order_status.o_id=view_order.order_id','left');
    $this->db->order_by('order_id','desc');
    $this->query = $this->db->get('view_order');
    if ($this->query->num_rows() > 0) {
      if($order_id){
        return $this->query->row_array();
      }else{
        return $this->query->result_array();
      }
    }
    return false;
  }

  public function check_items($order_id = '')
  {
    if ($order_id) {
      $this->db->where('ci_order_items.order_id', $order_id);
    }
    $this->db->group_start();
    $this->db->where('ci_order_items.seller_id', 1);
    $this->db->or_where('vu_products_list.cfl', 1);
    $this->db->group_end();
    $this->db->select('
      ci_order_items.*,
      vu_products_list.*,
      ci_seller.shop_name as referrel,
      ci_seller.seller_id as refer_seller,
      cup2.full_name as refer_fullname,
      cup2.user_id as refer_id,
      co.created_by as customer_id,
    ');
    $this->db->order_by('vu_products_list.product_id','desc');
    $this->db->join('vu_products_list', 'vu_products_list.product_id = ci_order_items.product_id', 'left');
    $this->db->join('ci_seller', 'ci_seller.seller_id = ci_order_items.referrel', 'left');
    $this->db->join('ci_users_profile cup', 'cup.user_id = ci_seller.user_id', 'left');
    $this->db->join('ci_users_profile cup2', 'cup2.user_id = cup.refer_user_id', 'left');
    $this->db->join('ci_orders co', 'co.order_id = ci_order_items.order_id', 'left');
    $this->query = $this->db->get('ci_order_items');
    if ($this->query->num_rows() > 0) {
      // foreach ($this->query->result_array() as $row) {
      //   $data[] = $row;
      // }
      // return $data;

      return $this->query->result_array();
    }
    return false;
  }

  public function get_items($order_id = '')
  {
    if ($order_id) {
      $this->db->where('order_id', $order_id);
    }
    $this->db->select('
      ci_order_items.*,
      vu_products_list.*,
      ci_seller.shop_name as referrel,
      ci_seller.seller_id as refer_seller,
      cup2.full_name as refer_fullname,
      cup2.user_id as refer_id,
      cs.shop_name as cfl_shop,
      cu.email as seller_email,
    ');
    $this->db->order_by('vu_products_list.product_id','desc');
    $this->db->join('vu_products_list', 'vu_products_list.product_id = ci_order_items.product_id');
    $this->db->join('ci_seller', 'ci_seller.seller_id = ci_order_items.referrel', 'left');
    $this->db->join('ci_users_profile cup', 'cup.user_id = ci_seller.user_id', 'left');
    $this->db->join('ci_users cu', 'cu.id = ci_seller.user_id', 'left');
    $this->db->join('ci_users_profile cup2', 'cup2.user_id = cup.refer_user_id', 'left');
    $this->db->join('ci_seller cs', 'cs.seller_id = vu_products_list.cfl', 'left');
    $this->query = $this->db->get('ci_order_items');
    if ($this->query->num_rows() > 0) {
      foreach ($this->query->result_array() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function expired_items($order_id)
  {
    $this->db->where('ci_order_items.order_id', $order_id);
    // $this->db->group_start();
    $this->db->where('ci_order_items.seller_id', 1);
    // $this->db->or_where('vu_products_list.cfl', 1);
    // $this->db->group_end();
    $this->db->select('
      ci_order_items.ordered_price,
      ci_order_items.seller_price,
      ci_order_items.modal_price,
      ci_seller.seller_id as refer_seller,
      cup2.user_id as refer_id,
    ');
    $this->db->join('ci_seller', 'ci_seller.seller_id = ci_order_items.referrel', 'left');
    $this->db->join('ci_users_profile cup', 'cup.user_id = ci_seller.user_id', 'left');
    $this->db->join('ci_users_profile cup2', 'cup2.user_id = cup.refer_user_id', 'left');
    $this->query = $this->db->get('ci_order_items');
    if ($this->query->num_rows() > 0) {
      return $this->query->result_array();
    }
    return false;
  }

  public function get_order_seller($seller_id)
  {
    //if ($order_id) {
    $this->db->where('vu_products_list.seller_id', $seller_id);
    // $this->db->or_where('vu_products_list.cfl', $seller_id); //addeed
    //}
    $this->db->join('vu_products_list', 'vu_products_list.product_id = ci_order_items.product_id');
    $this->query = $this->db->get('ci_order_items');
    if ($this->query->num_rows() > 0) {
      foreach ($this->query->result_array() as $row) {
        $data[] = $row;
      }
      return $data;
    }
    return false;
  }

  public function get_weightcost($seller_id='')
  {
    if($seller_id){
      $this->db->where('seller_id',$seller_id);
    }
    $this->db->order_by('area','asc');
    $this->query = $this->db->get('ci_weightcost');
    if ($this->query->num_rows() > 0) {

      foreach ($this->query->result_array() as $row) {
        $data[] = $row;
      }
      return $data;

    }
    return false;
  }

  public function check_weightcost_sm($weight, $seller_id)
  {
    $this->db->where('seller_id', $seller_id);
    $this->db->where('area', 1);
    $this->db->where("$weight BETWEEN weightInitial_set AND weightFinal_set");
    // $this->db->order_by('area','asc');
    $this->query = $this->db->get('ci_weightcost');
    if ($this->query->num_rows() > 0) {
      return $this->query->row_array();    
    }
    return false;
  }

  public function check_weightcost_ss($weight, $seller_id)
  {
    $this->db->where('seller_id', $seller_id);
    $this->db->where('area', 2);
    $this->db->where("$weight BETWEEN weightInitial_set AND weightFinal_set");
    // $this->db->order_by('area','asc');
    $this->query = $this->db->get('ci_weightcost');
    if ($this->query->num_rows() > 0) {
      return $this->query->row_array();    
    }
    return false;
  }

  public function get_weightcostDetail($weightcost_id)
  {
    $this->db->where('weightcost_id',$weightcost_id);
    $this->query = $this->db->get('ci_weightcost');
    if ($this->query->num_rows() > 0) {
          return $this->query->row_array();
    }
    return false;
  }

  // public function get_sum_order($order_id)
  // {
  //   $this->db->where('ci_order_items.order_id', $order_id);
  //   //$this->db->select('SUM(ci_order_items.ordered_price * ci_order_items.qty) AS amount');
  //   $this->db->select('SUM(ci_order_items.subtotal) AS amount');
  //   $this->db->group_by('ci_order_items.order_id');
  //   $this->query = $this->db->get('ci_order_items');
  //   if ($this->query->num_rows() > 0) {
  //     return $this->query->row_array();
  //   }
  // }

  public function get_siri($order_id='',$seller_id='')
  {

      if($order_id && $seller_id){
        $this->db->where('ci_serial_no.order_id', $order_id);
        $this->db->where('ci_products.seller_id', $seller_id);
        $this->db->join('ci_orders', 'ci_orders.order_id = ci_serial_no.order_id');
        $this->db->join('ci_products', 'ci_products.product_id = ci_serial_no.product_id');
      $this->query = $this->db->get('ci_serial_no');
      if ($this->query->num_rows() > 0) {
        foreach ($this->query->result_array() as $row) {
          $data[] = $row;
        }
        return $data;
      }
      return false;
    }
  //   if($order_id=='' && $no_siri==''){
  //
  //   $this->query = $this->db->get('ci_serial_no');
  //   if ($this->query->num_rows() > 0) {
  //     foreach ($this->query->result() as $row) {
  //       $data[] = $row;
  //     }
  //     return $data;
  //   }
  //   return false;
  // }
    // if($no_siri && $order_id=='')
    // {
    //   $this->db->distinct();
    //   $this->db->select('order_id,owner_id,owner,serial_no');
    //   $this->db->where('serial_no', $no_siri);
    //   $this->db->order_by('order_id','asc');
    //   $this->query = $this->db->get('ci_serial_no');
    //   if ($this->query->num_rows() > 0) {
    //     return $this->query->result_array();
    //   }
    // }
  }

  // public function get_payment($order_id)
  // {
  //   $this->db->where('ci_payment.order_id', $order_id);
  //   //$this->db->join('ci_company', 'ci_company.company_id = ci_payment.company_id');
  //   $this->query = $this->db->get('ci_payment');
  //   if ($this->query->num_rows() > 0) {
  //     return $this->query->row_array();
  //   }
  // }

  public function get_productID_2($order_id)
  {
    $this->db->distinct();
    $this->db->select('count(serial_no) as total,product_id');
    $this->db->where('order_id', $order_id);
    $this->db->group_by('product_id');
    $this->query = $this->db->get('ci_serial_no');
    if ($this->query->num_rows() > 0) {
      return $this->query->result_array();
    }
  }

    // Get list of products
    // public function get_product_dropdown()
    // {
    //   $this->db->where('vu_products_list.product_status', 1);
    //   $this->db->where('vu_products_list.stock>=',1);
    //   $this->db->order_by('vu_products_list.product_id', 'asc');
    //   $this->query  = $this->db->get('vu_products_list')->result_array();
    //   if(is_array( $this->query ) && count( $this->query ) > 0)
    //   {
    //     $return[''] = 'CHOOSE PRODUCT';
    //     foreach($this->query as $row)
    //     {
    //       $return[$row['product_id']] = strtoupper($row['product_name']);
    //     }
    //     return $return;
    //   }
    // }

    public function get_product($product_id='')
    {
      if($product_id){
        $this->db->where('vu_products_list.product_id', $product_id);
        $this->query = $this->db->get('vu_products_list');
        if ($this->query->num_rows() > 0) {
          return $this->query->row_array();
        }
      }else{
        $this->query = $this->db->get('vu_products_list');
        if ($this->query->num_rows() > 0) {
          return $this->query->result_array();
        }
      }
    }

    public function get_all_siri()
    {
      $this->db->distinct();
      $this->db->select('product_id,serial_no');

      $this->query = $this->db->get('ci_temp_siri');

      if ($this->query->num_rows() > 0) {
        foreach ($this->query->result_array() as $row) {
          $data[] = $row;
        }
        return $data;
      }
      return false;
    }

    public function store_siriproduct()
    {
      $order_id = $this->input->post('order_id');
      $siri_item = $this->input->post('siri_item[]');
      $no_siri = $this->input->post('no_siri[]');
      // $type = $this->input->post('type[]');
      // $code = $this->input->post('code[]');

      //else{
        // $payment_data = array(
        //   'ci_payment.status'=>'1',
        //   'verified_by_kgt'=>strtoupper($this->data['user_profile']['full_name']),
        //   'verification_note' => $this->input->post('verification_note')==''? null:strtoupper($this->input->post('verification_note')),
        //   'recorded_date'=>date("Y-m-d H:i:s")
        // );
        // $this->db->where('ci_payment.payment_id', $payment_id);
        // $this->db->update('ci_payment',$payment_data);

          for($i=0;$i<count($siri_item);$i++){
             $exist_siri_3='';$exist_siri_not3='';$exist_temp_3='';$exist_temp_not3='';
            // if($type[$i]!='3'){
            //     $exist_siri_not3=$no_siri[$i];
            // }else{
            //     $exist_siri_3=$this->generatePIN($siri_item[$i]);
            // }

            $siri_data=array(
              'serial_no'=>$no_siri[$i]=='' ? NULL : strtoupper($no_siri[$i]),
              'product_id'=>$siri_item[$i],
              'order_id'=>$order_id,
              'owner_id'=>$this->input->post('owner_id'),//masuk user id
              'owner'=>'customer',
              'created_date'=>date("Y-m-d H:i:s")
            );
            $this->db->insert('ci_serial_no', $siri_data);
            $this->db->insert('ci_temp_siri', $siri_data);
          }
      //}
      //update status order
        // $this->db->where('order_id',$order_id);
        // $this->db->update('ci_orders',array('status'=>2));

        $this->db->where('seller_id',$this->input->post('post_seller'));
        $this->db->where('order_id',$order_id);
        $this->db->update('ci_order_status',array('order_status'=>2));

        //add history
          $trans=array(
            'order_status_id'=>$this->input->post('order_status_id'),
            'transaction_status'=>2,
            'transaction_record'=>date("Y-m-d H:i:s"),
            'next_transaction'=>$this->input->post('next_transaction')
          );
          $this->db->insert('ci_transaction',$trans);

        $product_qty = $this->input->post('qty[]');
        $seller_id = $this->input->post('seller_id[]');
        $pID = $this->input->post('product_id[]');

        // for ( $j=0; $j<count($pID); $j++ ) {
        //   //if ( ($product_id[$i]) ) {
        //     $accetp_items = array(
        //       'owner_id' => $this->input->post('owner_id'),
        //       'qty' => $product_qty[$j],
        //       'product_id' => $pID[$j],
        //       'owner_type' => 'customer',
        //       'created_date'=>date("Y-m-d H:i:s")
        //     );
        //     $this->db->insert('ci_inventory', $accetp_items);
        //     $remove_items = array(
        //       'owner_id' => $seller_id[$j],
        //       'qty' => '-'.$product_qty[$j],
        //       'product_id' => $pID[$j],
        //       'owner_type' => 'company',
        //       'created_date'=>date("Y-m-d H:i:s")
        //     );
        //     $this->db->insert('ci_inventory', $remove_items);

        //   //}
        // }

        // $gold_assayer = $this->input->post('gold_assayer[]');
        //
        // for($k=0;$k<count($gold_assayer);$k++){
        //
        //       $arr_assayer=array(
        //         'gold_assayer'=>$gold_assayer[$k]==''? 'N/A' : $gold_assayer[$k],
        //        );
        //
        //       $this->db->where('order_id',$order_id);
        //       $this->db->where('product_id',$pID[$k]);
        //       $this->db->update('ci_order_items',$arr_assayer);
        // }

    }


    public function get_track($order_id,$seller_id='')
    {
      $this->db->where('order_id', $order_id);
      if($seller_id!=''){
        $this->db->where('seller_id', $seller_id);
      }
      $this->query = $this->db->get('ci_tracking');
      if($seller_id!=''){
        if ($this->query->num_rows() > 0) {
          return $this->query->row_array();
        }
      }else{
        if ($this->query->num_rows() > 0) {
          return $this->query->result_array();
        }
      }

    }

    // public function update_order_status($order_id = '', $status = '')
    // {
    //   $this->db->where('order_id', $order_id);
    //   $this->db->update('ci_orders', array('status'=>$status,'created_date'=>date("Y-m-d H:i:s")));
    // }
    //
    // public function update_deliver_status($order_id = '', $status = '')
    // {
    //   $this->db->where('order_id', $order_id);
    //   $this->db->update('ci_orders', array('delivery_status'=>$status,'created_date'=>date("Y-m-d H:i:s")));
    // }

    // public function get_temp_siri($order_id)
    // {
    //   $this->db->select('ci_serial_no.serial_no,ci_serial_no.product_id,ci_serial_no.order_id,ci_serial_no.owner_id,ci_serial_no.owner');
    //   $this->db->join('ci_orders','ci_serial_no.order_id=ci_orders.order_id');
    //   $this->db->where('ci_orders.delivery_status','1');
    //   $this->db->where('ci_orders.order_id',$order_id );
    //   //$this->db->where('ci_serial_no.serial_no!=','-');
    //   $this->query = $this->db->get('ci_serial_no');
    //   if ($this->query->num_rows() > 0) {
    //     foreach ($this->query->result_array() as $row) {
    //       $data[] = $row;
    //     }
    //     return $data;
    //   }
    // }

    public function get_list_courier(){
      $this->db->distinct();
      $this->db->select('courier_name');
      $this->query = $this->db->get('ci_tracking');
      return $this->query->result_array();
    }

    public function get_list_bank(){
      $this->db->where('payment_type','Cash Deposit');
      $this->db->distinct();
      $this->db->select('reference_note');
      $this->query = $this->db->get('ci_payment');
      return $this->query->result_array();
    }

    public function count_order(){
      $this->db->select('count(order_id) as status');
      $this->db->where('order_status','1');
      $this->query = $this->db->get('ci_order_status');
      if ($this->query->num_rows() > 0) {
        return $this->query->row_array();
      }
      return false;
    }

    public function get_order_status_fpx($order_id='',$seller_id=''){
      if($order_id!=''){
        $this->db->where('os.order_id',$order_id);
      }
      if($seller_id!=''){
        $this->db->where('os.seller_id',$seller_id);
        // $this->db->or_where('cp.cfl',$seller_id); //added
      }
      // $this->db->where('ct.transaction_status=os.order_status');
      $this->db->select('
        os.order_status_id,
        os.seller_id,
        os.order_id,
        os.order_status,
        ds.shop_name,ds.full_name,ds.email,ds.phone,ds.address,ds.postcode,ds.town_area,ds.state,ct.transaction_record,ct.next_transaction,ct.transaction_status,os.shipping_seller,os.cancelled_desc
      ');
      // $this->db->group_by('os.order_id');
      
      $this->db->join('data_seller ds','ds.seller_id=os.seller_id');
      $this->db->join('ci_transaction ct','ct.order_status_id=os.order_status_id');
      // $this->db->join('ci_order_items coi','coi.order_id=os.order_id', 'left');
      // $this->db->join('ci_products cp','cp.product_id=coi.product_id', 'left');
      $this->query = $this->db->get('ci_order_status os');
      return $this->query->result_array();
    }

    public function get_order_status($order_id='',$seller_id=''){
      if($order_id!=''){
        $this->db->where('os.order_id',$order_id);
      }
      if($seller_id!=''){
        $this->db->where('os.seller_id',$seller_id);
        // $this->db->or_where('cp.cfl',$seller_id); //added
      }
      $this->db->where('ct.transaction_status=os.order_status');
      $this->db->select('
        os.order_status_id,
        os.seller_id,
        os.order_id,
        os.order_status,
        os.complete_date,
        co.created_by,
        ds.shop_name,ds.full_name,ds.email,ds.phone,ds.address,ds.postcode,ds.town_area,ds.state,ct.transaction_record,ct.next_transaction,ct.transaction_status,os.shipping_seller,os.cancelled_desc
      ');
      // $this->db->group_by('os.order_id');
      
      $this->db->join('data_seller ds','ds.seller_id=os.seller_id');
      $this->db->join('ci_transaction ct','ct.order_status_id=os.order_status_id');
      $this->db->join('ci_orders co','co.order_id=os.order_id', 'left');
      // $this->db->join('ci_products cp','cp.product_id=coi.product_id', 'left');
      $this->query = $this->db->get('ci_order_status os');
      return $this->query->result_array();
    }

    public function get_release_pay($order_id,$seller_id)
    {
      $this->db->where('order_id',$order_id);
      $this->db->where('seller_id',$seller_id);
      $this->query = $this->db->get('ci_release_payment');
      return $this->query->row_array();
    }

    public function get_comm_order($member_id)
    {
      // $this->db->where('ci_users_profile.refer_user_id', $member_id);
      // $this->db->where('ci_order_status.order_status', 4);
      // $this->db->join('ci_products', 'ci_products.product_id = ci_order_items.product_id', 'left');
      // $this->db->join('ci_order_status', 'ci_order_status.order_id = ci_order_items.order_id');
      // $this->db->join('ci_seller', 'ci_seller.seller_id = ci_order_items.referrel');
      // $this->db->join('ci_users_profile', 'ci_users_profile.user_id = ci_seller.user_id');
      // $this->db->order_by('ci_order_items.updated', 'desc');
      // $this->query = $this->db->get('ci_order_items');
      // if ($this->query->num_rows() > 0) {
      //   return $this->query->result_array();
      // }
      $this->db->select('
       nt.*,
       ci_seller.shop_name
      ');
      $this->db->where('nt.user_id', $member_id);
      $this->db->order_by('nt.id', 'desc');
      $this->db->join('ci_seller', 'ci_seller.seller_id = nt.from_shop', 'left');
      $this->query = $this->db->get('new_transaction nt');
      if ($this->query->num_rows() > 0) {
        return $this->query->result_array();
      }
    }

  public function count_pending_payment()
  {
    $this->db->where('os.order_status', 4);
    $this->db->where('rp.pay_amount', NULL);
    $this->db->join('ci_release_payment rp', 'rp.order_id = os.order_id', 'left');
    $this->db->join('ci_seller cs', 'cs.seller_id = os.seller_id', 'left');
    $this->query = $this->db->get('ci_order_status os');
    if ($this->query->num_rows() > 0) {
      return $this->query->result_array();
    }
  }

}
