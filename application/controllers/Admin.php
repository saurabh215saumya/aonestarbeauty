<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author       :Mohit sharma
 * Company      :Scource Soft
 * website      :http://www.sourcesoftsolutions.com/
 * date         :17-may-2017.
 * Controller   :Giver   
 */

class Admin extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        // $this->load->model('Topic_model');
        // $this->load->model('Question_model');
        // $this->load->model('Gamelog_model'); 
        // $this->load->model('Faq_model');            
        // $this->load->model('Staticpage_model');
    }

    public function index() {        
        if (!$this->session->userdata('logged_in')) {
            redirect('user/login');
        }
        $data = array();
        // $data["total_register_user"] = count($this->Admin_model->getTotalData("tbl_users", "id", ""));
        // $data["total_topic"] = $this->Topic_model->getTotalTopicData();
        // $data["total_question"] = $this->Question_model->getTotalQuestionData();
        // $data["total_game"] = $this->Gamelog_model->getTotalGameLogData();
        // $data["total_faq"] = $this->Faq_model->getTotalFaqData();
        // $data["total_pages"] = $this->Staticpage_model->getTotalPageData();
       
        $this->load->view('template/admin_header');
        $this->load->view('template/admin_left');
        $this->load->view('admin/index', $data);
        $this->load->view('template/admin_footer');
    }






}
