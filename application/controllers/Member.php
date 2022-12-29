<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller{

  public function __construct()
	{
		parent::__construct();
		$this->load->database();
    //$this->db2=$this->load->database('otherdb',true);
    $this->load->model('customer_model');
    $this->load->model('order_model');
    $this->load->model('admin_model');
    //
		// $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
    //
		// $this->lang->load('auth');
    //
    if ($this->ion_auth->logged_in()) {
      $user = $this->ion_auth->user()->row();
      $this->data['user_profile'] = $this->user_model->get_profile($user->id);
      $this->data['shop'] = $this->user_model->get_seller($user->id);
      if($this->data['user_profile']['user_group']==2){
        $this->data['count_order'] = $this->order_model->get_order_status(null,$this->data['shop']['seller_id']);
      }else {
        $this->data['count_order'] = $this->order_model->get_order_status();
      }
      //$this->data['address'] = $this->customer_model->get_addresses($user->id);
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
    $this->data['commission']=$this->admin_model->get_admin_commission();
    $this->data['currency'] = $this->admin_model->get_currency();
    $this->output->enable_profiler(FALSE);
	}

  public function register()
	{
		$tables = $this->config->item('tables', 'ion_auth');
		$identity_column = $this->config->item('identity', 'ion_auth');
		$this->data['identity_column'] = $identity_column;

    $this->data['ahli'] = $ahli = $this->customer_model->count_ahli();

    if ($this->input->post('refer_member')) {
      $this->data['refer'] = $member = $this->customer_model->get_ahli_id($this->input->post('refer_member'));
      if ($member) {
        $refer = $member;
      }else {
        $this->form_validation->set_message('in_list', 'The Referrel Number Is Not Available.');
        $this->form_validation->set_rules('refer_member', 'Referral', 'in_list[referList]');
      }
    }else {
      $refer = 2; //admin bencollen
    }

		// validate form input
		$this->form_validation->set_rules('full_name', 'Full Name', 'required');
    $this->form_validation->set_rules('phone', 'Phone No', 'required');
    $this->form_validation->set_rules('address', 'Address', 'required');
    $this->form_validation->set_rules('postcode', 'Postcode', 'required|is_numeric');
    $this->form_validation->set_rules('town_area', 'Area', 'required');
    // $this->form_validation->set_rules('state_id', 'State', 'required');

		if ($identity_column !== 'email') {
			$this->form_validation->set_rules('identity', 'Username', 'required|is_unique[' . $tables['users'] . '.' . $identity_column . ']');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
		} else {
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
		}
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', 'Password confirmation', 'required');

    $this->data['state']=$this->user_model->state_list();

    if ($this->form_validation->run() === TRUE) {

			$email = strtolower($this->input->post('email'));
			$identity = ($identity_column === 'email') ? $email : $this->input->post('identity');
			$password = $this->input->post('password');
      $active = $this->input->post('active');

			$additional_data = array(
				'full_name' => strtoupper($this->input->post('full_name')),
        'nic_no' => null,
        'phone' => $this->input->post('phone'),
        'address' => strtoupper($this->input->post('address')),
        'postcode' => $this->input->post('postcode'),
        'town_area' => strtoupper($this->input->post('town_area')),
        // 'state_id' => $this->input->post('state_id'),
        'state_id' => 1,
        'ahli_id' => 'ID'.$this->data['ahli']['total'],
        'refer_user_id' => $refer,
			);
		}

		if ($this->form_validation->run() === TRUE) {
      $id = $this->ion_auth->register($identity, $password, $email, $additional_data);
      // check to see if we are creating the user
			// redirect them back to the admin page

      $clean_phone = preg_replace("/[^0-9]/", '', $this->input->post('phone'));
      $profile_data = array(
        'user_id' => $id,
        'full_name' => strtoupper($this->input->post('full_name')),
        'nic_no' => null,
        'phone' => $clean_phone,
        'address' => strtoupper($this->input->post('address')),
        'postcode' => $this->input->post('postcode'),
        'town_area' => strtoupper($this->input->post('town_area')),
        'state_id' => 1,
        'ahli_id' => 'ID'.$this->data['ahli']['total'],
        'refer_user_id' => $refer,
      );
      $this->db->insert('ci_users_profile', $profile_data);

      $ship_data = array(
        'user_id' => $id,
        'ship_name' => strtoupper($this->input->post('full_name')),
        'ship_phone' => $this->input->post('phone'),
        'ship_address' => strtoupper($this->input->post('address')),
        'ship_postcode' => $this->input->post('postcode'),
        'ship_area' => strtoupper($this->input->post('town_area')),
        'ship_state' => 1,
        // 'ship_state' => $this->input->post('state_id'),
        'ship_default' => 1,
      );
      $this->db->insert('ci_shipping', $ship_data);

      $m="Register successful. You can login now.";
      echo "<script type='text/javascript'>alert('$m');window.location.href = '" . base_url() . "member/register';</script>";

		} else {
			// display the create user form
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

      $this->data['full_name'] = array(
				'name' => 'full_name',
				'id' => 'full_name',
				'type' => 'text',
        'class' => 'form-control uppercase',
        'placeholder' => 'Full Name',
				'value' => $this->form_validation->set_value('full_name'),
			);

      $this->data['refer_member'] = array(
				'name' => 'refer_member',
				'id' => 'refer_member',
				'type' => 'text',
        'class' => 'form-control',
        'placeholder' => 'Insert Referrel Number If Any',
				'value' => ($this->uri->segment(3)) ? ($this->uri->segment(3)) : $this->form_validation->set_value('refer_member'),
			);

			$this->data['phone'] = array(
				'name' => 'phone',
				'id' => 'phone',
				'type' => 'text',
        'class' => 'form-control',
        'placeholder' => 'Phone No',
				'value' => $this->form_validation->set_value('phone'),
			);

      $this->data['address'] = array(
				'name' => 'address',
				'id' => 'address',
				'type' => 'text',
        'class' => 'form-control uppercase',
        'placeholder' => 'Address',
				'value' => $this->form_validation->set_value('address'),
			);

			$this->data['postcode'] = array(
				'name' => 'postcode',
				'id' => 'postcode',
				'type' => 'text',
        'class' => 'form-control',
        'placeholder' => 'Postcode',
				'value' => $this->form_validation->set_value('postcode'),
			);

      $this->data['town_area'] = array(
				'name' => 'town_area',
				'id' => 'town_area',
				'type' => 'text',
        'class' => 'form-control uppercase',
        'placeholder' => 'Area',
				'value' => $this->form_validation->set_value('town_area'),
			);

			$this->data['identity'] = array(
				'name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
        'class' =>'form-control',
        'placeholder' => 'Username',
        'autocomplete' => 'off',
				'value' => $this->form_validation->set_value('identity'),
			);

			$this->data['email'] = array(
				'name' => 'email',
				'id' => 'email',
				'type' => 'text',
        'class' => 'form-control',
        'placeholder' => 'Email',
				'value' => $this->form_validation->set_value('email'),
			);

			$this->data['password'] = array(
				'name' => 'password',
				'id' => 'password',
        'class' => 'form-control',
				'type' => 'password',
        'placeholder' => 'Password',
        'autocomplete' => 'new-password',
				'value' => $this->form_validation->set_value('password'),
			);

			$this->data['password_confirm'] = array(
				'name' => 'password_confirm',
				'id' => 'password_confirm',
        'class' => 'form-control',
				'type' => 'password',
        'placeholder' => 'Password confirmation',
				'value' => $this->form_validation->set_value('password_confirm'),
			);

      $this->template->load('layouts/main', 'customer/customer_register', $this->data);
		}

	}

  public function login()
	{
		// validate form input
		$this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
		$this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

		if ($this->form_validation->run() === TRUE)
		{
			// check to see if the user is logging in
			// check for "remember me"
			$remember = false;

			if ($this->ion_auth->login_cust($this->input->post('identity'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('message', $this->ion_auth->messages());
        if(!empty($this->cart->contents())){
          redirect('member/cart', 'refresh');
        }else{
          redirect('member/dashboard', 'refresh');
        }
			}
			else
			{
				// if the login was un-successful
        // $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
        // $this->session->set_flashdata('message', $this->ion_auth->errors());

        $m="Invalid Username/Email or Password";
        //   echo "<script type='text/javascript'>alert('$m');</script>";
        //   redirect('customer/register', 'refresh');
        echo "<script type='text/javascript'>alert('$m');window.location.href = '" . base_url() . "member/register';</script>";

			}
		} else {
			// the user is not logging in so display the login page
			// set the flash data error message if there is one

      $m="Invalid Username/Email or Password";
      echo "<script type='text/javascript'>alert('$m');window.location.href = '" . base_url() . "member/register';</script>";

		}
	}

  public function logout()
	{
		// log the user out
		$logout = $this->ion_auth->logout();

		// redirect them to the login page
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		redirect('', 'refresh');
	}

  public function dashboard(){
    if(!$this->ion_auth->logged_in()){
      redirect(base_url('member/register'), 'refresh');
    }else{

      $this->data['password'] = array(
        'name' => 'password',
        'id'   => 'password',
        'type' => 'password',
        'class' => 'form-control',
      );

      $this->data['password_confirm'] = array(
        'name' => 'password_confirm',
        'id'   => 'password_confirm',
        'type' => 'password',
        'class' => 'form-control',
      );

      $this->data['state']=$this->user_model->state_list();
      $this->data['ship_id']=$this->customer_model->get_shipAddress($this->data['user_profile']['id']);

      $this->template->load('layouts/main', 'customer/customer_account',$this->data);
    }
  }

  public function update_account(){
    $user_id=$this->input->post('user_id');
    $clean_phone = preg_replace("/[^0-9]/", '', $this->input->post('phone'));
    $acc=array(
      'full_name'=>strtoupper($this->input->post('full_name')),
      'phone'=>$clean_phone,
      'address'=>strtoupper($this->input->post('address')),
      'postcode'=>$this->input->post('postcode'),
      'town_area'=>strtoupper($this->input->post('town_area')),
      'state_id'=>$this->input->post('state_id'),
    );

    $ship_acc=array(
      'ship_name'=>strtoupper($this->input->post('full_name')),
      'ship_phone'=>$this->input->post('phone'),
      //'bill_email'=>$this->input->post('bill_email'),
      'ship_address'=>strtoupper($this->input->post('address')),
      'ship_postcode'=>$this->input->post('postcode'),
      'ship_area'=>strtoupper($this->input->post('town_area')),
      'ship_state'=>$this->input->post('state_id'),
    );

    $this->data['unique']=$this->user_model->get_email($this->input->post('email'));

    if($this->input->post('password')!='' && $this->input->post('password_confirm')!=''){
      $this->db->where('user_id',$user_id);
      $this->db->update('ci_users_profile',$acc);

      // $this->db->where('billing_id',$this->input->post('bill'));
      // $this->db->update('ci_billing',$bill_acc);

      $this->db->where('shipping_id',$this->input->post('ship'));
      $this->db->update('ci_shipping',$ship_acc);

      if($this->data['unique']['count']!=0 && $this->input->post('email')!=$this->input->post('ori_email')){
          $m="Email must be unique.";
        //   echo "<script type='text/javascript'>alert('$m');</script>";
        //   redirect('customer/dashboard', 'refresh');
        echo "<script type='text/javascript'>alert('$m');window.location.href = '" . base_url() . "member/dashboard';</script>";
      }else{
        $this->db->where('id',$user_id);
        $this->db->update('ci_users',array('email'=>$this->input->post('email')));

        // $this->db->where('billing_id',$this->input->post('bill'));
        // $this->db->update('ci_billing',array('bill_email'=>$this->input->post('email')));
      }

      if($this->input->post('password')==$this->input->post('password_confirm')){
        $data['password']=$this->input->post('password');
        if($this->ion_auth->update($user_id, $data)){
          $m="Update successful";
        //   echo "<script type='text/javascript'>alert('$m');</script>";
        //   redirect('customer/dashboard', 'refresh');
        echo "<script type='text/javascript'>alert('$m');window.location.href = '" . base_url() . "member/dashboard';</script>";
        }else{
          $m="Update not successful";
        //   echo "<script type='text/javascript'>alert('$m');</script>";
        //   redirect('customer/dashboard', 'refresh');
        echo "<script type='text/javascript'>alert('$m');window.location.href = '" . base_url() . "member/dashboard';</script>";
        }
      }else{
        $m="Password not match";
        //  echo "<script type='text/javascript'>alert('$m');</script>";
        //  redirect('customer/dashboard', 'refresh');
        echo "<script type='text/javascript'>alert('$m');window.location.href = '" . base_url() . "member/dashboard';</script>";
      }
    }else{
      $this->db->where('user_id',$user_id);
      $this->db->update('ci_users_profile',$acc);

      // $this->db->where('billing_id',$this->input->post('bill'));
      // $this->db->update('ci_billing',$bill_acc);

      $this->db->where('shipping_id',$this->input->post('ship'));
      $this->db->update('ci_shipping',$ship_acc);

      if($this->data['unique']['count']!=0 && $this->input->post('email')!=$this->input->post('ori_email')){
          $m="Email must be unique.";
        //   echo "<script type='text/javascript'>alert('$m');</script>";
        //   redirect('customer/dashboard', 'refresh');
        echo "<script type='text/javascript'>alert('$m');window.location.href = '" . base_url() . "member/dashboard';</script>";
      }else{
        $this->db->where('id',$user_id);
        $this->db->update('ci_users',array('email'=>$this->input->post('email')));

        // $this->db->where('billing_id',$this->input->post('bill'));
        // $this->db->update('ci_billing',array('bill_email'=>$this->input->post('email')));

        $m="Update successful";
        //  echo "<script type='text/javascript'>alert('$m');</script>";
        //  redirect('customer/dashboard', 'refresh');
        echo "<script type='text/javascript'>alert('$m');window.location.href = '" . base_url() . "member/dashboard';</script>";
      }
    }
    //redirect(base_url('customer/addresses'));
  }

  public function addresses(){
    if(!$this->ion_auth->logged_in()){
        redirect(base_url('member/register'), 'refresh');
    }else{

      $this->data['state']=$this->user_model->state_list();
      $this->data['ship']=$this->customer_model->get_shipAddress($this->data['user_profile']['id']);

      $this->template->load('layouts/main', 'customer/customer_address',$this->data);
    }
  }

  // public function add_address(){
  //   $address=array(
  //     'user_id'=>$this->data['user_profile']['id'],
  //     'name'=>strtoupper($this->input->post('name')),
  //     'phone'=>$this->input->post('phone'),
  //     'address'=>strtoupper($this->input->post('address')),
  //     'default_add'=>0,
  //   );
  //   $this->db->insert('ci_addresses',$address);
  //   redirect(base_url('customer/addresses'));
  // }

  // public function get_billAddress(){
  //     $billing_id=$this->input->post('billing_id');
  //     //$this->data['default_add']=$this->input->post('default_add');
  //     $this->data['bill']=$this->customer_model->get_address_detail($billing_id);
  //
  //     $this->load->view('customer/show_address', $this->data);
  // }

  // public function update_billAddress(){
  //   $billing_id=$this->input->post('billing_id');
  //   $bill=array(
  //     'bill_name'=>strtoupper($this->input->post('bill_name')),
  //     'bill_phone'=>$this->input->post('bill_phone'),
  //     'bill_email'=>$this->input->post('bill_email'),
  //     'bill_address'=>strtoupper($this->input->post('bill_address')),
  //   );
  //   $this->db->where('billing_id',$billing_id);
  //   $this->db->update('ci_billing',$bill);
  //
  //   redirect(base_url('customer/addresses'));
  // }

  public function update_shipAddress(){

    $shipping_id=$this->input->post('shipping_id');
    $ship=array(
      'ship_name'=>strtoupper($this->input->post('ship_name')),
      'ship_phone'=>$this->input->post('ship_phone'),
      'ship_address'=>strtoupper($this->input->post('ship_address')),
      'ship_postcode'=>$this->input->post('ship_postcode'),
      'ship_area'=>strtoupper($this->input->post('ship_area')),
      'ship_state'=>$this->input->post('ship_state'),
    );
    $this->db->where('shipping_id',$shipping_id);
    $this->db->update('ci_shipping',$ship);

    redirect(base_url('member/addresses'));
  }

  public function get_del_address(){
      $address_id=$this->input->post('address_id');
      //$this->data['default_add']=$this->input->post('default_add');
      $this->data['cost']=$this->customer_model->get_address_detail($address_id);

      $this->load->view('orders/cost_detail', $this->data);
  }
  //
  // public function delete_address(){
  //   $address_id=$this->input->post('address_id');
  //
  //     $this->db->where('address_id',$address_id);
  //     $this->db->delete('ci_addresses');
  //
  //   redirect(base_url('customer/addresses'));
  // }
  //
  // public function set_pickup(){
  //   $address_id=$this->input->post('address_id');
  //     //set all to '0'
  //     $this->db->where('user_id',$this->data['user_profile']['id']);
  //     $this->db->update('ci_addresses',array('pickup'=>'0'));
  //     //then change to new one==1
  //     $this->db->where('address_id',$address_id);
  //     $this->db->update('ci_addresses',array('pickup'=>'1'));
  //
  //   redirect(base_url('customer/addresses'),'refresh');
  // }

  public function cart(){
    // if(!$this->ion_auth->logged_in()){
    //     redirect(base_url('customer/register'), 'refresh');
    // }else{
      //$this->data['address']=$this->customer_model->get_addresses($this->data['user_profile']['id']);

      $this->template->load('layouts/main', 'customer/cart_list',$this->data);
    //}
  }

  public function clear_item_cart($id)
  {

    $this->cart->remove($id);
    //$this->session->set_flashdata('message','Maklumat jualan telah dipadam sepenuhnya.');

    redirect('member/cart');
  }

  // public function update_inc_cart()
  // {
  //   $rowid=$this->input->post('rowid');
  //   $qty=$this->input->post('input_qty');
  //   $new=$qty+1;
  //   $data=array('rowid'=>$rowid,'qty'=>$new);
  //   $this->cart->update($data);
  //   //$this->session->set_flashdata('message','Maklumat jualan telah dipadam sepenuhnya.');
  //
  //   redirect('customer/cart');
  // }
  //
  // public function update_decs_cart()
  // {
  //   $rowid=$this->input->post('rowid');
  //   $qty=$this->input->post('input_qty');
  //   $new=$qty-1;
  //   if($new!=0){
  //     $data=array('rowid'=>$rowid,'qty'=>$new);
  //     $this->cart->update($data);
  //   }
  //   //$this->session->set_flashdata('message','Maklumat jualan telah dipadam sepenuhnya.');
  //
  //   redirect('customer/cart');
  // }

  public function orders()
  {
    if (!$this->ion_auth->logged_in())
    {
      redirect('member/register', 'refresh');
    }else{

      $this->data['order_status'] = $this->order_model->get_order_status();

      //auto cancel kalau status 'To Pay' lebih 24 jam
      foreach ($this->data['order_status'] as $key) {
        if ($key['order_status']==0 && (date('Y-m-d H:i:s') >  $key['next_transaction'])) {

          $check_order = $this->order_model->get_items($key['order_id']);

          foreach ($check_order as $v) {
            if($v['order_id']==$key['order_id'] && $key['seller_id']==$v['seller_id'])
            {
              $this->db->where('order_id',$key['order_id']);
              $this->db->where('product_id',$v['product_id']);
              $this->db->delete('ci_inventory');
            }
          }

          $cancel_data=array(
            'order_status'=> 6,
            'cancelled_desc'=> 'Order expired'
          );
          $this->db->where('order_id',$key['order_id']);
          $this->db->update('ci_order_status',$cancel_data);
          
          $trans=array(
            'order_status_id'=>$key['order_status_id'],
            'transaction_status'=>6,
          );
          $this->db->insert('ci_transaction',$trans);
        }
      }

      $this->data['orders'] = $this->order_model->get_order($this->data['user_profile']['id']);
      $this->data['items'] = $this->order_model->get_items();
      $this->data['order_status'] = $this->order_model->get_order_status();

      $this->template->load('layouts/main','customer/customer_order', $this->data);
    }
  }

  public function view_order($order_id)
  {
    if (!$this->ion_auth->logged_in())
    {
      redirect('member/register', 'refresh');
    }else{

      $this->data['orders'] = $this->order_model->get_order($this->data['user_profile']['id'],$order_id);
      $this->data['items'] = $this->order_model->get_items($order_id);
      $this->data['track'] = $this->order_model->get_track($order_id);
      $this->data['bank'] = $this->order_model->get_list_bank();
      $this->data['order_status'] = $this->order_model->get_order_status($order_id);

      $orderID = $order_id;

      $this->template->load('layouts/main','customer/customer_view_order', $this->data);
    }
  }

  public function get_customers()
  {
    $this->data['title'] = 'Senarai Pelanggan';
    $this->data['customers'] = $this->customer_model->get_pelanggan($this->data['user_profile']['wakalah_id']);

    $this->template->load('layouts/admin', 'customer/customers_table', $this->data);
  }

  public function detail($customer_id = '')
	{
		$this->data['title'] = 'Customer Details';

		// pass the user to the view
    $this->data['customers']= $this->customer_model->get_detail($customer_id,$this->data['user_profile']['wakalah_id']);

    $this->template->load('layouts/admin', 'customer/customer_detail', $this->data);
	}

  public function edit()
	{
    $customer_id=$this->input->post('customer_id');
    $clean_phone = preg_replace("/[^0-9]/", '', $this->input->post('phone'));
    //if(isset($_POST)){
      $cust_data=array(
        'mykad' => strtoupper($this->input->post('mykad')),
        'name' => strtoupper($this->input->post('name')),
        'address' => strtoupper($this->input->post('address')),
        'email' => $this->input->post('email'),
        'phone' => $clean_phone,
        'created'=>date("Y-m-d H:i:s")
      );

      $this->customer_model->update_customer_info($customer_id,$cust_data);

        $m="Kemaskini Selesai";
        echo "<script type='text/javascript'>alert('$m');</script>";
        //echo "<script type='text/javascript'>alert('$m');window.location.href = '" . base_url() . "customer/get_customers';</script>";
    //}
    redirect('member/get_customers','refresh');
	}

  public function comissions()
  {
    if (!$this->ion_auth->logged_in())
    {
      redirect('member/register', 'refresh');
    }else{

      $this->data['member_comm'] = $this->admin_model->get_member_comm($this->data['user_profile']['id']);
      $this->data['order_comm'] = $this->order_model->get_comm_order($this->data['user_profile']['id']);

      $this->template->load('layouts/main','customer/customer_comm', $this->data);
    }
  }

  public function referral()
  {
    $this->data['referral'] = $this->user_model->get_referral($this->data['user_profile']['id']);

    $this->template->load('layouts/main','customer/customer_refer', $this->data);
  }


}
