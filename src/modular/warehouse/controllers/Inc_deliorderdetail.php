<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Inc_deliorderdetail extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('_id');
        if ($_id == '') {
			$data = $this->db->get('inc_deliorderdetail')->result();            
        } else {
            $this->db->where('_id', $_id);
            $data = $this->db->get('inc_deliorderdetail')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$_id = $this->put('_id');
        $data = array(	
					'_id_header'		=> $this->put('_id_header'),
					'DONumber'			=> $this->put('DONumber'),
					'id_breakdown'		=> $this->put('id_breakdown'),
					'BreakdownNumber'   => $this->put('BreakdownNumber'),	
					'FlightDate'		=> $this->put('FlightDate'),
					'MasterAWB'			=> $this->put('MasterAWB'),
					'Parsial'			=> $this->put('Parsial'),
					'AirlinesCode'		=> $this->put('AirlinesCode'),
					'FlightNumber'		=> $this->put('FlightNumber'),
					'OriginCode'		=> $this->put('OriginCode'),
					'DateOfBreakdown'	=> $this->put('DateOfBreakdown'),
					'Pieces'			=> $this->put('Pieces'),
					'Netto'				=> $this->put('Netto'),
					'Volume'			=> $this->put('Volume'),
					'KindOfCode'		=> $this->put('KindOfCode'),
					'KindOfGood'		=> $this->put('KindOfGood'),
					'StorageRoom'		=> $this->put('StorageRoom'),
					'DG'				=> $this->put('DG'),
					'Location'			=> $this->put('Location'),
					'token'				=> $this->put('token'),
					'_id'				=> $this->put('_id')
					);
		$this->db->where('_id', $_id);
        $update = $this->db->update('inc_deliorderdetail', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'id_header'			=> $this->post('id_header'),
					'DONumber'			=> $this->post('DONumber'),
					'id_breakdown'		=> $this->post('id_breakdown'),	
					'BreakdownNumber'   => $this->post('BreakdownNumber'),	
					'FlightDate'		=> $this->post('FlightDate'),
					'MasterAWB'			=> $this->post('MasterAWB'),
					'Parsial'			=> $this->post('Parsial'),
					'AirlinesCode'		=> $this->post('AirlinesCode'),
					'FlightNumber'		=> $this->post('FlightNumber'),
					'OriginCode'		=> $this->post('OriginCode'),
					'DateOfBreakdown'	=> $this->post('DateOfBreakdown'),
					'Pieces'			=> $this->post('Pieces'),
					'Netto'				=> $this->post('Netto'),
					'Volume'			=> $this->post('Volume'),
					'KindOfCode'		=> $this->post('KindOfCode'),
					'KindOfGood'		=> $this->post('KindOfGood'),
					'StorageRoom'		=> $this->post('StorageRoom'),
					'DG'				=> $this->post('DG'),
					'Location'			=> $this->post('Location'),
					'token'				=> $this->post('token'),
					);
					
		 $insert = $this->db->insert('inc_deliorderdetail', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}