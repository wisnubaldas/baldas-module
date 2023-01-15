<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Mst_customer extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $CustomerCode = $this->get('CustomerCode');
        if ($CustomerCode == '') {
			$data = $this->db->get('mst_customer')->result();            
        } else {
            $this->db->where('CustomerCode', $CustomerCode);
            $data = $this->db->get('mst_customer')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$CustomerCode = $this->put('CustomerCode');
        $data = array(	
					'CompanyName'			=> $this->put('CompanyName'),
					'PICName'				=> $this->put('PICName'),
					'Address1'				=> $this->put('Address1'),
					'Address2'				=> $this->put('Address2'),
					'City'					=> $this->put('City'),
					'PostCode'				=> $this->put('PostCode'),
					'CountryCode'			=> $this->put('CountryCode'),
					'MobileNumber'			=> $this->put('MobileNumber'),
					'FaxNumber'				=> $this->put('FaxNumber'),
					'Phonenumber'			=> $this->put('Phonenumber'),
					'EmailAddress'			=> $this->put('EmailAddress'),
					'NPWPNumber'			=> $this->put('NPWPNumber'),
					'ContactIdentifier'		=> $this->put('ContactIdentifier'),
					'ContactNumber'			=> $this->put('ContactNumber'),
					'EmployeeNumber'		=> $this->put('EmployeeNumber'),
					'DateEntry'				=> $this->put('DateEntry'),
					'TimeEntry'				=> $this->put('TimeEntry'),
					'CustomerCode'			=> $this->put('CustomerCode')
					);
		$this->db->where('CustomerCode', $CustomerCode);
        $update = $this->db->update('mst_customer', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'CustomerCode'			=> $this->post('CustomerCode'),
					'CompanyName'			=> $this->post('CompanyName'),
					'PICName'				=> $this->post('PICName'),
					'Address1'				=> $this->post('Address1'),
					'Address2'				=> $this->post('Address2'),
					'City'					=> $this->post('City'),
					'PostCode'				=> $this->post('PostCode'),
					'CountryCode'			=> $this->post('CountryCode'),
					'MobileNumber'			=> $this->post('MobileNumber'),
					'FaxNumber'				=> $this->post('FaxNumber'),
					'Phonenumber'			=> $this->post('Phonenumber'),
					'EmailAddress'			=> $this->post('EmailAddress'),
					'NPWPNumber'			=> $this->post('NPWPNumber'),
					'ContactIdentifier'		=> $this->post('ContactIdentifier'),
					'ContactNumber'			=> $this->post('ContactNumber'),
					'EmployeeNumber'		=> $this->post('EmployeeNumber'),
					'DateEntry'				=> $this->post('DateEntry'),
					'TimeEntry'				=> $this->post('TimeEntry')
					);
					
		 $insert = $this->db->insert('mst_customer', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}