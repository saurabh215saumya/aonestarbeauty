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

class Socialmedia extends CI_Controller{

	function __construct() {
		parent::__construct();
		$this->table = 'tbl_social_media';        
		$this->load->model('Socialmedia_model');
		$this->controller = $this->router->fetch_class();
	}

	/* Get all list of circle */
	public function index() {
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$data['controller'] = $this->controller;

		$data['allmedias'] = $this->Socialmedia_model->allmedia();
		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('socialmedia/index', $data);
		$this->load->view('template/admin_footer');
	}

	

	/* Open edit workout type form by workout type ID */
	public function edit($id){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$data['details'] = $this->Socialmedia_model->mediaDetails($id);
		$data['controller'] = $this->controller;

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('socialmedia/edit', $data);
		$this->load->view('template/admin_footer');
	}

	/* Update workout type form data by workout type ID */
	public function update_media(){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		$data['controller'] = $this->controller;
		$media_id = $this->input->post('media_id');
		$data['details'] = $this->Socialmedia_model->mediaDetails($brand_id);

		$this->form_validation->set_error_delimiters('<p class="help-block" style="color:red;">', '</p>');

		$this->form_validation->set_rules('title', 'Title', "trim|required");
		$this->form_validation->set_rules('link', 'Social Link', "trim|required");
		$this->form_validation->set_rules('status', 'Status', 'trim|required|integer');
		$oldImage = $this->input->post('image_file_name');	
		
		if($this->form_validation->run() == FALSE ){ 
			$data['controller'] = $this->controller;
			$data['details'] = $this->Socialmedia_model->mediaDetails($brand_id);

			$this->load->view('template/admin_header');
			$this->load->view('template/admin_left');
			$this->load->view('socialmedia/edit', $data);
			$this->load->view('template/admin_footer');
		} else {
			$data = array(
				'title' => $this->input->post('title'),
				'social_link' => $this->input->post('link'),
				'status' => $this->input->post('status'),
			);

			$uploads_dir = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/medias/";
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
						if (file_exists($filename)) {
						    unlink($filename);
						}
					}
				}
			// if ($width == "200" && $height == "200") {
				$filename = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/medias/".$oldImage;
				
				if($this->db->update($this->table, $data, array('id' => $media_id))) {
					$this->session->set_flashdata('response', '<div class="alert alert-success">Media Updated Successfully</div>');
				} else {
					$this->session->set_flashdata('response', '<div class="alert alert-danger">Failed to updated media.</div>');
				}    
				redirect($this->controller, 'refresh');
			// } else {
			// 	$this->session->set_flashdata('response', '<div class="alert alert-danger">Image dimension should be within 400*400.</div>');
		 //        // redirect($this->controller.'/addproduct', 'refresh');
		 //        $this->load->view('template/admin_header');
			// 	$this->load->view('template/admin_left');
			// 	$this->load->view('brand/edit', $data);
			// 	$this->load->view('template/admin_footer');
			// }
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

		$changes = $this->Socialmedia_model->changeStatus($statusid, $statusVal);
		if($changes) {
			echo $statusRow;
		} else {
			echo 'Server problem';
		}
	}

	/* Open add new workout type form */
	public function  addmedia(){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$data['controller'] = $this->controller;

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('socialmedia/add_media', $data);
		$this->load->view('template/admin_footer');
	}

	/* Add new workout type form data with validation */
	public function add_newmedia(){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		$data['controller'] = $this->controller;
		$this->form_validation->set_error_delimiters('<p class="help-block" style="color:red;">', '</p>');
		$this->form_validation->set_rules('title', 'Title', "trim|required");
		$this->form_validation->set_rules('link', 'Social Link', "trim|required");
		$this->form_validation->set_rules('status', 'Status', 'trim|required|integer');

		if($this->form_validation->run() == FALSE ){
			$data['controller'] = $this->controller;

			$this->load->view('template/admin_header');
			$this->load->view('template/admin_left');
			$this->load->view('socialmedia/add_media', $data);
			$this->load->view('template/admin_footer');
		} else {
			// $current_time = date("Y-m-d");
			$insert_data = array(
				'title' => $this->input->post('title'),
				'social_link' => $this->input->post('link'),
				'status' => $this->input->post('status'),
				'addedOn' => date("Y-m-d H:i:s"),
			);
			//echo '<pre>'; print_r($insert_data); die;
			$uploads_dir = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/medias/";
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

			// if ($width == "400" && $height == "400") {
				if($this->db->insert($this->table, $insert_data)){
					$this->session->set_flashdata('response', '<div class="alert alert-success">Media Added Successfully</div>');
				} else {
					$this->session->set_flashdata('response', '<div class="alert alert-danger">Failed to Add New media.</div>');
				}
				redirect($this->controller, 'refresh');
			// } else {
			// 	$this->session->set_flashdata('response', '<div class="alert alert-danger">Image dimension should be within 400*400.</div>');
		 //        // redirect($this->controller.'/addproduct', 'refresh');
		 //        $this->load->view('template/admin_header');
			// 	$this->load->view('template/admin_left');
			// 	$this->load->view('brand/add_brand', $data);
			// 	$this->load->view('template/admin_footer');
			// }
		}
	}

	/* Delete data on click */
	public function delete($id) {
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$deleted = $this->Socialmedia_model->deleteRecord($id);
		if($deleted) {
			redirect($this->controller, 'refresh');
		} else {
			redirect($this->controller, 'refresh');
		}
	}





}
