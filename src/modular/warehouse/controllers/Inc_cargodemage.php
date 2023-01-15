<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';

class Inc_cargodemage extends REST_Controller {
	
	function __construct()
	{
		// Construct the parent class
		parent::__construct();
		$this->db = $this->load->database('rdwarehouse_jkt', TRUE);
	}
	
	function index_get() {
        $noid = $this->get('_id');
        if ($_id == '') {
			$data = $this->db->get('inc_cargodemage')->result();            
        } else {
            $this->db->where('_id', $_id);
            $data = $this->db->get('inc_cargodemage')->result();
        }
        $this->response($data, 200);
    }
	
	function index_put() {
		$_id = $this->PUT('_id');
        $data = array(	
					'MasterAWB'						=> $this->PUT('MasterAWB'),
					'AirlinesCode'					=> $this->PUT('AirlinesCode'),
					'Destination'					=> $this->PUT('Destination'),
					'FlightNumber'					=> $this->PUT('FlightNumber'),
					'TotalPieces'					=> $this->PUT('TotalPieces'),
					'ActualWeight'					=> $this->PUT('ActualWeight'),
					'DateOfIssue'					=> $this->PUT('DateOfIssue'),
					'TimeOfIssue'					=> $this->PUT('TimeOfIssue'),
					'OptInsurance'					=> $this->PUT('OptInsurance'),
					'OptImformed'					=> $this->PUT('OptImformed'),
					'OptcontentChecked'				=> $this->PUT('OptcontentChecked'),
					'WhomChecked'					=> $this->PUT('WhomChecked'),
					'SpecialMarking'				=> $this->PUT('SpecialMarking'),
					'CleanReceipt'					=> $this->PUT('CleanReceipt'),
					'remarks'						=> $this->PUT('remarks'),
					'Recoverage_Destroyed'			=> $this->PUT('Recoverage_Destroyed'),
					'Recoverage_LockOf'				=> $this->PUT('Recoverage_LockOf'),
					'Recoverage_Container'			=> $this->PUT('Recoverage_Container'),
					'Recoverage_Wrapping'			=> $this->PUT('Recoverage_Wrapping'),
					'Recoverage_OuterPacking'		=> $this->PUT('Recoverage_OuterPacking'),
					'Recoverage_Strapped'			=> $this->PUT('Recoverage_Strapped'),
					'Recoverage_Corded'				=> $this->PUT('Recoverage_Corded'),
					'Recoverage_Taped'				=> $this->PUT('Recoverage_Taped'),
					'Recoverage_Sealed'				=> $this->PUT('Recoverage_Sealed'),
					'Contens_Broken'				=> $this->PUT('Contens_Broken'),
					'Contens_Dead'					=> $this->PUT('Contens_Dead'),
					'Contens_Decayed'				=> $this->PUT('Contens_Decayed'),
					'Contens_Frozen'				=> $this->PUT('Contens_Frozen'),
					'Contens_Leaking'				=> $this->PUT('Contens_Leaking'),
					'Contens_Sick'					=> $this->PUT('Contens_Sick'),
					'Contens_Ratting'				=> $this->PUT('Contens_Ratting'),
					'Contens_Overheated'			=> $this->PUT('Contens_Overheated'),
					'Contens_Soiled'				=> $this->PUT('Contens_Soiled'),
					'Contens_Squashed'				=> $this->PUT('Contens_Squashed'),
					'Contens_Wilted'				=> $this->PUT('Contens_Wilted'),
					'Contens_Others'				=> $this->PUT('Contens_Others'),
					'Contens_OthersChar'			=> $this->PUT('Contens_OthersChar'),
					'InnerPacking_Cotton'			=> $this->PUT('InnerPacking_Cotton'),
					'InnerPacking_NewsPaper'		=> $this->PUT('InnerPacking_NewsPaper'),
					'InnerPacking_Padding'			=> $this->PUT('InnerPacking_Padding'),
					'InnerPacking_Ripped'			=> $this->PUT('InnerPacking_Ripped'),
					'InnerPacking_Sawdust'			=> $this->PUT('InnerPacking_Sawdust'),
					'InnerPacking_TissuePaper'		=> $this->PUT('InnerPacking_TissuePaper'),
					'InnerPacking_WoodBlocking'		=> $this->PUT('InnerPacking_WoodBlocking'),
					'InnerPacking_WoodShaving'		=> $this->PUT('InnerPacking_WoodShaving'),
					'InnerPacking_Others'			=> $this->PUT('InnerPacking_Others'),
					'InnerPacking_OthersChar'		=> $this->PUT('InnerPacking_OthersChar'),
					'Discovered_InAircraft'			=> $this->PUT('Discovered_InAircraft'),
					'Discovered_InAircraftChar'		=> $this->PUT('Discovered_InAircraftChar'),
					'Discovered_Loading'			=> $this->PUT('Discovered_Loading'),
					'Discovered_UnLoading'			=> $this->PUT('Discovered_UnLoading'),
					'Discovered_Transporting'		=> $this->PUT('Discovered_Transporting'),
					'Discovered_InWarehouse'		=> $this->PUT('Discovered_InWarehouse'),
					'Discovered_InWarehouseChar'	=> $this->PUT('Discovered_InWarehouseChar'),
					'Packing_Broken'				=> $this->PUT('Packing_Broken'),
					'Packing_Corroded'				=> $this->PUT('Packing_Corroded'),
					'Packing_Crushed'				=> $this->PUT('Packing_Crushed'),
					'Packing_HoleIn'				=> $this->PUT('Packing_HoleIn'),
					'Packing_Ripped'				=> $this->PUT('Packing_Ripped'),
					'Packing_Seams'					=> $this->PUT('Packing_Seams'),
					'Packing_TapeTorn'				=> $this->PUT('Packing_TapeTorn'),
					'Packing_TapeLoose'				=> $this->PUT('Packing_TapeLoose'),
					'Packing_Torn'					=> $this->PUT('Packing_Torn'),
					'Packing_Wet'					=> $this->PUT('Packing_Wet'),
					'Packing_Others'				=> $this->PUT('Packing_Others'),
					'Packing_OthersChar'			=> $this->PUT('Packing_OthersChar'),
					'DemageDueTo_Handling'			=> $this->PUT('DemageDueTo_Handling'),
					'DemageDueTo_Improper'			=> $this->PUT('DemageDueTo_Improper'),
					'DemageDueTo_Inadequate'		=> $this->PUT('DemageDueTo_Inadequate'),
					'DemageDueTo_TooLong'			=> $this->PUT('DemageDueTo_TooLong'),
					'DemageDueTo_Stowage'			=> $this->PUT('DemageDueTo_Stowage'),
					'DemageDueTo_Pilferage'			=> $this->PUT('DemageDueTo_Pilferage'),
					'DemageDueTo_Others'			=> $this->PUT('DemageDueTo_Others'),
					'DamageDueTo_OthersChar'		=> $this->PUT('DamageDueTo_OthersChar'),
					'EmployeeNumber'				=> $this->PUT('EmployeeNumber'),
					'DateOfEntry'					=> $this->PUT('DateOfEntry'),
					'TimeOfEntry'					=> $this->PUT('TimeOfEntry'),
					'token'							=> $this->PUT('token'),
					'_id'							=> $this->PUT('_id')
					);
		$this->db->where('_id', $_id);
        $update = $this->db->update('inc_cargodemage', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
	
	function index_post() {		
        $data = array(		
					'MasterAWB'						=> $this->POST('MasterAWB'),
					'AirlinesCode'					=> $this->POST('AirlinesCode'),
					'Destination'					=> $this->POST('Destination'),
					'FlightNumber'					=> $this->POST('FlightNumber'),
					'TotalPieces'					=> $this->POST('TotalPieces'),
					'ActualWeight'					=> $this->POST('ActualWeight'),
					'DateOfIssue'					=> $this->POST('DateOfIssue'),
					'TimeOfIssue'					=> $this->POST('TimeOfIssue'),
					'OptInsurance'					=> $this->POST('OptInsurance'),
					'OptImformed'					=> $this->POST('OptImformed'),
					'OptcontentChecked'				=> $this->POST('OptcontentChecked'),
					'WhomChecked'					=> $this->POST('WhomChecked'),
					'SpecialMarking'				=> $this->POST('SpecialMarking'),
					'CleanReceipt'					=> $this->POST('CleanReceipt'),
					'remarks'						=> $this->POST('remarks'),
					'Recoverage_Destroyed'			=> $this->POST('Recoverage_Destroyed'),
					'Recoverage_LockOf'				=> $this->POST('Recoverage_LockOf'),
					'Recoverage_Container'			=> $this->POST('Recoverage_Container'),
					'Recoverage_Wrapping'			=> $this->POST('Recoverage_Wrapping'),
					'Recoverage_OuterPacking'		=> $this->POST('Recoverage_OuterPacking'),
					'Recoverage_Strapped'			=> $this->POST('Recoverage_Strapped'),
					'Recoverage_Corded'				=> $this->POST('Recoverage_Corded'),
					'Recoverage_Taped'				=> $this->POST('Recoverage_Taped'),
					'Recoverage_Sealed'				=> $this->POST('Recoverage_Sealed'),
					'Contens_Broken'				=> $this->POST('Contens_Broken'),
					'Contens_Dead'					=> $this->POST('Contens_Dead'),
					'Contens_Decayed'				=> $this->POST('Contens_Decayed'),
					'Contens_Frozen'				=> $this->POST('Contens_Frozen'),
					'Contens_Leaking'				=> $this->POST('Contens_Leaking'),
					'Contens_Sick'					=> $this->POST('Contens_Sick'),
					'Contens_Ratting'				=> $this->POST('Contens_Ratting'),
					'Contens_Overheated'			=> $this->POST('Contens_Overheated'),
					'Contens_Soiled'				=> $this->POST('Contens_Soiled'),
					'Contens_Squashed'				=> $this->POST('Contens_Squashed'),
					'Contens_Wilted'				=> $this->POST('Contens_Wilted'),
					'Contens_Others'				=> $this->POST('Contens_Others'),
					'Contens_OthersChar'			=> $this->POST('Contens_OthersChar'),
					'InnerPacking_Cotton'			=> $this->POST('InnerPacking_Cotton'),
					'InnerPacking_NewsPaper'		=> $this->POST('InnerPacking_NewsPaper'),
					'InnerPacking_Padding'			=> $this->POST('InnerPacking_Padding'),
					'InnerPacking_Ripped'			=> $this->POST('InnerPacking_Ripped'),
					'InnerPacking_Sawdust'			=> $this->POST('InnerPacking_Sawdust'),
					'InnerPacking_TissuePaper'		=> $this->POST('InnerPacking_TissuePaper'),
					'InnerPacking_WoodBlocking'		=> $this->POST('InnerPacking_WoodBlocking'),
					'InnerPacking_WoodShaving'		=> $this->POST('InnerPacking_WoodShaving'),
					'InnerPacking_Others'			=> $this->POST('InnerPacking_Others'),
					'InnerPacking_OthersChar'		=> $this->POST('InnerPacking_OthersChar'),
					'Discovered_InAircraft'			=> $this->POST('Discovered_InAircraft'),
					'Discovered_InAircraftChar'		=> $this->POST('Discovered_InAircraftChar'),
					'Discovered_Loading'			=> $this->POST('Discovered_Loading'),
					'Discovered_UnLoading'			=> $this->POST('Discovered_UnLoading'),
					'Discovered_Transporting'		=> $this->POST('Discovered_Transporting'),
					'Discovered_InWarehouse'		=> $this->POST('Discovered_InWarehouse'),
					'Discovered_InWarehouseChar'	=> $this->POST('Discovered_InWarehouseChar'),
					'Packing_Broken'				=> $this->POST('Packing_Broken'),
					'Packing_Corroded'				=> $this->POST('Packing_Corroded'),
					'Packing_Crushed'				=> $this->POST('Packing_Crushed'),
					'Packing_HoleIn'				=> $this->POST('Packing_HoleIn'),
					'Packing_Ripped'				=> $this->POST('Packing_Ripped'),
					'Packing_Seams'					=> $this->POST('Packing_Seams'),
					'Packing_TapeTorn'				=> $this->POST('Packing_TapeTorn'),
					'Packing_TapeLoose'				=> $this->POST('Packing_TapeLoose'),
					'Packing_Torn'					=> $this->POST('Packing_Torn'),
					'Packing_Wet'					=> $this->POST('Packing_Wet'),
					'Packing_Others'				=> $this->POST('Packing_Others'),
					'Packing_OthersChar'			=> $this->POST('Packing_OthersChar'),
					'DemageDueTo_Handling'			=> $this->POST('DemageDueTo_Handling'),
					'DemageDueTo_Improper'			=> $this->POST('DemageDueTo_Improper'),
					'DemageDueTo_Inadequate'		=> $this->POST('DemageDueTo_Inadequate'),
					'DemageDueTo_TooLong'			=> $this->POST('DemageDueTo_TooLong'),
					'DemageDueTo_Stowage'			=> $this->POST('DemageDueTo_Stowage'),
					'DemageDueTo_Pilferage'			=> $this->POST('DemageDueTo_Pilferage'),
					'DemageDueTo_Others'			=> $this->POST('DemageDueTo_Others'),
					'DamageDueTo_OthersChar'		=> $this->POST('DamageDueTo_OthersChar'),
					'EmployeeNumber'				=> $this->POST('EmployeeNumber'),
					'DateOfEntry'					=> $this->POST('DateOfEntry'),
					'TimeOfEntry'					=> $this->POST('TimeOfEntry'),
					'token'							=> $this->POST('token')
					);
					
		 $insert = $this->db->insert('inc_cargodemage', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
	}
}