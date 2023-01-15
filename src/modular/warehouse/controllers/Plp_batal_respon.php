<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Plp_batal_respon extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db4 = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db4->get('plp_resp_batal_tuj')->result();            
        } else {
            $this->db4->where('noid', $noid);
            $data = $this->db4->get('plp_resp_batal_tuj')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'kd_kantor'			=> $this->put('kd_kantor'),
					'kd_tps_asal'		=> $this->put('kd_tps_asal'),
					'kd_tps_tujuan'		=> $this->put('kd_tps_tujuan'),
					'ref_number'		=> $this->put('ref_number'),
					'gudang_asal'		=> $this->put('gudang_asal'),
					'gudang_tujuan'		=> $this->put('gudang_tujuan'),
					'no_plp'			=> $this->put('no_plp'),
					'tgl_plp'			=> $this->put('tgl_plp'),
					'no_batal_plp'		=> $this->put('no_batal_plp'),
					'tgl_batal_plp'		=> $this->put('tgl_batal_plp'),
					'alasan_batal'		=> $this->put('alasan_batal'),
					'jns_kms'			=> $this->put('jns_kms'),
					'jml_kms'			=> $this->put('jml_kms'),
					'no_bl_awb'			=> $this->put('no_bl_awb'),
					'tgl_bl_awb'		=> $this->put('tgl_bl_awb'),
					'fl_setuju'			=> $this->put('fl_setuju'),
					'create_at'			=> $this->put('create_at'),
					'token'				=> $this->put('token'),
					'noid' 				=> $this->put('noid')
					);
					
		$this->db4->where('noid', $noid);
        $update = $this->db4->update('plp_resp_batal_tuj', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'kd_kantor'			=> $this->post('kd_kantor'),
					'kd_tps_asal'		=> $this->post('kd_tps_asal'),
					'kd_tps_tujuan'		=> $this->post('kd_tps_tujuan'),
					'ref_number'		=> $this->post('ref_number'),
					'gudang_asal'		=> $this->post('gudang_asal'),
					'gudang_tujuan'		=> $this->post('gudang_tujuan'),
					'no_plp'			=> $this->post('no_plp'),
					'tgl_plp'			=> $this->post('tgl_plp'),
					'no_batal_plp'		=> $this->post('no_batal_plp'),
					'tgl_batal_plp'		=> $this->post('tgl_batal_plp'),
					'alasan_batal'		=> $this->post('alasan_batal'),
					'jns_kms'			=> $this->post('jns_kms'),
					'jml_kms'			=> $this->post('jml_kms'),
					'no_bl_awb'			=> $this->post('no_bl_awb'),
					'tgl_bl_awb'		=> $this->post('tgl_bl_awb'),
					'fl_setuju'			=> $this->post('fl_setuju'),
					'create_at'			=> $this->post('create_at'),
					'token'				=> $this->post('token')
					);
					
		 $insert = $this->db4->insert('plp_resp_batal_tuj', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}