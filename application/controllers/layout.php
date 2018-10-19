<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class layout extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('slider_model');
		$this->load->model('categories_model');
		$this->load->model('config_model');
		$this->load->model('post_model');
		$this->load->helper(array('form', 'url','text'));
		$this->load->library('CI_URI');
		$this->load->library('pagination');
		$data['config'] = $this->config_model->show_all();
		$data['categories'] = $this->categories_model->show_all();
		$data['post_newest'] = $this->post_model->get_post_with_order('Create_at','DESC',5);
		$this->load->view('frontend/header.php',$data);
	}
}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */