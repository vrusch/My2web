<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class summary_model extends CI_Model
{

	public function __construct()
	{
		$this->load->helper(array('email', 'date'));
		$this->load->library(array('email'));
		$this->load->database();
	}

	public function get_all_students()
	{
		$query = $this->db->get('4m2w_students');
		return $query->result_array();
	}

	public function get_student_info($student_id)
	{
		$sql = "SELECT a3m_account.id, a3m_account.username, a3m_account.email, a3m_account_details.firstname, a3m_account_details.lastname FROM a3m_account INNER JOIN a3m_account_details ON a3m_account_details.account_id = a3m_account.id WHERE a3m_account.id = ?";
		$query = $this->db->query($sql, $student_id);
		return $query->row_array();
	}

	public function get_account_info($student_id)
	{
		$query = $this->db->get_where('a3m_account', array('id' => $student_id));
		return $query->row_array();
	}
}
