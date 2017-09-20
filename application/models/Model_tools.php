<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Model_tools extends CI_Model {

	public function add_new_tool(){
	
		$data = array(
				'tool_name' => $this->input->post('tool_name'),
				'category_id' => $this->input->post('tool_category'),
				'brief_description' => $this->input->post('brief_description'),
				//'total_count' => $this->input->post('total_count'),
				//'borrowed' => $this->input->post('borrowed')
				'photo_path' => $this->input->post('photo_path')
		);
	
		error_log("this is the subjects".print_r($this->input->post('subjects[]'),true));
		$query = $this->db->insert('tools',$data);
		error_log("db update22".$this->db->last_query());
		
		$tool_id = $this->db->insert_id();
		
		if(sizeof($this->input->post('subjects[]')) > 0){
			foreach ($this->input->post('subjects[]') as $value){
				$sqlStatement = "INSERT INTO tool_subject (subject_id,tool_id) ";
				$sqlStatement .="SELECT ".$value.", ".$tool_id;
				$queryLogs = $this->db->query($sqlStatement);
			}
		}
			
		
		
		if($query){
			return true;
		}else{
			return false;
		}
	}
	

	public function getAllTool($category_id){
		$sqlStatement = "select * from tools t ";
		$sqlStatement .= "left join category c on t.category_id = c.category_id ";
		$sqlStatement .= "where t.deleted = 0 and t.category_id = ";
		$sqlStatement .=$category_id;
		$query = $this->db->query($sqlStatement);
		$result = $query->result();
		return $result;
	}
	
	public function getAllToolId($tool_id){
		$sqlStatement = "select category_id from tools ";
		$sqlStatement .= "where tools_id = ";
		$sqlStatement .=$tool_id;
		$sqlStatement .=" limit 1";
		$query = $this->db->query($sqlStatement);
		$result = $query->result();
		return $result;
	}
	
	
	
	
	
	
	public function deleteTool($tool_id){
		$data = array(
				'deleted' => 1
		);
		$this->db->where('tools_id', $tool_id);
		$this->db->update('tools', $data);

		$this->db->where('tool_id', $tool_id);
		$this->db->update('item', $data);
	
	}
	
	

	public function editTool($tool_id){
		$data = array(
				'tool_name' => $this->input->post('tool_name_edit'),
				'category_id' => $this->input->post('tool_category_edit'),
				'brief_description' => $this->input->post('brief_description_edit'),
				'total_count' => $this->input->post('total_count_edit'),
				'borrowed' => $this->input->post('borrowed_edit'),
				'photo_path' => $this->input->post('photo_path_edit')
		);
		$this->db->where('tools_id', $tool_id);
		$this->db->update('tools', $data);
		
		$this->db->where('tool_id', $tool_id);
		$this->db->delete('tool_subject');
		
		if(sizeof($this->input->post('subjects[]')) > 0){
			foreach ($this->input->post('subjects[]') as $value){
				$sqlStatement = "INSERT INTO tool_subject (subject_id,tool_id) ";
				$sqlStatement .="SELECT ".$value.", ".$tool_id;
				error_log("query of insert into tool subject".$sqlStatement);
				error_log("end of query");
				$queryLogs = $this->db->query($sqlStatement);
			}
		}
		
	}
	
	
	
	public function getAllToolNotDeleted(){
		$sqlStatement = "select c.category_name,t.tools_id ,t.tool_name,t.category_id,t.brief_description,t.total_count,t.borrowed,t.photo_path,t.deleted from tools t ";
		$sqlStatement .= "left join category c on t.category_id = c.category_id ";
		$sqlStatement .= "where t.deleted = 0 and c.deleted = 0";
		$query = $this->db->query($sqlStatement);
		$result = $query->result();
		return $result;
	}
	
	public function getAllToolReadyForBorrowing(){
		$sqlStatement = "select c.category_name,t.tool_name,t.photo_path,t.brief_description,t.total_count,t.borrowed,t.tools_id,c.category_id  ";
		$sqlStatement .= "from tools t ";
		$sqlStatement .= "left join category c on t.category_id = c.category_id ";
		$sqlStatement .= "where t.deleted = 0 and c.deleted = 0 order by c.category_name asc";
		$query = $this->db->query($sqlStatement);
		$result = $query->result();
		return $result;
	}
	
	public function getAllToolReadyForBorrowingWithFilter(){
		$str = strtolower($this->input->post('search_item'));
		
		$sqlStatement = "select c.category_name,t.tool_name,t.photo_path,t.brief_description,t.total_count,t.borrowed,t.tools_id,c.category_id ";
		$sqlStatement .= "from tools t ";
		$sqlStatement .= "left join category c on t.category_id = c.category_id ";
		$sqlStatement .= "where (LOWER(c.category_name) like '%".$str."%' or LOWER(t.tool_name) like '%".$str."%') ";
		$sqlStatement .= "and t.deleted = 0 and c.deleted = 0 order by c.category_name asc ";
		
		
		$query = $this->db->query($sqlStatement);
		$result = $query->result();
		return $result;
	}
		
        
}

