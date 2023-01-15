<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Mst_gserental extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('mst_gserental')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('mst_gserental')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'EquipmentCode'		=> $this->put('EquipmentCode'),
					'RentalTarif'		=> $this->put('RentalTarif'),
					'CurrencyName'		=> $this->put('CurrencyName'),
					'DateFrom'			=> $this->put('DateFrom'),
					'DateUntil'			=> $this->put('DateUntil'),
					'noid'				=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('mst_gserental', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'EquipmentCode'		=> $this->post('EquipmentCode'),
					'RentalTarif'		=> $this->post('RentalTarif'),
					'CurrencyName'		=> $this->post('CurrencyName'),
					'DateFrom'			=> $this->post('DateFrom'),
					'DateUntil'			=> $this->post('DateUntil')
					);
					
		 $insert = $this->db->insert('mst_gserental', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}