<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tools_controller extends CI_Controller {
	
public function addCategory($category_name){
		$this->load->library('form_validation');
		$this->load->model('model_category');
		$category_name = str_ireplace("%20"," ",$category_name);
		if($this->model_category->add_new_category($category_name)){
			echo 1;
		}
	}
	
	public function getCategoryList(){
		$this->load->model('model_category');
		$data['categories'] =  $this->model_category->getAllCategory();
		$this->load->view('category', $data);
		
	}
	
	public function addTool(){
		$this->load->model('model_tools');
		if($this->model_tools->add_new_tool()){
			$this->getAllToolList($this->input->post('tool_category'));
		}
		
	}
	
	public function getAllToolList($category_id){
		$this->load->model('model_tools');
		$data['tools'] =  $this->model_tools->getAllTool($category_id);
		$data['category_source'] = $category_id;
		$this->load->view('tools', $data);
	}
	
	public function getAllToolListToolId($tool_id){
		$this->load->model('model_tools');
		$data=  $this->model_tools->getAllToolId($tool_id);
		$this->getAllToolList($data{0}->category_id);
	}
		
	public function addItem(){
		$this->load->model('model_item');
		if($this->model_item->add_new_item()){
			$this->getAllItemList($this->input->post('tools_option'));
		}
			
	}
		
	public function getAllItemList($tool_id){
		$this->load->model('model_item');
		$data['items'] =  $this->model_item->getAllItems($tool_id);
		$data['item_source'] =  $tool_id;
		
		$query = $this->db->query("select category_id from tools where tools_id =".$tool_id." limit 1");
		$dataCategoryId = $query->result();
		
		$data['item_category_id'] =  $dataCategoryId{0}->category_id == null ? $this->input->post('category_source_id') : $dataCategoryId{0}->category_id;
		
		
		$queryName = $this->db->query("select category_name from category where category_id =".$data['item_category_id']." limit 1");
		$dataCategoryName = $queryName->result();
		$data['category_name_used'] = $dataCategoryName;
		
		$this->load->view('item', $data);
	}
	
	public function deleteCategory(){
		$this->load->model('model_category');
		$this->model_category->deleteCategory($this->input->post('category_id_delete'));
		$this->getCategoryList();
	}
	
	public function editCategory(){
		$this->load->model('model_category');
		$this->model_category->editCategory();
		$this->getCategoryList();
	}
	
	public function deleteTool(){
		$this->load->model('model_tools');
		$this->model_tools->deleteTool($this->input->post('tool_id_delete'));
		$this->getAllToolListToolId($this->input->post('tool_id_delete'));
	}
	
	public function editTool(){
		$this->load->model('model_tools');
		$this->model_tools->editTool($this->input->post('tool_id_edit'));
		//$this->getAllToolList($this->input->post('tool_category_edit'));
		$this->viewEditTool($this->input->post('tool_id_edit'), $this->input->post('hidden_category_source_id'));
	}
	
	public function deleteItem(){
		$this->load->model('model_item');
		$this->model_item->deleteItem($this->input->post('delete_item_id'));
		$this->getAllItemList($this->input->post('delete_item_tool_id'));
	}
	
	public function editItem(){
		$this->load->model('model_item');
		$this->model_item->editItem($this->input->post('edit_item_id'));
		$this->getAllItemList($this->input->post('tools_option_edit'));
	}
	
	public function addToolsView($category_source){
		$data = array( 'error' => ' ', 'upload_data' => array('file_name' => 'default_picture.jpg'));
		$data['category_source'] = $category_source;
		$this->load->view('add_tools',$data);
	}
	
	public function viewToolDetails($tools_id){
		$sqlStatement = "SELECT * FROM tools t LEFT JOIN category c ON t.category_id = c.category_id WHERE t.tools_id = ";
		$sqlStatement .= $tools_id;
		$query = $this->db->query($sqlStatement);
		$data['tool_history'] = $query->result();
		$this->load->view('tool_history_profile',$data);
	}
	
	public function viewEditTool($tool_id,$category_source){
		$sqlStatement = "SELECT * FROM tools WHERE deleted = 0 and tools_id = ";
		$sqlStatement .= $tool_id;
		
		$query = $this->db->query($sqlStatement);
		$tool_details = $query->result();
		
		$data['category_source'] = $category_source;
		$data['tool_edit'] =$tool_details; 
		$data['error'] = '';
		$data['upload_data'] = array('file_name' => $tool_details{0}->photo_path);
		//$data = array( 'error' => ' ', 'upload_data' => array('file_name' => 'default_picture.jpg'));
		
		$this->load->view('edit_tools',$data);
	}
	
}




