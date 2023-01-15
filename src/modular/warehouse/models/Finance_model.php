<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Finance_model extends CI_Model
{
	private $db7;
	private $db8;
    function __construct()
    {
        parent::__construct();			
		$this->db7 = $this->load->database('rdwarehouse_jkt_read', TRUE);	
    }
	
	public function drsc_import($shifname,$dateDRSC,$PaymentCode,$token)
	{
		$query=$this->db7->query("CALL Get_drsc_import('".$shifname."','".$dateDRSC."','".$PaymentCode."','".$token."');");
		return $query->result();
	}
	
	public function drsc_ekspor($shifname,$dateDRSC,$PaymentCode,$token)
	{
		$query=$this->db7->query("CALL Get_DRSC_ekspor('".$shifname."','".$dateDRSC."','".$PaymentCode."','".$token."');");
		return $query->result();
	}
	
	public function list_basicprice($LocationCode,$WarehouseCode,$AgreementCode,$Datetransaction,$totOverstay)
	{
		$this->db7->distinct();
		$this->db7->select('*');		
		$this->db7->where('LocationCode',$LocationCode);
		$this->db7->where('WarehouseCode',$WarehouseCode);
		$this->db7->where('AgreementCode',$AgreementCode);
		$this->db7->where('Datefrom<=',$Datetransaction);
		$this->db7->where('DateUntil>=',$Datetransaction);
		$this->db7->where('startday<=',$totOverstay);
		$this->db7->where('untilday>=',$totOverstay);
		$query = $this->db7->get('fare_directory');
		return $query->result();
		
	}
	
	public function list_aggrement($WarehouseCode,$DatabaseCode,$kd_gudang)
	{
		$this->db7->distinct();
		$this->db7->select('a.agreementcode,a.descriptionagreement');
		$this->db7->from('fare_agree a');
		$this->db7->join('fare_agreelog b','b.agreementcode=a.agreementcode','inner');
		$this->db7->where('warehouseCode=',$WarehouseCode);		
		$this->db7->where('DatabaseCode=',$DatabaseCode);
		$this->db7->where('kd_gudang=',$kd_gudang);
		$query = $this->db7->get();
		return $query->result();
	}
	
	public function list_directory($WarehouseCode,$AgreementCode)
	{
		$this->db7->distinct();
		$this->db7->select('*');		
		$this->db7->where('WarehouseCode=',$WarehouseCode);
		$this->db7->where('AgreementCode=',$AgreementCode);
		$query = $this->db7->get('fare_directory');
		return $query->result();
	}
	
	public function list_pajakBynumber($token,$TaxAwal,$TaxAkhir)
	{
		//$query=$this->db7->query("CALL Get_DataPajakbyNumber('".$TaxAwal."','".$TaxAkhir."')");
		$this->db7->distinct();
		$this->db7->select('*');		
		$this->db7->where('void=0');
		$this->db7->where('token',$token);
		$this->db7->where("FakturNumber >='".URLDECODE($TaxAwal)."' AND FakturNumber  <='".URLDECODE($TaxAkhir)."'");
		$query = $this->db7->get('tax_transaction');
		return $query->result();
	}
	
	public function totalfaktur($warehouse_npwp)
	{
		$this->db7->distinct();
		$this->db7->select('COUNT(noid) AS totalnumber');
		$this->db7->where('void=0');
		$this->db7->where('warehouse_npwp',$warehouse_npwp);
		$this->db7->where("invoicenumber IS NULL or invoicenumber =''");
		$query = $this->db7->get('mst_tax');
		return $query->result();
	}
	
	public function list_pajakBydate($token,$DateFrom,$DateUntil)
	{
		//$query=$this->db7->query("CALL Get_DataPajakbyDate('".$token."','".$DateFrom."','".$DateUntil."');");
		$this->db7->distinct();
		$this->db7->select("a.*,b.HostMAWB");
		$this->db7->from('tax_transaction a');
		$this->db7->join('imp_invoicedetail b','b.InvoiceNumber = a.InvoiceNumber','inner');
		$this->db7->where('a.token',$token);
		$this->db7->where("DateOfFaktur >='".URLDECODE($DateFrom)."' AND DateOfFaktur  <='".URLDECODE($DateUntil)."'");
		$this->db7->where('a.void=0');
		$query_1 = $this->db7->get_compiled_select();
		
		$this->db7->distinct();
		$this->db7->select('a.*,b.ProofNumber AS HostMAWB ');
		$this->db7->from('tax_transaction a');
		$this->db7->join('eks_invoicedetail b','b.InvoiceNumber = a.InvoiceNumber','inner');
		$this->db7->where('a.token',$token);
		$this->db7->where("DateOfFaktur >='".URLDECODE($DateFrom)."' AND DateOfFaktur  <='".URLDECODE($DateUntil)."'");
		$this->db7->where('a.void=0');
		$query_2 = $this->db7->get_compiled_select();
		$query = $this->db7->query($query_1 . ' UNION ' . $query_2);
		return $query->result();
	}
	
	public function deposit_invoice($InvoiceNumber)
	{
		$this->db7->distinct();
		$this->db7->select('*');		
		$this->db7->where('InvoiceNumber=',$InvoiceNumber);
		$query = $this->db7->get('mst_depositdetail');
		return $query->result();
	}
	
	public function list_depositheader($DepositCode)
	{
		$this->db7->distinct();
		$this->db7->select('*');		
		$this->db7->where('DepositCode=',$DepositCode);
		$query = $this->db7->get('mst_depositheader');
		return $query->result();
	}
	
	public function Summary_deposit($WarehouseCode,$DepositCode,$firstdate)
	{
		$query=$this->db7->query("CALL Get_data_deposit('".$DepositCode."','".$WarehouseCode."','".$firstdate."')");
		return $query->result();
	}
	
	public function list_depositdetail($WarehouseCode,$DepositCode,$firstdate,$lastdate)
	{
		$this->db7->distinct();
		$this->db7->select('*');		
		$this->db7->where('WarehouseCode=',$WarehouseCode);
		$this->db7->where('DepositCode=',$DepositCode);
		$this->db7->where('DateOfTransaction>=',$firstdate);
		$this->db7->where('DateOfTransaction<=',$lastdate);
		$this->db7->order_by('DateOfTransaction');
		$this->db7->order_by('TimeOfTransaction');
		$query = $this->db7->get('mst_depositdetail');
		return $query->result();
		
	}
	
	public function list_depositnominal($DepositCode,$WarehouseCode=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');		
		if(!is_null($WarehouseCode))$this->db7->where('WarehouseCode',$WarehouseCode);
		$this->db7->where('WarehouseCode=',$WarehouseCode);
		$this->db7->where('DepositCode=',$DepositCode);
		$query = $this->db7->get('mst_depositnominal');
		return $query->result();
		
	}
	
	public function list_depositor($udepositor=null)
	{
		$this->db7->distinct();
		$this->db7->select('a.*,c.CompanyName');
		$this->db7->from('mst_depositheader a');
		$this->db7->join('mst_customer c','a.DepositCode=c.CustomerCode','inner');
		if(!is_null($udepositor))$this->db7->like('CompanyName',$udepositor);		
		$query = $this->db7->get();
		return $query->result();
		
	}
	
	public function nomor_tax($warehouse_npwp)
	{
		$this->db7->distinct();
		$this->db7->select('*');		
		$this->db7->where("invoicenumber IS NULL OR invoicenumber =''");
		$this->db7->where('void=0');
		$this->db7->where('warehouse_npwp=',$warehouse_npwp);
		$this->db7->order_by('taxnumber');
		$this->db7->limit(1);
		$query = $this->db7->get('mst_tax');
		return $query->result();
	}
	
	public function list_fare_actived($WarehouseCode=null)
	{
		$this->db7->distinct();
		$this->db7->select('*');		
		if(!is_null($WarehouseCode))$this->db7->where('WarehouseCode',$WarehouseCode);
		$this->db7->where('WarehouseCode=',$WarehouseCode);			
		$query = $this->db7->get('fare_actived');
		return $query->result();
	}
	
	public function fare_item($itemcode)
	{
		$this->db7->distinct();
		$this->db7->select('*');		
		$this->db7->where('itemcode=',$itemcode);
		$query = $this->db7->get('fare_item');
		return $query->result();
	}
		
}