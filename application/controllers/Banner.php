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

class Banner extends CI_Controller{

	function __construct() {
		parent::__construct();
		$this->table = 'tbl_banners';        
		$this->load->model('Banner_model');
		$this->controller = $this->router->fetch_class();
	}

	/* Get all list of circle */
	public function index() {
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$data['controller'] = $this->controller;

		$data['allbanners'] = $this->Banner_model->allbanner();
		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('banner/index', $data);
		$this->load->view('template/admin_footer');
	}

	

	/* Open edit workout type form by workout type ID */
	public function edit($id){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$data['details'] = $this->Banner_model->bannerDetails($id);
		$data['controller'] = $this->controller;

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('banner/edit', $data);
		$this->load->view('template/admin_footer');
	}

	/* Update workout type form data by workout type ID */
	public function update_banner(){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		$data['controller'] = $this->controller;
		$banner_id = $this->input->post('banner_id');
		$data['details'] = $this->Banner_model->bannerDetails($banner_id);

		$this->form_validation->set_error_delimiters('<p class="help-block" style="color:red;">', '</p>');

		// $this->form_validation->set_rules('banner_type', 'Banner Type', "trim|required");
		$this->form_validation->set_rules('status', 'Status', 'trim|required|integer');
		$oldImage = $this->input->post('image_file_name');	
		
		if($this->form_validation->run() == FALSE ){ 
			$data['controller'] = $this->controller;
			$data['details'] = $this->Banner_model->bannerDetails($banner_id);

			$this->load->view('template/admin_header');
			$this->load->view('template/admin_left');
			$this->load->view('banner/edit', $data);
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

			$current_time = time();
			$data = array(
				'title' => $this->input->post('title'),
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
				'status' => $this->input->post('status'),
				// 'updatedOn' => $current_time,
			);

			$uploads_dir = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/banners/";
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

				if ($width == "1920" && $height == "750") {
					if($this->db->update($this->table, $data, array('id' => $banner_id))) {
						$filename = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/banners/".$oldImage;
						if (file_exists($filename)) {
						    unlink($filename);
						}
						$this->session->set_flashdata('response', '<div class="alert alert-success">Banner Updated Successfully</div>');
					} else {
						$this->session->set_flashdata('response', '<div class="alert alert-danger">Failed to updated banner.</div>');
					}    
					redirect($this->controller, 'refresh');
				} else {
					$this->session->set_flashdata('response', '<div class="alert alert-danger">Image dimension should be within 750*1920.</div>');
			        // redirect($this->controller.'/addproduct', 'refresh');
			        $this->load->view('template/admin_header');
					$this->load->view('template/admin_left');
					$this->load->view('banner/edit', $data);
					$this->load->view('template/admin_footer');
				}
			} else {
				if($this->db->update($this->table, $data, array('id' => $banner_id))) {
					$this->session->set_flashdata('response', '<div class="alert alert-success">Banner Updated Successfully</div>');
				} else {
					$this->session->set_flashdata('response', '<div class="alert alert-danger">Failed to updated banner.</div>');
				}    
				redirect($this->controller, 'refresh');
			}
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

		$changes = $this->Banner_model->changeStatus($statusid, $statusVal);
		if($changes) {
			echo $statusRow;
		} else {
			echo 'Server problem';
		}
	}

	/* Open add new workout type form */
	public function  addbanner(){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$data['controller'] = $this->controller;

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('banner/add_banner', $data);
		$this->load->view('template/admin_footer');
	}

	/* Add new workout type form data with validation */
	public function add_newbanner(){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		$data['controller'] = $this->controller;
		$this->form_validation->set_error_delimiters('<p class="help-block" style="color:red;">', '</p>');
		// $this->form_validation->set_rules('banner_type', 'Banner Type', "trim|required");
		$this->form_validation->set_rules('status', 'Status', 'trim|required|integer');

		if($this->form_validation->run() == FALSE ){
			$data['controller'] = $this->controller;

			$this->load->view('template/admin_header');
			$this->load->view('template/admin_left');
			$this->load->view('banner/add_banner', $data);
			$this->load->view('template/admin_footer');
		} else {
			$current_time = time();
			$insert_data = array(
				'title' => $this->input->post('title'),
				'description' => $this->input->post('description'),
				'status' => $this->input->post('status'),
				'addedOn' => date("Y-m-d H:i:s"),
			);
			//echo '<pre>'; print_r($insert_data); die;
			$uploads_dir = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/banners/";
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

			//if ($width == "1920" && $height == "750") {
				if($this->db->insert($this->table, $insert_data)){
					$this->session->set_flashdata('response', '<div class="alert alert-success">Banner Added Successfully</div>');
				} else {
					$this->session->set_flashdata('response', '<div class="alert alert-danger">Failed to Add New banner.</div>');
				}
				redirect($this->controller, 'refresh');
			// } else {
			// 	$this->session->set_flashdata('response', '<div class="alert alert-danger">Image dimension should be within 750*1920.</div>');
		 //        // redirect($this->controller.'/addproduct', 'refresh');
		 //        $this->load->view('template/admin_header');
			// 	$this->load->view('template/admin_left');
			// 	$this->load->view('banner/add_banner', $data);
			// 	$this->load->view('template/admin_footer');
			// }
		}
	}

	/* Delete data on click */
	public function delete($id) {
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$deleted = $this->Banner_model->deleteRecord($id);
		if($deleted) {
			redirect($this->controller, 'refresh');
		} else {
			redirect($this->controller, 'refresh');
		}
	}

}
