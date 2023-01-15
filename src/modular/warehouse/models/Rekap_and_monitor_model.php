<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rekap_and_monitor_model extends CI_Model
{
	
	private $db7;
    function __construct()
    {
        parent::__construct();			
		$this->db7 = $this->load->database('rdwarehouse_jkt_read', TRUE);	
    }
	
	public function monitoring_imp_dlv($thisdate)
	{
		$this->db7->select('*');    
		$this->db7->from('imp_deliorderheader');
		$this->db7->join('imp_deliorderdetail', 'imp_deliorderheader.DONumber = imp_deliorderdetail.DONumber');
		$this->db7->where('imp_deliorderdetail.void=0');
		$this->db7->where('imp_deliorderheader.void=0');
		$this->db7->where('DateOfBreakdown<',$thisdate);
		$this->db7->where("InvoiceNumber='' OR InvoiceNumber IS NULL ");
		$query = $this->db7->get();
		return $query->result();
	}
	
	public function monitoring_breakdownn_for_delivery($namatable)
	{
		$this->db7->select('*'); 
		if ($namatable== 'imp_breakdowndetail')
		{
			
			
		}
		else 
		{			
		$this->db7->from('imp_deliorderheader');
		$this->db7->join('imp_deliorderdetail', 'imp_deliorderheader.DONumber = imp_deliorderdetail.DONumber');
		$this->db7->where('imp_deliorderdetail.void=0');
		$this->db7->where('imp_deliorderheader.void=0');
		$this->db7->where('DateOfBreakdown<',$thisdate);
		$this->db7->where("InvoiceNumber='' OR InvoiceNumber IS NULL ");
		$query = $this->db7->get();
		return $query->result();
		}
	}
	public function rekapitulasi_Invoice_additional($token,$warehousecode,$datefrom,$dateuntil,$timefrom,$timeuntil)
	{
		
		if ($datefrom == $dateuntil)
		{
			$this->db7->where('DateOfTransaction=',$datefrom);
			$this->db7->where("TimeOfTransaction between'".$timefrom."' and '".$timeuntil."'");
			$this->db7->where('token',$token);
		}
		else
		{
			$this->db7->where("DateOfTransaction='".$datefrom."' AND TimeOfTransaction>='".$timefrom."' AND token='".$token."'");
			$this->db7->or_where("DateOfTransaction='".$dateuntil."' AND TimeOfTransaction<='".$timeuntil."' AND token='".$token."'");
		}
		
		if ($warehousecode=='WHIMP')
		{
			$this->db7->select('*');	
			$type_inv = array('PPOS', 'ATA','BTT');
			$this->db7->select(",(select concat(airlinescode,FlightNumber,' ',OriginCode) from imp_obdetail where BreakdownNumber = imp_invoicepecahpos.referensi union select concat(airlinescode,FlightNumber,' ',OriginCode) from imp_breakdowndetail where BreakdownNumber = imp_invoicepecahpos.referensi ) AS flight_dest ");	
			
		}
		else
		{
			$type_inv = array('BARC','CFHL','CFWB');			
			$this->db7->select("*,(SELECT CONCAT(FlightNumber,' ',Destination) FROM eks_weighingheader WHERE invoicenumber = imp_invoicepecahpos.referensi) AS flight_dest");
		
		}
		$this->db7->where_in('type_inv',$type_inv);	
		$query = $this->db7->get('imp_invoicepecahpos');
		return $query->result();
	}
	
	
	
	public function rekapitulasi_Invoice($token,$warehousecode,$datefrom,$dateuntil,$timefrom,$timeuntil)
	{
		$this->db7->select('*');
		if ($datefrom == $dateuntil)
		{
			$this->db7->where('DateOfTransaction=',$datefrom);
			$this->db7->where("TimeOfTransaction between'".$timefrom."' and '".$timeuntil."'");
			$this->db7->where('token',$token);
		}
		else
		{
			$this->db7->where("DateOfTransaction='".$datefrom."' AND TimeOfTransaction>='".$timefrom."' AND token='".$token."'");
			$this->db7->or_where("DateOfTransaction='".$dateuntil."' AND TimeOfTransaction<='".$timeuntil."' AND token='".$token."'");
		}
		$this->db7->order_by('DateOfTransaction,TimeOfTransaction');
		if ($warehousecode=='WHIMP')
		{
			$this->db7->from('imp_invoiceheader');
		}
		else if ($warehousecode=='WHEKP')
		{
			$this->db7->from('eks_invoiceheader');
		}
		else if ($warehousecode=='WHINC')
		{
			$this->db7->from('inc_invoiceheader');
		}
		else if ($warehousecode=='WHOUT')
		{
			$this->db7->from('out_invoiceheader');
		}
		$query = $this->db7->get();
		return $query->result();
	}
	
	public function rekapitulasi_weighing($token,$warehousecode,$datefrom,$dateuntil,$timefrom,$timeuntil)
	{
		$this->db7->select('*');
		if ($datefrom == $dateuntil)
		{
			$this->db7->where('DateOfEntry=',$datefrom);
			$this->db7->where("TimeofEntry between'".$timefrom."' and '".$timeuntil."'");
		}
		else
		{
			$this->db7->where("DateOfEntry='".$datefrom."' AND TimeofEntry>='".$timefrom."'");
			$this->db7->or_where("DateOfEntry='".$dateuntil."' AND TimeofEntry<='".$timeuntil."'");
		}
		
		$this->db7->where('token',$token);
		
		if ($warehousecode=='WHEKP')
		{
			$this->db7->from('eks_weighingheader');
		}
		else if ($warehousecode=='WHOUT')
		{
			$this->db7->from('out_weighingheader');
		}
		$query = $this->db7->get();
		return $query->result();
	}
	
}