<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }   

     /**
	 * Register account
	 * @param unknown_type $data
	 * @return unknown|
	 */
	public function createAccount($data)
	{
		$this->db->insert('tb_users', $data);
		return;
    }
    
    /**
     * Check if username is already exists or not
     * @param $username username
     * @return true if exists otherwise false
     */
    public function checkUsernameExists($username)
    {
        $this->db->select('*');
        $this->db->from('tb_users');
        $this->db->where('username',$username);
        $query = $this->db->get();
        $result = $query->row();
        if ($result)
        {
         return TRUE;
        }
        else 
        {
            return FALSE;
        }
    }

    /**
     * Check if username is already exists or not
     * @param $username username
     * @return true if exists otherwise false
     */
    public function checkEmailExists($email)
    {
        $this->db->select('*');
        $this->db->from('tb_users');
        $this->db->where('email',$email);
        $query = $this->db->get();
        $result = $query->row();
        if ($result)
        {
         return TRUE;
        }
        else 
        {
            return FALSE;
        }
    }
    
  
}