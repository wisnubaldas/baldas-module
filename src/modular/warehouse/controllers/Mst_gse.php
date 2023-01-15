<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Mst_gse extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $EquipmentCode = $this->get('EquipmentCode');
        if ($EquipmentCode == '') {
			$data = $this->db->get('mst_gse')->result();            
        } else {
            $this->db->where('EquipmentCode', $EquipmentCode);
            $data = $this->db->get('mst_gse')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$EquipmentCode = $this->put('EquipmentCode');
        $data = array(	
					'EquipmentName'			=> $this->put('EquipmentName'),
					'EquipmentUtilisasi'	=> $this->put('EquipmentUtilisasi'),
					'EquipmentCode'			=> $this->put('EquipmentCode')
					);
		$this->db->where('EquipmentCode', $EquipmentCode);
        $update = $this->db->update('mst_gse', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'EquipmentCode'			=> $this->post('EquipmentCode'),
					'EquipmentName'			=> $this->post('EquipmentName'),
					'EquipmentUtilisasi'	=> $this->post('EquipmentUtilisasi'),
					);
					
		 $insert = $this->db->insert('mst_gse', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}