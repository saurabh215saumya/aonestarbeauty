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

class Package extends CI_Controller{

	function __construct() {
		parent::__construct();
		$this->table = 'tbl_packages';        
		$this->load->model('Package_model');
		$this->load->model('Home_model');
		$this->controller = $this->router->fetch_class();
	}

	/* Get all list of circle */
	public function index() {
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$data['controller'] = $this->controller;

		$data['allpackages'] = $this->Package_model->allMalePackages();
		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('package/index', $data);
		$this->load->view('template/admin_footer');
	}


	public function female_package() {
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$data['controller'] = $this->controller;

		$data['allpackages'] = $this->Package_model->allFeMalePackages();
		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('package/female_package', $data);
		$this->load->view('template/admin_footer');
	}

	

	/* Open edit workout type form by workout type ID */
	public function edit($id){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$data['details'] = $this->Package_model->packageDetails($id);
		$data['controller'] = $this->controller;

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('package/edit', $data);
		$this->load->view('template/admin_footer');
	}



	/* Update workout type form data by workout type ID */
	public function update_package(){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		$data['controller'] = $this->controller;
		$package_id = $this->input->post('package_id');
		$data['details'] = $this->Package_model->packageDetails($package_id);

		$this->form_validation->set_error_delimiters('<p class="help-block" style="color:red;">', '</p>');
		// $this->form_validation->set_rules('category_type', 'Category Type', "trim|required");
		$this->form_validation->set_rules('package_name', 'Package Name', "trim|required");
		$this->form_validation->set_rules('description', 'Description', "trim|required");
		$this->form_validation->set_rules('status', 'Status', 'trim|required|integer');
		$oldImage = $this->input->post('image_file_name');	
		
		// $cType = $this->input->post('category_type');
		$cType = 2;
		if($this->form_validation->run() == FALSE ){ 
			$data['controller'] = $this->controller;
			$data['details'] = $this->Package_model->packageDetails($package_id);

			$this->load->view('template/admin_header');
			$this->load->view('template/admin_left');
			$this->load->view('package/edit', $data);
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
				'category_type' => $cType,
				'package_name' => $this->input->post('package_name'),
				'page_title' => $this->input->post('page_title'),
				'page_slug' => $this->input->post('page_slug'),
				'package_slug' => $this->input->post('package_slug'),
				'description' => $this->input->post('description'),
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
				'status' => $this->input->post('status'),
				// 'updatedOn' => $current_time,
			);

			$uploads_dir = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/packages/";
			$image = $_FILES['banner_image_file'];
			if (!empty($image['name']) && $image['error'] <= 0) {
				// Get Image Dimension
			    $fileinfo = @getimagesize($image["tmp_name"]);
			    $width = $fileinfo[0];
			    $height = $fileinfo[1];

				$tmp_name    = $image["tmp_name"];
				$imgName     = pathinfo($image['name']);
				$ext         = strtolower($imgName['extension']);
				$newImgName  = substr(preg_replace('/[^a-zA-Z0-9\._]/', '_',$image['name']), 0, 50);
				$newImgName  = $newImgName . time() . "." . $ext;
				
				if (move_uploaded_file($tmp_name, $uploads_dir . '/' . $newImgName)) {
					$data['image'] = $newImgName;
				}

				$filename = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/packages/".$oldImage;
				if (file_exists($filename)) {
				    unlink($filename);
				}
			}


			/* $uploads_dir = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/packages/";
			$image = $_FILES['banner_image_file'];

			if(!empty($image['name']) && $image['error'] <= 0){
				$tmp_name    = $image["tmp_name"];

				$imgName     = pathinfo($image['name']);
				$ext         = strtolower($imgName['extension']);
				$newImgName  = substr(preg_replace('/[^a-zA-Z0-9\._]/', '_',$image['name']), 0, 50);
				$newImgName  = $newImgName . time() . "." . $ext;
				$uploadPath = $uploads_dir . '/' . $newImgName;
				
				if (move_uploaded_file($tmp_name, $uploadPath)) {
					$newFile = $uploads_dir .'/'. $newImgName;

					$source_properties = getimagesize($uploadPath);
					$image_type = $source_properties[2];

					if( $image_type == IMAGETYPE_JPEG ) {
						$uploadPath = imagecreatefromjpeg($uploadPath); 
						$uploadPath = fn_resize($uploadPath,$source_properties[0],$source_properties[1],1350,530);
						$newImageName = imagejpeg($uploadPath, $newFile);
					} else if( $image_type == IMAGETYPE_GIF )  {  
						$uploadPath = imagecreatefromgif($uploadPath); 
						$uploadPath = fn_resize($uploadPath,$source_properties[0],$source_properties[1],1350,530);
						$newImageName = imagegif($uploadPath, $newFile);
					} elseif( $image_type == IMAGETYPE_PNG )  {  
						$uploadPath = imagecreatefrompng($uploadPath); 
						$uploadPath = fn_resize($uploadPath,$source_properties[0],$source_properties[1],1350,530);
						$newImageName = imagepng($uploadPath, $newFile);
					}
					$data['image'] = $newImgName;
				}
				$filename = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/services/".$oldImage;
				if (file_exists($filename)) {
				    unlink($filename);
				}
			} */

			if($this->db->update($this->table, $data, array('id' => $package_id))) {
				$this->session->set_flashdata('response', '<div class="alert alert-success">Package Updated Successfully</div>');
			} else {
				$this->session->set_flashdata('response', '<div class="alert alert-danger">Failed to updated package.</div>');
			}
			if($cType == 1){
				redirect($this->controller, 'refresh');
			} else {
				redirect($this->controller.'/female_package', 'refresh');
			}
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

		$changes = $this->Package_model->changeStatus($statusid, $statusVal);
		if($changes) {
			echo $statusRow;
		} else {
			echo 'Server problem';
		}
	}

