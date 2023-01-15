<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Eks_hostawb extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('eks_hostawb')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('eks_hostawb')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'MasterAWB'				=> $this->put('MasterAWB'),
					'HostAWB'				=> $this->put('HostAWB'),
					'kd_kemasan'			=> $this->put('kd_kemasan'),					
					'Quantity'				=> $this->put('Quantity'),
					'Weight'				=> $this->put('Weight'),
					'Volume'				=> $this->put('Volume'),
					'airlinescode'			=> $this->put('airlinescode'),
					'FlightNo'				=> $this->put('FlightNo'),
					'DateOfFlight'			=> $this->put('DateOfFlight'),
					'kd_doc'				=> $this->put('kd_doc'),
					'PENnumber'				=> $this->put('PENnumber'),
					'KTKR'					=> $this->put('KTKR'),
					'DateOfPen'				=> $this->put('DateOfPen'),
					'HSCode'				=> $this->put('HSCode'),
					'descriptiongoods'		=> $this->put('descriptiongoods'),
					'AgenCode'				=> $this->put('AgenCode'),
					'ShipperCode'			=> $this->put('ShipperCode'),
					'shippername'			=> $this->put('shippername'),
					'shipperaddress'		=> $this->put('shipperaddress'),
					'shippercity'			=> $this->put('shippercity'),
					'shippercountry'		=> $this->put('shippercountry'),
					'shipperpostal'			=> $this->put('shipperpostal'),
					'shipperTaxNo'			=> $this->put('shipperTaxNo'),
					'ConsigneeCode'			=> $this->put('ConsigneeCode'),
					'Consigneename'			=> $this->put('Consigneename'),
					'Consigneeaddress'		=> $this->put('Consigneeaddress'),
					'Consigneecity'			=> $this->put('Consigneecity'),
					'Consigneecountry'		=> $this->put('Consigneecountry'),
					'bc11'					=> $this->put('bc11'),
					'tglbc'					=> $this->put('tglbc'),
					'nopos'					=> $this->put('nopos'),
					'subpos'				=> $this->put('subpos'),
					'subsubpos'				=> $this->put('subsubpos'),
					'DateOfOut'				=> $this->put('DateOfOut'),
					'TimeOut'				=> $this->put('TimeOut'),
					'DateOfIn'				=> $this->put('DateOfIn'),
					'TimeIn'				=> $this->put('TimeIn'),
					'FHL'					=> $this->put('FHL'),
					'Status'				=> $this->put('Status'),
					'DateEntry'				=> $this->put('DateEntry'),
					'TimeEntry'				=> $this->put('TimeEntry'),
					'token'					=> $this->put('token'),
					'noid' 					=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('eks_hostawb', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'MasterAWB'				=> $this->post('MasterAWB'),
					'HostAWB'				=> $this->post('HostAWB'),
					'kd_kemasan'			=> $this->post('kd_kemasan'),
					'Quantity'				=> $this->post('Quantity'),
					'Weight'				=> $this->post('Weight'),
					'Volume'				=> $this->post('Volume'),
					'airlinescode'			=> $this->post('airlinescode'),
					'FlightNo'				=> $this->post('FlightNo'),
					'DateOfFlight'			=> $this->post('DateOfFlight'),
					'PENnumber'				=> $this->post('PENnumber'),
					'KTKR'					=> $this->post('KTKR'),
					'DateOfPen'				=> $this->post('DateOfPen'),
					'HSCode'				=> $this->post('HSCode'),
					'descriptiongoods'		=> $this->post('descriptiongoods'),
					'AgenCode'				=> $this->post('AgenCode'),
					'ShipperCode'			=> $this->post('ShipperCode'),
					'shippername'			=> $this->post('shippername'),
					'shipperaddress'		=> $this->post('shipperaddress'),
					'shippercity'			=> $this->post('shippercity'),
					'shippercountry'		=> $this->post('shippercountry'),
					'shipperpostal'			=> $this->post('shipperpostal'),
					'shipperTaxNo'			=> $this->post('shipperTaxNo'),
					'ConsigneeCode'			=> $this->post('ConsigneeCode'),
					'Consigneename'			=> $this->post('Consigneename'),
					'Consigneeaddress'		=> $this->post('Consigneeaddress'),
					'Consigneecity'			=> $this->post('Consigneecity'),
					'Consigneecountry'		=> $this->post('Consigneecountry'),
					'bc11'					=> $this->post('bc11'),
					'tglbc'					=> $this->post('tglbc'),
					'nopos'					=> $this->post('nopos'),
					'subpos'				=> $this->post('subpos'),
					'subsubpos'				=> $this->post('subsubpos'),
					'DateOfOut'				=> $this->post('DateOfOut'),
					'TimeOut'				=> $this->post('TimeOut'),
					'DateOfIn'				=> $this->post('DateOfIn'),
					'TimeIn'				=> $this->post('TimeIn'),
					'FHL'					=> $this->post('FHL'),
					'Status'				=> $this->post('Status'),
					'DateEntry'				=> $this->post('DateEntry'),
					'TimeEntry'				=> $this->post('TimeEntry'),
					'token'					=> $this->post('token')
					);
					
		 $insert = $this->db->insert('eks_hostawb', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}