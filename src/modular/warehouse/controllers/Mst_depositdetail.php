<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Mst_depositdetail extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('mst_depositdetail')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('mst_depositdetail')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'WarehouseCode'			=> $this->put('WarehouseCode'),
					'DepositCode'			=> $this->put('DepositCode'),
					'DateOfTransaction'		=> $this->put('DateOfTransaction'),
					'TimeOfTransaction'		=> $this->put('TimeOfTransaction'),
					'Description'			=> $this->put('Description'),
					'DepositType'			=> $this->put('DepositType'),
					'InvoiceNumber'			=> $this->put('InvoiceNumber'),
					'DateOfEntry'			=> $this->put('DateOfEntry'),
					'TimeOfEntry'			=> $this->put('TimeOfEntry'),
					'DepositNominal'		=> $this->put('DepositNominal'),
					'noid'					=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('mst_depositdetail', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'WarehouseCode'			=> $this->post('WarehouseCode'),
					'DepositCode'			=> $this->post('DepositCode'),
					'DateOfTransaction'		=> $this->post('DateOfTransaction'),
					'TimeOfTransaction'		=> $this->post('TimeOfTransaction'),
					'Description'			=> $this->post('Description'),
					'DepositType'			=> $this->post('DepositType'),
					'InvoiceNumber'			=> $this->post('InvoiceNumber'),
					'DateOfEntry'			=> $this->post('DateOfEntry'),
					'TimeOfEntry'			=> $this->post('TimeOfEntry'),
					'DepositNominal'		=> $this->post('DepositNominal')
					);
					
		 $insert = $this->db->insert('mst_depositdetail', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}