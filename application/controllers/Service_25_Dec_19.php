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

class Service extends CI_Controller{

	function __construct() {
		parent::__construct();
		$this->table = 'tbl_services';        
		$this->load->model('Service_model');
		$this->load->model('Package_model');
		$this->load->model('Home_model');
		$this->controller = $this->router->fetch_class();
		$this->load->library("pagination");
	}

	/* Get all list of user interest */
	public function index() {
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$data['controller'] = $this->controller;

		$data['allservice'] = $this->Service_model->allmaleservice();
		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('service/index', $data);
		$this->load->view('template/admin_footer');
	}


	public function female_service() {
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$data['controller'] = $this->controller;

		$data['allservice'] = $this->Service_model->allfemaleservice();
		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('service/female_service', $data);
		$this->load->view('template/admin_footer');
	}


	public function gallerylist($id) {
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$data['controller'] = $this->controller;

		$data['service_id'] = $id;
		$data['allservicegallery'] = $this->Service_model->allServiceGallery($id);
		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('service/gallery_list', $data);
		$this->load->view('template/admin_footer');
	}

	/* Get workout details by workout type ID */
	public function details($id) {
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$data['controller'] = $this->controller;
		$data['details'] = $this->Service_model->serviceDetails($id);
		if(count($data['details']) > 0 ){
			$data['service_added'] = changeDateFormat($data['details']['addedOn']);
			$data['service_updated'] = changeDateFormat($data['details']['updatedOn']);
		}	

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('service/details', $data);
		$this->load->view('template/admin_footer');
	}

	/* Open edit workout type form by workout type ID */
	public function  edit($id){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		// $data['categoryDataArr'] = getAllCategory();
		$data['packageDataArr'] = getAllPackages();
		$data['details'] = $this->Service_model->serviceDetails($id);
		$data['controller'] = $this->controller;

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('service/edit', $data);
		$this->load->view('template/admin_footer');
	}


	public function  edit_gallery($id){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		$data['details'] = $this->Service_model->serviceGalleryDetails($id);
		$data['controller'] = $this->controller;

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('service/edit_gallery', $data);
		$this->load->view('template/admin_footer');
	}

	/* Update workout type form data by workout type ID */
	public function update_service(){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		$data['controller'] = $this->controller;
		$service_id = $this->input->post('service_id');
		$data['details'] = $this->Service_model->serviceDetails($service_id);

		$this->form_validation->set_error_delimiters('<p class="help-block" style="color:red;">', '</p>');
		// $this->form_validation->set_rules('category_type', 'Category Type', "trim|required");
		$this->form_validation->set_rules('package_id', 'Package Name', 'trim|required');
		$this->form_validation->set_rules('service_name', 'Service Name', 'trim|required|callback_name_check');
		$this->form_validation->set_rules('offer_price', 'Offer Price', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required|integer');			
		$oldImage = $this->input->post('image_file_name');
		$banneroldImage = $this->input->post('banner_image_file_name');
		// $cType = $this->input->post('category_type');
		$cType = 2;
		if($this->form_validation->run() == FALSE ){ 
			$data['controller'] = $this->controller;
			$data['details'] = $this->Service_model->serviceDetails($service_id);

			$this->load->view('template/admin_header');
			$this->load->view('template/admin_left');
			$this->load->view('service/edit', $data);
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
			$data = array(
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
				'category_type' => $cType,
				'package_id' => $this->input->post('package_id'),
				'service_name' => $this->input->post('service_name'),
				'price' => $this->input->post('price'),
				'offer_price' => $this->input->post('offer_price'),
				'page_title' => $this->input->post('page_title'),
				'page_slug' => $this->input->post('page_slug'),
				'sub_menu_slug' => $this->input->post('sub_menu_slug'),
				'description' => $this->input->post('description'),
				'long_description' => $this->input->post('long_description'),
				'status' => $this->input->post('status'),
				'updatedOn' => date("Y-m-d h:i:s"),
			);

			$uploads_dir = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/services/";
			$image = $_FILES['image_file'];
			$banner_image = $_FILES['banner_image_file'];

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
						$uploadPath = fn_resize($uploadPath,$source_properties[0],$source_properties[1],280,280);
						$newImageName = imagejpeg($uploadPath, $newFile);
					} else if( $image_type == IMAGETYPE_GIF )  {  
						$uploadPath = imagecreatefromgif($uploadPath); 
						$uploadPath = fn_resize($uploadPath,$source_properties[0],$source_properties[1],280,280);
						$newImageName = imagegif($uploadPath, $newFile);
					} elseif( $image_type == IMAGETYPE_PNG )  {  
						$uploadPath = imagecreatefrompng($uploadPath); 
						$uploadPath = fn_resize($uploadPath,$source_properties[0],$source_properties[1],280,280);
						$newImageName = imagepng($uploadPath, $newFile);
					}
					$data['image'] = $newImgName;
				}

				$filename = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/services/".$oldImage;
				if (file_exists($filename)) {
				    unlink($filename);
				}
			}


