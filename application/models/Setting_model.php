<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
class Setting_Model extends CI_Model{
	public function __construct() {
		parent::__construct();	
        $this->table = 'tbl_systemconfigs';
	}
	
    public function allSetting() {
        $data = array();
        $query = $this->db->select('*')
                ->from($this->table)
                ->get();

        if($query->num_rows() > 0 ) {
            return  $query->result_array();
        } else {
            return $data;
        }
    }

    public function settingDetails($id) {
        $data = array();
        $query = $this->db->select('*')
                    ->from($this->table)
                    ->where("$this->table.id", $id)
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

}
