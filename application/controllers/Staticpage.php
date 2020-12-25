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

class Staticpage extends CI_Controller{

	function __construct() {
		parent::__construct();
		$this->table = 'tbl_staticpages';        
		$this->load->model('Staticpage_model');
		$this->controller = $this->router->fetch_class();
	}

	/* Get all list of meeting type */
	public function index() {
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$data['controller'] = $this->controller;

		$data['pagelist'] = $this->Staticpage_model->allpages();
		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('staticpage/index', $data);
		$this->load->view('template/admin_footer');
	}


	/* Get meeting details by meeting type ID */
	public function details($id) {
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$data['controller'] = $this->controller;
		$data['details'] = $this->Staticpage_model->pageEditDetails($id);
		//$data['meeting_added'] = changeDateFormat($data['details']['addedOn']);
		$data['addedOn'] = changeDateFormat($data['details']['addedOn']);

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('staticpage/details', $data);
		$this->load->view('template/admin_footer');
	}

	/* Open edit meeting type form by Meeting type ID */
	public function edit($id){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$data['details'] = $this->Staticpage_model->pageEditDetails($id);
		$data['controller'] = $this->controller;        

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('staticpage/edit', $data);
		$this->load->view('template/admin_footer');
	}

	/* Update meeting type form data by Meeting type ID */
	public function update_page(){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		$data['controller'] = $this->controller;
		$id = $this->input->post('page_id');
		$data['details'] = $this->Staticpage_model->pageEditDetails($id);

		$this->form_validation->set_error_delimiters('<p class="help-block" style="color:red;">', '</p>');

		$this->form_validation->set_rules('pagename', 'Page Name', 'required');
		$this->form_validation->set_rules('content', 'Content', 'required');
	   if($this->form_validation->run() == FALSE || isset($data['error'])){ 
			$data['controller'] = $this->controller;
			$data['details'] = $this->Staticpage_model->pageEditDetails($id);
	        $this->load->view('template/admin_header');
			$this->load->view('template/admin_left');
			$this->load->view('staticpage/edit', $data);
			$this->load->view('template/admin_footer');
		} else {
			$meta_title = $this->input->post('meta_title');
			$meta_description = $this->input->post('meta_description');
			$meta_keywords = $this->input->post('meta_keywords');
			$h1_tag = $this->input->post('h1_tag');
			$h2_tag = $this->input->post('h2_tag');
			$h3_tag = $this->input->post('h3_tag');
			$image_alt_1 = $this->input->post('image_alt_1');
			$image_alt_2 = $this->input->post('image_alt_2');
			$image_alt_3 = $this->input->post('image_alt_3');
			$image_alt_4 = $this->input->post('image_alt_4');
			$image_alt_5 = $this->input->post('image_alt_5');
			$robots = $this->input->post('robots');
			$revisit_after = $this->input->post('revisit_after');
			$og_local = $this->input->post('og_local');
			$og_type = $this->input->post('og_type');
			$og_image = $this->input->post('og_image');
			$og_tag = $this->input->post('og_tag');
			$og_title = $this->input->post('og_title');
			$og_url = $this->input->post('og_url');
			$og_description = $this->input->post('og_description');
			$og_site_name = $this->input->post('og_site_name');
			$author = $this->input->post('author');
			$canonical = $this->input->post('canonical');
			$geo_region = $this->input->post('geo_region');
			$geo_place_name = $this->input->post('geo_place_name');
			$geo_position = $this->input->post('geo_position');
			$icbm = $this->input->post('icbm');


			$data = array(
				'page_name' => $this->input->post('pagename'),
				'meta_title' => $meta_title,
				'meta_description' => $meta_description,
				'meta_keywords' => $meta_keywords,
				'h1_tag' => $h1_tag,
				'h2_tag' => $h2_tag,
				'h3_tag' => $h3_tag,
				'image_alt_1' => $image_alt_1,
				'image_alt_2' => $image_alt_2,
				'image_alt_3' => $image_alt_3,
				'image_alt_4' => $image_alt_4,
				'image_alt_5' => $image_alt_5,
				'robots' => $robots,
				'revisit_after' => $revisit_after,
				'og_local' => $og_local,
				'og_type' => $og_type,
				'og_image' => $og_image,
				'og_tag' => $og_tag,
				'og_title' => $og_title,
				'og_url' => $og_url,
				'og_description' => $og_description,
				'og_site_name' => $og_site_name,
				'author' => $author,
				'canonical' => $canonical,
				'geo_region' => $geo_region,
				'geo_place_name' => $geo_place_name,
				'geo_position' => $geo_position,
				'icbm' => $icbm,
				'content' => $this->input->post('content'),
				'addedOn' => date("Y-m-d h:i:s"),

			);

			if($this->db->update($this->table, $data, array('id' => $id))) {
				$this->session->set_flashdata('response', '<div class="alert alert-success">Page Updated Successfully</div>');
			} else {
				$this->session->set_flashdata('response', '<div class="alert alert-danger">Failed to updated Page.</div>');
			}    
			redirect($this->controller, 'refresh');
		}
	
	}	

	public function name_check_list($name){
		//echo $name;
		$pageid = $this->input->post('page_id');
		$this->db->where('page_name',$name);
		$this->db->where_not_in('id', $pageid);
		echo "test";
		echo $this->db->last_query();exit;
		if($this->db->count_all_results($this->table) > 0){
			$this->form_validation->set_message('name_check', 'The page can not be same');
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
		
		if($this->input->post('statusvalue')) {
			$statusVal = 0;
			$statusRow = '<span statusid='.$statusid.' statusvalue='.$statusVal.' controllername='.$controllername.' style="color: #ff0000; cursor: pointer;"  title="In Active"><i class="fa fa-2x fa-ban" aria-hidden="true"></i></span>';
		} else {
			$statusVal = 1;
			$statusRow = '<span statusid='.$statusid.' statusvalue='.$statusVal.' controllername='.$controllername.'  style="color: #00a65a; cursor: pointer;" title="Active"><i class="fa fa-2x fa-check" aria-hidden="true"></i></span>';
		}
		
		$changes = $this->Staticpage_model->changeStatus($statusid, $statusVal);
		if($changes) {
			echo $statusRow;
		} else {
			echo 'Server problem';
		}
	}

    /* Get CMS details by ID */
    public function view($id) {
        $data['controller'] = $this->controller;
        $data['details'] = $this->Staticpage_model->pageEditDetails($id);
        //echo "<pre>";print_r($data['details']);die;
        
        $this->load->view('template/header');        
        $this->load->view('staticpage/view', $data);
        $this->load->view('template/footer');
    }

}
