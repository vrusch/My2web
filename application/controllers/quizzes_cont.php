<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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

	public function edit($quizz_id, $current = NULL, $subpagecontent = NULL)
	{
		$data['quizz'] = $this->quizzes_model->get_quizzes($quizz_id);
		$data['questions'] = $this->quizzes_model->get_question_by_quizz($quizz_id);
		if ($current == NULL) { //kdyz neni def. $current tak jdi na sub Home jinak na $current
			$data['display'] = array('page' => 'edit', 'current' => 'home');
		} else {
			$data['display'] = array('page' => 'edit', 'current' => $current, 'sub' => $subpagecontent);
		}
		$this->load->view('quizzes/edit_quizz', isset($data) ? $data : NULL);
	}

	public function rename_quizz($quizz_id)
	{
		$this->quizzes_model->upd_quizz_name($quizz_id);
		$this->edit($quizz_id);
	}

	public function new()
	{
		$this->form_validation->set_rules('quizz', 'Text', 'required');
		$this->form_validation->set_rules('difficulty', 'Text', 'required');
		$this->form_validation->set_rules('estimated_time', 'Text', 'required');


		if ($this->form_validation->run() === FALSE) {
			$this->load->view('quizzes/add_quizz', isset($data) ? $data : NULL);
		} else {
			$this->quizzes_model->set_quizz($this->input->post('quizz'));
			$data['quizzes'] = $this->quizzes_model->get_quizzes();
			$data['display'] = array('page' => 'edit');
			$this->load->view('quizzes/manage_quizzes', isset($data) ? $data : NULL);;
		}
	}

	public function config($quizz_id){
		$this->quizzes_model->set_quizz_config($quizz_id);
		$this->edit($quizz_id);
	}

	public function delete($quizz_id){
		$this->db->where('id', $quizz_id);
		$this->db->delete('4m2w_quizzes');
		$this->index();
	}

	public function update_note($quizz_id){
		$this->quizzes_model-> upd_quizz_note($quizz_id);
		$this->edit($quizz_id, 'menu2');
	}

	public function component($quizz_id, $action, $component_id){
		if ($action == 'add_l'){}
		if ($action == 'add_q'){$this->quizzes_model->add_question($quizz_id, $component_id);}
		if ($action == 'del_l'){}
		if ($action == 'del_q'){}
		$this->edit($quizz_id, 'menu1');
	}
}
