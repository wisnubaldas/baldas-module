<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Fare_actived extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('fare_actived')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('fare_actived')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'WarehouseCode'		=> $this->put('WarehouseCode'),
					'AgreementCode'		=> $this->put('AgreementCode'),
					'SequenceNumb'		=> $this->put('SequenceNumb'),
					'ItemCode'			=> $this->put('ItemCode'),
					'Actived'			=> $this->put('Actived'),
					'noid'				=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('fare_actived', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'WarehouseCode'		=> $this->post('WarehouseCode'),
					'AgreementCode'		=> $this->post('AgreementCode'),
					'SequenceNumb'		=> $this->post('SequenceNumb'),
					'ItemCode'			=> $this->post('ItemCode'),
					'Actived'			=> $this->post('Actived')
					);
					
		 $insert = $this->db->insert('fare_actived', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}