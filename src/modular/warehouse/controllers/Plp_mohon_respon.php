<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Plp_mohon_respon extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db4 = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db4->get('plp_resp_mohon_tuj')->result();            
        } else {
            $this->db4->where('noid', $noid);
            $data = $this->db4->get('plp_resp_mohon_tuj')->result();
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
					'alasan_reject'		=> $this->put('alasan_reject'),
					'call_sign'			=> $this->put('call_sign'),
					'nm_angkut'			=> $this->put('nm_angkut'),
					'no_voy_flight'		=> $this->put('no_voy_flight'),
					'tgl_tiba'			=> $this->put('tgl_tiba'),
					'no_surat'			=> $this->put('no_surat'),
					'tgl_surat'			=> $this->put('tgl_surat'),
					'no_bc11'			=> $this->put('no_bc11'),
					'tgl_bc11'			=> $this->put('tgl_bc11'),
					'jns_kms'			=> $this->put('jns_kms'),
					'jml_kms'			=> $this->put('jml_kms'),
					'no_bl_awb'			=> $this->put('no_bl_awb'),
					'tgl_bl_awb'		=> $this->put('tgl_bl_awb'),
					'no_pos_bc11'		=> $this->put('no_pos_bc11'),
					'consignee'			=> $this->put('consignee'),
					'fl_setuju'			=> $this->put('fl_setuju'),
					'berat_manual'		=> $this->put('berat_manual'),
					'create_at'			=> $this->put('create_at'),
					'update_at'			=> $this->put('update_at'),
					'status_gatein'		=> $this->put('status_gatein'),
					'token'				=> $this->put('token'),
					'noid' 				=> $this->put('noid')
					);
					
		$this->db4->where('noid', $noid);
        $update = $this->db4->update('plp_resp_mohon_tuj', $data);
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
					'alasan_reject'		=> $this->post('alasan_reject'),
					'call_sign'			=> $this->post('call_sign'),
					'nm_angkut'			=> $this->post('nm_angkut'),
					'no_voy_flight'		=> $this->post('no_voy_flight'),
					'tgl_tiba'			=> $this->post('tgl_tiba'),
					'no_surat'			=> $this->post('no_surat'),
					'tgl_surat'			=> $this->post('tgl_surat'),
					'no_bc11'			=> $this->post('no_bc11'),
					'tgl_bc11'			=> $this->post('tgl_bc11'),
					'jns_kms'			=> $this->post('jns_kms'),
					'jml_kms'			=> $this->post('jml_kms'),
					'no_bl_awb'			=> $this->post('no_bl_awb'),
					'tgl_bl_awb'		=> $this->post('tgl_bl_awb'),
					'no_pos_bc11'		=> $this->post('no_pos_bc11'),
					'consignee'			=> $this->post('consignee'),
					'fl_setuju'			=> $this->post('fl_setuju'),
					'berat_manual'		=> $this->post('berat_manual'),
					'create_at'			=> $this->post('create_at'),
					'update_at'			=> $this->post('update_at'),
					'status_gatein'		=> $this->post('status_gatein'),
					'token'				=> $this->post('token')
					);
					
		 $insert = $this->db4->insert('plp_resp_mohon_tuj', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}