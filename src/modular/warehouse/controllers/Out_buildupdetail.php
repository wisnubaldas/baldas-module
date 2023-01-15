<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Out_buildupdetail extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('out_buildupdetail')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('out_buildupdetail')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'BuildUpNumber'		=> $this->put('BuildUpNumber'),
					'MasterAWB'			=> $this->put('MasterAWB'),
					'Parsial'			=> $this->put('Parsial'),
					'TransitCode'		=> $this->put('TransitCode'),
					'PartPieces'		=> $this->put('PartPieces'),
					'Pieces'			=> $this->put('Pieces'),
					'PartNetto'			=> $this->put('PartNetto'),
					'Netto'				=> $this->put('Netto'),
					'Volume'			=> $this->put('Volume'),
					'UldCardNumber'		=> $this->put('UldCardNumber'),
					'KindOfGood'		=> $this->put('KindOfGood'),
					'EmployeeNumber'	=> $this->put('EmployeeNumber'),
					'AgenCode'			=> $this->put('AgenCode'),
					'condition'			=> $this->put('condition'),
					'OverLoadCode'		=> $this->put('OverLoadCode'),
					'DONumber'			=> $this->put('DONumber'),
					'Remarks'			=> $this->put('Remarks'),
					'OfficialUse'		=> $this->put('OfficialUse'),
					'PrintNumber'		=> $this->put('PrintNumber'),
					'Edit'				=> $this->put('Edit'),
					'token'				=> $this->put('token'),
					'noid'				=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('out_buildupdetail', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'BuildUpNumber'		=> $this->post('BuildUpNumber'),
					'MasterAWB'			=> $this->post('MasterAWB'),
					'Parsial'			=> $this->post('Parsial'),
					'TransitCode'		=> $this->post('TransitCode'),
					'PartPieces'		=> $this->post('PartPieces'),
					'Pieces'			=> $this->post('Pieces'),
					'PartNetto'			=> $this->post('PartNetto'),
					'Netto'				=> $this->post('Netto'),
					'Volume'			=> $this->post('Volume'),
					'UldCardNumber'		=> $this->post('UldCardNumber'),
					'KindOfGood'		=> $this->post('KindOfGood'),
					'EmployeeNumber'	=> $this->post('EmployeeNumber'),
					'AgenCode'			=> $this->post('AgenCode'),
					'condition'			=> $this->post('condition'),
					'OverLoadCode'		=> $this->post('OverLoadCode'),
					'DONumber'			=> $this->post('DONumber'),
					'Remarks'			=> $this->post('Remarks'),
					'OfficialUse'		=> $this->post('OfficialUse'),
					'PrintNumber'		=> $this->post('PrintNumber'),
					'Edit'				=> $this->post('Edit'),
					'token'				=> $this->post('token')
					);
					
		 $insert = $this->db->insert('out_buildupdetail', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}