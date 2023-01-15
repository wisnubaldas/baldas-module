<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Imp_invoiceheader extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('imp_invoiceheader')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('imp_invoiceheader')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'InvoiceNumber'				=> $this->put('InvoiceNumber'),
					'TotalPieces'				=> $this->put('TotalPieces'),
					'TotalCAW'					=> $this->put('TotalCAW'),
					'TotalNetto'				=> $this->put('TotalNetto'),
					'TotalWarehouseFee'			=> $this->put('TotalWarehouseFee'),
					'TotalAssistancyFee'		=> $this->put('TotalAssistancyFee'),
					'TotalCoolRoomFee'			=> $this->put('TotalCoolRoomFee'),
					'TotalAirConditioningFee'	=> $this->put('TotalAirConditioningFee'),
					'TotalColdStorageFee'		=> $this->put('TotalColdStorageFee'),
					'TotalStrongRoomFee'		=> $this->put('TotalStrongRoomFee'),
					'TotalDangerousRoomFee'		=> $this->put('TotalDangerousRoomFee'),
					'TotalOtherFee'				=> $this->put('TotalOtherFee'),
					'TotalAirportContriFee'		=> $this->put('TotalAirportContriFee'),
					'AdministrationFee'			=> $this->put('AdministrationFee'),
					'DocumentFee'				=> $this->put('DocumentFee'),
					'SubTotalFee'				=> $this->put('SubTotalFee'),
					'TaxFee'					=> $this->put('TaxFee'),
					'StampFee'					=> $this->put('StampFee'),
					'GrandTotalFee'				=> $this->put('GrandTotalFee'),
					'EmployeeNumber'			=> $this->put('EmployeeNumber'),
					'DateOfTransaction'			=> $this->put('DateOfTransaction'),
					'TimeOfTransaction'			=> $this->put('TimeOfTransaction'),
					'PrintNumber'				=> $this->put('PrintNumber'),
					'DRSCNumber'				=> $this->put('DRSCNumber'),
					'AirlinesCode'				=> $this->put('AirlinesCode'),
					'PaymentCode'				=> $this->put('PaymentCode'),
					'AgreementCode'				=> $this->put('AgreementCode'),
					'KursIDR'					=> $this->put('KursIDR'),
					'Referensi'					=> $this->put('Referensi'),
					'TaxNumber'					=> $this->put('TaxNumber'),
					'CustomerCode'				=> $this->put('CustomerCode'),
					'ShiftCode'					=> $this->put('ShiftCode'),
					'ClearanceType'				=> $this->put('ClearanceType'),
					'SPPB'						=> $this->put('SPPB'),
					'tglSPPB'					=> $this->put('tglSPPB'),
					'token'						=> $this->put('token'),
					'noid'						=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('imp_invoiceheader', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'InvoiceNumber'				=> $this->post('InvoiceNumber'),
					'TotalPieces'				=> $this->post('TotalPieces'),
					'TotalCAW'					=> $this->post('TotalCAW'),
					'TotalNetto'				=> $this->post('TotalNetto'),
					'TotalWarehouseFee'			=> $this->post('TotalWarehouseFee'),
					'TotalAssistancyFee'		=> $this->post('TotalAssistancyFee'),
					'TotalCoolRoomFee'			=> $this->post('TotalCoolRoomFee'),
					'TotalAirConditioningFee'	=> $this->post('TotalAirConditioningFee'),
					'TotalColdStorageFee'		=> $this->post('TotalColdStorageFee'),
					'TotalStrongRoomFee'		=> $this->post('TotalStrongRoomFee'),
					'TotalDangerousRoomFee'		=> $this->post('TotalDangerousRoomFee'),
					'TotalOtherFee'				=> $this->post('TotalOtherFee'),
					'TotalAirportContriFee'		=> $this->post('TotalAirportContriFee'),
					'AdministrationFee'			=> $this->post('AdministrationFee'),
					'DocumentFee'				=> $this->post('DocumentFee'),
					'SubTotalFee'				=> $this->post('SubTotalFee'),
					'TaxFee'					=> $this->post('TaxFee'),
					'StampFee'					=> $this->post('StampFee'),
					'GrandTotalFee'				=> $this->post('GrandTotalFee'),
					'EmployeeNumber'			=> $this->post('EmployeeNumber'),
					'DateOfTransaction'			=> $this->post('DateOfTransaction'),
					'TimeOfTransaction'			=> $this->post('TimeOfTransaction'),
					'PrintNumber'				=> $this->post('PrintNumber'),
					'DRSCNumber'				=> $this->post('DRSCNumber'),
					'AirlinesCode'				=> $this->post('AirlinesCode'),
					'PaymentCode'				=> $this->post('PaymentCode'),
					'AgreementCode'				=> $this->post('AgreementCode'),
					'KursIDR'					=> $this->post('KursIDR'),
					'Referensi'					=> $this->post('Referensi'),
					'TaxNumber'					=> $this->post('TaxNumber'),
					'CustomerCode'				=> $this->post('CustomerCode'),
					'ShiftCode'					=> $this->post('ShiftCode'),
					'ClearanceType'				=> $this->post('ClearanceType'),
					'SPPB'						=> $this->post('SPPB'),
					'tglSPPB'					=> $this->post('tglSPPB'),
					'token'						=> $this->post('token')
					);
					
		 $insert = $this->db->insert('imp_invoiceheader', $data);
        if ($this->db->affected_rows() > 0) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}