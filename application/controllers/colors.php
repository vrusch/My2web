<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class colors extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('language', 'url', 'form', 'account/ssl', 'url_helper'));
		$this->load->library(array('account/authentication', 'account/authorization', 'form_validation'));
		$this->load->model(array('account/account_model', 'companies_model'));

	}

	public function index()
	{
		maintain_ssl();
		//$data['colorschema'] = $this->homepage_model->get_homepage();
		$this->load->view('colors/manage_cschema', isset($data) ? $data : NULL);
	}
}
