<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class categoriescontroller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('categories_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('CI_URI');
		if(!$this->session->userdata('username')) redirect('admin');
	}

	public function index()
	{
		$data['categorieslist'] = $this->categories_model->show_all();
		$this->load->view('admin/header');
		$this->load->view('admin/categories_info',$data);
		$this->load->view('admin/footer');
	}

	public function xoa($id)
	{
		$id_array = array(
			'ID' => $id
		);
		if($this->categories_model->delete($id_array) == TRUE)
		{
			$this->session->set_flashdata('success_msg','Deleted');
			redirect('admin/categories');
		}
		else
		{
			$this->session->set_flashdata('error_msg','Something went wrong');
			redirect('admin/categories');
		}
	}

	public function them()
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('txtname','Name','required');
			if($this->form_validation->run()== TRUE)
			{
				$data = array(
					'ID' => '',
					'Name' => $this->input->post('txtname'),
					'Slug' => $this->input->post('txtslug'),
					'Parent_id' => $this->input->post('cbbParent_id')
				);
				if($this->categories_model->insert($data) == TRUE)
				{
					$this->session->set_flashdata('success_msg','Insert Success!');
					redirect('admin/categories');
				}
				else
				{
					$this->session->set_flashdata('error_msg','Fail');
					redirect('admin/categories');
				}
			}
			else
			{
				$this->load->view('admin/header');
				$this->load->view('admin/categories_add');
				$this->load->view('admin/footer');
			}
		}
		else
		{
			$this->load->view('admin/header');
			$this->load->view('admin/categories_add');
			$this->load->view('admin/footer');
		}
	}

	public function sua($id)
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('txtname','Name','required');
			if($this->form_validation->run()== TRUE)
			{
				$id_array = array(
					'ID' => $id
				);
				$data = array(
					'Name' => $this->input->post('txtname'),
					'Slug' => $this->input->post('txtslug'),
					'Parent_id' => $this->input->post('cbbParent_id')
				);
				if($this->categories_model->update($id_array,$data)== TRUE)
				{
					$this->session->set_flashdata('success_msg','Thành công');
					redirect('admin/categories');
				}
				else
				{
					$this->session->set_flashdata('error_msg','Sửa không thành công');
					redirect('admin/categories/edit/'.$id);
				}
			}
			else
			{
				$id_array = array(
					'ID' => $id
				);
				$data['categories'] = $this->categories_model->valid($id_array);
				$this->load->view('admin/header');
				$this->load->view('admin/categories_edit',$data);
				$this->load->view('admin/footer');
			}
		}
		else
		{
			$id_array = array(
					'ID' => $id
				);
			$data['categories'] = $this->categories_model->valid($id_array);
			$this->load->view('admin/header');
			$this->load->view('admin/categories_edit',$data);
			$this->load->view('admin/footer');
		}
	}
}

/* End of file loaisp.php */
/* Location: ./application/controllers/loaisp.php */