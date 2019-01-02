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
		$data['questions'] = $this->question_model->get_question();
		$this->load->view('adm/manage_questions', isset($data) ? $data : NULL);
	}

	public function new_question()
	{
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

	public function view($id = NULL)
	{
		$data['question'] = $this->question_model->get_question($id);

		$d1 = $this->question_model->get_answer($data['question']['true_id_answer']);
		$d2 = $this->question_model->get_answer($data['question']['false1_id_answer']);
		$d3 = $this->question_model->get_answer($data['question']['false2_id_answer']);
		$d4 = $this->question_model->get_answer($data['question']['false3_id_answer']);
		var_dump($d1);
		var_dump($d2);
		var_dump($d3);
		var_dump($d4);
		$this->load->view('adm/view_questions', isset($data) ? $data : NULL);
	}
}
