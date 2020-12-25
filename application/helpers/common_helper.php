<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

function pretty($data){
    echo '<pre>';print_r($data);die;
}


if ( ! function_exists('is_front_user_login')) {
    function is_front_user_login(){
        $CI =& get_instance();
        if(empty($CI->session->userdata('logged_in'))){
            redirect('/');   
        } else {

        }
    }
}

/* Upload image number */
if ( ! function_exists('uploadImages')) {
	function uploadImages($upload_path, $name, $image_name) {
	    $CI = & get_instance();
	    
	    $config = array(
		'upload_path' => $upload_path,
		'allowed_types' => "gif|jpg|png|jpeg",
		'file_name' => $image_name,
		'overwrite' => TRUE,
	    );

	    $CI->load->library('upload', $config);
	    $CI->upload->initialize($config);        
	    if ($CI->upload->do_upload($name)) {
		return array(true,"success");
	    } else {
		return array('error' => $CI->upload->display_errors());
	    }
	}
}


/* * * 
  $tableName: Table Name
  $where = Where Condition array type
  Return type = true (if success)or false( faliure)
 * * */
if ( ! function_exists('deleteRecordData')) {
  function deleteRecordData($tableName, $whereCond) {
    $CI = & get_instance();
    $CI->load->database();

    if ($tableName && $whereCond) {
        if ($CI->db->delete($tableName, $whereCond)) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
  }
}  

/* Upload image number */
if ( ! function_exists('uploadImagesAny')) {
	function uploadImagesAny($upload_path, $name, $image_name) {
	    $CI = & get_instance();
	    
	    $config = array(
		'upload_path' => $upload_path,
		'allowed_types' => "*",
		'file_name' => $image_name,
		'overwrite' => TRUE,
	    );

	    $CI->load->library('upload', $config);
	    $CI->upload->initialize($config);        
	    if ($CI->upload->do_upload($name)) {
		return array(true,"success");
	    } else {
		return array('error' => $CI->upload->display_errors());
	    }
	}
}

/* delete file */
if ( ! function_exists('deleteFile')) {
	function deleteFile($fileNameWithPath) {
	    if(file_exists($fileNameWithPath)) {
		@unlink($fileNameWithPath);
	    }
	}
}

if ( ! function_exists('sendMailAdmin')) { //die("SAURABH");
  function sendMailAdmin($to, $subject, $text, $from_mail = "", $from_name = "") {
      date_default_timezone_set('America/New_York');

     if (ISSMTP == 1) {
    $CI = & get_instance();
    $CI->load->library('email');

    $config['protocol'] = SMTP_PROTOCOL;
    $config['smtp_host'] = SMTP_HOST;
    $config['smtp_port'] = SMTP_PORT;

    $config['smtp_user'] = SMTP_USER;
    $config['smtp_pass'] = SMTP_PASS;

    $config['mailtype'] = MAIL_TYPE; // or text
    $config['newline'] = "\r\n";
    $config['validation'] = TRUE;
    
    $CI->email->initialize($config);

    if (empty($from_name)) {
        // $from_name = $from_name;
        //$from_name = $this->config->config["from_name"];
    }
    if (empty($from_mail)) {
        // $from_mail = $from_mail;
        //$from_mail = $this->config->config["from_email"];
    }

    // $this->email->from($from_mail, $from_name);
    $CI->email->from(SMTP_USER, SITE_NAME);
        // $CI->email->from('rewardthecurious@gmail.com', 'Reward The Curious Contest');
    $CI->email->to($to);
    $CI->email->subject($subject);
    $CI->email->message($text);

    if ($CI->email->send()) {
        // echo "TRUE";
        // die($CI->email->print_debugger());
        return true;
    } else {
        // echo "FALSE";
        // die($CI->email->print_debugger());
        return true;
    }
      }

  }
}

/* Here $date is time stamp formate. Example in php which you get the value of time() function */

if ( ! function_exists('changeDateFormat')) {
	function changeDateFormat($date) {
		if($date) {
			/*example: Nov 21, 2017*/
			return date("M j, Y", $date);
		}
	}
}

/* Here $date is time stamp formate. Example in php which you get the value of time() function */

if ( ! function_exists('changeDateFormatComplete')) {
	function changeDateFormatComplete($date) {
		if($date) {
			/*example: Nov 21, 2017*/
			return date("M j, Y h : i : s A", $date);
		}
	}
}

/* get Month name of array */

if ( ! function_exists('getMonthNameArray')) {
	function getMonthNameArray() {
		return array("January" => "January", "February" => "February", "March" => "March", "April" => "April", "May" => "May", "June" => "June", "July" => "July", "August" => "August", "September" => "September", "October" => "October", "November" => "November", "December" => "December");
	}
}

/* get Day of array */

if ( ! function_exists('getDayArray')) {
	function getDayArray() {
		return array("1" => "1", "2" => "2", "3" => "3", "4" => "4", "5" => "5", "6" => "6", "7" => "7", "8" => "8", "9" => "9", "10" => "10", "11" => "11", "12" => "12", "13" => "13", "14" => "14", "15" => "15", "16" => "16", "17" => "17", "18" => "18", "19" => "19", "20" => "20", "21" => "21", "22" => "22", "23" => "23", "24" => "24", "25" => "25", "26" => "26", "27" => "27", "28" => "28", "29" => "29", "30" => "30", "31" => "31");
	}
}

if ( ! function_exists('crypto_rand_secure')) {
  function crypto_rand_secure($min, $max)
  {
      $range = $max - $min;
      if ($range < 1) return $min; // not so random...
      $log = ceil(log($range, 2));
      $bytes = (int) ($log / 8) + 1; // length in bytes
      $bits = (int) $log + 1; // length in bits
      $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
      do {
          $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
          $rnd = $rnd & $filter; // discard irrelevant bits
      } while ($rnd > $range);
      return $min + $rnd;
  }
}


/* Function for get all category start */
if ( ! function_exists('getAllPackages')) {
  function getAllPackages() {
    $CI =& get_instance();  
    $CI->db->from('tbl_packages');
    $CI->db->where('is_deleted', "0");
    $CI->db->where('status', "1");
    //$CI->db->limit($limit,$start);
    $CI->db->order_by('package_name', 'ASC');
    $query = $CI->db->get();
    //echo $CI->db->last_query(); die;
    $count=$query->num_rows();
    if($count>0){
      return $query->result();
    } else {
      return array();
    }
  }
}
/* Function for get all category end */

/* Function for get all products start */
if ( ! function_exists('getAllServices')) {
  function getAllServices() {
    $CI =& get_instance();  
    $CI->db->from('tbl_services');
    $CI->db->where('is_deleted', "0");
    $CI->db->where('status', "1");
    //$CI->db->limit($limit,$start);
    $CI->db->order_by('service_name', 'ASC');
    $query = $CI->db->get();
    //echo $CI->db->last_query(); die;
    $count=$query->num_rows();
    if($count>0){
      return $query->result();
    } else {
      return array();
    }
  }
}
/* Function for get all products end */


/* Function for get all banners start */
if ( ! function_exists('getAllBanners')) {
  function getAllBanners() {
    $CI =& get_instance();  
    $CI->db->from('tbl_banners');
    $CI->db->where('is_deleted', "0");
    $CI->db->where('status', "1");
    $query = $CI->db->get();
    //echo $CI->db->last_query(); die;
    $count=$query->num_rows();
    if($count>0){
      return $query->result();
    } else {
      return array();
    }
  }
}
/* Function for get all banners end */



/* Function for get brand name start */
if ( ! function_exists('getPackageName')) {
    function getPackageName($id=""){
        $CI =& get_instance();
        $CI->db->select('package_name');
        $CI->db->where('id',$id);
        $query=$CI->db->get('tbl_packages');
        if($query->num_rows()>0) {
          $results = $query->row();                
          return $results->package_name;
        } else { 
          return '';
        }      
    }
}
/* Function for get brand name end */


/* Function for get product name start */
if ( ! function_exists('getServiceName')) {
    function getServiceName($id=""){
        $CI =& get_instance();
        $CI->db->select('service_name');
        $CI->db->where('id',$id);
        $query=$CI->db->get('tbl_services');
        if($query->num_rows()>0) {
          $results = $query->row();                
          return $results->service_name;
        } else { 
          return '';
        }      
    }
}
/* Function for get product name end */




if ( ! function_exists('getAdminUserName')) {
    function getAdminUserName($id=""){
        $CI =& get_instance();
        $CI->db->select('full_name');
        $CI->db->where('id',$id);
        $query=$CI->db->get('tbl_admin');
        if($query->num_rows()>0) {
          $results = $query->row();                
          return $results->full_name;
        } else { 
          return 'Guest';
        }      
    }
}

/* Function for get package id by slug name start */
if ( ! function_exists('getPackageId')) {
    function getPackageId($slug){
        $CI =& get_instance();
        $CI->db->select('id');
        $CI->db->where('package_slug',$slug);
        $query=$CI->db->get('tbl_packages');
        if($query->num_rows()>0) {
          $results = $query->row();                
          return $results->id;
        }     
    }
}
/* Function for get package id by slug name end */

/* Function for get all packages start */
if ( ! function_exists('getAllPackages')) {
  function getAllPackages() {
    $CI =& get_instance();  
    $CI->db->from('tbl_packages');
    $CI->db->where('is_deleted', "0");
    $CI->db->where('status', "1");
    $CI->db->where('category_type', "2");
    $query = $CI->db->get();
    //echo $CI->db->last_query(); die;
    $count=$query->num_rows();
    if($count>0){
      return $query->result();
    } else {
      return array();
    }
  }
}
/* Function for get all packages end */


/* Function for get all packages start */
if ( ! function_exists('getPackageServices')) {
  function getPackageServices($id) {
    $CI =& get_instance();  
    $CI->db->select('*');
    $CI->db->from('tbl_services');
    $CI->db->where('package_id', $id);
    $CI->db->where('is_deleted', "0");
    $CI->db->where('status', "1");
    $CI->db->order_by('service_name', "ASC");
    $query = $CI->db->get();
    //echo $CI->db->last_query(); die;
    $count=$query->num_rows();
    if($count>0){
      return $query->result_array();
    } else {
      return array();
    }
  }
}
/* Function for get all packages end */



/* Function for get page meta data start */
function getPackageMetaData($pageSlug=""){
  $CI =& get_instance();  
  $data = array();
    $CI->db->select("meta_heading, meta_title, meta_description, og_description, meta_keywords, h1_tag, h2_tag, h3_tag, image_alt_1, image_alt_2, image_alt_3, image_alt_4, image_alt_5, robots, revisit_after, og_local, og_type, og_image, og_tag, og_title, og_url, og_site_name, canonical, geo_region, geo_place_name, geo_position, icbm, author, page_url");
    $CI->db->from("tbl_packages");
    $CI->db->where(array("tbl_packages.package_slug" => $pageSlug, "tbl_packages.is_deleted" => 0, "tbl_packages.status" => 1));
    $query = $CI->db->get();
    // echo $CI->db->last_query(); die;
    if($query->num_rows() > 0 ) {
        return  $query->row_array();
    } else {
        return $data;
    }
}
/* Function for get page meta data start */

/* Function for get page meta data start */
function getSeoPageMetaData($pageSlug=""){
  // $keyword_name = str_replace("-", " ", $pageSlug);
  $CI =& get_instance();  
  $data = array();
    $CI->db->select("*");
    $CI->db->from("tbl_keywords");
    $CI->db->where(array("tbl_keywords.page_slug" => $pageSlug, "tbl_keywords.is_deleted" => 0, "tbl_keywords.status" => 1));
    $query = $CI->db->get();
    // echo $CI->db->last_query(); die;
    if($query->num_rows() > 0 ) {
        return  $query->row_array();
    } else {
        return $data;
    }
}
/* Function for get page meta data start */


/* Function for get page meta data start */
function getKeywordMetaData($pageSlug=""){
  $CI =& get_instance();  
  $data = array();
    $CI->db->select("meta_heading, meta_title, meta_description, og_description, meta_keywords, h1_tag, h2_tag, h3_tag, image_alt_1, image_alt_2, image_alt_3, image_alt_4, image_alt_5, robots, revisit_after, og_local, og_type, og_image, og_tag, og_title, og_url, og_site_name, canonical, geo_region, geo_place_name, geo_position, icbm, author, page_url");
    $CI->db->from("tbl_keywords");
    $CI->db->where(array("tbl_keywords.keyword_slug" => $pageSlug, "tbl_keywords.is_deleted" => 0, "tbl_keywords.status" => 1));
    $query = $CI->db->get();
    // echo $CI->db->last_query(); die;
    if($query->num_rows() > 0 ) {
        return  $query->row_array();
    } else {
        return $data;
    }
}
/* Function for get page meta data start */


/* Function for get page meta data start */
function getServiceMetaData($pageSlug=""){
  $CI =& get_instance();  
  $data = array();
    $CI->db->select("meta_heading, meta_title, meta_description, og_description, meta_keywords, h1_tag, h2_tag, h3_tag, image_alt_1, image_alt_2, image_alt_3, image_alt_4, image_alt_5, robots, revisit_after, og_local, og_type, og_image, og_tag, og_title, og_url, og_site_name, canonical, geo_region, geo_place_name, geo_position, icbm, author, page_url");
    $CI->db->from("tbl_services");
    $CI->db->where(array("tbl_services.sub_menu_slug" => $pageSlug, "tbl_services.is_deleted" => 0, "tbl_services.status" => 1));
    $query = $CI->db->get();

    if($query->num_rows() > 0 ) {
        return  $query->row_array();
    } else {
        return $data;
    }
}
/* Function for get page meta data start */

function fn_resize($image_resource_id,$width,$height,$target_width,$target_height) {
// $target_width =200;
// $target_height =200;
$target_layer=imagecreatetruecolor($target_width,$target_height);
imagecopyresampled($target_layer,$image_resource_id,0,0,0,0,$target_width,$target_height, $width,$height);
return $target_layer;
}


/* Function for get package id by service slug start */
if ( ! function_exists('getPackageIdByServiceSlug')) {
    function getPackageIdByServiceSlug($id=""){
        $CI =& get_instance();
        $CI->db->select('package_id');
        $CI->db->where('sub_menu_slug',$id);
        $query=$CI->db->get('tbl_services');
        if($query->num_rows()>0) {
          $results = $query->row();                
          return $results->package_id;
        } else { 
          return '';
        }      
    }
}
/* Function for get package id by service slug end */


/* Get All Active Keywords Start */

if ( ! function_exists('getAllActiveKeywords')) {
    function getAllActiveKeywords(){
        $CI =& get_instance();
        $CI->db->select("*");
        $CI->db->where(array("tbl_keywords.is_deleted" => '0', "tbl_keywords.status" => '1'));
        $CI->db->order_by("tbl_keywords.id", "DESC");
        $query=$CI->db->get('tbl_keywords');
        if($query->num_rows()>0) {
          $results = $query->row();                
          return  $query->result_array();
        } else { 
          return array();
        }      
    }
}
/* Get All Active Keywords Start */   

/* Get All Active Keywords Start */

if ( ! function_exists('getAllSeoKeywords')) {
    function getAllSeoKeywords(){
        $CI =& get_instance();
        $CI->db->select("*");
        $CI->db->where(array("tbl_keywords.is_deleted" => '0', "tbl_keywords.status" => '1'));
        $CI->db->order_by("tbl_keywords.id", "DESC");
        $query=$CI->db->get('tbl_keywords');
        if($query->num_rows()>0) {
          $results = $query->row();                
          return  $query->result_array();
        } else { 
          return array();
        }      
    }
}
/* Get All Active Keywords Start */  
