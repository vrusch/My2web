<?php

class experiment_cont extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('language', 'url', 'form', 'account/ssl', 'url_helper'));
		$this->load->library(array('account/authentication', 'account/authorization', 'form_validation'));
		$this->load->model(array('account/account_model', 'experiment_model'));
	}

	public function index()
	{
			$data['companies'] = $this->experiment_model->get_companies();
			$data['display'] = array('page' => 'edit');
			$this->load->view('companies/experiment', isset($data) ? $data : NULL);
	}

	public function edit($company_id)
	{
		$data['company'] = $this->experiment_model->get_companies($company_id);
		$data['groups'] = $this->experiment_model->get_groups($company_id);
		$data['students'] = $this->experiment_model->get_students($company_id);
		$data['mkb'] = $this->experiment_model->get_mkb($company_id);
		$data['quizzes'] = $this->experiment_model->get_quizzes();
		$data['display'] = array('page' => 'edit', 'current' => 'home');
		$this->load->view('companies/exp_edit', isset($data) ? $data : NULL);
	}
}
