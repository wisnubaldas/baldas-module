<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Tps_ekspor_peb_npe extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('tpsonline_mau', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('id');
        if ($id == '') {
			$data = $this->db->get('xml_ekspor_peb_npe')->result();            
        } else {
            $this->db->where('id', $id);
            $data = $this->db->get('xml_ekspor_peb_npe')->result();
        }
        $this->response($data, 200);
    }
	
	// id				
	function index_put() {
		$id = $this->put('id');
        $data = array(	
					'HAWB'				=> $this->put('HAWB'),
					'KD_KANTOR'			=> $this->put('KD_KANTOR'),
					'NO_DAFTAR'			=> $this->put('NO_DAFTAR'),
					'TGL_DAFTAR'		=> $this->put('TGL_DAFTAR'),
					'NONPE'				=> $this->put('NONPE'),
					'TGLNPE'			=> $this->put('TGLNPE'),	
					'NPWP_EKS'			=> $this->put('NPWP_EKS'),
					'NAMA_EKS'			=> $this->put('NAMA_EKS'),
					'FL_SEGEL'			=> $this->put('FL_SEGEL'),
					'id'				=> $this->put('id')
					);
		$this->db->where('id', $id);
        $update = $this->db->update('xml_ekspor_peb_npe', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'HAWB'				=> $this->POST('HAWB'),
					'KD_KANTOR'			=> $this->POST('KD_KANTOR'),
					'NO_DAFTAR'			=> $this->POST('NO_DAFTAR'),
					'TGL_DAFTAR'		=> $this->POST('TGL_DAFTAR'),
					'NONPE'				=> $this->POST('NONPE'),
					'TGLNPE'			=> $this->POST('TGLNPE'),	
					'NPWP_EKS'			=> $this->POST('NPWP_EKS'),
					'NAMA_EKS'			=> $this->POST('NAMA_EKS'),
					'FL_SEGEL'			=> $this->POST('FL_SEGEL')
					);
					
		 $insert = $this->db->insert('xml_ekspor_peb_npe', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}
