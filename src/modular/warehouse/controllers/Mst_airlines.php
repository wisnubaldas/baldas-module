<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Mst_airlines extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('mst_airlines')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('mst_airlines')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'TwoLetterCode'			=> $this->put('TwoLetterCode'),
					'ThreeLetterCode'		=> $this->put('ThreeLetterCode'),
					'AirlinesName'			=> $this->put('AirlinesName'),
					'CountryCode'			=> $this->put('CountryCode'),
					'Actived'				=> $this->put('Actived'),
					'KodeGudangByCustom'	=> $this->put('KodeGudangByCustom'),
					'noid'					=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('mst_airlines', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'TwoLetterCode'			=> $this->post('TwoLetterCode'),
					'ThreeLetterCode'		=> $this->post('ThreeLetterCode'),
					'AirlinesName'			=> $this->post('AirlinesName'),
					'CountryCode'			=> $this->post('CountryCode'),
					'Actived'				=> $this->post('Actived'),
					'KodeGudangByCustom'	=> $this->post('KodeGudangByCustom')
					);
					
		 $insert = $this->db->insert('mst_airlines', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}