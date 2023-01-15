<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Mst_route extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('mst_route')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('mst_route')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'TwoLetterCode'		=> $this->put('TwoLetterCode'),
					'OriginCode'		=> $this->put('OriginCode'),
					'DestinationCode'	=> $this->put('DestinationCode'),
					'Route'				=> $this->put('Route'),
					'WarehouseCode'		=> $this->put('WarehouseCode'),
					'noid'				=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('mst_route', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'TwoLetterCode'		=> $this->post('TwoLetterCode'),
					'OriginCode'		=> $this->post('OriginCode'),
					'DestinationCode'	=> $this->post('DestinationCode'),
					'Route'				=> $this->post('Route'),
					'WarehouseCode'		=> $this->post('WarehouseCode')
					);
					
		 $insert = $this->db->insert('mst_route', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}