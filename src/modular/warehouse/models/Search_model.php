<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search_model extends CI_Model
{
	
	private $db7;
    function __construct()
    {
        parent::__construct();			
		$this->db7 = $this->load->database('rdwarehouse_jkt_read', TRUE);	
    }

	public function cari_import_mawb($MasterAWB=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');		
		if(!is_null($MasterAWB))$this->db7->where("MasterAWB like '%".URLDECODE($MasterAWB)."%'");	
		$query = $this->db7->get('imp_masterwaybill');
		return $query->result();
	}
	
	public function cari_import_hawb($MasterAWB,$HostAWB=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');		
		$this->db7->where("MasterAWB like '%".URLDECODE($MasterAWB)."%'");	
		if(!is_null($HostAWB))$this->db7->where("HostAWB like '%".URLDECODE($HostAWB)."%'");	
		$query = $this->db7->get('imp_hostawb');
		return $query->result();
	}
	
	public function cari_ekspor_mawb($MasterAWB=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');		
		if(!is_null($MasterAWB))$this->db7->where("MasterAWB like '%".URLDECODE($MasterAWB)."%'");				
		$query = $this->db7->get('eks_masterwaybill');
		return $query->result();
	}

	public function cari_ekspor_hawb($MasterAWB=null,$HostAWB=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');		
		if(!is_null($MasterAWB))$this->db7->where("MasterAWB like '%".URLDECODE($MasterAWB)."%'");	
		if(!is_null($HostAWB))$this->db7->where("HostAWB like '%".URLDECODE($HostAWB)."%'");			
		$query = $this->db7->get('eks_hostawb');
		return $query->result();
	}
	
	public function cari_import_delivery($MasterAWB,$HostAWB=null)
	{
		$this->db7->select('a.DONumber,a.MasterAWB,a.bc11,a.tglbc11,a.ConsigneeCode,a.nopos,a.InvoiceNumber,a.void,b.AirlinesCode,b.FlightNumber,b.OriginCode,b.HostMAWB,b.Pieces,b.Netto,b.Volume,b.KindOfCode');
		$this->db7->from('imp_deliorderheader a');
		$this->db7->join('imp_deliorderdetail b','a.DONumber= b.DONumber','inner');
		$this->db7->where('a.MasterAWB',$MasterAWB);	
		if(!is_null($HostAWB))$this->db7->where('b.HostMAWB',$HostAWB);
		$query=$this->db7->get();
		return $query->result();
	}
	
	public function cari_import_invoice($MasterAWB,$HostAWB=null)
	{
		$this->db7->select('a.InvoiceNumber,a.DRSCNumber,a.PaymentCode,a.AgreementCode,a.TaxNumber,a.ShiftCode,a.SPPB,a.tglSPPB,b.DeliveryOrderNumber,b.Pieces,b.CAW,b.Netto,b.OverStay');
		$this->db7->from('imp_invoiceheader a');
		$this->db7->join('imp_invoicedetail b','a.InvoiceNumber = b.InvoiceNumber','inner');
		$this->db7->where('MasterAWB',$MasterAWB);	
		if(!is_null($HostAWB))$this->db7->where('HostMAWB',$HostAWB);
		$query=$this->db7->get();
		return $query->result();
	}
	
	public function cari_import_pod($MasterAWB,$HostAWB=null)
	{
		$this->db7->select('a.TravelNumber,a.InvoiceNumber,a.EmployeeNumber,a.ConsigneeCode,a.DLV,b.MasterAWB,b.HostAWB,b.KindOfGood,b.Pieces,b.Netto,b.Volume,b.token');
		$this->db7->from('imp_podheader a');
		$this->db7->join('imp_poddetail b','a.TravelNumber= b.TravelNumber','inner');
		$this->db7->where('MasterAWB',$MasterAWB);	
		if(!is_null($HostAWB))$this->db7->where('HostAWB',$HostAWB);
		$query=$this->db7->get();
		return $query->result();
	}
	
	public function cari_import_SO($hawb)
	{
		$this->db7->select('*');
		$this->db7->where('hawb',$hawb);
		$query = $this->db7->get('imp_scan_c1');
		return $query->result();
	}
	
	public function cari_eks_hawb($HostAWB=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');		
		if(!is_null($HostAWB))$this->db7->where("HostAWB like '%".URLDECODE($HostAWB)."%'");
		$query = $this->db7->get('eks_hostawb');
		return $query->result();
	}
	
	public function cari_imp_hawb($HostAWB=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');		
		if(!is_null($HostAWB))$this->db7->where("HostAWB like '%".URLDECODE($HostAWB)."%'");
		$query = $this->db7->get('imp_hostawb');
		return $query->result();
	}
	
	
	public function cari_ekspor_weighing($MasterAWB,$HostAWB=null)
	{
		$this->db7->select('b.ProofNumber,b.MasterAWB,b.HostAWB,b.Pieces,b.Pallet,b.GrossWeight,b.NettoWeight,b.CAW,b.StorageRoom,b.DG,b.KindOfNature,a.AirlinesCode,a.Origin,a.Destination,a.FlightNumber,a.ShipperCode,a.AgenCode,a.ConsigneeCode,a.TotalVolume');
		$this->db7->from('eks_weighingheader a');
		$this->db7->join('eks_weighingdetail b','a.ProofNumber = b.ProofNumber','inner');
		$this->db7->where('b.MasterAWB',$MasterAWB);	
		if(!is_null($HostAWB))$this->db7->where('b.HostAWB',$HostAWB);
		$query=$this->db7->get();
		return $query->result();
	}
	
	public function cari_ekspor_invoice($MasterAWB,$ProofNumber=null)
	{
		$this->db7->select('a.InvoiceNumber,a.DRSCNumber,a.PaymentCode,a.AgreementCode,a.TaxNumber,a.CustomerCode,b.Pieces,b.CAW,b.Netto,b.OverStay');
		$this->db7->from('eks_invoiceheader a');
		$this->db7->join('eks_invoicedetail b','a.InvoiceNumber = b.InvoiceNumber','inner');
		$this->db7->where('MasterAWB',$MasterAWB);	
		if(!is_null($ProofNumber))$this->db7->where('ProofNumber',$ProofNumber);
		$query=$this->db7->get();
		return $query->result();
	}

	public function cari_ekspor_buildup($MasterAWB)
	{
		$this->db7->select('*');
		$this->db7->where('MasterAWB',$MasterAWB);	
		$query = $this->db7->get('eks_buildupdetail');
		return $query->result();
		
		
	}
}	
	
