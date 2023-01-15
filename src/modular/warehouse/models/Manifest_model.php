<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manifest_model extends CI_Model
{
	
	private $db7;
    function __construct()
    {
        parent::__construct();			
		$this->db7 = $this->load->database('rdwarehouse_jkt_read', TRUE);	
    }
	
	public function inward_manifest($AirlinesCode,$FlightNo,$dateflight)
	{
		$this->db7->select('*');    
		$this->db7->where('void=0');		
		$this->db7->where('AirlinesCode',$AirlinesCode);
		$this->db7->where('FlightNo',$FlightNo);
		$this->db7->where('dateflight',$dateflight);
		$this->db7->from('manifest_inward');
		$query = $this->db7->get();
		return $query->result();
	}
	
	public function user_reg()
	{
		$this->db7->select('*');    		
		$this->db7->where('void=0');
		$this->db7->from('manifest_user');		
		$query = $this->db7->get();
		return $query->result();
	}
	
	
	
	
	
}