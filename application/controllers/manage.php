<?php

class manage extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('language', 'url', 'form', 'account/ssl', 'url_helper'));
		$this->load->library(array('account/authentication', 'account/authorization', 'form_validation'));
		$this->load->model(array('account/account_model', 'companies_model'));

	}

	public function manage_home()
	{
		maintain_ssl();
		//$data['homepage'] = $this->homepage_model->get_homepage();
		$this->load->view('adm/manage_home', isset($data) ? $data : NULL);
	}

	public function manage_colorschema()
	{
		maintain_ssl();
		//$data['homepage'] = $this->homepage_model->get_homepage();
		$this->load->view('adm/manage_cschema', isset($data) ? $data : NULL);
	}

	public function assignment()
	{
		maintain_ssl();

		$data['companies'] = $this->companies_model->get_companies();
		$this->load->view('adm/manage_assignment', isset($data) ? $data : NULL);
	}
}
