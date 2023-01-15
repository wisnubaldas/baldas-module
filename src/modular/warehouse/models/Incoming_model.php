<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Incoming_model extends CI_Model
{
	private $db7;
	private $db8;
    function __construct()
    {
        parent::__construct();			
		$this->db7 = $this->load->database('rdwarehouse_jkt_read', TRUE);
		$this->db8 = $this->load->database('rdwarehouse_jkt', TRUE);
    }
	
	public  function list_inc_breakdownheader($token,$BreakdownNumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		if(!is_null($BreakdownNumber))$this->db7->where('BreakdownNumber=',$BreakdownNumber);	
		$this->db7->where('token',$token);
		//$this->db7->order_by('DateOfFlight','DESC');	
		//$this->db7->limit(50);
		$query = $this->db7->get('inc_breakdownheader');
		return $query->result();		
	}
	
	public function list_inc_breakdowndetail($token,$BreakdownNumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		if(!is_null($BreakdownNumber))$this->db7->where('BreakdownNumber',$BreakdownNumber);
		$this->db7->where('void=0');
		$this->db7->where('token',$token);
		$this->db7->limit(50);
		$query = $this->db7->get('inc_breakdowndetail');
		return $query->result();		
	}
	
	public  function breakdownheader_airl_flight_date($token,$nilai=null,$dateflight)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		if(!is_null($nilai))$this->db7->where('concat(airlinescode,flightnumber)',$nilai);
		$this->db7->where('DateOfFlight=',$dateflight);
		$this->db7->where('token',$token);
		$this->db7->limit(50);
		$query = $this->db7->get('inc_breakdownheader');
		return $query->result();
	}
	
	public function list_inc_cargodemage($token,$MasterAWB=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');	
		if(!is_null($MasterAWB))$this->db7->where('MasterAWB',$MasterAWB);
		$this->db7->where('token',$token);
		$this->db7->limit(50);	
		$query = $this->db7->get('inc_cargodemage');
		return $query->result();
	}
	
	public function list_inc_deliorderheader($token,$DONumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');	
		if(!is_null($DONumber))$this->db7->where('DONumber',$DONumber);
		$this->db7->where('token',$token);
		$this->db7->where('void=0');
		$this->db7->order_by('DateOfDeliveryOrder','DESC');	
		$this->db7->limit(50);
		$query = $this->db7->get('inc_deliorderheader');
		return $query->result();
	}
	
	public function list_inc_deliorderdetail($token,$DONumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		if(!is_null($DONumber))$this->db7->where('DONumber',$DONumber);	
		$this->db7->where('token',$token);
		$this->db7->where('void=0');
		$this->db7->order_by('DateOfBreakdown','DESC');	
		$this->db7->limit(50);
		$query = $this->db7->get('inc_deliorderdetail');
		return $query->result();		
	}
	
	public function list_inc_weighingheader($token,$ProofNumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');	
		if(!is_null($ProofNumber))$this->db7->where('ProofNumber',$ProofNumber);	
		$this->db7->where('token',$token);
		$this->db7->where('void=0');
		$this->db7->order_by('DateOfEntry','DESC');	
		$this->db7->limit(50);
		$query = $this->db7->get('inc_weighingheader');
		return $query->result();
	}
	
	public function list_inc_weighingdetail($token,$ProofNumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');	
		if(!is_null($ProofNumber))$this->db7->where('ProofNumber',$ProofNumber);	
		$this->db7->where('token',$token);
		$this->db7->where('void=0');		
		$this->db7->limit(50);
		$query = $this->db7->get('inc_weighingdetail');
		return $query->result();
	}
	
	public function list_inc_weighingvolume($token,$ProofNumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');	
		if(!is_null($ProofNumber))$this->db7->where('ProofNumber',$ProofNumber);	
		$this->db7->where('token',$token);
		$this->db7->where('void=0');		
		$this->db7->limit(50);
		$query = $this->db7->get('inc_weighingvolume');
		return $query->result();
	}
	
	
	public function list_inc_invoiceheader($token,$InvoiceNumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');	
		if(!is_null($InvoiceNumber))$this->db7->where('InvoiceNumber',$InvoiceNumber);	
		$this->db7->where('token',$token);
		$this->db7->where('void=0');
		$this->db7->order_by('DateOfTransaction','DESC');	
		$this->db7->limit(50);
		$query = $this->db7->get('inc_invoiceheader');
		return $query->result();
	}
	
	public function list_inc_invoicedetail($token,$InvoiceNumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');	
		if(!is_null($InvoiceNumber))$this->db7->where('InvoiceNumber',$InvoiceNumber);	
		$this->db7->where('token',$token);
		$this->db7->where('void=0');		
		$this->db7->limit(50);
		$query = $this->db7->get('inc_invoicedetail');
		return $query->result();
	}
	
	public function list_inc_podheader($token,$pod_number=null)
	{
		
		$this->db7->distinct();
		$this->db7->select('*');	
		if(!is_null($pod_number))$this->db7->where('pod_number',$pod_number);	
		$this->db7->where('token',$token);
		$this->db7->where('void=0');		
		$this->db7->limit(50);
		$query = $this->db7->get('inc_podheader');
		return $query->result();
	}
	
	public function list_inc_poddetail($token,$pod_number=null)
	{
		
		$this->db7->distinct();
		$this->db7->select('*');	
		if(!is_null($pod_number))$this->db7->where('pod_number',$pod_number);	
		$this->db7->where('token',$token);
		$this->db7->where('void=0');		
		$this->db7->limit(50);
		$query = $this->db7->get('inc_poddetail');
		return $query->result();
	}
	
	public function list_inc_stockofname($token,$AirlinesCode=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');	
		if(!is_null($AirlinesCode))$this->db7->where('AirlinesCode',$AirlinesCode);	
		$this->db7->where('token',$token);
		$this->db7->where('pod_number is null ');
		$this->db7->where('void=0');		
		$this->db7->limit(500);
		$query = $this->db7->get('inc_breakdowndetail');
		return $query->result();
	}
}