<?php

class classroom extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('language', 'url', 'form', 'account/ssl', 'url_helper'));
		$this->load->library(array('account/authentication', 'account/authorization', 'form_validation'));
		$this->load->model(array('account/account_model', 'classroom_model'));

	}

	public function manage()
	{
		maintain_ssl();

		$data['classroom'] = $this->classroom_model->get_assigment();
		$this->load->view('adm/manage_assignment', isset($data) ? $data : NULL);
	}
}
