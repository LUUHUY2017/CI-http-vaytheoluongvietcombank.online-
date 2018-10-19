<?php

class post_model extends master {

	public $table = 'post';

	public function get_post_with_order($colum,$order,$limit,$offset = NULL)
	{
		return $this->db->order_by($colum,$order)->get($this->table, $limit, $offset)->result_array();
	}
	public function post_detail($slug)
	{
		$this->db->select(array('categories.Slug','categories.Name','Title','Description','Content','Create_at','Thumbnail'));
		$this->db->from('post');
		$this->db->join('categories', 'categories.ID = Cat_id');
		$this->db->where('post.Slug',$slug);
		return $this->db->get()->result_array();
	}
}
