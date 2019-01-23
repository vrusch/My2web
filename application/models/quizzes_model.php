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
			$query = $this->db->get('4m2w_quizzes');
			return $query->result_array();
		}
		$query = $this->db->get_where('4m2w_quizzes', array('id' => $quizz_id));
		return $query->row_array();
	}

	public function set_quizz($quizz_name)
	{
		$this->db->insert('4m2w_quizzes', array('name' => $quizz_name));
	}

	public function upd_quizz_name($quizz_name, $quizz_id)
	{
		$data = array(
			'name' => $quizz_name
		);
		$this->db->where('id', $quizz_id);
		$this->db->update('4m2w_quizzes', $data);
	}

	public function get_lectures_by_quizz($quizz_id){
		$sql = 'SELECT 4m2w_rel_quizz_lec.lecture_id, 4m2w_lectures.name FROM 4m2w_rel_quizz_lec JOIN 4m2w_lectures ON 4m2w_rel_quizz_lec.lecture_id = 4m2w_lectures.id WHERE 4m2w_rel_quizz_lec.quizz_id = ?';
		$query = $this->db->query($sql, $quizz_id);
		return $query->result_array();
	}

	public function get_question_by_quizz($quizz_id){
		$sql = 'SELECT 4m2w_rel_quizz_que.question_id, 4m2w_questions.question FROM 4m2w_rel_quizz_que JOIN 4m2w_questions ON 4m2w_rel_quizz_que.question_id = 4m2w_questions.id WHERE 4m2w_rel_quizz_que.quizz_id = ?';
		$query = $this->db->query($sql, $quizz_id);
		return $query->result_array();
	}
}
