<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * This class is used to upload, access , modify the documents.
 * It covers Document uploads, document list, Document access rights, Documnet modification, 
 * deletion ,encryption and download the documents.
 * @author Gargi Sharma
 */
class Documents extends CI_Controller {
	public function __construct()
    {
		parent::__construct();
	
		$this->load->model('document_model');
		$this->userid= $this->session->userdata('userId');
		$this->roleName= $this->session->userdata('roleName');
		$this->load->library('encrypt');			
	}	
		
	/**
	 * Index function for this controller
	 */
	public function index()
	{
		$userid= $this->userid;
		if(!empty($userid)){	 
			$this->load->view('frontend/documents');
		}else{
			$this->load->view('frontend/login');
		}
	}

	/**
	 * Show list of documents
	 */
	public function showDocumentList()
	{
		$userid= $this->userid;
		if(!empty($userid)){		
			if($this->roleName == 'admin'){
				$data['documentList'] = $this->document_model->getDocuments();
			}else{
				$data['documentList'] = $this->document_model->getDocumentListByUserId($userid);
			}
			
			$this->load->view('frontend/showDocumentList',$data);
		}else{
			$this->load->view('frontend/login');
		}
	}

	/**
	 * Edit form for documents
	 */
	public function showEditDocumentForm($id)
	{
		$userid= $this->userid;
		if(!empty($userid)){
			$data['getDocumentById'] = $this->document_model->getDocumentById($id);
			$this->load->view('frontend/showEditDocumentForm',$data);
		}else{
			$this->load->view('frontend/login');
		}
	}

	/**
	 * Edit document
	 */
	public function editDocument()
	{
		$userid= $this->userid;
		if(!empty($userid)){
			$id =  $_POST['id'];
			$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/dilitrust/assets/uploads/documents/';
			$config['allowed_types'] = 'pdf|doc';
			$config['max_size']      = '10000';
			$config['file_name'] = $this->encrypt->encode($_FILES['documentFile']['name']);
			$config['encrypt_name'] = TRUE;	
			$this->load->library('upload', $config);
			if($this->upload->do_upload('documentFile')){
				$data = array(
					'documentName' =>  $_POST['documentName'],
					'document' =>  $config['file_name'],
					'documentPath' =>  $config['upload_path'].$config['file_name'],
					'date' =>  (new DateTime('now'))->format('Y-m-d H:i:s'),		
				);
				$this->document_model->editDocument($data,$id);		
				$this->session->set_flashdata('msg', 'Document has been updated Successfully');		
				redirect('documents/showDocumentList');	
						
			}else{
				$error = array('error' => $this->upload->display_errors());				
			}	
		}else{
			$this->load->view('frontend/login');
		}	
	}

	/**
	 * Delete a document
	 */
	public function deleteDocument($id)
	{
		$userid= $this->userid;
		if(!empty($userid)){
			$this->document_model->deleteDocument($id);
			$this->session->set_flashdata('msg', 'Document has been deleted Successfully');
			redirect('documents/showDocumentList');
		}else{
            $this->load->view('frontend/login');
        }		
	}

	/**
	 * Show documents in gallery
	 */
	public function showDocumentsInGallery()
	{


		$userid= $this->userid;
		if(!empty($userid)){
			$data['documentList'] = $this->document_model->getDocuments();
			
			$this->load->view('frontend/documentsGallery',$data);
		}else{
			$this->load->view('frontend/login');
		}	
		
	}

	/**
	 * Upload a document
	 */
	public function upload_file() 
	{
		$userid= $this->userid;
		if(!empty($userid)){				
			$config['upload_path'] = $_SERVER['DOCUMENT_ROOT'].'/dilitrust/assets/uploads/documents/';
			$config['allowed_types'] = 'pdf|doc|';
			$config['max_size']      = '10000';
			$config['file_name'] = $_FILES['documentFile']['name'];
			//$config['file_name'] = $this->encrypt->encode($_FILES['documentFile']['name']);
			//$config['encrypt_name'] = TRUE;	

			$this->load->library('upload', $config);
			if($this->upload->do_upload('documentFile')){
				$data = array(
					'documentName' =>  $_POST['documentName'],
					'document' => $this->encrypt->encode($_FILES['documentFile']['name']),
					'documentPath' =>  $config['upload_path'].$config['file_name'],					
					'uploadedBy' => $_POST['uploadedBy'],
					'date' =>  (new DateTime('now'))->format('Y-m-d H:i:s'),		
				);
				$this->document_model->addDocuments($data);		
				$this->session->set_flashdata('msg', 'Document has been uploaded Successfully');		
				redirect('documents/showDocumentList');				
			}else{
				$error = array('error' => $this->upload->display_errors());				
			}
		}else{
			$this->load->view('frontend/login');
		}	
	}	

	/**
	 * Check if the document name is already exists
	 */
	public function checkDocNameExists(){
		if (isset($_POST['documentName'])) {
			$documentName = $_POST['documentName'];
			$results = $this->document_model->checkDocNameExists($documentName);	
			echo json_encode($results);			
		} else {
			echo '<span style="color:red;">Document is required field.</span>';
		}
	}

	/**
	 * Seatch documents
	 */
	public function searchDocuments(){
		$userid= $this->userid;
		if(!empty($userid)){	
			if (isset($_POST['inputvalue'])) {
				$inputvalue = $_POST['inputvalue'];
				if($this->roleName == 'admin'){
					$data['documentList'] = $this->document_model->searchDocuments($inputvalue);
				}else{
					$data['documentList'] = $this->document_model->searchDocumentsByUserId($inputvalue);
				}
				//$results = $this->document_model->searchDocuments($inputvalue);	
				echo json_encode($data);			
			} 	
			
			
			
		}else{
			$this->load->view('frontend/login');
		}
	
	}
}