<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
class User_model extends CI_Model{
	public function __construct() {
		parent::__construct();	
        $this->table = 'tbl_admin';
	}
	
    public function login($email, $password) {
        $data = array();
        $query = $this->db->get_where($this->table, array('password' => MD5($password), 'email' => $email,'status' => 1));

        if($query->num_rows() > 0 ) {
            return  $query->result();
        } else {
            return $data;
        }
    }

    public function profileDetails($id) {
        $data = array();
        $query = $this->db->select("*")
                    ->from($this->table)
                    ->where("id", $id)
                    ->get();
// echo $this->db->last_query();die;
        if ($query->num_rows() > 0) {
            $data = $query->row_array();         
            return $data;  
        } else {
            return $data;
        }
    }

    public function checkEmailExist($emailId) {
        
        $query = $this->db->get_where('tbl_admin', array('email' => $emailId, 'status' => 1));
        // echo $this->db->last_query();die;
        if ($query->num_rows() > 0) {
            // $data = array();
            $data = $query->row();         
            return $data;  
        } else {
            return False;
        }
    }


    public function check_user_exist($user_name) {
        $data = array();
        $query = $this->db->get_where($this->table, array('user_name' => $user_name));
        if($query->num_rows() > 0 ) {
            return  $query->result();
        } else {
            return $data;
        }
    }


    public function getEmailTemplate($name) {
        $query = $this->db->select('subject, description')->get_where('tbl_email_template', array('name' => $name, 'status' => '1') );
        $data = array();
        if ($query->num_rows() > 0) {
            $data = $query->row_array();         
            return $data;
        }
        return false;
    }

    function verify_resetPassword($adminId,$verificationKey){
        $check=$this->db->get_where('tbl_admin',array('id'=>$adminId,'activation_key'=>$verificationKey))->num_rows();
        if($check==0){
            return false;
        }
        return true;
    }

    function changePassword($admin) {
        $this->db->where('id',$admin);
        $data['password'] = MD5($this->input->post('password'));
        $data['activation_key'] = "";
        if($this->db->update('tbl_admin', $data )){
            return true;
        } else {
            return false;
        }
    }


    public function userDetails($id) {
        $data = array();
        $query = $this->db->select("id, first_name, last_name, profile_image")
        ->from("tbl_users")
        ->where("id", $id)
        ->get();
        if ($query->num_rows() > 0) {
            $data = $query->row_array();         
            return $data;  
        } else {
            return $data;
        }
    }

}
