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

		$bb['prep_question'] = $this->get_rnd_questions($quizz_id);

		foreach ($bb['prep_question'] as $item){

			$data['questions'][$item['question_id']] = $this->get_rnd_answer($item['question_id']);

		}
		$this->load->helper('date');
		$datain = array(
			'account_id' => $account_id,
			'quizz_id' => $quizz_id,
			'status' => '1',
			'date' => mdate('%d-%m-%Y %H:%i:%s', now()),
			'sequence' => $serialized_array = serialize($data)
		);

		$this->db->insert('4m2w_rel_quizz_sequence',$datain);
		return $this->db->insert_id();
	}

	public function get_rnd_questions($id)
	{
		$this->db->select('question_id');
		$query = $this->db->get_where('4m2w_rel_quizz_que', array('quizz_id' => $id));
		$result = $query->result_array();
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
		$query = $this->db->get_where('4m2w_rel_quizz_que', array('quizz_id' => $quizz_id));
		return $query->num_rows();
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
		return $unserialized_array; //todo: zapisat do seqencie stav spusteny a id studenta a mozna datum
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
}
