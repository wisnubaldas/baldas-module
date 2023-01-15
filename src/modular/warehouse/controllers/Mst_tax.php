<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Mst_tax extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($id_ == '') {
			$data = $this->db->get('mst_tax')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('mst_tax')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'taxnumber'			=> $this->put('taxnumber'),
					'invoicenumber'		=> $this->put('invoicenumber'),
					'warehouse_npwp'	=> $this->put('warehouse_npwp'),
					'DateEntry'			=> $this->put('DateEntry'),
					'TimeEntry'			=> $this->put('TimeEntry'),
					'DateUpdate'		=> $this->put('DateUpdate'),
					'TimeUpdate'		=> $this->put('TimeUpdate'),
					'noid'				=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('mst_tax', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'taxnumber'			=> $this->post('taxnumber'),
					'invoicenumber'		=> $this->post('invoicenumber'),
					'warehouse_npwp'	=> $this->post('warehouse_npwp'),
					'DateEntry'			=> $this->post('DateEntry'),
					'TimeEntry'			=> $this->post('TimeEntry'),
					'DateUpdate'		=> $this->post('DateUpdate'),
					'TimeUpdate'		=> $this->post('TimeUpdate')
					);
					
		 $insert = $this->db->insert('mst_tax', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}