<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Inc_podheader extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('_id');
        if ($_id == '') {
			$data = $this->db->get('inc_podheader')->result();            
        } else {
            $this->db->where('_id', $_id);
            $data = $this->db->get('inc_podheader')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$_id = $this->PUT('_id');
        $data = array(	
					'pod_number'			=> $this->PUT('pod_number'),
					'id_invoice'			=> $this->PUT('id_invoice'),
					'InvoiceNumber'			=> $this->PUT('InvoiceNumber'),
					'Referensi'				=> $this->PUT('Referensi'),
					'DateOfOut'				=> $this->PUT('DateOfOut'),
					'TimeOfOut'				=> $this->PUT('TimeOfOut'),
					'EmployeeNumber'		=> $this->PUT('EmployeeNumber'),
					'id_consignee'			=> $this->PUT('id_consignee'),
					'CustomerCode'			=> $this->PUT('CustomerCode'),
					'token'					=> $this->PUT('token')
					);
		$this->db->where('_id', $_id);
        $update = $this->db->update('inc_podheader', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'pod_number'			=> $this->POST('pod_number'),
					'id_invoice'			=> $this->POST('id_invoice'),
					'InvoiceNumber'			=> $this->POST('InvoiceNumber'),
					'Referensi'				=> $this->POST('Referensi'),
					'DateOfOut'				=> $this->POST('DateOfOut'),
					'TimeOfOut'				=> $this->POST('TimeOfOut'),
					'EmployeeNumber'		=> $this->POST('EmployeeNumber'),
					'id_consignee'			=> $this->POST('id_consignee'),
					'CustomerCode'			=> $this->POST('CustomerCode'),
					'token'					=> $this->POST('token')
					);
					
		 $insert = $this->db->insert('inc_podheader', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}