	/* Open add new workout type form */
	public function  addPackage(){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		$data['controller'] = $this->controller;

		$this->load->view('template/admin_header');
		$this->load->view('template/admin_left');
		$this->load->view('package/add_package', $data);
		$this->load->view('template/admin_footer');
	}

	/* Add new workout type form data with validation */
	public function add_newpackage(){
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}

		$data['controller'] = $this->controller;
		$this->form_validation->set_error_delimiters('<p class="help-block" style="color:red;">', '</p>');
		// $this->form_validation->set_rules('category_type', 'Category Type', "trim|required");
		$this->form_validation->set_rules('package_name', 'Menu Name', "trim|required");
		$this->form_validation->set_rules('description', 'Description', "trim|required");
		$this->form_validation->set_rules('status', 'Status', 'trim|required|integer');

		if($this->form_validation->run() == FALSE ){
			$data['controller'] = $this->controller;

			$this->load->view('template/admin_header');
			$this->load->view('template/admin_left');
			$this->load->view('package/add_package', $data);
			$this->load->view('template/admin_footer');
		} else {
			// $current_time = date("Y-m-d");
			// $cType = $this->input->post('category_type');
			$cType = 2;

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

			$insert_data = array(
				'category_type' => $cType,
				'package_name' => $this->input->post('package_name'),
				'page_title' => $this->input->post('page_title'),
				'page_slug' => $this->input->post('page_slug'),
				'package_slug' => $this->input->post('package_slug'),
				'description' => $this->input->post('description'),
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
				'status' => $this->input->post('status'),
				'addedOn' => date("Y-m-d H:i:s"),
			);

			$uploads_dir = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/packages/";
			$image = $_FILES['banner_image_file'];
			if (!empty($image['name']) && $image['error'] <= 0) {
				// Get Image Dimension
			    $fileinfo = @getimagesize($image["tmp_name"]);
			    $width = $fileinfo[0];
			    $height = $fileinfo[1];

				$tmp_name    = $image["tmp_name"];
				$imgName     = pathinfo($image['name']);
				$ext         = strtolower($imgName['extension']);
				$newImgName  = substr(preg_replace('/[^a-zA-Z0-9\._]/', '_',$image['name']), 0, 50);
				$newImgName  = $newImgName . time() . "." . $ext;
				
				if (move_uploaded_file($tmp_name, $uploads_dir . '/' . $newImgName)) {
					$insert_data['image'] = $newImgName;
				}
			}

			//echo '<pre>'; print_r($insert_data); die;
			/*$uploads_dir = dirname($_SERVER["SCRIPT_FILENAME"])."/uploads/packages/";
			$image = $_FILES['banner_image_file'];
			if(!empty($image['name']) && $image['error'] <= 0){
				$tmp_name    = $image["tmp_name"];
				$imgName     = pathinfo($image['name']);
				$ext         = strtolower($imgName['extension']);
				$newImgName  = substr(preg_replace('/[^a-zA-Z0-9\._]/', '_',$image['name']), 0, 50);
				$newImgName  = $newImgName . time() . "." . $ext;
				$uploadPath = $uploads_dir . '/' . $newImgName;
				
				if (move_uploaded_file($tmp_name, $uploadPath)) {
					$newFile = $uploads_dir .'/'. $newImgName;

					$source_properties = getimagesize($uploadPath);
					$image_type = $source_properties[2];

					if( $image_type == IMAGETYPE_JPEG ) {
						$uploadPath = imagecreatefromjpeg($uploadPath); 
						$uploadPath = fn_resize($uploadPath,$source_properties[0],$source_properties[1],1350,530);
						$newImageName = imagejpeg($uploadPath, $newFile);
					} else if( $image_type == IMAGETYPE_GIF )  {  
						$uploadPath = imagecreatefromgif($uploadPath); 
						$uploadPath = fn_resize($uploadPath,$source_properties[0],$source_properties[1],1350,530);
						$newImageName = imagegif($uploadPath, $newFile);
					} elseif( $image_type == IMAGETYPE_PNG )  {  
						$uploadPath = imagecreatefrompng($uploadPath); 
						$uploadPath = fn_resize($uploadPath,$source_properties[0],$source_properties[1],1350,530);
						$newImageName = imagepng($uploadPath, $newFile);
					}
					$insert_data['image'] = $newImgName;
				}
			}*/
			if($this->db->insert($this->table, $insert_data)){
				$this->session->set_flashdata('response', '<div class="alert alert-success">Menu Added Successfully</div>');
			} else {
				$this->session->set_flashdata('response', '<div class="alert alert-danger">Failed to Add New Menu.</div>');
			}
			if($cType == 1){
				redirect($this->controller, 'refresh');
			} else {
				redirect($this->controller.'/female_package', 'refresh');
			}
		}
	}

	/* Delete data on click */
	public function delete($id) {
		if (!$this->session->userdata('logged_in')) {
			redirect('user/login');
		}
		$deleted = $this->Package_model->deleteRecord($id);
		if($deleted) {
			redirect($this->controller, 'refresh');
		} else {
			redirect($this->controller, 'refresh');
		}
	}




	public function getAllCategoryPackage(){
		$id = $_POST['category_type'];
		$packageArr = $this->Package_model->getAllCategoryPackage($id);
		$dataArr = '<option value="">Select Package</option>';
		if(!empty($packageArr)){
			foreach($packageArr as $package){
				$dataArr .= '<option value="'.$package['id'].'">'.$package['package_name'].'</option>';
			}
		}
		echo $dataArr;
	}







