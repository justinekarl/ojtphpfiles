<?php

class Upload extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->helper(array('form', 'url'));
        }

        public function index()
        {
                $this->load->view('upload_view', array('error' => ' ' ));
        }

        public function do_upload()
        {
                $config['upload_path']          = './user_photo/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload');
                error_log("upload error");
				$this->upload->initialize($config);
                
                if ( ! $this->upload->do_upload('userfile'))
                {
                        $error = array('error' => $this->upload->display_errors());
                        $this->load->view('upload_view', $error);
                }
                else
                {
                        $data = array('upload_data' => $this->upload->data());
                        $this->load->view('upload_view_ok', $data);
                }
        }
        
        
        public function do_upload_user()
        {
        	$config['upload_path']          = './user_photo/';
        	$config['allowed_types']        = 'gif|jpg|png';
        	$config['max_size']             = 10000;
        	$config['max_width']            = 10800;
        	$config['max_height']           = 10800;
        
        	$this->load->library('upload');
        	error_log("upload error");
        	$this->upload->initialize($config);
        
        	if ( ! $this->upload->do_upload('userphoto'))
        	{
        		//$error = array('error' => $this->upload->display_errors());
        		
        		$data = array( 'error' => $this->upload->display_errors(), 
        						'upload_data' => array('file_name' => 'default_picture.jpg'));
        		$this->load->view('signup',$data);
        		
        		//$this->load->view('signup', $error);
        	}
        	else
        	{
//         		$data = array('upload_data' => $this->upload->data());
//         		$this->load->view('signup', $data);
        		
        		$data = array( 'error' => $this->upload->display_errors(),
        				'upload_data' => $this->upload->data());
        		$this->load->view('signup',$data);
        	}
        }
        
        public function do_upload_user_mobile()
        {
        	$config['upload_path']          = './user_photo/';
        	$config['allowed_types']        = 'gif|jpg|png';
        	$config['max_size']             = 1000;
        	$config['max_width']            = 1080;
        	$config['max_height']           = 1080;
        
        	$this->load->library('upload');
        	error_log("upload error".$this->input->post('userphoto'));
        	$this->upload->initialize($config);
        
        	if ( ! $this->upload->do_upload('userphoto'))
        	{
        		//$error = array('error' => $this->upload->display_errors());
        
        		$data = array( 'error' => $this->upload->display_errors(),
        				'upload_data' => array('file_name' => 'default_picture.jpg'));
        		$this->load->view('mobile_signup',$data);
        
        		//$this->load->view('signup', $error);
        	}
        	else
        	{
        		//         		$data = array('upload_data' => $this->upload->data());
        		//         		$this->load->view('signup', $data);
        
        		$data = array( 'error' => $this->upload->display_errors(),
        				'upload_data' => $this->upload->data());
        		$this->load->view('mobile_signup',$data);
        	}
        }
        
        
        public function do_upload_item()
        {
        	$config['upload_path']          = './tool_photo/';
        	$config['allowed_types']        = 'gif|jpg|png';
        	$config['max_size']             = 1000;
        	$config['max_width']            = 1080;
        	$config['max_height']           = 1080;
        
        	$this->load->library('upload');
        	error_log("upload error");
        	$this->upload->initialize($config);
        
        	if ( ! $this->upload->do_upload('userphoto'))
        	{
        		//$error = array('error' => $this->upload->display_errors());
        
        		$data = array( 'error' => $this->upload->display_errors(),
        				'upload_data' => array('file_name' => 'default_picture.jpg'));
        		$data['category_source'] =$this->input->post('hidden_category_source_id'); 
        		$this->load->view('add_tools',$data);
        
        		//$this->load->view('signup', $error);
        	}
        	else
        	{
        		//         		$data = array('upload_data' => $this->upload->data());
        		//         		$this->load->view('signup', $data);
        
        		$data = array( 'error' => $this->upload->display_errors(),
        				'upload_data' => $this->upload->data());
        		$data['category_source'] =$this->input->post('hidden_category_source_id');
        			$this->load->view('add_tools',$data);
        	}
        }
        
        public function do_upload_item_edit(){

        	$config['upload_path']          = './tool_photo/';
        	$config['allowed_types']        = 'gif|jpg|png';
        	$config['max_size']             = 1000;
        	$config['max_width']            = 1080;
        	$config['max_height']           = 1080;
        	
        	$this->load->library('upload');
        	error_log("upload error");
        	$this->upload->initialize($config);
        	
        	if ( ! $this->upload->do_upload('userphoto'))
        	{
        		//$error = array('error' => $this->upload->display_errors());
        	
        		$sqlStatement = "SELECT * FROM tools WHERE deleted = 0 and tools_id = ";
        		$sqlStatement .= $this->input->post('tool_id_edit');
        		
        		$query = $this->db->query($sqlStatement);
        		$tool_details = $query->result();
        		$data['tool_edit'] =$tool_details;
        		$data['error'] = $this->upload->display_errors();
        		$data['upload_data'] = array('file_name' => $tool_details{0}->photo_path);
        		$data['category_source'] =$this->input->post('hidden_category_source_id');
        		
        		$this->load->view('edit_tools',$data);
        		//$this->load->view('signup', $error);
        	}
        	else
        	{
        		//         		$data = array('upload_data' => $this->upload->data());
        		//         		$this->load->view('signup', $data);
        	
        		

        		$sqlStatement = "SELECT * FROM tools WHERE deleted = 0 and tools_id = ";
        		$sqlStatement .= $this->input->post('tool_id_edit');
        		
        		$query = $this->db->query($sqlStatement);
        		$tool_details = $query->result();
        		$data['tool_edit'] =$tool_details;
        		$data['error'] = $this->upload->display_errors();
        		$data['upload_data'] = $this->upload->data();
        		$data['category_source'] =$this->input->post('hidden_category_source_id');
        		
        		$this->load->view('edit_tools',$data);
        		
        		
        		
        		
        	}
        	
        }
        
        
        public function do_upload_user_edit()
        {
        	$config['upload_path']          = './user_photo/';
        	$config['allowed_types']        = 'gif|jpg|png';
        	$config['max_size']             = 1000;
        	$config['max_width']            = 1080;
        	$config['max_height']           = 1080;
        
        	$this->load->library('upload');
        	error_log("upload error");
        	$this->upload->initialize($config);
        
        	if ( ! $this->upload->do_upload('userphoto'))
        	{
        		//$error = array('error' => $this->upload->display_errors());

        		$sqlStatement = "select * from user where id =";
        		$sqlStatement .= $this->input->post('user_id_edit');
        		$query = $this->db->query($sqlStatement);
        		$userDetail = $query->result();
        		
        		$data = array( 'error' => $this->upload->display_errors(),
        				'upload_data' => $this->upload->data(),'userId' => $this->input->post('user_id_edit'),
        				'user_detail' => $userDetail,
        				'userPhoto' => $userDetail{0}->user_photo
        		);
        
        		$this->load->view('user_edit',$data);
        	}
        	else
        	{
        		$sqlStatement = "select * from user where id =";
        		$sqlStatement .= $this->input->post('user_id_edit');
        		$query = $this->db->query($sqlStatement);
        		
        		$data = array( 'error' => $this->upload->display_errors(),
        				'upload_data' => $this->upload->data(),'userId' => $this->input->post('user_id_edit'),
        				'user_detail' => $query->result(),
        				'userPhoto' => $this->upload->data()['file_name']
        		);
        		
        		
        		$this->load->view('user_edit',$data);
        		
        	}
        }
        
        public function mobileSignupValidation(){
        	$data = array( 'error' => ' ', 'upload_data' => array('file_name' => 'default_picture.jpg'));
			error_log("arrays to be selected if ever".print_r($data,true));
			$this->load->view('mobile_signup',$data);
        }
        
}
?>