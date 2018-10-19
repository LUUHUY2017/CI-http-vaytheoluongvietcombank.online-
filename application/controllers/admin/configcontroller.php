<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class configcontroller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('config_model');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('CI_URI');
		if(!$this->session->userdata('username')) redirect('admin');
		$config['upload_path']          = './media/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 10000;
        $config['max_width']            = 6000;
        $config['max_height']           = 6000;
    	$this->load->library('upload', $config);
	}

	public function index()
	{
		$data['configlist'] = $this->config_model->show_all();
		$this->load->view('admin/header');
		$this->load->view('admin/config_info',$data);
		$this->load->view('admin/footer');
	}

	public function xoa($id)
	{
		$id_array = array(
			'ID' => $id
		);
		if($this->config_model->delete($id_array) == TRUE)
		{
			$this->session->set_flashdata('success_msg','Deleted');
			redirect('admin/config');
		}
		else
		{
			$this->session->set_flashdata('error_msg','Something went wrong');
			redirect('admin/config');
		}
	}

	public function sua($id)
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('txtName', 'Name', 'required');
			$this->form_validation->set_rules('txtTitle', 'Title', 'required');
			$this->form_validation->set_rules('txtDescription', 'Description', 'required|min_length[5]');
			$this->form_validation->set_rules('txtKey_word', 'Key word', 'required|min_length[5]');
			$this->form_validation->set_rules('txtPhone', 'Phone', 'required|min_length[10]|max_length[11]|numeric');
			if($this->form_validation->run()==TRUE)
			{
				$id_array = array(
					'ID' => $id
				);
				$data = array(
        			'Name' => $this->input->post('txtName'),
        			'Title' => $this->input->post('txtTitle'),
        			'Description' => $this->input->post('txtDescription'),
        			'Key_word' => $this->input->post('txtKey_word'),
        			'Phone' => $this->input->post('txtPhone'),
            	);
            	if($this->upload->do_upload('txtLogo'))
            	{
            		$data['Logo'] = $this->upload->data()['file_name'];
            		if($this->config_model->update($id_array,$data) == TRUE)
					{
						$this->session->set_flashdata('success_msg', 'Updated!');
						redirect('admin/config/');
					}
					else
					{
						$this->session->set_flashdata('error_msg', 'Something went wrong');
						redirect('admin/config/edit/'.$id);
					}
            	}
            	else
            	{
            		if($this->config_model->update($id_array,$data) == TRUE)
					{
						$this->session->set_flashdata('success_msg', 'Updated!');
						redirect('admin/config/');
					}
					else
					{
						$this->session->set_flashdata('error_msg', 'Something went wrong');
						redirect('admin/config/edit/'.$id);
					}
            	}
			}
			else
			{
				$this->load->view('admin/header');
				$id_array = array(
					'ID' => $id
				);
				$data['configlist'] = $this->config_model->valid($id_array);
				if($this->upload->do_upload('txtLogo'))
				{
					$data['error'] = $this->upload->display_errors();
					$this->load->view('admin/config_edit',$data);
				}
				else
				{
					$this->load->view('admin/config_edit',$data);
				}
				$this->load->view('admin/footer');
			}
		}
		else
		{
			$id_array = array(
					'ID' => $id
				);
			$data['configlist'] = $this->config_model->valid($id_array);
			$this->load->view('admin/header');
			$this->load->view('admin/config_edit',$data);
			$this->load->view('admin/footer');
		}
	}
	public function them()
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('txtName', 'Name', 'required');
			$this->form_validation->set_rules('txtTitle', 'Title', 'required');
			$this->form_validation->set_rules('txtDescription', 'Description', 'required|min_length[5]');
			$this->form_validation->set_rules('txtKey_word', 'Key word', 'required|min_length[5]');
			$this->form_validation->set_rules('txtPhone', 'Phone', 'required|min_length[10]|max_length[11]|numeric');
			if($this->form_validation->run()==TRUE)
			{
				$data = array(
        			'ID' => '',
        			'Name' => $this->input->post('txtName'),
        			'Title' => $this->input->post('txtTitle'),
        			'Description' => $this->input->post('txtDescription'),
        			'Key_word' => $this->input->post('txtKey_word'),
        			'Phone' => $this->input->post('txtPhone'),
            	);
            	if($this->upload->do_upload('txtLogo'))
            	{
            		$data['Logo'] = $this->upload->data()['file_name'];
            		if($this->config_model->insert($data) == TRUE)
					{
						$this->session->set_flashdata('success_msg', 'Inserted Product!');
						redirect('admin/config/');
					}
					else
					{
						$this->session->set_flashdata('error_msg', 'Product exist!');
						redirect('admin/config/add');
					}
            	}
            	else
            	{
            		if($this->config_model->insert($data) == TRUE)
					{
						$this->session->set_flashdata('success_msg', 'Inserted Product!');
						redirect('admin/config/');
					}
					else
					{
						$this->session->set_flashdata('error_msg', 'Product exist!');
						redirect('admin/config/add');
					}
            	}
			}
			else
			{
				$this->load->view('admin/header');
				if($this->upload->do_upload('txtLogo'))
				{
					$data = array('error' => $this->upload->display_errors());
					$this->load->view('admin/config_add',$data);
				}
				else
				{
					$this->load->view('admin/config_add');
				}
				$this->load->view('admin/footer');
			}
		}
		else
		{
			$this->load->view('admin/header');
			$this->load->view('admin/config_add');
			$this->load->view('admin/footer');
		}
	}

}

/* End of file sanpham.php */
/* Location: ./application/controllers/sanpham.php */