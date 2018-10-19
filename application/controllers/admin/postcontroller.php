<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class postcontroller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('post_model');
		$this->load->model('categories_model');
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
		$data['postlist'] = $this->post_model->show_all();
		$this->load->view('admin/header');
		$this->load->view('admin/post_info',$data);
		$this->load->view('admin/footer');
	}

	public function xoa($id)
	{
		$id_array = array(
			'ID' => $id
		);
		if($this->post_model->delete($id_array) == TRUE)
		{
			$this->session->set_flashdata('success_msg','Deleted');
			redirect('admin/post');
		}
		else
		{
			$this->session->set_flashdata('error_msg','Something went wrong');
			redirect('admin/post');
		}
	}

	public function sua($id)
	{
		if($this->input->post())
		{
			$id_array = array(
				'ID' => $id
			);
			$this->form_validation->set_rules('txtContent', 'Content', 'required');
			$this->form_validation->set_rules('txtSlug', 'Content', 'required');
			$this->form_validation->set_rules('txtTitle', 'Title', 'required');
			$this->form_validation->set_rules('txtDescription', 'Description', 'required|min_length[5]');
			if($this->form_validation->run()==TRUE)
			{
				$data = array(
        			'Title' => $this->input->post('txtTitle'),
        			'Description' => $this->input->post('txtDescription'),
        			'Content' => $this->input->post('txtContent'),
        			'Slug' => $this->input->post('txtSlug'),
        			'Create_at' => date("Y-m-d"),
        			'Cat_id' => $this->input->post('cbbCat_id'),
            	);
            	if($this->upload->do_upload('txtThumbnail'))
            	{
            		$data['Thumbnail'] = $this->upload->data()['file_name'];
            		if($this->post_model->update($id_array,$data) == TRUE)
					{
						$this->session->set_flashdata('success_msg', 'Updated');
						redirect('admin/post/');
					}
					else
					{
						$this->session->set_flashdata('error_msg', 'Something went wrong');
						redirect('admin/post/edit/'.$id);
					}
            	}
            	else
            	{
            		if($this->post_model->update($id_array,$data) == TRUE)
					{
						$this->session->set_flashdata('success_msg', 'Updated');
						redirect('admin/post/');
					}
					else
					{
						$this->session->set_flashdata('error_msg', 'Something went wrong');
						redirect('admin/post/edit/'.$id);
					}
            	}
			}
			else
			{
				$id_array = array(
					'ID' => $id
				);
				$data['postlist'] = $this->post_model->valid($id_array);
				$data['categorieslist'] = $this->categories_model->show_all();
				$this->load->view('admin/header');
				$this->load->view('admin/post_edit',$data);
				$this->load->view('admin/footer');
			}
		}
		else
		{
			$id_array = array(
					'ID' => $id
				);
			$data['postlist'] = $this->post_model->valid($id_array);
			$data['categorieslist'] = $this->categories_model->show_all();
			$this->load->view('admin/header');
			$this->load->view('admin/post_edit',$data);
			$this->load->view('admin/footer');
		}
	}
	public function them()
	{
		if($this->input->post())
		{
			$this->form_validation->set_rules('txtContent', 'Content', 'required');
			$this->form_validation->set_rules('txtSlug', 'Content', 'required');
			$this->form_validation->set_rules('txtTitle', 'Title', 'required');
			$this->form_validation->set_rules('txtDescription', 'Description', 'required|min_length[5]');
			if($this->form_validation->run()==TRUE)
			{
				$data = array(
        			'ID' => '',
        			'Title' => $this->input->post('txtTitle'),
        			'Description' => $this->input->post('txtDescription'),
        			'Content' => $this->input->post('txtContent'),
        			'Slug' => $this->input->post('txtSlug'),
        			'Create_at' => date("Y-m-d"),
        			'Cat_id' => $this->input->post('cbbCat_id'),
            	);
            	if($this->upload->do_upload('txtThumbnail'))
            	{
            		$data['Thumbnail'] = $this->upload->data()['file_name'];
            		if($this->post_model->insert($data) == TRUE)
					{
						$this->session->set_flashdata('success_msg', 'Inserted Product!');
						redirect('admin/post/');
					}
					else
					{
						$this->session->set_flashdata('error_msg', 'Something went wrong');
						redirect('admin/post/add');
					}
            	}
            	else
            	{
            		$data['categorieslist'] = $this->categories_model->show_all();
            		$this->load->view('admin/header');
            		$data['error'] = $this->upload->display_errors();
					$this->load->view('admin/post_add',$data);
            		$this->load->view('admin/footer');
            	}
			}
			else
			{
				$this->load->view('admin/header');
				if($this->upload->do_upload('txtThumbnail'))
				{
					$data['categorieslist'] = $this->categories_model->show_all();
					$data['error'] = $this->upload->display_errors();
					$this->load->view('admin/post_add',$data);
				}
				else
				{
					$data['categorieslist'] = $this->categories_model->show_all();
					$this->load->view('admin/post_add');
				}
				$this->load->view('admin/footer');
			}
		}
		else
		{
			$data['categorieslist'] = $this->categories_model->show_all();
			$this->load->view('admin/header');
			$this->load->view('admin/post_add',$data);
			$this->load->view('admin/footer');
		}
	}

}

/* End of file sanpham.php */
/* Location: ./application/controllers/sanpham.php */