<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Imp_obheader extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $BreakdownNumber = $this->get('BreakdownNumber');
        if ($BreakdownNumber == '') {
			$data = $this->db->get('imp_obheader')->result();            
        } else {
            $this->db->where('BreakdownNumber', $BreakdownNumber);
            $data = $this->db->get('imp_obheader')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$BreakdownNumber = $this->put('BreakdownNumber');
        $data = array(	
					'BreakdownNumber'	=> $this->put('BreakdownNumber'),
					'WhOperatorCode'	=> $this->put('WhOperatorCode'),
					'DateOfOveride'		=> $this->put('DateOfOveride'),
					'DateOfArrival'		=> $this->put('DateOfArrival'),
					'TimeOfArrival'		=> $this->put('TimeOfArrival'),
					'EmployeeNumber'	=> $this->put('EmployeeNumber'),
					'OperatorName'		=> $this->put('OperatorName'),
					'TotalMasterAWB'	=> $this->put('TotalMasterAWB'),
					'TotalPieces'		=> $this->put('TotalPieces'),
					'TotalNetto'		=> $this->put('TotalNetto'),
					'TotalCAW'			=> $this->put('TotalCAW'),
					'Supervisor'		=> $this->put('Supervisor'),
					'token'				=> $this->put('token')
					);
		$this->db->where('BreakdownNumber', $BreakdownNumber);
        $update = $this->db->update('imp_obheader', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'BreakdownNumber'	=> $this->post('BreakdownNumber'),
					'WhOperatorCode'	=> $this->post('WhOperatorCode'),
					'DateOfOveride'		=> $this->post('DateOfOveride'),
					'DateOfArrival'		=> $this->post('DateOfArrival'),
					'TimeOfArrival'		=> $this->post('TimeOfArrival'),
					'EmployeeNumber'	=> $this->post('EmployeeNumber'),
					'OperatorName'		=> $this->post('OperatorName'),
					'TotalMasterAWB'	=> $this->post('TotalMasterAWB'),
					'TotalPieces'		=> $this->post('TotalPieces'),
					'TotalNetto'		=> $this->post('TotalNetto'),
					'TotalCAW'			=> $this->post('TotalCAW'),
					'Supervisor'		=> $this->post('Supervisor'),
					'token'				=> $this->post('token')
					);
					
		 $insert = $this->db->insert('imp_obheader', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}