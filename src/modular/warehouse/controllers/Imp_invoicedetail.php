<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Imp_invoicedetail extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('imp_invoicedetail')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('imp_invoicedetail')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'InvoiceNumber'			=> $this->put('InvoiceNumber'),
					'DeliveryOrderNumber'	=> $this->put('DeliveryOrderNumber'),
					'MasterAWB'				=> $this->put('MasterAWB'),
					'HostMAWB'				=> $this->put('HostMAWB'),
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
					'noid'					=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('imp_invoicedetail', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'InvoiceNumber'			=> $this->post('InvoiceNumber'),
					'DeliveryOrderNumber'	=> $this->post('DeliveryOrderNumber'),
					'MasterAWB'				=> $this->post('MasterAWB'),
					'HostMAWB'				=> $this->post('HostMAWB'),
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
					
		 $insert = $this->db->insert('imp_invoicedetail', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}