<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Mst_history extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('mst_history')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('mst_history')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'DateOfHistory'			=> $this->put('DateOfHistory'),
					'TimeOfHistory'			=> $this->put('TimeOfHistory'),
					'EmployeeNumber'		=> $this->put('EmployeeNumber'),
					'FormName'				=> $this->put('FormName'),
					'ActionDescription'		=> $this->put('ActionDescription'),
					'NumberCode'			=> $this->put('NumberCode'),
					'noid'					=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('mst_history', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'DateOfHistory'			=> $this->post('DateOfHistory'),
					'TimeOfHistory'			=> $this->post('TimeOfHistory'),
					'EmployeeNumber'		=> $this->post('EmployeeNumber'),
					'FormName'				=> $this->post('FormName'),
					'ActionDescription'		=> $this->post('ActionDescription'),
					'NumberCode'			=> $this->post('NumberCode')
					);
					
		 $insert = $this->db->insert('mst_history', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}