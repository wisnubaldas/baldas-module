<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ekspor_model extends CI_Model
{
	
	private $db7;
    function __construct()
    {
        parent::__construct();			
		$this->db7 = $this->load->database('rdwarehouse_jkt_read', TRUE);	
    }
	
	public function Monitoring_hawb_for_approval($token)
	{
		$this->db7->select('*');    
		$this->db7->where('void=0');
		$this->db7->where('Status=0');
		$this->db7->from('eks_hostawb');
		$query = $this->db7->get();
		return $query->result();
	}

	public function Monitoring_CWP_for_invoice($token,$ProofNumber=null)
	{
		$this->db7->select('*');    
		$this->db7->where('void=0');
		$this->db7->where('paymentcode=0');
		$this->db7->where('token',$token);
		if(!is_null($ProofNumber))$this->db7->like('ProofNumber',$ProofNumber);		
		$this->db7->where("(InvoiceNumber='' OR InvoiceNumber IS NULL)");
		$this->db7->from('eks_weighingheader');
		$this->db7->order_by('DateOfFlight','DESC');	
		$this->db7->limit(50);
		$query = $this->db7->get();
		return $query->result();
	}
	
	public function list_eks_approval($token,$MasterAWB=null,$HostAWB=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		$this->db7->where('token',$token);		
		$this->db7->where('void=0');
		if(!is_null($MasterAWB))$this->db7->where('MasterAWB',$MasterAWB);	
		if(!is_null($HostAWB))$this->db7->where('HostAWB=',$HostAWB);	
		$this->db7->order_by('DateOfSLI','DESC');	
		$this->db7->limit(500);
		$query = $this->db7->get('eks_approval');
		return $query->result();
	}
	
	public function list_eks_booking($token,$MasterAWB=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');		
		$this->db7->where('token',$token);
		//if(!is_null($MasterAWB))$this->db7->where("MasterAWB like '%".URLDECODE($MasterAWB)."%'" );
		if(!is_null($MasterAWB))$this->db7->where('MasterAWB',$MasterAWB);
		$this->db7->where('void=0');
		$this->db7->order_by('DateOfFlight','DESC');	
		$this->db7->limit(50);
		$query = $this->db7->get('eks_booking');
		return $query->result();
	}
	
	public function eks_booking($token,$AirlinesCode,$FlightNo,$DateOfFlight)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		$this->db7->where('token',$token);			
		$this->db7->where('AirlinesCode=',$AirlinesCode);
		$this->db7->where('FlightNo=',$FlightNo);
		$this->db7->where('DateOfFlight=',$DateOfFlight);
		$this->db7->where('void=0');
		$this->db7->limit(50);
		$query = $this->db7->get('eks_booking');
		return $query->result();
	}
	
	public function table_npe($token,$namafield,$isifield)
	{
		$this->db7->distinct();
		$this->db7->select('*');	
		$this->db7->where('token',$token);	
		$this->db7->where('void=0');
		$this->db7->where($namafield,$isifield);	
		$this->db7->limit(50);
		$query = $this->db7->get('eks_dokcustom');
		return $query->result();
		
	}
	
	public function list_eks_dokcustom($token,$InvoiceNumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');	
		$this->db7->where('token',$token);	
		$this->db7->where('void=0');
		if(!is_null($InvoiceNumber))$this->db7->where('InvoiceNumber',$InvoiceNumber);	
		$this->db7->limit(50);
		$query = $this->db7->get('eks_dokcustom');
		return $query->result();
	}
	
	public function list_eks_hostawb($token,$MasterAWB=null,$HostAWB=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		$this->db7->where('token',$token);	
		if(!is_null($MasterAWB))$this->db7->where('MasterAWB',$MasterAWB);	
		if(!is_null($HostAWB))$this->db7->where('HostAWB',$HostAWB);	
		$this->db7->where('void=0');
		$this->db7->limit(50);
		$query = $this->db7->get('eks_hostawb');
		return $query->result();
	}
	
	public function list_eks_masterwaybill($token,$MasterAWB=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');		
		$this->db7->where('token',$token);	
		if(!is_null($MasterAWB))$this->db7->where('MasterAWB',$MasterAWB);	
		$this->db7->where('void=0');
		$this->db7->limit(50);
		$query = $this->db7->get('eks_masterwaybill');
		return $query->result();
	}
	
	public function list_eks_schedule($AirlinesCode=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');		
		if(!is_null($AirlinesCode))$this->db7->where('AirlinesCode',$AirlinesCode);	
		$this->db7->limit(50);
		$query = $this->db7->get('eks_schedule');
		return $query->result();
	}
	
	public function list_waybill_weighing($token,$MasterAWB,$HostAWB=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		$this->db7->where('token',$token);	
		$this->db7->where('MasterAWB',$MasterAWB);	
		if(!is_null($HostAWB))$this->db7->where('HostAWB',$HostAWB);	
		$this->db7->limit(50);
		$query = $this->db7->get('eks_weighingdetail');
		return $query->result();
	}
	
	public function list_waybill_invoice($token,$ProofNumber)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		$this->db7->where('token',$token);	
		$this->db7->where('ProofNumber',$ProofNumber);	
		$this->db7->limit(50);
		$query = $this->db7->get('eks_invoicedetail');
		return $query->result();
	}
	
	public function list_eks_weighingheader($token,$ProofNumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		$this->db7->where('token',$token);	
		if(!is_null($ProofNumber))$this->db7->where('ProofNumber',$ProofNumber);	
		$this->db7->limit(50);
		$query = $this->db7->get('eks_weighingheader');
		return $query->result();
		
	}
	
	public function list_eks_weighingdetail($token,$ProofNumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		$this->db7->where('token',$token);	
		if(!is_null($ProofNumber))$this->db7->where('ProofNumber',$ProofNumber);	
		$this->db7->limit(50);
		$query = $this->db7->get('eks_weighingdetail');
		return $query->result();
	}
	
	public function list_eks_weighingvol($token,$ProofNumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		$this->db7->where('token',$token);	
		if(!is_null($ProofNumber))$this->db7->where('ProofNumber',$ProofNumber);	
		$this->db7->limit(50);
		$query = $this->db7->get('eks_weighingvol');
		return $query->result();
	}
	
	public function list_eks_weighingspechand($token,$MasterAWB,$HostAWB=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');	
		$this->db7->where('token',$token);	
		$this->db7->where('MasterAWB=',$MasterAWB);
		if(!is_null($HostAWB))$this->db7->where('HostAWB',$HostAWB);	
		$this->db7->limit(50);
		$query = $this->db7->get('eks_weighingspechand');
		return $query->result();
		
	}
	public function list_eks_invoiceheader($token,$InvoiceNumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');		
		$this->db7->where('token',$token);	
		if(!is_null($InvoiceNumber))$this->db7->where('InvoiceNumber',$InvoiceNumber);	
		$this->db7->where('void=0');
		$this->db7->limit(50);
		$query = $this->db7->get('eks_invoiceheader');
		return $query->result();
	}
	
	public function list_eks_invoicedetail($token,$InvoiceNumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		$this->db7->where('token',$token);	
		if(!is_null($InvoiceNumber))$this->db7->where('InvoiceNumber',$InvoiceNumber);	
		$this->db7->limit(50);
		$query = $this->db7->get('eks_invoicedetail');
		return $query->result();
	}
	
	public function list_invoiceheader($token,$DateOfTransaction)
	{
		$this->db7->distinct();
		$this->db7->select('*');	
		$this->db7->where('DateOfTransaction',$DateOfTransaction);	
		$this->db7->where('token',$token);
		$this->db7->where('void=0');
		$this->db7->order_by('DateOfTransaction');	
		$query = $this->db7->get('eks_invoiceheader');
		return $query->result();
	}
	
	
	public function list_eks_sticker($AirlinesCode,$FlightNo,$DateOfFlight)
	{
		$this->db7->distinct();
		$this->db7->select('*');		
		if(!is_null($AirlinesCode))$this->db7->where('AirlinesCode',$AirlinesCode);
		if(!is_null($FlightNo))$this->db7->where('FlightNo',$FlightNo);		
		if(!is_null($DateOfFlight))$this->db7->where('DateOfFlight',$DateOfFlight);	
		$this->db7->limit(50);
		$query = $this->db7->get('eks_sticker');
		return $query->result();
	}
	
	public function list_eks_storage($token)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		$this->db7->where('token',$token);	
		$this->db7->limit(50);	
		$query = $this->db7->get('eks_storage');
		return $query->result();
		
	}
	
	public function list_eks_buildupheader($token,$BuildupNumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');	
		$this->db7->where('token',$token);	
		if(!is_null($BuildupNumber))$this->db7->where('BuildupNumber',$BuildupNumber);	
		$this->db7->limit(50);
		$query = $this->db7->get('eks_buildupheader');
		return $query->result();
	}
	
	public function list_eks_buildupdetail($token,$BuildupNumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		$this->db7->where('token',$token);	
		if(!is_null($BuildupNumber))$this->db7->where('BuildupNumber',$BuildupNumber);	
		$this->db7->limit(50);
		$query = $this->db7->get('eks_buildupdetail');
		return $query->result();
	}
	
	public function list_waybill_buildupdetail($token,$MasterAWB)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		$this->db7->where('token',$token);	
		$this->db7->where('MasterAWB',$MasterAWB);	
		$this->db7->limit(50);
		$query = $this->db7->get('eks_buildupdetail');
		return $query->result();
	}
	
	public function list_eks_buildupoffload($token,$BuildUpNumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');	
		$this->db7->where('token',$token);	
		if(!is_null($BuildUpNumber))$this->db7->where('BuildUpNumber',$BuildUpNumber);	
		$this->db7->limit(50);
		$query = $this->db7->get('eks_buildupoffload');
		return $query->result();
	}
	
	public function list_buildup($token,$AirlinesCode,$FlightNumber,$DateOfFlight)
	{
		$this->db7->distinct();
		$this->db7->select('*');	
		$this->db7->where('token',$token);	
		$this->db7->where('AirlinesCode=',$AirlinesCode);	
		$this->db7->where('FlightNumber=',$FlightNumber);
		$this->db7->where('DateOfFlight=',$DateOfFlight);		
		$this->db7->limit(50);
		$query = $this->db7->get('eks_buildupheader');
		return $query->result();
	}
	
	public function weighing_for_build($token,$AirlinesCode,$FlightNumber,$DateOfFlight)
	{
		$query=$this->db7->query("CALL Get_eks_weighing_for_buildUp('".$AirlinesCode."','".$FlightNumber."','".$DateOfFlight."');");
		return $query->result();
		/*
		$this->db7->distinct('a.MasterAWB,a.AirlinesCode,a.Origin,a.Destination,a.FlightNumber,KindOfNature,COUNT(a.TotalPieces) AS TotalPieces,');	
		$this->db7->from('eks_weighingheader a');
		$this->db7->join('eks_weighingdetail b', 'a.ProofNumber = b.ProofNumber','inner');
		$this->db7->where('AirlinesCode=',$AirlinesCode);	
		$this->db7->where('FlightNumber=',$FlightNumber);
		$this->db7->where('DateOfFlight<=',$DateOfFlight);
		//$this->db7->where('a.token=',$token);
		$this->db7->where('report=0');	
		$this->db7->where('PaymentCode=1');	
		$this->db7->where('BuildUpFlag=0');
		$this->db7->where('void=0');			
		$this->db7->limit(50);
		*/
		
	}
	
	public function build_uld_name($token,$BuildUpNumber)
	{
		$this->db7->distinct();
		$this->db7->select('BuildUpNumber,UldCardNumber,count(noid) as totalMAWB');	
		$this->db7->where('BuildUpNumber',$BuildUpNumber);
		$this->db7->group_by('UldCardNumber');
		$this->db7->limit(50);
		$query = $this->db7->get('eks_buildupdetail');
		return $query->result();
	}
	
	public function build_waybill($BuildUpNumber,$UldCardNumber)
	{
		$this->db7->distinct();
		$this->db7->select('*');				
		$this->db7->where('BuildUpNumber=',$BuildUpNumber);	
		$this->db7->where('UldCardNumber=',URLDECODE($UldCardNumber));
		//$this->db7->where('token',$token);
		$this->db7->where('void=0');
		$this->db7->limit(50);	
		$query = $this->db7->get('eks_buildupdetail');
		return $query->result();
	}

	public function totalpieces($token,$namatable,$fieldcheck,$namafield,$isifield)
	{
		$this->db7->distinct();
		$this->db7->select_sum($fieldcheck);				
		$this->db7->where($namafield,$isifield);
		$this->db7->where('token',$token);
		$this->db7->where('void=0');
		$this->db7->limit(50);		
		$query = $this->db7->get($namatable);
		return $query->result();
		
	}
	
	public function CheckMandatory($token,$namatable,$MasterAWB,$namafield,$isifield=null)
	{
		$this->db7->distinct();
		$this->db7->select($namafield." as isifield");	
		$this->db7->where('MasterAWB=',$MasterAWB);			
		if(!is_null($isifield))$this->db7->where($namafield,$isifield);	
		$this->db7->where('token',$token);
		$this->db7->where('void=0');	
		$this->db7->limit(750);
		$query = $this->db7->get($namatable);
		return $query->result();
		
	}
	
	public function CheckValidCWP($token,$MasterAWB,$HostAWB=null)
	{
		$this->db7->select('eks_weighingheader.*');    
		$this->db7->where('eks_weighingdetail.MasterAWB=',$MasterAWB);	
		if(!is_null($HostAWB))$this->db7->where('HostAWB',$HostAWB);	
		$this->db7->where('void=0');
		$this->db7->where('eks_weighingheader.token',$token);
		$this->db7->from('eks_weighingheader');
		$this->db7->join('eks_weighingdetail', 'eks_weighingheader.ProofNumber = eks_weighingdetail.ProofNumber');			
		$this->db7->limit(50);
		$query = $this->db7->get();		
		return $query->result();
	}
	
	public function manifest_buildup($token,$AirlinesCode,$DateOfFlight)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		$this->db7->where('token',$token);			
		$this->db7->where('AirlinesCode=',$AirlinesCode);
		$this->db7->where('DateOfFlight=',$DateOfFlight);
		$this->db7->where('void=0');
		$this->db7->limit(50);
		$query = $this->db7->get('eks_buildupheader');
		return $query->result();
		
	}

	public function list_eks_weighing_label($token,$HostAWB)
	{
		$this->db7->distinct();
		$this->db7->select('eks_weighingheader.*');
		$this->db7->where('eks_weighingheader.token=',$token);	
		$this->db7->where('eks_weighingheader.void=0');		
		$this->db7->where('eks_weighingdetail.HostAWB=',$HostAWB);
		$this->db7->or_where('eks_weighingdetail.MasterAWB =',$HostAWB);
		$this->db7->from('eks_weighingheader');
		$this->db7->join('eks_weighingdetail', 'eks_weighingheader.ProofNumber = eks_weighingdetail.ProofNumber');	
		$this->db7->limit(1);
		$query = $this->db7->get();	
		return $query->result();
	}
	
}