<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Plp_model extends CI_Model
{
	
	private $db4;
    function __construct()
    {
        parent::__construct();			
		$this->db4 = $this->load->database('tpsonline_mau_read', TRUE);	
    }
	
	public function show_mohon_plp($id_mohon=null)
	{
		$this->db4->select('*');    
		if(!is_null($id_mohon))$this->db4->where('id_mohon>=',$id_mohon);	
		$this->db4->from('mohon_plp');
		$this->db4->order_by('id_mohon');	
		$this->db4->limit(50);
		$query = $this->db4->get();
		return $query->result();
	}
	
	public function show_batal_plp($id_batal=null)
	{
		$this->db4->select('*');    
		if(!is_null($id_batal))$this->db4->where('id_batal>=',$id_batal);	
		$this->db4->from('batal_plp');
		$this->db4->order_by('id_batal');	
		$this->db4->limit(50);
		$query = $this->db4->get();
		return $query->result();
	}
	
	public function  respon_mohon_plp($no_bl_awb)
	{
		$this->db4->select("mohon_resp_plp_tuj.Noid,kd_kantor,kd_tps_asal,kd_tps_tujuan,gudang_asal,gudang_tujuan,no_plp,tgl_plp,alasan_reject,call_sign,nm_angkut,no_voy_flight,tgl_tiba,no_bc11,tgl_bc11,no_pos_bc11,consignee,no_surat,tgl_surat,jns_kms,jml_kms,no_bl_awb,tgl_bl_awb,status_gatein,fl_setuju,berat_manual"); 
		$this->db4->from('mohon_resp_plp_tuj_det');
		$this->db4->join('mohon_resp_plp_tuj','mohon_resp_plp_tuj_det.id_header=mohon_resp_plp_tuj.Noid');
		$this->db4->where('no_bl_awb',$no_bl_awb);
		$query = $this->db4->get();
		return $query->result();
		
	}
	public function show_respon_mohon_plp($typeshow,$noid)
	{
		$this->db4->select('*');   
		if ( $typeshow == 'SATUAN' )
		{
			$this->db4->where('noid=',$noid);
		} else
		{
			$this->db4->where('noid>=',$noid);
		}
		$this->db4->from('mohon_resp_plp_tuj');
		$this->db4->order_by('noid');	
		$this->db4->limit(50);
		$query = $this->db4->get();
		return $query->result();
	}
	
	public function show_respon_batal_plp($typeshow,$noid)
	{
		$this->db4->select('*'); 
		if ($typeshow == 'SATUAN')	
		{
			$this->db4->where('noid=',$noid);
		}
		else
		{
			$this->db4->where('noid>=',$noid);
		}
		$this->db4->from('batal_resp_plp_tuj');
		$this->db4->order_by('noid');	
		$this->db4->limit(50);
		$query = $this->db4->get();
		return $query->result();
	}
	
	public function show_ref_mohon()
	{
		$this->db4->select('id_mohon,ref_number,gudang_tujuan'); 
		$this->db4->where("ref_number not in (select ref_number from mohon_resp_plp_tuj)");
		$this->db4->from('mohon_plp');
		$this->db4->order_by('id_mohon');	
		$this->db4->limit(50);
		$query = $this->db4->get();
		return $query->result();
	}
	
	public function show_ref_batal()
	{
		$this->db4->select('id_batal,ref_number'); 
		$this->db4->where("ref_number not in (select ref_number from batal_resp_plp_tuj)");
		$this->db4->from('batal_plp');
		$this->db4->order_by('id_batal');	
		$this->db4->limit(50);
		$query = $this->db4->get();
		return $query->result();
	}
	
	public function respon_mohon_plp_gatein()
	{
		$this->db4->select('*');   
		$this->db4->where('status_gatein=0');
		$this->db4->from('mohon_resp_plp_tuj');
		$this->db4->limit(1);
		$query = $this->db4->get();
		return $query->result();
	}
	
	
	
}