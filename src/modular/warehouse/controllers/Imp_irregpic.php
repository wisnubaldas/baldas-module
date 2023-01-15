<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Imp_irregpic extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('imp_irregpic')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('imp_irregpic')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'DateOfRecord'		=> $this->put('DateOfRecord'),
					'TimeOfRecord'		=> $this->put('TimeOfRecord'),
					'AirlinesCode'		=> $this->put('AirlinesCode'),
					'FlightNumber'		=> $this->put('FlightNumber'),
					'DescriptionImage'	=> $this->put('DescriptionImage'),
					'SizePicture'		=> $this->put('SizePicture'),
					'DataPicture'		=> $this->put('DataPicture'),
					'token'				=> $this->put('token'),
					'noid'				=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('imp_irregpic', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'DateOfRecord'		=> $this->post('DateOfRecord'),
					'TimeOfRecord'		=> $this->post('TimeOfRecord'),
					'AirlinesCode'		=> $this->post('AirlinesCode'),
					'FlightNumber'		=> $this->post('FlightNumber'),
					'DescriptionImage'	=> $this->post('DescriptionImage'),
					'SizePicture'		=> $this->post('SizePicture'),
					'DataPicture'		=> $this->post('DataPicture'),
					'token'				=> $this->post('token')
					);
					
		 $insert = $this->db->insert('imp_irregpic', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}