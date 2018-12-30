<?php

class assigment extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('language', 'url', 'form', 'account/ssl', 'url_helper'));
		$this->load->library(array('account/authentication', 'account/authorization', 'form_validation'));
		$this->load->model(array('account/account_model', 'companies_model'));

	}

	public function index($id = NULL)
	{
		maintain_ssl();

		//$data['company'] = $this->companies_model->get_companies($id);
		//$this->load->view('adm/add_students', isset($data) ? $data : NULL);
	}
}
