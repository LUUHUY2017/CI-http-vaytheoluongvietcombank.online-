<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class slidercontroller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('slider_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('CI_URI');
		$config['upload_path'] = './media/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']     = '100000';
		$config['max_width'] = '6000';
		$config['max_height'] = '6000';
		$this->load->library('upload', $config);
		if(!$this->session->userdata('username')) redirect('admin');
	}

	public function index()
	{
		$data['sliderlist'] = $this->slider_model->show_all();
		$this->load->view('admin/header');
		$this->load->view('admin/slider_info',$data);
		$this->load->view('admin/footer');
	}

	public function xoa($id)
	{
		$id_array = array(
			'ID' => $id
		);
		if($this->slider_model->delete($id_array) == TRUE)
		{
			$this->session->set_flashdata('success_msg','Deleted');
			redirect('admin/slider');
		}
		else
		{
			$this->session->set_flashdata('error_msg','Something went wrong');
			redirect('admin/slider');
		}
	}

	public function them()
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('cbbStatus','Status','required|numeric');
			$this->form_validation->set_rules('txtUrl','Url','required');
			if($this->form_validation->run()== TRUE)
			{
				$data = array(
					'ID' => '',
					'Url' => $this->input->post('txtUrl'),
					'Status' => $this->input->post('cbbStatus')
				);
				if($this->upload->do_upload('txtImage'))
				{
					$config['image_library'] = 'gd2';
					$config['source_image'] = './media/'.$this->upload->data()['file_name'];
					$config['create_thumb'] = FALSE;
					$config['maintain_ratio'] = FALSE;
					$config['width'] = 960;
					$config['height'] = 500;
					$config['new_image'] = './media/'.$this->upload->data()['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					$data['Image'] = $this->upload->data()['file_name'];
					if($this->slider_model->insert($data) == TRUE)
					{
						$this->session->set_flashdata('success_msg','Insert Success!');
						redirect('admin/slider');
					}
					else
					{
						$this->session->set_flashdata('error_msg','Fail');
						redirect('admin/slider');
					}
				}
				else
				{
					$this->load->view('admin/header');
					$data = array(
						'error' => $this->upload->display_errors()
					);	
					$this->load->view('admin/slider_add',$data);
					$this->load->view('admin/footer');
				}
			}
			else
			{
				$this->load->view('admin/header');
				if($this->upload->do_upload('txtImage'))
				{
					$this->load->view('admin/slider_add');
				}
				else
				{
					$data = array(
						'error' => $this->upload->display_errors()
					);	
					$this->load->view('admin/slider_add',$data);
				}
				$this->load->view('admin/footer');
			}
		}
		else
		{
			$this->load->view('admin/header');
			$this->load->view('admin/slider_add');
			$this->load->view('admin/footer');
		}
	}

	public function sua($id)
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('cbbStatus','Status','required|numeric');
			$this->form_validation->set_rules('txtUrl','Url','required');
			if($this->form_validation->run()== TRUE)
			{
				$id_array = array(
					'ID' => $id
				);
				$data = array(
					'Url' => $this->input->post('txtUrl'),
					'Status' => $this->input->post('cbbStatus')
				);
				if($this->upload->do_upload('txtImage'))
				{
					$config['image_library'] = 'gd2';
					$config['source_image'] = './media/'.$this->upload->data()['file_name'];
					$config['create_thumb'] = FALSE;
					$config['maintain_ratio'] = FALSE;
					$config['width'] = 960;
					$config['height'] = 500;
					$config['new_image'] = './media/'.$this->upload->data()['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					$data['Image'] = $this->upload->data()['file_name'];
					if($this->slider_model->update($id_array,$data) == TRUE)
					{
						$this->session->set_flashdata('success_msg','Update Success!');
						redirect('admin/slider');
					}
					else
					{
						$this->session->set_flashdata('error_msg','Fail');
						redirect('admin/slider/edit'.$id);
					}
				}
				else
				{
					if($this->slider_model->update($id_array,$data) == TRUE)
					{
						$this->session->set_flashdata('success_msg','Update Success!');
						redirect('admin/slider');
					}
					else
					{
						$this->session->set_flashdata('error_msg','Fail');
						redirect('admin/slider/edit/'.$id);
					}
				}
			}
			else // if validate FALSE
			{
				$id_array = array(
					'ID' => $id
				);
				$data['sliderlist'] = $this->slider_model->valid($id_array);
				$this->load->view('admin/header');
				$this->load->view('admin/slider_edit',$data);
				$this->load->view('admin/footer');
			}
		}
		else// if not have submit form
		{
			$id_array = array(
				'ID' => $id
			);
			$data['sliderlist'] = $this->slider_model->valid($id_array);
			$this->load->view('admin/header');
			$this->load->view('admin/slider_edit',$data);
			$this->load->view('admin/footer');
		}
	}
}

/* End of file loaisp.php */
/* Location: ./application/controllers/loaisp.php */