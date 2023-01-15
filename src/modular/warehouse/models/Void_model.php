<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Void_model extends CI_Model
{
	
	private $db7;
    function __construct()
    {
        parent::__construct();			
		$this->db7 = $this->load->database('rdwarehouse_jkt', TRUE);	
    }
	
	public function void_eks_booking($MasterAWB)
	{
		$query=$this->db7->query("CALL void_eks_booking('".$MasterAWB."',@void_validate);");   
		$query=$this->db7->query("SELECT @void_validate;");
		return $query->result();
	}
	
	public function void_eks_approval($MasterAWB,$HostAWB)
	{
		$query=$this->db7->query("CALL void_eks_approval('".$MasterAWB."','".$HostAWB."',@void_validate);"); 
		$query=$this->db7->query("SELECT @void_validate;");		
		return $query->result();
	}
	
	public function void_eks_weighingheader($ProofNumber)
	{
		$query=$this->db7->query("CALL void_eks_weighing('".$ProofNumber."',@void_validate);");   
		$query=$this->db7->query("SELECT @void_validate;");				
		return $query->result();
	}
	
	public function void_eks_invoice($InvoiceNumber)
	{
		$query=$this->db7->query("CALL void_eks_invoice('".$InvoiceNumber."',@void_validate);");     
		$query=$this->db7->query("SELECT @void_validate;");	
		return $query->result();
	}
	
	public function void_imp_breakdown($BreakdownNumber)
	{
		$query=$this->db7->query("CALL void_eks_buildup('".$BreakdownNumber."',@void_validate);"); 
		$query=$this->db7->query("SELECT @void_validate;");	
		return $query->result();
	}
	
	public function void_imp_breakdown_detail($BreakdownNumber,$noid)
	{
		$query=$this->db7->query("CALL void_imp_breakdowndetail('".$BreakdownNumber."','".$noid."',@void_validate);");  
		$query=$this->db7->query("SELECT @void_validate;");		
		return $query->result();
	}
	
	public function void_imp_obheader($BreakdownNumber)
	{
		$query=$this->db7->query("CALL void_imp_obheader('".$BreakdownNumber."',@void_validate);");
		$query=$this->db7->query("SELECT @void_validate;");		
		return $query->result();
	}
	
	public function void_imp_obdetail($BreakdownNumber,$MasterAWB)
	{
		$query=$this->db7->query("CALL void_imp_obdetail('".$BreakdownNumber."','".$MasterAWB."',@void_validate);");  
		$query=$this->db7->query("SELECT @void_validate;");		
		return $query->result();
	}
	
	public function void_imp_deliorderheader($DONumber)
	{
		$query=$this->db7->query("CALL void_imp_deliveryorder('".$DONumber."',@void_validate);"); 
		$query=$this->db7->query("SELECT @void_validate;");		
		return $query->result();
	}
	
	public function void_imp_invoice($InvoiceNumber)
	{
		$query=$this->db7->query("CALL void_imp_invoice('".$InvoiceNumber."',@void_validate);");  
		$query=$this->db7->query("SELECT @void_validate;");		
		return $query->result();
	}
	
	public function void_imp_pod($TravelNumber)
	{
		$query=$this->db7->query("CALL void_imp_pod('".$TravelNumber."',@void_validate);");   
		$query=$this->db7->query("SELECT @void_validate;");	
		return $query->result();
	}
	
}