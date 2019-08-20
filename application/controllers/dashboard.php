<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * This class is used to show Dashboard screen. In this, login user can edit his/her profile.
 * Also this includes methods to check login user details like profile, login, logout etc.
 * @author Gargi Sharma
 */
class Dashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();	
		$this->load->model('dashboard_model');
		$this->userid= $this->session->userdata('userId');
	}

	/**
	 * Index Page for this controller.
	 */
	public function index(){
		$userid= $this->userid;
		if(!empty($userid)){		
			$data['getUserData']= $this->dashboard_model->getUserData($userid);			
			$this->load->view('frontend/dashboard',$data);
		}else{
			$this->load->view('frontend/login');
		}
	}

	/**
	 * Edit User Profile
	 */
	public function editProfile(){
		$userid= $this->userid;
		$data = array(
			'username'=>$_POST['username'],
			'password'=>md5($_POST['password']),
			'date' =>  (new DateTime('now'))->format('Y-m-d H:i:s'),			
		);		
		$this->dashboard_model->editProfile($data,$userid);
		$this->session->set_flashdata('msg', 'Your Profile has been updated Successfully!!! Login again!!');
		redirect('dashboard');				
	}
	
	/**
	 * Destroy the session.
	 */
	public function logout(){
		$userid = $this->session->userdata('userId');
		$this->session->sess_destroy();
		$this->load->view('frontend/login');
	}
}