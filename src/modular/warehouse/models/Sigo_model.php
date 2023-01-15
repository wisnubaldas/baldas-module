<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sigo_model extends CI_Model
{
	private $db7;	
    function __construct()
    {
        parent::__construct();			
		$this->db7 = $this->load->database('rdwarehouse_jkt_read', TRUE);	
    }
	
	public  function imp_header($token,$Invoicenumber)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		$this->db7->where('Invoicenumber',$Invoicenumber);
		$this->db7->where('token',$token);
		$query = $this->db7->get('imp_invoiceheader');
		return $query->result();
	}
	
	public  function imp_detail($token,$Invoicenumber)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		$this->db7->where('Invoicenumber',$Invoicenumber);
		$this->db7->where('token',$token);
		$query = $this->db7->get('imp_invoicedetail');
		return $query->result();
	}

	public  function eks_header($token,$Invoicenumber)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		$this->db7->where('Invoicenumber',$Invoicenumber);
		$this->db7->where('token',$token);
		$query = $this->db7->get('sigo_eks_invoiceheader');
		return $query->result();
	}
	
	public  function eks_detail($token,$Invoicenumber)
	{
		$this->db7->distinct();
		$this->db7->select('*');
		$this->db7->where('Invoicenumber',$Invoicenumber);
		$this->db7->where('token',$token);
		$query = $this->db7->get('sigo_eks_invoicedetail');
		return $query->result();
	}
	
	public function list_sigo_invoiceheader($token,$DateOfTransaction)
	{
		$this->db7->distinct();
		$this->db7->select('*');	
		$this->db7->where('DateOfTransaction',$DateOfTransaction);	
		$this->db7->where('token',$token);
		$this->db7->where('void=0');
		$this->db7->order_by('DateOfTransaction');	
		$query = $this->db7->get('sigo_eks_invoiceheader');
		return $query->result();	
	}
	
}