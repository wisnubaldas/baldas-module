<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Imp_poddetail extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('imp_poddetail')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('imp_poddetail')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'TravelNumber'		=> $this->put('TravelNumber'),
					'InvoiceNumber'		=> $this->put('InvoiceNumber'),
					'MasterAWB'			=> $this->put('MasterAWB'),
					'HostAWB'			=> $this->put('HostAWB'),
					'KindOfGood'		=> $this->put('KindOfGood'),
					'Pieces'			=> $this->put('Pieces'),
					'Netto'				=> $this->put('Netto'),
					'Volume'			=> $this->put('Volume'),
					'token'				=> $this->put('token')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('imp_poddetail', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'TravelNumber'		=> $this->post('TravelNumber'),
					'InvoiceNumber'		=> $this->post('InvoiceNumber'),
					'MasterAWB'			=> $this->post('MasterAWB'),
					'HostAWB'			=> $this->post('HostAWB'),
					'KindOfGood'		=> $this->post('KindOfGood'),
					'Pieces'			=> $this->post('Pieces'),
					'Netto'				=> $this->post('Netto'),
					'Volume'			=> $this->post('Volume'),
					'token'				=> $this->post('token')
					);
					
		 $insert = $this->db->insert('imp_poddetail', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}