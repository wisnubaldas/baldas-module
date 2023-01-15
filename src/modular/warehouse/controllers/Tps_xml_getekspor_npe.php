<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Tps_xml_getekspor_npe extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db4 = $this->load->database('db_tpsonline', TRUE);
	}
	
	function index_get() {
        $id = $this->get('id');
        if ($id == '') {
			$data = $this->db4->get('xml_getekspor_npe')->result();            
        } else {
            $this->db4->where('id', $id);
            $data = $this->db4->get('xml_getekspor_npe')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$id = $this->put('id');
        $data = array(	
					'xml_code'				=> $this->put('xml_code'),
					'xml'					=> $this->put('xml'),
					'id'					=> $this->put('id')
					);
		$this->db4->where('id', $id);
        $update = $this->db4->update('xml_getekspor_npe', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'xml_code'			=> $this->post('xml_code'),
					'xml'				=> $this->post('xml')
					);
					
		 $insert = $this->db4->insert('xml_getekspor_npe', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}