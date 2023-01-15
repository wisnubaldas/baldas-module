<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Manifest_modul_dokumen extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db4 = $this->load->database('db_tpsonline', TRUE);
	}
	
	function index_get() {
        $id_dokumen = $this->get('id_dokumen');
        if ($id_dokumen == '') {
			$data = $this->db4->get('manifest_dokumen')->result();            
        } else {
            $this->db4->where('id_dokumen', $id_dokumen);
            $data = $this->db4->get('manifest_dokumen')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$id_dokumen = $this->put('id_dokumen');
        $data = array(	
					'id_detail'			=> $this->put('id_detail'),
					'kode_dokumen'		=> $this->put('kode_dokumen'),
					'nomor_dokumen'		=> $this->put('nomor_dokumen'),
					'tgl_dokumen'		=> $this->put('tgl_dokumen'),
					'kd_kantor'			=> $this->put('kd_kantor'),
					'token'				=> $this->put('token'),
					'id_dokumen' 		=> $this->put('id_dokumen')
					);
					
		$this->db4->where('id_dokumen', $id_dokumen);
        $update = $this->db4->update('manifest_dokumen', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'id_dokumen' 		=> $this->post('id_dokumen'),
					'id_detail'			=> $this->post('id_detail'),
					'kode_dokumen'		=> $this->post('kode_dokumen'),
					'nomor_dokumen'		=> $this->post('nomor_dokumen'),
					'tgl_dokumen'		=> $this->post('tgl_dokumen'),
					'kd_kantor'			=> $this->post('kd_kantor'),
					'token'				=> $this->post('token')
					);
					
		 $insert = $this->db4->insert('manifest_dokumen', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}