<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Imp_deliorderheader extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $DONumber = $this->get('DONumber');
        if ($DONumber == '') {
			$data = $this->db->get('imp_deliorderheader')->result();            
        } else {
            $this->db->where('DONumber', $DONumber);
            $data = $this->db->get('imp_deliorderheader')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$DONumber = $this->put('DONumber');
        $data = array(	
					'MasterAWB'				=> $this->put('MasterAWB'),
					'bc11'					=> $this->put('bc11'),
					'tglbc11'				=> $this->put('tglbc11'),
					'nopos' 				=> $this->put('nopos'),
					'TotalPieces'			=> $this->put('TotalPieces'),
					'TotalNetto'			=> $this->put('TotalNetto'),
					'TotalVolume'			=> $this->put('TotalVolume'),
					'ConsigneeCode'			=> $this->put('ConsigneeCode'),
					'PICName'				=> $this->put('PICName'),
					'EmployeeNumber'		=> $this->put('EmployeeNumber'),
					'DateOfDeliveryOrder'	=> $this->put('DateOfDeliveryOrder'),
					'TimeOfDeliveryOrder'	=> $this->put('TimeOfDeliveryOrder'),
					'PrintNumber'			=> $this->put('PrintNumber'),
					'InvoiceNumber'			=> $this->put('InvoiceNumber'),
					'ShiftCode'				=> $this->put('ShiftCode'),
					'ClearanceType'			=> $this->put('ClearanceType'),
					'DateOfOut'				=> $this->put('DateOfOut'),
					'DONumber'				=> $this->put('DONumber'),
					'token'					=> $this->put('token'),
					);
		$this->db->where('DONumber', $DONumber);
        $update = $this->db->update('imp_deliorderheader', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'DONumber'				=> $this->post('DONumber'),
					'MasterAWB'				=> $this->post('MasterAWB'),
					'bc11'					=> $this->post('bc11'),
					'tglbc11'				=> $this->post('tglbc11'),
					'nopos' 				=> $this->post('nopos'),
					'TotalPieces'			=> $this->post('TotalPieces'),
					'TotalNetto'			=> $this->post('TotalNetto'),
					'TotalVolume'			=> $this->post('TotalVolume'),
					'ConsigneeCode'			=> $this->post('ConsigneeCode'),
					'PICName'				=> $this->post('PICName'),
					'EmployeeNumber'		=> $this->post('EmployeeNumber'),
					'DateOfDeliveryOrder'	=> $this->post('DateOfDeliveryOrder'),
					'TimeOfDeliveryOrder'	=> $this->post('TimeOfDeliveryOrder'),
					'PrintNumber'			=> $this->post('PrintNumber'),
					'InvoiceNumber'			=> $this->post('InvoiceNumber'),
					'ShiftCode'				=> $this->post('ShiftCode'),
					'ClearanceType'			=> $this->post('ClearanceType'),
					'DateOfOut'				=> $this->post('DateOfOut'),
					'token'					=> $this->post('token')
					);
					
		 $insert = $this->db->insert('imp_deliorderheader', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}