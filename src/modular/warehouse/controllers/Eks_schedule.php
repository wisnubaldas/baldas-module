<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Eks_schedule extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('noid');
        if ($noid == '') {
			$data = $this->db->get('eks_schedule')->result();            
        } else {
            $this->db->where('noid', $noid);
            $data = $this->db->get('eks_schedule')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$noid = $this->put('noid');
        $data = array(	
					'AirlinesCode'		=> $this->put('AirlinesCode'),
					'Flight'			=> $this->put('Flight'),
					'Route'				=> $this->put('Route'),
					'TimeDeparture'		=> $this->put('TimeDeparture'),
					'Capacity'			=> $this->put('Capacity'),
					'SundayB'			=> $this->put('SundayB'),
					'mondayB'			=> $this->put('mondayB'),
					'TuesdayB'			=> $this->put('TuesdayB'),
					'WednesdayB'		=> $this->put('WednesdayB'),
					'ThursdayB'			=> $this->put('ThursdayB'),
					'FridayB'			=> $this->put('FridayB'),
					'SaturdayB'			=> $this->put('SaturdayB'),
					'Active'			=> $this->put('Active'),
					'token'				=> $this->put('token'),
					'noid'				=> $this->put('noid')
					);
		$this->db->where('noid', $noid);
        $update = $this->db->update('eks_schedule', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'AirlinesCode'		=> $this->put('AirlinesCode'),
					'Flight'			=> $this->put('Flight'),
					'Route'				=> $this->put('Route'),
					'TimeDeparture'		=> $this->put('TimeDeparture'),
					'Capacity'			=> $this->put('Capacity'),
					'SundayB'			=> $this->put('SundayB'),
					'mondayB'			=> $this->put('mondayB'),
					'TuesdayB'			=> $this->put('TuesdayB'),
					'WednesdayB'		=> $this->put('WednesdayB'),
					'ThursdayB'			=> $this->put('ThursdayB'),
					'FridayB'			=> $this->put('FridayB'),
					'SaturdayB'			=> $this->put('SaturdayB'),
					'Active'			=> $this->put('Active'),
					'token'				=> $this->post('token')
					);
					
		 $insert = $this->db->insert('eks_schedule', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}