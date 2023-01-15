<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Fare_kurs extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('fare_kurs')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('fare_kurs')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'DateFrom'		=> $this->put('DateFrom'),
					'TimeFrom'		=> $this->put('TimeFrom'),
					'DateUntil'		=> $this->put('DateUntil'),
					'TimeUntil'		=> $this->put('TimeUntil'),
					'KursValue'		=> $this->put('KursValue'),
					'IDCountry'		=> $this->put('IDCountry'),
					'noid'			=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('fare_kurs', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'DateFrom'		=> $this->post('DateFrom'),
					'TimeFrom'		=> $this->post('TimeFrom'),
					'DateUntil'		=> $this->post('DateUntil'),
					'TimeUntil'		=> $this->post('TimeUntil'),
					'KursValue'		=> $this->post('KursValue'),
					'IDCountry'		=> $this->post('IDCountry')
					);
					
		 $insert = $this->db->insert('fare_kurs', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}