<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Author       :Mohit sharma
 * Company      :Scource Soft
 * website      :http://www.sourcesoftsolutions.com/
 * date         :17-may-2017.
 * Controller   :Giver 	 
 */

class Home extends CI_Controller{

	function __construct() {
		parent::__construct();
		// $this->table = 'tbl_faqs';        
		$this->load->model('Home_model');
		$this->load->model('Service_model');
		$this->controller = $this->router->fetch_class();
	}

	/* Get all list of user interest */
	public function index() {
		
		$data['allBanners'] = $this->Home_model->getHomeBanners(); // get home banner data
		$data['amazingServices'] = $this->Home_model->getPageData('amazing_services');
		$data['allPackages'] = $this->Home_model->getAllPackages();
		$data['ourPricing'] = $this->Home_model->getPageData('our_pricing_content');
		$data['ourPackagesPricing'] = $this->Home_model->getPageData('our_packages_pricing');
		$data['footerContent'] = $this->Home_model->getPageData('footer_content');
		$data['aboutCompany'] = $this->Home_model->getPageData('about-company');
		$this->load->view('template/front/header', $data);
		$this->load->view('home/index', $data);
		$this->load->view('template/front/footer', $data);
	}


/* Get CMS details by page name */
    public function getPageData($page) {
        $data['controller'] = $this->controller;
        $data['allPackages'] = $this->Home_model->getAllPackages();
        $data['ourPackagesPricing'] = $this->Home_model->getPageData('our_packages_pricing');
		$data['footerContent'] = $this->Home_model->getPageData('footer_content');
		$data['aboutCompany'] = $this->Home_model->getPageData('about-company');
        $data['details'] = $this->Home_model->getPageData($page);
        //echo "<pre>";print_r($data['details']);die;
        
        $this->load->view('template/front/inner-header', $data);        
        $this->load->view('home/page', $data);
        $this->load->view('template/front/footer', $data);
    }


    public function contact_us(){
    	$data['controller'] = $this->controller;
        $data['allPackages'] = $this->Home_model->getAllPackages();
		$data['footerContent'] = $this->Home_model->getPageData('footer_content');
		$data['aboutCompany'] = $this->Home_model->getPageData('about-company');
    	$this->load->view('template/front/inner-header', $data);        
        $this->load->view('home/contact_us', $data);
        $this->load->view('template/front/footer', $data);
    }


    

// Contact US Page
	public function contact_us___(){
		// $data['pageData'] = $this->Home_model->getPageData('contact_us');
		if(isset($_POST)){
			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('phone', 'Phone', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('subject', 'Subject', 'trim|required');
            $this->form_validation->set_rules('message', 'Message', 'trim|required');
            if($this->form_validation->run() == FALSE ){
                $this->load->view('template/front/header');
				$this->load->view('home/contact_us');
				$this->load->view('template/front/footer');
            } else {
            	// $name =  $this->input->post('name');
            	// $phone =  $this->input->post('phone');
             //    $email = $this->input->post('email');
             //    $subject =  $this->input->post('subject');
             //    $message =  $this->input->post('message');
                $data = array(
                    'name' => $this->input->post('name'),
                    'phone' => $this->input->post('phone'),
                    'email' => $this->input->post('email'),
                    'subject' => $this->input->post('subject'),
                    'message' => $this->input->post('message'),
                );
                $res = $this->Home_model->add("tbl_enquiry", $data);
                if($res) {
                $this->session->set_flashdata('response', '<div class="alert alert-success">Enquiry added successfully.</div>');
                } else {
                    $this->session->set_flashdata('response', '<div class="alert alert-danger">Failed to submit enquiry.</div>');
                }
                redirect('/contact-us', 'refresh');
            }
		}
		$this->load->view('template/front/header');
		$this->load->view('home/contact_us');
		$this->load->view('template/front/footer');
	}

// Site Map Page

	public function site_map(){ 
		$data['allPackages'] = $this->Home_model->getAllPackages();
        $data['ourPackagesPricing'] = $this->Home_model->getPageData('our_packages_pricing');
		$data['footerContent'] = $this->Home_model->getPageData('footer_content');
		$data['aboutCompany'] = $this->Home_model->getPageData('about-company');
		$this->load->view('template/front/header', $data);
		$this->load->view('home/site_map');
		$this->load->view('template/front/footer', $data);
	}


// About US Page
	public function about_us(){ 
		$data['pageData'] = $this->Home_model->getPageData('about_us');
		// echo '<pre>'; print_r($data); die;
		$this->load->view('template/front/header');
		$this->load->view('home/content_page', $data);
		$this->load->view('template/front/footer');
	}

// Terms & Conditions Page
	public function terms_conditions(){
		$data['pageData'] = $this->Home_model->getPageData('terms_and_condition');
		$this->load->view('template/front/inner-header');
		$this->load->view('home/content_page', $data);
		$this->load->view('template/front/footer');
	}

// Privacy Policy Page
	public function privacy_policy(){
		$data['pageData'] = $this->Home_model->getPageData('privacy_policy');
		$this->load->view('template/front/inner-header');
		$this->load->view('home/content_page', $data);
		$this->load->view('template/front/footer');
	}

// FAQ's Page
	public function how_to_work(){
		$data['pageData'] = $this->Home_model->getPageData('help');
		$this->load->view('template/front/inner-header');
		$this->load->view('home/content_page', $data);
		$this->load->view('template/front/footer');
	}


/* Function for get seo keywords details start */
public function getSeoKeywordDetails($slug){
        $data['seoKeywordData'] = $this->Home_model->seoKeywordDetails($slug);

        $data['allBanners'] = $this->Home_model->getHomeBanners(); // get home banner data
        $data['amazingServices'] = $this->Home_model->getPageData('amazing_services');
        $data['allPackages'] = $this->Home_model->getAllPackages();
        $data['ourPricing'] = $this->Home_model->getPageData('our_pricing_content');
        $data['ourPackagesPricing'] = $this->Home_model->getPageData('our_packages_pricing');
        $data['footerContent'] = $this->Home_model->getPageData('footer_content');
        $data['aboutCompany'] = $this->Home_model->getPageData('about-company');
        $this->load->view('template/front/header', $data);
        $this->load->view('home/seo_page', $data);
        $this->load->view('template/front/footer', $data);
    }
    
/* Function for get seo keywords details start */



	public function user_enquiry() {
	    if(!empty($_POST)){
	        $first_name = $_POST['first_name'];
	        $last_name = $_POST['last_name'];
	        $phone = $_POST['phone'];
	        $email = $_POST['email'];
	        $interest = $_POST['interest'];
	        $message = $_POST['message'];

            // $bookingCode  = $this->random_code(10);
            $data = array(
                'name' => $first_name.' '.$last_name,
                'phone' => $phone,
                'email' => $email,
                'subject' => $interest,
                'message' => $_POST['message'],
            );
	            // echo "<pre>"; print_r($data); die;
	        $result = $this->Home_model->add("tbl_enquiry", $data);

            if($result) {
                $res = "success";
            } else {
                $res = "error";
            }   
            echo $res;
	        
	    }
	}





}
