<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author       :Mohit sharma
 * Company      :Scource Soft
 * website      :http://www.sourcesoftsolutions.com/
 * date         :17-may-2017.
 * Controller   :Giver 	 
 */

class Keyword extends CI_Controller{

	function __construct() {
		parent::__construct();
		$this->table = 'tbl_keywords';        
		$this->load->model('Keyword_model');
		$this->load->model('Home_model');
		$this->controller = $this->router->fetch_class();
	}





	/* Get all list of circle */
	public function index() {
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$data['controller'] = $this->controller;

		$data['allkeywords'] = $this->Keyword_model->allKeywords();
		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('keyword/index', $data);
		$this->load->view('template/admin_footer');
	}

	

	/* Open edit workout type form by workout type ID */
	public function edit($id){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$data['details'] = $this->Keyword_model->keywordDetails($id);
		$data['controller'] = $this->controller;

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('keyword/edit', $data);
		$this->load->view('template/admin_footer');
	}



	/* Update workout type form data by workout type ID */
	public function update_keyword(){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		$data['controller'] = $this->controller;
		$keyword_id = $this->input->post('keyword_id');
		$data['details'] = $this->Keyword_model->keywordDetails($keyword_id);

		$this->form_validation->set_error_delimiters('<p class="help-block" style="color:red;">', '</p>');
		// $this->form_validation->set_rules('category_type', 'Category Type', "trim|required");
		$this->form_validation->set_rules('keyword_name', 'Keyword Name', "trim|required");
		$this->form_validation->set_rules('description', 'Description', "trim|required");
		$this->form_validation->set_rules('status', 'Status', 'trim|required|integer');
		$oldImage = $this->input->post('image_file_name');	
		
		if($this->form_validation->run() == FALSE ){ 
			$data['controller'] = $this->controller;
			$data['details'] = $this->Keyword_model->keywordDetails($keyword_id);

			$this->load->view('template/admin_header');
			$this->load->view('template/admin_left');
			$this->load->view('keyword/edit', $data);
			$this->load->view('template/admin_footer');
		} else {
			$meta_title = $this->input->post('meta_title');
			$meta_description = $this->input->post('meta_description');
			$meta_keywords = $this->input->post('meta_keywords');
			$h1_tag = $this->input->post('h1_tag');
			$h2_tag = $this->input->post('h2_tag');
			$h3_tag = $this->input->post('h3_tag');
			$image_alt_1 = $this->input->post('image_alt_1');
			$image_alt_2 = $this->input->post('image_alt_2');
			$image_alt_3 = $this->input->post('image_alt_3');
			$image_alt_4 = $this->input->post('image_alt_4');
			$image_alt_5 = $this->input->post('image_alt_5');
			$robots = $this->input->post('robots');
			$revisit_after = $this->input->post('revisit_after');
			$og_local = $this->input->post('og_local');
			$og_type = $this->input->post('og_type');
			$og_image = $this->input->post('og_image');
			$og_tag = $this->input->post('og_tag');
			$og_title = $this->input->post('og_title');
			$og_url = $this->input->post('og_url');
			$og_description = $this->input->post('og_description');
			$og_site_name = $this->input->post('og_site_name');
			$author = $this->input->post('author');
			$canonical = $this->input->post('canonical');
			$geo_region = $this->input->post('geo_region');
			$geo_place_name = $this->input->post('geo_place_name');
			$geo_position = $this->input->post('geo_position');
			$icbm = $this->input->post('icbm');

			$subject = $this->input->post('subject');
			$owner = $this->input->post('owner');
			$coverage = $this->input->post('coverage');
			$language = $this->input->post('language');
			$distribution = $this->input->post('distribution');
			$country = $this->input->post('country');
			$geography = $this->input->post('geography');
			$cache_control = $this->input->post('cache_control');
			$instagram = $this->input->post('instagram');
			$twitter_description = $this->input->post('twitter_description');
			$facebook = $this->input->post('facebook');
			$twitter_site = $this->input->post('twitter_site');
			$youtube = $this->input->post('youtube');
			
			$data = array(
				'keyword_name' => $this->input->post('keyword_name'),
				'page_title' => $this->input->post('page_title'),
				'page_slug' => $this->input->post('page_slug'),
				'keyword_slug' => $this->input->post('keyword_slug'),
				'description' => $this->input->post('description'),
				'meta_title' => $meta_title,
				'meta_description' => $meta_description,
				'meta_keywords' => $meta_keywords,
				'h1_tag' => $h1_tag,
				'h2_tag' => $h2_tag,
				'h3_tag' => $h3_tag,
				'image_alt_1' => $image_alt_1,
				'image_alt_2' => $image_alt_2,
				'image_alt_3' => $image_alt_3,
				'image_alt_4' => $image_alt_4,
				'image_alt_5' => $image_alt_5,
				'robots' => $robots,
				'revisit_after' => $revisit_after,
				'og_local' => $og_local,
				'og_type' => $og_type,
				'og_image' => $og_image,
				'og_tag' => $og_tag,
				'og_title' => $og_title,
				'og_url' => $og_url,
				'og_description' => $og_description,
				'og_site_name' => $og_site_name,
				'author' => $author,
				'canonical' => $canonical,
				'geo_region' => $geo_region,
				'geo_place_name' => $geo_place_name,
				'geo_position' => $geo_position,
				'icbm' => $icbm,
				'subject' => $subject,
				'owner' => $owner,
				'coverage' => $coverage,
				'language' => $language,
				'distribution' => $distribution,
				'country' => $country,
				'geography' => $geography,
				'cache_control' => $cache_control,
				'instagram' => $instagram,
				'twitter_description' => $twitter_description,
				'facebook' => $facebook,
				'twitter_site' => $twitter_site,
				'youtube' => $youtube,
				'status' => $this->input->post('status'),
				// 'updatedOn' => $current_time,
			);

			$uploads_dir = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/keywords/";
			$image = $_FILES['banner_image_file'];
			if (!empty($image['name']) && $image['error'] <= 0) {
				// Get Image Dimension
			    $fileinfo = @getimagesize($image["tmp_name"]);
			    $width = $fileinfo[0];
			    $height = $fileinfo[1];

				$tmp_name    = $image["tmp_name"];
				$imgName     = pathinfo($image['name']);
				$ext         = strtolower($imgName['extension']);
				$newImgName  = substr(preg_replace('/[^a-zA-Z0-9\._]/', '_',$image['name']), 0, 50);
				$newImgName  = $newImgName . time() . "." . $ext;
				
				if (move_uploaded_file($tmp_name, $uploads_dir . '/' . $newImgName)) {
					$data['banner_image'] = $newImgName;
				}

				$filename = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/keywords/".$oldImage;
				if (file_exists($filename)) {
				    unlink($filename);
				}
			}

			$image = $_FILES['image_file'];
			if (!empty($image['name']) && $image['error'] <= 0) {
				// Get Image Dimension
			    $fileinfo = @getimagesize($image["tmp_name"]);
			    $width = $fileinfo[0];
			    $height = $fileinfo[1];

				$tmp_name    = $image["tmp_name"];
				$imgName     = pathinfo($image['name']);
				$ext         = strtolower($imgName['extension']);
				$newImgName  = substr(preg_replace('/[^a-zA-Z0-9\._]/', '_',$image['name']), 0, 50);
				$newImgName  = $newImgName . time() . "." . $ext;
				
				if (move_uploaded_file($tmp_name, $uploads_dir . '/' . $newImgName)) {
					$data['image'] = $newImgName;
				}

				$filename = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/keywords/".$oldImage;
				if (file_exists($filename)) {
				    unlink($filename);
				}
			}


			//  $uploads_dir = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/packages/";
			// $image = $_FILES['banner_image_file'];

			// if(!empty($image['name']) && $image['error'] <= 0){
			// 	$tmp_name    = $image["tmp_name"];

			// 	$imgName     = pathinfo($image['name']);
			// 	$ext         = strtolower($imgName['extension']);
			// 	$newImgName  = substr(preg_replace('/[^a-zA-Z0-9\._]/', '_',$image['name']), 0, 50);
			// 	$newImgName  = $newImgName . time() . "." . $ext;
			// 	$uploadPath = $uploads_dir . '/' . $newImgName;
				
			// 	if (move_uploaded_file($tmp_name, $uploadPath)) {
			// 		$newFile = $uploads_dir .'/'. $newImgName;

			// 		$source_properties = getimagesize($uploadPath);
			// 		$image_type = $source_properties[2];

			// 		if( $image_type == IMAGETYPE_JPEG ) {
			// 			$uploadPath = imagecreatefromjpeg($uploadPath); 
			// 			$uploadPath = fn_resize($uploadPath,$source_properties[0],$source_properties[1],1350,530);
			// 			$newImageName = imagejpeg($uploadPath, $newFile);
			// 		} else if( $image_type == IMAGETYPE_GIF )  {  
			// 			$uploadPath = imagecreatefromgif($uploadPath); 
			// 			$uploadPath = fn_resize($uploadPath,$source_properties[0],$source_properties[1],1350,530);
			// 			$newImageName = imagegif($uploadPath, $newFile);
			// 		} elseif( $image_type == IMAGETYPE_PNG )  {  
			// 			$uploadPath = imagecreatefrompng($uploadPath); 
			// 			$uploadPath = fn_resize($uploadPath,$source_properties[0],$source_properties[1],1350,530);
			// 			$newImageName = imagepng($uploadPath, $newFile);
			// 		}
			// 		$data['image'] = $newImgName;
			// 	}
			// 	$filename = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/services/".$oldImage;
			// 	if (file_exists($filename)) {
			// 	    unlink($filename);
			// 	}
			// } 

			if($this->db->update($this->table, $data, array('id' => $keyword_id))) {
				$this->session->set_flashdata('response', '<div class="alert alert-success">Keyword Updated Successfully</div>');
			} else {
				$this->session->set_flashdata('response', '<div class="alert alert-danger">Failed to updated keyword.</div>');
			}
			redirect($this->controller, 'refresh');
		}
	}

