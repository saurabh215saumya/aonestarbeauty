<?php
error_reporting(0);
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author       :Naveen Kumar
 * Company      :Scource Soft
 * website      :http://www.sourcesoftsolutions.com/
 * date         :25-jan-2018.
 * Controller   :Static pages 	 
 */

class Appointment extends CI_Controller{

	function __construct() {
		parent::__construct();
		$this->table = 'tbl_appointment';        
		$this->load->model('Appointment_model');
		$this->controller = $this->router->fetch_class();
	}

	/* Get all list of meeting type */
	public function index() {
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$data['controller'] = $this->controller;

		$data['appointmentList'] = $this->Appointment_model->allappointments();
		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('appointment/index', $data);
		$this->load->view('template/admin_footer');
	}


	/* Get meeting details by meeting type ID */
	public function details($id) {
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$data['controller'] = $this->controller;
		$data['details'] = $this->Appointment_model->appointmentDetails($id);

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('appointment/details', $data);
		$this->load->view('template/admin_footer');
	}

	/* Open edit meeting type form by Meeting type ID */
	public function edit($id){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$data['details'] = $this->Appointment_model->appointmentDetails($id);
		$data['controller'] = $this->controller;        

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('appointment/edit', $data);
		$this->load->view('template/admin_footer');
	}

	/* Update meeting type form data by Meeting type ID */
	public function update_appointment(){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		$data['controller'] = $this->controller;
		$id = $this->input->post('appointment_id');
		$data['details'] = $this->Appointment_model->appointmentDetails($id);

		$this->form_validation->set_error_delimiters('<p class="help-block" style="color:red;">', '</p>');

		$this->form_validation->set_rules('appointment_date', 'Appointment Date', 'required');

	   if($this->form_validation->run() == FALSE || isset($data['error'])){ 
			$data['controller'] = $this->controller;
			$data['details'] = $this->Appointment_model->appointmentDetails($id);
	        $this->load->view('template/admin_header');
			$this->load->view('template/admin_left');
			$this->load->view('appointment/edit', $data);
			$this->load->view('template/admin_footer');
		} else {
			$data = array(
				'appointment_date' => $this->input->post('appointment_date'),
			);

			if($this->db->update($this->table, $data, array('id' => $id))) {
				$this->session->set_flashdata('response', '<div class="alert alert-success">Appointment Updated Successfully</div>');
			} else {
				$this->session->set_flashdata('response', '<div class="alert alert-danger">Failed to updated appointment.</div>');
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
		
		if($this->input->post('statusvalue')) {
			$statusVal = 0;
			$statusRow = '<span statusid='.$statusid.' statusvalue='.$statusVal.' controllername='.$controllername.' style="color: #ff0000; cursor: pointer;"  title="In Active"><i class="fa fa-2x fa-ban" aria-hidden="true"></i></span>';
		} else {
			$statusVal = 1;
			$statusRow = '<span statusid='.$statusid.' statusvalue='.$statusVal.' controllername='.$controllername.'  style="color: #00a65a; cursor: pointer;" title="Active"><i class="fa fa-2x fa-check" aria-hidden="true"></i></span>';
		}
		
		$changes = $this->Appointment_model->changeStatus($statusid, $statusVal);
		if($changes) {
			echo $statusRow;
		} else {
			echo 'Server problem';
		}
	}

    /* Get CMS details by ID */
    public function view($id) {
        $data['controller'] = $this->controller;
        $data['details'] = $this->Appointment_model->appointmentDetails($id);
        //echo "<pre>";print_r($data['details']);die;
        
        $this->load->view('template/header');        
        $this->load->view('appointment/view', $data);
        $this->load->view('template/footer');
    }

}
