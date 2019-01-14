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

	public function index()
	{
		$data['questions'] = $this->question_model->get_question();
		$this->load->view('questions/manage_questions', isset($data) ? $data : NULL);
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
			$this->load->view('questions/add_question', isset($data) ? $data : NULL);
		} else {
			$this->question_model->set_question();
			$data['questions'] = $this->question_model->get_question();
			$this->load->view('questions/manage_questions', isset($data) ? $data : NULL);
		}
	}

	public function view($id = NULL)
	{
		$data['question'] = $this->question_model->get_question($id);

		$d1 = $this->question_model->get_answer($data['question']['true_id_answer']);
		$d2 = $this->question_model->get_answer($data['question']['false1_id_answer']);
		$d3 = $this->question_model->get_answer($data['question']['false2_id_answer']);
		$d4 = $this->question_model->get_answer($data['question']['false3_id_answer']);
		$data['question']['true'] = $d1['answer'];
		$data['question']['false1'] = $d2['answer'];
		$data['question']['false2'] = $d3['answer'];
		$data['question']['false3'] = $d4['answer'];
		$this->load->view('questions/view_questions', isset($data) ? $data : NULL);
	}

	public function update($id = NULL)
	{
		$this->form_validation->set_rules('tema', 'Nazev', 'required');
		$this->form_validation->set_rules('question', 'Text', 'required');
		$this->form_validation->set_rules('true_answer', 'Nazev', 'required');
		$this->form_validation->set_rules('bad_answer1', 'Text', 'required');
		$this->form_validation->set_rules('bad_answer2', 'Text', 'required');
		$this->form_validation->set_message('required', 'Povinne pole');

		if ($this->form_validation->run() === FALSE) {
			$data['question'] = $this->question_model->get_question($id);
			$data['question']['true'] = $this->question_model->get_answer($data['question']['true_id_answer']);
			$data['question']['false1']= $this->question_model->get_answer($data['question']['false1_id_answer']);
			$data['question']['false2'] = $this->question_model->get_answer($data['question']['false2_id_answer']);
			$data['question']['false3'] = $this->question_model->get_answer($data['question']['false3_id_answer']);
			$this->load->view('questions/edit_question', isset($data) ? $data : NULL);
		} else {
			//$this->question_model->update_question(); //todo: doplnit do modelu update
			$data['questions'] = $this->question_model->get_question();
			$this->load->view('questions/manage_questions', isset($data) ? $data : NULL);
		}
	}

	public function delete($id = NULL)
	{
		$data['question'] = $this->question_model->get_question($id);
		$this->question_model->delete_q_a($data);

		$data['questions'] = $this->question_model->get_question();
		$this->load->view('questions/manage_questions', isset($data) ? $data : NULL);
	}

	public function addto($id = NULL)
	{
		$data['question'] = $this->question_model->get_question($id);
		$this->load->view('questions/addto_question', isset($data) ? $data : NULL);
	}


	public function rnd($id)
	{
		$data['rnd_answer'] = $this->question_model->get_rnd_answer($id);
		$data['question'] = $this->question_model->get_question($id);
		$this->load->view('questions/rnd_view', isset($data) ? $data : NULL);
	}
}
