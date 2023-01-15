<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Manifest_modul_respon extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db4 = $this->load->database('db_tpsonline', TRUE);
	}
	
	function index_get() {
        $id_respon = $this->get('id_respon');
        if ($id_respon == '') {
			$data = $this->db4->get('manifest_respon')->result();            
        } else {
            $this->db4->where('id_respon', $id_respon);
            $data = $this->db4->get('manifest_respon')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$id_respon = $this->put('id_respon');
        $data = array(	
					'nomor_aju'				=> $this->put('nomor_aju'),
					'kd_respon'				=> $this->put('kd_respon'),
					'tgl_respon'			=> $this->put('tgl_respon'),
					'waktu_respon'			=> $this->put('waktu_respon'),
					'nomor_doc_respon'		=> $this->put('nomor_doc_respon'),
					'tgl_doc_respon'		=> $this->put('tgl_doc_respon'),
					'kode_kantor'			=> $this->put('kode_kantor'),
					'pdf'					=> $this->put('pdf'),
					'token'					=> $this->put('token'),
					'id_respon' 			=> $this->put('id_respon')
					);
					
		$this->db4->where('id_respon', $id_respon);
        $update = $this->db4->update('manifest_respon', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'id_respon' 			=> $this->post('id_respon'),
					'nomor_aju'				=> $this->post('nomor_aju'),
					'kd_respon'				=> $this->post('kd_respon'),
					'tgl_respon'			=> $this->post('tgl_respon'),
					'waktu_respon'			=> $this->post('waktu_respon'),
					'nomor_doc_respon'		=> $this->post('nomor_doc_respon'),
					'tgl_doc_respon'		=> $this->post('tgl_doc_respon'),
					'kode_kantor'			=> $this->post('kode_kantor'),
					'pdf'					=> $this->post('pdf'),
					'token'					=> $this->post('token'),
					);
					
		 $insert = $this->db4->insert('manifest_respon', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}