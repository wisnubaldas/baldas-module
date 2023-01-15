<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Outgoing_model extends CI_Model
{
	private $db7;
	
    function __construct()
    {
        parent::__construct();			
		$this->db7 = $this->load->database('rdwarehouse_jkt_read', TRUE);	
    }
	
	public function list_out_approval($token,$MasterAWB=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');		
		$this->db7->where('token',$token);
		if(!is_null($MasterAWB))$this->db7->where('MasterAWB',$MasterAWB);
		$this->db7->where('void=0');	
		$this->db7->limit(50);
		$query = $this->db7->get('out_approval');
		return $query->result();
	}
	
	public function list_out_weighingheader($token,$ProofNumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');		
		$this->db7->where('token',$token);
		if(!is_null($ProofNumber))$this->db7->where('ProofNumber',$ProofNumber);
		$this->db7->where('void=0');	
		$this->db7->limit(50);
		$query = $this->db7->get('out_weighingheader');
		return $query->result();
	}
	
	public function list_out_weighingdetail($token,$ProofNumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');		
		$this->db7->where('token',$token);
		if(!is_null($ProofNumber))$this->db7->where('ProofNumber',$ProofNumber);
		$this->db7->where('void=0');	
		$this->db7->limit(50);
		$query = $this->db7->get('out_weighingdetail');
		return $query->result();
	}
	
	public function list_out_weighinghandling($token,$ProofNumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');		
		$this->db7->where('token',$token);
		if(!is_null($ProofNumber))$this->db7->where('ProofNumber',$ProofNumber);
		$this->db7->where('void=0');	
		$this->db7->limit(50);
		$query = $this->db7->get('out_weighinghandling');
		return $query->result();
	}
	
	public function list_out_weighingvolume($token,$ProofNumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');		
		$this->db7->where('token',$token);
		if(!is_null($ProofNumber))$this->db7->where('ProofNumber',$ProofNumber);
		$this->db7->where('void=0');	
		$this->db7->limit(50);
		$query = $this->db7->get('out_weighingvolume');
		return $query->result();
	}
	
	public function list_out_invoiceheader($token,$InvoiceNumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');		
		$this->db7->where('token',$token);
		if(!is_null($InvoiceNumber))$this->db7->where('InvoiceNumber',$InvoiceNumber);
		$this->db7->where('void=0');	
		$this->db7->limit(50);
		$query = $this->db7->get('out_invoiceheader');
		return $query->result();
	}
	
	public function list_out_invoicedetail($token,$InvoiceNumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');		
		$this->db7->where('token',$token);
		if(!is_null($InvoiceNumber))$this->db7->where('InvoiceNumber',$InvoiceNumber);
		$this->db7->where('void=0');	
		$this->db7->limit(50);
		$query = $this->db7->get('out_invoicedetail');
		return $query->result();
	}
	
	public  function list_out_sticker($token,$MasterAWB=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');		
		$this->db7->where('token',$token);
		if(!is_null($MasterAWB))$this->db7->where('MasterAWB',$MasterAWB);
		$this->db7->where('void=0');	
		$this->db7->limit(50);
		$query = $this->db7->get('out_sticker');
		return $query->result();
	}
	
	public function list_out_storage($token,$MasterAWB)
	{
		$this->db7->distinct();
		$this->db7->select('*');		
		$this->db7->where('token',$token);
		if(!is_null($MasterAWB))$this->db7->where('MasterAWB',$MasterAWB);
		$this->db7->where('void=0');	
		$this->db7->limit(50);
		$query = $this->db7->get('out_storage');
		return $query->result();
	}
	
	public function list_out_buildup($token,$AirlinesCode,$FlightNumber,$DateOfFlight)
	{
		$this->db7->distinct();
		$this->db7->select('*');	
		$this->db7->where('token',$token);	
		$this->db7->where('AirlinesCode=',$AirlinesCode);	
		$this->db7->where('FlightNumber=',$FlightNumber);
		$this->db7->where('DateOfFlight=',$DateOfFlight);	
		$this->db7->where('void=0');	
		$this->db7->limit(50);
		$query = $this->db7->get('out_buildupheader');
		return $query->result();
	}
	
	
	public function list_out_buildupheader($token,$BuildupNumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');		
		$this->db7->where('token',$token);
		if(!is_null($BuildupNumber))$this->db7->where('BuildupNumber',$BuildupNumber);
		$this->db7->where('void=0');	
		$this->db7->limit(50);
		$query = $this->db7->get('out_buildupheader');
		return $query->result();
	}
	
	public function list_out_buildupdetail($token,$BuildupNumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');		
		$this->db7->where('token',$token);
		if(!is_null($BuildupNumber))$this->db7->where('BuildupNumber',$BuildupNumber);
		$this->db7->where('void=0');	
		$this->db7->limit(50);
		$query = $this->db7->get('out_buildupdetail');
		return $query->result();
	}
	
	public function list_out_buildupoffload($token,$BuildupNumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');		
		$this->db7->where('token',$token);
		if(!is_null($BuildupNumber))$this->db7->where('BuildupNumber',$BuildupNumber);
		$this->db7->where('void=0');	
		$this->db7->limit(50);
		$query = $this->db7->get('out_buildupoffload');
		return $query->result();
	}
	
	public function weighing_for_build($token,$AirlinesCode,$FlightNumber,$DateOfFlight)
	{
		$query=$this->db7->query("CALL Get_out_weighing_for_buildUp('".$AirlinesCode."','".$FlightNumber."','".$DateOfFlight."');");
		return $query->result();
	}
	
}