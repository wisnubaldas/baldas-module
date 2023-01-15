<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Mst_rack extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	// Noid	WarehouseCode	rack_code	rack_name
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('mst_rack')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('mst_rack')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'WarehouseCode'	=> $this->put('WarehouseCode'),
					'rack_code'		=> $this->put('rack_code'),
					'rack_name'		=> $this->put('rack_name'),
					'noid'			=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('mst_rack', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'WarehouseCode'		=> $this->post('WarehouseCode'),
					'rack_code'			=> $this->post('rack_code'),
					'rack_name'			=> $this->post('rack_name')
					);
					
		 $insert = $this->db->insert('mst_rack', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}