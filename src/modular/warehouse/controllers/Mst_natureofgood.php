<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Mst_natureofgood extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $Noid = $this->get('nat_code');
        if ($Noid == '') {
			$data = $this->db->get('mst_natureofgood')->result();            
        } else {
            $this->db->where('nat_code', $Noid);
            $data = $this->db->get('mst_natureofgood')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$Noid = $this->put('nat_code');
        $data = array(	
					'nat_description'	=> $this->put('nat_description'),
					'nat_code'			=> $this->put('nat_code')
					);
		$this->db->where('nat_code', $Noid);
        $update = $this->db->update('mst_natureofgood', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'nat_code'			=> $this->post('nat_code'),
					'nat_description'	=> $this->post('nat_description')
					);
					
		 $insert = $this->db->insert('mst_natureofgood', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}