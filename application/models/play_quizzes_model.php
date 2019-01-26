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
}
