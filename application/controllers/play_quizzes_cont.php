<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class play_quizzes_cont extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('language', 'url', 'form', 'account/ssl', 'url_helper'));
		$this->load->library(array('account/authentication', 'account/authorization', 'form_validation'));
		$this->load->model(array('account/account_model', 'play_quizzes_model'));
	}

	public function manage($account_id)
	{
		$data['student_info'] = $this->play_quizzes_model->get_student_info($account_id);
		$data['quizzes'] = $this->play_quizzes_model->get_quizzes($account_id);
		$data['individual_quizzes'] = $this->play_quizzes_model->get_indiv_quizzes($account_id);
		//var_dump($data);
		$this->load->view('play_quizzes/manage_quizzes', isset($data) ? $data : NULL);
	}
}
