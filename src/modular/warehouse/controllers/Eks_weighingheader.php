<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Eks_weighingheader extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('eks_weighingheader')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('eks_weighingheader')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$ProofNumber = $this->put('ProofNumber');
        $data = array(	
					'MasterAWB'			=> $this->put('MasterAWB'),
					'AirlinesCode'		=> $this->put('AirlinesCode'),
					'Origin'			=> $this->put('Origin'),
					'Destination'		=> $this->put('Destination'),
					'FlightNumber'		=> $this->put('FlightNumber'),
					'ShipperCode'		=> $this->put('ShipperCode'),
					'AgenCode'			=> $this->put('AgenCode'),
					'ConsigneeCode'		=> $this->put('ConsigneeCode'),
					'AgenPIC'			=> $this->put('AgenPIC'),
					'TotalPieces'		=> $this->put('TotalPieces'),
					'TotalPallet'		=> $this->put('TotalPallet'),
					'TotalNetto'		=> $this->put('TotalNetto'),
					'TotalVolume'		=> $this->put('TotalVolume'),
					'TotalCAW'			=> $this->put('TotalCAW'),
					'DateOfFlight'		=> $this->put('DateOfFlight'),
					'DateOfEntry'		=> $this->put('DateOfEntry'),
					'TimeOfEntry'		=> $this->put('TimeOfEntry'),
					'BookingCode'		=> $this->put('BookingCode'),
					'MultiVolume'		=> $this->put('MultiVolume'),
					'PaymentCode'		=> $this->put('PaymentCode'),
					'EmployeeNumber'	=> $this->put('EmployeeNumber'),
					'InvoiceNumber'		=> $this->put('InvoiceNumber'),	
					'token'				=> $this->put('token'),
					'ProofNumber'		=> $this->put('ProofNumber')
					);
		$this->db->where('ProofNumber', $ProofNumber);
        $update = $this->db->update('eks_weighingheader', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'ProofNumber'		=> $this->post('ProofNumber'),
					'MasterAWB'			=> $this->post('MasterAWB'),
					'AirlinesCode'		=> $this->post('AirlinesCode'),
					'Origin'			=> $this->post('Origin'),
					'Destination'		=> $this->post('Destination'),
					'FlightNumber'		=> $this->post('FlightNumber'),
					'ShipperCode'		=> $this->post('ShipperCode'),
					'AgenCode'			=> $this->post('AgenCode'),
					'ConsigneeCode'		=> $this->post('ConsigneeCode'),
					'AgenPIC'			=> $this->post('AgenPIC'),
					'TotalPieces'		=> $this->post('TotalPieces'),
					'TotalPallet'		=> $this->post('TotalPallet'),
					'TotalNetto'		=> $this->post('TotalNetto'),
					'TotalVolume'		=> $this->post('TotalVolume'),
					'TotalCAW'			=> $this->post('TotalCAW'),
					'DateOfFlight'		=> $this->post('DateOfFlight'),
					'DateOfEntry'		=> $this->post('DateOfEntry'),
					'TimeOfEntry'		=> $this->post('TimeOfEntry'),
					'BookingCode'		=> $this->post('BookingCode'),
					'MultiVolume'		=> $this->post('MultiVolume'),
					'PaymentCode'		=> $this->post('PaymentCode'),
					'EmployeeNumber'	=> $this->post('EmployeeNumber'),
					'InvoiceNumber'		=> $this->post('InvoiceNumber'),					
					'RCS'				=> $this->post('RCS'),
					'token'				=> $this->post('token')
					);
					
		 $insert = $this->db->insert('eks_weighingheader', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}