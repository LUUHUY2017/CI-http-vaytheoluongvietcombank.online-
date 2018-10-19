<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'application/controllers/layout.php';
class dashboard extends layout {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$filter = array(
			'Status' => '1'
		);
		$data['slider'] = $this->slider_model->show_all($filter);
		$this->load->view('frontend/index', $data);
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */