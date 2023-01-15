<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Mst_number extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse', TRUE);
	}
	
	function index_get() {
        $IDnumber = $this->get('IDnumber');
        if ($IDnumber == '') {
			$data = $this->db->get('mst_number')->result();            
        } else {
            $this->db->where('IDnumber', $IDnumber);
            $data = $this->db->get('mst_number')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$IDnumber = $this->put('IDnumber');
        $data = array(	
					'ConstantKey'		=> $this->put('ConstantKey'),
					'QueveNumber'		=> $this->put('QueveNumber'),
					'DescriptionCode'	=> $this->put('DescriptionCode'),
					'Totaldigit'		=> $this->put('Totaldigit'),
					'Active'			=> $this->put('Active'),
					'IDnumber'			=> $this->put('IDnumber')
					);
		$this->db->where('IDnumber', $IDnumber);
        $update = $this->db->update('mst_number', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'ConstantKey'		=> $this->post('ConstantKey'),
					'QueveNumber'		=> $this->post('QueveNumber'),
					'DescriptionCode'	=> $this->post('DescriptionCode'),
					'Totaldigit'		=> $this->post('Totaldigit'),
					'Active'			=> $this->post('Active')
					);
					
		 $insert = $this->db->insert('mst_number', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}