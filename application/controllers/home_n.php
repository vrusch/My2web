<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home_n extends CI_Controller {

	function __construct()
	{
		parent::__construct();

		// Load the necessary stuff...
		$this->load->helper(array('language', 'url', 'form', 'account/ssl'));
		$this->load->model(array('account/account_model', 'play_quizzes_model'));
		$this->load->config('account/account');
		$this->load->library(array('account/authentication', 'account/authorization', 'account/recaptcha', 'form_validation'));
		$this->load->language(array('account/sign_in', 'account/connect_third_party'));
	}

	function index()
	{
		maintain_ssl();

		if ($this->authentication->is_signed_in())
		{
			$data['account'] = $this->account_model->get_by_id($this->session->userdata('account_id'));
			//var_dump($data);
		}

		$this->load->view('home_n', isset($data) ? $data : NULL);
	}
}


/* End of file home.php */
/* Location: ./system/application/controllers/home.php */
