<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cont_gate extends MX_Controller 
{
	function __construct()
    {
        parent::__construct();		
        $this->load->model(array('gate_model'));
    }	
	
	public function get_keterangan_dokumen($nilai) 
	{
		$listhasil = $this->gate_model->keterangan_dokumen($nilai);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
		
	}
	
	public function get_dokumen_gudang_out($NO_BL_AWB)
	{
		$listhasil = $this->gate_model->dokumen_gudang_out($NO_BL_AWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_Check_c1_imp($noid)
	{
		$listhasil = $this->gate_model->Check_c1_imp($noid);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_Check_c1_imp_hawb($hawb)
	{
		$listhasil = $this->gate_model->Check_c1_imp_hawb($hawb);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_m_manifest_detail($token,$no_host_blawb=null)
	{
		$listhasil = $this->gate_model->m_manifest_detail($token,$no_host_blawb);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function  get_Check_gateIn_imp($no_bl_awb)
	{
		$listhasil = $this->gate_model->Check_gateIn_imp($no_bl_awb);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function  get_Check_gateIn_eks($no_bl_awb)
	{
		$listhasil = $this->gate_model->Check_gateIn_eks($no_bl_awb);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function  get_Check_gateOut_imp($no_bl_awb)
	{
		$listhasil = $this->gate_model->Check_gateOut_imp($no_bl_awb);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function  get_Check_gateOut_eks($no_bl_awb)
	{
		$listhasil = $this->gate_model->Check_gateOut_eks($no_bl_awb);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	
	public function get_GateOut_sys_lama($limit,$flag_transfer,$id_kms)
	{
		$listhasil = $this->gate_model->GateOut_sys_lama($limit,$flag_transfer,$id_kms);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_Check_gateIn_sys_lama($no_bl_awb) 
	{
		$listhasil = $this->gate_model->Check_gateIn_sys_lama($no_bl_awb);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_GateIn_sys_lama($limit,$flag_transfer,$id_kms)
	{
		$listhasil = $this->gate_model->GateIn_sys_lama($limit,$flag_transfer,$id_kms);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	
	//**************************   show data tps online  **********************************
	public function get_show_gateIn_imp_tanggal($token,$limit,$flag_transfer,$tgfirst,$tglast,$id_kms)
	{
		$listhasil = $this->gate_model->show_gateIn_imp_tanggal($token,$limit,$flag_transfer,$tgfirst,$tglast,$id_kms);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	public function get_show_gateIn_imp_mawb($token,$limit,$flag_transfer,$no_master_bl_awb,$id_kms)
	{
		$listhasil = $this->gate_model->show_gateIn_imp_mawb($token,$limit,$flag_transfer,$no_master_bl_awb,$id_kms);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	public function get_show_gateOut_imp_tanggal($token,$limit,$flag_transfer,$tgfirst,$tglast,$id_kms)
	{
		$listhasil = $this->gate_model->show_gateOut_imp_tanggal($token,$limit,$flag_transfer,$tgfirst,$tglast,$id_kms);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	public function get_show_gateOut_imp_mawb($token,$limit,$flag_transfer,$no_master_bl_awb,$id_kms)
	{
		$listhasil = $this->gate_model->show_gateOut_imp_mawb($token,$limit,$flag_transfer,$no_master_bl_awb,$id_kms);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	public function get_show_gateIn_exp_tanggal($token,$limit,$flag_transfer,$tgfirst,$tglast,$id_kms)
	{
		$listhasil = $this->gate_model->show_gateIn_exp_tanggal($token,$limit,$flag_transfer,$tgfirst,$tglast,$id_kms);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	public function get_show_gateIn_exp_mawb($token,$limit,$flag_transfer,$no_master_bl_awb,$id_kms)
	{
		$listhasil = $this->gate_model->show_gateIn_exp_mawb($token,$limit,$flag_transfer,$no_master_bl_awb,$id_kms);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_show_gateIn_exp_for_Out($token,$limit,$flag_transfer,$flag_gateout,$id_kms)
	{
		$listhasil = $this->gate_model->show_gateIn_exp_for_Out($token,$limit,$flag_transfer,$flag_gateout,$id_kms);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_show_gateOut_exp_tanggal($token,$limit,$flag_transfer,$tgfirst,$tglast,$id_kms)
	{
		$listhasil = $this->gate_model->show_gateOut_exp_tanggal($token,$limit,$flag_transfer,$tgfirst,$tglast,$id_kms);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	public function get_show_gateOut_exp_mawb($token,$limit,$flag_transfer,$no_master_bl_awb,$id_kms)
	{
		$listhasil = $this->gate_model->show_gateOut_exp_mawb($token,$limit,$flag_transfer,$no_master_bl_awb,$id_kms);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	//**************************   sending data tps online  **********************************
	
	public function get_sending_gatein_imp($limit,$flag_transfer,$id_kms)
	{
		$listhasil = $this->gate_model->sending_gatein_imp($limit,$flag_transfer,$id_kms);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}

	public function get_sending_gateout_imp($limit,$flag_transfer,$id_kms)
	{
		$listhasil = $this->gate_model->sending_gateout_imp($limit,$flag_transfer,$id_kms);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_sending_gatein_exp($limit,$flag_transfer,$id_kms)
	{
		$listhasil = $this->gate_model->sending_gatein_exp($limit,$flag_transfer,$id_kms);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_sending_gateout_exp($limit,$flag_transfer,$id_kms)
	{
		$listhasil = $this->gate_model->sending_gateout_exp($limit,$flag_transfer,$id_kms);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	
	public function get_ready_move_to_cloud($type)
	{
		$listhasil = $this->gate_model->ready_move_to_cloud($type);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_update_from_cloud($type)
	{
		$listhasil = $this->gate_model->update_from_cloud($type);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	//**************************   others tps online  **********************************
	
	public function get_show_breakdown_gatein_zerro($token)
	{
		$listhasil = $this->gate_model->show_breakdown_gatein_zerro();
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_find_gateIn_imp($token,$no_master_bl_awb)
	{
		$listhasil = $this->gate_model->find_gateIn_imp($token,$no_master_bl_awb);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_modul_manifest_header($token,$nomor_aju)
	{
		$listhasil = $this->gate_model->modul_manifest_header($token,$nomor_aju);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_modul_manifest_masterentry($token,$nomor_aju=null,$id_master)
	{
		$listhasil = $this->gate_model->modul_manifest_masterentry($token,$nomor_aju,$id_master);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_modul_manifest_detail($token,$nomor_aju,$id_detail)
	{
		
		$listhasil = $this->gate_model->modul_manifest_detail($token,$nomor_aju,$id_detail);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_modul_manifest_detail_by_mawb($token,$no_master_blawb)
	{
		$listhasil = $this->gate_model->modul_manifest_detail_by_mawb($token,$no_master_blawb);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
		
	
	public function get_modul_manifest_detail_reguler($token,$no_master_blawb,$no_host_blawb)
	{
		$listhasil = $this->gate_model->modul_manifest_detail_reguler($token,$no_master_blawb,$no_host_blawb);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_modul_manifest_detail_zerro($id_detail,$token=null,$no_master_blawb=null)
	{
		$listhasil = $this->gate_model->modul_manifest_detail_zerro($id_detail,$token,$no_master_blawb);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function find_modul_manifest_detail_waybill($token,$no_master_blawb)
	{
		$listhasil = $this->gate_model->modul_manifest_detail_waybill($token,$no_master_blawb);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_modul_manifest_barang($token,$id_detail,$id_barang=null)
	{
		$listhasil = $this->gate_model->modul_manifest_barang($token,$id_detail,$id_barang);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_modul_manifest_dokumen($token,$id_detail=null,$id_dokumen)
	{
		$listhasil = $this->gate_model->modul_manifest_dokumen($token,$id_detail,$id_dokumen);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_modul_manifest_respon($token,$nomor_aju,$id_respon=null)
	{
		$listhasil = $this->gate_model->modul_manifest_respon($token,$nomor_aju,$id_respon);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_manifest_masterentry_for_gateIn($token,$fl_gate=null,$limit=null,$no_master_bl=null)
	{
		$listhasil = $this->gate_model->manifest_masterentry_for_gateIn($token,$fl_gate,$limit,$no_master_bl);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_total_manifest_detail_gateIn_done($token,$no_master_blawb)
	{
		$listhasil = $this->gate_model->total_manifest_detail_gateIn_done($token,$no_master_blawb);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_search_gateIn_imp_done($token,$no_bl_awb)
	{
		$listhasil = $this->gate_model->search_gateIn_imp_done($token,$no_bl_awb);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_gateOut_ekspor_by_manifest($token)
	{
		$listhasil = $this->gate_model->gateOut_ekspor_by_manifest($token);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_manifest_for_delivery($token)
	{
		$listhasil = $this->gate_model->manifest_for_delivery($token);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_load_manifest_mawb($token,$nomor_aju)
	{
		$listhasil = $this->gate_model->load_manifest_mawb($token,$nomor_aju);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_load_manifest_hawb($token,$nomor_aju)
	{
		$listhasil = $this->gate_model->load_manifest_hawb($token,$nomor_aju);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_ref_number($DescriptionCode)
	{
		$listhasil = $this->gate_model->ref_number($DescriptionCode);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_update_dinamis($namatable,$namafield,$isifield,$namacode,$nilaicode)
	{
		$listhasil = $this->gate_model->update_dinamis($namatable,$namafield,$isifield,$namacode,$nilaicode);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);	
	}
	
	public function get_update_flag($namatable,$namafield,$namacode,$nilaicode)
	{
		$listhasil = $this->gate_model->update_flag($namatable,$namafield,$namacode,$nilaicode);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);	
	}
	
	public function get_update_flag_tps($namatable,$namafield,$namacode,$nilaicode)
	{
		$listhasil = $this->gate_model->update_flag_tps($namatable,$namafield,$namacode,$nilaicode);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);	
	}
	
	public function get_update_respon_gate($namatable,$namacode,$nilaicode,$ref_num,$respon,$flag_transfer,$date_update)
	{
		$listhasil = $this->gate_model->update_respon_gate($namatable,$namacode,$nilaicode,$ref_num,$respon,$flag_transfer,$date_update);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_penegahan_awb($no_bl_awb)
	{
		$listhasil = $this->gate_model->list_penegahan_awb($no_bl_awb);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_penegahan_mawb($no_master_bl_awb)
	{
		$listhasil = $this->gate_model->list_penegahan_mawb($no_master_bl_awb);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_inventory()
	{
		$listhasil = $this->gate_model->list_inventory();
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_bangkir_CAR($CAR)
	{
		$listhasil = $this->gate_model->list_bangkir_CAR($CAR);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_bangkir_hawb($NO_BL_AWB)
	{
		$listhasil = $this->gate_model->list_bangkir_hawb($NO_BL_AWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_bc20_CAR($CAR)
	{
		$listhasil = $this->gate_model->list_bc20_CAR($CAR);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_bc20_hawb($NO_BL_AWB)
	{
		$listhasil = $this->gate_model->list_bc20_hawb($NO_BL_AWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_bc23_CAR($CAR)
	{
		$listhasil = $this->gate_model->list_bc23_CAR($CAR);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_bc23_hawb($NO_BL_AWB)
	{
		$listhasil = $this->gate_model->list_bc23_hawb($NO_BL_AWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_list_sppb($tanggal,$type_clearance=null)
	{
		$listhasil = $this->gate_model->list_sppb($tanggal,$type_clearance);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_transfer_tpsonline_outward($token)
	{
		$listhasil = $this->gate_model->transfer_tpsonline_outward($token);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_cek_data_cwp_for_tpsonline($token,$MasterAWB)
	{
		$listhasil = $this->gate_model->cek_data_cwp_for_tpsonline($token,$MasterAWB);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
		
	}
	
	public function  get_proc_get_data_Gate_in()
	{
		$listhasil = $this->gate_model->proc_get_data_Gate_in();
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function  get_show_reject($token,$namatable,$limit,$id_kms)
	{
		$listhasil = $this->gate_model->show_reject($token,$namatable,$limit,$id_kms);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_cek_data_garismiring($namaField,$namatable)
	{
		$listhasil = $this->gate_model->cek_data_garismiring($namaField,$namatable);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	
	public function get_update_perubahan($noid,$namatable,$tgl_sppb,$tgl_pib,$tgl_bc11,$tgl_bl_awb=null,$tgl_master_bl_awb=null)
	{
		$listhasil = $this->gate_model->update_perubahan($noid,$namatable,$tgl_sppb,$tgl_pib,$tgl_bc11,$tgl_bl_awb,$tgl_master_bl_awb);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
		
	}
	
	
}