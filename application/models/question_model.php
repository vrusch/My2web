<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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

	public function get_answer($id = FALSE)
	{
		$query = $this->db->get_where('4m2w_answers', array('id' => $id));
		return $query->row_array();
	}

	public function set_question()
	{
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
			'question' => $this->input->post('question'),
			'true_id_answer' => $ta,
			'false1_id_answer' => $fa1,
			'false2_id_answer' => $fa2,
			'false3_id_answer' => $fa3
		);
		$this->db->insert('4m2w_questions', $data);
	}

	public function delete_q_a($smazat = NULL)
	{
		$this->db->trans_start();
		$this->db->delete('4m2w_answers', array('id' => $smazat['question']['true_id_answer']));
		$this->db->delete('4m2w_answers', array('id' => $smazat['question']['false1_id_answer']));
		$this->db->delete('4m2w_answers', array('id' => $smazat['question']['false2_id_answer']));
		$this->db->delete('4m2w_answers', array('id' => $smazat['question']['false3_id_answer']));
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE) //todo: zmazat i tab kvizu
		{
			echo 'chyba pri mazani zaznamu v 4m2w_answers';
		}else{
			$this->db->delete('4m2w_questions', array('id' => $smazat['question']['id']));
		}
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

	public function get_quizzes()
	{
			$query = $this->db->get('4m2w_quizzes');
			return $query->result_array();
	}

	public function set_rel_q_q($question_id, $quizz_id)
	{
		$data = array(
			'quizz_id' => $quizz_id,
			'question_id' => $question_id
		);

		$this->db->insert('4m2w_rel_quizz_que', $data);
	}
}
