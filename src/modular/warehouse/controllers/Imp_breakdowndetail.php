<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Imp_breakdowndetail extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('imp_breakdowndetail')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('imp_breakdowndetail')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'BreakdownNumber'	=> $this->put('BreakdownNumber'),
					'MasterAWB'			=> $this->put('MasterAWB'),
					'Parsial'			=> $this->put('Parsial'),
					'PosMaster'			=> $this->put('PosMaster'),
					'TransitCode'		=> $this->put('TransitCode'),
					'Pieces'			=> $this->put('Pieces'),
					'Netto'				=> $this->put('Netto'),
					'Volume'			=> $this->put('Volume'),
					'KindOfCode'		=> $this->put('KindOfCode'),
					'KindOfGood'		=> $this->put('KindOfGood'),
					'UldCardNumber'		=> $this->put('UldCardNumber'),
					'Remark'			=> $this->put('Remark'),
					'EmployeeNumber'	=> $this->put('EmployeeNumber'),
					'DateOfBreakdown'	=> $this->put('DateOfBreakdown'),
					'TimeOfBreakdown'	=> $this->put('TimeOfBreakdown'),
					'AirlinesCode'		=> $this->put('AirlinesCode'),
					'FlightNumber'		=> $this->put('FlightNumber'),
					'OriginCode'		=> $this->put('OriginCode'),
					'PrintNumber'		=> $this->put('PrintNumber'),
					'LocationCode'		=> $this->put('LocationCode'),
					'RCF'				=> $this->put('RCF'),
					'sisa'				=> $this->put('sisa'),	
					'token'				=> $this->put('token'),
					'noid'				=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('imp_breakdowndetail', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'BreakdownNumber'	=> $this->post('BreakdownNumber'),
					'MasterAWB'			=> $this->post('MasterAWB'),
					'Parsial'			=> $this->post('Parsial'),
					'PosMaster'			=> $this->post('PosMaster'),
					'TransitCode'		=> $this->post('TransitCode'),
					'Pieces'			=> $this->post('Pieces'),
					'Netto'				=> $this->post('Netto'),
					'Volume'			=> $this->post('Volume'),
					'KindOfCode'		=> $this->post('KindOfCode'),
					'KindOfGood'		=> $this->post('KindOfGood'),
					'UldCardNumber'		=> $this->post('UldCardNumber'),
					'Remark'			=> $this->post('Remark'),
					'EmployeeNumber'	=> $this->post('EmployeeNumber'),
					'DateOfBreakdown'	=> $this->post('DateOfBreakdown'),
					'TimeOfBreakdown'	=> $this->post('TimeOfBreakdown'),
					'AirlinesCode'		=> $this->post('AirlinesCode'),
					'FlightNumber'		=> $this->post('FlightNumber'),
					'OriginCode'		=> $this->post('OriginCode'),
					'PrintNumber'		=> $this->post('PrintNumber'),
					'LocationCode'		=> $this->post('LocationCode'),
					'RCF'				=> $this->post('RCF'),
					'sisa'				=> $this->post('sisa'),
					'token'				=> $this->post('token')
					);
					
		 $insert = $this->db->insert('imp_breakdowndetail', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}