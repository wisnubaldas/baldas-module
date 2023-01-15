<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Xinventory_masterwaybill extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('xinventory_masterwaybill')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('xinventory_masterwaybill')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->PUT('noid');
        $data = array(				
					'MasterAWB'			=> $this->PUT('MasterAWB'),
					'Pieces'			=> $this->PUT('Pieces'),
					'Weight'			=> $this->PUT('Weight'),
					'Volume'			=> $this->PUT('Volume'),
					'AirlinesCode'		=> $this->PUT('AirlinesCode'),
					'FlightNo'			=> $this->PUT('FlightNo'),
					'Origin'			=> $this->PUT('Origin'),
					'Destination'		=> $this->PUT('Destination'),
					'DateOfFight'		=> $this->PUT('DateOfFight'),
					'KindOfGood'		=> $this->PUT('KindOfGood'),
					'KindOfCode'		=> $this->PUT('KindOfCode'),
					'HSCode'			=> $this->PUT('HSCode'),
					'AgenCode'			=> $this->PUT('AgenCode'),
					'ShipperCode'		=> $this->PUT('ShipperCode'),
					'ConsigneeCode'		=> $this->PUT('ConsigneeCode'),
					'bc11'				=> $this->PUT('bc11'),
					'tglbc11'			=> $this->PUT('tglbc11'),
					'nopos'				=> $this->PUT('nopos'),
					'PLP'				=> $this->PUT('PLP'),
					'tglPLP'			=> $this->PUT('tglPLP'),
					'Multihost'			=> $this->PUT('Multihost'),
					'Parsial'			=> $this->PUT('Parsial'),
					'DateOfOut'			=> $this->PUT('DateOfOut'),
					'TimeOut'			=> $this->PUT('TimeOut'),
					'DateOfIn'			=> $this->PUT('DateOfIn'),
					'TimeIn'			=> $this->PUT('TimeIn'),
					'noid'				=> $this->PUT('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('xinventory_masterwaybill', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(							
					'MasterAWB'			=> $this->POST('MasterAWB'),
					'Pieces'			=> $this->POST('Pieces'),
					'Weight'			=> $this->POST('Weight'),
					'Volume'			=> $this->POST('Volume'),
					'AirlinesCode'		=> $this->POST('AirlinesCode'),
					'FlightNo'			=> $this->POST('FlightNo'),
					'Origin'			=> $this->POST('Origin'),
					'Destination'		=> $this->POST('Destination'),
					'DateOfFight'		=> $this->POST('DateOfFight'),
					'KindOfGood'		=> $this->POST('KindOfGood'),
					'KindOfCode'		=> $this->POST('KindOfCode'),
					'HSCode'			=> $this->POST('HSCode'),
					'AgenCode'			=> $this->POST('AgenCode'),
					'ShipperCode'		=> $this->POST('ShipperCode'),
					'ConsigneeCode'		=> $this->POST('ConsigneeCode'),
					'bc11'				=> $this->POST('bc11'),
					'tglbc11'			=> $this->POST('tglbc11'),
					'nopos'				=> $this->POST('nopos'),
					'PLP'				=> $this->POST('PLP'),
					'tglPLP'			=> $this->POST('tglPLP'),
					'Multihost'			=> $this->POST('Multihost'),
					'Parsial'			=> $this->POST('Parsial'),
					'DateOfOut'			=> $this->POST('DateOfOut'),
					'TimeOut'			=> $this->POST('TimeOut'),
					'DateOfIn'			=> $this->POST('DateOfIn'),
					'TimeIn'			=> $this->POST('TimeIn')
					);
					
		 $insert = $this->db->insert('xinventory_masterwaybill', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}
