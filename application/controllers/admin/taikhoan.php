<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class taikhoan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('CI_URI');
		$config['upload_path'] = './media/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']     = '1000';
		$config['max_width'] = '1024';
		$config['max_height'] = '768';
		$this->load->library('upload', $config);
		if(!$this->session->userdata('username')) redirect('admin');
	}

	public function index()
	{
		$data['user_info'] = $this->user->show_all();
		$this->load->view('admin/header');
		$this->load->view('admin/user_info',$data);
		$this->load->view('admin/footer');
	}

	public function sua($id)
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('txtusername', 'Username', 'required|alpha_numeric|min_length[5]|max_length[15]');
			$this->form_validation->set_rules('txtpassword', 'Password', 'required|alpha_numeric|min_length[5]|max_length[15]');
			$this->form_validation->set_rules('txtrole', 'Role', 'required|numeric');
			if($this->form_validation->run()==TRUE)
			{
				$id_user = array(
					'ID' => $id
				);
				$data = array(
					'Username' => $this->input->post('txtusername'),
					'Password' => $this->input->post('txtpassword'),
					'Role' => $this->input->post('txtrole')
				);
				if($this->upload->do_upload('txtavatar'))
				{
					$data['Avatar'] = $this->upload->data()['file_name'];
				}
				if($this->user->update($id_user,$data) == TRUE)
				{
					$this->session->set_flashdata('success_msg', 'Update Success!');
					redirect('admin/user');
				}
				else
				{
					$this->session->set_flashdata('error_msg', 'Update fail!');
					redirect('admin/user/'.$id);
				}
			} // if validate is false
			else
			{
				$this->load->view('admin/header');
				$id_user = array(
					'ID' => $id
				);
				$data['user_info'] = $this->user->valid($id_user);
				$this->load->view('admin/user_edit',$data);
				$this->load->view('admin/footer');
			}
		}
		else
		{
			$id_user = array(
				'ID' => $id
			);
			$data['user_info'] = $this->user->valid($id_user);
			$this->load->view('admin/header');
			$this->load->view('admin/user_edit',$data);
			$this->load->view('admin/footer');
		}
	}

	public function xoa($id)
	{
		$id_user = array(
			'ID' => $id
		);
		if($this->user->delete($id_user) == TRUE)
		{
			$this->session->set_flashdata('success_msg', 'Deleted user!');
			redirect('admin/user');
		}
		else
		{
			$this->session->set_flashdata('error_msg', 'Fail! Can not Delete user');
			redirect('admin/user');
		}
	}
	public function them()
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('txtusername', 'Username', 'required|alpha_numeric|min_length[5]|max_length[15]|is_unique[User.Username]');
			$this->form_validation->set_rules('txtpassword', 'Password', 'required|alpha_numeric|min_length[5]|max_length[15]');
			$this->form_validation->set_rules('txtrole', 'Role', 'required|numeric');
			if($this->form_validation->run()==TRUE)
			{
				$data = array(
					'ID' => '',
					'Username' => $this->input->post('txtusername'),
					'Password' => $this->input->post('txtpassword'),
					'Role' => $this->input->post('txtrole')
				);	
				if($this->upload->do_upload('txtavatar'))
				{
					$data['Avatar'] = $this->upload->data()['file_name'];
					if($this->user->insert($data) == TRUE)
					{
						$this->session->set_flashdata('success_msg', 'Inserted user!');
						redirect('admin/user');
					}
					else //truong hop xay ra it
					{
						$this->session->set_flashdata('error_msg', 'Something went wrong');
						redirect('admin/user');
					}
				}
				else
				{
					$this->load->view('admin/header');
					$data = array(
						'error' => $this->upload->display_errors()
					);	
					$this->load->view('admin/user_add',$data);
					$this->load->view('admin/footer');
				}
			} // if validate false
			else
			{
				$this->load->view('admin/header');
				if(!$this->upload->do_upload('txtavatar'))
				{
					$data = array('error' => $this->upload->display_errors());	
					$this->load->view('admin/user_add',$data);
				}
				else
				{
					$this->load->view('admin/user_add');
				}
				$this->load->view('admin/footer');
			}
		}
		else
		{
			$this->load->view('admin/header');
			$this->load->view('admin/user_add');
			$this->load->view('admin/footer');
		}
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */