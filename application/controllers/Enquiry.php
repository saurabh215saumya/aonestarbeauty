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

class Enquiry extends CI_Controller{

	function __construct() {
		parent::__construct();
		$this->table = 'tbl_enquiry';        
		$this->load->model('Enquiry_model');
		$this->controller = $this->router->fetch_class();
	}

	/* Get all list of circle */
	public function index() {
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$data['controller'] = $this->controller;

		$data['allenquiries'] = $this->Enquiry_model->allenquiry();
		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('enquiry/index', $data);
		$this->load->view('template/admin_footer');
	}


	public function details($id) {
        $data['controller'] = $this->controller;
        $data['details'] = $this->Enquiry_model->enquiryDetails($id);

        $this->load->view('template/admin_header');
        $this->load->view('template/admin_left');
        $this->load->view('enquiry/details', $data);
        $this->load->view('template/admin_footer');
    }


	/* Delete data on click */
	public function delete($id) {
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$deleted = $this->Enquiry_model->deleteRecord($id);
		if($deleted) {
			redirect($this->controller, 'refresh');
		} else {
			redirect($this->controller, 'refresh');
		}
	}



}
