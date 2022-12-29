<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->data['currency'] = $this->admin_model->get_currency();
    //Codeigniter : Write Less Do More
  }

  public function add_pesanan()
  {
    $selling_item = array(
      'id' => $this->input->post('product_id'),
      'name' => $this->input->post('product_name'),
      'price' => $this->input->post('price'),
      'qty' => $this->input->post('qty'),
      'item_code' => $this->input->post('item_code'),
      //'product_code' => $this->input->post('product_code'),
      'weight' => $this->input->post('weight'),
      'seller_id' => $this->input->post('seller_id'),
      'shop_name' => $this->input->post('shop_name'),
      'modal' => $this->input->post('modal'),
      'unit_price' => $this->input->post('unit_price'),
      'tax_price' => $this->input->post('tax_price'),
      'ship_price' => $this->input->post('ship_price'),
      'seller_price' => $this->input->post('seller_price'),
      'referrel' => $this->input->post('referrel'),
    );

    // Insert to cart
    $this->cart->insert($selling_item);
    // //insert to db
    // foreach ($this->cart->contents() as $items){
    //   $data=array(
    //     'id' => $items['id'],
    //     'name' => $items['name'],
    //     'price' => $items['price'],
    //     'qty' => $items['qty'],
    //     'item_code' => $items['item_code'],
    //     'product_code' => $items['product_code'],
    //     'user_id' => $items['user_id'],
    //     'rowid'=>$items['rowid'],
    //     'subtotal'=>$items['subtotal']
    //   );
    //   $this->db->insert('ci_cart',$data);
    // }
    redirect('member/cart', 'refresh');
  }

  public function add()
  {
    $selling_item = array(
      'id' => $this->input->post('product_id'),
      'name' => $this->input->post('product_name'),
      'price' => $this->input->post('price'),
      'qty' => $this->input->post('qty'),
      // 'options' => array(
      //   'Weight' => $this->input->post('weight'),
      //   'Quality' => $this->input->post('quality'),
      //   'Size' => $this->input->post('size')
      // )
    );

    // Insert to cart
    $this->cart->insert($selling_item);

    redirect('sales/list_in_cart', 'refresh');
  }

  public function update_cart()
  {
    $data=$this->cart->update(array(
      'rowid'=>$this->input->post('row_id'),
      'qty'=> $this->input->post('qty')
    ));

    $this->cart->update($data);

    redirect('member/cart', 'refresh');
  }

}
