<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class play_quizzes_model extends CI_Model
{

	public function __construct()
	{
		$this->load->helper(array('email', 'date'));
		$this->load->library(array('email'));
		$this->load->database();
	}

	public function get_no_quizzes_by_user($account_id)
	{
		if ($account_id != '1') {
			$query = $this->db->get_where('4m2w_students', array('student_id' => $account_id));
			$student = $query->row_array();

			$query = $this->db->get_where('4m2w_company_quizzes', array('company_id' => $student['company_id'], 'group_id' => $student['group_id']));
			$group_quizzes = $query->result_array();
			$query = $this->db->get_where('4m2w_indiv_quizzes', array('company_id' => $student['company_id'], 'student_id' => $account_id));
			$indiv_quizzes = $query->result_array();
			$data = count($group_quizzes) + count($indiv_quizzes);
			return $data;
		} else {
			return 0;
		}
	}

	public function get_student_info($student_id)
	{
		$sql = "SELECT a3m_account.id, a3m_account.username, a3m_account.email, a3m_account_details.firstname, a3m_account_details.lastname FROM a3m_account INNER JOIN a3m_account_details ON a3m_account_details.account_id = a3m_account.id WHERE a3m_account.id = ?";
		$query = $this->db->query($sql, $student_id);
		return $query->row_array();
	}

	public function get_quizzes($student_id)
	{
		$data = $this->get_company($student_id);
		$company_id = $data['company_id'];
		$group_id = $data['group_id'];
		$sql = "SELECT * FROM 4m2w_company_quizzes JOIN 4m2w_quizzes ON 4m2w_company_quizzes.quiz_id = 4m2w_quizzes.id where 4m2w_company_quizzes.company_id = ? AND 4m2w_company_quizzes.group_id = ?";
		$query = $this->db->query($sql, array($company_id, $group_id));
		return $query->result_array();
	}

	public function get_indiv_quizzes($student_id)
	{
		$sql = "SELECT * FROM 4m2w_indiv_quizzes JOIN 4m2w_quizzes ON 4m2w_indiv_quizzes.quizz_id = 4m2w_quizzes.id where 4m2w_indiv_quizzes.student_id = ?";
		$query = $this->db->query($sql, $student_id);
		return $query->result_array();
	}

	public function get_company($student_id)
	{
		$query = $this->db->get_where('4m2w_students', array('student_id' => $student_id));
		return $query->row_array();
	}

	public function get_quizz_info($quizz_id)
	{
		$query = $this->db->get_where('4m2w_quizzes', array('id' => $quizz_id));
		return $query->row_array();
	}

	public function generate_quizz($quizz_id, $account_id)
	{
		$data['quizz_info'] = $this->play_quizzes_model->get_quizz_info($quizz_id);

		$this->db->select('lecture_id');
		$query = $this->db->get_where('4m2w_rel_quizz_lec', array('quizz_id' => $quizz_id));
		$data['quizz_lecture'] = $query->result_array();
		$data['no_of_que'] = $this->get_no_question($quizz_id);

		$bb['prep_question'] = $this->get_rnd_questions($quizz_id);

		foreach ($bb['prep_question'] as $item){

			$data['questions'][$item['question_id']] = $this->get_rnd_answer($item['question_id']);

		}
		$this->load->helper('date');
		$datain = array(
			'account_id' => $account_id,
			'quizz_id' => $quizz_id,
			'status' => '1',
			'date' => mdate('%Y-%m-%d %H:%i:%s', now()),
			'sequence' => $serialized_array = serialize($data)
		);

		$this->db->insert('4m2w_rel_quizz_sequence',$datain);
		return $this->db->insert_id();
	}

	public function get_rnd_questions($quizz_id)
	{
		$this->db->select('question_id');
		$query = $this->db->get_where('4m2w_rel_quizz_que', array('quizz_id' => $quizz_id));
		$result = $query->result_array(); //todo: tu vybrat iba pocet otazok z 4m2w_quizzes question_num
		$query = $this->db->get_where('4m2w_quizzes', array('id' => $quizz_id));
		$res = $query->row_array();

		if (count($result) > $res['question_num']){
			$num = (count($result)) - $res['question_num'];

			$rand_keys = array_rand($result, $num);

			if ($num > 1) {
				foreach ($rand_keys as $item){
					unset($result[$item]);
				}
			}else {
				unset($result[$rand_keys]);
			}
		}
		$opt = array();
		foreach ($result as $query_item => $key){
			$opt[] = $key;
		}
		shuffle($opt);
		shuffle($opt);

		return $opt;
	}

	public function get_rnd_answer($id)
	{
		$this->db->select('true_id_answer, false1_id_answer, false2_id_answer, false3_id_answer');
		$this->db->where('id', $id);
		$query = $this->db->get('4m2w_questions');
		$result = $query->row_array();
		$opt = array();
		foreach ($result as $query_item => $key){
			$opt[] = $key;
		}
		shuffle($opt);
		shuffle($opt);

		return $opt;
	}

	public function get_no_question($quizz_id)
	{
		$this->db->select('question_num');
		$query = $this->db->get_where('4m2w_quizzes', array('id' => $quizz_id));
		return $query->row_array();
	}

	public function get_no_lectures($quizz_id)
	{
		$query = $this->db->get_where('4m2w_rel_quizz_lec', array('quizz_id' => $quizz_id));
		return $query->num_rows();
	}

	public function load_quizz($sequence)
	{
		$this->db->select('sequence'); //precitanie sequence z 4m2w_rel_quizz_sequence
		$query = $this->db->get_where('4m2w_rel_quizz_sequence', array('id' => $sequence));
		$vysledek = $query->row_array();
		$unserialized_array = unserialize($vysledek['sequence']);
		return $unserialized_array;
	}

	public function load_lecture($lecture_id)
	{
		$query = $this->db->get_where('4m2w_lectures', array('id' => $lecture_id));
		return $query->row_array();
	}

	public function load_question($question_id)
	{
		$this->db->select('question');
		$query = $this->db->get_where('4m2w_questions', array('id' => $question_id));
		return $query->row_array();
	}

	public function load_answer($answer_id)
	{
		$this->db->select('answer');
		$query = $this->db->get_where('4m2w_answers', array('id' => $answer_id));
		return $query->row_array();
	}

	public function get_seq_status($quizz_id, $account_id)
	{
		$query = $this->db->get_where('4m2w_rel_quizz_sequence', array('account_id' => $account_id, 'quizz_id' => $quizz_id));
		return $query->row_array();
	}

	public function get_seq_status_col($quizz_id, $account_id)
	{
		$query = $this->db->get_where('4m2w_rel_quizz_sequence', array('account_id' => $account_id, 'quizz_id' => $quizz_id));
		return $query->num_rows();
	}

	public function get_company_info($account_id)
	{
		$query = $this->db->get_where('4m2w_students', array('student_id' => $account_id));
		$cec = $query->row_array();
		$query = $this->db->get_where('4m2w_companies', array('id' => $cec['company_id']));
		return $query->row_array();
	}

	public function get_group_info($account_id)
	{
		$query = $this->db->get_where('4m2w_students', array('student_id' => $account_id));
		$cec = $query->row_array();
		$query = $this->db->get_where('4m2w_company_group', array('id' => $cec['group_id'], 'company_id' => $cec['company_id']));
		return $query->row_array();
	}

	public function get_true_answ($question_id)
	{
		$this->db->select('true_id_answer');
		$query = $this->db->get_where('4m2w_questions', array('id' => $question_id));
		return $query->row_array();
	}

	public function get_question($question_id)
	{
		$query = $this->db->get_where('4m2w_questions', array('id' => $question_id));
		return $query->row_array();
	}

	public function get_answer($answer_id)
	{
		$query = $this->db->get_where('4m2w_answers', array('id' => $answer_id));
		return $query->row_array();
	}

	public function date_validate($date)
	{
		$given_date = date("d-m-Y", strtotime($date));
		$now   = date("d-m-Y") ;
		if ($given_date > $now) {
			return $given_date;
		} else{
			return 'Expirovano';
		}
	}

	public function get_itt($seq)
	{
		$this->db->select('iteration');
		$query = $this->db->get_where('4m2w_rel_quizz_sequence', array('id' => $seq));
		return $query->row_array();
	}
}
