<?php

class questions extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('language', 'url', 'form', 'account/ssl', 'url_helper'));
		$this->load->library(array('account/authentication', 'account/authorization', 'form_validation'));
		$this->load->model(array('account/account_model', 'question_model'));

	}

	public function manage()
	{
		maintain_ssl();

		$data['questions'] = $this->question_model->get_question();
		$this->load->view('adm/manage_questions', isset($data) ? $data : NULL);
	}

	public function new_question()
	{
		maintain_ssl();

		$this->form_validation->set_rules('tema', 'Nazev', 'required');
		$this->form_validation->set_rules('question', 'Text', 'required');
		$this->form_validation->set_rules('true_answer', 'Nazev', 'required');
		$this->form_validation->set_rules('bad_answer1', 'Text', 'required');
		$this->form_validation->set_rules('bad_answer2', 'Text', 'required');
		$this->form_validation->set_message('required', 'Povinne pole');


		if ($this->form_validation->run() === FALSE) {
			$this->load->view('adm/add_question', isset($data) ? $data : NULL);
		} else {
			$this->question_model->set_question();
			$data['questions'] = $this->question_model->get_question();
			$this->load->view('adm/manage_questions', isset($data) ? $data : NULL);
		}
	}
}
