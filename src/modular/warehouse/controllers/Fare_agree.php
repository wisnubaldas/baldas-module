<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Fare_agree extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('fare_agree')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('fare_agree')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'WarehouseCode'				=> $this->put('WarehouseCode'),
					'AgreementCode'				=> $this->put('AgreementCode'),
					'DescriptionAgreement'		=> $this->put('DescriptionAgreement'),
					'DateAgreement'				=> $this->put('DateAgreement'),
					'Active'					=> $this->put('Active'),
					'noid'						=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('fare_agree', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'WarehouseCode'				=> $this->post('WarehouseCode'),
					'AgreementCode'				=> $this->post('AgreementCode'),
					'DescriptionAgreement'		=> $this->post('DescriptionAgreement'),
					'DateAgreement'				=> $this->post('DateAgreement'),
					'Active'					=> $this->post('Active')
					);
					
		 $insert = $this->db->insert('fare_agree', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}