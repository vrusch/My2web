<?php

/**
 * Created by PhpStorm.
 * User: vlado
 * Date: 07.12.2018
 * Time: 22:33
 */
class classroom_model extends CI_Model
{

	public function __construct()
	{
		$this->load->database();
	}

	public function get_assigment($slug = FALSE)
	{
		if ($slug === FALSE) {
			$query = $this->db->get('4m2w_news');
			return $query->result_array();
		}

		$query = $this->db->get_where('4m2w_news', array('slug' => $slug));
		return $query->row_array();
	}

	/*public function set_news()
	{
		$this->load->helper('url');

		$slug = url_title($this->input->post('title'), 'dash', TRUE);

		$data = array(
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'text' => $this->input->post('text'),
			'date_publish' => $this->input->post('date_publish')
		);

		return $this->db->insert('4m2w_news', $data);
	}

	public function delete_news($slug = FALSE)
	{
		if ($slug === FALSE) {
			$query = $this->db->order_by('date_publish', 'DESC')->get('4m2w_news');
			return $query->result_array();
		}

		$this->db->delete('4m2w_news', array('slug' => $slug));
	}

	public function update_news()
	{
		$this->load->helper('url');

		$slug = url_title($this->input->post('title'), 'dash', TRUE);

		$data = array(
			'id' => $this->input->post('id'),
			'title' => $this->input->post('title'),
			'slug' => $slug,
			'text' => $this->input->post('text'),
			'active' => $this->input->post('active'),
			'highlight' => $this->input->post('highlight'),
			'date_publish' => $this->input->post('date_publish')
		);

		$this->db->set($data);
		$this->db->where('id', $data['id']);
		$this->db->update('4m2w_news');
	}*/
}
