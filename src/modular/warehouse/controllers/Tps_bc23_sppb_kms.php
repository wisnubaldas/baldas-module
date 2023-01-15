<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Tps_bc23_sppb_kms extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db4 = $this->load->database('db_tpsonline', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db4->get('getbc23_sppb_kms')->result();            
        } else {
            $this->db4->where('noid', $noid);
            $data = $this->db4->get('getbc23_sppb_kms')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'CAR'					=> $this->put('CAR'),
					'JNS_KMS'				=> $this->put('JNS_KMS'),	
					'MERK_KMS'				=> $this->put('MERK_KMS'),
					'JML_KMS'				=> $this->put('JML_KMS'),
					'noid'					=> $this->put('noid')
					);
		$this->db4->where('noid', $noid);
        $update = $this->db4->update('getbc23_sppb_kms', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'CAR'					=> $this->post('CAR'),
					'JNS_KMS'				=> $this->post('JNS_KMS'),	
					'MERK_KMS'				=> $this->put('MERK_KMS'),
					'JML_KMS'				=> $this->post('JML_KMS')
					);
					
		 $insert = $this->db4->insert('getbc23_sppb_kms', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}