			if(!empty($banner_image['name']) && $banner_image['error'] <= 0){
				$tmp_name    = $banner_image["tmp_name"];

				$imgName     = pathinfo($banner_image['name']);
				$ext         = strtolower($imgName['extension']);
				$newImgName  = substr(preg_replace('/[^a-zA-Z0-9\._]/', '_',$banner_image['name']), 0, 50);
				$newImgName  = $newImgName . time() . "." . $ext;
				$uploadPath = $uploads_dir . '/' . $newImgName;
				
				if (move_uploaded_file($tmp_name, $uploadPath)) {
					$newFile = $uploads_dir .'/'. $newImgName;

					$source_properties = getimagesize($uploadPath);
					$image_type = $source_properties[2];

					if( $image_type == IMAGETYPE_JPEG ) {
						$uploadPath = imagecreatefromjpeg($uploadPath); 
						$uploadPath = fn_resize($uploadPath,$source_properties[0],$source_properties[1],1350,490);
						$newImageName = imagejpeg($uploadPath, $newFile);
					} else if( $image_type == IMAGETYPE_GIF )  {  
						$uploadPath = imagecreatefromgif($uploadPath); 
						$uploadPath = fn_resize($uploadPath,$source_properties[0],$source_properties[1],1350,490);
						$newImageName = imagegif($uploadPath, $newFile);
					} elseif( $image_type == IMAGETYPE_PNG )  {  
						$uploadPath = imagecreatefrompng($uploadPath); 
						$uploadPath = fn_resize($uploadPath,$source_properties[0],$source_properties[1],1350,490);
						$newImageName = imagepng($uploadPath, $newFile);
					}
					$data['service_banner_image'] = $newImgName;
				}

				$filename = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/services/".$oldImage;
				if (file_exists($filename)) {
				    unlink($filename);
				}
			}

