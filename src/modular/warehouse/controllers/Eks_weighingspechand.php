<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Eks_weighingspechand extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('eks_weighingspechand')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('eks_weighingspechand')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'MasterAWB'				=> $this->put('MasterAWB'),
					'HostAWB'				=> $this->put('HostAWB'),
					'SpecialHandling1'		=> $this->put('SpecialHandling1'),
					'SpecialHandling2'		=> $this->put('SpecialHandling2'),
					'DateEntry'				=> $this->put('DateEntry'),
					'TimeEntry'				=> $this->put('TimeEntry'),
					'noid'					=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('eks_weighingspechand', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'MasterAWB'				=> $this->put('MasterAWB'),
					'HostAWB'				=> $this->put('HostAWB'),
					'SpecialHandling1'		=> $this->put('SpecialHandling1'),
					'SpecialHandling2'		=> $this->put('SpecialHandling2'),
					'DateEntry'				=> $this->put('DateEntry'),
					'TimeEntry'				=> $this->put('TimeEntry')
					);
					
		 $insert = $this->db->insert('eks_weighingspechand', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}