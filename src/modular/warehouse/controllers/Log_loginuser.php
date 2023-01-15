<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Log_loginuser extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db3 = $this->load->database('rdlogin', TRUE);
	}
	
	function index_get() {
        $EmployeeNumber = $this->get('EmployeeNumber');
        if ($EmployeeNumber == '') {
			$data = $this->db3->get('loginuser')->result();            
        } else {
            $this->db->where('EmployeeNumber', $EmployeeNumber);
            $data = $this->db3->get('loginuser')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$EmployeeNumber = $this->put('EmployeeNumber');
        $data = array(	
					'EmployeeNumber'	=> $this->put('EmployeeNumber'),					
					'EmployeeName'		=> $this->put('EmployeeName'),
					'PlaceOfBirth'		=> $this->put('PlaceOfBirth'),
					'DateofBirth'		=> $this->put('DateofBirth'),
					'StartJoin'			=> $this->put('StartJoin'),
					'Address'			=> $this->put('Address'),
					'Address_2'			=> $this->put('Mobilephone')
					);
					
		$this->db3->where('EmployeeNumber', $EmployeeNumber);
        $update = $this->db3->update('loginuser', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'EmployeeNumber'	=> $this->post('EmployeeNumber'),					
					'EmployeeName'		=> $this->post('EmployeeName'),
					'PlaceOfBirth'		=> $this->post('PlaceOfBirth'),
					'DateofBirth'		=> $this->post('DateofBirth'),
					'StartJoin'			=> $this->post('StartJoin'),
					'Address'			=> $this->post('Address'),
					'Address_2'			=> $this->post('Mobilephone')
					);
					
		 $insert = $this->db3->insert('loginuser', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}