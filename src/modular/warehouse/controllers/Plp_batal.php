<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Plp_batal extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db4 = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $id_batal = $this->get('id_batal');
        if ($id_batal == '') {
			$data = $this->db4->get('plp_batal')->result();            
        } else {
            $this->db4->where('id_batal', $id_batal);
            $data = $this->db4->get('plp_batal')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$id_batal = $this->put('id_batal');
        $data = array(	
					'kd_kantor'			=> $this->put('kd_kantor'),
					'tipe_data'			=> $this->put('tipe_data'),
					'kd_tps'			=> $this->put('kd_tps'),
					'ref_number'		=> $this->put('ref_number'),
					'no_surat'			=> $this->put('no_surat'),
					'tgl_surat'			=> $this->put('tgl_surat'),
					'no_plp'			=> $this->put('no_plp'),
					'tgl_plp'			=> $this->put('tgl_plp'),
					'alasan'			=> $this->put('alasan'),
					'no_bc11'			=> $this->put('no_bc11'),
					'tgl_bc11'			=> $this->put('tgl_bc11'),
					'nm_pemohon'		=> $this->put('nm_pemohon'),
					'flag_transfer'		=> $this->put('flag_transfer'),
					'jns_kms'			=> $this->put('jns_kms'),
					'jml_kms'			=> $this->put('jml_kms'),
					'tgl_bl_awb'		=> $this->put('tgl_bl_awb'),
					'no_bl_awb'			=> $this->put('no_bl_awb'),
					'respon_batal'		=> $this->put('respon_batal'),
					'create_at'			=> $this->put('create_at'),
					'update_at'			=> $this->put('update_at'),
					'token'				=> $this->put('token'),
					'id_batal' 			=> $this->put('id_batal')
					);
					
		$this->db4->where('id_batal', $id_batal);
        $update = $this->db4->update('plp_batal', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'kd_kantor'			=> $this->post('kd_kantor'),
					'tipe_data'			=> $this->post('tipe_data'),
					'kd_tps'			=> $this->post('kd_tps'),
					'ref_number'		=> $this->post('ref_number'),
					'no_surat'			=> $this->post('no_surat'),
					'tgl_surat'			=> $this->post('tgl_surat'),
					'no_plp'			=> $this->post('no_plp'),
					'tgl_plp'			=> $this->post('tgl_plp'),
					'alasan'			=> $this->post('alasan'),
					'no_bc11'			=> $this->post('no_bc11'),
					'tgl_bc11'			=> $this->post('tgl_bc11'),
					'nm_pemohon'		=> $this->post('nm_pemohon'),
					'flag_transfer'		=> $this->post('flag_transfer'),
					'jns_kms'			=> $this->post('jns_kms'),
					'jml_kms'			=> $this->post('jml_kms'),
					'tgl_bl_awb'		=> $this->post('tgl_bl_awb'),
					'no_bl_awb'			=> $this->post('no_bl_awb'),
					'respon_batal'		=> $this->post('respon_batal'),
					'create_at'			=> $this->post('create_at'),
					'update_at'			=> $this->post('update_at'),
					'token'				=> $this->post('token')
					);
					
		 $insert = $this->db4->insert('plp_batal', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}