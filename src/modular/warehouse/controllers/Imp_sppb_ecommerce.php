<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Imp_sppb_ecommerce extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('imp_sppb_ecommerce')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('imp_sppb_ecommerce')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'mawb'				=> $this->put('mawb'),
					'hawb'				=> $this->put('hawb'),
					'sppb'				=> $this->put('sppb'),
					'type_clearance'	=> $this->put('type_clearance'),
					'tanggal'			=> $this->put('tanggal'),
					'token'				=> $this->put('token'),
					'noid'				=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('imp_sppb_ecommerce', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'mawb'				=> $this->post('mawb'),
					'hawb'				=> $this->post('hawb'),
					'sppb'				=> $this->post('sppb'),
					'type_clearance'	=> $this->post('type_clearance'),
					'tanggal'			=> $this->post('tanggal'),
					'token'				=> $this->post('token')
					);
					
		 $insert = $this->db->insert('imp_sppb_ecommerce', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}