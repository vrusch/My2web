<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class lecture_model extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}

	public function get_lecture($id = FALSE)
	{
		if ($id === FALSE) {
			$query = $this->db->get('4m2w_lectures');
			return $query->result_array();
		}

		$query = $this->db->get_where('4m2w_lectures', array('id' => $id));
		return $query->row_array();
	}

	public function add_lecture()
	{
		$this->load->helper('url');

		$data = array(
			'name' => $this->input->post('name'),
			'theme' => $this->input->post('tema'),
			'lecture' => $this->input->post('lecture')
		);

		return $this->db->insert('4m2w_lectures', $data);
	}

	public function delete_lecture($id = FALSE)
	{
		if ($id === FALSE) {
			$query = $this->db->get('4m2w_news');
			return $query->result_array();
		}

		$this->db->delete('4m2w_lectures', array('slug' => $id));
	}

	public function update_lecture()
	{
		$this->load->helper('url');

		$data = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('name'),
			'tema' => $this->input->post('tema'),
			'lecture' => $this->input->post('lecture'),
		);

		$this->db->set($data);
		$this->db->where('id', $data['id']);
		$this->db->update('4m2w_lectures');
	}

	public function get_quizzes()
	{
		$query = $this->db->get('4m2w_quizzes');
		return $query->result_array();
	}

	public function set_rel_q_l($lecture_id, $quizz_id)
	{
		$data = array(
			'quizz_id' => $quizz_id,
			'lecture_id' => $lecture_id
		);
		//kontrola ze uz neexistuje
		$query = $this->db->get_where('4m2w_rel_quizz_lec', $data);
		$num = count ($query->result_array());
		if ($num > 0) {
			print_r('uz existuje');//todo: zpracovani DB chyby
		} else {
			$this->db->insert('4m2w_rel_quizz_lec', $data);
		}
	}
}
