<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Imp_location extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('imp_location')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('imp_location')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'AirlinesCode'			=> $this->put('AirlinesCode'),
					'OriginCode'			=> $this->put('OriginCode'),
					'FlightNumber'			=> $this->put('FlightNumber'),
					'MasterAWB'				=> $this->put('MasterAWB'),
					'Parsial'				=> $this->put('Parsial'),
					'HostAWB'				=> $this->put('HostAWB'),
					'Pieces'				=> $this->put('Pieces'),
					'Netto'					=> $this->put('Netto'),
					'KindOfCode'			=> $this->put('KindOfCode'),
					'KindOfGood'			=> $this->put('KindOfGood'),
					'StorageRoom'			=> $this->put('StorageRoom'),
					'Location'				=> $this->put('Location'),
					'Additional'			=> $this->put('Additional'),
					'DateOfLocation'		=> $this->put('DateOfLocation'),
					'TimeOfLocation'		=> $this->put('TimeOfLocation'),
					'BreakdownNumber'		=> $this->put('BreakdownNumber'),
					'DeliveryOrderNumber'	=> $this->put('DeliveryOrderNumber'),
					'TravelNumber'			=> $this->put('TravelNumber'),
					'token'					=> $this->put('token'),
					'noid'					=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('imp_location', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'AirlinesCode'			=> $this->post('AirlinesCode'),
					'OriginCode'			=> $this->post('OriginCode'),
					'FlightNumber'			=> $this->post('FlightNumber'),
					'MasterAWB'				=> $this->post('MasterAWB'),
					'Parsial'				=> $this->post('Parsial'),
					'HostAWB'				=> $this->post('HostAWB'),
					'Pieces'				=> $this->post('Pieces'),
					'Netto'					=> $this->post('Netto'),
					'KindOfCode'			=> $this->post('KindOfCode'),
					'KindOfGood'			=> $this->post('KindOfGood'),
					'StorageRoom'			=> $this->post('StorageRoom'),
					'Location'				=> $this->post('Location'),
					'Additional'			=> $this->post('Additional'),
					'DateOfLocation'		=> $this->post('DateOfLocation'),
					'TimeOfLocation'		=> $this->post('TimeOfLocation'),
					'BreakdownNumber'		=> $this->post('BreakdownNumber'),
					'DeliveryOrderNumber'	=> $this->post('DeliveryOrderNumber'),
					'TravelNumber'			=> $this->post('TravelNumber'),
					'token'					=> $this->post('token')
					);
					
		 $insert = $this->db->insert('imp_location', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}