	/* Change Status data on click */
	public function changestatus() {
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		$statusid = $this->input->post('statusid');
		$controllername = $this->input->post('controllername');
//	$displayid = $this->input->post('displayid');

		if($this->input->post('statusvalue')) {
			$statusVal = '0';
			$statusRow = '<span statusid='.$statusid.' statusvalue='.$statusVal.' controllername='.$controllername.' style="color: #ff0000; cursor: pointer;"  title="In Active"><i class="fa fa-2x fa-ban" aria-hidden="true"></i></span>';
		} else {
			$statusVal = '1';
			$statusRow = '<span statusid='.$statusid.' statusvalue='.$statusVal.' controllername='.$controllername.'  style="color: #00a65a; cursor: pointer;" title="Active"><i class="fa fa-2x fa-check" aria-hidden="true"></i></span>';
		}

		$changes = $this->Keyword_model->changeStatus($statusid, $statusVal);
		if($changes) {
			echo $statusRow;
		} else {
			echo 'Server problem';
		}
	}


	public function upload_csv(){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$data['controller'] = $this->controller;
		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('keyword/upload_csv', $data);
		$this->load->view('template/admin_footer');
	}


    public function import_csv() {
        $this->load->library('Csvimport');
        //Check file is uploaded in tmp folder
        if (is_uploaded_file($_FILES['image_file']['tmp_name'])) {
            //validate whether uploaded file is a csv file
            $csvMimes = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
            $mime = get_mime_by_extension($_FILES['image_file']['name']);

            $fileArr = explode('.', $_FILES['image_file']['name']);
            $ext = end($fileArr);

            if (($ext == 'csv') && in_array($mime, $csvMimes)) {
                $file = $_FILES['image_file']['tmp_name'];
                $csvData = $this->csvimport->get_array($file);
                // echo "<pre>"; print_r($csvData); die;
                /*$headerArr = array("keyword_name", "Location", "website_link", "page_title", "page_slug", "meta_heading", "meta_title", "meta_description", "og_description", "meta_keywords", "h1_tag", "h2_tag", "h3_tag", "image_alt_1", "image_alt_2", "image_alt_3", "robots", "revisit_after", "og_local", "og_type", "og_image", "og_tag", "og_title", "og_url", "og_site_name", "canonical", "geo_region", "geo_place_name", "geo_position", "icbm", "author", "page_url");*/
                if (!empty($csvData)) {
                    //Validate CSV headers
                    $csvHeaders = array_keys($csvData[0]);
                    // echo "<pre>"; print_r($csvHeaders);
                    /*$headerMatched = 1;
                    foreach ($headerArr as $header) {
                        if (!in_array(trim($header), $csvHeaders)) {
                            $headerMatched = 0;
                        }
                    }*/
                    // echo "<pre>"; print_r($headerMatched); die;
                    /*if ($headerMatched == 0) {
                        $this->session->set_flashdata("error_msg", "CSV headers are not matched.");
                        redirect($this->controller, 'refresh');
                    } else {*/
                        foreach ($csvData as $row) {
                            $keywords_data = array(
                                "keyword_name" => $row['keyword_name'],
                                "location" => $row['Location'],
                                "website_link" => $row['website_link'],
                                "page_title" => $row['page_title'],
                                "page_slug" => $row['page_slug'],
                                "keyword_slug" => $row['page_slug'],
                                "meta_heading" => $row['meta_heading'],
                                "meta_title" => $row['meta_title'],
                                "meta_description" => $row['meta_description'],
                                "og_description" => $row['og_description'],
                            	"meta_keywords" => $row['meta_keywords'],
                                "h1_tag" => $row['h1_tag'],
                                "h1_tag_answer" => $row['h1_tag_answer'],
                                "h2_tag" => $row['h2_tag'],
                                "h2_tag_answer" => $row['h2_tag_answer'],
                                "h3_tag" => $row['h3_tag'],
                                "h3_tag_answer" => $row['h3_tag_answer'],
                                "image_alt_1" => $row['image_alt_1'],
                            	"image_alt_2" => $row['image_alt_2'],
                                "image_alt_3" => $row['image_alt_3'],
                                "robots" => $row['robots'],
                                "revisit_after" => $row['revisit_after'],
                                "og_local" => $row['og_local'],
                            	"og_type" => $row['og_type'],
                                "og_image" => $row['og_image'],
                                "og_tag" => $row['og_tag'],
                                "og_title" => $row['og_title'],
                                "og_url" => $row['og_url'],
                                "og_site_name" => $row['og_site_name'],
                                "canonical" => $row['canonical'],
                                "geo_region" => $row['geo_region'],
                            	"geo_place_name" => $row['geo_place_name'],
                                "geo_position" => $row['geo_position'],
                                "icbm" => $row['icbm'],
                            	"author" => $row['author'],
                                "page_url" => $row['page_url'],
                                "subject" => $row['subject'],
                                "owner" => $row['owner'],
                                "coverage" => $row['coverage'],
                                "language" => $row['language'],
                                "distribution" => $row['distribution'],
                                "country" => $row['country'],
                                "geography" => $row['geography'],
                                "cache_control" => $row['cache_control'],
                                "instagram" => $row['instagram'],
                            	"twitter_description" => $row['twitter_description'],
                                "facebook" => $row['facebook'],
                                "twitter_site" => $row['twitter_site'],
                            	"youtube" => $row['youtube'],
                                "description" => $row['description']);
                            $table_name = "tbl_keywords";
                            $this->db->insert($table_name, $keywords_data);
                        }
                        $this->session->set_flashdata("success_msg", "CSV File imported successfully.");
                        redirect($this->controller, 'refresh');
                    // }
                }
            } else {
                $this->session->set_flashdata("error_msg", "Please select CSV file only.");
                redirect($this->controller, 'refresh');
            }
        } else {
            $this->session->set_flashdata("error_msg", "Please select a CSV file to upload.");
            redirect($this->controller, 'refresh');
        }
    }




