<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Loginpassword extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('loginpassword')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('loginpassword')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'password'				=> $this->put('password'),
					'datefrom'				=> $this->put('datefrom'),
					'dateuntil'				=> $this->put('dateuntil'),
					'ReferenceNumber'		=> $this->put('ReferenceNumber'),
					'EmployeeNumber'		=> $this->put('EmployeeNumber'),
					'Activation'			=> $this->put('Activation'),
					'userID'				=> $this->put('userID')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('loginpassword', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'userID'				=> $this->put('userID'),
					'password'				=> $this->put('password'),
					'datefrom'				=> $this->put('datefrom'),
					'dateuntil'				=> $this->put('dateuntil'),
					'ReferenceNumber'		=> $this->put('ReferenceNumber'),
					'EmployeeNumber'		=> $this->put('EmployeeNumber'),
					'Activation'			=> $this->put('Activation')
					);
					
		 $insert = $this->db->insert('loginpassword', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}