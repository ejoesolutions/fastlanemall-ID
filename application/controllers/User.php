<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{

  public function __construct()
	{
		parent::__construct();
		$this->load->database();
    $this->load->model('user_model');
    $this->load->model(array('admin_model','order_model'));
		$this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');

    if ($this->ion_auth->logged_in()) {
      $user = $this->ion_auth->user()->row();
      $this->data['user_profile'] = $this->user_model->get_profile($user->id);
      $this->data['shop'] = $this->user_model->get_seller($user->id);
      if($this->data['user_profile']['user_group']==2){
        $this->data['count_order'] = $this->order_model->get_order_status(null,$this->data['shop']['seller_id']);
      }else {
        $this->data['count_order'] = $this->order_model->get_order_status();
      }
      $_SESSION['user_id']=$this->data['user_profile']['id'];
      $_SESSION['username']=$this->data['user_profile']['username'];
    }
    $this->data['logo'] = $this->admin_model->get_logo();
    //$this->data['count_order'] = $this->order_model->count_order();
    $this->data['count_newSeller'] = $this->user_model->count_register_seller(); //utk side menu
		$this->data['count_pen_tranc'] = $this->user_model->count_pen_tranc(); //utk side menu
    $this->data['state']=$this->user_model->state_list();
    $this->data['list_shop'] = $this->product_model->list_seller();
		$this->data['currency'] = $this->admin_model->get_currency();
    $this->output->enable_profiler(false);

	}

  public function index()
  {
    $this->get_users();
  }

  public function get_users()
  {
    $this->data['title'] = 'Users List';

    if (!$this->ion_auth->logged_in()) {
			redirect('user/login', 'refresh');
		} else {

			if ($this->data['user_profile']['user_group'] == 3)
			{
				return show_404('The page you requested was not found.');
			}
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			//list the users
			// $this->data['users'] = $this->ion_auth->users()->result();
      $this->data['users'] = $this->user_model->get_users();
			// foreach ($this->data['users'] as $k => $user)
			// {
			// 	$this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
			// }

      $this->template->load('layouts/admin', 'user/users_table', $this->data);
		}

  }

	public function get_customer()
  {
    $this->data['title'] = 'Customer List';

		$this->data['users'] = $this->user_model->get_customer();

    if (!$this->ion_auth->logged_in()) {
			redirect('user/login', 'refresh');
		} else {

      $this->template->load('layouts/admin', 'user/customers_table', $this->data);
		}
  }

  public function edit($id)
	{
	  if (!$this->ion_auth->logged_in())
		{
			redirect('user/login', 'refresh');
		}

		$this->data['title'] = 'Manage Profile';
    $this->data['user_info'] = $this->user_model->get_profile($id);
    $this->data['referral'] = $this->user_model->get_referral($id);
		
		$tables = $this->config->item('tables', 'ion_auth');
		// validate form input
		$this->form_validation->set_rules('full_name', 'Full Name', 'trim|required');
    //$this->form_validation->set_rules('nic_no', 'No. Kad Pengenalan', 'trim|numeric|required|max_length[12]');
		$this->form_validation->set_rules('phone', 'Phone No', 'trim|required');
		$this->form_validation->set_rules('address', 'Address', 'trim|required');
		$this->form_validation->set_rules('postcode', 'Postcode', 'trim|required|is_numeric');
		$this->form_validation->set_rules('town_area', 'Area', 'trim|required');
		// $this->form_validation->set_rules('state_id', 'State', 'trim|required');
		if($this->input->post('username') != $this->data['user_info']['username']) {
			$is_unique =  '|is_unique[ci_users.username]';
		} else {
			$is_unique =  '';
		}
		
		$this->form_validation->set_rules('username', 'Username', 'required|trim'.$is_unique);

    // $this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]');


		if (isset($_POST) && !empty($_POST))
		{
			// update the password if it was posted
			if ($this->input->post('password'))
			{
				$this->form_validation->set_rules('password', $this->lang->line('edit_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
				$this->form_validation->set_rules('password_confirm', $this->lang->line('edit_user_validation_password_confirm_label'), 'required');
			}

			if($this->input->post('email') != $this->input->post('ori_email')){
				$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
			}

			if ($this->form_validation->run() === TRUE)
			{

				// update the password if it was posted
				if ($this->input->post('password'))
				{
          $data = array(
            'password' => $this->input->post('password'),
  				);
          //audit
          if($this->data['user_profile']['user_group']!=2){
            $data_log=array(
              'ip_address'=>$ip = $this->input->ip_address(),
              'user_id'=>$this->data['user_profile']['id'],
              'username'=>$this->data['user_profile']['username'],
              'time_record'=>date("Y-m-d H:i:s"),
              'description'=>'Change password [User ID:'.$this->data['user_info']['id'].']',
            );
            $this->db->insert('ci_audit_log',$data_log);
          }
          $this->ion_auth->update($this->data['user_info']['id'], $data);
				}

				// check to see if we are updating the user
          $profile_data = array(
            'full_name' => strtoupper($this->input->post('full_name')),
            'phone' => $this->input->post('phone'),
            'address' => strtoupper($this->input->post('address')),
            'postcode' => $this->input->post('postcode'),
            'town_area' => strtoupper($this->input->post('town_area')),
            // 'state_id' => $this->input->post('state_id'),
            'state_id' => 1
          );
          $this->db->where('user_id', $this->data['user_info']['id']);
          $this->db->update('ci_users_profile', $profile_data);
					// redirect them back to the admin page if admin, or to the base url if non admin
					$this->session->set_flashdata('message', $this->ion_auth->messages());

          $this->db->where('id', $this->data['user_info']['id']);
          $this->db->update('ci_users', array('email'=>$this->input->post('email')));

          $status_user=array(
            'active' =>$this->input->post('active'),
						'username' => $this->input->post('username'),
          );
          $this->db->where('id', $this->data['user_info']['id']);
          $this->db->update('ci_users', $status_user);

          //audit
          if($this->data['user_profile']['user_group']!=2){
            $data_log=array(
              'ip_address'=>$ip = $this->input->ip_address(),
              'user_id'=>$this->data['user_profile']['id'],
              'username'=>$this->data['user_profile']['username'],
              'time_record'=>date("Y-m-d H:i:s"),
              'description'=>'Update profile user [User ID:'.$id.']',
            );
            $this->db->insert('ci_audit_log',$data_log);
          }

					$m="Update successful";
					echo "<script type='text/javascript'>alert('$m');window.location.href = '" . base_url() . "user/edit/".$this->data['user_info']['id']."';</script>";

			}
		}

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		$this->data['full_name'] = array(
			'name'  => 'full_name',
			'id'    => 'full_name',
			'type'  => 'text',
      'class' => 'form-control uppercase',
			'value' => $this->form_validation->set_value('full_name', $this->data['user_info']['full_name']),
		);

		$this->data['username'] = array(
			'name'  => 'username',
			'id'    => 'username',
			'type'  => 'text',
      'class' =>'form-control',
      // 'readonly' =>'readonly',
			'value' => $this->form_validation->set_value('username', $this->data['user_info']['username']),
		);

    $this->data['email'] = array(
			'name'  => 'email',
			'id'    => 'email',
			'type'  => 'text',
      'class' => 'form-control',
			'value' => $this->form_validation->set_value('email', $this->data['user_info']['email']),
		);

    $this->data['phone'] = array(
			'name'  => 'phone',
			'id'    => 'phone',
			'type'  => 'text',
      'class' => 'form-control',
			'value' => $this->form_validation->set_value('phone', $this->data['user_info']['phone']),
		);

    $this->data['address'] = array(
			'name'  => 'address',
			'id'    => 'address',
			'type'  => 'text',
      'class' => 'form-control',
			'value' => $this->form_validation->set_value('address', $this->data['user_info']['address']),
		);

		$this->data['postcode'] = array(
			'name'  => 'postcode',
			'id'    => 'postcode',
			'type'  => 'text',
      'class' => 'form-control',
			'value' => $this->form_validation->set_value('postcode', $this->data['user_info']['postcode']),
		);

    $this->data['town_area'] = array(
			'name'  => 'town_area',
			'id'    => 'town_area',
			'type'  => 'text',
      'class' => 'form-control uppercase',
			'value' => $this->form_validation->set_value('town_area', $this->data['user_info']['town_area']),
		);

    $this->data['state_id'] = array(
			'name'  => 'state_id',
			'id'    => 'state_id',
			'type'  => 'text',
      'class' => 'form-control',
			'value' => $this->form_validation->set_value('state_id', $this->data['user_info']['state_id']),
		);

		$this->data['ahli_id'] = array(
			'name'  => 'ahli_id',
			'id'    => 'ahli_id',
			'type'  => 'text',
      'class' => 'form-control',
			'readonly' => '',
			'value' => $this->form_validation->set_value('ahli_id', $this->data['user_info']['ahli_id']),
		);

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

    $this->template->load('layouts/admin', 'user/edit_user', $this->data);

	}


	public function login()
	{
		$this->data['title'] = 'Login';

		// validate form input
		$this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
		$this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

		if ($this->form_validation->run() === TRUE)
		{
			// check to see if the user is logging in
			// check for "remember me"
			$remember = (bool)$this->input->post('remember');

			if ($this->ion_auth->login($this->input->post('identity'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('message', $this->ion_auth->messages());

          redirect('admin/dashboard', 'refresh');

			}
			else
			{
				// if the login was un-successful
        	// $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
				  // $this->session->set_flashdata('message', $this->ion_auth->errors());

          $m="Invalid Username/Email or Password";
          ob_start();
          echo "<script type='text/javascript'>alert('$m');</script>";
          redirect('user/login', 'refresh');
        // echo "<script type='text/javascript'>alert('$m');window.location.href = '" . base_url() . "user/login';</script>";
         ob_end_clean();
			}
		}
		else
		{
			// the user is not logging in so display the login page
			// set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['identity'] = array('name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
        'class' => 'form-control form-control-solid placeholder-no-fix',
        'autocomplete' => 'off',
        'placeholder' => 'Username/Email',
				'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['password'] = array('name' => 'password',
				'id' => 'password',
				'type' => 'password',
        'class' => 'form-control',
			);

      $this->template->load('layouts/auth', 'auth/login', $this->data);
      // $this->load->view('layouts/auth', $this->data);
		}
	}

	/**
	 * Log the user out
	 */
	public function logout()
	{
    if(isset($_SESSION['user_id'])!=''){
      if($this->data['user_profile']['user_group']!=2){
        $data_log=array(
          'ip_address'=>$ip = $this->input->ip_address(),
          'user_id'=>$_SESSION['user_id'],
          'username'=>$_SESSION['username'],
          'time_record'=>date("Y-m-d H:i:s"),
          'description'=>'User logout',
        );
        $this->db->insert('ci_audit_log',$data_log);
      }
    }
		// log the user out
		$logout = $this->ion_auth->logout();
		// redirect them to the login page
		$this->session->set_flashdata('message', $this->ion_auth->messages());
    //audit

		redirect('', 'refresh');
	}

  /**
	 * Create a new user
	 */
	public function register()
	{
	  if (!$this->ion_auth->logged_in())
		{
			redirect('user/login', 'refresh');
		}

		if ($this->data['user_profile']['user_group'] == 3)
		{
			return show_404('The page you requested was not found.');
		}

		$this->data['title'] = 'Register User';
		$tables = $this->config->item('tables', 'ion_auth');
		$identity_column = $this->config->item('identity', 'ion_auth');
		$this->data['identity_column'] = $identity_column;

		// validate form input
		$this->form_validation->set_rules('full_name', 'Full Name', 'required');
		$this->form_validation->set_rules('phone', 'Phone No', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('postcode', 'Postcode', 'required|is_numeric');
		$this->form_validation->set_rules('town_area', 'Area', 'required');
		$this->form_validation->set_rules('state_id', 'State', 'required');

		if ($identity_column !== 'email') {
      $this->form_validation->set_rules('identity', 'Username', 'required|is_unique[' . $tables['users'] . '.' . $identity_column . ']');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
		} else {
			$this->form_validation->set_rules('email', $this->lang->line('create_user_validation_email_label'), 'required|valid_email|is_unique[' . $tables['users'] . '.email]');
		}
		$this->form_validation->set_rules('password', $this->lang->line('create_user_validation_password_label'), 'required|min_length[' . $this->config->item('min_password_length', 'ion_auth') . ']|max_length[' . $this->config->item('max_password_length', 'ion_auth') . ']|matches[password_confirm]');
		$this->form_validation->set_rules('password_confirm', $this->lang->line('create_user_validation_password_confirm_label'), 'required');

    if ($this->form_validation->run() === TRUE)
		{
			$email = strtolower($this->input->post('email'));
			$identity = ($identity_column === 'email') ? $email : $this->input->post('identity');
			$password = $this->input->post('password');
      $active = $this->input->post('active');

			$additional_data = array(
				'full_name' => $this->input->post('full_name'),
        'phone' => $this->input->post('phone'),
        //'nic_no' => $this->input->post('identity'),
        'address' => $this->input->post('address'),
        'postcode' => $this->input->post('postcode'),
        'town_area' => strtoupper($this->input->post('town_area')),
        'state_id' => $this->input->post('state_id'),
			);

		}
		if ($this->form_validation->run() === TRUE)
		{
			$subject = "Pendaftaran Pengguna Fastlanemall";
			$message = '<html><body>';
			if($this->input->post('user_group')==1){
				$message .= "<head><meta http-equiv='Content-Type' content='text/html; charset=utf-8'>Assalamualaikum dan Selamat Sejahtera.<br><br>Di bawah adalah maklumat anda untuk mengakses Sistem Fastlanemall. Layari ".base_url('user/login')." untuk mengakses sistem ini.</head>";

			}else{
				$message .= "<head>Assalamualaikum dan Selamat Sejahtera.<br><br>Di bawah adalah maklumat anda untuk mengakses Sistem Fastlanemall. Layari ".base_url('member/register')." untuk mengakses sistem ini.</head>";
			}

			$message .= '<tr><td colspan="2" align="center"><h2>Fastlanemall</h2></td></tr>';
			$message .= "<tr><td><strong>Nama Pengguna</strong> </td><td>" .$this->input->post('full_name'). "</td></tr>";
			$message .= "<tr><td><strong>Username</strong> </td><td>" .$this->input->post('identity'). "</td></tr>";
			$message .= "<tr><td><strong>Email</strong> </td><td>" . $email. "</td></tr>";
			$message .= "<tr><td><strong>Password</strong> </td><td>" . $this->input->post('password'). "</td></tr></body></html>";


			$this->load->library('email');
			$this->email->from($this->config->item('admin_email', 'ion_auth'), $this->config->item('site_title', 'ion_auth'));
			$this->email->to($this->input->post('email'));
			$this->email->subject($subject);
			$this->email->message($message);

			if($this->email->send()){
				$user_id=$this->ion_auth->register($identity, $password, $email, $additional_data);
				$this->ion_auth->create_profile($additional_data,$user_id);

				//audit
				if($this->data['user_profile']['user_group']!=2){
					$data_log=array(
						'ip_address'=>$ip = $this->input->ip_address(),
						'user_id'=>$this->data['user_profile']['id'],
						'username'=>$this->data['user_profile']['username'],
						'time_record'=>date("Y-m-d H:i:s"),
						'description'=>'Register new user [User ID:'.$user_id.']',
					);
					$this->db->insert('ci_audit_log',$data_log);
				}

				$m="Registration successful";
				echo "<script type='text/javascript'>alert('$m');window.location.href = '" . base_url() . "user/get_users';</script>";
			}else{
				$m="Registration unsuccessful";
				echo "<script type='text/javascript'>alert('$m');window.location.href = '" . base_url() . "user/get_users';</script>";
			}
		}
		else
		{
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
  			'name'  => 'postcode',
  			'id'    => 'postcode',
  			'type'  => 'text',
        'class' => 'form-control',
        'placeholder' => 'Postcode',
  			'value' => $this->form_validation->set_value('postcode'),
  		);

      $this->data['town_area'] = array(
  			'name'  => 'town_area',
  			'id'    => 'town_area',
  			'type'  => 'text',
        'class' => 'form-control uppercase',
        'placeholder' => 'Area',
  			'value' => $this->form_validation->set_value('town_area'),
  		);

      $this->data['state_id'] = array(
  			'name'  => 'state_id',
  			'id'    => 'state_id',
  			'type'  => 'text',
        'class' => 'form-control',
  			'value' => $this->form_validation->set_value('state_id'),
  		);

			$this->data['identity'] = array(
				'name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
        'class' =>'form-control',
        'placeholder' => 'Username',
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
				'value' => $this->form_validation->set_value('password'),
			);

			$this->data['password_confirm'] = array(
				'name' => 'password_confirm',
				'id' => 'password_confirm',
        'class' => 'form-control',
				'type' => 'password',
        'placeholder' => 'Password Confirmation',
				'value' => $this->form_validation->set_value('password_confirm'),
			);

      $this->template->load('layouts/admin', 'user/register', $this->data);
		}
	}

  /**
	 * Forgot password
	 */
	public function forgot_password()
	{
		// setting validation rules by checking whether identity is username or email
		if ($this->config->item('identity', 'ion_auth') != 'email') {
			$this->form_validation->set_rules('identity', $this->lang->line('forgot_password_identity_label'), 'required');
		} else {
			$this->form_validation->set_rules('identity', $this->lang->line('forgot_password_validation_email_label'), 'required|valid_email');
		}

		if ($this->form_validation->run() === FALSE)
		{

      if($this->input->post('user_group')==2){
        $m="Invalid Username/Email";
        //  echo "<script type='text/javascript'>alert('$m');</script>";
        //  redirect('customer/register', 'refresh');
        echo "<script type='text/javascript'>alert('$m');window.location.href = '" . base_url() . "member/register';</script>";
      }

			$this->data['type'] = $this->config->item('identity', 'ion_auth');
			// setup the input
			$this->data['identity'] = array(
        'name' => 'identity',
				'id' => 'identity',
        'class' => 'form-control form-control-solid placeholder-no-fix',
        'autocomplete' => 'off',
			);

			if ($this->config->item('identity', 'ion_auth') != 'email') {
				$this->data['identity_label'] = $this->lang->line('forgot_password_identity_label');
			} else {
				$this->data['identity_label'] = $this->lang->line('forgot_password_email_identity_label');
			}

			// set any errors and display the form
			$this->data['message'] = "Make sure username/email is correct.";

      $this->template->load('layouts/auth','auth/forgot_password', $this->data);
		}
		else
		{
			$identity_column = $this->config->item('identity', 'ion_auth');
      // $identity = $this->ion_auth->where($identity_column, $this->input->post('identity'))->users()->row();
			$identity = $this->ion_auth->where($identity_column.' = "'.$this->input->post('identity').'" or email = "'.$this->input->post('identity').'"')->users()->row();

			if (empty($identity))
			{

				if ($this->config->item('identity', 'ion_auth') != 'email')
				{
					$this->ion_auth->set_error('forgot_password_identity_not_found');
				}
				else
				{
					$this->ion_auth->set_error('forgot_password_email_not_found');
				}

				$this->session->set_flashdata('message', $this->ion_auth->errors());
        if($this->input->post('user_group')==2){
          $m="Invalid Username/Email";
        //   echo "<script type='text/javascript'>alert('$m');</script>";
        //   redirect('customer/register', 'refresh');
        echo "<script type='text/javascript'>alert('$m');window.location.href = '" . base_url() . "member/register';</script>";
        }
				redirect('user/forgot_password', 'refresh');
			}

			// run the forgotten password method to email an activation code to the user
			$forgotten = $this->ion_auth->forgotten_password($identity->{$this->config->item('identity', 'ion_auth')});

			if ($forgotten)
			{
				// if there were no errors
        if($this->input->post('user_group')==2){
          $m="Check your email to reset password.";
        //   echo "<script type='text/javascript'>alert('$m');</script>";
        //   redirect('customer/register', 'refresh');
        echo "<script type='text/javascript'>alert('$m');window.location.href = '" . base_url() . "member/register';</script>";
        }
        $m="Check your email to reset password.";
        //echo "<script type='text/javascript'>alert('$m');</script>";
		$this->session->set_flashdata('message', $this->ion_auth->messages());
		//redirect('user/login', 'refresh');
		echo "<script type='text/javascript'>alert('$m');window.location.href = '" . base_url() . "user/login';</script>";
			}
			else
			{
        if($this->input->post('user_group')==2){
          $m="Invalid Username/Email";
        //   echo "<script type='text/javascript'>alert('$m');</script>";
        //   redirect('customer/register', 'refresh');
        echo "<script type='text/javascript'>alert('$m');window.location.href = '" . base_url() . "member/register';</script>";
        }
				$this->session->set_flashdata('message', $this->ion_auth->errors());
				redirect('user/forgot_password', 'refresh');
			}
		}
	}

  public function verify_account(){
    if(isset($_GET['id'])){
        $this->db->where('id',$_GET['id']);
        $this->db->update('ci_users', array('verify_acc'=>1));
        $m="Your account has been verified. Thank you.";
        // echo "<script type='text/javascript'>alert('$m');</script>";
        // redirect('customer/register', 'refresh');
        echo "<script type='text/javascript'>alert('$m');window.location.href = '" . base_url() . "member/register';</script>";
    }
  }

  public function newslatter()
  {

    if(!$this->ion_auth->logged_in()){
      redirect('user/login','refresh');
    }
      $this->data['title'] = 'Newslatter';
      $this->data['news'] = $this->user_model->newslatter();
      $this->template->load('layouts/admin', 'user/newslatter', $this->data);
  }

  public function delete_user($user_id)
  {
    $this->query=$this->db->query('
    SELECT DISTINCT
          item.order_id
      FROM
          `ci_order_items` item
      JOIN ci_seller AS seller
      ON
          seller.seller_id = item.seller_id
      where seller.user_id = '.$user_id
    );
    $result = $this->query->num_rows();
    
    if($result > 0)
    {
      $arr=$this->query->result_array();
      for($i=0;$i<$result;$i++)
      {
        $this->db->where('order_id',$arr[$i]['order_id']);
        $this->db->delete('ci_orders');
      }
    }
    $this->db->where('id',$user_id);
    $this->db->delete('ci_users');
    redirect('user/get_users','refresh');
  }

  /**
	 * @return array A CSRF key-value pair
	 */
	public function _get_csrf_nonce()
	{
		$this->load->helper('string');
		$key = random_string('alnum', 8);
		$value = random_string('alnum', 20);
		$this->session->set_flashdata('csrfkey', $key);
		$this->session->set_flashdata('csrfvalue', $value);

		return array($key => $value);
	}

	/**
	 * @return bool Whether the posted CSRF token matches
	 */
	public function _valid_csrf_nonce()
	{
		$csrfkey = $this->input->post($this->session->flashdata('csrfkey'));
		if ($csrfkey && $csrfkey === $this->session->flashdata('csrfvalue'))
		{
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}

	/**
	 * @param string     $view
	 * @param array|null $data
	 * @param bool       $returnhtml
	 *
	 * @return mixed
	 */
	public function _render_page($view, $data = NULL, $returnhtml = FALSE)//I think this makes more sense
	{

		$this->viewdata = (empty($data)) ? $this->data : $data;

		$view_html = $this->load->view($view, $this->viewdata, $returnhtml);

		// This will return html on 3rd argument being true
		if ($returnhtml)
		{
			return $view_html;
		}
	}

}
