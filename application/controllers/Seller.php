<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Seller extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->database();
    $this->load->model(array('admin_model','order_model','customer_model','product_model'));
		$this->lang->load('auth');

    if ($this->ion_auth->logged_in())
    {
      $user = $this->ion_auth->user()->row();
      $this->data['user_profile'] = $this->user_model->get_profile($user->id);
      $this->data['shop'] = $this->user_model->get_seller($user->id);
      if($this->data['user_profile']['user_group']==2){
        $this->data['count_order'] = $this->order_model->get_order_status(null,$this->data['shop']['seller_id']);
      }else {
        $this->data['count_order'] = $this->order_model->get_order_status();
      }
    }

    $this->data['products'] = $this->product_model->get_all_product();
    $this->data['logo'] = $this->admin_model->get_logo();
    $this->data['banner'] = $this->admin_model->get_banner();
    $this->data['pm'] = $this->product_model->get_productCategory();
    $this->data['footer'] = $this->admin_model->get_footer();
    $this->data['count_newSeller'] = $this->user_model->count_register_seller(); //utk side menu
    $this->data['count_pen_tranc'] = $this->user_model->count_pen_tranc(); //utk side menu
    $this->data['state']=$this->user_model->list_state();
    $this->data['list_shop'] = $this->product_model->list_seller();
    $this->data['currency'] = $this->admin_model->get_currency();
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

			if ($this->ion_auth->login_seller($this->input->post('identity'), $this->input->post('password'), $remember))
			{
				//if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('message', $this->ion_auth->messages());

        redirect('seller/seller_dashboard', 'refresh');
			}
			else
			{
        $m="Invalid Username/Email or Password";
        //   echo "<script type='text/javascript'>alert('$m');</script>";
        //   redirect('', 'refresh');
        echo "<script type='text/javascript'>alert('$m');window.location.href = '" . base_url() . "';</script>";
			}
		}
		else
		{
      $m="Invalid Username/Email or Password";
      //   echo "<script type='text/javascript'>alert('$m');</script>";
      //   redirect('', 'refresh');
      echo "<script type='text/javascript'>alert('$m');window.location.href = '" . base_url() . "';</script>";
		}
	}

  public function seller_dashboard()
 {
   if (!$this->ion_auth->logged_in())
   {
     redirect('member/register', 'refresh');
   }
   $this->data['title'] = 'Dashboard';
   $this->data['title2'] = 'Report Summary';

   $this->data['order']=$this->admin_model->count_order($this->data['shop']['seller_id']);
   $this->data['produk']=$this->admin_model->count_product($this->data['shop']['seller_id']);
   $this->data['sale']=$this->admin_model->count_sale($this->data['shop']['seller_id']);
   $this->data['sale_value']=$this->admin_model->count_sale_value($this->data['shop']['seller_id']);

   $this->data['list_shop']=$this->admin_model->dropdown_seller();//utk report baru
   $this->data['list_product']=$this->admin_model->get_productType();
   $this->data['tahun'] = $this->admin_model->get_year_order();
   $this->data['bulan'] = $this->admin_model->get_month_order();
   $this->data['list_client'] = $this->admin_model->list_clients();

   $this->data['order_status'] = $this->order_model->get_order_status(null,$this->data['shop']['seller_id']);

   //search report
   $report_type=$this->input->post('report_type');
   if($report_type!=''){
     if($report_type==1){
      $daily= date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('report_daily'))));
      $this->data['all_report'] = $this->admin_model->get_daily_report($daily);
      $this->data['date']=$daily;
      $this->data['report_type']=$report_type;
     }
     if($report_type==4){

      $category_id=$this->input->post('category_id');
      $daily= date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('report_productDaily'))));
      $this->data['all_report'] = $this->admin_model->get_productDailyOrder_report($daily);
      $this->data['category_id'] = $category_id;
      $this->data['data_pType'] = $this->product_model->get_productCategory($category_id);
      $this->data['date']=$daily;
      $this->data['report_type']=$report_type;
     }
     if($report_type==5){

       $bulan=$this->input->post('bulan_5');
       $tahun=$this->input->post('tahun_5');
       //$daily= date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('report_productDaily'))));
       $this->data['all_report'] = $this->admin_model->get_monthlySales_report($bulan,$tahun);
       $this->data['report_type']=$report_type;
       if($bulan==1){
         $this->data['b']="January";
       }elseif($bulan==2){
         $this->data['b']="February";
       }elseif($bulan==3){
         $this->data['b']="March";
       }elseif($bulan==4){
         $this->data['b']="April";
       }elseif($bulan==5){
         $this->data['b']="May";
       }elseif($bulan==6){
         $this->data['b']="June";
       }elseif($bulan==7){
         $this->data['b']="July";
       }elseif($bulan==8){
         $this->data['b']="August";
       }elseif($bulan==9){
         $this->data['b']="September";
       }elseif($bulan==10){
         $this->data['b']="October";
       }elseif($bulan==11){
         $this->data['b']="November";
       }elseif($bulan==12){
         $this->data['b']="December";
       }
       $this->data['bln']=$bulan;
       $this->data['t']=$tahun;
       //audit
       // $data_log=array(
       //   'ip_address'=>$ip = $this->input->ip_address(),
       //   'user_id'=>$this->data['user_profile']['id'],
       //   'username'=>$this->data['user_profile']['username'],
       //   'time_record'=>date("Y-m-d H:i:s"),
       //   'description'=>'Search monthly sales report [Month:'.$bulan.',Year:'.$tahun.']',
       // );
       // $this->db->insert('ci_audit_log',$data_log);
     }
     if($report_type==10){

       $cust_id=$this->input->post('cust_id');
       $this->data['all_report'] = $this->admin_model->get_clientsTransaction($cust_id);
       $this->data['report_type']=$report_type;
       $this->data['data_client']=$this->admin_model->get_clientsList($cust_id);
       //audit
       // $data_log=array(
       //   'ip_address'=>$ip = $this->input->ip_address(),
       //   'user_id'=>$this->data['user_profile']['id'],
       //   'username'=>$this->data['user_profile']['username'],
       //   'time_record'=>date("Y-m-d H:i:s"),
       //   'description'=>'Search report client transaction record [User ID:'.$cust_id.']',
       // );
       // $this->db->insert('ci_audit_log',$data_log);
     }
   }
   $this->data['detail_order'] = $this->admin_model->get_detail_order();
   $this->template->load('layouts/admin','pages/dashboard_seller', $this->data);
 }

  public function create_shop()
  {
    $this->form_validation->set_rules('shop_url', 'Shop Url', 'required|is_unique[ci_seller.shop_url]');

    if ($this->form_validation->run() === TRUE)
    {
      $shop=array(
        'user_id'=>$this->data['user_profile']['id'],
        'shop_name'=>strtoupper($this->input->post('shop_name')),
        'shop_url'=>$this->input->post('shop_url'),
        'seller_type'=>$this->input->post('seller_type'),
        'seller_bank'=>strtoupper($this->input->post('seller_bank')),
        'seller_account'=>base64_encode($this->input->post('seller_acc')),
        'shop_address'=>$this->input->post('shop_address'),
        'shop_postcode'=>$this->input->post('shop_postcode'),
        'shop_city'=> $this->input->post('shop_area'),
        'shop_state'=> $this->input->post('shop_state'),
        'shop_state_id'=> $this->input->post('shop_state_id'),
        'seller_status'=>0,
        'seller_verify' => 0,
        'shop_image'=>null,
        'seller_created'=>date("Y-m-d H:i:s")
      );
      $this->db->insert('ci_seller',$shop);

      $admin_email=array(
        'subject'=>"Pendaftaran Vendor Baru Coffee-Fastlane",
        'message'=>"Assalamualaikum dan Selamat Sejahtera.<br><br>".strtoupper($this->input->post('shop_name'))." telah mendaftar sebagai vendor baru. Sila buat pengesahan selanjutnya.",
      );
      $this->to_admin($admin_email);
      $m="Successful. Please wait the email confirmation from admin.";
      // echo "<script type='text/javascript'>alert('$m');</script>";
      // redirect('customer/dashboard', 'refresh');
      echo "<script type='text/javascript'>alert('$m');window.location.href = '" . base_url() . "member/dashboard';</script>";
    }else {
      // $this->session->set_flashdata('upload', "<script>
      // $(window).on('load', function() {
      //   $('#submitSeller').modal('show');
      // });
      // </script>");

      $m="Not Successful. Shop URL already exists, Please Try Again";
      // echo "<script type='text/javascript'>alert('$m');</script>";
      // redirect('customer/dashboard', 'refresh');
      echo "<script type='text/javascript'>alert('$m');window.location.href = '" . base_url() . "member/dashboard';</script>";
    }
  }

  public function seller_list()
  {
    $this->data['title'] = 'Sellers List';

    if (!$this->ion_auth->logged_in()) {
      redirect('user/login', 'refresh');
    } else {
      $this->data['seller'] = $this->user_model->get_seller();
      $this->template->load('layouts/admin', 'seller/seller_table', $this->data);
    }
  }

 public function new_seller()
 {
   $this->data['title'] = 'New Seller';

   if (!$this->ion_auth->logged_in()) {
    redirect('user/login', 'refresh');
   } else {
    $this->data['seller'] = $this->user_model->get_new_seller();
    $this->template->load('layouts/admin', 'seller/new_seller', $this->data);
   }
 }

 public function verify()
 {
  $seller_id=$this->input->post('seller_id');
  $this->data['seller'] = $this->user_model->get_detail_seller($seller_id);
  $this->load->view('seller/seller_detail', $this->data);
 }

 public function upd_verify($seller_id)
 {
  //  $seller_id=$this->input->post('seller_id');

  //  $subject = "Congrats!!You can start selling now.";
  //  $message = '<h3>Hi!</h3><br>';
  //  $message .= 'Your account has been verified and you can start selling now. Click link below:<br>';
  //  $message .= anchor('member/register');

  //  $this->load->library('email');
  //  $this->email->from($this->config->item('admin_email', 'ion_auth'), $this->config->item('site_title', 'ion_auth'));
  //  $this->email->to($this->input->post('email'));
  //  $this->email->subject($subject);
  //  $this->email->message($message);

  //  if($this->email->send()){
  $this->db->where('seller_id',$seller_id);
  $this->db->update('ci_seller',array('seller_status'=>1,'seller_verify'=>1));
  //    if($this->data['user_profile']['user_group']!=2){
  //      $data_log=array(
  //        'ip_address'=>$ip = $this->input->ip_address(),
  //        'user_id'=>$this->data['user_profile']['id'],
  //        'username'=>$this->data['user_profile']['username'],
  //        'time_record'=>date("Y-m-d H:i:s"),
  //        'description'=>'Verify new seller [Seller ID:'.$seller_id.']',
  //      );
  //      $this->db->insert('ci_audit_log',$data_log);
  //    }
  //  }
  redirect('seller/new_seller', 'refresh');
 }

  public function upd_seller($seller_id)
  {
    $this->data['title'] = 'Edit Seller';
    
    if (!$this->ion_auth->logged_in()) {
      redirect('user/login', 'refresh');
    }

    $this->data['seller'] = $this->user_model->get_detail_seller($seller_name='',$seller_id);
    $this->template->load('layouts/admin', 'seller/edit_seller', $this->data);
  }

  public function update_seller()
  {  
    if($this->input->post('shop_url') != $this->input->post('shop_url_old')) {
      $is_unique =  '|is_unique[ci_seller.shop_url]';
    } else {
      $is_unique =  '';
    }

    $seller_id = $this->input->post('seller_id');
  
    $this->form_validation->set_rules('shop_url', 'Shop Url', 'required'.$is_unique);

    if ($this->form_validation->run() === TRUE)
    {
      // Muat naik imej
      $config['upload_path'] = 'images';
      $config['allowed_types']  = 'jpg|png|jpeg';
      // $config['max_width']  =  500;
      // $config['max_height']  =  500;
      // $config['max_size']  =  256;
      $config['encrypt_name']  =  TRUE;
      $config['remove_spaces']  =  TRUE;
      $config['file_ext_tolower']  =  TRUE;
      $config['overwrite']  =  FALSE;

      $this->load->library('upload', $config);
      if($this->data['user_profile']['user_group']==2){
        //if(isset($_POST['shop_image'])!=''){
          if ($this->upload->do_upload('shop_image')) {
            if($this->input->post('temp_logo')!=''){
              unlink("logo_vendor/".$this->input->post('temp_logo'));
              unlink("logo_vendor/small/".$this->input->post('temp_logo'));
            }

            $upload_data = $this->upload->data();
            $image_file = $upload_data['raw_name'] . $upload_data['file_ext'];

            $this->load->library('image_lib');

            /* First size */
            $configSize1['image_library']   = 'gd2';
            $configSize1['source_image']    = 'images/'.$image_file;
            $configSize1['maintain_ratio']  = TRUE;
            $configSize1['width']           = 300;
            $configSize1['height']          = 300;
            $configSize1['new_image']       = 'logo_vendor/'.$image_file;
          
            $this->image_lib->initialize($configSize1);
            $this->image_lib->resize();
            $this->image_lib->clear();

            $configSize2['image_library']   = 'gd2';
            $configSize2['source_image']    = 'images/'.$image_file;
            $configSize2['maintain_ratio']  = TRUE;
            $configSize2['width']           = 30;
            $configSize2['height']          = 30;
            $configSize2['new_image']       = 'logo_vendor/small/'.$image_file;
          
            $this->image_lib->initialize($configSize2);
            $this->image_lib->resize();
            $this->image_lib->clear();

            //delete gambar asal
            unlink("images/".$image_file);

            $seller_info=array(
              'shop_name'=>$this->input->post('shop_name'),
              'shop_url'=>$this->input->post('shop_url'),
              'seller_bank'=>$this->input->post('seller_bank'),
              'seller_account'=>base64_encode($this->input->post('seller_account')),
              'shop_image'=>$image_file,
              'shop_address'=>$this->input->post('shop_address'),
              'shop_postcode'=>$this->input->post('shop_postcode'),
              'shop_city'=>$this->input->post('shop_city'),
              'shop_state'=>$this->input->post('shop_state'),
              'shop_state_id'=>$this->input->post('shop_state_id'),
            );
            $this->db->where('seller_id',$this->input->post('seller_id'));
            $this->db->update('ci_seller',$seller_info);

            $user_p_info=array(
              'full_name'=>$this->input->post('full_name'),
              'phone'=>$this->input->post('phone'),
            );
            $this->db->where('user_id',$this->input->post('user_id'));
            $this->db->update('ci_users_profile',$user_p_info);
      
            $user_info=array(
              'email'=>$this->input->post('email'),
            );
            $this->db->where('id',$this->input->post('user_id'));
            $this->db->update('ci_users',$user_info);

          } else{
          if($this->upload->display_errors() && $_FILES['shop_image']['name']!=''){
            $m = 'Please upload image size < 250KB';
            echo "<script type='text/javascript'>alert('$m');window.location.href = '" . base_url() . "seller/upd_seller/".$this->input->post('seller_id')."';</script>";
          }else{
            $seller_info=array(
              'shop_name'=>$this->input->post('shop_name'),
              'shop_url'=>$this->input->post('shop_url'),
              'seller_bank'=>strtoupper($this->input->post('seller_bank')),
              'seller_account'=>base64_encode($this->input->post('seller_account')),
              'shop_address'=>$this->input->post('shop_address'),
              'shop_postcode'=>$this->input->post('shop_postcode'),
              'shop_city'=>$this->input->post('shop_city'),
              'shop_state'=>$this->input->post('shop_state'),
              'shop_state_id'=>$this->input->post('shop_state_id'),
            );
            $this->db->where('seller_id',$this->input->post('seller_id'));
            $this->db->update('ci_seller',$seller_info);

            $user_p_info=array(
              'full_name'=>$this->input->post('full_name'),
              'phone'=>$this->input->post('phone'),
            );
            $this->db->where('user_id',$this->input->post('user_id'));
            $this->db->update('ci_users_profile',$user_p_info);
      
            $user_info=array(
              'email'=>$this->input->post('email'),
            );
            $this->db->where('id',$this->input->post('user_id'));
            $this->db->update('ci_users',$user_info);
          }
        }

        redirect('seller/upd_seller/'.$seller_id, 'refresh');
      }else{

        $seller_info=array(
          'shop_name'=>$this->input->post('shop_name'),
          'shop_url'=>$this->input->post('shop_url'),
          'seller_bank'=>strtoupper($this->input->post('seller_bank')),
          'seller_account'=>base64_encode($this->input->post('seller_account')),
          'shop_address'=>$this->input->post('shop_address'),
          'shop_postcode'=>$this->input->post('shop_postcode'),
          'shop_city'=>$this->input->post('shop_city'),
          'shop_state'=>$this->input->post('shop_state'),
          'shop_state_id'=>$this->input->post('shop_state_id'),
        );
        $this->db->where('seller_id',$this->input->post('seller_id'));
        $this->db->update('ci_seller',$seller_info);

        $user_p_info=array(
          'full_name'=>$this->input->post('full_name'),
          'phone'=>$this->input->post('phone'),
        );
        $this->db->where('user_id',$this->input->post('user_id'));
        $this->db->update('ci_users_profile',$user_p_info);

        $user_info=array(
          'email'=>$this->input->post('email'),
        );
        $this->db->where('id',$this->input->post('user_id'));
        $this->db->update('ci_users',$user_info);
        
        $seller_info=array(
          'seller_status'=>$this->input->post('seller_status'),
        );
        $this->db->where('seller_id',$this->input->post('seller_id'));
        $this->db->update('ci_seller',$seller_info);
        if($this->data['user_profile']['user_group']!=2){
          $data_log=array(
            'ip_address'=>$ip = $this->input->ip_address(),
            'user_id'=>$this->data['user_profile']['id'],
            'username'=>$this->data['user_profile']['username'],
            'time_record'=>date("Y-m-d H:i:s"),
            'description'=>'Update seller [Seller ID:'.$this->input->post('seller_id').']',
          );
          $this->db->insert('ci_audit_log',$data_log);
        }

        $m="Update Successful";
        echo "<script type='text/javascript'>alert('$m');window.location.href = '" . base_url() . "seller/upd_seller/".$seller_id."';</script>";
      }

    }else {
      $this->session->set_flashdata('upload', "<span class='text-danger'>SHOP URL NAME already exists</span>");
    
      redirect('seller/upd_seller/'.$seller_id, 'refresh');
    }
  }

 // print report
    public function print_dailyReport($type,$daily)
    {
          //audit
          // $data_log=array(
          // 'ip_address'=>$ip = $this->input->ip_address(),
          // 'user_id'=>$this->data['user_profile']['id'],
          // 'username'=>$this->data['user_profile']['username'],
          // 'time_record'=>date("Y-m-d H:i:s"),
          // 'description'=>'Print report daily transaction record [Date:'.$daily.']',
          // );
          // $this->db->insert('ci_audit_log',$data_log);

          $this->data['all_report'] = $this->admin_model->get_daily_report($daily);
          $this->data['detail_order'] = $this->admin_model->get_detail_order();
          $this->data['date']=date("d F Y",strtotime($daily));
          //$this->template->load('layouts/admin','prints/print_daily_report', $this->data);
          $html=$this->load->view('prints/print_daily_report', $this->data, TRUE);

        //   $this->load->library('m_pdf');
          $pdfFilePath = 'Daily Transaction Record '.$this->data['date'].'.pdf';

        //   define('_MPDF_TTFONTDATAPATH','uploads');
        //   $this->m_pdf->showImageErrors = true;
        //   $this->m_pdf->pdf->setFooter('Printed Date '.date('d/m/Y').' - Coffee-Fastlane.com');
        //   $this->m_pdf->pdf->AddPage('L');
        //   $this->m_pdf->pdf->WriteHTML($html);
        //   $this->m_pdf->pdf->Output($pdfFilePath, 'I');
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
        $mpdf->setFooter('Printed Date '.date('d/m/Y').' - Coffee-Fastlane.com');
        $mpdf->AddPage('L');
        $mpdf->WriteHTML($html);
        $mpdf->Output($pdfFilePath, 'I');
    }

    public function print_productDailyOrderReport($category_id,$daily)
    {
      //audit
      // $data_log=array(
      //   'ip_address'=>$ip = $this->input->ip_address(),
      //   'user_id'=>$this->data['user_profile']['id'],
      //   'username'=>$this->data['user_profile']['username'],
      //   'time_record'=>date("Y-m-d H:i:s"),
      //   'description'=>'Print report product type daily order [Category ID:'.$category_id.',Date:'.$daily.']',
      // );
      // $this->db->insert('ci_audit_log',$data_log);

      $this->data['detail_order'] = $this->admin_model->get_detail_order();
      $this->data['date']=date("d F Y",strtotime($daily));
      $this->data['all_report'] = $this->admin_model->get_productDailyOrder_report($daily);
      $this->data['category_id'] = $category_id;
      $this->data['data_pType'] = $this->product_model->get_productCategory($category_id);

      //$this->template->load('layouts/admin','prints/print_dailyOrderVendor_report', $this->data);
      $html=$this->load->view('prints/print_productDailyOrder_report', $this->data, TRUE);

    //   $this->load->library('m_pdf');
      $pdfFilePath = 'Daily Order Report '.$this->data['data_pType']['category_type'].' on '.$this->data['date'].'.pdf';

    //   define('_MPDF_TTFONTDATAPATH','uploads');
    //   $this->m_pdf->showImageErrors = true;
    //   $this->m_pdf->pdf->setFooter('Printed Date '.date('d/m/Y').' - Coffee-Fastlane.com');
    //   $this->m_pdf->pdf->AddPage('L');
    //   $this->m_pdf->pdf->WriteHTML($html);
    //   $this->m_pdf->pdf->Output($pdfFilePath, 'I');
    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
    $mpdf->setFooter('Printed Date '.date('d/m/Y').' - Coffee-Fastlane.com');
    $mpdf->AddPage('L');
    $mpdf->WriteHTML($html);
    $mpdf->Output($pdfFilePath, 'I');
    }

    public function print_monthlySalesReport($bulan,$tahun)
    {
      //audit
      // $data_log=array(
      //   'ip_address'=>$ip = $this->input->ip_address(),
      //   'user_id'=>$this->data['user_profile']['id'],
      //   'username'=>$this->data['user_profile']['username'],
      //   'time_record'=>date("Y-m-d H:i:s"),
      //   'description'=>'Print monthly sales report [Month:'.$bulan.',Year:'.$tahun.']',
      // );
      // $this->db->insert('ci_audit_log',$data_log);
      //$this->data['detail_order'] = $this->admin_model->get_detail_order();
      //$daily= date('Y-m-d', strtotime(str_replace('-', '/', $this->input->post('report_productDaily'))));
      $this->data['all_report'] = $this->admin_model->get_monthlySales_report($bulan,$tahun);
      if($bulan==1){
        $this->data['b']="January";
      }elseif($bulan==2){
        $this->data['b']="February";
      }elseif($bulan==3){
        $this->data['b']="March";
      }elseif($bulan==4){
        $this->data['b']="April";
      }elseif($bulan==5){
        $this->data['b']="May";
      }elseif($bulan==6){
        $this->data['b']="June";
      }elseif($bulan==7){
        $this->data['b']="July";
      }elseif($bulan==8){
        $this->data['b']="August";
      }elseif($bulan==9){
        $this->data['b']="September";
      }elseif($bulan==10){
        $this->data['b']="October";
      }elseif($bulan==11){
        $this->data['b']="November";
      }elseif($bulan==12){
        $this->data['b']="December";
      }
      $this->data['bln']=$bulan;
      $this->data['t']=$tahun;

      //$this->template->load('layouts/admin','prints/print_monthlySales_report', $this->data);
      $html=$this->load->view('prints/print_monthlySales_report', $this->data, TRUE);

    //   $this->load->library('m_pdf');
      $pdfFilePath = 'Monthly Sales Report '.$this->data['b'].' '.$this->data['t'].'.pdf';

    //   define('_MPDF_TTFONTDATAPATH','uploads');
    //   $this->m_pdf->showImageErrors = true;
    //   $this->m_pdf->pdf->setFooter('Printed Date '.date('d/m/Y').' - Coffee-Fastlane.com');
    //   $this->m_pdf->pdf->AddPage('L');
    //   $this->m_pdf->pdf->WriteHTML($html);
    //   $this->m_pdf->pdf->Output($pdfFilePath, 'I');
    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
    $mpdf->setFooter('Printed Date '.date('d/m/Y').' - Coffee-Fastlane.com');
    $mpdf->AddPage('L');
    $mpdf->WriteHTML($html);
    $mpdf->Output($pdfFilePath, 'I');
    }

    public function print_clientTransaction($cust_id)
    {
      //audit
      // $data_log=array(
      //   'ip_address'=>$ip = $this->input->ip_address(),
      //   'user_id'=>$this->data['user_profile']['id'],
      //   'username'=>$this->data['user_profile']['username'],
      //   'time_record'=>date("Y-m-d H:i:s"),
      //   'description'=>'Print report client transaction record [User ID:'.$cust_id.']',
      // );
      // $this->db->insert('ci_audit_log',$data_log);

      $this->data['all_report'] = $this->admin_model->get_clientsTransaction($cust_id);
      $this->data['data_client']=$this->admin_model->get_clientsList($cust_id);
      $this->data['detail_order'] = $this->admin_model->get_detail_order();
      //$this->template->load('layouts/admin','prints/print_clientTransaction_report', $this->data);
      $html=$this->load->view('prints/print_clientTransaction_report', $this->data, TRUE);

    //   $this->load->library('m_pdf');
      $pdfFilePath = 'Transactions Record - '.$this->data['data_client']['full_name'].'.pdf';

    //   define('_MPDF_TTFONTDATAPATH','uploads');
    //   $this->m_pdf->showImageErrors = true;
    //   $this->m_pdf->pdf->setFooter('Printed Date '.date('d/m/Y').' - Coffee-Fastlane.com');
    //   $this->m_pdf->pdf->AddPage('L');
    //   $this->m_pdf->pdf->WriteHTML($html);
    //   $this->m_pdf->pdf->Output($pdfFilePath, 'I');
    $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
    $mpdf->setFooter('Printed Date '.date('d/m/Y').' - Coffee-Fastlane.com');
    $mpdf->AddPage('L');
    $mpdf->WriteHTML($html);
    $mpdf->Output($pdfFilePath, 'I');
    }

    public function to_admin($data_email=array())
    {
      $subject = $data_email['subject'];
      $message_admin = "<html><body>";
      $message_admin .= $data_email['message'];
      $message_admin .= "<br><br>Terima kasih.";
      $message_admin .= "</body></html>";

      $this->load->library('email');
      $this->email->from($this->config->item('admin_email', 'ion_auth'), $this->config->item('site_title', 'ion_auth'));
      $this->email->to('ddfastlane@gmail.com');
      $this->email->subject($subject);
      $this->email->message($message_admin);
      $this->email->send();
    // if( $this->email->send()) {
    //     return true;
    //  }else {
    //    return false;
    //  }
    }

    public function get_city()
    {
      $postcode = $this->input->post('textbox');

      $this->data['city'] = $this->user_model->get_city($postcode);
      // $this->data['state'] = $state = $this->user_model->get_state($postcode);

      // $state_id = $this->data['state']['state_id'];

      // if ($city) {
        $this->load->view('seller/ajax_city', $this->data);
      // }
       
    }


    public function get_city_seller()
    {
      $postcode = $this->input->post('textbox');

      $this->data['city'] = $this->user_model->get_city($postcode);
      // $this->data['state'] = $state = $this->user_model->get_state($postcode);

      // $state_id = $this->data['state']['state_id'];

      // if ($city) {
        $this->load->view('seller/ajax_city_seller', $this->data);
      // }
       
    }

    public function get_postage_weight()
    {
      $weight = $this->input->post('weight');
      $seller_id = $this->input->post('seller_id');

      $this->data['postage_sm'] = $this->order_model->check_weightcost_sm($weight, $seller_id);
      $this->data['postage_ss'] = $this->order_model->check_weightcost_ss($weight, $seller_id);

      $this->load->view('seller/ajax_weight_postage', $this->data);
    }

}
