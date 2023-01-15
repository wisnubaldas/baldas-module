<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Mst_operatorwrh extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('mst_operatorwrh')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('mst_operatorwrh')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'WHOperatorCode'	=> $this->put('WHOperatorCode'),
					'WHOperatorName'	=> $this->put('WHOperatorName'),
					'noid'				=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('mst_operatorwrh', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'WHOperatorCode'	=> $this->post('WHOperatorCode'),
					'WHOperatorName'	=> $this->post('WHOperatorName')
					);
					
		 $insert = $this->db->insert('mst_operatorwrh', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}