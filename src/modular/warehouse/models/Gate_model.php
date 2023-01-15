<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gate_model extends CI_Model
{
	private $db4;
	private $db7;
	private $db8;
    function __construct()
    {
        parent::__construct();			
		$this->db3 = $this->load->database('tpsonline_mau_read', TRUE);
		$this->db4 = $this->load->database('tpsonline_mau', TRUE);
		$this->db7 = $this->load->database('rdwarehouse_jkt', TRUE);
		$this->db8 = $this->load->database('rdwarehouse_jkt_read', TRUE);
		$this->db5 = $this->load->database('db_tpsonline', TRUE);
		$this->db6 = $this->load->database('db_tpsonline_read', TRUE);
    }
	// ***************  show tps online ******************************
	
	
	public function keterangan_dokumen($nilai)
	{
		$this->db6->select('*');    		
		$this->db6->distinct();
		$this->db6->where('nilai',$nilai);
		$this->db6->limit(1);
		$this->db6->from('m_kd_dok_inout');
		$query = $this->db6->get();
		return $query->result();
	}
	
	public function dokumen_gudang_out($NO_BL_AWB)
	{
		$this->db6->select("NO_BL_AWB,NO_MASTER_BL_AWB,NM_IMP,KD_DOK_INOUT,NO_DOK_INOUT,TGL_DOK_INOUT,'' AS NO_SEGEL");
		$this->db6->select("'' AS TGL_SEGEL,NO_DAFTAR,TGL_DAFTAR,getbrgkiriman_sppb_kms.CAR AS CAR");
		$this->db6->select("getbrgkiriman_sppb_kms.JNS_KMS AS JNS_KMS");
		$this->db6->where('NO_BL_AWB',$NO_BL_AWB);
		$this->db6->where("flag_out='0'");		
		$this->db6->like('TGL_DOK_INOUT','202');			
		$this->db6->from('getbrgkiriman_sppb');
		$this->db6->join('getbrgkiriman_sppb_kms', 'getbrgkiriman_sppb.CAR = getbrgkiriman_sppb_kms.CAR');		
		$query1 = $this->db6->get_compiled_select();
		
		$this->db6->select("NO_BL_AWB,NO_MASTER_BL_AWB, NAMA_IMP AS NM_IMP,'1' AS KD_DOK_INOUT, NO_SPPB AS NO_DOK_INOUT");
		$this->db6->select("TGL_SPPB AS TGL_DOK_INOUT,'' AS NO_SEGEL,'' AS TGL_SEGEL,NO_PIB AS NO_DAFTAR");
		$this->db6->select("TGL_PIB AS TGL_DAFTAR,getbc20_sppb_kms.CAR AS CAR,getbc20_sppb_kms.JNS_KMS AS JNS_KMS");
		$this->db6->where('NO_BL_AWB',$NO_BL_AWB);	
		$this->db6->where("flag_out='0'");	
		$this->db6->like('TGL_SPPB','202');
		$this->db6->from('getbc20_sppb');
		$this->db6->join('getbc20_sppb_kms', 'getbc20_sppb.CAR = getbc20_sppb_kms.CAR');		
		$query2 = $this->db6->get_compiled_select();
		
		$this->db6->select("NO_BL_AWB,NO_MASTER_BL_AWB, NAMA_IMP AS NM_IMP,'2' AS KD_DOK_INOUT, NO_SPPB AS NO_DOK_INOUT");
		$this->db6->select("TGL_SPPB AS TGL_DOK_INOUT,NO_SEGEL,TGL_SEGEL,NO_PIB AS NO_DAFTAR,TGL_PIB AS TGL_DAFTAR");
		$this->db6->select("getbc23_sppb_kms.CAR AS CAR,getbc23_sppb_kms.JNS_KMS AS JNS_KMS");		
		$this->db6->where('NO_BL_AWB',$NO_BL_AWB);	
		$this->db6->like('TGL_SPPB','202');
		$this->db6->from('getbc23_sppb');
		$this->db6->join('getbc23_sppb_kms', 'getbc23_sppb.CAR = getbc23_sppb_kms.CAR');		
		$query3 = $this->db6->get_compiled_select();
		
		$this->db6->select("NO_BL_AWB,NO_MASTER_BL_AWB, NAMA_IMP AS NM_IMP,KD_DOK_INOUT,NO_DOK_INOUT");
		$this->db6->select("TGL_DOK_INOUT,NO_SEGEL,TGL_SEGEL,NO_DAFTAR,TGL_DAFTAR");
		$this->db6->select("getbc16_sppb_kms.CAR AS CAR,getbc16_sppb_kms.JNS_KMS AS JNS_KMS");
		$this->db6->where('NO_BL_AWB',$NO_BL_AWB);	
		$this->db6->like('TGL_DOK_INOUT','202');
		$this->db6->from('getbc16_sppb');
		$this->db6->join('getbc16_sppb_kms', 'getbc16_sppb.CAR = getbc16_sppb_kms.CAR');		 
		$query4 = $this->db6->get_compiled_select();
		
		$this->db6->select("NO_BL_AWB,NO_MASTER_BL_AWB,NM_IMP,KD_DOK_INOUT,NO_DOK_INOUT,TGL_DOK_INOUT");
		$this->db6->select("'' AS NO_SEGEL,'' AS TGL_SEGEL,'' AS NO_DAFTAR,'' AS TGL_DAFTAR");
		$this->db6->select("getsppb_rush_handling_kms.CAR AS CAR,getsppb_rush_handling_kms.JNS_KMS AS JNS_KMS");
		$this->db6->where('NO_BL_AWB',$NO_BL_AWB);	
		$this->db6->like('TGL_DOK_INOUT','202');			
		$this->db6->from('getsppb_rush_handling');
		$this->db6->join('getsppb_rush_handling_kms', 'getsppb_rush_handling.CAR = getsppb_rush_handling_kms.CAR');		 
		$query5 = $this->db6->get_compiled_select();

		$this->db6->select("NO_BL_AWB,NO_MASTER_BL_AWB,NM_IMP,KD_DOK_INOUT,NO_DOK_INOUT,TGL_DOK_INOUT");
		$this->db6->select("'' AS NO_SEGEL,'' AS TGL_SEGEL,'' AS NO_DAFTAR,'' AS TGL_DAFTAR,CAR,JNS_KMS");
		$this->db6->where('NO_BL_AWB',$NO_BL_AWB);	
		$this->db6->like('TGL_DOK_INOUT','202');			
		$this->db6->from('getbcmanual');		
		$query6 = $this->db6->get_compiled_select();

		$query = $this->db6->query($query1 . ' UNION ' . $query2 . ' UNION ' . $query3 . ' UNION ' . $query4 . ' UNION ' . $query5 . ' UNION ' . $query6 );
		return $query->result();
	}
	
	
	public function Check_c1_imp($noid)
	{
		
		$this->db8->select('*');    		
		$this->db8->distinct();
		$this->db8->where('fl_gate=0');
		$this->db8->where('noid >=',$noid);
		$this->db8->limit(5000);
		$this->db8->from('imp_scan_c1');
		$query = $this->db8->get();
		return $query->result();
	}
	
	public function Check_c1_imp_hawb($hawb)
	{
		
		$this->db8->select('*');    		
		$this->db8->distinct();
		$this->db8->where('hawb',$hawb);
		$this->db8->from('imp_scan_c1');
		$query = $this->db8->get();
		return $query->result();
	}
	
	public function m_manifest_detail($token,$no_host_blawb=null)
	{
		$this->db6->select('*');    
		if(!is_null($no_host_blawb))$this->db6->where('no_host_blawb',$no_host_blawb);	
		$this->db6->where('token',$token);	
		$this->db6->from('manifest_detail');
		$query = $this->db6->get();
		return $query->result();
		
	}
	
	public function Check_gateIn_imp($no_bl_awb)
	{
		$this->db3->select('*');    
		$this->db3->where('no_bl_awb',$no_bl_awb);
		$this->db3->from('get_imp_in');
		$query = $this->db3->get();
		return $query->result();
	}
	
	public function Check_gateIn_eks($no_bl_awb)
	{
		$this->db3->select('*');    
		$this->db3->where('no_bl_awb',$no_bl_awb);
		$this->db3->from('get_exp_in');
		$query = $this->db3->get();
		return $query->result();
	}
	
	public function Check_gateOut_imp($no_bl_awb)
	{
		$this->db3->select('*');    
		$this->db3->where('no_bl_awb',$no_bl_awb);
		$this->db3->from('get_imp_out');
		$query = $this->db3->get();
		return $query->result();
	}
	public function Check_gateOut_eks($no_bl_awb)
	{
		$this->db3->select('*');    
		$this->db3->where('no_bl_awb',$no_bl_awb);
		$this->db3->from('get_exp_out');
		$query = $this->db3->get();
		return $query->result();
	}
	
	public function GateOut_sys_lama($limit,$flag_transfer,$id_kms)
	{
		$this->db3->select('*');    
		$this->db3->where('id_kms>=',$id_kms);
		$this->db3->where('flag_transfer',$flag_transfer);
		$this->db3->order_by('id_kms');	
		$this->db3->from('get_imp_out_sys_lama');
		$this->db3->limit($limit);
		$query = $this->db3->get();
		return $query->result();
	}
	
	public function Check_gateIn_sys_lama($no_bl_awb) 
	{
		$this->db3->select('*');    
		$this->db3->where('no_bl_awb',$no_bl_awb);
		$this->db3->from('get_imp_in_sys_lama');
		$query = $this->db3->get();
		return $query->result();
	}
	
	public function GateIn_sys_lama($limit,$flag_transfer,$id_kms)
	{
		$this->db3->select('*');    
		$this->db3->where('id_kms>=',$id_kms);
		$this->db3->where('flag_transfer',$flag_transfer);
		$this->db3->order_by('id_kms');			
		$this->db3->from('get_imp_in_sys_lama');
		$this->db3->limit($limit);
		$query = $this->db3->get();
		return $query->result();
	}
	
	public function show_gateIn_imp_tanggal($token,$limit,$flag_transfer,$tgfirst,$tglast,$id_kms)
	{
		$this->db3->select('*');    
		$this->db3->where('id_kms>=',$id_kms);
		$this->db3->where('flag_transfer',$flag_transfer);
		$this->db3->where("tgl_dok_inout between CAST('".$tgfirst."' as date) AND CAST('".$tglast."' as date)");
		$this->db3->where('token',$token);
		$this->db3->order_by('id_kms','DESC');	
		$this->db3->from('get_imp_in');
		$this->db3->limit($limit);
		$query = $this->db3->get();
		return $query->result();
	}	
	public function show_gateIn_imp_mawb($token,$limit,$flag_transfer,$no_master_bl_awb,$id_kms)
	{
		$this->db3->select('*');    
		$this->db3->where('id_kms>=',$id_kms);
		$this->db3->where('flag_transfer',$flag_transfer);
		$this->db3->where('no_master_bl_awb',$no_master_bl_awb);
		$this->db3->where('token',$token);
		$this->db3->order_by('id_kms','DESC');	
		$this->db3->from('get_imp_in');
		$this->db3->limit($limit);
		$query = $this->db3->get();
		return $query->result();
	}	
	public function show_gateOut_imp_tanggal($token,$limit,$flag_transfer,$tgfirst,$tglast,$id_kms)
	{
		$this->db3->select('*');    
		$this->db3->where('id_kms>=',$id_kms);
		$this->db3->where('flag_transfer',$flag_transfer);	
		$this->db3->where("tgl_dok_inout between CAST('".$tgfirst."' as date) AND CAST('".$tglast."' as date)");
		$this->db3->where('token',$token);
		$this->db3->order_by('id_kms','DESC');	
		$this->db3->from('get_imp_out');
		$this->db3->limit($limit);
		$query = $this->db3->get();
		return $query->result();
	}
	public function show_gateOut_imp_mawb($token,$limit,$flag_transfer,$no_master_bl_awb,$id_kms)
	{
		$this->db3->select('*');    
		$this->db3->where('id_kms>=',$id_kms);
		$this->db3->where('flag_transfer',$flag_transfer);	
		$this->db3->where('no_master_bl_awb',$no_master_bl_awb);	
		$this->db3->where('token',$token);
		$this->db3->order_by('id_kms','DESC');	
		$this->db3->from('get_imp_out');
		$this->db3->limit($limit);
		$query = $this->db3->get();
		return $query->result();
	}	
	public function show_gateIn_exp_tanggal($token,$limit,$flag_transfer,$tgfirst,$tglast,$id_kms)
	{
		$this->db3->select('*');    
		$this->db3->where('id_kms>=',$id_kms);
		$this->db3->where('flag_transfer',$flag_transfer);	
		$this->db3->where("tgl_dok_inout between CAST('".$tgfirst."' as date) AND CAST('".$tglast."' as date)");
		$this->db3->where('token',$token);
		$this->db3->order_by('id_kms','DESC');	
		$this->db3->from('get_exp_in');
		$this->db3->limit($limit);
		$query = $this->db3->get();
		return $query->result();
	}
	public function show_gateIn_exp_mawb($token,$limit,$flag_transfer,$no_master_bl_awb,$id_kms)
	{
		$this->db3->select('*');    
		$this->db3->where('id_kms>=',$id_kms);
		$this->db3->where('flag_transfer',$flag_transfer);
		$this->db3->where('flag_gateout=0');			
		$this->db3->where('no_master_bl_awb',$no_master_bl_awb);		
		$this->db3->where('token',$token);
		$this->db3->order_by('id_kms','DESC');	
		$this->db3->from('get_exp_in');
		$this->db3->limit($limit);
		$query = $this->db3->get();
		return $query->result();
	}	
	
	public function show_gateIn_exp_for_Out($token,$limit,$flag_transfer,$flag_gateout,$id_kms)
	{
		$this->db3->select('*');    
		$this->db3->where('id_kms>=',$id_kms);
		$this->db3->where('flag_transfer',$flag_transfer);	
		$this->db3->where('flag_gateout',$flag_gateout);	
		$this->db3->where('token',$token);
		$this->db3->order_by('id_kms','DESC');	
		$this->db3->from('get_exp_in');
		$this->db3->limit($limit);
		$query = $this->db3->get();
		return $query->result();
	}
	
	public function show_gateOut_exp_tanggal($token,$limit,$flag_transfer,$tgfirst,$tglast,$id_kms)
	{
		$this->db3->select('*');    
		$this->db3->where('id_kms>=',$id_kms);
		$this->db3->where('flag_transfer',$flag_transfer);	
		//$this->db4->where("tgl_dok_inout between CAST('".$tgfirst."' as date) AND CAST('".$tglast."' as date)");
		$this->db3->where('token',$token);
		$this->db3->order_by('id_kms');	
		$this->db3->from('get_exp_out');
		$this->db3->limit($limit);
		$query = $this->db3->get();
		return $query->result();
	}
	public function show_gateOut_exp_mawb($token,$limit,$flag_transfer,$no_master_bl_awb,$id_kms)
	{
		$this->db3->select('*');    
		$this->db3->where('id_kms>=',$id_kms);
		$this->db3->where('flag_transfer',$flag_transfer);	
		$this->db3->where('no_master_bl_awb',$no_master_bl_awb);
		$this->db3->where('token',$token);
		$this->db3->order_by('id_kms','DESC');	
		$this->db3->from('get_exp_out');
		$this->db3->limit($limit);
		$query = $this->db3->get();
		return $query->result();
	}
	
	public function show_reject($token,$namatable,$limit,$id_kms)
	{
		$this->db3->select('*');    
		$this->db3->where('id_kms>=',$id_kms);
		$this->db3->where('flag_transfer=5');	
		$this->db3->where('token',$token);
		$this->db3->order_by('id_kms','DESC');	
		$this->db3->from($namatable);
		$this->db3->limit($limit);
		$query = $this->db3->get();
		return $query->result();
	}
	
	
	
	//**************** SENDING DATA TPS ONLINE ***************************************
	
	public function sending_gatein_imp($limit,$flag_transfer,$id_kms)
	{
		$this->db3->select('*');    
		$this->db3->where('id_kms>=',$id_kms);
		$this->db3->where('flag_transfer',$flag_transfer);	
		$this->db3->from('get_imp_in');
		$this->db3->limit($limit);
		$query = $this->db3->get();
		return $query->result();
	}
	
	public function sending_gateout_imp($limit,$flag_transfer,$id_kms)
	{
		$this->db3->select('*');    
		$this->db3->where('id_kms>=',$id_kms);
		$this->db3->where('flag_transfer',$flag_transfer);
		$this->db3->from('get_imp_out');
		$this->db3->limit($limit);
		$query = $this->db3->get();
		return $query->result();
	}
	
	public function sending_gatein_exp($token,$limit,$flag_transfer,$id_kms)
	{
		$this->db3->select('*');    
		$this->db3->where('id_kms>=',$id_kms);
		$this->db3->where('flag_transfer',$flag_transfer);	
		$this->db3->where('token',$token);
		$this->db3->from('get_exp_in');
		$this->db3->limit($limit);
		$query = $this->db3->get();
		return $query->result();
	}
	
	public function sending_gateout_exp($token,$limit,$flag_transfer,$id_kms)
	{
		$this->db3->select('*');    
		$this->db3->where('id_kms>=',$id_kms);
		$this->db3->where('flag_transfer',$flag_transfer);	
		$this->db3->where('token',$token);
		$this->db3->from('get_exp_out');
		$this->db3->limit($limit);
		$query = $this->db3->get();
		return $query->result();
	}
	
	public function ready_move_to_cloud($type)
	{
		$flag_transfer="2";
		$this->db3->select('*'); 
		$this->db3->where('flag_transfer',$flag_transfer);	
		if ($type == "get_imp_in") 
		{
			$this->db3->from('get_imp_in');	
		}
		else
		{
			$this->db3->from('get_imp_out');	
		}
		$this->db3->limit(500);
		$query = $this->db3->get();
		return $query->result();
	}
	
	
	//**************** modul manifest dasar ***************************************
	
	public function modul_manifest_header($token,$nomor_aju=null)
	{
		$this->db6->select('*');    
		if(!is_null($nomor_aju))$this->db6->where('nomor_aju',$nomor_aju);	
		//$this->db4->where('token',$token);
		$this->db6->from('manifest_header');
		$query = $this->db6->get();
		return $query->result();
	}
	
	public function modul_manifest_masterentry($token,$nomor_aju=null,$id_master)
	{
		$this->db6->select('*');    
		if(!is_null($nomor_aju))$this->db6->where('nomor_aju',$nomor_aju);	
		$this->db6->where('id_master',$id_master);
		$this->db6->where('token',$token);
		$this->db6->from('manifest_masterentry');
		$query = $this->db6->get();
		return $query->result();
	}
	
	public function modul_manifest_detail($token,$nomor_aju=null,$id_detail)
	{
		$this->db6->select('*');    
		if(!is_null($nomor_aju))$this->db6->where('nomor_aju',$nomor_aju);	
		$this->db6->where('id_detail',$id_detail);
		$this->db6->where('token',$token);
		$this->db6->from('manifest_detail');
		$query = $this->db6->get();
		return $query->result();
	}
	
	public function modul_manifest_detail_by_mawb($token,$no_master_blawb)
	{
		$this->db6->select('b.*');    		
		$this->db6->from('manifest_detail a');
		$this->db6->join('manifest_header b','a.nomor_aju=b.nomor_aju','inner');
		$this->db6->where('a.no_master_blawb',$no_master_blawb);			
		$this->db6->where('a.token',$token);
		$query = $this->db6->get();
		return $query->result();
	}
	
	public function modul_manifest_detail_reguler($token,$no_master_blawb,$no_host_blawb)
	{
		$this->db6->select('*');    
		$this->db6->where('no_master_blawb',$no_master_blawb);	
		$this->db6->where('no_host_blawb',$no_host_blawb);
		$this->db6->where('token',$token);
		$this->db6->from('manifest_detail');
		$query = $this->db6->get();
		return $query->result();
	}
	
	public function modul_manifest_barang($token,$id_detail,$id_barang=null)
	{
		
		$this->db6->select('*');    
		$this->db6->where('id_detail',$id_detail);
		if(!is_null($id_barang))$this->db6->where('id_barang',$id_barang);
		$this->db6->where('token',$token);
		$this->db6->from('manifest_barang');
		$query = $this->db6->get();
		return $query->result();
	}
	
	public function modul_manifest_dokumen($token,$id_detail=null,$id_dokumen)
	{
		$this->db6->select('*');    
		$this->db6->where('id_dokumen',$id_dokumen);
		if(!is_null($id_detail))$this->db6->where('id_detail',$id_detail);
		$this->db6->where('token',$token);
		$this->db6->from('manifest_dokumen');
		$query = $this->db6->get();
		return $query->result();
	}
	
	public function modul_manifest_respon($token,$nomor_aju,$id_respon=null)
	{
		$this->db6->select('*');
		if(!is_null($id_respon))$this->db6->where('id_respon',$id_respon);
		$this->db6->where('token',$token);
		$this->db6->where('nomor_aju',$nomor_aju);	
		$this->db6->from('manifest_respon');
		$query = $this->db6->get();
		return $query->result();
	}
	
	//************************ modul manifest manipulasi ****************************************************************************
	
	
	public function modul_manifest_detail_waybill($token,$no_master_blawb)
	{
		$this->db6->select('*');    		
		$this->db6->where('no_master_blawb',$no_master_blawb);
		$this->db6->where('token',$token);
		$this->db6->from('manifest_detail');
		$query = $this->db6->get();
		return $query->result();
	}
	
	public function modul_manifest_detail_zerro($id_detail,$token=null,$no_master_blawb=null)
	{
		$this->db6->select('*');    	
		$this->db6->where('fl_gate=0');
		if(!is_null($no_master_blawb))$this->db6->where('no_master_blawb',$no_master_blawb);
		if(!is_null($token))$this->db6->where('token',$token);
		$this->db6->where('id_detail>=',$id_detail);
		$this->db6->limit(100);
		$this->db6->order_by('id_detail');
		$this->db6->from('manifest_detail');
		$query = $this->db6->get();
		return $query->result();
	}
	
	
	public function search_gateIn_imp_done($token,$no_bl_awb)
	{
		$this->db3->select('*');    
		$this->db3->where('no_bl_awb',$no_bl_awb);	
		$this->db3->where('token',$token);
		$this->db3->from('get_imp_in');
		$query = $this->db3->get();
		return $query->result();
	}
	public function manifest_masterentry_for_gateIn($token,$fl_gate=null,$limit=null,$no_master_bl=null)
	{
		$this->db6->select('*');    
		if(!is_null($no_master_bl))$this->db6->where('no_master_bl',$no_master_bl);
		if(!is_null($fl_gate))$this->db6->where('fl_gate',$fl_gate);
		$this->db6->where('token',$token);
		if(!is_null($limit))$this->db6->limit($limit);
		$this->db6->from('manifest_masterentry');
		$query = $this->db6->get();
		return $query->result();
	}
	
	public function total_manifest_detail_gateIn_done($token,$no_master_blawb)
	{
		$this->db6->select('count(fl_gate) as total');    
		$this->db6->where('no_master_blawb',$no_master_blawb);	
		$this->db6->where('token',$token);
		$this->db6->where('fl_gate=1');
		$this->db6->from('manifest_detail');
		$query = $this->db6->get();
		return $query->result();
	}
	
	public function find_gateIn_imp($token,$no_master_bl_awb=null)
	{
		$this->db3->select('*');    
		if(!is_null($no_master_bl_awb))$this->db3->where('no_master_bl_awb',$no_master_bl_awb);	
		$this->db3->where('token',$token);
		$this->db3->from('get_imp_in');
		$this->db3->limit(25);
		$query = $this->db3->get();
		return $query->result();
	}
	
	public function show_breakdown_gatein_zerro($token)
	{
		$this->db8->distinct();
		$this->db8->select('a.*'); 
		$this->db8->from('imp_breakdowndetail a');
		$this->db8->join('imp_breakdownheader b','b.BreakdownNumber=a.BreakdownNumber','inner');	
		$this->db8->where('b.token',$token);
		$this->db8->where('a.void=0');
		$this->db8->where('gatein=0');
		$this->db8->where('b.void=0');
		$query = $this->db8->get();
		return $query->result();
	}
	
	public function gateOut_ekspor_by_manifest($token)
	{
		$this->db6->select('*');    
		$this->db6->where('kd_kelompok_pos=09');
		$this->db6->where('token',$token);
		$this->db6->where('fl_gate=0');
		$this->db6->from('manifest_detail');
		$query = $this->db6->get();
		return $query->result();
	}
	
	public function manifest_for_delivery($token,$no_host_blawb=null)
	{
		$this->db6->select('*');    
		$this->db6->where('no_master_blawb!=no_host_blawb');
		$this->db6->where('token',$token);
		$this->db6->where("fl_pecah='0'");		 
		$this->db6->order_by('id');
		$this->db6->from('manifest_detail');
		$query = $this->db6->get();
		return $query->result();
	}
	
	public function load_manifest_mawb($token,$nomor_aju)
	{
		$this->db6->select('*');    
		$this->db6->where('nomor_aju',$nomor_aju);
		$this->db6->where('token',$token);		
		$this->db6->from('manifest_masterentry');
		$query = $this->db6->get();
		return $query->result();
	}
	
	public function load_manifest_hawb($token,$nomor_aju)
	{
		$this->db6->select('*');    
		$this->db6->where('nomor_aju',$nomor_aju);
		$this->db6->where('token',$token);		
		$this->db6->from('manifest_detail');
		$query = $this->db6->get();
		return $query->result();
	}
	
	public function ref_number($DescriptionCode)
	{
		$this->db3->select('*');    
		$this->db3->where('DescriptionCode',$DescriptionCode);		
		$this->db3->from('t_number');
		$query = $this->db3->get();
		return $query->result();
	}
	public function update_flag($namatable,$namafield,$namacode,$nilaicode)
	{
		$nilaiFlag='1';
		$data = array(
			$namafield => $nilaiFlag
		);
		$this->db5->where($namacode,$nilaicode);	
		$this->db5->update($namatable,$data);
	}
	
	public function update_flag_tps($namatable,$namafield,$namacode,$nilaicode)
	{
		$nilaiFlag='1';
		$data = array(
			$namafield => $nilaiFlag
		);
		$this->db4->where($namacode,$nilaicode);	
		$this->db4->update($namatable,$data);
	}

	
	public function update_dinamis($namatable,$namafield,$isifield,$namacode,$nilaicode)
	{
		$data = array(
			$namafield => $isifield
		);
		$this->db4->where($namacode,$nilaicode);	
		$this->db4->update($namatable,$data);
	}
	
	public function update_respon_gate($namatable,$namacode,$nilaicode,$ref_num,$respon,$flag_transfer,$date_update)
	{
		$data = array(
			'ref_num' 			=> $ref_num,
			'respon' 			=> URLDECODE($respon),
			'flag_transfer'		=> $flag_transfer,
			'date_update'		=>URLDECODE($date_update)
		);
		$this->db4->where($namacode,$nilaicode);	
		$this->db4->update($namatable,$data);
	}
	
	public function list_penegahan_awb($no_bl_awb)
	{
		$this->db3->select('*');    
		$this->db3->where('no_bl_awb',$no_bl_awb);	
		$this->db3->where('flag_release=0');	
		$this->db3->from('auto_penegahan');
		$query = $this->db3->get();
		return $query->result();
	}
	
	public function list_penegahan_mawb($no_master_bl_awb)
	{
		$this->db3->select('*');    
		$this->db3->where('no_master_bl_awb',$no_master_bl_awb);	
		$this->db3->where('flag_release=0');	
		$this->db3->from('auto_penegahan');
		$query = $this->db3->get();
		return $query->result();
	}
	
	public function list_inventory()
	{
		$this->db3->select('*');    
		$this->db3->where('no_bl_awb NOT IN (SELECT no_bl_awb FROM get_imp_out)');	
		$this->db3->from('get_imp_in');
		$query = $this->db3->get();
		return $query->result();
	}
	
	public function list_bangkir_CAR($CAR)
	{
		$this->db6->select('*');    
		$this->db6->where('CAR',$CAR);	
		$this->db6->from('getbrgkiriman_sppb');
		$query = $this->db5->get();
		return $query->result();
	}
	
	public function list_bangkir_hawb($NO_BL_AWB)
	{
		$this->db6->select('*');    
		$this->db6->where('NO_BL_AWB',$NO_BL_AWB);	
		$this->db6->from('getbrgkiriman_sppb');
		$query = $this->db6->get();
		return $query->result();
	}
	
	public function list_bc20_CAR($CAR)
	{
		$this->db6->select('*');    
		$this->db6->where('CAR',$CAR);	
		$this->db6->from('getbc20_sppb');
		$query = $this->db6->get();
		return $query->result();
	}
	
	public function list_bc20_hawb($NO_BL_AWB)
	{
		$this->db6->select('*');    
		$this->db6->where('NO_BL_AWB',$NO_BL_AWB);	
		$this->db6->from('getbc20_sppb');
		$query = $this->db6->get();
		return $query->result();
	}
	
	public function list_bc23_CAR($CAR)
	{
		$this->db6->select('*');    
		$this->db6->where('CAR',$CAR);	
		$this->db6->from('getbc23_sppb');
		$query = $this->db6->get();
		return $query->result();
	}
	
	public function list_bc23_hawb($NO_BL_AWB)
	{
		$this->db6->select('*');    
		$this->db6->where('NO_BL_AWB',$NO_BL_AWB);	
		$this->db6->from('getbc23_sppb');
		$query = $this->db6->get();
		return $query->result();
	}

	public function list_sppb($tanggal,$type_clearance=null)
	{
		$this->db8->select('*'); 
		$this->db8->where('tanggal',$tanggal);
		if(!is_null($type_clearance))$this->db8->where('type_clearance',$type_clearance);	
		$this->db8->from('imp_sppb_ecommerce');
		$query = $this->db8->get();
		return $query->result();
	}
	
	public function transfer_tpsonline_outward($token)
	{
		$this->db6->select("*");    
		$this->db6->where("fl_gate=0");	
		$this->db6->where("kd_kelompok_pos='09'");			
		$this->db6->where("token",$token);
		$this->db6->limit(50);
		$this->db6->from("manifest_detail");
		$query = $this->db6->get();
		return $query->result();
	}
	
	public function cek_data_cwp_for_tpsonline($token,$MasterAWB)
	{		
		$this->db8->distinct();
		$this->db8->select('a.noid, a.ProofNumber, a.MasterAWB, a.AirlinesCode, a.Origin, a.Destination, a.FlightNumber, a.TotalPieces,');
		$this->db8->select('a.TotalNetto, a.TotalVolume, a.TotalCAW, a.DateOfFlight, a.InvoiceNumber, a.DateOfEntry, a.TimeOfEntry,');
		$this->db8->select('a.token, b.HostAWB, b.KindOfCode, b.KindOfNature,');
		$this->db8->select('(SELECT CompanyName FROM mst_customer WHERE CustomerCode = ShipperCode limit 1) AS Shipper_Company,');
		$this->db8->select('(SELECT CONCAT(Address1," ",Address2," ",City) FROM mst_customer WHERE CustomerCode=ShipperCode limit 1) AS shipper_Address,');
		$this->db8->select('(SELECT CompanyName FROM mst_customer WHERE CustomerCode=ConsigneeCode limit 1) AS Consignee_Company,');
		$this->db8->select('IF(a.PaymentCode="1",(SELECT PEB FROM eks_dokcustom WHERE InvoiceNumber=a.InvoiceNumber limit 1),(SELECT PEB FROM eks_dokcustom WHERE InvoiceNumber= a.ProofNumber limit 1)) AS PEB,');
		$this->db8->select('IF(a.PaymentCode="1",(SELECT DateOfPEB FROM eks_dokcustom WHERE InvoiceNumber=a.InvoiceNumber limit 1),(SELECT DateOfPEB FROM eks_dokcustom WHERE InvoiceNumber=a.ProofNumber limit 1)) AS DateOfPEB');
		$this->db8->from('eks_weighingheader a');
		$this->db8->join('eks_weighingdetail b','b.ProofNumber = a.ProofNumber','INNER');
		$this->db8->where('a.token',$token);
		$this->db8->where('a.MasterAWB',$MasterAWB);
		$this->db8->where('a.void=0');
		$query = $this->db8->get();
		return $query->result();
	}

	public function proc_get_data_Gate_in()
	{
		$query=$this->db4->query("get_data_Gate_in;"); 
	}
	
	public function cek_data_garismiring($namaField,$namatable)
	{
		//$this->db->like('title', $query);
		//$res = $this->db->get('film');
		
		$seperti = '%/%';
		
		$this->db6->select('*');    
		$this->db6->like($namaField,'/');	
		$this->db6->from($namatable);
		$this->db6->limit(1000);
		$query = $this->db6->get();
		return $query->result();
	}
	
	
	public function update_perubahan($noid,$namatable,$tgl_sppb,$tgl_pib,$tgl_bc11,$tgl_bl_awb=null,$tgl_master_bl_awb=null)
	{
		if(!is_null($tgl_bl_awb)) 
		{
			if(!is_null($tgl_master_bl_awb))
			{
				$data = array(
					'TGL_SPPB' 			=> $tgl_sppb,
					'TGL_PIB' 			=> $tgl_pib,
					'TGL_BC11'			=> $tgl_bc11,
					'TGL_BL_AWB'		=> $tgl_bl_awb,
					'TGL_MASTER_BL_AWB'	=> $tgl_master_bl_awb
				);
			}
			else
			{
				$data = array(
					'TGL_SPPB' 			=> $tgl_sppb,
					'TGL_PIB' 			=> $tgl_pib,
					'TGL_BC11'			=> $tgl_bc11,
					'TGL_BL_AWB'		=> $tgl_bl_awb
				);
			}
		}
		elseif(!is_null($tgl_master_bl_awb))
		{
			$data = array(
				'TGL_SPPB' 			=> $tgl_sppb,
				'TGL_PIB' 			=> $tgl_pib,
				'TGL_BC11'			=> $tgl_bc11,
				'TGL_MASTER_BL_AWB'	=> $tgl_master_bl_awb
			);
		}
		else
		{
			$data = array(
				'TGL_SPPB' 			=> $tgl_sppb,
				'TGL_PIB' 			=> $tgl_pib,
				'TGL_BC11'			=> $tgl_bc11
			);
		}
		
		$this->db5->where('noid',$noid);	
		$this->db5->update($namatable,$data);
		
	}
}