<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Imp_deliorderdetail extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('imp_deliorderdetail')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('imp_deliorderdetail')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'DONumber'				=> $this->put('DONumber'),
					'BreakdownNumber'		=> $this->put('BreakdownNumber'),
					'MasterAWB'				=> $this->put('MasterAWB'),
					'Parsial'				=> $this->put('Parsial'),
					'AirlinesCode'			=> $this->put('AirlinesCode'),
					'FlightNumber'			=> $this->put('FlightNumber'),
					'OriginCode'			=> $this->put('OriginCode'),
					'DateOfBreakdown'		=> $this->put('DateOfBreakdown'),
					'HostMAWB'				=> $this->put('HostMAWB'),
					'Pieces'				=> $this->put('Pieces'),
					'Netto'					=> $this->put('Netto'),
					'Volume'				=> $this->put('Volume'),
					'KindOfCode'			=> $this->put('KindOfCode'),
					'KindOfGood'			=> $this->put('KindOfGood'),
					'StorageRoom'			=> $this->put('StorageRoom'),
					'DG'					=> $this->put('DG'),
					'Location'				=> $this->put('Location'),
					'token'					=> $this->put('token'),
					'noid'				    => $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('imp_deliorderdetail', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'DONumber'				=> $this->post('DONumber'),
					'BreakdownNumber'		=> $this->post('BreakdownNumber'),
					'MasterAWB'				=> $this->post('MasterAWB'),
					'Parsial'				=> $this->post('Parsial'),
					'AirlinesCode'			=> $this->post('AirlinesCode'),
					'FlightNumber'			=> $this->post('FlightNumber'),
					'OriginCode'			=> $this->post('OriginCode'),
					'DateOfBreakdown'		=> $this->post('DateOfBreakdown'),
					'HostMAWB'				=> $this->post('HostMAWB'),
					'Pieces'				=> $this->post('Pieces'),
					'Netto'					=> $this->post('Netto'),
					'Volume'				=> $this->post('Volume'),
					'KindOfCode'			=> $this->post('KindOfCode'),
					'KindOfGood'			=> $this->post('KindOfGood'),
					'StorageRoom'			=> $this->post('StorageRoom'),
					'DG'					=> $this->post('DG'),
					'Location'				=> $this->post('Location'),
					'token'					=> $this->post('token'),
					);
					
		 $insert = $this->db->insert('imp_deliorderdetail', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}