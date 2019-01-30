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

			$data['company'] = $this->play_quizzes_model->get_company_info($account_id);
			$data['group'] = $this->play_quizzes_model->get_group_info($account_id);

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

	public function run($quizz_id, $account_id, $stage = NULL)
	{
		$data['student_info'] = $this->play_quizzes_model->get_student_info($account_id);
		$data['quizz_info'] = $this->play_quizzes_model->get_quizz_info($quizz_id);

		$query = $this->db->get_where('4m2w_rel_quizz_sequence', array('quizz_id' => $quizz_id, 'account_id' => $account_id));
		$check =  $query->row_array();
		//kdyz neexistuje tak vygeneruj
		if ((count($check)) == 0){
			//vygenerovany kviz vratim id sequence
			$data['sequence'] = $this->play_quizzes_model->generate_quizz($quizz_id, $account_id);
			//nastavit ze vidi jenom lekci nebo otazky
			if ($stage == NULL) {
				$data['display'] = array('stage' => '1');
			} else {
				$data['display'] = array('stage' => '2');
			}
			$this->load->view('play_quizzes/run', isset($data) ? $data : NULL);
		} else {
			//nastavit ze vidi jenom lekci nebo otazky
			$data['display'] = array('stage' => '2');
			$data['sequence'] = $check['id'];
			$this->load->view('play_quizzes/run', isset($data) ? $data : NULL);
		}
	}

	public function quizz_done($seq, $quizz_id, $account_id)
	{
		$sequence = $this->play_quizzes_model->load_quizz($seq);

		foreach ($sequence['questions'] as $item => $key){
			$this->form_validation->set_rules('question['.$item.']', 'Question '.$item, 'required');
		}

		if ($this->form_validation->run() === FALSE) {
			$data['student_info'] = $this->play_quizzes_model->get_student_info($account_id);
			$data['quizz_info'] = $this->play_quizzes_model->get_quizz_info($quizz_id);
			$data['display'] = array('stage' => '2');
			$data['sequence'] = $seq;
			$data['validation'] = 'Musite odpovedet na vsechny otazky!';
			$this->load->view('play_quizzes/run', isset($data) ? $data : NULL);
		}else {
			$user_answ = $_POST;
			var_dump($user_answ['question']);
			foreach ($user_answ['question'] as $ques => $answ){
				echo $ques;
				echo $answ;
			}
			$data['student_info'] = $this->play_quizzes_model->get_student_info($account_id);
			$data['quizz_info'] = $this->play_quizzes_model->get_quizz_info($quizz_id);
			$query = $this->db->get_where('4m2w_rel_quizz_sequence', array('quizz_id' => $quizz_id, 'account_id' => $account_id));
			$data['sqe'] = $query->row_array();

			$this->load->view('play_quizzes/quizz_done', isset($data) ? $data : NULL);
		}
	}
}
