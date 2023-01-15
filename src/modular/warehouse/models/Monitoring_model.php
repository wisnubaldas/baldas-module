<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Monitoring_model extends CI_Model
{
	private $db7;	
    function __construct()
    {
        parent::__construct();			
		$this->db7 = $this->load->database('rdwarehouse_jkt_read', TRUE);	
    }
	
	public function list_weighing_no_invoice();
	{
		$this->db7->distinct();
		$this->db7->select('*');		
		$this->db7->where('void=0');
		$this->db7->where("invoicenumber='' OR invoicenumber IS null");
		$query = $this->db7->get('eks_weighingheader');
		return $query->result();
	}
	
	
}	
	
