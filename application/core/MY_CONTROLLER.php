
<?php

class MY_Controller extends CI_Controller {

    public function check_database($username,$password) {
        //Field validation succeeded.  Validate against database
        $result = $this->agent->login($username, $password);

        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'agent_id' => $row->agent_id,
                    'user_name' => $row->user_name
                );
                $this->session->set_userdata('logged_in', $sess_array);
            }
            $this->loadbasicinfo();
            return TRUE;
        } else {
            return false;
        }
    }

    public function logout() {
    	$this->session->unset_userdata('logged_in');
    	session_destroy();
    	redirect('login');

    }

    public function getData($field){
        return $this->input->post($field);
    }

    public function getValueData($field,$dbVal){
        error_log($field,0);
        if($this->input->post($field !== null )){
            error_log("in sending for dbval",0);
            return $dbVal;
        }else{
            error_log("in sending for post",0);
            return $this->input->post($field);
        }
    }


    public function isDataSet($field){
        return isset($this->$field);
    }


    public function objectToArray($d) {
        if (is_object($d)) {
            // Gets the properties of the given object
            // with get_object_vars function
            $d = get_object_vars($d);
        }

        if (is_array($d)) {
            /*
             * Return array converted to object
             * Using __FUNCTION__ (Magic constant)
             * for recursive call
             */
            return array_map(__FUNCTION__, $d);
        } else {
            // Return array
            return $d;
        }
    }



    function loadbasicinfo(){
        $agentId=$this->session->userdata('logged_in')['agent_id'];
        error_log("agent_id",0);
        error_log($agentId,0);
        $this->load->model('agent', '', TRUE);
        $agent=new Agent();
        $agent->load($agentId);
        $this->load->model('contact', '', TRUE);
        $contact=new Contact();
        $contact->load($agent->contact_id);


        $this->load->model('phone_number', '', TRUE);
        $phoneNumber=new Phone_Number();
        $phoneNumber->loadbycontactidone($contact->contact_id);
        if(!isset($phoneNumber->phone_number_id)){
            $phoneNumber->contact_id=$contact->contact_id;
            $phoneNumber->save();
            
        }
        
        $this->load->model('email', '', TRUE);
        $email=new Email();
        //not pretty but for now will suffice
        $email->loadbycontactidone($contact->contact_id);
        if(!isset($email->email_id)){
            $email->contact_id=$contact->contact_id;
            $email->save();
            
        }

        $this->load->model('address', '', TRUE);
        $address=new Address();
        $address->loadbycontactidone($contact->contact_id);
        if(!isset($address->address_id)){
            $address->contact_id=$contact->contact_id;
            $address->save();
            
        }



        $sess_array = array();
                $sess_array = array(
                    'agent_id' => $agent->agent_id,
                    'contact_id' => $contact->contact_id,
                    'email_id' => $email->email_id,
                    'phone_number_id' => $phoneNumber->phone_number_id,
                    'address_id' => $address->address_id,
                );
                $this->session->set_userdata('ccr_ids', $sess_array);

    }
        
        /**
         * 
         * @param type $query
         * query shiould have key and value pair
         * key is the id for the drop down value is the value
         */
        
        public function getQuerySelectDrop($queryString){
            $query = $this->db->query($queryString);      
            $first_ret_val = array();
            $index= 0;            
            foreach ($query->result() as $row) {
                $index=$index+1;
                $local = array(
                    'key' => $row->key,
                    'value' => $row->value
                );
                $first_ret_val[$index] = $local;
            }
            $question_options = array();
            foreach ($first_ret_val as $question ) {
                $question_options[$question['key']] = $question['value'];

            }                
            return $question_options;
            
        }
        
        
        /**
         *
         * @param type $value
         * @return null
         * @uses set the value to null if the value is 0, " ",'' and -1
         * 
         */
        public function setNull($value){
            if(empty($value)){
                return null;
            }else if(is_null($value)){
                return null;
            }else if($value==-1){
                return null;
            }else{
                return $value;
            }
        }
}

