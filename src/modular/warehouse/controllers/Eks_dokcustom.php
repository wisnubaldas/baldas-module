<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Eks_dokcustom extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('eks_dokcustom')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('eks_dokcustom')->result();
        }
        $this->response($data, 200);
    }

	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'MasterAWB'			=> $this->put('MasterAWB'),
					'HostAWB'			=> $this->put('HostAWB'),
					'KD_DOC'			=> $this->put('KD_DOC'),
					'PEB'				=> $this->put('PEB'),
					'KTKR'				=> $this->put('KTKR'),
					'DateOfPEB'			=> $this->put('DateOfPEB'),
					'HSCode'			=> $this->put('HSCode'),
					'ShipperCode'		=> $this->put('ShipperCode'),
					'ConsigneeCode'		=> $this->put('ConsigneeCode'),
					'AgenCode'			=> $this->put('AgenCode'),
					'TransferPDE'		=> $this->put('TransferPDE'),
					'InvoiceNumber'		=> $this->put('InvoiceNumber'),
					'DateEntry'			=> $this->put('DateEntry'),
					'TimeEntry'			=> $this->put('TimeEntry'),
					'token'				=> $this->put('token'),
					'noid'				=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('eks_dokcustom', $data);
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
					'KD_DOC'			=> $this->post('KD_DOC'),
					'PEB'				=> $this->post('PEB'),
					'KTKR'				=> $this->post('KTKR'),
					'DateOfPEB'			=> $this->post('DateOfPEB'),
					'HSCode'			=> $this->post('HSCode'),
					'ShipperCode'		=> $this->post('ShipperCode'),
					'ConsigneeCode'		=> $this->post('ConsigneeCode'),
					'AgenCode'			=> $this->post('AgenCode'),
					'TransferPDE'		=> $this->post('TransferPDE'),
					'InvoiceNumber'		=> $this->post('InvoiceNumber'),
					'DateEntry'			=> $this->post('DateEntry'),
					'TimeEntry'			=> $this->post('TimeEntry'),
					'token'				=> $this->post('token')
					);
					
		 $insert = $this->db->insert('eks_dokcustom', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}