<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Mst_shift extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('mst_shift')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('mst_shift')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'ShiftName'		=> $this->put('ShiftName'),
					'TimeFrom'		=> $this->put('TimeFrom'),
					'TimeUntil'		=> $this->put('TimeUntil'),
					'noid'			=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('mst_shift', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'ShiftName'		=> $this->post('ShiftName'),
					'TimeFrom'		=> $this->post('TimeFrom'),
					'TimeUntil'		=> $this->post('TimeUntil')
					);
					
		 $insert = $this->db->insert('mst_shift', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}