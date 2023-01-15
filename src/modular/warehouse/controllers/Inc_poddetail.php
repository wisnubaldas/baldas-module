<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Inc_poddetail extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('_id');
        if ($_id == '') {
			$data = $this->db->get('inc_poddetail')->result();            
        } else {
            $this->db->where('_id', $_id);
            $data = $this->db->get('inc_poddetail')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$_id = $this->PUT('_id');
        $data = array(	
					'id_header'			=> $this->PUT('id_header'),
					'pod_number'		=> $this->PUT('pod_number'),
					'id_invoice'		=> $this->PUT('id_invoice'),
					'invoicenumber'		=> $this->PUT('invoicenumber'),
					'MasterAWB'			=> $this->PUT('MasterAWB'),
					'KindOfgood'		=> $this->PUT('KindOfgood'),
					'Pieces'			=> $this->PUT('Pieces'),
					'Netto'				=> $this->PUT('Netto'),
					'Volume'			=> $this->PUT('Volume'),
					'Posting'			=> $this->PUT('Posting'),
					'token'				=> $this->PUT('token'),
					'_id'				=> $this->PUT('_id')
					);
		$this->db->where('_id', $_id);
        $update = $this->db->update('inc_poddetail', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'id_header'			=> $this->POST('id_header'),
					'pod_number'		=> $this->POST('pod_number'),
					'id_invoice'		=> $this->POST('id_invoice'),
					'invoicenumber'		=> $this->POST('invoicenumber'),
					'MasterAWB'			=> $this->POST('MasterAWB'),
					'KindOfgood'		=> $this->POST('KindOfgood'),
					'Pieces'			=> $this->POST('Pieces'),
					'Netto'				=> $this->POST('Netto'),
					'Volume'			=> $this->POST('Volume'),
					'Posting'			=> $this->POST('Posting'),
					'token'				=> $this->POST('token')
					);
					
		 $insert = $this->db->insert('inc_poddetail', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}