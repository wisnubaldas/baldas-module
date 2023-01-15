<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Out_invoicedetail extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	function index_get() {
        $noid = $this->get('_id');
        if ($_id == '') {
			$data = $this->db->get('out_invoicedetail')->result();            
        } else {
            $this->db->where('_id', $_id);
            $data = $this->db->get('out_invoicedetail')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$_id = $this->PUT('_id');
        $data = array(	
					'id_header'				=> $this->PUT('id_header'),
					'InvoiceNumber'			=> $this->PUT('InvoiceNumber'),
					'id_weighing'			=> $this->PUT('id_weighing'),
					'ProofNumber'			=> $this->PUT('ProofNumber'),
					'MasterAWB'				=> $this->PUT('MasterAWB'),
					'Pieces'				=> $this->PUT('Pieces'),
					'CAW'					=> $this->PUT('CAW'),
					'Netto'					=> $this->PUT('Netto'),
					'WarehouseFee'			=> $this->PUT('WarehouseFee'),					
					'AssistancyFee'			=> $this->PUT('AssistancyFee'),					
					'CoolRoomFee'			=> $this->PUT('CoolRoomFee'),					
					'AirConditioningFee'	=> $this->PUT('AirConditioningFee'),					
					'ColdStorageFee'		=> $this->PUT('ColdStorageFee'),					
					'StrongRoomFee'			=> $this->PUT('StrongRoomFee'),					
					'DangerousRoomFee'		=> $this->PUT('DangerousRoomFee'),					
					'OtherFee'				=> $this->PUT('OtherFee'),
					'AirportContriFee'		=> $this->PUT('AirportContriFee'),
					'overstay'				=> $this->PUT('overstay'),
					'token'					=> $this->PUT('token'),
					'_id'					=> $this->PUT('_id')
					);
		$this->db->where('_id', $_id);
        $update = $this->db->update('out_invoicedetail', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'id_header'				=> $this->POST('id_header'),
					'InvoiceNumber'			=> $this->POST('InvoiceNumber'),
					'id_weighing'			=> $this->POST('id_weighing'),
					'ProofNumber'			=> $this->POST('ProofNumber'),
					'MasterAWB'				=> $this->POST('MasterAWB'),
					'Pieces'				=> $this->POST('Pieces'),
					'CAW'					=> $this->POST('CAW'),
					'Netto'					=> $this->POST('Netto'),
					'WarehouseFee'			=> $this->POST('WarehouseFee'),					
					'AssistancyFee'			=> $this->POST('AssistancyFee'),					
					'CoolRoomFee'			=> $this->POST('CoolRoomFee'),					
					'AirConditioningFee'	=> $this->POST('AirConditioningFee'),					
					'ColdStorageFee'		=> $this->POST('ColdStorageFee'),					
					'StrongRoomFee'			=> $this->POST('StrongRoomFee'),					
					'DangerousRoomFee'		=> $this->POST('DangerousRoomFee'),					
					'OtherFee'				=> $this->POST('OtherFee'),
					'AirportContriFee'		=> $this->POST('AirportContriFee'),
					'overstay'				=> $this->POST('overstay'),
					'token'					=> $this->POST('token')
					);
					
		 $insert = $this->db->insert('out_invoicedetail', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}