<?php

class company extends CI_Controller
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
		$data['companies'] = $this->companies_model->get_companies();
		$this->load->view('mkb/manage_companies', isset($data) ? $data : NULL);
	}

}
