<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Wrh_equipmentdetail extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('wrh_equipmentdetail')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('wrh_equipmentdetail')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'RentalEquipNumber'		=> $this->put('RentalEquipNumber'),
					'EquipmentCode'			=> $this->put('EquipmentCode'),
					'Quantity'				=> $this->put('Quantity'),
					'IDRFee'				=> $this->put('IDRFee'),
					'StartRental'			=> $this->put('StartRental'),
					'DateFrom'				=> $this->put('DateFrom'),
					'DateUntil'				=> $this->put('DateUntil'),
					'FinishRental'			=> $this->put('FinishRental'),
					'TotalHourRental'		=> $this->put('TotalHourRental'),
					'TotalPayment'			=> $this->put('TotalPayment'),
					'Tax'					=> $this->put('Tax'),
					'token'					=> $this->put('token'),
					'noid'					=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('wrh_equipmentdetail', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'RentalEquipNumber'		=> $this->put('RentalEquipNumber'),
					'EquipmentCode'			=> $this->put('EquipmentCode'),
					'Quantity'				=> $this->put('Quantity'),
					'IDRFee'				=> $this->put('IDRFee'),
					'StartRental'			=> $this->put('StartRental'),
					'DateFrom'				=> $this->put('DateFrom'),
					'DateUntil'				=> $this->put('DateUntil'),
					'FinishRental'			=> $this->put('FinishRental'),
					'TotalHourRental'		=> $this->put('TotalHourRental'),
					'TotalPayment'			=> $this->put('TotalPayment'),
					'Tax'					=> $this->put('Tax'),
					'token'					=> $this->post('token')
					);
					
		 $insert = $this->db->insert('wrh_equipmentdetail', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}