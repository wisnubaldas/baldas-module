<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cont_plp extends MX_Controller 
{
	function __construct()
    {
        parent::__construct();		
        $this->load->model(array('plp_model'));
    }	
	
	public function get_respon_mohon_plp($no_bl_awb)
	{
		$listhasil = $this->plp_model->respon_mohon_plp($no_bl_awb);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	public function get_show_mohon_plp($id_mohon=null)
	{
		$listhasil = $this->plp_model->show_mohon_plp($id_mohon);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_show_batal_plp($id_batal=null)
	{
		$listhasil = $this->plp_model->show_batal_plp($id_batal);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_show_respon_mohon_plp($typeshow,$noid)
	{
		$listhasil = $this->plp_model->show_respon_mohon_plp($typeshow,$noid);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_show_respon_batal_plp($typeShow,$noid)
	{
		$listhasil = $this->plp_model->show_respon_batal_plp($typeShow,$noid);
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
		
	}
	
	public function get_show_ref_mohon()
	{
		$listhasil = $this->plp_model->show_ref_mohon();
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_show_ref_batal()
	{
		$listhasil = $this->plp_model->show_ref_batal();
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	public function get_respon_mohon_plp_gatein()
	{
		$listhasil = $this->plp_model->respon_mohon_plp_gatein();
		// menjadikan objek menjadi JSON
		$hasil = json_encode($listhasil);		
		// mengeluarkan JSON ke browser
		header('HTTP/1.1: 200');
		header('Status: 200');
		header('Content-Length: '.strlen($hasil));
        exit($hasil);
	}
	
	
}