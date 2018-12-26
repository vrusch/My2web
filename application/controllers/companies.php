<?php

class companies extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('language', 'url', 'form', 'account/ssl', 'url_helper'));
		$this->load->library(array('account/authentication', 'account/authorization', 'form_validation'));
		$this->load->model(array('account/account_model', 'companies_model'));

	}

	public function manage()
	{
		maintain_ssl();

		$data['companies'] = $this->companies_model->get_companies();
		$this->load->view('adm/manage_companies', isset($data) ? $data : NULL);
	}

	public function add_companies()
	{
		maintain_ssl();

		$this->form_validation->set_rules('name', 'name', 'required');


		if ($this->form_validation->run() === FALSE) {
			$this->load->view('adm/add_company', isset($data) ? $data : NULL);
		} else {
			$this->companies_model->set_companies();
			$data['companies'] = $this->companies_model->get_companies();
			$this->load->view('adm/manage_companies', isset($data) ? $data : NULL);
		}
	}
}
