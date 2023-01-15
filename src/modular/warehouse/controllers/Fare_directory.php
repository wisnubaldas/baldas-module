<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Fare_directory extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('fare_directory')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('fare_directory')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'LocationCode'		=> $this->put('LocationCode'),
					'WarehouseCode'		=> $this->put('WarehouseCode'),
					'AgreementCode'		=> $this->put('AgreementCode'),
					'Datefrom'			=> $this->put('Datefrom'),
					'DateUntil'			=> $this->put('DateUntil'),
					'ItemCode'			=> $this->put('ItemCode'),
					'ValueItem'			=> $this->put('ValueItem'),
					'startday'			=> $this->put('startday'),
					'untilday'			=> $this->put('untilday'),
					'PENGALI'			=> $this->put('PENGALI'),
					'noid'				=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('fare_directory', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'LocationCode'		=> $this->post('LocationCode'),
					'WarehouseCode'		=> $this->post('WarehouseCode'),
					'AgreementCode'		=> $this->post('AgreementCode'),
					'Datefrom'			=> $this->post('Datefrom'),
					'DateUntil'			=> $this->post('DateUntil'),
					'ItemCode'			=> $this->post('ItemCode'),
					'ValueItem'			=> $this->post('ValueItem'),
					'startday'			=> $this->post('startday'),
					'untilday'			=> $this->post('untilday'),
					'PENGALI'			=> $this->post('PENGALI')
					);
					
		 $insert = $this->db->insert('fare_directory', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}