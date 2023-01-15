<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Out_sticker extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('out_sticker')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('out_sticker')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'AirlinesCode'		=> $this->put('AirlinesCode'),
					'FlightNo'			=> $this->put('FlightNo'),
					'DateOfFlight'		=> $this->put('DateOfFlight'),
					'TimeOfFlight'		=> $this->put('TimeOfFlight'),
					'ULD'				=> $this->put('ULD'),
					'Pallete'			=> $this->put('Pallete'),
					'GrossWeight'		=> $this->put('GrossWeight'),
					'NettoWeight'		=> $this->put('NettoWeight'),
					'Operator'			=> $this->put('Operator'),
					'PrintNumber'		=> $this->put('PrintNumber'),
					'EmployeeNumber'	=> $this->put('EmployeeNumber'),
					'ReportCode'		=> $this->put('ReportCode'),
					'token'				=> $this->put('token'),
					'noid'				=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('out_sticker', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'AirlinesCode'		=> $this->post('AirlinesCode'),
					'FlightNo'			=> $this->post('FlightNo'),
					'DateOfFlight'		=> $this->post('DateOfFlight'),
					'TimeOfFlight'		=> $this->post('TimeOfFlight'),
					'ULD'				=> $this->post('ULD'),
					'Pallete'			=> $this->post('Pallete'),
					'GrossWeight'		=> $this->post('GrossWeight'),
					'NettoWeight'		=> $this->post('NettoWeight'),
					'Operator'			=> $this->post('Operator'),
					'PrintNumber'		=> $this->post('PrintNumber'),
					'EmployeeNumber'	=> $this->post('EmployeeNumber'),
					'ReportCode'		=> $this->post('ReportCode'),
					'token'				=> $this->post('token')
					);
					
		 $insert = $this->db->insert('out_sticker', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}