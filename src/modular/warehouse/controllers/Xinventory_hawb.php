<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Xinventory_hawb extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('xinventory_hawb')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('xinventory_hawb')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->PUT('noid');
        $data = array(	
					'noid'					=> $this->PUT('noid'),
					'MasterAWB'				=> $this->PUT('MasterAWB'),
					'HostAWB'				=> $this->PUT('HostAWB'),
					'tglAWB'				=> $this->PUT('tglAWB'),
					'Quantity'				=> $this->PUT('Quantity'),
					'Weight'				=> $this->PUT('Weight'),
					'Volume'				=> $this->PUT('Volume'),
					'airlinescode'			=> $this->PUT('airlinescode'),
					'FlightNo'				=> $this->PUT('FlightNo'),
					'DateOfFlight'			=> $this->PUT('DateOfFlight'),					
					'Origin'				=> $this->PUT('Origin'), 
					'HSCode'				=> $this->PUT('HSCode'), 
					'DescriptionGoods'		=> $this->PUT('DescriptionGoods'), 
					'AgenCode'				=> $this->PUT('AgenCode'), 
					'ShipperCode'			=> $this->PUT('ShipperCode'), 
					'shippername'			=> $this->PUT('shippername'), 
					'shipperaddress'		=> $this->PUT('shipperaddress'), 
					'shippercity'			=> $this->PUT('shippercity'), 
					'shippercountry'		=> $this->PUT('shippercountry'), 
					'shipperpostal'			=> $this->PUT('shipperpostal'), 
					'ConsigneeCode'			=> $this->PUT('ConsigneeCode'), 
					'Consigneename'			=> $this->PUT('Consigneename'), 
					'Consigneeaddress'		=> $this->PUT('Consigneeaddress'), 
					'Consigneecity'			=> $this->PUT('Consigneecity'), 
					'Consigneecountry'		=> $this->PUT('Consigneecountry'), 
					'Consigneepostal'		=> $this->PUT('Consigneepostal'), 
					'ConsigneeTaxNo'		=> $this->PUT('ConsigneeTaxNo'), 
					'bc11'					=> $this->PUT('bc11'), 
					'tglbc'					=> $this->PUT('tglbc'), 
					'nopos'					=> $this->PUT('nopos'), 
					'subpos'				=> $this->PUT('subpos'), 
					'subsubpos'				=> $this->PUT('subsubpos'), 
					'noplp'					=> $this->PUT('noplp'), 
					'tglplp'				=> $this->PUT('tglplp'), 
					'typeClearance'			=> $this->PUT('typeClearance'), 					
					'SPPB'					=> $this->PUT('SPPB'), 
					'TGLSPPB'				=> $this->PUT('TGLSPPB'), 
					'LOCATION'				=> $this->PUT('LOCATION'), 
					'DateOfOut'				=> $this->PUT('DateOfOut'), 
					'TimeOut'				=> $this->PUT('TimeOut'), 
					'DateOfIn'				=> $this->PUT('DateOfIn'), 
					'TimeIn'				=> $this->PUT('TimeIn'), 
					'BagNumber'				=> $this->PUT('BagNumber'), 
					'DateEntry'				=> $this->PUT('DateEntry'), 
					'TimeEntry'				=> $this->PUT('TimeEntry')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('xinventory_hawb', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'MasterAWB'				=> $this->POST('MasterAWB'),
					'HostAWB'				=> $this->POST('HostAWB'),
					'tglAWB'				=> $this->POST('tglAWB'),
					'Quantity'				=> $this->POST('Quantity'),
					'Weight'				=> $this->POST('Weight'),
					'Volume'				=> $this->POST('Volume'),
					'airlinescode'			=> $this->POST('airlinescode'),
					'FlightNo'				=> $this->POST('FlightNo'),
					'DateOfFlight'			=> $this->POST('DateOfFlight'),					
					'Origin'				=> $this->POST('Origin'), 
					'HSCode'				=> $this->POST('HSCode'), 
					'DescriptionGoods'		=> $this->POST('DescriptionGoods'), 
					'AgenCode'				=> $this->POST('AgenCode'), 
					'ShipperCode'			=> $this->POST('ShipperCode'), 
					'shippername'			=> $this->POST('shippername'), 
					'shipperaddress'		=> $this->POST('shipperaddress'), 
					'shippercity'			=> $this->POST('shippercity'), 
					'shippercountry'		=> $this->POST('shippercountry'), 
					'shipperpostal'			=> $this->POST('shipperpostal'), 
					'ConsigneeCode'			=> $this->POST('ConsigneeCode'), 
					'Consigneename'			=> $this->POST('Consigneename'), 
					'Consigneeaddress'		=> $this->POST('Consigneeaddress'), 
					'Consigneecity'			=> $this->POST('Consigneecity'), 
					'Consigneecountry'		=> $this->POST('Consigneecountry'), 
					'Consigneepostal'		=> $this->POST('Consigneepostal'), 
					'ConsigneeTaxNo'		=> $this->POST('ConsigneeTaxNo'), 
					'bc11'					=> $this->POST('bc11'), 
					'tglbc'					=> $this->POST('tglbc'), 
					'nopos'					=> $this->POST('nopos'), 
					'subpos'				=> $this->POST('subpos'), 
					'subsubpos'				=> $this->POST('subsubpos'), 
					'noplp'					=> $this->POST('noplp'), 
					'tglplp'				=> $this->POST('tglplp'), 
					'typeClearance'			=> $this->POST('typeClearance'), 					
					'SPPB'					=> $this->POST('SPPB'), 
					'TGLSPPB'				=> $this->POST('TGLSPPB'), 
					'LOCATION'				=> $this->POST('LOCATION'), 
					'DateOfOut'				=> $this->POST('DateOfOut'), 
					'TimeOut'				=> $this->POST('TimeOut'), 
					'DateOfIn'				=> $this->POST('DateOfIn'), 
					'TimeIn'				=> $this->POST('TimeIn'), 
					'BagNumber'				=> $this->POST('BagNumber'), 
					'DateEntry'				=> $this->POST('DateEntry'), 
					'TimeEntry'				=> $this->POST('TimeEntry')
					);
					
		 $insert = $this->db->insert('xinventory_hawb', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}