<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Eks_booking extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('eks_booking')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('eks_booking')->result();
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
					'StatusBooking' 	=> $this->put('StatusBooking'),
					'EmployeeNumber'	=> $this->put('EmployeeNumber'),
					'DateEntry'			=> $this->put('DateEntry'),
					'TimeEntry'			=> $this->put('TimeEntry'),
					'AgenCode'			=> $this->put('AgenCode'),
					'token'				=> $this->put('token'),
					'noid' 				=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('eks_booking', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'MasterAWB'			=> $this->post('MasterAWB'),
					'AirlinesCode'		=> $this->post('AirlinesCode'),
					'Destination'		=> $this->post('Destination'),
					'Pieces'			=> $this->post('Pieces'),
					'Weight'			=> $this->post('Weight'),
					'Volume'			=> $this->post('Volume'),
					'Route'				=> $this->post('Route'),
					'FlightNo'			=> $this->post('FlightNo'),
					'DateOfFlight'		=> $this->post('DateOfFlight'),
					'KindOfGood'		=> $this->post('KindOfGood'),
					'StatusBooking' 	=> $this->post('StatusBooking'),
					'EmployeeNumber'	=> $this->post('EmployeeNumber'),
					'DateEntry'			=> $this->post('DateEntry'),
					'TimeEntry'			=> $this->post('TimeEntry'),
					'AgenCode'			=> $this->post('AgenCode'),
					'token'				=> $this->post('token')
					);
					
		 $insert = $this->db->insert('eks_booking', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}