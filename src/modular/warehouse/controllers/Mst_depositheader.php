<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Mst_depositheader extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $DepositCode = $this->get('DepositCode');
        if ($DepositCode == '') {
			$data = $this->db->get('mst_depositheader')->result();            
        } else {
            $this->db->where('DepositCode', $DepositCode);
            $data = $this->db->get('mst_depositheader')->result();
        }
        $this->response($data, 200);
    }
	
	function index_post() {		
        $data = array(		
					'DepositCode'	=> $this->post('DepositCode'),
					'DepositPIC'	=> $this->post('DepositPIC'),
					'PhoneNumber'	=> $this->post('PhoneNumber'),
					'EmailAddress'	=> $this->post('EmailAddress'),
					'NPWP'			=> $this->post('NPWP'),
					'DateOfJoin'	=> $this->post('DateOfJoin'),
					'TotalNominal'	=> $this->post('TotalNominal')
					);
					
		$insert = $this->db->insert('mst_depositheader', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_put() {
		$DepositCode = $this->put('DepositCode');
        $data = array(	
					'DepositPIC'	=> $this->put('DepositPIC'),
					'PhoneNumber'	=> $this->put('PhoneNumber'),
					'EmailAddress'	=> $this->put('EmailAddress'),
					'NPWP'			=> $this->put('NPWP'),
					'DateOfJoin'	=> $this->put('DateOfJoin'),
					'TotalNominal'	=> $this->put('TotalNominal'),
					'Active'		=> $this->put('Active'),
					'DepositCode'	=> $this->put('DepositCode')
					);
		$this->db->where('DepositCode', $DepositCode);
        $update = $this->db->update('mst_depositheader', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}