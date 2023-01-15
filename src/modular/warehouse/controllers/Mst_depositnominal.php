<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Mst_depositnominal extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $DepositCode = $this->get('DepositCode');
        if ($DepositCode == '') {
			$data = $this->db->get('mst_depositnominal')->result();            
        } else {
            $this->db->where('DepositCode', $DepositCode);
            $data = $this->db->get('mst_depositnominal')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'DepositCode'		=> $this->put('DepositCode'),
					'WarehouseCode'		=> $this->put('WarehouseCode'),
					'NominalDeposit'	=> $this->put('NominalDeposit'),
					'noid'				=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('mst_depositnominal', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'DepositCode'		=> $this->post('DepositCode'),
					'WarehouseCode'		=> $this->post('WarehouseCode'),
					'NominalDeposit'	=> $this->post('NominalDeposit')
					);
					
		 $insert = $this->db->insert('mst_depositnominal', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}