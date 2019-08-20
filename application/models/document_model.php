<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

class Document_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Add new Document
     */
    public function addDocuments($data)
    {
        $this->db->insert('tb_documents', $data);
        return;
    }
    
    /**
     * Get all the Documents
     */
    public function getDocuments()
    {
        $this->db->select('*');
        $this->db->select('tb_roles.roleName as aliasRole' );
        $this->db->select('tb_documents.id as docId' );
        $this->db->from('tb_documents');
        $this->db->join('tb_roles', 'tb_roles.roleId = tb_documents.uploadedBy');
        $this->db->join('tb_users', 'tb_users.id = tb_documents.uploadedBy');
        $result = $this->db->get()->result();
        return $result;
    }

    /**
     * Get all the documents by userid
     */
    public function getDocumentById($id)
    {
        $this->db->select('*');
        $this->db->from('tb_documents');
        $this->db->where('tb_documents.id', $id);
        $result = $this->db->get()->row();
        return $result;
    }

    /**
     * Get all the documents by login user with its role
     */
    public function getDocumentListByUserId($userid)
    {
        $this->db->select('*');
        $this->db->select('tb_roles.roleName as aliasRole');
        $this->db->select('tb_documents.id as docId' );
        $this->db->from('tb_documents');
        $this->db->join('tb_users', 'tb_users.id = tb_documents.uploadedBy');
        $this->db->join('tb_roles', 'tb_roles.roleId = tb_documents.uploadedBy');
        $this->db->where('tb_documents.uploadedBy', $userid);
        $result = $this->db->get()->result();
        return $result;
    }
    
    /**
     * Edit Document
     */
    public function editDocument($data, $id)
    {
        $this->db->where('tb_documents.id', $id);
        $this->db->update('tb_documents', $data);
        return;
    }

    /**
     * Delete Document
     */
    public function deleteDocument($id)
    {
        $this->db->where('tb_documents.id', $id);
        $this->db->delete('tb_documents');
    }



    /**
     * for updating the session and logged in.
     * @param unknown_type $data
     * @return unknown|boolean
     */
    public function checklogin($user, $password)
    {
        $this->db->select('*');
        $this->db->from('tb_users');
        $this->db->where('username', $user);
        $this->db->where('password', $password);
        $q= $this->db->get();
        $q1= $q->row();
        if ($q->num_rows == '1') {
            return $q1;
        } else {
            return false;
        }
    }
    
    /**
     * Get role id when user is login
     */
    public function getroleid($id)
    {
        $this->db->select('roleName');
        $this->db->from('tb_users');
        $this->db->where('id', $id);
        $result = $this->db->get()->result();
        return $result;
    }

    /**
     * Check if doc name is already exists or not
     * @param $username username
     * @return true if exists otherwise false
     */
    public function checkDocNameExists($documentName)
    {
        $this->db->select('*');
        $this->db->from('tb_documents');
        $this->db->where('documentName',$documentName);
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