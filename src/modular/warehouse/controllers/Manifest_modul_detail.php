<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Manifest_modul_detail extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db4 = $this->load->database('db_tpsonline', TRUE);
	}
	
	function index_get() {
        $id_detail = $this->get('id_detail');
        if ($id_detail == '') {
			$data = $this->db4->get('manifest_detail')->result();            
        } else {
            $this->db4->where('id_detail', $id_detail);
            $data = $this->db4->get('manifest_detail')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$id_detail = $this->put('id_detail');
        $data = array(	
					'id_master'			=> $this->put('id_master'),
					'nomor_aju'			=> $this->put('nomor_aju'),
					'kd_kelompok_pos'	=> $this->put('kd_kelompok_pos'),
					'no_pos'			=> $this->put('no_pos'),
					'no_sub_pos'		=> $this->put('no_sub_pos'),
					'no_sub_sub_pos'	=> $this->put('no_sub_sub_pos'),
					'no_master_blawb'	=> $this->put('no_master_blawb'),
					'tgl_master_blawb'	=> $this->put('tgl_master_blawb'),
					'no_host_blawb'		=> $this->put('no_host_blawb'),
					'tgl_host_blawb'	=> $this->put('tgl_host_blawb'),
					'mother_vessel'		=> $this->put('mother_vessel'),
					'npwp_consignee'	=> $this->put('npwp_consignee'),
					'nama_consignee'	=> $this->put('nama_consignee'),
					'almt_consignee'	=> $this->put('almt_consignee'),
					'neg_consignee'		=> $this->put('neg_consignee'),
					'npwp_shipper'		=> $this->put('npwp_shipper'),
					'nama_shipper'		=> $this->put('nama_shipper'),
					'almt_shipper'		=> $this->put('almt_shipper'),
					'neg_shipper'		=> $this->put('neg_shipper'),
					'nama_notify'		=> $this->put('nama_notify'),
					'almt_notify'		=> $this->put('almt_notify'),
					'neg_notify'		=> $this->put('neg_notify'),
					'port_asal'			=> $this->put('port_asal'),
					'port_transit'		=> $this->put('port_transit'),
					'port_bongkar'		=> $this->put('port_bongkar'),
					'port_akhir'		=> $this->put('port_akhir'),
					'jumlah_kemasan'	=> $this->put('jumlah_kemasan'),
					'jenis_kemasan'		=> $this->put('jenis_kemasan'),
					'merk_kemasan'		=> $this->put('merk_kemasan'),
					'jumlah_kontainer'	=> $this->put('jumlah_kontainer'),
					'bruto'				=> $this->put('bruto'),
					'volume'			=> $this->put('volume'),
					'fl_partial'		=> $this->put('fl_partial'),
					'total_kemasan'		=> $this->put('total_kemasan'),
					'total_kontainer'	=> $this->put('total_kontainer'),
					'status_detail'		=> $this->put('status_detail'),
					'fl_konsolidasi'	=> $this->put('fl_konsolidasi'),
					'fl_perbaikan'		=> $this->put('fl_perbaikan'),
					'type_manifest'		=> $this->put('type_manifest'),
					'token'				=> $this->put('token'),
					'id_detail' 		=> $this->put('id_detail')
					);
					
		$this->db4->where('id_detail', $id_detail);
        $update = $this->db4->update('manifest_detail', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'id_detail' 		=> $this->post('id_detail'),
					'id_master'			=> $this->post('id_master'),
					'nomor_aju'			=> $this->post('nomor_aju'),
					'kd_kelompok_pos'	=> $this->post('kd_kelompok_pos'),
					'no_pos'			=> $this->post('no_pos'),
					'no_sub_pos'		=> $this->post('no_sub_pos'),
					'no_sub_sub_pos'	=> $this->post('no_sub_sub_pos'),
					'no_master_blawb'	=> $this->post('no_master_blawb'),
					'tgl_master_blawb'	=> $this->post('tgl_master_blawb'),
					'no_host_blawb'		=> $this->post('no_host_blawb'),
					'tgl_host_blawb'	=> $this->post('tgl_host_blawb'),
					'mother_vessel'		=> $this->post('mother_vessel'),
					'npwp_consignee'	=> $this->post('npwp_consignee'),
					'nama_consignee'	=> $this->post('nama_consignee'),
					'almt_consignee'	=> $this->post('almt_consignee'),
					'neg_consignee'		=> $this->post('neg_consignee'),
					'npwp_shipper'		=> $this->post('npwp_shipper'),
					'nama_shipper'		=> $this->post('nama_shipper'),
					'almt_shipper'		=> $this->post('almt_shipper'),
					'neg_shipper'		=> $this->post('neg_shipper'),
					'nama_notify'		=> $this->post('nama_notify'),
					'almt_notify'		=> $this->post('almt_notify'),
					'neg_notify'		=> $this->post('neg_notify'),
					'port_asal'			=> $this->post('port_asal'),
					'port_transit'		=> $this->post('port_transit'),
					'port_bongkar'		=> $this->post('port_bongkar'),
					'port_akhir'		=> $this->post('port_akhir'),
					'jumlah_kemasan'	=> $this->post('jumlah_kemasan'),
					'jenis_kemasan'		=> $this->post('jenis_kemasan'),
					'merk_kemasan'		=> $this->post('merk_kemasan'),
					'jumlah_kontainer'	=> $this->post('jumlah_kontainer'),
					'bruto'				=> $this->post('bruto'),
					'volume'			=> $this->post('volume'),
					'fl_partial'		=> $this->post('fl_partial'),
					'total_kemasan'		=> $this->post('total_kemasan'),
					'total_kontainer'	=> $this->post('total_kontainer'),
					'status_detail'		=> $this->post('status_detail'),
					'fl_konsolidasi'	=> $this->post('fl_konsolidasi'),
				//  'fl_pecah'			=> $this->post('fl_pecah'),
					'fl_perbaikan'		=> $this->post('fl_perbaikan'),		
					'type_manifest'		=> $this->post('type_manifest'),
					'token'				=> $this->post('token')
					);
					
		 $insert = $this->db4->insert('manifest_detail', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}