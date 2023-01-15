<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Status_cloud_model extends CI_Model
{
	
	private $db20;
	private $db30;
    function __construct()
    {
        parent::__construct();				
		$this->db20 = $this->load->database('db_tpsonline_read', TRUE);
		$this->db30 = $this->load->database('db_tpsonline', TRUE);	
		
    }
	
	public function full_Check_status($tps,$id_first)
	{
		$this->db20->select('*');   
		$this->db20->where('tps',$tps);		
		$this->db20->where('id_>=',$id_first);		
		$this->db20->from('th_inbound');
		$this->db20->limit(20);
		$query = $this->db20->get();
		return $query->result();
	}
	
	public function total_inbound_delivery_aircarft($id_header,$status_date,$status_time,$airline_code,$flight_no,$origin,$dest)
	{
		$this->db20->select('count(a.id_) as Total');   
		$this->db20->from('th_inbound a');
		$this->db20->join('td_inbound_delivery_aircarft b','a.id_ = b.id_header','inner');
		$this->db20->where('b.status_date',$status_date);
		$this->db20->where('b.status_time',$status_time);
		$this->db20->where('a.airline_code',$airline_code);
		$this->db20->where('a.flight_no',$flight_no);
		$this->db20->where('a.origin',$origin);
		$this->db20->where('a.dest',$dest);
		$query = $this->db20->get();
		return $query->result();
	}
	
	public function check_th_inbound_international($waybill_smu,$hawb=null)
	{
		$this->db20->select('*'); 
		$this->db20->where('waybill_smu',$waybill_smu);
		if(!is_null($hawb))$this->db20->where('hawb',$hawb);
		$this->db20->limit(10);
		$this->db20->from('th_inbound');
		$query = $this->db20->get();
		return $query->result();
	}
	
	public function check_th_outbond_international($waybill_smu,$hawb=null)
	{
		$this->db20->select('*'); 
		$this->db20->where('waybill_smu',$waybill_smu);
		if(!is_null($hawb))$this->db20->where('hawb',$hawb);
		$this->db20->limit(10);
		$this->db20->from('th_outbond');
		$query = $this->db20->get();
		return $query->result();
	}
	
	public function check_th_inbound_domestik($waybill_smu=null)
	{
		$this->db20->select('*'); 
		if(!is_null($waybill_smu))$this->db20->where('waybill_smu',$waybill_smu);
		$this->db20->limit(10);
		$this->db20->from('th_inbound');
		$query = $this->db20->get();
		return $query->result();
	}
	
	public function check_th_outbond_domestik($waybill_smu=null)
	{
		$this->db20->select('*'); 
		if(!is_null($waybill_smu))$this->db20->where('waybill_smu',$waybill_smu);
		$this->db20->limit(10);
		$this->db20->from('th_outbond');
		$query = $this->db20->get();
		return $query->result();
	}
	
	public function update_dinamis($namatable,$namafield,$isifield,$namacode,$nilaicode)
	{
		$data = array(
			$namafield => $isifield
		);
		$this->db30->where($namacode,$nilaicode);	
		$this->db30->update($namatable,$data);
	}
	
}