<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Import_model extends CI_Model
{
	private $db7;	
    function __construct()
    {
        parent::__construct();			
		$this->db7 = $this->load->database('rdwarehouse_jkt_read', TRUE);	
		$this->db8 = $this->load->database('rdwarehouse_jkt', TRUE);	
    }
	
	public function list_stockOfname($token,$AirlinesCode)
	{
		$this->db7->select('a.AirlinesCode,a.OriginCode,b.MasterAWB,b.KindOfGood,c.HostAWB,mps,location,scandate,scantime,c.token');    
		$this->db7->from('imp_breakdownheader a');
		$this->db7->join('imp_breakdowndetail b', 'a.BreakdownNumber = b.BreakdownNumber');
		$this->db7->join('imp_location_mps c', 'b.MasterAWB = c.HostAWB');
		$this->db7->where('a.AirlinesCode',$AirlinesCode);
		$this->db7->where('c.token',$token);
		$query = $this->db7->get();
		return $query->result();
		
	}
	
	public  function list_imp_masterwaybill($token,$MasterAWB=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		if(!is_null($MasterAWB))$this->db7->where('MasterAWB',$MasterAWB);	
		$this->db7->where('token',$token);
		$this->db7->order_by('DateOfFight','DESC');	
		//$this->db7->limit(50);
		$query = $this->db7->get('imp_masterwaybill');
		return $query->result();		
	}
	
	public function list_imp_hostawb($token,$HostAWB=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		if(!is_null($HostAWB))$this->db7->where('HostAWB',$HostAWB);	
		$this->db7->where('token',$token);
		$query = $this->db7->get('imp_hostawb');
		$this->db7->order_by('DateOfFlight','DESC');	
		$this->db7->limit(50);
		return $query->result();		
	}
	
	public function list_imp_bc11($token,$MasterAWB=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		if(!is_null($MasterAWB))$this->db7->where('MasterAWB',$MasterAWB);
		$this->db7->where('token',$token);
		$this->db7->order_by('DateOfBC','DESC');	
		$this->db7->limit(50);		
		$query = $this->db7->get('imp_bc11');
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
		$query = $this->db7->get('imp_breakdownheader');
		return $query->result();
	}

	public function list_imp_breakdownheader($token,$BreakdownNumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');		
		if(!is_null($BreakdownNumber))$this->db7->where('BreakdownNumber',$BreakdownNumber);
		$this->db7->where('token',$token);
		$this->db7->order_by('DateOfFlight','DESC');	
		$this->db7->limit(50);
		$query = $this->db7->get('imp_breakdownheader');
		return $query->result();
	}
	
	public function list_imp_breakdowndetail($token,$BreakdownNumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		if(!is_null($BreakdownNumber))$this->db7->where('BreakdownNumber',$BreakdownNumber);
		$this->db7->where('void=0');
		$this->db7->where('token',$token);
		$this->db7->limit(50);
		$query = $this->db7->get('imp_breakdowndetail');
		return $query->result();		
	}
	
	public function list_master_breakdowndetail($token,$MasterAWB=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		$this->db7->where('void=0');
		$this->db7->where('NOA=1');
		if(!is_null($MasterAWB))$this->db7->where("MasterAWB like '%".URLDECODE($MasterAWB)."%'" );	
		$this->db7->where('token',$token);
		$this->db7->order_by('DateOfBreakdown','DESC');	
		$this->db7->limit(50);
		$query = $this->db7->get('imp_breakdowndetail');
		return $query->result();
	}
	
	public function list_imp_cargodemage($token,$MasterAWB=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');	
		if(!is_null($MasterAWB))$this->db7->where('MasterAWB',$MasterAWB);
		$this->db7->where('token',$token);
		$this->db7->limit(50);	
		$query = $this->db7->get('imp_cargodemage');
		return $query->result();
	}
	
	public function list_imp_deliorderheader($token,$DONumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');	
		if(!is_null($DONumber))$this->db7->where('DONumber',$DONumber);
		$this->db7->where('token',$token);
		$this->db7->where('void=0');
		$this->db7->order_by('DateOfDeliveryOrder','DESC');	
		$this->db7->limit(50);
		$query = $this->db7->get('imp_deliorderheader');
		return $query->result();
	}
	
	public function list_imp_deliorderdetail($token,$DONumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		if(!is_null($DONumber))$this->db7->where('DONumber',$DONumber);	
		$this->db7->where('token',$token);
		$this->db7->where('void=0');
		$this->db7->order_by('DateOfBreakdown','DESC');	
		$this->db7->limit(50);
		$query = $this->db7->get('imp_deliorderdetail');
		return $query->result();		
	}
	
	public function list_imp_invoiceheader($token,$InvoiceNumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');	
		if(!is_null($InvoiceNumber))$this->db7->where('InvoiceNumber',$InvoiceNumber);	
		$this->db7->where('token',$token);
		$this->db7->where('void=0');
		$this->db7->order_by('DateOfTransaction','DESC');	
		$this->db7->limit(50);
		$query = $this->db7->get('imp_invoiceheader');
		return $query->result();
	}
	
	public function list_imp_invoicedetail($token,$InvoiceNumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');	
		if(!is_null($InvoiceNumber))$this->db7->where('InvoiceNumber',$InvoiceNumber);		
		$this->db7->where('token',$token);
		$this->db7->limit(50);
		$query = $this->db7->get('imp_invoicedetail');
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
		$query = $this->db7->get('imp_invoiceheader');
		return $query->result();
	}
	
	public function list_invoice_pecahpos($token,$InvoiceNumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');	
		if(!is_null($InvoiceNumber))$this->db7->where('InvoiceNumber',$InvoiceNumber);	
		$this->db7->where('token',$token);
		$this->db7->where('void=0');
		$this->db7->order_by('DateOfTransaction');	
		$query = $this->db7->get('imp_invoicepecahpos');
		return $query->result();
		
	}
	
	public function list_waybill_invoice($token,$DONumber)
	{
		$this->db7->distinct();
		$this->db7->select('*');	
		if(!is_null($DONumber))$this->db7->where('DeliveryOrderNumber',$DONumber);	
		$this->db7->where('token',$token);
		$this->db7->limit(50);
		$query = $this->db7->get('imp_invoicedetail');
		return $query->result();
	}
	
	public function list_imp_invoicepecahpos($token,$InvoiceNumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');	
		if(!is_null($InvoiceNumber))$this->db7->where('InvoiceNumber',$InvoiceNumber);
		$this->db7->where('token',$token);
		$this->db7->where('void=0');
		$this->db7->limit(50);
		$query = $this->db7->get('imp_invoicepecahpos');
		return $query->result();
	}
	
	public function list_imp_irreg($token,$IrregNumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');	
		if(!is_null($IrregNumber))$this->db7->where('IrregNumber',$IrregNumber);
		$this->db7->where('token',$token);
		$query = $this->db7->get('imp_irreg');
		return $query->result();
	}
	
	public function list_imp_irregpic($token)
	{
		$this->db7->distinct();
		$this->db7->select('*');		
		$this->db7->where('token',$token);
		$this->db7->where('void=0');
		$query = $this->db7->get('imp_irregpic');
		return $query->result();		
	}
	
	public function list_imp_location($token,$HostAWB=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');	
		if(!is_null($HostAWB))$this->db7->where('HostAWB',$HostAWB);
		$this->db7->where('token',$token);
		$this->db7->where('void=0');
		$this->db7->where("(TravelNumber='' OR TravelNumber IS NULL ");
		$this->db7->limit(50);
		$query = $this->db7->get('imp_location');
		return $query->result();	
	}
	
	public function list_imp_noa($token,$namafield,$isifield=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		if(!is_null($isifield))$this->db7->where($namafield,$isifield);
		$this->db7->where('token',$token);
		$this->db7->where('void=0');
		$this->db7->limit(50);
		$query = $this->db7->get('imp_noa');
		return $query->result();
	}
	
	public function list_imp_obheader($token,$BreakdownNumber)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		$this->db7->where('token',$token);
		$this->db7->where('void=0');
		$this->db7->where('BreakdownNumber',$BreakdownNumber);
		$this->db7->limit(50);
		$query = $this->db7->get('imp_obheader');
		return $query->result();
	}
	
	public function list_imp_obdetail($token,$BreakdownNumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		$this->db7->where('token=',$token);
		$this->db7->where('void=0');
		if(!is_null($BreakdownNumber))$this->db7->where('BreakdownNumber=',$BreakdownNumber);		
		$query = $this->db7->get('imp_obdetail');
		return $query->result();
	}
	
	public function list_master_obdetail($token,$MasterAWB=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		$this->db7->where('void=0');
		$this->db7->where('NOA=1');
		if(!is_null($MasterAWB))$this->db7->where("MasterAWB like '%".URLDECODE($MasterAWB)."%'" );
		$this->db7->where('token',$token);
		$this->db7->limit(50);		
		$query = $this->db7->get('imp_obdetail');
		return $query->result();
	}
	
	public function list_imp_podheader($token,$TravelNumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		if(!is_null($TravelNumber))$this->db7->where('TravelNumber',$TravelNumber);
		$this->db7->where('token',$token);
		$this->db7->where('void=0');
		$this->db7->limit(50);
		$query = $this->db7->get('imp_podheader');
		return $query->result();		
	}
	
	public function list_imp_poddetail($token,$TravelNumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		if(!is_null($TravelNumber))$this->db7->where('TravelNumber',$TravelNumber);
		$this->db7->where('token',$token);
		$this->db7->where('void=0');
		$this->db7->limit(50);
		$query = $this->db7->get('imp_poddetail');
		return $query->result();		
	}
	
	public function list_imp_poddetail_hawb($token,$HostAWB=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		if(!is_null($HostAWB))$this->db7->where('HostAWB',$HostAWB);
		$this->db7->where('token',$token);
		$this->db7->limit(50);
		$query = $this->db7->get('imp_poddetail');
		return $query->result();		
	}
	
	public function list_imp_poddetail_mawb($token,$MasterAWB=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		if(!is_null($MasterAWB))$this->db7->where('MasterAWB',$MasterAWB);
		$this->db7->where('token',$token);
		$this->db7->where('void=0');
		$this->db7->limit(50);
		$query = $this->db7->get('imp_poddetail');
		return $query->result();		
	}
	
	public function dlv_invoice($token,$InvoiceNumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		$this->db7->where('void=0');
		$this->db7->where('flagPOD=0');
		$this->db7->where('token',$token);
		if(!is_null($InvoiceNumber))$this->db7->where('InvoiceNumber',$InvoiceNumber);
		$this->db7->limit(50);
		$query = $this->db7->get('imp_invoiceheader');
		return $query->result();
	}
	
	public function dlv_delivery($token,$DONumber=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		$this->db7->where('void=0');
		$this->db7->where("InvoiceNumber='' or InvoiceNumber is null ");
		$this->db7->where('flagPOD=0');
		$this->db7->where('token',$token);
		if(!is_null($DONumber))$this->db7->where('DONumber',$DONumber);
		$this->db7->limit(50);
		$query = $this->db7->get('imp_deliorderheader');
		return $query->result();
	}
	
	public function list_damage($token,$MasterAWB=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		$this->db7->where('void=0');		
		if(!is_null($MasterAWB))$this->db7->where('MasterAWB',$MasterAWB);
		$this->db7->where('token',$token);
		$this->db7->limit(50);
		$query = $this->db7->get('imp_cargodemage');
		return $query->result();
	}
	
	public function list_delivery_for_invoice($token)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		$this->db7->where('void=0');
		$this->db7->where('flagPOD=0');
		$this->db7->where("InvoiceNumber='' or InvoiceNumber is null");
		$this->db7->where('token',$token);
		$this->db7->limit(50);		
		$query = $this->db7->get('imp_deliorderheader');
		return $query->result();
	}
	
	public function monitoring_imp_dlv($token)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		$this->db7->where('void=0');
		$this->db7->where('flagPOD=0');
		$this->db7->where('token',$token);
		$this->db7->where("InvoiceNumber='' or InvoiceNumber is null");		
		$this->db7->limit(50);
		$query = $this->db7->get('imp_deliorderheader');
		return $query->result();
	}
	
	public function list_imp_sppb_ecommerce($token,$limit)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		$this->db7->where('fl_gateout=0');
		$this->db7->where('token',$token);
		$this->db7->limit($limit);
		$query = $this->db7->get('imp_sppb_ecommerce');
		return $query->result();
	}
	
	public function list_imp_scan_C1_fl_gate_0($token,$hawb=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		if(!is_null($hawb))$this->db7->where('hawb',$hawb);
		$this->db7->where('token',$token);
		$this->db7->where('fl_gate=0');
		$query = $this->db7->get('imp_scan_c1');
		return $query->result();
	}
	
	public function list_cargoout($token,$DateOfOut)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		$this->db7->like('DateOfOut',$DateOfOut);
		$this->db7->where('void=0');
		$this->db7->where('token',$token);		
		$query = $this->db7->get('imp_deliorderheader');
		return $query->result();
	}
	
	public function list_imp_scan_c1($token,$tracking=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		if(!is_null($tracking))$this->db7->where('tracking',$tracking);
		$this->db7->where('token',$token);		
		$this->db7->order_by('noid','desc');	
		$query = $this->db7->get('imp_scan_c1');
		return $query->result();
	}
	
	public function list_imp_location_mps($token,$mps=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		if(!is_null($mps))$this->db7->where('mps',$mps);
		$this->db7->where('token',$token);		
		$query = $this->db7->get('imp_location_mps');
		return $query->result();
	}
	
	public function list_imp_sppb_ecommerce_hawb($token,$hawb=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		if(!is_null($hawb))$this->db7->where('hawb',$hawb);
		//$this->db7->where('token',$token);		
		$query = $this->db7->get('imp_sppb_ecommerce');
		return $query->result();
	}
	
	public function list_imp_sppb_ecommerce_mawb($token,$mawb=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		if(!is_null($mawb))$this->db7->where('mawb',$mawb);
		//$this->db7->where('token',$token);		
		$query = $this->db7->get('imp_sppb_ecommerce');
		return $query->result();
	}
	
	public function list_imp_sppb_ecommerce_sppb($token,$sppb=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		if(!is_null($sppb))$this->db7->like('sppb',$sppb);
		//$this->db7->where('token',$token);		
		$query = $this->db7->get('imp_sppb_ecommerce');
		return $query->result();
	}
	
	public function list_totalHAWB($token,$MasterAWB=null)
	{
		$this->db7->select('COUNT(DISTINCT hostAWB) AS Totalhawb,MasterAWB');
		if(!is_null($MasterAWB))$this->db7->like('MasterAWB',$MasterAWB);
		$this->db7->where('MasterAWB NOT IN (select DISTINCT MasterAWB FROM imp_invoicepecahpos where void=0)');
		$this->db7->where('token',$token);
		$this->db7->group_by('MasterAWB');
		$query = $this->db7->get('imp_hostawb');
		return $query->result();
	}
	
	public function list_inv_dokument_ATA_MasterAWB($token,$MasterAWB=null)
	{
		$type_inv='ATA';
		$this->db7->select('*');
		if(!is_null($MasterAWB))$this->db7->like('MasterAWB',$MasterAWB);
		$this->db7->where('token',$token);
		$this->db7->where('type_inv',$type_inv);
		$query = $this->db7->get('imp_invoicepecahpos');
		return $query->result();
	}
	
	
	public function list_inv_pecahpos_MasterAWB($token,$MasterAWB=null)
	{
		$type_inv='POS';
		$this->db7->select('*');
		if(!is_null($MasterAWB))$this->db7->like('MasterAWB',$MasterAWB);
		$this->db7->where('token',$token);
		$this->db7->where('type_inv',$type_inv);
		$query = $this->db7->get('imp_invoicepecahpos');
		return $query->result();
	}
	
	public function proc_insert_impbc11($MasterAWB)
	{
		$query=$this->db8->query("CALL insert_imp_bc11('".$MasterAWB."');"); 
	}
}