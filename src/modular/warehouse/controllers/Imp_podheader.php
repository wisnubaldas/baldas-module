<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Imp_podheader extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $TravelNumber = $this->get('TravelNumber');
        if ($TravelNumber == '') {
			$data = $this->db->get('imp_podheader')->result();            
        } else {
            $this->db->where('TravelNumber', $TravelNumber);
            $data = $this->db->get('imp_podheader')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$TravelNumber = $this->put('TravelNumber');
        $data = array(	
					'TravelNumber'		=> $this->put('TravelNumber'),
					'InvoiceNumber'		=> $this->put('InvoiceNumber'),
					'Referensi'			=> $this->put('Referensi'),
					'DateOfOut'			=> $this->put('DateOfOut'),
					'TimeOfOut'			=> $this->put('TimeOfOut'),
					'EmployeeNumber'	=> $this->put('EmployeeNumber'),
					'ConsigneeCode'		=> $this->put('ConsigneeCode'),
					'token'				=> $this->put('token')
					);
		$this->db->where('TravelNumber', $TravelNumber);
        $update = $this->db->update('imp_podheader', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'TravelNumber'		=> $this->post('TravelNumber'),
					'InvoiceNumber'		=> $this->post('InvoiceNumber'),
					'Referensi'			=> $this->post('Referensi'),
					'DateOfOut'			=> $this->post('DateOfOut'),
					'TimeOfOut'			=> $this->post('TimeOfOut'),
					'EmployeeNumber'	=> $this->post('EmployeeNumber'),
					'ConsigneeCode'		=> $this->post('ConsigneeCode'),
					'token'				=> $this->post('token')
					);
					
		 $insert = $this->db->insert('imp_podheader', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}