<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
class Appointment_Model extends CI_Model{
	public function __construct() {
		parent::__construct();	
        $this->table = 'tbl_appointment';
	}

    public function getTotalPageData(){
        $data = array();
        $query = $query = $this->db->select("*")
        ->from("tbl_appointment")
        ->where("tbl_appointment.is_deleted", 0)
        ->order_by("id", "ASC")
         ->get();
       
       if($query->num_rows() > 0 ) {
            return  $query->num_rows();
        }
    }
	
    public function allappointments(){
		$data = array();
        $query = $query = $this->db->select("*")
        ->from("tbl_appointment")
        ->where("tbl_appointment.is_deleted", 0)
        ->order_by("id", "ASC")
         ->get();
        //echo $this->db->last_query();die;
		if($query->num_rows() > 0 ) {
            return  $query->result_array();
        } else {
            return $data;
        }
	}
	
	public function appointmentDetails($id){
		$data = array();
        $query = $this->db->select("*")
            ->from($this->table)
            ->where("$this->table.id", $id)
            ->order_by("$this->table.id", "DESC")
            ->get();
             
        if($query->num_rows() > 0 ) {
            return  $query->row_array();
        } else {
            return $data;
        }
		
	}

    public function changeStatus($statusId, $statusValue) {
        $data = array();
        $values = array(
            'status' => $statusValue
        );
            if($this->db->where(array('id' => $statusId))->update($this->table, $values)){
            return TRUE;
        } else {
            return FALSE;
        }   
    }

}
