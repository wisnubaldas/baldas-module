<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Tps_bc20_sppb extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db4 = $this->load->database('db_tpsonline', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db4->get('getbc20_sppb')->result();            
        } else {
            $this->db4->where('noid', $noid);
            $data = $this->db4->get('getbc20_sppb')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'CAR'					=> $this->put('CAR'),
					'NO_SPPB'				=> $this->put('NO_SPPB'),
					'TGL_SPPB'				=> $this->put('TGL_SPPB'),
					'KD_KPBC'				=> $this->put('KD_KPBC'),
					'NO_PIB'				=> $this->put('NO_PIB'),
					'TGL_PIB'				=> $this->put('TGL_PIB'),
					'NPWP_IMP'				=> $this->put('NPWP_IMP'),
					'ALAMAT_IMP'			=> $this->put('ALAMAT_IMP'),
					'NPWP_PPJK'				=> $this->put('NPWP_PPJK'),
					'ALAMAT_PPJK'   		=> $this->put('ALAMAT_PPJK'),
					'NM_ANGKUT'				=> $this->put('NM_ANGKUT'),
					'NO_VOY_FLIGHT'			=> $this->put('NO_VOY_FLIGHT'),
					'BRUTO'					=> $this->put('BRUTO'),
					'NETTO'					=> $this->put('NETTO'),
					'GUDANG'				=> $this->put('GUDANG'),
					'STATUS_JALUR'			=> $this->put('STATUS_JALUR'),
					'JML_CONT'				=> $this->put('JML_CONT'),
					'NO_BC11'				=> $this->put('NO_BC11'),
					'TGL_BC11'				=> $this->put('TGL_BC11'),
					'NO_POS_BC11'			=> $this->put('NO_POS_BC11'),
					'NO_BL_AWB'				=> $this->put('NO_BL_AWB'),
					'TGL_BL_AWB'			=> $this->put('TGL_BL_AWB'),
					'NO_MASTER_BL_AWB' 		=> $this->put('NO_MASTER_BL_AWB'),
					'TGL_MASTER_BL_AWB'		=> $this->put('TGL_MASTER_BL_AWB'),
					'noid'					=> $this->put('noid')
					);
		$this->db4->where('noid', $noid);
        $update = $this->db4->update('getbc20_sppb', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'CAR'					=> $this->post('CAR'),
					'NO_SPPB'				=> $this->post('NO_SPPB'),
					'TGL_SPPB'				=> $this->post('TGL_SPPB'),
					'KD_KPBC'				=> $this->post('KD_KPBC'),
					'NO_PIB'				=> $this->post('NO_PIB'),
					'TGL_PIB'				=> $this->post('TGL_PIB'),
					'NPWP_IMP'				=> $this->post('NPWP_IMP'),
					'ALAMAT_IMP'			=> $this->post('ALAMAT_IMP'),
					'NPWP_PPJK'				=> $this->post('NPWP_PPJK'),
					'ALAMAT_PPJK'   		=> $this->post('ALAMAT_PPJK'),
					'NM_ANGKUT'				=> $this->post('NM_ANGKUT'),
					'NO_VOY_FLIGHT'			=> $this->post('NO_VOY_FLIGHT'),
					'BRUTO'					=> $this->post('BRUTO'),
					'NETTO'					=> $this->post('NETTO'),
					'GUDANG'				=> $this->post('GUDANG'),
					'STATUS_JALUR'			=> $this->post('STATUS_JALUR'),
					'JML_CONT'				=> $this->post('JML_CONT'),
					'NO_BC11'				=> $this->post('NO_BC11'),
					'TGL_BC11'				=> $this->post('TGL_BC11'),
					'NO_POS_BC11'			=> $this->post('NO_POS_BC11'),
					'NO_BL_AWB'				=> $this->post('NO_BL_AWB'),
					'TGL_BL_AWB'			=> $this->post('TGL_BL_AWB'),
					'NO_MASTER_BL_AWB' 		=> $this->post('NO_MASTER_BL_AWB'),
					'TGL_MASTER_BL_AWB'		=> $this->post('TGL_MASTER_BL_AWB')
					);
					
		 $insert = $this->db4->insert('getbc20_sppb', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}