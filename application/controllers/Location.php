<?php
error_reporting(1);
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author       :Mohit sharma
 * Company      :Scource Soft
 * website      :http://www.sourcesoftsolutions.com/
 * date         :17-may-2017.
 * Controller   :Giver 	 
 */

class Location extends CI_Controller{

	function __construct() {
		parent::__construct();
		$this->table = 'tbl_locations';        
		$this->load->model('Location_model');
		$this->load->model('Servicepage_model');
		$this->load->model('Service_model');
		$this->controller = $this->router->fetch_class();
	}

	/* Get all list of circle */
	public function index() {
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$data['controller'] = $this->controller;

		$data['alllocations'] = $this->Location_model->allLocations();
		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('location/index', $data);
		$this->load->view('template/admin_footer');
	}

	

	/* Open edit workout type form by workout type ID */
	public function edit($id){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$data['details'] = $this->Location_model->locationDetails($id);
		$data['allservicepages'] = $this->Service_model->getAllActiveServicePages();
		// $data['allservicepages'] = $this->Servicepage_model->getAllActiveServicePages();
		$data['controller'] = $this->controller;

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('location/edit', $data);
		$this->load->view('template/admin_footer');
	}



	/* Update workout type form data by workout type ID */
	public function update_location(){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		$data['controller'] = $this->controller;
		$location_id = $this->input->post('location_id');
		$servicesArr = $this->input->post('services');
		$servicesDataArr = implode(",", $servicesArr);

		$data['details'] = $this->Location_model->locationDetails($location_id);
		$data['allservicepages'] = $this->Service_model->getAllActiveServicePages();
		// $data['allservicepages'] = $this->Servicepage_model->getAllActiveServicePages();

		$this->form_validation->set_error_delimiters('<p class="help-block" style="color:red;">', '</p>');
		$this->form_validation->set_rules('location_city', 'Location City', "trim|required");
		$this->form_validation->set_rules('location_name', 'Location Name', "trim|required");
		$this->form_validation->set_rules('location_slug', 'Location Slug', "trim|required");
		$this->form_validation->set_rules('status', 'Status', 'trim|required|integer');

		if($this->form_validation->run() == FALSE ){ 
			$data['controller'] = $this->controller;
			$data['details'] = $this->Location_model->locationDetails($location_id);

			$this->load->view('template/admin_header');
			$this->load->view('template/admin_left');
			$this->load->view('location/edit', $data);
			$this->load->view('template/admin_footer');
		} else {
			$data = array(
				'location_city' => $this->input->post('location_city'),
				'location' => $this->input->post('location_name'),
				'location_slug' => $this->input->post('location_slug'),
				'services_id' => $servicesDataArr,
				'status' => $this->input->post('status'),
			);

			if($this->db->update($this->table, $data, array('id' => $location_id))) {
				$this->session->set_flashdata('response', '<div class="alert alert-success">Location Updated Successfully</div>');
			} else {
				$this->session->set_flashdata('response', '<div class="alert alert-danger">Failed to updated location.</div>');
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

		$changes = $this->Location_model->changeStatus($statusid, $statusVal);
		if($changes) {
			echo $statusRow;
		} else {
			echo 'Server problem';
		}
	}

	/* Open add new workout type form */
	public function  addlocation(){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		$data['controller'] = $this->controller;
		// $data['allservicepages'] = $this->Servicepage_model->getAllActiveServicePages();
		$data['allservicepages'] = $this->Service_model->getAllActiveServicePages();

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('location/add_location', $data);
		$this->load->view('template/admin_footer');
	}

	/* Add new workout type form data with validation */
	public function add_newlocation(){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		$servicesArr = $this->input->post('services');
		$servicesDataArr = implode(",", $servicesArr);

		$data['controller'] = $this->controller;
		$this->form_validation->set_error_delimiters('<p class="help-block" style="color:red;">', '</p>');
		$this->form_validation->set_rules('location_city', 'Location City', "trim|required");
		$this->form_validation->set_rules('location_name', 'Location Name', "trim|required");
		$this->form_validation->set_rules('location_slug', 'Location Slug', "trim|required");
		$this->form_validation->set_rules('status', 'Status', 'trim|required|integer');

		if($this->form_validation->run() == FALSE ){
			$data['controller'] = $this->controller;

			$this->load->view('template/admin_header');
			$this->load->view('template/admin_left');
			$this->load->view('location/add_location', $data);
			$this->load->view('template/admin_footer');
		} else {
			// $current_time = date("Y-m-d");
			$insert_data = array(
				'location_city' => $this->input->post('location_city'),
				'location' => $this->input->post('location_name'),
				'location_slug' => $this->input->post('location_slug'),
				'services_id' => $servicesDataArr,
				'status' => $this->input->post('status'),
				'addedOn' => date("Y-m-d H:i:s"),
			);
			if($this->db->insert($this->table, $insert_data)){
				$this->session->set_flashdata('response', '<div class="alert alert-success">Location Added Successfully</div>');
			} else {
				$this->session->set_flashdata('response', '<div class="alert alert-danger">Failed to Add New location.</div>');
			}
			redirect($this->controller, 'refresh');
		}
	}

	/* Delete data on click */
	public function delete($id) {
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$deleted = $this->Location_model->deleteRecord($id);
		if($deleted) {
			redirect($this->controller, 'refresh');
		} else {
			redirect($this->controller, 'refresh');
		}
	}



}
