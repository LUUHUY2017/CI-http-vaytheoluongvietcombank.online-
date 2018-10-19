<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class dashboard extends CI_Controller {
	
		public function __construct()
		{
			parent::__construct();
			$this->load->helper('url');
			$this->load->library('CI_URI');
			if(!$this->session->userdata('username')) redirect('admin');
		}
	
		public function index()
		{
			$this->load->model('user');
			$data['user_nums'] = $this->user->get_nums();
			$this->load->view('admin/header');
			$this->load->view('admin/index',$data);
			$this->load->view('admin/footer');
		}
	
	}
	
	/* End of file dashboard.php */
	/* Location: ./application/controllers/dashboard.php */
?>