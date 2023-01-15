<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Eks_weighingvol extends REST_Controller {
	
	private $db7;
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db7 = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db7->get('eks_weighingvol')->result();            
        } else {
            $this->db7->where('noid', $noid);
            $data = $this->db7->get('eks_weighingvol')->result();
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
					'LongCargo'			=> $this->put('LongCargo'),
					'WidthCargo'		=> $this->put('WidthCargo'),
					'HighCargo'			=> $this->put('HighCargo'),
					'VolumeCargo'		=> $this->put('VolumeCargo'),
					'DateEntry'			=> $this->put('DateEntry'),
					'TimeEntry'			=> $this->put('TimeEntry'),
					'token'				=> $this->put('token'),
					'noid'				=> $this->put('noid')
					);
		$this->db7->where('noid', $noid);
        $update = $this->db7->update('eks_weighingvol', $data);
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
					'LongCargo'			=> $this->post('LongCargo'),
					'WidthCargo'		=> $this->post('WidthCargo'),
					'HighCargo'			=> $this->post('HighCargo'),
					'VolumeCargo'		=> $this->post('VolumeCargo'),
					'DateEntry'			=> $this->post('DateEntry'),
					'TimeEntry'			=> $this->post('TimeEntry'),
					'token'				=> $this->post('token')
					);
					
		 $insert = $this->db7->insert('eks_weighingvol', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}