<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Out_buildupoffload extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('out_buildupoffload')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('out_buildupoffload')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'BuildUpNumber'		=> $this->put('BuildUpNumber'),
					'AirlinesCode'		=> $this->put('AirlinesCode'),
					'FlightNumber'		=> $this->put('FlightNumber'),
					'DestinationCode'	=> $this->put('DestinationCode'),
					'DateOfFlight'		=> $this->put('DateOfFlight'),
					'MasterAWB'			=> $this->put('MasterAWB'),
					'TransitCode'		=> $this->put('TransitCode'),
					'PartPieces'		=> $this->put('PartPieces'),
					'Pieces'			=> $this->put('Pieces'),
					'PartNetto'			=> $this->put('PartNetto'),
					'Netto'				=> $this->put('Netto'),
					'Volume'			=> $this->put('Volume'),
					'UldCardNumber'		=> $this->put('UldCardNumber'),
					'KindOfGood'		=> $this->put('KindOfGood'),
					'EmployeeNumber'	=> $this->put('EmployeeNumber'),
					'AgenCode'			=> $this->put('AgenCode'),
					'Condition'			=> $this->put('Condition'),
					'token'				=> $this->put('token'),
					'noid'				=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('out_buildupoffload', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'BuildUpNumber'		=> $this->post('BuildUpNumber'),
					'AirlinesCode'		=> $this->post('AirlinesCode'),
					'FlightNumber'		=> $this->post('FlightNumber'),
					'DestinationCode'	=> $this->post('DestinationCode'),
					'DateOfFlight'		=> $this->post('DateOfFlight'),
					'MasterAWB'			=> $this->post('MasterAWB'),
					'TransitCode'		=> $this->post('TransitCode'),
					'PartPieces'		=> $this->post('PartPieces'),
					'Pieces'			=> $this->post('Pieces'),
					'PartNetto'			=> $this->post('PartNetto'),
					'Netto'				=> $this->post('Netto'),
					'Volume'			=> $this->post('Volume'),
					'UldCardNumber'		=> $this->post('UldCardNumber'),
					'KindOfGood'		=> $this->post('KindOfGood'),
					'EmployeeNumber'	=> $this->post('EmployeeNumber'),
					'AgenCode'			=> $this->post('AgenCode'),
					'Condition'			=> $this->post('Condition'),
					'token'				=> $this->post('token')
					);
					
		 $insert = $this->db->insert('out_buildupoffload', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}