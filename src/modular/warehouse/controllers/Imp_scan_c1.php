<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Imp_scan_c1 extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('imp_scan_c1')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('imp_scan_c1')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'bagnumber'		=> $this->put('bagnumber'),
					'hawb'			=> $this->put('hawb'),
					'tracking'		=> $this->put('tracking'),
					'dateofscan'	=> $this->put('dateofscan'),
					'timeofscan'	=> $this->put('timeofscan'),
					'typescan'		=> $this->put('typescan'),
					'token'			=> $this->put('token'),
					'noid'			=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('imp_scan_c1', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'bagnumber'		=> $this->post('bagnumber'),
					'hawb'			=> $this->post('hawb'),
					'tracking'		=> $this->post('tracking'),
					'dateofscan'	=> $this->post('dateofscan'),
					'timeofscan'	=> $this->post('timeofscan'),
					'typescan'		=> $this->post('typescan'),
					'token'			=> $this->post('token')
					);
					
		 $insert = $this->db->insert('imp_scan_c1', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}