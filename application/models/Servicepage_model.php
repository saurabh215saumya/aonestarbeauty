<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
class Servicepage_model extends CI_Model{
	public function __construct() {
		parent::__construct();	
        $this->table = 'tbl_service_pages';
	}
	


    public function allServicePages() {
        $data = array();
        $query = $this->db->select("*")
                ->from($this->table)
                ->where(array("$this->table.is_deleted" => '0'))
                ->order_by("$this->table.id", "DESC")
                ->get();
				// echo $this->db->last_query();die;
        if($query->num_rows() > 0 ) {
            return  $query->result_array();
        } else {
            return $data;
        }
    }


    public function servicePageDetails($id) {
        $data = array();
        $query = $this->db->select("*")
					->from($this->table)
                    ->where(array("$this->table.id" => $id))
                    ->get();
// echo $this->db->last_query();die;
        if ($query->num_rows() > 0) {
            $data = $query->row_array();         
            return $data;  
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

    public function deleteRecord($id) {
        $data = array(
            'is_deleted' => '1'
        );
        if($this->db->where(array('id' => $id))->update($this->table, $data)){
            return TRUE;
        } else {
            return FALSE;
        }   
    }




/* Function for get all active service pages start */
public function getAllActiveServicePages() {
    $data = array();
    $query = $this->db->select("id, service_page_name, service_slug")
            ->from($this->table)
            ->where(array("$this->table.is_deleted" => '0', "$this->table.status" => '1'))
            ->order_by("$this->table.id", "DESC")
            ->get();
            // echo $this->db->last_query();die;
    if($query->num_rows() > 0 ) {
        return  $query->result_array();
    } else {
        return $data;
    }
}
/* Function for get all active service pages end */

/* Function for get service page by slug start */
 public function getServicePage($slug) {
    $data = array();
    $query = $this->db->select("*")
            ->from("tbl_service_pages")
            ->where(array("tbl_service_pages.service_slug" => $slug, "tbl_service_pages.is_deleted" => 0, "tbl_service_pages.status" => 1))
            ->get();
            // echo $this->db->last_query();die;
    if($query->num_rows() > 0 ) {
        return  $query->row_array();
    } else {
        return $data;
    }
}
/* Function for get service page by slug end */


   

}
