<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Mst_arrival extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('mst_arrival')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('mst_arrival')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'TimeArrival'		=> $this->put('TimeArrival'),
					'ActualTimeArrival'	=> $this->put('ActualTimeArrival'),
					'Arrival'			=> $this->put('Arrival'),
					'AirlinesCode'		=> $this->put('AirlinesCode'),
					'FlightNo'			=> $this->put('FlightNo'),
					'AcType'			=> $this->put('AcType'),
					'PayLoad'			=> $this->put('PayLoad'),
					'Terminal'			=> $this->put('Terminal'),
					'Remarks'			=> $this->put('Remarks'),
					'DateOfArrival'		=> $this->put('DateOfArrival'),
					'DateOfEntry'		=> $this->put('DateOfEntry'),
					'noid'				=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('mst_arrival', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'TimeArrival'		=> $this->post('TimeArrival'),
					'ActualTimeArrival'	=> $this->post('ActualTimeArrival'),
					'Arrival'			=> $this->post('Arrival'),
					'AirlinesCode'		=> $this->post('AirlinesCode'),
					'FlightNo'			=> $this->post('FlightNo'),
					'AcType'			=> $this->post('AcType'),
					'PayLoad'			=> $this->post('PayLoad'),
					'Terminal'			=> $this->post('Terminal'),
					'Remarks'			=> $this->post('Remarks'),
					'DateOfArrival'		=> $this->post('DateOfArrival'),
					'DateOfEntry'		=> $this->post('DateOfEntry')
					);
					
		 $insert = $this->db->insert('mst_arrival', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}