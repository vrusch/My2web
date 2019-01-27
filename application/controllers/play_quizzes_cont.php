<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class play_quizzes_cont extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('language', 'url', 'form', 'account/ssl', 'url_helper', 'date'));
		$this->load->library(array('account/authentication', 'account/authorization', 'form_validation'));
		$this->load->model(array('account/account_model', 'play_quizzes_model'));
	}

	public function manage($account_id, $quizz_id = NULL)
	{
		if ($quizz_id === NULL) {
			$data['student_info'] = $this->play_quizzes_model->get_student_info($account_id);
			$data['quizzes'] = $this->play_quizzes_model->get_quizzes($account_id);
			$data['individual_quizzes'] = $this->play_quizzes_model->get_indiv_quizzes($account_id);
			$this->load->view('play_quizzes/manage_quizzes', isset($data) ? $data : NULL);
		} else {
			$data['student_info'] = $this->play_quizzes_model->get_student_info($account_id);
			$data['quizzes'] = $this->play_quizzes_model->get_quizzes($account_id);
			$data['lec_no'] = $this->play_quizzes_model->get_no_lectures($quizz_id);
			$data['que_no'] = $this->play_quizzes_model->get_no_question($quizz_id);
			$data['individual_quizzes'] = $this->play_quizzes_model->get_indiv_quizzes($account_id);
			$data['current_quizz'] = $this->play_quizzes_model->get_quizz_info($quizz_id);
			$this->load->view('play_quizzes/play_quizz', isset($data) ? $data : NULL);
		}
	}

	public function play($quizz_id, $account_id)
	{
		$data['student_info'] = $this->play_quizzes_model->get_student_info($account_id);
		$data['quizz_info'] = $this->play_quizzes_model->get_quizz_info($quizz_id);
		//vygenerovany kviz vratim id sequence
		//$data['sequence'] = $this->play_quizzes_model->generate_quizz($quizz_id);
		//var_dump($data);
		$this->load->view('play_quizzes/run', isset($data) ? $data : NULL);
	}
}