	/* Open add new workout type form */
	public function  addKeyword(){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		$data['controller'] = $this->controller;

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('keyword/add_keyword', $data);
		$this->load->view('template/admin_footer');
	}

	/* Add new workout type form data with validation */
	public function add_newkeyword(){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		$data['controller'] = $this->controller;
		$this->form_validation->set_error_delimiters('<p class="help-block" style="color:red;">', '</p>');
		// $this->form_validation->set_rules('category_type', 'Category Type', "trim|required");
		$this->form_validation->set_rules('keyword_name', 'Keyword Name', "trim|required");
		$this->form_validation->set_rules('description', 'Description', "trim|required");
		$this->form_validation->set_rules('status', 'Status', 'trim|required|integer');

		if($this->form_validation->run() == FALSE ){
			$data['controller'] = $this->controller;

			$this->load->view('template/admin_header');
			$this->load->view('template/admin_left');
			$this->load->view('keyword/add_package', $data);
			$this->load->view('template/admin_footer');
		} else {

			$meta_title = $this->input->post('meta_title');
			$meta_heading = $this->input->post('meta_heading');
			$meta_description = $this->input->post('meta_description');
			$meta_keywords = $this->input->post('meta_keywords');
			$h1_tag = $this->input->post('h1_tag');
			$h1_tag_answer = $this->input->post('h1_tag_answer');
			$h2_tag = $this->input->post('h2_tag');
			$h2_tag_answer = $this->input->post('h2_tag_answer');
			$h3_tag = $this->input->post('h3_tag');
			$h3_tag_answer = $this->input->post('h3_tag_answer');
			$image_alt_1 = $this->input->post('image_alt_1');
			$image_alt_2 = $this->input->post('image_alt_2');
			$image_alt_3 = $this->input->post('image_alt_3');
			$image_alt_4 = $this->input->post('image_alt_4');
			$image_alt_5 = $this->input->post('image_alt_5');
			$robots = $this->input->post('robots');
			$revisit_after = $this->input->post('revisit_after');
			$og_local = $this->input->post('og_local');
			$og_type = $this->input->post('og_type');
			$og_image = $this->input->post('og_image');
			$og_tag = $this->input->post('og_tag');
			$og_title = $this->input->post('og_title');
			$og_url = $this->input->post('og_url');
			$og_description = $this->input->post('og_description');
			$og_site_name = $this->input->post('og_site_name');
			$author = $this->input->post('author');
			$canonical = $this->input->post('canonical');
			$geo_region = $this->input->post('geo_region');
			$geo_place_name = $this->input->post('geo_place_name');
			$geo_position = $this->input->post('geo_position');
			$icbm = $this->input->post('icbm');


			$subject = $this->input->post('subject');
			$owner = $this->input->post('owner');
			$coverage = $this->input->post('coverage');
			$language = $this->input->post('language');
			$distribution = $this->input->post('distribution');
			$country = $this->input->post('country');
			$geography = $this->input->post('geography');
			$cache_control = $this->input->post('cache_control');
			$instagram = $this->input->post('instagram');
			$twitter_description = $this->input->post('twitter_description');
			$facebook = $this->input->post('facebook');
			$twitter_site = $this->input->post('twitter_site');
			$youtube = $this->input->post('youtube');


			$insert_data = array(
				'keyword_name' => $this->input->post('keyword_name'),
				'page_title' => $this->input->post('page_title'),
				'page_slug' => $this->input->post('page_slug'),
				'keyword_slug' => $this->input->post('keyword_slug'),
				'description' => $this->input->post('description'),
				'meta_title' => $meta_title,
				'meta_description' => $meta_description,
				'meta_keywords' => $meta_keywords,
				'h1_tag' => $h1_tag,
				'h2_tag' => $h2_tag,
				'h3_tag' => $h3_tag,
				'image_alt_1' => $image_alt_1,
				'image_alt_2' => $image_alt_2,
				'image_alt_3' => $image_alt_3,
				'image_alt_4' => $image_alt_4,
				'image_alt_5' => $image_alt_5,
				'robots' => $robots,
				'revisit_after' => $revisit_after,
				'og_local' => $og_local,
				'og_type' => $og_type,
				'og_image' => $og_image,
				'og_tag' => $og_tag,
				'og_title' => $og_title,
				'og_url' => $og_url,
				'og_description' => $og_description,
				'og_site_name' => $og_site_name,
				'author' => $author,
				'canonical' => $canonical,
				'geo_region' => $geo_region,
				'geo_place_name' => $geo_place_name,
				'geo_position' => $geo_position,
				'icbm' => $icbm,
				'subject' => $subject,
				'owner' => $owner,
				'coverage' => $coverage,
				'language' => $language,
				'distribution' => $distribution,
				'country' => $country,
				'geography' => $geography,
				'cache_control' => $cache_control,
				'instagram' => $instagram,
				'twitter_description' => $twitter_description,
				'facebook' => $facebook,
				'twitter_site' => $twitter_site,
				'youtube' => $youtube,
				'status' => $this->input->post('status'),
				'addedOn' => date("Y-m-d H:i:s"),
			);

			$uploads_dir = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/keywords/";
			$image = $_FILES['banner_image_file'];
			if (!empty($image['name']) && $image['error'] <= 0) {
				// Get Image Dimension
			    $fileinfo = @getimagesize($image["tmp_name"]);
			    $width = $fileinfo[0];
			    $height = $fileinfo[1];

				$tmp_name    = $image["tmp_name"];
				$imgName     = pathinfo($image['name']);
				$ext         = strtolower($imgName['extension']);
				$newImgName  = substr(preg_replace('/[^a-zA-Z0-9\._]/', '_',$image['name']), 0, 50);
				$newImgName  = $newImgName . time() . "." . $ext;
				
				if (move_uploaded_file($tmp_name, $uploads_dir . '/' . $newImgName)) {
					$insert_data['banner_image'] = $newImgName;
				}
			}

			$image = $_FILES['image_file'];
			if (!empty($image['name']) && $image['error'] <= 0) {
				// Get Image Dimension
			    $fileinfo = @getimagesize($image["tmp_name"]);
			    $width = $fileinfo[0];
			    $height = $fileinfo[1];

				$tmp_name    = $image["tmp_name"];
				$imgName     = pathinfo($image['name']);
				$ext         = strtolower($imgName['extension']);
				$newImgName  = substr(preg_replace('/[^a-zA-Z0-9\._]/', '_',$image['name']), 0, 50);
				$newImgName  = $newImgName . time() . "." . $ext;
				
				if (move_uploaded_file($tmp_name, $uploads_dir . '/' . $newImgName)) {
					$insert_data['image'] = $newImgName;
				}
			}

			//echo '<pre>'; print_r($insert_data); die;
			/*$uploads_dir = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/packages/";
			$image = $_FILES['banner_image_file'];
			if(!empty($image['name']) && $image['error'] <= 0){
				$tmp_name    = $image["tmp_name"];
				$imgName     = pathinfo($image['name']);
				$ext         = strtolower($imgName['extension']);
				$newImgName  = substr(preg_replace('/[^a-zA-Z0-9\._]/', '_',$image['name']), 0, 50);
				$newImgName  = $newImgName . time() . "." . $ext;
				$uploadPath = $uploads_dir . '/' . $newImgName;
				
				if (move_uploaded_file($tmp_name, $uploadPath)) {
					$newFile = $uploads_dir .'/'. $newImgName;

					$source_properties = getimagesize($uploadPath);
					$image_type = $source_properties[2];

					if( $image_type == IMAGETYPE_JPEG ) {
						$uploadPath = imagecreatefromjpeg($uploadPath); 
						$uploadPath = fn_resize($uploadPath,$source_properties[0],$source_properties[1],1350,530);
						$newImageName = imagejpeg($uploadPath, $newFile);
					} else if( $image_type == IMAGETYPE_GIF )  {  
						$uploadPath = imagecreatefromgif($uploadPath); 
						$uploadPath = fn_resize($uploadPath,$source_properties[0],$source_properties[1],1350,530);
						$newImageName = imagegif($uploadPath, $newFile);
					} elseif( $image_type == IMAGETYPE_PNG )  {  
						$uploadPath = imagecreatefrompng($uploadPath); 
						$uploadPath = fn_resize($uploadPath,$source_properties[0],$source_properties[1],1350,530);
						$newImageName = imagepng($uploadPath, $newFile);
					}
					$insert_data['image'] = $newImgName;
				}
			}*/
			if($this->db->insert($this->table, $insert_data)){
				$this->session->set_flashdata('response', '<div class="alert alert-success">Keyword Added Successfully</div>');
			} else {
				$this->session->set_flashdata('response', '<div class="alert alert-danger">Failed to Add New Keyword.</div>');
			}
			redirect($this->controller, 'refresh');
		}
	}