			if($this->db->update($this->table, $data, array('id' => $service_id))) {
				$this->session->set_flashdata('response', '<div class="alert alert-success">Service Updated Successfully</div>');
			} else {
				$this->session->set_flashdata('response', '<div class="alert alert-danger">Failed to updated service.</div>');
			}    
			if($cType == 1){
				redirect($this->controller, 'refresh');
			} else {
				redirect($this->controller.'/female_service', 'refresh');
			}
		}
	}


	public function update_gallery(){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		$data['controller'] = $this->controller;
		$service_id = $this->input->post('service_id');
		$gallery_id = $this->input->post('gallery_id');
		$data['details'] = $this->Service_model->serviceGalleryDetails($gallery_id);

		$this->form_validation->set_error_delimiters('<p class="help-block" style="color:red;">', '</p>');
		
		$this->form_validation->set_rules('status', 'Status', 'trim|required|integer');			
		$oldImage = $this->input->post('image_file_name');
		if($this->form_validation->run() == FALSE ){ 
			$data['controller'] = $this->controller;
			$data['details'] = $this->Service_model->serviceGalleryDetails($gallery_id);

			$this->load->view('template/admin_header');
			$this->load->view('template/admin_left');
			$this->load->view('service/edit_gallery', $data);
			$this->load->view('template/admin_footer');
		} else {
			$data = array(
				'status' => $this->input->post('status'),
			);

			//echo '<pre>'; print_r($_FILES); die;
			 $uploads_dir = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/services/";
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

				$filename = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/services/".$oldImage;
				if (file_exists($filename)) {
				    unlink($filename);
				}

				if ($width == "1000" && $height == "1020") {
					if($this->db->update("tbl_gallery", $data, array('id' => $gallery_id))) {
						$this->session->set_flashdata('response', '<div class="alert alert-success">Galley Image Updated Successfully</div>');
					} else {
						$this->session->set_flashdata('response', '<div class="alert alert-danger">Failed to updated gallery image.</div>');
					}    
					redirect('service/gallerylist/'.$service_id, 'refresh');
				} else {
					$this->session->set_flashdata('response', '<div class="alert alert-danger">Image dimension should be within 1020X1000.</div>');
			        $this->load->view('template/admin_header');
					$this->load->view('template/admin_left');
					$this->load->view('service/edit_gallery', $data);
					$this->load->view('template/admin_footer');
				}
			} else {
				if($this->db->update("tbl_gallery", $data, array('id' => $gallery_id))) {
					$this->session->set_flashdata('response', '<div class="alert alert-success">Galley Image Updated Successfully</div>');
				} else {
					$this->session->set_flashdata('response', '<div class="alert alert-danger">Failed to updated gallery image.</div>');
				}    
				redirect('service/gallerylist/'.$service_id, 'refresh');
			}
		}
	}



	public function name_check($name){
		$serviceId = $this->input->post('service_id');

		$this->db->where_not_in('id', $serviceId);
		$this->db->where('service_name',$name);
		if($this->db->count_all_results($this->table) > 0){
			$this->form_validation->set_message('name_check', 'The name can not be same');
			return false;
		}else{
			return true;
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
			$statusVal = 0;
			$statusRow = '<span statusid='.$statusid.' statusvalue='.$statusVal.' controllername='.$controllername.' style="color: #ff0000; cursor: pointer;"  title="In Active"><i class="fa fa-2x fa-ban" aria-hidden="true"></i></span>';
		} else {
			$statusVal = 1;
			$statusRow = '<span statusid='.$statusid.' statusvalue='.$statusVal.' controllername='.$controllername.'  style="color: #00a65a; cursor: pointer;" title="Active"><i class="fa fa-2x fa-check" aria-hidden="true"></i></span>';
		}

		$changes = $this->Service_model->changeStatus($statusid, $statusVal);
		if($changes) {
			echo $statusRow;
		} else {
			echo 'Server problem';
		}
	}


	/* Change Status data on click */
	public function changegallerystatus() {
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		$statusid = $this->input->post('statusid');
		$controllername = $this->input->post('controllername');
//	$displayid = $this->input->post('displayid');

		if($this->input->post('statusvalue')) {
			$statusVal = 0;
			$statusRow = '<span statusid='.$statusid.' statusvalue='.$statusVal.' controllername='.$controllername.' style="color: #ff0000; cursor: pointer;"  title="In Active"><i class="fa fa-2x fa-ban" aria-hidden="true"></i></span>';
		} else {
			$statusVal = 1;
			$statusRow = '<span statusid='.$statusid.' statusvalue='.$statusVal.' controllername='.$controllername.'  style="color: #00a65a; cursor: pointer;" title="Active"><i class="fa fa-2x fa-check" aria-hidden="true"></i></span>';
		}

		$changes = $this->Service_model->changeGalleryStatus($statusid, $statusVal);
		if($changes) {
			echo $statusRow;
		} else {
			echo 'Server problem';
		}
	}

	/* Open add new workout type form */
	public function  addservice(){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		// $data['productCode'] = generateProductCode(6);
		$data['packageDataArr'] = getAllPackages();
		$data['controller'] = $this->controller;

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('service/add_service', $data);
		$this->load->view('template/admin_footer');
	}

	/* Add new workout type form data with validation */
	public function add_newservice(){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$data['controller'] = $this->controller;
		$this->form_validation->set_error_delimiters('<p class="help-block" style="color:red;">', '</p>');
		// $this->form_validation->set_rules('category_type', 'Category Type', "trim|required");
		$this->form_validation->set_rules('package_id', 'Package Name', "trim|required");
		$this->form_validation->set_rules('service_name', 'Service Name', "trim|required");
		$this->form_validation->set_rules('offer_price', 'Offer Price', "trim|required");
		$this->form_validation->set_rules('status', 'Status', 'trim|required|integer');
		// $cType = $this->input->post('category_type');
		$cType = 2;
		if($this->form_validation->run() == FALSE ){
			$data['controller'] = $this->controller;

			$this->load->view('template/admin_header');
			$this->load->view('template/admin_left');
			$this->load->view('service/add_service', $data);
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

			$insert_data = array(
				'category_type' => $cType,
				'package_id' => $this->input->post('package_id'),
				'service_name' => $this->input->post('service_name'),
				'price' => $this->input->post('price'),
				'offer_price' => $this->input->post('offer_price'),
				'page_title' => $this->input->post('page_title'),
				'page_slug' => $this->input->post('page_slug'),
				'sub_menu_slug' => $this->input->post('sub_menu_slug'),
				'description' => $this->input->post('description'),
				'long_description' => $this->input->post('long_description'),
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
				'status' => $this->input->post('status'),
			);
			
			$uploads_dir = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/services/";
			$image = $_FILES['image_file'];
			$bannerimage = $_FILES['banner_image_file'];
			if (!empty($image['name']) && $image['error'] <= 0) {
				// Get Image Dimension
			    $fileinfo = @getimagesize($image["tmp_name"]);
			    $imagewidth = $fileinfo[0];
			    $imageheight = $fileinfo[1];

				$tmp_name    = $image["tmp_name"];
				$imgName     = pathinfo($image['name']);
				$ext         = strtolower($imgName['extension']);
				$newImgName  = substr(preg_replace('/[^a-zA-Z0-9\._]/', '_',$image['name']), 0, 50);
				$newImgName  = $newImgName . time() . "." . $ext;
				
				if (move_uploaded_file($tmp_name, $uploads_dir . '/' . $newImgName)) {
					$insert_data['image'] = $newImgName;
					// $insert_gallery_data['image'] = $newImgName;
				}
			}

			if (!empty($bannerimage['name']) && $bannerimage['error'] <= 0) {
				// Get Image Dimension
			    $fileinfo = @getimagesize($bannerimage["tmp_name"]);
			    $bannerimagewidth = $fileinfo[0];
			    $bannerimageheight = $fileinfo[1];

				$tmp_name    = $bannerimage["tmp_name"];
				$imgName     = pathinfo($bannerimage['name']);
				$ext         = strtolower($imgName['extension']);
				$bannernewImgName  = substr(preg_replace('/[^a-zA-Z0-9\._]/', '_',$bannerimage['name']), 0, 50);
				$bannernewImgName  = $bannernewImgName . time() . "." . $ext;
				
				if (move_uploaded_file($tmp_name, $uploads_dir . '/' . $bannernewImgName)) {
					$insert_data['service_banner_image'] = $bannernewImgName;
					// $insert_gallery_data['image'] = $newImgName;
				}
			}

			// if ($imagewidth != "1540" && $imageheight != "800") {
			// 	$this->session->set_flashdata('response', '<div class="alert alert-danger">Image dimension should be within 1020*1000.</div>');
		 //        $this->load->view('template/admin_header');
			// 	$this->load->view('template/admin_left');
			// 	$this->load->view('service/add_service', $data);
			// 	$this->load->view('template/admin_footer');
			// } else if ($bannerimagewidth != "1920" && $bannerimageheight != "750") {
			// 	$this->session->set_flashdata('response', '<div class="alert alert-danger">Banner Image dimension should be within 750*1920.</div>');
		 //        $this->load->view('template/admin_header');
			// 	$this->load->view('template/admin_left');
			// 	$this->load->view('service/add_service', $data);
			// 	$this->load->view('template/admin_footer');
			// } else {
				if($this->db->insert($this->table, $insert_data)){
					$insert_id = $this->db->insert_id();
					$serviceArr = $this->Service_model->serviceDetails($insert_id);
					$insert_gallery_data = array(
						'service_id' => $insert_id,
						'image' => $serviceArr['image'],
					);
					$this->db->insert("tbl_gallery", $insert_gallery_data);
					$this->session->set_flashdata('response', '<div class="alert alert-success">New service '.$this->input->post('service_name') .' Successfully Added</div>');
				} else {
					$this->session->set_flashdata('response', '<div class="alert alert-danger">Failed to Add New Service.</div>');
				}
				if($cType == 1){
					redirect($this->controller, 'refresh');
				} else {
					redirect($this->controller.'/female_service', 'refresh');
				}
			//}
		}
	}



	public function  addgallery(){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$data['service_id'] = $this->uri->segment(3);
		$data['controller'] = $this->controller;

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('service/add_gallery', $data);
		$this->load->view('template/admin_footer');
	}

	/* Add new workout type form data with validation */
	public function add_newgallery(){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		
		$data['controller'] = $this->controller;
		$this->form_validation->set_error_delimiters('<p class="help-block" style="color:red;">', '</p>');
		$this->form_validation->set_rules('status', 'Status', 'trim|required|integer');

		if($this->form_validation->run() == FALSE ){
			$data['controller'] = $this->controller;

			$this->load->view('template/admin_header');
			$this->load->view('template/admin_left');
			$this->load->view('service/add_gallery', $data);
			$this->load->view('template/admin_footer');
		} else {
			$service_id = $this->input->post('service_id');
			$insert_data = array(
				'service_id' => $this->input->post('service_id'),
				'status' => $this->input->post('status'),
			);
			
			$uploads_dir = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/services/";
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
			if ($width == "1000" && $height == "1020") {
				if($this->db->insert("tbl_gallery", $insert_data)){
					$this->session->set_flashdata('response', '<div class="alert alert-success">New Gallery Image Successfully Added</div>');
				} else {
					$this->session->set_flashdata('response', '<div class="alert alert-danger">Failed to Add New Gallery Image.</div>');
				}
				redirect('service/gallerylist/'.$service_id, 'refresh');
			} else {
				$this->session->set_flashdata('response', '<div class="alert alert-danger">Image dimension should be within 1020X1000.</div>');
				$this->load->view('template/admin_header');
				$this->load->view('template/admin_left');
				$this->load->view('service/add_gallery', $data);
				$this->load->view('template/admin_footer');
			}
		}
	}


	/* Delete data on click */
	public function delete($id) {
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		$deleted = $this->Service_model->deleteRecord($id);
		if($deleted) {
			redirect($this->controller, 'refresh');
		} else {
			redirect($this->controller, 'refresh');
		}
	}


	/* Delete gallery data on click */
	public function delete_gallery($id) {
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		$deleted = $this->Service_model->deleteGalleryRecord($id);
		if($deleted) {
			redirect($this->controller, 'refresh');
		} else {
			redirect($this->controller, 'refresh');
		}
	}



