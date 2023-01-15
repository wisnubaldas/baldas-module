<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Imp_irreg extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('imp_irreg')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('imp_irreg')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'IrregNumber'		=> $this->put('IrregNumber'),
					'MasterAWB'			=> $this->put('MasterAWB'),
					'ShipperCode'		=> $this->put('ShipperCode'),
					'ConsigneeCode'		=> $this->put('ConsigneeCode'),
					'Pieces'			=> $this->put('Pieces'),
					'partOfPieces'		=> $this->put('partOfPieces'),
					'Weight'			=> $this->put('Weight'),
					'KindOfGood'		=> $this->put('KindOfGood'),
					'FlightNo'			=> $this->put('FlightNo'),
					'DateOfFlight'		=> $this->put('DateOfFlight'),
					'Route'				=> $this->put('Route'),
					'Manifest'			=> $this->put('Manifest'),
					'Remarks'			=> $this->put('Remarks'),
					'DateOfEntry'		=> $this->put('DateOfEntry'),
					'TimeOfEntry'		=> $this->put('TimeOfEntry'),
					'EmployeeNumber'	=> $this->put('EmployeeNumber'),
					'Supervisor'		=> $this->put('Supervisor'),
					'DIS'				=> $this->put('DIS'),
					'AirlinesCode'		=> $this->put('AirlinesCode'),
					'token'				=> $this->put('token'),
					'noid'				=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('imp_irreg', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'IrregNumber'		=> $this->post('IrregNumber'),
					'MasterAWB'			=> $this->post('MasterAWB'),
					'ShipperCode'		=> $this->post('ShipperCode'),
					'ConsigneeCode'		=> $this->post('ConsigneeCode'),
					'Pieces'			=> $this->post('Pieces'),
					'partOfPieces'		=> $this->post('partOfPieces'),
					'Weight'			=> $this->post('Weight'),
					'KindOfGood'		=> $this->post('KindOfGood'),
					'FlightNo'			=> $this->post('FlightNo'),
					'DateOfFlight'		=> $this->post('DateOfFlight'),
					'Route'				=> $this->post('Route'),
					'Manifest'			=> $this->post('Manifest'),
					'Remarks'			=> $this->post('Remarks'),
					'DateOfEntry'		=> $this->post('DateOfEntry'),
					'TimeOfEntry'		=> $this->post('TimeOfEntry'),
					'EmployeeNumber'	=> $this->post('EmployeeNumber'),
					'Supervisor'		=> $this->post('Supervisor'),
					'DIS'				=> $this->post('DIS'),
					'AirlinesCode'		=> $this->post('AirlinesCode'),
					'token'				=> $this->post('token')
					);
					
		 $insert = $this->db->insert('imp_irreg', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}