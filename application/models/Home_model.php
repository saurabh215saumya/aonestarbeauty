<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
class Home_Model extends CI_Model{
	public function __construct() {
		parent::__construct();	
        // $this->table = 'tbl_faqs';
	}

/* Function for get cms page data start */
    public function getPageData($page="") {
        $data = array();
        $query = $this->db->select("*")
            ->from("tbl_staticpages")
            ->where(array("is_deleted" => 0, "identifire" => $page))
            ->order_by("tbl_staticpages.id", "DESC")
            ->get();

        if($query->num_rows() > 0 ) {
            return  $query->row_array();
        } else {
            return $data;
        }
    }
/* Function for get cms page data start */


 
public function add($table = FALSE, $data = FALSE)
{

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



/* Function for get home banners start */
    public function getHomeBanners() {
        $data = array();
        $query = $this->db->select('*')
        ->from('tbl_banners AS tb')
        ->where(array('tb.status'=>1, 'tb.is_deleted'=>0))
        ->order_by('tb.id', 'DESC')
        ->get();
        // echo $this->db->last_query(); die;
        if ($query->num_rows() > 0) {
          $data = $query->result_array();
          return $data;
        } else {
          return $data;
        }
    }
 /* Function for get home banners end */


 /* Function for get home packages start */
    public function getAllPackages() {
        $data = array();
        $query = $this->db->select('*')
        ->from('tbl_packages AS tp')
        ->where(array('tp.status'=>1, 'tp.is_deleted'=>0))
        ->order_by('tp.id', 'ASC')
        ->get();
        // echo $this->db->last_query(); die;
        if ($query->num_rows() > 0) {
          $data = $query->result_array();
          return $data;
        } else {
          return $data;
        }
    }
 /* Function for get home packages end */


 /* Function for get seo keywords details start */
 /*public function seoKeywordDetails($slug) {
        $keywordName = str_replace("-", " ", $slug);
        $data = array();
        $query = $this->db->select('*')
        ->from('tbl_seo_keywords AS tsk')
        // ->where(array('tsk.status'=>1, 'tsk.is_deleted'=>0))
        ->where('tsk.keyword_name', $keywordName)
        ->order_by('tsk.id', 'ASC')
        ->get();
        // echo $this->db->last_query(); die;
        if ($query->num_rows() > 0) {
          $data = $query->row_array();
          return $data;
        } else {
          return $data;
        }
    }*/


    public function seoKeywordDetails($slug) {
        $keywordName = str_replace("-", " ", $slug);
        $data = array();
        $query = $this->db->select('*')
        ->from('tbl_keywords AS tk')
        // ->where(array('tsk.status'=>1, 'tsk.is_deleted'=>0))
        ->where('tk.page_slug', $slug)
        // ->order_by('tsk.id', 'ASC')
        ->get();
        // echo $this->db->last_query(); die;
        if ($query->num_rows() > 0) {
          $data = $query->row_array();
          return $data;
        } else {
          return $data;
        }
    }
 /* Function for get seo keywords details end */



}