/* Function Start For Front-End Code */

/* Function for get service details start */
	public function serviceDetail___($id){
		$packageId = $this->uri->segment(3);
		$serviceId = $this->uri->segment(4);
		$data['controller'] = $this->controller;
		$data['serviceId'] = $serviceId;
		$data['packageId'] = $packageId;
		$data['allPackages'] = $this->Home_model->getAllPackages();
		$data['footerContent'] = $this->Home_model->getPageData('footer_content');
		$data['aboutCompany'] = $this->Home_model->getPageData('about-company');
		$data['whyWeBest'] = $this->Home_model->getPageData('why_we_best');
		$data['serviceDetails'] = $this->Service_model->getServiceDetails($serviceId);
		$data['allPackageServices'] = $this->Package_model->getPackageServices($packageId);

		$this->load->view('template/front/inner-header', $data);
		$this->load->view('service/service_detail', $data);
		$this->load->view('template/front/footer', $data);
	}


	public function serviceDetail($id){
		$serviceId = $id;
		$data['controller'] = $this->controller;
		$data['serviceId'] = $serviceId;
		$packageId = getPackageIdByServiceSlug($serviceId);
		$data['packageId'] = $packageId;
		$data['allPackages'] = $this->Home_model->getAllPackages();
		$data['footerContent'] = $this->Home_model->getPageData('footer_content');
		$data['aboutCompany'] = $this->Home_model->getPageData('about-company');
		$data['whyWeBest'] = $this->Home_model->getPageData('why_we_best');
		$data['serviceDetails'] = $this->Service_model->getServiceDetails($serviceId);
		$data['allPackageServices'] = $this->Package_model->getPackageServices($packageId);

		$this->load->view('template/front/inner-header', $data);
		$this->load->view('service/service_detail', $data);
		$this->load->view('template/front/footer', $data);
	}
/* Function for get service details end */

/* Function End For Front-End Code */	

}
