<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * This class is used to display the login page.
 * @author Gargi Sharma
 */
class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();	
		$this->load->model('login_model');
		$this->userid= $this->session->userdata('userId');
	}
	
	/**
	 * Login Page.
	 */
	public function index()
	{
		$this->load->view('frontend/login');
	}

	/**
	 * For checking logged in.
	 */
	public function checklogin(){
		if(!empty($_POST['user']) && !empty($_POST['password'])){
			$name= $_POST['user'];
			$password= md5($_POST['password']);
			$checkuser= $this->login_model->checklogin($name,$password);

			if(!empty($checkuser)){
				$roleid= $this->login_model->getroleid($checkuser->id);
			
				$session = array(
						'userId'=>$checkuser->id,
						'userName'=>$checkuser->username,
						'roleName' => $roleid[0]->roleName
				);
				$this->session->set_userdata($session);
				$this->session= $this->session->userdata('userId');
				redirect('dashboard');
			}else{
				//error messages for wrong username password
				$this->session->set_flashdata('msg', 'Wrong username or Password!!!');
				redirect('login');
			}
		}else{
			$this->load->view('frontend/login');
		}
	}

	
}