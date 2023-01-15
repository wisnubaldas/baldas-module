<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Inc_irreg extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $_id = $this->get('_id');
        if ($_id == '') {
			$data = $this->db->get('inc_irreg')->result();            
        } else {
            $this->db->where('_id', $_id);
            $data = $this->db->get('inc_irreg')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$_id = $this->put('_id');
        $data = array(	
					'IrregNumber'		=> $this->put('IrregNumber'),
					'MasterAWB'			=> $this->put('MasterAWB'),
					'id_shipper'		=> $this->put('id_shipper'),
					'ShipperCode'		=> $this->put('ShipperCode'),
					'id_consignee'		=> $this->put('id_consignee'),
					'ConsigneeCode'		=> $this->put('ConsigneeCode'),
					'Pieces'			=> $this->put('Pieces'),
					'partOfPieces'		=> $this->put('partOfPieces'),
					'Weight'			=> $this->put('Weight'),
					'AirlinesCode'		=> $this->put('AirlinesCode'),
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
					'token'				=> $this->put('token'),
					'_id'				=> $this->put('_id')
					);
		$this->db->where('_id', $_id);
        $update = $this->db->update('inc_irreg', $data);
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
					'id_shipper'		=> $this->post('id_shipper'),
					'ShipperCode'		=> $this->post('ShipperCode'),
					'id_consignee'		=> $this->post('id_consignee'),
					'ConsigneeCode'		=> $this->post('ConsigneeCode'),
					'Pieces'			=> $this->post('Pieces'),
					'partOfPieces'		=> $this->post('partOfPieces'),
					'Weight'			=> $this->post('Weight'),
					'AirlinesCode'		=> $this->post('AirlinesCode'),
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
					'token'				=> $this->post('token'),
					);
					
		 $insert = $this->db->insert('inc_irreg', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}