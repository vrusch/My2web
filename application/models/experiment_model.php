<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class experiment_model extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}

	public function get_companies($company_id = FALSE)
	{
		if ($company_id === FALSE)
		{
			$query = $this->db->get('4m2w_companies');
			return $query->result_array();
		}
		$query = $this->db->get_where('4m2w_companies', array('id' => $company_id));
		return $query->row_array();
	}

	public function get_groups($company_id = FALSE)
	{
		if ($company_id === FALSE)
		{
			$query = $this->db->get('4m2w_company_group');
			return $query->result_array();
		}
		$query = $this->db->get_where('4m2w_company_group', array('company_id' => $company_id));
		return $query->result_array();
	}

	public function get_students($company_id = FALSE)
	{
		if ($company_id === FALSE)
		{
			$query = $this->db->get('4m2w_students');
			return $query->result_array();
		}
		$query = $this->db->get_where('4m2w_students', array('company_id' => $company_id));
		return $query->result_array();
	}

	public function get_students_info($student_id)
	{
		$sql = "SELECT a3m_account.id, a3m_account.username, a3m_account.email, a3m_account_details.firstname, a3m_account_details.lastname FROM a3m_account INNER JOIN a3m_account_details ON a3m_account_details.account_id = a3m_account.id WHERE a3m_account.id = ?";
		$query = $this->db->query($sql, $student_id);
		return $query->row_array();
	}

	public function get_mkb($company_id)
	{
		$sql = "SELECT 4m2w_mkb.user_id, 4m2w_mkb.activation, 4m2w_mkb.activation_date, 4m2w_mkb.status, 4m2w_mkb.company_id, a3m_account.username, a3m_account.email FROM `4m2w_mkb` JOIN a3m_account ON 4m2w_mkb.user_id = a3m_account.id WHERE 4m2w_mkb.company_id = ?;";
		$query = $this->db->query($sql, $company_id);
		return $query->row_array();
	}

	public function get_quizzes()
	{
		$query = $this->db->get_where('4m2w_course');
		return $query->result_array();
	}
}

