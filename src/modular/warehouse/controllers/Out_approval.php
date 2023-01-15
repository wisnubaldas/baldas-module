<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Out_approval extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('_id');
        if ($_id == '') {
			$data = $this->db->get('out_approval')->result();            
        } else {
            $this->db->where('_id', $_id);
            $data = $this->db->get('out_approval')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$_id = $this->PUT('_id');
        $data = array(						
					'MasterAWB'			=> $this->PUT('MasterAWB'),					
					'AirlinesCode'		=> $this->PUT('AirlinesCode'),
					'Origin'			=> $this->PUT('Origin'),
					'Destination'		=> $this->PUT('Destination'),
					'PartOfPieces'		=> $this->PUT('PartOfPieces'),
					'Pieces'			=> $this->PUT('Pieces'),
					'id_shipper'		=> $this->PUT('id_shipper'),
					'shipperCode'		=> $this->PUT('shipperCode'),
					'id_agent'			=> $this->PUT('id_agent'),
					'agentCode'			=> $this->PUT('agentCode'),
					'id_consignee'		=> $this->PUT('id_consignee'),
					'consigneeCode'		=> $this->PUT('consigneeCode'),
					'ShipperName'		=> $this->PUT('ShipperName'),
					'PhoneNumber'		=> $this->PUT('PhoneNumber'),
					'HSCode'			=> $this->PUT('HSCode'),
					'kindofgood'		=> $this->PUT('kindofgood'),
					'specialhandling'	=> $this->PUT('specialhandling'),
					'EmployeeNumber'	=> $this->PUT('EmployeeNumber'),
					'DateOfSLI'			=> $this->PUT('DateOfSLI'),
					'TimeOFSLI'			=> $this->PUT('TimeOFSLI'),
					'StatusProof'		=> $this->PUT('StatusProof'),
					'token'				=> $this->PUT('token'),
					'_id'				=> $this->PUT('_id')
					);
					
					
		$this->db->where('_id', $_id);
        $update = $this->db->update('out_approval', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'MasterAWB'			=> $this->POST('MasterAWB'),					
					'AirlinesCode'		=> $this->POST('AirlinesCode'),
					'Origin'			=> $this->POST('Origin'),
					'Destination'		=> $this->POST('Destination'),
					'PartOfPieces'		=> $this->POST('PartOfPieces'),
					'Pieces'			=> $this->POST('Pieces'),
					'id_shipper'		=> $this->POST('id_shipper'),
					'shipperCode'		=> $this->POST('shipperCode'),
					'id_agent'			=> $this->POST('id_agent'),
					'agentCode'			=> $this->POST('agentCode'),
					'id_consignee'		=> $this->POST('id_consignee'),
					'consigneeCode'		=> $this->POST('consigneeCode'),
					'ShipperName'		=> $this->POST('ShipperName'),
					'PhoneNumber'		=> $this->POST('PhoneNumber'),
					'HSCode'			=> $this->POST('HSCode'),
					'kindofgood'		=> $this->POST('kindofgood'),
					'specialhandling'	=> $this->POST('specialhandling'),
					'EmployeeNumber'	=> $this->POST('EmployeeNumber'),
					'DateOfSLI'			=> $this->POST('DateOfSLI'),
					'TimeOFSLI'			=> $this->POST('TimeOFSLI'),
					'StatusProof'		=> $this->POST('StatusProof'),
					'token'				=> $this->POST('token')
					);
					
		 $insert = $this->db->insert('out_approval', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}