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

class User extends CI_Controller{   
    function __construct() {
        parent::__construct();
        $this->controller = $this->router->fetch_class();
        $this->load->model(array('User_model'));
    }

    public function login() {
        // Checking if User already logged in
        if ($this->session->userdata('logged_in')) {
            redirect('admin');
        }
        if($this->input->post()) {
            $this->form_validation->set_error_delimiters('<p style="color:red;" >', '</p>'); 
            $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email'); 
            $this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_user_exist');

            if($this->form_validation->run() == FALSE ){
                $this->load->view('template/login_layout');
                $this->load->view($this->controller."/login"); 
            } else {
                redirect('/admin', 'refresh');
            }
        } else {
            $this->load->view('template/login_layout');
            $this->load->view($this->controller.'/login');
        }
    }


    function check_user_exist($password) {
        $email = $this->input->post('email');
        $result = $this->User_model->login($email, $password); // Validate Login Credentials
        if ($result) {
            //print_r($result);die;
            $session_array = array();
            foreach ($result as $row) {
                $session_array = array(
                    'id' => $row->id, 
                    'username' => $row->username,
                    'email' => $row->email,
                    'fullname' => $row->full_name,
                    'profileimage' => $row->profile_image,
                    'membersince' => $row->addedOn
                );
                $this->session->set_userdata('logged_in', $session_array); 
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_user_exist', 'Username or Password Invalid'); 
            return false;
        }
    }

    public function logout(){
        $sessArr = $this->session->userdata('logged_in');
        $this->session->sess_destroy($sessArr);
        redirect('user/login', 'refresh');
    }

    /* Open edit vehicle type form by Vehicle type ID */
    public function  profile($id){
        if (!$this->session->userdata('logged_in')) {
            redirect('user/login');
        }
        $data['controller'] = $this->controller;
        $data['details'] = $this->User_model->profileDetails($id);
        //pretty($data['details']);
        $this->load->view('template/admin_header');
        $this->load->view('template/admin_left');
        $this->load->view('user/profile', $data);
        $this->load->view('template/admin_footer');
    }

    /* Update vehicle type form data by Vehicle type ID */
    public function update_profile(){
        if (!$this->session->userdata('logged_in')) {
                redirect('user/login');
            }
        
        $data['controller'] = $this->controller;
        $userId = $this->input->post('user_id');
        $data['details'] = $this->User_model->profileDetails($userId);
        //echo '<pre>';print_r($data['details']);
        //print_r($_FILES);
        //pretty($this->input->post());
        $this->form_validation->set_error_delimiters('<p class="help-block" style="color:red;">', '</p>');
        
        $this->form_validation->set_rules('username', 'User Name', 'trim|required');
        $this->form_validation->set_rules('fullname', 'Full Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        // $this->form_validation->set_rules('balance', 'Balance', 'trim|required');
        // $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('status', 'Vehicle Status', 'trim|required|integer'); 
        
        $upload_path = UPLOAD_ADMIN_PROFILE_PATH; 
        // Upload Admin profile image 
        if (!empty($_FILES['profileimage']['name']) && $_FILES['profileimage']['name'] != ""){
            $profileimage_oldimage = $data['details']['profile_image'];
            $profileimage = $_FILES['profileimage']['name'];
            $ext = pathinfo($profileimage, PATHINFO_EXTENSION);           
            $newprofileimage = time().mt_rand(1,50).'.'.$ext;
            @chmod($upload_path.$newprofileimage, 0777); // CHMOD file
            $results = uploadImages($upload_path, 'profileimage', $newprofileimage);

            if(isset($results['error'])){
                $data = array('error' => $this->upload->display_errors());
                $data['image'] = '';
            } else {
                if($profileimage_oldimage != "noimage.png") {
                    deleteFile($upload_path.$profileimage_oldimage);
                    $profileImage = $newprofileimage; 
                }                
            }                                    
        } else {
            $profileImage = $data['details']['profile_image'];
        }
        // Upload Admin profile image end
        if($this->input->post('password')) {
            $data['password'] = md5($this->input->post('password'));
        }
                
        if($this->form_validation->run() == FALSE || isset($data['error'])){
            $data['controller'] = $this->controller;
            $data['details'] = $this->User_model->profileDetails($userId);
            $this->load->view('template/admin_header');
            $this->load->view('template/admin_left');
            $this->load->view('user/edit', $data);
            $this->load->view('template/admin_footer');
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'full_name' => $this->input->post('fullname'),          
                'email' => $this->input->post('email'),
                // 'balance' => $this->input->post('balance'),
                'profile_image' => $profileImage,
                'status' => $this->input->post('status'),
                'updatedOn' => time()
            );
            if($this->input->post('password')) {
                $data['password'] = $this->input->post('password');
            }
            
            if($this->db->update('tbl_admin', $data, array('id' => $userId))) {

                $sessionData = $this->session->userdata('logged_in');
                $sessionData['username'] = $this->input->post('username');
                $sessionData['email'] = $this->input->post('email');
                $sessionData['fullname'] = $this->input->post('fullname');
                $sessionData['profileimage'] = $profileImage;

                $this->session->set_userdata('logged_in', $sessionData);                

                $this->session->set_flashdata('response', '<div class="alert alert-success">Profile Updated Successfully</div>');
            } else {
            $this->session->set_flashdata('response', '<div class="alert alert-danger">Failed to updated profile.</div>');
            }    
            redirect($this->controller.'/profile/'.$userId, 'refresh');
        }
    
    }

    /* Open edit vehicle type form by Vehicle type ID */
    public function  forgot(){
        // Checking if User already logged in
        if ($this->session->userdata('logged_in')) {
            redirect('admin');
        }

        $data['controller'] = $this->controller;
        $this->load->view('template/login_layout');
        $this->load->view($this->controller.'/forgot_password', $data);
    }

    /* Open edit vehicle type form by Vehicle type ID */
    public function  forgotpassword(){
        // Checking if User already logged in
        if ($this->session->userdata('logged_in')) {
            redirect('admin');
        }

        $this->form_validation->set_error_delimiters('<p style="color:red;" >', '</p>');
        $this->form_validation->set_rules('email', 'Email Id', 'trim|required|callback_email_check'); 

        if ($this->form_validation->run() == FALSE) {
            $data['controller'] = $this->controller;
            $this->load->view('template/login_layout');
            $this->load->view($this->controller.'/forgot_password', $data);                
        } else {
            $this->session->set_flashdata('response', '<div class="alert alert-success">Password reset link has been successfully sent on your email.</div>');
            redirect($_SERVER['HTTP_REFERER']);
        }
         
    }

    /**
    * [This Method Checks the email if exist in database or not]
    * @param  [email] $email [user email] 
    */

    function email_check($name) {
        $data = $this->User_model->checkEmailExist($name);              
        if ($data) {
            $this->load->helper('string');

            $activationKey = random_string('alnum', 10);
            $this->db->where('id', $data->id);
            $this->db->update('tbl_admin', array('activation_key' => $activationKey));

            $emailTemplate = $this->User_model->getEmailTemplate('forgot_password_admin');
            $toMail = $data->email;
            $subject = $emailTemplate['subject'];        
            $emailContant = $emailTemplate['description'];

            $clickLink = BASE_URL.'/user/resetverify/'. $data->id .'/'.$activationKey;

            $content = str_replace('{{contact_person}}', $data->full_name, $emailContant);
            $content = str_replace('{{email_logo_url}}', SHOW_EMAIL_LOGO, $content);
            $content = str_replace('{{click_link}}', $clickLink, $content);
            $content = str_replace('{{site_name}}', SITE_NAME, $content);
            $content = str_replace('{{year}}', date('Y'), $content);
            
            sendMailAdmin($toMail, $subject, $content);
            return true;           
        } else {        
            $this->form_validation->set_message('email_check', 'Email Id not registered');   
            return false;
        }
    }

    /**
     * [This method verfies the password]
     * @param  [int] $member        [member id]
     * @param  [string] $activationKey [activation key] 
     */
    public function resetverify($admin,$activationKey){
        if($admin==null || $activationKey==null){
            redirect('user/login');
        }
        
        if(!$this->User_model->verify_resetPassword($admin,$activationKey)){
            redirect('/','refresh');
        }

        $dataArray = array(
            'adminId' => $admin
        );
        
        $data['controller'] = $this->controller;
        $this->session->set_userdata( $dataArray );

        $this->load->view('template/login_layout');
        $this->load->view($this->controller.'/reset', $data);
    }

    /**
     * [This Method loads the reset form after redirecting from reset password mail]
     *  Maps to http://example.com/index.php/reset
     *  
     */
    public function reset(){
        $data['controller'] = $this->controller;

        $this->form_validation->set_error_delimiters('<p style="color:red;">', '</p>');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[4]');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]');
        
        if ($this->form_validation->run() == TRUE && $this->User_model->changePassword($this->session->userdata('adminId'))) {
            $this->session->set_flashdata('response', '<div class="alert alert-success">Password changed successfully.</div>');
        }

        $this->load->view('template/login_layout');
        $this->load->view($this->controller."/reset",$data); //Load view
    }


}