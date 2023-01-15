<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Inc_deliorderheader extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('_id');
        if ($_id == '') {
			$data = $this->db->get('inc_deliorderheader')->result();            
        } else {
            $this->db->where('_id', $_id);
            $data = $this->db->get('inc_deliorderheader')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$_id = $this->put('_id');
        $data = array(	
					'DONumber'					=> $this->put('DONumber'),
					'TotalPieces'				=> $this->put('TotalPieces'),
					'TotalNetto'				=> $this->put('TotalNetto'),
					'TotalVolume'				=> $this->put('TotalVolume'),
					'id_consignee'				=> $this->put('id_consignee'),	
					'ConsigneeCode'             => $this->put('ConsigneeCode'),	
					'PICName'					=> $this->put('PICName'),
					'EmployeeNumber'			=> $this->put('EmployeeNumber'),
					'DateOfDeliveryOrder'		=> $this->put('DateOfDeliveryOrder'),
					'TimeOfDeliveryOrder'		=> $this->put('TimeOfDeliveryOrder'),
					'PrintNumber'				=> $this->put('PrintNumber'),
					'id_invoice'				=> $this->put('id_invoice'),	
					'invoicenumber'             => $this->put('invoicenumber '),
					'ShiftCode'					=> $this->put('ShiftCode'),
					'DateOfOut'					=> $this->put('DateOfOut'),
					'token'						=> $this->put('token'),
					'_id'						=> $this->put('_id')
					);
		$this->db->where('_id', $_id);
        $update = $this->db->update('inc_deliorderheader', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
		            'DONumber'					=> $this->post('DONumber'),
					'TotalPieces'				=> $this->post('TotalPieces'),
					'TotalNetto'				=> $this->post('TotalNetto'),
					'TotalVolume'				=> $this->post('TotalVolume'),
					'id_consignee'				=> $this->post('id_consignee'),					
					'ConsigneeCode'				=> $this->post('ConsigneeCode'),		
					'PICName'					=> $this->post('PICName'),
					'EmployeeNumber'			=> $this->post('EmployeeNumber'),
					'DateOfDeliveryOrder'		=> $this->post('DateOfDeliveryOrder'),
					'TimeOfDeliveryOrder'		=> $this->post('TimeOfDeliveryOrder'),
					'PrintNumber'				=> $this->post('PrintNumber'),
					'id_invoice'				=> $this->post('id_invoice'),		
					'invoicenumber'	            => $this->post('invoicenumber'),
					'ShiftCode'					=> $this->post('ShiftCode'),
					'DateOfOut'					=> $this->post('DateOfOut'),
					'token'						=> $this->post('token')
					);
					
		 $insert = $this->db->insert('inc_deliorderheader', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}