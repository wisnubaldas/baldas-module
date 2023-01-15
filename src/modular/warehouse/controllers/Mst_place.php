<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Mst_place extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('mst_place')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('mst_place')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'CountryCode'		=> $this->put('CountryCode'),
					'PlaceCode'			=> $this->put('PlaceCode'),
					'PlaceName'			=> $this->put('PlaceName'),
					'noid'				=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('mst_place', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'CountryCode'		=> $this->post('CountryCode'),
					'PlaceCode'			=> $this->post('PlaceCode'),
					'PlaceName'			=> $this->post('PlaceName')
					);
					
		 $insert = $this->db->insert('mst_place', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}