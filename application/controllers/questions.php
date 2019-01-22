<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
		$this->form_validation->set_rules('question', 'Otazka', 'required');
		$this->form_validation->set_rules('true_answer', 'Spravna odpoved', 'required');
		$this->form_validation->set_rules('bad_answer1', 'Text', 'required');
		$this->form_validation->set_rules('bad_answer2', 'Text', 'required');

		if ($this->form_validation->run() === FALSE) {
			$this->load->view('questions/add_question', isset($data) ? $data : NULL);
		} else {
			$this->question_model->set_question();
			$data['questions'] = $this->question_model->get_question();
			$this->load->view('questions/manage_questions', isset($data) ? $data : NULL);
		}
	}

	public function update($id)
	{
		$this->form_validation->set_rules('question', 'Text', 'required');
		$this->form_validation->set_rules('true_answer', 'Nazev', 'required');
		$this->form_validation->set_rules('bad_answer1', 'Text', 'required');
		$this->form_validation->set_rules('bad_answer2', 'Text', 'required');

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

	public function addto($question_id)
	{
		$this->form_validation->set_rules('quizz_id', 'Kviz', 'greater_than[0]');
		$this->form_validation->set_message('greater_than[0]', 'musite vybrat kviz');

		if ($this->form_validation->run() === FALSE) {
			$data['questions'] = $this->question_model->get_question();
			$this->load->view('questions/manage_questions', isset($data) ? $data : NULL);
		} else {
			$quizz_id = $this->input->post('quizz_id');
			$this->question_model->set_rel_q_q($question_id, $quizz_id);
			$data['questions'] = $this->question_model->get_question();
			$this->load->view('questions/manage_questions', isset($data) ? $data : NULL);
		}
	}

	public function rnd($id)
	{
		$data['rnd_answer'] = $this->question_model->get_rnd_answer($id);
		$data['question'] = $this->question_model->get_question($id);
		$this->load->view('questions/rnd_view', isset($data) ? $data : NULL);
	}

	public function validate($question_id = NULL){
		//var_dump($_POST);
		$this->form_validation->set_rules('user_answ[]', 'Kviz', 'required');

		if ($this->form_validation->run() === FALSE) {
			$data['rnd_answer'] = $this->question_model->get_rnd_answer($question_id);
			$data['question'] = $this->question_model->get_question($question_id);
			$data['warn'] = 'Musite vybrat odpoved!';
			$data['warncl'] = 'red';
			$this->load->view('questions/rnd_view', isset($data) ? $data : NULL);
		} else {
			$seqq = $_POST;
			$question_id = key($seqq['user_answ']);
			$answer_id = $seqq['user_answ'][$question_id];

			$this->db->select('true_id_answer');
			$query = $this->db->get_where('4m2w_questions', array('id' => $question_id));
			$ans =$query->row_array();
			$true_answ = $ans['true_id_answer'];

			if ($answer_id == $true_answ) {
				$data['warn'] = 'Spravna odpoved!';
				$data['warncl'] = 'green';
			} else{
				$data['warn'] = 'Spatna odpoved!';
				$data['warncl'] = 'red';
			}

			$data['rnd_answer'] = $this->question_model->get_rnd_answer($question_id);
			$data['question'] = $this->question_model->get_question($question_id);
			$this->load->view('questions/rnd_view', isset($data) ? $data : NULL);
		}

	}
}
