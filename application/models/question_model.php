<?php

/**
 * Created by PhpStorm.
 * User: vlado
 * Date: 07.12.2018
 * Time: 22:33
 */
class question_model extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}

	public function get_question($id = FALSE)
	{
		if ($id === FALSE) {
			$query = $this->db->get('4m2w_questions');
			return $query->result_array();
		}
		$query = $this->db->get_where('4m2w_questions', array('id' => $id));
		return $query->row_array();
	}

	public function set_question()
	{
		$this->load->helper('url');

		$data = array(
			'true_answer' => $this->input->post('date_publish'),
			'bad_answer1' => $this->input->post('date_publish'),
			'bad_answer2' => $this->input->post('date_publish'),
			'bad_answer3' => $this->input->post('date_publish')
		);
		$ta = $this->db->insert_id()->insert('4m2w_news', $data);
		//$this->db->insert('4m2w_news', $data);

		$data1 = array(
			'tema' => $this->input->post('date_publish'),
			'question' => $this->input->post('date_publish'),
			'true_answer' => $this->input->post('date_publish'),
			'bad_answer1' => $this->input->post('date_publish'),
			'bad_answer2' => $this->input->post('date_publish'),
			'bad_answer3' => $this->input->post('date_publish')
		);
		//$this->db->insert('4m2w_news', $data1);
		//return $this->db->insert('4m2w_news', $data1);
		var_dump($_POST);
	}
}
