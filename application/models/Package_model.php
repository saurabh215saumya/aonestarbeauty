<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
class Package_model extends CI_Model{
	public function __construct() {
		parent::__construct();	
        $this->table = 'tbl_packages';
	}
	


    public function allMalePackages() {
        $data = array();
        $query = $this->db->select("*")
                ->from($this->table)
                ->where(array("$this->table.is_deleted" => '0', "$this->table.category_type" => '1'))
                ->order_by("$this->table.id", "DESC")
                ->get();
				// echo $this->db->last_query();die;
        if($query->num_rows() > 0 ) {
            return  $query->result_array();
        } else {
            return $data;
        }
    }


    public function allFeMalePackages() {
        $data = array();
        $query = $this->db->select("*")
                ->from($this->table)
                ->where(array("$this->table.is_deleted" => '0', "$this->table.category_type" => '2'))
                ->order_by("$this->table.id", "DESC")
                ->get();
                // echo $this->db->last_query();die;
        if($query->num_rows() > 0 ) {
            return  $query->result_array();
        } else {
            return $data;
        }
    }

    public function packageDetails($id) {
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


    /* Function for get all brands start */

    public function getAllPackage() {
        $data = array();
        $query = $this->db->select("*")
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

    /* Function for get all brands end */


    /* Function for get all brand products start */
    public function get_count($id) {
        $data = array();
        $query = $this->db->select("*")
                ->from('tbl_packages')
                ->where(array("tbl_packages.package_id" => $id, "tbl_packages.is_deleted" => 0, "tbl_packages.status" => 1))
                ->order_by("tbl_packages.id", "DESC")
                ->get();
                //echo $this->db->last_query();die;
        if($query->num_rows() > 0 ) {
            return  $query->num_rows();
        } else {
            return 0;
        }
    }

    public function getAllPackageServices($limit="", $start="", $id) {
        $data = array();
        $order=$this->input->get('order');
        $query = $this->db->select("*");
        $this->db->from('tbl_packages');

        if(!empty($order) && ($order == 'new')) {
            $this->db->order_by("tbl_packages.id",'desc');
        } 
        else if(!empty($order) && ($order == 'old')){
            $this->db->order_by("tbl_packages.id",'asc');
        }       
        else if((!empty($order)) && ($order=='price_low')){
           $this->db->order_by("tbl_packages.price", 'asc');  
        }        
        else if((!empty($order)) && ($order=='price_high')){
           $this->db->order_by("tbl_packages.price", 'desc');  
        }
        else {
            $this->db->order_by("tbl_packages.id",'desc');
        }

        $this->db->where(array("tbl_packages.package_id" => $id, "tbl_packages.is_deleted" => '0', "tbl_packages.status" => '1'));
        $this->db->limit($limit, $start);
        // $this->db->order_by("tbl_products.id", "DESC");
        $query = $this->db->get();
        // echo $this->db->last_query();die;
        if($query->num_rows() > 0 ) {
            return  $query->result_array();
        } else {
            return $data;
        }
    }

    /* Function for get all brand products end */






/* Function for get all brand category start */
 public function getAllCategoryPackage($id) {
    $data = array();
    $query = $this->db->select("id, package_name")
            ->from("tbl_packages")
            ->where(array("tbl_packages.category_type" => $id, "tbl_packages.is_deleted" => 0, "tbl_packages.status" => 1))
            ->order_by("tbl_packages.id", "DESC")
            ->get();
            // echo $this->db->last_query();die;
    if($query->num_rows() > 0 ) {
        return  $query->result_array();
    } else {
        return $data;
    }
}
/* Function for get all brand category end */

/* Function for get package details start */
public function getPackageDetails($id) {
    $data = array();
    $query = $this->db->select("*")
                ->from($this->table)
                ->where(array("$this->table.package_slug" => $id, "$this->table.status" => 1, "$this->table.is_deleted" => 0))
                ->get();
                // echo $this->db->last_query(); die;
    if ($query->num_rows() > 0) {
        $data = $query->row_array();         
        return $data;  
    } else {
        return $data;
    }
}
/* Function for get package details end */ 

/* Function for get package services start */
public function getPackageServices($id) {
    $data = array();
    $query = $this->db->select("*")
                ->from('tbl_services')
                ->where(array("tbl_services.package_id" => $id, "tbl_services.status" => 1, "tbl_services.is_deleted" => 0))
                ->order_by("tbl_services.service_name", "ASC")
                ->get();
    if($query->num_rows() > 0 ) {
        return  $query->result_array();
    } else {
        return $data;
    }
}
/* Function for get package services end */    

public function add($table = FALSE, $data = FALSE){
    if($data && $table){
        
        $result = $this->db->insert($table, $data);
        if ($result) {
            return $result;
        }else{
            return false;
        }
    }else{
        return false;
    }
}
   

}
