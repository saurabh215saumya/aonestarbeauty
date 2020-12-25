<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author       :Mohit sharma
 * Company      :Scource Soft
 * website      :http://www.sourcesoftsolutions.com/
 * date         :17-may-2017.
 * Controller   :Giver 	 
 */

class Setting extends CI_Controller{
    
    function __construct() {
        parent::__construct();        
        $this->load->model('setting_model');
        $this->controller = $this->router->fetch_class();
    }

    /* Get all list of vehicle type */
    public function index() {
	if (!$this->session->userdata('logged_in')) {
            redirect('user/login');
        }
        $data['controller'] = $this->controller;
	
        $data['allbrand'] = $this->setting_model->allSetting();
        $this->load->view('template/admin_header');
        $this->load->view('template/admin_left');
        $this->load->view('setting/index', $data);
        $this->load->view('template/admin_footer');
    }

    /* Get setting details by vehicle type ID */
    public function details($id) {
	if (!$this->session->userdata('logged_in')) {
            redirect('user/login');
        }
        $data['controller'] = $this->controller;
        $data['details'] = $this->setting_model->settingDetails($id);
        $this->load->view('template/admin_header');
        $this->load->view('template/admin_left');
        $this->load->view('setting/details', $data);
        $this->load->view('template/admin_footer');
    }
    
    /* Open edit vehicle type form by Vehicle type ID */
    public function  edit($id){
	if (!$this->session->userdata('logged_in')) {
            redirect('user/login');
        }
        $data['controller'] = $this->controller;
        $data['details'] = $this->setting_model->settingDetails($id);
        $this->load->view('template/admin_header');
        $this->load->view('template/admin_left');
        $this->load->view('setting/edit', $data);
        $this->load->view('template/admin_footer');
    }
    
    /* Update vehicle type form data by Vehicle type ID */
    public function update_setting(){
	if (!$this->session->userdata('logged_in')) {
            redirect('user/login');
        }
	$data['controller'] = $this->controller;
	$setting_id = $this->input->post('setting_id');
	$data['details'] = $this->setting_model->settingDetails($setting_id);
	
	$this->form_validation->set_error_delimiters('<p class="help-block" style="color:red;">', '</p>');
	
	$this->form_validation->set_rules('settingname', 'Setting Name', 'trim|required');
	$this->form_validation->set_rules('description', 'Setting Description', 'trim|required');
	$this->form_validation->set_rules('value', 'Setting Value', 'trim|required');
	//$this->form_validation->set_rules('status', 'Vehicle Type Status', 'trim|required|integer');	
		    
	if($this->form_validation->run() == FALSE ){
	    $data['controller'] = $this->controller;
	    $data['details'] = $this->setting_model->settingDetails($setting_id);
	    $this->load->view('template/admin_header');
	    $this->load->view('template/admin_left');
	    $this->load->view('setting/edit', $data);
	    $this->load->view('template/admin_footer');
	} else {
	    $data = array(
			'name' => $this->input->post('settingname'),
			'description' => $this->input->post('description'),
			'value' => $this->input->post('value'),
			//'status' => $this->input->post('status')
	    );
	    
	    if($this->db->update('tbl_systemconfigs', $data, array('id' => $setting_id))) {
			$this->session->set_flashdata('response', '<div class="alert alert-success">Setting Updated Successfully</div>');
	    } else {
			$this->session->set_flashdata('response', '<div class="alert alert-danger">Failed to update Setting.</div>');
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
	
	$changes = $this->setting_model->changeStatus($statusid, $statusVal);
	if($changes) {
	    echo $statusRow;
	} else {
	    echo 'Server problem';
	}
    }

}
