<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Inc_weighingdetail extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('_id');
        if ($_id == '') {
			$data = $this->db->get('inc_weighingdetail')->result();            
        } else {
            $this->db->where('_id', $_id);
            $data = $this->db->get('inc_weighingdetail')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$_id = $this->PUT('_id');
        $data = array(	
					'id_header'				=> $this->PUT('id_header'),
					'ProofNumber'			=> $this->PUT('ProofNumber'),
					'MasterAWB'				=> $this->PUT('MasterAWB'),
					'Pieces'				=> $this->PUT('Pieces'),
					'Pallet'				=> $this->PUT('Pallet'),
					'LengthOfCargo'			=> $this->PUT('LengthOfCargo'),
					'WidthOfCargo'			=> $this->PUT('WidthOfCargo'),
					'TallOfCargo'			=> $this->PUT('TallOfCargo'),
					'Gross'					=> $this->PUT('Gross'),
					'Netto'					=> $this->PUT('Netto'),
					'Volume'				=> $this->PUT('Volume'),
					'CAW'					=> $this->PUT('CAW'),
					'KindOfgood'			=> $this->PUT('KindOfgood'),
					'StorageRoom'			=> $this->PUT('StorageRoom'),
					'DG'					=> $this->PUT('DG'),
					'OverStay'				=> $this->PUT('OverStay'),
					'AirlinesCode'			=> $this->PUT('AirlinesCode'),
					'OriginCode'			=> $this->PUT('OriginCode'),
					'FlightNumber'			=> $this->PUT('FlightNumber'),
					'DateOfArrival'			=> $this->PUT('DateOfArrival'),
					'TimeOfArrival'			=> $this->PUT('TimeOfArrival'),
					'id_breakdown'			=> $this->PUT('id_breakdown'),
					'BreakdownNumber'		=> $this->PUT('BreakdownNumber'),
					'DateOfBreakdown'		=> $this->PUT('DateOfBreakdown'),
					'Location'				=> $this->PUT('Location'),					
					'_id'					=> $this->PUT('_id')
					);
		$this->db->where('_id', $_id);
        $update = $this->db->update('inc_weighingdetail', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_POST() {		
        $data = array(		
					'id_header'				=> $this->POST('id_header'),
					'ProofNumber'			=> $this->POST('ProofNumber'),
					'MasterAWB'				=> $this->POST('MasterAWB'),
					'Pieces'				=> $this->POST('Pieces'),
					'Pallet'				=> $this->POST('Pallet'),
					'LengthOfCargo'			=> $this->POST('LengthOfCargo'),
					'WidthOfCargo'			=> $this->POST('WidthOfCargo'),
					'TallOfCargo'			=> $this->POST('TallOfCargo'),
					'Gross'					=> $this->POST('Gross'),
					'Netto'					=> $this->POST('Netto'),
					'Volume'				=> $this->POST('Volume'),
					'CAW'					=> $this->POST('CAW'),
					'KindOfgood'			=> $this->POST('KindOfgood'),
					'StorageRoom'			=> $this->POST('StorageRoom'),
					'DG'					=> $this->POST('DG'),
					'OverStay'				=> $this->POST('OverStay'),
					'AirlinesCode'			=> $this->POST('AirlinesCode'),
					'OriginCode'			=> $this->POST('OriginCode'),
					'FlightNumber'			=> $this->POST('FlightNumber'),
					'DateOfArrival'			=> $this->POST('DateOfArrival'),
					'TimeOfArrival'			=> $this->POST('TimeOfArrival'),
					'id_breakdown'			=> $this->POST('id_breakdown'),
					'BreakdownNumber'		=> $this->POST('BreakdownNumber'),
					'DateOfBreakdown'		=> $this->POST('DateOfBreakdown'),
					'Location'				=> $this->POST('Location'),
					'token'					=> $this->POST('token')
					);
					
		 $insert = $this->db->insert('inc_weighingdetail', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}