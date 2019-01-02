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

		$datata = array(
			'answer' => $this->input->post('true_answer'),
		);
		$this->db->insert('4m2w_answers', $datata);
		$ta = $this->db->insert_id();

		$datafa1 = array(
			'answer' => $this->input->post('bad_answer1'),
		);
		$this->db->insert('4m2w_answers', $datafa1);
		$fa1 = $this->db->insert_id();

		$datafa2 = array(
			'answer' => $this->input->post('bad_answer2'),
		);
		$this->db->insert('4m2w_answers', $datafa2);
		$fa2 = $this->db->insert_id();

		$datafa3 = array(
			'answer' => $this->input->post('bad_answer3')
		);
		$this->db->insert('4m2w_answers', $datafa3);
		$fa3 = $this->db->insert_id();

		$data = array(
			'tema' => $this->input->post('tema'),
			'question' => $this->input->post('question'),
			'true_id_answer' => $ta,
			'false1_id_answer' => $fa1,
			'false2_id_answer' => $fa2,
			'false3_id_answer' => $fa3
		);
		$this->db->insert('4m2w_questions', $data);
	}
}
