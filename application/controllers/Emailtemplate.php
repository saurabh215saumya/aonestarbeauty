<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author       :Mohit sharma
 * Company      :Scource Soft
 * website      :http://www.sourcesoftsolutions.com/
 * date         :17-may-2017.
 * Controller   :Giver 	 
 */

class emailtemplate extends CI_Controller{

	function __construct() {
		parent::__construct();
		$this->table = 'tbl_email_template';        
		$this->load->model('emailtemplate_model');
		$this->controller = $this->router->fetch_class();
	}

	/* Get all list of circle */
	public function index() {
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$data['controller'] = $this->controller;

		$data['alltemplate'] = $this->emailtemplate_model->alltemplate();
		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('emailtemplate/index', $data);
		$this->load->view('template/admin_footer');
	}

	

	/* Open edit workout type form by workout type ID */
	public function edit($id){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$data['details'] = $this->emailtemplate_model->templateDetails($id);
		$data['controller'] = $this->controller;

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('emailtemplate/edit', $data);
		$this->load->view('template/admin_footer');
	}

	/* Update workout type form data by workout type ID */
	public function update_template(){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		$data['controller'] = $this->controller;
		$template_id = $this->input->post('template_id');
		$data['details'] = $this->emailtemplate_model->templateDetails($template_id);

		$this->form_validation->set_error_delimiters('<p class="help-block" style="color:red;">', '</p>');

		$this->form_validation->set_rules('name', 'Template Name', 'trim|required|callback_name_check');
		$this->form_validation->set_rules('subject', 'Subject Name', 'trim|required');
		$this->form_validation->set_rules('comment', 'Comment Name', 'trim|required');		
		$this->form_validation->set_rules('description', 'Template Content', 'trim|required');
		$this->form_validation->set_rules('status', 'Status', 'trim|required|integer');			
		
		if($this->form_validation->run() == FALSE ){ 
			$data['controller'] = $this->controller;
			$data['details'] = $this->emailtemplate_model->templateDetails($template_id);

			$this->load->view('template/admin_header');
			$this->load->view('template/admin_left');
			$this->load->view('emailtemplate/edit', $data);
			$this->load->view('template/admin_footer');
		} else {
			$current_time = time();
			$data = array(
				'name' => $this->input->post('name'),
				'subject' => $this->input->post('subject'),
				'comment' => $this->input->post('comment'),
				'description' => $this->input->post('description'),
				'status' => $this->input->post('status')
			);

			if($this->db->update($this->table, $data, array('id' => $template_id))) {
				$this->session->set_flashdata('response', '<div class="alert alert-success">Package Updated Successfully</div>');
			} else {
				$this->session->set_flashdata('response', '<div class="alert alert-danger">Failed to updated package.</div>');
			}    
			redirect($this->controller, 'refresh');
		}

	}

	public function name_check($name){
		$templateId = $this->input->post('template_id');

		$this->db->where_not_in('id', $templateId);
		$this->db->where('name',$name);
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
			$statusVal = '0';
			$statusRow = '<span statusid='.$statusid.' statusvalue='.$statusVal.' controllername='.$controllername.' style="color: #ff0000; cursor: pointer;"  title="In Active"><i class="fa fa-2x fa-ban" aria-hidden="true"></i></span>';
		} else {
			$statusVal = '1';
			$statusRow = '<span statusid='.$statusid.' statusvalue='.$statusVal.' controllername='.$controllername.'  style="color: #00a65a; cursor: pointer;" title="Active"><i class="fa fa-2x fa-check" aria-hidden="true"></i></span>';
		}

		$changes = $this->emailtemplate_model->changeStatus($statusid, $statusVal);
		if($changes) {
			echo $statusRow;
		} else {
			echo 'Server problem';
		}
	}

	/* Open add new workout type form */
	public function  addtemplate(){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$data['controller'] = $this->controller;

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('emailtemplate/add_template', $data);
		$this->load->view('template/admin_footer');
	}

	/* Add new workout type form data with validation */
	public function add_newcategory(){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		$data['controller'] = $this->controller;
		$this->form_validation->set_error_delimiters('<p class="help-block" style="color:red;">', '</p>');

		$this->form_validation->set_rules('name', 'Category Name', "trim|required|is_unique[tbl_category.name]");
		$this->form_validation->set_rules('status', 'Status', 'trim|required|integer');

		if($this->form_validation->run() == FALSE ){
			$data['controller'] = $this->controller;

			$this->load->view('template/admin_header');
			$this->load->view('template/admin_left');
			$this->load->view('category/add_category', $data);
			$this->load->view('template/admin_footer');
		} else {
			$current_time = time();
			$insert_data = array(
				'name' => $this->input->post('name'),
				'status' => $this->input->post('status'),
				'addedOn' => $current_time,
			);
			//echo '<pre>'; print_r($insert_data); die;

			if($this->db->insert($this->table, $insert_data)){
				$this->session->set_flashdata('response', '<div class="alert alert-success">New package '.$this->input->post('name') .' Successfully Added</div>');
			} else {
				$this->session->set_flashdata('response', '<div class="alert alert-danger">Failed to Add New package.</div>');
			}
			redirect($this->controller, 'refresh');
		}
	}

	/* Delete data on click */
	public function delete($id) {
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$deleted = $this->emailtemplate_model->deleteRecord($id);
		if($deleted) {
			redirect($this->controller, 'refresh');
		} else {
			redirect($this->controller, 'refresh');
		}
	}

}
