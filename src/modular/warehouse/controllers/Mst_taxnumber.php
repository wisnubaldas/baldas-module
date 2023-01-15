<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Mst_taxnumber extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('tax_transaction')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('tax_transaction')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'FakturNumber'			=> $this->put('FakturNumber'),
					'InvoiceNumber'			=> $this->put('InvoiceNumber'),
					'DateOfFaktur'			=> $this->put('DateOfFaktur'),
					'TimeOfFaktur'			=> $this->put('TimeOfFaktur'),
					'CustomerCode'			=> $this->put('CustomerCode'),
					'EmployeeNumber'		=> $this->put('EmployeeNumber'),
					'DateOfReport'			=> $this->put('DateOfReport'),
					'NPWP'					=> $this->put('NPWP'),
					'DateOfNPWP'			=> $this->put('DateOfNPWP'),
					'RemarksFaktur'			=> $this->put('RemarksFaktur'),
					'TotalPieces'			=> $this->put('TotalPieces'),
					'TotalCAW'				=> $this->put('TotalCAW'),
					'TotalWarehouseFee'		=> $this->put('TotalWarehouseFee'),
					'TotalAssistancyFee'	=> $this->put('TotalAssistancyFee'),
					'TotalStorageFee'		=> $this->put('TotalStorageFee'),
					'TotalAdminFee'			=> $this->put('TotalAdminFee'),
					'TotalOthersFee'		=> $this->put('TotalOthersFee'),
					'TotalAirportContriFee'	=> $this->put('TotalAirportContriFee'),
					'TotalSub'				=> $this->put('TotalSub'),
					'TotalTax'				=> $this->put('TotalTax'),
					'token'					=> $this->put('token'),
					'noid'					=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('tax_transaction', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'FakturNumber'			=> $this->post('FakturNumber'),
					'InvoiceNumber'			=> $this->post('InvoiceNumber'),
					'DateOfFaktur'			=> $this->post('DateOfFaktur'),
					'TimeOfFaktur'			=> $this->post('TimeOfFaktur'),
					'CustomerCode'			=> $this->post('CustomerCode'),
					'EmployeeNumber'		=> $this->post('EmployeeNumber'),
					'DateOfReport'			=> $this->post('DateOfReport'),
					'NPWP'					=> $this->post('NPWP'),
					'DateOfNPWP'			=> $this->post('DateOfNPWP'),
					'RemarksFaktur'			=> $this->post('RemarksFaktur'),
					'TotalPieces'			=> $this->post('TotalPieces'),
					'TotalCAW'				=> $this->post('TotalCAW'),
					'TotalWarehouseFee'		=> $this->post('TotalWarehouseFee'),
					'TotalAssistancyFee'	=> $this->post('TotalAssistancyFee'),
					'TotalStorageFee'		=> $this->post('TotalStorageFee'),
					'TotalAdminFee'			=> $this->post('TotalAdminFee'),
					'TotalOthersFee'		=> $this->post('TotalOthersFee'),
					'TotalAirportContriFee'	=> $this->post('TotalAirportContriFee'),
					'TotalSub'				=> $this->post('TotalSub'),
					'TotalTax'				=> $this->post('TotalTax'),
					'token'					=> $this->post('token')
					);
					
		$insert = $this->db->insert('tax_transaction', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}