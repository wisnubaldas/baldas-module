<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Imp_location_mps extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('imp_location_mps_mps')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('imp_location_mps')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'HostAWB'			=> $this->put('HostAWB'),
					'mps'				=> $this->put('mps'),
					'Location'			=> $this->put('Location'),
					'scandate'			=> $this->put('scandate'),
					'scantime'			=> $this->put('scantime'),
					'token'				=> $this->put('token'),
					'noid'				=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('imp_location_mps', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'HostAWB'			=> $this->post('HostAWB'),
					'mps'				=> $this->post('mps'),
					'Location'			=> $this->post('Location'),
					'scandate'			=> $this->post('scandate'),
					'scantime'			=> $this->post('scantime'),
					'token'				=> $this->post('token')
					);
					
		 $insert = $this->db->insert('imp_location_mps', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}