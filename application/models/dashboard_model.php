<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model{

	public function __construct()
	{
		parent::__construct();
	}

	

	
	/**
	 * Get user details
	 * @param $userid user id
	 */
	public function getUserData($userid){
		$this->db->select('*');
		$this->db->from('tb_users');
		$this->db->where('id',$userid);
		$result = $this->db->get()->row();
		return $result;
	}

	/**
	 * Edit user profile
	 * @param $userid user id
	 * @param $data data to be updated
	 */
	public function editProfile($data,$userid){
		$this->db->where('id', $userid);
		$this->db->update('tb_users', $data); 
		return;
	}

	
	
}