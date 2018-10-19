<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class master extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}
	
	public function show_all($filter = NULL,$limit = NULL, $offset = NULL)
	{
		//co chon loc, khong gioi han: show_all($filter,NULL,NULL) or showall($filter)
		if($filter != NULL)
		{
			return $this->db->where($filter)->get($this->table)->result_array();
		}


		// khong chon loc, co gioi han: show_all(NULL,$limit,$offset)
		if($limit != NULL && $offset != NULL)
		{		
			return $this->db->get($this->table, $limit, $offset)->result_array();
		}


		// khong chon loc, khong gioi han: show_all(NULL,NULL,NULL) or showall()
		if($filter == NULL && $limit == NULL && $offset == NULL)
		{
			return $this->db->get($this->table)->result_array();
		}


		// co chon loc, co gioi han: show_all($filter,$limit,$offset)
		if($filter != NULL && $limit != NULL && $offset != NULL)
		{
			return $this->db->where($filter)->get($this->table, $limit, $offset)->result_array();
		}
	}

	public function get_nums($id = NULL)
	{
		if($id == NULL)
		{
			return $this->db->count_all($this->table);
		}
		else
		{
			// $id = array
			// (
			// 	'ID' => '1' hoặc
			//  'Ten$this->table' => 'username'
			// );
			return $this->db->where($id)->from($this->table)->count_all_results();
		}
	}
	public function valid($id)
	{
		if($data = $this->db->where($id)->get($this->table))
			return $data->result_array();
		else return FALSE;
	}

	public function insert($data)
	{
		return $this->db->insert($this->table, $data); // TRUE OR FALSE
	}

	public function update($id , $data)
	{
		// $id is a array, example: $id = array('ID','$ma$this->table');
		// $data is data for update where id = $id;
		return $this->db->where($id)->update($this->table, $data); // TRUE OR FALSE
	}

	public function delete($id)
	{
		return $this->db->where($id)->delete($this->table);
	}
}