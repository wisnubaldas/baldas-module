<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status_model extends CI_Model
{
	
    function __construct()
    {
        parent::__construct();			
		$this->db10 = $this->load->database('dbwarehouse', TRUE);	
		$this->db20 = $this->load->database('db_tpsonline', TRUE);	
    }
	
	
	public function check_inc_break_detail($MasterAWB=null)
	{
		$this->db10->select('*'); 		
		$this->db10->where('status=0');
		$this->db10->where('void=0');
		if(!is_null($MasterAWB))$this->db10->where('MasterAWB',$MasterAWB);
		$this->db10->from('inc_break_detail');
		$query = $this->db10->get();
		return $query->result();
	}
	
	public function check_inc_break_header()
	{
		$this->db10->select('*'); 
		$this->db10->where('status=0');
		$this->db10->where('void=0');
		$this->db10->from('inc_break_header');
		$query = $this->db10->get();
		return $query->result();
	}
	
	public function check_inc_deliveryord_detail($MasterAWB=null)
	{
		$this->db10->select('*'); 
		$this->db10->where('status=0');
		$this->db10->where('void=0');
		if(!is_null($MasterAWB))$this->db10->where('MasterAWB',$MasterAWB);
		$this->db10->from('inc_deliveryord_detail');
		$query = $this->db10->get();
		return $query->result();
	}
	
	public function check_inc_deliveryord_header($Noid)
	{
		$this->db10->select('*'); 
		$this->db10->where('Noid',$Noid);
		$this->db10->where('void=0');
		$this->db10->from('inc_deliveryord_header');
		$query = $this->db10->get();
		return $query->result();
	}
	
	public function check_inc_pod_detail($MasterAWB=null)
	{
		$this->db10->select('*'); 
		if(!is_null($MasterAWB))$this->db10->where('MasterAWB',$MasterAWB);
		$this->db10->where('status=0');
		$this->db10->where('void=0');
		$this->db10->from('inc_pod_detail');
		$query = $this->db10->get();
		return $query->result();
	}
	
	public function check_inc_pod_header($Noid)
	{
		$this->db10->select('*'); 
		$this->db10->where('Noid',$Noid);
		$this->db10->where('status=0');
		$this->db10->where('void=0');
		$this->db10->from('inc_pod_header');
		$query = $this->db10->get();
		return $query->result();
	}
	
	
	
}