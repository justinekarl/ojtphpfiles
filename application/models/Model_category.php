<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');


class Model_category extends CI_Model{
	public function add_new_category($category_name){
		$data = array(
				'category_name' => $category_name
		);
		$query = $this->db->insert('category',$data);
		if($query){
			return true;
		}else{
			return false;
		}
	}

	function getAllCategory(){
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('deleted',0);
		$this->db->order_by("category_name", "asc");
		$query = $this->db->get();
		$result = $query->result();
		return $result;
	}
	
	public function deleteCategory($category_id){
		$data = array(
               'deleted' => 1
            );
		$this->db->where('category_id', $category_id);
		$this->db->update('category', $data);
		
		$this->db->where('category_id', $category_id);
		$this->db->update('item', $data);
		
		$this->db->where('category_id', $category_id);
		$this->db->update('tools', $data);
		
	}
	
	public function editCategory(){
		$data = array(
				'category_name' => $this->input->post('category_name_edit')
		);
		$this->db->where('category_id', $this->input->post('category_id_edit'));
		$this->db->update('category', $data);
	}
        
}

