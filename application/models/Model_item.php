<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Model_item extends CI_Model {
	
	public function add_new_item(){
	
		$data = array(
				'category_id' => $this->input->post('category_id'),
				'tool_id' => $this->input->post('tools_option'),
				'condition' => $this->input->post('condition'),
				'serial_number' => $this->input->post('serial_number'),
				'brand' => $this->input->post('brand'),
				'price' => $this->input->post('price'),
				'item_description' => $this->input->post('item_description'),
				'department' => $this->input->post('department'),
				'location' => $this->input->post('location'),
				'person_in_charge' => $this->input->post('person_in_charge')
		);
	
		$query = $this->db->insert('item',$data);
		
		//add count
		$sqlStatement2 = "update tools set total_count = total_count + 1 where tools_id=".$this->input->post('tools_option').";";
		$query2 = $this->db->query($sqlStatement2);
		
		if($query){
			return true;
		}else{
			return false;
		}
	}
	
	public function getAllItems($tool_id){
		
		$sqlStatement = "select i.*, u.user_name,u.first_name,u.last_name, t.tool_name from item i ";
		$sqlStatement .= "left join user u on u.id = i.borrower ";
		$sqlStatement .= "left join tools t on t.tools_id = i.tool_id ";
		$sqlStatement .= "where i.tool_id = ".$tool_id." ";
		$sqlStatement .= "and i.deleted = 0 order by i.serial_number asc ";
		
		$query = $this->db->query($sqlStatement);
		$result = $query->result();
		return $result;
	}
	
	public function deleteItem($item_id){
		$tool_id_query = $this->db->query("select tool_id from item where item_id =".$item_id);
		$tool_id_result = $tool_id_query->result();
		
		$sqlStatement_minus = "update tools set total_count = total_count - 1 where tools_id=".$tool_id_result{0}->tool_id.";";
		$query_minus = $this->db->query($sqlStatement_minus);
		
		$data = array(
				'deleted' => 1
		);
		$this->db->where('item_id', $item_id);
		$this->db->update('item', $data);
	}
	
	public function editItem($item_id){
		$tool_id_query = $this->db->query("select tool_id from item where item_id =".$item_id);
		$tool_id_result = $tool_id_query->result();
		
		$data = array(
			'tool_id' => $this->input->post('tools_option_edit'),
			'condition' => $this->input->post('condition_edit'),
			'serial_number' => $this->input->post('serial_number_edit'),
			'date_borrowed' => $this->input->post('date_borrowed_edit'),
			'date_returned' => $this->input->post('date_returned_edit'),
			'price' => $this->input->post('price_edit'),
			'brand' => $this->input->post('brand_edit'),
			'item_description' => $this->input->post('item_description_edit'),
			'person_in_charge' => $this->input->post('person_in_charge_edit'),
			'location' => $this->input->post('location_edit'),
			'department' => $this->input->post('department_edit')
		);
		
		$this->db->where('item_id', $item_id);
		$this->db->update('item', $data);
		
		error_log("original".$tool_id_result{0}->tool_id);
		error_log("new".$this->input->post('tools_option_edit'));
		if($tool_id_result{0}->tool_id !== $this->input->post('tools_option_edit')){
				
			$sqlStatement_minus = "update tools set total_count = total_count - 1 where tools_id=".$tool_id_result{0}->tool_id.";";
			$query_minus = $this->db->query($sqlStatement_minus);
			
			$sqlStatement_plus = "update tools set total_count = total_count + 1 where tools_id=".$this->input->post('tools_option_edit').";";
			$query_plus = $this->db->query($sqlStatement_plus);
			
			error_log("updated");
			error_log("minus".$query_minus);
			error_log("plus".$query_plus);

		}
	}
        
}

