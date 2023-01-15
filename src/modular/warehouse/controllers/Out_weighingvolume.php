<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Out_weighingvolume extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('_id');
        if ($_id == '') {
			$data = $this->db->get('out_weighingvolume')->result();            
        } else {
            $this->db->where('_id', $_id);
            $data = $this->db->get('out_weighingvolume')->result();
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
					'Pieces'			=> $this->PUT('Pieces'),
					'LongCargo'			=> $this->PUT('LongCargo'),
					'WidthCargo'		=> $this->PUT('WidthCargo'),
					'HighCargo'			=> $this->PUT('HighCargo'),
					'VolumeCargo'		=> $this->PUT('VolumeCargo'),
					'token'				=> $this->PUT('token'),
					'_id'				=> $this->PUT('_id')
					);
		$this->db->where('_id', $_id);
        $update = $this->db->update('out_weighingvolume', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'ProofNumber'		=> $this->POST('ProofNumber'),
					'MasterAWB'			=> $this->POST('MasterAWB'),
					'HostAWB'			=> $this->POST('HostAWB'),
					'Pieces'			=> $this->POST('Pieces'),
					'LongCargo'			=> $this->POST('LongCargo'),
					'WidthCargo'		=> $this->POST('WidthCargo'),
					'HighCargo'			=> $this->POST('HighCargo'),
					'VolumeCargo'		=> $this->POST('VolumeCargo'),
					'token'				=> $this->POST('token')
					);
					
		 $insert = $this->db->insert('out_weighingvolume', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}