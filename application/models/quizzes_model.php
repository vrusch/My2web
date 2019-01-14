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

	public function set_quizz($quizz_name, $theme_id)
	{
		$this->db->insert('4m2w_course', array('name' => $quizz_name, 'theme_id' => $theme_id));
	}

	public function get_themes($theme_id = NULL)
	{
		if ($theme_id == NULL){
			$query = $this->db->get('4m2w_theme');
			return $query->result_array();
		} else {
			$query = $this->db->get_where('4m2w_theme', array('id' => $theme_id));
			return $query->row_array();
		}
	}

	public function set_theme($theme_name)
	{
		$this->db->insert('4m2w_theme', array('theme' => $theme_name));
		return $this->db->insert_id();
	}
}
