<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Imp_noa extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('imp_noa')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('imp_noa')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'NOANumber'			=> $this->put('NOANumber'),
					'BreakdownNumber'	=> $this->put('BreakdownNumber'),
					'MasterAWB'			=> $this->put('MasterAWB'),
					'Pieces'			=> $this->put('Pieces'),
					'Netto'				=> $this->put('Netto'),
					'AirlinesCode'		=> $this->put('AirlinesCode'),
					'FlightNumber'		=> $this->put('FlightNumber'),
					'OriginCode'		=> $this->put('OriginCode'),
					'DateOfNOA'			=> $this->put('DateOfNOA'),
					'TimeOfNOA'			=> $this->put('TimeOfNOA'),
					'ConsigneeCode'		=> $this->put('ConsigneeCode'),
					'NFD'				=> $this->put('NFD'),
					'EmployeeNumber'	=> $this->put('EmployeeNumber'),
					'token'				=> $this->put('token'),
					'noid'				=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('imp_noa', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'NOANumber'			=> $this->post('NOANumber'),
					'BreakdownNumber'	=> $this->post('BreakdownNumber'),
					'MasterAWB'			=> $this->post('MasterAWB'),
					'Pieces'			=> $this->post('Pieces'),
					'Netto'				=> $this->post('Netto'),
					'AirlinesCode'		=> $this->post('AirlinesCode'),
					'FlightNumber'		=> $this->post('FlightNumber'),
					'OriginCode'		=> $this->post('OriginCode'),
					'DateOfNOA'			=> $this->post('DateOfNOA'),
					'TimeOfNOA'			=> $this->post('TimeOfNOA'),
					'ConsigneeCode'		=> $this->post('ConsigneeCode'),
					'NFD'				=> $this->post('NFD'),
					'EmployeeNumber'	=> $this->post('EmployeeNumber'),
					'token'				=> $this->post('token')
					);
					
		 $insert = $this->db->insert('imp_noa', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}