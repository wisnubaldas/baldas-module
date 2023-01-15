<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Inc_breakdowndetail extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $_id = $this->get('_id');
        if ($_id == '') {
			$data = $this->db->get('inc_breakdowndetail')->result();            
        } else {
            $this->db->where('_id', $_id);
            $data = $this->db->get('inc_breakdowndetail')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$_id = $this->put('_id');
        $data = array(	
					'id_header'			=> $this->put('id_header'),
					'BreakdownNumber'	=> $this->put('BreakdownNumber'),
					'MasterAWB'			=> $this->put('MasterAWB'),
					'Parsial'			=> $this->put('Parsial'),
					'TransitCode'		=> $this->put('TransitCode'),
					'Pieces'			=> $this->put('Pieces'),
					'Netto'				=> $this->put('Netto'),
					'CAW'				=> $this->put('CAW'),
					'KindOfCode'		=> $this->put('KindOfCode'),
					'UldCardNumber'		=> $this->put('UldCardNumber'),
					'Remark'			=> $this->put('Remark'),
					'EmployeeNumber'	=> $this->put('EmployeeNumber'),
					'DateOfBreakdown'	=> $this->put('DateOfBreakdown'),
					'TimeOfBreakdown'	=> $this->put('TimeOfBreakdown'),
					'AirlinesCode'		=> $this->put('AirlinesCode'),
					'FlightNumber'		=> $this->put('FlightNumber'),
					'OriginCode'		=> $this->put('OriginCode'),
					'id_proof'			=> $this->put('id_proof'),		
					'ProofNumber'		=> $this->put('ProofNumber'),	
					'token'				=> $this->put('token'),
					'_id'				=> $this->put('_id')
					);
		$this->db->where('_id', $_id);
        $update = $this->db->update('inc_breakdowndetail', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'id_header'			=> $this->post('id_header'),
					'BreakdownNumber'	=> $this->post('BreakdownNumber'),
					'MasterAWB'			=> $this->post('MasterAWB'),
					'Parsial'			=> $this->post('Parsial'),
					'TransitCode'		=> $this->post('TransitCode'),
					'Pieces'			=> $this->post('Pieces'),
					'Netto'				=> $this->post('Netto'),
					'CAW'				=> $this->post('CAW'),
					'KindOfCode'		=> $this->post('KindOfCode'),
					'UldCardNumber'		=> $this->post('UldCardNumber'),
					'Remark'			=> $this->post('Remark'),
					'EmployeeNumber'	=> $this->post('EmployeeNumber'),
					'DateOfBreakdown'	=> $this->post('DateOfBreakdown'),
					'TimeOfBreakdown'	=> $this->post('TimeOfBreakdown'),
					'AirlinesCode'		=> $this->post('AirlinesCode'),
					'FlightNumber'		=> $this->post('FlightNumber'),
					'OriginCode'		=> $this->post('OriginCode'),					
					'id_proof'			=> $this->post('id_proof'),
					'ProofNumber'		=> $this->post('ProofNumber'),
					'token'				=> $this->post('token')
					);
					
		 $insert = $this->db->insert('inc_breakdowndetail', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}