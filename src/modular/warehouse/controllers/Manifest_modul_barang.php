<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Manifest_modul_barang extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db4 = $this->load->database('db_tpsonline', TRUE);
	}
	
	function index_get() {
        $id_barang = $this->get('id_barang');
        if ($id_barang == '') {
			$data = $this->db4->get('manifest_barang')->result();            
        } else {
            $this->db4->where('id_barang', $id_barang);
            $data = $this->db4->get('manifest_barang')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$id_barang = $this->put('id_barang');
        $data = array(	
					'id_detail'			=> $this->put('id_detail'),
					'seri_barang'		=> $this->put('seri_barang'),
					'hs_code'			=> $this->put('hs_code'),
					'uraian_barang'		=> $this->put('uraian_barang'),
					'token'				=> $this->put('token'),
					'id_barang' 		=> $this->put('id_barang')
					);
					
		$this->db4->where('id_barang', $id_barang);
        $update = $this->db4->update('manifest_barang', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'id_barang' 		=> $this->post('id_barang'),
					'id_detail'			=> $this->post('id_detail'),
					'seri_barang'		=> $this->post('seri_barang'),
					'hs_code'			=> $this->post('hs_code'),
					'uraian_barang'		=> $this->post('uraian_barang'),
					'token'				=> $this->post('token')
					);
					
		 $insert = $this->db4->insert('manifest_barang', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}