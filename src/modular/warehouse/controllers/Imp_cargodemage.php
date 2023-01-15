<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Imp_cargodemage extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('_id');
        if ($_id == '') {
			$data = $this->db->get('imp_cargodemage')->result();            
        } else {
            $this->db->where('_id', $_id);
            $data = $this->db->get('imp_cargodemage')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$_id = $this->put('_id');
        $data = array(	
					'MasterAWB'							=> $this->put('MasterAWB'),
					'AirlinesCode'						=> $this->put('AirlinesCode'),
					'Destination'						=> $this->put('Destination'),
					'FlightNumber'						=> $this->put('FlightNumber'),
					'TotalPieces'						=> $this->put('TotalPieces'),
					'ActualWeight'						=> $this->put('ActualWeight'),
					'DateOfIssue'						=> $this->put('DateOfIssue'),
					'TimeOfIssue'						=> $this->put('TimeOfIssue'),
					'OptInsurance'						=> $this->put('OptInsurance'),
					'OptImformed'						=> $this->put('OptImformed'),
					'OptcontentChecked'					=> $this->put('OptcontentChecked'),
					'WhomChecked'						=> $this->put('WhomChecked'),
					'SpecialMarking'					=> $this->put('SpecialMarking'),
					'CleanReceipt'						=> $this->put('CleanReceipt'),
					'Recoverage_Destroyed'				=> $this->put('Recoverage_Destroyed'),
					'Recoverage_LockOf'					=> $this->put('Recoverage_LockOf'),
					'Recoverage_Container'				=> $this->put('Recoverage_Container'),
					'Recoverage_Wrapping'				=> $this->put('Recoverage_Wrapping'),
					'Recoverage_OuterPacking'			=> $this->put('Recoverage_OuterPacking'),
					'Recoverage_Strapped'				=> $this->put('Recoverage_Strapped'),
					'Recoverage_Corded'					=> $this->put('Recoverage_Corded'),
					'Recoverage_Taped'					=> $this->put('Recoverage_Taped'),
					'Recoverage_Sealed'					=> $this->put('Recoverage_Sealed'),
					'Contens_Broken'					=> $this->put('Contens_Broken'),
					'Contens_Dead'						=> $this->put('Contens_Dead'),
					'Contens_Decayed'					=> $this->put('Contens_Decayed'),
					'Contens_Frozen'					=> $this->put('Contens_Frozen'),
					'Contens_Leaking'					=> $this->put('Contens_Leaking'),
					'Contens_Sick'						=> $this->put('Contens_Sick'),
					'Contens_Ratting'					=> $this->put('Contens_Ratting'),
					'Contens_Overheated'				=> $this->put('Contens_Overheated'),
					'Contens_Soiled'					=> $this->put('Contens_Soiled'),
					'Contens_Squashed'					=> $this->put('Contens_Squashed'),
					'Contens_Wilted'					=> $this->put('Contens_Wilted'),
					'Contens_Others'					=> $this->put('Contens_Others'),
					'Contens_OthersChar'				=> $this->put('Contens_OthersChar'),
					'InnerPacking_Cotton'				=> $this->put('InnerPacking_Cotton'),
					'InnerPacking_NewsPaper'			=> $this->put('InnerPacking_NewsPaper'),
					'InnerPacking_Padding'				=> $this->put('InnerPacking_Padding'),
					'InnerPacking_Ripped'				=> $this->put('InnerPacking_Ripped'),
					'InnerPacking_Sawdust'				=> $this->put('InnerPacking_Sawdust'),
					'InnerPacking_TissuePaper'			=> $this->put('InnerPacking_TissuePaper'),
					'InnerPacking_WoodBlocking'			=> $this->put('InnerPacking_WoodBlocking'),
					'InnerPacking_WoodShaving'			=> $this->put('InnerPacking_WoodShaving'),
					'InnerPacking_Others'				=> $this->put('InnerPacking_Others'),
					'InnerPacking_OthersChar'			=> $this->put('InnerPacking_OthersChar'),
					'Discovered_InAircraft'				=> $this->put('Discovered_InAircraft'),
					'Discovered_InAircraftChar'			=> $this->put('Discovered_InAircraftChar'),
					'Discovered_Loading'				=> $this->put('Discovered_Loading'),
					'Discovered_UnLoading'				=> $this->put('Discovered_UnLoading'),
					'Discovered_Transporting'			=> $this->put('Discovered_Transporting'),
					'Discovered_InWarehouse'			=> $this->put('Discovered_InWarehouse'),
					'Discovered_InWarehouseChar'		=> $this->put('Discovered_InWarehouseChar'),
					'Packing_Broken'					=> $this->put('Packing_Broken'),
					'Packing_Corroded'					=> $this->put('Packing_Corroded'),
					'Packing_Crushed'					=> $this->put('Packing_Crushed'),
					'Packing_HoleIn'					=> $this->put('Packing_HoleIn'),
					'Packing_Ripped'					=> $this->put('Packing_Ripped'),
					'Packing_Seams'						=> $this->put('Packing_Seams'),
					'Packing_TapeTorn'					=> $this->put('Packing_TapeTorn'),
					'Packing_TapeLoose'					=> $this->put('Packing_TapeLoose'),
					'Packing_Torn'						=> $this->put('Packing_Torn'),
					'Packing_Wet'						=> $this->put('Packing_Wet'),
					'Packing_Others'					=> $this->put('Packing_Others'),
					'Packing_OthersChar'				=> $this->put('Packing_OthersChar'),
					'DemageDueTo_Handling'				=> $this->put('DemageDueTo_Handling'),
					'DemageDueTo_Improper'				=> $this->put('DemageDueTo_Improper'),
					'DemageDueTo_Inadequate'			=> $this->put('DemageDueTo_Inadequate'),
					'DemageDueTo_TooLong'				=> $this->put('DemageDueTo_TooLong'),
					'DemageDueTo_Stowage'				=> $this->put('DemageDueTo_Stowage'),
					'DemageDueTo_Pilferage'				=> $this->put('DemageDueTo_Pilferage'),
					'DemageDueTo_Others'				=> $this->put('DemageDueTo_Others'),
					'DamageDueTo_OthersChar'			=> $this->put('DamageDueTo_OthersChar'),
					'EmployeeNumber'					=> $this->put('EmployeeNumber'),
					'DateOfEntry'						=> $this->put('DateOfEntry'),
					'TimeOfEntry'						=> $this->put('TimeOfEntry'),
					'token'								=> $this->put('token'),
					'_id'								=> $this->put('_id')
					);
		$this->db->where('_id', $_id);
        $update = $this->db->update('imp_cargodemage', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'MasterAWB'							=> $this->post('MasterAWB'),
					'AirlinesCode'						=> $this->post('AirlinesCode'),
					'Destination'						=> $this->post('Destination'),
					'FlightNumber'						=> $this->post('FlightNumber'),
					'TotalPieces'						=> $this->post('TotalPieces'),
					'ActualWeight'						=> $this->post('ActualWeight'),
					'DateOfIssue'						=> $this->post('DateOfIssue'),
					'TimeOfIssue'						=> $this->post('TimeOfIssue'),
					'OptInsurance'						=> $this->post('OptInsurance'),
					'OptImformed'						=> $this->post('OptImformed'),
					'OptcontentChecked'					=> $this->post('OptcontentChecked'),
					'WhomChecked'						=> $this->post('WhomChecked'),
					'SpecialMarking'					=> $this->post('SpecialMarking'),
					'CleanReceipt'						=> $this->post('CleanReceipt'),
					'Recoverage_Destroyed'				=> $this->post('Recoverage_Destroyed'),
					'Recoverage_LockOf'					=> $this->post('Recoverage_LockOf'),
					'Recoverage_Container'				=> $this->post('Recoverage_Container'),
					'Recoverage_Wrapping'				=> $this->post('Recoverage_Wrapping'),
					'Recoverage_OuterPacking'			=> $this->post('Recoverage_OuterPacking'),
					'Recoverage_Strapped'				=> $this->post('Recoverage_Strapped'),
					'Recoverage_Corded'					=> $this->post('Recoverage_Corded'),
					'Recoverage_Taped'					=> $this->post('Recoverage_Taped'),
					'Recoverage_Sealed'					=> $this->post('Recoverage_Sealed'),
					'Contens_Broken'					=> $this->post('Contens_Broken'),
					'Contens_Dead'						=> $this->post('Contens_Dead'),
					'Contens_Decayed'					=> $this->post('Contens_Decayed'),
					'Contens_Frozen'					=> $this->post('Contens_Frozen'),
					'Contens_Leaking'					=> $this->post('Contens_Leaking'),
					'Contens_Sick'						=> $this->post('Contens_Sick'),
					'Contens_Ratting'					=> $this->post('Contens_Ratting'),
					'Contens_Overheated'				=> $this->post('Contens_Overheated'),
					'Contens_Soiled'					=> $this->post('Contens_Soiled'),
					'Contens_Squashed'					=> $this->post('Contens_Squashed'),
					'Contens_Wilted'					=> $this->post('Contens_Wilted'),
					'Contens_Others'					=> $this->post('Contens_Others'),
					'Contens_OthersChar'				=> $this->post('Contens_OthersChar'),
					'InnerPacking_Cotton'				=> $this->post('InnerPacking_Cotton'),
					'InnerPacking_NewsPaper'			=> $this->post('InnerPacking_NewsPaper'),
					'InnerPacking_Padding'				=> $this->post('InnerPacking_Padding'),
					'InnerPacking_Ripped'				=> $this->post('InnerPacking_Ripped'),
					'InnerPacking_Sawdust'				=> $this->post('InnerPacking_Sawdust'),
					'InnerPacking_TissuePaper'			=> $this->post('InnerPacking_TissuePaper'),
					'InnerPacking_WoodBlocking'			=> $this->post('InnerPacking_WoodBlocking'),
					'InnerPacking_WoodShaving'			=> $this->post('InnerPacking_WoodShaving'),
					'InnerPacking_Others'				=> $this->post('InnerPacking_Others'),
					'InnerPacking_OthersChar'			=> $this->post('InnerPacking_OthersChar'),
					'Discovered_InAircraft'				=> $this->post('Discovered_InAircraft'),
					'Discovered_InAircraftChar'			=> $this->post('Discovered_InAircraftChar'),
					'Discovered_Loading'				=> $this->post('Discovered_Loading'),
					'Discovered_UnLoading'				=> $this->post('Discovered_UnLoading'),
					'Discovered_Transporting'			=> $this->post('Discovered_Transporting'),
					'Discovered_InWarehouse'			=> $this->post('Discovered_InWarehouse'),
					'Discovered_InWarehouseChar'		=> $this->post('Discovered_InWarehouseChar'),
					'Packing_Broken'					=> $this->post('Packing_Broken'),
					'Packing_Corroded'					=> $this->post('Packing_Corroded'),
					'Packing_Crushed'					=> $this->post('Packing_Crushed'),
					'Packing_HoleIn'					=> $this->post('Packing_HoleIn'),
					'Packing_Ripped'					=> $this->post('Packing_Ripped'),
					'Packing_Seams'						=> $this->post('Packing_Seams'),
					'Packing_TapeTorn'					=> $this->post('Packing_TapeTorn'),
					'Packing_TapeLoose'					=> $this->post('Packing_TapeLoose'),
					'Packing_Torn'						=> $this->post('Packing_Torn'),
					'Packing_Wet'						=> $this->post('Packing_Wet'),
					'Packing_Others'					=> $this->post('Packing_Others'),
					'Packing_OthersChar'				=> $this->post('Packing_OthersChar'),
					'DemageDueTo_Handling'				=> $this->post('DemageDueTo_Handling'),
					'DemageDueTo_Improper'				=> $this->post('DemageDueTo_Improper'),
					'DemageDueTo_Inadequate'			=> $this->post('DemageDueTo_Inadequate'),
					'DemageDueTo_TooLong'				=> $this->post('DemageDueTo_TooLong'),
					'DemageDueTo_Stowage'				=> $this->post('DemageDueTo_Stowage'),
					'DemageDueTo_Pilferage'				=> $this->post('DemageDueTo_Pilferage'),
					'DemageDueTo_Others'				=> $this->post('DemageDueTo_Others'),
					'DamageDueTo_OthersChar'			=> $this->post('DamageDueTo_OthersChar'),
					'EmployeeNumber'					=> $this->post('EmployeeNumber'),
					'DateOfEntry'						=> $this->post('DateOfEntry'),
					'TimeOfEntry'						=> $this->post('TimeOfEntry'),
					'token'								=> $this->post('token'),
					);
					
		 $insert = $this->db->insert('imp_cargodemage', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}