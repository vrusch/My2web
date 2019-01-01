<?php

/**
 * Created by PhpStorm.
 * User: vlado
 * Date: 07.12.2018
 * Time: 22:33
 */
class course_model extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}

	public function get_course($id = FALSE)
	{
		if ($id === FALSE) {
			$query = $this->db->get('4m2w_course');
			return $query->result_array();
		}
		$query = $this->db->get_where('4m2w_course', array('id' => $id));
		return $query->row_array();
	}

	public function set_course()
	{
		$this->load->helper('url');

		$data = array(
			'name' => $this->input->post('course'),
			'tema' => $this->input->post('tema'),
		);
		return $this->db->insert('4m2w_course', $data);
	}

	public function delete_course($slug = FALSE) //todo: dopnit logiku zmazat vsetko vo vsetkych tab
	{
		if ($slug === FALSE) {
			$query = $this->db->order_by('date_publish', 'DESC')->get('4m2w_news');
			return $query->result_array();
		}
		$this->db->delete('4m2w_news', array('slug' => $slug));
	}

	public function update_course() //todo: dopnit logiku
	{
		$this->load->helper('url');

		$data = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('course'),
			'tema' => $this->input->post('tema'),
		);

		$this->db->set($data);
		$this->db->where('id', $data['id']);
		$this->db->update('4m2w_news');
	}
}
