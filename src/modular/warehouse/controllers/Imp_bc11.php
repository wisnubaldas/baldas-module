<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Imp_bc11 extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('imp_bc11')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('imp_bc11')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'NomorPos'		=> $this->put('NomorPos'),
					'MasterAWB'		=> $this->put('MasterAWB'),
					'Pieces'		=> $this->put('Pieces'),
					'Netto'			=> $this->put('Netto'),
					'KindOfGood'	=> $this->put('KindOfGood'),
					'Route'			=> $this->put('Route'),
					'FlightNumber'	=> $this->put('FlightNumber'),
					'BCNumber'		=> $this->put('BCNumber'),
					'DateOfBC'		=> $this->put('DateOfBC'),
					'token'			=> $this->put('token')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('imp_bc11', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'NomorPos'		=> $this->post('NomorPos'),
					'MasterAWB'		=> $this->post('MasterAWB'),
					'Pieces'		=> $this->post('Pieces'),
					'Netto'			=> $this->post('Netto'),
					'KindOfGood'	=> $this->post('KindOfGood'),
					'Route'			=> $this->post('Route'),
					'FlightNumber'	=> $this->post('FlightNumber'),
					'BCNumber'		=> $this->post('BCNumber'),
					'DateOfBC'		=> $this->post('DateOfBC'),
					'token'			=> $this->post('token')
					);
					
		 $insert = $this->db->insert('imp_bc11', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}