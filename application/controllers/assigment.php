<?php

class assigment extends CI_Controller
{
	public function assignment()
	{
		maintain_ssl();

		$data['companies'] = $this->companies_model->get_companies();
		$this->load->view('adm/manage_assignment', isset($data) ? $data : NULL);
	}
}
