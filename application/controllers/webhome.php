<?php

class webhome extends CI_Controller
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
		//$data['homepage'] = $this->homepage_model->get_homepage();
		$this->load->view('webhome/manage_home', isset($data) ? $data : NULL);
	}
}
