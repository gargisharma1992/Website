<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }   

     /**
	 * for updating the session and logged in.
	 * @param unknown_type $data
	 * @return unknown|boolean
	 */
	public function checklogin($user, $password){
		$this->db->select('*');
		$this->db->from('tb_users');
		$this->db->where('username',$user);
		$this->db->where('password',$password);
		$q= $this->db->get();
		$q1= $q->row();
		if($q->num_rows == '1'){
			return $q1;
		}else{
			return false;
		}
	}
    
    
    /**
	 * Get role id 
	 */
	public function getroleid($id){
		$this->db->select('*');
		$this->db->from('tb_users');
		$this->db->join('tb_roles', 'tb_users.roleName = tb_roles.roleId');
		$this->db->where('id',$id);
		$result = $this->db->get()->result();
		return $result;
	}
	
  
}