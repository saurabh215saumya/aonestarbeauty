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

class Gallery extends CI_Controller{

	function __construct() {
		parent::__construct();
		$this->table = 'tbl_gallery_image';        
		$this->load->model('Gallery_model');
		$this->controller = $this->router->fetch_class();
	}

	/* Get all list of circle */
	public function index() {
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$data['controller'] = $this->controller;

		$data['allgallery'] = $this->Gallery_model->allgallery();
		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('gallery/index', $data);
		$this->load->view('template/admin_footer');
	}

	

	/* Open edit workout type form by workout type ID */
	public function edit($id){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$data['details'] = $this->Gallery_model->galleryDetails($id);
		$data['controller'] = $this->controller;

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('gallery/edit', $data);
		$this->load->view('template/admin_footer');
	}

	/* Update workout type form data by workout type ID */
	public function update_gallery(){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		$data['controller'] = $this->controller;
		$gallery_id = $this->input->post('gallery_id');
		$data['details'] = $this->Gallery_model->galleryDetails($gallery_id);

		$this->form_validation->set_error_delimiters('<p class="help-block" style="color:red;">', '</p>');

		// $this->form_validation->set_rules('banner_type', 'Banner Type', "trim|required");
		$this->form_validation->set_rules('status', 'Status', 'trim|required|integer');
		$oldImage = $this->input->post('image_file_name');	
		
		if($this->form_validation->run() == FALSE ){ 
			$data['controller'] = $this->controller;
			$data['details'] = $this->Gallery_model->galleryDetails($gallery_id);

			$this->load->view('template/admin_header');
			$this->load->view('template/admin_left');
			$this->load->view('gallery/edit', $data);
			$this->load->view('template/admin_footer');
		} else {
			$current_time = time();
			$data = array(
				'status' => $this->input->post('status'),
				// 'updatedOn' => $current_time,
			);

			$uploads_dir = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/gallery/";
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

				// if ($width == "1920" && $height == "750") {
					if($this->db->update($this->table, $data, array('id' => $gallery_id))) {
						$filename = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/gallery/".$oldImage;
						if (file_exists($filename)) {
						    unlink($filename);
						}
						$this->session->set_flashdata('response', '<div class="alert alert-success">Gallery Updated Successfully</div>');
					} else {
						$this->session->set_flashdata('response', '<div class="alert alert-danger">Failed to updated gallery.</div>');
					}    
					redirect($this->controller, 'refresh');
				// } else {
				// 	$this->session->set_flashdata('response', '<div class="alert alert-danger">Image dimension should be within 750*1920.</div>');
			 //        // redirect($this->controller.'/addproduct', 'refresh');
			 //        $this->load->view('template/admin_header');
				// 	$this->load->view('template/admin_left');
				// 	$this->load->view('banner/edit', $data);
				// 	$this->load->view('template/admin_footer');
				// }
			} else {
				if($this->db->update($this->table, $data, array('id' => $gallery_id))) {
					$this->session->set_flashdata('response', '<div class="alert alert-success">Gallery Updated Successfully</div>');
				} else {
					$this->session->set_flashdata('response', '<div class="alert alert-danger">Failed to updated gallery.</div>');
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

		$changes = $this->Gallery_model->changeStatus($statusid, $statusVal);
		if($changes) {
			echo $statusRow;
		} else {
			echo 'Server problem';
		}
	}

	/* Open add new workout type form */
	public function  addgallery(){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$data['controller'] = $this->controller;

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('gallery/add_gallery', $data);
		$this->load->view('template/admin_footer');
	}

	/* Add new workout type form data with validation */
	public function add_newgallery(){
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
			$this->load->view('gallery/add_gallery', $data);
			$this->load->view('template/admin_footer');
		} else {
			$current_time = time();
			$insert_data = array(
				'status' => $this->input->post('status'),
				'addedOn' => date("Y-m-d H:i:s"),
			);
			//echo '<pre>'; print_r($insert_data); die;
			$uploads_dir = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/gallery/";
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
					$this->session->set_flashdata('response', '<div class="alert alert-success">Gallery Added Successfully</div>');
				} else {
					$this->session->set_flashdata('response', '<div class="alert alert-danger">Failed to Add New gallery.</div>');
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
		$deleted = $this->Gallery_model->deleteRecord($id);
		if($deleted) {
			redirect($this->controller, 'refresh');
		} else {
			redirect($this->controller, 'refresh');
		}
	}

}
