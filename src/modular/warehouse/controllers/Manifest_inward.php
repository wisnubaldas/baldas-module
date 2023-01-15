<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Manifest_inward extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $WaybillNumber = $this->get('WaybillNumber');
        if ($WaybillNumber == '') {
			$data = $this->db->get('manifest_inward')->result();            
        } else {
            $this->db->where('WaybillNumber', $WaybillNumber);
            $data = $this->db->get('manifest_inward')->result();
        }
        $this->response($data, 200);
    }
		
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'WaybillNumber'				=> $this->put('WaybillNumber'),
					'parsial'					=> $this->put('parsial'),
					'ServiceNumber'				=> $this->put('ServiceNumber'),
					'ConversionNumber'			=> $this->put('ConversionNumber'),
					'OriginCountry'				=> $this->put('OriginCountry'),
					'DestinationCountry'		=> $this->put('DestinationCountry'),
					'ParcelWeight'				=> $this->put('ParcelWeight'),
					'ParcelLong'				=> $this->put('ParcelLong'),
					'ParcelWide'				=> $this->put('ParcelWide'),
					'ParcelHigh'				=> $this->put('ParcelHigh'),
					'ParcelVolume'				=> $this->put('ParcelVolume'),
					'ConsignmentDate'			=> $this->put('ConsignmentDate'),
					'TaxConsigneeNumber'		=> $this->put('TaxConsigneeNumber'),
					'ConsigneeName'				=> $this->put('ConsigneeName'),
					'ConsigneeCompany'			=> $this->put('ConsigneeCompany'),
					'ConsigneePhone'			=> $this->put('ConsigneePhone'),
					'ConsigneeMobile'			=> $this->put('ConsigneeMobile'),
					'ConsigneeFax'				=> $this->put('ConsigneeFax'),
					'ConsigneeEmail'			=> $this->put('ConsigneeEmail'),
					'ConsigneePostalCode'		=> $this->put('ConsigneePostalCode'),
					'ConsigneeCountry'			=> $this->put('ConsigneeCountry'),
					'ConsigneeCountryCode'		=> $this->put('ConsigneeCountryCode'),
					'ConsigneeState'			=> $this->put('ConsigneeState'),
					'ConsigneeCity'				=> $this->put('ConsigneeCity'),
					'ConsigneeCounty'			=> $this->put('ConsigneeCounty'),
					'ConsigneeAddress1'			=> $this->put('ConsigneeAddress1'),
					'ConsigneeAddress2'			=> $this->put('ConsigneeAddress2'),
					'ShipperName'				=> $this->put('ShipperName'),
					'ShipperCompany'			=> $this->put('ShipperCompany'),
					'ShipperPhone'				=> $this->put('ShipperPhone'),
					'ShipperMobile'				=> $this->put('ShipperMobile'),
					'ShipperFax'				=> $this->put('ShipperFax'),
					'ShipperEmail'				=> $this->put('ShipperEmail'),
					'ShipperPostalCode'			=> $this->put('ShipperPostalCode'),
					'ShipperCountry'			=> $this->put('ShipperCountry'),
					'ShipperCountryCode'		=> $this->put('ShipperCountryCode'),
					'ShipperState'				=> $this->put('ShipperState'),
					'ShipperCity'				=> $this->put('ShipperCity'),
					'ShipperCounty'				=> $this->put('ShipperCounty'),
					'ShipperAddress1'			=> $this->put('ShipperAddress1'),
					'ShipperAddress2'			=> $this->put('ShipperAddress2'),
					'ParcelQuantity'			=> $this->put('ParcelQuantity'),
					'ProductQuantity'			=> $this->put('ProductQuantity'),
					'ProductDescription'		=> $this->put('ProductDescription'),
					'DeclarationPrice'			=> $this->put('DeclarationPrice'),
					'Currency'					=> $this->put('Currency'),
					'BillingCode'				=> $this->put('BillingCode'),
					'billingAccount'			=> $this->put('billingAccount'),
					'brokerName'				=> $this->put('brokerName'),
					'Brokerphone'				=> $this->put('Brokerphone'),
					'hsCode'					=> $this->put('hsCode'),
					'FreightCost'				=> $this->put('FreightCost'),
					'Insurance'					=> $this->put('Insurance'),
					'Bagno'						=> $this->put('Bagno'),
					'PaymentType'				=> $this->put('PaymentType'),
					'OrderNumber'				=> $this->put('OrderNumber'),
					'PackageID'					=> $this->put('PackageID'),
					'AirlinesCode'				=> $this->put('AirlinesCode'),
					'FlightNo'					=> $this->put('FlightNo'),
					'route'						=> $this->put('route'),
					'dateflight'				=> $this->put('dateflight'),
					'dateentry'					=> $this->put('dateentry'),
					'timeentry'					=> $this->put('timeentry'),	
					'token'						=> $this->put('token'),
					'noid'						=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('manifest_inward', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'WaybillNumber'				=> $this->post('WaybillNumber'),
					'parsial'					=> $this->post('parsial'),
					'ServiceNumber'				=> $this->post('ServiceNumber'),
					'ConversionNumber'			=> $this->post('ConversionNumber'),
					'OriginCountry'				=> $this->post('OriginCountry'),
					'DestinationCountry'		=> $this->post('DestinationCountry'),
					'ParcelWeight'				=> $this->post('ParcelWeight'),
					'ParcelLong'				=> $this->post('ParcelLong'),
					'ParcelWide'				=> $this->post('ParcelWide'),
					'ParcelHigh'				=> $this->post('ParcelHigh'),
					'ParcelVolume'				=> $this->post('ParcelVolume'),
					'ConsignmentDate'			=> $this->post('ConsignmentDate'),
					'TaxConsigneeNumber'		=> $this->post('TaxConsigneeNumber'),
					'ConsigneeName'				=> $this->post('ConsigneeName'),
					'ConsigneeCompany'			=> $this->post('ConsigneeCompany'),
					'ConsigneePhone'			=> $this->post('ConsigneePhone'),
					'ConsigneeMobile'			=> $this->post('ConsigneeMobile'),
					'ConsigneeFax'				=> $this->post('ConsigneeFax'),
					'ConsigneeEmail'			=> $this->post('ConsigneeEmail'),
					'ConsigneePostalCode'		=> $this->post('ConsigneePostalCode'),
					'ConsigneeCountry'			=> $this->post('ConsigneeCountry'),
					'ConsigneeCountryCode'		=> $this->post('ConsigneeCountryCode'),
					'ConsigneeState'			=> $this->post('ConsigneeState'),
					'ConsigneeCity'				=> $this->post('ConsigneeCity'),
					'ConsigneeCounty'			=> $this->post('ConsigneeCounty'),
					'ConsigneeAddress1'			=> $this->post('ConsigneeAddress1'),
					'ConsigneeAddress2'			=> $this->post('ConsigneeAddress2'),
					'ShipperName'				=> $this->post('ShipperName'),
					'ShipperCompany'			=> $this->post('ShipperCompany'),
					'ShipperPhone'				=> $this->post('ShipperPhone'),
					'ShipperMobile'				=> $this->post('ShipperMobile'),
					'ShipperFax'				=> $this->post('ShipperFax'),
					'ShipperEmail'				=> $this->post('ShipperEmail'),
					'ShipperPostalCode'			=> $this->post('ShipperPostalCode'),
					'ShipperCountry'			=> $this->post('ShipperCountry'),
					'ShipperCountryCode'		=> $this->post('ShipperCountryCode'),
					'ShipperState'				=> $this->post('ShipperState'),
					'ShipperCity'				=> $this->post('ShipperCity'),
					'ShipperCounty'				=> $this->post('ShipperCounty'),
					'ShipperAddress1'			=> $this->post('ShipperAddress1'),
					'ShipperAddress2'			=> $this->post('ShipperAddress2'),
					'ParcelQuantity'			=> $this->post('ParcelQuantity'),
					'ProductQuantity'			=> $this->post('ProductQuantity'),
					'ProductDescription'		=> $this->post('ProductDescription'),
					'DeclarationPrice'			=> $this->post('DeclarationPrice'),
					'Currency'					=> $this->post('Currency'),
					'BillingCode'				=> $this->post('BillingCode'),
					'billingAccount'			=> $this->post('billingAccount'),
					'brokerName'				=> $this->post('brokerName'),
					'Brokerphone'				=> $this->post('Brokerphone'),
					'hsCode'					=> $this->post('hsCode'),
					'FreightCost'				=> $this->post('FreightCost'),
					'Insurance'					=> $this->post('Insurance'),
					'Bagno'						=> $this->post('Bagno'),
					'PaymentType'				=> $this->post('PaymentType'),
					'OrderNumber'				=> $this->post('OrderNumber'),
					'PackageID'					=> $this->post('PackageID'),
					'AirlinesCode'				=> $this->post('AirlinesCode'),
					'FlightNo'					=> $this->post('FlightNo'),
					'route'						=> $this->post('route'),
					'dateflight'				=> $this->post('dateflight'),
					'dateentry'					=> $this->post('dateentry'),
					'timeentry'					=> $this->post('timeentry'),
					'token'						=> $this->post('token')
					);
					
		 $insert = $this->db->insert('manifest_inward', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}