/* Front-End Section Start */
	public function packageDetail(){
		$slug = $this->uri->segment('1');
		$data['controller'] = $this->controller;
		$data['packageId'] = $slug;
		$packageId = getPackageId($slug);
		$data['allPackages'] = $this->Home_model->getAllPackages();
		$data['packageDetails'] = $this->Package_model->getPackageDetails($slug);
		$data['aboutCompany'] = $this->Home_model->getPageData('about-company');
		$data['footerContent'] = $this->Home_model->getPageData('footer_content');
		$data['allPackageServices'] = $this->Package_model->getPackageServices($packageId);

		$this->load->view('template/front/inner-header', $data);
		$this->load->view('package/package_detail', $data);
		$this->load->view('template/front/book_appointment', $data);
		$this->load->view('template/front/footer', $data);
	}

	public function random_code( $length = 8 ) {
	    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+";
	    $code = substr( str_shuffle( $chars ), 0, $length );
	    return $code;
    }

	public function book_appointment() {
	    if(!empty($_POST)){
	        $name = $_POST['name'];
	        $phone = $_POST['phone'];
	        $email = $_POST['email'];
	        $appointment_date = $_POST['appointment_date'];
	        $message = $_POST['message'];

            $bookingCode  = $this->random_code(10);
            $data = array(
                'name' => $name,
                'phone' => $phone,
                'email' => $email,
                'appointment_date' => $appointment_date,
                'message' => $_POST['message'],
                'booking_code' => $bookingCode,
            );
	            echo "<pre>"; print_r($data); die;
	        $result = $this->Package_model->add("tbl_appointment", $data);

            if($result) {
            	$from_mail = ADMIN_EMAIL;
	            $from_name  = "Aonestarbeauty";
	            
	            $subject        =   'Aonestarbeauty: Appointment';
	            $send_message   =   'Dear Admin,'. "</br>"."\r\n";;
	            $send_message   .=  $name.' send a appointment for '.$appointment_date.'</b>'. "</br>";

	            $send_message.='<br>Thanks & Regards';
	            $send_message.='<br>Aonestarbeauty Teams';        
	            
	            $is_sent = sendMailAdmin(ADMIN_EMAIL, $subject, $send_message, $from_mail, $from_name);
            /*$from_mail = "no-reply@md-foods.com";
            $from_name  = "MD-Foods";
            
            $subject        =   'MD-Foods: Email verification';
            $send_message   =   'Dear '.$first_name.' '.$last_name.','. "</br>";
            $send_message   .=  'Your Email is : <b>'.$email.'</b>'. "</br>";
            $send_message   .=  'Your Password is : <b>'.$password.'</b>'. "</br>";
            // $send_message   .=  'Login URL:<b>'. base_url().'/login'. '</b>'."\r\n";

            $send_message.='<br>Thanks & Regards';
            $send_message.='<br>MD-Foods Teams';        
            
            $is_sent = sendMail($user_email, $subject, $send_message, $from_mail, $from_name);
                if ($is_sent) {
                        $this->session->set_flashdata('response', '<div class="alert alert-success">User created Successfully and mail has been sent to the provided user Email ID.</div>');
                } else {
                    $this->session->set_flashdata('response', 'User created Successfully, Failed to send password to user email.');
                }*/
                $res = "success";
            } else {
                $res = "error";
            }   
            echo $res;
	        
	    }
	}
/* Function for user signup start */
/* Front-End Section End */














}
