<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Acl_model extends CI_Model{

	public function __construct(){
		parent::__construct();
	}


	public function addPermissions($permissionName){
		$this->db->insert('tb_perms', $permissionName);
	}

	public function addUsers($data){
		$this->db->insert('tb_users', $data);
		return;
	}

	public function getUserData(){
		$this->db->select('*');
		$this->db->from('tb_users');
		$this->db->join('tb_roles', 'tb_users.roleName = tb_roles.roleId'); 
		$query = $this->db->get();
		return $query->result();


	}

	public function getSavedUser($id){
		$this->db->select('*');
		$this->db->from('tb_users');
		$this->db->join('tb_roles', 'tb_users.roleName = tb_roles.roleId'); 
		$this->db->where('tb_users.id', $id);
		$q= $this->db->get()->row();
		return $q;
	}
	

	public function getRolesData(){
		$this->db->distinct();
		$this->db->select('*');
		$this->db->from('tb_perms');
		
	//	
		$this->db->join('tb_aclrel', 'tb_perms.permId = tb_aclrel.permId');  
		$this->db->join('tb_roles', 'tb_roles.roleId = tb_aclrel.roleId');
		$query = $this->db->get();
		return $query->result();


	}

	public function editUser($id,$data){
		$this->db->where('tb_users.id', $id);
		$this->db->update('tb_users', $data); 
		return;
	}

	public function deleteUser($id){
		$this->db->where('tb_users.id', $id);
		$this->db->delete('tb_users');
	}


	
	public function getroles(){
		$this->db->select('*');
		$this->db->from('tb_roles');
	
		$q= $this->db->get()->result();
		return $q;
	}

	function addRoles($data) {
		$this->db->insert('tb_roles',$data);
		return $this->db->insert_id();
	}
	function relation($data1) {
		$this->db->insert('tb_aclrel', $data1);
	}


	public function getPermissions(){
		$this->db->select('*');
		$this->db->from('tb_perms');
	
		$q= $this->db->get()->result();
		return $q;
	}

	public function getSavedPermission($permId){
		$this->db->select('*');
		$this->db->from('tb_perms');
		$this->db->where('tb_perms.permId', $permId);
		$q= $this->db->get()->row();
		return $q;
	}

	public function editPermission($id,$data){
		$this->db->where('tb_perms.permId', $id);
		$this->db->update('tb_perms', $data); 
		return;
	}

	public function deletePermission($id){
		$this->db->where('tb_perms.permId', $id);
		$this->db->delete('tb_perms');
	}
	
	
	public function getroleid($id){
		$this->db->select('roleName');
		$this->db->from('tb_users');
		$this->db->where('id',$id);
		$q= $this->db->get()->result();
		return $q;
	}
	
	public function updatepassword($password, $id){
		$data= array('password'=> $password);
		$this->db->where('id', $id);
		$this->db->update('tb_users', $data); 
		return;
	}
}