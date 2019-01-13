<?php

class quizzes_cont extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('language', 'url', 'form', 'account/ssl', 'url_helper'));
		$this->load->library(array('account/authentication', 'account/authorization', 'form_validation'));
		$this->load->model(array('account/account_model', 'quizzes_model'));

	}

	public function index()
	{
		$data['quizzes'] = $this->quizzes_model->get_quizzes();
		$data['display'] = array('page' => 'edit');
		$this->load->view('quizzes/manage_quizzes', isset($data) ? $data : NULL);
	}

	public function edit($quizz_id)
	{
		$data['quizz'] = $this->quizzes_model->get_quizzes($quizz_id);
		$data['display'] = array('page' => 'edit', 'current' => 'home');
		$this->load->view('quizzes/edit_quizz', isset($data) ? $data : NULL);
	}
}
