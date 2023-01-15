<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Out_invoiceheader extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('_id');
        if ($_id == '') {
			$data = $this->db->get('out_invoiceheader')->result();            
        } else {
            $this->db->where('_id', $_id);
            $data = $this->db->get('out_invoiceheader')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$_id = $this->PUT('_id');
        $data = array(	
					'InvoiceNumber'				=> $this->PUT('InvoiceNumber'),
					'TotalPieces'				=> $this->PUT('TotalPieces'),
					'TotalCAW'					=> $this->PUT('TotalCAW'),
					'TotalNetto'				=> $this->PUT('TotalNetto'),
					'TotalWarehouseFee'			=> $this->PUT('TotalWarehouseFee'),
					'TotalAssistancyFee'		=> $this->PUT('TotalAssistancyFee'),
					'TotalCoolRoomFee'			=> $this->PUT('TotalCoolRoomFee'),
					'TotalAirConditioningFee'	=> $this->PUT('TotalAirConditioningFee'),
					'TotalColdStorageFee'		=> $this->PUT('TotalColdStorageFee'),
					'TotalStrongRoomFee'		=> $this->PUT('TotalStrongRoomFee'),
					'TotalDangerousRoomFee'		=> $this->PUT('TotalDangerousRoomFee'),
					'TotalOtherFee'				=> $this->PUT('TotalOtherFee'),
					'TotalAirportContriFee'		=> $this->PUT('TotalAirportContriFee'),
					'AdministrationFee'			=> $this->PUT('AdministrationFee'),
					'DocumentFee'				=> $this->PUT('DocumentFee'),
					'SubTotalFee'				=> $this->PUT('SubTotalFee'),
					'TaxFee'					=> $this->PUT('TaxFee'),
					'StampFee'					=> $this->PUT('StampFee'),
					'GrandTotalFee'				=> $this->PUT('GrandTotalFee'),
					'EmployeeNumber'			=> $this->PUT('EmployeeNumber'),
					'DateOfTransaction'			=> $this->PUT('DateOfTransaction'),
					'TimeOfTransaction'			=> $this->PUT('TimeOfTransaction'),
					'PrintNumber'				=> $this->PUT('PrintNumber'),
					'DRSCNumber'				=> $this->PUT('DRSCNumber'),
					'DateOfDRSC'				=> $this->PUT('DateOfDRSC'),
					'ShiftName'					=> $this->PUT('ShiftName'),
					'AirlinesCode'				=> $this->PUT('AirlinesCode'),
					'PaymentCode'				=> $this->PUT('PaymentCode'),
					'AgreementCode'				=> $this->PUT('AgreementCode'),
					'KursIDR'					=> $this->PUT('KursIDR'),
					'Referensi'					=> $this->PUT('Referensi'),
					'TaxNumber'					=> $this->PUT('TaxNumber'),
					'id_shipper'				=> $this->PUT('id_shipper'),
					'CustomerCode'				=> $this->PUT('CustomerCode'),					
					'token'						=> $this->PUT('token'),
					'_id'						=> $this->PUT('_id')
					);
		$this->db->where('_id', $_id);
        $update = $this->db->update('out_invoiceheader', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'InvoiceNumber'				=> $this->POST('InvoiceNumber'),
					'TotalPieces'				=> $this->POST('TotalPieces'),
					'TotalCAW'					=> $this->POST('TotalCAW'),
					'TotalNetto'				=> $this->POST('TotalNetto'),
					'TotalWarehouseFee'			=> $this->POST('TotalWarehouseFee'),
					'TotalAssistancyFee'		=> $this->POST('TotalAssistancyFee'),
					'TotalCoolRoomFee'			=> $this->POST('TotalCoolRoomFee'),
					'TotalAirConditioningFee'	=> $this->POST('TotalAirConditioningFee'),
					'TotalColdStorageFee'		=> $this->POST('TotalColdStorageFee'),
					'TotalStrongRoomFee'		=> $this->POST('TotalStrongRoomFee'),
					'TotalDangerousRoomFee'		=> $this->POST('TotalDangerousRoomFee'),
					'TotalOtherFee'				=> $this->POST('TotalOtherFee'),
					'TotalOtherFee'				=> $this->POST('TotalOtherFee'),
					'AdministrationFee'			=> $this->POST('AdministrationFee'),
					'DocumentFee'				=> $this->POST('DocumentFee'),
					'SubTotalFee'				=> $this->POST('SubTotalFee'),
					'TaxFee'					=> $this->POST('TaxFee'),
					'StampFee'					=> $this->POST('StampFee'),
					'GrandTotalFee'				=> $this->POST('GrandTotalFee'),
					'EmployeeNumber'			=> $this->POST('EmployeeNumber'),
					'DateOfTransaction'			=> $this->POST('DateOfTransaction'),
					'TimeOfTransaction'			=> $this->POST('TimeOfTransaction'),
					'PrintNumber'				=> $this->POST('PrintNumber'),
					'DRSCNumber'				=> $this->POST('DRSCNumber'),
					'DateOfDRSC'				=> $this->POST('DateOfDRSC'),
					'ShiftName'					=> $this->POST('ShiftName'),
					'AirlinesCode'				=> $this->POST('AirlinesCode'),
					'PaymentCode'				=> $this->POST('PaymentCode'),
					'AgreementCode'				=> $this->POST('AgreementCode'),
					'KursIDR'					=> $this->POST('KursIDR'),
					'Referensi'					=> $this->POST('Referensi'),
					'TaxNumber'					=> $this->POST('TaxNumber'),
					'id_shipper'				=> $this->POST('id_shipper'),
					'CustomerCode'				=> $this->POST('CustomerCode'),					
					'token'						=> $this->POST('token')
					);
					
		 $insert = $this->db->insert('out_invoiceheader', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}