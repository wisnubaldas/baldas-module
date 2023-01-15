<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Imp_hostawb extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('imp_hostawb')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('imp_hostawb')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'MasterAWB'			=> $this->put('MasterAWB'),
					'HostAWB'			=> $this->put('HostAWB'),
					'tglAWB'			=> $this->put('tglAWB'),
					'Quantity'			=> $this->put('Quantity'),
					'Weight'			=> $this->put('Weight'),
					'Volume'			=> $this->put('Volume'),
					'FlightNo'			=> $this->put('FlightNo'),
					'airlinescode'      => $this->put('airlinescode'),
					'DateOfFlight'		=> $this->put('DateOfFlight'),
					'Origin'			=> $this->put('Origin'),					
					'HSCode'			=> $this->put('HSCode'),
					'DescriptionGoods'	=> $this->put('DescriptionGoods'),
					'AgenCode'			=> $this->put('AgenCode'),
					'ShipperCode'		=> $this->put('ShipperCode'),
					'shippername'		=> $this->put('shippername'),
					'shipperaddress'	=> $this->put('shipperaddress'),
					'shippercity'		=> $this->put('shippercity'),
					'shippercountry'	=> $this->put('shippercountry'),
					'shipperpostal'		=> $this->put('shipperpostal'),
					'ConsigneeCode'		=> $this->put('ConsigneeCode'),
					'Consigneename'		=> $this->put('Consigneename'),
					'Consigneeaddress'	=> $this->put('Consigneeaddress'),
					'Consigneecity'		=> $this->put('Consigneecity'),
					'Consigneecountry'	=> $this->put('Consigneecountry'),
					'Consigneepostal'	=> $this->put('Consigneepostal'),
					'ConsigneeTaxNo'	=> $this->put('ConsigneeTaxNo'),
					'bc11'				=> $this->put('bc11'),
					'tglbc'				=> $this->put('tglbc'),
					'nopos'				=> $this->put('nopos'),
					'subpos'			=> $this->put('subpos'),
					'subsubpos'			=> $this->put('subsubpos'),
					'noplp'				=> $this->put('noplp'),
					'tglplp'			=> $this->put('tglplp'),
					'typeClearance'		=> $this->put('typeClearance'),
					'SPPB'				=> $this->put('SPPB'),
					'TGLSPPB'			=> $this->put('TGLSPPB'),
					'LOCATION'  		=> $this->put('LOCATION'),
					'DateOfOut'			=> $this->put('DateOfOut'),
					'TimeOut'			=> $this->put('TimeOut'),
					'DateOfIn'			=> $this->put('DateOfIn'),
					'TimeIn'			=> $this->put('TimeIn'),
					'BagNumber'			=> $this->put('BagNumber'),
					'DateEntry'			=> $this->put('DateEntry'),
					'TimeEntry'			=> $this->put('TimeEntry'),
					'token'				=> $this->put('token'),
					'noid'				=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('imp_hostawb', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	
	function index_post() {		
        $data = array(		
					'MasterAWB'			=> $this->post('MasterAWB'),
					'HostAWB'			=> $this->post('HostAWB'),
					'tglAWB'			=> $this->post('tglAWB'),
					'Quantity'			=> $this->post('Quantity'),
					'Weight'			=> $this->post('Weight'),
					'Volume'			=> $this->post('Volume'),
					'FlightNo'			=> $this->post('FlightNo'),
					'airlinescode'      => $this->post('airlinescode'),
					'DateOfFlight'		=> $this->post('DateOfFlight'),
					'Origin'			=> $this->post('Origin'),					
					'HSCode'			=> $this->post('HSCode'),
					'DescriptionGoods'	=> $this->post('DescriptionGoods'),
					'AgenCode'			=> $this->post('AgenCode'),
					'ShipperCode'		=> $this->post('ShipperCode'),
					'shippername'		=> $this->post('shippername'),
					'shipperaddress'	=> $this->post('shipperaddress'),
					'shippercity'		=> $this->post('shippercity'),
					'shippercountry'	=> $this->post('shippercountry'),
					'shipperpostal'		=> $this->post('shipperpostal'),
					'ConsigneeCode'		=> $this->post('ConsigneeCode'),
					'Consigneename'		=> $this->post('Consigneename'),
					'Consigneeaddress'	=> $this->post('Consigneeaddress'),
					'Consigneecity'		=> $this->post('Consigneecity'),
					'Consigneecountry'	=> $this->post('Consigneecountry'),
					'Consigneepostal'	=> $this->post('Consigneepostal'),
					'ConsigneeTaxNo'	=> $this->post('ConsigneeTaxNo'),
					'bc11'				=> $this->post('bc11'),
					'tglbc'				=> $this->post('tglbc'),
					'nopos'				=> $this->post('nopos'),
					'subpos'			=> $this->post('subpos'),
					'subsubpos'			=> $this->post('subsubpos'),
					'noplp'				=> $this->post('noplp'),
					'tglplp'			=> $this->post('tglplp'),
					'typeClearance'		=> $this->post('typeClearance'),
					'SPPB'				=> $this->post('SPPB'),
					'TGLSPPB'			=> $this->post('TGLSPPB'),
					'LOCATION'  		=> $this->post('LOCATION'),
					'DateOfOut'			=> $this->post('DateOfOut'),
					'TimeOut'			=> $this->post('TimeOut'),
					'DateOfIn'			=> $this->post('DateOfIn'),
					'TimeIn'			=> $this->post('TimeIn'),
					'BagNumber'			=> $this->post('BagNumber'),
					'DateEntry'			=> $this->post('DateEntry'),
					'TimeEntry'			=> $this->post('TimeEntry'),
					'token'				=> $this->post('token')
					);
					
		 $insert = $this->db->insert('imp_hostawb', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}