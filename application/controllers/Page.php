<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
    $this->load->model(array('admin_model','order_model','customer_model','product_model'));
    if ($this->ion_auth->logged_in()) {
      $user = $this->ion_auth->user()->row();
      $this->data['user_profile'] = $this->user_model->get_profile($user->id);
      $this->data['shop'] = $this->user_model->get_seller($user->id);
      if($this->data['user_profile']['user_group']==2){
        $this->data['count_order'] = $this->order_model->get_order_status(null,$this->data['shop']['seller_id']);
      }else {
        $this->data['count_order'] = $this->order_model->get_order_status();
      }
    }
    //$this->data['metal'] = $this->product_model->get_gs_price();
    $this->data['logo'] = $this->admin_model->get_logo();
    $this->data['pm'] = $this->product_model->get_productCategory();
    $this->data['footer'] = $this->admin_model->get_footer();
    //$this->data['count_order'] = $this->order_model->count_order();
    $this->data['count_newSeller'] = $this->user_model->count_register_seller(); //utk side menu
    $this->data['count_pen_tranc'] = $this->user_model->count_pen_tranc(); //utk side menu
    $this->data['state']=$this->user_model->state_list();
    $this->data['list_shop'] = $this->product_model->list_seller();
    $this->data['products'] = $this->product_model->get_all_product();
    $this->data['info'] = $this->admin_model->get_all_info();
    $this->data['currency'] = $this->admin_model->get_currency();
    //Codeigniter : Write Less Do More
  }

  public function why_us()
  {
    $this->template->load('layouts/main', 'pages/why_us',$this->data);
  }

  public function products($category_id,$seller_id='')
  {
    $this->data['seller'] = $this->product_model->list_seller();
    $this->data['pList'] = $this->product_model->get_productType($category_id,$seller_id);
    $this->data['pCat'] = $this->product_model->get_productCategory($category_id);
    $this->data['sCat'] = $this->product_model->get_sub_list($category_id);
    $this->data['state_list'] = $this->user_model->avb_state_list();

    $this->template->load('layouts/main', 'pages/products_paging',$this->data);
  }

  public function get_city()
  {
    $state_id = $this->input->post('state_id');

    $this->data['state_list'] = $this->user_model->avb_city_list($state_id);

    $this->load->view('seller/ajax_list_city', $this->data);
  }

  public function search()
  {
    $search = $this->input->post('search_text');

    $this->data['products'] = $this->product_model->get_all_product($search);

    $this->template->load('layouts/main', 'pages/search',$this->data);
  }

  public function all_shops()
  {
    $this->data['title'] = "All Shops";
    $this->data['shops'] = $this->user_model->all_shops();
    $this->template->load('layouts/main', 'pages/all_shops',$this->data);
  }

  public function all_categories()
  {
    $this->data['title'] = "All Shops";
    $this->data['categories'] = $this->product_model->all_category();
    $this->template->load('layouts/main', 'pages/all_categories',$this->data);
  }

  public function shops($shop_url='')
  {
    $cat_id = $this->input->post('category_id');
    
    $this->data['pCat'] = $this->product_model->get_productCategory();
    $this->data['pList'] = $this->product_model->get_productType($cat_id,$shop_url,null,null);
    $this->data['seller'] = $this->user_model->get_detail_seller($shop_url, null);

    $this->template->load('layouts/main', 'pages/shop_paging',$this->data);
  }

  public function search_shops()
  {
    $cat_id = $this->input->post('category_id');
    $seller_id = $this->input->post('sellerID');
    $subcategory_id = $this->input->post('subcategory_id');

    $this->data['pList'] = $this->product_model->filter_product($cat_id, $seller_id, $subcategory_id);
    $this->data['seller'] = $this->user_model->get_detail_seller(null, $seller_id);

    $this->load->view('pages/ajax_shop_paging', $this->data);
  }

  public function filter_shop()
  {
    $search = $this->input->post('search');
    
    $this->data['shops'] = $this->user_model->all_shops($search);

    $this->load->view('pages/ajax_all_shops', $this->data);
  }

  public function get_subcategory()
  {
    $cat_id = $this->input->post('category_id');

    if ($cat_id) {
      $this->data['sCat'] = $this->product_model->get_sub_list($cat_id);
    }

    $this->load->view('pages/ajax_subcategory', $this->data);
  }
  
  public function all_products()
  {
    $this->data['title'] = "All Products";
    $this->template->load('layouts/main', 'includes/products_display2_page',$this->data);
  }

  public function about()
  {
    $this->data['title'] = "About Us";
    $this->template->load('layouts/main', 'includes/about_us',$this->data);
  }

  public function shipping()
  {
    $this->data['title'] = "Shipping & Return";
    $this->template->load('layouts/main', 'includes/shipping',$this->data);
  }

  public function guide()
  {
    $this->data['title'] = "Shipping Guide";
    $this->template->load('layouts/main', 'includes/guide',$this->data);
  }

  public function faq()
  {
    $this->data['title'] = "FAQ";
    $this->template->load('layouts/main', 'includes/faq',$this->data);
  }

  public function new_products()
  {
    $this->data['title'] = "New Products";
    $this->template->load('layouts/main', 'includes/products_new',$this->data);
  }

  public function top_products()
  {
    $this->data['title'] = "Top Products";
    $this->template->load('layouts/main', 'includes/products_top',$this->data);
  }

  public function discount_products()
  {
    $this->data['title'] = "Discount Products";
    $this->template->load('layouts/main', 'includes/products_discount',$this->data);
  }

}
