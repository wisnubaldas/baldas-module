<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Imp_breakdownheader extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $Noid = $this->get('BreakdownNumber');
        if ($BreakdownNumber == '') {
			$data = $this->db->get('imp_breakdownheader')->result();            
        } else {
            $this->db->where('BreakdownNumber', $BreakdownNumber);
            $data = $this->db->get('imp_breakdownheader')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$BreakdownNumber = $this->put('BreakdownNumber');
        $data = array(	
					'BreakdownNumber'	=> $this->put('BreakdownNumber'),
					'AirlinesCode'		=> $this->put('AirlinesCode'),
					'OriginCode'		=> $this->put('OriginCode'),
					'FlightNumber'		=> $this->put('FlightNumber'),
					'DateOfFlight'		=> $this->put('DateOfFlight'),
					'DateOfArrival'		=> $this->put('DateOfArrival'),
					'TimeOfArrival'		=> $this->put('TimeOfArrival'),
					'EmployeeNumber'	=> $this->put('EmployeeNumber'),
					'OperatorName'		=> $this->put('OperatorName'),
					'TotalMasterAWB'	=> $this->put('TotalMasterAWB'),
					'TotalPieces'		=> $this->put('TotalPieces'),
					'TotalNetto'		=> $this->put('TotalNetto'),
					'TotalCAW'			=> $this->put('TotalCAW'),
					'AirCraftNumber'	=> $this->put('AirCraftNumber'),	
					'Supervisor'		=> $this->put('Supervisor'),
					'DateEntry'			=> $this->put('DateEntry'),
					'TimeEntry'			=> $this->put('TimeEntry'),
					'token'				=> $this->put('token')
					);
		$this->db->where('BreakdownNumber', $BreakdownNumber);
        $update = $this->db->update('imp_breakdownheader', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'BreakdownNumber'	=> $this->post('BreakdownNumber'),
					'AirlinesCode'		=> $this->post('AirlinesCode'),
					'OriginCode'		=> $this->post('OriginCode'),
					'FlightNumber'		=> $this->post('FlightNumber'),
					'DateOfFlight'		=> $this->post('DateOfFlight'),
					'DateOfArrival'		=> $this->post('DateOfArrival'),
					'TimeOfArrival'		=> $this->post('TimeOfArrival'),
					'EmployeeNumber'	=> $this->post('EmployeeNumber'),
					'OperatorName'		=> $this->post('OperatorName'),
					'TotalMasterAWB'	=> $this->post('TotalMasterAWB'),
					'TotalPieces'		=> $this->post('TotalPieces'),
					'TotalNetto'		=> $this->post('TotalNetto'),
					'TotalCAW'			=> $this->post('TotalCAW'),
					'AirCraftNumber'	=> $this->post('AirCraftNumber'),	
					'Supervisor'		=> $this->post('Supervisor'),
					'DateEntry'			=> $this->post('DateEntry'),
					'TimeEntry'			=> $this->post('TimeEntry'),
					'token'				=> $this->post('token')
					);
					
		 $insert = $this->db->insert('imp_breakdownheader', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}