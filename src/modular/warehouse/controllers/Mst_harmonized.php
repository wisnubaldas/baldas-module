<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Mst_harmonized extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('mst_harmonized')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('mst_harmonized')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'HSGroup'				=> $this->put('HSGroup'),
					'HSCode'				=> $this->put('HSCode'),
					'DescriptionHSGRoup'	=> $this->put('DescriptionHSGRoup'),
					'noid'					=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('mst_harmonized', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'HSGroup'				=> $this->post('HSGroup'),
					'HSCode'				=> $this->post('HSCode'),
					'DescriptionHSGRoup'	=> $this->post('DescriptionHSGRoup')
					);
					
		 $insert = $this->db->insert('mst_harmonized', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}