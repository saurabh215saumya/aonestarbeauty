<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
class Service_model extends CI_Model{
	public function __construct() {
		parent::__construct();	
        $this->table = 'tbl_services';
	}

/* Admin Section Start */

/* Function for get all product data for admin view start */
    public function allmaleservice() {
        $data = array();
        $query = $this->db->select("*")
                ->from($this->table)
                ->where(array("$this->table.is_deleted" => 0, "$this->table.category_type" => 1))
                ->order_by("$this->table.id", "DESC")
                ->get();
				//echo $this->db->last_query();die;
        if($query->num_rows() > 0 ) {
            return  $query->result_array();
        } else {
            return $data;
        }
    }

    public function allfemaleservice() {
        $data = array();
        $query = $this->db->select("*")
                ->from($this->table)
                ->where(array("$this->table.is_deleted" => 0, "$this->table.category_type" => 2))
                ->order_by("$this->table.id", "DESC")
                ->get();
                //echo $this->db->last_query();die;
        if($query->num_rows() > 0 ) {
            return  $query->result_array();
        } else {
            return $data;
        }
    }
/* Function for get all product data for admin view end */ 


/* Function for get all product gallery for admin view start */
    public function allServiceGallery($id) {
        $data = array();
        $query = $this->db->select("*")
                ->from("tbl_gallery")
                ->where(array("tbl_gallery.service_id" => $id, "tbl_gallery.is_deleted" => 0))
                ->order_by("tbl_gallery.id", "DESC")
                ->get();
                // echo $this->db->last_query();die;
        if($query->num_rows() > 0 ) {
            return  $query->result_array();
        } else {
            return $data;
        }
    }
/* Function for get all product gallery for admin view end */   

/* Function for get product details start */
    public function serviceDetails($id) {
        $data = array();
        $query = $this->db->select("*")
					->from($this->table)
                    ->where(array("$this->table.id" => $id, "$this->table.is_deleted" => 0))
                    ->get();
// echo $this->db->last_query();die;
        if ($query->num_rows() > 0) {
            $data = $query->row_array();         
            return $data;  
        } else {
            return $data;
        }
    }
/* Function for get product details end */


/* Function for get product details start */
    public function serviceGalleryDetails($id) {
        $data = array();
        $query = $this->db->select("*")
                    ->from("tbl_gallery")
                    ->where(array("tbl_gallery.id" => $id, "tbl_gallery.is_deleted" => 0))
                    ->get();
// echo $this->db->last_query();die;
        if ($query->num_rows() > 0) {
            $data = $query->row_array();         
            return $data;  
        } else {
            return $data;
        }
    }
/* Function for get product details end */    

/* Function for change product status start */
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
/* Function for change product status end */

/* Function for change product status start */
    public function changeGalleryStatus($statusId, $statusValue) {
        $data = array();
        $values = array(
            'status' => $statusValue
        );
            if($this->db->where(array('id' => $statusId))->update("tbl_product_gallery", $values)){
            return TRUE;
        } else {
            return FALSE;
        }   
    }
/* Function for change product status end */

/* Function for delete product start */
    public function deleteRecord($id) {
        $data = array(
            'is_deleted' => 1
        );
        if($this->db->where(array('id' => $id))->update($this->table, $data)){
            return TRUE;
        } else {
            return FALSE;
        }   
    }
/* Function for delete product end */

/* Function for get all active service pages start */
public function getAllActiveServicePages() {
    $data = array();
    $query = $this->db->select("id, service_name, sub_menu_slug")
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

/* Function for delete product gallery start */
    public function deleteGalleryRecord($id) {
        $data = array(
            'is_deleted' => 1
        );
        if($this->db->where(array('id' => $id))->update("tbl_gallery", $data)){
            return TRUE;
        } else {
            return FALSE;
        }   
    }
/* Function for delete product gallery end */



/* Admin Section End */


/* Function for get service details start */
public function getServiceDetails($id) {
    $data = array();
    $query = $this->db->select("*")
                ->from($this->table)
                ->where(array("$this->table.sub_menu_slug" => $id, "$this->table.status" => 1, "$this->table.is_deleted" => 0))
                ->get();
                // echo $this->db->last_query(); die;
    if ($query->num_rows() > 0) {
        $data = $query->row_array();         
        return $data;  
    } else {
        return $data;
    }
}
/* Function for get service details end */ 



}
