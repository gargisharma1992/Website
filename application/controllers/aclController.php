<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * This class is used for Access Control System. In this, there will be some Permissions which ares assigned to some 
 * Roles and roles are assigned to the users.
 * @author Gargi Sharma
 */
class AclController extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('acl_model');
		$this->userid= $this->session->userdata('userId');
	}

	/**
	 * Display the List of users
	 */
	public function showUsersList(){
		$userid= $this->userid;
		if(!empty($userid)){
			$data['users'] = $this->acl_model->getUserData();	
			$this->load->view('frontend/showUsersList',$data);
		}else{
			$this->load->view('frontend/login');
		}
	}
	
	/**
	 * Display the user Form to add users
	 */
	public function showUserForm(){
		$userid= $this->userid;
		if(!empty($userid)){
			$data['roles'] = $this->acl_model->getRoles();
			$this->load->view('frontend/userForm',$data);
		}else{
			$this->load->view('frontend/login');
		}
	}

	/**
	 * Add the users
	 */
	public function addUsers(){	
		$userid= $this->userid;
		if(!empty($userid)){
			if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['roleName'])){
				$data = array(
				'username' =>  $_POST['username'],
				'password' =>  md5($_POST['password']),
				'roleName' =>  $_POST['roleName'],
				'date' =>  (new DateTime('now'))->format('Y-m-d H:i:s'),
				);	
				$this->acl_model->addUsers($data);
				redirect('aclController/showUsersList');
			}	
		}else{
			$this->load->view('frontend/login');
		}	
	} 
	

	/**
	 * Display the form to edit a user
	 */
	public function editUserForm($id){
		$userid= $this->userid;
		if(!empty($userid)){
			$data['getroles'] = $this->acl_model->getroles();
			$data['getSavedUser'] = $this->acl_model->getSavedUser($id);

			//echo'<pre>';print_r($data); echo'</pre>';die;
			$this->load->view('frontend/editUserForm',$data);
		}else{
			$this->load->view('frontend/login');
		}
	}

	/**
	 * Edit user
	 */
	public function editUser(){	
		$id = $_POST['id'];
		$userid= $this->userid;
		if(!empty($userid)){				
			$data = array(
				'username' =>  $_POST['username'],
				'roleName' =>  $_POST['roleName'],
				);	
			 $this->acl_model->editUser($id,$data);

			$this->session->set_flashdata('msg', 'User has been updated Successfully');
			redirect('aclController/showUsersList');
		}else{
			$this->load->view('frontend/login');
		}
	}

	/**
	 * Delete user
	 */
	public function deleteUser($id){
		$userid= $this->userid;
		if(!empty($userid)){
			$users = $this->acl_model->deleteUser($id);
			$this->session->set_flashdata('msg', 'User has been deleted Successfully');
			redirect('aclController/showUsersList');	
		}else{
			$this->load->view('frontend/login');
		}	
	}


	// Roles ---------------------------------------------------------
	/**
	 * Display the list of Roles
	 */
	public function showRolesList(){
		$userid= $this->userid;
		if(!empty($userid)){
			$data['roles'] = $this->acl_model->getRolesData();	
			$this->load->view('frontend/showRolesList',$data);
		}else{
			$this->load->view('frontend/login');
		}
	}

	/**
	 * Display the form to add a role
	 */
	public function showRolesForm(){
		$userid= $this->userid;
		if(!empty($userid)){
			$data['permission'] = $this->acl_model->getPermissions();
			$this->load->view('frontend/roleForm',$data);
		}else{
			$this->load->view('frontend/login');
		}
	}

	/**
	 * Add Role
	 */
	public function addRoles(){
		$userid= $this->userid;
		if(!empty($userid)){
			if(isset($_POST["foods"]))  { 
				$data = array(
					'roleName' =>  $_POST['roleName'],
				);
				$insertId = $this->acl_model->addRoles($data);	
				foreach ($_POST['foods'] as $subject) {
					$data1 = array(
						'roleId' =>  $insertId,
						'permId' =>  $subject,
					);
					$this->acl_model->relation($data1);
				} 			
			} 
			$this->session->set_flashdata('msg', 'Role has been added Successfully');		
			redirect('aclController/showRolesList');	
		}else{
			$this->load->view('frontend/login');
		}
	}

	
	// Permissions ---------------------------------------------------------
	/**
	 * Display the list of permissions
	 */
	public function showPermissionList(){
		$userid= $this->userid;
		if(!empty($userid)){
			$data['permission'] = $this->acl_model->getPermissions();
			$this->load->view('frontend/showPermissionList',$data);
		}else{
			$this->load->view('frontend/login');
		}
	}


	/**
	 * Display the form to add a permission
	 */
	public function showPermissionForm(){
		$userid= $this->userid;
		if(!empty($userid)){			
			$this->load->view('frontend/addPermission');
		}else{
			$this->load->view('frontend/login');
		}
	}

	/**
	 * Edit the form to add a permission
	 */
	public function editPermissionForm($permId){
		$userid= $this->userid;
		if(!empty($userid)){
			$data['getSavedPermission'] = $this->acl_model->getSavedPermission($permId);
			$this->load->view('frontend/editPermissionForm',$data);
		}else{
			$this->load->view('frontend/login');
		}
	}
	
	/**
	 * Add permisiion
	 */
	public function addPermissions(){
		$userid= $this->userid;
		if(!empty($userid)){
			if(!empty($_POST['permissionName'])){
				$data = array(
				'permName' =>  $_POST['permissionName'],
				);	
				$this->acl_model->addPermissions($data);			
			}
			$this->session->set_flashdata('msg', 'Permission has been added Successfully');		
			redirect('aclController/showPermissionList');
		}else{
			$this->load->view('frontend/login');
		}		
	}

	/**
	 *  Edit permisiion
	 */
	public function editPermission(){
		$permId = $_POST['permId'];
		$userid= $this->userid;
		if(!empty($userid)){
			$data = array(
				'permName' =>  $_POST['permissionName'],
				);	
			 $this->acl_model->editPermission($permId,$data);

			$this->session->set_flashdata('msg', 'Permission has been updated Successfully');
			redirect('aclController/showPermissionList');
		}else{
			$this->load->view('frontend/login');
		}		
	}

	
	/**
	 *  Delete permisiion
	 */
	public function deletePermission($id){
		$userid= $this->userid;
		if(!empty($userid)){
			$users = $this->acl_model->deletePermission($id);
			$this->session->set_flashdata('msg', 'Permission has been deleted Successfully');
			redirect('aclController/showPermissionList');	
		}else{
			$this->load->view('frontend/login');
		}		
	}
}