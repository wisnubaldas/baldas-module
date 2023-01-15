<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Xinventory_mps extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('xinventory_mps')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('xinventory_mps')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->PUT('noid');
        $data = array(	
					'HostAWB'		=> $this->PUT('HostAWB'),
					'mps'			=> $this->PUT('mps'),
					'Weight'		=> $this->PUT('Weight'),
					'Location'		=> $this->PUT('Location'),
					'scandate'		=> $this->PUT('scandate'),
					'scantime'		=> $this->PUT('scantime'),
					'token'			=> $this->PUT('token'),
					'date_in'		=> $this->PUT('date_in'),
					'time_in'		=> $this->PUT('time_in'),
					'flag_out'		=> $this->PUT('flag_out'),
					'date_out'		=> $this->PUT('date_out'),
					'noid'			=> $this->PUT('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('xinventory_mps', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'HostAWB'		=> $this->POST('HostAWB'),
					'mps'			=> $this->POST('mps'),
					'Weight'		=> $this->POST('Weight'),
					'Location'		=> $this->POST('Location'),
					'scandate'		=> $this->POST('scandate'),
					'scantime'		=> $this->POST('scantime'),
					'token'			=> $this->POST('token'),
					'date_in'		=> $this->POST('date_in'),
					'time_in'		=> $this->POST('time_in'),
					'flag_out'		=> $this->POST('flag_out'),
					'date_out'		=> $this->POST('date_out')
					);
					
		 $insert = $this->db->insert('xinventory_mps', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}
