<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Manifest_modul_header extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db4 = $this->load->database('db_tpsonline', TRUE);
	}
	
	function index_get() {
        $nomor_aju = $this->get('nomor_aju');
        if ($nomor_aju == '') {
			$data = $this->db4->get('manifest_header')->result();            
        } else {
            $this->db4->where('nomor_aju', $nomor_aju);
            $data = $this->db4->get('manifest_header')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$nomor_aju = $this->put('nomor_aju');
        $data = array(						
					'id_data'				=> $this->put('id_data'),
					'npwp'					=> $this->put('npwp'),
					'jns_manifest'			=> $this->put('jns_manifest'),
					'kd_jns_manifest'		=> $this->put('kd_jns_manifest'),
					'kppbc'					=> $this->put('kppbc'),
					'nobc10'				=> $this->put('nobc10'),
					'tglbc10'				=> $this->put('tglbc10'),
					'nobc11'				=> $this->put('nobc11'),
					'tglbc11'				=> $this->put('tglbc11'),
					'nm_sarana_angkut'		=> $this->put('nm_sarana_angkut'),
					'kd_mode'				=> $this->put('kd_mode'),
					'callsign'				=> $this->put('callsign'),
					'no_imo'				=> $this->put('no_imo'),
					'NO_MMSI'				=> $this->put('NO_MMSI'),
					'negara'				=> $this->put('negara'),
					'no_voyage_arrival'		=> $this->put('no_voyage_arrival'),
					'defarture_flight'		=> $this->put('defarture_flight'),
					'nahkoda'				=> $this->put('nahkoda'),
					'Handling_agent'		=> $this->put('Handling_agent'),
					'port_asal'				=> $this->put('port_asal'),
					'port_transit'			=> $this->put('port_transit'),
					'port_bongkar'			=> $this->put('port_bongkar'),
					'port_lanjut'			=> $this->put('port_lanjut'),
					'kade'					=> $this->put('kade'),
					'tgl_tiba'				=> $this->put('tgl_tiba'),
					'jam_tiba'				=> $this->put('jam_tiba'),
					'tgl_datang'			=> $this->put('tgl_datang'),
					'jam_datang'			=> $this->put('jam_datang'),
					'tgl_bongkar'			=> $this->put('tgl_bongkar'),
					'jam_bongkar'			=> $this->put('jam_bongkar'),
					'tgl_muat'				=> $this->put('tgl_muat'),
					'jam_muat'				=> $this->put('jam_muat'),
					'tgl_berangkat'			=> $this->put('tgl_berangkat'),
					'jam_berangkat'			=> $this->put('jam_berangkat'),
					'total_pos'				=> $this->put('total_pos'),
					'total_kemasan'			=> $this->put('total_kemasan'),
					'total_kontainer'		=> $this->put('total_kontainer'),
					'total_master_bl'		=> $this->put('total_master_bl'),
					'total_bruto'			=> $this->put('total_bruto'),
					'total_volume'			=> $this->put('total_volume'),
					'flag_nihil'			=> $this->put('flag_nihil'),
					'status'				=> $this->put('status'),
					'no_perbaikan'			=> $this->put('no_perbaikan'),
					'tgl_perbaikan'			=> $this->put('tgl_perbaikan'),
					'seri_perbaikan'		=> $this->put('seri_perbaikan'),
					'pemberitahu'			=> $this->put('pemberitahu'),
					'lengkap'				=> $this->put('lengkap'),
					'user'					=> $this->put('user'),
					'id_asal_data'			=> $this->put('id_asal_data'),
					'id_modul'				=> $this->put('id_modul'),
					'waktu_rekam'			=> $this->put('waktu_rekam'),
					'waktu_update'			=> $this->put('waktu_update'),
					'versi_modul'			=> $this->put('versi_modul'),
					'type_manifest'			=> $this->put('type_manifest'),	
					'token'					=> $this->put('token'),	
					'nomor_aju'				=> $this->put('nomor_aju')
					);
					
		$this->db4->where('nomor_aju', $nomor_aju);
        $update = $this->db4->update('manifest_header', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'nomor_aju'				=> $this->post('nomor_aju'),
					'id_data'				=> $this->post('id_data'),
					'npwp'					=> $this->post('npwp'),
					'jns_manifest'			=> $this->post('jns_manifest'),
					'kd_jns_manifest'		=> $this->post('kd_jns_manifest'),
					'kppbc'					=> $this->post('kppbc'),
					'nobc10'				=> $this->post('nobc10'),
					'tglbc10'				=> $this->post('tglbc10'),
					'nobc11'				=> $this->post('nobc11'),
					'tglbc11'				=> $this->post('tglbc11'),
					'nm_sarana_angkut'		=> $this->post('nm_sarana_angkut'),
					'kd_mode'				=> $this->post('kd_mode'),
					'callsign'				=> $this->post('callsign'),
					'no_imo'				=> $this->post('no_imo'),
					'NO_MMSI'				=> $this->post('NO_MMSI'),
					'negara'				=> $this->post('negara'),
					'no_voyage_arrival'		=> $this->post('no_voyage_arrival'),
					'defarture_flight'		=> $this->post('defarture_flight'),
					'nahkoda'				=> $this->post('nahkoda'),
					'Handling_agent'		=> $this->post('Handling_agent'),
					'port_asal'				=> $this->post('port_asal'),
					'port_transit'			=> $this->post('port_transit'),
					'port_bongkar'			=> $this->post('port_bongkar'),
					'port_lanjut'			=> $this->post('port_lanjut'),
					'kade'					=> $this->post('kade'),
					'tgl_tiba'				=> $this->post('tgl_tiba'),
					'jam_tiba'				=> $this->post('jam_tiba'),
					'tgl_datang'			=> $this->post('tgl_datang'),
					'jam_datang'			=> $this->post('jam_datang'),
					'tgl_bongkar'			=> $this->post('tgl_bongkar'),
					'jam_bongkar'			=> $this->post('jam_bongkar'),
					'tgl_muat'				=> $this->post('tgl_muat'),
					'jam_muat'				=> $this->post('jam_muat'),
					'tgl_berangkat'			=> $this->post('tgl_berangkat'),
					'jam_berangkat'			=> $this->post('jam_berangkat'),
					'total_pos'				=> $this->post('total_pos'),
					'total_kemasan'			=> $this->post('total_kemasan'),
					'total_kontainer'		=> $this->post('total_kontainer'),
					'total_master_bl'		=> $this->post('total_master_bl'),
					'total_bruto'			=> $this->post('total_bruto'),
					'total_volume'			=> $this->post('total_volume'),
					'flag_nihil'			=> $this->post('flag_nihil'),
					'status'				=> $this->post('status'),
					'no_perbaikan'			=> $this->post('no_perbaikan'),
					'tgl_perbaikan'			=> $this->post('tgl_perbaikan'),
					'seri_perbaikan'		=> $this->post('seri_perbaikan'),
					'pemberitahu'			=> $this->post('pemberitahu'),
					'lengkap'				=> $this->post('lengkap'),
					'user'					=> $this->post('user'),
					'id_asal_data'			=> $this->post('id_asal_data'),
					'id_modul'				=> $this->post('id_modul'),
					'waktu_rekam'			=> $this->post('waktu_rekam'),
					'waktu_update'			=> $this->post('waktu_update'),
					'versi_modul'			=> $this->post('versi_modul'),
					'type_manifest'			=> $this->post('type_manifest'),
					'token'					=> $this->post('token')
					);
					
		 $insert = $this->db4->insert('manifest_header', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}