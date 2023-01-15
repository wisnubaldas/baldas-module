<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Out_booking extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('out_booking')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('out_booking')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'MasterAWB'			=> $this->put('MasterAWB'),
					'AirlinesCode'		=> $this->put('AirlinesCode'),
					'Destination'		=> $this->put('Destination'),
					'Pieces'			=> $this->put('Pieces'),
					'Weight'			=> $this->put('Weight'),
					'Volume'			=> $this->put('Volume'),
					'Route'				=> $this->put('Route'),
					'FlightNo'			=> $this->put('FlightNo'),
					'DateOfFlight'		=> $this->put('DateOfFlight'),
					'KindOfGood'		=> $this->put('KindOfGood'),
					'Status'			=> $this->put('Status'),
					'token'				=> $this->put('token'),
					'noid'				=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('out_booking', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'MasterAWB'			=> $this->put('MasterAWB'),
					'AirlinesCode'		=> $this->put('AirlinesCode'),
					'Destination'		=> $this->put('Destination'),
					'Pieces'			=> $this->put('Pieces'),
					'Weight'			=> $this->put('Weight'),
					'Volume'			=> $this->put('Volume'),
					'Route'				=> $this->put('Route'),
					'FlightNo'			=> $this->put('FlightNo'),
					'DateOfFlight'		=> $this->put('DateOfFlight'),
					'KindOfGood'		=> $this->put('KindOfGood'),
					'Status'			=> $this->put('Status'),
					'token'				=> $this->put('token')
					);
					
		 $insert = $this->db->insert('out_booking', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}