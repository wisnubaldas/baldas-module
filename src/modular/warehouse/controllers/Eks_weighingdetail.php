<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Eks_weighingdetail extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('eks_weighingdetail')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('eks_weighingdetail')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'ProofNumber'		=> $this->put('ProofNumber'),
					'MasterAWB'			=> $this->put('MasterAWB'),
					'HostAWB'			=> $this->put('HostAWB'),
					'Pieces'			=> $this->put('Pieces'),
					'Pallet'			=> $this->put('Pallet'),
					'GrossWeight'		=> $this->put('GrossWeight'),
					'NettoWeight'		=> $this->put('NettoWeight'),
					'LongCargo'			=> $this->put('LongCargo'),
					'WidthCargo'		=> $this->put('WidthCargo'),
					'HighCargo'			=> $this->put('HighCargo'),
					'VolumeCargo'		=> $this->put('VolumeCargo'),
					'CAW'				=> $this->put('CAW'),
					'StorageRoom'		=> $this->put('StorageRoom'),
					'DG'				=> $this->put('DG'),
					'KindOfCode'		=> $this->put('KindOfCode'),
					'KindOfNature'		=> $this->put('KindOfNature'),
					'BuildUpFlag'		=> $this->put('BuildUpFlag'),
					'DateEntry'			=> $this->put('DateEntry'),
					'TimeEntry'			=> $this->put('TimeEntry'),
					'token'				=> $this->put('token'),
					'noid'				=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('eks_weighingdetail', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'ProofNumber'		=> $this->post('ProofNumber'),
					'MasterAWB'			=> $this->post('MasterAWB'),
					'HostAWB'			=> $this->post('HostAWB'),
					'Pieces'			=> $this->post('Pieces'),
					'Pallet'			=> $this->post('Pallet'),
					'GrossWeight'		=> $this->post('GrossWeight'),
					'NettoWeight'		=> $this->post('NettoWeight'),
					'LongCargo'			=> $this->post('LongCargo'),
					'WidthCargo'		=> $this->post('WidthCargo'),
					'HighCargo'			=> $this->post('HighCargo'),
					'VolumeCargo'		=> $this->post('VolumeCargo'),
					'CAW'				=> $this->post('CAW'),
					'StorageRoom'		=> $this->post('StorageRoom'),
					'DG'				=> $this->post('DG'),
					'KindOfCode'		=> $this->post('KindOfCode'),
					'KindOfNature'		=> $this->post('KindOfNature'),
					'BuildUpFlag'		=> $this->post('BuildUpFlag'),
					'DateEntry'			=> $this->post('DateEntry'),
					'TimeEntry'			=> $this->post('TimeEntry'),
					'token'				=> $this->post('token')
					);
					
		 $insert = $this->db->insert('eks_weighingdetail', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}