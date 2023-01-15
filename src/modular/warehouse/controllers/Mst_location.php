<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Mst_location extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('mst_location')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('mst_location')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'WarehouseCode'		=> $this->put('WarehouseCode'),
					'LocationCode'		=> $this->put('LocationCode'),
					'LocationName'		=> $this->put('LocationName'),
					'noid'				=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('mst_location', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'WarehouseCode'		=> $this->post('WarehouseCode'),
					'LocationCode'		=> $this->post('LocationCode'),
					'LocationName'		=> $this->post('LocationName')
					);
					
		 $insert = $this->db->insert('mst_location', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}