	/* Delete data on click */
	public function delete($id) {
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$deleted = $this->Keyword_model->deleteRecord($id);
		if($deleted) {
			redirect($this->controller, 'refresh');
		} else {
			redirect($this->controller, 'refresh');
		}
	}





	/* Function for get keyword list start */
	public function keywordList() {
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$data['controller'] = $this->controller;
		$data['allPackages'] = $this->Home_model->getAllPackages();
		$data['footerContent'] = $this->Home_model->getPageData('footer_content');
		$data['aboutCompany'] = $this->Home_model->getPageData('about-company');
		// $data['keywordList'] = $this->Keyword_model->allKeywordList();
		$this->load->view('template/front/inner-header', $data);
		$this->load->view('keyword/keyword_list', $data);
		$this->load->view('template/front/footer', $data);
	}
	/* Function for get keyword list end */

	/* Function for get keyword list start */
	public function keywordDetails($slug) {
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$data['controller'] = $this->controller;
		$data['allPackages'] = $this->Home_model->getAllPackages();
		$data['footerContent'] = $this->Home_model->getPageData('footer_content');
		$data['aboutCompany'] = $this->Home_model->getPageData('about-company');
		$data['keywordDetails'] = $this->Keyword_model->getKeywordListDetails($slug);
		$this->load->view('template/front/inner-header', $data);
		$this->load->view('keyword/keyword_details', $data);
		$this->load->view('template/front/footer', $data);
	}
	/* Function for get keyword list end */



/* Front-End Section End */





}
