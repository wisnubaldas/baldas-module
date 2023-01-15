<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Wrh_void extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('wrh_void')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('wrh_void')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'NumberCode'		=> $this->put('NumberCode'),
					'NumberShow'		=> $this->put('NumberShow'),
					'NumberRef'			=> $this->put('NumberRef'),
					'DateOfRequest'		=> $this->put('DateOfRequest'),
					'TimeOfRequest'		=> $this->put('TimeOfRequest'),
					'UserIDRequest'		=> $this->put('UserIDRequest'),
					'ReasonVoid'		=> $this->put('ReasonVoid'),
					'TableName'			=> $this->put('TableName'),
					'EmployeeNumber'	=> $this->put('EmployeeNumber'),
					'token'				=> $this->put('token'),
					'noid'				=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('wrh_void', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'NumberCode'		=> $this->post('NumberCode'),
					'NumberShow'		=> $this->post('NumberShow'),
					'NumberRef'			=> $this->post('NumberRef'),
					'DateOfRequest'		=> $this->post('DateOfRequest'),
					'TimeOfRequest'		=> $this->post('TimeOfRequest'),
					'UserIDRequest'		=> $this->post('UserIDRequest'),
					'ReasonVoid'		=> $this->post('ReasonVoid'),
					'TableName'			=> $this->post('TableName'),
					'EmployeeNumber'	=> $this->post('EmployeeNumber'),
					'token'				=> $this->post('token')
					);
					
		 $insert = $this->db->insert('wrh_void', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}