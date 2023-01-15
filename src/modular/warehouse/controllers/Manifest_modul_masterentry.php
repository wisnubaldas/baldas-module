<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Manifest_modul_masterentry extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db4 = $this->load->database('db_tpsonline', TRUE);
	}
	
	function index_get() {
        $id_master = $this->get('id_master');
        if ($id_master == '') {
			$data = $this->db4->get('manifest_masterentry')->result();            
        } else {
            $this->db4->where('id_master', $id_master);
            $data = $this->db4->get('manifest_masterentry')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$id_master = $this->put('id_master');
        $data = array(	
					'nomor_aju'			=> $this->put('nomor_aju'),
					'kd_kelompok_pos'	=> $this->put('kd_kelompok_pos'),
					'no_master_bl'		=> $this->put('no_master_bl'),
					'tgl_master_bl'		=> $this->put('tgl_master_bl'),
					'jml_host_bl_awb'	=> $this->put('jml_host_bl_awb'),
					'status_detail'		=> $this->put('status_detail'),
					'respon'			=> $this->put('respon'),
					'type_manifest'		=> $this->put('type_manifest'),
					'token'				=> $this->put('token'),
					'id_master' 		=> $this->put('id_master')
					);
					
		$this->db4->where('id_master', $id_master);
        $update = $this->db4->update('manifest_masterentry', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'id_master' 		=> $this->post('id_master'),
					'nomor_aju'			=> $this->post('nomor_aju'),
					'kd_kelompok_pos'	=> $this->post('kd_kelompok_pos'),
					'no_master_bl'		=> $this->post('no_master_bl'),
					'tgl_master_bl'		=> $this->post('tgl_master_bl'),
					'jml_host_bl_awb'	=> $this->post('jml_host_bl_awb'),
					'status_detail'		=> $this->post('status_detail'),
					'respon'			=> $this->post('respon'),
					'type_manifest'		=> $this->post('type_manifest'),
					'token'				=> $this->post('token')
					);
					
		 $insert = $this->db4->insert('manifest_masterentry', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}