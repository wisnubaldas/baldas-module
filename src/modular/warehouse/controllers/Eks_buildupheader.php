<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Eks_buildupheader extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $BuildupNumber = $this->get('BuildupNumber');
        if ($BuildupNumber == '') {
			$data = $this->db->get('eks_buildupheader')->result();            
        } else {
            $this->db->where('BuildupNumber', $BuildupNumber);
            $data = $this->db->get('eks_buildupheader')->result();
        }
        $this->response($data, 200);
    }

	function index_put() {
		$BuildupNumber = $this->put('BuildupNumber');
        $data = array(						
					'AirlinesCode'				=> $this->put('AirlinesCode'),
					'FlightNumber'				=> $this->put('FlightNumber'),
					'DestinationCode'			=> $this->put('DestinationCode'),
					'DateOfFlight'				=> $this->put('DateOfFlight'),
					'AircraftRegistration'		=> $this->put('AircraftRegistration'),
					'EstimateTimeDeparture'		=> $this->put('EstimateTimeDeparture'),
					'TimeDeparture'				=> $this->put('TimeDeparture'),
					'TotalMasterAWB'			=> $this->put('TotalMasterAWB'),
					'PartOfPieces'				=> $this->put('PartOfPieces'),
					'TotalPieces'				=> $this->put('TotalPieces'),
					'PartOfNetto'				=> $this->put('PartOfNetto'),
					'TotalNetto'				=> $this->put('TotalNetto'),
					'TotalVolume'				=> $this->put('TotalVolume'),
					'EmployeeNumber'			=> $this->put('EmployeeNumber'),
					'OperatorName'				=> $this->put('OperatorName'),
					'DateEntry'					=> $this->put('DateEntry'),					
					'TimeEntry'					=> $this->put('TimeEntry'),
					'token'						=> $this->put('token'),
					'BuildupNumber'				=> $this->put('BuildupNumber')
					);
		$this->db->where('BuildupNumber', $BuildupNumber);
        $update = $this->db->update('eks_buildupheader', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'BuildupNumber'				=> $this->post('BuildupNumber'),
					'AirlinesCode'				=> $this->post('AirlinesCode'),
					'FlightNumber'				=> $this->post('FlightNumber'),
					'DestinationCode'			=> $this->post('DestinationCode'),
					'DateOfFlight'				=> $this->post('DateOfFlight'),
					'AircraftRegistration'		=> $this->post('AircraftRegistration'),
					'EstimateTimeDeparture'		=> $this->post('EstimateTimeDeparture'),
					'TimeDeparture'				=> $this->post('TimeDeparture'),
					'TotalMasterAWB'			=> $this->post('TotalMasterAWB'),
					'PartOfPieces'				=> $this->post('PartOfPieces'),
					'TotalPieces'				=> $this->post('TotalPieces'),
					'PartOfNetto'				=> $this->post('PartOfNetto'),
					'TotalNetto'				=> $this->post('TotalNetto'),
					'TotalVolume'				=> $this->post('TotalVolume'),
					'EmployeeNumber'			=> $this->post('EmployeeNumber'),
					'OperatorName'				=> $this->post('OperatorName'),
					'DateEntry'					=> $this->post('DateEntry'),					
					'TimeEntry'					=> $this->post('TimeEntry'),
					'token'						=> $this->post('token')
					);
					
		 $insert = $this->db->insert('eks_buildupheader', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}