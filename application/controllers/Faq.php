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

class Faq extends CI_Controller{

	function __construct() {
		parent::__construct();
		$this->table = 'tbl_faq';        
		$this->load->model('Faq_model');

		$this->load->model('Home_model');
		$this->controller = $this->router->fetch_class();
	}

	/* Get all list of circle */
	public function index() {
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$data['controller'] = $this->controller;

		$data['allfaqs'] = $this->Faq_model->allfaq();
		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('faq/index', $data);
		$this->load->view('template/admin_footer');
	}

	

	/* Open edit workout type form by workout type ID */
	public function edit($id){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$data['details'] = $this->Faq_model->faqDetails($id);
		$data['controller'] = $this->controller;

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('faq/edit', $data);
		$this->load->view('template/admin_footer');
	}

	/* Update workout type form data by workout type ID */
	public function update_faq(){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		$data['controller'] = $this->controller;
		$faq_id = $this->input->post('faq_id');
		$data['details'] = $this->Faq_model->faqDetails($faq_id);

		$this->form_validation->set_error_delimiters('<p class="help-block" style="color:red;">', '</p>');

		$this->form_validation->set_rules('question', 'Question', "trim|required");
		$this->form_validation->set_rules('answer', 'Answer', "trim|required");
		$this->form_validation->set_rules('status', 'Status', 'trim|required|integer');
		
		
		if($this->form_validation->run() == FALSE ){ 
			$data['controller'] = $this->controller;
			$data['details'] = $this->Faq_model->faqDetails($faq_id);

			$this->load->view('template/admin_header');
			$this->load->view('template/admin_left');
			$this->load->view('faq/edit', $data);
			$this->load->view('template/admin_footer');
		} else {
			$data = array(
				'question' => $this->input->post('question'),
				'answer' => $this->input->post('answer'),
				'status' => $this->input->post('status'),
				// 'updatedOn' => $current_time,
			);
			if($this->db->update($this->table, $data, array('id' => $faq_id))) {
				$this->session->set_flashdata('response', '<div class="alert alert-success">FAQ Updated Successfully</div>');
			} else {
				$this->session->set_flashdata('response', '<div class="alert alert-danger">Failed to updated faq.</div>');
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

		$changes = $this->Faq_model->changeStatus($statusid, $statusVal);
		if($changes) {
			echo $statusRow;
		} else {
			echo 'Server problem';
		}
	}

	/* Open add new workout type form */
	public function  addfaq(){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$data['controller'] = $this->controller;

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('faq/add_faq', $data);
		$this->load->view('template/admin_footer');
	}

	/* Add new workout type form data with validation */
	public function add_newfaq(){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		$data['controller'] = $this->controller;
		$this->form_validation->set_error_delimiters('<p class="help-block" style="color:red;">', '</p>');
		$this->form_validation->set_rules('question', 'Question', "trim|required");
		$this->form_validation->set_rules('answer', 'Answer', "trim|required");
		$this->form_validation->set_rules('status', 'Status', 'trim|required|integer');

		if($this->form_validation->run() == FALSE ){
			$data['controller'] = $this->controller;

			$this->load->view('template/admin_header');
			$this->load->view('template/admin_left');
			$this->load->view('faq/add_faq', $data);
			$this->load->view('template/admin_footer');
		} else {
			$insert_data = array(
				'question' => $this->input->post('question'),
				'answer' => $this->input->post('answer'),
				'status' => $this->input->post('status'),
				'addedOn' => date("Y-m-d H:i:s"),
			);
			if($this->db->insert($this->table, $insert_data)){
				$this->session->set_flashdata('response', '<div class="alert alert-success">FAQ Added Successfully</div>');
			} else {
				$this->session->set_flashdata('response', '<div class="alert alert-danger">Failed to Add New faq.</div>');
			}
			redirect($this->controller, 'refresh');
		}
	}

	/* Delete data on click */
	public function delete($id) {
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$deleted = $this->Faq_model->deleteRecord($id);
		if($deleted) {
			redirect($this->controller, 'refresh');
		} else {
			redirect($this->controller, 'refresh');
		}
	}



	public function getAllFaqs(){
    	$data['controller'] = $this->controller;
        $data['allPackages'] = $this->Home_model->getAllPackages();
		$data['footerContent'] = $this->Home_model->getPageData('footer_content');
		$data['aboutCompany'] = $this->Home_model->getPageData('about-company');
		$data['allFaqs'] = $this->Faq_model->getAllFaqs();
    	$this->load->view('template/front/inner-header', $data);        
        $this->load->view('faq/faqs', $data);
        $this->load->view('template/front/footer', $data);
    }
}
