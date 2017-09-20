<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	
	
	public function index(){
		$this->login();
	}
	
	public function login(){
		$this->load->view('login');
	}
	
	public function restricted(){
		$this->load->view('restricted');
	}
	
	public function members(){
		$this->load->view('members');
	}
	
	
	public function login_validation(){
		
		$userName = $this->input->post('user_name');
		$password = $this->input->post('password');
		
		//
		$this->db->where('user_name', $userName);
		$this->db->where('password',$password);
		$this->db->where('admin',1);
        $this->db->where('deleted',0);

		$query = $this->db->get('agent');
		
		
		if($query->num_rows() == 1){
			$result = $query->result();
			
			$data = array(
					'full_name' => $result[0]->full_name,
					'id_agent' => $result[0]->id_agent,
					'is_logged_in' => 1,
					'permission' => 1
			);
			
			$this->session->set_userdata($data);
			redirect('Main/members');
		}else{
			$this->load->library('form_validation');
			$this->session->set_userdata(null);
			$this->form_validation->set_rules('user_name','user_name','callback_validate_credentials');
			$this->form_validation->run();
			$this->login();
		}
		
	}
	
	public function validate_credentials(){
		$this->form_validation->set_message('validate_credentials', 'Incorrect Username / Password');
		return false;
	}
	
	public function get_all_users(){
		
		$query=" SELECT agent.*,borrowed.not_clear FROM agent ";
		$query.=" left join (select agent_id,count(borrowed.agent_id) > 0 as not_clear from borrowed group by borrowed.agent_id) as borrowed on agent.id_agent = borrowed.agent_id ";
		$query.=" WHERE admin = 0 and deleted = 0 order by full_name ASC ";
		
		$query=$this->db->query($query);
		$result=$query->result();
		
		$data['users']=$result;
		$this->load->view('users', $data);
		
		
	}
	
	
	public function logout(){
		$this->session->sess_destroy();
		$this->login();
	}
	
	public function clearUser($idAgent){
		$query="update agent set deleted = true where id_agent = ".$idAgent;
		$this->db->query($query);
		
		$query="delete from returned where agent_id = ".$idAgent;
		$this->db->query($query);
		
		$query="delete from borrowed where agent_id = ".$idAgent;
		$this->db->query($query);
		
		$query="update transaction_logs set deleted = true where agent_id = ".$idAgent;
		$this->db->query($query);
		
		$this->get_all_users();
	}
	
	
	
	
	public function updateAuthentication(){
		$reponse = [];
		$parameters = json_decode($this->input->post('data'));
		$newPassword = $parameters->newPassword;
		$oldPassword = $parameters->oldPassword;
		
		$query=" Select password from password ";
		$query=$this->db->query($query);
		$result=$query->result();
		
		if($result[0]->password == $oldPassword){
			$query="update password set password ='".$newPassword."'";
			$this->db->query($query);
			
			$reponse['data'] = true;
			$reponse['message'] = "Authentication Updated";
			
		}else{
			$reponse['data'] = true;
			$reponse['message'] = "Incorrect Old Password";
		}
		
		echo json_encode($reponse);
	}
	
	public function createUser(){
		$userName = $this->input->post('username');
		$fullName = $this->input->post('full_name');
		$studentNumber = $this->input->post('student_number');
		$password = $this->input->post('password');
		$admin = $this->input->post('admin');
		
		
		
		$query=" select count(*) as checker from agent where deleted = 0 and user_name = '".$userName."' or student_number ='".$studentNumber."'";
		$query=$this->db->query($query);
		$result=$query->result();
		
		if($result[0]->checker == 0){
			
			$data = array(
					
					'user_name'         => $userName,
					'password'          => $password,
					'student_number'    => $studentNumber,
					'full_name'         => $fullName,
					'admin'             =>$admin
			);
			
			
			$query = $this->db->insert('agent',$data);
			
			$reponse['data'] = true;
			$reponse['message'] = "Account Created";
		}else{
			$reponse['data'] = false;
			$reponse['message'] = "Username or Student Number Already Used";
		}
		echo json_encode($reponse);
		
	}
	
	public function getTransaction($type){
		if($type == "returned"){
			
			$query="select id,agent.full_name , returned.item , returned.date_created ";
			$query.=" from returned left join agent on agent.id_agent = returned.agent_id";
			
			$query=$this->db->query($query);
			$result=$query->result();

			$data['logs']=$result;
			$data['type']=$type;
			$data['title']="Returned Items";
			$this->load->view('logs', $data);
			
		}else if($type == "borrowed"){
			
			$query="select id,agent.full_name , borrowed.item , borrowed.date_created ";
			$query.=" from borrowed left join agent on agent.id_agent = borrowed .agent_id";
			
			$query=$this->db->query($query);
			$result=$query->result();

			$data['logs']=$result;
			$data['type']=$type;
			$data['title']="Borrowed Items";
			$this->load->view('logs', $data);
			
		}else if($type == "transactions"){
			
			$query="select id,agent.full_name , transaction_logs.item , transaction_logs.date_created, transaction_logs.borrowed ";
			$query.=" from transaction_logs left join agent on agent.id_agent = transaction_logs .agent_id";
			$query.=" where transaction_logs.deleted = 0";
			
			$query=$this->db->query($query);
			$result=$query->result();


			$data['logs']=$result;
			$data['type']=$type;
			$data['title']="Transaction Logs";
			$this->load->view('logs', $data);
			
		}else if($type == "history"){
			$query="select id,agent.full_name , transaction_logs.item , transaction_logs.date_created, transaction_logs.borrowed ";
			$query.=" from transaction_logs left join agent on agent.id_agent = transaction_logs .agent_id";
			
			$query=$this->db->query($query);
			$result=$query->result();

			$data['logs']=$result;
			$data['type']=$type;
			$data['title']="History";
			$this->load->view('logs', $data);
		}
	}
	
	public function manage_logs(){
		$this->load->view('manage_logs');
	}
	
	
	public function create_account(){
		$this->load->view('create_account');
	}
	
	public function manage_authentication(){
		$this->load->view('manage_authentication');
	}
	
	public function deleteLog($id){
		$query =" update transaction_logs set deleted = true where id = ".$id;
		$this->db->query($query);
		
		$query = "select borrowed,reference_id from transaction_logs where id = ".$id;
		$query = $this->db->query($query);
		$result = $query->result();
		if($result[0]->borrowed){
			$query = "delete from borrowed where id = ".$result[0]->reference_id;
			$this->db->query($query);
		}else{
			$query = "delete from returned where id = ".$result[0]->reference_id;
			$this->db->query($query);
		}
		
		$this->getTransaction('transactions');
	}
	
	
	public function manage_qr_code(){
		$query=" SELECT * from qr_codes";
		
		$query=$this->db->query($query);
		$result=$query->result();

        /*foreach($result as $log){
            $log->item = str_replace("\n"," " ,$log->item);
            $log->item = str_replace("Contents:","\nContents:" ,$log->item);
            $log->item = str_replace("Orientation: ","\nOrientation:" ,$log->item);
            $log->item = str_replace("Raw bytes: ","\nRaw bytes:" ,$log->item);
            $log->item = str_replace("level:","\nlevel:" ,$log->item);
        }*/
		
		$data['qrcodes']=$result;
		$this->load->view('qrcodes', $data);
	}
	
	public function clearQr($idQrCodes){
		$query="delete from qr_codes where id_qr_codes = ".$idQrCodes;
		$this->db->query($query);
		
		$this->manage_qr_code();
	}

	public function deleteLogs(){
        if(isset($_POST['ids'])){
            $ids = json_decode($_POST['ids']);
            foreach ($ids as $id){
                $query =" update transaction_logs set deleted = true where id = ".$id;
                $this->db->query($query);

                $query = "select borrowed,reference_id from transaction_logs where id = ".$id;
                $query = $this->db->query($query);
                $result = $query->result();
                if($result[0]->borrowed){
                    $query = "delete from borrowed where id = ".$result[0]->reference_id;
                    $this->db->query($query);
                }else{
                    $query = "delete from returned where id = ".$result[0]->reference_id;
                    $this->db->query($query);
                }
            }
        }

    }
	
}