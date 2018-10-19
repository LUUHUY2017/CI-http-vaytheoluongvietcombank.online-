<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'application/controllers/layout.php';
class main extends layout {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		if($this->categories_model->show_post($this->uri->segment(1)) != [])
		{
			$data['post_categories'] = $this->categories_model->show_post($this->uri->segment(1));
			$this->load->view('frontend/categories_detail',$data);
		}
		else
		{
			if($this->post_model->post_detail($this->uri->segment(1)) == [])
				$this->load->view('frontend/about');
			else
			{
				$data['post_categories'] = $this->post_model->post_detail($this->uri->segment(1));
				$this->load->view('frontend/post_detail',$data);
			}
		}
	}


	public function get_post()
	{

	}

	public function get_page()
	{

	}
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */