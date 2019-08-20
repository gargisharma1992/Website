<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * This class is used to display the registeration page, create new account, and check for the validations
 * @author Gargi Sharma
 */
class Register extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('register_model');
		$this->userid= $this->session->userdata('userId');
	}
	/**
	 * Register Page View.
	 */
	public function index(){
		$this->load->view('frontend/register');
	}

	/**
	 * Register account
	 */
	public function createAccount(){
		if(!empty($_POST['username']) && !empty($_POST['password'])  && !empty($_POST['email'])) {		
			$data = array(
				'username'=>$_POST['username'],
				'password'=>md5($_POST['password']),
				'email'=>$_POST['email'],			
				'roleName'=>"2",
				'date' =>  (new DateTime('now'))->format('Y-m-d H:i:s'),			
			);

			 $this->register_model->createAccount($data);
			 $this->session->set_flashdata('success-message', 'User has been created Successfully');
			 redirect('login');		
		}
	}

	/**
	 * Check if the username is already exists
	 */
	public function checkUsernameExists(){
		if (isset($_POST['username'])) {
			$username = $_POST['username'];
			$results = $this->register_model->checkUsernameExists($username);	
			echo json_encode($results);			
		} else {
			echo '<span style="color:red;">Username is required field.</span>';
		}
	}

	/**
	 * Check if the email is already exists
	 */
	public function checkEmailExists(){
		if (isset($_POST['email'])) {
			$email = $_POST['email'];
			$results = $this->register_model->checkEmailExists($email);	
			echo json_encode($results);			
		} else {
			echo '<span style="color:red;">Email is required field.</span>';
		}
	}
	
}