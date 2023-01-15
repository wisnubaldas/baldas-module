<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Out_buildupheader extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $BuildupNumber = $this->get('BuildupNumber');
        if ($BuildupNumber == '') {
			$data = $this->db->get('out_buildupheader')->result();            
        } else {
            $this->db->where('BuildupNumber', $BuildupNumber);
            $data = $this->db->get('out_buildupheader')->result();
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
					'Edit'						=> $this->put('Edit'),
					'token'						=> $this->put('token'),
					'BuildupNumber'				=> $this->put('BuildupNumber')
					);
		$this->db->where('BuildupNumber', $BuildupNumber);
        $update = $this->db->update('out_buildupheader', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'BuildupNumber'				=> $this->put('BuildupNumber'),
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
					'Edit'						=> $this->put('Edit'),
					'token'						=> $this->put('token')
					);
					
		 $insert = $this->db->insert('out_buildupheader', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}