<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Wrh_equipmentheader extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $RentalEquipNumber = $this->get('RentalEquipNumber');
        if ($RentalEquipNumber == '') {
			$data = $this->db->get('wrh_equipmentheader')->result();            
        } else {
            $this->db->where('RentalEquipNumber', $RentalEquipNumber);
            $data = $this->db->get('wrh_equipmentheader')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$RentalEquipNumber = $this->put('RentalEquipNumber');
        $data = array(	
					'WarehouseType'			=> $this->put('WarehouseType'),
					'ReceiptNumber'			=> $this->put('ReceiptNumber'),
					'DateOfRental'			=> $this->put('DateOfRental'),
					'TimeOfRental'			=> $this->put('TimeOfRental'),
					'ShipperCode'			=> $this->put('ShipperCode'),
					'PICName'				=> $this->put('PICName'),
					'StampFee'				=> $this->put('StampFee'),
					'SubTotalFee'			=> $this->put('SubTotalFee'),
					'PaymentCode'			=> $this->put('PaymentCode'),
					'ChasierCode'			=> $this->put('ChasierCode'),
					'EmployeeNumber'		=> $this->put('EmployeeNumber'),
					'UserId'				=> $this->put('UserId'),
					'TimeOfPrint'			=> $this->put('TimeOfPrint'),
					'PrintCode'				=> $this->put('PrintCode'),
					'DRSCNumber'			=> $this->put('DRSCNumber'),
					'token'					=> $this->put('token'),
					'RentalEquipNumber'		=> $this->put('RentalEquipNumber')
					);
		$this->db->where('RentalEquipNumber', $RentalEquipNumber);
        $update = $this->db->update('wrh_equipmentheader', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'WarehouseType'			=> $this->put('WarehouseType'),
					'RentalEquipNumber'		=> $this->put('RentalEquipNumber'),
					'ReceiptNumber'			=> $this->put('ReceiptNumber'),
					'DateOfRental'			=> $this->put('DateOfRental'),
					'TimeOfRental'			=> $this->put('TimeOfRental'),
					'ShipperCode'			=> $this->put('ShipperCode'),
					'PICName'				=> $this->put('PICName'),
					'StampFee'				=> $this->put('StampFee'),
					'SubTotalFee'			=> $this->put('SubTotalFee'),
					'PaymentCode'			=> $this->put('PaymentCode'),
					'ChasierCode'			=> $this->put('ChasierCode'),
					'EmployeeNumber'		=> $this->put('EmployeeNumber'),
					'UserId'				=> $this->put('UserId'),
					'TimeOfPrint'			=> $this->put('TimeOfPrint'),
					'PrintCode'				=> $this->put('PrintCode'),
					'DRSCNumber'			=> $this->put('DRSCNumber'),
					'token'					=> $this->post('token')
					);
					
		 $insert = $this->db->insert('wrh_equipmentheader', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}