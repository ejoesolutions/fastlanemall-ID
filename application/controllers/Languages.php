<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Auth
 * @property Ion_auth|Ion_auth_model $ion_auth        The ION Auth spark
 * @property CI_Form_validation      $form_validation The form validation library
 */
class Languages extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

  public function change($language = '')
  {
    $language = ($language != NULL) ? $language : 'english';
    $this->session->set_userdata('site_lang', $language);
    redirect($this->agent->referrer());
  }
}
