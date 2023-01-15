<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Finddata_model extends CI_Model
{
	private $db7;
	
    function __construct()
    {
        parent::__construct();			
		$this->db7 = $this->load->database('rdwarehouse_jkt_read', TRUE);	
    }
	
	public function list_master_breakdowndetail($token,$MasterAWB=null)
	{
		$this->db7->distinct();	
		if(!is_null($MasterAWB))$this->db7->where('MasterAWB',$MasterAWB);	
		$this->db7->where('token',$token);	
		$query = $this->db7->get('imp_breakdowndetail');
		$this->db7->order_by('DateOfBreakdown','DESC');	
		$this->db7->limit(50);
		return $query->result();
	}
	
	public function list_master_obdetail($token,$MasterAWB=null)
	{
		$this->db7->distinct();			
		if(!is_null($MasterAWB))$this->db7->like('MasterAWB',$MasterAWB);
		$this->db7->where('token',$token);			
		$query = $this->db7->get('imp_obdetail');
		$this->db7->order_by('DateOfBreakdown','DESC');	
		$this->db7->limit(50);
		return $query->result();
	}
	
	
	public function list_hawb_detail($token,$AgenCode,$HostAWB=null)
	{
		$this->db7->distinct();			
		if(!is_null($HostAWB))$this->db7->where('HostAWB',$HostAWB);	
		//$this->db7->where('AgenCode=',$AgenCode);	
		$this->db7->where('token',$token);
		$this->db7->where('void=0');
		$this->db7->where('flagDO=0');			
		$query = $this->db7->get('imp_hostawb');
		return $query->result();
	}
	
	public function list_imp_breakdownheader($token,$gabung=null)
	{
		$this->db7->distinct();
		$this->db7->select('*,CONCAT(AirlinesCode,FlightNumber,DateOfFlight) as gabung',false);	
		$this->db7->where('token=',$token);
		//if(!is_null($gabung))$this->db7->where('CONCAT(AirlinesCode,FlightNumber,DateOfFlight)',$gabung);	
		if(!is_null($gabung))$this->db7->like('BreakdownNumber',$gabung);	
		$query = $this->db7->get('imp_breakdownheader');
		$this->db7->order_by('DateOfFlight','ASC');	
		$this->db7->limit(50);
		return $query->result();
	}
	
	public function list_imp_obheader($token,$gabung=null)
	{
		$this->db7->distinct();
		$this->db7->select('*,CONCAT(WhOperatorCode,DateOfOveride) as gabung',false);		
		//if(!is_null($gabung))$this->db7->where('CONCAT(WhOperatorCode,DateOfOveride)',$gabung);	
		if(!is_null($gabung))$this->db7->like('BreakdownNumber',$gabung);	
		$this->db7->where('token',$token);
		$query = $this->db7->get('imp_obheader');
		$this->db7->order_by('DateOfOveride','ASC');	
		$this->db7->limit(50);
		return $query->result();
	}
	
	public function list_imp_irreg($token,$gabung=null)
	{
		$this->db7->distinct();
		$this->db7->select('*,CONCAT(AirlinesCode,DateOfFlight) as gabung',false);		
		if(!is_null($gabung))$this->db7->where('CONCAT(AirlinesCode,DateOfFlight)',$gabung);
		$this->db7->where('token',$token);
		$query = $this->db7->get('imp_irreg');
		return $query->result();
	}
	
	public function list_imp_NOA_masterAWB($token,$MasterAWB=null)
	{
		
		$this->db7->select('BreakdownNumber,MasterAWB,AirlinesCode, FlightNumber, OriginCode, Pieces, Netto');
		$this->db7->from('imp_breakdowndetail');		
		if(!is_null($MasterAWB))$this->db7->where('MasterAWB',$MasterAWB);
		$this->db7->where('NOA=0');
		$this->db7->where('token',$token);
		$query1 = $this->db7->get_compiled_select();
		
		$this->db7->select('BreakdownNumber,MasterAWB,AirlinesCode, FlightNumber, OriginCode, Pieces, Netto');
		$this->db7->from('imp_obdetail');		
		if(!is_null($MasterAWB))$this->db7->where('MasterAWB',$MasterAWB);
		$this->db7->where('NOA=0');
		$this->db7->where('token',$token);
		$query2 = $this->db7->get_compiled_select();
		$query = $this->db7->query($query1 . ' UNION ' . $query2);
		return $query->result();
		
	}
	
	public function list_eks_booking($token,$gabung=null)
	{
		$this->db7->distinct();
		$this->db7->select('*,CONCAT(AirlinesCode,DateOfFlight) as gabung',false);		
		if(!is_null($gabung))$this->db7->where('CONCAT(AirlinesCode,DateOfFlight)',$gabung);	
		$this->db7->where('token',$token);
		$query = $this->db7->get('eks_booking');
		return $query->result();
	}
	
	public function list_eks_weighing_master($token,$MasterAWB=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');		
		if(!is_null($MasterAWB))$this->db7->where('MasterAWB',$MasterAWB);	
		$this->db7->where('token',$token);
		$query = $this->db7->get('eks_weighingheader');
		return $query->result();
	}
	
	public function list_eks_buildupheader($token,$gabung=null)
	{
		$this->db7->distinct();
		$this->db7->select('*,CONCAT(AirlinesCode,FlightNumber,DateOfFlight) as gabung',false);			
		if(!is_null($gabung))$this->db7->where('CONCAT(AirlinesCode,FlightNumber,DateOfFlight)',$gabung);	
		$this->db7->where('token',$token);
		$query = $this->db7->get('eks_buildupheader');
		return $query->result();
	}
	
	public function list_imp_deliorderheader($token,$DONumber=null)
	{
		$this->db7->select('a.*');    		
		$this->db7->from('imp_deliorderheader a');
		$this->db7->join('imp_deliorderdetail b', 'a.DONumber = b.DONumber','inner');		
		if(!is_null($DONumber))$this->db7->like('a.DONumber',$DONumber);		
		$this->db7->where('a.token=',$token);
		$query = $this->db7->get();		
		return $query->result();
	}
	
	public function list_invoiceheader($token,$WhCode,$MasterAWB=null)
	{
		if ($WhCode=='WHEKP')
		{
			$this->db7->select('a.*');    
			$this->db7->from('eks_invoiceheader a');
			$this->db7->join('eks_invoicedetail b', 'a.InvoiceNumber = b.InvoiceNumber','inner');
			$this->db7->where('a.token',$token);
			if(!is_null($MasterAWB))$this->db7->where('a.MasterAWB',$MasterAWB);
		}
		elseif (($WhCode=='WHIMP'))
		{
			$this->db7->select('a.*');    
			$this->db7->from('imp_invoiceheader a');
			$this->db7->join('imp_invoicedetail b', 'a.InvoiceNumber = b.InvoiceNumber','inner');	
			$this->db7->where('a.token',$token);
			if(!is_null($MasterAWB))$this->db7->where('a.MasterAWB',$MasterAWB);
		}
		
		$query = $this->db7->get();		
		return $query->result();
	}
	
	public function list_doc_delivery_hawb($token,$Consigneename=null)
	{
		$this->db7->distinct('c.*');	
		$this->db7->from('imp_hostawb a');
		$this->db7->join('imp_deliorderdetail b', 'a.HostAWB = b.HostMAWB','inner');
		$this->db7->join('imp_deliorderheader c', 'b.DONumber = c.DONumber','inner');
		if(!is_null($Consigneename))$this->db7->where('Consigneename',$Consigneename);
		$this->db7->where('c.token',$token);
		$this->db7->where('a.void=0');
		$this->db7->where('b.void=0');
		$this->db7->where('c.void=0');
		$this->db7->where('flagDO=1');			
		$query = $this->db7->get();
		return $query->result();
	}
	
	public function list_doc_delivery($token,$MasterAWB=null)
	{
		$this->db7->distinct('b.*');	
		$this->db7->from('imp_deliorderheader a');
		$this->db7->join('imp_deliorderdetail b', 'b.DONumber = a.DONumber','inner');	
		$this->db7->where('a.token',$token);
		$this->db7->where('a.void=0');
		$this->db7->where('b.void=0');
		$this->db7->where("InvoiceNumber is null OR InvoiceNumber =''");
		if(!is_null($MasterAWB))$this->db7->like('a.MasterAWB',$MasterAWB);	
		$this->db7->where('flagPOD = 0');
		$query = $this->db7->get();
		return $query->result();
	}
	
	public function list_checking_data($tablename,$querydata)
	{
		$this->db7->distinct('*');	
		$this->db7->from($tablename);
		$query = $this->db->query('YOUR QUERY HERE');
		return $query->result();
	}
	
	public function delivery_for_cargo_out($token,$DONumber=null)
	{
		$this->db7->select('a.*');    		
		$this->db7->from('imp_deliorderheader a');
		$this->db7->join('imp_deliorderdetail b', 'a.DONumber = b.DONumber','inner');		
		if(!is_null($DONumber))$this->db7->like('a.DONumber',$DONumber);		
		$this->db7->where('a.token=',$token);
		$this->db7->where('a.void=0');
		$this->db7->where("dateofout is null or dateofout=''");
		$query = $this->db7->get();		
		return $query->result();
	}
	
	public function list_inc_breakdowndetail($token,$MasterAWB)
	{
		$this->db7->distinct();	
		if(!is_null($MasterAWB))$this->db7->where('MasterAWB',$MasterAWB);	
		$this->db7->where('token',$token);
		$this->db7->where('id_proof is null');
		$query = $this->db7->get('inc_breakdowndetail');
		$this->db7->order_by('DateOfBreakdown','DESC');	
		$this->db7->limit(50);
		return $query->result();	
	}
	
	public function list_inc_weighing($token,$ProofNumber=null)
	{
		$this->db7->distinct();	
		if(!is_null($ProofNumber))$this->db7->where('ProofNumber',$ProofNumber);	
		$this->db7->where('token',$token);
		$query = $this->db7->get('inc_weighingheader');
		$this->db7->limit(1);
		return $query->result();
	}
	
	public function list_inc_delivery($token,$DONumber=null)
	{
		$this->db7->distinct();	
		if(!is_null($DONumber))$this->db7->where('DONumber',$DONumber);	
		$this->db7->where('token',$token);
		$query = $this->db7->get('inc_deliorderheader');
		$this->db7->limit(1);
		return $query->result();
	}
	
	
}