<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Inc_weighingheader extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('_id');
        if ($_id == '') {
			$data = $this->db->get('inc_weighingheader')->result();            
        } else {
            $this->db->where('_id', $_id);
            $data = $this->db->get('inc_weighingheader')->result();
        }
        $this->response($data, 200);
    }

	function index_put() {
		$_id = $this->PUT('_id');
        $data = array(	
					'ProofNumber'				=> $this->PUT('ProofNumber'),
					'id_Consignee'				=> $this->PUT('id_Consignee'),
					'ConsigneeCode'				=> $this->PUT('ConsigneeCode'),
					'ReceiverName'				=> $this->PUT('ReceiverName'),
					'Transit'					=> $this->PUT('Transit'),
					'EmployeeNumber'			=> $this->PUT('EmployeeNumber'),
					'PartOfPieces'				=> $this->PUT('PartOfPieces'),
					'TotalOfPieces'				=> $this->PUT('TotalOfPieces'),
					'TotalPallet'				=> $this->PUT('TotalPallet'),
					'TotalLengthOfCargo'		=> $this->PUT('TotalLengthOfCargo'),
					'TotalWeightOfCargo'		=> $this->PUT('TotalWeightOfCargo'),
					'TotalTallOfCargo'			=> $this->PUT('TotalTallOfCargo'),
					'TotalGross'				=> $this->PUT('TotalGross'),
					'TotalNetto'				=> $this->PUT('TotalNetto'),
					'TotalVolume'				=> $this->PUT('TotalVolume'),
					'TotalCAW'					=> $this->PUT('TotalCAW'),
					'DateOfEntry'				=> $this->PUT('DateOfEntry'),
					'TimeOfEntry'				=> $this->PUT('TimeOfEntry'),
					'PaymentCode'				=> $this->PUT('PaymentCode'),
					'id_invoice'				=> $this->PUT('id_invoice'),
					'invoicenumber'				=> $this->PUT('invoicenumber'),
					'PrintNumber'				=> $this->PUT('PrintNumber'),
					'MinimumCode'				=> $this->PUT('MinimumCode'),
					'token'						=> $this->PUT('token'),
					'_id'						=> $this->PUT('_id')
					);
		$this->db->where('_id', $_id);
        $update = $this->db->update('inc_weighingheader', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'ProofNumber'				=> $this->POST('ProofNumber'),
					'id_Consignee'				=> $this->POST('id_Consignee'),
					'ConsigneeCode'				=> $this->POST('ConsigneeCode'),
					'ReceiverName'				=> $this->POST('ReceiverName'),
					'Transit'					=> $this->POST('Transit'),
					'EmployeeNumber'			=> $this->POST('EmployeeNumber'),
					'PartOfPieces'				=> $this->POST('PartOfPieces'),
					'TotalOfPieces'				=> $this->POST('TotalOfPieces'),
					'TotalPallet'				=> $this->POST('TotalPallet'),
					'TotalLengthOfCargo'		=> $this->POST('TotalLengthOfCargo'),
					'TotalWeightOfCargo'		=> $this->POST('TotalWeightOfCargo'),
					'TotalTallOfCargo'			=> $this->POST('TotalTallOfCargo'),
					'TotalGross'				=> $this->POST('TotalGross'),
					'TotalNetto'				=> $this->POST('TotalNetto'),
					'TotalVolume'				=> $this->POST('TotalVolume'),
					'TotalCAW'					=> $this->POST('TotalCAW'),
					'DateOfEntry'				=> $this->POST('DateOfEntry'),
					'TimeOfEntry'				=> $this->POST('TimeOfEntry'),
					'PaymentCode'				=> $this->POST('PaymentCode'),
					'id_invoice'				=> $this->POST('id_invoice'),
					'invoicenumber'				=> $this->POST('invoicenumber'),
					'PrintNumber'				=> $this->POST('PrintNumber'),
					'MinimumCode'				=> $this->POST('MinimumCode'),
					'token'						=> $this->POST('token')
					);
					
		 $insert = $this->db->insert('inc_weighingheader', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}