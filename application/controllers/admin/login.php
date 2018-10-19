<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->model('user');
		$this->load->library('form_validation');
		$this->load->library('CI_URI');
	}

	public function index()
	{
		if($this->session->userdata('username')) redirect('admin/dashboard','refresh'); // Nếu đã đăng nhập thì chuyển sang trang quản trị.
		// Kiểm tra tồn tại submit form
		if($this->input->post('btnlogin'))
		{
			// Kiểm tra tính hợp lệ của dữ liệu nhập vào
			$this->form_validation->set_rules('txtusername', 'Username', 'required|alpha_numeric|min_length[5]|max_length[15]');
			$this->form_validation->set_rules('txtpassword', 'Password', 'required|alpha_numeric|min_length[5]|max_length[15]');
			// Set điều kiện.
			if ($this->form_validation->run() == TRUE)
			{
				// Tạo giá trị cho điều kiện SQL.
				$condition = array(
					'Username' => $this->input->post('txtusername'),
					'Password' => $this->input->post('txtpassword')
				);
				// Gọi hàm kiểm tra trong CSDL.
				$user_sql = $this->user->valid($condition);
				if($user_sql)
				{
					$user_session = array
					(
						'username'  => $user_sql[0]['Username'],
		        		'permission'     => $user_sql[0]['Role'],
					);
					// Nếu tồn tại thì tạo session
					$this->session->set_userdata($user_session);
					redirect('admin/dashboard');
				}
				else
				{
					// Nếu không tồn tại thì gửi thông báo
					$this->session->set_flashdata('error_msg','User is not exist or wrong username or wrong password');
					redirect('admin');
				}
			}
			// Nếu dữ liệu nhập vào không hợp lệ thì hiện thông báo
			else 
			{
				$this->load->view('dangnhap');
			}
		}
		// Nếu chưa có submit form thì load giao diện đăng nhập.
		else
		{
			$this->load->view('dangnhap');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('permission');
		redirect('admin','refresh');
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */