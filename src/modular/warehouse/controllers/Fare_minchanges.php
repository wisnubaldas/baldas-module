<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Fare_minchanges extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('fare_minchanges')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('fare_minchanges')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'WareHouseCode'			=> $this->put('WareHouseCode'),
					'DescriptionValue'		=> $this->put('DescriptionValue'),
					'MinimumValue'			=> $this->put('MinimumValue'),
					'DateFrom'				=> $this->put('DateFrom'),
					'DateUntil'				=> $this->put('DateUntil'),
					'noid'					=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('fare_minchanges', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'WareHouseCode'			=> $this->post('WareHouseCode'),
					'DescriptionValue'		=> $this->post('DescriptionValue'),
					'MinimumValue'			=> $this->post('MinimumValue'),
					'DateFrom'				=> $this->post('DateFrom'),
					'DateUntil'				=> $this->put('DateUntil')
					);
					
		 $insert = $this->db->insert('fare_minchanges', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}