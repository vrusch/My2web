<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class quizzes_model extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}

	public function get_quizzes($quizz_id = NULL)
	{
		if ($quizz_id === NULL){
			$query = $this->db->get('4m2w_course');
			return $query->result_array();
		}
		$query = $this->db->get_where('4m2w_course', array('id' => $quizz_id));
		return $query->row_array();
	}
}
