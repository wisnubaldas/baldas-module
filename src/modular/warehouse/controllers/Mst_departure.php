<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Mst_departure extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('mst_departure')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('mst_departure')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'TimeDeparture'			=> $this->put('TimeDeparture'),
					'ActualTimeDeparture'	=> $this->put('ActualTimeDeparture'),
					'Departure'				=> $this->put('Departure'),
					'AirlinesCode'			=> $this->put('AirlinesCode'),
					'FlightNo'				=> $this->put('FlightNo'),
					'ACType'				=> $this->put('ACType'),
					'PayLoad'				=> $this->put('PayLoad'),
					'CargoLoad'				=> $this->put('CargoLoad'),
					'Terminal'				=> $this->put('Terminal'),
					'Remarks'				=> $this->put('Remarks'),
					'DateOfDeparture'		=> $this->put('DateOfDeparture'),
					'DateOfEntry'			=> $this->put('DateOfEntry'),
					'noid'					=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('mst_departure', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'TimeDeparture'			=> $this->post('TimeDeparture'),
					'ActualTimeDeparture'	=> $this->post('ActualTimeDeparture'),
					'Departure'				=> $this->post('Departure'),
					'AirlinesCode'			=> $this->post('AirlinesCode'),
					'FlightNo'				=> $this->post('FlightNo'),
					'ACType'				=> $this->post('ACType'),
					'PayLoad'				=> $this->post('PayLoad'),
					'CargoLoad'				=> $this->post('CargoLoad'),
					'Terminal'				=> $this->post('Terminal'),
					'Remarks'				=> $this->post('Remarks'),
					'DateOfDeparture'		=> $this->post('DateOfDeparture'),
					'DateOfEntry'			=> $this->post('DateOfEntry')
					);
					
		 $insert = $this->db->insert('mst_departure', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}