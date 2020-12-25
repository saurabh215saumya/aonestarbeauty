<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
class Gallery_Model extends CI_Model{
	public function __construct() {
		parent::__construct();	
        $this->table = 'tbl_gallery_image';
	}
	


    public function allgallery() {
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

    public function galleryDetails($id) {
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
   

}
