<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Out_weighingdetail extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('_id');
        if ($_id == '') {
			$data = $this->db->get('out_weighingdetail')->result();            
        } else {
            $this->db->where('_id', $_id);
            $data = $this->db->get('out_weighingdetail')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$_id = $this->PUT('_id');
        $data = array(	
					'id_header'			=> $this->PUT('id_header'),
					'ProofNumber'		=> $this->PUT('ProofNumber'),
					'MasterAWB'			=> $this->PUT('MasterAWB'),
					'HostAWB'			=> $this->PUT('HostAWB'),
					'AirlinesCode'		=> $this->PUT('AirlinesCode'),
					'Destination'		=> $this->PUT('Destination'),
					'Route'				=> $this->PUT('Route'),
					'FlightNumber'		=> $this->PUT('FlightNumber'),
					'Pieces'			=> $this->PUT('Pieces'),
					'Pallet'			=> $this->PUT('Pallet'),
					'GrossWeight'		=> $this->PUT('GrossWeight'),
					'NettoWeight'		=> $this->PUT('NettoWeight'),
					'LongCargo'			=> $this->PUT('LongCargo'),
					'WidthCargo'		=> $this->PUT('WidthCargo'),
					'HighCargo'			=> $this->PUT('HighCargo'),
					'VolumeCargo'		=> $this->PUT('VolumeCargo'),
					'NettoSMU'			=> $this->PUT('NettoSMU'),
					'CAW'				=> $this->PUT('CAW'),
					'StorageRoom'		=> $this->PUT('StorageRoom'),
					'DG'				=> $this->PUT('DG'),
					'KindOfCode'		=> $this->PUT('KindOfCode'),
					'KindOfNature'		=> $this->PUT('KindOfNature'),
					'BuildUpFlag'		=> $this->PUT('BuildUpFlag'),
					'BuildupNumber'		=> $this->PUT('BuildupNumber'),
					'id_buildupdetail'	=> $this->PUT('id_buildupdetail'),					
					'token'				=> $this->PUT('token'),
					'_id'				=> $this->PUT('_id')
					);
		$this->db->where('_id', $_id);
        $update = $this->db->update('out_weighingdetail', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'id_header'			=> $this->POST('id_header'),
					'ProofNumber'		=> $this->POST('ProofNumber'),
					'MasterAWB'			=> $this->POST('MasterAWB'),
					'HostAWB'			=> $this->POST('HostAWB'),
					'AirlinesCode'		=> $this->POST('AirlinesCode'),
					'origin'			=> $this->POST('origin'),
					'Destination'		=> $this->POST('Destination'),					
					'FlightNumber'		=> $this->POST('FlightNumber'),
					'Pieces'			=> $this->POST('Pieces'),
					'Pallet'			=> $this->POST('Pallet'),
					'GrossWeight'		=> $this->POST('GrossWeight'),
					'NettoWeight'		=> $this->POST('NettoWeight'),
					'LongCargo'			=> $this->POST('LongCargo'),
					'WidthCargo'		=> $this->POST('WidthCargo'),
					'HighCargo'			=> $this->POST('HighCargo'),
					'VolumeCargo'		=> $this->POST('VolumeCargo'),
					'NettoSMU'			=> $this->POST('NettoSMU'),
					'CAW'				=> $this->POST('CAW'),
					'StorageRoom'		=> $this->POST('StorageRoom'),
					'DG'				=> $this->POST('DG'),
					'KindOfCode'		=> $this->POST('KindOfCode'),
					'KindOfNature'		=> $this->POST('KindOfNature'),
					'BuildUpFlag'		=> $this->POST('BuildUpFlag'),
					'BuildupNumber'		=> $this->POST('BuildupNumber'),
					'id_buildupdetail'	=> $this->POST('id_buildupdetail'),
					'token'				=> $this->POST('token')
					);
					
		 $insert = $this->db->insert('out_weighingdetail', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}