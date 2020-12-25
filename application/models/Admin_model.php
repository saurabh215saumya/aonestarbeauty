<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
class Admin_model extends CI_Model{
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

    public function get_admin() {
        $data = array();
        $query = $this->db->select("*")
                ->from($this->table)
                ->where(array("$this->table.admin_type" => 1))
                ->get();
                //echo $this->db->last_query();die;
        if($query->num_rows() > 0 ) {
            return  $query->row_array();
        } else {
            return $data;
        }
    }

    public function getTotalData($tableName, $selectColumn = "", $whereArr = "")
    {
        $data = array();
        if( $tableName ) {
            if( $selectColumn ) {
                $sql = $selectColumn;
            } else {
                $sql = $tableName . '.*';
            }
            $this->db->select( $sql );
            $this->db->from( $tableName );
            if( $whereArr ){
                $this->db->where( $whereArr );
            }
            $query = $this->db->get();
            // echo $this->db->last_query();die;
            if ($query->num_rows() > 0) {
                $data = $query->result_array();
                return $data;
            } else {
                return $data;
            }
        } else {
            return $data;
        }
    }

}
