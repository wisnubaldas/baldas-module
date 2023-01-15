<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Eks_invoicedetail extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('eks_invoicedetail')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('eks_invoicedetail')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'InvoiceNumber'			=> $this->put('InvoiceNumber'),
					'ProofNumber'			=> $this->put('ProofNumber'),
					'MasterAWB'				=> $this->put('MasterAWB'),
					'Pieces'				=> $this->put('Pieces'),
					'CAW'					=> $this->put('CAW'),
					'Netto'					=> $this->put('Netto'),
					'WarehouseFee'			=> $this->put('WarehouseFee'),
					'AssistancyFee'			=> $this->put('AssistancyFee'),
					'CoolRoomFee'			=> $this->put('CoolRoomFee'),
					'AirConditioningFee'	=> $this->put('AirConditioningFee'),
					'ColdStorageFee'		=> $this->put('ColdStorageFee'),
					'StrongRoomFee'			=> $this->put('StrongRoomFee'),
					'DangerousRoomFee'		=> $this->put('DangerousRoomFee'),
					'OtherFee'				=> $this->put('OtherFee'),
					'AirportContriFee'		=> $this->put('AirportContriFee'),
					'overstay'				=> $this->put('overstay'),
					'token'					=> $this->put('token'),
					'noid'					=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('eks_invoicedetail', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'InvoiceNumber'			=> $this->post('InvoiceNumber'),
					'ProofNumber'			=> $this->post('ProofNumber'),
					'MasterAWB'				=> $this->post('MasterAWB'),
					'Pieces'				=> $this->post('Pieces'),
					'CAW'					=> $this->post('CAW'),
					'Netto'					=> $this->post('Netto'),
					'WarehouseFee'			=> $this->post('WarehouseFee'),
					'AssistancyFee'			=> $this->post('AssistancyFee'),
					'CoolRoomFee'			=> $this->post('CoolRoomFee'),
					'AirConditioningFee'	=> $this->post('AirConditioningFee'),
					'ColdStorageFee'		=> $this->post('ColdStorageFee'),
					'StrongRoomFee'			=> $this->post('StrongRoomFee'),
					'DangerousRoomFee'		=> $this->post('DangerousRoomFee'),
					'OtherFee'				=> $this->post('OtherFee'),
					'AirportContriFee'		=> $this->post('AirportContriFee'),
					'overstay'				=> $this->post('overstay'),
					'token'					=> $this->post('token')
					);
					
		 $insert = $this->db->insert('eks_invoicedetail', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}