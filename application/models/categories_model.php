<?php

class categories_model extends master {

	public $table = 'categories';


	public function show_post($slug)
	{
		$this->db->select(array('Title','post.Slug','Description','Create_at','Thumbnail'));
		$this->db->from('post');
		$this->db->join('categories', 'categories.ID = Cat_id');
		$this->db->where('categories.Slug',$slug);
		return $this->db->get()->result_array();
		// SELECT p.Title,p.Slug,p.Description,p.Create_at FROM categories as c, post as p WHERE c.ID = p.Cat_id AND c.Slug = 'vay-tin-chap'
	}
}