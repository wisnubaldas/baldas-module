<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Eks_approval extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('eks_approval')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('eks_approval')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'MasterAWB'			=> $this->put('MasterAWB'),
					'HostAWB'			=> $this->put('HostAWB'),
					'AirlinesCode'		=> $this->put('AirlinesCode'),
					'Destination'		=> $this->put('Destination'),
					'Route'				=> $this->put('Route'),
					'PartOfPieces'		=> $this->put('PartOfPieces'),
					'Pieces'			=> $this->put('Pieces'),
					'Packaging_Type'	=> $this->put('Packaging_Type'),
					'ShipperCode'		=> $this->put('ShipperCode'),
					'AGenCode'			=> $this->put('AGenCode'),
					'ConsigneeCode'		=> $this->put('ConsigneeCode'),
					'ShipperName'		=> $this->put('ShipperName'),
					'PhoneNumber'		=> $this->put('PhoneNumber'),
					'HSCode'			=> $this->put('HSCode'),
					'EmployeeNumber'	=> $this->put('EmployeeNumber'),
					'DateOfSLI'			=> $this->put('DateOfSLI'),
					'TimeOFSLI'			=> $this->put('TimeOFSLI'),
					'StatusProof'		=> $this->put('StatusProof'),
					'specialhandling01'	=> $this->put('specialhandling01'),
					'specialhandling02'	=> $this->put('specialhandling02'),
					'token'				=> $this->put('token'),
					'noid' 				=> $this->put('noid')
					);
					
		$this->db->where('noid', $noid);
        $update = $this->db->update('eks_approval', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'MasterAWB'			=> $this->post('MasterAWB'),
					'HostAWB'			=> $this->post('HostAWB'),
					'AirlinesCode'		=> $this->post('AirlinesCode'),
					'Destination'		=> $this->post('Destination'),
					'Route'				=> $this->post('Route'),
					'PartOfPieces'		=> $this->post('PartOfPieces'),
					'Pieces'			=> $this->post('Pieces'),
					'Packaging_Type'	=> $this->post('Packaging_Type'),
					'ShipperCode'		=> $this->post('ShipperCode'),
					'AGenCode'			=> $this->post('AGenCode'),
					'ConsigneeCode'		=> $this->post('ConsigneeCode'),
					'ShipperName'		=> $this->post('ShipperName'),
					'PhoneNumber'		=> $this->post('PhoneNumber'),
					'HSCode'			=> $this->post('HSCode'),
					'EmployeeNumber'	=> $this->post('EmployeeNumber'),
					'DateOfSLI'			=> $this->post('DateOfSLI'),
					'TimeOFSLI'			=> $this->post('TimeOFSLI'),
					'StatusProof'		=> $this->post('StatusProof'),
					'specialhandling01'	=> $this->post('specialhandling01'),
					'specialhandling02'	=> $this->post('specialhandling02'),
					'token'				=> $this->post('token')
					);
					
		 $insert = $this->db->insert('eks_approval', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}