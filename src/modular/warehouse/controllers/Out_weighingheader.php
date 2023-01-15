<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Out_weighingheader extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $_id = $this->get('_id');
        if ($_id == '') {
			$data = $this->db->get('out_weighingheader')->result();            
        } else {
            $this->db->where('_id', $_id);
            $data = $this->db->get('out_weighingheader')->result();
        }
        $this->response($data, 200);
    }

	function index_put() {
		$_id = $this->PUT('_id');
        $data = array(			
					'ProofNumber'		=> $this->PUT('ProofNumber'),
					'MasterAWB'			=> $this->PUT('MasterAWB'),
					'AirlinesCode'		=> $this->PUT('AirlinesCode'),
					'origin'			=> $this->PUT('origin'),
					'Destination'		=> $this->PUT('Destination'),
					'FlightNumber'		=> $this->PUT('FlightNumber'),
					'id_shipper'		=> $this->PUT('id_shipper'),
					'shipperCode'		=> $this->PUT('shipperCode'),
					'id_agent'			=> $this->PUT('id_agent'),
					'agentCode'			=> $this->PUT('agentCode'),
					'id_consignee'		=> $this->PUT('id_consignee'),
					'consigneeCode'		=> $this->PUT('consigneeCode'),
					'AgenPIC'			=> $this->PUT('AgenPIC'),
					'TotalPieces'		=> $this->PUT('TotalPieces'),
					'TotalPallet'		=> $this->PUT('TotalPallet'),
					'TotalGross'		=> $this->PUT('TotalGross'),
					'TotalNetto'		=> $this->PUT('TotalNetto'),
					'TotalVolume'		=> $this->PUT('TotalVolume'),
					'TotalNettoSMU'		=> $this->PUT('TotalNettoSMU'),
					'TotalCAW'			=> $this->PUT('TotalCAW'),
					'DateOfFlight'		=> $this->PUT('DateOfFlight'),
					'DateOfEntry'		=> $this->PUT('DateOfEntry'),
					'TimeOfEntry'		=> $this->PUT('TimeOfEntry'),					
					'MultiVolume'		=> $this->PUT('MultiVolume'),
					'PaymentCode'		=> $this->PUT('PaymentCode'),
					'EmployeeNumber'	=> $this->PUT('EmployeeNumber'),
					'AgreementCode'		=> $this->PUT('AgreementCode'),
					'PrintNumber'		=> $this->PUT('PrintNumber'),
					'Report'			=> $this->PUT('Report'),
					'id_invoice'		=> $this->PUT('id_invoice'),
					'invoicenumber'		=> $this->PUT('invoicenumber'),
					'token'				=> $this->PUT('token'),
					'_id'				=> $this->PUT('_id')
					);
		$this->db->where('_id', $_id);
        $update = $this->db->update('out_weighingheader', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'ProofNumber'		=> $this->POST('ProofNumber'),
					'MasterAWB'			=> $this->POST('MasterAWB'),
					'AirlinesCode'		=> $this->POST('AirlinesCode'),
					'origin'			=> $this->POST('origin'),
					'Destination'		=> $this->POST('Destination'),
					'FlightNumber'		=> $this->POST('FlightNumber'),
					'id_shipper'		=> $this->POST('id_shipper'),
					'shipperCode'		=> $this->POST('shipperCode'),
					'id_agent'			=> $this->POST('id_agent'),
					'agentCode'			=> $this->POST('agentCode'),
					'id_consignee'		=> $this->POST('id_consignee'),
					'consigneeCode'		=> $this->POST('consigneeCode'),
					'AgenPIC'			=> $this->POST('AgenPIC'),
					'TotalPieces'		=> $this->POST('TotalPieces'),
					'TotalPallet'		=> $this->POST('TotalPallet'),
					'TotalGross'		=> $this->POST('TotalGross'),
					'TotalNetto'		=> $this->POST('TotalNetto'),
					'TotalVolume'		=> $this->POST('TotalVolume'),
					'TotalNettoSMU'		=> $this->POST('TotalNettoSMU'),
					'TotalCAW'			=> $this->POST('TotalCAW'),
					'DateOfFlight'		=> $this->POST('DateOfFlight'),
					'DateOfEntry'		=> $this->POST('DateOfEntry'),
					'TimeOfEntry'		=> $this->POST('TimeOfEntry'),					
					'MultiVolume'		=> $this->POST('MultiVolume'),
					'PaymentCode'		=> $this->POST('PaymentCode'),
					'EmployeeNumber'	=> $this->POST('EmployeeNumber'),
					'AgreementCode'		=> $this->POST('AgreementCode'),
					'PrintNumber'		=> $this->POST('PrintNumber'),
					'Report'			=> $this->POST('Report'),
					'id_invoice'		=> $this->POST('id_invoice'),
					'invoicenumber'		=> $this->POST('invoicenumber'),
					'token'				=> $this->POST('token')
					);
					
		 $insert = $this->db->insert('out_weighingheader', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}