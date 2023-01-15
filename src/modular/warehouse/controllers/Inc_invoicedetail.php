<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Inc_invoicedetail extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('_id');
        if ($_id == '') {
			$data = $this->db->get('inc_invoicedetail')->result();            
        } else {
            $this->db->where('_id', $_id);
            $data = $this->db->get('inc_invoicedetail')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$_id = $this->put('_id');
        $data = array(	
					'id_header'				=> $this->put('id_header'),
					'InvoiceNumber'			=> $this->put('InvoiceNumber'),
					'id_proof'				=> $this->put('id_proof'),
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
					'OverStay'				=> $this->put('OverStay'),
					'token'					=> $this->put('token'),					
					'_id'					=> $this->put('_id')
					);
		$this->db->where('_id', $_id);
        $update = $this->db->update('inc_invoicedetail', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	 
	function index_post() {		
        $data = array(		
					'id_header'				=> $this->post('id_header'),
					'InvoiceNumber'			=> $this->post('InvoiceNumber'),
					'id_proof'				=> $this->post('id_proof'),
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
					'OverStay'				=> $this->post('OverStay'),
					'token'					=> $this->post('token')		
					);
					
		 $insert = $this->db->insert('inc_invoicedetail', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}